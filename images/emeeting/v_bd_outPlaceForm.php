<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/outPlaceEdit";
	url_del = site_url + "bdEmeeting/outPlaceDel";
	
	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		plc_id = $(this).attr("id");
		sendPost("frmOutPlace",{"plc_id":plc_id},url_edit,"","");
	}
	
	function del(){
		plc_id = $(this).attr("id");
		sendPost("frmOutPlace",{"plc_id":plc_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
</script>

<?php 
	if(isset($qu_plc)){
		$action = "bdEmeeting/outPlaceEdit";
		$plc_row = $qu_plc->row();
	}else{
		$action = "bdEmeeting/outPlaceAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmOutPlace");
?>

<div id="content-body">
	<h3 align="center">จัดการสถานที่จัดประชุมภายนอก</h3>
	<p>&nbsp;</p>
	<table style="width:95%;" align="center" border="0">
		<tbody>
			<tr>
				<td align="right"><label>ชื่ออาคาร/สถานที่ :</label></td>
				<td width="3%"></td>
				<td width="55%">
					<input class="validate" title="ชื่ออาคาร/สถานที่" type="text" name="plc_name" id="plc_name" value="<?php if(isset($plc_row->plc_name)){
																															echo $plc_row->plc_name;
																														}else{
																															echo set_value("plc_name");
																														}?>" size="30" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>หมายเลข/ชื่อห้อง :</label></td>
				<td></td>
				<td><input type="text" name="plc_detail" id="plc_detail" value="<?php 	if(isset($plc_row->plc_detail)){
																							echo $plc_row->plc_detail;
																						}else{
																							echo set_value("pld_detail");
																						}?>"  size="30"/>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" />
					<input type="reset" name="btnClear" id="btnClear" value="เคลียร์ค่า" />
					<input type="hidden" name="plc_id" id="plc_id" value="<?php if(isset($plc_row->plc_id)){
																					echo $plc_row->plc_id;
																				}else{
																					echo set_value("plc_id");
																				}?>" />
				</td>
			</tr>
		</tbody>
	</table>
	
	<?php echo form_close();?>

	<p>&nbsp;</p>
	<table class="emt_table" style="width:95%;" align="center" border="0">
		<thead>
			<tr>
				<th>ลำดับ</th>
				<th>ชื่อสถานที่จัดการประชุม</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(isset($rs_plc) && $rs_plc->num_rows())
				{
					$i = 1;
					foreach($rs_plc->result() as $row)
					{
			?>
				<tr>
					<td align="center"><?php echo $i++;?></td>
					<td><?php echo $row->plc_name." ".$row->plc_detail ;?></td>
					<td>
						<table style="width:100%;" align="center" border="0">
							<tr>
								<td align="right">
								<?php
									$edit = array(
										"src" => "images/emeeting/icons/edit.png",
										"width" => "16",
										"title" => "แก้ไข"
									);
									$img_edit = img($edit);
								?>
									<a href="javascript:void(0)" class="edit" id="<?php echo $row->plc_id; ?>"><?php echo $img_edit; ?></a>
								</td>
								<td align="left">
								<?php
									$del = array(
										"src" => "images/emeeting/icons/del.png",
										"width" => "16",
										"title" => "ลบ"
									);
									$img_del = img($del);
								?>
									<a href="javascript:void(0)" class="del" id="<?php echo $row->plc_id; ?>"><?php echo $img_del; ?></a>
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
					<td colspan="3" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
				</tr>
			<?php
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="3" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_plc) && $rs_plc->num_rows()){
																			echo $rs_plc->num_rows();
																		}else{
																			echo 0;
																		}?>
																			&nbsp;รายการ</span></td>
			</tr>
		</tfoot>
	</table>
</div>
<p>&nbsp;</p>