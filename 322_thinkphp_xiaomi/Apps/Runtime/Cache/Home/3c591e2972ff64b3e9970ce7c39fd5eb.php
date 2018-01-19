<?php if (!defined('THINK_PATH')) exit();?><!doctype html>  
<html lang="en">
<head>
	<meta charset="UTF-8">
	
    <title>我的下单页——小米手机官网</title>
    <link rel="stylesheet" href="/xm/Public/Home/css/base.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/xm/Public/Home/css/checkOut.css">
    <style>
        .site-header .site-logo .event-yeelight-2015{position:absolute;left:75px;top:-25px;z-index:2;width:165px;margin:0;height:108px;}
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
            <div class="checkout-box">
                <form id="checkoutForm" action="<?php echo U('Home/Ordering/insert');?>" method="post">
                    <div class="checkout-box-bd">
                        <!-- 地址状态 0：默认选择；1：新增地址；2：修改地址 -->
                        <!-- 收货地址 -->
                        <div class="xm-box">
                            <div class="box-hd ">
                                <h2 class="title">收货地址</h2>
                            </div>
                            <div class="box-bd">
                                <div class="clearfix xm-address-list" id="checkoutAddrList">
                                    <?php if(is_array($addinfo)): foreach($addinfo as $key=>$vo): ?><dl class="item" aid="<?php echo ($vo['aid']); ?>" <?php if(($vo['status']) == "1"): ?>style="border:1px solid #ff4a00;background:white"<?php endif; ?>>
                                        <dt>
                                            <strong class="itemConsignee"><?php echo ($vo['consignee']); ?></strong>
                                            <span class="itemTag tag" <?php if(($vo['tag']) == ""): ?>style="display:none"<?php endif; ?>><?php echo ($vo['tag']); ?></span>
                                        </dt>
                                        <dd>
                                            <p class="tel itemTel"><?php echo ($vo['telephone']); ?></p>
                                            <p class="itemRegion"><?php echo ($arr[$vo['province']]); ?></p>
                                            <p class="itemStreet"><?php echo ($vo['site']); ?>(<?php echo ($vo['zipcode']); ?>)</p>
                                            <span class="edit-btn J_editAddr" <?php if(($vo['status']) == "1"): ?>style="display:block"<?php endif; ?>>编辑</span>
                                        </dd>
                                        <dd style="display:none">
                                            <input name="aid" class="addressId" value="<?php echo ($vo['aid']); ?>" type="radio" <?php if(($vo['status']) == "1"): ?>checked="checked"<?php endif; ?>>
                                        </dd>
                                    </dl><?php endforeach; endif; ?>
                                    <div class="item use-new-addr" id="J_useNewAddr" data-state="off">
                                         <span class="iconfont icon-add"></span> 
                                        使用新地址
                                    </div>
                                </div>
                                <div class="xm-edit-addr-box" id="J_editAddrBox">
                                <div class="bd">
                                    <div class="item">
                                        <label>收货人姓名<span>*</span></label> 
                                        <input id="Consignee" class="input" placeholder="收货人姓名" maxlength="15" autocomplete="off" type="text">
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>联系电话<span>*</span></label> 
                                        <input class="input" id="Telephone" placeholder="11位手机号" autocomplete="off" type="text">
                                        <p class="tel-modify-tip" id="telModifyTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址<span>*</span></label>
                                        <select id="Provinces" class="select-1">
                                            <option selected="selected" value="0">省份/自治区</option><option zipcode="0" value="2">北京</option><option zipcode="0" value="3">天津</option><option zipcode="0" value="4">河北</option><option zipcode="0" value="5">山西</option><option zipcode="0" value="6">内蒙古</option><option zipcode="0" value="7">辽宁</option><option zipcode="0" value="8">吉林</option><option zipcode="0" value="9">黑龙江</option><option zipcode="0" value="10">上海</option><option zipcode="0" value="11">江苏</option><option zipcode="0" value="12">浙江</option><option zipcode="0" value="13">安徽</option><option zipcode="0" value="14">福建</option><option zipcode="0" value="15">江西</option><option zipcode="0" value="16">山东</option><option zipcode="0" value="17">河南</option><option zipcode="0" value="18">湖北</option><option zipcode="0" value="19">湖南</option><option zipcode="0" value="20">广东</option><option zipcode="0" value="21">广西</option><option zipcode="0" value="22">海南</option><option zipcode="0" value="23">重庆</option><option zipcode="0" value="24">四川</option><option zipcode="0" value="25">贵州</option><option zipcode="0" value="26">云南</option><option zipcode="0" value="27">西藏</option><option zipcode="0" value="28">陕西</option><option zipcode="0" value="29">甘肃</option><option zipcode="0" value="30">青海</option><option zipcode="0" value="31">宁夏</option><option zipcode="0" value="32">新疆</option>
                                        </select>
                                    </div>
                                    <div class="item">
                                        
                                        </select>
                                        <textarea class="input-area" id="Site" placeholder="详细地址"></textarea>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>邮政编码<span>*</span></label> 
                                        <input id="Zipcode" class="input" placeholder="邮政编码" autocomplete="off" type="text">
                                        <p class="zipcode-tip" id="zipcodeTip"></p>
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                    <div class="item">
                                        <label>地址标签<span>*</span></label> 
                                        <input id="Tag" class="input" placeholder="地址标签：如&quot;家&quot;、&quot;公司&quot;。限5个字内" type="text">
                                        <p class="tip-msg tipMsg"></p>
                                    </div>
                                </div>
                                <div class="ft clearfix">
                                    <button type="button" class="btn btn-lineDake btn-small " id="J_editAddrCancel">取消</button>
                                     <button type="button" class="btn btn-primary  btn-small " id="J_editAddrOk">保存</button>
                                </div>
                                </div>
                                <div class="xm-edit-addr-backdrop" id="J_editAddrBackdrop"></div>
                                <div class="big-pro-tip J_bigProTip"></div>
                            </div>
                        </div>
                        <!-- 收货地址 END-->
                        <div id="checkoutPayment">
                            <!-- 支付方式 -->
                            <div class="xm-box">
                                <div class="box-hd ">
                                    <h2 class="title">支付方式</h2>
                                </div>
                                <div class="box-bd">
                                    <ul id="checkoutPaymentList" class="checkout-option-list clearfix J_optionList">
                                        <li class="item selected">
                                            <input name="paymethod" checked="checked" value="1" type="radio">
                                            <p>
                                                在线支付<span></span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 支付方式 END-->
                            <div class="xm-box">
                                <div class="box-hd ">
                                    <h2 class="title">配送方式</h2>
                                </div>
                                <div class="box-bd">
                                    <ul id="checkoutShipmentList" class="checkout-option-list clearfix J_optionList">
                                        <li class="item selected">
                                            <input data-price="10" name="postmethod" checked="checked" value="1" type="radio">
                                            <p>
                                                快递配送（运费 10 元）<span></span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- 配送方式 END-->  
                        </div>
                        <!-- 送货时间 -->
                        <div class="xm-box">
                            <div class="box-hd">
                                <h2 class="title">送货时间</h2>
                            </div>
                            <div class="box-bd">
                                <ul id="posttime" class="checkout-option-list clearfix J_optionList">
                                    <li class="item selected">
                                        <input checked="checked" name="posttime" value="1" type="radio"><p>不限送货时间<span>周一至周日</span></p>
                                    </li>
                                    <li class="item ">
                                        <input name="posttime" value="2" type="radio"><p>工作日送货<span>周一至周五</span></p>
                                    </li>
                                    <li class="item ">
                                        <input name="posttime" value="3" type="radio"><p>双休日、假日送货<span>周六至周日</span></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- 送货时间 END-->
                        <!-- 发票信息 -->
                        <div id="checkoutInvoice">
                            <div class="xm-box">
                                <div class="box-hd">
                                    <h2 class="title">发票信息</h2>
                                </div>
                                <div class="box-bd">
                                    <ul class="checkout-option-list checkout-option-invoice clearfix J_optionList J_optionInvoice">
                                        <li class="item selected">
                                            <input checked="checked" value="1" name="invoice" type="radio">
                                            <p>电子发票（非纸质）</p>
                                        </li>
                                        <li class="item ">
                                            <input value="2" name="invoice" type="radio">
                                            <p>普通发票（纸质）</p>
                                        </li>
                                    </ul>
                                    <p id="eInvoiceTip" class="e-invoice-tip ">
                                        电子发票是税务局认可的有效凭证，可作为售后维权凭据，不随商品寄送。开票后不可更换纸质发票，如需报销请选择普通发票。
                                    </p>
                                    <div class="invoice-info nvoice-info-1" id="checkoutInvoiceElectronic" style="display:none;">

                                        <p class="tip">电子发票目前仅对个人用户开具，不可用于单位报销 ，不随商品寄送</p>
                                        <p>发票内容：购买商品明细</p>
                                        <p>发票抬头：个人</p>
                                    </div>
                                    <div class="invoice-info invoice-info-2" id="checkoutInvoiceDetail" style="display:none;">
                                        <p>发票内容：购买商品明细</p>
                                        <p>
                                            发票抬头：请确认单位名称正确,以免因名称错误耽搁您的报销。
                                        </p>
                                        <ul class="type clearfix J_invoiceType">
                                            <li class="selected">
                                                <input class="invoiceType" id="commonPersonal" name="invoicetype" value="1" type="radio" checked="checked">
                                                个人
                                            </li>
                                            <li class="">
                                                 <input class="invoiceType" name="invoicetype" value="2" type="radio">
                                                 单位
                                            </li>
                                        </ul>
                                        <div id="CheckoutInvoiceTitle" class=" hide  invoice-title">
                                            <label for="Checkout[invoice_title]">单位名称：</label>
                                            <input name="invoicetitle" maxlength="49" class="input" type="text"> <span class="tip-msg J_tipMsg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 发票信息 END-->
                    </div>
                    <div class="checkout-box-ft">
                        <!-- 商品清单 -->
                        <div id="checkoutGoodsList" class="checkout-goods-box">
                            <div class="xm-box">
                                <div class="box-hd">
                                    <h2 class="title">确认商品</h2>
                                </div>
                                <div class="box-bd">
                                    <dl class="checkout-goods-list">
                                        <dt class="clearfix">
                                            <span class="col col-1">商品名称</span>
                                            <span class="col col-2">单品价格</span>
                                            <span class="col col-3">购买数量</span>
                                            <span class="col col-4">小计</span>
                                        </dt>
                                        <script type="text/javascript">
                                            // 定义接值变量
                                            var n = [];
                                            var m = 0;
                                        </script>
                                        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><dd class="item clearfix">
                                            <div class="item-row">
                                                <div class="col col-1">
                                                    <div class="g-pic">
                                                        <img src="/xm/Public/Upload/Goods/<?php echo ($vo['s_img']); ?>" width="40" height="40">
                                                    </div>
                                                    <div class="g-info">
                                                        <a href="" target="_blank"><?php echo ($vo['title']); ?></a>
                                                    </div>
                                                </div>
                                                    <div class="col col-2"><?php echo ($vo['price']); ?>元</div>
                                                    <div class="col col-3"><?php echo ($vo['number']); ?></div>
                                                    <div class="col col-4"><?php echo ($vo['xiaoji']); ?>元</div>
                                            </div>
                                        </dd>
                                        <script type="text/javascript">
                                            n[<?php echo ($key); ?>] = <?php echo ($vo['number']); ?>;
                                        </script><?php endforeach; endif; ?>
                                    </dl>
                                    <script type="text/javascript">
                                        $(function(){
                                            // 计算商品数量
                                            for(var i=0;i<n.length;i++){
                                                if(typeof(n[i]) == 'undefined'){
                                                    continue;
                                                }else{
                                                    m += n[i];
                                                }
                                            }
                                            $('.checkout-count ul li').eq(0).find('span').html(m+'件');
                                            // 计算加上运费后的总价
                                            var total = <?php echo ($get['Total']); ?>;
                                            var zongjia = 0;
                                            var yun = 0;
                                            if(total < 100){
                                                yun = 10;
                                                zongjia = total + 10;
                                            }else{
                                                yun = 0;
                                                zongjia = total;
                                            }
                                            $('#postageDesc').html(yun+'元');
                                            $('.checkout-count').find('strong').html(zongjia);
                                            $('<input type="hidden" name="money" value="'+zongjia+'">').insertBefore('#checkoutToPay');
                                        })
                                    </script>
                                    <div class="checkout-count clearfix">
                                        <!-- checkout-count-extend -->
                                        <div class="checkout-price">
                                            <ul>
                                                <li>
                                                    商品件数：<span>2件</span>
                                                </li>
                                                <li>
                                                    金额合计：<span><?php echo ($get['Product']); ?>元</span>
                                                </li>
                                                <li>
                                                    活动优惠：<span>-<?php echo ($get['Activity']); ?>元</span>
                                                </li>
                                                <li>
                                                    运费：<span id="postageDesc">10元</span>
                                                </li>
                                            </ul>
                                            <p class="checkout-total">应付总额：<span><strong id="totalPrice"><?php echo ($get['Total']); ?></strong>元</span></p>
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 商品清单 END -->
                        <div class="checkout-confirm clearfix">
                            <div id="submitAddress"></div>
                            <div class="big-pro-tip J_bigProTip"></div>
                            <a href="<?php echo U('Home/Cart/index');?>" class="btn btn-lineDakeLight btn-back-cart">返回购物车</a>
                            <input class="btn btn-primary" value="立即下单" id="checkoutToPay" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!--内容结束-->
    <script type="text/javascript">
        // 地址单选中事件
        $('#checkoutAddrList dl').live('click',function(){
            var t = $(this);
            t.css({border:'1px solid #ff4a00',background:'white'}).siblings().css({border:'1px solid #dfdfdf',background:'#f3f3f3'});
            t.find('.J_editAddr').css('display','block');
            t.siblings().find('.J_editAddr').css('display','none');
            t.find('.addressId').attr('checked','checked');
            t.siblings().find('.addressId').removeAttr('checked');
        });

        // 点击弹出添加新地址框体
        $('#J_useNewAddr').click(function(){
            var o = $(this).offset();
            var l = o.left+'px';
            var t = o.top+'px';
            $('#J_editAddrBox').css({display:'block',position:'absolute',left:l,top:t});
            $('#J_editAddrOk').addClass('J_editAddrOk').removeClass('J_upAddrOk');
            $('#Consignee').val('');
            $('#Telephone').val('');
            $('#Provinces').val(0);
            $('#Site').val('');
            $('#Zipcode').val('');
            $('#Tag').val('');
        })

        // 添加框体点击保存ajax存入数据库,并在页面插入地址
        $('.J_editAddrOk').live('click',function(){
            var con = $('#Consignee').val();
            var tel = $('#Telephone').val();
            var pro = $('#Provinces').val();
            var sit = $('#Site').val();
            var zip = $('#Zipcode').val();
            var tag = $('#Tag').val();
            $.get('<?php echo U('Home/Ordering/insertaj');?>',{consignee:con,telephone:tel,province:pro,site:sit,zipcode:zip,tag:tag},function(data){
                $('<dl class="item" aid="'+data.aid+'"><dt><strong class="itemConsignee">'+data.consignee+'</strong><span class="itemTag tag" <?php if('+data.tag+' == ''): ?>style="display:none"<?php endif; ?>>'+data.tag+'</span></dt><dd><p class="tel itemTel">'+data.telephone+'</p><p class="itemRegion">'+data.provi+'</p><p class="itemStreet">'+data.site+'('+data.zipcode+')</p><span class="edit-btn J_editAddr" >编辑</span></dd><dd style="display:none"><input name="aid" class="addressId" value="'+data.aid+'" type="radio"></dd></dl>').prependTo('#checkoutAddrList');
            },'json');
            $('#J_editAddrBox').css('display','none');
        });

        // 点击编辑事件
        var th = 0;
        $('.J_editAddr').live('click',function(){
            th = $(this).parents('dl');
            var o = $(this).parents('dl').offset();
            var l = o.left+'px';
            var t = o.top+'px';
            $('#J_editAddrBox').css({display:'block',position:'absolute',left:l,top:t});
            $('#J_editAddrOk').addClass('J_upAddrOk').removeClass('J_editAddrOk');
            var aid = $(this).parents('dl').attr('aid');
            $.get('<?php echo U('Home/Ordering/editaj');?>',{aid:aid},function(data){
                $('#Consignee').val(data.consignee);
                $('#Telephone').val(data.telephone);
                $('#Provinces').val(data.province);
                $('#Site').val(data.site);
                $('#Zipcode').val(data.zipcode);
                $('#Tag').val(data.tag);
            },'json')
        });

        // 编辑框体点击保存数据ajax更新,并在页面动态更新
        $('.J_upAddrOk').live('click',function(){
            var aid = th.attr('aid');
            var con = $('#Consignee').val();
            var tel = $('#Telephone').val();
            var pro = $('#Provinces').val();
            var sit = $('#Site').val();
            var zip = $('#Zipcode').val();
            var tag = $('#Tag').val();
            // th.find('itemConsignee').text(con);
            $.get('<?php echo U('Home/Ordering/updateaj');?>',{aid:aid,consignee:con,telephone:tel,province:pro,site:sit,zipcode:zip,tag:tag},function(data){
                   th.find('.itemConsignee').text(con); 
                   th.find('.itemTel').text(tel); 
                   th.find('.itemRegion').text(data.provi); 
                   th.find('.itemStreet').text(sit+(zip)); 
                   th.find('.itemTag').text(tag); 
            });
            $('#J_editAddrBox').css('display','none');
        });



        // 点击取消框体消失
        $('#J_editAddrCancel').live('click',function(){
            $('#J_editAddrBox').css('display','none');
        });


        // 配送时间单击事件
        $('#posttime li').click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            $(this).find('input').attr('checked','checked');
            $(this).siblings().find('input').removeAttr('checked');
        });
        // 选择发票
        // 点击电子发票
        $('.checkout-option-invoice li').eq(0).click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            $(this).find('input').attr('checked','checked');
            $(this).siblings().find('input').removeAttr('checked');
            $('#eInvoiceTip').css('display','none');
            $('#checkoutInvoiceElectronic').css('display','block');
            $('#checkoutInvoiceDetail').css('display','none');
        });
        // 点击纸质发票
        $('.checkout-option-invoice li').eq(1).click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            $(this).find('input').attr('checked','checked');
            $(this).siblings().find('input').removeAttr('checked');
            $('#eInvoiceTip').css('display','none');
            $('#checkoutInvoiceDetail').css('display','block');
            $('#checkoutInvoiceElectronic').css('display','none');
        });
        // 点击个人发票
        $('.J_invoiceType li').eq(0).click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            $(this).find('input').attr('checked','checked');
            $(this).siblings().find('input').removeAttr('checked');
            $('#CheckoutInvoiceTitle').css('display','none');
        });
        // 点击单位发票
        $('.J_invoiceType li').eq(1).click(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            $(this).find('input').attr('checked','checked');
            $(this).siblings().find('input').removeAttr('checked');
            $('#CheckoutInvoiceTitle').css('display','block');
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