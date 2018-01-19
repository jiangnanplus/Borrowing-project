<?php
namespace Home\Controller;
use Think\Controller;
//-------------------------------//
// 这是前台的个人中心控制器
//-------------------------------//

class UserCenterController extends Controller {
	// 显示前台个人中心页面
    public function index(){
    	//获取登录用户ID号
    	$uid = I('session.uid');
    // 我的个人中心
    	//查询个人信息
    	//实例化数据库对象
    	$users = M('user');
    	//准备sql语句
    	$sql = "Select * from user u left join userdetail d on u.id=d.uid where u.id=".$uid;
    	//执行数据查询操作
    	$userInfo = $users->query($sql);
        // var_dump($userInfo);

    	//分配变量
        $this->assign("uid",$uid);
    	$this->assign("userInfo",$userInfo);

    //商品评价（用户订单查询）
        //实例化数据库对象
        $orderings = M('ordering');
        //执行查询操作
        $orderInfo = $orderings->where("uid=$uid and status=3")->order('oid desc')->select();
        foreach($orderInfo as $k=>$v){
            $info[$k] = $v;
            $info[$k]['ginfo'] = json_decode($v['ginfo'],true);
        }

        //接收页首“我的订单”按钮传值
        $dingdanli = $_GET['dingdanli'];
        //分配变量
        $this -> assign("dingdanli",$dingdanli);

        //接收"商品评价"传值
        $goodspjli = $_GET['goodspjli'];
        //分配变量
        $this -> assign("goodspjli",$goodspjli);

        //接收页首“我的收藏”按钮传值
        $shoucangli = $_GET['shoucangli'];
        //分配变量
        $this -> assign("shoucangli",$shoucangli);

        //查询订单人姓名
        $address = M('address');
        $orderNameInfo = $orderings->where("uid=$uid")->order('oid desc')->select();
         foreach($orderNameInfo as $k=>$v){
            $nameinfo[$k] = $v;
            $nameinfo[$k]['ginfo'] = json_decode($v['ginfo'],true);
            $name = $address->find($v['aid']);
            $nameinfo[$k][name] = $name['consignee'];
         }
        // echo "<pre>";
        // print_r($nameinfo);
        // echo "<pre>";
        // 分配变量
        $this -> assign("orderInfo",$info);
        $this -> assign("orderNameInfo",$nameinfo);

    //收货地址管理查询
    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	//实例化数据库对象
    	$address = M('address');
    	//执行查询操作
    	$addressInfo = $address->where("uid=$uid")->order("aid desc")->select();
    	//分配变量
    	$this->assign("addressInfo",$addressInfo);
    	$this->assign("arr",$arr);

    //首页侧面栏目
            //创建商品类表对象
            $goodsclass=M('goodsclass');
            //查询商品类表中的父级类名和id
            $goodsfj=$goodsclass->where('paid=0')->field('cid,name')->limit(8)->select();
            //创建商品表对象
            $goods=M('goods');
            //遍历父级类
            foreach ($goodsfj as $k => $v) {
                //取父级类的id
                $a=$v['cid'];
                //取父类中子类的名称
                $goodszj=$goodsclass->where("paid=$a")->field('name,cid,image')->select();
                foreach ($goodszj as $key => $value) {
                    $goodsfj[$k]['child'][$key]['title']=$value['name'];
                    $goodsfj[$k]['child'][$key]['cid']=$value['cid'];
                    $goodsfj[$k]['child'][$key]['pic']=$value['image'];
                }
            }
            //侧边分类列表变量分配
            $this->assign('class', $goodsfj);

    //购物车
            //接收购物车传值
            $shopcart = I('session.shopcart');
            //分配变量
            $this->assign("shopcart",$shopcart);

    //我的收藏
        /*
        收藏模块 商品收藏的增删查
        作者:田兆高
        */
        //实例化数据库对象
        $like = M('like');
        //我的收藏区
        $likeinfos = $like->order('kid desc')->select();
        //个人中心的收藏夹
        $likeinfos_center = $like->order('kid desc')->limit(6)->select();
        $this->assign('likeinfos',$likeinfos);
        $this->assign('likeinfos_center',$likeinfos_center);
        //解析模板
        $this->display();
    }
    //收货数据插入数据库
    public function insert(){
    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	//创建数据库对象
    	$address = M('address');
    	//执行插入操作
    	$Info = $address -> add($_GET);
    	$pr = $_GET['province'];
    	$_GET['pro'] = $_GET['province'];
    	$_GET['province'] = $arr[$pr];
    	//判断结果
    	if($Info){
    		$_GET['da'] = "ok";
    		$_GET['aid'] = mysql_insert_id();//获取刚插入数据ID号
    		$this->ajaxReturn($_GET);
    	}else{
    		$_GET['da'] = "no";
    		$this->ajaxReturn($_GET);
    	}

    }

    //确认收货，修改Ordering表status为3
    public function statusUpdate(){
        //接受订单号、处理数据
        $onumber = $_GET['onumber'];
        $status = $_GET['status'];
        $arr = array('status'=>"$status");
        //实例化数据库对象
        $orders = M('ordering');
        //执行订单状态修改
        $order_status_Info = $orders -> where("onumber=$onumber") -> save($arr);
        //判断返回结果
        if($order_status_Info){
            echo "3";
        }else{
            echo "2";
        }
    }

    ///商品是否已评价查询
    public function Comselect(){
        //接收传值
        $gid = $_GET['gid'];
        $uid = I('session.uid');
        //实例化数据库对象
        $comments = M('comment');
        $goods = M('goods');
        //执行查询操作
        $commentInfo = $comments->where("gid=$gid and uid=$uid")->select();
        $sumcom = $comments->where("gid=$gid")->count();
        $goodsInfo = $goods->field('comment')->find($gid);
        $sumcomment = $goodsInfo['comment'];
        //判断结果
        if($commentInfo || $sumcom){
            $_GET['ping'] = "pinglun";

        }else{
            $_GET['ping'] = "zanwu";
        }

        $_GET['counts'] = "$sumcomment";
        $this->ajaxReturn($_GET);

    }


    //编辑修改收货信息
    public function update(){
    	$arr = array("省份/自治区","请选择","北京","天津","河北","山西","内蒙古","辽宁","吉林","黑龙江","上海","江苏","浙江","安徽","福建","江西","山东","河南","湖北","湖南","广东","广西","海南","重庆","四川","贵州","云南","西藏","陕西","甘肃","青海","宁夏","新疆");
    	//创建数据库对象
    	$addressup = M('address');
    	//执行修改操作
    	$Info = $addressup->save($_GET);
    	//处理数据格式，省
    	$pr = $_GET['province'];
    	$_GET['pro'] = $_GET['province'];
    	$_GET['province'] = $arr[$pr];
    	//判断结果、返回结果
    	if($Info){
    		$_GET['da'] = "ok";
    		$this->ajaxReturn($_GET);
    	}else{
    		$_GET['da'] = "no";
    		$this->ajaxReturn($_GET);
    	}

    }
    
    //删除收货数据
    public function delete(){
    	//接收要删除的aid
    	$aid = I('aid');
    	//创建数据库对象
    	$address = M('address');
    	//执行删除操作
    	$Info = $address->where("aid=$aid")->delete();
    	//判断返回结果
    	if($Info){
    		echo "ok";
    	}else{
    		echo "no";
    	}
    }

}



?>