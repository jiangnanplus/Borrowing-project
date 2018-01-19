<?php
namespace Home\Controller;
use Think\Controller;
//-------------------------------//
// 这是前台的个人中心控制器
//-------------------------------//

class MyappraiseController extends Controller {
	// 显示前台个人中心页面
    public function index(){
        //接收用户uid
        $uid = I('session.uid');
        //实例化数据库对象
        $users = M('user');
        //查询img name 
        $sql = "select img,name from user u left join userdetail d on u.id = d.uid where u.id=".$uid;
        $userInfo = $users->query($sql);
        //分配变量
        $this->assign("userInfo",$userInfo[0]);

        //接收评价商品gid
        $gid = I('get.gid');
        // 实例化数据库对象
        $comments = M('comment');
        //执行查询操作
        $comInfo = $comments->where("uid=$uid and gid=$gid")->find();
        //处理数据
        $xingji = $comInfo['com_star'];
        $ptime = date("Y年m月d日",$comInfo['comment_time']);
        $contents = $comInfo['content'];
        //分配变量
        $this->assign("xingji",$xingji);
        $this->assign("ptime",$ptime);
        $this->assign("contents",$contents);
    
        //解析模板
        $this->display();
    }
}
    

?>