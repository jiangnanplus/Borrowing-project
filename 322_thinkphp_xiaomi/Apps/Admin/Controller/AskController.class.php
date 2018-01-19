<?php
namespace Admin\Controller;
use Think\Controller;
/*
商品提问模块 提问的增删查
*/
class AskController extends CommonController {
	public function index(){
		//实例化数据库对象
		$ask = M('ask');
		//初始化变量
    	$where = '';
    	$order = '';
    	$limit = '';
    	//搜索设置
    	if(I('get.keywords')){
    		$where = "title like '%".I('get.keywords')."%'";
    	}else{
    		$where = '';
    	}
    	//设置分页
    		//记录总数
    		$count = $ask->where($where)->count();
    		//每页显示的记录条数
    		$num = I('get.num') ? I('get.num') : 5;
    		//创建分页对象
    		$page = new \Think\Page($count,$num);
            //显示分页
    		$show = $page->show();
    		//设置limit参数
    		$limit = $page->firstRow.','.$page->listRows;
    	//查询
            $infos = $ask->where($where)->order($order)->limit($limit)->select();
			
		//分配变量
		$this->assign('infos',$infos);
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

	public function insert(){
		//实例化数据库对象
		$ask = M('ask');
		//参数
		$arr = array(
			'mgid'=>I('mgid'),
			'uid'=>I('uid'),
			'title'=>I('title'),
			'zhupic'=>I('zhupic'),
			'mssid'=>I('mssid'),
			'atime'=>time(),
			'a_content'=>I('a_content'),
		);
		$ask->add($arr);
	}

	public function deal(){
    	//获取id
        $askid = I('askid');
        //创建数据库对象
    	$ask = M('ask');
    	//查询
    	$info = $ask->where('askid='.I('askid'))->find();
    	//分配变量
    	$this->assign('info',$info);
    	//解析模板
        $this->display();
    	
    }

    public function save(){
		//实例化数据库对象
		$ask = M('ask');
		//参数
		$arr = array(
			'isok'=>1,
			'rtime'=>time(),
			'r_content'=>I('r_content'),
		);
		//将商品信息插入数据库
		if($ask->where('askid='.I('askid'))->save($arr)){
        	$this->success('审核成功!',U('Admin/Ask/index'),3);
        }else{
        	$this->error('审核失败!',U('Admin/Ask/index'),3);
        }
	}

	public function delete(){
    	//获取id
        $askid = I('askid');
        //创建数据库对象
    	$ask = M('ask');
    	//判断删除结果
    	if($ask->delete($askid)){
    		$this->success('删除成功', U('Admin/ask/index'),2);
    	}else{
    		$this->error('删除失败', U('Admin/ask/index'), 2);
    	}
    }
}

?>