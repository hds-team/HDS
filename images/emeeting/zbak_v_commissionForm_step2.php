<script type="text/javascript" src="http://cvs.buu.ac.th/missci/new_ci/js/emt_js/ui.js"></script>
<?php 
echo link_tag('css/emt_css/ui.css');
$edit = isset($edit);
$row = isset($rs_cms)?$rs_cms->row():null;

?>
<script>
$(document).ready(function(){
	// Init
	var rowPnt = "<tr>";
	<?php
	if($typeAgenda == 0){
	?>
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" class=\"autocomplete validate\"";
	rowPnt += "title=\"บุคคลากร\" get=\"getPerson\" name=\"personName[]\"/>";
	rowPnt += "<input type=\"hidden\" name=\"personId[]\"/>";
	rowPnt += "</td>";
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" name=\"adminName[]\" />";// disabled=\"disabled\"
	rowPnt += "</td>";
	<?php
	}
	if($typeAgenda == 1){
	?>
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\"  class=\"autocomplete\" ";
	rowPnt += "get=\"getAdmin\" name=\"adminName[]\" />";// disabled=\"disabled\"
	rowPnt += "<input type=\"hidden\" name=\"adminId[]\"/>";
	rowPnt += "</td>";
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" ";
	rowPnt += "name=\"personName[]\" class=\"validate\" title=\"ชื่อ-นามสกุล\"  />";
	rowPnt += "<input type=\"hidden\" name=\"personId[]\" />";
	rowPnt += "</td>";
	<?php
	}
	?>
	rowPnt += "<td>";
	rowPnt += "<input type=\"text\" name=\"deptName[]\" />";// disabled=\"disabled\"
	rowPnt += "</td>";
	rowPnt += "<td>";
	rowPnt += "<select type=\"text\" class=\" validate\" ";
	rowPnt += "title=\"ตำแหน่งในการประชุม\" get=\"getAgency\" name=\"ag_id[]\" >";
	rowPnt += "<option value=\"\">--โปรดเลือกตำแหน่งในการประชุม--</option>";
	<?php
	foreach($rs_ag->result() as $row_ag){
	?>
	rowPnt += "<option value=\"<?php echo $row_ag->ag_id; ?>\"><?php echo $row_ag->ag_name; ?></option>";
	<?php
	}
	?>
	rowPnt += "</select>";
	rowPnt += "</td>";
	<?php 
	$del = array(
		"src" => "images/emeeting/icons/del.png",
		"width" => "16"
	);
	$img_del = img($del);
	?>
	rowPnt += "<td class=\"action\"><a href=\"javascript:void(0);\" id=\"pntDel\" >";
	rowPnt += "<?php echo addslashes($img_del); ?></a></td>";
	rowPnt += "</tr>";
	
	$(".sortable").sortable({
		placeholder: "ui-state-highlight",
		opacity: 0.95,
		delay: 50,
		stop:function(event, ui){
			var url = "<?php echo site_url() . "/emeeting/agenda/agtpSeq"; ?>";
			var index = $(this).sortable('toArray');
			$.post(url,{index:index},function(data){
			});
		}
		
	});
	
	<?php
	if( ! $edit){
	?>
	// Add rowPnt
	$("#pnt_table tbody").append(rowPnt);
	<?php
	}
	?>
	$("#typeAgenda option[value=<?php echo $typeAgenda;?>]").attr("selected","selected");
	
	
	// Add Event
	$("#pntAdd").live("click",pntAdd);
	$("#pntDel").live("click",pntDel);
	$("input[name^=personName]").live("blur",personName);
	/*$("input[name^=ag_name]").live("blur",ag_name);*/
	$("form").submit(ckform);
	$("#back").click(back);
	$("#typeAgenda").change(typeAgenda);
	
	// Function
	function pntAdd(){
		$("#pnt_table tbody").append(rowPnt);
	}
	function pntDel(){
		if(!confirm("คุณยืนที่จะต้องการลบ")){
			return false;
		}
		$(this).parents("tr:first").remove();
	}
	function personName(){
		var byAdmin = <?php echo $typeAgenda; ?>;
		var personName = $(this).val();
		if(personName.length > 0){
			var personId = $(this).parent().find("input[name^=personId]").val();
			if( personId.length == 0){
				/*
				$(this).val("");
				$(".autocomplete-block").remove();
				alert("ไม่มีบุคลากรนี้ในระบบ");
				$(this).focus();
				*/
				$(".autocomplete-block").remove();
				//$(this).parents("tr:first").find("input[name^=adminName]").removeAttr("disabled");
				//$(this).parents("tr:first").find("input[name^=deptName]").removeAttr("disabled");
			} else if( byAdmin ){
				$(this).parents("tr:first").find("input[name^=personId]").val("");
				$(this).parents("tr:first").find("input[name^=adminId]").val("");
			}
		} 
	}
	/*function ag_name(){
		var agName = $(this).val();
		if(agName.length > 0){
			var agId = $(this).parent().find("input[name^=ag_id]").val();
			if(agId.length == 0){
				$(this).val("");
				$(".autocomplete-block").remove();
				alert("ไม่มีตำแหน่งนี้ในระบบ");
				$(this).focus();
			}
		} 
	}*/
	function ckform(){
		flag = 0;
		$("select[name^=ag_id]").each(function(index) {
			ag_id = $(this).val();
			for( id in ag_ok){
				if(ag_id == ag_ok[id]){
					flag = 1;
				}
			}
		});
		if(flag == 0){
			alert("การกำหนดบุคคลากร จำเป็นต้องมี ผู้ที่มีสิทธิ์ในการจัดประชุมอย่างน้อย 1 คน");
			$("comment").css("border","1px solid #FFAAAA").css("background","#FFFAFA");
			setTimeout(function(){
				$("comment").css("border","1px solid #FFFFFF").css("background","#FFFFFF");
			},4500);
			return false;
		}
	}
	
	function typeAgenda(){
		url = site_url+"emeeting/commissionAdd";
		typeVal = $(this).val();
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,step:2,typeAgenda:typeVal}, url, "", "")
	}
	
	function back(){
		url = site_url+"emeeting/commissionView";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
});

// Implement to your program
function acLink(id){
	var data = globaldata[id];
	if(get == "getPerson"){ //link in Person
		//set value in PersonId
		obj.parents("tr:first").find("input[name^=personId]").val(data.personId);
		//set value in Person name		
		obj.val(data.name);
		//set value in PersonId  $row->deptname
		obj.parents("tr:first").find("input[name^=deptName]").val(data.deptName); 
		//set value in PersonId  $row->deptname
		obj.parents("tr:first").find("input[name^=adminName]").val(data.adminName); 
	} 
	else if(get == "getAdmin"){
		//set value in Admin name		
		obj.val(data.name);
		//set value in adminId
		obj.parents("tr:first").find("input[name^=adminId]").val(data.adminId);
		//set value in PersonId
		obj.parents("tr:first").find("input[name^=personId]").val(data.personId);
		//set value in Person name
		obj.parents("tr:first").find("input[name^=personName]").val(data.personName);
		//set value in deptName
		obj.parents("tr:first").find("input[name^=deptName]").val(data.deptName);
	}
	/* else if(get == "getAgency"){
		obj.parent().find("input[name^=ag_id]").val(cols[0]); //set value in ag_id
		obj.parent().find("input[name^=ag_name]").val(cols[1]); //set value in ag_name
	}*/
	
	$(".autocomplete-block").remove();
}
function acStart(obj){
	if(get == "getPerson"){ //link in Person
		personId = obj.parent().find("input[name^=personId]").val();
		if(personId > 0){
			obj.parents("tr:first").find("input[name^=personId]").val("");
			obj.parents("tr:first").find("input[name^=adminName]").val("");
			obj.parents("tr:first").find("input[name^=deptName]").val("บุคคลภายนอก");
		}
	}
	else if(get == "getAdmin"){
		adminId = obj.parent().find("input[name^=adminId]").val();
		if(adminId > 0){
			obj.parents("tr:first").find("input[name^=adminId]").val("");
			obj.parents("tr:first").find("input[name^=personId]").val("");
			obj.parents("tr:first").find("input[name^=personName]").val("");
			obj.parents("tr:first").find("input[name^=deptName]").val("บุคคลภายนอก");
		}
	}
	/* else if(get == "getAgency"){
		ag_id = obj.parent().find("input[name^=ag_id]").val();
		if(ag_id > 0){
			obj.parent().find("input[name^=ag_id]").val("");
		}
	}*/
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
	.icon{
		cursor : pointer;
	}
</style>
<div id="content">
	<div id="content-header">
		<div id="guide">
			<?php
			if(isset($menu)){
				echo guide($menu,2);
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
		if( ! $edit ){
			$action = "emeeting/commissionAdd";
		} else {
			$action = "emeeting/commissionEditPtp";
		}
		echo form_open($this->config->item("emt_path").$action,"frmCms");
		?>
		<h3>กำหนดบุคคลากร &nbsp;&nbsp;
			<?php
			if($edit == 0){
			?>
			<select id="typeAgenda" name="typeAgenda">
				<option value="0">
					โดยชื่อ
				</option>
				<option value="1">
					โดยตำแหน่ง
				</option>
			</select>
			<?php
			}
			?>
		</h3>
		
		<table style="width:95%;" align="center" class="emt_table" id="pnt_table">
			<thead>
				<tr>
					<?php
					if($typeAgenda == 0){
					?>
					<th>ชื่อ-นามสกุล</th>
					<?php
					}
					?>
					<th>ตำแหน่ง</th>
					<?php
					if($typeAgenda == 1){
					?>
					<th>ชื่อ-นามสกุล</th>
					<?php
					}
					?>
					<th>หน่วยงาน</th>
					<th>ตำแหน่งในการประชุม</th>
					<th class="action" width="40">ลบ</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="4">&nbsp;</td>
					<td class="action">
						<?php 
						$add = array(
							"src" => "images/emeeting/icons/add.png",
							"width" => "16"
						);
						$img_add = img($add);
						?>
						<a href="javascript:void(0);" id="pntAdd"><?php echo $img_add; ?></a>
					</td>
				</tr>
			</tfoot>
			<tbody class="sortable">
			<?php
			if( $edit ){
				if($rs_ptp->num_rows > 0){
					foreach($rs_ptp->result() as $row_ptp){
						$name = $name_id = $admin = $adminId = $dept = "";
						if($row_ptp->ptp_op_id!=NULL){
							$name = $row_ptp->op_name;
							if($row_ptp->op_pos != "" OR $row_ptp->op_org != ""){
								$admin 		= $row_ptp->op_pos;
								$dept 		= $row_ptp->op_org;
							}
						} else if($row_ptp->ptp_personId!=NULL){
							$name 		= $row_ptp->prefixName.$row_ptp->fName . "   " . $row_ptp->lName;
							$name_id 	= $row_ptp->ptp_personId;
							if($row_ptp->adminName != "" OR $row_ptp->deptName != ""){
								if($row_ptp->adminName == "หัวหน้าภาควิชา"){
									$admin 	= $row_ptp->adminName . " " . $row_ptp->deptName;
								} else {
									$admin 	= $row_ptp->adminName;
								}
								$dept 		= $row_ptp->deptName; 
								$adminId	= $row_ptp->adminId;
							}
						}
						$ptp_id = $row_ptp->ptp_id;
						$rowPnt_edit = "<tr>";
						if($typeAgenda == 0){
							$rowPnt_edit .= "<td>";
							$rowPnt_edit .= "<input type=\"text\" class=\"autocomplete validate\" ";
							$rowPnt_edit .= "title=\"บุคคลากร\" get=\"getPerson\" name=\"personName[]\"";
							$rowPnt_edit .= "value=\"{$name}\"/>";
							$rowPnt_edit .= "<input type=\"hidden\" name=\"personId[]\" ";
							$rowPnt_edit .= "value=\"{$name_id}\"/>";
							$rowPnt_edit .= "</td>";
							$rowPnt_edit .= "<td>";
							$rowPnt_edit .= "<input type=\"text\" name=\"adminName[]\" ";
							$rowPnt_edit .= "value=\"{$admin}\"/>";
							$rowPnt_edit .= "</td>";
						}
						if($typeAgenda == 1){
							$rowPnt_edit .= "<td>";
							$rowPnt_edit .= "<input type=\"text\"  class=\"autocomplete\" ";
							$rowPnt_edit .= "title=\"ตำแหน่ง\"  get=\"getAdmin\" name=\"adminName[]\" ";
							$rowPnt_edit .= "value=\"{$admin}\"/>";
							$rowPnt_edit .= "<input type=\"hidden\" name=\"adminId[]\" ";
							$rowPnt_edit .= "value=\"{$adminId}\"/>";
							$rowPnt_edit .= "</td>";
							$rowPnt_edit .= "<td>";
							$rowPnt_edit .= "<input type=\"text\" ";
							$rowPnt_edit .= "name=\"personName[]\" class=\"validate\" ";
							$rowPnt_edit .= "value=\"{$name}\"/>";
							$rowPnt_edit .= "<input type=\"hidden\" name=\"personId[]\" ";
							$rowPnt_edit .= "value=\"{$name_id}\"/>";
							$rowPnt_edit .= "</td>";
						}
						$rowPnt_edit .= "<td>";
						$rowPnt_edit .= "<input type=\"text\" name=\"deptName[]\" ";
						$rowPnt_edit .= "value=\"{$dept}\"/>";
						$rowPnt_edit .= "</td>";
						$rowPnt_edit .= "<td>";
						$rowPnt_edit .= "<select type=\"text\" class=\" validate\" ";
						$rowPnt_edit .= "title=\"ตำแหน่งในการประชุม\" get=\"getAgency\" name=\"ag_id[]\" >";
						$rowPnt_edit .= "<option value=\"\">--โปรดเลือกตำแหน่งในการประชุม--</option>";
						foreach($rs_ag->result() as $row_ag){
							$selected = "";
							if($row_ag->ag_id ==  $row_ptp->ptp_ag_id){
								$selected = "selected=\"selected\"";
							}
							$rowPnt_edit .= "<option value=\"{$row_ag->ag_id}\" {$selected} >{$row_ag->ag_name}</option>";
						}
						$rowPnt_edit .= "</select>";
						$rowPnt_edit .= "</td>";
						$del = array(
							"src" => "images/emeeting/icons/del.png",
							"width" => "16"
						);
						$img_del = img($del);
						$rowPnt_edit .= "<td class=\"action\"><a href=\"javascript:void(0);\" id=\"pntDel\" >";
						$rowPnt_edit .= $img_del."</a></td>";
						$rowPnt_edit .= "</tr>";
						echo $rowPnt_edit;
					}
				}
			}
				?>
			</tbody>
		</table>
		<div align="center">
			<input type="hidden" name="step" value="2" />
			<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
			<?php
			if( ! $edit ){
				echo "<input type=\"submit\" name=\"submit\" value=\"ถัดไป  >\" />";
			} else {
				echo "<input type=\"submit\" name=\"submit\" value=\"ตกลง\" />";
			}
			?>
		</div>
		<?php
		// Close Form
		echo form_close();
		?>
		<comment>
			* หน้าที่ในการประชุมที่สามารถจัดการประชุมได้มีดังนี้
			<ul>
				<?php 
				foreach($rs_ag->result() as $row_ag){
					if($row_ag->ag_manage!=1){
						continue;
					}
					$ag_ok[] = $row_ag->ag_id;
					echo "<li> - {$row_ag->ag_name}</li>";
				}
				?>
			</ul>
		</comment>
		<script>
			ag_ok = <?php echo json_encode($ag_ok); ?>;
		</script>
	</div>
</div>