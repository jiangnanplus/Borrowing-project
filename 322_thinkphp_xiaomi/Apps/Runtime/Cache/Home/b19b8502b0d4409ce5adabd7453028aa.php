<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>修改密码</title>
  <link href="/xm/Public/Home/css/APindex.css" rel="stylesheet" type="text/css">
  <link href="/xm/Public/Home/css/manfind.css" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="/xm/Public/Home/css/reset.css">
  <link type="text/css" rel="stylesheet" href="/xm/Public/Home/css/layout.css">
  <script src="/xm/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>

  <style>
    .dd_r{
      height:auto!important;
    }
    .hei_444{
      height:500px;
      border-bottom:1px solid #dadada;
    }
    .news{border:1px solid green;}
    .oks{border:1px solid #ccc;}
    .nos{border:2px solid #f18447;}
    .check_tips,.check_tips2 {
      background: url("/xm/Public/Home/image/cuowu.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
      display: none;
      height: 16px;
      line-height: 16px;
      margin-left: 10px;
      margin-top: 11px;
      padding-left: 20px;
      vertical-align: middle;
    }
    .check_tips1{
      background: url("/xm/Public/Home/image/cuowu.png") no-repeat scroll 0 9px rgba(0, 0, 0, 0);
      display: none;
      height: 16px;
      line-height: 16px;
      margin-left: 10px;
      margin-top: 2px;
      padding-left: 20px;
      vertical-align: middle;
    }


    .yess{
      display: none;
      border: 0px;
      width:13px;
      height: 33px;
      line-height: 13px;
      padding-left:10px;
      vertical-align: middle;
    }
    .yes{
      background: url("/xm/Public/Home/image/zqdj.png") no-repeat scroll 0 0 rgba(0, 0, 0, 0);
      height: 13px;
      line-height: 13px;
      margin-top:12px;
      padding-left: 20px;
      vertical-align: middle;
    }
    .prompt_info, .validate_info {
    margin-left: 10px;
    /*padding-top: 10px;*/
    }
  </style>
</head>
<body>
    <!-- 头部区块start -->
    <div class="layout">
      <div class="n-logo-area clearfix">
      	<a href="https://account.xiaomi.com/" class="fl-l">
      			<img src="/xm/Public/Home/image/n-logo.png">
      	</a>
      </div>
    </div>
    <!-- 头部区块end -->

<!-- 重设密码区块start -->
    <div class="suc_content changP nojsp">
        <div class="suc_kuang">
            <div class="hei_444">
              <!-- 小米帐号  > 重设帐号密码 部分star -->
              <div class="info">
                <span class="left_name">
                  <span class="m_name"><a href="" class="color_33">小米帐号</a>&nbsp;&nbsp;&gt;</span>
                  <span class="m_func">重设帐号密码</span>
                </span>
                <span class="right"><a class="fl-r logout" href="<?php echo U('Home/UserCenter/index');?>">退出</a>
                </span>
              </div>
              <!-- 小米帐号  > 重设帐号密码 部分end -->

              <!-- 表单区块start -->
              <!-- <form id="changePwdForm" method="" action="#"> -->
              <div class="changP_container">
                  <p class="account_tips">请重设您的帐号密码</p>
                  <dl class="clearfix">
                      <!-- 当前密码条start -->
                      <dt class="dt_l">当前密码：</dt>
                      <dd class="dd_r clearfix">

                        <input id="txtPwd" class="input_kuang new_width item errortip" isrequired="true" name="oldpassword" type="password" style="width:290px;font-size: 14px;height: 20px;padding: 8px;">
                        <span class="yess"><span class="yes"></span></span>
                        <span class="check_tips empty_tip" id="emailCode">请输入正确密码！</span>
                      </dd>
                      <!-- 当前密码条end -->

                      <script type="text/javascript">
                          //获取元素
                          var txtPwd = $('#txtPwd');
                          //检测变量
                          var passOk = false;
                          //绑定获取焦点事件
                          txtPwd.focus(function(){
                            // 设置文本框颜色（点击：news绿色，正确：oks灰色，错误：nos红色）
                            $(this).removeClass('oks');
                            $(this).removeClass('nos');
                            $(this).addClass('news');
                            $('.check_tips').css('display','none');
                            $('.yess').css('display','none');
                          });
                          //绑定失去焦点事件
                          txtPwd.blur(function(){
                            // 设置文本框颜色（点击：news绿色，正确：oks灰色，错误：nos红色）
                            $(this).removeClass('news');
                            //获取当前密码值
                            var pass = $('#txtPwd').val();
                            // 发送ajax请求，验证原密码正确性
                            $.get("<?php echo U('Home/AlterPassword/passquery');?>",{password:pass},function(data){
                              if(data == 'ok'){
                                $('#txtPwd').removeClass('news');
                                $('#txtPwd').removeClass('nos');
                                $('#txtPwd').addClass('oks');
                                $('.check_tips').css('display','none');
                                $('.yess').css('display','block');
                                //设置检测变量passOk = true;
                                passOk = true;
                              }else{
                                $('#txtPwd').removeClass('news');
                                $('#txtPwd').removeClass('oks');
                                $('#txtPwd').addClass('nos');
                                $('.yess').css('display','none');
                                $('.check_tips').css('display','block');
                                //设置检测变量passOk = false;
                                passOk = false;
                              }
                            });
                          });

                      </script>

                      <!-- 新密码条start -->
                      <dt class="dt_l clearfix">新密码：</dt>
                      <dd class="dd_r clearfix dd_r_pos" id="pwdTd">
                          <input class="input_kuang new_width item errortip" isrequired="true" id="pwd" name="password" type="password">
                          <span style="display:none">请输入新密码</span>
                          <span class="error_tip" id="tips_val"></span>
                          <span class="prompt_info" id="info_tips" >密码长度8~16位，数字、字母、字符至少包含两种</span>
                          <span class="succ_tips"></span>
                      </dd>
                      <!-- 新密码条end -->

                      <!-- 再次确认新密码条start -->
                      <dt class="dt_l clearfix">再次确认新密码：</dt>
                      <dd class="dd_r clearfix">
                        <input class="input_kuang new_width item errortip" isrequired="true" name="password2" repeat="#pwd" id="qrpwd" type="password">
                        <span id="mimayizhi" style="display:none">密码输入不一致</span>
                        <span class="prompt_info2" id="info_tips2" style="display:none">密码长度8~16位，数字、字母、字符至少包含两种</span>
                        <span class="succ_tips"></span>
                      </dd>
                      <!-- 再次确认新密码条end -->

                      <dt class="dt_l"></dt>
                      <dd class="dd_r clearfix">
                        <input name="userId" value="108264313" type="hidden">
                        <input name="qs" value="" type="hidden">
                        <input name="passToken" id="passToken" value="" type="hidden">
                        <input name="passport_ph" id="passport_ph" value="753apvm3BcbHFwiq1PEbfw==" type="hidden">
                        <div class="sub_bg">
                          <input id="tijiao" class="no_bg" value="提交" type="submit" style="background-color:transparent;">
                        </div>
                      </dd>
                      <!-- 提交按钮 -->

                  </dl>
              </div>
              <!-- </form> -->
              <!-- 表单区块end -->
            </div>
        </div>
    </div>

<!-- 重设密码区块end -->

    <div class="msgTips hide" id="msgTips" style="z-index:9"></div>
    <p class="msgInfo hide" id="msgInfo"></p>
    <!-- foot 常见问题区块start -->
    <div class="footer" style="width:auto;">
      <div class="faq_link">
        <a class="a_critical" href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank">
        <img src="/xm/Public/Home/image/wenhao.jpg"></a>
      </div>
      <ul class="links">
        <li><a href="http://www.mi.com/" target="_blank">小米手机</a></li>
        <li><a href="http://www.miui.com/" target="_blank">MIUI</a></li>
        <li><a href="http://www.miliao.com/" target="_blank">米聊</a></li>
        <li><a href="http://bbs.xiaomi.com/" target="_blank" class="hide-with-en">小米论坛</a></li>
        <li class="copyright"><span>小米公司版权所有-京ICP备10046444-京公网安备1101080212535</span></li>
      </ul>
    </div>
    <!-- foot 常见问题区块end -->



</body></html>
<script type="text/javascript">
    //新密码输入框
    //设置检测变量newpassOk = false;
    var newpassOk = false;
    //绑定获取焦点事件
    $('#pwd').focus(function(){
        //删除错误图标
        $('#info_tips').removeClass('check_tips1');
        //设置确认密码框样式
        $(this).removeClass('oks');
        $(this).removeClass('nos');
        $(this).addClass('news');
     });
    //绑定丧失焦点事件
    $('#pwd').blur(function(){
        $(this).removeClass('news');
        //获取值
        var pwd = $(this).val();
        //正则表达式
        var reg = /((?=.*\d)(?=.*\D)|(?=.*[a-zA-Z])(?=.*[^a-zA-Z]))^.{8,16}$/;
        //进行匹配验证
        if(!reg.test(pwd)){
          //设置确认密码框样式
          $('#pwd').removeClass('oks');
          $('#pwd').addClass('nos');
          //加错误图标
          $('#info_tips').addClass('check_tips1').css('display','block');
          //设置检测变量newpassOk = false;
          newpassOk = false;
        }else{
          //设置确认密码框样式
          $('#pwd').removeClass('nos');
          $('#pwd').addClass('oks');
          //删除错误图标
          $('#info_tips').removeClass('check_tips1');
          //设置检测变量newpassOk = false;
          newpassOk = true;
        }
    });

    //确认密码输入框
    //设置检测变量qrnewpassOk = false;
    var qrnewpassOk = false;
    //确认密码框获取焦点事件
    $('#qrpwd').focus(function(){
        //删除错误图标
        $('#mimayizhi').removeClass('check_tips2');
        //修改提示信息样式
        $('#mimayizhi').css('display','none');
        $('.prompt_info2').css('display','none');
        //设置确认密码框样式
        $('#qrpwd').removeClass('oks');
        $('#qrpwd').removeClass('nos');
        $('#qrpwd').addClass('news');
    });
    //确认密码框丧失焦点事件
    $('#qrpwd').blur(function(){
        $(this).removeClass('news');
        //获取值
        var qrpwd = $(this).val();
        //正则表达式
        var reg = /((?=.*\d)(?=.*\D)|(?=.*[a-zA-Z])(?=.*[^a-zA-Z]))^.{8,16}$/;
        //进行匹配验证
        if(!reg.test(qrpwd)){
            //确认密码不合法
            //设置确认密码框样式
            $('#qrpwd').removeClass('oks');
            $('#qrpwd').addClass('nos');
            //加错误图标
            $('#info_tips2').addClass('check_tips2').css('display','block');
            //修改提示信息样式
            $('.check_tips2').css('margin-top','10px');
            //设置检测变量qrnewpassOk = false;
            qrnewpassOk = false;
        }else{
            //修改
            $('#mimayizhi').removeClass('check_tips2');
            //判断
            if($('#pwd').val() == $('#qrpwd').val()){
              //设置确认密码框样式
              $('#qrpwd').removeClass('nos');
              $('#qrpwd').addClass('oks');
              //设置检测变量qrnewpassOk = true;
              qrnewpassOk = true;
            }else{
              //前后密码不一致
              $('#qrpwd').removeClass('oks');
              $('#qrpwd').addClass('nos');
              //加错误图标
              $('#mimayizhi').addClass('check_tips2').css('display','block');
              $('.check_tips2').css('margin-top','10px');
              //设置检测变量qrnewpassOk = false;
              qrnewpassOk = false;
            }
        }
    });

    var tijiao = $('#tijiao');
    tijiao.click(function(){
        //提交触发三个输入框丧失焦点事件 trigger
        $('#pwd').trigger('blur');
        $('#qrpwd').trigger('blur');
        $('#txtPwd').trigger('blur');
        //判断三个输入框数据合法性
        if(passOk && newpassOk && qrnewpassOk){
            //获取输入新密码input
            var pwd = $('#pwd').val();
            //获取输入确认新密码input
            var qrpwd = $('#qrpwd').val();
            //发送ajax请求
            $.get("<?php echo U('Home/AlterPassword/passUpdate');?>",{password:qrpwd},function(data){
                if(data == "ok"){
                  location.href = "<?php echo U('Home/UserCenter/index');?>";
                }else{
                  location.href = "<?php echo U('Home/AlterPassword/index');?>";
                }
            });
            return false;
        }
    });
</script>