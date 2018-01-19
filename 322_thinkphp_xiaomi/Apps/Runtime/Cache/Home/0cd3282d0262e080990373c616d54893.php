<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title>个人中心</title>
    <link rel="stylesheet" href="/xm/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" href="/xm/Public/Home/css/index.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/xm/Public/Home/css/user-center.css">
    <link rel="stylesheet" type="text/css" href="/xm/Public/Home/css/comment-add.css">
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
        .rt{display:none;}
        .uc-address-edit-section{
            left: 343px;
            position: absolute;
            top: 306px;
            width: 300px;
            z-index: 10;
        }
        /*评星*/

        .container .row .span14 .comment-main .goods-star .stars .icon-star-large {
            text-indent: 0;
        }
        .icon-star-large-full {
            background-position: 0 0;
        }
        .icon-star-large-blank {
            background-position: -89px 0;
        }
        .icon-star-large {
            background-image: url("/xm/Public/Home/image/xiaoxingxing.png");
            background-repeat: no-repeat;
            cursor: pointer;
            display: inline-block;
            height: 36px;
            overflow: hidden;
            text-indent: -9999em;
            width: 37px;
        }
        /*短签边框*/
        .active {
            border: 1px solid #c3c3c3;
            height: 38px;
        }
        /*对勾*/
        .container .row .span14 .comment-main .goods-tags .tags .active .checkbox .iconfont.iconfont {
            display: block;
        }
        .comment-content {
            border: 1px solid #dfdfdf;
            padding-left: 30px;
            padding-right: 30px;
            width: 1176px;
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
	

<!-- 商品评价主体内容start -->


    <!-- 商品评价小导航条start -->
    <div class="container breadcrumbs">
        <a href="" data-stat-id="83bfd8323dd7dea7">首页</a>
        <span class="sep">/</span><span>商品评价</span>
    </div>
    <!-- 商品评价小导航条end -->

    <!-- 商品评价内容start -->
    <div class="container">
        <div class="row">
            <div class="span6">
                <div class="goods">
                    <img alt="" src="/xm/Public/Upload/Goods/<?php echo ($imgs); ?>"><br>
                    <h2 class="title"><?php echo ($titles); ?></h2>
                    <div class="comment" comments="<?php echo ($counts); ?>">已有<?php echo ($counts); ?>评价</div>            
                </div>
            </div>
            <div class="span14">
                <div class="comment-main">
                    <div class="goods-title">为“<?php echo ($titles); ?>”评个星吧</div>
                    <div class="goods-star clearfix">
                        <b class="name">评星：</b>
                        <div class="stars J_comment_star">
                            <span value="1" class="xings icon-star-large J_star icon-star-large-blank"></span>
                            <span value="2" class="xings icon-star-large J_star icon-star-large-blank"></span>
                            <span value="3" class="xings icon-star-large J_star icon-star-large-blank"></span>
                            <span value="4" class="xings icon-star-large J_star icon-star-large-blank"></span>
                            <span value="5" class="xings icon-star-large J_star icon-star-large-blank"></span>  
                        </div>
                        <div>
                            <span style="display: none;" class="star_info hide J_mi_starInfo ">质量不太好</span>
                            <span style="display: none;" class="star_info hide J_mi_starInfo ">商品一般般</span>
                            <span style="display: none;" class="star_info hide J_mi_starInfo  ">其实还不错</span>
                            <span style="display: none;" class="star_info hide J_mi_starInfo ">很喜欢，质量很好</span>
                            <span style="display: none;" class="star_info hide J_mi_starInfo ">发烧品质，非常喜欢</span>
                        </div>
                    </div>
                    <div class="goods-error hide J_star_error">
                        &nbsp;<span class="">
                            您还没有对商品评星哦～
                        </span>
                    </div>
                    <div class="goods-tags clearfix">
                        <b class="name">短签：</b>
                        <ul class="tags clearfix J_comment_tags">
                            <li label-id="20" class="tags_li" tag="性价比高">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>性价比高</b>
                            </li>
                            <li label-id="21" class="tags_li" tag="做工精良">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>做工精良</b>
                            </li>
                            <li label-id="22" class="tags_li" tag="方便操作">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>方便操作</b>
                            </li>
                            <li label-id="23" class="tags_li" tag="质量上等">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>质量上等</b>
                            </li>
                            <li label-id="24" class="tags_li"  tag="实惠实用">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>实惠实用</b>
                            </li>
                            <li label-id="25" class="tags_li" tag="物超所值">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>物超所值</b>
                            </li>
                            <li label-id="26" class="tags_li" tag="高大上">
                                <span class="checkbox">
                                    <i class="iconfont"></i>
                                </span>
                                <b>高大上</b>
                            </li>
                        </ul>
                    </div>
                    <div class="goods-comment clearfix">
                        <b class="name">评价：</b>
                        <textarea class="comment-textarea J_comment_textarea" style=" color: #6d6d6d;"></textarea>
                    </div>
                    <div class="goods-error hide J_comment_error">
                        &nbsp;<span class="">
                            亲，评价内容请大于10个字~
                        </span>
                    </div>
                    <div class="goods-imgs clearfix">
                        <div class="goods-imgs clearfix">
                            <div id="J_pic_body" class="img-list clearfix ">
                                <div class="J_pic_after after clearfix">
                                    <div class="li"></div>
                                    <div class="li"></div>
                                    <div class="li"></div>
                                    <div class="li"></div>
                                    <div class="li"></div>
                                </div>
                            </div>
                            <div class="sub-btn J_submit" style="margin-left:176px">
                                提交
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 商品评价内容end -->
    
<!-- 商品评价主体内容end -->

<script type="text/javascript">
    //定义变量
    var values = "";//评星等级
    //小星星选项卡
    $(function(){
        var xing = $(".J_comment_star span");
        // console.log(xing);
        xing.click(function(){
            //获取当前元素的属性value值(星数)
            values = $(this).attr("value");
            //获取当前元素在同辈元素中的索引值
            var indexs = $(this).index();
            // 循环设置当前元素之前同辈元素样式
            var xh = $('span.xings');
            // // 初始化样式
            // xh.addClass("icon-star-large-blank");
            // xh.removeClass("icon-star-large-full");
            for(var i=0;i<(indexs+1);i++){
                if(i<values){
                    //添加class,设置星星变亮
                    xh.eq(i).addClass("icon-star-large-full");
                    xh.eq(i).removeClass("icon-star-large-blank");
                }
            }
            //循环修改当前元素之后同辈元素的样式
            for(var i=0;i<5;i++){
                if(i>indexs){
                    //添加class,设置星星变亮
                    xh.eq(i).addClass("icon-star-large-blank");
                    xh.eq(i).removeClass("icon-star-large-full");
                }
            }
            //设置短评样式
            $('span.J_mi_starInfo').eq(indexs).show().siblings().hide();
        });
    });

    //短签选择
    //获取标签元素
    var tagsli = $('ul.tags li');
    //定义接受遍历值的数组
    var ar = [];
    // var arr = [];
    tagsli.each(function(i){
        var oneself = $(this);
        $(this).toggle(function(){
            //选中短签
            oneself.addClass('active');
            ar[i] = oneself.attr('tag');
        },function(){
            //取消选中短签
            oneself.removeClass('active');
            ar[i] = undefined;
        });
    })
    // for(var i in ar){
    //     if(typeof(ar[i]) != 'undefined'){
    //         arr.push(ar[i]);
    //     }else{
    //         continue;
    //     }
    // }
        // <div class="comment" comments="<?php echo ($counts); ?>">已有<?php echo ($counts); ?>评价</div>  


    //提交评论
    var submit = $('div.J_submit');
    submit.click(function(){
        //接收商品gid号
        var gid = <?php echo ($gid); ?>;
        //获取商品评价总数
        var comment = $('div.comment').attr('comments');
        //获取评论内容
        var textareas = $('textarea').val();
        //发送ajax请求
        // $.post("<?php echo U('Home/Appraise/insert');?>",{gid:gid,com_star:values,label:ar,content:textareas,comment:comment},function(data){
        //     if(data == "ok"){
        //         location.href = "<?php echo U('Home/Myappraise/index');?>?gid="+gid;
        //     }else{
        //         // location.href = "<?php echo U('Home/UserCenter/index');?>";
        //         location.href = "";
        //     }
        // });
        $.ajax({
            url:"<?php echo U('Home/Appraise/insert');?>",
            data:{gid:gid,com_star:values,label:ar,content:textareas,comment:comment},
            type:"POST",
            success:function(data){
                if(data == "ok"){
                    location.href = "<?php echo U('Home/Myappraise/index');?>?gid="+gid;
                }else{
                    // location.href = "<?php echo U('Home/UserCenter/index');?>";
                    location.href = "";
                }
            },
            async:true
        });
    });






</script>


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