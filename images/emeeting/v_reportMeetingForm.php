<?php	
	// Load model
	$arr_model = isset($arr_model) ? $arr_model : "";
	// To get participant
	$mpnt = ( !empty($arr_model["mpnt"]) ) ? $arr_model["mpnt"] : "";
	
	$pic = '';
	$header = 'รายงานการประชุม';
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
	<hr />
	<p style="text-align:left;">
		<span class="emt_bold">รายนามผู้มาประชุม</span><br/>
		<span>
			<table style="width:95%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';margin-left:30px;">
				<tbody>
					<?php
						if(isset($rs_act) && $rs_act->num_rows() > 0){
							$line = 0;
							foreach($rs_act->result() as $key_act => $row_act){
								if($row_act->act_flag_absent == 0 && $row_act->pnt_quorum == 1){
									$pnt_id = $name = $adminId = $adminName = $ag_name = $pnt_parent_typeAgenda = $pnt_parent_adminId = "";
									$pnt_flag_charge = $pnt_flag_instead = 0;
									
									$arr_ps = get_arrPnt(null, $row_act->act_pnt_id, $arr_model, $cond="", $flag_edit=0);
									if(!empty($arr_ps)){
										foreach($arr_ps as $key => $value){
											$pnt_id = $value["pnt_id"];
											$name = $value["pnt_name"];
											$adminId = $value["pnt_adminId"];
											$adminName = $value["pnt_adminName"];
											$ag_name = $value["pnt_ag_name"];
											$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
											$pnt_parent_adminId = $value["pnt_parent_adminId"];
											$pnt_flag_charge = $value["pnt_flag_charge"];
											$pnt_flag_instead = $value["pnt_flag_instead"];
										}
									}
									
									$line++;
									
									$rowPnt = "<tr>";
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"left\" valign=\"top\">" . al_to_th($line) . "</td>";
									if($pnt_parent_typeAgenda == 0){
										// โดยชื่อ
										$rowPnt .= "<td style=\"padding-left:10px;\" >";
										$rowPnt .= $name;
										if(($pnt_parent_adminId || $pnt_flag_charge || $pnt_flag_instead) && $adminName != ""){
											$rowPnt .= " (".$adminName.")";
										}
										$rowPnt .= "</td>";
									}
									else{
										// โดยตำแหน่ง
										$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
										$rowPnt .= "</td>";
									}
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"right\" style=\"padding-right:10px;\" valign=\"top\" >{$ag_name}</td>";
									$rowPnt .= "</tr>";
									echo $rowPnt;
								}
							}
						}
					?>
				</tbody>
			</table>
		</span>
		<br/>
		<span class="emt_bold">รายนามผู้ไม่มาประชุม</span><br/>
		<span>
			<table style="width:95%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';margin-left:30px;">
				<tbody>
					<?php
						if(isset($rs_act) && $rs_act->num_rows() > 0){
							$line = 0;
							foreach($rs_act->result() as $key_act => $row_act){
								if($row_act->act_flag_absent == 1 && $row_act->pnt_quorum == 1){
									$pnt_id = $name = $adminId = $adminName = $ag_name = $pnt_parent_typeAgenda = $pnt_parent_adminId = "";
									$pnt_flag_charge = $pnt_flag_instead = 0;
									
									$arr_ps = get_arrPnt(null, $row_act->act_pnt_id, $arr_model, $cond="", $flag_edit=0);
									if(!empty($arr_ps)){
										foreach($arr_ps as $key => $value){
											$pnt_id = $value["pnt_id"];
											$name = $value["pnt_name"];
											$adminId = $value["pnt_adminId"];
											$adminName = $value["pnt_adminName"];
											$ag_name = $value["pnt_ag_name"];
											$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
											$pnt_parent_adminId = $value["pnt_parent_adminId"];
											$pnt_flag_charge = $value["pnt_flag_charge"];
											$pnt_flag_instead = $value["pnt_flag_instead"];
										}
									}
									
									$line++;
									
									$rowPnt = "<tr>";
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"left\" valign=\"top\">" . al_to_th($line) . "</td>";
									
									$rowPnt .= "<td style=\"padding-left:10px;\" >";
									if($pnt_parent_typeAgenda == 0){
										// โดยชื่อ
										$rowPnt .= $name;
										if(($pnt_parent_adminId || $pnt_flag_charge || $pnt_flag_instead) && $adminName != ""){
											$rowPnt .= " (".$adminName.")";
										}
									}
									else{
										// โดยตำแหน่ง
										$rowPnt .= $adminName." (".$name.")";
									}
									$rowPnt .= "<br/>หมายเหตุ: ".$row_act->act_note_absent;
									$rowPnt .= "</td>";
									
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"right\" style=\"padding-right:10px;\" valign=\"top\" >{$ag_name}</td>";
									$rowPnt .= "</tr>";
									echo $rowPnt;
								}
							}
						}
					?>
				</tbody>
			</table>
		</span>
		<br/>
		<span class="emt_bold">รายนามผู้ร่วมประชุม</span><br/>
		<span>
			<table style="width:95%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';margin-left:30px;">
				<tbody>
					<?php
						if(isset($rs_act) && $rs_act->num_rows() > 0){
							$line = 0;
							foreach($rs_act->result() as $key_act => $row_act){
								if($row_act->pnt_quorum == 0){
									$pnt_id = $name = $adminId = $adminName = $ag_name = $pnt_parent_typeAgenda = $pnt_parent_adminId = "";
									$pnt_flag_charge = $pnt_flag_instead = 0;
									
									$arr_ps = get_arrPnt(null, $row_act->act_pnt_id, $arr_model, $cond="", $flag_edit=0);
									if(!empty($arr_ps)){
										foreach($arr_ps as $key => $value){
											$pnt_id = $value["pnt_id"];
											$name = $value["pnt_name"];
											$adminId = $value["pnt_adminId"];
											$adminName = $value["pnt_adminName"];
											$ag_name = $value["pnt_ag_name"];
											$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
											$pnt_parent_adminId = $value["pnt_parent_adminId"];
											$pnt_flag_charge = $value["pnt_flag_charge"];
											$pnt_flag_instead = $value["pnt_flag_instead"];
										}
									}
									
									$line++;
									
									$rowPnt = "<tr>";
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"left\" valign=\"top\">" . al_to_th($line) . "</td>";
									if($pnt_parent_typeAgenda == 0){
										// โดยชื่อ
										$rowPnt .= "<td style=\"padding-left:10px;\" >";
										$rowPnt .= $name;
										if(($pnt_parent_adminId || $pnt_flag_charge || $pnt_flag_instead) && $adminName != ""){
											$rowPnt .= " (".$adminName.")";
										}
										$rowPnt .= "</td>";
									}
									else{
										// โดยตำแหน่ง
										$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
										$rowPnt .= "</td>";
									}
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"right\" style=\"padding-right:10px;\" valign=\"top\" >{$ag_name}</td>";
									$rowPnt .= "</tr>";
									echo $rowPnt;
								}
							}
						}
					?>
				</tbody>
			</table>
		</span>
		<br/>
		<span class="emt_bold">เริ่มประชุม</span>&nbsp;&nbsp;เวลา&nbsp;&nbsp;<?php echo $num_th($mt_start_time); ?>&nbsp;&nbsp;น.<br/>
	</p>
	<p>
		<span class="emt-tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<span class="emt-bottom-tab">เมื่อถึงกำหนดเวลาในการประชุม และกรรมการมาครบองค์ประชุมแล้ว ประธานกรรมการฯ กล่าวเปิดการประชุม และเสนอให้ที่ประชุมพิจารณาเรื่องต่าง ๆ ตามระเบียบวาระการประชุม ดังนี้</span>
	</p>
	<p style="text-align:left;">
		<span class="emt-bottom-tab"><?php re_viewAgdtA($rs_agdt, 0);?></span>
	</p>
	<p>
		<br/><br/>
		<span class="emt_bold" style="font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';">ปิดประชุม&nbsp;&nbsp;เวลา&nbsp;&nbsp;<?php echo $num_th($mt_end_time); ?>&nbsp;&nbsp;น.</span><br/>
	</p>
	<p>
		<br/><br/>
		<table style="width:100%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';" align="center">
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td align="center">(<?php echo $lastPaticipant1; ?>)</td>
					<td align="center">(<?php echo $lastPaticipant2; ?>)</td>
					<td align="center">(<?php echo $lastPaticipant3; ?>)</td>
					<td align="center">(<?php echo $lastPaticipant4; ?>)</td>
				</tr>
				<tr>
					<td align="center" nowrap="nowrap">ผู้พิมพ์รายงานการประชุม</td>
					<td align="center" nowrap="nowrap">ผู้จดรายงานการประชุม</td>
					<td align="center" nowrap="nowrap">ผู้จดรายงานการประชุม</td>
					<td align="center" nowrap="nowrap">ผู้ตรวจรายงานการประชุม</td>
				</tr>
			</tbody>
		</table>
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
			echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
			echo "<tr>";
			echo "<td valign=\"top\" width=\"90\"><b><u>".$str_present."</u></b></td>";
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
			echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
			echo "<tr>";
			echo "<td valign=\"top\" width=\"90\"><b><u>".$str_result."</u></b></td>";
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