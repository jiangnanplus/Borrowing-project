<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>我的购物车——小米手机官网</title>
	<link rel="stylesheet" href="/322_thinkphp_xiaomi/Public/Home/css/base.css" type="text/css">
	<link rel="stylesheet" href="/322_thinkphp_xiaomi/Public/Home/css/shopCart.css" type="text/css">

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
	<div class="container">
		<!--添加到购物车的商品开始-->
		<div id="shopCartBox" class="shop-cart-box hide" style="display: block;">
			<div id="J_cartHeader" class="shop-cart-box-hd">
				<h2 class="title">我的购物车</h2>
				<p id="J_cartPostFreeTip" class="tip">全场满¥150免运费，除电视、净化器、体重秤</p>
			</div>
			<div id="J_cartBody" class="shop-cart-box-bd">
				<?php if($status == 0 ): ?><div id="J_cartEmpty" class="shop-cart-empty">
					<h2>你的购物车还是空的赶紧行动吧！</h2>
					<a class="btn btn-primary J_goShoping" href="<?php echo U('Home/List/index');?>">马上去购物</a>
				</div>
				<?php else: ?>
				<dl id="J_cartGoodsList" class="shop-cart-goods">
					<dt class="clearfix">
						<span class="col col-1">商品</span>
						<span class="col col-2">单价</span>
						<span class="col col-3">数量</span>
						<span class="col col-4">小计</span>
						<span class="col col-5">操作</span>
					</dt>
					<?php if(is_array($_SESSION['shopcart'])): foreach($_SESSION['shopcart'] as $key=>$vo): ?><dd class="item clearfix J_proItem" data-num="1" data-itemid="2145200027_0_buy" data-gettype="buy" data-commodityid="1145200027" data-cos="0">
						<div class="item-row" gid = "<?php echo ($vo['gid']); ?>">
							<div class="col col-1">
								<div class="g-pic">
									<a target="_blank" href="">
										<img width="120" height="120" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>" alt="">
									</a>
								</div>
								<div class="g-info">
									<div class="g-name">
										<a target="_blank" href=""> <?php echo ($vo['title']); ?> </a>
									</div>
									<p class="g-type">
									<span></span>
									</p>
									<p class="g-other-info"></p>
									<p> </p>
								</div>
							</div>
							<div class="col col-2"> <?php echo ($vo['price']); ?> </div>
							<div class="col col-3">
								<div class="change-goods-num clearfix J_changeGoodsNum">
									<a class="J_minus" href="javascript:void(0);">
										<i class="iconfont"></i>
									</a>
									<input class="goods-num J_goodsNum" autocomplete="off" tyep="text" value="<?php echo ($vo['number']); ?>">
									<a class="J_plus" href="javascript:void(0);">
									<i class="iconfont"></i>
									</a>
								</div>
							</div>
							<div class="col col-4">
								<em id="xiaoji"><?php echo ($vo['xiaoji']); ?></em>
								<p> </p>
							</div>
							<div class="col col-5">
								<a id="2145200027_0_buy" class="del J_delGoods" title="删除" href="<?php echo U('Home/Cart/clearCart');?>?gid=<?php echo ($vo['gid']); ?>">
									<i class="iconfont"></i>
								</a>
							</div>
						</div>
					</dd><?php endforeach; endif; ?>
				</dl><?php endif; ?>
			</div>
			<script type="text/javascript">

				//实现数量的减
				$('.J_minus').live('click',function(){
					//获取商品总价
					var sum=$('#J_cartProductMoney').text();
					var youhui=$('#J_cartActivityMoney').text();
					//获取商品id
					var gid=$(this).parents('.item-row').attr("gid");
					var t = $(this);
					$.get("<?php echo U('Home/Cart/updateCart');?>",{gid:gid,number:-1},function(data){
						var number=t.next().val();
						t.next().val(data['number']);
						t.parents('.col-3').next().find('#xiaoji').text(data['xiaoji']);
						if(number>1){
							sum-=data['price'];
							youhui-=data['price']-data['nowprice'];
						}
						var zongji=sum-youhui;
						$('#J_cartProductMoney').text(sum);
						$('#J_cartActivityMoney').text(youhui);
						$('#J_cartTotalPrice').text(zongji);
					},'json')
					return false;
				})
				//实现数量的加
				$('.J_plus').live('click',function(){
					//获取商品总价
					var sum=parseInt($('#J_cartProductMoney').text());
					var youhui=parseInt($('#J_cartActivityMoney').text());
					//获取商品id
					var gid=$(this).parents('.item-row').attr("gid");
					var t = $(this);
					$.get("<?php echo U('Home/Cart/updateCart');?>",{gid:gid,number:1},function(data){
						t.prev().val(data['number']);
						t.parents('.col-3').next().find('#xiaoji').text(data['xiaoji']);
						sum += parseInt(data['price']);
						youhui += parseInt(data['price']-data['nowprice']);
						var zongji=sum-youhui;
						$('#J_cartProductMoney').text(sum);
						$('#J_cartActivityMoney').text(youhui);
						$('#J_cartTotalPrice').text(zongji);
					},'json')
					return false;
				})
			</script>
			<?php if($status == 1 ): ?><div id="J_cartFooter" class="shop-cart-box-ft clearfix">
				<div class="xm-add-buy">
				</div>
				<div class="shop-cart-total">
					<ul>
						<li>
						商品总价：
							<span>
								<em id="J_cartProductMoney"><?php echo ($sum); ?></em>
							元
							</span>
						</li>
						<li>
						活动优惠：
							<span>
							-
								<em id="J_cartActivityMoney"><?php echo ($youhui); ?></em>
							元
							</span>
						</li>
					</ul>
					<p class="total-price">
						商品总计：
						<span>
							<strong id="J_cartTotalPrice"><?php echo ($zongji); ?></strong>
							元
						</span>
					</p>
				</div>
				<div class="shop-cart-action clearfix">
				<a id="J_goCheckout" class="btn btn-primary btn-next" href="">去结账</a>
				<a class="btn btn-lineDakeLight btn-back J_goShoping" href="javascript:history.back();">继续购物</a>
				</div>
				<script type="text/javascript">
					$('#J_goCheckout').click(function(){
						var Product=parseInt($('#J_cartProductMoney').text());
						var Activity=parseInt($('#J_cartActivityMoney').text());
						var Total=parseInt($('#J_cartTotalPrice').text());
						if(<?php echo ($user); ?>==1){
							window.location.href="<?php echo U('Home/Ordering/index');?>?Product="+Product+"&Activity="+Activity+"&Total="+Total;
							return false;
						}else{
							window.location.href="<?php echo U('Home/Login/index');?>?order=1&Product="+Product+"&Activity="+Activity+"&Total="+Total;
							return false;
						}
						return false;
					}) 
				</script>
			</div><?php endif; ?>
		</div>
		<!--添加到购物车的商品结束-->

		<!--热门商品开始-->
		<!-- <div id="RECOMMEND-MODAL" class="xm-line-box hot-pro J_hotProCarousel" data-stat-recommend="CartBuy">
			<div class="box-hd">
				<h2 class="title">热门商品</h2>
			</div>
			<div class="box-bd">
				<div class="xm-goods-list-wrap xm-goods-list-wrap-col20 J_carouselWrap" style="height: 450px;">
					<ul class="xm-goods-list clearfix J_carouselList" style="width: 2480px; margin-left: 0px;">
						<li class="">
							<div class="xm-goods-item">
								<div class="item-thumb">
									<a href="" target="_blank">
										<img alt="色彩主题3D保护壳 唯美" src="/322_thinkphp_xiaomi/Public/Home/image/T143KgBXDT1RXrhCrK!220x220.jpg">
									</a>
								</div>
								<div class="item-info">
								<h3 class="item-title">
									<a href="">色彩主题3D保护壳 唯美</a>
								</h3>
								<div class="item-price">39元 </div>
								<div class="item-star"> </div>
								<div class="item-actions">
									<a class="btn btn-small btn-primary J_addCart" href="">
									<i class="iconfont"></i>
									购物车
									</a>
								</div>
								<div class="item-flag"></div>
								</div>
							</div>
						</li>
						<li class="">
							<div class="xm-goods-item">
								<div class="item-thumb">
									<a href="" target="_blank">
										<img alt="色彩主题3D保护壳 唯美" src="/322_thinkphp_xiaomi/Public/Home/image/T143KgBXDT1RXrhCrK!220x220.jpg">
									</a>
								</div>
								<div class="item-info">
								<h3 class="item-title">
									<a href="">色彩主题3D保护壳 唯美</a>
								</h3>
								<div class="item-price">39元 </div>
								<div class="item-star"> </div>
								<div class="item-actions">
									<a class="btn btn-small btn-primary J_addCart" href="">
									<i class="iconfont"></i>
									购物车
									</a>
								</div>
								<div class="item-flag"></div>
								</div>
							</div>
						</li>
						<li class="">
							<div class="xm-goods-item">
								<div class="item-thumb">
									<a href="" target="_blank">
										<img alt="色彩主题3D保护壳 唯美" src="/322_thinkphp_xiaomi/Public/Home/image/T143KgBXDT1RXrhCrK!220x220.jpg">
									</a>
								</div>
								<div class="item-info">
								<h3 class="item-title">
									<a href="">色彩主题3D保护壳 唯美</a>
								</h3>
								<div class="item-price">39元 </div>
								<div class="item-star"> </div>
								<div class="item-actions">
									<a class="btn btn-small btn-primary J_addCart" href="">
									<i class="iconfont"></i>
									购物车
									</a>
								</div>
								<div class="item-flag"></div>
								</div>
							</div>
						</li>
						<li class="">
							<div class="xm-goods-item">
								<div class="item-thumb">
									<a href="" target="_blank">
										<img alt="色彩主题3D保护壳 唯美" src="/322_thinkphp_xiaomi/Public/Home/image/T143KgBXDT1RXrhCrK!220x220.jpg">
									</a>
								</div>
								<div class="item-info">
								<h3 class="item-title">
									<a href="">色彩主题3D保护壳 唯美</a>
								</h3>
								<div class="item-price">39元 </div>
								<div class="item-star"> </div>
								<div class="item-actions">
									<a class="btn btn-small btn-primary J_addCart" href="">
									<i class="iconfont"></i>
									购物车
									</a>
								</div>
								<div class="item-flag"></div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div> -->
		<!--热门商品结束-->
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