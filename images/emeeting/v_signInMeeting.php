<script language="javascript">
$(document).ready(function(){
	//Add event
	$("#back").click(back);
	
	//Function
	function back(){
		url = site_url+"emeeting/emeetingView";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "")
	}
});
</script>
<style>
	.icon{
		cursor : pointer;
	}
</style>
		<div id="guide" style="padding:50px 195px 5px;">
			<?php
				$back = array(
					"src" => "images/emeeting/icons/back.png",
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			?>
		</div>
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                    <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/single_document.png"; ?> />
							ใบเซ็นชื่อ 
                </span>
                                    
            </div>
            <div class="da-panel-content">
		<?php
			$action = "signInMeeting";
			echo form_open($this->config->item("emt_path").$action,"frmSign");
		?>
		<table class="da-table" style="width:100%;" align="center" border="0">
			<thead>
				<tr>
					<th width="50px;" >ลำดับที่</th>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่งในการบริหาร</th>
					<th nowrap="nowrap" >ตำแหน่งในการประชุม</th>
					<th width="20%" >หน่วยงาน</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Load model
					$arr_model = isset($arr_model) ? $arr_model : "";
	
					if(isset($arr_pnt) && !empty($arr_pnt)){
						$i = 0;
						foreach($arr_pnt as $key => $value){
							$pnt_id = $value["pnt_id"];
							$pnt_parent_id = $value["pnt_parent_id"];
							$pnt_parent_adminId = $value["pnt_parent_adminId"];
							$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
							$name = $value["pnt_name"];
							$adminName = $value["pnt_adminName"];
							$ag_name = $value["pnt_ag_name"];
							$deptName = $value["pnt_deptName"];
							$pnt_adminId = $value["pnt_adminId"];
							
							$pnt_flag_charge = $value["pnt_flag_charge"];
							$pnt_flag_instead = $value["pnt_flag_instead"];
							
							$i++;
							
							$rowPnt = "<tr>";
							$rowPnt .= "<td align=\"center\">{$i}</td>";
							$rowPnt .= "<td style=\"padding-top:10px;padding-bottom:10px;\" nowrap=\"nowrap\" >{$name}";
							if($pnt_flag_instead == 1){
								$rowPnt .= "<br /><comment style=\"padding-left:0px;\" >({$adminName})</comment></td>";
							}
							$rowPnt .= "<td align=\"center\">";
							if($pnt_adminId && $adminName != ""){
								if($pnt_flag_instead == 1){
									$adminName = "";
									
									$mpnt = $arr_model["mpnt"];
									$mpnt->pnt_id = $pnt_id;
									$rs_ps = $mpnt->getPsByPntId();
									if($rs_ps->num_rows() == 1){
										// get person info
										$arr_ps = get_pntByTypeAg($rs_ps, $arr_model, $flag_edit=0);
										if(!empty($arr_ps)){
											foreach($arr_ps as $key => $value){
												$adminName = $value["pnt_adminName"];
											}
										}
									}
									$rowPnt .= $adminName;
								}
								else{
									$rowPnt .= $adminName;
								}
							}
							$rowPnt .= "</td>";
							$rowPnt .= "<td align=\"center\">{$ag_name}</td>";
							$rowPnt .= "<td align=\"center\">{$deptName}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
					else{
						$rowPnt = "<tr>";
						$rowPnt .= "<td colspan=\"5\" class=\"red\" align=\"center\">{$this->config->item("emt_not_found")}</td>";
						$rowPnt .= "</tr>";
						echo $rowPnt;
					}
				?>
				</tbody>
			</table>
			<!--
				<tr>
				<td colspan="4" align="left" style="padding:10px 10px 10px 10px">
				เพิ่มแถว&nbsp;&nbsp;<input type="text" name="row" id="row" value="10" size="5" />&nbsp;&nbsp;แถว
				</td>
				<td>
				<div style="width:360px;border:1px solid #D0DCF0;background:white;padding:5px 5px 5px 5px;" align="center">
				<input type="radio" name="signIn_type" value="1" style="width:20;" checked="checked">แบบทางการ&nbsp;&nbsp;&nbsp;
				<input type="radio" name="signIn_type" value="2" style="width:20;">แบบธรรมดา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="btnSubmit" id="btnSubmit" value="ส่งออกใบเซ็นชื่อ" class="da-button blue"/>
				<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id;?>" />
				<input type="hidden" name="mt_id" id="mt_id" value="<?php echo $mt_id;?>" />
				<input type="hidden" name="flag_signIn" id="flag" value="1" />
				</div>
				</td>
				</tr>
		
		</div>
		</div>
		</div>
		-->
		<p>&nbsp;</p>
		
		<div align="center">
		เพิ่มแถว&nbsp;&nbsp;<input type="text" name="row" id="row" value="10" size="5" />&nbsp;&nbsp;แถว
		</div>
		<br/>
		<center>
		<table>
		<tr><td>
			<div style="width:360px;border:1px solid #D0DCF0;background:white;padding:5px 5px 5px 5px;" align="center" div class="da-button-row" >
				<input type="radio" name="signIn_type" value="1" style="width:20;" checked="checked">แบบทางการ&nbsp;&nbsp;&nbsp;
				<input type="radio" name="signIn_type" value="2" style="width:20;">แบบธรรมดา&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="submit" name="btnSubmit" id="btnSubmit" value="ส่งออกใบเซ็นชื่อ" class="da-button blue"  />
				<input type="hidden" name="cms_id" id="cms_id" value="<?php //echo $cms_id;?>" />
				<input type="hidden" name="mt_id" id="mt_id" value="<?php //echo $mt_id;?>" />
				<input type="hidden" name="flag_signIn" id="flag" value="1" />
			</div>
		</td></tr>
		</table> 
		</center>
		
		<?php
			echo form_close();
		?>