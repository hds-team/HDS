<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="jui/css/jquery.ui.all.css" media="screen" />

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
<link rel="stylesheet" href="plugins/tipsy/tipsy.css" />

<!-- PrettyCheckboxes Plugin -->
<script type="text/javascript" src="plugins/prettycheckboxes/js/prettyCheckboxes.js"></script>
<link rel="stylesheet" href="plugins/prettycheckboxes/css/style.css" media="screen" />

<!-- Spinner Plugin -->
<script type="text/javascript" src="jui/js/jquery.ui.spinner.min.js"></script>

<!-- Chosen Plugin -->
<script type="text/javascript" src="plugins/chosen/chosen.jquery.js"></script>
<link rel="stylesheet" href="plugins/chosen/chosen.css" media="screen" />

<!-- Picklist Plugin -->
<script type="text/javascript" src="js/core/plugins/picklist/jquery.picklist.min.js"></script>
<link rel="stylesheet" href="js/core/plugins/picklist/jquery.picklist.css" media="screen" />

<!-- Colorpicker Plugin -->
<script type="text/javascript" src="plugins/colorpicker/colorpicker.js"></script>
<link rel="stylesheet" href="plugins/colorpicker/colorpicker.css" media="screen" />

<!-- elRTE Plugin -->
<script type="text/javascript" src="plugins/elrte/js/elrte.full.js"></script>
<link rel="stylesheet" href="plugins/elrte/css/elrte.css" media="screen" />

<!-- elFinder Plugin -->
<script type="text/javascript" src="plugins/elfinder/js/elfinder.min.js"></script>
<link rel="stylesheet" href="plugins/elfinder/css/elfinder.css" media="screen" />

<!-- iButton Plugin -->
<script type="text/javascript" src="plugins/ibutton/lib/jquery.ibutton.min.js"></script>
<link rel="stylesheet" href="plugins/ibutton/css/jquery.ibutton-giva-original.css" media="screen" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="js/demo/demo.form.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="js/core/dandelion.customizer.js"></script>

<title>Dandelion Admin - Form Elements</title>

</head>
<body>

	<div id="da-content-wrap" class="clearfix">  
		<!-- Content Area -->
		<div id="da-content-area">
	    	<div class="grid_4">
	        	<div class="da-panel">
	            	<div class="da-panel-header">
	                	<span class="da-panel-title">
	                        เพิ่มประเภท
	                    </span>
	                </div>
	                <div class="da-panel-content">
	                	<form class="da-form">
	                    	<div class="da-form-row">
	                        	<label>ประเภท</label>
	                            <div class="da-form-item large">
	                            	<input type="text" />
	                            </div>
	                          </div>
	                        <div class="da-button-row">
	                        	<input type="submit" value="Submit" class="da-button green" />
	                        </div>
	                    </div>
	                </div><!--class="da-panel-->
	            </div><!--class="grid_4"-->
	        </div><!-- da-content-area -->
	    </div><!--id="da-content-wrap" class="clearfix"-->
	                

		<!-- Content Area -->
			<div id="da-content-area">
		    
		    	<div class="grid_4">
		        	<div class="da-panel collapsible">
		            	<div class="da-panel-header">
		                	<span class="da-panel-title">
		                        
		                    </span>
		                    
		                </div>
		                <div class="da-panel-content">
		                    <table class="da-table">
		                        <thead>
		                            <tr>
		                            	<th width="10%"><center>ลำดับ</center></th>
		                                <th><center>ประเภท</center></th>
		                                <th width="20%"><center>สถานะ</center></th>
		                                <th width="20%"><center>ดำเนินการ</center></th>
		                                </tr>
		                          </thead>
		                        <tbody>
		                            <tr>
		                            	<td><center>1</center></td>
		                                <td><center>ปัญหา</center></td>
		                                <td><center>
		                            		<input type="checkbox" id="s11" class="i-button" name="ios-checkbox" />
		                            	</center>
		                                </td>
		                                <td><center>
		                                	<div class="grid_2">
		                                		<input type="submit" value="แก้ไข" class="da-button blue" style="width:60%" />
		                                	</div>
		                                	<div class="grid_2">
		                                		<input type="submit" value="ยกเลิก" class="da-button red" style="width:60%" />
		                                	</div>
		                                </center>
		                                </td>
		                                   </tr>
		                        </tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
      </body>
</html>
