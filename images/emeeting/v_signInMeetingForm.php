<?php
	$signIn_type = (isset($signIn_type)) ? $signIn_type : 1;
?>
<div style="text-align:center;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif'">
	<p>
		<span align="center"><img src="<?php echo base_url().$this->config->item('emt_form_logo');?>" width="60" height="60" class="noborder"/></span><br/>
		<?php 
		if($signIn_type == 1){
			?>
			<span style="font-size:18.0pt;">หลักฐานการจ่ายค่าเบี้ยประชุมและค่าใช้จ่ายในการเดินทาง</span><br/>
			<?php
		}
		else{
			?>
			<span style="font-size:18.0pt;">ใบเซ็นชื่อ</span><br/>
			<?php
		}
		?>
		<span><?php echo $mt_name;?></span><br/>
		<span><?php echo $mt_detail;?></span>
	</p>
	<?php
		// Load model
		$arr_model = isset($arr_model) ? $arr_model : "";
		
		$arr_pnt = isset($arr_pnt) ? $arr_pnt : "";
		if($signIn_type == 1){
			echo print_type1($arr_pnt, $arr_model, $row);
		}
		else{
			echo print_type2($arr_pnt, $arr_model, $row);
		}
	?>
	
</div>

<?php
function print_type1($arr_pnt="", $arr_model="", $row=0){
	$t_col = 9;	// columns all
	
	$row_sgIn = "<table class=\"tbPrint\" style=\"width:100%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif'\" >";
		$row_sgIn .= "<thead>";
			$row_sgIn .= "<tr style=\"padding-top:5px;padding-buttom:5px;\" >";
				$row_sgIn .= "<th rowspan=\"2\">ลำดับที่</th>";
				$row_sgIn .= "<th rowspan=\"2\">ชื่อ-นามสกุล</th>";
				$row_sgIn .= "<th rowspan=\"2\">ตำแหน่ง</th>";
				$row_sgIn .= "<th rowspan=\"2\">ค่าเบี้ยประชุม</th>";
				$row_sgIn .= "<th rowspan=\"2\">ค่าพาหนะ</th>";
				$row_sgIn .= "<th rowspan=\"2\">ค่าที่พัก</th>";
				$row_sgIn .= "<th rowspan=\"2\">รวมเงิน</th>";
				$row_sgIn .= "<th colspan=\"2\">ลายมือชื่อ</th>";
			$row_sgIn .= "</tr>";
			$row_sgIn .= "<tr style=\"padding-top:5px;padding-buttom:5px;\" >";
				$row_sgIn .= "<th>ผู้เข้าร่วมประชุม</th>";
				$row_sgIn .= "<th>ผู้รับเงิน</th>";
			$row_sgIn .= "</tr>";
		$row_sgIn .= "</thead>";
		$row_sgIn .= "<tbody>";
		
		if(!empty($arr_pnt)){
			$line = 0;
			foreach($arr_pnt as $key => $value){
				$pnt_id = $value["pnt_id"];
				$name = $value["pnt_name"];
				$ag_name = $value["pnt_ag_name"];
				
				$line++;
				
				$row_sgIn .= "<tr>";
				$row_sgIn .= "<td align=\"center\">" . al_to_th($line) . "</td>";
				$row_sgIn .= "<td>{$name}<input type=\"hidden\" name=\"name\" value=\"{$name}\" /></td>";
				$row_sgIn .= "<td>{$ag_name}</td>";
				// columns space
				for($i=0;$i<6;$i++){
					$row_sgIn .= "<td></td>";
				}
				$row_sgIn .= "</tr>";
			}
			
			// rows space
			for($i=0;$i<$row;$i++) 
			{
				$row_sgIn .= "<tr>";
					for($j=0;$j<$t_col;$j++){
						if($j == 0){
							$row_sgIn .= "<td align=\"center\"></td>";
						}
						else if($j == ($t_col - 1)){
							$row_sgIn .= "<td>&nbsp;</td>";
						}
						else{
							$row_sgIn .= "<td></td>";
						}
					}
				$row_sgIn .= "</tr>";
			}
		}
		else{
			$row_sgIn .= "<tr>";
			$row_sgIn .= "<td colspan=\"{$t_col}\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td>";
			$row_sgIn .= "</tr>";
		}	
		$row_sgIn .= "</tbody>";
	$row_sgIn .= "</table>";
	
	return $row_sgIn;
}

function print_type2($arr_pnt="", $arr_model="", $row=0){
	$t_col = 3;	// columns all
	
	$row_sgIn = "<table class=\"tbPrint\" style=\"width:100%;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif'\" >";
		$row_sgIn .= "<thead>";
			$row_sgIn .= "<tr style=\"padding-top:5px;padding-buttom:5px;\" >";
				$row_sgIn .= "<th>ลำดับที่</th>";
				$row_sgIn .= "<th>ชื่อ-นามสกุล</th>";
				$row_sgIn .= "<th>ลายมือชื่อ</th>";
			$row_sgIn .= "</tr>";
		$row_sgIn .= "</thead>";
		$row_sgIn .= "<tbody>";
		
		if(!empty($arr_pnt)){
			$line = 0;
			foreach($arr_pnt as $key => $value){
				$pnt_id = $value["pnt_id"];
				$name = $value["pnt_name"];
				
				$line++;
				
				$row_sgIn .= "<tr>";
				$row_sgIn .= "<td align=\"center\">" . al_to_th($line) . "</td>";
				$row_sgIn .= "<td>{$name}<input type=\"hidden\" name=\"name\" value=\"{$name}\" /></td>";
				$row_sgIn .= "<td></td>";
				$row_sgIn .= "</tr>";
			}
			
			// rows space
			for($i=0;$i<$row;$i++) 
			{
				$row_sgIn .= "<tr>";
					for($j=0;$j<$t_col;$j++){
						if($j == 0){
							$row_sgIn .= "<td align=\"center\"></td>";
						}
						else if($j == ($t_col - 1)){
							$row_sgIn .= "<td>&nbsp;</td>";
						}
						else{
							$row_sgIn .= "<td></td>";
						}
					}
				$row_sgIn .= "</tr>";
			}
		}
		else{
			$row_sgIn .= "<tr>";
			$row_sgIn .= "<td colspan=\"{$t_col}\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td>";
			$row_sgIn .= "</tr>";
		}	
		$row_sgIn .= "</tbody>";
	$row_sgIn .= "</table>";
	
	return $row_sgIn;
}
?>