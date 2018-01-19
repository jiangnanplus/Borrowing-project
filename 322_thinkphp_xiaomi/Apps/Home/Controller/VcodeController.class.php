<?php
namespace Home\Controller;
use Think\Controller;
// 生成验证码
class VcodeController extends Controller {
    public function vcode(){
		$config =    array(
		    'fontSize'    =>    18,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    'useNoise'    =>    false, // 关闭验证码杂点
		    'imageH'	  =>	'45px',
		    'imageW'	  =>	'125px',
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
    }
}

?>