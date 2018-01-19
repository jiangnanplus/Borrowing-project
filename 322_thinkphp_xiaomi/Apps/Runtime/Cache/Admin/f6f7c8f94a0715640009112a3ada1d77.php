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
<script type="text/javascript" src="/322_thinkphp_xiaomi/Public/Home/js/jquery-1.8.3.min.js"></script>


    <style>
        #color ul li{float:left}
    </style>
    <script type="text/javascript" charset="utf-8" src="/322_thinkphp_xiaomi/Public/Plugins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/322_thinkphp_xiaomi/Public/Plugins/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/322_thinkphp_xiaomi/Public/Plugins/ueditor/lang/zh-cn/zh-cn.js"></script>
	<title>商品编辑</title>


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
        	<span>商品编辑</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="<?php echo U('Admin/Goods/save');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gid" value="<?php echo ($info['gid']); ?>">
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">商品标题</label>
        				<div class="mws-form-item">
        					<input type="text" class="small" name="title" value="<?php echo ($info['title']); ?>" style="width:555px">
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">选择分类</label>
                        <div class="mws-form-item">
                            <select name="mcid" class="small" size="" style="width:555px">
                                <option>请选择</option>
                                <?php if(is_array($classes)): foreach($classes as $key=>$vo): ?><optgroup label="<?php echo ($key); ?>" style="color:red;font-family:microsoft yahei">
                                        <?php if(is_array($vo)): foreach($vo as $key=>$v): ?><!-- 法一 -->
                                            <option value='<?php echo ($key); ?>' style="color:#A29B9B" <?php if(($info['mcid']) == $key): ?>selected="selected"<?php endif; ?>><?php echo ($v); ?></option>
                                        <!-- 法二 -->
                                            <!-- <option value='<?php echo ($key); ?>' style="color:#A29B9B" <?php if($info['mcid'] == $key): ?>selected="selected"<?php endif; ?>><?php echo ($v); ?></option> --><?php endforeach; endif; ?>
                                    </optgroup><?php endforeach; endif; ?>
                            </select>
                        </div>
                    </div>	
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品原价</label>
                        <div class="mws-form-item">
                            <input type="text" style="width:245px" class="small" name="price" value="<?php echo ($info['price']); ?>">
                            &nbsp; 商品折扣
                            <select style="width:245px" class="small" name="discount">
                                <option value="10">请选择</option>
                                <option value="0" <?php if($info['discount'] == 0): ?>select="selected"<?php endif; ?>>0</option>
                                <option value="1" <?php if($info['discount'] == 1): ?>selected="selected"<?php endif; ?>>1</option>
                                <option value="2" <?php if(($info['discount']) == "2"): ?>selected="selected"<?php endif; ?>>2</option>
                                <option value="3" <?php if($info['discount'] == 3): ?>selected="selected"<?php endif; ?>>3</option>
                                <option value="4" <?php if(($info['discount']) == "4"): ?>selected="selected"<?php endif; ?>>4</option>
                                <option value="5" <?php if($info['discount'] == 5): ?>selected="selected"<?php endif; ?>>5</option>
                                <option value="6" <?php if(($info['discount']) == "6"): ?>selected="selected"<?php endif; ?>>6</option>
                                <option value="7" <?php if($info['discount'] == 7): ?>selected="selected"<?php endif; ?>>7</option>
                                <option value="8" <?php if(($info['discount']) == "8"): ?>selected="selected"<?php endif; ?>>8</option>
                                <option value="9" <?php if($info['discount'] == 9): ?>selected="selected"<?php endif; ?>>9</option>
                                <option value="10" <?php if(($info['discount']) == "10"): ?>selected="selected"<?php endif; ?>>不打折</option>
                            </select>
                        </div>
                        <script type="text/javascript">
                            $('select[name=mcid]').change(function(){
                                var mcid = $(this).val();
                                if(mcid==31){
                                    $('#size').css('display','none');
                                }else{
                                    $('#size').css('display','block');
                                }
                            })
                        </script>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品现价</label>
                        <div class="mws-form-item">
                            <input type="text" readonly style="width:245px" class="small" name="nowprice" value="<?php echo ($info['nowprice']); ?>">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">颜色分类与主图</label>
                        <input id="addcolor" type="button" value="添加颜色与主图" class="btn btn-danger" style="margin-left:16px;width:114px" title="友情提示:最多支持六种颜色 请合理搭配"> 
                        <input id="addcoloredit" type="button" value="编辑" class="btn btn-danger" style="margin-left:16px;width:114px;background:green">
                        <input id="colorempty" type="button" value="清空" class="btn btn-danger" style="margin-left:16px;width:114px">
                    </div>
                    <div class="mws-form-row">    
                        <div class="mws-form-item"> 
                            <div id="color" style="width:710px;float:left">
                                <?php $__FOR_START_27792__=0;$__FOR_END_27792__=$length;for($i=$__FOR_START_27792__;$i < $__FOR_END_27792__;$i+=1){ ?><div style="float:left;margin-right:25px;margin-bottom:15px;border:1px solid #C5C5C5;border-radius:10%;">
                                        <div style="width:150px;text-align:center">
                                            <span><?php echo ($colortit[$i]); ?></span>
                                        </div><br>
                                        <?php if(is_array($s_img[$i])): foreach($s_img[$i] as $key=>$vo): ?><div class="zhuimg" style="width:150px;overflow:hidden;border:1px solid #C5C5C5;border-radius:10%;">
                                                <img style="color:#AAA7A7;" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($s_img[$i][$key]); ?>" alt="请添加颜色主图">
                                            </div><br><?php endforeach; endif; ?>
                                    </div><?php } ?>
                            </div>
                        </div>  
                    </div>
                    <div class="mws-form-row" id="size">
                        <label class="mws-form-label">商品尺码</label>
                        <div class="mws-form-item">
                            S<input type="checkbox" class="small" style="width:50px;margin-right:10px" name="size[]" value="0" <?php if(in_array(0,$size)): ?>checked="checked"<?php endif; ?>>&nbsp;
                            M<input type="checkbox" class="small" style="width:50px;margin-right:10px" name="size[]" value="1" <?php if(in_array(1,$size)): ?>checked="checked"<?php endif; ?>>&nbsp;
                            L<input type="checkbox" class="small" style="width:50px;margin-right:10px" name="size[]" value="2" <?php if(in_array(2,$size)): ?>checked="checked"<?php endif; ?>>&nbsp;
                            XL<input type="checkbox" class="small" style="width:50px;margin-right:10px" name="size[]" value="3" <?php if(in_array(3,$size)): ?>checked="checked"<?php endif; ?>>&nbsp;
                            XXL<input type="checkbox" class="small" style="width:50px;margin-right:10px" name="size[]" value="4" <?php if(in_array(4,$size)): ?>checked="checked"<?php endif; ?>>
                        </div>
                        <script type="text/javascript">
                            var mcid = $('select[name=mcid]').val();
                            if(mcid==31){
                                $('#size').css('display','block');
                            }else{
                                $('#size').css('display','none');
                            }
                        </script>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品库存</label>
                        <div class="mws-form-item">
                            <input type="text" style="width:250px" class="small" name="num" value="<?php echo ($info['num']); ?>">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品详情</label>
                        <input id="bigimgOne" type="button" value="添加单个图片" class="btn btn-danger" style="margin-left:16px;width:114px">
                        <input id="bigimgMore" type="button" value="添加多个图片" class="btn btn-danger" style="margin-left:16px;width:114px">
                        <input id="addText" type="button" value="添加文字" class="btn btn-danger" style="margin-left:16px;width:114px">
                        <input id="introedit" type="button" value="编辑" class="btn btn-danger" style="margin-left:16px;width:114px;background:green">
                        <input id="introempty" type="button" value="清空" class="btn btn-danger" style="margin-left:16px;width:114px">
                    </div>
                    <div class="mws-form-row">    
                        <div class="mws-form-item"> 
                            <div id="bigimg" style="width:710px;"></div>
                        </div>  
                    </div>
                        <!-- <div class="mws-form-item">
                           //编辑器
                           <script type="text/javascript">
                           //      var ue = UE.getEditor('editor');
                           //  </script>
                           <script id="editor" type="text/plain" style="width:640px;height:450px;"></script>
                        </div> -->
                    
        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="保存" class="btn btn-danger" title="友情提示:最多支持20张图片同时上传,请合理搭配">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
    <script type="text/javascript">
    //单选框事件
        $('input[type=text],select,textarea').live('focus',function(){
            $(this).css('border','3px solid lightpink');
            $(this).val('');
        });
    //文本域事件
        $('input[type=text],select,textarea').live('blur',function(){
            $(this).css('border','1px solid #AAA7A7');
        });
    //计算商品现价
        var price = '';
        var discount = '';
        var nowprice = '';
        $('input[name=price]').blur(function(){
            price = $(this).val();
            if(discount && price){
                
                $('input[name=nowprice]').val(nowprice = price*discount/10);
            }
        })
        $('select[name=discount]').change(function(){
            discount = $('input[name=price]').val();
            price = $(this).val();
            if(discount && price){
                $('input[name=nowprice]').val(nowprice = price*discount/10);
            }
        })

    //商品详情显示
        var j = 0;
        var intro = eval(<?php echo ($intro); ?>);
        // alert(intro.length);
        var reg = /\w+\.(jpg|jpeg|png|gif)/;
        for(var i in intro){
            if(reg.test(intro[i])){
                $('#bigimg').append('<div class="zhuimg" style="overflow:hidden;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><img style="color:#AAA7A7;" src="/322_thinkphp_xiaomi/Public/Upload/Goods/'+intro[i]+'" alt="请添加图片"></div><br>');
                    
            }else{
                $('#bigimg').append('<div style="width:650px;border:none;border-radius:10%;margin-right:15px;margin-top:15px;clear:both;text-align:center"><span style="font-size:30px;font-family:macrosoft yahei">'+intro[i]+'</span></div><br>');
            }
            j++;
        }
        // alert(j);
    //单击添加颜色与主图
        var i = 0;
        // alert(i);
        $('#addcolor').click(function(){
            $('#color').append('<div style="float:left;margin-right:25px;margin-bottom:15px"><div style="width:150px"><input type="text" style="width:150px;color:#AAA7A7;" class="small" name="colortit[]" value="请输入颜色"></div><br><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;"><input type="file" name="colorimg0'+i+'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div><br><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;"><input type="file" name="colorimg1'+i+'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色副图"></div><br><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;"><input type="file" name="colorimg2'+i+'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色副图"></div><br><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;"><input type="file" name="colorimg3'+i+'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色副图"></div></div>')
                i++;
        });

    //单击添加单文件 多文件 文字
        var j = 0
        $('#bigimgOne').click(function(){

            $('#bigimg').append('<div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><input type="file" name="bigimg'+j+'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div><br>');
            j++;
        });

        $('#bigimgMore').click(function(){
            $('#bigimg').append('<div style="clear:both"><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-bottom:15px;float:left"><input type="file" name="bigimg'+j+++'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;float:left"><input type="file" name="bigimg'+j+++'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;float:left"><input type="file" name="bigimg'+j+++'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div><div style="width:150px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;float:left"><input type="file" name="bigimg'+j+++'" style="width:145px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%"><img style="width:100%;height:100%;color:#AAA7A7;" src="" alt="请添加颜色主图"></div></div><br>');
            j++;
        });
        $('#addText').click(function(){
            $('#bigimg').append('<div style="width:650px;border:1px solid #C5C5C5;border-radius:10%;margin-right:15px;margin-top:15px;clear:both"><textarea name="introtext['+j+']" style="width:650px;height:100px;opacity:0.5;overflow:hidden;border:3px solid #BBBBBB;border-radius:10%;color:#A29B9B;font-size:20px;font-family:microsoft yahei">请在此输入文字</textarea></div><br>');
            j++;
        });

    //缩放ajax函数
        function suofang(w,h,src,element){
            $(function(){
                $.get("<?php echo U('Admin/Goods/suofang');?>",{wsize:w,hsize:h,src:src},function(data){
                    if(data[0]==430&&data[1]==430){
                        return;
                    }else{
                        $(element).css({position:'absolute',left:'50%',top:'40%',marginLeft:'-'+data[0]/2+'px',marginTop:'-'+data[1]/2+'px',width:data[0],height:data[1]});
                    }
                    
                })
            })
        }

    //点击移除图片
        $('#addcoloredit').click(function(){
            $('#color').empty();
            i = 0;
            for(var n=0;n<<?php echo ($zhupicLength); ?>;n++){
                $('#addcolor').trigger('click');
            }
        })

        $('#introedit').click(function(){
            $('#bigimg').empty();
            j=0;
            $('#bigimgMore').trigger('click');
            $('#addText').trigger('click');
        })
    //清空
         $('#colorempty').click(function(){
            $('#color').empty();
            i = 0;
         })
         $('#introempty').click(function(){
            $('#bigimg').empty();
            j=0;
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


</body>
</html>