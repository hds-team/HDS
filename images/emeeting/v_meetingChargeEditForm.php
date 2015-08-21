<?php 
	echo link_tag('css/emt_css/emt_css.css');
	echo link_tag('css/emt_css/message/message.css');
	echo link_tag('css/emt_css/validate.css');
	echo link_tag('css/emt_css/autocomplate.css');
?>

<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/emt_js.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/message.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<script type="text/javascript">
	var site_url = "<?php echo site_url().$this->config->item('emt_folder'); ?>";
	var ajax_url = site_url + "emeetingAjax/";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/autocomplate.js"></script>

<script>
$(document).ready(function(){
	
	// Add event
	$("#delChrg").click(delChrg);
	
	// Function
	function delChrg(){
		var url = site_url + "emeeting/emeetingAddCharge";
		var pnt_id = $("input[name='pnt_id']").val();
		var msgDel = "รักษาการแทน<?php echo $pnt_parent_adminName; ?>";
		sendPost("pntDel",{"pnt_id":<?php echo $pnt_parent_id; ?>,"pnt_charge_id":pnt_id,"flag_del":"1"},url,"","คุณต้องการลบ \""+msgDel+"\" ใช่หรือไม่");
	}
});

// Implement to your program
function acLink(id){
	var data = globaldata[id];
	if(get == "getPerson"){ //link in Person
		//set value in Person
		obj.parents(".type1").find("input[name^=pnt_personId]").val(data.personId);
		obj.parents(".type1").find("input[name^=personName]").val(data.name);
		//set value in adminName
		obj.parents(".type1").find("input[name^=pnt_adminId]").val(data.adminId);
		obj.parents(".type1").find("input[name^=adminName]").val(data.adminName);
		//set value in deptname
		obj.parents(".type1").find("input[name^=pnt_deptId]").val(data.deptId);
		obj.parents(".type1").find("input[name^=deptName]").val(data.deptName); 
		//set value in email	
		obj.parents(".type1").find("input[name^=pnt_email]").val(data.email); 
	}
	
	$(".autocomplete-block").remove();
}
function acStart(obj){
	if(get == "getPerson"){ //link in Person
		personId = obj.parent().find("input[name^=pnt_personId]").val();
		if(personId > 0){
			obj.parents(".type1").find("input[name^=pnt_personId]").val("");
			obj.parents(".type1").find("input[name^=pnt_adminId]").val("");
			obj.parents(".type1").find("input[name^=adminName]").val("");
			obj.parents(".type1").find("input[name^=pnt_deptId]").val("");
			obj.parents(".type1").find("input[name^=deptName]").val("บุคคลภายนอก");
			obj.parents(".type1").find("input[name^=pnt_email]").val("");
		}
	}
}	
</script>

<style>
	body{
		font-size : 13px;
	}
	.head{
		margin-top:20px;
		margin-bottom:25px;
		font-size:20px;
		font-weight:bold;
		text-align:center;
	}
	a{
		text-decoration:none;
		font-size:13px;
	}
</style>
<div id="content-body">
	<div class="head">รักษาการแทน <span class="note"  style="font-size:13px;">( <?php echo $pnt_parent_adminName; ?> )</span></div>
	<?php		
		$pnt_id = $pnt_personId = $pnt_op_id = $name = $pnt_adminId = $pnt_deptId = $adminName = $deptName = $pnt_ag_id = $ag_name = $pnt_quorum = $quorum_name = $pnt_typeAgenda = $pnt_charge_id = $pnt_flag_charge = $pnt_email = "";
		if(isset($chrg_pnt_id)){
			$pnt_id = $chrg_pnt_id;
			$pnt_personId = $chrg_personId;
			$pnt_op_id = $chrg_op_id;
			$name = $chrg_name;
			$pnt_adminId = $chrg_adminId;
			$pnt_deptId = $chrg_deptId;
			$adminName = $chrg_adminName;
			$deptName = $chrg_deptName;
			$pnt_ag_id = $chrg_ag_id;
			$ag_name = $chrg_ag_name;
			$pnt_quorum = $chrg_quorum_id;
			$quorum_name = $chrg_quorum_name;
			$pnt_typeAgenda = $chrg_typeAgenda;
			$pnt_charge_id = $chrg_charge_id;
			$pnt_flag_charge = $chrg_flag_charge;
			$pnt_email = $chrg_email;
		}
	?>
	
	<?php
		$action = "emeeting/emeetingAddCharge";
		echo form_open($this->config->item("emt_path").$action,"frmType1");
	?>
	<table style="width:95%;" align="center" class="emt_table">
		<thead>
			<tr>
				<th>ชื่อ-นามสกุล</th>
				<th>ตำแหน่ง</th>
				<th>หน่วยงาน</th>
				<th colspan="2">ตำแหน่งในการประชุม</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$edt_pnt_id = $edt_pnt_personId = $edt_pnt_op_id = $edt_name = $edt_pnt_adminId = $edt_pnt_deptId = $edt_adminName = $edt_deptName = $edt_pnt_email = "";
				if($pnt_typeAgenda == 0){
					$edt_pnt_id = "value=\"{$pnt_id}\" ";
					$edt_pnt_personId = "value=\"{$pnt_personId}\" ";
					$edt_pnt_op_id = "value=\"{$pnt_op_id}\" ";
					$edt_name = "value=\"{$name}\" ";
					$edt_pnt_adminId = "value=\"{$pnt_adminId}\" ";
					$edt_adminName = "value=\"{$adminName}\" ";
					$edt_pnt_deptId = "value=\"{$pnt_deptId}\" ";
					$edt_deptName = "value=\"{$deptName}\" ";
					$edt_pnt_email = "value=\"{$pnt_email}\" ";
				}

				$rowPnt_type1 = "<tr class=\"type1\">";
				$rowPnt_type1 .= "<td>";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_id\" {$edt_pnt_id} />";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_personId\" {$edt_pnt_personId} />";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_op_id\" {$edt_pnt_op_id} />";
				$rowPnt_type1 .= "<input type=\"text\" class=\"autocomplete validate\" ";
				$rowPnt_type1 .= "title=\"บุคคลากร\" get=\"getPerson\" name=\"personName\" {$edt_name} />";
				$rowPnt_type1 .= "</td>";
				$rowPnt_type1 .= "<td>";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_adminId\" {$edt_pnt_adminId} />";
				$rowPnt_type1 .= "<input type=\"text\" name=\"adminName\" {$edt_adminName} />";
				$rowPnt_type1 .= "</td>";
				$rowPnt_type1 .= "<td>";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_deptId\" {$edt_pnt_deptId} />";
				$rowPnt_type1 .= "<input type=\"text\" name=\"deptName\" {$edt_deptName} />";
				$rowPnt_type1 .= "</td>";
				$rowPnt_type1 .= "<td nowrap=\"nowrap\" >";
				if($ag_name == ""){
					// init by parent
					$ag_name = $pnt_parent_ag_name;
				}
				$rowPnt_type1 .= $ag_name;
				$rowPnt_type1 .= "</td>";
				$rowPnt_type1 .= "<td nowrap=\"nowrap\" >";
				if($quorum_name == ""){
					// init by parent
					$quorum_name = $pnt_parent_quorum_name;
				}
				$rowPnt_type1 .= $quorum_name;
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_email\" {$edt_pnt_email} />";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"mt_id\" value=\"{$mt_id}\" />";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_typeAgenda\" value=\"0\" />";
				$rowPnt_type1 .= "<input type=\"hidden\" name=\"pnt_parent_id\" value=\"{$pnt_parent_id}\" />";
				$rowPnt_type1 .= "</td>";
				$rowPnt_type1 .= "</tr>";
				echo $rowPnt_type1;
			?>
		</tbody>
	</table>
	<div style="text-align:center;margin-top:30px;">
		<input type="submit" name="submit" value="บันทึก" />
		<?php 
			if($pnt_id){
				?>
				<input type="button" name="delChrg" id="delChrg" value="ลบ" />
				<?php
			}
		?>
	</div>
	<?php
		echo form_close();
	?>
</div>