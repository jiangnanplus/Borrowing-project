<?php
 /*
	 *这是前台购物车控制器
	 */
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    public function index(){
        $sum=0;
        $youhui=0;
        $cat_info=session('shopcart');
        if(!empty($cat_info)){
           $status=1;
           foreach($_SESSION["shopcart"] as $k=>$v) {
                $_SESSION["shopcart"][$k]["xiaoji"]=$v["price"]*$v['number'];
                $sum+=$v["price"]*$v['number'];
                $youhui+=($v['price']-$v['nowprice'])*$v['number'];;
           }
           $zongji=$sum-$youhui;
        }else{
           $status=0;
        }
        if(session('?uid') && session('?ssid')){
            $user=1;
        }else{
            $user=0;
        }
        $this->assign('user',$user);
        $this->assign('status',$status);
        $this->assign('sum',$sum);
        $this->assign('youhui',$youhui);
        $this->assign('zongji',$zongji);

        $this->display();
    }

    //购物车商品添加
    public function add(){
        session('[start]'); 
    	//创建数据库对象
    	$cart=M('goods');  
        //接收商品id
    	$gid=I("get.gid");
	    //根据商品id去查询goods表
        $goods_info=$cart->where("gid=$gid")->find();
        //先查找有无此商品
        if(empty($goods_info)){
            $this->error('没有找到此购买信息，或商品已下架');
            die;
        }
        //检索主图
        $s_img=json_decode($goods_info['s_img'],true);
        $zhupic=array();
        foreach($s_img as $ke=>$ve){
            $zhupic[]=$ve[0];

        }
        $goods_info['s_img']=$zhupic[0];
        $goods_info['number']=1;//添加一个数量信息，默认为1
    	
        //放入购物车
        if(isset($_SESSION["shopcart"][$goods_info['gid']])){
            //若存在数量加加
            $_SESSION["shopcart"][$goods_info['gid']]["number"]++;
        }else{
            //若不存在，作为新购买的商品添加到购物车中
            $_SESSION["shopcart"][$goods_info['gid']]=$goods_info;
        }

        //var_dump(session('shopcart'));
        echo json_encode(session('shopcart'));


    }

    //购物车商品的删除
    public function clearCart(){
        session('[start]');
        if($_GET['gid']){
            //从session中删除指定的商品信息
            unset($_SESSION["shopcart"][$_GET['gid']]);
            //跳转到浏览购物车界面
            $this->redirect("Home/Cart/index");

        }   

    }

    //购物车商品数量加减
    public function updateCart(){
       session('[start]');

       //获取要修改的信息
        $gid =$_GET['gid'];
        $number = $_GET['number'];
        
        //修改商品信息的数量
        $_SESSION["shopcart"][$gid]["number"]+=$number;
        $_SESSION["shopcart"][$gid]["xiaoji"]=$_SESSION["shopcart"][$gid]["number"]*$_SESSION["shopcart"][$gid]["price"];
        
        //防止商品数量过小
        if($_SESSION["shopcart"][$gid]["number"]<1){
            $_SESSION["shopcart"][$gid]["number"]=1;
            $_SESSION["shopcart"][$gid]["xiaoji"]=$_SESSION["shopcart"][$gid]["price"];
        }
        
        //跳转回我的购物车界面
        //$this->redirect("Home/Cart/index");

        //echo $_SESSION["shopcart"][$gid];
        $this->ajaxReturn($_SESSION["shopcart"][$gid]);
    }
}


?>