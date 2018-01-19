<?php
 /*
	 *这是前台订单付款控制器
	 */
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
    public function index(){
    	//获取订单号
    	$onumber=I("get.onumber");
    	//获取用户id
    	$uid=I("session.uid");
    	//判断用户是否登录
    	if(empty($uid)){
		      $this->redirect('Login/index');
			  exit;
		  }
		//判断订单号有没有传递过来
		if(empty($onumber)){
		      
			 $this->redirect('Index/index','',4, '未找到订单!页面跳转中...'); 
			  exit;
		}
		//去数据库查询订单的信息，判断是否存在
		$order_info=M('ordering')->where(array('onumber'=>$onumber,'uid'=>$uid))->select();
		if(empty($order_info)){
		      $this->error("订单未找到");
			  exit;
		}
		//找到订单进行处理
		$address_id=$order_info[0]['aid'];
		//查询地址详情
		$address_info=M("address")->where("aid=$address_id")->find();
		//取余额
		$money=M("User")->where(array('id'=>$uid))->field('money')->select();
		//保存订单id到session中
		session('onumber',$onumber);
		$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");

		$this->order_info=$order_info[0];
		$this->address_info=$address_info;
		$this->money=$money[0]['money'];
		$this->assign('arr',$arr);




        $this->display();
    }
}

?>