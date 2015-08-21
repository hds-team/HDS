<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/meetingTypeEdit";
	url_del = site_url + "bdEmeeting/meetingTypeDel";
	
	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		mtt_id = $(this).attr("id");
		sendPost("frmMeetingType",{"mtt_id":mtt_id},url_edit,"","");
	}
	
	function del(){
		mtt_id = $(this).attr("id");
		sendPost("frmMeetingType",{"mtt_id":mtt_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
</script>


<?php 
	echo $this->session->flashdata("message");
	
	if(isset($qu_mtt)){
		$action = "bdEmeeting/meetingTypeEdit";
		$mtt_row = $qu_mtt->row();
	}else{
		$action = "bdEmeeting/meetingTypeAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmMeetingType");
?>

<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
			จัดการประเภทของการประชุม
        </span>
     </div>

	 <div class="da-panel-content">
        <table class="da-table da-detail-view">
		<tbody>
			<tr>
				<th><label>ประเภทของการประชุม :</label></th>
				<td width="70%">
					<input class="validate" title="ประเภทของการประชุม" type="text" name="mtt_name" id="mtt_name" size="30" value="<?php 	if(isset($mtt_row)){
																																			echo $mtt_row->mtt_name;
																																		}else{
																																			echo set_value("mtt_name");
																																		}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td colspan="3" >
				<div class="da-button-row">
				<input type="reset" name="btnClear" id="btnClear" value="เคลียร์ค่า" class="da-button gray left"/>
				</div>
				<div class="da-button-row" align="right">
					<input type="submit" name="btnSubmit" value="บันทึก" class="da-button green"/>
					<input type="hidden" name="mtt_id" id="mtt_id" value="<?php	if(isset($mtt_row)){
																					echo $mtt_row->mtt_id;
																				}else{
																					echo set_value("mtt_id");
																				}?>" />
				</td>
			</tr>
		</tbody>
	</table>
		</div>
	<?php
	echo "</br>";
	echo "</br>";
	?>
		</div>
				</div>
			</div>
	
	<?php echo form_close();?>
	
	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
										ประเภทการประชุม
                                    </span>
                                    
                                </div>
	<div class="da-panel-content">
	<table class="da-table" style="width:100%;" align="center" border="0">
		<thead>
			<tr>
				<th>ลำดับที่</th>
				<th>ประเภทของการประชุม</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(isset($rs_mtt) && $rs_mtt->num_rows())
			{
				$i =1;
				foreach($rs_mtt->result() as $row)
				{
		?>
			<tr>
				<td align="center"><?php echo $i++;?></td>
				<td><?php echo $row->mtt_name;?></td>
	
								<td align="center">
								<?php
									$edit = array(
										"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/application_edit.png",
										"width" => "16",
										"border" => "0",
										"title" => "แก้ไข"
									);
									$img_edit = img($edit);
								?>
									<a href="javascript:void(0)" class="edit" id="<?php echo $row->mtt_id; ?>"><?php echo $img_edit; ?></a>
							
								
								<?php
									$del = array(
										"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/cross.png",
										"width" => "16",
										"border" => "0",
										"title" => "ลบ"
									);
									$img_del = img($del);
								?>
									<a href="javascript:void(0)" class="del" id="<?php echo $row->mtt_id; ?>"><?php echo $img_del; ?></a>
								</td>
				</tr>
		<?php
				}
			}
				else
				{
			?>
				<tr>
					<td colspan="4" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
				</tr>
			<?php
				}
			?>
		</tbody>
		<tfoot>
			<tr>
			<td></td>
			<td></td>
				<td colspan="4" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_mtt) && $rs_mtt->num_rows()){
																			echo $rs_mtt->num_rows();
																		}else{
																			echo 0;
																		}?>
																			&nbsp;รายการ</span></td>
			</tr>
		</tfoot>
	</table>
								</div>
							</div>
						</div>
				
<p>&nbsp;</p>
<div><span style="padding-right:130px;">&nbsp;</span> </div>