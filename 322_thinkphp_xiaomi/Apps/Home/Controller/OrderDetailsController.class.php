<?php
namespace Home\Controller;
use Think\Controller;
// 前台下订单页面
class OrderDetailsController extends Controller {
	// 订单页显示
    public function index(){
    	//接收订单号
    	$onumbers = I('get.onumber');
    	//实例化数据库对象
    	$orders = M('ordering');
    	//执行查询
    	$orderdeInfo = $orders->where("onumber=$onumbers")->find();
    	$gInfo = json_decode($orderdeInfo['ginfo'],true);
    	//分配变量
    	$this->assign("orderdeInfo",$orderdeInfo);
    	$this->assign("gInfo",$gInfo);

    	//查询订单收货人信息
    	if($orderdeInfo){
    		//获取订单人ID号
    		$aid = $orderdeInfo['aid'];
    		//省份数组
    		$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    		//实例化数据库对象
    		$address = M("address");
    		//执行查询操作
    		$addressInfo = $address->find($aid);
    		//转化获取省份
    		$provinceIndex = $addressInfo['province'];
    		$provinces = $arr[$provinceIndex];
    		//分配变量
    		$this->assign("provinces",$provinces);
    		$this->assign("addressInfo",$addressInfo);
    	}
    	
    	//解析模板
    	$this->display();
    }
}

?>