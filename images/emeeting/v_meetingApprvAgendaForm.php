<!-- iButton Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/ibutton/lib/jquery.ibutton.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ibutton/css/jquery.ibutton-giva-original.css" media="screen" />


<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/ui.js"></script>
<?php 
echo link_tag('css/emt_css/ui.css');

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
	chk_save();
	$("#back").click(back);
	$("#btnSubmit").click(submitApprove);
	
	//Function
	function back(){
		url = site_url+"announceMeeting/announceMeetingShow";
		sendPost("frmMt",{"flag":1, "detail":2}, url, "", "");
	}
	
	function submitApprove(){
		if(!confirm("หากยืนยันการรับรองมติแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลได้อีก คุณต้องการยืนยันหรือไม่")){
			return false;
		}
		var url = site_url+"announceMeeting/announceMeetingApproveSave";
		var re_url = site_url+"announceMeeting/announceMeetingShow";
		$.post(url,{"mt_id":<?php echo $mt_id; ?>,"psId":<?php echo $psId; ?>,"flag_save":1},function(data){
			sendPost("frmMt",{"flag":1, "detail":2}, re_url, "", "");
		});
	}
	
});

function chk_save(){
	var num_all = <?php echo $num_all; ?>;
	var num_chk = 0;

	$("input[name^='approvelist_']").each(function (i){
		if($(this).attr("checked") == true){
			num_chk = num_chk + 1;
		}
	});
	
	if(num_chk == num_all){
		// enable save button 
		$("#btnSubmit").removeAttr("disabled");
	}
	else{
		// disable save button 
		$("#btnSubmit").attr("disabled","disabled");
	}
}

function en_to_th(num){
	var en = [];
	en[0] = /0/g;
	en[1] = /1/g;
	en[2] = /2/g;
	en[3] = /3/g;
	en[4] = /4/g;
	en[5] = /5/g;
	en[6] = /6/g;
	en[7] = /7/g;
	en[8] = /8/g;
	en[9] = /9/g;
	
	var th = [];
	th[0] = "๐";
	th[1] = "๑";
	th[2] = "๒";
	th[3] = "๓";
	th[4] = "๔";
	th[5] = "๕";
	th[6] = "๖";
	th[7] = "๗";
	th[8] = "๘";
	th[9] = "๙";
	
	var str = num.toString();
	var result = str;
	for(var i = 0; i < 10; i++){
		result = result.replace(en[i],th[i]);
	}
	
	return result;
}


function update_result(){
	var num_all = <?php echo $num_all; ?>;
	var num_1 = 0;
	var num_2 = 0;
	var num_3 = 0;

	$("input[name^='approvelist_']").each(function (i){
		if($(this).attr("checked") == true){
			if($(this).val() == 1){
				num_1 = num_1 + 1;
			}
			else if($(this).val() == 2){
				num_2 = num_2 + 1;
			}
			else if($(this).val() == 3){
				num_3 = num_3 + 1;
			}
		}
	});
	
	var num_no = num_all - (num_1 + num_2 + num_3);
	// update result
	if(num_1 != 0){
		num_1 = en_to_th(num_1);
		$("span.num_1").html(num_1);
	}else{
		$("span.num_1").html(" - ");	
	}
	
	if(num_2 != 0){
		num_2 = en_to_th(num_2);
		$("span.num_2").html(num_2);
	}else{
		$("span.num_2").html(" - ");	
	}
	
	if(num_3 != 0){
		num_3 = en_to_th(num_3);
		$("span.num_3").html(num_3);
	}else{
		$("span.num_3").html(" - ");	
	}
	
	if(num_no != 0){
		num_no = en_to_th(num_no);
		$("span.num_no").html(num_no);
	}else{
		$("span.num_no").html(" - ");	
	}
}

function approveList(appv_id, agdt_id){
	// parent
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#load").hide();
	// child
	$(".ok_"+agdt_id).hide();	// hide all ok
	$(".okNote_"+agdt_id).hide();
	$(".invalid_"+agdt_id).hide();
	$(".loadNote_"+agdt_id).hide();
	$(".load_"+agdt_id).hide();	// hide all load
	$(".loadAppv_"+agdt_id+"_"+appv_id).show();
	
	var url = site_url+"announceMeeting/approveAgendaList";
	$.post(url,{"mt_id":<?php echo $mt_id; ?>, "agdt_id":agdt_id, "appv_id":appv_id, "psId":<?php echo $psId; ?>},function(data){
		//alert(data);
	});
	
	$(".loadAppv_"+agdt_id+"_"+appv_id).hide();
	$(".okAppv_"+agdt_id+"_"+appv_id).show();
	
	// check button save
	chk_save();
	
	// update result
	update_result();
}

/*function apprvNotelist(agdt_id){
	// parent
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#load").hide();
	// child
	$(".ok_"+agdt_id).hide();	// hide all ok
	$(".okNote_"+agdt_id).hide();
	$(".invalid_"+agdt_id).hide();
	$(".load_"+agdt_id).hide();	// hide all load
	$(".loadNote_"+agdt_id).show();
	
	var chk_err = 1;
	$(".approvelist_"+agdt_id).each(function (i){
		if($(this).val() == 2 && $(this).attr("checked") == true){
			chk_err = 0;
		}
	});
	if(chk_err == 1){
		$(".loadNote_"+agdt_id).hide();
		$(".invalid_"+agdt_id).show();
		return false;
	}
	
	$(".loadNote_"+agdt_id).hide();
	//var name = "approveNotelist_"+agdt_id+"";
	//alert(name);
	//var data = CKEDITOR.instances['approveNotelist_"+agdt_id+"'].getData();
	//var data = CKEDITOR.instances.name.getData();
	
	$("textarea[name='approveNotelist_"+agdt_id+"']").ckeditor(function( textarea ){
		var data = $(textarea).val();
	});
	
	//$("textarea[name='approveNotelist_"+agdt_id+"']").ckeditor();
	//var data = $("textarea[name='approveNotelist_"+agdt_id+"']").val();
	
	//var editor = $("textarea[name='approveNotelist_"+agdt_id+"']").ckeditorGet();
	//alert(editor.checkDirty());

	//var agap_note = $("textarea[name='approveNotelist_"+agdt_id+"']").val();
	var note = document.getElementsByClassName("approveNotelist_"+agdt_id);
	for (var i = 0; i < note.length; i++) {
		agap_note = note[i].value;
	}
	//var data = $("span[name='cke_"+agdt_id+"']").val();
	alert(data);
	return false;
	
	var url = site_url+"announceMeeting/approveAgendaNote";
	$.post(url,{"mt_id":<?php echo $mt_id; ?>, "agdt_id":agdt_id, "agap_note":agap_note, "pnt_id":<?php echo $pntId_login; ?>},function(data){
		//alert(data);
	});
	
	$(".loadNote_"+agdt_id).hide();
	$(".okNote_"+agdt_id).show();
}
*/

function approveAll(checked){
	// child
	$("span[class^='ok_'").hide();
	$("span[class^='okNote_'").hide();
	$("span[class^='invalid_'").hide();
	$("span[class^='loadNote_'").hide();
	$("span[class^='load_'").hide();
	// parent
	$("#okAll").hide();
	$("#cancelAll").hide();
	$("#load").show();
	
	// check button save
	if(checked !== false){
		var flag = 1;
		// enable save button 
		$("#btnSubmit").removeAttr("disabled");
	} else {
		var flag = 0;
		// disable save button 
		$("#btnSubmit").attr("disabled","disabled");
	}
	
	var url = site_url+"announceMeeting/approveAgendaAll";
	$.post(url,{"checked":flag,"mt_id":<?php echo $mt_id; ?>, "psId":<?php echo $psId; ?>},function(data){
		//alert(data);
	});
	
	$("#load").hide();
	if(flag == 1){
		$(".approveAll_"+1).attr("checked",true);
		$("#okAll").show();
	} else {
		$("input[name^='approvelist_']").attr("checked",false);	// uncheck all
		$("#cancelAll").show();
	}
	
	// update result
	update_result();
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
if(isset($rs_cms) && isset($rs_mt) && isset($psId)){
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
	
		<p>&nbsp;</p>
		<div class="grid_2">
            <div class="da-panel collapsible">
                <div class="da-panel-header">
                    <span class="da-panel-title">
					<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/users_2.png"; ?> />
						<id="cms" align="center" >การรับรองมติการประชุม<?php echo $row_cms->cms_name; ?>
						ครั้งที่ <?php echo al_to_th($rs_mt->row()->mt_no); ?> / <?php echo  al_to_th($rs_mt->row()->mt_year); ?>
                    </span>
                </div>
		
		<div class="da-panel-content">
			<table class="da-table da-detail-view">
			<thead>
				<th>ผลการรับรองมติ</th>
				<th>จำนวน</th>
			</thead>
			<tbody>
				<?php
					// to get approved agenda result
					if(isset($qu_magap)){
						$magap = $qu_magap;
						
						echo "<tr>";
							echo "<td nowrap=\"nowrap\" >มติทั้งหมด</td>";
							if(isset($num_all) && $num_all != 0){
								echo "<td align=\"center\" >".al_to_th($num_all)."</td>";
							}
							else{
								echo "<td align=\"center\" > - </td>";
							}
						echo "</tr>";
						
						$magap->agap_mt_id = $mt_id;
						$magap->agap_ps_id = $psId;
						$qu_result = $magap->get_groupByAppvId();
						$num_appv = 0;
						$i = 1;
						foreach($qu_result->result() as $row_rs){
							echo "<tr>";
								echo "<td nowrap=\"nowrap\" >{$row_rs->appv_name}</td>";
								if($row_rs->num_ag != 0){
									echo "<td align=\"center\" ><span class=\"num_{$i}\">".al_to_th($row_rs->num_ag)."</span></td>";
								}
								else{
									echo "<td align=\"center\" ><span class=\"num_{$i}\"> - </span></td>";
								}
							echo "</tr>";
							$num_appv += $row_rs->num_ag;
							$i++;
						}
						$num_minus = ($num_all - $num_appv);
						echo "<tr>";
							echo "<td nowrap=\"nowrap\" >ยังไม่ดำเนินการ</td>";
							if($num_minus != 0){
								echo "<td align=\"center\" ><span class=\"num_no\">".al_to_th($num_minus)."</span></td>";
							}
							else{
								echo "<td align=\"center\" ><span class=\"num_no\"> - </span></td>";
							}
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		
			</div>
		<?php echo "</br>";?>
			<div style="padding-left:20px;">
				<span class="error">*</span>
					<b>กรุณารับรองมติภายในวันที่</b>
					<?php
						if(emt_getval("mt_eapprv_date", $row)==1){
							$str = "-";
						} else {
							$str = $num_th(dateDisplay(emt_getval("mt_eapprv_date", $row)));
						}
						echo $str;
					?>
					<br />&nbsp;&nbsp;หากหลังจากนี้ จะถือว่ารับรองมติการประชุมฯ โดยไม่มีการแก้ไข
			</div>
		</div>
	</div>
		
<!----------------------------------------->		

		 <table class="da-table da-detail-view">
			<tbody>
				<tr>
					<td colspan="2" style="background-color:#C2CFDF;"><b>รายละเอียดการประชุม</b>
					</td>
				</tr>
				<tr>
					<td width="200"><label>ชื่อการประชุมsadsadsad : </label></td>
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
					<td>						<?php 
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
		 <table class="da-table da-detail-view">
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
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
		 <table class="da-table da-detail-view">
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>บุคลากรในการประชุม</b>
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
		 <table class="da-table da-detail-view">
			<tbody>
				<tr>
					<td colspan="3" style="background-color:#C2CFDF;"><b>ระเบียบวาระในการประชุม</b>
					</td>
				</tr>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
								// รับรองมติ
								$ck_result = 0;
								re_viewAgdt($rs_agdt, 0, $rs_file, $rs_agap, $qu_apprv, $ck_result);
							?>
						</ul>
					</td>
				</tr>

<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='<?php echo base_url();?>ckeditor/';
//]]></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js?t=B5GJ5GG"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">
    //CKEDITOR.replace( 'editor1' );
	CKEDITOR.replaceAll( function( textarea, config )
    {
       config.height = '100%';	//150;
	   config.width = '90%';	//500;
	   config.resize_maxWidth = '90%'; //520;
	   config.toolbar = [["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]];
    } );

    //timer = setInterval('updateDiv()',100);
	$("input[name^='btnApprovelist_']").click(apprvNotelist2);
    function apprvNotelist2(){
		var agdt_id = $(this).attr("id");
		// parent
		$("#okAll").hide();
		$("#cancelAll").hide();
		$("#load").hide();
		// child
		$(".ok_"+agdt_id).hide();	// hide all ok
		$(".okNote_"+agdt_id).hide();
		$(".invalid_"+agdt_id).hide();
		$(".load_"+agdt_id).hide();	// hide all load
		$(".loadNote_"+agdt_id).show();
		
		var chk_err = 1;
		$(".approvelist_"+agdt_id).each(function (i){
			if($(this).val() == 2 && $(this).attr("checked") == true){
				chk_err = 0;
			}
		});
		if(chk_err == 1){
			$(".loadNote_"+agdt_id).hide();
			$(".invalid_"+agdt_id).show();
			return false;
		}
		
		var agap_note = CKEDITOR.instances["approveNotelist_"+agdt_id].getData();
		
		var url = site_url+"announceMeeting/approveAgendaNote";
		$.post(url,{"mt_id":<?php echo $mt_id; ?>, "agdt_id":agdt_id, "agap_note":agap_note, "psId":<?php echo $psId; ?>},function(data){
			//alert(data);
		});
		
		$(".loadNote_"+agdt_id).hide();
		$(".okNote_"+agdt_id).show();
		
		//alert(editorText);
        //$('#trackingDiv').html(editorText);
		//$("textarea[name='approveNotelist_"+agdt_id+"']").val(editorText);
		//alert($("textarea[name='approveNotelist_"+agdt_id+"']").val());
    }
</script>

<!--<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('textarea.ckeditor', {"height":150,"width":500,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
//]]></script>-->
				<tr>
					<td></td>
				</tr>
				<?php
				if($ck_result == 1){
				?>
				<tr>
					<td style="background-color:#DFE6EF;padding:10px 0px 10px 20px;">
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
							
							echo "<input type=\"checkbox\" name=\"approveAll\" id=\"approveAll\" value=\"\" onclick=\"approveAll(this.checked)\" style=\"width:20px;margin-right:10px;\"><b>รับรองมติ โดยไม่มีการแก้ไขทั้งหมด</b>";
							echo "<span id=\"load\" style=\"margin-left:20px;display:none;\">{$imgLoad}</span>";
							echo "<span id=\"okAll\" style=\"margin-left:20px;display:none;color:green;\">{$imgOK}&nbsp;รับรองมติทั้งหมด</span>";
							echo "<span id=\"cancelAll\" style=\"margin-left:20px;display:none;color:green;\">{$imgOK}&nbsp;ยกเลิกการรับรองมติทั้งหมด</span>";
						?>
					</td>
				</tr>
				<?php 
				} 
				?>
			</tbody>
		</table>
		
		<p>&nbsp;</p>
		
		<?php 
		if(isset($agdt_edit) && $agdt_edit != ""){ 
			?>
			<fieldset style="border:1px solid #FF0000">
				<legend><b>จากการรับรองวาระการประชุม มีสิ่งที่ต้องแก้ไขดังนี้ :</b></legend>
				<?php echo $agdt_edit; ?>
			</fieldset>
			<?php 
		}
		?>
		
		<div align="center" style="margin-top:10px;">
			<input type="button" class="da-button green" name="btnSubmit" id="btnSubmit" disabled="disabled" value="ยืนยันการรับรองมติ" />
		</div>
		<p>&nbsp;</p>
	</div>
</div>

<?php
}
// End body
?>

<?php

function re_viewAgdt($child, $no=0, $rs_file, $rs_agap, $qu_apprv, &$ck_result){
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
	
	echo "<ul class=\"sortable\" >";
	
		$i = 0;
		foreach($child->result() as $row_child){
		
			echo "<li id=\"{$row_child->agdt_id}\" name=\"{$row_child->agdt_id}\" >";
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
			
				// Result
				if($row_child->agdt_result != "")
				{
					$ck_result = 1;
					echo "<b><u>".$str_result."</u></b>";
					echo $row_child->agdt_result;
					
					$agap_appv_id = 0;
					$agap_note = "";
					if($rs_agap->num_rows() > 0){
						foreach($rs_agap->result() as $row_agap){
							if($row_agap->agap_agdt_id == $row_child->agdt_id){
								$agap_appv_id = $row_agap->agap_appv_id;
								$agap_note = $row_agap->agap_note;
								break;
							}
						}
					}
					
					// display approve checked 
					if($qu_apprv->num_rows() > 0){
						// init name to check invalid
						$appv_name_2 = "";
						echo "<br /><div style=\"width:75%;border:1px solid #CCC;padding:5px 5px 5px 5px;\" >";
						foreach($qu_apprv->result() as $row_appv){
							$checked = "";
							if($row_appv->appv_id == $agap_appv_id){
								$checked = "checked";
							}
							
							
							echo "<input type=\"radio\" name=\"approvelist_{$row_child->agdt_id}\" class=\"approvelist_{$row_child->agdt_id} approveAll_{$row_appv->appv_id}\" value=\"{$row_appv->appv_id}\" {$checked} onclick=\"approveList('{$row_appv->appv_id}', '{$row_child->agdt_id}')\" style=\"width:20px;margin:10px; 0px; 10px; 20px;\">{$row_appv->appv_name}";
							
							if($row_appv->appv_flag_note == 'Y'){
								// get name to check invalid
								$appv_name_2 = $row_appv->appv_name;
								echo " ดังนี้";
							}
							
							// display save for each appv_id
							echo "<span class=\"load_{$row_child->agdt_id} loadAppv_{$row_child->agdt_id}_{$row_appv->appv_id}\" style=\"margin-left:20px;display:none;\">{$imgLoad}</span>";
							echo "<span class=\"ok_{$row_child->agdt_id} okAppv_{$row_child->agdt_id}_{$row_appv->appv_id}\" style=\"margin-left:20px;display:none;color:green;\">{$imgOK}</span>";
							
							echo "<br />";	//ckeditor
							if($row_appv->appv_flag_note == 'Y'){
								echo "<div style=\"margin-left:40px;width:90%;align:left;margin-bottom:5px;\" >";
								echo "<textarea name=\"approveNotelist_{$row_child->agdt_id}\" class=\"approveNotelist_{$row_child->agdt_id}\" style=\"resize:none;\" rows=\"5\" cols=\"80%\" >{$agap_note}</textarea>";
								echo "</div><br />";
								echo "<input type=\"button\" class=\"da-button green\" name=\"btnApprovelist_{$row_child->agdt_id}\" value=\"บันทึก\" id=\"{$row_child->agdt_id}\" style=\"width:70px;margin-bottom:10px;margin-left:250px;\" >";
								//onclick=\"apprvNotelist('{$row_child->agdt_id}')\"
								
								// display save for note
								echo "<span class=\"loadNote_{$row_child->agdt_id}\" style=\"margin-left:40px;display:none;\">{$imgLoad}</span>";
								echo "<span class=\"okNote_{$row_child->agdt_id}\" style=\"margin-left:40px;display:none;color:green;\">{$imgOK}&nbsp;บันทึกข้อมูลเรียบร้อย</span>";
								echo "<br />";
								
								// display save for check valid
								echo "<div style=\"margin-left:40px;\" >";
								echo "<span class=\"invalid_{$row_child->agdt_id}\" style=\"display:none;color:red;\">{$imgCancel}&nbsp;กรุณาเลือก{$appv_name_2}</span>";
								echo "</div>";
							}
						}
						echo "</div><br />";
					}
				}
				
				echo "</div></span>";
				
				if($row_child->child->num_rows()>0){
					re_viewAgdt($row_child->child, $no_send, $rs_file, $rs_agap, $qu_apprv, $ck_result);
				} 
				
			echo "</li>";
			if($row_child->agdt_level == 0){
				echo "<hr />";
			}
		}
	echo "</ul>";
}

?>