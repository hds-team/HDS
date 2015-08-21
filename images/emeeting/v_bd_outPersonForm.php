<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/outPersonEdit";
	url_del = site_url + "bdEmeeting/outPersonDel";
	
	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		op_id = $(this).attr("id");
		sendPost("frmOutPerson",{"op_id":op_id},url_edit,"","");
	}
	
	function del(){
		op_id = $(this).attr("id");
		sendPost("frmOutPerson",{"op_id":op_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
</script>

<?php 
	if(isset($qu_ops)){
		$action = "bdEmeeting/outPersonEdit";
		$ops_row = $qu_ops->row();
	}else{
		$action = "bdEmeeting/outPersonAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmOutPerson");
?>

<div id="content-body">
	<h3 align="center">จัดการบุคลากรภายนอก</h3>
	<p>&nbsp;</p>
	<table style="width:95%;" align="center" border="0">
		<tbody>
			<tr>
				<td align="right"><label>คำนำหน้าชื่อ :</label></td>
				<td width="3%"></td>
				<td width="55%">
					<select name="op_prefixId" id="op_prefixId" class="validate" title="คำนำหน้าชื่อ">
						<option value="">--เลือกคำนำหน้าชื่อ--</option>
						<?php
							if(isset($rs_pf))
							{
								foreach($rs_pf as $id => $name)
								{
						?>
									<option value="<?php echo $id;?>" <?php if(isset($ops_row) && $ops_row->op_prefixId == $id){
																				echo "selected='selected'";
																			}else{
																				echo set_select("op_prefixId",$id);
																			}?> >
																	  <?php echo $name;?>
									</option>
						<?php
								}
							}
						?>
					</select>
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>ชื่อ :</label></td>
				<td></td>
				<td>
					<input class="validate" title="ชื่อ" type="text" name="op_fname" id="op_fname" size="30" value="<?php 	if(isset($ops_row->op_fname)){
																															echo $ops_row->op_fname;
																														}else{
																															echo set_value("op_fname");
																														}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>นามสกุล :</label></td>
				<td></td>
				<td>
					<input class="validate" title="นามสกุล" type="text" name="op_lname" id="op_lname" size="30" value="<?php  if(isset($ops_row->op_lname)){
																																echo $ops_row->op_lname;
																															}else{
																																echo set_value("op_lname");
																															}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>ตำแหน่ง :</label></td>
				<td></td>
				
				<td>
					<input class="validate" title="ตำแหน่ง" type="text" name="op_pos" id="op_pos" size="30" value="<?php 	if(isset($ops_row->op_pos)){
																															echo $ops_row->op_pos;
																														}else{
																															echo set_value("op_pos");
																														}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>สถานที่ปฏิบัติงาน :</label></td>
				<td></td>
				<td>
					<input class="validate" title="สถานที่ปฏิบัติงาน" type="text" name="op_org" id="op_org" size="30" value="<?php 	if(isset($ops_row->op_org)){
																																	echo $ops_row->op_org;
																																}else{
																																	echo set_value("op_org");
																																}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr>
				<td align="right"><label>เบอร์โทร :</label></td>
				<td></td>
				<td><input type="text" name="op_tel" id="op_tel" size="30" value="<?php if(isset($ops_row->op_tel)){
																							echo $ops_row->op_tel;
																						}else{
																							echo set_value("op_tel");
																						}?>" />
				</td>
			</tr>
			<tr>
				<td align="right"><label>แฟกซ์ :</label></td>
				<td></td>
				<td><input type="text" name="op_fax" id="op_fax" size="30" value="<?php if(isset($ops_row->op_fax)){
																							echo $ops_row->op_fax;
																						}else{
																							echo set_value("op_fax");
																						}?>" />
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="btnSubmit" id="btnSubmit" value="บันทึก" />
					<input type="reset" name="btnClear" id="btnClear" value="เคลียร์ค่า" />
					<input type="hidden" name="op_id" id="op_id" value="<?php 	if(isset($ops_row->op_id)){
																					echo $ops_row->op_id;
																				}else{
																					echo set_value("op_id");
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
				<th>ชื่อ-นามสกุล</th>
				<th>ตำแหน่งในสายงาน</th>
				<th>สถานที่ปฏิบัติงาน</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(isset($rs_ops) && $rs_ops->num_rows())
			{
				$i =1;
				foreach($rs_ops->result() as $row)
				{
		?>
			<tr>
				<td align="center"><?php echo $i++;?></td>
				<td><?php echo $row->prefixName.$row->op_fname."  ".$row->op_lname;?></td>
				<td><?php echo $row->op_pos;?></td>
				<td><?php echo $row->op_org;?></td>
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
								<a href="javascript:void(0)" class="edit" id="<?php echo $row->op_id; ?>"><?php echo $img_edit; ?></a>
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
								<a href="javascript:void(0)" class="del" id="<?php echo $row->op_id; ?>"><?php echo $img_del; ?></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php
				}
			}else{
		?>
			<tr>
				<td colspan="5" class="red" align="center"><?php echo $this->config->item('emt_not_found');?></td>
			</tr>
		<?php
			}
		?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" align="right"><span>รวม&nbsp;&nbsp;<?php 	if(isset($rs_ops) && $rs_ops->num_rows()){
																			echo $rs_ops->num_rows();
																		}else{
																			echo 0;
																		}?>
																		&nbsp;รายการ</span>
				</td>
			</tr>
		</tfoot>
	</table>
</div>
<p>&nbsp;</p>