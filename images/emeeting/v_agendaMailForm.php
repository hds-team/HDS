<html>
<head>
<title><?=$this->config->item('title_name') ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php echo link_tag('css/emt_css/emt_css_print.css');?>
</head>
<body>
<?php
	$pic = '';
	$header = 'ระเบียบวาระ';
	$div = 'ส่วนราชการ';
	$no = 'ที่';
	$date = 'วันที่';
	$subject = 'เรื่อง';
	$to = 'เรียน';
	$num_th = $this->config->item('emt_cv_th');
	$complimentary_close = "ขอแสดงความนับถือ";
?>
<style type="text/css">
	.emt-tab{padding-right:15px;}
	.emt-bottom-tab{padding-bottom:10px;}
	.emt-paragraph{padding-left:50px;}
</style>

<div style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
	<p style="text-align:center;">
		<span class="emt_bold"><?php echo $num_th($header);?></span><br/>
		<span class="emt_bold"><?php echo $num_th($mt_name);?></span><br/>
		<span class="emt_bold"><?php echo $num_th($mt_detail);?></span>
	</p>
	<div style="text-align:left;">
		<span class="emt-bottom-tab"><?php re_viewAgdtA($rs_agdt, 0);?></span>
	</div>
</div>
	
<p>&nbsp;</p>

<?php
function re_viewAgdtA($child,$no=0){
	$str_agd = "วาระที่ ";
	//$str_detail = "รายละเอียด";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$sum = 0;
	
	//echo "<div>";
		
		$i = 0;
		foreach($child->result() as $row_child){
		
		echo "<div id=".$row_child->agdt_id.">";
			
			echo "<span class=\"string\">";
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else if($row_child->agdt_level <= 1){
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			
			if($row_child->agdt_level <= 1){
				echo "<b>".$row_child->agdt_head."</b><br/>";
			}
			
			if($row_child->agdt_level == 0 && $row_child->child->num_rows() == 0){
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-";
			}
			
			echo "</span>";
			
			if($row_child->child->num_rows() > 0){
				re_viewAgdtA($row_child->child,$no_send);
			}
			
			//echo "<br/>";
		echo "</div>";
		
		}
	//echo "</div>";
}
?>
</body>
</html>