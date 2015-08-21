<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/ui.js"></script>
<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<?php 
	echo link_tag('css/emt_css/ui.css');
	echo link_tag('css/emt_css/fancybox/fancybox.css');
?>
<script>
$(document).ready(function(){
	// Init
	url_back = site_url+"emeeting/emeetingView";
	
	//Add event
	$("#back").click(back);
	$("#start").click(Start);
	
	// set class sortable for sortable
	$(".sortable").sortable({
		placeholder: "ui-state-highlight",
		opacity: 0.95,
		delay: 50,
		stop:function(event, ui){
			var url = "<?php echo site_url() . "/emeeting/emeeting/pntSeq"; ?>";
			var index = $(this).sortable('toArray');
			$.post(url,{index:index},function(data){
			});
		}
		
	});
	
	//Function
	function Start(){
		url = site_url+"timeMeeting/startMeeting";
		sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
	}
	
	function getChecked()
	{
		if($(this).attr("checked") == true)
		{
			$("#btnSubmit").removeAttr("disabled");
		}
	}
	
	function back(){
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url_back, "", "")
	}
	
	<?php
	// image delete
	$del = array(
		"src" => "image/icons/color/cross.png",
		"width" => "16",
		"title" => "ลบ",
		"border" => "0"
	);
	$imgDel = img($del);
	
	// image edit
	$inst = array(
		"src" => "images/emeeting/icons/change.png",
		"width" => "30",
		"border" => "0"
	);
	$imgInst = img($inst);
	
	// image absent
	$user = array(
		"src" => "images/emeeting/user_delete.png",
		"width" => "36",
		"title" => "เช๊คผู้เข้าร่วมประชุม"
	);
	$imgAbsent = img($user);
	
	// image check
	$user_check = array(
		"src" => "images/emeeting/user_check.png",
		"width" => "36",
		"title" => "เช๊คผู้เข้าร่วมประชุม"
	);
	$imgCheck = img($user_check);
	?>
	
	// rowPnt for insert
	var rowPnt = "<tr>";
	rowPnt += "<td>";
	//rowPnt += "<input type=\"checkbox\" name=\"chk_status[]\" class=\"chk_invite\" value=\"Y\" />";
	rowPnt += "</td>";
	// pnt_typeAgenda => 0 = โดยชื่อ 
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" ";
	rowPnt += "title=\"บุคคลากร\"  name=\"personName[]\" get=\"getPerson\" class=\"autocomplete validate\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_personId[]\" />";
	rowPnt += "</td>";
	/*rowPnt += "<td>";
	rowPnt += "<input type=\"text\" name=\"adminName[]\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_adminId[]\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_deptId[]\" />";	
	rowPnt += "</td>";*/
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" name=\"deptName[]\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_dpId[]\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_adminId[]\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_deptId[]\" />";	
	rowPnt += "</td>";
	rowPnt += "<td>";
	rowPnt += "ผู้เข้าร่วมประชุม";
	rowPnt += "<input type=\"hidden\" name=\"pnt_ag_id[]\" value=\"11\"/>";
	rowPnt += "<input type=\"hidden\" name=\"pnt_quorum[]\" value=\"0\"/>";
	rowPnt += "<input type=\"hidden\" name=\"pnt_typeAgenda[]\" value=\"0\" />";
	rowPnt += "<input type=\"hidden\" name=\"pnt_email[]\" />";
	rowPnt += "</td>";
	// หมายเหตุ
	rowPnt += "<td class=\"action\">";
	//$rowPnt_Edit .= "<a href=\"javascript:void(0);\" class=\"pntEdit\" title=\"เหตุผลที่ไม่เข้าร่วมประชุม\" style=\"margin:3px;\" onclick=\"notefancybox('{$pnt_id}')\">".$imgNote."</a>";
	//rowPnt += "<textarea name=\"act_note_absent[]\" rows=\"1\" ></textarea>";
	rowPnt += "</td>";
	
	rowPnt += "<td class=\"action\"><a href=\"javascript:void(0);\" id=\"pntDel\" >";
	rowPnt += "<?php echo addslashes($imgDel); ?></a></td>";
	rowPnt += "</tr>";
	
	<?php
	if(!isset($arr_pnt) || empty($arr_pnt)){
		?>
		// Add rowPnt for first open page
		$("#pnt_table tbody").append(rowPnt);
		<?php
	}
	?>
	
	// Add Event
	$("#pntAdd").live("click",pntAdd);
	$("#pntDel").live("click",pntDel);
	$("#back").click(back);
	
	// Function
	function pntAdd(){
		$("#pnt_table tbody").append(rowPnt);
	}
	
	function pntDel(){
		var warnMsg = $(this).parents("tr:first").find("input[name^=personName]").val(); 
		if(warnMsg){
			warnMsg = " \""+warnMsg+"\" ";
		}
		if(!confirm("คุณต้องการลบ"+warnMsg+"ใช่หรือไม่")){
			return false;
		}
		$(this).parents("tr:first").remove();
	}
});

function chkList(flag,tclass){
	if(flag == 1)
		$("."+tclass).attr("checked",true);
	else
		$("."+tclass).attr("checked",false);
}

function callfancybox(pnt_id){
	$.fancybox({
		'height' 			: '50%',
		'width' 			: '70%',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'href'				: site_url+"timeMeeting/timeMeetingInsteadAdd/"+pnt_id,
		'onClosed'			: function() {
								url = site_url+"timeMeeting/#pnt_table";
								sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
							}
	});
}

// Implement to your program
function acLink(id){
	var data = globaldata[id];
	if(get == "getPerson"){ //link in Person
		//set value in Person
		obj.parents("tr:first").find("input[name^=pnt_personId]").val(data.personId);
		obj.parents("tr:first").find("input[name^=personName]").val(data.name);
		//set value in admin
		obj.parents("tr:first").find("input[name^=pnt_adminId]").val(data.adminId);
		obj.parents("tr:first").find("input[name^=pnt_deptId]").val(data.deptId);
		//obj.parents("tr:first").find("input[name^=adminName]").val(data.adminName);
		//set value in dept
		obj.parents("tr:first").find("input[name^=pnt_dpId]").val(data.dpId);
		obj.parents("tr:first").find("input[name^=deptName]").val(data.deptName);
		//set value in email	
		obj.parents("tr:first").find("input[name^=pnt_email]").val(data.email);
	}
	
	$(".autocomplete-block").remove();
}
function acStart(obj){
	if(get == "getPerson"){ //link in Person
		personId = obj.parent().find("input[name^=pnt_personId]").val();
		if(personId > 0){
			obj.parents("tr:first").find("input[name^=pnt_personId]").val("");
			obj.parents("tr:first").find("input[name^=pnt_adminId]").val("");
			obj.parents("tr:first").find("input[name^=pnt_deptId]").val("");
			//obj.parents("tr:first").find("input[name^=adminName]").val("");
			obj.parents("tr:first").find("input[name^=pnt_dpId]").val("");
			obj.parents("tr:first").find("input[name^=deptName]").val("บุคคลภายนอก");
			obj.parents("tr:first").find("input[name^=pnt_email]").val("");
		}
	}
}

</script>
<style>
	.sortable{
		width : 100%;
		margin : 0px;
		padding : 0px;
	}
	.sortable tr{
		line-height : 25px;
		list-style: none;
		margin : 0px;
		padding : 0px;
		padding-left : 20px;
		cursor:move;
		border : 1px solid #FFFFFF;
	}
	.sortable tr:hover{
		border : 1px solid #D0DCF0;
	}
	.sortable tr.ui-state-highlight { 
		height : 30px;
		line-height : 30px;
		background : #D0DCF0;
	}
	tr.ui-sortable-helper{
		border : 1px solid #fad42e;
		background: #FAFAFA;
		
	}
	.icon32,.icon{
		cursor : pointer;
	}
</style>
		<div id="guide" style="padding:50px 195px 5px;">
			<?php
				$startMt = array(
					"src" => "images/emeeting/icons32/startMt.png",
					"width" => "48"
				);
				$imgStartMt = img($startMt);
				$back = array(
					"src" => "images/emeeting/icons/back.png",
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			?>
		</div>
<div id="da-panel collapsible" class="grid_4_center">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/16/list.png">
				บันทึกเวลาผู้เข้าร่วมประชุม
				</span>
		</div>
	<div class="da-panel-content">
		<?php 
			if($mt_mts_id > 20 && $mt_mts_id < 25){ 
				?>
				<div style="padding:10px 10px 10px 10px;"><div class="icon32" id="start"><?php echo $imgStartMt; ?><br/><span class="note">เปิดประชุม</span></div>
				</div>
				<?php 
			} 
		?>
	<?php
		$action = "timeMeeting/timeMeetingSave";
		echo form_open($this->config->item("emt_path").$action,"frmTimeMeeting");
	?>
	<table style="width:100%;" align="center" class="da-table" id="pnt_table">
		<thead>
			<tr>
				<th width="25"><input type="checkbox" name="chk_all" id="chk_all" onclick="chkList(this.checked,'chk_invite')" /></th>
				<th>ชื่อ-นามสกุล </th>
				<!-- <th>ตำแหน่งในการบริหาร</th> -->
				<th width="130px;">หน่วยงาน</th>
				<th>ตำแหน่งการประชุม</th>
				<th width="200px;">เหตุผลที่ไม่เข้าร่วมประชุม</th>
				<th width="40px;">ผู้แทน</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">&nbsp;</td>
				<td class="action">
					<?php 
					$add = array(
						"src" => "image/icons/color/add.png",
						"width" => "16",
						"border" => "0"
					);
					$img_add = img($add);
					?>
					<a href="javascript:void(0);" id="pntAdd" title="เพิ่มผู้เข้าร่วมประชุม" ><?php echo $img_add; ?></a>
				</td>
			</tr>
		</tfoot>
		<tbody class="sortable">
			<?php	
				if(isset($arr_pnt) && !empty($arr_pnt)){
					// Load model
					$arr_model = isset($arr_model) ? $arr_model : "";
					// To get time meeting
					$mact = ( !empty($arr_model["mact"]) ) ? $arr_model["mact"] : "";
					
					$i = 0;
					foreach($arr_pnt as $key => $value){
						$pnt_id = $value["pnt_id"];
						$pnt_parent_id = $value["pnt_parent_id"];
						$pnt_parent_adminId = $value["pnt_parent_adminId"];
						$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
						$name = $value["pnt_name"];
						$adminName = $value["pnt_adminName"];
						$deptName = $value["pnt_deptName"];
						$ag_name = $value["pnt_ag_name"];
						$pnt_instead_id = $value["pnt_instead_id"];
						
						$pnt_chk_id = $pnt_id;
						$inst_name = "";
						if($pnt_instead_id){
							// get child instead
							$arr_inst = get_arrPnt(null, $pnt_instead_id, $arr_model, $cond="", $flag_edit=0);
							if(!empty($arr_inst)){
								foreach($arr_inst as $inst_key => $inst_val){
									$pnt_chk_id = $inst_val["pnt_id"];
									$inst_name = $inst_val["pnt_name"];
								}
							}
						}
						
						// check access time
						$mact->act_pnt_id = $pnt_chk_id;
						$qu_act = $mact->getByPntId();
						$checked = "";
						if($qu_act->num_rows()){
							if($qu_act->row()->act_flag_absent != 1 && $qu_act->row()->act_flag_absent != NULL){
								// present
								$checked = "checked=\"checked\"";
							}
						}
						
						$rowPnt_Edit = "<tr id=\"{$pnt_parent_id}\">";	// update seq by parent_id
						$rowPnt_Edit .= "<td>";
						$rowPnt_Edit .= "<input type=\"checkbox\" name=\"chk_invite[]\" class=\"chk_invite\" value=\"{$pnt_chk_id}\" {$checked} />";
						$rowPnt_Edit .= "<input type=\"hidden\" name=\"pnt_id[]\" value=\"{$pnt_chk_id}\" />";
						$rowPnt_Edit .= "</td>";
						$rowPnt_Edit .= "<td nowrap=\"nowrap\"  style=\"padding-top:10px;padding-bottom:10px;\" >";
						$rowPnt_Edit .= "{$name}";
						//  ผู้เข้าร่วมประชุมแทน
						if($pnt_instead_id){
							$rowPnt_Edit .= "<br/>";
							$rowPnt_Edit .= "<comment style=\"padding-left:0px;\" >[ {$inst_name} (ผู้แทน) ]</comment>";
						}
						$rowPnt_Edit .= "</td>";
						/*$rowPnt_Edit .= "<td>";
						if($pnt_parent_adminId){
							$rowPnt_Edit .= $adminName;
						}
						$rowPnt_Edit .= "</td>";*/
						$rowPnt_Edit .= "<td width=\"25%\">".$deptName."</td>";
						$rowPnt_Edit .= "<td nowrap=\"nowrap\" >".$ag_name."</td>";
						
						// หมายเหตุ
						$note = $mact->getNote($pnt_chk_id);
						$rowPnt_Edit .= "<td class=\"action\">";
						//$rowPnt_Edit .= "<a href=\"javascript:void(0);\" class=\"pntEdit\" title=\"เหตุผลที่ไม่เข้าร่วมประชุม\" style=\"margin:3px;\" onclick=\"notefancybox('{$pnt_id}')\">".$imgNote."</a>";
						$rowPnt_Edit .= "<textarea name=\"act_note_absent[{$pnt_chk_id}]\" rows=\"1\" >".$note."</textarea>";
						$rowPnt_Edit .= "</td>";
						
						$rowPnt_Edit .= "<td class=\"action\">";
						// เพิ่มผู้เข้าร่วมประชุมแทน
						$rowPnt_Edit .= "<a href=\"javascript:void(0);\" class=\"pntEdit\" title=\"ผู้เข้าร่วมประชุมแทน\" style=\"margin:3px;\" onclick=\"callfancybox('{$pnt_id}')\">".$imgInst."</a>";
						$rowPnt_Edit .= "</td>";
						$rowPnt_Edit .= "</tr>";
						$rowPnt_Edit .= "</tr>";
						echo $rowPnt_Edit;
						
						$i++;
					}
				}
			?>
		</tbody>
	</table>
	<div align="right" style="padding:10px 10px 10px 10px">
		<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" class="da-button green"/>
		<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id;?>" />
		<input type="hidden" name="mt_id" id="mt_id" value="<?php echo $mt_id;?>" />
	</div>
	<?php
		echo form_close();
	?>
			</div>
		</div>
	</div>
	<div><span style="padding-right:130px;">&nbsp;</span> </div>