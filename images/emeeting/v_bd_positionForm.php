
<!----------->
<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/positionEdit";
	url_del = site_url + "bdEmeeting/positionDel";

	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		ag_id = $(this).attr("id");
		sendPost("frmPosition",{"ag_id":ag_id},url_edit,"","");
	}
	
	function del(){
		ag_id = $(this).attr("id");
		sendPost("frmPosition",{"ag_id":ag_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
</script>

<?php 
	echo $this->session->flashdata("message");
	
	if(isset($qu_ag)){
		$action = "bdEmeeting/positionEdit";
		$ag_row = $qu_ag->row();
	}else{
		$action = "bdEmeeting/positionAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmPosition");
?>
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                 <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
					จัดการตำแหน่งในการประชุม
                </span>
			</div>
			<div class="da-panel-content">
                    <form class="da-form">
                                    <table class="da-table da-detail-view">
                                        <tbody>
                                        	<tr>
                                            	<th>ชื่อตำแหน่ง</th>
											<td width="70%">
											<input class="validate" title="ชื่อตำแหน่ง" type="text" name="ag_name" id="ag_name" size="30" value="<?php 	if(isset($ag_row)){
																																echo $ag_row->ag_name;
																															}else{
																																echo set_value("ag_name");
																															}?>" />
					<span class="red">*</span>
				</td>
                                            </tr>
	                                        <tr>
                                            	<th>จัดประชุม</th>
                                            	<td>
				
					<label class="font-normal">
						<input type="checkbox" name="ag_manage" id="ag_manage" value="1" <?php	if(isset($ag_row) && $ag_row->ag_manage == 1){
																									echo "checked=\"checked\"";
																								}
																						 ?> />จัดประชุม
					</label>
				</td>
                                            </tr>
    	                                    <tr>
                                            	<th>หน้าที่การทำงาน</th>
                                            	<td><?php 	if(isset($qu_cfg) && $qu_cfg->num_rows()){
								foreach($qu_cfg->result() as $cfg_row){
					?>
									<label id="font-normal">
										<input type="radio" name="ag_cfg_id" id="ag_cfg_id_1" value="<?php echo $cfg_row->cfg_id;?>" 
										<?php	if(isset($ag_row) && $ag_row->ag_cfg_id == $cfg_row->cfg_id){
													echo "checked=\"checked\"";
												}else if($cfg_row->cfg_id == 1){
													echo "checked=\"checked\"";
												}
										?> /><?php echo $cfg_row->cfg_name; ?>
									</label><br/>
					<?php	
							
								}
							}
							
					?></td>
                        </tr>
					<tr>
				<td colspan="3" >
					<div class="da-button-row" >

                    <input type="reset"  name="btnClear" id="btnClear" value="เครียร์ค่า" class="da-button gray left" />
                       
					<input type="hidden" name="ag_id" id="ag_id" value="<?php	if(isset($ag_row)){
																					echo $ag_row->ag_id;
																				}else{
																					echo set_value("ag_id");
																				}?>" />
					<input type="hidden" name="ag_sequence" id="ag_sequence" value="<?php	if(isset($ag_row)){
																					echo $ag_row->ag_sequence;
																				}else{
																					echo set_value("ag_sequence");
																					}?>" />
					</div>
					<div class="da-button-row" align = 'right'>
					 <input type="submit" name="btnSubmit" value="บันทึก" class="da-button green" />
					</div>
						</td>
			</tr>
					    </tbody>
					</table>
                      
				</form>	
			   </div>
            </div>
			</div>
	<?php echo form_close();?>
	<p>&nbsp;</p>
	<div class="grid_4_center">
    <div class="da-panel collapsible">
	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
										ตำแหน่งในการประชุม
                                    </span>
                                    
                                </div>
	<div class="da-panel-content">
	<table class="da-table" style="width:100%" align="center" border="0">
		<thead>
			<tr>
				<th>ลำดับที่</th>
				<th>ตำแหน่งในการประชุม</th>
				<th>หน้าที่การทำงาน</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(isset($rs_ag) && $rs_ag->num_rows())
			{
				$i =1;
				foreach($rs_ag->result() as $row)
				{
					if($row->ag_manage == 1){
						$manage = " และ จัดประชุม";
					}else{
						$manage = "";
					}
		?>
			<tr>
				<td align="center"><?php echo $i++;?></td>
				<td><?php echo $row->ag_name;?></td>
				<td><?php echo $row->cfg_name.$manage;?></td>
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
									<a href="javascript:void(0)" class="edit" id="<?php echo $row->ag_id; ?>"><?php echo $img_edit; ?></a>
								<?php
									$del = array(
										"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/cross.png",
										"width" => "16",
										"border" => "0",
										"title" => "ลบ"
									);
									$img_del = img($del);
								?>
									<a href="javascript:void(0)" class="del" id="<?php echo $row->ag_id; ?>"><?php echo $img_del; ?></a>
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
				<td></td>
				<td colspan="4" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_ag) && $rs_ag->num_rows()){
																			echo $rs_ag->num_rows();
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