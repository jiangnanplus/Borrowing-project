<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<block name=css>
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/xm/Public/Admin/css/themer.css" media="screen">
</block>

    <title>订单回复</title>

<style type="text/css">
    #mws-container{margin-left:0px;}
    #mws-container .container{margin-bottom:0px;padding-bottom:0px;}
    .phone{margin-top:30px;}
    .mws-button-row{margin-top:60px;}
    .btn btn-small{margin-bottom:0px;padding-bottom:0px;}

</style>
</head>

<body>

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        	<!-- Inner Container Start -->
            <div class="container" style="margin-top:30px;margin:0px;padding:0px;width:1042px">
            
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>订单回复</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="<?php echo U('Admin/Comment/update');?>" method="post">
                    		<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <div class="phone">
                                        <label class="mws-form-label" style="width:80px;margin-left:60px">评论人 :</label>
                                        <div class="mws-form-item">
                                            <?php echo ($commentInfo['name']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">评论时间 :</label>
                                    <div class="mws-form-item">
                                            <?php echo date('Y-m-d H:i:s',$commentInfo['comment_time']);?>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">评价商品 :</label>
                                    <div class="mws-form-item">
                                        <?php echo ($commentInfo['title']); ?>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">评价内容 :</label>
                                    <div class="mws-form-item">
                                        <?php echo ($commentInfo['content']); ?>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">评论分数 :</label>
                                    <div class="mws-form-item">
                                        <?php echo ($commentInfo['com_star']); ?>
                                    </div>
                                </div>
                               
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">回复评价 :</label>
                                    <div class="mws-form-item">
                                        <textarea name="recontent" rows="10" cols="50" resize=none><?php echo ($commentInfo['recontent']); ?></textarea>
                                        小米官方对买家评价的回复
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                                <input type="hidden" name="id" value="<?php echo ($commentInfo['id']); ?>">
                    			<input type="submit" value="修改" class="btn btn-danger" style="margin-left:60px">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>
    
    <!-- JavaScript Plugins -->
    <script src="/xm/Public/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/xm/Public/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/xm/Public/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/xm/Public/Admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/xm/Public/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/xm/Public/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/xm/Public/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/xm/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/xm/Public/Admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/xm/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/xm/Public/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/xm/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    

</body>
</html>