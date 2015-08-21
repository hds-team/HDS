<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/emt_js/validate.js"></script>
<script src='<?php echo base_url();?>js/emt_js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/input_autocomplete.js"></script>

<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>

<?php 
	echo link_tag('css/emt_css/fancybox/fancybox.css');
	echo link_tag('css/emt_css/emt_css.css');
?>
<script>
$(document).ready(function(){
	$(".MultiFile-label a.delete").click(function(){
		id = $(this).attr("id");
		//url = "<?php echo site_url(); ?>/emeeting/agenda/deleteFile";
		url = "<?php 
					if( $mt_edit == "short" ){
						echo site_url() . "/emeeting/shortAgenda/deleteFile"; 
					} else {
						echo site_url() . "/emeeting/agenda/deleteFile"; 
					}
			   ?>";
		var obj = $(this).parents("div:first");
		$.post(url,{agfl_id:id},function(data){
			obj.remove();
		});
	});
	
	$(".agdtSave2").fancybox({
		'height' 			: '98%',
		'width' 			: '95%',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
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
	.tpopup{
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
	.sortable{
		/*width : 100%;*/
		margin : 0px;
		padding : 0px;
	}
	.sortable li{
		line-height : 25px;
		list-style: none;
		margin : 0px;
		padding : 0px;
		padding-left : 10px;
		border : 1px solid #FFFFFF;
	}
	.sortable>li:hover{
		border : 1px solid #D0DCF0;
	}
	.sortable li.ui-state-highlight { 
		height : 30px;
		line-height : 30px;
		background : #D0DCF0;
	}
	li.ui-sortable-helper{
		border : 1px solid #fad42e;
		background: #FAFAFA;
	}
	li .sortable{
		padding-left : 25px;
	}
	.string {
		display : inline-block;
		width : 95%;
	}
	#agdtM{
		font-size:16px;
		font-weight:bold;
		text-align:left;
		padding:10px 0px 10px;
	}
	.apprv{
		font-size:16px;
		font-weight:bold;
		text-align:left;
	}
	.tapprv{
		font-size : 13px;
		width : 95%;
	}
</style>
<?php
$row = isset($agdt)?$agdt->row():null;
$link = isset($link)?$link:null;
$links = isset($links)?$links:null;

if($mt_edit == "short"){
	$action = "shortAgenda/agdtSave";
}else{
	$action = "agenda/agdtSave";
}
$attributes = array("name"=>"frmAgtp","target"=>"_self");
echo form_open_multipart($this->config->item("emt_path").$action,$attributes);
if($agcm == 1){
	echo "<input type='hidden' name='agcm' value='1'/>";
	//echo "<input type='hidden' name='agdt_no' value='{$agdt_no}'/>";
	echo "<input type='hidden' name='mt_edit' value='{$mt_edit}'/>";
}else{
	echo "<input type='hidden' name='agcm' value='2'/>";
}
echo "<input type='hidden' name='agdt_no' value='{$agdt_no}'/>";

echo "<input type='hidden' name='link' value='{$link}'/>";
echo "<input type='hidden' name='links' value='{$links}'/>";
?>
<table cellspacing="1" cellpadding="5" class="tpopup">
	<col style="width:20%;"/>
	<col />
	<tbody>

		<tr>
			<td id="head" colspan="2">
			<?php 	if($mt_edit == "short"){	?>
						บันทึกการประชุมย่อ
			<?php	} else if(isset($edit_prevMt)){	?>
						แก้ไขรายงานการประชุม
			<?php	} else {  ?>
						บันทึกมติการประชุม
			<?php	}	?>
			
			<!--<br/> วาระที่ <?php/* echo al_to_th($agdt_no)."&nbsp;"; 	if($mt_edit == "short"){ 
																	echo getval("ags_head", $row);
																} else {  
																	echo getval("agdt_head", $row);
																}	*/?>
			-->
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<div id="agdtM">
					<?php 
						// วาระหลัก
						$no_main = isset($no_main) ? $no_main : ""; 
						echo al_to_th($no_main);
					?>
				</div>
			</td>
		</tr>
		<?php
			$cms_name = isset($nameMt) ? $nameMt : "";
			if(emt_getval("agdt_flag_extra", $row)==9 || emt_getval("ags_flag_extra", $row)==9){
				if(isset($rs_ags) && $rs_ags->num_rows() > 0 || isset($rs_agdt) && $rs_agdt->num_rows() > 0)
				{
					echo "<tr><td colspan=\"2\" align=\"center\"><hr width=\"95%\" /></td></tr>";
					echo "<tr><td colspan=\"2\" align=\"center\"><b>";
					echo "รายงานการประชุม" . $cms_name;
					echo "</b></td></tr>";
				
					echo "<tr><td colspan=\"2\" style=\"padding-left:150px;\">";
					
					if($mt_edit == "short")
					{
						$links = base64_encode($links);
						re_viewAgdtA($rs_ags, 0, 1, $cms_id, $rs_files, $links);
					}
					else
					{
						$link = base64_encode($link);
						//re_viewAgtp($rs_agdt,0,1,$cms_id,$rs_file);
						re_viewAgtp($rs_agdt,0,1,$cms_id,$rs_file,$link);
						
						// แสดงผลการรับรองมติ
						echo "<br/>";
						/*echo "<div align=\"center\">";
							$getSave = $mt_id."/".$cms_id;
							$links = str_replace("=",".",base64_encode($getSave));
							$getSave.="/".$links;
							$linkSave = site_url() . "/emeeting/agenda/showAppvAgdt/";
						?>
							<a href="<?php echo $linkSave . $getSave; ?>" class="agdtSave2" style="text-decoration:none">
							<input type="button" id="agdtAppv" name="agdtAppv" value="ตรวจสอบการรับรองมติ" >
							</a>
						<?php
						echo "</div><br/>";
						*/
					}
					echo "</td></tr>";
					echo "<tr><td colspan=\"2\">";
					echo "<hr width=\"95%\"/>";
					echo "</td></tr>";
					
				}
			}
		?>	
		<tr>
			<td><label class="emt_bold">ชื่อระเบียบ<br/>วาระการประชุม : </label></td>
			<td>
				<?php
					// หัวข้อย่อย
					$agdt_no = isset($agdt_no) ? $agdt_no : -1;
					if($agdt_no != -1){
					?>
						<div style="padding:4px 5px 10px;float:left;">
							<?php
								echo al_to_th($agdt_no);
							?>
						</div>
					<?php
					}
				?>
				<textarea name="agdt_head" rows="3" cols="80"><?php if($mt_edit == "short"){
																		echo emt_getval("ags_head", $row);
																	}else{
																		echo emt_getval("agdt_head", $row);
																	}?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td><label class="emt_bold">รายละเอียด : </label></td>
			<td>
				<textarea name="agdt_detail" rows="8" cols="70"><?php	if($mt_edit == "short"){
																			echo emt_getval("ags_detail", $row);
																		}else{
																			echo emt_getval("agdt_detail", $row);
																		}?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td><label class="emt_bold">เสนอโดย : </label></td>
			<td>
				<?php
					if($mt_edit == "short"){
						$agdt_by = emt_getval("ags_by", $row);
					}else{
						$agdt_by = emt_getval("agdt_by", $row);
					}
				?>
				<div style="position:relative;">
					<input type="text" name="agdt_by" id="agdt_by" size="80" value="<?php echo $agdt_by;?>"/>
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
			<td align="left"><label class="emt_bold">ประเด็นเสนอ : </label></td>
			<td>
				<textarea name="agdt_present" rows="8" cols="70"><?php 	if($mt_edit == "short"){
																			echo emt_getval("ags_present", $row);
																		}else{
																			echo emt_getval("agdt_present", $row);
																		}?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td align="left" ><label class="emt_bold">มติ : </label></td>
			<td>
				<textarea name="agdt_result" rows="8" cols="70"><?php 	if($mt_edit == "short"){
																			echo emt_getval("ags_result", $row);
																		}else{
																			echo emt_getval("agdt_result", $row);
																		}?>
				</textarea>
			</td>
		</tr>
		<?php
		if(emt_getval("agdt_flag_extra", $row)==9 || emt_getval("ags_flag_extra", $row)==9){
			if(isset($rs_ags) && $rs_ags->num_rows() > 0 || isset($rs_agdt) && $rs_agdt->num_rows() > 0){
				?>
				<tr>
					<td align="left" ><label class="emt_bold">บันทึกช่วยจำการแก้ไขรายงานการประชุม : </label></td>
					<td>
						<textarea name="agdt_edit" rows="8" cols="70"><?php 	if($mt_edit == "short"){
																					echo emt_getval("ags_edit", $row);
																				}else{
																					echo emt_getval("agdt_edit", $row);
																				}?>
						</textarea>
					</td>
				</tr>
				<?php
			}
		}
		?>
		<script type="text/javascript">//<![CDATA[
window.CKEDITOR_BASEPATH='<?php echo base_url();?>ckeditor/';
//]]></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js?t=B5GJ5GG"></script>

<script type="text/javascript">//<![CDATA[
CKEDITOR.replace('agdt_detail', {"height":200,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
CKEDITOR.replace('agdt_present', {"height":200,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
CKEDITOR.replace('agdt_result', {"height":200,"width":700,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","-","Undo","Redo","-",'NumberedList','BulletedList',"-","Indent","Outdent","-","Link","Unlink","-","Table","Font","FontSize"]]});
<?php 
if(emt_getval("agdt_flag_extra", $row)==9 || emt_getval("ags_flag_extra", $row)==9){
	if(isset($rs_ags) && $rs_ags->num_rows() > 0 || isset($rs_agdt) && $rs_agdt->num_rows() > 0){
		?>
		CKEDITOR.replace('agdt_edit', {"height":200,"width":600,"toolbar":[["Bold","Italic","Underline","Strike","Subscript","Superscript","-","Cut","Copy","Paste","Undo","Redo","-","Link","Unlink"]]});
		<?php
	}
}
?>
//]]></script>
		<tr>
			<td align="left">เอกสารแนบ :</td>
			<td>
				<div style="min-height:100px;background:#FCFCFC;margin:10px 3px;width:300px;border:1px solid #CCC;" id="T8A_wrap_list">
				<?php
					if ($mt_edit == "short"){
						if(isset($files) && $files->num_rows > 0){
							foreach($files->result() as $row_file){
								echo '<div class="MultiFile-label">
								<a href="javascript:void(0);" class="delete" id="'.$row_file->agfls_id.'"><img alt="" src="'.base_url().'images/emeeting/del.png"></a>
								<span class="MultiFile-title" title="File selected: delete.png">
								<a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfls_nname.'" target="_blank" >'.$row_file->agfls_oname.'</a></span>
								</div>';
							}
						}
					} else {
						if(isset($file) && $file->num_rows > 0){
							foreach($file->result() as $row_file){
								echo '<div class="MultiFile-label">
								<a href="javascript:void(0);" class="delete" id="'.$row_file->agfl_id.'"><img alt="" src="'.base_url().'images/emeeting/del.png"></a>
								<span class="MultiFile-title" title="File selected: delete.png">
								<a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >'.$row_file->agfl_oname.'</a></span>
								</div>';
							}
						}
					}
				?>
				</div>
				<?php if ($mt_edit != "short"){ ?>
						<input  type="file" id="T8A" name="file[]"/>
				<?php } ?>
			</td>
		</tr>
		
		<?php
			// show approved detail
			if(isset($qu_mt) && $qu_mt->mt_mts_id == 32 && $row->agdt_result != "" && isset($rs_agap)){
				// Load model
				$arr_model = isset($arr_model) ? $arr_model : "";
			
				echo "<tr><td colspan=\"2\" >";
				echo "<div id=\"content-body\" style=\"margin-top:20px;margin-bottom:20px;\" >";
				echo "<div style=\"margin-left:20px;margin-top:20px;margin-bottom:20px;width:90%;\" class=\"apprv\" >{$appv_name}</div>";
					echo "<table style=\"margin-left:20px;\" class=\"emt_table tapprv\" >";
						echo "<thead>";
							echo "<tr>";
								echo "<th nowrap=\"nowrap\" >ลำดับที่</th>";
								echo "<th nowrap=\"nowrap\">บุคลากรในการประชุม</th>";
								echo "<th width=\"60%\" >รายละเอียด</th>";
							echo "</tr>";
						echo "</thead>";
						echo "<tbody>";
							if(isset($rs_agap) && $rs_agap->num_rows() > 0){
								$line = 0;
								foreach($rs_agap->result() as $row){
									// init
									$pnt_id = $name = $adminId = $adminName = $ag_name = $pnt_typeAgenda = "";
									
									$arr_ps = get_arrPnt(null, $row->pnt_id, $arr_model, $cond="", $flag_edit=0);
									if(!empty($arr_ps)){
										foreach($arr_ps as $key => $value){
											$pnt_id = $value["pnt_id"];
											$pnt_parent_id = $value["pnt_parent_id"];
											$pnt_parent_adminId = $value["pnt_parent_adminId"];
											$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
											$name = $value["pnt_name"];
											$adminName = $value["pnt_adminName"];
										}
									}
									
									// print
									$line++;
									
									$rowPnt = "<tr>";
									$rowPnt .= "<td nowrap=\"nowrap\" align=\"center\" valign=\"top\" style=\"font-size:13px;\" >" . al_to_th($line) . "</td>";
									if($pnt_typeAgenda == 0){
										// โดยชื่อ
										$rowPnt .= "<td style=\"padding-left:10px;font-size:13px;\" valign=\"top\" nowrap=\"nowrap\" >";
										$rowPnt .= $name;
										if($pnt_parent_adminId != 0 && $adminName != ""){
											$rowPnt .= "<br />(".$adminName.")";
										}
										$rowPnt .= "</td>";
									}
									else{
										// โดยตำแหน่ง
										$rowPnt .= "<td style=\"padding-left:10px;font-size:13px;\" valign=\"top\" nowrap=\"nowrap\" >".$adminName."<br />(".$name.")";
										$rowPnt .= "</td>";
									}
									// note
									$rowPnt .= "<td style=\"font-size:13px;\" >{$row->agap_note}</td>";
									$rowPnt .= "</tr>";
									echo $rowPnt;
								}
							}
							else{
								echo "<tr><td colspan=\"3\" class=\"red\" align=\"center\" style=\"font-size:13px;\" >{$this->config->item("emt_not_found")}</td></tr>";
							}
						echo "</tbody>";
					echo "</table>";
				echo "</div></div>";				
				echo "</td></tr>";
			}
		?>
		
		<tr>
			<td colspan="2" id="button">
				<input type="hidden" name="agdt_id" id="agdt_id" value="<?php echo $agdt_id; ?>" />
				<input type="hidden" name="mt_id" id="mt_id" value="<?php echo $mt_id; ?>" />
				<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id; ?>" />
				<input type="hidden" name="agdt_level" id="agdt_level" value="<?php echo $agdt_level; ?>" />
				<input type="hidden" name="mt_edit" id="mt_edit" value="<?php echo $mt_edit; ?>" />
				<input type="hidden" name="agdt_flag_extra" id="agdt_flag_extra" value="<?php echo emt_getval("agdt_flag_extra", $row); ?>" />
				<input type="hidden" name="ags_flag_extra" id="ags_flag_extra" value="<?php echo emt_getval("ags_flag_extra", $row); ?>" />
				
				<?php
				if(isset($edit) AND $edit){ // Edit
				?>
				<input type="hidden" name="agdt_seq" id="agdt_seq" value="<?php echo $agdt_seq; ?>" />
				<input type="hidden" name="agdt_parent_id" id="agdt_parent_id" value="<?php echo $agdt_parent_id; ?>" />
				<?php
				}
				?>
				
				<!--<input type="hidden" name="no_ag" id="no_ag" value="<?php echo $no_ag; ?>" />-->
				
				<input type="submit" name="submit" id="submit" value="บันทึก" />
			</td>
		</tr>
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

<?php

function re_viewAgdtA($child,$no=0,$ck_edit=0,$cms_id,$rs_files,$links){
	$linkSave = site_url() . "/emeeting/shortAgenda/agdtSave/";
	// Image save
	$save = array(
		"src" => "images/emeeting/icons/edit.png",
		"width" => "16"
	);
	$imgSave = img($save);
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "แก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	?>
	<ul class="sortable" >
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->ags_id; ?>">
			<?php 
			echo "<span class=\"string\"><div class=\"tbin\">";
			$i = $i + 1;
			if($row_child->ags_level == 0){
				echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
				$ags_no = $i;
			} else {
				echo "<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
				$ags_no = $no . "." . $i;
			}
			echo "<b>".$row_child->ags_head."</b>";
			//if($row_child->child->num_rows()==0){
				// Detail
				//echo "<br/><u>".$str_detail."</u>";
				if($row_child->ags_detail != "")
				{
					echo $row_child->ags_detail;
					$num1 = 0;
				}
				else
				{
					$num1 = 1;
				}
				
				//	เสนอโดย
				if($row_child->ags_by != "")
				{
					echo $row_child->ags_by."<br/>";
				}
				
				// File
				$ag_file = $rs_files->getFileByAgdtId($row_child->ags_id);
				
				if($ag_file->num_rows() > 0){
					echo "<b><u>".$str_file."</u></b>";
					echo "<ul>";
					foreach($ag_file->result() as $row_file)
					{
						echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfls_nname.'" target="_blank" >- '.$row_file->agfls_oname.'</a></li>';
					}
					echo "</ul>";
					$num2 = 0;
				}
				else
				{
					$num2 = 1;
					
				}
				// Present
				if($row_child->ags_present != "")
				{
					echo "<b><u>".$str_present."</u></b>";
					echo $row_child->ags_present;
					$num3 = 0;
				}
				else
				{
					$num3 = 1;
				}
				// Result
				
				if($row_child->ags_result != "")
				{
					echo "<b><u>".$str_result."</u></b>";
					echo $row_child->ags_result;
					$num4 = 0;
				}
				else
				{
					$num4 = 1;
				}
				
				$sum = $num1 + $num2 + $num3 + $num4;
				if($sum == 4)
				{
					//echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
				}
			//}
			echo "</div></span>";
			$getSave = $row_child->ags_id."/".$row_child->ags_level."/".$row_child->ags_mt_id."/".$cms_id."/".$ck_edit."/".$ags_no."/1/".$links;
			//$getSave = $row_child->ags_id."/".$row_child->ags_level."/".$row_child->ags_mt_id."/".$cms_id."/".$ck_edit."/".$ags_no."/1";
			//$links = str_replace("=",".",base64_encode($getSave));
			//$getSave.="/".$links;
			?>
			<span style="float:right;margin:3px;height:18px;">
				<a href="<?php echo $linkSave . $getSave; ?>" class="agdtSave2" id="<?php echo $row_child->ags_id; ?>" title="บันทึกการประชุม" ><?php echo $imgSave; ?></a>
			</span>
			<?php
			if($row_child->child->num_rows()>0){
				re_viewAgdtA($row_child->child,$no_send,$ck_edit,$cms_id,$rs_files,$links);
			} 
			?>
		</li>
		<?php
			if($row_child->ags_level == 0){
				echo "<hr />";
			}
		}
		?>
	</ul>
<?php
}

function re_viewAgtp($child,$no=0,$ck_edit=0,$cms_id,$rs_file,$link){
	$linkSave = site_url() . "/emeeting/agenda/agdtSave/";
	// Image save
	$save = array(
		"src" => "images/emeeting/icons/edit.png",
		"width" => "16"
	);
	$imgSave = img($save);
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "แก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	?>
	<ul class="sortable" >
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		<li id="<?php echo $row_child->agdt_id; ?>">
			<?php 
			echo "<span class=\"string\"><div class=\"tbin\">";
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
				$agdt_no = $i;
			} else {
				echo "<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
				$agdt_no = $no . "." . $i;
			}
			echo "<b>".$row_child->agdt_head."</b><br/>";
			//if($row_child->child->num_rows()==0){
				// Detail
				//echo "<br/><u>".$str_detail."</u>";
				if($row_child->agdt_detail != "")
				{
					echo $row_child->agdt_detail;
					$num1 = 0;
				}
				else
				{
					echo "<br/>";
					$num1 = 1;
				}
				
				//	เสนอโดย
				if($row_child->agdt_by != "")
				{
					echo $row_child->agdt_by."<br/><br/>";
				}
				
				// File
				$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
				
				if($ag_file->num_rows() > 0){
					echo "<b><u>".$str_file."</u></b>";
					echo "<ul>";
					foreach($ag_file->result() as $row_file)
					{
						echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
					}
					echo "</ul>";
					$num2 = 0;
				}
				else
				{
					$num2 = 1;
					
				}
				// Present
				if($row_child->agdt_present != "")
				{
					echo "<b><u>".$str_present."</u></b>";
					echo $row_child->agdt_present;
					$num3 = 0;
				}
				else
				{
					$num3 = 1;
				}
				// Result
				
				if($row_child->agdt_result != "")
				{
					echo "<b><u>".$str_result."</u></b>";
					echo $row_child->agdt_result;
					$num4 = 0;
				}
				else
				{
					$num4 = 1;
				}
				
				$sum = $num1 + $num2 + $num3 + $num4;
				if($sum == 4)
				{
					//echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
				}
			//}
			echo "</div></span>";
			
			if($ck_edit == ""){
				$ck_edit = -1;
			}
			//$no_ag = $no_send;
			
			//$getSave = $row_child->agdt_id."/".$row_child->agdt_level."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$agdt_no."/1/".$link;
			$getSave = $row_child->agdt_id."/".$row_child->agdt_level."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$agdt_no."/1";
			$link = str_replace("=",".",base64_encode($getSave));
			$getSave.="/".$link;
			?>
			<span style="float:right;margin:3px;height:18px;">
				<a href="<?php echo $linkSave . $getSave; ?>" class="agdtSave2" id="<?php echo $row_child->agdt_id; ?>" title="บันทึกการประชุม" ><?php echo $imgSave; ?></a>
			</span>
			<?php
			if($row_child->child->num_rows()>0){
				re_viewAgtp($row_child->child,$no_send,$ck_edit,$cms_id,$rs_file,$link);
			}
			?>
		</li>
		<?php
			if($row_child->agdt_level == 0){
				echo "<hr />";
			}
		}
		?>
	</ul>
<?php
}
?>