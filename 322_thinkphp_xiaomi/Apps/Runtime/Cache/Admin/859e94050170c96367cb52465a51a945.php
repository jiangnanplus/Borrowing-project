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
<link rel="stylesheet" type="text/css" href="/322_thinkphp_xiaomi/Public/Admin/custom-plugins/wizard/wizard.css" media="screen">

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

<title>后台首页</title>

</head>

<body>
    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/322_thinkphp_xiaomi/Public/Admin/images/logo.png" alt="mws admin"><span id="mws-logo-ziti">小米后台管理系统</span>
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            <!-- Notifications -->
            <div id="mws-user-notif" class="mws-dropdown-menu">
                
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
               
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-messages">
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/322_thinkphp_xiaomi/Public/Admin/example/tavatar.gif" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        欢迎您, <?php echo (session('user')); ?>
                    </div>
                    <ul>
                        <li><a href="#"><?php echo ($auth ? '管理员':'超级管理员'); ?></a></li>
                        <li><a href="/322_thinkphp_xiaomi/index.php/Admin/Login/quit/">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">

                <ul>
                    <?php if($auth == 0 ): ?><li>
                        <a href="#"><i class="icon-list"></i>管理员管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Admin/add');?>" target="frame">管理员添加</a></li>
                            <li><a href="<?php echo U('Admin/Admin/index');?>" target="frame">管理员列表</a></li>
                        </ul>
                    </li><?php endif; ?>
                    <li>
                        <a href="#"><i class="icon-list"></i>管理员权限管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/AdminAuth/add');?>" target="frame">添加</a></li>
                            <li><a href="<?php echo U('Admin/AdminAuth/index_rule');?>" target="frame">规则列表</a></li>
                            <li><a href="<?php echo U('Admin/AdminAuth/index_group');?>" target="frame">管理员组列表</a></li>
                            <li><a href="<?php echo U('Admin/AdminAuth/index_group_access');?>" target="frame">管理员属组列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>用户管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/User/add');?>" target="frame">用户添加</a></li>
                            <li><a href="<?php echo U('Admin/User/index');?>" target="frame">用户列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>分类管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Goodsclass/add');?>" target="frame">分类添加</a></li>
                            <li><a href="<?php echo U('Admin/Goodsclass/index');?>" target="frame">分类列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>商品管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Goods/add');?>" target="frame">商品添加</a></li>
                            <li><a href="<?php echo U('Admin/Goods/index');?>" target="frame">商品列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>订单管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Order/index');?>" target="frame">订单列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>评价管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Comment/index');?>" target="frame">评价列表</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="icon-list"></i>提问管理</a>
                        <ul class="closed">
                            <li><a href="<?php echo U('Admin/Ask/index');?>" target="frame">提问列表</a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
                <iframe src="" frameborder="0" name="frame" style="width:100%;height:500px"></iframe>
            </div>
            <!-- Inner Container End -->
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
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/flot/jquery.flot.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/demo/demo.dashboard.js"></script>

</body>
</html>