<?php
namespace Home\Controller;
use Think\Controller;
/*
商品模块 商品的增删改查
*/
class DetailController extends Controller {
    public function index(){
    	//创建数据库对象
    	$goods = M('goods');
    	$goodsClass = M('goodsclass');
    	$ask = M('ask');
    	$order = M('ordering');
    	//设置分类路径导航
	    	if(I('gid')){
	    		$info = $goods->find(I('gid'));
	    		//查询商品类
		    	$cid = $info['mcid'];   	
		    	$classInfo = $goodsClass->find($cid);		    	
		    	//分类路径
	    		$path = explode(',',$classInfo['path']);
	    		//把当前元素的类压人path便于显示在类的导航路径的最后
	    		array_push($path,$cid);//不能放到count($path)>1判断的上面
	    		//翻译路径为汉字
				if(count($path)>1){
					for($i=0;$i<count($path);$i++){
						if($path[$i] == 0){
							$pathValue[$i]='首页';
						}else{
							$pathValue[$i]=$goodsClass->getFieldByCid($path[$i],'name');
						}
					}
				}
	    	}
	    //翻译商品数据库信息
	    	// var_dump($info['intro']);
	    	//商品颜色提示信息
	    	$colortit = json_decode($info['colortit'],true);
	    	//商品主图处理地址转为数组
	    	$s_img = json_decode($info['s_img'],true);
	    	//商品size转为数组
	    	$size = json_decode($info['size'],true);

	    	//翻译$size
	    	foreach($size as $k=>$v){
	    		if($k==0){
	    			$size[$k]='S';  
	    		}elseif($k==1){
	    			$size[$k]='M';
	    		}elseif($k==2){
	    			$size[$k]='L';
	    		}elseif($k==3){
	    			$size[$k]='XL';
	    		}elseif($k==4){
	    			$size[$k]='XXL';
	    		}	
	    	}

	    	//检索主图
	    	foreach($s_img as $k=>$v){
	    		$zhupic[]=$v[0];
	    	}
	    //最近浏览
	    	$lastgids=array_unique($_SESSION['gid']);
	    	krsort($lastgids);
	    	$gids=array_splice($lastgids,0,6);
	    	for($i=0;$i<count($gids);$i++){
	    		//查询
	    		$lastinfos[$i]=$goods->field('gid,s_img,colortit,title')->where('gid='.$gids[$i])->find();
	    		//解码
	    		$lastinfos[$i]['s_img']=json_decode($lastinfos[$i]['s_img']);
	    		$lastinfos[$i]['colortit']=json_decode($lastinfos[$i]['colortit']);
	    		//获取主图
	    		$lastinfos[$i]['s_img']=$lastinfos[$i]['s_img'][0][0];
	    		$lastinfos[$i]['colortit']=$lastinfos[$i]['colortit'][0];
	    	}

	    //最近购买动态(买过的人还购买了)
	    	$orderinfos = $order->order('oid desc')->limit(6)->getField('ginfo',true);
	    	//翻译
	    	foreach($orderinfos as $k=>$v){
	    		$a[]=json_decode($v,true);
	    		
	    	}
	    	//整合订单中的商品(每个订单取第一个商品)
	    	for($i=0;$i<count($a);$i++){
	    		$b[]=array_slice($a[$i],0,1);
	    	}
	    	//把订单由三维数组整合为二维数组
	    	for($i=0;$i<count($b);$i++){
	    		$neworderinfos[]=$b[$i][0];
	    	}

	    // 提问查询
	    	$askinfos = $ask->where('mgid='.I('gid'))->select();

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

			/*
			商品详情页--商品评价展示
			作者:陈培平
			*/

			//评价展示代码
			$goods_id=I('get.gid');
			//计算该商品的好评率
			$rate=M('goods')->where("gid=$goods_id")->field('com_num/comment as rate')->find();
			$rate=$rate['rate']*100;
			//计算评价表中各个级别的评价数量
			for($i=1;$i<=5;$i++){
				$arr[$i]=M('comment')->where("gid=$goods_id and com_star=$i")->count();
			}
			//查询评价的详细信息
			// $com_info=M('comment')->where("gid=$goods_id")->order('com_star desc')->limit(5)->select();
			// foreach ($com_info as $k => $v) {
			// 	$uid=$v['uid'];
			// 	$user_info=M('user')->where("id=$uid")->field('ssid,image')->find();
			// 	$com_info[$k]['ssid']=$user_info['ssid'];
			// 	$com_info[$k]['image']=$user_info['image'];
			// }
			// var_dump($com_info);
			// die;
    	//分配变量
			// 分类路径导航数组
	    	$this->assign('path',$path);
	    	$this->assign('pathValue',$pathValue);
	    	//路径导航数组元素个数
	    	$this->assign('pathlength',count($pathValue));
	    	//商品标题
	    	$this->assign('title',I('title'));
	    	//当前商品信息
			//dump($s_img[0][0]);die;
	    	$this->assign('info',$info);
	    	$this->assign('s_img',$s_img);
	    	$this->assign('zhupic',$zhupic);
	    	$this->assign('colortit',$colortit);
	    	$this->assign('size',$size);
	    	$this->assign('intro',$info['intro']);
	    	$this->assign('length',count($s_img));
	    	$this->assign('colorlength',count($colortit));
	    	//侧边分类列表
    		$this->assign('class', $goodsfj);
    		//评论分配变量
			$this->assign('rate',$rate);
			$this->assign('stat',$arr);
			$this->assign('mgid',I('gid'));
			//商品提问
			$this->assign('uid',$_SESSION['uid']);
			$this->assign('mssid',$_SESSION['ssid']);
			$this->assign('askinfos',$askinfos);
			$this->assign('askinfos',$askinfos);
			//最近浏览
			$this->assign('lastinfos',$lastinfos);
			//最近购买动态(买过的人还购买了)
			$this->assign('neworderinfos',$neworderinfos);
	   	//解析模版
    	$this->display();
    }

    public function service(){
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
    	$size = getimagesize($sfimg);
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

    //获取评价内容
    public function getComment(){
    	//获取数据  获取页码       
		$p = I('get.p') ? I('get.p') : 1;//当前的页数
		$num = I('get.num') ? I('get.num') : 5;//每页数据的数量
		$gid=I('get.gid');//获取商品id

		//获取总数
		$count=M('comment')->where("gid=$gid")->count();
		//获取页码
		$page = new \Think\Page($count,$num);
		//获取limit参数
    	$limit = $page->firstRow.','.$page->listRows;
    	//查询数据
		$cominfo = M('comment')->limit($limit)->where("gid=$gid")->order('com_star desc')->select();
		//把用户和头像添加到数组中
		foreach ($cominfo as $k => $v) {
			$uid=$v['uid'];
			$user_info=M('user')->where("id=$uid")->field('img,ssid')->find();
			$user_name=M('userdetail')->where("uid=$uid")->field('name')->find();
			if($user_name['name']){
				$cominfo[$k]['name']=$user_name['name'];
			}else{
				$cominfo[$k]['name']=$user_info['ssid'];
			}
			$cominfo[$k]['img']=$user_info['img'];
			$cominfo[$k]['comment_time']=date('Y-m-d H:i:s',$v['comment_time']);

		}
		$this->ajaxReturn($cominfo);
    }
}