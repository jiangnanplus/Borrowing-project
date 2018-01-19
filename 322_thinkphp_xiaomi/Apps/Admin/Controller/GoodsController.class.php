<?php
namespace Admin\Controller;
use Think\Controller;
/*
商品模块 商品的增删改查
*/
class GoodsController extends CommonController {
	public function index(){
		//实例化数据库对象
		$goods = M('goods');
		$goodsclass = M('goodsclass');
        //初始化变量
    	$where = '';
    	$order = '';
    	$limit = '';
    	//搜索设置
    	if(I('get.keywords')){
    		$where = "title like '%".I('get.keywords')."%'";
    	}else{
    		$where = '';
    	}
    	//设置分页
    		//记录总数
    		$count = $goods->where($where)->count();
    		//每页显示的记录条数
    		$num = I('get.num') ? I('get.num') : 5;
    		//创建分页对象
    		$page = new \Think\Page($count,$num);
            //显示分页
    		$show = $page->show();
    		//设置limit参数
    		$limit = $page->firstRow.','.$page->listRows;
    	//查询
            $infos = $goods->where($where)->order($order)->limit($limit)->select();
        //翻译分类
            $mcids = $goods->getField('mcid',true);
            for($i=0;$i<count($mcids);$i++){
            	$path[$i] = $goodsclass->getFieldByCid($mcids[$i],'path').','.$mcids[$i];
            	$path[$i] = explode(',',$path[$i]);
            	for($j=0;$j<count($path[$i]);$j++){
            		if($path[$i][$j]==0){
            			$path[$i][$j] = '|';
            		}else{
            			$path[$i][$j] = '--'.$goodsclass->getFieldByCid($path[$i][$j],'name');
            		}
            	}
            	$path[$i] = implode('',$path[$i]);
            }
        //翻译主图
	        for($i=0;$i<count($infos);$i++){
	        	$infos[$i]['s_img'] = json_decode($infos[$i]['s_img']);
	        }
        //翻译颜色
            for($i=0;$i<count($infos);$i++){
            	$infos[$i]['colortit'] = json_decode($infos[$i]['colortit']);
            	$infos[$i]['colortit'] = implode(' ',$infos[$i]['colortit']);	
            }
        //翻译尺寸
            for($i=0;$i<count($infos);$i++){
            	$infos[$i]['size'] = json_decode($infos[$i]['size']);
            	for($j=0;$j<count($infos[$i]['size']);$j++){
            		switch($infos[$i]['size'][$j]){
            			case 0:
            				$infos[$i]['size'][$j] = 'S';
            				break;
            			case 1:
            				$infos[$i]['size'][$j] = 'M';
            				break;
            			case 2:
            				$infos[$i]['size'][$j] = 'L';
            				break;
            			case 3:
            				$infos[$i]['size'][$j] = 'XL';
            				break;
            			case 4:
            				$infos[$i]['size'][$j] = 'XXL';
            				break;
            		}            		
            	}
            	$infos[$i]['size'] = implode(' ',$infos[$i]['size']);	
            }

        //分配变量
            // 商品信息
	        $this->assign('infos',$infos);
	        //商品主图
	        $this->assign('s_imgs',$s_imgs);
	        $this->assign('zhupics',$zhupics);
	        // 商品分类
	        $this->assign('path',$path);
	        //商品颜色
	        $this->assign('colortit',$colortit);
	        //商品尺寸
	        $this->assign('size',$size);
	        $this->assign('keywords', I('get.keywords'));
	        $this->assign('count', $count);
	        $this->assign('page', $show);//输出页码
	        $this->assign('num', $num);

        //显示{$start}到{$end}
        //特殊情况的判断[首页两种情况(记录不足,空表)  尾页页一种情况(记录不足))]
        if($num >= $count){//总记录不足一页的情况
        	$this->assign('start', $page->firstRow+1);
        	$this->assign('end', $count);
        }elseif($count==0){//表中无数据的情况
            $this->assign('start', 0);
            $this->assign('end', 0);
        }else{
        	$this->assign('start', $page->firstRow+1);
            if($page->firstRow+1 > floor($count/$num)*$num){//通过limit(m,n)的m即$page->firstRow锁定最后一页
                $this->assign('end', $page->firstRow + $count-floor($count/$num)*$num);
            }else{
                $this->assign('end', $page->firstRow + $page->listRows);
            }
        }
        //解析模板
        $this->display();

	}
	public function add(){
		//实例化数据库对象
		$goodsclass = M('goodsclass');
		//查询所有顶级分类
		$one = $goodsclass->where('paid=0')->select();
		//遍历查询所有子类
		foreach($one as $k=>$v){
			$childCid = $goodsclass->where('paid='.$v['cid'])->getField('cid',true);
			$childName = $goodsclass->where('paid='.$v['cid'])->getField('name',true);
			//把所有类合并为一个二维数组
			$classes[$v['name']] = array_combine($childCid, $childName);
		}
		//分配变量
		$this->assign('classes',$classes);
		$this->display();
	}

	public function insert(){
		$image = new \Think\Image(); 
		$upload = new \Think\Upload();// 实例化上传类    
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小    
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
	    $upload->rootPath  =      './public/';  
	    $upload->savePath  =      'Upload/'; // 设置附件上传目录 
	    $upload->subName = 'Goods';   
	    // 上传文件    
	    $info   =   $upload->upload(); 
    	if(!$info) {// 上传错误提示错误信息        
	    	$this->error($upload->getError());
        }
        if($info){// 上传成功
		    foreach($info as $k=>$file){
		    	//检索主图与详情图的标记(通过表单中给的name判断)
		    	$kk = substr($k,0,3);
		    	if($kk!=='big'){//拼接不同颜色的主图数组
    			//缩放处理
			    	//要缩放的图片路径
			    	$sfimg = $upload->rootPath.$upload->savePath.$upload->subName.'/'.$file['savename'];
					$image->open($sfimg);
					$image->thumb(430, 430)->save($upload->rootPath.$upload->savePath.$upload->subName.'/s_img'.$file['savename']);
					unlink($sfimg);
					//检索颜色标记(在js中已经加入标记)
		    		$key = substr($file['key'],9,1);
		    		//按照标记将图片路径存入数组
	    			$s_img[$key][] = 's_img'.$file['savename'];
		    	}else{//拼接商品详情数组
		    	//缩放处理
			    	//要缩放的图片路径
			    	$introimg = $upload->rootPath.$upload->savePath.$upload->subName.'/'.$file['savename'];
					$image->open($introimg);
					$image->thumb(1240, 700)->save($upload->rootPath.$upload->savePath.$upload->subName.'/intro'.$file['savename']);
					unlink($introimg);
		    		//检索商品详情中图片与文字出现的次序的标记(在js中已经加入标记)
		    		$sign = substr($file['key'],-1,1);
		    		//按照标记将图片路径存入数组
		    		$intro[$sign] = 'intro'.$file['savename'];
		    	}	   		
	    	}
	    	//按照标记将详情文字信息存入数组
	    	foreach(I('introtext') as $k=>$v){
	    		if($v=='请在此输入文字'){
	    			$v = '';
	    		}
	    		$intro[$k] = $v;
	    	}
	    }
    	//实例化数据库对象
		$goods = M('goods');
		//接收参数
		if(I('discount')==11){
			$discount=10;
		}else{
			$discount=I('discount');
		}
		//替换颜色默认输入
		foreach(I('colortit') as $k=>$v){
			if($v=='请输入颜色'){
				$v = '';
			}
			$colortit[$k] = $v;
		}
		$arr = array(
			'title'=>I('title'),
			'mcid'=>I('mcid'),
			'price'=>I('price'),
			'discount'=>$discount,
			'nowprice'=>I('nowprice'),
			'colortit'=>json_encode($colortit),
			'size'=>json_encode(I('size')),
			'num'=>I('num'),
			's_img'=>json_encode($s_img),
			'intro'=>json_encode($intro)
		);
		//将商品信息插入数据库
		if($goods->add($arr)){
        	$this->success('商品添加成功!',U('Admin/Goods/index'),5);
        }else{
        	$this->error('商品添加失败!',U('Admin/Goods/index'),5);
        }
    }

    public function edit(){
    	//实例化数据库对象
		$goods = M('goods');
		$goodsclass = M('goodsclass');
		//查询所有顶级分类
		$one = $goodsclass->where('paid=0')->select();
		//遍历查询所有子类
		foreach($one as $k=>$v){
			$childCid = $goodsclass->where('paid='.$v['cid'])->getField('cid',true);
			$childName = $goodsclass->where('paid='.$v['cid'])->getField('name',true);
			//把所有类合并为一个二维数组
			$classes[$v['name']] = array_combine($childCid, $childName);
		}
		// var_dump($classes);
		//查询当前商品
		$info = $goods->where('gid='.I('gid'))->find();
		// var_dump($info);

    	
	    //翻译商品数据库信息
	    	// var_dump($info['intro']);
	    	//商品颜色提示信息
	    	$colortit = json_decode($info['colortit'],true);
	    	//商品主图处理地址转为数组
	    	$s_img = json_decode($info['s_img'],true);
	    	//商品size转为数组
	    	$size = json_decode($info['size'],true);
	    	//检索主图--用于给页面传递标记变量$zhupicLength
	    	foreach($s_img as $k=>$v){
	    		$zhupic[]=$v[0];
	    	}

    	//分配变量
	    	$this->assign('classes',$classes);
			$this->assign('info',$info);
			$this->assign('zhupicLength',count($zhupic));
	    	//当前商品信息
	    	$this->assign('gid',I('gid'));
	    	$this->assign('size',$size);
	    	$this->assign('s_img',$s_img);
	    	$this->assign('zhupic',$zhupic);
	    	$this->assign('colortit',$colortit);
	    	$this->assign('intro',$info['intro']);
	    	$this->assign('length',count($s_img));

	   	//解析模版
    	$this->display();

    }

    public function save(){
    	//设置更新检测变量
    	$zhupic_exists = false;
    	$intro_exists = false;
    	//实例化类 
		$image = new \Think\Image(); 
		$upload = new \Think\Upload();// 实例化上传类    
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小    
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型 
	    $upload->rootPath  =      './public/';  
	    $upload->savePath  =      'Upload/'; // 设置附件上传目录 
	    $upload->subName = 'Goods';   
	    // 上传文件    
	    $info   =   $upload->upload(); 
    	// if(!$info) {// 上传错误提示错误信息        
	    // 	$this->error($upload->getError());
     	// }
        if($info){// 上传成功
		    foreach($info as $k=>$file){
		    	//检索主图与详情图的标记(通过表单中给的name判断)
		    	$kk = substr($k,0,3);
		    	if($kk!=='big'){//拼接不同颜色的主图数组
		    		$zhupic_exists = true;
    			//缩放处理
			    	//要缩放的图片路径
			    	$sfimg = $upload->rootPath.$upload->savePath.$upload->subName.'/'.$file['savename'];
					$image->open($sfimg);
					$image->thumb(430, 430)->save($upload->rootPath.$upload->savePath.$upload->subName.'/s_img'.$file['savename']);
					unlink($sfimg);
					//检索颜色标记(在js中已经加入标记)
		    		$key = substr($file['key'],9,1);
		    		//按照标记将图片路径存入数组
	    			$s_img[$key][] = 's_img'.$file['savename'];
		    	}else{//拼接商品详情数组
		    		$intro_exists = true;
		    	//缩放处理
			    	//要缩放的图片路径
			    	$introimg = $upload->rootPath.$upload->savePath.$upload->subName.'/'.$file['savename'];
					$image->open($introimg);
					$image->thumb(1240, 700)->save($upload->rootPath.$upload->savePath.$upload->subName.'/intro'.$file['savename']);
					unlink($introimg);
		    		//检索商品详情中图片与文字出现的次序的标记(在js中已经加入标记)
		    		$sign = substr($file['key'],-1,1);
		    		//按照标记将图片路径存入数组
		    		$intro[$sign] = 'intro'.$file['savename'];
		    	}	   		
	    	}
	    	//按照标记将详情文字信息存入数组
	    	foreach(I('introtext') as $k=>$v){
	    		if($v=='请在此输入文字'){
	    			$v = '';
	    		}
	    		$intro[$k] = $v;
	    	}
	    }
    	//实例化数据库对象
		$goods = M('goods');
		//接收参数
		if(I('discount')==11){
			$discount=10;
		}else{
			$discount=I('discount');
		}
		//替换颜色默认输入
		foreach(I('colortit') as $k=>$v){
			if($v=='请输入颜色'){
				$v = '';
			}
			$colortit[$k] = $v;
		}

		//更新判断
		if(!$zhupic_exists && !$intro_exists){
			$arr = array(
				'title'=>I('title'),
				'mcid'=>I('mcid'),
				'price'=>I('price'),
				'discount'=>$discount,
				'nowprice'=>I('nowprice'),
				'colortit'=>json_encode(I('colortit')),
				'size'=>json_encode(I('size')),
				'num'=>I('num')
			);
		}elseif($zhupic_exists && !$intro_exists){
			$arr = array(
				'title'=>I('title'),
				'mcid'=>I('mcid'),
				'price'=>I('price'),
				'discount'=>$discount,
				'nowprice'=>I('nowprice'),
				'colortit'=>json_encode($colortit),
				'size'=>json_encode(I('size')),
				'num'=>I('num'),
				's_img'=>json_encode($s_img)
			);
		}elseif($intro_exists && !$zhupic_exists){
			$arr = array(
				'title'=>I('title'),
				'mcid'=>I('mcid'),
				'price'=>I('price'),
				'discount'=>$discount,
				'nowprice'=>I('nowprice'),
				'colortit'=>json_encode(I('colortit')),
				'size'=>json_encode(I('size')),
				'num'=>I('num'),
				'intro'=>json_encode($intro)
			);
		}else{
			$arr = array(
				'title'=>I('title'),
				'mcid'=>I('mcid'),
				'price'=>I('price'),
				'discount'=>$discount,
				'nowprice'=>I('nowprice'),
				'colortit'=>json_encode(I('colortit')),
				'size'=>json_encode(I('size')),
				'num'=>I('num'),
				's_img'=>json_encode($s_img),
				'intro'=>json_encode($intro)
			);
		}
		//将商品信息插入数据库
		if($goods->where("gid=".I('gid'))->save($arr)){
        	$this->success('更新成功!',U('Admin/Goods/index'),5);
        }else{
        	$this->error('更新失败!',U('Admin/Goods/index'),5);
        }
    }

    public function delete(){
    	//获取id
        $gid = I('gid');
        //创建数据库对象
    	$goods = M('goods');
    	//判断删除结果
    	if($goods->delete($gid)){
    		$this->success('删除成功', U('Admin/Goods/index'),2);
    	}else{
    		$this->error('删除失败', U('Admin/Goods/index'), 2);
    	}
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
}

?>