<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>订单支付</title>
	<link rel="stylesheet" href="/xm/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="/xm/Public/Home/css/buyConfirm.css" type="text/css">

	<script type="text/javascript" src="/xm/Public/Home/js/jquery-1.8.3.js"></script>
	<script type="text/javascript">
		function do_cat(){
					$.ajax({
					     
						url:"<?php echo U('Home/SmallCat/myGoods');?>",
						type:'GET',
						dataType:'json',
						success:function(responseText,status,xhr){
						    if(status=="success"){
							     if(responseText.cat_status==1){
								     $(".mini-cart-num").html("("+responseText.content.total_nums+")");
									 $("#J_miniCartList .loading").hide();
									 $("#J_miniCartList #list").show();
									 $("#J_miniCartList #list").html(responseText.info);
									 $("#J_miniCartList #tongji").show();
									 $("#J_miniCartList #total_number").html(responseText.content.total_nums);
									 $("#J_miniCartList #total_money").html(responseText.content.total_price.toFixed(2));
									 
								 }else{
								  $(".mini-cart-num").html('');
							      $("#J_miniCartList #list").hide();
							      $("#J_miniCartList #tongji").hide();
							      $("#J_miniCartList .loading").show();
								 
								 }
							 
							 }else{
							  $(".mini-cart-num").html('');
							  $("#J_miniCartList #list").hide();
							  $("#J_miniCartList #tongji").hide();
							  $("#J_miniCartList .loading").show();
							 
							 }
						   
						 },
						 error:function(){
						     $(".mini-cart-num").html('');
							 $("#J_miniCartList #list").hide();
							 $("#J_miniCartList #tongji").hide();
							 $("#J_miniCartList .loading").show();
						 },
						 timeout:60*1000,
					 
					 
					 
					 
					 
					 
					 
					 });
				 
				} 
	</script>
	<link rel="shortcut icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/xm/Public/Home/image/favicon.ico" type="image/x-icon">
</head>
<body>
	<!--顶部条开始-->
	
	<div class="site-topbar">
		<div class="container">
			<div class="topbar-nav">
				<a href="">小米网</a>
				<span class="sep">|</span>
				<a href="">MIUI</a>
				<span class="sep">|</span>
				<a href="">米聊</a>
				<span class="sep">|</span>
				<a href="">游戏</a>
				<span class="sep">|</span>
				<a href="">多看阅读</a>
				<span class="sep">|</span>
				<a href="">云服务</a>
				<span class="sep">|</span>
				<a href="">小米网移动版</a>
				<span class="sep">|</span>
				<a href="">Select region</a>
				<span class="sep">|</span>
			</div>
			<?php if(!empty($_SESSION['uid'])): ?><div class="topbar-info J_userInfo">欢迎您 
				<b class="user-name"><?php echo ($_SESSION['ssid']); ?><span class="arrow"></span></b>
				<span class="sep">|</span>
				<a href="<?php echo U('Home/UserCenter/index');?>?dingdanli=dingdan">我的订单</a>
				<span class="sep">|</span>
				<a target="_blank" href="<?php echo U('Home/AccountInfo/index');?>">我的小米账户</a>
				<div class="user-info-menu" style="display: none;">
					<ul>
						<li><a target="_blank" href="<?php echo U('Home/UserCenter/index');?>">个人中心</a></li>
						<li><a href="<?php echo U('Home/UserCenter/index');?>?shoucangli=shoucang">我的收藏</a></li>
						<li><a href="<?php echo U('Home/Login/logout');?>">退出登录</a></li>
					</ul>
					<span class="menu-arrow"></span>
				</div>
			</div>
			<?php else: ?>
			<div class="topbar-info J_userInfo">
				<a href="<?php echo U('Home/Login/index');?>">登录</a>
				<span class="sep">|</span>
				<a href="<?php echo U('Home/Register/index');?>">注册</a>
			</div><?php endif; ?>
			<!-- 个人中心,收藏和退出登录的显隐 -->
			<script type="text/javascript">
				// $('.user-name').hover(function(){
				// 	$('.user-info-menu').slideDown(200);
				// },function(){
				// 	// $('.user-info-menu').slideUp(200);
				// });
				// function dohide(){
				// 	$('.user-name').mouseout(function(){
				// 		$('.user-info-menu').hide();
				// 	})
				// }

				function doshow(){
					$('.user-info-menu').hover(function(){
					$('.user-info-menu').show();
					},function(){
					$('.user-info-menu').hide();
					})
				}
				doshow();
				$('.user-name').mouseover(function(){
					$('.user-info-menu').show();
				})
				
				// $('.user-name').mouseout(function(){
				// 	$('.user-info-menu').fadeOut(1000);
				// })
			</script>
		</div>
	</div>
	<!--顶部条开始-->
	<!--logo,搜索，以及标题栏-->
	
	<!--logo-->
	<div class="site-header site-mini-header container">
		<div class="span4">
			<div class="site-logo">
			<a class="logo " title="小米官网" href="<?php echo U('Home/Index/index');?>">
			</a>
			</div>
		</div>
	</div>
	<!--logo-->

	
	<!--logo,搜索，以及标题栏-->
	<!--商品内容部分开始-->
	
	<!--内容开始-->
	<div class="container payment-con">
		<form id="pay-form" method="post" action="<?php echo U('Home/Payment/index');?>" target="">
			<div class="order-info">
				<div class="msg">
					<h3>您的订单已提交成功！付款咯～</h3>
					<p></p>
					<p class="post-date">成功付款后，7天发货</p>
				</div>
				<div class="info">
					<p>
					金额：
					<span class="pay-total"><?php echo ($order_info["money"]); ?></span>
					</p>
					<p> 订单：<?php echo ($order_info["onumber"]); ?> </p>
					<p>
					配送：<?php echo ($address_info['consignee']); ?>
					<span class="line">/</span> 
					<?php echo ($address_info['telephone']); ?>  
					<span class="line">/</span>
					<?php echo ($arr[$address_info['province']]); ?>,<?php echo ($address_info['site']); ?>
					<span class="line">/</span>
					<?php switch($order_info['posttime']): case "1": ?>不限送货时间<?php break;?>
					<?php case "2": ?>工作日送货<?php break;?>
					<?php case "3": ?>双休日假日送货<?php break; endswitch;?>
					<span class="line">/</span>
					<?php switch($order_info['invoice']): case "1": ?>电子发票（非纸质）:&nbsp;<?php break;?>
					<?php case "2": ?>普通发票（纸质）:&nbsp;<?php break; endswitch;?>
					<?php switch($order_info['invoicetype']): case "1": ?>&nbsp;个人<?php break;?>
					<?php case "2": ?>&nbsp;单位:&nbsp;&nbsp;<?php break; endswitch;?>
					<?php echo ($order_info['invoicetitle']); ?>
					</p>
				</div>
				<div class="icon-box">
					<i class="iconfont"></i>
				</div>
			</div>
			<div class="xm-plain-box">
				<div class="box-hd bank-title clearfix">
					<div id="titleWrap" class="title-wrap">
						<h2 class="title">选择支付方式</h2>
						<span class="tip-tag"></span>
					</div>
				</div>
				<div id="bankList" class="box-bd">
					<div class="payment-bd">
						<dl class="clearfix payment-box">
							<dt>
							<strong>支付平台</strong>
							<p>手机等大额支付推荐使用支付宝快捷支付</p>
							</dt>
							<dd>
								<ul class="payment-list clearfix">
									<li>
										<label for="micash">
										<input id="micash" type="radio" value="alipay" name="payOnlineBan" checked="checked">
										<img alt="" src="/xm/Public/Home/image/payOnline_zfb.gif">
										</label>		
									</li>
									<li>
										<label for="micash">
										<input id="micash" type="radio" value="micash" name="payOnlineBank" >
										<img alt="" src="/xm/Public/Home/image/micash.gif">
										</label>
										
									</li>
									<li style="padding-top:20px;">
									<b>账户余额：<?php echo ($money); ?></b>
									</li>
								</ul>
							</dd>
						</dl>
						
					</div>
				</div>
				<div class="box-ft clearfix">
				<input id="payBtn" class="btn btn-primary" type="submit" value="下一步">
				<a class="btn btn-lineDakeLight" href="javascript:history.back();">修改订单</a>
				</div>
			</div>
		</form>
	</div>
	<!--内容结束-->

	<!--商品内容部分结束-->
	<!--底部开始-->
	
	<div class="site-footer">
		<div class="container">
			<div class="footer-service">
				<ul class="list-service clearfix">
					<li>
						<a target="_blank" href="" rel="nofollow">
						<i class="iconfont"></i>
						<strong>1小时快修服务</strong>
						</a>
					</li>
					<li>
						<a target="_blank" href="" rel="nofollow">
						<i class="iconfont"></i>
						<strong>七天无理由退货</strong>
						</a>
					</li>
					<li>
						<a target="_blank" href="" rel="nofollow">
						<i class="iconfont"></i>
						<strong>15天免费换货</strong>
						</a>
					</li>
					<li>
						<a target="_blank" href="" rel="nofollow">
						<i class="iconfont"></i>
						<strong>满150元包邮</strong>
						</a>
					</li>
					<li>
						<a target="_blank" href="" rel="nofollow">
						<i class="iconfont"></i>
						<strong>520余家售后网点</strong>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer-links clearfix">
				<dl class="col-links col-links-first">
					<dt>帮助中心</dt>
					<dd>
					<a target="_blank" href="" rel="nofollow">购物指南</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">支付方式</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">配送方式</a>
					</dd>
				</dl>
				<dl class="col-links">
					<dt>服务支持</dt>
					<dd>
					<a target="_blank" href="" rel="nofollow">售后政策</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">自助服务</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">相关下载</a>
					</dd>
				</dl>
				<dl class="col-links">
					<dt>小米之家</dt>
					<dd>
					<a target="_blank" href="" rel="nofollow">小米之家</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">服务网点</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">预约亲临到店服务</a>
					</dd>
				</dl>
				<dl class="col-links">
					<dt>关于小米</dt>
					<dd>
					<a target="_blank" href="" rel="nofollow">了解小米</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">加入小米</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">联系我们</a>
					</dd>
				</dl>
				<dl class="col-links">
					<dt>关注我们</dt>
					<dd>
					<a target="_blank" href="" rel="nofollow">新浪微博</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">小米部落</a>
					</dd>
					<dd>
					<a target="_blank" href="" rel="nofollow">官方微信</a>
					</dd>
				</dl>
				<div class="col-contact">
					<p class="phone">400-100-5678</p>
					<p>
					周一至周日 8:00-18:00
					<br>
					（仅收市话费）
					</p>
					<a class="btn btn-primary btn-small" target="_blank" href="" rel="nofollow">24小时在线客服</a>
				</div>
			</div>
			<div class="footer-info clearfix">
				<div class="info-text">
					<p>
						小米旗下网站：
						<a target="_blank" href="">小米网</a>
						<span class="sep">|</span>
						<a target="_blank" href="">MIUI</a>
						<span class="sep">|</span>
						<a target="_blank" href="">米聊</a>
						<span class="sep">|</span>
						<a target="_blank" href="">多看书城</a>
						<span class="sep">|</span>
						<a target="_blank" href="">小米路由器</a>
						<span class="sep">|</span>
						<a target="_blank" href="">繁體香港</a>
						<span class="sep">|</span>
						<a target="_blank" href="">繁體台灣</a>
						<span class="sep">|</span>
						<a target="_blank" href="">English</a>
						<span class="sep">|</span>
						<a target="_blank" href="">小米后院</a>
						<span class="sep">|</span>
						<a target="_blank" href="">小米天猫店</a>
						<span class="sep">|</span>
						<a target="_blank" href="">小米淘宝直营店</a>
						<span class="sep">|</span>
						<a target="_blank" href="">小米网盟</a>
					</p>
					<p>
						&copy;
						<a title="www.yixiangtuwen.com" target="_blank" href="www.yixiangtuwen.com">www.yixiangtuwen.com</a>
						意象图文网络工作室版权所有
					</p>
				</div>
				<div class="info-sites J_globalList">
					<div class="global-site-current">简体中文</div>
					<span class="arrow"></span>
					</div>
				<div class="info-links">
					<a target="_blank" href="">
					<img alt="可信网站" src="/xm/Public/Home/image/cnnicVerifyseal.png">
					</a>
					<a target="_blank" href="">
					<img alt="诚信网站" src="/xm/Public/Home/image/szfwVerifyseal.gif">
					</a>
					<a target="_blank" href="">
					<img alt="网上交易保障中心" src="/xm/Public/Home/image/save.jpg">
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<!--底部结束-->
</body>
</html>