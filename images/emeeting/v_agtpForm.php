<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<?php echo link_tag('css/emt_css/emt_css.css');?>
<?php echo link_tag('css/emt_css/validate.css');?>
<style>
	body{
		font-size : 13px;
	}
	table{
		font-size : 13px;
		width : 100%;
		border : 1px solid #DDD;
		padding : 5px;
	}
	#head{
		padding:2px;
		font-size:20px;
		font-weight:bold;
		text-align:center;
	}
	#button{
		text-align:center;
	}
	#agtpM{
		font-size:16px;
		font-weight:bold;
		text-align:left;
		padding:10px 0px 10px;
	}
</style>
<?php
$row = isset($agtp)?$agtp->row():null;
// Create Form
if(isset($edit) AND $edit){ // Edit
	$action = "agenda/agtpEdit";
} else { // Add
	$action = "agenda/agtpAdd";
}
$attributes = array("name"=>"frmAgtp","target"=>"_self");
echo form_open($this->config->item("emt_path").$action,$attributes);
?>
<table >
	<col style="width:20%;"/>
	<col />
	<tbody border="1">
		<tr>
			<td id="head" colspan="2">กำหนดระเบียบวาระการประชุม</td>
		</tr>
		<tr>
			<td>
		<?php
		$flag_parent_id = isset($flag_parent_id) ? $flag_parent_id : -1; ?>
		<input type="hidden" name="flag_parent_id" id="flag_parent_id" value="<?php echo $flag_parent_id; ?>" />
		<?php
			if($flag_parent_id != -1){
				?>
					<?php
						// Image Add
						$add = array(
							"src" => "images/emeeting/icons/add.png",
							"width" => "16",
							"border" => "0"
						);
						$imgAdd = img($add);

						$ck_edit = 0;
						$p_agtp_id = $flag_parent_id;
						$linkAdd = site_url() . "emeeting/agenda/agtpAdd/";
						$getAdd = $p_agtp_id."/".$agtp_level."/".$cms_id."/".$ck_edit."/".$no_parent;
					?>
						<div style="padding:0px 35px 15px;">
							<a href="<?php echo $linkAdd . $getAdd; ?>" class="agdtAdd" style="text-decoration:none;color:blue;" ><?php echo $imgAdd; ?>&nbsp;เพิ่มหัวข้อถัดไป</a>
						</div>
				<?php
			}
		?>
			</td>
			<td>
				<div id="agtpM" align="center">
					<?php 
						// วาระหลัก
						$no_main = isset($no_main) ? $no_main : ""; 
						echo $no_main;
					?>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<label class="emt_bold">ชื่อระเบียบ<br />วาระการประชุม : </label>
			</td>
			<td>
				<?php
					// หัวข้อย่อย
					$no_ag = isset($no_ag) ? $no_ag : -1;
					if($no_ag != -1){
					?>
						<div style="padding:4px 5px 10px;float:left;">
							<?php
								echo $no_ag;
							?>
						</div>
					<?php
					}
				?>
				<textarea class="validate" title="ชื่อระเบียบวาระการประชุม" name="agtp_head" id="agtp_head" rows="3" cols="80"><?php echo emt_getval("agtp_head", $row);?></textarea>

			</td>
		</tr>
		<tr>
			<td align="left">รายละเอียด : </td>
			<td>
			<textarea name="agtp_detail" rows="8" cols="70"><?php echo emt_getval("agtp_detail", $row);?></textarea>
			</td>
		</tr>
		<tr>
			<td align="left">ประเด็นเสนอ :</td>
			<td>
				<textarea title="ประเด็นเสนอ" name="agtp_present" id="agtp_present" rows="2" cols="40"><?php echo emt_getval("agtp_present", $row);?></textarea>
			</td>
		</tr>
		<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='<?php echo base_url();?>ckeditor/';
//]]></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js?t=B5GJ5GG"></script>

<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('agtp_detail', {"height":150,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
CKEDITOR.replace('agtp_present', {"height":150,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
//]]></script>
					<tr>
			<td colspan="2" id="button">
				<input type="hidden" name="agtp_id" id="agtp_id" value="<?php echo $agtp_id; ?>" />
				<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id; ?>" />
				<input type="hidden" name="agtp_level" id="agtp_level" value="<?php echo $agtp_level; ?>" />
				<input type="hidden" name="cms_edit" id="cms_edit" value="<?php echo $cms_edit; ?>" />
				<?php
				if(isset($edit) AND $edit){ // Edit
				?>
				<input type="hidden" name="agtp_seq" id="agtp_seq" value="<?php echo $agtp_seq; ?>" />
				<input type="hidden" name="agtp_parent_id" id="agtp_parent_id" value="<?php echo $agtp_parent_id; ?>" />
				<input type="hidden" name="agtp_thm_id" id="agtp_thm_id" value="<?php echo $agtp_thm_id; ?>" />
				<?php
				}
				?>
				
				<?php
					$no_parent = isset($no_parent) ? $no_parent : -1;
					//$flag_parent_id = isset($flag_parent_id) ? $flag_parent_id : -1;
				?>
				
				<input type="hidden" name="no_ag" id="no_ag" value="<?php echo $no_ag; ?>" />
				<input type="hidden" name="no_parent" id="no_parent" value="<?php echo $no_parent; ?>" />
				<!--input type="hidden" name="flag_parent_id" id="flag_parent_id" value="<?php //echo $flag_parent_id; ?>" / -->
				
				<input type="submit" name="submit" id="submit" value="บันทึก" class="da-button green" />
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<p>&nbsp;</p>
				<fieldset style="width:30%; margin-right:140px; text-align:left;">
					<comment>
						* กรุณากดปุ่มบันทึกก่อนทุกครั้งที่มีการแก้ไข 
					</comment>
				</fieldset>
				<p>&nbsp;</p>
			</td>
		</tr>
	</tbody>
</table>
<?php
// Close Form
echo form_close();
?>