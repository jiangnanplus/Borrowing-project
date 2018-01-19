<?php
namespace Admin\Controller;
use Think\Controller;
/*
分类模块 商品分类的增删改查
*/
class GoodsclassController extends CommonController {
	//分类列表
    public function index(){
        //创建数据库对象
        $goodsclass = M('Goodsclass');
        //初始化变量
    	$where = '';
    	$order = '';
    	$limit = '';
    	//搜索设置
    	if(I('get.keywords')){
    		$where = "name like '%".I('get.keywords')."%'";
    	}else{
    		$where = '';
    	}
    	//设置分页
    		//记录总数
    		$count = $goodsclass->where($where)->count();
    		//每页显示的记录条数
    		$num = I('get.num') ? I('get.num') : 5;
    		//创建分页对象
    		$page = new \Think\Page($count,$num);
            //显示分页
    		$show = $page->show();
    		//设置limit参数
    		$limit = $page->firstRow.','.$page->listRows;
    	//查询
            $goodsclasses = $goodsclass->where($where)->order($order)->limit($limit)->select();
        //把父类由数字翻译为汉字
        foreach ($goodsclasses as $k => $v) {       	
        	if($goodsclasses[$k]['paid']==0){
        		$goodsclasses[$k]['paid'] = '顶级分类';
        	}else{
        		$parent = $goodsclass->where("cid=".$goodsclasses[$k]['paid'])->find();
        		$pathLength = count(explode(',',$goodsclasses[$k]['path']));
        		$goodsclasses[$k]['paid']= str_repeat('|----', $pathLength-1).$parent['name'];
        	}
        }
        //分配变量
        $this->assign('goodsclasses',$goodsclasses);
        $this->assign('keywords', I('get.keywords'));
        $this->assign('count', $count);
        $this->assign('page', $show);//输出页码
        $this->assign('num', $num);

        //显示{$start}到{$end}
        //特殊情况的判断[首页两种情况(记录不足,空表)  尾页页一种情况(记录不足))]
        if($num >= $count){//总记录不足一页的情况
        	$this->assign('start', $page->firstRow+1);
        	$this->assign('end', $count);
        }elseif($count==0){//表中无数据的情况
            $this->assign('start', 0);
            $this->assign('end', 0);
        }else{
        	$this->assign('start', $page->firstRow+1);
            if($page->firstRow+1 > floor($count/$num)*$num){//通过limit(m,n)的m即$page->firstRow锁定最后一页
                $this->assign('end', $page->firstRow + $count-floor($count/$num)*$num);
            }else{
                $this->assign('end', $page->firstRow + $page->listRows);
            }
        }
        //解析模板
        $this->display();
    }
    //添加分类
    public function add(){
        //创建数据库对象
        $goodsclass = M('Goodsclass');
        //查询
        $goodsclasses = $goodsclass->select();
        //分配变量
        $this->assign('goodsclasses',$goodsclasses);
        //解析模板
        $this->display();
    }
    //插入数据库 
    public function insert(){
        //创建数据库对象
        $goodsclass = M('Goodsclass');
        //拼接path字段
        if(I('post.paid') == 0){
            $_POST['path'] = 0;
        }else{
        	$parentInfo = $goodsclass->find(I('post.paid'));
        	$_POST['path'] = $parentInfo['path'].','.$parentInfo['cid'];
        }
        //执行添加
        if($goodsclass->add($_POST)){
        	$this->success('分类添加成功!',U('Admin/Goodsclass/index'),2);
        }else{
        	$this->error('分类添加失败!',U('Admin/Goodsclass/index'),2);
        }
    }
    //删除类
    public function delete(){
        //获取id
        $cid = I('get.cid');
        //创建数据库对象
    	$goodsclass = M('Goodsclass');
        //判断是否有子类   子类的paid 等于父类的cid
    	$child = $goodsclass->where("paid=".$cid)->select();
    	if($child){
    		$this->error('该类含有子类  请先删除子类', U('Admin/Goodsclass/index'), 2);
    	}
    	//判断删除结果
    	if($goodsclass->delete($cid)){
    		$this->success('删除成功', U('Admin/Goodsclass/index'),2);
    	}else{
    		$this->error('删除失败', U('Admin/Goodsclass/index'), 2);
    	}
    	
    }
    //编辑
    public function edit(){
        //获取id
        $cid = I('get.cid');
        //创建数据库对象
    	$goodsclass = M('Goodsclass');
        //查询所有分类
        $goodsclasses = $goodsclass->select();
        //查询当前分类的信息
    	$info = $goodsclass->find($cid);
        //分配变量
        $this->assign('goodsclasses',$goodsclasses);
    	$this->assign('info',$info);
        //解析模板
        $this->display();
    }
    //执行更新
    public function update(){
        //创建数据库对象
        $goodsclass = M('Goodsclass');
        //拼接path字段
        if(I('post.paid') == 0){
            $_POST['path'] = 0;
        }else{
            $parentInfo = $goodsclass->find(I('post.paid'));
            $_POST['path'] = $parentInfo['path'].','.$parentInfo['cid'];
        }
        //更新
        $goodsclass->create();
        if($goodsclass->save()){
            $this->success('更新成功',U('Admin/Goodsclass/index'),1);
        }else{
            $this->error('更新失败',U('Admin/Goodsclass/index'), 1);
        }
    }
}