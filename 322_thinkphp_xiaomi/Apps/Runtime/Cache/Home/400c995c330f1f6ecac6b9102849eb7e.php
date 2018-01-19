<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>小米官网——小米手机、红米手机、小米电视官方正品专卖网站</title>
	<link rel="stylesheet" href="/322_thinkphp_xiaomi/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="/322_thinkphp_xiaomi/Public/Home/css/index.css" type="text/css">
	<style type="text/css">
		#nav-category-section{display: block;}
	</style>
	
	<script type="text/javascript" src="/322_thinkphp_xiaomi/Public/Home/js/jquery-1.8.3.js"></script>
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
	<link rel="shortcut icon" href="/322_thinkphp_xiaomi/Public/Home/image/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/322_thinkphp_xiaomi/Public/Home/image/favicon.ico" type="image/x-icon">
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
	<block name="logo">
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
											<img class="img-loaded" width="40" height="40" alt="<?php echo ($pic['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Image/<?php echo ($pic['pic']); ?>">
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
											<img width="160" height="160" alt="小米Note" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-minote.jpg">
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
										<img width="160" height="160" alt="小米手机4" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-mi4.jpg">
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
										<img width="140" height="140" alt="红米手机2A" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-hongmi2a-more.jpg">
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
									<img width="140" height="140" alt="红米手机2" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-hongmi2-more.jpg">
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
									<img width="140" height="140" alt="红米Note" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-hongminote-more.jpg">
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
									<img width="140" height="140" alt="小米电视2 40英寸" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-mitv40-more.jpg">
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
									<img width="140" height="140" alt="小米电视2 49英寸" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-mitv49-more.jpg">
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
									<img width="140" height="140" alt="小米电视2 55英寸" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-mitv55-more.jpg">
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
									<img width="160" height="160" alt="小米盒子mini版" src="/322_thinkphp_xiaomi/Public/Home/image/nav-phone-hezimini.jpg">
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
									<img width="160" height="160" alt="小米盒子增强版" src="/322_thinkphp_xiaomi/Public/Home/image/nav-hezis.jpg">
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
									<img width="160" height="160" alt="小米路由器" src="/322_thinkphp_xiaomi/Public/Home/image/nav-miwifi-router.jpg">
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
									<img width="160" height="160" alt="小米路由器 mini" src="/322_thinkphp_xiaomi/Public/Home/image/T1XsATBCLT1RXrhCrK160x160.jpg">
									</span>
									</a>
								</li>
							</ul>
						</div>
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
	
	</block>
	<!--logo,搜索，以及标题栏-->
	<!--商品内容部分开始-->
	
	<div class="container">
		<!--轮播部分开始-->
		<div class="row">
			<div class="col col-16 offset4">
				<div class="home-slider">
					<div id="J_homeSlider" class="xm-slider" style="overflow: hidden;">
						<div class="xm-slider-container" style="overflow: hidden; position: relative; width: 992px; height: 420px;">
							<div id="lunbo" class="xm-slider-control" style="position: relative; left: 0px; width: 992px; height: 420px;">
								<!--首页轮播图片布局开始-->
								<div class="slide xm-slider-slide" style="position: absolute; top: 0px; width: 100%; display: block; left: 0px; z-index: 2;" xm-slider-index="0">
									<a href="#">
									<img alt="小米note顶配版本现货购买" src="/322_thinkphp_xiaomi/Public/Home/image/T1VIhgBvxT1RXrhCrK.jpg">
									</a>
								</div>
								<div class="slide xm-slider-slide" style="position: absolute; top: 0px; width: 100%; display: none; left: 0px;" xm-slider-index="1">
									<a href="#">
									<img alt="小米note旗舰特价" src="/322_thinkphp_xiaomi/Public/Home/image/T1edV_BTYT1RXrhCrK.jpg">
									</a>
								</div>
								<div class="slide xm-slider-slide" style="position: absolute; top: 0px; width: 100%; display: none; left: 0px;" xm-slider-index="2">
									<a href="#">
									<img alt="全网通预约" src="/322_thinkphp_xiaomi/Public/Home/image/T128b_BvbT1RXrhCrK.jpg">
									</a>
								</div>
								<div class="slide xm-slider-slide" style="position: absolute; top: 0px; width: 100%; display: none; left: 0px;" xm-slider-index="3">
									<a href="#">
									<img alt="小米千万机型疯狂暑促" src="/322_thinkphp_xiaomi/Public/Home/image/T1irJjB_KT1RXrhCrK.jpg">
									</a>
								</div>
								<div class="slide xm-slider-slide" style="position: absolute; top: 0px; width: 100%; display: none; left: 0px;" xm-slider-index="4">
									<a href="#">
									<img alt="小米note免费升级天然竹后盖" src="/322_thinkphp_xiaomi/Public/Home/image/T1y.LgBTET1RXrhCrK.jpg">
									</a>
								</div>
								<!--首页轮播图片布局结束-->
							</div>
						</div>
						<a class="xm-slider-previous xm-slider-navigation icon-slides icon-slides-prev" href="" title="上一张" style="display: none;">上一张</a>
						<a class="xm-slider-next xm-slider-navigation icon-slides icon-slides-next" href="" title="下一张" style="display: none;">下一张</a>
						<ul class="xm-slider-pagination" id="nums">
							<li class="xm-slider-pagination-item cur">
							<a class="active" href="#">1</a>
							</li>
							<li class="xm-slider-pagination-item">
							<a class="active" href="#">2</a>
							</li>
							<li class="xm-slider-pagination-item">
							<a class="active" href="#">3</a>
							</li>
							<li class="xm-slider-pagination-item">
							<a class="active" href="#">4</a>
							</li>
							<li class="xm-slider-pagination-item">
							<a class="active" href="#">5</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="home-hd-show clearfix">
					<div class="hd-show-item hd-show-item-first J_randomItem">
						<a class="item" href="" style="display: inline;">
						<img src="/322_thinkphp_xiaomi/Public/Home/image/T1U5WgBKAT1RXrhCrK.jpg" alt="预约7月7日开放购买">
						</a>
					</div>
					<div class="hd-show-item J_randomItem">
						<a class="item" href="" style="display: inline;">
						<img src="/322_thinkphp_xiaomi/Public/Home/image/T1sxVvBQxT1RXrhCrK.jpg" alt="手机 现货购买">
						</a>
					</div>
					<div class="hd-show-item J_randomItem">
						<a class="item" href="" style="display: inline;">
						<img src="/322_thinkphp_xiaomi/Public/Home/image/T1StY_B_xT1RXrhCrK.jpg" alt="小米平板现货购买">
						</a>
					</div>

				</div>
			</div>
		</div>
		<!--轮播js开始-->
		<script type="text/javascript">
			//当前显示的图片索引
			var index=1;
			var inte=null;

			//自动执行
			function autoRun(){
				//定时器每过三秒切换一次
				inte=setInterval(function(){
					//显示下一个图片
					show(index++);
					//判断是否到第五个图片了
					if(index>4){
						index=0;
					}
				},3000);
			}
			autoRun();

			//显示指定索引的图片
			function show(i){
				$('#lunbo div').eq(i).show();
				$('#lunbo div').eq(i).siblings().hide();
				//按钮的样式
				$('#nums li').eq(i).find('a').addClass('active');
				$('#nums li').eq(i).siblings().find('a').removeClass('active');
			}
			//绑定鼠标放上去的事件
			$('#nums li').hover(function(){
				//获取当前元素的索引
				index=$(this).index();
				show(index++);
				clearInterval(inte);
			},function(){
				autoRun();
			})
			//绑定鼠标放到图片上的事件
			$('#lunbo div').hover(function(){
				//获取当前元素的索引
				index=$(this).index();
				show(index);
				clearInterval(inte);
				$('#lunbo').parents('div').siblings('a').css('display','inline');

			},function(){
				autoRun();
				$('#lunbo').parents('div').siblings('a').css('display','none');

			})
			//绑定鼠标放到箭头上的事件
			var a=$('#lunbo').parents('div').siblings('a');
			a.hover(function(){
				clearInterval(inte);
				$('#lunbo').parents('div').siblings('a').css('display','inline');
			},function(){
				index++;
				autoRun();
				$(this).css('display','none');
			})
			//绑定箭头的单击事件
			var a1=$('#lunbo').parents('div').next('a');
			var a2=$('#lunbo').parents('div').next('a').next('a');
			//箭头点击
			function jiantoudj(){
				index = index - 1;
				a1.click(function(){
					index=index-1;
					if(index<0){
						index=4;
					}
					show(index);
					return false;
				})
				a2.click(function(){
					index=index+1;
					if(index>4){
						index=0;
					}
					show(index);
					return false;
				})
			}
			jiantoudj();
		
		</script>
		<!--轮播js结束-->
		<!--轮播部分结束-->
		<!--明星产品部分开始-->
		<div class="home-star-goods">
			<div class="xm-plain-box J_starGoodsCarousel">
				<div class="box-hd">
					<h3 class="title">
					小米明星单品
					<a class="acc-link" href="">根据机型选配件</a>
					</h3>
					<div class="more">
						<div class="xm-recommend-page clearfix" id="jtmore">
							<a class="page-btn-prev iconfont J_carouselPrev" href=""></a>
							<a class="page-btn-next iconfont J_carouselNext" href=""></a>
						</div>
					</div>
				</div>
				<div class="box-bd">
					<div class="xm-star-goods-list-wrap J_carouselWrap" style="height: 308px;">
						<div id="start" class="xm-star-goods-list clearfix J_carouselList" style="width: 2480px; margin-left: 0px;">
							<?php if(is_array($start)): foreach($start as $key=>$vo): ?><div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
										<img alt="<?php echo ($vo['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
										</a>
									</span>
									<span class="item-title">
										<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
									</span>
									<!--<span class="item-desc">40/49/55英寸 现货购买</span>-->

								</div>
							</div><?php endforeach; endif; ?>
							<!--
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>
							<div class="xm-star-goods-item">
								<div class="item-content">
									<span class="item-thumb">
										<a href="">
										<img alt="小米电视2 全系列" src="/322_thinkphp_xiaomi/Public/Home/image/T1GqdTByYv1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-title">
										<a href="">小米电视2 全系列</a>
									</span>
									<span class="item-desc">40/49/55英寸 现货购买</span>

								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			//明星产品的轮播效果
			var sinte=null;
			var start=0;

			//定义自动方法
			function autoStart(i){
				if(i<0){
						$('#start').animate({
							marginLeft:'0px',
						},500);
					}else{
						$('#start').animate({
							marginLeft:'-1240px',
						},500);
					}
			}
			function Startsj(){
				sinte=setInterval(function(){
						//获取元素当前的marginleft属性
						start=parseInt($('#start').css('marginLeft'));
						autoStart(start);
					},5000);
			}
			Startsj();
			//给箭头绑定单击事件
			$('#jtmore a:nth-child(1)').click(function(){
				clearInterval(sinte);
				start=parseInt($('#start').css('marginLeft'));
				autoStart(start);
				return false;
			})
			$('#jtmore a:nth-child(2)').click(function(){
				clearInterval(sinte);
				start=parseInt($('#start').css('marginLeft'));
				autoStart(start);
				return false;
			})
			//放到箭头上的事件
			$('#jtmore').hover(function(){
				clearInterval(sinte);
			},function(){
				Startsj();
			})
			//放到大div上的事件
			$('#start').hover(function(){
				clearInterval(sinte);
			},function(){
				Startsj();
			})
			// $('#jtmore').next('a').addClass('page-btn-prev-disabled');
			// $('#jtmore').next('a').next('a').removeClass('page-btn-prev-disabled');
			// $('#jtmore').next('a').removeClass('page-btn-prev-disabled');
			// $('#jtmore').next('a').next('a').addClass('page-btn-prev-disabled');
		</script>
		<!--明星产品部分结束-->
		<!--新品上架部分结束-->
		<div class="home-new-goods">
			<div class="xm-plain-box">
				<div class="box-hd">
					<h3 class="title">新品上架</h3>
					<div class="more">
						<a class="more-link" href="<?php echo U('Home/List/index');?>?new=gid">
						更多
						<i class="iconfont"></i>
						</a>
					</div>
				</div>
				<div class="box-bd">
					<div class="row">
						<!--左边开始-->
						<div class="col col-15">
							<div class="brick-list">
								<!--
								<div class="brick-item brick-item-l">
									<div class="item">
										<div class="item-content">
										<a href="">
											<span class="item-thumb">
											<img alt="小米方盒子蓝牙音箱" src="/322_thinkphp_xiaomi/Public/Home/image/T1xiAvB_LT1RXrhCrK.jpg">
											</span>
										</a>
										</div>
									</div>
								</div>-->
								<?php if(is_array($new)): foreach($new as $key=>$vo): ?><div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
													</span>
													<span class="item-price"><?php echo ($vo['nowprice']); ?>元 </span>
													</span>
													<span class="item-thumb">
													<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
													<img alt="<?php echo ($vo['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
													</a>
												</span>
										</div>
									</div>
								</div><?php endforeach; endif; ?>
								<!--
								<div class="brick-item brick-item-m">
									<div class="brick-item brick-item-s">
										<div class="item">
											<div class="item-content">
												<span class="item-info">
													<span class="item-title">
														<a href="">小米智能插座</a>
													</span>
													<span class="item-price">79元 </span>
													</span>
													<span class="item-thumb">
														<a href="">
														<img alt="小米智能插座" src="/322_thinkphp_xiaomi/Public/Home/image/T1PxJvBCAT1RXrhCrK220x220.jpg">
														</a>
												</span>
											</div>
										</div>
									</div>
									<div class="brick-item brick-item-s">
										<div class="item">
											<div class="item-content">
												<span class="item-info">
													<span class="item-title">
														<a href="">小米智能插座</a>
													</span>
													<span class="item-price">79元 </span>
													</span>
													<span class="item-thumb">
														<a href="">
														<img alt="小米智能插座" src="/322_thinkphp_xiaomi/Public/Home/image/T1PxJvBCAT1RXrhCrK220x220.jpg">
														</a>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米空气净化器</a>
													</span>
													<span class="item-price">899元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米空气净化器" src="/322_thinkphp_xiaomi/Public/Home/image/T1XYxTBsAT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米空气净化器</a>
													</span>
													<span class="item-price">899元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米空气净化器" src="/322_thinkphp_xiaomi/Public/Home/image/T1XYxTBsAT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米空气净化器</a>
													</span>
													<span class="item-price">899元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米空气净化器" src="/322_thinkphp_xiaomi/Public/Home/image/T1XYxTBsAT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米空气净化器</a>
													</span>
													<span class="item-price">899元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米空气净化器" src="/322_thinkphp_xiaomi/Public/Home/image/T1XYxTBsAT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米空气净化器</a>
													</span>
													<span class="item-price">899元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米空气净化器" src="/322_thinkphp_xiaomi/Public/Home/image/T1XYxTBsAT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								-->
							</div>
						</div>
						<!--左边开始-->
						<!--右边开始-->
						<div class="col col-5">
							<!--图片部分-->
							<div class="channel-section">
								<ul class="channel-list">
									<li>
										<a target="_blank" href="#">
										<span class="item-info">
										<span class="item-title">安卓机皇现货购买</span>
										<span class="item-desc">
										中信白金卡专享
										</span>
										</span>
										<span class="item-thumb">
										<img alt="安卓机皇现货购买" src="/322_thinkphp_xiaomi/Public/Home/image/T1koxQBCCT1RXrhCrK.jpg">
										</span>
										</a>
									</li>
									<li>
										<a target="_blank" href="#">
										<span class="item-info">
										<span class="item-title">特惠配件套装</span>
										<span class="item-desc">
										手机必备配件组合购买
										<br>
										实惠更优惠
										</span>
										</span>
										<span class="item-thumb">
										<img alt="特惠配件套装" src="/322_thinkphp_xiaomi/Public/Home/image/channel-list-cool.jpg">
										</span>
										</a>
									</li>
									<li>
										<a target="_blank" href="#">
										<span class="item-info">
										<span class="item-title">49元自拍神器</span>
										<span class="item-desc">
										蓝牙无线连接，仅150克
										<br>
										雷总同款自拍杆
										</span>
										</span>
										<span class="item-thumb">
										<img alt="49元自拍神器" src="/322_thinkphp_xiaomi/Public/Home/image/channel-list-new-20150513.jpg">
										</span>
										</a>
									</li>
								</ul>
							</div>
							<!--图片部分-->
							<!--通道部分-->
							<div class="news-section">
								<ul>
									<li class="first">
										<a href="#">
										企业用户采购通道
										<i class="iconfont"></i>
										</a>
									</li>
									<li>
										<a href="#">
										小米手机防伪查询
										<i class="iconfont"></i>
										</a>
									</li>
									<li>
										<a href="#">
										小米手机官翻版
										<i class="iconfont"></i>
										</a>
									</li>
									<li>
										<a href="#">
										小米路由器官翻版
										<i class="iconfont"></i>
										</a>
									</li>
									<li>
										<a href="#">
										F码购买通道
										<i class="iconfont"></i>
										</a>
									</li>
								</ul>
							</div>
							<!--通道部分-->
							<!--充话费部分-->
							<div class="recharge-section">
								<h3>
								话费充值
								<span id="rechargeTips" class="xm-recharge-tips"></span>
								</h3>
								<form class="xm-recharge-form" action="<?php echo U('Home/Index/addPhone');?>" method="post">
									<fieldset class="xm-recharge-tel">
									<input id="rechargeTel" type="tel" autocomplete="false" placeholder="请输入手机号码" name="rechargeTel">
									</fieldset>
									<fieldset class="xm-recharge-amount">
										<div class="xm-select">
											<div class="dropdown-text">100元</div>
												<ul class="dropdown-menu" style="display: none;">
													<li data-index="0" class="">
													<span>100元</span>
													</li>
													<li data-index="1" class="">
													<span>30元</span>
													</li>
													<li data-index="2" class="selected">
													<span>50元</span>
													</li>
												</ul>
											<span class="arrow-down"></span>
											<select id="rechargeAmount" name="rechargeAmount" style="display: none;">
												<option id="amount100" value="100">100元</option>
												<option id="amount30" value="30">30元</option>
												<option id="amount50" value="50">50元</option>
											</select>
										</div>
									</fieldset>
									<fieldset class="xm-recharge-price">
									<span class="fieldset-name">实付价格：</span>
									<span id="rechargePrice" class="fieldset-text">
									<span>98.5</span>
									元起
									</span>
									</fieldset>
									<fieldset class="xm-recharge-submit">
									<input id="rechargeBtn" class="btn btn-primary btn-recharge-submit btn-block disabled" type="submit" value="立即充值">
									</fieldset>
								</form>
							</div>
							<!--充话费部分-->
							<script type="text/javascript">
							//充话费的js部分
								//手机号正则
								var reg = /^1\d{10}$/;
								//失去焦点事件
								$('#rechargeTel').blur(function(){
									//获取文本框的值
									var tel=$(this).val();
									if(tel==''){
										$('#rechargeTips').text('请输入手机号码');
										$('#rechargeBtn').addClass('disabled');
									}else if(!reg.test(tel)){
										$('#rechargeTips').text('请输入正确的手机号码');
										$('#rechargeBtn').addClass('disabled');
									}else{
										$('#rechargeBtn').removeClass('disabled');
									}
								})
								//获取焦点事件
								$('#rechargeTel').focus(function(){
									$('#rechargeTips').text('');
								})
								//键盘按下事件
								$('#rechargeTel').keyup(function(){
									//获取文本框的值
									var tel=$(this).val();
									if(tel==''){
										$('#rechargeTips').text('请输入手机号码');
										$('#rechargeBtn').addClass('disabled');
									}else if(!reg.test(tel)){
										$('#rechargeTips').text('请输入正确的手机号码');
										$('#rechargeBtn').addClass('disabled');
									}else{
										$('#rechargeTips').text('');

										$('#rechargeBtn').removeClass('disabled');
									}
								})
								//放到钱上面的事件
								$('.xm-select').hover(function(){
									$('.dropdown-menu').css('display','block');
								},function(){
									$('.dropdown-menu').css('display','none');
								})
								//li的点击事件
								$('.dropdown-menu').find('li').click(function(){
									var money=parseInt($(this).text());
									$('.dropdown-text').text(money+'元');
									$('.dropdown-menu').css('display','none');
									$('#rechargePrice').find('span').text(money*0.985);
								})
							</script>
						</div>
						<!--右边结束-->
					</div>
				</div>
			</div>
		</div>
		<!--新品上架部分结束-->
		<!--大家都喜欢部分开始-->
		<div class="home-hot-goods">
			<div class="xm-plain-box">
				<div class="box-hd">
					<h3 class="title">大家都喜欢</h3>
				</div>
				<div class="box-bd">
					<div class="row">
						<!--左-->
						<div class="col col-15">
							<div class="brick-list">
								<!--
								<div class="brick-item brick-item-l">
									<div class="item">
										<div class="item-content">
										<a href="">
											<span class="item-thumb">
											<img alt="小米插线板" src="/322_thinkphp_xiaomi/Public/Home/image/T1gOCQB4LT1RXrhCrK.jpg">
											</span>
										</a>
										</div>
									</div>
								</div>-->
								<?php if(is_array($like)): foreach($like as $key=>$vo): ?><div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
													</span>
													<span class="item-price"><?php echo ($vo['nowprice']); ?>元 </span>
													</span>
													<span class="item-thumb">
													<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
													<img alt="<?php echo ($vo['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
													</a>
												</span>
										</div>
									</div>
								</div><?php endforeach; endif; ?>
								<!--
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米蓝牙手柄</a>
													</span>
													<span class="item-price">99元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米蓝牙手柄" src="/322_thinkphp_xiaomi/Public/Home/image/T1WTEvBmKT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米蓝牙手柄</a>
													</span>
													<span class="item-price">99元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米蓝牙手柄" src="/322_thinkphp_xiaomi/Public/Home/image/T1WTEvBmKT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>
								<div class="brick-item brick-item-m">
									<div class="item">
										<div class="item-content">
											<span class="item-info">
												<span class="item-title">
													<a href="">小米蓝牙手柄</a>
													</span>
													<span class="item-price">99元 </span>
													</span>
													<span class="item-thumb">
													<a href="">
													<img alt="小米蓝牙手柄" src="/322_thinkphp_xiaomi/Public/Home/image/T1WTEvBmKT1RXrhCrK!220x220.jpg">
													</a>
												</span>
										</div>
									</div>
								</div>-->
							</div>
						</div>
						<!--右-->
						<div class="col col-5">
							<div class="board-section">
								<h3>
								<span>HOT</span>
								热销商品排行
								</h3>
								<ul class="board-list">
									<?php if(is_array($likes)): foreach($likes as $key=>$vo): ?><li class="top">
										<span class="item-info">
											<span class="item-title">
												<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
											</span>
											<span class="item-price"><?php echo ($vo['nowprice']); ?>元 </span>
											</span>
											<span class="item-thumb">
												<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
													<img alt="<?php echo ($vo['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
												</a>
											</span>
										<span class="item-num"><?php echo ($vo['num']); ?></span>
									</li><?php endforeach; endif; ?>
									<!--
									<li class="top">
										<span class="item-info">
											<span class="item-title">
												<a href="">小米随身WIFI U盘版</a>
											</span>
											<span class="item-price">49.9元 </span>
											</span>
											<span class="item-thumb">
												<a href="">
													<img alt="小米随身WIFI U盘版" src="/322_thinkphp_xiaomi/Public/Home/image/T1RsL_BXdT1RXrhCrK!220x220.jpg">
												</a>
											</span>
										<span class="item-num">2</span>
									</li>
									<li class="top">
										<span class="item-info">
											<span class="item-title">
												<a href="">小米随身WIFI U盘版</a>
											</span>
											<span class="item-price">49.9元 </span>
											</span>
											<span class="item-thumb">
												<a href="">
													<img alt="小米随身WIFI U盘版" src="/322_thinkphp_xiaomi/Public/Home/image/T1RsL_BXdT1RXrhCrK!220x220.jpg">
												</a>
											</span>
										<span class="item-num">3</span>
									</li>
									<li>
										<span class="item-info">
											<span class="item-title">
												<a href="">小米随身WIFI U盘版</a>
											</span>
											<span class="item-price">49.9元 </span>
											</span>
											<span class="item-thumb">
												<a href="">
													<img alt="小米随身WIFI U盘版" src="/322_thinkphp_xiaomi/Public/Home/image/T1RsL_BXdT1RXrhCrK!220x220.jpg">
												</a>
											</span>
										<span class="item-num">4</span>
									</li>
									<li>
										<span class="item-info">
											<span class="item-title">
												<a href="">小米随身WIFI U盘版</a>
											</span>
											<span class="item-price">49.9元 </span>
											</span>
											<span class="item-thumb">
												<a href="">
													<img alt="小米随身WIFI U盘版" src="/322_thinkphp_xiaomi/Public/Home/image/T1RsL_BXdT1RXrhCrK!220x220.jpg">
												</a>
											</span>
										<span class="item-num">5</span>
									</li>-->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--大家都喜欢部分结束-->
		<!--热评产品开始-->
		<div class="home-commented-goods">
			<div class="xm-plain-box">
				<div class="box-hd">
					<h3 class="title">热评产品</h3>
				</div>
				<div class="box-bd">
					<div class="xm-commented-goods-list-wrap">
						<div class="xm-commented-goods-list clearfix">
							<?php if(is_array($hotcomment)): foreach($hotcomment as $key=>$vo): ?><div class="xm-commented-goods-item J_commentedGoods" data-cid="2141200013">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
										</span>
										<span class="item-meta">
										<span class="icon-stat icon-stat-5"></span>
										<span class="sep">|</span>
										<?php echo ($vo['com_num']); ?>人好评
										</span>
										<span class="item-price"><?php echo ($vo['nowprice']); ?>元 </span>
									</span>
									<span class="item-thumb">
										<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
											<img alt="小米商务旅行包" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
										</a>
									</span>
									<span class="item-comment"><?php echo ($vo['pingjia']); ?></span>
								</div>
							</div><?php endforeach; endif; ?>
							<!--
							<div class="xm-commented-goods-item J_commentedGoods" data-cid="2141200013">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a href="">小米商务旅行包</a>
										</span>
										<span class="item-meta">
										<span class="icon-stat icon-stat-5"></span>
										<span class="sep">|</span>
										1155人好评
										</span>
										<span class="item-price">119元 </span>
									</span>
									<span class="item-thumb">
										<a href="">
											<img alt="小米商务旅行包" src="/322_thinkphp_xiaomi/Public/Home/image/T1oTWTByxT1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-comment">非常实用，做工也很不错，外观也很体面</span>
								</div>
							</div>
							<div class="xm-commented-goods-item J_commentedGoods" data-cid="2141200013">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a href="">小米商务旅行包</a>
										</span>
										<span class="item-meta">
										<span class="icon-stat icon-stat-5"></span>
										<span class="sep">|</span>
										1155人好评
										</span>
										<span class="item-price">119元 </span>
									</span>
									<span class="item-thumb">
										<a href="">
											<img alt="小米商务旅行包" src="/322_thinkphp_xiaomi/Public/Home/image/T1oTWTByxT1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-comment">非常实用，做工也很不错，外观也很体面</span>
								</div>
							</div>
							<div class="xm-commented-goods-item J_commentedGoods" data-cid="2141200013">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a href="">小米商务旅行包</a>
										</span>
										<span class="item-meta">
										<span class="icon-stat icon-stat-5"></span>
										<span class="sep">|</span>
										1155人好评
										</span>
										<span class="item-price">119元 </span>
									</span>
									<span class="item-thumb">
										<a href="">
											<img alt="小米商务旅行包" src="/322_thinkphp_xiaomi/Public/Home/image/T1oTWTByxT1RXrhCrK!220x220.jpg">
										</a>
									</span>
									<span class="item-comment">非常实用，做工也很不错，外观也很体面</span>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--热评产品结束-->
		<!--特价产品开始-->
		<div class="home-saleoff-goods">
			<div class="xm-plain-box">
				<div class="box-hd">
				<h3 class="title">特价产品</h3>
				</div>
				<div class="box-bd">
					<div class="home-saleoff-goods-list-wrap">
						<div class="home-saleoff-goods-list clearfix">
							<?php if(is_array($special)): foreach($special as $key=>$vo): ?><div class="home-saleoff-goods-item">
								<div class="item-content">
									<span class="item-title">
										<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>"><?php echo ($vo['title']); ?></a>
									</span>
									<span class="item-price">
									<i><?php echo ($vo['nowprice']); ?></i>
									元
									<del><?php echo ($vo['price']); ?>元</del>
									</span>
									<span class="item-thumb">
										<a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>">
										<img alt="<?php echo ($vo['title']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>">
										</a>
									</span>
									<div class="item-flag">
									<span class="icon-flag">省<?php echo ($vo['chajia']); ?>元</span>
									</div>
								</div>
							</div><?php endforeach; endif; ?>
							<!--
							<div class="home-saleoff-goods-item">
								<div class="item-content">
									<span class="item-title">
										<a href="">红米Note能量套装</a>
									</span>
									<span class="item-price">
									<i>69</i>
									元
									<del>98元</del>
									</span>
									<span class="item-thumb">
										<a href="">
										<img alt="红米Note能量套装" src="/322_thinkphp_xiaomi/Public/Home/image/T1urVvBQDT1RXrhCrK.jpg">
										</a>
									</span>
									<div class="item-flag">
									<span class="icon-flag">省29元</span>
									</div>
								</div>
							</div>
							<div class="home-saleoff-goods-item">
								<div class="item-content">
									<span class="item-title">
										<a href="">红米Note能量套装</a>
									</span>
									<span class="item-price">
									<i>69</i>
									元
									<del>98元</del>
									</span>
									<span class="item-thumb">
										<a href="">
										<img alt="红米Note能量套装" src="/322_thinkphp_xiaomi/Public/Home/image/T1urVvBQDT1RXrhCrK.jpg">
										</a>
									</span>
									<div class="item-flag">
									<span class="icon-flag">省29元</span>
									</div>
								</div>
							</div>
							<div class="home-saleoff-goods-item">
								<div class="item-content">
									<span class="item-title">
										<a href="">红米Note能量套装</a>
									</span>
									<span class="item-price">
									<i>69</i>
									元
									<del>98元</del>
									</span>
									<span class="item-thumb">
										<a href="">
										<img alt="红米Note能量套装" src="/322_thinkphp_xiaomi/Public/Home/image/T1urVvBQDT1RXrhCrK.jpg">
										</a>
									</span>
									<div class="item-flag">
									<span class="icon-flag">省29元</span>
									</div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--特价产品结束-->
		<!--MIUI主题开始-->
		<!--
		<div class="home-commented-goods home-miui-goods">
			<div class="xm-plain-box">
				<div class="box-hd">
					<h3 class="title">MIUI 主题</h3>
					<div class="more">
						<a class="more-link" target="_blank" href="">
						更多
						<i class="iconfont"></i>
						</a>
					</div>
				</div>
				<div class="box-bd">
					<div class="xm-commented-goods-list-wrap">
						<div class="xm-commented-goods-list clearfix">
							<div class="xm-commented-goods-item">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a target="_blank" href="">【炮炮兵】青柠之夏</a>
										</span>
										<span class="item-price">免费</span>
									</span>
									<span class="item-thumb">
										<a target="_blank" href="">
											<img alt="【炮炮兵】青柠之夏" src="/322_thinkphp_xiaomi/Public/Home/image/T1utV_BsxT1R4cSCrK.png">
										</a>
									</span>
								</div>
							</div>
							<div class="xm-commented-goods-item">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a target="_blank" href="">【炮炮兵】青柠之夏</a>
										</span>
										<span class="item-price">免费</span>
									</span>
									<span class="item-thumb">
										<a target="_blank" href="">
											<img alt="【炮炮兵】青柠之夏" src="/322_thinkphp_xiaomi/Public/Home/image/T1utV_BsxT1R4cSCrK.png">
										</a>
									</span>
								</div>
							</div>
							<div class="xm-commented-goods-item">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a target="_blank" href="">【炮炮兵】青柠之夏</a>
										</span>
										<span class="item-price">免费</span>
									</span>
									<span class="item-thumb">
										<a target="_blank" href="">
											<img alt="【炮炮兵】青柠之夏" src="/322_thinkphp_xiaomi/Public/Home/image/T1utV_BsxT1R4cSCrK.png">
										</a>
									</span>
								</div>
							</div>
							<div class="xm-commented-goods-item">
								<div class="item-content">
									<span class="item-info">
										<span class="item-title">
											<a target="_blank" href="">【炮炮兵】青柠之夏</a>
										</span>
										<span class="item-price">免费</span>
									</span>
									<span class="item-thumb">
										<a target="_blank" href="">
											<img alt="【炮炮兵】青柠之夏" src="/322_thinkphp_xiaomi/Public/Home/image/T1utV_BsxT1R4cSCrK.png">
										</a>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		<!--MIUI主题结束-->

	</div>
	
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
					<img alt="可信网站" src="/322_thinkphp_xiaomi/Public/Home/image/cnnicVerifyseal.png">
					</a>
					<a target="_blank" href="">
					<img alt="诚信网站" src="/322_thinkphp_xiaomi/Public/Home/image/szfwVerifyseal.gif">
					</a>
					<a target="_blank" href="">
					<img alt="网上交易保障中心" src="/322_thinkphp_xiaomi/Public/Home/image/save.jpg">
					</a>
				</div>
			</div>
		</div>
	</div>
	
	<!--底部结束-->
</body>
</html>