<?php
namespace Home\Controller;
use Think\Controller;
//-------------------------------//
// 这是前台用户修改密码控制器
//-------------------------------//

class AlterPasswordController extends Controller {
	// 显示前台用户修改密码页面
    public function index(){
        //解析模板
        $this->display();
    }

    //查询验证原始密码
    public function passquery(){
        //获取登录用户ID号
        $id = I('session.uid');
        //接收处理传值
        $pass = md5($_GET['password']);
        //实例化数据库对象
        $userpass = M("user");
        //查询用户密码
        $passInfo = $userpass -> find($id);
        //判断返回结果
        if($passInfo['password'] == $pass){
            echo "ok";
        }else{
            echo "no";
        }
    }

    //修改密码
    public function passUpdate(){
        //获取登录用户ID号
        $id = I('session.uid');
        //接收处理传值
        $_GET['id'] = $id;
        $pass = md5($_GET['password']);
        //实例化数据库对象
        $userpass = M("user");
        //执行修改操作
        $arr = array('password'=>"$pass");
        $upInfo = $userpass->where("id=$id")->save($arr);
        //判断返回结果
        if($upInfo){
            echo "ok";
        }else{
            echo "no";
        }

    }



}



?>