<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/calendarDateInput.js"></script>

<?php echo link_tag('css/emt_css/emt_css.css');?>
<?php echo link_tag('css/emt_css/validate.css');?>

<style>
	body{
		font-size : 13px;
	}
	table .emt2{
		font-size : 13px;
		width : 100%;
		/*border : 1px solid #DDD;*/
		padding : 5px;
	}
	#head{
		padding:15px;
		font-size:20px;
		font-weight:bold;
		text-align:center;
	}
	#button{
		text-align:center;
	}
</style>

<!--Egoist -->
<script language="javascript">
function formSubmit(){
	document.getElementById("frm1").submit();
}
</script>
<?php $actions = "emeeting/noticeMeeting/noticePreview/".$mt_id;?>
<form id="frm1" action="<?php echo site_url($actions)?>">
	<!-- input type="button" onclick="formSubmit()" value="ยกเลิก" -->
</form>
<!--Egoist -->

<div id="content-body">
	<?php
		$action = "noticeMeeting/noticePreviewSave";
		echo form_open($this->config->item("emt_path").$action);
	?>
	<div id="head" align="center">แก้ไขหนังสือเชิญ</div>
	<table class="emt2" style="width:95%;" align="center">
		<col style="width:20%;"/>
		<col />
		<tbody>
			<tr>
				<td><label class="emt_bold">ส่วนงาน </label></td>
				<td>
				<textarea class="validate" title="ส่วนงาน" name="b1" id="test" rows="5" cols="70"><?php echo str_replace(" โทร ", "", $qu_ivm->row()->ivm_div);?></textarea>
				</td>
			</tr>
			<tr>
				<td><label class="emt_bold"> ที่หนังสือ</label></td>
				<td>
				<input class="validate" title="ที่หนังสือ" type="text" name="b2" value="<?php echo $qu_ivm->row()->ivm_no;?>" />
				</td>
			</tr>
			<tr>
				<td><label class="emt_bold">วันที่</label></td>
				<td>
				<?php
				//เวลา
				$ivm_date = emt_dateForm(getval("ivm_date", $qu_ivm->row()), "/");
				if(!$ivm_date) {
					$ivm_date = date("d/m/Y");
				}
				?>
				<script type="text/javascript">
					DateInput("bday", true, "DD/MM/YYYY","<?php echo $ivm_date;?>");
				</script>
				</td>
			</tr>
			<tr>
				<td><label class="emt_bold">เรื่อง </label></td>
				<td>
				<textarea class="validate" title="เรื่อง" name="b3" id="test" rows="5" cols="70"><?php echo $qu_ivm->row()->ivm_subject;?></textarea>
				</td>
			</tr>
			<tr>
				<td><label class="emt_bold">รายละเอียด </label></td>
				<td>
				<textarea class="validate" title="รายละเอียด" name="b4" id="test" rows="5" cols="70"><?php echo $qu_ivm->row()->ivm_p1;?></textarea>
				</td>
			</tr>
			<tr>
				<td><label class="emt_bold">คำลงท้าย</label></td>
				<td>
				<textarea  class="validate" title="คำลงท้าย" name="b5" id="test" rows="5" cols="70"><?php echo $qu_ivm->row()->ivm_p3;?></textarea>
				</td>
			</tr>
		</tbody>
	</table>
	<br/>
	<div align="center">
		<input type="hidden" name="mt_id" value=<?php echo $mt_id; ?> />
		<input type="submit" name="submit" id="submit" value="บันทึก" />
		<input type="button" onclick="formSubmit()" value="ยกเลิก" /> 
	</div>
	<?php
	echo form_close();
	?>
	
</div>
