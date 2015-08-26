<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="images/touch-icon-iphone.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch-icon-ipad.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch-icon-retina.png">

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen">
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen">
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.theme.css" media="screen">
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.css" media="screen">
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen">

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen">

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="js/jquery.fileinput.js"></script>
<!-- Placeholder Plugin -->
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<!-- Mousewheel Plugin -->
<script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
<!-- Scrollbar Plugin -->
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<!-- Tooltips Plugin -->
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="plugins/tipsy/tipsy.css">

<!-- DataTables Plugin -->
<script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="js/demo/demo.tables.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

</head>

<body>
<div id="da-content-area">
	<div class="grid_4">
    	<div class="da-panel collapsible">
        	<div class="da-panel-header">
            	<span class="da-panel-title">
                    <img src="images/icons/black/16/list.png" alt="">
						กำลังดำเนินการ
                </span>
            <span class="da-panel-toggler"></span></div>
            <div class="da-panel-content">
                <div id="da-ex-datatable-numberpaging_wrapper" class="dataTables_wrapper" role="grid">
					<div id="da-ex-datatable-numberpaging_length" class="dataTables_length"></div>
					<div class="dataTables_filter" id="da-ex-datatable-numberpaging_filter"></div>
					<table id="da-ex-datatable-numberpaging" class="da-table dataTable" aria-describedby="da-ex-datatable-numberpaging_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:5%;"><center><b>ลำดับ</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 234px;"><center><b>หัวเรื่อง</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 214px;"><center><b>วันที่</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ประเภท</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 104px;"><center><b>หมวด</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ผู้ส่ง</b></center></th>
								<th class="sorting" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 134px;"><center><b>ดำเนินการ</b></center></th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<tr class="odd">
								<td><center>1</center></td>
								<td>Test</td>
								<td>26/08/2558</td>
								<td>ข้อผิดพลาด</td>
								<td>หมวด ก</td>
								<td>นาย ก</td>
								<td><center>
									<input type="button" class="da-button blue small" style="width:80%" value="ส่งตรวจ" />
								</center></td>
							</tr>
						</tbody>
					</table>
				</div><!-- dataTables_wrapper -->
			</div><!-- da-panel-content -->
        </div><!-- da-panel collapsible -->
    </div><!-- grid_4 -->
</div><!-- da-content-area -->
</body>	
</html>