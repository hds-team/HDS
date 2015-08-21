<?php
	$pic = '';
	$header = 'รายละเอียดการประชุม';
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
		<span class="emt_bold"><?php echo $num_th($mt_name) . " ( แก้ไข)";?></span><br/>
		<span class="emt_bold"><?php echo $num_th($mt_detail);?></span>
	</p>
	<hr />
	
	<p style="text-align:left;">
		<span class="emt-bottom-tab"><?php re_viewAgdtA($rs_agdt, 0);?></span>
	</p>
	
</div>
	
<p>&nbsp;</p>

<?php
function re_viewAgdtA($child,$no=0){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "สิ่งที่ต้องแก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	$margin = "";

	$i = 0;
	foreach($child->result() as $row_child){
	
		echo "<div id=".$row_child->agdt_id.">";
		
		echo "<span style=\"font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
		$i = $i + 1;
		if($row_child->agdt_level == 0){
			echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
			$no_send = $i;
			$margin = "margin-left:0px;";
		} else {
			$margin1 = 30;
			for ($j1 = 1; $j1 <= $row_child->agdt_level; $j1++) {
				$margin1 = $margin1 + 30;
			}
			echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;";
			$no_send = $no . "." . $i;
		}
		
		echo "<b>".$row_child->agdt_head."</b></div>";
		
		$margin2 = 45;
		for ($j2 = 1; $j2 <= $row_child->agdt_level; $j2++) {
			$margin2 = $margin2 + 45;
		}
		if($row_child->agdt_detail != "")
		{
			$p = array("<p>", "</p>");
			echo "<div style=\"margin-left:".$margin2."px;\">".str_replace($p,"",$row_child->agdt_detail)."</div>";
			$num1 = 0;
		}
		else
		{
			$num1 = 1;
		}
		
		//	เสนอโดย
		if($row_child->agdt_by != "")
		{
			echo "<br/><div style=\"margin-left:".$margin2."px;\">".$row_child->agdt_by."</div><br/>";
		}
		
		if($row_child->agdt_present != "")
		{
			echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';margin-top:0px;".$margin."\">";
			echo "<tr>";
			echo "<td valign=\"top\" width=\"100\"><b><u>".$str_present."</u></b></td>";
			$p = array("<p>", "</p>");
			echo "<td>".str_replace($p,"",$row_child->agdt_present)."</td>";
			echo "</tr>";
			echo "</table>";
			$num2 = 0;
		}
		else
		{
			$num2 = 1;
		}
		
		if($row_child->agdt_result != "")
		{
			echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';margin-top:0px;".$margin."\">";
			echo "<tr>";
			echo "<td valign=\"top\" width=\"100\"><b><u>".$str_result."</u></b></td>";
			$p = array("<p>", "</p>");
			echo "<td>".str_replace($p,"",$row_child->agdt_result)."</td>";
			echo "</tr>";
			echo "<tr><td>&nbsp;</td></tr>";
			echo "</table>";
			$num3 = 0;
		}
		else
		{
			$num3 = 1;
		}
		
		$sum = $num1 + $num2 + $num3;
		if($sum == 3)
		{
			//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
		}

		echo "</span>";

		if($row_child->child->num_rows()>0){
			re_viewAgdtA($row_child->child,$no_send);
		}
		
		echo "</div>";
	
	}
}
?>