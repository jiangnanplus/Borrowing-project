<?php
namespace Home\Controller;
use Think\Controller;
/*
商品模块 商品的增删改查
*/
class LikeController extends Controller {
	public function insert(){
		$like = M('like');
		$arr = array(
			'uid'=>I('uid'),
			'mgid'=>I('mgid'),
			'mssid'=>I('mssid'),
			'title'=>I('title'),
			'zhupic'=>I('zhupic'),
			'colortit'=>I('colortit'),
			'price'=>I('price'),
			'nowprice'=>I('nowprice'),
			'comment'=>I('comment'),
			'time'=>time()		
		);
		$like->add($arr);
	}

	public function check(){
		$like = M('like');
		$where['uid']=I('uid');
		$where['mgid']=I('mgid');
		$info = $like->where($where)->find();
		if($info){
			$this->ajaxReturn(1);
		}else{
			$this->ajaxReturn(0);
		}
	}

	public function delete(){
		//获取id
        $kid = I('kid');
        //创建数据库对象
    	$like = M('like');
    	//判断删除结果
    	$like->delete($kid);
    	// if($like->delete($kid)){
    	// 	$this->success('删除成功', U('Admin/Goods/index'),2);
    	// }else{
    	// 	$this->error('删除失败', U('Admin/Goods/index'), 2);
    	// }
	}

}

?>