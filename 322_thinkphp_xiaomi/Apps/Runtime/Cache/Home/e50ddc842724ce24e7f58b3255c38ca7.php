<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="description" content="小米帐号能使用小米手机，MIUI，小米云，多看阅读，米聊，小米社区等小米服务。">
<meta name="keywords" content="小米帐号，小米账号，小米注册，注册，Mi Account，Sign in，小米，帐号，账号，小米帐户，登录，登陆，安全令牌，动态口令，小米注册，找回密码">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>小米帐号 - 登录</title>
<link rel="shortcut icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
<link rel="icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/xm/Public/Home/css/loginlogo.css">
<script type="text/javascript" src="/xm/Public/Home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/xm/Public/Home/js/md5.js"></script>
<style type="text/css">
  input{position:relative;}
  .red{color:#ff6f3d;}
</style>
</head>
<body class="zh_CN">
<div class="layout">
  <div class="nl-content">
    <div class="nl-logo-area" id="custom_display_1">
      <img id="logo-img" src="/xm/Public/Home/image/loginlogo.png" width="60">
    </div> 
    <h1 class="nl-login-title" id="custom_display_256"><span id="message_LOGIN_TITLE">一个帐号，玩转所有小米服务！</span>
    </h1> 
    <h2 class="nl-login-title lsrp-appname display-custom-hide" id="lsrp_appName"></h2>
    <div id="custom_display_2">
      <p class="nl-login-intro" id="message_LOGIN_LINKS" style="color:orange">
        为发烧而生
      </p>
    </div> 
    <div class="nl-frame-container"> 
      <div class="ng-form-area show-place" id="form-area"> 
        <form method="post" action="<?php echo U('Home/Login/login');?>" id="miniLogin"> 
          <div class="shake-area" id="shake_area" style="z-index:30;"> 
            <div class="enter-area display-custom-hide" id="revalidate_user"> 
              <p class="revalidate-user-name" id="revalidate_user_name"></p> 
            </div> 
            <div class="enter-area" id="enter_user"> 
              <input placeholder="邮箱/手机号码/小米帐号" class="enter-item first-enter-item" id="miniLogin_username" type="text" name="username"> <i class="placeholder hide" id="message_INPUT_IDENTITY">邮箱/手机号码/小米帐号</i> 
              <span class="error-tip"><em class="error-ico"></em><span class="error-msg"></span></span> 
            </div> 
            <div class="enter-area" style="z-index:20;">
              <input placeholder="密码" class="enter-item last-enter-item" id="miniLogin_pwd" data-rule="" type="password" name="password">
              <i class="placeholder hide" id="message_INPUT_PASSWORD">密码</i>
              <span class="error-tip"><em class="error-ico"></em><span class="error-msg"></span>
              </span> 
            </div> 
          </div> 
          <div class="enter-area img-code-area" id="img_code_area" style="display:block;">
            <input placeholder="验证码" class="enter-item code-enter-item" id="miniLogin_captCode" type="text">
            <img class="code-img" id="code_img" src="<?php echo U('Home/Vcode/vcode');?>" onclick="this.src=this.src+'?a'">
            <i class="placeholder hide" id="message_INPUT_CONFIRM">验证码</i>
            <span class="error-tip"><em class="error-ico"></em>
              <span class="error-msg" id="code_error_tips"></span>
            </span>
          </div>
          <div class="miniLogin_forbidden" id="miniLogin_forzen">
            <div><span id="message_LOGIN_FORZEN">此帐号已被冻结，暂时无法登录</span>
            </div>
          </div>
          <input class="button orange" id="message_LOGIN_IMMEDIATELY" value="立即登录" type="submit">
          <span id="custom_display_128">
            <a href="<?php echo U('Home/Register/index');?>" class="button" id="message_REGISTER">注册小米帐号
            </a>
          </span>
          <span id="custom_display_8">
            <a href="" id="facebook_login_button" class="button facebook_area"> <i class="iconfacebook"></i>Facebook登录
            </a>
          </span>
          <a style="display:none" id="redirectLink" href="" target="_top"></a>
          <a style="display:none" id="redirectTwoPhraseLoginLink" href=""></a>
        </form>
      </div>
    </div>
  </div>
  <!-- foot 版权 -->
  <div class="nl-footer">
    <p class="nl-f-copyright" id="message_COPYRIGHT">小米公司版权所有-京ICP备10046444-京公网安备1101080212535</p>
  </div>
</div>
<script type="text/javascript">
  // 登录检测
  // 1.用户名是否存在,2.密码是否正确,3.验证码是否正确,4用户状态是否禁用 
  $(function(){
    // 定义函数实现用户名和密码输入框颤动
    function show(){
      $('input[name]').each(function(){
        $(this).stop()
            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
            .animate({ left: "0px" }, 100);
      });
    }
    // 定义函数实现验证码输入框颤动
    function showcode(){
      $('#miniLogin_captCode').stop()
            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
            .animate({ left: "-10px" }, 100).animate({ left: "10px" }, 100)
            .animate({ left: "0px" }, 100);
    }
    
    var reg1 = /^\w+@\w+\.(com|cn|com.cn|net|org)$/;
    var reg2 = /^1\d{10}$/;
    var reg3 = /^\d{12}$/;
    var u =  $('input[name=username]');   
    var p =  $('input[name=password]');   
    var c =  $('#miniLogin_captCode');  
    // 定义ajax返回值存值变量
    var info = null;
    // 定义接收用户名类型的变量
    var t = null;
    // 定义检测结果变量
    var vcodeOk = false;
    var upOk = false;

    // 用户名输入失去焦点
    u.blur(function(){
      var uv = u.val();
      // 通过正则匹配来发送相应的ajax
      if(reg1.test(uv)){
        $.get('<?php echo U('Home/Login/aj');?>',{email:uv},function(data){
          info = data;
        },'json');
        t = 'email';
      }
      if(reg2.test(uv)){
        $.get('<?php echo U('Home/Login/aj');?>',{phone:uv},function(data){
          info = data;
        },'json');
        t = 'phone';
      }
      if(reg3.test(uv)){
        $.get('<?php echo U('Home/Login/aj');?>',{ssid:uv},function(data){
          info = data;
        },'json');
        t = 'ssid';
      }
      // 创建隐藏域将用户名类型通过post传过去
      $('input[type=hidden][name=title]').remove();
      $('<input type="hidden" name="title" value="'+t+'">').insertBefore(u);
    });

    // 表单提交事件
    $('#miniLogin').submit(function(){
      var uv = u.val();
      var pv = p.val();
      var cv = c.val();
      var pw = hex_md5(pv);
      // 判断用户名和密码情况
      if(uv == '' || pv == ''){
        show();
        u.val('请输入用户名(邮箱/手机/小米帐号)和密码').addClass('red');
        setTimeout(function(){
          u.val(uv).removeClass('red');
          p.val('');
        },1000);
      }else if(!reg1.test(uv) && !reg2.test(uv) && !reg3.test(uv)){
        show();
        u.val('用户名格式不正确').addClass('red');
        setTimeout(function(){
          u.val(uv).removeClass('red');
          p.val('');
        },1000);
      }else if(!info){
        show();
        u.val('用户名不存在').addClass('red');
        setTimeout(function(){
          u.val(uv).removeClass('red');
          p.val('');
        },1000);
      }else if(info['status'] == 0){
        show();
        u.val('此帐号已被冻结，暂时无法登录').addClass('red');
        setTimeout(function(){
          u.val(uv).removeClass('red');
          p.val('');
        },1000);
      }else if(pw != info['password']){
        show();
        u.val('密码错误').addClass('red');
        setTimeout(function(){
          u.val(uv).removeClass('red');
          p.val('');
        },1000);
      }else if(pw == info['password']){
        upOk = true;
      }

      // 
      if(cv == ''){
        showcode();
        c.val('请输入验证码').addClass('red');
        setTimeout(function(){
          c.val(cv).removeClass('red');
        },1000);
      }else{
        $.ajax({
          url:'<?php echo U('Home/Login/aja');?>',
          data:{vcode:cv},
          type:'GET',
          success:function(data){
            if(data == 0){
              showcode();
              c.val('验证码错误').addClass('red');
              setTimeout(function(){
                c.val('').removeClass('red');
                $('#code_img').trigger('click');
              },1000);
              vcodeOk = false;
            }else if(data == 1){
              vcodeOk = true;
            }
          },
          async:false,
        });
      }

      if(upOk && vcodeOk){
        return true;
      }

      return false;
    })

    // 判断如果order变量存在(没有引号在js中是对象,可遍历) 在form中动态生成隐藏域将其传过去
    var order = <?php echo ($order); ?>;
    if(order != 0){
      for(var i in order){
        $('<input type="hidden" value="'+order[i]+'" name="'+i+'">').insertBefore('#miniLogin_username');
      }
    }
  });

</script>
</body></html>