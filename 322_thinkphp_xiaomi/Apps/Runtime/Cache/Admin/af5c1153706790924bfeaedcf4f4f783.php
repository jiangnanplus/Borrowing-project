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


    <style>
        #color ul li{float:left}
    </style>
    <script type="text/javascript" charset="utf-8" src="/xm/Public/Plugins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/xm/Public/Plugins/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/xm/Public/Plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
	<title>提问审核</title>


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
        	<span>提问审核</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="<?php echo U('Admin/Ask/save');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="askid" value="<?php echo ($info['askid']); ?>">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">提问用户</label>
        				<div class="mws-form-item">
                            <input type="text" readonly style="width:245px" class="small" name="mssid" value="<?php echo ($info['mssid']); ?>">
                        </div>
        			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">提问商品</label>
                        <div class="mws-form-item">
                            <div id="color" style="width:250px;float:left">
                                <div style="float:left;margin-right:25px;margin-bottom:15px;border:1px solid #C5C5C5;border-radius:10%;">
                                    <div style="width:250px;text-align:center">
                                        <span><?php echo ($info['title']); ?></span>
                                    </div><br>
                                    <div class="zhuimg" style="width:250px;overflow:hidden;border:1px solid #C5C5C5;border-radius:10%;">
                                        <img style="color:#AAA7A7;" src="/xm/Public/Upload/Goods/<?php echo ($info['zhupic']); ?>">
                                    </div><br>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">提问时间</label>
                        <div class="mws-form-item">
                            <input type="text" readonly style="width:245px" class="small" name="atime" value="<?php echo date('Y-m-d H:i:s',$info['atime']);?>">
                        </div>
                    </div>
                    <div class="mws-form-row">  
                        <label class="mws-form-label">提问内容</label>  
                        <div class="mws-form-item"> 
                            <div style="width:500px;">
                                <div style="width:500px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><textarea name="a_content" readonly  style="width:500px;height:100px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%;color:#A29B9B;font-size:20px;font-family:microsoft yahei"><?php echo ($info['a_content']); ?></textarea></div>
                            </div>
                        </div>  
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">回复内容</label>
                <?php if($info['isok'] == 0): ?><input id="replay" type="button" value="回复" class="btn btn-danger" style="margin-left:18px;width:116px">
                        <input id="empty" type="button" value="清空" class="btn btn-danger" style="margin-left:18px;width:116px">
                        <div class="mws-form-row">    
                            <div class="mws-form-item"> 
                                <div id="bigimg" style="width:500px;margin-left:-24px"></div>
                            </div>  
                        </div>
                    </div>   
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="确认" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
                <?php else: ?>
                    <div class="mws-form-row">    
                        <div class="mws-form-item"> 
                            <div id="bigimg" style="width:500px;margin-left:-24px">
                                <div style="width:500px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><textarea name="r_content" readonly style="width:500px;height:100px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%;color:#A29B9B;font-size:20px;font-family:microsoft yahei"><?php echo ($info['r_content']); ?></textarea></div>
                            </div>
                        </div>  
                    </div><?php endif; ?>
        	</form>
        </div>    	
    </div>
    <script type="text/javascript">
    //文本域事件
        $('textarea[name=r_content]').live('focus',function(){
            $(this).css('border','3px solid lightpink');
            if(<?php echo ($info['isok']); ?>==0){
               $(this).val(''); 
            }   
        });
        $('textarea[name=r_content]').live('blur',function(){
            $(this).css('border','1px solid #AAA7A7');
        });

    //回复
    $('#replay').click(function(){
        $('#bigimg').append('<div style="width:500px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><textarea name="r_content" style="width:500px;height:100px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%;color:#A29B9B;font-size:20px;font-family:microsoft yahei">请在此输入文字</textarea></div>');
    });
    
    //清空
     $('#empty').click(function(){
        $('#bigimg').empty();
     })

    </script>

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