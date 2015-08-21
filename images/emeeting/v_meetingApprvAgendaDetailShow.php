<html>
<head>
	<title>รายงานสรุปการรับรองมติ</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php echo link_tag('css/emt_css/emt_css.css'); ?>
	<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/emt_js.js"></script>
</head>
<body>

<div id="content">
	<div id="content-header">
		<h3><?php echo "วาระที่&nbsp;".al_to_th($agdt_no)."&nbsp;".al_to_th($agdt_head); ?></h3>
	</div>
	<div id="content-body">
		<div style="margin-left:20px;margin-top:10px;margin-bottom:10px;" ><?php echo $appv_name; ?></div>
		<table style="margin-left:20px;" class="emt_table" width="90%">
			<thead>
				<tr>
					<th nowrap="nowrap" >ลำดับที่</th>
					<th nowrap="nowrap">บุคลากรในการประชุม</th>
					<?php
						if($flag_note == 'Y'){
							echo "<th width=\"60%\" >รายละเอียด</th>";
						}
					?>
				</tr>
			</thead>
			<tbody>
			<?php
				// Load model
				$arr_model = isset($arr_model) ? $arr_model : "";
	
				if(isset($rs_agap) && $rs_agap->num_rows() > 0){
					$line = 0;
					foreach($rs_agap->result() as $row){
						// init
						$pnt_id = $name = $pnt_parent_adminId = $adminName = "";
						$pnt_parent_typeAgenda = 0;
						
						$arr_ps = get_arrPnt(null, $row->pnt_id, $arr_model, $cond="", $flag_edit=0);
						if(!empty($arr_ps)){
							foreach($arr_ps as $key => $value){
								$pnt_id = $value["pnt_id"];
								$pnt_parent_id = $value["pnt_parent_id"];
								$pnt_parent_adminId = $value["pnt_parent_adminId"];
								$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
								$name = $value["pnt_name"];
								$adminName = $value["pnt_adminName"];
							}
						}
						
						// print
						$line++;
						
						$rowPnt = "<tr class=\"{$pnt_id}\" >";
						$rowPnt .= "<td nowrap=\"nowrap\" align=\"center\" valign=\"top\">" . al_to_th($line) . "</td>";
						if($pnt_parent_typeAgenda == 0){
							// โดยชื่อ
							$rowPnt .= "<td style=\"padding-left:10px;\" valign=\"top\" nowrap=\"nowrap\" >";
							$rowPnt .= $name;
							if($pnt_parent_adminId != 0 && $adminName != ""){
								if($flag_note == 'Y'){
									$rowPnt .= "<br />(".$adminName.")";
								}
								else{
									$rowPnt .= " (".$adminName.")";
								}
							}
							$rowPnt .= "</td>";
						}
						else{
							// โดยตำแหน่ง
							if($flag_note == 'Y'){
								$rowPnt .= "<td style=\"padding-left:10px;\" valign=\"top\" nowrap=\"nowrap\" >".$adminName."<br />(".$name.")";
							}
							else{
								$rowPnt .= "<td style=\"padding-left:10px;\" valign=\"top\" nowrap=\"nowrap\" >".$adminName." (".$name.")";
							}
							$rowPnt .= "</td>";
						}
						// note
						if($flag_note == 'Y'){
							$rowPnt .= "<td>{$row->agap_note}</td>";
						}
						$rowPnt .= "</tr>";
						echo $rowPnt;
					}
				}
				else{
					if($flag_note == 'Y'){
						echo "<tr><td colspan=\"3\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td></tr>";
					}
					else{
						echo "<tr><td colspan=\"2\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td></tr>";
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>

</body>
</html>