<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
if(isset($rs_cms)){
	$row_cms = $rs_cms->row();
	$cms_id = $row_cms->cms_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
if(isset($rs_mt)){
	$row = $rs_mt->row();
	$mt_id = $row->mt_id;
	$mtsId = $row->mt_mts_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุม กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}

$num_th = $this->config->item('emt_cv_th');	
?>
<script language="javascript">
$(document).ready(function(){
	
	//Add event
	$("#back").click(back);
	
	//Function
	function back(){
		url = site_url+"announceMeeting/announceMeetingShow";
		sendPost("frmMt",{"flag":1, "detail":2}, url, "", "")
	}
	
	
});
function callfancyboxAdd(agdt_id, getAdd){
	$.fancybox({
		'height' 			: '98%',
		'width' 			: '95%',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'href'				: site_url+"agenda/agdtAdd/"+getAdd,
		'onClosed'			: function() {
								url = site_url+"announceMeeting/meetingDetail/#"+agdt_id;
								sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
							}
	});
}
function callfancyboxEdit(agdt_id, getEdit){
	$.fancybox({
		'height' 			: '98%',
		'width' 			: '95%',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'href'				: site_url+"agenda/agdtEdit/"+getEdit,
		'onClosed'			: function() {
								url = site_url+"announceMeeting/meetingDetail/#"+agdt_id;
								sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
							}
	});
}
function approveList(checked, agdt_id){
	$(".ok_"+agdt_id).hide();
	$(".cancel_"+agdt_id).hide();
	$(".yes_"+agdt_id).hide();
	$(".valid_"+agdt_id).hide();
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#ok").hide();
	$("#cancel").hide();
	$(".load_"+agdt_id).show();
	
	var url = site_url+"announceMeeting/approveAgendaList";
	$.post(url,{"mt_id":<?php echo $mt_id; ?>,"agdt_id":agdt_id,"checked":checked},function(data){
		//alert(data);
	});
	$("#approveNoteAll").val("");
	if(checked !== false){
		$(".load_"+agdt_id).hide();
		$(".ok_"+agdt_id).show();
	} else {
		$(".load_"+agdt_id).hide();
		$(".approveNotelist_"+agdt_id).val("");
		$("#approveAll").attr("checked",false);
		$(".cancel_"+agdt_id).show();
	}
}
function apprNotelist(agdt_id){
	$(".ok_"+agdt_id).hide();
	$(".cancel_"+agdt_id).hide();
	$(".yes_"+agdt_id).hide();
	$(".valid_"+agdt_id).hide();
	$(".load_"+agdt_id).show();
	
	var url = site_url+"announceMeeting/approveAgendaList";
	var note = document.getElementsByClassName("approveNotelist_"+agdt_id);
	for (var i = 0; i < note.length; i++) {
		 var agap_note = note[i].value;
	}
	
	if(($(".approvelist_"+agdt_id).attr("checked") === true) || ($(".approvelist_"+agdt_id).attr("checked") === "checked")){
		$.post(url,{"agdt_id":agdt_id,"agap_note":agap_note},function(data){
			
		});
		$(".load_"+agdt_id).hide();
		$(".yes_"+agdt_id).show();
	} else {
		$(".load_"+agdt_id).hide();
		$(".valid_"+agdt_id).show();
	}
}
function approveAll(checked, tclass){
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#cancel").hide();
	$("#ok").hide();
	$("#load").show();
	
	var url = site_url+"announceMeeting/approveAgendaAll";
	
	if(checked !== false){
		$("#cancelAll").hide();
		$("#load").hide();
		$("input[name^='approvelist_']").attr("checked",true);
		$("span[class^='cancel_']").hide();
		$("span[class^='yes_']").hide();
		$("span[class^='valid_']").hide();
		$("span[class^='ok_']").show();
		$("#okAll").show();
		var flag = 1;
	} else {
		$("#okAll").hide();
		$("#load").hide();
		$("input[name^='approvelist_']").attr("checked",false);
		$("input[name^='approveNotelist_']").val("");
		$("#approveNoteAll").val("");
		$("span[class^='ok_']").hide();
		$("span[class^='yes_']").hide();
		$("span[class^='valid_']").hide();
		$("span[class^='cancel_']").show();
		$("#cancelAll").show();
		var flag = 0;
	}
	
	$.post(url,{"checked":flag,"mt_id":<?php echo $mt_id; ?>},function(data){
		//alert(data);
	});
	
	
}
function apprNoteAll(){
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#cancel").hide();
	$("#ok").hide();
	$("#load").show();
	
	var url = site_url+"announceMeeting/approveAgendaAll";
	var agapa_note = document.getElementById("approveNoteAll").value;
	var flag = "note";

	if(($("#approveAll").attr("checked") === true) || ($("#approveAll").attr("checked") === "checked")){
		$.post(url,{"checked":flag,"agapa_note":agapa_note,"mt_id":<?php echo $mt_id; ?>},function(data){
			//alert(data);
		});
		$("#load").hide();
		$("#ok").show();
	} else {
		$("#load").hide();
		$("#cancel").show();
	}
}
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
	.sortable>li:hover{
		border : 1px solid #D0DCF0;
	}
	.sortable li.ui-state-highlight { 
		height : 30px;
		line-height : 30px;
		background : #D0DCF0;
	}
	li.ui-sortable-helper{
		border : 1px solid #fad42e;
		background: #FAFAFA;
	}
	li .sortable{
		padding-left : 35px;
	}
	.string {
		display : inline-block;
		width : 95%;
	}
	.icon32,.icon{
		cursor : pointer;
	}
	h4#meeting{
		margin : 0 10px;
	}
	h3 a{
		text-decoration:none;
		color : #555;
	}
</style>

<?php
// Body
if(isset($rs_cms) && isset($rs_mt)){
?>

<div id="content">
	<div id="content-header">
		<?php
		$back = array(
			"src" => "images/emeeting/icons/back.png"
		);
		$imgBack = img($back);
		echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
	</div>
	<div id="content-body">
		<h3 id="cms">ชื่อการประชุม : 
		<?php
		echo $row_cms->cms_name;
		?>
		 ครั้งที่ <?php echo al_to_th($rs_mt->row()->mt_no); ?> / <?php echo  al_to_th($rs_mt->row()->mt_year); ?>
		 </h3>
			
		<p>&nbsp;</p>
		<?php
			$mt_mts_id = $rs_mt->row()->mt_mts_id;
		/*
			$url_notice = site_url() . "/emeeting/noticeMeeting/noticeMeetingShow";
			$url_sign = site_url() . "/emeeting/noticeMeeting/signInShow";
			$post = "mt_id:'" . $rs_mt->row()->mt_id ."',cms_id:'" . $row_cms->cms_id . "'";
			echo "<ul>";
			echo "<li><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$url_notice}','','');\" title=\"ส่งหนังสือเชิญเข้าร่วมประชุม\">ส่งหนังสือเชิญเข้าร่วมประชุม</a></li>";
			echo "<li><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$url_sign}','','');\" title=\"พิมพ์ใบเซ็นต์ชื่อ\">พิมพ์ใบเซ็นต์ชื่อ</a></li>";
			echo "</ul>";
		*/
		?>
		<table style="width:95%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="2" style="background-color:#C2CFDF;"><b>รายละเอียดการประชุม</b>
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
						if(emt_getval("cms_type", $row_cms)){
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
						if(emt_getval("cms_year_type", $row)){
							$str = "ตามปีปฎิทิน";
						} else {
							$str = "ตามปีงบประมาณ";
						}
						echo $str . " " . al_to_th(emt_getval("cms_year", $row));
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
						echo $mt_placeName . " " . $mt_placeDetail ;
						?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:95%;" align="center" class="emt_table" >
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
					</td>
				</tr>
				<?php
					if(!empty($rs_pnt)){
						$i = 0;
						foreach($rs_pnt as $key => $value){
							$pnt_id = $value["pnt_id"];
							$pnt_parent_id = $value["pnt_parent_id"];
							$pnt_parent_adminId = $value["pnt_parent_adminId"];
							$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
							$name = $value["name"];
							$adminName = $value["adminName"];
							$ag_name = $value["ag_name"];
							$ag_manage = $value["ag_manage"];
							
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
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:95%;" align="center" class="emt_table" >
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>บุคลากรในการประชุม</b>
					</td>
				</tr>
				<?php
					if(!empty($rs_pnt)){
						$i = 0;
						foreach($rs_pnt as $key => $value){
							$pnt_id = $value["pnt_id"];
							$pnt_parent_id = $value["pnt_parent_id"];
							$pnt_parent_adminId = $value["pnt_parent_adminId"];
							$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
							$name = $value["name"];
							$adminName = $value["adminName"];
							$ag_name = $value["ag_name"];
							
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
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:95%;" align="center" class="emt_table" >
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>ระเบียบวาระในการประชุม</b>
					</td>
				</tr>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
							if($short == 1)
							{
								// ระเบียบวาระย่อ
								re_viewAgs($rs_agdt, 0, $rs_file, $mt_mts_id);
							}
							else
							{
								$ck_edit = "approve";
								if($mtsId == 23)
								{
									// เสนอวาระเพิ่มเติม
									re_viewAgdtAdd($rs_agdt, 0, $ck_edit, $cms_id, $rs_file, $magap, $psId, $mtsId);
								}
								else
								{
									// รับรองมติ
									$ck_result = 0;
									re_viewAgdt($rs_agdt, 0, $ck_edit, $cms_id, $rs_file, $magap, $psId, $mtsId, $ck_result);
								}
							}
							?>
						</ul>
					</td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<?php
				if($mtsId >= 25 && $ck_result == 1){
				?>
				<tr>
					<td style="background-color:#DFE6EF;">
						<?php 
							// Image Loader
							$load = array(
								"src" => "images/emeeting/loadera16.gif",
								"width" => "16",
								"border" => "0"
							);
							$imgLoad = img($load);
							
							// Image OK
							$ok = array(
								"src" => "images/emeeting/yes.png",
								"width" => "16",
								"border" => "0"
							);
							$imgOK = img($ok);
							
							// Image Cancel
							$cancel = array(
								"src" => "images/emeeting/dialog_cancel.png",
								"width" => "16",
								"border" => "0"
							);
							$imgCancel = img($cancel);
					
							if(isset($qu_agapa) && $qu_agapa->num_rows() > 0){
								if($qu_agapa->row()->agapa_status == "Y"){
									$checkAll = "checked";
								} else {
									$checkAll = "";
								}
								
								if($qu_agapa->row()->agapa_note != ""){
									$agapa_note = $qu_agapa->row()->agapa_note;
								} else {
									$agapa_note = "";
								}
							} else {
								$checkAll = "";
								$agapa_note = "";
							}
						?>
							<input type="checkbox" name="approveAll" id="approveAll" value="" <?php echo $checkAll; ?> onclick="approveAll(this.checked, 'approvelist')" style="width:20px;"><b>รับรองมติทั้งหมด</b>
							&nbsp;&nbsp;&nbsp;<b>หมายเหตุ (ถ้ามี) : </b><input type="text" name="approveNoteAll" id="approveNoteAll" value="<?php echo $agapa_note; ?>" style="width:300px;">
							&nbsp;&nbsp;&nbsp;<input type="button" name="btnApproveAll" value="บันทึก" onclick="apprNoteAll()" style="width:70px;">
							&nbsp;&nbsp;&nbsp;<span id="load" style="display:none;"><?php echo $imgLoad; ?></span>
							<span id="ok" style="display:none;color:green;"><?php echo $imgOK; ?></span>
							<span id="okAll" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;รับรองมติทั้งหมด</span>
							<span id="cancelAll" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;ยกเลิกการรับรองมติทั้งหมด</span>
							<span id="cancel" style="display:none;color:red;"><?php echo $imgCancel; ?>&nbsp;กรุณารับรองมติทั้งหมด</span>
					</td>
				</tr>
				<?php 
				} 
				?>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<?php if(isset($agdt_edit) && $agdt_edit != "") { ?>
		<fieldset style="border:1px solid #FF0000">
			<legend><b>จากการรับรองวาระการประชุม มีสิ่งที่ต้องแก้ไขดังนี้ :</b></legend>
			<?php
				echo $agdt_edit;
			?>
		</fieldset>
		<?php } ?>
	</div>
</div>

<?php
}
// End body
?>
<?php
function re_viewAgdtAdd($child, $no=0, $ck_edit=0, $cms_id, $rs_file, $magap, $psId, $mtsId){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "สิ่งที่ต้องแก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	
	// Image add
	$add = array(
		"src" => "images/emeeting/icons/add.png",
		"width" => "16",
		"border" => "0"
	);
	$imgAdd= img($add);
	
	// Image edit
	$edit = array(
		"src" => "images/emeeting/icons/edit.png",
		"width" => "16",
		"border" => "0"
	);
	$imgEdit = img($edit);
	
	// Image OK
	$ok = array(
		"src" => "images/emeeting/yes.png",
		"width" => "16",
		"border" => "0"
	);
	$imgOK = img($ok);
	
	// Image Cancel
	$cancel = array(
		"src" => "images/emeeting/dialog_cancel.png",
		"width" => "16",
		"border" => "0"
	);
	$imgCancel = img($cancel);
	
	?>
	<ul class="sortable" >
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->agdt_id; ?>" name="<?php echo $row_child->agdt_id; ?>">
			<?php 
			echo "<span class=\"string\" id=\"agdt_".$row_child->agdt_id."\"><div class=\"tbin\">";
			
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
				$agdt_no = $i;
			} else {
				echo "<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
				$agdt_no = $no . "." . $i;
			}
			
			echo "<b>".$row_child->agdt_head."</b><br/>";
			
			if($row_child->agdt_detail != "")
			{
				echo $row_child->agdt_detail;
			}
			else
			{
				echo "<br/>";
			}
			
			//	เสนอโดย
			if($row_child->agdt_by)
			{
				echo "<b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->agdt_by."<br/><br/>";
			}
			
			// File
			$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
			
			if($ag_file->num_rows() > 0){
				echo "<b><u>".$str_file."</u></b>";
				echo "<ul>";
				foreach($ag_file->result() as $row_file)
				{
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
				}
				echo "</ul><br/>";
			}
			
			// Present
			if($row_child->agdt_present != "")
			{
				echo "<b><u>".$str_present."</u></b>";
				echo $row_child->agdt_present;
			}
			
			/*if($row_child->agdt_flag_extra == 9 && $row_child->agdt_edit != "")
			{
				echo "<b><u>".$str_edit."</u></b>";
				echo $row_child->agdt_edit;
			}*/
			
			// ผลการอนุมัติวาระเพิ่มเติม
			if($mtsId < 24){
				if($row_child->agdt_add == '1' && ($row_child->agdt_flag_appv == 'Y' || $row_child->agdt_flag_appv == 'N'))
				{
					if($row_child->agdt_flag_appv == 'Y'){
						$ok2 = "style=\"color:green;\"";
						$cancel2 = "style=\"display:none;\"";
					}
					else{
						$cancel2 = "style=\"color:red;\"";
						$ok2 = "style=\"display:none;\"";
					}					
					
					$agdt_appv_note = $row_child->agdt_appv_note;
					if($agdt_appv_note){
						$closeInput = "";
					}
					else{
						$closeInput = "style=\"display:none;\"";
					}
					
					?>
					<br/><div style="width:760px;border:1px solid #D0DCF0;background:#EEF2F7;padding:5px 5px 5px 5px;">
						<span class="ok2_<?php echo $row_child->agdt_id; ?>" <?php echo $ok2; ?> ><?php echo $imgOK; ?>&nbsp;อนุมัติแล้ว</span>
						<span class="cancel2_<?php echo $row_child->agdt_id; ?>" <?php echo $cancel2; ?> ><?php echo $imgCancel; ?>&nbsp;ไม่อนุมัติ</span>
						<span class="showInput_<?php echo $row_child->agdt_id; ?>" <?php echo $closeInput; ?> >&nbsp;&nbsp;&nbsp;<b>หมายเหตุ : </b>
							<input type="text" name="notelist_<?php echo $row_child->agdt_id; ?>" class="notelist_<?php echo $row_child->agdt_id; ?>" value="<?php echo $agdt_appv_note; ?>" style="width:300;" disabled="disabled">
						</span>
					</div><br/>
					<?php
				}
			}
			
			echo "</div></span>";

			if($mtsId < 24){
				$flag_agdt_add = 1;
				
				
				if($ck_edit == ""){
					$ck_edit = -1;
				}
				$no_parent = $no_ag = $no_send;
				
				$getAdd = $row_child->agdt_id."/".($row_child->agdt_level+1)."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$flag_agdt_add."/".$no_parent;
				$getEdit = $row_child->agdt_id."/".$row_child->agdt_level."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$flag_agdt_add."/".$no_ag."/-1/-1";
				?>
				<div style="float:right;">
					<a href="javascript:void(0);" class="agdtAdd" title="เพิ่มระเบียบวาระ" onclick="callfancyboxAdd('<?php echo $row_child->agdt_id; ?>','<?php echo $getAdd; ?>')" ><?php echo $imgAdd; ?></a>
					<?php if($row_child->agdt_add == '1' && $row_child->agdt_flag_appv != 'Y'){ ?>
						<a href="javascript:void(0);" class="agdtEdit" title="แก้ไขระเบียบวาระ" onclick="callfancyboxEdit('<?php echo $row_child->agdt_id; ?>','<?php echo $getEdit; ?>')" ><?php echo $imgEdit; ?></a>
					<?php } ?>
				</div>
			<?php
			}
			if($row_child->child->num_rows()>0){
				re_viewAgdtAdd($row_child->child,$no_send,$ck_edit,$cms_id,$rs_file,$magap,$psId,$mtsId);
			} 
			?>
		</li>
		<?php
			if($row_child->agdt_level == 0){
				echo "<hr />";
			}
		}
		?>
	</ul>
<?php
}

function re_viewAgdt($child, $no=0, $ck_edit=0, $cms_id, $rs_file, $magap, $psId, $mtsId, &$ck_result){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "สิ่งที่ต้องแก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	
	// Image Loader
	$load = array(
		"src" => "images/emeeting/loadera16.gif",
		"width" => "16",
		"border" => "0"
	);
	$imgLoad = img($load);
	
	// Image OK
	$ok = array(
		"src" => "images/emeeting/yes.png",
		"width" => "16",
		"border" => "0"
	);
	$imgOK = img($ok);
	
	// Image Cancel
	$cancel = array(
		"src" => "images/emeeting/dialog_cancel.png",
		"width" => "16",
		"border" => "0"
	);
	$imgCancel = img($cancel);
	
	?>
	<ul class="sortable" >
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->agdt_id; ?>" name="<?php echo $row_child->agdt_id; ?>">
			<?php 
			echo "<span class=\"string\" id=\"agdt_".$row_child->agdt_id."\"><div class=\"tbin\">";
			
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
				$agdt_no = $i;
			} else {
				echo "<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
				$agdt_no = $no . "." . $i;
			}
			
			echo "<b>".$row_child->agdt_head."</b><br/>";
			
			if($row_child->agdt_detail != "")
			{
				echo $row_child->agdt_detail;
			}
			else
			{
				echo "<br/>";
			}
			
			//	เสนอโดย
			if($row_child->agdt_by)
			{
				echo "<b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->agdt_by."<br/><br/>";
			}
			
			// File
			$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
			
			if($ag_file->num_rows() > 0){
				echo "<b><u>".$str_file."</u></b>";
				echo "<ul>";
				foreach($ag_file->result() as $row_file)
				{
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
				}
				echo "</ul><br/>";
			}
			
			// Present
			if($row_child->agdt_present != "")
			{
				echo "<b><u>".$str_present."</u></b>";
				echo $row_child->agdt_present;
			}
			
			/*if($row_child->agdt_flag_extra == 9 && $row_child->agdt_edit != "")
			{
				echo "<b><u>".$str_edit."</u></b>";
				echo $row_child->agdt_edit;
			}*/
		
			// Result
			if($mtsId >= 25 && $row_child->agdt_result != "")
			{
				$ck_result = 1;
				echo "<b><u>".$str_result."</u></b>";
				echo $row_child->agdt_result;
				
				$rs_agap = $magap->getByAgdtIdAndPsId($row_child->agdt_id,$psId);
				if($rs_agap->num_rows() > 0){
					if($rs_agap->row()->agap_status == "Y"){
						$checked = "checked";
					} else {
						$checked = "";
					}
					$agap_note = $rs_agap->row()->agap_note;
				} else {
					$checked = "";
					$agap_note = "";
				}
				
			?>
				<br/><div style="width:750px;border:1px solid #CCC;padding:5px 5px 5px 5px;">
				<input type="checkbox" name="approvelist_<?php echo $row_child->agdt_id; ?>" class="approvelist_<?php echo $row_child->agdt_id; ?>" value="" <?php echo $checked; ?> onclick="approveList(this.checked, '<?php echo $row_child->agdt_id; ?>')" style="width:20;"><b>รับรองมติ</b>
				&nbsp;&nbsp;&nbsp;<b>หมายเหตุ (ถ้ามี) : </b><input type="text" name="approveNotelist_<?php echo $row_child->agdt_id; ?>" class="approveNotelist_<?php echo $row_child->agdt_id; ?>" value="<?php echo $agap_note; ?>" style="width:300;">
				&nbsp;&nbsp;&nbsp;<input type="button" name="btnApprovelist_<?php echo $row_child->agdt_id; ?>" value="บันทึก" onclick="apprNotelist('<?php echo $row_child->agdt_id; ?>')" style="width:70;">
				&nbsp;<span class="load_<?php echo $row_child->agdt_id; ?>" style="display:none;"><?php echo $imgLoad; ?></span>
				<span class="yes_<?php echo $row_child->agdt_id; ?>" style="display:none;"><?php echo $imgOK; ?></span>
				<span class="ok_<?php echo $row_child->agdt_id; ?>" style="display:none;color:green;"><?php echo $imgOK; ?>รับรองมติ</span>
				<span class="cancel_<?php echo $row_child->agdt_id; ?>" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;ยกเลิกการรับรองมติ</span>
				<span class="valid_<?php echo $row_child->agdt_id; ?>" style="display:none;color:red;"><?php echo $imgCancel; ?>&nbsp;กรุณารับรองมติ</span>
				</div><br/>
			<?php
			}
			
			echo "</div></span>";
			
			if($row_child->child->num_rows()>0){
				re_viewAgdt($row_child->child,$no_send,$ck_edit,$cms_id,$rs_file,$magap,$psId,$mtsId,$ck_result);
			} 
			?>
		</li>
		<?php
			if($row_child->agdt_level == 0){
				echo "<hr />";
			}
		}
		?>
	</ul>
<?php
}

function re_viewAgs($child, $no=0, $rs_file="", $mt_mts_id=""){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
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
	?>
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<div id="<?php echo $row_child->ags_id; ?>">
			<?php
			echo "<span class=\"string\">";
			$i = $i + 1;
			if($row_child->ags_level == 0){
				echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				$margin1 = 30;
				for ($j1 = 1; $j1 <= $row_child->ags_level; $j1++) {
					$margin1 = $margin1 + 30;
				}
				echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			
			echo $row_child->ags_head."</div>";
			
			$margin2 = 45;
			for ($j2 = 1; $j2 <= $row_child->ags_level; $j2++) {
				$margin2 = $margin2 + 45;
			}
			if($row_child->ags_detail != "")
			{
				echo "<br/><div class=\"tbin\" style=\"margin-left:".$margin2."px;\">".$row_child->ags_detail."</div>";
				$num1 = 0;
			}
			else
			{
				$num1 = 1;
			}
			
			//	เสนอโดย
			if($row_child->ags_by != "")
			{
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->ags_by."</div><br/>";
			}
			
			$ag_file = $rs_file->getFileByAgdtId($row_child->ags_id);
			
			if($ag_file->num_rows() > 0){
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_file."</u></b>";
				echo "<ul>";
				foreach($ag_file->result() as $row_file)
				{
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfls_nname.'" target="_blank" >- '.$row_file->agfls_oname.'</a></li>';
				}
				echo "</ul></div>";
				$num2 = 0;
			}
			else
			{
				$num2 = 1;
			}
			
			if($row_child->ags_present != "")
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_present."</u></b></td>";
				$p = array("<p>", "</p>");
				echo "<td><div class=\"tbin\">".str_replace($p,"",$row_child->ags_present)."</div></td>";
				echo "</tr>";
				echo "</table>";
				$num3 = 0;
			}
			else
			{
				$num3 = 1;
			}
			
			if($row_child->ags_result != "" && $mt_mts_id > 25)
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_result."</u></b></td>";
				$p = array("<p>", "</p>");
				echo "<td><div class=\"tbin\">".str_replace($p,"",$row_child->ags_result)."</div></td>";
				echo "</tr>";
				echo "<tr><td>&nbsp;</td></tr>";
				echo "</table>";
				$num4 = 0;
			}
			else
			{
				$num4 = 1;
			}
				
			$sum = $num1 + $num2 + $num3 + $num4;
			if($sum == 4)
			{
				//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
			}
			
			echo "</span>";
			
			if($row_child->child->num_rows()>0){
				re_viewAgs($row_child->child,$no_send,$rs_file,$mt_mts_id);
			}
			?>
		</div>
		<?php
		}
		?>
<?php
}
?>
