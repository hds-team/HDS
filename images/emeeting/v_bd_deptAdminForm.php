<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/ui.js"></script>
<?php 
	echo link_tag('css/emt_css/ui.css');
	
	if(isset($qu_dp)){
		$row_dp = $qu_dp->row();
		$s_deptId = $row_dp->deptId;
	}
	else{
		$row_dp = NULL;
		$s_deptId = "";
	}
?>
<script>
$(document).ready(function(){
	// Init
	url_dep = site_url + "bdEmeeting/setDeptAdmin";
	
	//Add event
	//$("#btnSubmit").attr("disabled","disabled");
	//$("#add_deptId").change(getEnable);
	//$(".chk_dpa").live("click",getEnable);
	$("#s_deptId").change(getPsByDp);
	
	//Function
	function getPsByDp()
	{
		var dp_id = $(this).val();
		if(dp_id == ""){
			sendPost("frmDeptAdmin","",url_dep,"","");
		}
		else{
			sendPost("frmDeptAdmin",{"s_deptId":dp_id},url_dep,"","");
		}
	}
	
	/*function getEnable()
	{
		if($(this).attr("checked") !== false)
			$("#btnSubmit").removeAttr("disabled");
	}
	*/
});

function chk_valid(){
	var personId = $(".type1").find("input[name='add_personId']").val();
	var personName = $(".type1").find("input[name='add_personName']").val();
	var deptId = $("#add_deptId").val();
	
	if(personName == ""){
		alert("กรุณากรอกผู้ดูแลระบบระดับหน่วยงาน!");
		return false;
	}
	else if(personId == ""){
		alert("ไม่พบรหัสบุคลากร กรุณากรอกข้อมูลใหม่อีกครั้ง!");
		return false;
	}
	else if(deptId == ""){
		alert("กรุณาเลือกหน่วยงาน!");
		return false;
	}
	return true;
}

function dpaEdit(dpa_id){
	var url = site_url + "bdEmeeting/setDeptAdmin";
	var deptId = "<?php echo $s_deptId; ?>";
	
	if(deptId == ""){
		sendPost("dpaEdit",{"dpa_id":dpa_id, "flag_edit":"1"},url,"","");
	}
	else{
		sendPost("dpaEdit",{"s_deptId":deptId, "dpa_id":dpa_id, "flag_edit":"1"},url,"","");
	}
}

function dpaDel(dpa_id, warnMsg){
	var url = site_url + "bdEmeeting/setDeptAdmin";
	var deptId = "<?php echo $s_deptId; ?>";
	
	if(deptId == ""){
		sendPost("dpaDel",{"dpa_id":dpa_id, "flag_del":"1"},url,"","คุณต้องการลบ \""+warnMsg+"\" ใช่หรือไม่");
	}
	else{
		sendPost("dpaDel",{"s_deptId":deptId, "dpa_id":dpa_id, "flag_del":"1"},url,"","คุณต้องการลบ \""+warnMsg+"\" ใช่หรือไม่");
	}
}

// Implement to your program
function acLink(id){
	var data = globaldata[id];
	if(get == "getPerson"){ //link in Person
		//set value in Person
		obj.parents(".type1").find("input[name=add_personId]").val(data.personId);
		obj.parents(".type1").find("input[name=add_personName]").val(data.name);
	} 
	
	$(".autocomplete-block").remove();
}
function acStart(obj){
	if(get == "getPerson"){ //link in Person
		personId = obj.parent().find("input[name=add_personId]").val();
		if(personId > 0){
			obj.parents(".type1").find("input[name=add_personId]").val("");
		}
	}
}
</script>

	<div class="grid_4_center">
     <div class="da-panel collapsible">
        <div class="da-panel-header">
            <span class="da-panel-title">
            <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
                                    กำหนดผู้ดูแลระบบของหน่วยงาน
            </span>
        </div>
	
	<?php
		$action = "bdEmeeting/setDeptAdmin";
		echo form_open($this->config->item("emt_path").$action,"frmDeptAdmin");
	?>
	<div class="da-panel-content">
        <table class="da-table da-detail-view">
		<tbody>
			<tr class="type1">
				<th align="right" nowrap="nowrap" ><label>ชื่อ - นามสกุล  </label></th>
				<td>
					<?php
						$edt_dpa_id = $edt_personId = $edt_personName = $edt_deptId = "";
						if(isset($qu_edt) && $qu_edt->num_rows()){
							foreach($qu_edt->result() as $val){
								$edt_dpa_id = $val->dpa_id;
								$edt_personId = "value=\"{$val->personId}\" ";
								$name = $val->fName." ".$val->lName;
								$edt_personName = "value=\"{$name}\" ";
								$edt_deptId = $val->dpa_dp_id;
							}
						}
						
						$row_ps = "<input type=\"hidden\" name=\"add_personId\" {$edt_personId} />";
						$row_ps .= "<input type=\"text\" class=\"autocomplete\" ";
						$row_ps .= "title=\"บุคคลากร\" get=\"getPerson\" name=\"add_personName\" style=\"width:80%\" {$edt_personName} />";
						echo $row_ps;
					?>
				</td>
			</tr>
			<tr>
				<th><label>หน่วยงาน </label></th>
				<td>
					<?php
						echo form_dropdown("add_deptId", $opt_dp, $edt_deptId, 'id="add_deptId"');
					?>
				</td>
			</tr>
</div>
<tr>
				<td colspan="3" >
	<div class="da-button-row" align = "right">
		<input type="hidden" name="dpa_id" value="<?php echo $edt_dpa_id; ?>" >
		<input type="hidden" name="s_deptId" value="<?php echo $s_deptId; ?>" >
		<input type="submit" name="submit" id="btnSubmit" value="บันทึก" onclick="return chk_valid();"class="da-button green"/>
	</div>
		</td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
	<?php
		echo form_close();
	?>
	
	<p>&nbsp;</p>
	
	<!--div style="margin-bottom:30px;width:100%;" align="left">
		<table style="margin-right:25px;width:50%;" align="left" border="0">
			<tbody>
				<tr>
					<td align="left" ><b>ค้นหาหน่วยงาน </b></td>
					<td align="left" width="100px;">
						<?php
							$js = 'id="s_deptId"';
							echo form_dropdown("s_deptId", $rs_dp, emt_getval("deptId", $row_dp), $js);
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div-->
	
	<?php
		if(!empty($arr_adp)){
		
			$edit = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/application_edit.png",
				"width" => "16",
				"border" => "0"
			);
			$imgEdit = img($edit);
			
			$del = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/cross.png",
				"width" => "16",
				"border" => "0"
			);
			$imgDel = img($del);
			
			echo "<div style=\"margin-left:0px;margin-bottom:30px;\" alegn=\"left\" >";
			?>
			
			</div>
			<div class="grid_4">
			<div class="da-panel collapsible">
			<div class="da-panel-header">
            <span class="da-panel-title">
			<img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
			ผู้ดูแลระบบของหน่วยงาน 
            </span>
			</div>
			<div class="da-panel-content">
			<div style="text-align:right;">ค้นหาหน่วยงาน : <?php
			$js = 'id="s_deptId"';
			echo form_dropdown("s_deptId", $rs_dp, emt_getval("deptId", $row_dp), $js);
			?>
			<?php
			echo "<table class=\"da-table\" style=\"width:100%;font-size:16px;\" align=\"center\" border=\"0\" >";
				echo "<thead>";
					echo "<tr>";
						echo "<th width=\"10%\" >ลำดับที่</th>";
						echo "<th width=\"15%\" >รหัสบุคลากร</th>";
						echo "<th width=\"40%\" >ผู้ดูแลระบบของหน่วยงาน</th>";
						echo "<th>หน่วยงาน</th>";
						echo "<th class=\"action\" width=\"80px;\" >ดำเนินการ</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				foreach($arr_adp as $dp_key => $dp_val){
					// department	#C2CFDF
					echo "<tr>";
					echo "<td colspan=\"5\" align=\"left\" style=\"background-color:#DFE6EF;\";><b>".$dp_val["deptName"]."</b></td>";
					echo "</tr>";
					
					// admin
					$line = 0;
					foreach($dp_val as $dpa_key => $dpa_val){
						// admin
						if(is_array($dpa_val)){
							$line++;
							echo "<tr>";
								echo "<td align=\"center\">{$line}<input type=\"hidden\" name=\"dpa_id\" value=\"{$dpa_val["dpa_id"]}\" ></td>";
								echo "<td align=\"center\" >{$dpa_val["ps_personCode"]}</td>";
								echo "<td nowrap=\"nowrap\" >{$dpa_val["ps_personName"]}</td>";
								echo "<td>{$dpa_val["ps_deptName"]}</td>";
								echo "<td class=\"action\" align=\"center\">";
									$warnMsg = $dpa_val["ps_personName"];
									echo "<a href=\"javascript:void(0);\" class=\"dpaEdit\" style=\"margin:3px;\" title=\"แก้ไขผู้ดูแลระบบของหน่วยงาน\" onclick=\"dpaEdit('{$dpa_val["dpa_id"]}')\" >".$imgEdit."</a>";
									echo "<a href=\"javascript:void(0);\" class=\"dpaDel\" title=\"ลบผู้ดูแลระบบของหน่วยงาน\" onclick=\"dpaDel('{$dpa_val["dpa_id"]}','{$warnMsg}')\" >".$imgDel."</a>";
								echo "</td>";
							echo "</tr>";
						}
					}
					if($line == 0){
						echo "<tr >";
						echo "<td colspan=\"3\" align=\"center\" class=\"red\" >";
						echo "<div align=\"center\">
						{$this->config->item("emt_not_found")}
						</div>";
						echo "</td>";
							echo "</tr>";
					}
				}
				echo "</tbody>";
			echo "</table>";
			echo "</div>";
			?>
			   </div>
			      </div>
				     </div>
			<?php
			
			/*foreach($arr_adp as $dp_key => $dp_val){
				// department
				echo "<div style=\"margin-left:0px;margin-bottom:30px;\" alegn=\"left\" >";
				echo "<div style=\"margin-left:25px;padding-bottom:10px;font-size:16px;\" align=\"left\" >".$dp_val["deptName"]."</div>";
				
				echo "<table class=\"emt_table\" style=\"width:95%;\" align=\"center\" border=\"0\" >";
				echo "<thead>";
					echo "<tr>";
						echo "<th width=\"10%\" >ลำดับที่</th>";
						echo "<th width=\"15%\" >รหัสบุคลากร</th>";
						echo "<th width=\"40%\" >ผู้ดูแลระบบของหน่วยงาน</th>";
						echo "<th>หน่วยงาน</th>";
						echo "<th class=\"action\" nowrap=\"nowrap;\" >ดำเนินการ</th>";
					echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
					
				$line = 0;
				foreach($dp_val as $dpa_key => $dpa_val){
					// admin
					if(is_array($dpa_val)){
						$line++;
						echo "<tr>";
							echo "<td align=\"center\">{$line}<input type=\"hidden\" name=\"dpa_id\" value=\"{$dpa_val["dpa_id"]}\" ></td>";
							echo "<td align=\"center\" >{$dpa_val["ps_personCode"]}</td>";
							echo "<td nowrap=\"nowrap\" >{$dpa_val["ps_personName"]}</td>";
							echo "<td>{$dpa_val["ps_deptName"]}</td>";
							echo "<td class=\"action\" >";
								$warnMsg = $dpa_val["ps_personName"];
								echo "<a href=\"javascript:void(0);\" class=\"dpaEdit\" style=\"margin:3px;\" title=\"แก้ไขผู้ดูแลระบบของหน่วยงาน\" onclick=\"dpaEdit('{$dpa_val["dpa_id"]}')\" >".$imgEdit."</a>";
								echo "<a href=\"javascript:void(0);\" class=\"dpaDel\" title=\"ลบผู้ดูแลระบบของหน่วยงาน\" onclick=\"dpaDel('{$dpa_val["dpa_id"]}','{$warnMsg}')\" >".$imgDel."</a>";
							echo "</td>";
						echo "</tr>";
					}
				}
				if($line == 0){
					echo "<tr><td colspan=\"5\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td></tr>";
				}
				echo "</tbody>";
				echo "</table>";
				echo "</div>";
			}
			*/
		}
		/*else{
			echo "<div class=\"red\" align=\"center\">{this->config->item("emt_not_found")}</div>";
		}*/
	?>
</div>

<p>&nbsp;</p>