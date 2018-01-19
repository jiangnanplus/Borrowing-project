<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
	//小米后台首页显示
    public function index(){
    	if(session('?user')){
	    	$this->assign('auth',session('auth'));
	        $this->display();
    	}else{
    		$this->error("您还没有登录，请登录",U('Admin/Login/index'),3);
    		$this->redirect("Login/index");
    	}
    }
}