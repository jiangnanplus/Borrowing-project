<?php
/*
 *这是后台的登录，退出控制器
*/
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //后台登录
    public function index(){
         $this->display();
    }
    //登录验证
    public function checkLogin(){
    	//创建对象
    	$admin=M('admin');
    	$data['username']=I('post.username','');
    	$data['password']=I('post.password','','md5');

    	$info=$admin->where($data)->select();
        //判断管理员是否被禁用
        if($info[0]['status']==0){
            $this->error('账户已经被锁了！若想登录请联系管理员');
            die;
        }
    	//判断用户名密码是否存在
    	if($info){
            session('aid',$info[0]['id']); //将管理用户ID存入session
    		session('user',I('post.username'));
    		$auth=$info[0]['auth'];
    		session('auth',$auth);
    		$this->redirect("Index/index");

    	}else{
    		$this->error("登录失败，没有此管理员",U('Admin/Login/index'),3);
    	}

    }
    //后台退出
    public function quit(){
    	//删除session
    	session('user',null);
    	session('auth',null);
    	$this->redirect("Login/index");

    }


}

?>