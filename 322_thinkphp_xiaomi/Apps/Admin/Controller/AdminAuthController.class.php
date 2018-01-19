<?php
namespace Admin\Controller;
use Think\Controller;
//------------------------------------------------------------//
// 管理员权限管理模块--超级管理员对管理员(员工)的权限管理
//-----------------------------------------------------------//
class AdminAuthController extends CommonController {
//显示列表页面
	//显示规则页面
	public function index_rule(){
		//实例化数据库对象
		$rules = M('Think_auth_rule');
		//接收每页显示条数参数
		$num = I('get.num') ? I('get.num') : 5;
		//搜索
		$keywords = I('get.keywords');
		if($keywords){
			$where = " title like '%$keywords%'";
		}else{
			$where = "";
		}
		//获取当前数据库数据总条数
		$count = $rules->where($where)->count();
		//创建分页对象
		$page = new \Think\Page($count,$num);
		//分页显示输出
		$show = $page->show();
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;//两个参数
		//查询读取当前页码下的数据
		$ruleInfo = $rules->limit($limit)->where($where)->select();
		//分配变量
		$this->assign("ruleInfo",$ruleInfo);
		$this->assign("page",$show);
		$this->assign("start",$page->firstRow+1);
		$this->assign("end",$page->firstRow + $page->listRows);
		$this->assign("count",$count);
		$this->assign("num",$num);
		$this->assign("keywords",I('get.keywords'));
		//解析模板
		$this->display();
	}

	//显示管理员组组页面
	public function index_group(){
		//实例化数据库对象
		$groups = M('Think_auth_group');
		//接收每页显示条数参数
		$num = I('get.num') ? I('get.num') : 5;
		//搜索
		$keywords = I('get.keywords');
		if($keywords){
			$where = " title like '%$keywords%'";
		}else{
			$where = "";
		}
		//获取当前数据库数据总条数
		$count = $groups->where($where)->count();
		//创建分页对象
		$page = new \Think\Page($count,$num);
		//分页显示输出
		$show = $page->show();
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;//两个参数
		//查询读取当前页码下的数据
		$groupInfo = $groups->limit($limit)->where($where)->select();
		//分配变量
		$this->assign("groupInfo",$groupInfo);
		$this->assign("page",$show);
		$this->assign("start",$page->firstRow+1);
		$this->assign("end",$page->firstRow + $page->listRows);
		$this->assign("count",$count);
		$this->assign("num",$num);
		$this->assign("keywords",I('get.keywords'));
		//解析模板
		$this->display();
	}

	//显示管理员属组明细页面
	public function index_group_access(){
		//实例化数据库对象
		$groupAccess = M('Think_auth_group_access');
		//接收每页显示条数参数
		$num = I('get.num') ? I('get.num') : 5;
		//搜索
    	$keywords = I('get.keywords');
    	if($keywords){
    		$where = " name like '%$keywords%'";
    		$wheres = " name like '%$keywords%' and";
    	}else{
    		$where = "";
    		$wheres = "";
    	}
		//获取当前数据库数据总条数
		$count = $groupAccess->where($where)->count();
		//创建分页对象
		$page = new \Think\Page($count,$num);
		//分页显示输出
		$show = $page->show();
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;//两个参数
		//查询读取当前页码下的数据
		$sql = "Select * from admin a,Think_auth_group_access g where $where a.id=g.uid limit $limit";
		$groupAccessInfo = $groupAccess -> query($sql);
		//分配变量
		$this->assign("groupAccessInfo",$groupAccessInfo);
		$this->assign("page",$show);
		$this->assign("start",$page->firstRow+1);
		$this->assign("end",$page->firstRow + $page->listRows);
		$this->assign("count",$count);
		$this->assign("num",$num);
		$this->assign("keywords",I('get.keywords'));
		//解析模板
		$this->display();
	}


//添加显示、方法
	//显示添加页面
	public function add(){
		//解析模板
		$this->display();
	}

	//规则添加方法
	public function insert_rule(){
		// 创建数据库对象
		$auth_rule = M('think_auth_rule');
		//写入数据库
		if($auth_rule->add($_POST)){
    		$this->success('添加成功',U('Admin/AdminAuth/index_rule'),1);
		}else{
    		$this->error('添加失败',U('Admin/AdminAuth/index_rule'),1);
    	}

	}

	//管理员组添加方法
	public function insert_group(){
		// 创建数据库对象
		$auth_group = M('think_auth_group');
		//写入数据库
		if($auth_group->add($_POST)){
    		$this->success('添加成功',U('Admin/AdminAuth/index_group'),1);
		}else{
    		$this->error('添加失败',U('Admin/AdminAuth/index_group'),1);
    	}
	}

	//管理员属组添加方法
	public function insert_group_access(){
		// 创建数据库对象
		$auth_group_access = M('think_auth_group_access');
		//写入数据库
		if($auth_group_access->add($_POST)){
    		$this->success('添加成功',U('Admin/AdminAuth/index_group_access'),1);
		}else{
    		$this->error('添加失败',U('Admin/AdminAuth/index_group_access'),1);
    	}
	}


//修改显示、方法
	//显示规则修改页面
	public function edit_rule(){
		//接收要规则的ID号
		$id = I('get.id');
		//实例化数据库对象
		$rules = M('Think_auth_rule');
		//执行查询操作
		$ruleInfo = $rules->find($id);
		//分配变量
		$this->assign("ruleInfo",$ruleInfo);
		//解析模板
		$this->display();
	}
	//执行规则修改方法
	public function update_rule(){
		//创建数据库对象
		$uprule = M("Think_auth_rule");
		//创建数据对象，执行数据修改操作
		$uprule->create();
		//判断结果
		if($uprule->save()){
			$this->success('数据修改成功…',U('Admin/AdminAuth/index_rule'),1);
		}else{
			$this->error('数据修改失败…',U('Admin/AdminAuth/index_rule'),1);
		}
	}

	//显示管理员组修改页面
	public function edit_group(){
		//接收要规则的ID号
		$id = I('get.id');
		//实例化数据库对象
		$groups = M('Think_auth_group');
		//执行查询操作
		$groupInfo = $groups->find($id);
		//分配变量
		$this->assign("groupInfo",$groupInfo);
		//解析模板
		$this->display();
	}
	//执行管理员组修改操作
	public function update_group(){
		//创建数据库对象
		$upgroup = M("Think_auth_group");
		//创建数据对象，执行数据修改操作
		$upgroup->create();
		$Info = $upgroup->save();
		//第二种方法
		// $arr = array(
		// 	'title'=>$_POST['title'],
		// 	'status'=>$_POST['status'],
		// 	'rules'=>$_POST['rules']
		// 	);
		// $Info = $upgroup->where("id=".$_POST['id'])->save($arr);
		//判断结果
		if($Info){
			$this->success('数据修改成功…',U('Admin/AdminAuth/index_group'),1);
		}else{
			$this->error('数据修改失败…',U('Admin/AdminAuth/index_group'),1);
		}
	}

	//显示管理员属组修改页面
	public function edit_group_access(){
		//接收要规则的ID号
		$id = I('get.id');
		//实例化数据库对象
		$gpss = M('Think_auth_group_access');
		//执行查询操作
		$sql = "Select * from admin a,Think_auth_group_access g where a.id=g.uid and uid=".$id;
		$gpssInfo = $gpss -> query($sql);
		//分配变量
		$this->assign("gpssInfo",$gpssInfo);
		//解析模板
		$this->display();
	}
	//执行管理员属组修改操作
	public function update_group_access(){
		//接收要修改的ID号
		$uid = $_POST['uid'];
		//创建数据库对象
		$upaccess = M("Think_auth_group_access");
		//创建数据对象，执行数据修改操作
		$Info = $upaccess -> where("uid=$uid") -> save($_POST);
		//判断结果
		if($Info){
			$this->success('数据修改成功…',U('Admin/AdminAuth/index_group_access'),1);
		}else{
			$this->error('数据修改失败…',U('Admin/AdminAuth/index_group_access'),1);
		}
	}


// 删除操作
	//删除规则操作
	public function delete_rule(){
		//接收要删除数据的ID号
		$id = I('get.id');
		//创建数据库对象
		$derule = M('Think_auth_rule');
		//执行删除操作
		$Info = $derule -> delete($id);
		//判断结果
		if($Info){
			$this->success('删除成功',U('Admin/AdminAuth/index_rule'),1);
		}else{
			$this->error('删除失败',U('Admin/AdminAuth/index_rule'),1);
		}
	}

	//删除组操作
	public function delete_group(){
		//接收要删除数据的ID号
		$id = I('get.id');
		//创建数据库对象
		$degroup = M('Think_auth_group');
		//执行删除操作
		$Info = $degroup -> delete($id);
		//判断结果
		if($Info){
			$this->success('删除成功',U('Admin/AdminAuth/index_group'),1);
		}else{
			$this->error('删除失败',U('Admin/AdminAuth/index_group'),1);
		}
	}

	//删除管理员组权限操作
	public function delete_group_access(){
		//接收要删除数据的ID号
		$uid = I('get.uid');
		//创建数据库对象
		$degroup_access = M('Think_auth_group_access');
		//执行删除操作
		$Info = $degroup_access -> where("uid=$uid") -> delete();
		//判断结果
		if($Info){
			$this->success('删除成功',U('Admin/AdminAuth/index_group_access'),1);
		}else{
			$this->error('删除失败',U('Admin/AdminAuth/index_group_access'),1);
		}
	}
}


?>