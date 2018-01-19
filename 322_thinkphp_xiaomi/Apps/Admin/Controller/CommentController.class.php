<?php
/*
 *这是后台的评价管理控制器
*/
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController {
	public function index(){
		//创建数据库对象
		$comment=M('comment');
		$goods=M('goods');
        $userdetail = M('userdetail');
    	$user = M('user');
    	
    	//接收每页显示条数参数
    	$num = I('get.num') ? I('get.num') : 5;
    	//搜索
    	//获取查询关键字
        if(I("get.keywords")){
            $where = "name like '%".I('get.keywords')."%'";
        }else{
            $where = '';
        }
        //根据用户输入的名字去用户详情表查找并找到对应的uid
        if(!empty($where)){
        	$uid=$userdetail->where($where)->field('uid')->find();
        	if($uid){
        		$where="uid=$uid";
        	}else{
        		$where="";
        	}
        }
    	//获取当前数据库中数据条数
    	$count = $comment->where($where)->count();
    	//创建分页对象
    	$page = new \Think\Page($count,$num);//接受两个参数  总数 每页显示的数量
        $show = $page->show();// 分页显示输出
        //获得limit参数
    	$limit = $page->firstRow.','.$page->listRows;
    	//读取当前页码下的数据
    	$commentinfo = $comment->limit($limit)->where($where)->select();

    	foreach ($commentinfo as $k => $v) {
    		$gid=$v['gid'];
    		$uuid=$v['uid'];
    		$title=$goods->where("gid=$gid")->field('title')->find();
            $name=$userdetail->where("uid=$uuid")->field('name')->find();
    		$phone=$user->where("id=$uuid")->field('phone')->find();
    		$commentinfo[$k]['title']=$title['title'];
            if($name['name']){
    		  $commentinfo[$k]['name']=$name['name'];
            }else{
                $commentinfo[$k]['name']=$phone['phone'];
            }
    	}
    	// var_dump($commentinfo);
    	// die;
    	//分配变量
    	$this->assign('commentinfo', $commentinfo);
        $this->assign('page', $show);
        $this->assign('start', $page->firstRow+1);//当前分页的limit的开始参数
        $this->assign('end', $page->firstRow + $page->listRows);
        $this->assign('count', $count);
        $this->assign('num', $num);
        $this->assign('keywords', I('get.keywords'));

        //解析模板
		$this->display();
	}
	//显示用户的修改页面
    public function edit(){
        //获取id参数
        $id = I('get.id');
        //查找
        $commentInfo = M('comment')->find($id);
    		$gid=$commentInfo['gid'];
    		$uid=$commentInfo['uid'];
    		$title=M('goods')->where("gid=$gid")->field('title')->find();
            $name=M('userdetail')->where("uid=$uid")->field('name')->find();
    		$phone=M('user')->where("id=$uid")->field('phone')->find();
    		$commentInfo['title']=$title['title'];
    		if($name['name']){
              $commentInfo['name']=$name['name'];
            }else{
                $commentInfo['name']=$phone['phone'];
            }
        // var_dump($commentInfo);
        // die;
        //分配变量
        $this->assign('commentInfo', $commentInfo);
        //解析模板
        $this->display();
    }

    //编辑修改
    public function update(){
    	$comment=M('comment');
    	//获取id参数
        $id = I('post.id');
        //接收回复内容
        $recontent=I('post.recontent');
        //回复时间
        $time=time();
        $arr = array(
    		'recontent'=>$recontent,
    		'recontent_time'=>$time,
    		'status'=>1
    		);
        // var_dump($arr);
        // die;
        $comments=$comment->where("id=$id")->save($arr);
        if($comments){
        	$this->success('更新成功',U('Admin/Comment/index'),2);
        }else{
        	$this->error('更新失败',U('Admin/Comment/index'),3);
        }

    }

    //删除
    public function delete(){
    	//获取id参数
        $id = I('get.id');
        $comment=M('comment');
        //查找这条数据
        $commentInfo = M('comment')->find($id);
        $gid=$commentInfo['gid'];
        $com_star=$commentInfo['com_star'];
        $goodsinfo=M('goods')->where("gid=$gid")->field('comment,com_num')->find();
        $arr=array();
        if($com_star==5){
        	$arr = array(
    		'comment'=>$goodsinfo['comment']-1,
    		'com_num'=>$goodsinfo['com_num']-1
    		);
        }else{
        	$arr = array(
    		'comment'=>$goodsinfo['comment']-1
    		);
        }
        $goods=M('goods')->where("gid=$gid")->save($arr);
        $comments=$comment->delete($id);
        if($goods && $comments){
            $this->success('删除成功', U('Admin/Comment/index'), 2);
        }else{
            $this->error('删除失败', U('Admin/Comment/index'), 3);
        }
    }



}




?>