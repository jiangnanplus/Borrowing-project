<?php
namespace Admin\Controller;
use Think\Controller;
// 后台订单模块 用于对订单的信息显示
class OrderController extends CommonController {
	// 显示订单列表
    public function index(){
        $arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	// 创建订单表对象
    	$order = M('ordering');
    	// 每页条数
    	$num = I('get.num') ? I('get.num') : 10;
    	// 查询关键字
    	if(I('get.keywords')){
    		$where = " onumber like '%".I('get.keywords')."%'";
            $wheres = "where  onumber like '%".I('get.keywords')."%'";
    	}else{
    		$where = '';
            $wheres = '';
    	}
    	// 总条数,
    	$count = $order->where($where)->count();
    	// 创建分页对象
    	$page = new \Think\Page($count,$num);
    	// 分页显示输出
    	$show = $page->show();
    	// limit参数
    	$limit = $page->firstRow.','.$page->listRows;
    	// 当页查询数据
    	$admins = $order->limit($limit)->where($where)->select();

    	// 查订单信息
        $sql ="select o.oid,o.onumber,o.money,o.status,o.otime,a.consignee,a.telephone,a.province,a.site from ordering o left join address a on o.aid = a.aid $wheres limit $limit ";
    	$info = $order->query($sql);
    	// 分配变量
        $this->assign('info',$info);
    	$this->assign('arr',$arr);
    	$this->assign('num',$num);
    	$this->assign('show',$show);
    	$this->assign('count',$count);
    	$this->assign('keywords',I('get.keywords'));
    	$this->assign('start',$page->firstRow+1);
    	$this->assign('end',$page->firstRow+$page->listRows);
    	// 解析模板
    	$this->display();
    }

    // 显示订单详情
    public function edit(){
        $arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	// 创建订单表对象
    	$order = M('ordering');
        $id = I('get.id');
        $sql = "select oid,otime,money,onumber,ginfo,o.status,paymethod,postmethod,posttime,invoice,invoicetype,invoicetitle,consignee,telephone,province,site,zipcode,tag from ordering o,address a where o.aid = a.aid and oid = $id";
    	// $info = $order->find(I('get.id'));
        $info = $order->query($sql);
        $ginfo = json_decode($info[0]['ginfo'],true);
        $this->assign('info',$info[0]);
        $this->assign('arr',$arr);
    	$this->assign('ginfo',$ginfo);
    	$this->display();
    }

    // 订单详情里点击发货后的ajax
    public function post(){
    	// 创建数据库对象
    	$order = M('ordering');
    	$res = $order->save(I('get.'));
    	if($res){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
}