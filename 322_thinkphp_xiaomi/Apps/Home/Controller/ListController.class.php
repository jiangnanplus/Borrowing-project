<?php
namespace Home\Controller;
use Think\Controller;
/*
商品模块 商品的增删改查
*/
class ListController extends Controller {
    public function index(){
    	//创建数据库对象
    	$goods = M('goods');
    	$goodsClass = M('goodsclass');
    	//开启session
    	session_start();
    	// var_dump($_SESSION);
    	//商品查询$where的设置
	    	//条件检索where
		    	if(I('title') || (I('g_all') && I('title'))){
		    		$where['title'] = array('like','%'.I('title').'%');
		    		//设置监测变量(用于title检索时前台显示当前一级分类名称的控制)
		    		$title_current_one = 1;// 搜索“I('title')”的结果 由于模版if标签不支持支持真假判断，所有给予赋值判断
		    	}
	    		if(I('gid')){
	    			$where['gid'] = I('gid');
	    		}
	    		if(I('cid')){
	    			$where['mcid'] = I('cid');
	    		}
	    			
	    	//特惠商品以及库存检索以及对前台的样式控制
	    		if(I('discount_checked')){
	    			$_SESSION['discount_checked'] = 'icon-checked';
	    			$where['discount'] = array('lt',10);
	    		}else{
	    			$_SESSION['discount_checked'] = '';
	    			$where['discount'] = '';
	    		}

	    		if(I('num_checked')){
	    			$_SESSION['num_checked'] = 'icon-checked';
	    			$where['num'] = array('gt',0);
	    		}else{
	    			$_SESSION['num_checked'] = '';
	    			$where['num'] = '';
	    		}
	    	
    		//排序检索
    			//初始化模版样式控制变量
	    		$recomend = '';
	    		$new = '';
	    		$up = '';
	    		$down = '';
	    		//排序判断
	    		if(I('new')){
	    			//最新---前20ge
	    			$order = I('new').' desc';
	    			$new = 'current';
	    		}elseif(I('up')){
	    			//价格从高到低
	    			$order = I('up').' desc';
	    			$up = 'current';//样式控制
	    		}elseif(I('down')){
	    			//价格从低到高
	    			$order = I('down');
	    			$down = 'current';//样式控制
	    		}else{
	    			$order = '';//小米默认为推荐 即 $order='';
	    			$recomend = 'current';//样式控制
	    		}
	    		
    	//设置分类路径导航 与 二级分类
    		//全局搜索
	    		if(I('title')){
	    			$title = "title like '%".I('title')."%'";
	    			//查询符合要求的商品所属的分类mcid
	    			$mcids = $goods->where($title)->getField('mcid',true);
	    		
					if($mcids){
						//去除重复
		    			$mcids = array_unique($mcid);

		    			//根据分类路径path的元素个数获取符合条件的二级分类
		    				//设置获取类的cid的检索条件
		    				$map['cid'] = array('in',$mcids);
			    			//搜索相应的path字段
			    			$paths = $goodsClass->where($map)->getField('path',true);
			    		
			    			//通过unset干掉path中没有二级分类的类达到对类的筛选
			    			foreach($paths as $k=>$v){
			    				if($v=='0'){
			    					unset($paths[$k]);
			    				}
			    			}
			    			//获取筛选出的cid
			    			$newmap['path'] = array('in',$paths);
			    			$two = $goodsClass->where($newmap)->select();
			    			$two = array_combine($two['cid'], $two['name']);
					}else{
						$two = '';
					}
	    		}

	    	//通过点击商品进入list
		    	if(I('gid')){
		    		$info = $goods->find(I('gid'));
		    		//查询商品类
			    	$cid = $info['mcid'];   	
			    	$classInfo = $goodsClass->find($cid);		    	
			    	//分类路径
		    		$path = explode(',',$classInfo['path']);
		    		//获取相应二级分类名称[此处不要使用title中的方法，因此处还要在后面压人当前类]
		    		if(count($path)>1){
		    			$twoNames = $goodsClass->where('paid='.$path[1])->getField('name',true);
		    			//所有相关二级分类cid
		    			$twoCids = $goodsClass->where('paid='.$path[1])->getField('cid',true);
		    		}else{
		    			$twoCids = '';
		    			$twoNames = '';
		    		}
	    			//将相关二级分类的cid 名称 以关联数组的形式存入数组
	    			$two = array_combine($twoCids, $twoNames);
		    		//当前(处于选中)二级分类名称
		    		if(I('g_all')){
		    			$twoNameChecked = '全部';
		    		}else{
		    			$twoPaidChecked = $goodsClass->getFieldByCid($cid,'paid');
		    			$twoNameChecked = $goodsClass->getFieldByPaid($twoPaidChecked,'name');
		    		//把当前元素的类压人path便于显示在类的导航路径的最后
		    		array_push($path,$cid);//不能放到count($path)>1判断的上面
	    			}
	    			
		    	}

	    	//通过点击分类信息进入list
		    	if(I('cid')){    	
		    		//分类路径
		    		$path = explode(',',$goodsClass->getFieldByCid(I('cid'),'path'));
		    		//获取相应二级分类名称
		    		if(count($path)>1){//如果是二级分类
		    			//所有相关二级分类名称
		    			$twoNames = $goodsClass->where('paid='.$path[1])->getField('name',true);
		    			//所有相关二级分类cid
		    			$twoCids = $goodsClass->where('paid='.$path[1])->getField('cid',true);

		    			//当前(处于选中)二级分类名称			    		
				    	if(I('g_all')){
			    			$twoNameChecked = '全部';
			    			// //把当前元素的类压人path便于显示在类的导航路径的最后
			    			// array_push($path,'all');
			    		}else{
			    			$twoNameChecked = $goodsClass->getFieldByCid(I('cid'),'name');
			    			//把当前元素的类压人path便于显示在类的导航路径的最后
			    			array_push($path,I('cid'));
			    		}
		    	
		    		}else{//如果是一级分类
		    			//查找相应的父类cid
			    		//查找该cid的所有子类
			    		$newcid=$goodsClass->where('paid='.I('cid'))->getField('cid',true);
			    		//重置$where
			    		$where['mcid']=array('in',$newcid);
		    			//所有相关二级分类名称
		    			$twoNames = $goodsClass->where('paid='.I('cid'))->getField('name',true);
		    			//所有相关二级分类cid
		    			$twoCids = $goodsClass->where('paid='.I('cid'))->getField('cid',true);
		    			$twoNameChecked = '全部';
		    		}
	    			
		    		//将相关二级分类的cid 名称 以关联数组的形式存入数组
		    		$two = array_combine($twoCids, $twoNames);
			    	
		    		//判断当前分类下是否有子分类，有则重置$where  ---- 多级分类需要递归调用函数，暂不启用此代码，有时间再完善
		    			// function resetWhere($getcid,$goodsClass){
		    			// 	$cid = $getcid;
		    			// 	// var_dump($cid);
		    			// 	$map['paid'] = array('in',$cid);
		    			// 	// var_dump($map);
		    			// 	if($map){
		    			// 		$cidChild = $goodsClass->where($map)->getField('cid',true);
		    			// 	}
			    		// 	// var_dump($cidChild);
			    		// 	//重置搜索条件$where
			    		// 	if($cidChild){
			    		// 		$cid= array_merge((array)$cid,(array)$cidChild);
			    		// 		return($cid);
			    		// 		// resetWhere($cid,$goodsClass);	    				
			    		// 	}else{
			    		// 		var_dump($cid);
			    		// 		return $cid;
			    		// 	}
			    		// 	// var_dump($cid);
			    		// 	// return $cid;
		    			// }
		    			// resetWhere(I('cid'),$goodsClass); var_dump($cid);  			
			    		// $where['mcid'] = $cid;
			    		// // var_dump($where);	    		
		    	}
	    	//翻译路径为汉字
				if(I('gid') || I('cid')){
					if(count($path)>1){
						for($i=0;$i<count($path);$i++){
							if($path[$i] == 0){
								$pathValue[$i]='首页';
							}else{
								$pathValue[$i]=$goodsClass->getFieldByCid($path[$i],'name');
							}
						}
					}else{
						// $pathValue[0]=$goodsClass->getFieldByCid(I('cid'),'name');
						// $pathValue[1]='全部商品分类';
						$pathValue[1]=$goodsClass->getFieldByCid(I('cid'),'name');
					}
					
				}elseif(I('title')){
					$pathValue = array('首页','全部结果',I('title'));
					$twoNameChecked = '全部';

				}else{
					$pathValue = array('首页','全部商品');
					$twoNameChecked = '全部商品';
				}

			//重置搜索条件$where
		    	//此部分代码不能放到分类信息查询的上面，因为上面的分类信息同样适用与以下$where条件
			    	if(I('g_all') && I('cid')){	    		
			    		//查找相应的父类cid
			    		$cid=$goodsClass->getFieldByCid(I('cid'),'paid');
			    		//查找该父类cid的所有子类
			    		$cid=$goodsClass->where('paid='.$cid)->getField('cid',true);
			    		// //重置$where
			    		$where['mcid']=array('in',$cid);
			    	}
			    	if( I('g_all') && I('gid')){
			    		//当前gid对应的cid
			    		$cid = $goods->getFieldByGid(I('gid'),'mcid');
			    		//查询父类
			    		$paid = $goodsClass->getFieldByCid($cid,'paid');
			    		//查找该父类cid的所有子类
			    		$cid=$goodsClass->where('paid='.$paid)->getField('cid',true);
			    		//重置$where
			    			//先干掉前面的gid保证都是cid --->$where['gid'] = I('gid');
			    			unset($where['gid']);
			    		$where['mcid']=array('in',$cid);

			    	}
			//把搜索条件$where中为空的变量干掉，否则字段为空也会作为检索条件影响检索
		    		foreach($where as $k=>$v){
		    			if($v==''){
		    				unset($where[$k]);
		    			}
		    		}
	    //设置分页	
    		//记录总数
    		$count = count($goods->where($where)->select());
    		//每页显示的记录条数
    		$num = I('get.num') ? I('get.num') : 16;
    		//创建分页对象
    		$page = new \Think\Page($count,$num);
            //显示分页
    		$show = $page->show();
    		//设置limit参数
    		$limit = $page->firstRow.','.$page->listRows;
    	//查询
            $infos = $goods->where($where)->order($order)->limit($limit)->select();
        //处理商品数据库信息
	    	for($i=0;$i<count($infos);$i++){
	    		//商品颜色提示信息转为数组
	    		$infos[$i]['colortit'] = json_decode($infos[$i]['colortit'],true);
	    		//商品主图转为数组
	    		$infos[$i]['s_img'] = json_decode($infos[$i]['s_img'],true);
	    	}
        //首页侧面栏目
	        //创建商品类表对象
	    	$goodsclass=M('goodsclass');
	        //查询商品类表中的父级类名和id
	    	$goodsfj=$goodsclass->where('paid=0')->field('cid,name')->limit(8)->select();
	        //创建商品表对象
	    	$goods=M('goods');
	        //遍历父级类
	    	foreach ($goodsfj as $k => $v) {
	            //取父级类的id
	    		$a=$v['cid'];
	            //取父类中子类的名称
	    		$goodszj=$goodsclass->where("paid=$a")->field('name,cid,image')->select();
	    		foreach ($goodszj as $key => $value) {
	    			$goodsfj[$k]['child'][$key]['title']=$value['name'];
	                $goodsfj[$k]['child'][$key]['cid']=$value['cid'];
	                $goodsfj[$k]['child'][$key]['pic']=$value['image'];
	    		}
	    		
	    	}

    	//分配变量
			//分类路径导航数组
	    	$this->assign('path',$path);
	    	$this->assign('pathValue',$pathValue);
	    	//路径导航数组元素个数
	    	$this->assign('length',count($pathValue));
	    	//所有相应的二级分类
	    	$this->assign('two',$two);
	    	//当前二级分类名称
	    	$this->assign('twoNameChecked',$twoNameChecked);
	    	//当前一级分类名称监测变量
	    	$this->assign('title_current_one',$title_current_one);
	    	$this->assign('title',I('title'));
	    	//当前商品信息
	    	$this->assign('infos',$infos);
	    	//控制前台特惠和库存样式的配置
	    	$this->assign('discount_checked',$_SESSION['discount_checked']);
	    	$this->assign('num_checked',$_SESSION['num_checked']);
	    	//联合搜索时的$where配置
		    	//特惠 库存 全部 公共需要的检索字段
		    	if(I('gid') || I('cid') || I('title')){
		    		$where['gid'] = I('gid');
		    		$where['cid'] = I('cid');
		    		$where['title'] = I('title');
		    	}
		    	//配置点击二级分类中的'全部'' 即g_all = all
		    	if(I('g_all')){	
		    		$where['g_all']='all';
		    	}
		    	//排序
		    	if(I('new') || I('up') || I('down')){
		    		$where['new'] = I('new');
		    		$where['up'] = I('up');
		    		$where['down'] = I('down');
		    	} 	
	    	$this->assign('where',$where);
	    	//List页收藏监测
	    	$this->assign('uid',$_SESSION['uid']);
	    	$this->assign('mssid',$_SESSION['ssid']);
	    	//模版排序样式控制
	    	$this->assign('recomend',$recomend);
	    	$this->assign('new',$new);
	    	$this->assign('up',$up);
	    	$this->assign('down',$down); 
	    	//显示分页
	    	$this->assign('page',$show);
	    	//侧边分类列表
    		$this->assign('class', $goodsfj);
	   	//解析模版
    	$this->display();
    }

    public function suofang(){
    	//缩放尺寸 430*430
    	$w = I('wsize');
    	$h = I('hsize');
    	//要缩放的图片路径
    	$sfimg = I('src');
    	$sfimg = ltrim($sfimg,'/xm');
    	//获取图片的大小
    	$size = getimagesize($sfimg); //0 为宽  1为高
    	//判断宽高并重新赋值
    	if($size[0] >= $size[1]){
    		$newsize[0] = $w;
    		$newsize[1] = $w*$size[1]/$size[0];
    	}else{
    		$newsize[1] = $h;
    		$newsize[0] = $h*$size[0]/$size[1];
    		
    	}
    	//返回
	    $this->ajaxReturn($newsize);
    }
}

?>