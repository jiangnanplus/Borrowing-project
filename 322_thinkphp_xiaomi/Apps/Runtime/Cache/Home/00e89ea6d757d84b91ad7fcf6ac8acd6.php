<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title><?php if($title_current_one == 1): ?>搜索“<?php echo ($title); ?>”的结果——小米手机官网<?php else: echo ($twoNameChecked); ?>——小米手机官网<?php endif; ?></title>
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/base.css">
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/base.min.css">
    <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/goods-category.css">
    <script type="text/javascript" src="/322_thinkphp_xiaomi/Public/Home/js/jquery-1.8.3.min.js"></script>
    <style type="text/css">
        #nav-category-section{display: none;}
        .icon-stat{display:inline-block;*display:inline;*zoom:1;width:65px;height:14px;overflow:hidden;background-image:url("/322_thinkphp_xiaomi/Public/Home/image/icon-stat.png");background-repeat:no-repeat}
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
	
    <!-- 分类导航开始 -->
    <div class="container breadcrumbs">
        <?php if($length == 1): ?><script type="text/javascript">
            $('.breadcrumbs').append($('<a href="<?php echo U('Home/Index/index');?>">首页</a>'));
            $('.breadcrumbs').append($("<span class='sep'>/</span><span><?php echo ($pathValue[1]); ?></span>"));
            </script>
        <?php elseif(($length > 1) and ($title_current_one != 1)): ?> 
                <script type="text/javascript">
                $('.breadcrumbs').append($('<a href="<?php echo U('Home/Index/index');?>">首页</a>'));

                <?php $__FOR_START_11284__=1;$__FOR_END_11284__=$length-1;for($i=$__FOR_START_11284__;$i < $__FOR_END_11284__;$i+=1){ ?>$('.breadcrumbs').append($("<span class='sep'>/</span><a href='<?php echo U("Home/List/index",array("cid"=>$path[$i]));?>'><?php echo ($pathValue[$i]); ?></a>"));<?php } ?>  
                //最后一个无连接 所有不放入循环
                    $('.breadcrumbs').append($("<span class='sep'>/</span><span><?php echo ($pathValue[$length-1]); ?></span>"));
                </script> 
            <?php elseif(($length > 1) and ($title_current_one == 1)): ?>
                <script type="text/javascript">
                $('.breadcrumbs').append($('<a href="<?php echo U('Home/Index/index');?>">首页</a>'));
                $('.breadcrumbs').append($("<span class='sep'>/</span><a href=''><?php echo ($pathValue[1]); ?></a>"));
                $('.breadcrumbs').append($("<span class='sep'>/</span><span><?php echo ($pathValue[2]); ?></span>"));
                </script><?php endif; ?>
    </div>
    <!-- 分类导航结束 -->
    <!-- 分类 与 价格检索区 瀑布流 -->
    <div class="container">
        <!-- 分类检索区开始 -->
        <div class="xm-line-box filter-box">
            <div class="box-hd">
                <h3 class="title"><?php if($title_current_one == 1): ?>搜索“<?php echo ($title); ?>”的结果<?php else: echo ($pathValue[1]); endif; ?></h3>
            </div>
            <div class="box-bd">
                <div class="filter-lists">
                    <dl class="xm-filter-list xm-filter-list-first category-filter-list clearfix">
                        <dt>分类：</dt>
                        <dd>
                            <ul class="clearfix" id="typeCat">
                                <li class="first "><a href="<?php echo U('Home/List/index',array('g_all'=>'all','gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title']));?>">全部</a></li>
                                <?php if($two != '' ): if(is_array($two)): foreach($two as $key=>$vo): ?><li><a href="<?php echo U('Home/List/index',array('cid'=>$key));?>"><?php echo ($vo); ?></a></li><?php endforeach; endif; endif; ?>
                                <script type="text/javascript">
                                        $('#typeCat li:contains("<?php echo ($twoNameChecked); ?>")').addClass('current');      
                                </script>
                            </ul>
                            
                        </dd>
                    </dl>
                    <!-- 只有插线板、移动电源与电池类才显示此dl -->
                    <!-- <dl class="xm-filter-list  category-filter-list clearfix">
                        <dt>机型：</dt>
                        <dd>
                            <ul class="clearfix" id="typeAdapt">
                                <li class="first current"><a href="" onclick="">全部</a></li>
                                <li><a rel="nofollow" href="" onclick="">小米手机2/2S</a></li>
                                <li><a rel="nofollow" href="" onclick="">红米手机</a></li>
                                <li><a rel="nofollow" href="" onclick="">红米手机2</a></li>
                                <li><a rel="nofollow" href="" onclick="">红米2A</a></li>
                            </ul>
                        </dd>
                    </dl> -->
                </div>
            </div>
        </div>
        <!-- 分类检索区结束 -->   
        <div class="xm-line-box goods-list-box">
            <!-- 排序检索区开始 -->
            <div class="box-hd">
                <div class="filter-lists">
                    <dl class="xm-filter-list xm-filter-list-first category-filter-list clearfix">
                        <dd>
                            <ul class="clearfix" id="typeOrder">
                                <li class="<?php echo ($recomend); ?> first"><a rel="nofollow" href="<?php echo U('Home/List/index',array('recomend'=>1,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all']));?>">推荐</a></li>
                                <li class="<?php echo ($new); ?>"><a rel="nofollow" href="<?php echo U('Home/List/index',array('new'=>'gid','gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all']));?>">最新</a></li>
                                <li class="<?php echo ($up); ?>"><a rel="nofollow" href="<?php echo U('Home/List/index',array('up'=>'nowprice','gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all']));?>">价格从高到低</a></li>
                                <li class="<?php echo ($down); ?>"><a rel="nofollow" href="<?php echo U('Home/List/index',array('down'=>'nowprice','gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all']));?>">价格从低到高</a></li>
                            </ul>
                        </dd>
                    </dl>
                </div>
                <div class="more">
                    <div class="filter-stock">
                        <a><i class="icon-check iconfont <?php echo ($discount_checked); ?>"></i>仅显示特惠商品</a>&nbsp;&nbsp;
                        <a><i class="icon-check iconfont <?php echo ($num_checked); ?>"></i>仅显示有货商品</a>
                    </div>
                    <script type="text/javascript"> 
                        var discount = $('.filter-stock').children('a').eq(0).children().attr('class');
                        var num = $('.filter-stock').children('a').eq(1).children().attr('class');
                        $('.filter-stock').children('a').eq(0).mouseover().css('cursor','pointer').click(function(){
                            if(discount =='icon-check iconfont '){
                                $(this).children().addClass('icon-checked');
                                if(num=='icon-check iconfont ')
                                location.href="<?php echo U('Home/List/index',array('discount_checked'=>1,'num_checked'=>0,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>"; 
                                else
                                location.href="<?php echo U('Home/List/index',array('discount_checked'=>1,'num_checked'=>1,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>";
                            }else{
                                $(this).children().removeClass('icon-checked'); 
                                if(num=='icon-check iconfont ')
                                location.href="<?php echo U('Home/List/index',array('discount_checked'=>0,'num_checked'=>0,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>"; 
                                else
                                location.href="<?php echo U('Home/List/index',array('discount_checked'=>0,'num_checked'=>1,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>";
                            }
                        });

                        $('.filter-stock').children('a').eq(1).mouseover().css('cursor','pointer').click(function(){   
                            if(num =='icon-check iconfont '){
                                $(this).children().addClass('icon-checked');
                                if(discount =='icon-check iconfont ')
                                location.href="<?php echo U('Home/List/index',array('num_checked'=>1,'discount_checked'=>0,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>"; 
                                else
                                location.href="<?php echo U('Home/List/index',array('num_checked'=>1,'discount_checked'=>1,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>";
                            }else{
                                $(this).children().removeClass('icon-checked');
                                if(discount =='icon-check iconfont ')
                                location.href="<?php echo U('Home/List/index',array('num_checked'=>0,'discount_checked'=>0,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>"; 
                                else
                                location.href="<?php echo U('Home/List/index',array('num_checked'=>0,'discount_checked'=>1,'gid'=>$where['gid'],'cid'=>$where['cid'],'title'=>$where['title'],'g_all'=>$where['g_all'],'new'=>$where['new'],'up'=>$where['up'],'down'=>$where['down']));?>";
                            }
                        });
                    </script>
                </div>
            </div>
            <!-- 排序检索区结束 -->
            <!-- List瀑布流开始 -->
            <div class="box-bd">
                <!-- 没有符合条件的商品 -->                
                <?php if($infos == null): ?>对不起，对应商品分类或筛选组合下没有商品
                <?php else: ?>
                <!-- 存在符合条件的商品 -->    
                    <div class="goods-list-section">
                        <!-- 商品信息start -->
                        <div class="xm-goods-list-wrap xm-goods-list-wrap-col20">
                            <ul class="xm-goods-list clearfix">
                                <?php if(is_array($infos)): foreach($infos as $key=>$vo): ?><li> 
                                        <div class="xm-goods-item">
                                            <b class="ggid" style="display:none"><?php echo ($vo['gid']); ?></b>
                                            <div class="item-thumb"> 
                                                <a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['gid']));?>">
                                                    <img imgSrc="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img'][0][0]); ?>" alt="<?php echo ($vo['title']); ?>">
                                                </a>
                                            </div> 
                                            <div class="item-info"> 
                                                <h3 class="item-title"><a target="_blank" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['gid']));?>"><?php echo ($vo['title']); ?> <?php echo ($vo['colortit'][0]); ?></a></h3> 
                                                <div class="item-price"><?php echo ($vo['nowprice']); ?>元   
                                                    <span class="sep">|</span><del><?php echo ($vo['price']); ?>元</del>  
                                                </div> 
                                                <div class="item-star"> 
                                                    <span class="icon-stat icon-stat-5"></span>  
                                                    <span class="item-comments"><?php echo ($vo['comment']); ?>人评价</span>  
                                                </div> 
                                                <div class="item-actions">
                                                    <!-- 模拟隐藏域传值 -->
                                                    <b class="gid" style="display:none"><?php echo ($vo['gid']); ?></b>
                                                    <b class="title" style="display:none"><?php echo ($vo['title']); ?></b>
                                                    <b class="colortit" style="display:none"><?php echo ($vo['colortit'][0]); ?></b>
                                                    <b class="zhupic" style="display:none"><?php echo ($vo['s_img'][0][0]); ?></b>
                                                    <b class="price" style="display:none"><?php echo ($vo['price']); ?></b>
                                                    <b class="nowprice" style="display:none"><?php echo ($vo['nowprice']); ?></b>
                                                    <b class="comment" style="display:none"><?php echo ($vo['comment']); ?></b>  
                                                    <a class="btn btn-small btn-primary" href="<?php echo U('Home/Detail/index',array('gid'=>$vo['gid']));?>"><i class="iconfont"></i>查看详情</a>
                                                    <a class="btn btn-dake btn-small J_addFav like" href="<?php echo U('Home/Like/index',array('gid'=>$vo['gid']));?>" target="_blank"><i class="iconfont"></i>收藏</a> 
                                                </div>
                                                <div class="item-flag"> 
                                                    <?php if($vo['discount'] < 9): ?><span class="icon-saleoff icon-saleoff-8"><?php echo ($vo['discount']); ?>折</span><?php endif; ?>
                                                </div> 
                                                <span class="hide">&nbsp;</span> <!-- Fix IE6 bug --> 
                                            </div> 
                                        </div> 
                                    </li><?php endforeach; endif; ?>
                                <script type="text/javascript">

                                </script>
                            </ul>
                        </div>
                        <!-- 商品信息end -->
                        <!-- 分页开始 -->
                        <div class="xm-pagenavi">
                            <div id="pages" style="margin-top:60px"><?php echo ($page); ?>  </div>
                        </div>
                        <!-- 分页结束 -->
                    </div><?php endif; ?>
            </div>
            <!-- List瀑布流结束 -->
        </div>     
    </div>
    <script type="text/javascript">
    //分类导航显示控制
        $(function(){
            $('#J_categoryContainer').hover(function(){$('#nav-category-section').css('display','block');},
                function(){$('#nav-category-section').css('display','none');})
        })
    //瀑布流控制代码
        // $(window).live('scroll',function(){
        //     load();
        // })

        $(window).scroll(function(){
            load();
        })

        function load(){
            $('.goods-list-section ul li img[isLoaded!=1]').each(function(){
                // alert('aaaa');
                var t = $(this).offset().top;
                var wH = $(window).height();
                var sH = $(window).scrollTop();
                if(t <= wH+sH-150){
                    var s = $(this).attr('imgSrc');
                    $(this).attr('src',s);
                    $(this).attr('isLoaded',1);
                    $(this).slideDown(1000);
                }
            });
        }
        load();

        $('#pages a,#pages span').addClass('numbers');
        $('#pages a:first').addClass('first iconfont');
        $('#pages a:last').addClass('last iconfont');
    //缩放ajax函数
        function suofang(w,h,src,element){
            $(function(){
                $.get("<?php echo U('Home/List/suofang');?>",{wsize:w,hsize:h,src:src},function(data){
                    if(data[0]==220&&data[1]==220){
                        return;
                    }else{
                        $(element).css({position:'absolute',left:'50%',top:'40%',marginLeft:'-'+data[0]/2+'px',marginTop:'-'+data[1]/2+'px',width:data[0],height:data[1]});
                    }
                    
                })
            })
        }

    //最近浏览
        $('.item-title').click(function(){
            var gid = $(this).parent().parent().find('.gid').text();
            $.get("<?php echo U('Home/Lastbrowse/add');?>",{gid:gid})
        })

        $('.item-thumb img').click(function(){
            var gid = $(this).parent().parent().parent().find('.gid').text()
            $.get("<?php echo U('Home/Lastbrowse/add');?>",{gid:gid})
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
                            t.removeClass('btn-dake').addClass('btn-yellow is-fav');
                            setTimeout(function(){
                                t.removeClass('btn-yellow is-fav').addClass('btn-dake');
                            },3000)
                        })
                    }
                })
                return false;
            }
        })
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