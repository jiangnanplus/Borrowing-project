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


	<title>提问列表</title>
	<style type="text/css">
        #pages a{ background-color: #444444;
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
        #pages span{
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
        	<span><i class="icon-table"></i> 提问列表</span>
        </div>
        <div class="mws-panel-body no-padding">
        <form action="<?php echo U('Admin/Ask/index');?>" method="get">
            <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
            	<div id="DataTables_Table_1_length" class="dataTables_length">
            		<label>每页 <select name="num" size="1" aria-controls="DataTables_Table_1">
	            			<option value="5" <?php if(($num) == "5"): ?>selected="selected"<?php endif; ?>>5</option>
	            			<option value="10" <?php if(($num) == "10"): ?>selected="selected"<?php endif; ?>>10</option>
	            			<option value="15" <?php if(($num) == "15"): ?>selected="selected"<?php endif; ?>>15</option>
	            			<option value="20" <?php if(($num) == "20"): ?>selected="selected"<?php endif; ?>>20</option>
            			</select> 条数据
            		</label>
            		<script type="text/javascript">
            			$('select[name=num]').change(function(){
            				$('form').submit();
            			});
            		</script>
            	</div>
            	<div class="dataTables_filter" id="DataTables_Table_1_filter">
            		<label>搜索: 
            			<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="<?php echo ($keywords); ?>">
            			<span class="btn-group">
                            <button class="btn" type="submit"><i class="icon-search"></i></button>
                        </span>
                    </label>
            	</div>
            	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
	                <thead>
	                    <tr role="row">
	                    	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 167px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID
	                    	</th>
	                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 199px;" aria-label="Browser: activate to sort column ascending">商品
	                    	</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Platform(s): activate to sort column ascending">提问用户
                            </th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Platform(s): activate to sort column ascending">提问时间
                            </th>
	                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Platform(s): activate to sort column ascending">提问内容
	                    	</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 184px;" aria-label="Platform(s): activate to sort column ascending">处理进度
                            </th>
	                    	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 106px;" aria-label="CSS grade: activate to sort column ascending">操作
	                    	</th>
	                    </tr>
	                </thead>
                
		            <tbody role="alert" aria-live="polite" aria-relevant="all"  style="text-align:center;width:100%">
		            	<?php if(is_array($infos)): foreach($infos as $key=>$vo): ?><tr class="odd">
		                        <td class="  sorting_1"><?php echo ($vo['askid']); ?></td>
		                        <td style="text-align:left"><span style="text-decoration:none;color:red;text-align:center" href=""><img style="width:30px;height:25px;margin:10px" src="/322_thinkphp_xiaomi/Public/Upload/Goods/<?php echo ($vo['zhupic']); ?>"><br><?php echo ($vo['title']); ?></span></td>
                                <td class=" "><?php echo ($vo['mssid']); ?></td>
                                <td class=" "><?php echo date('Y-m-d H:i:s',$vo['atime']);?></td>
		                        <td style="text-align:left"><?php echo ($vo['a_content']); ?></td>
                                
                                <?php if($vo['isok'] == 0): ?><td>待审核</td>
                                <?php else: ?>
                                    <td>已完成<br><?php echo date('Y-m-d H:i:s',$vo['rtime']);?></td><?php endif; ?>
		                        <td class=" ">
                                    <span class="btn-group">
                                        <?php if($vo['isok'] == 0): ?><a class="btn btn-small" href="<?php echo U('Admin/Ask/deal',array('askid'=>$vo['askid']));?>">审核</a>
                                        <?php else: ?>
                                            <a class="btn btn-small" href="<?php echo U('Admin/Ask/deal',array('askid'=>$vo['askid']));?>">查看</a><?php endif; ?>
                                        <a class="btn btn-small condelete" href="<?php echo U('Admin/Ask/delete',array('askid'=>$vo['askid']));?>"><i class="icon-trash"></i></a>
                                    </span>
                                </td>
		                    </tr><?php endforeach; endif; ?>
		            </tbody>
           	    </table>
	            <div class="dataTables_info" id="DataTables_Table_1_info">显示 <?php echo ($start); ?> 到 <?php echo ($end); ?> &nbsp;&nbsp;总共<?php echo ($count); ?>条数据</div>
	            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
	            	<div id="pages">
	            		<?php echo ($page); ?>
	            	</div>
	            </div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
        $('.condelete').click(function(){
           if(confirm('确定要删除吗?')){
                return true;
           }else{
                return false;
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


</body>
</html>