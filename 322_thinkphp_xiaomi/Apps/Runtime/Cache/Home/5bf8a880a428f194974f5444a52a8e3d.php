<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title>【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[0]); ?>——小米手机官网</title>
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/base.css">
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/base.min.css">
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/goods-Detail-big.css">
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/goods-category.css">
    <script type="text/javascript" src="/322_thinkphp_xiaomi/Public/Home/js/jquery-1.8.3.min.js"></script>
    <style type="text/css">
        #nav-category-section{display: none;}
        .icon-stat{display:inline-block;*display:inline;*zoom:1;width:65px;height:14px;overflow:hidden;background-image:url("/322_thinkphp_xiaomi/Public/Upload/Goods/icon-stat.png");background-repeat:no-repeat}
        #size span:hover{color:#ee330a}
        .size{color:#ee330a,border:1px solid #ee330a}
        .sizespan{cursor:pointer;float:left;width:32px;height:32px;border:1px solid #EDEDED;text-align:center;line-height:32px;}

        .mm {
        	display: none;
        	position: fixed;
        	left: 0;		    
		    top: 0;
		    height: 100%; 
		    width: 100%;
		    z-index: 1001;
		    background:gray;
		    opacity:0.3;
		}
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
	
	
	<!--logo,搜索，以及标题栏-->
	<!--商品内容部分开始-->
	
	<!-- 分类路径导航 -->
    <div class="container breadcrumbs">  
    </div>
    <!-- 商品详情页开始 -->
	<div class="goods-detail container">
		<div class="goods-detail-info row clearfix">
			<!-- 商品图片区开始 -->
			<div class="span14 J_mi_goodsPic_block">
			    <div id="J_mi_goodsPicBox" class="goods-pic-box">
			    	<!-- 商品主图 -->
			        <div id="goods-big-pic" class="goods-big-pic"></div>
			        <!-- 轮播图 -->
			        <div class="goods-small-pic clearfix">	
			            <ul id="goodsPicList"></ul>
			        </div>
			        <!-- 上一张下一张控制区 -->
			        <span id="goodsPicPrev" title="上一张" class="icon-slides icon-slides-prev" title="上一张" style="background:url(/322_thinkphp_xiaomi/Public/Home/image/icon-slides.png) no-repeat center center;background-position:-84px center;_filter:alpha(opacity=40);cursor:pointer;">上一张</span>
			        <span id="goodsPicNext" title="下一张" class="icon-slides icon-slides-next" title="下一张" style="background:url(/322_thinkphp_xiaomi/Public/Home/image/icon-slides.png) no-repeat center center;background-position:-125px center;_filter:alpha(opacity=40);cursor:pointer;">下一张</span>
			    </div>
			</div>
			<!-- 商品图片区结束 -->
			<!-- 商品信息区开始 -->     
			<div class="span6 goods-info-rightbox">
				<dl class="goods-info-box ">
				    <dt class="goods-info-head">
				        <dl>
				            <dt id="goodsName"><?php echo ($info['title']); ?> <?php echo ($colortit[0]); ?></dt>
				            <dd class="goods-info-head-price clearfix">
				                <div class="left-part">
				                    <b class="J_mi_goodsPrice"><?php echo ($info['nowprice']); ?></b><i>&nbsp;元</i>
				                    <del><span class="J_mi_marketPrice"><?php echo ($info['price']); ?>元</span></del>
				                </div>
				                <div class="right-part"></div>
				            </dd>
				            <dd class="goods-info-head-userfaq">
				                <ul>
				                    <li class="faq J_pro_related_btns">
				                        <span data-class="icon-stat-5" class="icon-stat icon-stat-5 J_mi_goods_starNum"></span>
				                        <a href="#goodsComment"><?php echo ($info['comment']); ?>人评价</a>
				                        <span class="separator">|</span>
				                        <a href="#goodsFaq"><?php echo count($askinfos);?>个提问</a>
				                    </li>
				                </ul>
				            </dd>
							<dd class="goods-info-head-colors clearfix">
				            	<span>可选颜色：</span>
				                <div class="clearfix">
			                		<?php if(is_array($zhupic)): foreach($zhupic as $key=>$vo): if($key == 0): ?><div class="colorli">
					                        <a title="<?php echo ($colortit[$key]); ?>" m="<?php echo ($key); ?>" class="coloractive" href="">
										        <img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>" class="square">
										    </a>
										</div>
									<?php else: ?>
										<div class="colorli">
					                        <a title="<?php echo ($colortit[$key]); ?>" m="<?php echo ($key); ?>" href="">
										        <img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>" class="square">
										    </a>
										</div><?php endif; endforeach; endif; ?>
				                </div>
				            </dd>
				            	                
				            <dd class="goods-info-head-size clearfix" style="position:relative;border:none">
				            <?php if($info['mcid'] == 31): ?><span class="label">可选尺码：</span>
				           		<ul class="clearfix"  id="size">
									<?php if(is_array($size)): foreach($size as $key=>$vo): switch($$vo): case "0": ?>S<?php break;?>    
											<?php case "1": ?>M<?php break;?>
											<?php case "2": ?>L<?php break;?> 
											<?php case "3": ?>XL<?php break;?> 
											<?php case "4": ?>XXL<?php break; endswitch;?>
										<li>
					                        <span  class="sizespan" value="<?php echo ($key); ?>"><?php echo ($vo); ?></span>
				                    	</li><?php endforeach; endif; ?>
				                </ul><?php endif; ?>
				            </dd>
				            
				            <dd id="goodsDetailBtnBox" class="goods-info-head-cart">
				            	<!-- 模拟隐藏域传值 -->
			                    <b class="gid" style="display:none"><?php echo ($info['gid']); ?></b>
			                    <b class="title" style="display:none"><?php echo ($info['title']); ?></b>
			                    <b class="colortit" style="display:none"><?php echo ($colortit[0]); ?></b>
			                    <b class="zhupic" style="display:none"><?php echo ($zhupic[0]); ?></b>
			                    <b class="price" style="display:none"><?php echo ($info['price']); ?></b>
			                    <b class="nowprice" style="display:none"><?php echo ($info['nowprice']); ?></b>
			                    <b class="comment" style="display:none"><?php echo ($info['comment']); ?></b>
				            	<a id ="cart" class="btn btn-primary goods-add-cart-btn" href="" style="float:left">
				                <i class="iconfont "></i>加入购物车
				                </a>
								<a class="btn btn-primary goods-add-cart-btn" href="<?php echo U('Home/Cart/index',array('gid'=>$info['gid']));?>" style="display:none;float:left">
				                <i class="iconfont "></i>去购物车结算
				                </a>
				            	<a class="btn btn-dake  goods-collect-btn like" style="float:left;margin-left:8px">
				                	<i class="iconfont"></i>
				           		</a>	
				        	</dd>
				        </dl>
				    </dt>
				    <dd class="goods-info-head-intro">
				    </dd>
				    <dd class="goods-info-foot">
				        <span class="iconfont"></span>
				        <a href="<?php echo U('Home/List/index',array('cid'=>$path[$length-1]));?>">查看更多服装</a>
				    </dd>
				</dl>
			</div>
			<!-- 商品信息区结束 -->
		</div>
		<!-- 商品大图区开始 -->
		<div class="row goods-detail-desc">
		    <!--E left side-->
		    <div class="span20">
		        <!-- 商品描述 START-->
		        <div id="goodsDetail" class="xm-box  goods-detail-box ">
		            <div class="box-hd">
		                <ul class="items clearfix J_pro_related_btns">
		                    <li class="current">
		                       <a href="#goodsDesc" data-stat-id="f1f71044341f26e4" onclick="">详细信息</a>
		                    </li>
		                    <!-- <li>
		                       <a href="#goodsParam" data-stat-id="4a9918d4f5b5c72a" onclick="">规格参数</a>
		                    </li> -->
		                    <li>
		                       <a href="#goodsComment" data-stat-id="7aa99b4e11e09534" onclick="">评价晒单</a>
		                    </li>
		                    <li>
		                       <a href="#goodsFaq" data-stat-id="9a817a679937e337" onclick="">商品提问</a>
		                    </li>
		                    <li>
		                       <a href="#serQue" data-stat-id="d4ce554f68cbd96c" onclick="">售后服务</a>
		                    </li>
		                </ul>                   
		            </div>
		            <div id="goodsDesc" class="box-bd">
		            </div>
		        </div>
		        <!-- 商品描述 END-->
		        <!--S 规格-->
		        <!-- <div id="goodsParam" class="xm-box goods-detail-standard">
		            <div class="box-hd">
		                <div class="title">
		                    规格参数
		                </div>
		            </div>
		            <div class="box-bd">
		                <table>
		                    <thead>
		                    </thead>
		                    <tbody>
		                        <tr>
		                            <th>商品编号</th>
		                            <td>1152200006</td>
		                            <th class="th1"></th>
		                            <td class="td1"></td>
		                        </tr>                           
		                        <tr>
		                            <th>材质成分</th>
		                            <td>棉100%</td>
		                                                                                                            
		                            <th>尺码</th>
		                            <td>S-XXL</td>
		                        </tr>                                                        
		                        <tr>
		                            <th>适合季节</th>
		                            <td>夏</td>
		                                                                                                            
		                            <th>版型</th>
		                            <td>合体</td>
		                        </tr>                                                        
		                        <tr>
		                            <th>工艺</th>
		                            <td>胶印</td>
		                                                                                                            
		                            <th>颜色</th>
		                            <td>红色</td>
		                        </tr>
		                    </tbody>
		                </table>
		            </div>
		        </div> -->
		        <!--E 规格-->
		       	<div class="row">
		       		<div class="span4">
		        		<div class="left-side">
				            <div id="goodsRectScan" class="xm-box goods-recent">  
					            <div class="box-hd"> 
					            	<div class="title"> 最近浏览 </div> 
					            </div> 
					            <div class="box-bd"> 
					            	<ul class="clearfix"> 
					            	<?php if(is_array($lastinfos)): foreach($lastinfos as $key=>$vo): ?><li> 
					            			<a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['gid']));?>"> <img alt="<?php echo ($vo['title']); ?> <?php echo ($vo['colortit']); ?>" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>"> </a> 
					            		</li><?php endforeach; endif; ?>
					            	</ul>
					            </div>
				            </div>
				            <div id="RECOMMEND-MODAL" class="xm-box goods-alsobuy xm-goods-side-list J_goodsAlsoBuy"> 
				            	<div class="box-hd"> 
				            		<div class="title"> 买过的人还买了 </div> 
				            	</div> 
				            	<div class="box-bd"> 
				            		<ul>
				            		<?php if(is_array($neworderinfos)): foreach($neworderinfos as $key=>$vo): ?><li> 
				            				<a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['gid']));?>"> 
					            				<h2><?php echo ($vo['title']); ?></h2> 
					            				<h2><?php echo ($vo['nowprice']); ?>元</h2> 
					            				<div class="star"> 
					            					<span class="icon-stat icon-stat-5"></span> 
					            				</div> 
					            				<img alt="" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>" class="leftImg" style="margin-left:5px"> 
				            				</a> 
				            			</li><?php endforeach; endif; ?>   
				            		</ul> 
				            	</div>
				            </div>
				        </div>
			        </div>
		       		<div class="span16">
		       			<div class="right-side">
				            <!--S 商品评论 -->
				            <div id="goodsComment" class="xm-box goods-detail-comment ">
		                        <div class="box-hd">
		                            <div class="title">
		                                用户评价
		                            </div>
		                            <div style="display:block" class="more J_comment_order">
		                                <span data-order="1" class="item  active">最有用</span>
		                                <span class="separator">|</span>
		                                <span data-order="0" class="item ">最新</span>
		                            </div>
		                        </div>
		                        <!--商品评论开始-->
				                <div id="J_goods_detail_comment" class="box-bd">
		                            <div class="head">  
			                            <ul class="com-head clearfix"> 
			                            	<li class="left"><h2><?php echo ($rate); ?><b>%</b></h2> <p>五星评价率</p> </li> 
			                            	<li class="middle">
			                            		<?php $__FOR_START_21028__=5;$__FOR_END_21028__=1;for($i=$__FOR_START_21028__;$i >= $__FOR_END_21028__;$i+=-1){ ?><div class="item"> <span class="icon-stat icon-stat-<?php echo ($i); ?>"></span> <span class="num"><?php echo ($stat[$i]); ?>人</span> </div><?php } ?>
			                            		<!--
			                            		<div class="item"> <span class="icon-stat icon-stat-4"></span> <span class="num">12人</span> </div> 
			                            		<div class="item"> <span class="icon-stat icon-stat-3"></span> <span class="num">4人</span> </div> 
			                            		<div class="item"> <span class="icon-stat icon-stat-2"></span> <span class="num">1人</span> </div> 
			                            		<div class="item"> <span class="icon-stat icon-stat-1"></span> <span class="num">0人</span> </div>-->
			                            	</li>
			                            	<!-- 
			                            	<li class="right clearfix">  
			                            		<div class="item">简约大方</div>  
			                            		<div class="item">做工精细</div>  
			                            		<div class="item">触感舒适</div>  
			                            		<div class="item">超便宜</div>  
			                            		<div class="item">很合身</div>  
			                            	</li>-->
			                            </ul>
		                            </div>
		                            <div class="com-body">
		                                <ul class="content J_goods_detail_comment_content">
		                                	<!-- <?php if(is_array($com_info)): foreach($com_info as $key=>$vo): ?><li> 
			                                	<div class="article"> 
			                                		<h3 class="art_star clearfix"> 
				                                		<div class="leftPart"> <span class="icon-stat icon-stat-<?php echo ($vo['com_star']); ?>"></span> </div> 
				                                		<div class="rightPart"> <?php echo (date("Y-m-d",$vo["comment_time"])); ?> </div> 
			                                		</h3> 
			                                		<div class="art_content">  
			                                			<a href="" target="_blank" onclick=""> <?php echo ($vo['content']); ?> </a> 
			                                		</div> -->
			                                		<!--  
			                                		<div class="art_info clearfix"> 
				                                		<div class="leftPart"> 此评价是否有用？ 
				                                			<span data-id="10416638" class=" usebtn J_use">有用(0)</span> 
				                                			<span data-id="10416638" class=" usebtn J_unuse">没用(0)</span> 
				                                		</div> 
				                                		<div class="rightPart">    
				                                			<span>来自于小米网</span>  
				                                			<span class="separator">|</span> 
				                                			<a target="_blank" href="" onclick="">回复</a>
				                                		</div> 
			                                		</div> 
			                                		-->
			                                		<!-- <?php if($vo['status'] == 1): ?><div class="art_reply"> 
			                                			<i>官方回复：</i><?php echo ($vo['recontent']); ?> 
			                                		</div>
			                                		<?php else: ?>
			                                		<div class="art_reply"> 
			                                			 暂无回复
			                                		</div><?php endif; ?>  
		                                		</div> 
		                                		<div class="head_photo"> 
		                                			<a href="" target="_blank" onclick="">
		                                				<img alt="" src="/322_thinkphp_xiaomi/Public/<?php echo ($vo['image']); ?>">
		                                			</a> 
		                                			<a href="" target="_blank" onclick="">
		                                				<h3 class="name"><?php echo ($vo['ssid']); ?></h3>
		                                			</a> 
		                                		</div> 
		                                	</li><?php endforeach; endif; ?>   -->
		                                </ul>
		                                <div data-error="暂无用户对此款商品评价" class="more-content J_goods_detail_comment_more">
		                                    <a target="_blank" href="" onclick="">查看更多评价 &gt;</a>
		                                </div>
		                            </div>
		                        </div>
		                        <!--商品评论结束-->
				            </div>
				            <!--E 商品评论 -->
				            <!-- FAQ  -->
				            <div id="goodsFaq" class="xm-box goods-detail-faq">
				                <div class="box-hd">
				                    <div class="title">产品提问</div>
				                    <div class="more J_question_all_link">
				                        <span class="more-link" style="cursor:pointer">查看全部 &gt;</span>
				                    </div>
				                </div>
				                <div class="box-bd">
				                    <ul class="faq-list J_mi_question moreask">
				                    <?php $__FOR_START_8589__=0;$__FOR_END_8589__=3;for($i=$__FOR_START_8589__;$i < $__FOR_END_8589__;$i+=1){ if($askinfos[$i]['isok'] == 1): ?><li> 
				                    		<h3 class="question"> <span class="icon-ques">Q</span> <span><?php echo ($askinfos[$i]['a_content']); ?></span> </h3> 
				                    		<p class="answer">  
				                    			<span class="icon-ques icon-ans stard">A</span> <?php echo ($askinfos[$i]['r_content']); ?> 
				                    		</p> 
				                    		<div class="author"> 
				                    			<div class="leftPart"> <span><?php echo ($askinfos[$i]['mssid']); ?></span>  </div> 
				                    			<div class="rightPart"> <?php echo date('Y',$askinfos[$i]['atime']);?>年<?php echo date('m',$askinfos[$i]['atime']);?>月<?php echo date('d',$askinfos[$i]['atime']);?>日 </div> 
				                    		</div> 
				                    	</li><?php endif; } ?>
				                    </ul>
				                    <div class="faq-input">
				                        <span class="iconfont"></span>
				                        我要提问<input type="text" name="a_content" placeholder="您的提问将会发给小米官方客服和产品经理" class="input-content J_mi_ask_content">
				                        <a id="ask" class="btn btn-primary ques-btn J_mi_ask" href="">向购买者提问</a>
				                    </div>
				                </div>
				            </div>
				            <!-- FAQ END -->
				            <!-- 常见问题 -->
				            <div class="common-question">
				                <div class="question-hd clearfix">
				                    <div class="title_a">常见问题</div>
				                    <div class="title_b"><a id="serQue" href="" target="service">售后服务</a></div>
				                </div>
				                <div class="question-bd">
				                    <ul class="content">
				                        <li>
				                            <h3>如何挑选商品？</h3>
				                            <p>点击页面上方“加入购物车”按钮或页面下拉时顶部导航上的“加入购物车”按钮将商品加入购物车，再点击页面右上角的“购物车”前往购物车页面进行结算。</p>
				                        </li>
				                        <li>
				                            <h3>收藏商品功能</h3>
				                            <p>点击“收藏按钮”后，按钮中的白心亮起,背景由黑色变为黄色代表收藏成功，再次点击取消收藏。您可在“个人中心”中的我的收藏查看所有收藏商品。</p>
				                        </li>
				                        <li>
				                            <h3>维修网点销售配件吗？</h3>
				                            <p>所有授权维修网点具备维修手机标配里配件的功能，部分指定授权维修网点可销售标配及部分官网配件，具体销售的产品及价格请以维修网点信息为准。</p>
				                        </li>
				                        <li>
				                            <h3>退换货办理流程</h3>
				                            <p>您可拨打小米客服中心400-100-5678与客服人员沟通，或登录小米网“我的订单” -&gt;“订单详情”下方点击“申请售后服务”并填写相应信息，小米看到您的申请，会安排工作人员与您进行退换货质量确认并办理相关事宜。</p>
				                        </li>
				                    </ul>
				                </div>
				            </div>
				            <!-- 常见问题 END-->
				            <div style="height:0px;" class="guess-u-like">
				                <!--  <h2>猜你喜欢</h2>
				                <ul class="goods-list xm-goods-list clearfix" id="guess-u-like-box">
				                </ul> -->
				            </div>
			            </div>
		       		</div>
		       	</div>
		    </div>
		</div>
		<!-- 商品大图区结束 -->
	</div>
	<!-- 商品详情页结束 -->	
	<!-- 购物车顶部显示栏 -->
	<div id="goodsSubBar" class="goods-sub-bar">
	    <div class="container">
	        <div class="row">
	            <div class="span5">
	                <dl class="goods-sub-bar-info clearfix">
	                    <dt>
	                    	<img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>">
	                    </dt>
	                    <dd>
	                        <strong><?php echo ($info['title']); ?></strong>
	                        <p>
	                            <em><span class="J_mi_goodsPrice"><?php echo ($info['nowprice']); ?></span>元</em>
	                            <del><span class="J_mi_marketPrice"><?php echo ($info['price']); ?>元</span></del>
	                        </p>
	                    </dd>
	                </dl>
	            </div>
	            <div class="span15">
	                <div id="goodsSubBarBtnBox" class="fr">
	                    <a id="goodsSubBarAddCartBtn" class="btn btn-primary goods-add-cart-btn stopCursor" href="###">
	                        <i class="iconfont"></i>加入购物车
	                    </a>
	                    <a id="goodsSubBarAddCartBtn" class="btn btn-primary goods-add-cart-btn stopCursor" style="background:#90CE36;border:1px solid #90CE36;display:none;" href="###">
	                        <i class="iconfont"></i>加入成功
	                    </a>
	                    <a id="goodsSubBarAddCartBtn" class="btn btn-primary goods-add-cart-btn stopCursor" style="display:none" href="<?php echo U('Home/Cart/index',array('gid'=>$info['gid']));?>">
	                        <i class="iconfont"></i>去购物车结算
	                    </a>
	                </div>
	                <div id="goodsSubMenu" class="goods-desc-menu">
	                    <ul class="items clearfix J_pro_related_btns">
	                       <li class="current">
	                           <a href="#goodsDesc">详细信息</a>
	                       </li>
	                       <!-- <li>
	                           <a href="#goodsParam">规格参数</a>
	                       </li> -->
	                                              <li>
	                           <a href="#goodsComment">评价晒单</a>
	                       </li>
	                                              <li>
	                           <a href="#goodsFaq">商品提问</a>
	                       </li>

	                       <li>
	                           <a href="#serQue">售后服务</a>
	                       </li>
	                    </ul>
	                </div>

	            </div>
	        </div>
	    </div>
    </div>
	<!-- 售后服务 -->
	<div class="modal-faq modal hide in" id="modal-faq" style="display:none;">
	    <div class="modal-header faq-header">
	        <a id="closeservice" class="close" type="button"><i class="iconfont"></i></a>
	        <h3>售后服务与退换货流程</h3>
	    </div>
	    <div class="modal-body faq-body">
	        <iframe width="695" height="489" frameborder="0" src="<?php echo U('Home/Detail/service');?>"></iframe>
	    </div>
	</div>
	<!-- 遮层div开始 -->
	<div id="mm" class="mm"></div>
	<!-- 遮层div结束 -->
	<!-- JS详情代码区开始 -->
	<script type="text/javascript">
		//分类导航显示控制
			$('.breadcrumbs').append($('<a href="<?php echo U('Home/Index/index');?>">首页</a>'));

            <?php $__FOR_START_28482__=1;$__FOR_END_28482__=$pathlength;for($i=$__FOR_START_28482__;$i < $__FOR_END_28482__;$i+=1){ ?>$('.breadcrumbs').append($("<span class='sep'>/</span><a href='<?php echo U("Home/List/index",array("cid"=>$path[$i]));?>'><?php echo ($pathValue[$i]); ?></a>"));<?php } ?>

            $('.breadcrumbs').append($("<span class='sep'>/</span><a href='#'><?php echo ($info['title']); ?></a>"));

        //侧边分类栏控制
	        $(function(){
	            $('#J_categoryContainer').hover(function(){$('#nav-category-section').css('display','block');},
	                function(){$('#nav-category-section').css('display','none');})
	        })

		//创建默认显示的主图
			suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>",'#goods-big-pic img');
			$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>">');

		//主图单击事件
			var w = '';
			var h = '';
			var l = '';
			var t = '';
	 		$('.goods-big-pic').click(function(){
	 			//遮层div配置
	 			$('#mm').css({display:'block',background:'white',opacity:'1'});
	 			//body和遮层div配置
				$('body').css({overflow:'hidden'});
				//轮播小图隐藏
				$('#J_mi_goodsPicBox').find('.goods-small-pic').css('display','none');
				//获取元素初始位置,以便动画执行完后进行还原
				w = $('#J_mi_goodsPicBox').width()-8;
				h = $('#J_mi_goodsPicBox').height();
				l = $('#J_mi_goodsPicBox').offset().left;
				t = $('#J_mi_goodsPicBox').offset().top;
				//动画
	 			$('#J_mi_goodsPicBox').css({position: 'fixed',zIndex: '1002',background:'white'}).animate({
					width:'100%',
					height:'670px',
					left:'0px',
					top:'0px',
					
				},1000)
	 			//创建关闭按钮
				setTimeout(function(){
					$('#J_mi_goodsPicBox').append('<div id="close" style="width:60px;height:60px;background:#8C8C8C;color:white;text-align:center;line-height:60px;font-size:20px;z-index:300;position:fixed;left:50px;top:50px;cursor:pointer"><i class="iconfont"></i></div>')
				},1500)
	 		});

	 		//关闭设置
			$('#J_mi_goodsPicBox').find('#close').live('click',function(){
				$(this).remove();
				//动画还原
				$('#J_mi_goodsPicBox').css({position: 'absolute',zIndex: '1002',background:''}).animate({
					width:w,
					height:h,
					left:l,
					top:t,
				},1000)
				//body和遮层div配置 还原
				setTimeout(function(){
					$('#mm').css({display:'none',background:'gray',opacity:'0.2'});
					$('body').css({overflow:'auto'});
					$('#J_mi_goodsPicBox').find('.goods-small-pic').css('display','block');

				},1500)
				
			})

		//创建默认显示的副图
			$('#goodsPicList').append('<?php if(is_array($zhupic)): foreach($zhupic as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
			
		//创建购物车默认动画主图
			// suofang(140,140,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>",'.goods-info-head-size img');
			$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" class="J_goodsBigPic" style="width:100%;height:100%" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>"></div>');

		//绑定事件 --- 切换主图与副图
			var m = 0;
			var n = '';//定义尺寸
			$('.colorli a').click(function(){
				//移除原来主图与副图
				$('#J_mi_goodsPicBox .goods-big-pic,#goodsPicList').children().remove();
				// $(this).css('border','1px solid #ee330a').parent().siblings().children().css('border','none');
				//修改样式
				m = $(this).attr('m');
				$(this).addClass('coloractive').parent().siblings().children().removeClass('coloractive');
				if(m==0){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[0]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[0]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[0])): foreach($s_img[0] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[0]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					// suofang(140,140,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>",'.goods-info-head-size img');
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[0]); ?>"></div>');
					
					//重置购物车按钮
					
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}

					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}else if(m==1){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[1]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[1]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[1]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[1]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[1])): foreach($s_img[1] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[1]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[1]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					// suofang(140,140,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[1]); ?>",'.goods-info-head-size img');
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[1]); ?>"></div>');
					
					//重置购物车按钮
					
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}


					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}else if(m==2){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[2]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[2]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[2]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[2]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[2])): foreach($s_img[2] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[2]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[2]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					// suofang(140,140,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[2]); ?>",'.goods-info-head-size img');
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[2]); ?>"></div>');
					
					//重置购物车按钮
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}
					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}else if(m==3){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[3]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[3]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[3]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[3]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[3])): foreach($s_img[3] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[3]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[3]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[3]); ?>"></div>');
					
					//重置购物车按钮
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}
					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}else if(m==4){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[4]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[4]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[4]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[4]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[4])): foreach($s_img[4] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[4]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[4]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[4]); ?>"></div>');
					
					//重置购物车按钮
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}
					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}else if(m==5){
					//修改网页标题
					$('title').text("【<?php echo ($pathValue[2]); ?>】<?php echo ($info['title']); ?> <?php echo ($colortit[5]); ?>——小米手机官网")
					//修改商品标题
					$('#goodsName').text("<?php echo ($info['title']); ?> <?php echo ($colortit[5]); ?>")
					//创建主图
					suofang(430,430,"/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[5]); ?>",'#goods-big-pic img');
					$('#J_mi_goodsPicBox .goods-big-pic').append('<img id="J_BigPic" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[5]); ?>">')
					//创建副图
					$('#goodsPicList').append('<?php if(is_array($s_img[4])): foreach($s_img[4] as $key=>$vo): if($key==0): ?><li class="current"><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php else: ?><li class=""><img src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo); ?>"></li><?php endif; endforeach; endif; ?>');
					//修改购物车顶栏主图与商品标题
					$('#goodsSubBar').find('.goods-sub-bar-info').children(0).children().attr('src','/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[5]); ?>')
					$('#goodsSubBar').find('.goods-sub-bar-info').children(1).find('strong').text("<?php echo ($info['title']); ?> <?php echo ($colortit[5]); ?>");
					//创建购物车默认动画主图
					$('.goods-info-head-size').find('#moive').remove()
					$('.goods-info-head-size').prepend('<div id="moive" class="goods-big-pic" style="width:145px;height:145px;position:absolute;left:-10px;top:-34px;z-index:1000;display:none;opacity:0.6"><img id="J_BigPic" style="width:100%;height:100%" class="J_goodsBigPic"  src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($zhupic[5]); ?>"></div>');
					
					//重置购物车按钮
					$('#goodsDetailBtnBox a').eq(1).slideUp(600);
					
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(0).slideDown(600);
					},600)

					if(<?php echo ($info['mcid']); ?>==31){
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
					}else{
						$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
					}
					//重置尺码样式
					$('.sizespan').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
					n = '';
				}
			return false;
			});

		//点击副图轮播切换
			$('#goodsPicList li').live('click',function(){
				$(this).addClass('current').siblings().removeClass('current');
				var index = $(this).index();
				var srcimg = $(this).children().attr('src');
				suofang(430,430,srcimg,'#goods-big-pic img');
				$('#J_BigPic').attr('src',srcimg);
			});

		//上一张 下一张
			//hover事件
			$('#goodsPicPrev').hover(function(){
		    	$(this).css('background-position','0 center');
		    },function(){
		    	$(this).css('background-position','-84px center');
		    });

		    $('#goodsPicNext').hover(function(){
		    	$(this).css('background-position','-42px center');
		    },function(){
		    	$(this).css('background-position','-125px center');
		    })
		    //单击事件
			var index = 0;
			$('#goodsPicPrev').click(function(){
			   
				index--;
				if(index<0){
					index=3;
				}
				$('#goodsPicList li').eq(index).addClass('current').siblings().removeClass('current');
				srcimg = $('#goodsPicList li').eq(index).children().attr('src');
				$('#J_BigPic').attr('src',srcimg);
			});	

			$('#goodsPicNext').click(function(){
			   
				index++;
				//alert(index);
				if(index>3){
					index=0;
				}
				$('#goodsPicList li').eq(index).addClass('current').siblings().removeClass('current');
				srcimg = $('#goodsPicList li').eq(index).children().attr('src');
				//alert(srcimg)
				$('#J_BigPic').attr('src',srcimg);
			});	
					
		//定义尺寸size事件
			$('.sizespan').click(function(){
				$(this).css({border:'1px solid #ee330a',color:'#ee330a'}).parent().siblings().find('span').css({border:'1px solid #EDEDED',color:'#8C8C8C'});
				$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
				//获取尺寸
				 n = $(this).attr('value');
			});
		//不是服装的情况
			if(<?php echo ($info['mcid']); ?>==31){
				$('#goodsDetailBtnBox').find('.goods-add-cart-btn').addClass('stopCursor');
			}else{
				$('#goodsDetailBtnBox').find('.goods-add-cart-btn').removeClass('stopCursor');
			}

		//点击购物车事件
			if(<?php echo ($info['mcid']); ?>==31){
				$('#goodsDetailBtnBox a').eq(0).hover(function(){					
					if(n == ''){
						$(this).parent().append('<div class="goodsDetailInfo">请选择尺码</div>');
					}else{
						$(this).parent().find('.goodsDetailInfo').remove();
					}
				},function(){
					$(this).parent().find('.goodsDetailInfo').remove();
				
				})
			}
			//获取商品gid
			var gid = <?php echo ($info['gid']); ?>;
			//获取颜色
			var colortit = m;
			//获取尺寸
			var size = n;
			$('#cart').live('click',function(){
				if(n=='' && <?php echo ($info['mcid']); ?>==31){
					return false;
				}
				$(function(){$('#moive').css('display','block').animate({
					width:'25px',
					height:'25px',
					left:'260px',
					top:'-418px',
				},1000)});
				$(function(){$('#moive').fadeOut('fast')});

				$('#goodsDetailBtnBox a').eq(0).slideUp(600);
					var dd = $('#goodsDetailBtnBox a');
					setTimeout(function(){
						dd.eq(1).slideDown(600)
					},600)

				setTimeout(function(){
					$.ajax({
					url:"<?php echo U('Home/Cart/add');?>",
					type:'GET',
					data:{gid:gid},
					dataType:'json',
					success:function($data){  
					   do_cat();
					 },
					 timeout:60*1000,
				 });
				},1200);

				return false;
			})

		//详情显示
			var intro = eval(<?php echo ($intro); ?>);
			var reg = /\w+\.(jpg|jpeg|png|gif)/;
			for(var i in intro){
				if(reg.test(intro[i])){
					$('#goodsDesc').append('<img style="margin-bottom:40px;" src="/322_thinkphp_xiaomi/Public/Upload/Goods/'+intro[i]+'" alt=""><br>');
				}else{
					$('#goodsDesc').append("<p style='font-size:30px;font-family:macrosoft yahei'>"+intro[i]+"</p><br>");
				}
			}

		//顶部购物车的显示控制
			$(window).scroll(function(){
				//获取元素相对文档的高度
				var t = $('#goodsDesc').offset().top;
				//获取可视区域的高度
				var vH = $(window).height();
				//获取元素的滚动高度
				var sH = $(window).scrollTop();
				if(sH >= t-2){
					$('#goodsSubBar').addClass('goods-sub-bar-play')
				}else{
					$('#goodsSubBar').removeClass('goods-sub-bar-play')
				}

			});

			var mcid = <?php echo ($info['mcid']); ?>;

			$(function(){$('#goodsSubBarAddCartBtn').click(function(){
				if(n=='' && mcid==31){
					$('#mm').css('display','block');
					$('body').css({overflow:'hidden'});
					alert('请选择您要购买的商品尺码');
					$('#mm').css('display','none');
					$('body').css({overflow:'auto'});
					return false;
				}else{
					// $(this).css({display:'none'}).next().css({display:'block'});
					$(this).hide(600);
					var t = $(this);
					setTimeout(function(){
						t.next().slideDown(1000)
					},601)
					setTimeout(function(){
						// t.next().css('display','none').next().css('display','block');
						t.next().slideUp(0).next().show(1000)
					},2500)
				}})
			});

		//售后服务
			$('#serQue').click(function(){
				$('#modal-faq,#mm').css({display:'block'})
				return false;
			})
			$('#closeservice').click(function(){
				$('#modal-faq,#mm').css({display:'none'})
			})	

		//商品评论
			var p = 1;//当前页码
			var isLoading = false;//是否正在加载
			var gid=<?php echo ($info['gid']); ?>;//获取gid
			$(function(){
				//当页面加载完毕之后 请求服务器
				$.get("<?php echo U('Home/Detail/getComment');?>",{p:p,num:5,gid:gid}, function(data){
					for(var i=0;i<data.length;i++){
						var huifu = '';
						if(data[i].status == 1){
							huifu = '<div class="art_reply"> <i>官方回复：</i>'+data[i].recontent+'</div>';
						}else{
							huifu = '<div class="art_reply"> 暂无回复</div>';
						}
						//创建元素
						var newLi = $('<li><div class="article"><h3 class="art_star clearfix"><div class="leftPart"><span class="icon-stat icon-stat-'+data[i].com_star+'"></span></div><div class="rightPart">'+data[i].comment_time+'</div></h3><div class="art_content"><a href="" target="_blank" onclick="">'+data[i].content+'</a></div>'+huifu+'</div> <div class="head_photo"> <a href="" target="_blank" onclick=""><img alt="" src="/322_thinkphp_xiaomi/Public/'+data[i].img+'"></a><a href="" target="_blank" onclick=""><h3 class="name">'+data[i].name+'</h3></a> </div></li>');
						//将元素插入到ul中
						$('.J_goods_detail_comment_content').append(newLi);
					}
					//请求完毕之后 页码加1
					p++;
				},'json');

				//绑定单击事件
				$('.J_goods_detail_comment_more').click(function(){
					if(isLoading == true)
					//修改加载状态
					isLoading = true;
					//请求ajax
					$.get("<?php echo U('Home/Detail/getComment');?>",{p:p,num:5,gid:gid}, function(data){
						for(var i=0;i<data.length;i++){
							//创建元素
							var newLi = $('<li><div class="article"><h3 class="art_star clearfix"><div class="leftPart"><span class="icon-stat icon-stat-'+data[i].com_star+'"></span></div><div class="rightPart">'+data[i].comment_time+'</div></h3><div class="art_content"><a href="" target="_blank" onclick="">'+data[i].content+'</a></div><?php if('+data[i].status+' == 1): ?><div class="art_reply"> <i>官方回复：</i>'+data[i].recontent+'</div><?php else: ?><div class="art_reply"> 暂无回复</div><?php endif; ?></div> <div class="head_photo"> <a href="" target="_blank" onclick=""><img alt="" src="/322_thinkphp_xiaomi/Public/'+data[i].image+'"></a><a href="" target="_blank" onclick=""><h3 class="name">'+data[i].name+'</h3></a> </div></li>');
							//将元素插入到ul中
							$('.J_goods_detail_comment_content').append(newLi);
						}
						//请求完毕之后 页码加1
						p++;
						//修改加载状态
						isLoading = false;
					},'json');
					return false;
				})
			})

		//产品提问
			$('input[type=text]').focus(function(){
				$(this).val('');
			})
			$('#ask').click(function(){
	        	var a_content = $(this).parent().find('input').val();
	        	//获取参数
	        	var mgid = '<?php echo ($mgid); ?>';
	        	var title = '<?php echo ($info['title']); ?>';
	        	var zhupic = '<?php echo ($zhupic[0]); ?>';
	        	var uid = '<?php echo ($uid); ?>';
	        	var mssid = '<?php echo ($mssid); ?>';
	        	$.post("<?php echo U('Admin/Ask/insert');?>",{mgid:mgid,title:title,zhupic:zhupic,uid:uid,mssid:mssid,a_content:a_content},function(){
	        		alert('提交成功  等待审核！');
	        	})
	        	return false;
	        })

	        //单击查看全部
	        $('.more-link').click(function(){
        		$('.faq-list').empty().append('<?php $__FOR_START_11091__=0;$__FOR_END_11091__=count($askinfos);for($i=$__FOR_START_11091__;$i < $__FOR_END_11091__;$i+=1){ if($askinfos[$i]['isok'] == 1): ?><li><h3 class="question"><span class="icon-ques">Q</span><span><?php echo ($askinfos[$i]['a_content']); ?></span></h3><p class="answer"><span class="icon-ques icon-ans stard">A</span><?php echo ($askinfos[$i]['r_content']); ?></p><div class="author"><div class="leftPart"> <span><?php echo ($askinfos[$i]['mssid']); ?></span></div><div class="rightPart"> <?php echo date('Y',$askinfos[$i]['atime']);?>年<?php echo date('m',$askinfos[$i]['atime']);?>月<?php echo date('d',$askinfos[$i]['atime']);?>日 </div></div></li><?php endif; } ?>')
        	})

	    //收藏
	        $('.like').click(function(){
	            var uid = '<?php echo ($uid); ?>';
	            if(!uid){
	                alert('请先登录');
	                return false;
	            }else{
	                var uid = '<?php echo ($uid); ?>';
	                var mssid = '<?php echo ($mssid); ?>';
	                var mgid = $(this).parent().find('.gid').text();
	                var title = $(this).parent().find('.title').text();
	                var colortit = $(this).parent().find('.corlortit').text();
	                var zhupic = $(this).parent().find('.zhupic').text();
	                var price = $(this).parent().find('.price').text();
	                var nowprice = $(this).parent().find('.nowprice').text();
	                var comment = $(this).parent().find('.comment').text();
	                var t = $(this);
	                $.get("<?php echo U('Home/Like/check');?>",{mgid:mgid,uid:uid},function(data){
	                    if(data==1){
	                        alert('您已经收藏过此商品');
	                    }else if(data==0){
	                        $.get("<?php echo U('Home/Like/insert');?>",{uid:uid,mssid:mssid,mgid:mgid,title:title,zhupic:zhupic,colortit:colortit,price:price,nowprice:nowprice,comment:comment},function(){
	                            t.removeClass('btn-dake').addClass('btn-yellow');
	                            setTimeout(function(){
	                                t.removeClass('btn-yellow').addClass('btn-dake');
	                            },3000)
	                        })
	                    }
	                })
	                return false;
	            }
	        })

		//缩放ajax函数
			function suofang(w,h,src,element){
				$(function(){
					$.get("<?php echo U('Home/Detail/suofang');?>",{wsize:w,hsize:h,src:src},function(data){
						if(data[0]==430&&data[1]==430){
							return;
						}else{
							$(element).css({position:'absolute',left:'50%',top:'40%',marginLeft:'-'+data[0]/2+'px',marginTop:'-'+data[1]/2+'px',width:data[0],height:data[1]});
						}
						
					})
				})
			}
		
	</script> 
	<!-- JS详情代码区结束 --> 

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