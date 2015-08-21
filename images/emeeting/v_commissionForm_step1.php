<!-- emeetingForm -->
<?php
$status = isset($status);
$row = isset($rs_cms)?$rs_cms->row():null;

?>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />

<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>

<script>

$(document).ready(function(){
	// Init
	<?php
	$cms_unstart_date = emt_getval("cms_unstart_date", $row);
	if(( $status != "edit" ) OR ($cms_unstart_date)){
	?>
	// Set unstart
	row = $("#cms_unstart_date").parents("tr:first");
	row.find(":input").attr("disabled","disabled").end().find("a").hide();
	$("#cms_unstart_date").attr("checked","checked").removeAttr("disabled");
	<?php
	}
	$cms_unend_date = emt_getval("cms_unend_date", $row);
	if(( ( $status != "edit" ) ) OR ($cms_unend_date)){
	?>
	// Set unend
	row = $("#cms_unend_date").parents("tr:first");
	row.find(":input").attr("disabled","disabled").end().find("a").hide();
	$("#cms_unend_date").attr("checked","checked").removeAttr("disabled");
	<?php
	}
	?>

	
	
	// Add Event
	$(".chk_hide").click(chk_hide);
	$("#back").click(back);
	
	
	// Function
	function chk_hide()
	{
		var flag = $(this).attr("checked");
		var row = $(this).parents("tr:first");
		if(flag)
			row.find(":input").attr("disabled","disabled").end().find("a").hide();
		else
			row.find(":input").removeAttr("disabled").end().find("a").show();
		$(this).removeAttr("disabled");
		return;
	}
	function back(){
		url = site_url+"emeeting/commissionView";
		sendPost("frm", {cms_id:<?php echo (isset($row->cms_id)) ? $row->cms_id : 0; ?>}, url, "", "")
	}
   
});

</script>
<style>
	.icon{
		cursor : pointer;
	}
</style>
	
	<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
		<div id="guide_ie">
			<?php
			if(isset($menu)){
				//echo guide($menu,2);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } else { ?>
		<div id="guide">
			<?php
			if(isset($menu)){
				//echo guide($menu,2);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } ?>
	
		<div class="grid_4_center">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#tabs-1">1. กำหนดสร้างการประชุม</a></li>
					<li><a href="#">2. กำหนดบุคลากร</a></li>
					<li><a href="#">3. กำหนดผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#">4. กำหนดอีเมล์</a></li>
					<li><a href="#">5. กำหนดระเบียบวาระ</a></li>
					<li><a href="#">6. ยืนยัน</a></li>
				</ul>
				<div id="tabs-1">
		<div class="da-panel">
            <div class="da-panel-header">
                <span class="da-panel-title">
					<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/clipboard_1.png";?> />
    
		<?php
		
		// Create Form
		if( $status != "edit" ){
			echo "กำหนดสร้างต้นแบบการประชุม";
			$action = "emeeting/commissionAdd";
		} else {
			echo "รายละเอียดต้นแบบการประชุม";
			$action = "emeeting/commissionEdit";
		}

		echo form_open($this->config->item("emt_path").$action,"frmCms");
		?>
		</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<tbody>
				<tr>
					<td width="130"><label>ชื่อการประชุม: </label></td>
					<td>
						<input class="validate" title="ชื่อการประชุม" 
						type="text" name="cms_name" id="cms_name" 
						value="<?php echo emt_getval("cms_name", $row);?>" size="60" />
						<span class="red">*</span>
					</td>
				</tr>
				<tr>
					<td><label>หน่วยงาน : </label></td>
					<td>
						<select name="dp_id" id="dp_id" >
						<?php
							if(isset($rs_dp))
							{
								foreach($rs_dp->result() as $dp)
								{
									/*if($dp->deptId == $row->cms_dp_id){
										$selected = "selected=\"selected\" ";
									}*/
									?>
										<option value="<?php echo $dp->dpId;?>"><?php echo $dp->dpName;?></option>
									<?php
								}
							}
						?>
						</select>
						<?php
						if($status == "edit"){
						?>
						<script>
							$("select[name=dp_id] option[value=<?php echo emt_getval("cms_dp_id", $row);?>]").attr("selected","selected")
						</script>
						<?php
						}
						?>
					</td>
				</tr>
				<tr>
					<?php 
					if($status != "edit"){
					?>
					<td><label>เลขที่หนังสือ : </label></td>
					<td><input type="text" name="cms_setST" value="123.2" size="10" /> *ตัวอย่าง สธ. 123.2</td>
					<?php
						}
					?>
						<?php
						if($status == "edit"){
						?>
					<td><label>เลขที่หนังสือ : </label></td>
					<td><input type="text" name="cms_setST" value="<?php echo emt_getval("cms_setST", $row);?>" size="10" /> *ตัวอย่าง สธ. 123.2</td>
					<?php
						}
					?>
				</tr>
				<!--<tr>
					<td>
						<label>รูปแบบการประชุม : </label>
					</td>
					<td>
						<?php/*
						$cms_type = emt_getval("cms_type", $row);
						$checked = "";
						if(( $status != "edit" ) OR ($cms_type==2)){
							$checked = "checked=\"checked\"";
						}*/
						?>
						<label class="font-normal">
							<input type="radio" name="cms_type" id="cms_type2" value="2" <?php echo $checked; ?> />
							การประชุมไม่ส่วนตัว
						</label>
						<?php/*
						$checked = "";
						if($cms_type==1){
							$checked = "checked=\"checked\"";
						}*/
						?>
						<label class="font-normal">
							<input type="radio" name="cms_type" id="cms_type1" value="1" <?php echo $checked; ?> />
							การประชุมส่วนตัว
						</label>
					</td>
				</tr>-->
				<tr>
					<td><label>ประจำปี : </label></td>
					<td>
						<?php
						if($status == "edit"){
							$cms_year = emt_getval("cms_year", $row);
						} else {
							$cms_year = (date("Y")+543);
						}
						$cms_year_type = emt_getval("cms_year_type", $row);
						$checked = "";
						if(( $status != "edit" ) OR ($cms_year_type==1)){
							$checked = "checked=\"checked\"";
						}
						?>
						<input class="validate" title="ประจำปี" type="text" 
						maxlength="4" size="3" name="cms_year" 
						id="cms_year" value="<?php echo $cms_year; ?>" 
						 />
						<span class="red">*</span>
						<label class="font-normal">
							<input type="radio" name="cms_year_type" id="cms_year_type1" 
							value="1" <?php echo $checked; ?>/>
							ตามปีปฎิทิน
						</label>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<?php
						$checked = "";
						if($cms_year_type==2){
							$checked = "checked=\"checked\"";
						}
						?>
						<label class="font-normal">
							<input type="radio" name="cms_year_type" id="cms_year_type2" 
							value="2" <?php echo $checked; ?>/>
							ตามปีงบประมาณ
						</label>
					</td>
				</tr>
				<tr>
					<td><label>จากวันที่ : </label></td>
					<td>
						<table>
							<tr>
								<td>
									<label class="font-normal">
										<input type="checkbox" class="chk_hide" name="cms_unstart_date" 
										id="cms_unstart_date" value="1" />&nbsp;&nbsp;ไม่ระบุ
									</label>
								</td>
								<td>
									<?php
									$cms_start_date = getNowDateBuddishTH();
									if(isset($row)){
									if( isset($cms_start_date) <> ''){  
												$cms_start_date = set_value($cms_start_date);
									}
									else if ( !is_null($row) && $row->cms_start_date <> '0000-00-00') {
												$cms_start_date = splitDateDb2($row->cms_start_date, "/");
											}
										}
									//print_r($cms_start_date);DIE;
									//$cms_start_date = emt_dateForm(emt_getval("cms_start_date", $row, "0000-00-00"),"/");
									//if(!$cms_start_date == "0000-00-00") {
									//	$cms_start_date = date("d/m/Y");
								//	}
									?>
								<input type="text" name ="cms_start_date" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $cms_start_date; ?>'readonly />
									<!--script type="text/javascript">
									DateInput("cms_start_date", true, "DD/MM/YYYY","<?php echo $cms_start_date;?>");
									</script -->
								</td>
								
							</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td><label>ถึงวันที่ : </label></td>
					<td>
						<table>
							<tr>
								<td>
									<label class="font-normal"><input type="checkbox" 
									class="chk_hide" name="cms_unend_date" id="cms_unend_date" 
									value="1" <?php echo set_checkbox("cms_unend_date",2);?> 
									/>&nbsp;&nbsp;ไม่ระบุ</label>
								</td>
								<td>
									<?php
									$cms_end_date = getNowDateBuddishTH();
									if(isset($row)){
									if( isset($cms_end_date) <> ''){  
												$cms_end_date = set_value($cms_end_date);
									}
									else if ( !is_null($row) && $row->cms_end_date <> '0000-00-00') {
												$cms_end_date = splitDateDb2($row->cms_end_date, "/");
											}
										}
									//$cms_end_date = emt_dateForm(emt_getval("cms_end_date", $row, "0000-00-00"),"/");
									//if(!$cms_end_date == "0000-00-00") {
									//	$cms_end_date = date("d/m/Y");
								//	}
									?>
								<input type="text" name ="cms_end_date" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $cms_end_date; ?>'readonly />
									<!--script type="text/javascript">
									DateInput("cms_end_date", true, "DD/MM/YYYY","<?php echo $cms_end_date;?>");
									</script -->
								</td>
								
							</tr>
					</table>
					</td>
				</tr>
				<tr>
					<td>
						<label>สถานที่ประชุม : </label>
					</td>
					<td>
						<input type="text" name="cms_placeName" 
						value="<?php echo emt_getval("cms_placeName", $row);?>" />
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
						<label>ห้องประชุม : </label>
						<input type="text" name="cms_placeDetail"  
						value="<?php echo emt_getval("cms_placeDetail", $row);?>" />
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"   >
						<label>
						<div align="right" >	
							<input type="hidden" align = "right" name="step" value="1" />
							<?php
							if( $status != "edit" ){
								echo "<input class=\"da-button blue\"  type=\"submit\" name=\"submit\" value=\"ถัดไป  >\" />";
							} else {
								$cms_id = emt_getval("cms_id", $row);
								echo "<input type=\"hidden\" name=\"cms_id\" value=\"{$cms_id}\" />";
								echo "<input class=\"da-button green\" type=\"submit\" name=\"submit\" value=\"ตกลง\" />";
							}
							?>
						</div>
						</label>
					</td>
				</tr>
			</tbody>
		</table>
		<?php
		// Close Form
		echo form_close();
		?>
				</div>
			</div>
		</div>
	</div>
</div>
<div><span style="padding-right:130px;">&nbsp;</span> </div>