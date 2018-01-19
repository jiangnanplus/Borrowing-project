<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
  <title>小米帐号 - 注册</title>
  <link rel="shortcut icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
  <link type="text/css" rel="stylesheet" href="/xm/Public/Home/css/reset.css">
  <link type="text/css" rel="stylesheet" href="/xm/Public/Home/css/layout.css">
  <link type="text/css" rel="stylesheet" href="/xm/Public/Home/css/registerpwd.css">
  <script type="text/javascript" src="/xm/Public/Home/js/jquery-1.8.3.min.js"></script>
  <style type="text/css">
    .err_label {
    border: 1px solid #ff6f3d ;
    border-radius:3px
    /*border: 1px solid #e8e8e8 ;*/
  }
  </style>
</head>
<body class="zh_CN">
<div class="layout bugfix_ie6 dis_none">
  <div class="n-logo-area clearfix">
    <a href="#" class="fl-l">
          <img src="/xm/Public/Home/image/n-logo.png">
    </a>
  </div>
</div>
<div class="layout">
  <div class="n-frame device-frame reg_frame" id="main_container">
    <div class="title-item dis_bot35 t_c">
      <h4 class="title-big">注册小米帐号</h4>
    </div>  
    <div>
      <div class="regbox">
        <div class="phone_step1">
          <form action="<?php echo U('Home/Register/insert');?>" method="post" id="user">
          <div class="inputbg">
            <label class="labelbox" for="">
              <input name="phone" data-type="PH" placeholder="请输入手机号码" type="text">
            </label>
          </div>
          <div class="err_tip">
            <div class="dis_box"><em class="icon_error"></em><span></span></div>
          </div>
          <div class="inputbg">
            <label class="labelbox" for="">
              <input name="email" data-type="PH" placeholder="请输入邮箱" type="text">
            </label>
          </div>
          <div class="err_tip">
            <div class="dis_box"><em class="icon_error"></em><span></span></div>
          </div>
          <div class="inputbg">
            <label class="labelbox" for="">
              <input name="password" data-type="PH" placeholder="请输入密码" type="password">
            </label>
          </div>
          <div class="err_tip">
            <div class="dis_box"><em class="icon_error"></em><span></span></div>
          </div>
          <div class="inputbg">
            <label class="labelbox" for="">
              <input name="repassword" data-type="PH" placeholder="请再次输入密码" type="password">
            </label>
          </div>
          <div class="err_tip">
            <div class="dis_box"><em class="icon_error"></em><span></span></div>
          </div>
          <div class="inputbg inputcode dis_box">
            <label class="labelbox" for="">
              <input class="code" name="vcode" autocomplete="off" placeholder="图片验证码" type="text">
            </label>
            <img src="<?php echo U('Home/Vcode/vcode');?>" onclick="this.src=this.src+'?a'" alt="图片验证码" title="看不清换一张" class="icode_image code-image chkcode_img">
          </div>
          <div class="err_tip">
            <div class="dis_box"><em class="icon_error"></em><span></span></div>
          </div>
          <div class="err_tip send-left-times">
          </div>
          <div class="fixed_bot mar_phone_dis1">
            <input class="btn332 btn_reg_1 submit-step" data-to="phone-step2" value="立即注册" type="submit">
            <img src="/xm/Public/Home/image/tick.png">
            
          </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="n-footer">
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-京公网安备1101080212535</span></p>
</div>
<script type="text/javascript">
  var phoneOk = false;
  var emailOk = false;
  var pwOk = false;
  var repwOk = false;
  var vcodeOk = false;
 
  // 手机号失去焦点验证
  $('input[name=phone]').blur(function(){
    var v = $(this).val();
    var t = $(this);
    var reg = /^1\d{10}$/;
    var m = $('input[name=phone]').parents('.inputbg').next();
    
    if(v == ''){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('请输入手机号码');
      phoneOk = false;
    }else if(!reg.test(v)){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('手机号码格式错误');
      phoneOk = false;
    }else{
      // ajax请求查询手机号码是否已经注册
      $.ajax({
        url:'<?php echo U('Home/Register/phone');?>',
        data:{phone:v},
        type:'GET',
        success:function(data){
          if(data == 1){
            t.addClass('err_label');
            m.css('display','block').find('span').html('手机号码已被注册，请更换');
            phoneOk = false;
          }else{
            t.removeClass('err_label');
            m.css('display','none');
            phoneOk = true;
          }
        },
        async:false,
      })
    }
  })

  // 邮箱失去焦点事件
  $('input[name=email]').blur(function(){
    var v = $(this).val();
    var t = $(this);
    var m = $('input[name=email]').parents('.inputbg').next();

    var reg = /^\w+@\w+\.(com|cn|com.cn|net|org)$/;
    if(v == ''){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('请输入邮箱');
      emailOk = false;
    }else if(!reg.test(v)){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('邮箱格式错误');
      emailOk = false;
    }else{
      t.removeClass('err_label');
      m.css('display','none');
      emailOk = true;
    }
  })

  // 密码失去焦点
  $('input[name=password]').blur(function(){
    var v = $(this).val();
    var t = $(this);
    var m = $('input[name=password]').parents('.inputbg').next();

    var reg = /^\w{3,16}$/;
    if(v == ''){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('请输入密码');
      pwOk = false;
    }else if(!reg.test(v)){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('密码必须为3到16位的数字字母下划线');
      pwOk = false;
    }else{
      t.removeClass('err_label');
      m.css('display','none');
      pwOk = true;
    }
  })

  // 确认密码失去焦点
  $('input[name=repassword]').blur(function(){
    var v = $(this).val();
    var pw = $('input[name=password]').val();
    var t = $(this);
    var m = $('input[name=repassword]').parents('.inputbg').next();

    var reg = /^\w{3,16}$/;
    if(v == ''){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('请输入确认密码');
      repwOk = false;
    }else if(!reg.test(v)){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('确认密码必须为3到16位的数字字母下划线');
      repwOk = false;
    }else if(v != pw){
      $(this).addClass('err_label');
      m.css('display','block').find('span').html('确认密码必须和密码一致');
      repwOk = false;
    }else{
      t.removeClass('err_label');
      m.css('display','none');
      repwOk = true;
    }
  })

  // 验证码失去焦点
  $('input[name=vcode]').blur(function(){
    var v = $(this).val();
    var n = $('input[name=vcode]').parents('.inputbg').next();
    var t = $(this);
    var reg = /^\w{4}$/;
    if(v == ''){
      $(this).addClass('err_label');
      n.css('display','block').find('span').html('请输入图片验证码');
      vcodeOk = false;
    }else if(!reg.test(v)){
      $(this).addClass('err_label');
      n.css('display','block').find('span').html('图片验证码位数不符');
      vcodeOk = false;
    }else{
      // ajax请求验证验证码是否正确
      $.ajax({
        url:'<?php echo U('Home/Register/registercode');?>',
        data:{vcode:v},
        type:'GET',
        success:function(data){
          if(data == 0){
            t.addClass('err_label');
            n.css('display','block').find('span').html('图片验证码错误');
            $('.icode_image').trigger('click');
            t.val('');
            vcodeOk = false;
          }else{
            t.removeClass('err_label');
            n.css('display','none');
            vcodeOk = true;
          }
        },
        async:true,
      })
    }
  })

  // 表单提交事件
  $('#user').submit(function(){
    $('input[name=phone]').trigger('blur');
    $('input[name=email]').trigger('blur');
    $('input[name=password]').trigger('blur');
    $('input[name=repassword]').trigger('blur');
    if(phoneOk && vcodeOk && emailOk && pwOk && repwOk){
      return true;
    }
    return false;
  })
</script>

</body></html>