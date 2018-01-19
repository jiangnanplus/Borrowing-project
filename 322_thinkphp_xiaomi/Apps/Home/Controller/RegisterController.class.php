<?php
namespace Home\Controller;
use Think\Controller;
// 前台用户注册模块
class RegisterController extends Controller {
	// 注册页面显示
    public function index(){
        $this->display();
    }


    // 处理用户信息插入数据库实现用户注册
    public function insert(){
    	$_POST['ssid'] = time().rand(10,99);
        $_POST['rtime'] = time();
    	$_POST['password'] = md5($_POST['password']);
    	$_POST['rip'] = ip2long($_SERVER["REMOTE_ADDR"]);

        $user = M('user');
        $user->create();
        if($user->add()){
        	$this->success('注册成功',u('Home/Login/index'),3);
        }else{
        	$this->error('注册失败,请重新注册',U('Home/Register/index'),3);
        }
    }


    // 注册页面ajax请求验证手机号码是否已经被注册
    public function phone(){
        // 创建数据库对象
        $user = M('user');
        $phone = I('get.phone');
        // 从数据库查找
        $info = $user->where("phone=$phone")->find();
        if($info){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 注册页面ajax验证验证码是否正确
    public function registercode(){
        if(check_verify(I('get.vcode'))){
            echo 1;
        }else{
            echo 0;
        }
    }
}

?>