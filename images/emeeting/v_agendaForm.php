<?php
	$pic = '';
	$header = 'วาระการประชุม';
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
	<div align="center">...............................</div>
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
	
	$i = 0;
	foreach($child->result() as $row_child){
	
		echo "<div id=".$row_child->agdt_id.">";
		
		echo "<span style=\"font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
		$i = $i + 1;
		if($row_child->agdt_level == 0){
			echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
			$no_send = $i;
		} else {
			$margin1 = 30;
			for ($j1 = 1; $j1 <= $row_child->agdt_level; $j1++) {
				$margin1 = $margin1 + 30;
			}
			echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;";
			$no_send = $no . "." . $i;
		}
		
		echo "<b>".$row_child->agdt_head."</b></div>";
		
		echo "</span>";
		
		if($row_child->child->num_rows() > 0){
			re_viewAgdtA($row_child->child,$no_send);
		}

		echo "</div>";
	}
}
?>