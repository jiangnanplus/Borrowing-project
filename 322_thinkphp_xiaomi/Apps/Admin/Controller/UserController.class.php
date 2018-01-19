<?php
namespace Admin\Controller;
use Think\Controller;
//----------------------------------------//
// 用户管理模块--管理员对用户的增删改查
//----------------------------------------//
class UserController extends CommonController {
	//显示后台首页内容
    public function index(){
    	//创建数据库对象
    	$user = M('user');
    	$userdetail = M('userdetail');
    	//接收每页显示条数参数
    	$num = I('get.num') ? I('get.num') : 5;
    	//搜索
    	$keywords = I('get.keywords');
    	if($keywords){
    		$where = " where phone like '%$keywords%'";
    	}else{
    		$where = "";
    	}
    	//获取当前数据库数据总条数
    	$count = $user->where($where)->count();
    	//创建分页对象
    	$page = new \Think\Page($count,$num);
    	//分页显示输出
    	$show = $page->show();
    	//获取limit参数
    	$limit = $page->firstRow.','.$page->listRows;
    	//读取当前页码下的数据
    	// $users = $user->limit($limit)->select();
    	$sql = "select * from user u left join userdetail d on u.id=d.uid $where limit $limit";
    	$users = $user->query($sql);
    	
    	//分配变量
    	$this->assign('users',$users);
    	$this->assign('page',$show);
    	$this->assign('start',$page->firstRow+1);
    	$this->assign('end',$page->firstRow + $page->listRows);
    	$this->assign('count',$count);
    	$this->assign('num',$num);
    	$this->assign('keywords',I('get.keywords'));
        $this->display();
    }

    //显示用户的添加页面
    public function add(){
    	$this->display();
    }
    //将用户传递过来的数据存入数据库
    public function insert(){
    	//处理字段
    	//注册时间 rtime
    	$_POST['rtime'] = time();
    	//注册IP地址 rip
    	$_POST['rip'] = ip2long(get_client_ip());
        //加密密码
        $_POST['password']=md5($_POST['password']);
        //用户编号生成  ssid
        $_POST['ssid'] = time().rand(10,99);
    	//实例化数据库类，将数据存入数据库
    	$user = M('user');
    	//写入数据库
    	if($user->add($_POST)){
    		//获取刚插入插入成功的id号
	    	$uid = mysql_insert_id();
	    	$name = I('post.phone');
	    	$userdetail = M('userdetail');
	    	$sql = "insert into userdetail(uid,name) values ('$uid','$name')";
	    	$res = $userdetail->execute($sql);
    		$this->success('添加成功',U('Admin/User/index'),3);
    	}else{
    		$this->error('添加失败',U('Admin/User/index'),3);  	
    	}
    }

    //显示用户修改页面
    public function edit(){
    	//实例化类
    	$user = M('user');
    	//接收要修改数据的id号
    	$id = I('get.id');
        $sql = "select * from user u left join userdetail d on u.id=d.uid where u.id='$id'";
    	$userInfo = $user->query($sql);
    	//分配变量
    	$this->assign('userInfo',$userInfo[0]);

    	//解析模板
    	$this->display();
    }
    //执行数据修改
    public function update(){
    	//接收处理字段数据
    	$id = I('post.id');
    	$phone = I('post.phone');
    	$email = I('post.email');
    	$password = I('post.password');
    	$status = I('post.status');
    	$name = I('post.name');
    	$sex = I('post.sex');
    	//实例化数据库类,修改数据
    	$updateUser = M('user');
    	$sql = "Update user set phone='$phone',email='$email',password='$password',status='$status' where id='$id'";
    	$ures = $updateUser->execute($sql);
    	//修改userdetail数据表
    		$detail = M('userdetail');
	    	$sql = "Update userdetail set name='$name',sex='$sex' where uid='$id'";
	    	$dres = $detail->execute($sql);
    	if($ures || $dres){
	    	$this->success('修改成功',U('Admin/User/index'),3);
    	}else{
    		$this->error('修改失败',U('Admin/User/index'),3);
    	}
    }

    //删除
    public function delete(){
    	//接收要删除的id号
    	$id = I('get.id');
    	//实例化数据库类user
    	$user = M('user');
    	//执行删除操作
    	$res = $user->delete($id);
    	if($res){
    		//实例化数据库类userdetail
    		$userdetail = M('userdetail');
    		//执行删除操作
    		$userdetail->where("uid='$id'")->delete();
    		$this->success('删除成功',U('Admin/User/index'),3);
    	}else{
    		$this->error('删除失败',U('Admin/User/index'),3);
    	}
    }

}
	
?>
