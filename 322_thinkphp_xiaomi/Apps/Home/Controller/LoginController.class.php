<?php
namespace Home\Controller;
use Think\Controller;
// 登录控制器
class LoginController extends Controller {
    public function index(){
        // 将传值串行化
        $order = json_encode(I('get.'));
        // 如果存在order传值
        if(I('get.order')){
            // 将串行化的字符串传过去
            $this->assign('order',$order);
        }else{
            $this->assign('order',0);
        }
        // var_dump(I('get.order'));die;
        $this->display();
    }

    // 登录判断
    public function login(){
    	$u = I('post.username');
    	$p = md5(I('post.password'));
        $t = I('post.title');
        $order = I('post.order');
        $Product = I('post.Product');
        $Activity = I('post.Activity');
    	$Total = I('post.Total');
    	$_POST['ctime'] = time();
        // var_dump($_POST['order']);die;
    	$where = "$t = '$u' and password = '$p' ";
    	$user = M('user');
    	$res = $user->where($where)->find();
    	if($res){
    		session('uid',$res['id']);
    		session('ssid',$res['ssid']);
    		$res['ctime'] = time();
    		$user->save($res);
            if($order){
                $this->success('登录成功',U("Home/Ordering/index","order=$order&Product=$Product&Activity=$Activity&Total=$Total"),0);
            }else{
                $this->success('登录成功',U("Home/Index/index"),0);
            }
    	}else{
            if($order){
                $this->error('登录失败',U("Home/Login/index"),1);
            }
    		
    	}
    }

    // 登录退出
    public function logout(){
        session('uid',null);
        session('ssid',null);
        $this->redirect("Home/Index/index");
    }

    // 用户名ajax所用的方法
    public function aj(){
    	$user = M('user');

    	if(I('get.email')){
    		$get = I('get.email');
    		$where = " email = '$get'";
    	}
    	if(I('get.phone')){
    		$where = " phone = ".I('get.phone');
    	}
    	if(I('get.ssid')){
    		$where = " ssid = ".I('get.ssid');
    	}
    	$info = $user->where($where)->find();
    	echo json_encode($info);
    }

    // 验证码ajax所用的方法
    public function aja(){
    	if(check_verify(I('get.vcode'))){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
}

?>