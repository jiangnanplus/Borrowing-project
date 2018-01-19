<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title>订单详情</title>
    <link rel="stylesheet" href="/xm/Public/Home/css/index.css" type="text/css">
    <link rel="stylesheet" href="/xm/Public/Home/css/orderdetails01.css">
    <link rel="stylesheet" type="text/css" href="/xm/Public/Home/css/orderdetails02.css">
    <script src="/xm/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <style>
        .site-header .site-logo .event-yeelight-2015{position:absolute;left:75px;top:-25px;z-index:2;width:165px;margin:0;height:108px;}
        ul{margin:0px;padding:0px;}
        li{list-style:none;}
        .current{border:0px;}
        .hide{display:none;}
        .xm-edit-addr-box{
            /*display:none;*/
            position:relative;
            background:#fff;
            border:1px solid #ff4a00;
            left: 323px;
            top: 306px;
            width: 300px;
            z-index: 10;
            /*z-index:1050*/
        }
        .icon-safe-level {
            height: 11px;
            position: relative;
            top: 1px;
            width: 61px;
        }
        .rt{display:none;}
        .uc-address-edit-section{
            left: 343px;
            position: absolute;
            top: 306px;
            width: 300px;
            z-index: 10;
        }
        .icon-stat {
            background-image: url("/xm/Public/Home/image/icon-stat.png");
            background-repeat: no-repeat;
            display: inline-block;
            height: 14px;
            overflow: hidden;
            /*width: 65px;*/
        }
        /*已经评论*/
        .noha{display:none;}
        .uc-home-box .box-bd {
            margin: 0 0px;
        }
    </style>

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
	
	<div class="site-header container">
		<div class="site-logo">
			<a class="logo" title="小米官网" href="<?php echo U('Home/Index/index');?>">
			</a>
		</div>
		<div class="header-info">
			<div class="search-section">
				<form id="J_searchForm" class="search-form clearfix" method="get" action="<?php echo U('Home/List/index');?>">
				<input class="search-text" type="search" placeholder="搜索您需要的商品" name="title">
				<input class="search-btn iconfont" type="submit" value="">
				<div class="hot-words">
					<a href="<?php echo U('Home/List/index');?>?title=米兔">米兔</a>
					<a href="<?php echo U('Home/List/index');?>?title=耳机">耳机</a>
					<a href="<?php echo U('Home/List/index');?>?title=防尘塞">防尘塞</a>
				</div>
				<div id="J_keywordList" class="keyword-list" style="">
					<ul class="result-list">
					<li data-key="体重秤">
					<a href="">体重秤</a>
					</li>
					<li data-key="盒子">
					<a href="">盒子</a>
					</li>
					<li data-key="净化器">
					<a href="" id="aa">净化器</a>
					</li>
					<li data-key="移动电源">
					<a href="">移动电源</a>
					</li>
					<li data-key="随身风扇">
					<a href="">随身风扇</a>
					</li>
					<li data-key="米健">
					<a href="">米健</a>
					</li>
					<li data-key="充电器">
					<a href="">充电器</a>
					</li>
					<li data-key="手机支架">
					<a href="">手机支架</a>
					</li>
					<li data-key="套装">
					<a href="">套装</a>
					</li>
					</ul>
				</div>
				</form>
			</div>
			<!--搜索栏的js效果-->
			<script type="text/javascript">
				//获取输入框
				var search=$('input[name=title]');
				//失去焦点
				search.blur(function(){
					$('.hot-words').show();
					$('#J_keywordList').fadeOut();
				})
				//获取焦点
				search.focus(function(){
					$('.hot-words').hide();
					$('#J_keywordList').show();
				})
				//放上去的事件
				$('.result-list').children().mouseover(function(){
					$(this).addClass('current').siblings().removeClass('current');
					var searchtext=$(this).children('a').text();
					$(this).children('a').attr('href',"/xm/index.php/Home/List/index.html?title="+searchtext);
					//window.location.href="<?php echo U('Home/List/index');?>";
				})



				//点击事件
				$('.result-list').children().click(function(){
					window.location.href="<?php echo U('Home/List/index');?>";
				})
				
				
				
			</script>
			<div class="cart-section">
				<a id="J_miniCart" class="mini-cart" href="<?php echo U('Home/Cart/index');?>">
				<i class="iconfont"></i>
					购物车
				<span class="mini-cart-num J_cartNum"></span>
				</a>
				<div id="J_miniCartList" class="mini-cart-list" style="display: none;">
					<p class="loading">数据加载中，请稍后...</p>
					<ul id="list" style="display: none;"></ul>
					<div id="tongji" class="count clearfix" style="display: none;">
						<span class="total">
						共计
						<em id="total_number">1</em>
						件商品
						<strong>
						合计：
						<em id="total_money">39.00元</em>
						</strong>
						</span>
						<a class="btn btn-primary" href="<?php echo U('Home/Cart/index');?>">去购物车结算</a>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			$(function(){
				//购物车js
				$('.cart-section').hover(function(){
					$('#J_miniCart').addClass('mini-cart-on');
					$('#J_miniCartList').show();
				},function(){
					$('#J_miniCart').removeClass('mini-cart-on');
					$('#J_miniCartList').hide();
				});

				//鼠标放上去的事件
				
				// $('#J_miniCart').hover(function(){
				// 	$(this).addClass('mini-cart-on');
				// 	$('#J_miniCartList').show();
				// },function(){
				// 	$(this).removeClass('mini-cart-on');
				// 	$('#J_miniCartList').hide();
				// });
				//ajax查询数量和商品
	  			do_cat();

	  			

				//事件委托的形式添加事件

				$("#J_miniCartList #list").on('click',".btn-del",function(){
				    var goods_id=$(this).next('input').val();
					var parent_li=$(this).closest('li');
					//ajax的形式删除元素
					$.ajax({
					    url:"<?php echo U('Home/SmallCat/delGoods');?>",
						type:'POST',
						data:{
						    'goods_id':goods_id,
						},
						dataType:'json',
						success:function(responseText,status,xhr){
						    if(status=='success'){
							    //返回1 说明session 中删除成功!
							    if(responseText.del_status==1){
								    
									//删除此条信息
									   
									parent_li.remove();
									//修改金额和总数量
									$(".mini-cart-num").html("("+responseText.total_num+")");
									$("#J_miniCartList #total_number").html(responseText.total_num);
									$("#J_miniCartList #total_money").html(responseText.total_money.toFixed(2));
					                var lis=$("#J_miniCartList #list li").size();
									 
									if(lis<=0){
									   $(".mini-cart-num").html('');
							           $("#J_miniCartList #list").hide();
							           $("#J_miniCartList #tongji").hide();
							           $("#J_miniCartList .loading").show();
									 
									}else{
									 
									 
									}
									
								 
								}
							}
						 
						}
						 
					  
					  
					  
					});
					  
				});
			});
			</script>
		</div>
		<div class="header-nav clearfix">
			<div id="J_categoryContainer" class="nav-category nav-category-toggled">
				<a class="btn-category-list" href="<?php echo U('Home/List/index');?>">全部商品分类</a>
				<div class="nav-category-section" id="nav-category-section">
					<ul class="nav-category-list">
						<?php if(is_array($class)): foreach($class as $key=>$vo): ?><li class="nav-category-item">
						<div class="nav-category-content">
							<a class="title" href="<?php echo U('Home/List/index');?>?cid=<?php echo ($vo['cid']); ?>"><?php echo ($vo['name']); ?></a>
							
							<div class="links">
							<?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$vi): ?><a href="<?php echo U('Home/List/index');?>?cid=<?php echo ($vi['cid']); ?>"><?php echo ($vi['title']); ?></a><?php endforeach; endif; ?>
							</div>

							<div class="nav-category-children">
								<ul class="children-list">
									<?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$pic): ?><li>
										<a href="<?php echo U('Home/List/index');?>?cid=<?php echo ($pic['cid']); ?>">
											<img class="img-loaded" width="40" height="40" alt="<?php echo ($pic['title']); ?>" src="/xm/Public/Upload/Image/<?php echo ($pic['pic']); ?>">
											<span class="text"><?php echo ($pic['title']); ?></span>
										</a>
									</li><?php endforeach; endif; ?>
								</ul>
							</div>
						</div>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				
				//放上去的事件
				$('.nav-category-list').children('li').hover(function(){
					$(this).addClass('current').siblings().removeClass('current');
				},function(){
					$(this).removeClass('current');
				})
			</script>
			<div class="nav-main">
				<ul class="nav-main-list J_menuNavMain clearfix">
					<li class="nav-main-item">
						<a href="<?php echo U('Home/Index/index');?>">
						<span class="text">首页</span>
						</a>
					</li>
					<li class="nav-main-item">
						<a href="javascript:void(0);">
						<span class="text">小米手机</span>
						<span class="arrow"></span>
						</a>
						<div class="nav-main-children" style="display: none;">
							<ul class="children-list clearfix">
								<li class="first">
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=1">
										<span class="title" style="font-size:20px;">小米Note</span>
										<span class="desc">大屏旗舰，HiFi 双卡双待</span>
										<span class="price">
											<b>1999</b>
											元起
										</span>
										<span class="thumb">
											<img width="160" height="160" alt="小米Note" src="/xm/Public/Home/image/nav-phone-minote.jpg">
										</span>
										<span class="desc">双网通16GB直降300</span>
									</a>
								</li>
								<li>
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=2">
									<span class="title" style="font-size:20px;">小米手机4</span>
									<span class="desc">工艺和手感，超乎想象</span>
									<span class="price">
										<b>1499</b>
										元
									</span>
									<span class="thumb">
										<img width="160" height="160" alt="小米手机4" src="/xm/Public/Home/image/nav-phone-mi4.jpg">
									</span>
									<span class="desc">旗舰特价直降200</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-main-item">
						<a href="javascript:void(0);">
							<span class="text">红米</span>
							<span class="arrow"></span>
						</a>
						<div class="nav-main-children" style="display: none;">
							<ul class="children-list clearfix">
								<li class="first children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=3">
										<span class="thumb">
										<img width="140" height="140" alt="红米手机2A" src="/xm/Public/Home/image/nav-phone-hongmi2a-more.jpg">
										</span>
										<span class="title">红米手机2A 4G版</span>
										<span class="desc">4.7英寸屏 / 联芯四核 / 双卡双待</span>
										<span class="price">
										无敌价：
										<b>499</b>
										元
										</span>
									</a>
								</li>
								<li class="children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=4">
									<span class="thumb">
									<img width="140" height="140" alt="红米手机2" src="/xm/Public/Home/image/nav-phone-hongmi2-more.jpg">
									</span>
									<span class="title">红米手机2 4G版</span>
									<span class="desc">4.7英寸屏 / 64位性能 / 双卡双待</span>
									<span class="price">
									<b>599</b>
									元起，特惠100！
									</span>
									</a>
								</li>
								<li class="children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=5">
									<span class="thumb">
									<img width="140" height="140" alt="红米Note" src="/xm/Public/Home/image/nav-phone-hongminote-more.jpg">
									</span>
									<span class="title">红米Note 4G版</span>
									<span class="desc">5.5英寸屏 / 64位性能 / 双卡双待</span>
									<span class="price">
									直降100
									<b>699</b>
									元起
									</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-main-item">
					<a href="<?php echo U('Home/List/index');?>?title=小米平板">
					<span class="text">小米平板</span>
					</a>
					</li>
					<li class="nav-main-item">
					<a href="javascript:void(0);">
					<span class="text">小米电视</span>
					<span class="arrow"></span>
					</a>
						<div class="nav-main-children" style="display: none;">
							<ul class="children-list clearfix">
								<li class="first children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=6">
									<span class="thumb">
									<img width="140" height="140" alt="小米电视2 40英寸" src="/xm/Public/Home/image/nav-phone-mitv40-more.jpg">
									</span>
									<span class="title">小米电视2 40英寸</span>
									<span class="desc">超级性价比智能电视</span>
									<span class="price">
									<b>1999</b>
									元
									</span>
									</a>
								</li>
								<li class="children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=7">
									<span class="thumb">
									<img width="140" height="140" alt="小米电视2 49英寸" src="/xm/Public/Home/image/nav-phone-mitv49-more.jpg">
									</span>
									<span class="title">小米电视2 49英寸</span>
									<span class="desc">领先的49英寸4K电视</span>
									<span class="price">
									<b>3399</b>
									元起
									</span>
									</a>
								</li>
								<li class="children-list-more">
									<a class="item-detail J_item-detail-more" href="<?php echo U('Home/List/index');?>?gid=8">
									<span class="thumb">
									<img width="140" height="140" alt="小米电视2 55英寸" src="/xm/Public/Home/image/nav-phone-mitv55-more.jpg">
									</span>
									<span class="title">小米电视2 55英寸</span>
									<span class="desc">旗舰4K电视 家庭影院版</span>
									<span class="price">
									<b>4999</b>
									元
									</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-main-item">
						<a href="javascript:void(0);">
						<span class="text">盒子</span>
						<span class="arrow"></span>
						</a>
						<div class="nav-main-children" style="display: none;">
							<ul class="children-list clearfix">
								<li class="first">
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=9">
									<span class="title">小米盒子mini版</span>
									<span class="desc">全球最小全高清网络机顶盒</span>
									<span class="price">
									<b>199</b>
									元
									</span>
									<span class="thumb">
									<img width="160" height="160" alt="小米盒子mini版" src="/xm/Public/Home/image/nav-phone-hezimini.jpg">
									</span>
									</a>
								</li>
								<li>
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=10">
									<span class="title">小米盒子 增强版</span>
									<span class="desc">首款4K超高清网络机顶盒</span>
									<span class="price">
									<b>299</b>
									元
									</span>
									<span class="thumb">
									<img width="160" height="160" alt="小米盒子增强版" src="/xm/Public/Home/image/nav-hezis.jpg">
									</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-main-item">
						<a href="javascript:void(0);">
						<span class="text">路由器</span>
						<span class="arrow"></span>
						</a>
						<div class="nav-main-children" style="display: none;">
							<ul class="children-list clearfix">
								<li class="first">
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=12">
									<span class="title">全新小米路由器</span>
									<span class="desc">
									顶配企业级性能
									<br>
									最高内置6TB监控级硬盘
									</span>
									<span class="price">
									<b>699</b>
									元起
									</span>
									<span class="thumb">
									<img width="160" height="160" alt="小米路由器" src="/xm/Public/Home/image/nav-miwifi-router.jpg">
									</span>
									</a>
								</li>
								<li>
									<a class="item-detail" href="<?php echo U('Home/List/index');?>?gid=13">
									<span class="title">小米路由器 mini</span>
									<span class="desc">
									主流双频AC智能路由器
									<br>
									性价比之王
									</span>
									<span class="price">
									<b>129</b>
									元
									</span>
									<span class="thumb">
									<img width="160" height="160" alt="小米路由器 mini" src="/xm/Public/Home/image/T1XsATBCLT1RXrhCrK160x160.jpg">
									</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-main-item">
					<a href="">
					<span class="text">合约机</span>
					</a>
					</li>
					<li class="nav-main-item">
					<a href="">
					<span class="text">服务</span>
					</a>
					</li>
					<li class="nav-main-item">
					<a href="">
					<span class="text">社区</span>
					</a>
					</li>
				</ul>
			</div>
			<script type="text/javascript">
				//标题栏的js
				//鼠标放上去事件
				var de;
				$('.nav-main ul .nav-main-item').hover(function(){
					var ss=$(this);
					de=setTimeout(function(){
					ss.addClass('current').siblings().removeClass('current');
					ss.find('.nav-main-children').slideDown('fast');
					},200);
				},function(){
					clearTimeout(de);
					$(this).find('.nav-main-children').slideUp(500);
					$(this).removeClass('current');
				})
			</script>
		</div>
		<div class="open-buy-info">
			<a href="">7月7日开放购买</a>
		</div>
	</div>
	
	
	<!--logo,搜索，以及标题栏-->
	<!--商品内容部分开始-->
	

<!-- 用户详情页主体内容start -->
<div class="container breadcrumbs">
    <a href="<?php echo U('Home/Index/index');?>">首页</a><span class="sep">/</span><span>订单详情</span></div>
<!-- .breadcrumbs END -->

<div class="container">
    <div class="uc-full-box">
        <div class="row">
            <!-- .span4 START -->
            <div class="span4" style="margin-top:18px">
               <div class="order-delivery-address" style="width:225px;padding:2px 10px 20px; background: none repeat scroll 0 0 #fafafa;font-size:13px;font-family:microsoft yahei;color: #333;">
                    <div id="changeAddress" class="order-text-section">
                        <h4 style="color: #8c8c8c;">收货信息 </h4>
                        <table class="order-text-table">
                            <tbody>
                                <tr>
                                    <th>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</th>
                                    <td><?php echo ($addressInfo['consignee']); ?></td>
                                </tr>
                                <tr>
                                    <th>收货地址：</th>
                                    <td><?php echo ($provinces); ?> <?php echo ($addressInfo['site']); ?></td>
                                </tr>
                                <tr>
                                    <th>联系电话：</th>
                                    <td><?php echo ($addressInfo['telephone']); ?></td>
                                </tr>
                                <tr>
                                    <th>支付方式：</th>
                                    <td>在线支付</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr style="margin-top:12px;color:#83bd39;">
                    <div class="order-text-section">
                        <h4 style="color: #8c8c8c;">发票信息</h4>
                        <table class="order-text-table">
                            <tbody><tr><th>发票类型：</th><td>普通发票</td></tr>
                                <tr><th>发票抬头：</th><td>个人</td></tr>
                                <tr><th>发票内容：</th><td>购买商品明细</td></tr>
                             </tbody>
                        </table>
                    </div>
                    <hr style="margin-top:12px;color:#83bd39;">
                    <div class="order-text-section">
                        <h4 style="color: #8c8c8c;">送货时间 </h4>
                        <div id="changeBesttime" class="order-text-section">
                            <div id="timeSection" class="order-delivery-time">不限送货时间</div>
                        </div>
                    </div>
                    <div class="order-text-section"></div>
                </div>
            </div>
            <!-- .span4 END -->
            <!-- .span16 START -->
            <div class="span16">
                <div class="xm-line-box uc-box uc-order-detail-box">
                    <div class="box-hd">
                        <h3 class="title">订单号：<?php echo ($orderdeInfo['onumber']); ?></h3>
                    </div>
                    <div class="box-bd">
                        <div class="order-tip">
                            <p>小米公司不会以任何理由要求您提供银行卡信息或支付额外费用，请谨防钓鱼链接或诈骗电话。<a href="#">了解更多»</a></p>
                        </div>
                        <div class="order-detail-tables">
                            <table class="order-detail-table">
                                <thead>
                                    <tr>
                                        <th class="column-info" colspan="4">
                                            <div class="column-content">
                                                发货单号：114082146006573601                                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="column-detail">
                                            <ul class="order-goods-list">
	                                            <?php if(is_array($gInfo)): foreach($gInfo as $key=>$vo): ?><li class="">
	                                                    <a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><img class="goods-thumb" src="/xm/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>" alt=""></a>
	                                                    <a target="_blank" href="" class="goods-name"><?php echo ($vo['title']); ?></a>
	                                                    <span class="goods-price"><?php echo ($vo['nowprice']); ?>元</span>
	                                                    <span class="goods-link"></span>
	                                                    <span class="goods-amount">x <?php echo ($vo['number']); ?></span>
	                                                </li><?php endforeach; endif; ?>
                                            </ul>
                                        </td>
                                        <td class="column-price">
                                            <!--<div class="order-info order-price">1171.6元</div>-->
                                            <div class="order-info order-price">
                                            	<?php switch($orderdeInfo['status']): case "0": ?>等待支付<?php break;?>    
	                                                <?php case "1": ?>已支付<?php break;?> 
	                                                <?php case "2": ?>已发货<?php break;?>    
	                                                <?php case "3": ?>已收货<?php break;?>    
	                                                <?php default: ?>未支付<?php endswitch;?>
                                            </div>
                                        </td>
                                        <td class="column-date">
                                            <div class="order-info order-date"><?php echo date("Y-m-d",$orderdeInfo['otime']);?><br><?php echo date("H:i:s",$orderdeInfo['otime']);?></div>
                                        </td>
                                        <td class="column-action">
                                            <div class="order-info order-action">
                                                <a href="#">申请售后<i class="iconfont"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="column-delivery" colspan="4">
                                            <div class="order-delivery-status">
                                                <div class="order-delivery-container">
                                                    <div class="delivery-status-info">
                                                        <span>物流信息：</span>
                                                            <a href="#" target="_blank">EMS(北京)</a> 1118304029403                                    
                                                    </div>
                                                    <div class="more">
                                                        <a class="J_checkDelivery" href="#">查看物流信息<i class="iconfont"></i></a>
                                                    </div>
                                                    <div class="delivery-status hide">
                                                        <div class="delivery-status-info">
                                                            <span>
                                                                <a href="#" target="_blank">EMS(北京)</a>                                            
                                                            </span>
                                                            运单号：1118304029403                                        
                                                        </div>
                                                        <div class="delivery-status-detail">
                                                            <p>正在加载……</p>
                                                        </div>
                                                        <span class="arrow"></span>
                                                    </div>
                                                </div>
                                                <ol class="order-delivery-steps clearfix">
                                                    <li class="step step-first step-done">
                                                        <div class="progress">
                                                            <span class="text">下单</span>
                                                        </div>
                                                        <div class="info">
                                                            2014年08月21日<br>15时39分                                        
                                                        </div>
                                                    </li>
                                                    <li class="step step-done">
                                                        <div class="progress">
                                                            <span class="text">付款</span>
                                                        </div>
                                                        <div class="info">
                                                            2014年08月21日<br>15时42分                                        
                                                        </div>
                                                    </li>
                                                    <li class="step step-done">
                                                        <div class="progress">
                                                            <span class="text">配货</span>
                                                        </div>
                                                        <div class="info">
                                                            2014年08月21日<br>15时45分                                        
                                                        </div>
                                                    </li>
                                                    <li class="step step-done">
                                                        <div class="progress">
                                                            <span class="text">出库</span>
                                                        </div>
                                                        <div class="info">
                                                            2014年08月23日<br>13时38分                                        
                                                        </div>
                                                    </li>
                                                    <li class="step step-now step-last">
                                                        <div class="progress">
                                                            <span class="text">交易成功</span>
                                                        </div>
                                                        <div class="info">
                                                            2014年08月28日<br>11时07分                                        
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="order-detail-total clearfix">
                                <dl class="total-list">
                                    <dt>商品总价：</dt>
                                    <dd>
                                    <?php if(($orderdeInfo['money']) <= "100"): echo ($orderdeInfo['money']- 10); ?>
                                    <?php else: ?>
                                    <?php echo ($orderdeInfo['money']); endif; ?>.00元
                                    </dd>
                                    <dt>优惠金额：</dt>
                                    <dd>0元</dd>
                                    <dt>运费：</dt>
                                    <dd><?php if(($orderdeInfo['money']) <= "100"): ?>10<?php else: ?>0<?php endif; ?>元</dd>
                                    <dt>实付金额：</dt>
                                    <dd>
                                        <div class="price price-special">
                                            <b><?php echo ($orderdeInfo['money']); ?>.00</b>元
                                        </div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .span16 END -->

        </div>
    </div>
</div>

<!-- 用户详情页主体内容end -->


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
						<a title="mi.com" target="_blank" href="">mi.com</a>
						京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号
						<a target="_blank" href="">京网文[2014]0059-0009号</a>
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