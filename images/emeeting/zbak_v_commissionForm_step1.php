<!-- emeetingForm -->
<?php
$edit = isset($edit);
$row = isset($rs_cms)?$rs_cms->row():null;

?>
<script>

$(document).ready(function(){
	// Init
	
	// Set date
	$("#sstart_date").val(sstart_date());
	<?php
	$cms_unstart_date = emt_getval("cms_unstart_date", $row);
	if(( ! $edit ) OR ($cms_unstart_date)){
	?>
	// Set unstart
	row = $("#cms_unstart_date").parents("tr:first");
	row.find(":input").attr("disabled","disabled").end().find("a").hide();
	$("#cms_unstart_date").attr("checked","checked").removeAttr("disabled");
	<?php
	}
	$cms_unend_date = emt_getval("cms_unend_date", $row);
	if(( ! $edit ) OR ($cms_unend_date)){
	?>
	// Set unend
	row = $("#cms_unend_date").parents("tr:first");
	row.find(":input").attr("disabled","disabled").end().find("a").hide();
	$("#cms_unend_date").attr("checked","checked").removeAttr("disabled");
	<?php
	}
	?>
	// Set option repeat
	//repeat_opt();
	
	
	// Add Event
	$(".chk_hide").click(chk_hide);
	$("#chk_repeat").click(chkStateRepeat);
	$(":input[name^='cms_start_date']").change(cms_start_date);
	$("#repeat_opt").change(repeat_opt);
	$("#back").click(back);
});

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
function chkStateRepeat(e){
	var e = e||window.event;
	var target = e.target || e.srcElement;
	if($(target).attr("checked") == true)
		$("#repeat-box").show();
	else
		$("#repeat-box").hide();
}
function sstart_date(){
	if($(":hidden[name='cms_start_date']").length > 0)
		return $(":hidden[name='cms_start_date']").val();
	else
		return $(":hidden[name='mt_date_start']").val();
}
function repeat_opt(){
	var choice = parseInt($("#repeat_opt").val());
	var text = "";
	switch(choice)
	{
		case 1:$("#repeat-box-range").show();
				$("#repeat-unit").text(" วัน ");
				$("#repeat-box-day").hide();
				$("#repeat-box-num").hide();
			break;
		case 2:$("#repeat-box-range").hide();
				$("#repeat-box-day").hide();
				$("#repeat-box-num").hide();
			break;
		case 3:$("#repeat-box-range").hide();
				$("#repeat-box-day").hide();
				$("#repeat-box-num").hide();
			break;
		case 4:$("#repeat-box-range").hide();
				$("#repeat-box-day").hide();
				$("#repeat-box-num").hide();
			break;
		case 5:$("#repeat-box-range").show();
			$("#repeat-unit").text(" สัปดาห์ ");
			$("#repeat-box-day").show();
			$("#repeat-box-num").hide();
			break;
		case 6:$("#repeat-box-range").show();
			$("#repeat-unit").text(" เดือน ");
			$("#repeat-box-day").hide();
			$("#repeat-box-num").show();
			break;
		case 7:$("#repeat-box-range").show();
			$("#repeat-unit").text(" ปี ");
			$("#repeat-box-day").hide();
			$("#repeat-box-num").show();
			break;
	}
}
function cms_start_date(){
	$("#sstart_date").val($(":hidden[name='cms_start_date']").val());
}
function back(){
	url = site_url+"emeeting/commissionView";
	sendPost("frm", {cms_id:<?php echo $row->cms_id; ?>}, url, "", "")
}
</script>
<style>
	.icon{
		cursor : pointer;
	}
</style>
<div id="content">
	<div id="content-header">
		<div id="guide">
			<?php
			if(isset($menu)){
				echo guide($menu,1);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png",
					"width" => "24"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	</div>

	<div id="content-body">
		<?php
		
		// Create Form
		if( ! $edit){
			echo "<h3>สร้างต้นแบบการประชุม</h3>";
			$action = "emeeting/commissionAdd";
		} else {
			echo "<h3>รายละเอียดต้นแบบการประชุม</h3>";
			$action = "emeeting/commissionEdit";
		}

		echo form_open($this->config->item("emt_path").$action,"frmCms");
		?>
		<table style="width:95%;" align="center">
			<tbody>
				<tr>
					<td width="120"><label>ชื่อการประชุม : </label></td>
					<td>
						<input class="validate" title="ชื่อการประชุม" type="text" name="cms_name" id="cms_name" value="<?php echo emt_getval("cms_name", $row);?>" size="60" />
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
						?>
								<option value="<?php echo $dp->deptId;?>"><?php echo $dp->deptName;?></option>
						<?php
								}
							}
						?>
						</select>
						<?php
						if($edit){
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
					<td>
						<label>รูปแบบการประชุม : </label>
					</td>
					<td>
						<?php
						$cms_type = emt_getval("cms_type", $row);
						$checked = "";
						if(( ! $edit) OR ($cms_type==2)){
							$checked = "checked=\"checked\"";
						}
						?>
						<label class="font-normal">
							<input type="radio" name="cms_type" id="cms_type2" value="2" <?php echo $checked; ?> />
							การประชุมไม่ส่วนตัว
						</label>
						<?php
						$checked = "";
						if($cms_type==1){
							$checked = "checked=\"checked\"";
						}
						?>
						<label class="font-normal">
							<input type="radio" name="cms_type" id="cms_type1" value="1" <?php echo $checked; ?> />
							การประชุมส่วนตัว
						</label>
					</td>
				</tr>
				<tr>
					<td><label>ประจำปี : </label></td>
					<td>
						<?php
						if($edit){
							$cms_year = emt_getval("cms_year", $row);
						} else {
							$cms_year = (date("Y")+543);
						}
						$cms_year_type = emt_getval("cms_year_type", $row);
						$checked = "";
						if(( ! $edit) OR ($cms_year_type==1)){
							$checked = "checked=\"checked\"";
						}
						?>
						<input class="validate" title="ประจำปี" type="text" name="cms_year" id="cms_year" value="<?php echo $cms_year; ?>" maxlength="4" size="3" />
						<span class="red">*</span>
						<label class="font-normal">
							<input type="radio" name="cms_year_type" id="cms_year_type1" value="1" <?php echo $checked; ?>/>
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
							<input type="radio" name="cms_year_type" id="cms_year_type2" value="2" <?php echo $checked; ?>/>
							ตามปีงบประมาณ
						</label>
					</td>
				</tr>
				<tr>
					<td><label>จากวันที่ : </label></td>
					<td>
						<table>
							<tbody>
								<tr>
									<?php
									$cms_start_date = emt_dateForm(emt_getval("cms_start_date", $row),"/");
									if(!$cms_start_date) {
										$cms_start_date = date("d/m/Y");
									}
									?>
									<td><script type="text/javascript">DateInput("cms_start_date", true, "DD/MM/YYYY","<?php echo $cms_start_date;?>");</script></td>
									<td><label class="font-normal"><input type="checkbox" class="chk_hide" name="cms_unstart_date" id="cms_unstart_date" value="1" />&nbsp;&nbsp;ไม่ระบุ</label></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td><label>ถึงวันที่ : </label></td>
					<td>
						<table>
							<tbody>
								<tr>
									<?php
									$cms_end_date = emt_dateForm(emt_getval("cms_end_date", $row),"/");
									if(!$cms_end_date)
										$cms_end_date = date("d/m/Y");
									?>
									<td><script type="text/javascript">DateInput("cms_end_date", true, "DD/MM/YYYY","<?php echo $cms_end_date;?>");</script></td>
									<td><label class="font-normal"><input type="checkbox" class="chk_hide" name="cms_unend_date" id="cms_unend_date" value="1" <?php echo set_checkbox("cms_unend_date",2);?> />&nbsp;&nbsp;ไม่ระบุ</label></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<!--
				<tr>
					<td colspan="2" >
						<label class="font-normal">
							<input type="checkbox" name="chk_repeat" id="chk_repeat" value="1" />
							เกิดซ้ำ...
						</label>
					</td>
				</tr>				
				<tr id="repeat-box" style="display:none;">
					<td colspan="2">
						<div >
							<table>
								<tbody>
									<tr>
										<td><label>เกิดซ้ำ : </label></td>
										<td>
											<select name="repeat_opt" id="repeat_opt">
										<?php
											$repeat_opt = array(1=>'รายวัน',2=>'ทุกวันธรรมดา (จันทร์ - ศุกร์)',3=>'ทุกวัน จันทร์ พุธ และศุกร์',4=>'ทุกวันอังคาร และ พฤหัสบดี',5=>'รายสัปดาห์',6=>'รายเดือน',7=>'รายปี');
											foreach($repeat_opt as $key=>$txt)
											{
										?>
												<option value="<?php echo $key;?>" <?php echo set_select('repeat_opt',$key);?>><?php echo $txt;?></option>
										<?php
											}
										?>
											</select>
										</td>
									</tr>
									<tr id="repeat-box-range">
										<td><label>ซ้ำทุก : </label></td>
										<td>
											<select name="repeat_range" id="repeat_range">
											<?php
												for($i=1;$i < 31;$i++)
												{
											?>
												<option value="<?php echo $i;?>" <?php echo set_select('repeat_range',$i);?>>&nbsp;<?php echo $i;?>&nbsp;</option>
											<?php
												}
											?>
											</select>
											<span id="repeat-unit"></span>
										</td>
									</tr>
									<tr id="repeat-box-day">
										<td><label>ซ้ำใน : </label></td>
										<td>
										<?php
											foreach($this->config->item('emt_abbr_day') as $key => $val)
											{
										?>
											<label class="font-normal"><input type="checkbox" name="repeat_day[]" id="repeat_day<?php echo $key;?>" value="<?php echo $key;?>" <?php echo set_checkbox('repeat_day[]',$key);?>/> <?php echo $val;?> </label>
										<?php
											}
										?>
										</td>
									</tr>
									<tr id="repeat-box-num">
										<td><label>จำนวน : </label></td>
										<td><input type="text" name="repeat_num_day" id="repeat_num_day" size="3" maxlength="3" value="<?php echo set_value('repeat_num_day','1');?>"/><span>&nbsp;&nbsp;วัน</span></td>
									</tr>
									<tr id="repeat-box-start">
										<td><label>เริ่มต้น : </label></td>
										<td><input type="text" name="sstart_date" id="sstart_date" readonly="readonly" <?php echo set_value('sstart_date');?>/></td>
									</tr>
									<tr id="repeat-box-end">
										<td style="vertical-align:text-top;"><label>สิ้นสุด : </label></td>
										<td>
											<ul>
												<li><input type="radio" class="chk_end" name="chk_end" id="chk_end2" value="2" checked="checked" <?php echo set_radio('chk_end',2,TRUE);?>/>&nbsp;หลังจาก
													<input type="text" name="chk_end_time" id="chk_end_time" size="3" maxlength="3" value="<?php echo set_value('chk_end_time','1');?>"/>ครั้ง
												</li>
												<li><input type="radio" class="chk_end" name="chk_end" id="chk_end3" value="3"  <?php echo set_radio('chk_end',3);?>/>&nbsp;ในวันที่
												<?php
													if(set_value('chk_end_date'))
														$chk_end_date = set_value('chk_end_date');
													else
														$chk_end_date = date('d/m/Y');
												?>
													<script language="javascript">DateInput('chk_end_date', true, 'DD/MM/YYYY','<?php echo $chk_end_date;?>');</script>
												</li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</td>
				</tr>
				-->
				<tr>
					<td colspan="2" align="center">
						<label>
							<input type="hidden" name="step" value="1" />
							<?php
							if( ! $edit){
								echo "<input type=\"submit\" name=\"submit\" value=\"ถัดไป  >\" />";
							} else {
								$cms_id = emt_getval("cms_id", $row);
								echo "<input type=\"hidden\" name=\"cms_id\" value=\"{$cms_id}\" />";
								echo "<input type=\"submit\" name=\"submit\" value=\"ตกลง\" />";
							}
							?>
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