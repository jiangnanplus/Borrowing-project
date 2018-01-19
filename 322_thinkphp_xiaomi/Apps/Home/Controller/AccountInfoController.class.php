<?php
namespace Home\Controller;
use Think\Controller;
//-------------------------------//
// 这是前台小米账号控制器
//-------------------------------//
class AccountInfoController extends Controller {
    //小米账号主页面显示，数据读取
    public function index(){
        //读取个人基本资料数据
        //接收用户Uid
        $uid = I('session.uid');
        //实例化数据库类，查询数据
        $user = M('user');
        $userdetail = M('userdetail');
        $user = $user->where("id=$uid")->find();
        $userdetail = $userdetail->where('uid='.$uid)->find();
        // 判断查询是否有结果
        if($user && $userdetail){
            //有结果给检测变量赋值为ok
            $detection = "ok";
        }else{
            $detection = "no";
        }
        //拆分年月日2012-01-01
        $birthday = $userdetail['birthday'];
        $year = substr($birthday,0,4);
        $month = substr($birthday,5,2);
        $day = substr($birthday,8,2);
        //分配变量(判断：如果uid不为null,则分配变量)
        $this->assign('user',$user);
        $this->assign('detection',$detection);
        if($userdetail['uid'] != null){
            $this->assign('users',$userdetail);
            $this->assign('year',$year);
            $this->assign('month',$month);
            $this->assign('day',$day);
        }
    	//解析模板
        $this->display();
    }

    //用户头像上传
    public function uploadimg(){
        $shanchu = $_POST['shanchu']; //接收要删除的原头像路径
        //如果有图片上传
        if($_FILES['img']['error'] == 0){
            //上传文件
            $upload = new \Think\Upload(); //实例化上传类
            $upload -> maxSize = 2079152; //设置附件上传大小(2M)
            $upload -> exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型   
            $upload -> rootPath = './public/'; //手册中少的一个配置
            $upload -> savePath = 'Upload/UserPortrait/'; //设置附件上传目录 
            //上传文件
            $info = $upload -> upload();
            //上传成功与错误判断
            if(!$info){
                echo $upload -> getError();
            }else{
                //获取文件上传后的完整路径./Public/     Uploads/2015-06-25/   558bb6f0ea67b.jpg
                $img['path'] = $upload->rootPath.$info['userfile']['savepath'].$info['userfile']['savename'];
                $img['jtps'] = $info['userfile']['savepath'].$info['userfile']['savename']; //返回当前上传图片存储地址
                $img['chicun'] = getimagesize("{$img['path']}");//获取原图尺寸
                // 将图片名插入数据库user表
                    $uid = I('session.uid');
                    //实例化数据库对象
                    $user = M('user');
                    $arr = array(
                        'img'=>$img['jtps'],
                        );
                    //写入数据库
                    $user->where("id=$uid")->save($arr);
                    //删除原头像
                    if($shanchu != "./public/Upload/UserPortrait/UserPortraits.jpg"){
                        unlink("$shanchu");
                    }
            }
            //将获得的路径值返回到源文件
            $this->ajaxReturn($img);
          
        }
    }

    //头像裁剪
    public function tailor(){

        //接值
        $img = $_GET['img'];
        $imgsql = $_GET['imgsql'];
        $left = $_GET['left'];
        $top = $_GET['top'];
        $width = $_GET['width'];
        $height = $_GET['height'];
        //实例化库类
        $image = new \Think\Image(); 
        $image->open("$img");
        //将图片裁剪为400x400并保存为corp.jpg
        $crops = $image->crop($width, $height,$left,$top)->save("$img");
        if($crops){
            $this->success('头像修改成功',U('Home/AccountInfo/index'),1);           
        }else{
            $this->error('头像修改失败',U('Home/AccountInfo/index'),1);
        }
    }

    //数据添加
    public function insert(){
    	//编辑基本资料
    	//接受传值
    	$uid = I('session.uid');
    	$_GET['uid'] = $uid;
    	//实例化数据库类，将数据存入数据库
    	$userdetail = M('userdetail');
    	//写入数据库
    	if($userdetail->add($_GET)){
    		//获取刚插入插入成功的id号
	    	// $did = mysql_insert_id();
	    	$this->success('添加成功',U('Home/AccountInfo/index'),3);
    	}else{
    		$this->error('添加失败',U('Home/AccountInfo/index'),3);
    	}

    }

    // 数据修改
    public function update(){
        //接收处理字段数据
        $uid = I('session.uid');
        $name = I('get.name');
        $birthday = I('get.birthday');
        $sex = I('get.sex');
        $arr = array(
                'name'=>"$name",
                'birthday'=>"$birthday",
                'sex'=>"$sex"
            );

        //实例化数据库对象
        $userdetail = M('userdetail');
        //修改userdetail数据表
        $userupdate = $userdetail->where("uid=$uid")->save($arr);
        if($userupdate){
            $this->success('修改成功',U('Home/AccountInfo/index'),1);
        }else{
             $this->success('修改失败',U('Home/AccountInfo/index'),1);
        }
    }

    //显示小米支付中心页面
    public function bankcard(){
        //读取银行卡数据表信息
        //接收用户Uid
        $uid = I('session.uid');
        //实例化数据库对象
        $bankcard = M('bankcard');
        //执行查询操作
        $bankcards = $bankcard->where("uid=$uid")->find();
        if($bankcards){
            $detection = "ok";
        }else{
            $detection = "no";
        }
        //接收index页面传值name
        $name = $_GET['name'];
        //分配变量
        $this->assign('bankcards',$bankcards);
        $this->assign('detection',$detection);
        $this->assign('name',$name);

        //解析模板
        $this->display();
    }
    //银行卡添加
    public function bankcardadd(){
        //接受传值
        $uid = I('session.uid');
        $realname = I('get.realname');
        $idNumber = I('get.idNumber');
        $bankNumber = I('get.bankNumber');
        $phoneNumber = I('get.phoneNumber');
        $arr = array(
            'uid'=>"$uid",
            'realname'=>"$realname",
            'idNumber'=>"$idNumber",
            'bankNumber'=>"$bankNumber",
            'phoneNumber'=>"$phoneNumber"
            );
        //实例化数据库对象
        $bank = M('bankcard');
        //将数据插入数据库
        $banks = $bank->where("uid=$uid")->add($arr);
        if($banks){
            $this->success('添加成功',U('Home/AccountInfo/index'),1);
        }else{
            $this->success('添加失败',U('Home/AccountInfo/index'),1);
        }
    }

    //银行卡修改
    public function bankcardupdate(){
        //接受传值
        $uid = I('session.uid');
        $realname = I('get.realname');
        $idNumber = I('get.idNumber');
        $bankNumber = I('get.bankNumber');
        $phoneNumber = I('get.phoneNumber');
        $arr = array(
            'uid'=>"$uid",
            'realname'=>"$realname",
            'idNumber'=>"$idNumber",
            'bankNumber'=>"$bankNumber",
            'phoneNumber'=>"$phoneNumber"
            );
        //实例化数据库对象
        $bankupdate = M('bankcard');
        //执行数据更新
        $update = $bankupdate->where("uid=$uid")->save($arr);
        if($update){
            $this->success('修改成功',U('Home/AccountInfo/index'),1);
        }else{
            $this->success('修改失败',U('Home/AccountInfo/index'),1);
        }
    }

    //退出登录跳到登录页面
    public function logout(){
        session('uid',null);
        session('ssid',null);
        //重定向跳转
        $this->redirect("Home/Login/index");
    }


    	
    	
}

?>