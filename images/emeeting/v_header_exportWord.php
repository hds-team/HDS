<?php 
	header("Content-Type: application/msword");
	header('Content-disposition: inline; filename="'.$export_name.'.doc"');
	echo doctype('xhtml4-trans'); 
	$word_xmlns = "xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'";
	$word_xml_settings = "<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml>";
	// setting view
	$word_landscape_style = " div.Section1{page:Section1;}";
?>
<html <?php echo $word_xmlns;?>>
	<head>
		<?php echo $word_xml_settings;?>
		<title><?php echo $this->config->item('title_name') ?></title>
		<?php 	echo link_tag('css/emt_css/emt_css_print.css');?>
		<style type="text/css">
			<?php 
				if(isset($page_setup) && $page_setup == "landscape"){
					// Set orientation = "Landscape" ( default: "Portrait" )
					echo "@page {size:792.0pt 612.0pt;mso-page-orientation:landscape;margin:1.0in 1.0in 1.0in 1.0in;mso-header-margin:.5in;mso-footer-margin:.5in;mso-paper-source:0;}";
				}
				echo $word_landscape_style;
			?>
		</style>
	</head>
	<body>
		<div class="Section1">