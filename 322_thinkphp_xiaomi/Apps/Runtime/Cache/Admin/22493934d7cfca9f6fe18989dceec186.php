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

    <title>评价列表页</title>

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
                        <span><i class="icon-table"></i>评价列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
                            <form action="<?php echo U('Admin/Comment/index');?>" method="get">
                            <div id="DataTables_Table_1_length" class="dataTables_length">
                              <label>显示 
                                <select name="num" size="1" aria-controls="DataTables_Table_1">
                                    <option value="5" <?php if(($num) == "5"): ?>selected="selected"<?php endif; ?>>5</option>
                                    <option value="10" <?php if(($num) == "10"): ?>selected="selected"<?php endif; ?>>10</option>
                                    <option value="25" <?php if(($num) == "25"): ?>selected="selected"<?php endif; ?>>25</option>
                                    <option <?php if(($num) == "50"): ?>selected="selected"<?php endif; ?>>50</option>
                                    <option <?php if(($num) == "100"): ?>selected="selected"<?php endif; ?>>100</option>
                                </select> 条数
                              </label>
                            </div>
                            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                                <label>搜索: <input type="text" name="keywords" value="<?php echo ($keywords); ?>" aria-controls="DataTables_Table_1"><button class="btn" type="submit"><i class="icon-search"></i> </button></label>
                            </div>
                            </form>   
                                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info" style="width:100%;padding=8px" >
                            <thead>
                                <tr role="row">
                                    <th style="width: 80px;">ID</th>
                                    <th style="width: 80px;">评价人</th>
                                    <th style="width: 112px;">评价商品</th>
                                    <th style="width: 80px;">评价时间</th>
                                    <th style="width: 90px;">状态</th>
                                    <th style="width: 130px;">操作</th>
                                </tr>
                            </thead>
                            
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php if(is_array($commentinfo)): foreach($commentinfo as $key=>$vo): ?><tr>
                                    <td><?php echo ($vo['id']); ?></td>
                                    <td><?php echo ($vo['name']); ?></td>
                                    <td><?php echo ($vo['title']); ?></td>
                                    <td align="center"><?php echo date('Y-m-d H:i:s',$vo['comment_time']);?></td>
                                    <td align="center"><?php echo ($vo['status'] ? "已回复" : "未回复"); ?></td>
                                    
                                    <td class=" " align="center"><a class="btn btn-small" href="<?php echo U('Admin/Comment/edit', array('id'=>$vo['id']));?>"><i class="icon-pencil"></i></a> <a class="btn btn-small" href="<?php echo U('Admin/Comment/delete', array('id'=>$vo['id']));?>"><i class="icon-trash"></i></a></td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>

                        </table>


                        <div class="dataTables_info" id="DataTables_Table_1_info">显示 <?php if(($start) <= $count): echo ($start); else: echo ($count); endif; ?> 到 
                        <?php if(($end) <= $count): echo ($end); else: echo ($count); endif; ?>  总共 <?php echo ($count); ?> 条数据</div>
                            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                        <style type="text/css">
                            .pages a{ background-color: #444444;
                            border-left: 1px solid rgba(255, 255, 255, 0.15);
                            border-right: 1px solid rgba(0, 0, 0, 0.5);
                            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.15) inset;
                            color: #fff;
                            cursor: pointer;
                            display: block;
                            float: left;
                            font-size: 12px;
                            height: 20px;
                            line-height: 20px;
                            outline: medium none;
                            padding: 0 10px;
                            text-align: center;
                            text-decoration: none;
                            }
                            .pages span{
                                background-color: #88a9eb;
                                background-image: none;
                                border: medium none;
                                box-shadow: 0 0 4px rgba(0, 0, 0, 0.25) inset;
                                color: #323232;
                                cursor: pointer;
                                display: block;
                                float: left;
                                font-size: 12px;
                                height: 20px;
                                line-height: 20px;
                                outline: medium none;
                                padding: 0 10px;
                                text-align: center;
                                text-decoration: none;
                            }
                        </style>
                                <div class="pages">
                                    <?php echo ($page); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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

    <script src="/322_thinkphp_xiaomi/Public/Admin/jui/js/globalize/globalize.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/select2/select2.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/plugins/cleditor/jquery.cleditor.icon.min.js"></script>
    <!-- Core Script -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/322_thinkphp_xiaomi/Public/Admin/js/demo/demo.formelements.js"></script>


</body>
</html>