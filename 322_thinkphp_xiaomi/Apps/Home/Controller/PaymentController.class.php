<?php
 /*
	 *这是前台支付成功控制器
	 */
namespace Home\Controller;
use Think\Controller;
class PaymentController extends Controller {
	//支付宝支付
	public $objectpay;  //类里全局对象
	public function _initialize(){
		//取出默认支付方式
		import("Home.Util.Alipay"); //动态引入支付类，具体是哪个类根据获取的$platform_en决定
		$this->objectpay = new \Alipay();  //动态实例化类
	}
	
    public function index(){
    	$user_id=session('uid');
		$onumber=session('onumber');
		//判断用是否登录
		if(empty($user_id)){
		    $this->redirect('Home/Login/index','',3, '未登录,正在跳转到登录页...');
			exit;
		}
		//判断是否找到订单id
		if(empty($onumber)){
		    $this->error("付款失败!");
		    exit;
		}
		
		//判断支付方式
		$paytype=$_POST['payOnlineBan'];
		if($paytype=='alipay'){//支付宝支付
		     $order_info=M('ordering')->where(array('onumber'=>$onumber))->select();
			//查询订单金额
			 $order_total_money=$order_info[0]['money'];
			 $this->objectpay->doalipay($onumber,"买家在下单哦",$order_total_money,"");
		}else{
			//进行付款
			//计算用户的余额是否够付款
			$order_info=M('ordering')->where(array('onumber'=>$onumber))->select();
			//查询订单金额
			$order_total_money=$order_info[0]['money'];
			//查询账户的余额
			$user_info=M('user')->where(array('id'=>$user_id))->select();  
			$user_money=$user_info[0]['money'];
			//判断余额是否够付款
			if($user_money<$order_total_money){   
				$this->error("付款失败,余额不足");
				exit;
				 
			}

			//进行付款处理
			$user=M('user');
			$user->startTrans();
			//计算付款完剩余的金额
			$new_user_money=$user_money-$order_total_money;
			//存入数据库
			$user_status=$user->where(array('id'=>$user_id))->save(array('money'=>$new_user_money));
			//修改订单的状态
			$order_status=M("ordering")->where(array('onumber'=>$onumber))->save(array('status'=>1));
			//判断两个是否都执行成功
			if($order_status&&$user_status){
				$user->commit();
				//删除session中保存的order_id信息
				session('onumber',null);

				//显示信息到前台去
				$this->order_no=$order_info[0]['onumber'];
				$this->order_total_money=$order_info[0]['money'];
				  

			}else{

				//执行失败就回滚
				$user->rollback();
				$this->error('付款失败');
				exit;

			}

      }


        $this->display();
    }
	
	 public function notifyurl(){
            $this->objectpay->notifyurl();
    }

    public function returnurl(){
            $this->objectpay->returnurl();
    }
   
    //成功返回的页面
    public function successinf(){
            $this->display();
    }
   //失败返回的页面
    public function errorinf(){
            $this->display();
    }

}
