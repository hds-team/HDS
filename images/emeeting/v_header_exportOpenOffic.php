<?php 
	header("Content-Type: application/vnd.oasis.opendocument.text");
	header('Content-disposition: inline; filename="'.$export_name.'.odt"');
	echo doctype('xhtml4-trans'); 
	//$word_xmlns = "xmlns:o='urn:schemas-microsoft-com:office:office' xmlns='http://www.w3.org/TR/REC-html40'";
	$word_xmlns = "xmlns:office='urn:oasis:names:tc:opendocument:xmlns:office:1.0'  xmlns:text='urn:oasis:names:tc:opendocument:xmlns:text:1.0' xmlns='http://www.w3.org/TR/REC-html40'";
	
	$word_xml_settings = "<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml>";
	// setting view
	$word_landscape_style = " div.Section1{page:Section1;}";
?>
<html <?php echo $word_xmlns;?>>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
		<?php echo $word_xml_settings;?>
		<title><?php echo $this->config->item('title_name') ?></title>
		<?php 	echo link_tag('css/emt_css/emt_css_print.css');?>
		<style type="text/css">
			<?php echo $word_landscape_style;?>
		</style>
	</head>
	<body>
		<div class="Section1">