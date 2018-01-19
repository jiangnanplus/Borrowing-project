<?php
namespace Home\Controller;
use Think\Controller;
//-------------------------------//
// 这是前台的商品评价控制器
//-------------------------------//

class AppraiseController extends Controller {
	// 显示前台商品评价页面
    public function index(){
        //接收个人中心商品评价列表传值
        $gid = $_GET['gid'];
        $imgs = $_GET['img'];
        $titles = $_GET['title'];
        $counts = $_GET['counts'];

        //分配变量
        $this->assign("gid",$gid);
        $this->assign("imgs",$imgs);
        $this->assign("titles",$titles);
        $this->assign("counts",$counts);

    	//解析模板
    	$this->display();
    }

    // 插入商品评论
    public function insert(){
    	//接收处理数据
    	//获取用户uid
    	$uid = I('session.uid');
    	$_POST['uid'] = $uid;
    	//过滤处理短签数组
    	$label = $_POST['label'];
    	foreach($label as $k=>$v){
    		if($v == ""){
    			continue;
    		}else{
    			$arr[] = $v;
    		}
    	}
    	//将短签数组串行化为字符串
    	$_POST['label'] = json_encode($arr);
    	//评论时间
    	$_POST['comment_time'] = time();

    	//实例化数据库对象
    	$comment = M('comment');
    	//执行数据插入操作
    	$comment -> create();
    	$comInfo = $comment -> add();
    	//判断执行结果
    	if($comInfo){
    		echo "ok";
            //将该商品评论总数和五星评价插入goods表
            //接收数据
            $gid = $_POST['gid'];
            $com_num = $_POST['com_star'];
            //实例化数据库对象
            $goods = M('goods');
            //查询goods表中该商品5星等级总数
            $xingInfo = $goods->field("comment,com_num")->find($gid);
            $comment = $xingInfo['comment'];
            $xingSum = $xingInfo['com_num'];
            //判断星级,准备sql语句
            $comment++;
            if($com_num == 5){
                $xingSum++;
                $arr = array('comment'=>$comment,'com_num'=>$xingSum);
            }else{
                $arr = array('comment'=>$comment);
            }
            //执行修改goods数据表
            $goods->where("gid=$gid")->save($arr);
    	}else{
    		echo "no";
    	} 
        
    }
}

?>