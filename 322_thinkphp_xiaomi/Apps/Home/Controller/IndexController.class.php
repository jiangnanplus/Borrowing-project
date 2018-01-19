<?php
 /*
	 *这是前台首页控制器
	 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
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
        // echo '<pre>';
        // print_r($goodsfj);
        // echo '</pre>';
        // die;

    	//小明星产品查询

    	$start=$goods->field('title,s_img,gid,com_num/comment as rate')->order('rate desc')->limit(8)->select();
        foreach ($start as $k => $v) {
        $start[$k]['s_img']=zhutu($v['s_img']);
        }
        // var_dump($start);
        // die;
    	//新品上架查询
    	$new=$goods->order('gid desc')->field('gid,title,nowprice,s_img')->limit(9)->select();
        foreach ($new as $k => $v) {
        $new[$k]['s_img']=zhutu($v['s_img']);
    	}
        // var_dump($new);
        // die;
    	//大家都喜欢
    	$like=$goods->order('comment desc')->field('gid,title,nowprice,s_img')->limit(6)->select();
        foreach ($like as $k => $v) {
        $like[$k]['s_img']=zhutu($v['s_img']);
        $like[$k]['num']=++$num;
        }
    	// var_dump($like);
    	// die;

    	//热销产品
        $likes=$goods->order('comment desc')->field('gid,title,nowprice,s_img')->limit(7,11)->select();
        $num=1;
        foreach ($likes as $k => $v) {
        $likes[$k]['s_img']=zhutu($v['s_img']);
        $likes[$k]['num']=$num++; 
        }
        // var_dump($likes);
        // die;
    	//热评产品
    	$hotcomment=$goods->order('com_num desc')->field('gid,title,nowprice,com_num,s_img')->limit(4)->select();
        foreach ($hotcomment as $k => $v) {
        $gid=$v['gid'];
        $hotcomment[$k]['s_img']=zhutu($v['s_img']);
        $pingjia=M('comment')->where("gid=$gid")->order('com_star desc')->field('content')->find();
            if($pingjia){
            $hotcomment[$k]['pingjia']=$pingjia['content'];
            }else{
            $hotcomment[$k]['pingjia']='这家伙很懒，什么也没留下'; 
            }
        }

    	// var_dump($hotcomment);
    	// die;

    	//特价产品
    	$special=$goods->where('nowprice<price')->field('gid,title,nowprice,price,s_img,price-nowprice as chajia')->limit(4)->select();
        foreach ($special as $k => $v) {
        $special[$k]['s_img']=zhutu($v['s_img']);
        }
    	// var_dump($special);
     //    die;
    	// 判断是否登录
        if(session('?uid') && session('?ssid')){
            $islogin = 1;
        }



    	$this->assign('class', $goodsfj);
        $this->assign('start',$start);
        $this->assign('new',$new);
        $this->assign('like',$like);
    	$this->assign('likes',$likes);
    	$this->assign('hotcomment',$hotcomment);
        $this->assign('special',$special);
    	$this->assign('islogin',$islogin);






        $this->display();
    }

    //手机充值
    public function addPhone(){
        $user_id=session('uid');
        //判断用是否登录
        if(empty($user_id)){
            $this->redirect('Home/Login/index','',3, '未登录,正在跳转到登录页...');
            exit;
        }
        $rechargeAmount=I('post.rechargeAmount');
        //查询账户的余额
        $user_info=M('user')->where(array('id'=>$user_id))->select();  
        $user_money=$user_info[0]['money'];
        //判断余额是否够付款
        if($user_money<$order_total_money){   
            $this->error("付款失败,余额不足");
            exit;
             
        }
        //进行付款处理
        $user=M('user');
        $user->startTrans();
        //计算付款完剩余的金额
        $new_user_money=$user_money-$rechargeAmount;
        //存入数据库
        $user_status=$user->where(array('id'=>$user_id))->save(array('money'=>$new_user_money));
        //判断是否执行成功
        if($user_status){
            $user->commit();

            //显示信息到前台去
            $this->success("充值成功！！！",U("Home/Index/index"),1);
              

        }else{

            //执行失败就回滚
            $user->rollback();
            $this->error('付款失败');
            exit;

        }

    }
}

?>