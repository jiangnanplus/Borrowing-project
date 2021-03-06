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
<script type="text/javascript" src="/xm/Public/Home/js/jquery-1.8.3.min.js"></script>


<title>分类编辑</title>


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
        	<span>分类编辑</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="<?php echo U('Admin/Goodsclass/update');?>" method="post">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">分类名称</label>
        				<div class="mws-form-item">
                            <input type="hidden" name = "cid" value="<?php echo ($info['cid']); ?>">
        					<input type="text" class="small" name="name" value="<?php echo ($info['name']); ?>">
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">父级分类</label>
                        <div class="mws-form-item">
                            <select name="paid" class="small" size="">
                                <option value='0'>请选择</option>
                                <?php if(is_array($goodsclasses)): foreach($goodsclasses as $key=>$vo): ?><option value="<?php echo ($vo['cid']); ?>" <?php if($vo['cid'] == $info['paid'] ): ?>selected="selected"<?php endif; ?>><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>	
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="修改" class="btn btn-danger">
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


</body>
</html>