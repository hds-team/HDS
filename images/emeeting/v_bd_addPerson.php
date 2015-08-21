<script language="javascript">
function chkEmail() {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   var address = $("#email").val();
   
   if(address){
		if(reg.test(address) == false) {
			alert('Invalid Email Address');
			return false;
		}
   }
}

function chkValid(){ 
	if(document.getElementById("s_code").value=='' && document.getElementById("s_name").value==''){
		alert('กรุณาระบุรหัสบุคลากรหรือชื่อ/นามสกุล อย่างน้อย 1 อย่างในการค้นหาข้อมูล !');
		document.getElementById("s_name").focus();
		return false;
	}
}

function chkFileUpload(){ 
	if(document.getElementById("uploadfile").value==''){
		alert('กรุณาอัพโหลดไฟล์ในการบันทึกข้อมูล !');
		document.getElementById("uploadfile").focus();
		return false;
	}
}
</script>
<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/personAdd";
	//url_del = site_url + "bdEmeeting/personDel";
	
	//Add event
	$(".edit").click(edit);
	//$(".del").click(del);
	
	//Function
	function edit(){
		personId = $(this).attr("id");
		sendPost("addPerson",{"personId":personId},url_edit,"","");
	}
	
	/*function del(){
		personId = $(this).attr("id");
		sendPost("addPerson",{"personId":personId},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
	*/
});

function psDel(personId, warnMsg){
	var url_del = site_url + "bdEmeeting/personDel";
	sendPost("delPerson",{"personId":personId,},url_del,"","คุณต้องการลบ \""+warnMsg+"\" ใช่หรือไม่");
}
</script>

<div id="content-body">
	<h3 align="center">บันทึกข้อมูลบุคคล</h3>
	<p>&nbsp;</p>
	
	<?php
		$action = "bdEmeeting/personSave";
		if(isset($qu_ps)){
			$ps_row = $qu_ps->row();
		}
		echo form_open($this->config->item("emt_path").$action, "frmAdd");
	?>
	
	<table align="center" border="0">
		<tbody>
			<tr>
				<td><b>รหัสประจำตัว</b></td>
				<td>
					<input type="text" id="personCode" name="personCode" size="15" maxlength='60' value="<?php 	if(isset($ps_row)){
																													echo $ps_row->personCode;
																												}else{
																													echo set_value("personCode");
																												}?>" /><span class="error divInline">*&nbsp;</span>
					<b>&nbsp;&nbsp;&nbsp;ตำแหน่ง</b>
				</td>
				<td>
					<?php 	if(isset($ps_row)){
								$adminposId = $ps_row->adminposId;
							}
							else{
								$adminposId = set_value('adminposId');
							}
					?>
					<?php echo form_dropdown('adminposId', $opt_amp, $adminposId);?><span class="error divInline">*&nbsp;</span>
				</td>
			</tr>
			<tr><td></td><td><?php echo form_error('personCode');?></td><td><?php echo form_error('adminposId');?></td></tr>
			<tr>
				<td><b>คำนำหน้าชื่อ</b></td>
				<td colspan="2">
					<?php 	if(isset($ps_row)){
								$prefixId = $ps_row->prefixId;
							}
							else{
								$prefixId = set_value('prefixId');
							}
					?>
					<?php echo form_dropdown('prefixId', $opt_pf, $prefixId, "id='prefixId'");?><span class="error divInline">*&nbsp;</span>
					<?php echo form_error('prefixId');?>
				</td>
			</tr>
			<tr>
				<td><b>ชื่อ-สกุล (ไทย)</b></td>
				<td>
					<input type="text" id="fName" name="fName" size="25" maxlength='60' value="<?php 	if(isset($ps_row)){
																											echo $ps_row->fName;
																										}else{
																											echo set_value("fName");
																										}?>" /><span class="error divInline">*&nbsp;</span>
					-
				</td>
				<td>
					<input type="text" id="lName" name="lName" size="25" maxlength='60' value="<?php 	if(isset($ps_row)){
																											echo $ps_row->lName;
																										}else{
																											echo set_value("lName");
																										}?>" /><span class="error divInline">*&nbsp;</span>	
				</td>
			</tr>
			<tr><td></td><td><?php echo form_error('fName');?></td><td><?php echo form_error('lName');?></td></tr>
			<tr>
				<td><b>ชื่อ-สกุล (อังกฤษ)</b></td>
				<td>
					<input type="text" id="fName2" name="fName2" size="25" maxlength='60' value="<?php 	if(isset($ps_row)){
																											if(isset($ps_row->fName2)){
																												echo $ps_row->fName2;
																											}
																										}else{
																											echo set_value("fName2");
																										}?>" />
					&nbsp;&nbsp;&nbsp;- 
				</td>
				<td>
					<input type="text" id="lName2" name="lName2" size="25" maxlength='60' value="<?php 	if(isset($ps_row)){
																												if(isset($ps_row->lName2)){
																													echo $ps_row->lName2;
																												}
																											}else{
																												echo set_value("lName2");
																											}?>" />
				</td>
			</tr>
			<tr>
				<td><b>เพศ</b></td>
				<td colspan="2">
					<?php 	if(isset($ps_row)){
								$sex = $ps_row->sex;
							}
							else{
								$sex = set_value('sex');
							}
					?>
					<?php echo form_dropdown('sex', $opt_sex, $sex, "id='sex'");?><span class="error divInline">*&nbsp;</span>
					<?php echo form_error('sex');?>
				</td>
			</tr>
			<tr>
				<td><b>เกิดวันที่</b></td>
				<?php		
					if(isset($ps_row) && isset($ps_row->birthDate)){
						$tmp = emt_dateForm(emt_getval("birthDate", $ps_row),"/");
					}
					else{
						$tmp = set_value('birthDate');
						if($tmp == ''){
							$tmp = getNowDateFw2();
						}
					}
					/*
					$tmp = getNowDateFw2();
						if(isset($birthDate) <> ''){
							$tmp = set_value($birthDate);
						}
					*/
				?>
				<td colspan="2"><script>DateInput('birthDate', true, 'DD/MM/YYYY','<?php echo $tmp;?>');</script></td>
			</tr>
			<tr>
				<td><b>วันเริ่มเข้าทำงาน</b></td>
				<?php
					//if ( isset($firstadmidDate) <> '' )  $tmp = set_value($firstadmidDate);
					if(isset($ps_row)){
						$tmp = emt_dateForm(emt_getval("firstadmidDate", $ps_row),"/");
					}
					else{
						$tmp = set_value('firstadmidDate');
						if($tmp == ''){
							$tmp = getNowDateFw2();
						}
					}
				?>
				<td colspan="2"><script>DateInput('firstadmidDate', true, 'DD/MM/YYYY','<?php echo $tmp;?>');</script></td>
			</tr>
			<tr>
				<td><b>หน่วยงานย่อย</b></td>
				<td colspan="2">
					<?php 	if(isset($ps_row)){
								$deptId = $ps_row->deptId;
							}
							else{
								$deptId = set_value('deptId');
							}
					?>
					<?php echo form_dropdown('deptId', $opt_dept, $deptId, " id='deptId'");?><span class="error divInline">*&nbsp;</span>
					<?php echo form_error('deptId');?>
				</td>
			</tr>
			<tr>
				<td><b>อีเมล</b></td>
				<td colspan="2">
					<input type="text" id="email" name="email" size="30" value="<?php 	if(isset($ps_row) && isset($ps_row->emailAddr)){
																							echo $ps_row->emailAddr;
																						}else{
																							echo set_value("email");
																						}?>" /><span class="error divInline">*&nbsp;</span>
					<?php echo form_error('email');?>
				</td>
			</tr>
			<tr><td colspan="3"></td></tr>
			<tr>
				<td colspan="3" align="center">
					<input type="hidden" name="personId" id="personId" value="<?php	if(isset($ps_row)){
																						echo $ps_row->psId;
																					}else{
																						echo set_value("personId");
																					}?>" />
					<input type="submit" name='save' id='save' value='บันทึก' onclick="return chkEmail()">
				</td>
			</tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr>
				<td colspan="3">
					<div><strong>หมายเหตุ:&nbsp;</strong><span class="error divInline">*&nbsp;</span> หมายถึง ต้องกรอกข้อมูลให้สมบูรณ์</div>
				</td>
			</tr>
		</tbody>
	</table>
	
	<?php echo form_close();?>
	<p>&nbsp;</p>
	
	<div style="padding-left:25px;">
		<?php 
			$action = "bdEmeeting/personAdd_upload";
			$attr = array('id' => 'frmUpload');
			echo form_open_multipart($this->config->item("emt_path").$action,$attr);
		?>
		<table class="tupload">
			<tr>
				<td>
					<b>นำเข้าข้อมูลบุคลากร</b>
				</td>
			</tr>
			<tr>
				<td>
					<b>อัพโหลดไฟล์ :&nbsp;</b><input type="file" id="uploadfile" name="uploadfile" value="<?php echo((isset($uploadfile)) ? $uploadfile : "")?>" />&nbsp;&nbsp;&nbsp;
					<input type="submit" id="btnConfirm" name="btnConfirm" value="ยืนยัน" onclick="return chkFileUpload()" />
				</td>
			</tr>
		</table>
		<?php echo form_close(); ?>
	</div>
	<p>&nbsp;</p>
	
	<?php
	if(!empty($arr_error) || isset($rs_arr_commit))
	{
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
		if(!empty($arr_error))
		{
	?>
			<div style="padding-left:25px;color:red;">
				<h3 align="left"><?php echo $imgCancel; ?>&nbsp;นำเข้าข้อมูลไม่สำเร็จ!</h3>
			</div>
			<table class="emt_table" style="width:95%;" align="center" border="0">
				<thead>
					<tr>
						<th>บรรทัดที่</th>
						<th>ชื่อ-นามสกุล</th>
						<th>หมายเหตุ</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				
					foreach($arr_error as $key => $value)
					{
				?>
							<tr>
								<td align="center"><?php echo $value["Line"];?></td>
								<td><?php echo $value["Name"];?></td>
								<td><?php echo $value["Note"];?></td>
							</tr>
				<?php
					}
				?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3" align="right"><span>รวม&nbsp;&nbsp;<?php if(!empty($arr_error)){
																					echo count($arr_error);
																				}else{
																					echo 0;
																				}?>
																					&nbsp;รายการ</span>
						</td>
					</tr>
				</tfoot>
			</table>
			<p>&nbsp;</p>
		<?php
		}
		if(isset($rs_arr_commit))
		{
		?>
			<div style="padding-left:25px;color:green;">
				<h3 align="left"><?php echo $imgOK; ?>&nbsp;นำเข้าข้อมูลสำเร็จ</h3>
			</div>
			<table class="emt_table" style="width:95%;" align="center" border="0">
				<thead>
					<tr>
						<th>รหัสบุคลากร</th>
						<th>ชื่อ-นามสกุล</th>
						<th>ตำแหน่ง</th>
						<th>หน่วยงานย่อยที่สังกัด</th>
					</tr>
				</thead>
				<tbody class="sortable">
					<?php
						if(isset($rs_arr_commit) && $rs_arr_commit->num_rows())
						{
							foreach($rs_arr_commit->result() as $row)
							{
					?>
					<tr>
						<td align="center"><?php echo $row->personCode;?></td>
						<td><?php echo $row->prefixName ."". $row->fName ."  ". $row->lName;?></td>
						<td><?php echo $row->adminposName;?></td>
						<td><?php echo $row->deptName;?></td>
			
					</tr>
					
					<?php
							}
						}
						else
						{
						//*** ไม่ปรากฏรายการในฐานข้อมูล ***
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
						<td colspan="5" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_arr_commit) && $rs_arr_commit->num_rows()){
																					echo $rs_arr_commit->num_rows();
																				}else{
																					echo 0;
																				}?>
																					&nbsp;รายการ</span></td>
					</tr>
				</tfoot>
			</table>
			<p>&nbsp;</p>
	<?php
		}
	}
	//else
	//{
	?>
	<div style="padding-left:25px;">
		<?php 
			$action = "bdEmeeting/personAdd";
			$attr = array('id' => 'frmSearch');
			echo form_open($this->config->item("emt_path").$action,$attr); 
		?>
		<table class="tlayout">
			<tr>
				<td>
					<b>รหัสบุคลากร&nbsp;</b><input type="text" id="s_code" name="s_code" size='10' value="<?php echo((isset($s_code)) ? $s_code : "")?>" />
					&nbsp;&nbsp;&nbsp;
					<b>ชื่อ/นามสกุล&nbsp;</b><input type="text" id="s_name" name="s_name" size='20' value="<?php echo((isset($s_name)) ? $s_name : "")?>" />
					&nbsp;&nbsp;&nbsp;
					<input type="submit" id="btnSearch" name="btnSearch" value="ค้นหา" onclick="return chkValid()"/>
					<input type="button" id="btnClear" name="btnClear" value="เคลียร์ข้อมูล" />
				</td>
			</tr>
		</table>
		<?php echo form_close(); ?>
	</div>
	
		<table class="emt_table" style="width:95%;" align="center" border="0">
			<thead>
				<tr>
					<th>รหัสบุคลากร</th>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่ง</th>
					<th>หน่วยงานย่อยที่สังกัด</th>
					<th>ดำเนินการ</th>
				</tr>
			</thead>
			<tbody class="sortable">
				<?php
					if(isset($rs_ps) && $rs_ps->num_rows())
					{
						foreach($rs_ps->result() as $row)
						{
				?>
				<tr>
					<td align="center"><?php echo $row->personCode;?></td>
					<td><?php echo $row->prefixName ."". $row->fName ."  ". $row->lName;?></td>
					<td><?php echo $row->adminposName;?></td>
					<td><?php echo $row->deptName;?></td>
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
										<a href="javascript:void(0)" class="edit" id="<?php echo $row->personId; ?>"><?php echo $img_edit; ?></a>
									</td>
									<td align="left">
									<?php
										$del = array(
											"src" => "images/emeeting/icons/del.png",
											"width" => "16",
											"title" => "ลบ"
										);
										$img_del = img($del);
										
										$warnMsg = $row->prefixName ."". $row->fName ."  ". $row->lName;
									?>
										<a href="javascript:void(0);" title="ลบบุคลากร" onclick="psDel('<?php echo $row->personId; ?>','<?php echo $warnMsg; ?>')" ><?php echo $img_del; ?></a>
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
					//*** ไม่ปรากฏรายการในฐานข้อมูล ***
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
					<td colspan="5" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_ps) && $rs_ps->num_rows()){
																				echo $rs_ps->num_rows();
																			}else{
																				echo 0;
																			}?>
																				&nbsp;รายการ</span></td>
				</tr>
			</tfoot>
		</table>
	<?php
	//}
	?>
	<p></p>
</div>
<p>&nbsp;</p>