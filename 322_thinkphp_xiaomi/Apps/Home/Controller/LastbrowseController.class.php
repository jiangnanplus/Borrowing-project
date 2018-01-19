<?php
namespace Home\Controller;
use Think\Controller;
/*
商品最近浏览模块 商品最近浏览的的增查
*/
class LastbrowseController extends Controller {
    public function add(){
    	$_SESSION['gid'][]=I('gid');
    	// var_dump($_SESSION);
    }

}

?>