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

    <title>订单列表</title>

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
            <span><i class="icon-table"></i>订单列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
                <form action="<?php echo U('Admin/Admin/index');?>" method="get">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>显示 
                    <select name="num" size="1" aria-controls="DataTables_Table_1">
                        <option value="10" <?php if(($num) == "10"): ?>selected="selected"<?php endif; ?>>10</option>
                        <option value="25" <?php if(($num) == "25"): ?>selected="selected"<?php endif; ?>>25</option>
                        <option value="50" <?php if(($num) == "50"): ?>selected="selected"<?php endif; ?>>50</option>
                        <option value="100" <?php if(($num) == "100"): ?>selected="selected"<?php endif; ?>>100</option>
                    </select>
                    条</label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>搜索订单号: <input type="text" aria-controls="DataTables_Table_1" name="keywords" value="<?php echo ($keywords); ?>"><button class="btn btn-inverse" type="submit">提交</button></label>
                </div>
                
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                        <th style="width: 100px;">订单号</th>
                        <th style="width: 95px;">收货人</th>
                        <th style="width: 420px;">收货地址</th>
                        <th style="width: 100px;">联系电话</th>
                        <th style="width: 80px;">订单总价</th>
                        <th style="width: 130px;">订单状态</th>
                        <th style="width: 130px;">下单时间</th>
                        <th style="width: 50px;">详情</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr class="<?php if($key%2 == 1 ): ?>odd<?php else: ?>even<?php endif; ?>">
                            <td class="  sorting_1"><?php echo ($vo['onumber']); ?></td>
                            <td class=" "><?php echo ($vo['consignee']); ?></td>
                            <td class=" "><?php echo ($arr[$vo['province']]); echo ($vo['site']); ?></td>
                            <td class=" "><?php echo ($vo['telephone']); ?></td>
                            <td class=" "><?php echo ($vo['money']); ?></td>
                            <td class=" ">
                                <?php switch($vo['status']): case "0": ?>未支付<?php break;?>
                                    <?php case "1": ?>待发货<?php break;?>
                                    <?php case "2": ?>已发货<?php break;?>
                                    <?php case "3": ?>交易完成<?php break;?>
                                    <?php default: ?>已关闭<?php endswitch;?>
                            </td>
                            <td class=" "><?php echo date('Y-m-d H:i:s',$vo['otime']);?></td>
                            <td class=" ">
                                <a class="btn btn-small" href="<?php echo U('Admin/Order/edit',array('id'=>$vo['oid']));?>"><i class="icon-pencil"></i></a>
                            </td>
                        </tr><?php endforeach; endif; ?>

                    </tbody>
                </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">显示<?php if($start < $count ): echo ($start); else: echo ($count); endif; ?>到<?php if($end < $count ): echo ($end); else: echo ($count); endif; ?>条    共有<?php echo ($count); ?>条</div>
                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                    <div id="show">
                        <?php echo ($show); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
    td,th{text-align:center;}
    #show a{ 
            background-color: #444444;
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
    #show span{
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