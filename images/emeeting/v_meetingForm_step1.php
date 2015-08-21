<?php
if((isset($rs_cms) && $rs_cms->num_rows()) || isset($rs_mt)){
	$row = (isset($rs_cms))?$rs_cms->row():$rs_mt->row();
	$status = isset($status)?$status:false;
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
		$mt_date_start = emt_dateForm(emt_getval("mt_date_start", $row),"/");
		$mt_date_stop = emt_dateForm(emt_getval("mt_date_stop", $row),"/");
		if( (($mt_date_stop == "00/00/0000") || 
		($mt_date_stop == $mt_date_start) || 
		($mt_date_stop == "") )){
			echo "$(\".dateStop\").hide();";
			echo $mt_date_start;
		} else {
			echo "$(\"#showDateStop\").attr(\"checked\",\"checked\");";
		}
		?>
		
		//egoist ---------------------------------
		// Add event
		$(".CL1").attr("disabled","disabled");
		$("#showDateStop").click(showDateStop);
		$(":input[name^='mt_date_start']").change(mt_date_start);
		$("#back").click(back);
		//egoist ---------------------------------		

		//function
		function showDateStop(){
			var n = $('#showDateStop').is(':checked');
			if(n==0){
				
				$(".dateStop").hide();
			} else {
			
				$(".dateStop").show();
			}
		}
		
		function mt_date_start(){
			var v = $(":hidden[name='mt_date_start']").val();
			$(":hidden[name='mt_date_stop']").val(v);
			var v2 = $(":hidden[name='mt_date_stop']").val();
			date = v2.split("/");
			$("#mt_date_stop_Day_ID").val(date[0]);
			$("#mt_date_stop_Month").val((parseInt(date[1])-1));
			$("#mt_date_stop_Year_ID").val((parseInt(date[2])+543));
		}
		
		function back(){
			url = site_url+"emeeting/emeetingView";
			sendPost("frm", {cms_id:<?php echo $row->cms_id; ?>,mt_id:<?php echo (isset($row->mt_id)) ? $row->mt_id : 0; ?>}, url, "", "")
		}
	//egoist ---------------------------------	
	// Init
	<?php
	$mt_no = emt_getval("mt_no", $row);
	
	if(( $status != "edit" ) OR ($mt_no)){
	?>
	// Set unstart
	row = $("#mt_no").parents("tr:first");
	row.find(":input").attr("disabled","disabled").end().find("a").hide();
	$("#mt_no").attr("checked","checked").removeAttr("disabled");
	<?php
	}
	?>
	// Add Event
	$("#sel1").click(chk_hide);
	// Function
	function chk_hide()
	{
		var flag = $("#sel1").attr("checked");
		
		if(flag){		
			$(".CL2").attr("disabled","disabled");
			$(".CL1").removeAttr("disabled");
			}
		else{
			$(".CL2").removeAttr("disabled");
			$(".CL1").attr("disabled","disabled");
			}
		return;
	}
	//egoist ---------------------------------	
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
				//echo guide($menu,1);
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
				//echo guide($menu,1);
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
			echo "กำหนดรายละเอียดการประชุม";
			$action = "emeeting/emeetingAdd";
		} else {
			echo "รายละเอียดการประชุม";
			$action = "emeeting/emeetingEdit";
		}

		echo form_open($this->config->item("emt_path").$action,"frmCms");
		?>
		</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<tbody>
			<tr>
				<td><label>ชื่อการประชุม : </label></td>
				<td>
					<?php echo emt_getval("cms_name", $row);?>
				</td>
			</tr>
			<tr>
				<td><label>ครั้งที่ : </label></td>
				<td>
					<input type="text" name="mt_no" class="CL2"
					value="<?php 
					/*$cms_num_meeting = getval("cms_num_meeting", $row);
					$cms_num_meeting = $cms_num_meeting + 1;
					echo $cms_num_meeting;*/
					if(isset($mtNo)){
						echo $mtNo;
						//echo "3";
					} else {
						//echo "4";
						echo $row->mt_no;
					}
					?>" size="2" />
					
					<input type="text" name="mt_year" class="CL2" value="<?php echo emt_getval("cms_year", $row);?>" size="5" />
					<!--egoist -->
					<label class="font-normal">
						<input type="checkbox" id="sel1" name="mt_nosp" 
						id="mt_no" value="พิเศษ" />&nbsp;&nbsp;พิเศษ	
					</label>
					<input type="text" name="mt_year"  class="CL1"  value="<?php echo emt_getval("cms_year", $row);?>" size="5" />
					<!--egoist -->
				</td>
			</tr>
			<tr>
				<td><label>เลข สธ. : </label></td>
				<?php
					if($status!="edit"){
						$mt_setST = emt_getval("cms_setST", $row);
					} else {
						$mt_setST = emt_getval("mt_setST", $row);
					}
					?>
				<td><input type="text" name="mt_setST" value="<?php echo $mt_setST;?>" size="10" />&nbsp;/</td>
			</tr>
			<tr>
				<td><label>ประเภทการประชุม : </label></td>
				<td>
					<select name="mt_mtt_id" >
						<?php
						foreach($rs_mtt->result() as $row_mtt){
							echo "<option value=\"{$row_mtt->mtt_id}\">{$row_mtt->mtt_name}</option>";
						}
						?>
					</select>
					<?php
					if($status == "edit"){
					?>
					<script>
						$("select[name=mt_mtt_id] option[value=<?php echo emt_getval("mt_mtt_id", $row);?>]").attr("selected","selected")
					</script>
					<?php
					}
					?>
				</td>
			</tr>
			<!--
			<tr>
				<td><label>หน่วยงาน : </label></td>
				<td><input type="text" name="mt_name" value="หน่วยงาน" readonly /></td>
			</tr>
			-->
			<tr>
			
					<!-- egoist -->
				<td><label>ประชุมวันที่ : </label></td>
				<td>
					<table>
						<tr>
							<td>
								<span><input type="checkbox" id="showDateStop" />หลายวัน</span>
							</td>
							<td>
								<?php
								$mt_date_start = getNowDateBuddishTH();
								if(isset($row)){
								if( isset($mt_date_start) <> ''){  
											$mt_date_start = set_value($mt_date_start);
								}
								else if ( !is_null($row) && $row->mt_date_start <> '0000-00-00') {
											$mt_date_start = splitDateDb2($row->mt_date_start, "/");
										}
									}
								//$mt_date_start = emt_dateForm(emt_getval("mt_date_start", $row, "0000-00-00"),"/");
								//if(!$mt_date_start == "0000-00-00") {
								//	$mt_date_start = date("d/m/Y");
							//	}
								?>
							<input type="text" name ="mt_date_start" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $mt_date_start; ?>'readonly />
								<!--script type="text/javascript">
								DateInput("mt_date_start", true, "DD/MM/YYYY","<?php echo $mt_date_start;?>");
								</script -->
							</td>
							
						</tr>
					</table>
				</td>
			</tr>
			
					<!-- egoist -->
			<tr class="dateStop">
				<td><label>ถึงวันที่ : </label></td>
				<td>
				<table>
						<tr>
							<td>
					<?php
					//$mt_date_stop = emt_dateForm(emt_getval("mt_date_stop", $row, "0000-00-00"),"/");
					//if(!$mt_date_stop == "0000-00-00") {
					//	$mt_date_stop = date("d/m/Y");
					//}
					
					$mt_date_stop  = getNowDateBuddishTH();
					if(isset($row)){
						if( isset($mt_date_stop ) <> ''){  
								$mt_date_stop  = set_value($mt_date_stop);
					}
					else if ( !is_null($row) && $row->mt_date_stop  <> '0000-00-00') {
						$mt_date_stop  = splitDateDb2($row->mt_date_stop , "/");
								}
					}
					?>
					<input type="text" name ="mt_date_stop" class="da-ex-datepicker-week" style='width:100px' value='<?php echo $mt_date_stop; ?>'readonly />
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><label>เวลาประชุม : </label></td>
				<td>
					<?php
					if($status!="edit"){
						$mt_start_time_h 	= "";
						$mt_start_time_m 	= "";
						$mt_end_time_h 		= "";
						$mt_end_time_m 		= "";
					} else {
						$mt_start_time 	= emt_getval("mt_start_time", $row);
						$tmp = explode(":", $mt_start_time);
						$mt_start_time_h 	= $tmp[0];
						$mt_start_time_m 	= $tmp[1];
						$mt_end_time 		= emt_getval("mt_end_time", $row);
						$tmp = explode(":", $mt_end_time);
						$mt_end_time_h 		= $tmp[0];
						$mt_end_time_m 		= $tmp[1];
					}
					?>
					<input type="text" name="mt_start_time_h" size="2" 
					value="<?php echo $mt_start_time_h;?>" /> :
					<input type="text" name="mt_start_time_m" size="2"
					value="<?php echo $mt_start_time_m;?>" /> น. 
					<label>ถึง : </label>
					<input type="text" name="mt_end_time_h" size="2" 
					value="<?php echo $mt_end_time_h;?>" /> :
					<input type="text" name="mt_end_time_m" size="2" 
					value="<?php echo $mt_end_time_m;?>" /> น. 
				</td>
			</tr>
			<tr>
				<td><label>สถานที่ประชุม : </label></td>	
				<td>
					<?php
					if($status!="edit"){
						$mt_placeName = emt_getval("cms_placeName", $row);
						$mt_placeDetail = emt_getval("cms_placeDetail", $row);
					} else {
						$mt_placeName = emt_getval("mt_placeName", $row);
						$mt_placeDetail = emt_getval("mt_placeDetail", $row);
					}
					?>
					<input type="text" name="mt_placeName" value="<?php echo $mt_placeName; ?>" />
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					<label>ห้องประชุม : </label>
					<input type="text" name="mt_placeDetail" value="<?php echo $mt_placeDetail; ?>" />
				</td>
			</tr>
			<tr>
					<td colspan="2" align="center">
						<label>
							<input type="hidden" name="step" value="1" />
							<input type="hidden" name="cms_id" 
							value="<?php echo emt_getval("cms_id", $row);?>" />
							<input type="hidden" name="mt_typeAgenda" 
							value="<?php echo emt_getval("cms_typeAgenda", $row);?>" />
							<?php
							if( $status != "edit" ){
								echo "<input type=\"submit\" name=\"submit\" value=\"ถัดไป  >\"  class=\"da-button blue\"/>";
							} else {
								$cms_id = emt_getval("cms_id", $row);
								$mt_id = emt_getval("mt_id", $row);
								echo "<input type=\"hidden\" name=\"cms_id\" value=\"{$cms_id}\" />";
								echo "<input type=\"hidden\" name=\"mt_id\" value=\"{$mt_id}\" />";
								echo "<input class=\"da-button green\" type=\"submit\" name=\"submit\" value=\"ตกลง\" />";
							}
							?>
						</label>
					</td>
				</tr>
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
<?php
}
?>