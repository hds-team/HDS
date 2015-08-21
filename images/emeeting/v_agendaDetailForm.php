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

<div>
	<p style="text-align:center;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
		<span class="emt_bold"><?php echo $num_th($header);?></span><br/>
		<span class="emt_bold"><?php echo $num_th($mt_name);?></span><br/>
		<span class="emt_bold"><?php echo $num_th($mt_detail);?></span>
	</p>
	<hr />
	<p style="text-align:left;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
		<span class="emt_bold">เริ่มประชุม</span>&nbsp;&nbsp;เวลา&nbsp;&nbsp;.............................&nbsp;&nbsp;น.<br/>
	</p>
	<p style="text-align:left;">
		<span class="emt-bottom-tab"><?php re_viewAgdtA($rs_agdt, 0);?></span>
	</p>
	<p style="text-align:left;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">
		<span class="emt_bold">ปิดประชุม</span>&nbsp;&nbsp;เวลา&nbsp;&nbsp;.............................&nbsp;&nbsp;น.<br/>
	</p>
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
			echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;";
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
		
		$margin2 = 45;
		for ($j2 = 1; $j2 <= $row_child->agdt_level; $j2++) {
			$margin2 = $margin2 + 45;
		}
		if($row_child->agdt_detail != "")
		{
			$p = array("<p>", "</p>");
			echo "<div style=\"margin-left:".$margin2."px;\">".str_replace($p,"",$row_child->agdt_detail)."</div><br/>";
			$num1 = 0;
		}
		else
		{
			$num1 = 1;
		}
		
		//	เสนอโดย
		if($row_child->agdt_by != "")
		{
			echo "<div style=\"margin-left:".$margin2."px;\">".$row_child->agdt_by."</div><br/>";
		}
		
		if($row_child->agdt_present != "")
		{
			echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
			echo "<tr>";
			echo "<td valign=\"top\" width=\"90\"><b><u>".$str_present."</u></b></td>";
			$p = array("<p>", "</p>");
			echo "<td>".str_replace($p,"",$row_child->agdt_present)."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><b><u>".$str_result."</u></b></td>";
			echo "</tr>";
			echo "</table>";
			for($x=1; $x<=5; $x++)
			{
				echo "<br />";
			}
			$num2 = 0;
		}
		else
		{
			$num2 = 1;
		}
		
		$sum = $num1 + $num2;
		if($sum == 2)
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