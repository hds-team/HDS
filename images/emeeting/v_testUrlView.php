<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>รายละอียดการประชุม</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <?php echo link_tag('css/emt_css/emt_css.css');?>
</head>

<body>
<?php
	//$url = site_url() . "emeeting/searchMeeting/showMeetingDetail";
	
	// Create Form
	//echo form_open($this->config->item('emt_folder').$url_post, "frmPost");		
		
	//echo "<input type=\"hidden\" name=\"cms_id\" value=\"{$encode_cms_id}\" />";
	//echo "<input type=\"hidden\" name=\"mt_id\" value=\"{$encode_mt_id}\" />";
	
	//$send =  $encode_cms_id."/".$encode_mt_id;
	//$url = site_url() . "emeeting/searchMeeting/showMeetingDetail/" . $cms_id . "/" . $mt_id;
	//$url = site_url().$this->config->item('emt_folder')."searchMeeting/showMeetingDetail/{$send}";
	
	echo "ท่านสามารถดูรายละเอียดของการประชุมได้ที่นี่<a href=\"{$url_post}\" style=\"text-decoration:none;\" > คลิก </a>";
	
	// Close Form
	//echo form_close();
?>
</body>
</html>