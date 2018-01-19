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
</block>

<title>用户添加</title>

<style type="text/css">
    #mws-container{margin-left:0px;}
    #mws-container .container{margin-bottom:0px;padding-bottom:0px;}
    .phone{margin-top:30px;}
    .mws-button-row{margin-top:60px;}
    .btn btn-small{margin-bottom:0px;padding-bottom:0px;}
    body {
        color: #333;
        font-family: 'PT Sans';
        font-size: 13px;
        line-height: 20px;
    }


</style>
</head>

<body>

    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">

        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        	<!-- Inner Container Start -->
            <div class="container" style="margin-top:30px;margin:0px;padding:0px;width:1042px">
            
                <!-- 添加规则start -->
            	<div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>规则添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="<?php echo U('Admin/AdminAuth/insert_rule');?>" method="post">
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <div class="phone">
                                        <label class="mws-form-label" style="width:80px;margin-left:60px">规则标识 :</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">规则名称 :</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" name="title">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">认证方式 :</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="type" value="1" checked='checked'> <label>实时认证</label></li>
                                            <li><input type="radio" name="type" value="2"> <label>登录认证</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态 :</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="status" value="1" checked='checked'> <label>启用</label></li>
                                            <li><input type="radio" name="status" value="0"> <label>禁用</label></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">规则表达式 :</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" name="condition">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="添加" class="btn btn-danger" style="margin-left:60px">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>
                <!-- 添加规则end -->

                <!-- 添加管理员组 start-->
                <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span>管理员组添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form class="mws-form" action="<?php echo U('Admin/AdminAuth/insert_group');?>" method="post">
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <div class="phone">
                                        <label class="mws-form-label" style="width:80px;margin-left:60px">管理员组名 :</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="title">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">拥有规则ID :</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" name="rules">
                                    </div>
                                </div> -->
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">拥有规则ID : 
                                    <span class="required"></span></label>
                                    <div class="mws-form-item">
                                        <textarea class="required large small" name="rules" style="height:100px;resize:vertical;"><?php echo ($groupInfo['rules']); ?></textarea>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label" style="width:80px;margin-left:60px">状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态 :</label>
                                    <div class="mws-form-item clearfix">
                                        <ul class="mws-form-list inline">
                                            <li><input type="radio" name="status" value="1" checked='checked'}> <label>启用</label></li>
                                            <li><input type="radio" name="status" value="0"> <label>禁用</label></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="mws-button-row">
                                <input type="submit" value="添加" class="btn btn-danger" style="margin-left:60px">
                                <input type="reset" value="重置" class="btn ">
                            </div>
                        </form>
                    </div>      
                </div>
                <!-- 添加管理员组end-->

                <!-- 管理员权限添加start -->
                <div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>管理员权限添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="<?php echo U('Admin/AdminAuth/insert_group_access');?>" method="post">
                    		<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <div class="phone">
                                        <label class="mws-form-label" style="width:80px;margin-left:60px">管 理 员  ID :</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="uid">
                                        </div>
                                    </div>
                                </div>
                                <div class="mws-form-row" style="margin-top:-30px;">
                                    <div class="phone">
                                        <label class="mws-form-label" style="width:80px;margin-left:60px;">管理员组ID :</label>
                                        <div class="mws-form-item">
                                            <input type="text" class="small" name="group_id">
                                        </div>
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                    			<input type="submit" value="添加" class="btn btn-danger" style="margin-left:60px">
                    			<input type="reset" value="重置" class="btn ">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <!-- 管理员权限添加end -->
            
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