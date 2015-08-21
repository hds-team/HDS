<script>
$(document).ready(function(){
	// Init
	url_edit = site_url + "bdEmeeting/meetingStatusEdit";
	url_del = site_url + "bdEmeeting/meetingStatusDel";
	
	//Add event
	$(".edit").click(edit);
	$(".del").click(del);
	
	//Function
	function edit(){
		mts_id = $(this).attr("id");
		sendPost("frmMeetingStatus",{"mts_id":mts_id},url_edit,"","");
	}
	
	function del(){
		mts_id = $(this).attr("id");
		sendPost("frmMeetingStatus",{"mts_id":mts_id},url_del,"","คุณต้องการลบใช่หรือไม่");
	}
});
</script>

<?php 
	echo $this->session->flashdata("message");
	
	if(isset($qu_mts)){
		$action = "bdEmeeting/meetingStatusEdit";
		$mts_row = $qu_mts->row();
	}else{
		$action = "bdEmeeting/meetingStatusAdd";
	}
	echo form_open($this->config->item("emt_path").$action,"frmMeetingStatus");
?>

<div id="content-body">
	<h3 align="center">จัดการสถานะของการประชุม</h3>
	<p>&nbsp;</p>
	<table style="width:95%;" align="center" border="0">
		<tbody>
			<tr>
				<td align="right"><label>สถานะของการประชุม :</label></td>
				<td width="3%"></td>
				<td width="55%">
					<input class="validate" title="สถานะของการประชุม" type="text" name="mts_name" id="mts_name" size="30" value="<?php 	if(isset($mts_row)){
																																			echo $mts_row->mts_name;
																																		}else{
																																			echo set_value("mts_name");
																																		}?>" />
					<span class="red">*</span>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="btnSubmit" value="บันทึก" />
					<input type="reset" name="btnClear" id="btnClear" value="เคลียร์ค่า" />
					<input type="hidden" name="mts_id" id="mts_id" value="<?php	if(isset($mts_row)){
																					echo $mts_row->mts_id;
																				}else{
																					echo set_value("mts_id");
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
				<th>ลำดับที่</th>
				<th>สถานะของการประชุม</th>
				<th>ดำเนินการ</th>
			</tr>
		</thead>
		<tbody>
		<?php
			if(isset($rs_mts) && $rs_mts->num_rows())
			{
				$i =1;
				foreach($rs_mts->result() as $row)
				{
		?>
			<tr>
				<td align="center"><?php echo $i++;?></td>
				<td><?php echo $row->mts_name;?></td>
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
									<a href="javascript:void(0)" class="edit" id="<?php echo $row->mts_id; ?>"><?php echo $img_edit; ?></a>
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
									<a href="javascript:void(0)" class="del" id="<?php echo $row->mts_id; ?>"><?php echo $img_del; ?></a>
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
					<td colspan="4" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
				</tr>
			<?php
				}
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="4" align="right"><span>รวม&nbsp;&nbsp;<?php if(isset($rs_mts) && $rs_mts->num_rows()){
																			echo $rs_mts->num_rows();
																		}else{
																			echo 0;
																		}?>
																			&nbsp;รายการ</span></td>
			</tr>
		</tfoot>
	</table>
</div>
<p>&nbsp;</p>