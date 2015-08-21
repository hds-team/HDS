<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<script src='<?php echo base_url();?>js/emt_js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/input_autocomplete.js"></script>

<script>
$(document).ready(function(){
	$(".MultiFile-label a.delete").click(function(){
		id = $(this).attr("id");
		url = "<?php echo site_url(); ?>/emeeting/agenda/deleteFile";
		var obj = $(this).parents("div:first");
		$.post(url,{agfl_id:id},function(data){
			obj.remove();
		});
	});
});
</script>
<?php echo link_tag('css/emt_css/emt_css.css');?>
<?php echo link_tag('css/emt_css/validate.css');?>

<?php echo link_tag('css/emt_css/input_autocomplete.css'); ?>

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
	#agdtM{
		font-size:16px;
		font-weight:bold;
		text-align:left;
		padding:10px 0px 10px;
	}
</style>
<?php
$row = isset($agdt) ? $agdt->row() : null;
$row_pr = isset($qu_agdt_parent) ? $qu_agdt_parent->row() : null;

// Create Form
if(isset($edit) AND $edit){ 
	// Edit
	$action = "agenda/agendaEdit";
} 
else{ 
	// Add
	$action = "agenda/agendaAdd";
}
$attributes = array("name"=>"frmAgdtAdd","target"=>"_self");
echo form_open_multipart($this->config->item("emt_path").$action,$attributes);
?>
<table >
	<col style="width:20%;"/>
	<col />
	<tbody>

		<tr>
			<td id="head" colspan="2">เสนอวาระเพิ่มเติม</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<div id="agdtM">
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
				<textarea class="validate" title="ชื่อระเบียบวาระการประชุม" name="agdt_head" id="agdt_head" rows="3" cols="80"><?php echo emt_getval("agdt_head", $row);?></textarea>

			</td>
		</tr>
		<tr>
			<td><label class="emt_bold">รายละเอียด : </label></td>
			<td>
			<textarea name="agdt_detail" id="agdt_detail" rows="8" cols="70"><?php echo emt_getval("agdt_detail", $row);?></textarea>
			</td>
		</tr>
		<tr>
			<td align="left">เสนอโดย : </td>
			<td>
				<div style="position:relative;">
					<input type="text" name="agdt_by" id="agdt_by" size="80" value="<?php 	if(isset($agdt)){
																								echo emt_getval("agdt_by", $row);
																							}
																							else{
																								$agdt_by = isset($agdt_by) ? $agdt_by : "";
																								echo $agdt_by;
																							}
																							?>"/>
					<input type="hidden" name="agdt_by_id" id="agdt_by_id" value="" />
					<script type="text/javascript">  
						function make_autocom(autoObj,showObj){  
							var mkAutoObj=autoObj;   
							var mkSerValObj=showObj;   
							new Autocomplete(mkAutoObj, function() {  
								this.setValue = function(id) {        
									document.getElementById(mkSerValObj).value = id;  
								}  
								if ( this.isModified ) 
									this.setValue("");  
								if ( this.value.length < 1 && this.isNotClick )   
									return ; 
								return "<?php echo site_url();?>emeeting/emeetingAjax/getPnt?mt_id=<?php echo $mt_id; ?>&q=" +encodeURIComponent(this.value);  
							});   
						}     
						 
						// make_autocom(" id ของ input ตัวที่ต้องการแสดงให้เห็น "," id ของ input ตัวที่ต้องการรับค่า");  
						make_autocom("agdt_by","agdt_by_id");  
					</script>
				</div>
			</td>
		</tr>
		<tr>
			<td align="left">ประเด็นเสนอ :</td>
			<td>
				<?php
					$default_present = isset($default_present) ? $default_present : '';
				?>
				<textarea title="ประเด็นเสนอ" name="agdt_present" id="agdt_present" rows="2" cols="40"><?php echo emt_getval("agdt_present", $row, $default_present);?></textarea>
			</td>
		</tr>
		<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='<?php echo base_url();?>ckeditor/';
//]]></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js?t=B5GJ5GG"></script>

<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('agdt_detail', {"height":200,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
CKEDITOR.replace('agdt_present', {"height":200,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
//]]></script>
		<tr>
			<td align="left">เอกสารแนบ :</td>
			<td>
				<div style="min-height:100px;background:#FCFCFC;margin:10px 3px;width:300px;border:1px solid #CCC;" id="T8A_wrap_list">
				<?php
				if(isset($file) && $file->num_rows > 0){
					foreach($file->result() as $row_file){
						echo '<div class="MultiFile-label">
						<a href="javascript:void(0);" class="delete" id="'.$row_file->agfl_id.'"><img alt="" src="'.base_url().'images/emeeting/del.png"></a>
						<span class="MultiFile-title" title="File selected: delete.png">
						<a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >'.$row_file->agfl_oname.'</a></span>
						</div>';
					}
				}
				?>
				</div>
				<input  type="file" id="T8A"  name="file[]"/>
			</td>
		</tr>
		<tr>
			<td colspan="2" id="button">
				<input type="hidden" name="agdt_id" id="agdt_id" value="<?php echo $agdt_id; ?>" />
				<input type="hidden" name="mt_id" id="mt_id" value="<?php echo $mt_id; ?>" />
				<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id; ?>" />
				<input type="hidden" name="agdt_level" id="agdt_level" value="<?php echo $agdt_level; ?>" />
				<input type="hidden" name="agdt_flag_extra" id="agdt_flag_extra" value="<?php echo isset($agdt_flag_extra) ? $agdt_flag_extra : ""; ?>" />
				
				<input type="hidden" name="flag_agdt_add" id="flag_agdt_add" value="<?php echo $flag_agdt_add; ?>" />
				<input type="hidden" name="agdt_personId" id="agdt_personId" value="<?php echo $agdt_personId; ?>" />
				
				<?php
				if(isset($edit) AND $edit){ // Edit
				?>
				<input type="hidden" name="agdt_seq" id="agdt_seq" value="<?php echo $agdt_seq; ?>" />
				<input type="hidden" name="agdt_parent_id" id="agdt_parent_id" value="<?php echo $agdt_parent_id; ?>" />
				<?php
				}
				?>
				
				<?php
					$no_parent = isset($no_parent) ? $no_parent : -1;
					$flag_parent_id = isset($flag_parent_id) ? $flag_parent_id : -1;
				?>
				
				<input type="hidden" name="no_ag" id="no_ag" value="<?php echo $no_ag; ?>" />
				<input type="hidden" name="no_parent" id="no_parent" value="<?php echo $no_parent; ?>" />
				<input type="hidden" name="flag_parent_id" id="flag_parent_id" value="<?php echo $flag_parent_id; ?>" />
				
				<input type="submit" name="submit" id="submit" value="บันทึก" />
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
		<?php
			if($flag_parent_id != -1){
				?>
				<tr>
					<?php
						// Image Add
						$add = array(
							"src" => "images/emeeting/icons/add.png",
							"width" => "16",
							"border" => "0"
						);
						$imgAdd = img($add);

						$ck_edit = 0;
						$p_agdt_id = $flag_parent_id;
						$linkAdd = site_url() . "emeeting/agenda/agendaAdd/";
						$getAdd = $p_agdt_id."/".$agdt_level."/".$mt_id."/".$cms_id."/".$flag_agdt_add."/".$agdt_personId ."/".$no_parent;
					?>
					<td colspan="2" align="right">
						<div style="padding:0px 35px 15px;">
							<a href="<?php echo $linkAdd . $getAdd; ?>" class="agdtAdd" style="text-decoration:none;color:blue;" ><?php echo $imgAdd; ?>&nbsp;เพิ่มหัวข้อถัดไป</a>
						</div>
					</td>
				</tr>
				<?php
			}
		?>
	</tbody>
</table>
<?php
// Close Form
echo form_close();
?>
<script>
$('#T8A').MultiFile({ 
	STRING: {
		remove: '<?php echo img("images/emeeting/del.png");?>'
	},
	max: 5
}); 
</script>