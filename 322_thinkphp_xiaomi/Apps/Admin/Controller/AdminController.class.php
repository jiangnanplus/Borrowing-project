<?php
namespace Admin\Controller;
use Think\Controller;
// 管理员模块 超级管理员对管理员(员工)的增删改查
class AdminController extends CommonController {
	// 管理员显示页面
    public function index(){
    	// 创建数据库字段
    	$admin = M('admin');
    	// 每页条数
    	$num = I('get.num') ? I('get.num') : 10;
    	// 查询关键字
    	if(I('get.keywords')){
    		$where = "auth = 1 and username like '%".I('get.keywords')."%'";
    	}else{
    		$where = 'auth = 1';
    	}
    	// 总条数,
    	$count = $admin->where($where)->count();
    	// 创建分页对象
    	$page = new \Think\Page($count,$num);
    	// 分页显示输出
    	$show = $page->show();
    	// limit参数
    	$limit = $page->firstRow.','.$page->listRows;
    	// 当页查询数据
    	$admins = $admin->limit($limit)->where($where)->select();
    	// 分配变量
    	$this->assign('admins',$admins);
    	$this->assign('num',$num);
    	$this->assign('show',$show);
    	$this->assign('count',$count);
    	$this->assign('keywords',I('get.keywords'));
    	$this->assign('start',$page->firstRow+1);
    	$this->assign('end',$page->firstRow+$page->listRows);
    	// 解析模板
        $this->display();
    }

    // 管理员的添加页面
    public function add(){
    	// 解析模板
    	$this->display();
    }

    // 将添加的数据插入数据库
    public function insert(){
    	// 处理时间字段
    	$_POST['rtime'] = time();
    	// 处理员工编号字段
    	$mid = time().rand(0,9);
    	$_POST['mid'] = $mid;
    	// 加密密码字段
    	$_POST['password'] = md5($_POST['password']);
    	// 创建数据库对象
    	$admin = M('admin');
    	// 写入数据
    	if($admin->add($_POST)){
    		$this->success('添加成功',U('Admin/Admin/index'),5);
    	}else{
    		$this->error('添加失败',U('Admin/Admin/index'),5);
    	}
    }

    // 在页面上显示要修改管理员的信息
    public function edit(){
    	// 接值要修改的管理员的ID
    	$id = I('get.id');
    	// 创建数据库对象
    	$admin = M('admin');
    	// 查询信息
    	$info = $admin->find($id);
    	// 分配变量
    	$this->assign('info',$info);
    	// 解析模板
    	$this->display();
    }

    // 将更改的信息更新到数据库
    public function update(){
        // 创建数据库对象
        $admin = M('admin');
        // 判断更新结果
        $admin->create();
        if($admin->save()){
            $this->success('更新成功',U('Admin/Admin/index'),3);
        }else{
            $this->error('更新失败',U('Admin/Admin/index'),3);
        }
    }

    // 删除功能
    public function delete(){
        // 创建数据库对象
        $admin = M('admin');
        // 执行删除
        if($admin->delete(I('get.id'))){
            $this->success('删除成功',U('Admin/Admin/index'),3);
        }else{
            $this->error('删除失败',U('Admin/Admin/index'),3);
        }
    }

}

?>