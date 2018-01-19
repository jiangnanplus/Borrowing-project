<?php  

	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){
	    $verify = new \Think\Verify();
	    return $verify->check($code, $id);
	}

	//解析出商品的主图
	function zhutu($img){
		$s_img=json_decode($img,true);
        $zhupic=array();
        foreach($s_img as $ke=>$ve){
            $zhupic[]=$ve[0];

        }
        return $zhupic[0];
	}

?>