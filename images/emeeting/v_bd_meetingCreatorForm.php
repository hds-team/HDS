<script language="javascript">
$(document).ready(function(){
	// Init
	url_dep = site_url + "bdEmeeting/setMeetingCreator";
	
	//Add event
	$("#btnSubmit").attr("disabled","disabled");
	$("select").change(getPsByDp);
	$(".ps_id").live("click",getChecked);
	
	//Function
	function getChecked()
	{
		var tr_parent = $(this).parents("tr:first");
		var val = $(this).attr("checked");
		var flag = "";	
		
		$("#btnSubmit").removeAttr("disabled");
		
		if(val !== false)
		{
			
			flag = true;
		}
		else
		{
			flag = false;
		}
		
		if(flag == true)
		{
			tr_parent.find(":checkbox[name^='private_']").attr("checked",$(this).attr("checked"));
		}
		else
		{
			tr_parent.find(":checkbox[name^='private_']").attr("checked",flag);
			tr_parent.find(":checkbox[name^='public_']").attr("checked",flag);
		}
	}
	
	function getPsByDp()
	{
		dp_id = $(this).val();
		sendPost("frmMeetingCreator",{"dp_id":dp_id},url_dep,"","");
	}
});
</script>
<?php
/*if(isset($qu_dp)){
	$row_dp = $qu_dp->row();
}else if(isset($qu_ps)){
	$row_dp = $qu_ps->row();
}else{
	$row_dp = NULL;
}*/
?>

		<div class="grid_4_center">
            <div class="da-panel collapsible">
				<div class="da-panel-header">
                    <span class="da-panel-title">
					 <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/group.png";?> />
						กำหนดผู้มีสิทธิ์สร้างการประชุม
					<div style="text-align:right;position:absolute;bottom:18px;right:80px;">ค้นหาหน่วยงาน : 	<?php
					$js = 'id="deptId"';
					echo form_dropdown("deptId", $rs_dp, $dp_id, $js);
					?>
					</div>
                    </span>
				</div>
	<!--table style="width:95%;" align="center" border="0">
		<tbody>
			<tr>
				<td align="left"><label><b>หน่วยงาน :</b> </label>
					<?php
						//$js = 'id="deptId"';
						//echo form_dropdown("deptId", $rs_dp, $dp_id, $js);
					?>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
		</tbody>
	</table-->
	
	<?php
		$action = "bdEmeeting/setMeetingCreator";
		echo form_open($this->config->item("emt_path").$action,"frmMeetingCreator");
	?>
			<div class="da-panel-content">
                <table class="da-table">
                   <thead>
                    <tr>
                        <th><input type="checkbox" /></th>
                        <th>รหัสบุคลากร</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>หน่วยงาน</th>
                        <th>รูปแบบการประชุม</th>
					</tr>
                   </thead>
		<tbody>
		<?php
			if( ! empty($rs_ps))
			{
				foreach($rs_ps as $key => $value)
				{
					$check1 = "";
					$check2 = "";
					$check3 = "";
					foreach($rs_mtc->result() as $row)
					{
						if($row->mtc_dp_id == $dp_id && $row->mtc_ps_id == $value["personId"])
						{
							$check1 = "checked=\"checked\"";
						}
						if($row->mtc_dp_id == $dp_id && $row->mtc_ps_id == $value["personId"] && $row->mtc_private == 1)
						{
							$check2 = "checked=\"checked\"";
						}
						if($row->mtc_dp_id == $dp_id && $row->mtc_ps_id == $value["personId"] && $row->mtc_public == 1)
						{
							$check3 = "checked=\"checked\"";
						}
					}
		?>
			<tr>
				<td align="center"><input type="checkbox" name="ps_id[]" class="ps_id" value="<?php echo $value["personId"];?>" <?php echo $check1; ?> /></td>
				<td align="center"><?php echo $value["personCode"];?></td>
				<td><?php echo $value["personName"];?></td>
				<td><?php echo $value["deptName"];?></td>
				<td align="center">
					<table>
						<tr>
							<td align="center">
								<input type="checkbox" name="private_<?php echo $value["personId"];?>" value="1" <?php echo $check2; ?> />
								ส่วนตัว
							</td>
							<td align="center">
								<input type="checkbox" name="public_<?php echo $value["personId"];?>" value="1" <?php echo $check3; ?> />
								ไม่ส่วนตัว
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php
				}
			}
			else
			{
		?>
			<tr>
				<td colspan="5" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
	</table>
	</div>
	<p>&nbsp;</p>
	<div align="center">
		<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" class="da-button green" />
		<input type="hidden" name="dp_id" id="dp_id" value="<?php echo $dp_id;?>" />
	</div>
	<?php
		echo form_close();
	?>
		<form>
	</div>
		</div>
	</div>

<p>&nbsp;</p>
<div><span style="padding-right:130px;">&nbsp;</span> </div>