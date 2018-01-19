<?php
namespace Admin\Controller;
use Think\Controller;
// 管理员权限管理模块--超级管理员对管理员(员工)的权限管理

class CommonController extends Controller {
	//默认执行的方法
	public function _initialize(){
		// 验证登陆
		if(!session('aid')){
			$this->error('您还没有登录，请先登录…',U('Admin/Login/index'),3);
		}
		//验证权限
		$AUTH = new \Think\Auth();
		// //类库位置应该位于ThinkPHP\Library\Think\
		// //MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME  ==>  Admin/Index/index
		if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('aid'))){
	        $this->error('没有权限');
		}
	}

}

?>