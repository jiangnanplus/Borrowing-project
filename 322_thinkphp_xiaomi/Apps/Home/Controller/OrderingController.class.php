<?php
namespace Home\Controller;
use Think\Controller;
// 前台下订单页面
class OrderingController extends Controller {
	// 订单页显示
    public function index(){
    	// 通过session查询购物车里商品的信息
    	$info = I('session.shopcart');
    	$get = I('get.');
        $uid = I('session.uid');
    	$address = M('address');
    	$addinfo = $address->order('aid desc')->where("uid = $uid")->select();

    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	// 分配变量
    	$this->assign('info',$info);
    	$this->assign('addinfo',$addinfo);
    	$this->assign('get',$get);
    	$this->assign('arr',$arr);
    	// 解析
        $this->display();
    }

    // 订单写入数据库
    public function insert(){
    	$_POST['onumber'] = '98'.time().rand(100,999);
    	$_POST['uid'] = I('session.uid');
    	$_POST['ginfo'] = json_encode(I('session.shopcart'));
    	$_POST['otime']	= time();
    	$onumber = $_POST['onumber'];
    	$order = M('ordering');
    	$res = $order->add($_POST);
    	if($res){
            session('shopcart',null);
    		$this->redirect("Home/Pay/index/onumber/$onumber");
    	}else{
    		$this->redirect('Home/Cart/index');
    	}
    }

    // 添加新地址ajax
    public function insertaj(){
    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	$address = M('address');
    	$_GET['uid'] = I('session.uid');
    	$res = $address->add($_GET);
    	if($res){
    		$id = mysql_insert_id();
    		$info = $address->find($id);
    		$info['provi'] = $arr[$info['province']];
    		$this->ajaxReturn($info);
    	}else{
    		echo 0;
    	}
    }

    // 修改地址ajax
    public function updateaj(){
    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	$address = M('address');
    	$res = $address->save($_GET);
    	$_GET['provi'] = $arr[$_GET['province']];
    	if($res){
    		$this->ajaxReturn($_GET);
    	}else{
    		echo 0;
    	}
    }

    // 点击编辑查询数据库中地址信息
    public function editaj(){
    	$aid = I('get.aid');
    	$address = M('address');
    	$ainfo = $address->find($aid);
    	$this->ajaxReturn($ainfo);
    }
}

?>