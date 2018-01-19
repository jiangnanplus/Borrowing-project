<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/css/themer.css" media="screen">

    <title>订单详情</title>
    <!-- <link rel="stylesheet" href="/322_thinkphp_xiaomi/Public/Home/css/base.css" type="text/css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Home/css/checkOut.css"> -->

<style type="text/css">
    #mws-container{margin-left:0px;}
</style>
</head>

<body>

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        	<!-- Inner Container Start -->
            <div class="container">
                
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span>订单详情</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="<?php echo U('Admin/Admin/update');?>" method="post">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">订单号码</label>
        				<div class="mws-form-item">
        					<?php echo ($info['onumber']); ?>
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">订单状态</label>
                        <div class="mws-form-item"><?php switch($info['status']): case "0": ?>未支付<?php break;?>
                                <?php case "1": ?>待发货<?php break;?>
                                <?php case "2": ?>已发货<?php break;?>
                                <?php case "3": ?>交易完成<?php break;?>
                                <?php default: ?>已关闭<?php endswitch;?></div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品信息</label>
                        <table style="text-align:center">
                            <tr role="row">
                                <td style="width: 221px;">商品名称</td>
                                <td style="width: 100px;">单品价格</td>
                                <td style="width: 100px;">优惠价格</td>
                                <td style="width: 100px;">购买数量</td>
                                <td style="width: 100px;">小计</td>
                            </tr>
                            <?php if(is_array($ginfo)): foreach($ginfo as $key=>$vo): ?><tr class="<?php if($key%2 == 1 ): ?>odd<?php else: ?>even<?php endif; ?>">
                                <td class="  sorting_1"><?php echo ($vo['title']); ?></td>
                                <td class=" "><?php echo ($vo['price']); ?></td>
                                <td class=" "><?php echo ($vo['nowprice']); ?></td>
                                <td class=" "><?php echo ($vo['number']); ?></td>
                                <td class=" "><?php echo ($vo['xiaoji']); ?></td>
                            </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
        			<div class="mws-form-row">
        				<label class="mws-form-label">订单总价</label>
        				<div class="mws-form-item">
        					<?php echo ($info['money']); ?>
        				</div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">收货人</label>
                        <div class="mws-form-item">
                            <?php echo ($info['consignee']); ?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">联系电话</label>
                        <div class="mws-form-item">
                            <?php echo ($info['telephone']); ?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">收货地址</label>
                        <div class="mws-form-item">
                            <?php echo ($arr[$info['province']]); echo ($info['site']); echo ($info['tag']); ?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">邮编</label>
                        <div class="mws-form-item">
                            <?php echo ($info['zipcode']); ?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">下单时间</label>
                        <div class="mws-form-item">
                            <?php echo date('Y-m-d H:i:s',$info['otime']);?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">支付方式</label>
                        <div class="mws-form-item">
                            <?php if($info['paymethod'] == 1 ): ?>在线支付<?php endif; ?>

                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">配送方式</label>
                        <div class="mws-form-item">
                            <?php if($info['postmethod'] == 1 ): ?>快递配送<?php endif; ?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">配送时间</label>
                        <div class="mws-form-item">
                            <?php switch($info['posttime']): case "1": ?>不限送货时间<?php break;?>
                                <?php case "2": ?>工作日送货<?php break;?>
                                <?php case "3": ?>双休日,假日送货<?php break; endswitch;?>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">发票信息</label>
                        <div class="mws-form-item">
                            <?php switch($info['invoice']): case "1": ?>电子发票(非纸质)<?php break;?>
                                <?php case "2": ?>普通发票(纸质)<?php break; endswitch;?>
                            <?php switch($info['invoicetype']): case "1": ?>&nbsp;&nbsp;&nbsp;个人<?php break;?>
                                <?php case "2": ?>&nbsp;&nbsp;&nbsp;单位: &nbsp;&nbsp;&nbsp;<?php echo ($info['invoicetitle']); break; endswitch;?>
                        </div>
                    </div>
        		</div>
        	</form>
        </div>    	
    </div>
    <script type="text/javascript" src="/322_thinkphp_xiaomi/Public/Home/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var t = $('label:contains("订单状态")').next();
            var v = t.html();
            var o = <?php echo ($info['oid']); ?>;
            // alert(o);
            // alert(v);
            // console.log(v);
            if(v == '待发货'){
                $('<div id="fahuo" style="width:100px;height:20px;line-height:5px;text-align:center;position:relative;left:270px;top:-22px;border:1px solid #FF4A00;color:#FF4A00;cursor:pointer;">点击发货</div>').insertAfter(t);
                $('#fahuo').click(function(){
                    $.get('<?php echo U('Admin/Order/post');?>',{status:2,oid:o},function(data){
                        if(data == 1){
                            t.html('已发货');
                            t.next().remove();
                        }
                    });
                });
            }
        })
    </script>

        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
</html>