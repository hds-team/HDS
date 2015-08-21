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
$row_cms = isset($rs_cms)?$rs_cms->row():null;
$row = isset($rs_mt)?$rs_mt->row():null;
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
		
		<div class="grid_4">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">กำหนดสร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#">กำหนดอีเมล์</a></li>
					<li><a href="#">กำหนดระเบียบวาระ</a></li>
					<li><a href="#tabs-6">ยืนยัน</a></li>
				</ul>
				<div id="tabs-1">
				</div>
				<div id="tabs-2">
				</div>
				<div id="tabs-3">
				</div>
				<div id="tabs-4">
				</div>
				<div id="tabs-5">
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
		$action = "emeeting/emeetingAdd";
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
						<?php echo emt_getval("cms_name", $row_cms);?>
					</td>
				</tr>
				<tr>
					<td><label>ครั้งที่ : </label></td>
					<td>
						<?php echo al_to_th(emt_getval("mt_no", $row));?> / <?php echo al_to_th(emt_getval("mt_year", $row));?>
					</td>
				</tr>
				<tr>
					<td>
						<label>รูปแบบการประชุม : </label>
					</td>
					<td>
						<?php
						if(emt_getval("cms_type", $row_cms) == 1){
							$str = "การประชุมส่วนตัว ";
						} else {
							$str = "การประชุมไม่ส่วนตัว ";
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>ประเภทการประชุม : </label>
					</td>
					<td>
						<?php echo emt_getval("mtt_name", $row);?>
					</td>
				</tr>
				<tr>
					<td><label>ประจำปี : </label></td>
					<td>
						<?php
						if(emt_getval("cms_year_type", $row_cms) == 1){
							$str = "ตามปีปฎิทิน";
						} else {
							$str = "ตามปีงบประมาณ";
						}
						echo $str . " " . al_to_th(emt_getval("cms_year", $row_cms));
						?>
					</td>
				</tr>
				<tr>
					<td><label>จากวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("mt_date_start", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("mt_date_start", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>ถึงวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("mt_date_stop", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("mt_date_stop", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>เวลา : </label></td>
					<td>
						<?php 
						$mt_start_time = emt_getval("mt_start_time", $row);
						$tmp = explode(":", $mt_start_time);
						$mt_start_time = $tmp[0] . "." . $tmp[1];
						$mt_end_time = emt_getval("mt_end_time", $row);
						$tmp = explode(":", $mt_end_time);
						$mt_end_time = $tmp[0] . "." . $tmp[1];
						echo $num_th($mt_start_time . " - " . $mt_end_time)."  น.";
						?>
					</td>
				</tr>
				<?php
				$mt_placeName = emt_getval("mt_placeName", $row);
				$mt_placeDetail = emt_getval("mt_placeDetail", $row);
				if($mt_placeName!="" OR $mt_placeDetail!=""){
				?>
				<tr>
					<td><label>สถานที่ประชุม : </label></td>
					<td>
						<?php
						$mt_placeDetail = ($mt_placeDetail != '') ? "ห้องประชุม ".$mt_placeDetail : '';
						echo $num_th($mt_placeName . " " . $mt_placeDetail);
						?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="4"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
					</td>
				</tr>
				<?php
					if(isset($arr_pnt) && !empty($arr_pnt)){
						$i = 0;
						foreach($arr_pnt as $key => $value){
							$pnt_id = $value["pnt_id"];
							$pnt_parent_id = $value["pnt_parent_id"];
							$pnt_parent_adminId = $value["pnt_parent_adminId"];
							$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
							$name = $value["pnt_name"];
							$adminName = $value["pnt_adminName"];
							$ag_name = $value["pnt_ag_name"];
							$pnt_email = $value["pnt_email"];	// array of email
							$ag_manage = $value["pnt_ag_manage"];
							
							
							if($ag_manage == 0){
								continue;
							}
							$i++;
							
							$rowPnt = "<tr>";
							$rowPnt .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							if($pnt_parent_typeAgenda == 0){
								// โดยชื่อ
								$rowPnt .= "<td style=\"padding-left:10px;\" >";
								$rowPnt .= $name;
								if($pnt_parent_adminId != 0 && $adminName != ""){
									$rowPnt .= " (".$adminName.")";
								}
								$rowPnt .= "</td>";
							}
							// email
							if(!empty($pnt_email)){
								$rowPnt .= "<td width=\"80\" align=\"right\" > ".$pnt_email[0];
								$rowPnt .= "</td>";
							}
							else if(empty($pnt_email)){
									$rowPnt .= "<td width=\"80\" align=\"right\" > ไม่ระบุอีเมล์ ";
								$rowPnt .= "</td>";
							}	
							
							// โดยตำแหน่ง
							else{
								$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPnt .= "</td>";
							}
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
					else{
						echo "<tr><td colspan='3' align='center'>" . $this->config->item("emt_not_found") . "</td></tr>";
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
					if(isset($arr_pnt) && !empty($arr_pnt)){
						$i = 0; 
						foreach($arr_pnt as $key => $value){
							$pnt_id = $value["pnt_id"];
							$pnt_parent_id = $value["pnt_parent_id"];
							$pnt_parent_adminId = $value["pnt_parent_adminId"];
							$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
							$name = $value["pnt_name"];
							$adminName = $value["pnt_adminName"];
							$pnt_email = $value["pnt_email"];	// array of email
							$ag_name = $value["pnt_ag_name"];
							$i++;
							
							$rowPnt = "<tr>";
							$rowPnt .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							
							if($pnt_parent_typeAgenda == 0 ){
								// โดยชื่อ
								$rowPnt .= "<td style=\"padding-left:10px;\" >";
								$rowPnt .= $name;
								
								if($pnt_parent_adminId != 0 && $adminName != ""){
									$rowPnt .= " (".$adminName.")";
									}
								$rowPnt .= "</td>";
									
							}
							// email
							if(!empty($pnt_email)){
								$rowPnt .= "<td width=\"80\" align=\"right\" > ".$pnt_email[0];
								$rowPnt .= "</td>";
							}
							else if(empty($pnt_email)){
									$rowPnt .= "<td width=\"80\" align=\"right\" > ไม่ระบุอีเมล์ ";
								$rowPnt .= "</td>";
							}	
													
							else{
								// โดยตำแหน่ง
								$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPnt .= "</td>";
							}
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
							
						}
					}
					else{
						echo "<tr><td colspan='3' align='center'>" . $this->config->item("emt_not_found") . "</td></tr>";
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
							re_viewAgdt($rs_agdt);
							?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		&nbsp;
		<div align="center"  STYLE="width:800;">
			<input type="hidden" name="step" value="6" />
			<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
			<input type="submit" name="submit" value="          ยืนยัน          " class="da-button green"/>
		</div>
		&nbsp;
		<?php
		// Close Form
		echo form_close();
		?>
	</div>
</div>
</div>
<?php
function re_viewAgdt($child,$no=0){
	$str_agd = "วาระที่ ";
	$no_send = "";
	?>
	<ul class="sortable">
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->agdt_id; ?>">
			<?php
			echo "<span class=\"string\">";
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo $str_agd . al_to_th($i) . "&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				echo al_to_th($no) . "." . al_to_th($i) . "&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			echo $row_child->agdt_head . "</span>";
			//$getAdd = $row_child->agtp_id . "/" . ($row_child->agtp_level+1) . "/" .$row_child->agtp_cms_id;
			//$getEdit = $row_child->agtp_id . "/" . $row_child->agtp_level . "/" .$row_child->agtp_cms_id;
			if($row_child->child->num_rows()>0){
				re_viewAgdt($row_child->child,$no_send);
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
