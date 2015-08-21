<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />
<!-- tab -->
<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>
<!-- tab -->

<script type="text/javascript">
  if (document.location.hash == "" || document.location.hash == "#")
    document.location.hash = "#tabs-6";
</script>
<style>
	.sortable{
		margin : 0px;
		padding : 0px;
		
	}
	.sortable li{
		line-height : 20px;
		list-style: none;
		margin : 0px;
		padding : 0px;
		padding-left : 20px;
		border : 1px solid #FFFFFF;
	}
	li .sortable{
		padding-left : 35px;
	}
	.string {
		display : block;
		width : 90%;
	}
</style>
<?php
$row = isset($rs_cms)?$rs_cms->row():null;
$num_th = $this->config->item('emt_cv_th');
?>
		<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
			<div id="guide_ie">
				<?php
				if(isset($menu)){
					//echo guide($menu,5);
				} 
				?>
			</div>
		<?php } else { ?>
			<div id="guide">
				<?php
				if(isset($menu)){
					//echo guide($menu,5);
				}
				?>
			</div>
		<?php } ?>
		
	<div class="grid_4_center">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">กำหนดสร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#">กำหนดอีเมล์</a></li>
					<li><a href="#">กำหนดระเบียบวาระ</a></li>
					<li><a href="#tabs-6">ยืนยัน</a></li>
				</ul>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-6">
		<div class="da-panel">
            <div class="da-panel-header">
                <span class="da-panel-title">
					<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/text_document.png";?> />
					เสร็จสิ้น
				</span>
			</div>
	<div class="da-panel-content">
		<?php 
		// Create Form
		$action = "emeeting/commissionAdd";
		echo form_open($this->config->item("emt_path").$action,"frmCms");
		?>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="2"><b>รายละเอียดการประชุม</b>
					</td>
				</tr>
				<tr>
					<td width="200"><label>ชื่อการประชุม : </label></td>
					<td>
						<?php echo emt_getval("cms_name", $row);?>
					</td>
				</tr>
				<tr>
					<td><label>หน่วยงาน : </label></td>
					<td>
						<?php echo emt_getval("dpName", $row);?>
					</td>
				</tr>
				<tr>
					<td>
						<label>รูปแบบการประชุม : </label>
					</td>
					<td>
						<?php
						if(emt_getval("cms_type", $row)){
							$str = "การประชุมส่วนตัว ";
						} else {
							$str = "การประชุมไม่ส่วนตัว ";
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>ประจำปี : </label></td>
					<td>
						<?php
						if(emt_getval("cms_year_type", $row) == 1){
							$str = "ตามปีปฎิทิน";
						} else {
							$str = "ตามปีงบประมาณ";
						}
						echo $str . " " . $num_th(emt_getval("cms_year", $row));
						?>
					</td>
				</tr>
				<tr>
					<td><label>จากวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("cms_unstart_date", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("cms_start_date", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>ถึงวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("cms_unend_date", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("cms_end_date", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<?php
				$cms_placeName = emt_getval("cms_placeName", $row);
				$cms_placeDetail = emt_getval("cms_placeDetail", $row);
				if($cms_placeName!="" OR $cms_placeDetail!=""){
				?>
				<tr>
					<td><label>สถานที่ประชุม : </label></td>
					<td>
						<?php
						$cms_placeDetail = ($cms_placeDetail != '') ? "ห้องประชุม ".$cms_placeDetail : '';
						echo $num_th($cms_placeName . " " . $cms_placeDetail);
						?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
		
		<?php	
			// Load model
			$arr_model = isset($arr_model) ? $arr_model : "";
			
			if(isset($rs_ptp) && $rs_ptp->num_rows > 0){
				$arr_ps = get_ptpByTypeAg($rs_ptp, $arr_model, $flag_edit=0);
			}
			else{
				$arr_ps = array();
			}
		?>
		
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="4"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
					</td>
				</tr>
				<?php
					if(!empty($arr_ps)){
						$i = 0;
						foreach($arr_ps as $key => $value){
							$ptp_id = $value["ptp_id"];
							$name = $value["name"];
							$ptp_adminId = $value["ptp_adminId"];
							$adminName = $value["adminName"];
							$ag_name = $value["ag_name"];
							$ag_manage = $value["ag_manage"];
							$ptp_email = $value["ptp_email"];	// array of email
							$ptp_typeAgenda = $value["ptp_typeAgenda"];
							
							if($ag_manage == 0){
								continue;
							}
							$i++;
							
							$rowPtp = "<tr>";
							$rowPtp .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							if($ptp_typeAgenda == 0){
								// โดยชื่อ
								$rowPtp .= "<td style=\"padding-left:10px;\" >";
								$rowPtp .= $name;
								if($ptp_adminId != 0 && $adminName != ""){
									$rowPtp .= " (".$adminName.")";
								}
								$rowPtp .= "</td>";
							}
							// email
							if(!empty($ptp_email)){
								$rowPtp .= "<td width=\"80\" align=\"right\" > ".$ptp_email;
								$rowPtp .= "</td>";
							}
							else if(empty($ptp_email)){
								$rowPtp .= "<td width=\"80\" align=\"right\" >ไม่ระบุอีเมล์  ";
								$rowPtp .= "</td>";
							}
							else{
								// โดยตำแหน่ง
								$rowPtp .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPtp .= "</td>";
							}
							$rowPtp .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPtp .= "</tr>";
							echo $rowPtp;
						}
					}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="4"><b>บุคลากรในการประชุม</b>
					</td>
				</tr>
				<?php
					if(!empty($arr_ps)){
						$i = 0;
						foreach($arr_ps as $key => $value){
							$ptp_id = $value["ptp_id"];
							$name = $value["name"];
							$ptp_adminId = $value["ptp_adminId"];
							$adminName = $value["adminName"];
							$ag_name = $value["ag_name"];
							$ptp_email = $value["ptp_email"];	// array of email
							$ptp_typeAgenda = $value["ptp_typeAgenda"];
							$i++;
							
							$rowPtp = "<tr>";
							$rowPtp .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							if($ptp_typeAgenda == 0){
								// โดยชื่อ
								$rowPtp .= "<td style=\"padding-left:10px;\" >";
								$rowPtp .= $name;
								if($ptp_adminId != 0 && $adminName != ""){
									$rowPtp .= " (".$adminName.")";
								}
								$rowPtp .= "</td>";
							}
							// email
							if(!empty($ptp_email)){
								$rowPtp .= "<td width=\"80\" align=\"right\" > ".$ptp_email;
								$rowPtp .= "</td>";
							}
							else if(empty($ptp_email)){
								$rowPtp .= "<td width=\"80\" align=\"right\" >ไม่ระบุอีเมล์  ";
								$rowPtp .= "</td>";
							}	
							else{
								// โดยตำแหน่ง
								$rowPtp .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPtp .= "</td>";
							}
							$rowPtp .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPtp .= "</tr>";
							echo $rowPtp;
						}
					}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>ระเบียบวาระในการประชุม</b>
					</td>
				</tr>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
							re_viewAgtp($rs_agtp);
							?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		</br>
		<div align="center">
			<input type="hidden" name="step" value="6" />
			<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
			<input class="da-button green" type="submit" name="submit" value="ยืนยัน" />
		</div>
		</br>
		<?php
		// Close Form
		echo form_close();
		?>
	</div>
</div>
</div>
<?php
function re_viewAgtp($child,$no=0){
	$str_agd = "วาระที่ ";
	$no_send = "";
	?>
	<ul class="sortable">
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->agtp_id; ?>">
			<?php
			echo "<span class=\"string\">";
			$i = $i + 1;
			if($row_child->agtp_level == 0){
				echo $str_agd . al_to_th($i) . "&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				echo al_to_th($no) . "." . al_to_th($i) . "&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			echo $row_child->agtp_head . "</span>";
			//$getAdd = $row_child->agtp_id . "/" . ($row_child->agtp_level+1) . "/" .$row_child->agtp_cms_id;
			//$getEdit = $row_child->agtp_id . "/" . $row_child->agtp_level . "/" .$row_child->agtp_cms_id;
			if($row_child->child->num_rows()>0){
				re_viewAgtp($row_child->child,$no_send);
			}
			?>
		</li>
		<?php
		}
		?>
	</ul>
<?php
}
?>
	</div>
	</div>
	<div><span style="padding-right:130px;">&nbsp;</span> </div>