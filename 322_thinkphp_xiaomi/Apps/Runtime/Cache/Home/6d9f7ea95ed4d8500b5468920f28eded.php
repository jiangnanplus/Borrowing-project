<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title>个人中心</title>
    <link rel="stylesheet" href="/xm/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="/xm/Public/Home/css/index.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/xm/Public/Home/css/user-center.css">
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
	

<!-- 个人中心主体内容start -->


    <!-- 个人中心小导航条start -->
    <div class="container breadcrumbs">
        <a href="<?php echo U('Home/Index/index');?>">首页</a>
        <span class="sep">/</span><span class="smallt">个人中心</span>
    </div>
    <!-- 个人中心小导航条end -->
    
    <!-- 内容区start -->
    <div class="container">
        <div class="uc-full-box">
            <div class="row zhong">

                <!-- 内容区 left 列表栏start -->
                <div class="span4">
                    <!-- 列表栏个人中心区块 -->
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd xuanxk">
                            <ul class="uc-nav-list">
                                <li class="current selected wdgrzx" style="border:0px;"><a href="#">我的个人中心</a></li>
                                <li class="dingdan" dingdanli="<?php echo ($dingdanli); ?>"><a href="#">我的订单</a></li>
                                <li class="goodspj" goodspjli="<?php echo ($goodspjli); ?>"><a href="<?php echo U('Home/UserCenter/index');?>?goodspjli=goodspj">商品评价</a></li>
                                <li class="shdzgl"><a href="#">收货地址管理</a></li>
                                <li class="wdsc like" shoucangli="<?php echo ($shoucangli); ?>"><a href="#">我的收藏</a></li>
                                <li><a target="_blank" href="<?php echo U('Home/AlterPassword/index');?>">修改密码</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- 内容区 left 列表栏end -->

                <!-- 内容区 right 内容显示区start -->
                <div class="span16 neirun">
                    <div class="grzx">
                        <!-- 我的个人中心start -->
                        <div class="grzxnr">
                            <div class="xm-box uc-box">
                                <!-- right 头部 start-->
                                <div class="xm-line-box uc-info-box">
                                    <div class="box-bd clearfix">
                                        <img alt="" src="/xm/Public/<?php echo ($userInfo[0]['img']); ?>" class="uc-avatar">
                                        <div class="uc-info">
                                            <h3 class="uc-welcome"><span class="user-name"><?php echo ($userInfo[0]['name']); ?></span>您好～</h3>
                                            <div class="uc-info-detail">
                                                <div class="info-notice">
                                                    账户安全级别：
                                                    <span class="icon-common icon-safe-level icon-safe-level-3" style="background:url('/xm/Public/Home/image/dengji.png');background-position: -14px -22px;"></span> 较高 
                                                    <span class="sep">|</span>
                                                    <span class="icon-common"><img src="/xm/Public/Home/image/zqdj.png" alt="" style="margin-bottom:3px;"></span> 绑定手机 : <?php echo ($userInfo[0]['phone']); ?> 
                                                    <span class="sep"> |</span>
                                                    <span class="icon-common"><img src="/xm/Public/Home/image/zqdj.png" alt="" style="margin-bottom:3px;"></span> 绑定邮箱 : <?php echo ($userInfo[0][email]); ?> 
                                                </div>
                                                <div class="info-goods">
                                                    <!--
                                                    <a href="#">新品上架（??）</a>
                                                    <span class="sep">|</span>
                                                    <a href="#">收藏商品降价（?）</a>
                                                    <span class="sep">|</span>
                                                    <a href="#">待评价商品（?）</a>
                                                    <span class="sep">|</span>
                                                    <a href="#">发现商品</a>
                                                    -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- right 头部 end-->
                                <!-- 未支付订单区块start -->
                                <div class="xm-line-box uc-home-box">
                                    <div class="box-hd">
                                        <h3 class="title">未支付订单</h3>
                                    </div>
                                    <div class="box-bd">
                                        <!-- 循环遍历我的订单列表start -->
                                        <?php if(is_array($orderNameInfo)): foreach($orderNameInfo as $key=>$vo): if(($vo['status']) == "0"): ?><li class="uc-order-detail-item-combined ddli">
                                                    <table class="order-detail-table"> 
                                                        <thead> 
                                                            <tr> 
                                                                <th colspan="4" class="column-info column-t"> 
                                                                    <div class="column-content clearfix"> 
                                                                        <div class="column-content-l"> 
                                                                            订单号：<a href="#"><?php echo ($vo['onumber']); ?></a>   
                                                                            <span class="sep">|</span> <?php echo ($vo['name']); ?> <span class="sep">|</span> <?php echo date('Y年m月d日  H:i',$vo['otime']);?>
                                                                        </div> 
                                                                    <div class="column-content-r">  </div>  
                                                                    </div> 
                                                                </th> 
                                                            </tr>
                                                        </thead> 
                                                        <tbody>     
                                                            <tr>
                                                                <td class="column-detail"> 
                                                                    <ul class="order-goods-list clearfix">
                                                                        <?php if(is_array($vo['ginfo'])): foreach($vo['ginfo'] as $key=>$v): ?><li>    
                                                                            <!-- <a href="#" target="_blank"> -->
                                                                            <a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($v['gid']); ?>">
                                                                                <img alt="" src="/xm/Public/Upload/Goods/<?php echo ($v['s_img']); ?>" class="goods-thumb" title="<?php echo ($v['title']); ?>">
                                                                            </a>
                                                                        </li><?php endforeach; endif; ?>
                                                                    </ul>
                                                                </td>
                                                                <td class="column-price"> <div class="order-info order-price">
                                                                    <!-- 普通订单 <div class="price">1082.9元</div> --> <!-- 礼物订单 start -->
                                                                    <div class="price price-special"> <?php echo ($vo['money']); ?>元  </div>
                                                                    <!-- 礼物订单 end --> 在线支付 </div>
                                                                </td>
                                                                <td rowspan="1" class="column-action column-r">
                                                                    <div class="order-info order-action"> 
                                                                        <a href="<?php echo U('Home/OrderDetails/index');?>?onumber=<?php echo ($vo['onumber']); ?>">订单详情<i class="iconfont"></i></a>    
                                                                        <a href="#" title="申请售后">申请售后<i class="iconfont"></i></a>    
                                                                    </div> 
                                                                </td>  
                                                            </tr>   
                                                        </tbody>             
                                                    </table> 
                                                </li>
                                            <?php else: ?>
                                                <!-- <div class="uc-tip-section">
                                                    <p class="empty">您暂时没有未付款订单。<a href="#" data-stat-id="f87649d2eb9eace6">挑挑喜欢的商品去»</a></p>
                                                </div> --><?php endif; endforeach; endif; ?>
                                        <!-- 循环遍历我的订单列表end -->
                                    </div>
                                </div>
                                <!-- 未支付订单区块end -->
                                <!-- 未收货订单区块start -->
                                <div class="xm-line-box uc-home-box">
                                    <div class="box-hd">
                                        <h3 class="title">未收货订单</h3>
                                    </div>
                                    <div class="box-bd">
                                        <!-- 循环遍历我的订单列表start -->
                                        <?php if(is_array($orderNameInfo)): foreach($orderNameInfo as $key=>$vo): if(($vo['status']) == "2"): ?><li class="uc-order-detail-item-combined ddli">
                                                    <table class="order-detail-table"> 
                                                        <thead> 
                                                            <tr> 
                                                                <th colspan="4" class="column-info column-t"> 
                                                                    <div class="column-content clearfix"> 
                                                                        <div class="column-content-l"> 
                                                                            订单号：<a href="#"><?php echo ($vo['onumber']); ?></a>   
                                                                            <span class="sep">|</span> <?php echo ($vo['name']); ?> <span class="sep">|</span> <?php echo date('Y年m月d日  H:i',$vo['otime']);?>
                                                                        </div> 
                                                                    <div class="column-content-r">  </div>  
                                                                    </div> 
                                                                </th> 
                                                            </tr>
                                                        </thead> 
                                                        <tbody>     
                                                            <tr> 
                                                                <td class="column-detail"> 
                                                                    <ul class="order-goods-list clearfix">
                                                                        <?php if(is_array($vo['ginfo'])): foreach($vo['ginfo'] as $key=>$v): ?><li>    
                                                                            <!-- <a href="#" target="_blank"> -->
                                                                            <a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($v['gid']); ?>">
                                                                                <img alt="" src="/xm/Public/Upload/Goods/<?php echo ($v['s_img']); ?>" class="goods-thumb" title="<?php echo ($v['title']); ?>">
                                                                            </a>
                                                                        </li><?php endforeach; endif; ?>
                                                                    </ul>
                                                                </td>
                                                                <td class="column-price"> <div class="order-info order-price">
                                                                    <!-- 普通订单 <div class="price">1082.9元</div> --> <!-- 礼物订单 start -->
                                                                    <div class="price price-special"> <?php echo ($vo['money']); ?>元  </div>
                                                                    <!-- 礼物订单 end --> 在线支付 </div>
                                                                </td>
                                                                <td rowspan="1" class="column-action column-r">
                                                                    <div class="order-info order-action"> 
                                                                        <a href="<?php echo U('Home/OrderDetails/index');?>?onumber=<?php echo ($vo['onumber']); ?>">订单详情<i class="iconfont"></i></a>    
                                                                        <a href="#" title="申请售后">申请售后<i class="iconfont"></i></a>    
                                                                    </div> 
                                                                </td>  
                                                            </tr>   
                                                        </tbody>             
                                                    </table> 
                                                </li>
                                            <?php else: ?>
                                                <!-- div class="uc-tip-section">
                                                    <p class="empty">您暂时没有未收货订单。<a href="#" data-stat-id="f87649d2eb9eace6">挑挑喜欢的商品去»</a></p>
                                                </div> --><?php endif; endforeach; endif; ?>
                                        <!-- 循环遍历我的订单列表end -->
                                    </div>
                                </div>
                                <!-- 未收货订单区块end -->
                                <!-- 购物车&收藏夹区块start -->
                                <div class="row">
                                    <!-- 购物车区块start -->
                                    <div class="col col-8 col-8-first">
                                        <div class="xm-line-box uc-home-box uc-cart-box">
                                            <div class="box-hd">
                                                <h3 class="title">购物车</h3>
                                            </div>
                                            <div class="box-bd">
                                                <ul class="uc-item-list clearfix">
                                                    <?php if(is_array($shopcart)): foreach($shopcart as $key=>$vo): ?><li>
                                                            <a title="<?php echo ($vo['title']); ?>" href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($vo['gid']); ?>" target="_blank" data-stat-id="8c347371711eea3f"><img alt="<?php echo ($vo['title']); ?>" src="/xm/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>"></a>
                                                        </li><?php endforeach; endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 购物车区块end -->
                                    <!-- 收藏夹区块start -->
                                    <div class="col col-8">
                                        <div class="xm-line-box uc-home-box uc-fav-box">
                                            <div class="box-hd">
                                                <h3 class="title">收藏夹</h3>
                                            </div>
                                            <div class="box-bd">
                                                <ul class="uc-item-list clearfix">
                                                    <?php if(is_array($likeinfos_center)): foreach($likeinfos_center as $key=>$vo): ?><li>
                                                            <a title="<?php echo ($vo['title']); ?> <?php echo ($vo['colortit']); ?>" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['mgid']));?>" target="_blank"><img alt="<?php echo ($vo['title']); ?> <?php echo ($vo['colortit']); ?>" src="/xm/Public/Upload/Goods/<?php echo ($vo['zhupic']); ?>"></a>
                                                        </li><?php endforeach; endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 收藏夹区块end -->
                                </div>
                                <!-- 购物车&收藏夹区块end -->
                            </div>
                        </div>
                        <!-- 我的个人中心end-->

                        <!-- 我的订单start -->
                        <div class="grzxnr hide">
                            <div class="xm-line-box uc-box">
                                <!-- 我的订单导航栏 start-->
                                <div class="box-hd">
                                    <h3 class="title">我的订单</h3>
                                    <div class="more">
                                        <div class="uc-order-list-type">
                                        <a data-type="0" class="J_orderType current" href="#" data-stat-id="f1d91c28e8268979">全部订单</a>
                                        <span class="sep">|</span>
                                        <a data-type="7" class="J_orderType" href="#" data-stat-id="f59ae470b89abeed">未支付订单</a>
                                        <span class="sep">|</span>
                                        <a data-type="11" class="J_orderType" href="#" data-stat-id="643111dce676a932">我的团购</a>
                                        <span class="sep">|</span>
                                        <a data-type="recharge" class="J_orderType" href="#" data-stat-id="f10cd0845f07764f">话费充值订单</a>
                                        <span class="sep">|</span>
                                        <a data-type="5" class="J_orderType" href="#" data-stat-id="8fd45c8865c98100">已关闭订单</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 我的订单导航栏 end-->

                                <!-- 订单详情区start -->
                                <div class="box-bd">
                                    <div id="J_orderListLoading" class="uc-order-list-loading" style="display: none;">
                                        正在加载...
                                    </div>
                                    <div class="uc-order-list-box">
                                        <ul id="J_orderListEmpty" class="uc-order-detail-list hide " style="display: none;">
                                            <li class="uc-order-detail-item empty">
                                                您目前还没有<span id="J_orderTypeTitle"></span>相关订单。
                                            </li>
                                        </ul>
                                        <ul id="J_orderList" class="uc-order-detail-list " style="display: block;">

                <!-- 循环遍历我的订单列表start -->
                <?php if(is_array($orderNameInfo)): foreach($orderNameInfo as $key=>$vo): ?><li class="uc-order-detail-item-combined ddli">
                        <table class="order-detail-table"> 
                            <thead> 
                                <tr> 
                                    <th colspan="4" class="column-info column-t"> 
                                        <div class="column-content clearfix"> 
                                            <div class="column-content-l"> 
                                                订单号：<a href="#"><?php echo ($vo['onumber']); ?></a>   
                                                <span class="sep">|</span> <?php echo ($vo['name']); ?> <span class="sep">|</span> <?php echo date('Y年m月d日  H:i',$vo['otime']);?>
                                            </div> 
                                        <div class="column-content-r">  </div>  
                                        </div> 
                                    </th> 
                                </tr>
                            </thead> 
                            <tbody>     
                                <tr>  
                                    <td class="column-delivery column-l">  
                                        <span class="order-status">

                                            <?php switch($vo['status']): case "0": ?>等待支付<?php break;?>    
                                                <?php case "1": ?>已支付<?php break;?> 
                                                <?php case "2": ?><span  class="qrsh" onumber="<?php echo ($vo['onumber']); ?>"  style="width:63px;height:42px; font-size: 12px;color:white;background-color: #ff4a00;border:1px solid red;cursor:pointer;padding:5px 10px;">确认收货</span><?php break;?>    
                                                <?php case "3": ?>已收货<?php break;?>    
                                                <?php default: ?>未支付<?php endswitch;?>

                                        </span>   
                                    </td> 
                                    <td class="column-detail"> 
                                        <ul class="order-goods-list clearfix">
                                            <?php if(is_array($vo['ginfo'])): foreach($vo['ginfo'] as $key=>$v): ?><li>    
                                                <!-- <a href="#" target="_blank"> -->
                                                <a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($v['gid']); ?>">
                                                    <img alt="" src="/xm/Public/Upload/Goods/<?php echo ($v['s_img']); ?>" class="goods-thumb" title="<?php echo ($v['title']); ?>">
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                        </ul>
                                    </td>
                                    <td class="column-price"> <div class="order-info order-price">
                                        <!-- 普通订单 <div class="price">1082.9元</div> --> <!-- 礼物订单 start -->
                                        <div class="price price-special"> <?php echo ($vo['money']); ?>元  </div>
                                        <!-- 礼物订单 end --> 在线支付 </div>
                                    </td>
                                    <td rowspan="1" class="column-action column-r">
                                        <div class="order-info order-action"> 
                                            <?php if(($vo['status']) == "0"): ?><a href="<?php echo U('Home/OrderDetails/index');?>?onumber=<?php echo ($vo['onumber']); ?>" style="margin-bottom:5px;">订单详情 ><i class="iconfont"></i></a>
                                                <a href="<?php echo U('Home/Pay/index');?>"><span  class="lijizhifu" onumber="<?php echo ($vo['onumber']); ?>"  style="width:63px;height:40px; font-size: 12px;color:white;background-color: #ff4a00;border:1px solid red;cursor:pointer;padding:3px 20px;">立即支付</span></a>
                                            <?php else: ?>
                                                <a href="<?php echo U('Home/OrderDetails/index');?>?onumber=<?php echo ($vo['onumber']); ?>">订单详情 ><i class="iconfont"></i></a>
                                                <a href="#" title="申请售后">申请售后 ><i class="iconfont"></i></a><?php endif; ?>          
                                        </div> 
                                    </td>  
                                </tr>   
                            </tbody>             
                        </table> 
                    </li><?php endforeach; endif; ?>
                <!-- 循环遍历我的订单列表end -->
                <script type="text/javascript">
                //确认收货
                    //获取元素
                    var affirm = $('.uc-order-detail-item-combined').find('.qrsh');
                    affirm.click(function(){
                        var oneself = $(this);
                        //获取订单号
                        var onumber = $(this).attr('onumber');
                        $.get("<?php echo U('Home/UserCenter/statusUpdate');?>",{onumber:onumber,status:3},function(data){
                            if(data == "3"){
                                oneself.parent().html("已收货");
                            }else{
                                alert("no");
                            }
                        });
                    });
                </script>
                                        </ul>
                                    </div>
                                    <div id="J_pagesNav" class="xm-pagenavi" style="display: none;"></div>
                                </div>
                                <!-- 订单详情区end -->
                            </div>
                        </div>
                        <!-- 我的订单end -->

                        <!-- 商品评价start -->
                        <div class="grzxnr hide">
                            <div class="span16">
                                <div class="xm-line-box uc-box uc-comment-box">
                                    <div class="box-hd">
                                        <h3 class="title">商品评价<small class="tips">感谢您在小米网购买商品。我们真诚的邀请您对购买到的商品发表使用感受和评价。</small></h3>
                                        <div class="more">
                                            <div class="uc-order-list-type">
                                                <a href="#" data-stat-id="0e58177dbaeed9eb">待评价商品</a>
                                                <span class="sep">|</span>
                                                <a href="#" data-stat-id="2e7b6ec1b9bd67aa">已评价商品</a>
                                                <span class="sep">|</span>
                                                <a href="#" data-stat-id="70d10b3d93fabef1">评价失效商品</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-bd">
                                        <div class="xm-goods-list-wrap">
                                            <ul class="xm-goods-list clearfix">

                                                <!-- 遍历显示我的商品start -->

                                                <?php if(is_array($orderInfo)): foreach($orderInfo as $key=>$vo): if(is_array($vo['ginfo'])): foreach($vo['ginfo'] as $key=>$v): ?><li class="pjli">
                                                            <div class="xm-goods-item" gid=<?php echo ($v['gid']); ?> img=<?php echo ($v['s_img']); ?> title=<?php echo ($v['title']); ?>>
                                                                <div class="item-thumb">
                                                                    <a href="<?php echo U('Home/Detail/index');?>?gid=<?php echo ($v['gid']); ?>">
                                                                    <img alt="" src="/xm/Public/Upload/Goods/<?php echo ($v['s_img']); ?>">
                                                                    </a>
                                                                </div>
                                                                <div class="item-info">
                                                                    <h3 class="item-title">
                                                                        <a href="#"><?php echo ($v['title']); ?></a>
                                                                    </h3>
                                                                    <div class="item-price"><?php echo ($v['nowprice']); ?>元</div>
                                                                    <div class="item-star">
                                                                        <span class="icon-stat icon-stat-5"></span>
                                                                        <span class="item-comments"></span>&nbsp;&nbsp;人评价
                                                                    </div>
                                                                    <div class="item-actions">
                                                                        <!-- <a href="<?php echo U('Home/Appraise/index');?>?gid=<?php echo ($v['gid']); ?>&img=<?php echo ($v['s_img']); ?>&title=<?php echo ($v['title']); ?>" class="btn btn-lineDake btn-small opj_lnk ha" style="margin-left:76px;">我要评价</a> -->
                                                                        <a class="btn btn-lineDake btn-small opj_lnk ha" style="margin-left:76px;">我要评价</a>
                                                                        <a class="btn btn-lineDake btn-small opj_lnk noha" style="color:white;background-color:#333;margin-left:76px;">查看评价详情</a>
                                                                    </div>
                                                                    <div class="item-flag"></div>
                                                                </div>
                                                            </div>
                                                        </li><?php endforeach; endif; endforeach; endif; ?>

                                                <script type="text/javascript">
                                                    //检测是否已经评价
                                                    var mygoods = $('div.xm-goods-item');
                                                    //绑定鼠标移动上去事件
                                                    mygoods.hover(function(){
                                                        var oneself = $(this);
                                                        var gid = oneself.attr('gid');
                                                        var img = oneself.attr('img');
                                                        var title = oneself.attr('title');
                                                        //通过是否有fasong属性判断是否发生ajax请求
                                                        if($(this).attr('fasong') != "fa"){
                                                            //发送ajax请求
                                                            $.get("<?php echo U('Home/UserCenter/Comselect');?>",{gid:gid},function(data){
                                                                //添加评论总数
                                                                var counts = data.counts;
                                                                oneself.find('.item-comments').text(counts);
                                                                //判断是否已经评论
                                                                if(data['ping'] == "pinglun"){
                                                                    oneself.find('.ha').css('display',"none");
                                                                    oneself.find('.noha').css('display',"block");
                                                                    //查看评价跳转路径参数
                                                                    oneself.find('.noha').attr('href',"<?php echo U('Home/Myappraise/index');?>?gid="+gid);
                                                                }else{
                                                                    oneself.find('.ha').css('display',"block");
                                                                    oneself.find('.noha').css('display',"none");
                                                                    //添加评价跳转路径参数
                                                                    oneself.find('.ha').attr('href',"<?php echo U('Home/Appraise/index');?>?gid="+gid+"&img="+img+"&title="+title+"&counts="+counts);
                                                                }
                                                                //发送请求后添加属性
                                                                oneself.attr('fasong','fa');
                                                            });
                                                        }
                                                    },function(){});

                                                </script>

                                                <!-- 遍历显示我的商品end -->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 商品评价end --> 

                        <!-- 收货地址管理tart -->
                        <div class="grzxnr hide">
                            <div class="xm-line-box uc-box">
                                <div class="box-hd">
                                    <h3 class="title">管理收货地址</h3>
                                </div>

                                <div class="box-bd clearfix">
                                    <div class="uc-address-section">
                                        <div class="xm-address-list uc-address-list clearfix">
                                            <!-- 使用新地址start -->
                                            <div data-state="off" class="replaceOne item use-new-addr J_addAddress">
                                                <span class="iconfont icon-add"></span>
                                                使用新地址
                                            </div>
                                            <!-- 使用新地址end-->
                                            <!-- 遍历用户已添加的收货地址start -->
                                            <?php if(is_array($addressInfo)): foreach($addressInfo as $key=>$vo): ?><dl class="item bianli olds">
                                                    <dt>
                                                        <strong class="itemConsignee"><?php echo ($vo["consignee"]); ?></strong>
                                                        <span class="itemTag tag"><?php echo ($vo["tag"]); ?></span>
                                                    </dt>
                                                    <dd>
                                                        <p class="tel itemTel"><?php echo ($vo["telephone"]); ?></p>
                                                        <!-- <p class="itemRegion" value="<?php echo ($vo[provinve]); ?>"><?php echo ($arr[$vo[province]]); ?></p> -->
                                                        <p class="itemRegion" pro="<?php echo ($vo['province']); ?>"><?php echo ($arr[$vo[province]]); ?></p>
                                                        <p class="itemStreet"><span class="site"><?php echo ($vo["site"]); ?></span> <span class="zipcode"><?php echo ($vo["zipcode"]); ?></span></p>
                                                        <a class="edit-btn J_editAddr" aid="<?php echo ($vo["aid"]); ?>">编辑</a>
                                                        <a class="edit-btn J_delAddr" aid="<?php echo ($vo["aid"]); ?>">删除</a>
                                                    </dd>
                                                </dl><?php endforeach; endif; ?>
                                            <!-- 遍历用户已添加的收货地址end -->
                                        </div>
                                            
                                    </div>
                                </div>
                                <!-- 点击使用新地址显示表单start -->
                                <div class="uc-address-edit-section  replaceTwo rt">
                                    <div class="xm-edit-addr-box" id="J_editAddrBox">
                                        <!-- form表单 -->
                                        <!-- <form method="post" action="<?php echo u(Home/UserCenter/insert);?>"> -->
                                            <div id="formbd" class="bd">
                                                <div id="aid" value=""></div>
                                                <div class="item" style="margin-top:12px">
                                                    <label for="Consignee">收货人姓名<span></span></label>
                                                    <input type="text" value="" maxlength="15" placeholder="收货人姓名" class="input" id="Consignee" name="consignee">
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                                <div class="item">
                                                    <label for="Telephone">联系电话<span></span></label>
                                                    <input type="text" value="" placeholder="11位手机号" id="Telephone" class="input" name="telephone">
                                                    <p id="telModifyTip" class="tel-modify-tip">如果不修改手机号，请重新输入原收货手机号 <em></em> 以便确认</p>
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                                <div class="item san">

                                                    <label for="Provinces">地址<span></span></label>
                                                    <select class="select-1" id="Provinces" name="provinces">
                                                        <option value="0">省份/自治区</option><option value="2" zipcode="0">北京</option><option value="3" zipcode="0">天津</option><option value="4" zipcode="0">河北</option><option value="5" zipcode="0">山西</option><option value="6" zipcode="0">内蒙古</option><option value="7" zipcode="0">辽宁</option><option value="8" zipcode="0">吉林</option><option value="9" zipcode="0">黑龙江</option><option value="10" zipcode="0">上海</option><option value="11" zipcode="0">江苏</option><option value="12" zipcode="0">浙江</option><option value="13" zipcode="0">安徽</option><option value="14" zipcode="0">福建</option><option value="15" zipcode="0">江西</option><option value="16" zipcode="0">山东</option><option value="17" zipcode="0">河南</option><option value="18" zipcode="0">湖北</option><option value="19" zipcode="0">湖南</option><option value="20" zipcode="0">广东</option><option value="21" zipcode="0">广西</option><option value="22" zipcode="0">海南</option><option value="23" zipcode="0">重庆</option><option value="24" zipcode="0">四川</option><option value="25" zipcode="0">贵州</option><option value="26" zipcode="0">云南</option><option value="27" zipcode="0">西藏</option><option value="28" zipcode="0">陕西</option><option value="29" zipcode="0">甘肃</option><option value="30" zipcode="0">青海</option><option value="31" zipcode="0">宁夏</option><option value="32" zipcode="0">新疆</option>
                                                    </select>
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                                <div class="item">
                                                    <textarea placeholder="城市/地区/自治州/区/县/路名或街道地址，门牌号" id="Site" class="input-area" name="site"></textarea>
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                                <div class="item">
                                                    <label for="Zipcode">邮政编码<span></span></label>
                                                    <input type="text" value="" placeholder="邮政编码" class="input" id="Zipcode" name="zipcode">
                                                    <p id="zipcodeTip" class="zipcode-tip"></p>
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                                <div class="item">
                                                    <label for="Tag">地址标签<span></span></label> 
                                                    <input type="text" placeholder="地址标签：如&quot;家&quot;、&quot;公司&quot;。限5个字内" class="input" id="Tag" name="tag">
                                                    <p class="tip-msg tipMsg"></p>
                                                </div>
                                            </div>
                                            <div class="ft clearfix"  style="margin-bottom:12px">
                                                <button id="J_editAddrCancel" class="btn btn-lineDake btn-small" type="button">取消</button>
                                                <button class="btn btn-primary  btn-small" type="submit">保存</button>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                                <!-- 点击使用新地址显示表单end -->

                            </div>
                        </div>
                        <!-- 收货地址管理end -->

                        <!-- 我的收藏tart -->
                        <div class="grzxnr hide">
                            <div class="xm-line-box uc-box">
                                <div class="box-hd">
                                    <h3 class="title">我的收藏</h3>
                                </div>
                                <div class="box-hd">
                                    <div class="xm-goods-list-wrap">
                                        <ul class="xm-goods-list clearfix">
                                        <?php if(is_array($likeinfos)): foreach($likeinfos as $key=>$vo): ?><li class="scli">
                                                <div class="xm-goods-item">
                                                    <div class="item-thumb">
                                                        <a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['mgid']));?>"><img src="/xm/Public/Upload/Goods/<?php echo ($vo['zhupic']); ?>"></a>
                                                    </div>
                                                    <div class="item-info">

                                                    </div>
                                                    <h3 class="item-title"><a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['mgid']));?>"><?php echo ($vo['title']); ?> <?php echo ($vo['colortit']); ?></a></h3>
                                                    <div class="item-price"><?php echo ($vo['nowprice']); ?><del><?php echo ($vo['price']); ?></del> 元</div>
                                                    <div class="item-star">
                                                        <span class="icon-stat icon-stat-5"></span>
                                                        <span class="item-comments"><?php echo ($vo['comment']); ?>人评价</span>
                                                    </div>
                                                    <div class="item-actions">
                                                        <b class="kid" style="display:none"><?php echo ($vo['kid']); ?></b>
                                                        <a href="<?php echo U('Home/Detail/index',array('gid'=>$vo['mgid']));?>" class="btn  btn-small J_delFav" style="border:1px solid #333333"><i class="iconfont"></i>查看详情</a>                               
                                                        <a href="<?php echo U('Home/Like/delete',array('kid'=>$vo['kid']));?>" class="btn  btn-small btn-yellow J_delFav likedelete">删除</a>
                                                    </div>
                                                </div>
                                            </li><?php endforeach; endif; ?>                     
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 我的收藏end -->

                    </div>
                </div>
                <!-- 内容区 right 内容显示区end -->

           </div>
        </div>
    </div>
    <!-- 内容区end -->
<script type="text/javascript">
    //侧边分类栏控制
        $(function(){
            $('#J_categoryContainer').hover(function(){$('#nav-category-section').css('display','block');},
                function(){$('#nav-category-section').css('display','none');})
        })

    //点击更换页面标题
    //获取元素
    var title = $('title');
    var smallt = $('.smallt');
    var wdgrzx = $('li.wdgrzx');
    var dingdan = $('li.dingdan');
    var goodspj = $('li.goodspj');
    var shdzgl = $('li.shdzgl');
    var wdsc = $('li.wdsc');
    wdgrzx.click(function(){title.html("个人中心");smallt.html("个人中心");});
    dingdan.click(function(){title.html("我的订单");smallt.html("交易订单");});
    goodspj.click(function(){title.html("商品评价");smallt.html("商品评价");});
    shdzgl.click(function(){title.html("收货地址管理");smallt.html("收货地址");});
    wdsc.click(function(){title.html("我的收藏");smallt.html("我的收藏");});
                        
    //选项卡
    $(function(){
        var div_li = $("div.xuanxk ul li");
        div_li.click(function(){
            $(this).addClass("current selected")
            .siblings().removeClass("current selected");//去除其他同辈元素class属性
            var index = div_li.index(this);//获取当前点击的<li>元素在同级中的索引
            // .eq(index).show()//显示<li>元素对应的<div>元素
            // .siblings().hide();//隐藏其他同辈<li>元素
            $("div.neirun .grzx .grzxnr")
            .addClass("hide")
            .eq(index).removeClass("hide");
        }).hover(function(){
            $(this).addClass("hover");
        },function(){
            $(this).removeClass('hover');
        });
    });

    //页首点击“我的订单”选中我的订单选项
    var div_li = $("div.xuanxk ul li");
    var wddd = $('.dingdan');
    var ddli =$('.ddli');
    var dd = $('.dingdan').attr('dingdanli');
    if(dd == "dingdan"){
        title.html("我的订单");
        smallt.html("交易订单");
        var index = div_li.index(wddd);//获取当前点击的<li>元素在同级中的索引
        wddd.addClass("current selected").siblings().removeClass("current selected");//去除其他同辈元素class属性
        $("div.neirun .grzx .grzxnr").addClass("hide").eq(index).removeClass("hide");
    }

    //页首点击“商品评价”选中商品评价选项
        var div_li = $("div.xuanxk ul li");
        var sppj = $('.goodspj');
        var pjli =$('.pjli');
        var pj = $('.goodspj').attr('goodspjli');
        if(pj == "goodspj"){
            title.html("商品评价");
            smallt.html("商品评价");
            var index = div_li.index(sppj);//获取当前点击的<li>元素在同级中的索引
            sppj.addClass("current selected").siblings().removeClass("current selected");//去除其他同辈元素class属性
            $("div.neirun .grzx .grzxnr").addClass("hide").eq(index).removeClass("hide");
        }

    //页首点击“我的收藏”选中我的收藏选项
    var div_li = $("div.xuanxk ul li");
    var wdsc = $('.wdsc');
    var scli =$('.scli');
    var sc = $('.wdsc').attr('shoucangli');
    if(sc == "shoucang"){
        // alert('ok');
        title.html("我的收藏");
        smallt.html("我的收藏");
        var index = div_li.index(wdsc);//获取当前点击的<li>元素在同级中的索引
        wdsc.addClass("current selected").siblings().removeClass("current selected");//去除其他同辈元素class属性
        $("div.neirun .grzx .grzxnr").addClass("hide").eq(index).removeClass("hide");
    }
    

    //点击覆盖“使用新地址框”
    $('div.replaceOne').live('click',function(){
        //获取要覆盖的表单div
        var news = $('div.replaceTwo').css({left:"280px",top:"306px"});
        $('div.replaceTwo').css('display','block');
        $('div.zhong').css("margin-bottom","223px");
        //修改"保存"按钮id属性
        $('.btn-primary').attr('id','J_AddOk');
        //设置form表单初始值为空
        $('#Consignee').attr('value',"");//当前收货人姓名
        $('#Telephone').attr('value',"");//当前收货人电话
        $('#Provinces').attr('value',0);
        $('#Site').val("");//当前收货人详细地址
        $('#Zipcode').attr('value',"");//当前收货人邮政编码
        $('#Tag').attr('value',"");//标签
    })
    //点击“取消”恢复表单div隐藏
    $('#J_editAddrCancel').click(function(){
        $('div.replaceTwo').addClass('rt');
        $('.rt').css('display','none')
        $('.zhong').css("margin-bottom","-223px");
    })

    // <!-- 收货地址jquery -->
    var baocun = $('#J_AddOk');
    baocun.live('click',function(){
        // 获取值
         //获取登录用户uid
        var uids = <?php echo (session('uid')); ?>;
        var consignees = $('#Consignee').val(); //收货人姓名
        var telephones = $('#Telephone').val(); //联系电话
        var provinces = $('#Provinces').val(); //省份
        var sites = $('#Site').val(); //详细地址
        var zipcodes = $('#Zipcode').val(); //邮政编码
        var tags = $('#Tag').val(); //标签
        //使用Ajax发送请求插入数据请求
        $.ajax({
            url: "<?php echo U('Home/UserCenter/insert');?>",
            data: {uid:uids,consignee:consignees,telephone:telephones,province:provinces,site:sites,zipcode:zipcodes,tag:tags},
            type: "GET",
            dataType: 'json',
            success:function(data){
                if(data['da'] == "ok"){
                    //隐藏收货地址表单div
                    $('div.replaceTwo').css('display','none');
                    //创建新的收货地址框
                    var dl = $("<dl class='item bianli olds'><dt><strong class='itemConsignee'>"+data.consignee+"</strong><span class='itemTag tag'>"+data['tag']+"</span></dt><dd><p class='tel itemTel'>"+data.telephone+"</p><p class='itemRegion'  pro="+data.pro+">"+data.province+"</p><p class='itemStreet'><span class='site'>"+data.site+"</span>&nbsp;<span class='zipcode'>"+data.zipcode+"</span></p><a class='edit-btn J_editAddr' aid="+data.aid+">编辑</a><a class='edit-btn J_delAddr' aid="+data.aid+">删除</a></dd></dl>");
                    //新建插入添加div框后
                    var adds = $('div.replaceOne');
                    $(adds).after(dl);
                }
            }

        });
    });

    //编辑修改
    //获取元素
    
    var J_editAddr = $('a.J_editAddr');
    var oneself = ""; //定义要修改的收货地址
    //动态绑定单击"编辑"事件
    J_editAddr.live("click",function(){
        onself = $(this);
        // onself = "missyou";
        //获取当前dl 框相对于文档left top
        var redact = $(this).parents("dl.item").offset();
        var rL = redact.left - 20 + "px";
        var rT = redact.top + "px";
        var rep = $('div.replaceTwo');
        //设置编辑收货地址信息表单div属性样式
        rep.css({left:rL,top:rT});
        rep.css('display','block');
        $('div.zhong').css("margin-bottom","223px");

        //修改"保存"按钮id属性
        $('.btn-primary').attr('id','J_editOk');
        //获取该dl框原始数据
        var dls = $(this).parents('.bianli');
        var aids = $(this).attr("aid");
        var consignees = dls.find('strong.itemConsignee').html(); //收货人姓名
        var telephones = $(this).siblings().eq(0).html(); //联系电话
        var provinces = dls.find('p.itemRegion').attr('pro'); //省份
        var sites = dls.find('span.site').text(); //详细地址
        var zipcodes = dls.find('span.site').siblings().html(); //邮政编码
        var tags = dls.find('span.tag').html(); //标签
        //设置form表单值
        $('#aid').attr('value',aids);//当前数据aid号
        $('#Consignee').attr('value',consignees);//当前收货人姓名
        $('#Telephone').attr('value',telephones);//当前收货人电话
        $('#Provinces').attr('value',provinces);//省份
        $('#Site').val(sites);//当前收货人详细地址
        $('#Zipcode').attr('value',zipcodes);//当前收货人邮政编码
        $('#Tag').attr('value',tags);//标签

    });


    var baocun = $('#J_editOk');
    baocun.live('click',function(){
    //获取修改后的数据
        var aids = $('#aid').attr('value');
        var consignees = $('#Consignee').attr('value'); //收货人姓名
        var telephones = $('#Telephone').attr('value'); //联系电话
        var provinces = $('#Provinces').attr('value'); //省份
        var sites = $('#Site').val(); //详细地址
        var zipcodes = $('#Zipcode').attr('value'); //邮政编码
        var tags = $('#Tag').attr('value'); //标签
        $('.rt').css('display','none');//隐藏form表单div
        // 发送ajax请求修改数据
        $.ajax({
            url: "<?php echo U('Home/UserCenter/update');?>",
            data: {aid:aids,consignee:consignees,telephone:telephones,province:provinces,site:sites,zipcode:zipcodes,tag:tags},
            type: "GET",
            success:function(data){
                if(data.da=="ok"){
                    //修改要编辑收货地址的信息
                    var dls = onself.parents('.bianli');
                    dls.find('strong.itemConsignee').html(data.consignee); //收货人姓名
                    dls.find('p.itemTel').html(data.telephone); //联系电话
                    dls.find('p.itemRegion').attr('pro',data.pro); //省份value
                    dls.find('p.itemRegion').html(data.province); //省份
                    dls.find('span.site').html(data.site); //详细地址
                    dls.find('span.zipcode').html(data.zipcode); //邮政编码
                    dls.find('span.itemTag').html(data.tag); //标签

                }
            }
        });
    });

    //删除收货地址
    //获取元素
    var J_delAddr = $('a.J_delAddr');
    J_delAddr.live('click',function(){
        var oneself = $(this);
        var aids = $(this).attr("aid");
        //判断是否执行删除操作
        if(confirm("确定删除该地址吗？")){
            $.ajax({
                url: "<?php echo U('Home/UserCenter/delete');?>",
                data: {aid:aids},
                type: "GET",
                success:function(data){
                    if(data = "ok"){
                        var omit = oneself.parents("dl.item");
                        //删除当前收货信息dl框
                        omit.remove();
                    }
                }
            });
        }
    });

    //我的收藏
    $('.likedelete').click(function(){
        var kid = $(this).parent().find('.kid').text();
        if(confirm('确定要删除吗?')){
            $.get("<?php echo U('Home/Like/delete');?>",{kid:kid},function(){
                location.href="<?php echo U('Home/UserCenter/index');?>?shoucangli=shoucang";
            });
            return false;
        }else{   
            return false;
        }
    })
</script>
<!-- 个人中心主体内容end -->

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