<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/jquery.fcbkcomplete.js" charset="utf-8"></script>

<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
echo link_tag('css/emt_css/emt_auto_selete.css');
?>
<script language="javascript">
$(document).ready(function(){
	//Add event
	//$("#btnSubmit").attr("disabled","disabled");
	//$("#btnExpN").attr("disabled","disabled");
	//$("#btnExpA").attr("disabled","disabled");
	$("#chk_all").live("click",getChecked);
	$(".chk_invite").live("click",getChecked);
	$("#back").click(back);
		$("#back").click(back);
	//tooltip
	//$("#btnSubmit").click(saved);
	/*$(".expInvMsg").fancybox({
		'height' 			: 360,
		'width' 			: 460,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'href'				: '<?php echo site_url() . "/emeeting/noticeMeeting/exportNoticeMeeting/" . $mt_id; ?>'
	});
	$(".expAgenda").fancybox({
		'height' 			: 360,
		'width' 			: 460,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		'href'				: '<?php echo site_url() . "/emeeting/noticeMeeting/exportAgenda/" . $cms_id . "/" . $mt_id; ?>'
	});*/
	
	// Export Word.doc
	$("#btnExpNotice").click(function(){
		sendPost('frmExpNotice',{'ivm_id':'', 'mt_id':'<?php echo $mt_id;?>'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportNoticeMeeting');?>','','');
	});
	$("#btnExpAg").click(function(){
		sendPost('frmExpAg',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>', 'flag':'agenda'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','');
	});
	$("#btnExpAll").click(function(){
		sendPost('frmExpAll',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','');
	});
	
	// Export Word.odt
	$("#btnExpNoticeOdt").click(function(){
		sendPost('frmExpNoticeOdt',{'ivm_id':'', 'mt_id':'<?php echo $mt_id;?>','flag_odt':1},'<?php echo site_url($this->emt_path.'noticeMeeting/exportNoticeMeeting');?>','','');
	});
	$("#btnExpAgOdt").click(function(){
		sendPost('frmExpAgOdt',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>', 'flag':'agenda', 'flag_odt':1},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','');
	});
	$("#btnExpAllOdt").click(function(){
		sendPost('frmExpAllOdt',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>', 'flag_odt':1},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','');
	});
	
	//preview หนังสือเชิญ
	$("#preview").fancybox({
			'height' 			: '100%',
			'width' 			: '80%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'onClosed'			: function() {
									//$('#editForm').submit();
								}
	});
	
	//Function
	function getChecked()
	{
		if($(this).attr("checked") == "checked")
		{
			$("#btnSubmit").removeAttr("disabled");
		}
	}
	
	function back()
	{
		url = site_url+"emeeting/emeetingView";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "")
	}
	
	function saved()
	{
		$("#btnExpN").removeAttr("disabled");
		$("#btnExpA").removeAttr("disabled");
	}
});

function chkList(flag,tclass)
{
	if(flag == 1){
		$("."+tclass).attr("checked",true);
	}
	else{
		$("."+tclass).attr("checked",false);
	}
}

/*function chk_checkbox()
{
	var num = 0;
	$(".chk_invite",this).each(function() {
		if($(this).attr("checked") == "checked"){
			num = num + 1;
		}		
	});
	if(num == 0) {
		alert('กรุณาคลิกเลือกอีเมล!');
		return false;
	} 
}*/

function chk_checkbox(this_obj)
{
	var id_btn = $(this_obj).attr("id");
	if( id_btn != "btnNotice" && id_btn != "btnSendMail"){
		return false;
	}
	
	$("input[name='emailFrom']").addClass("validate");
	var num = 0;
	$(".chk_invite").each(function() {
		if(this.checked){
			num = num + 1;
		}
	});
	if(num == 0){
		$("input[name='emailFrom']").removeClass("validate");
		if(id_btn == "btnNotice"){
			return true;
		}
		else{
			$("input[name='emailFrom']").addClass("validate");
			alert('กรุณาคลิกที่ checkbox เพื่อส่งผ่านอีเมล!');
			return false;
		}
	}
	else{
		var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var email = $("input[name='emailFrom']").val();
		
		if(email != "" && pattern.test(email) == false) {
			$("input[name='emailFrom']").removeClass("validate");
			alert('รูปแบบอีเมลผู้ส่งไม่ถูกต้อง!');
			return false;
		}
	}
}

</script>
<style>
	.icon, #btnNotice, #btnSendMail{
		cursor : pointer;
	}
	.iconW {
		margin : 0px 5px 0px 20px;
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
	<!--div class="da-button-row" style="text-align:right;position:absolute;bottom:19px;right:5px;"-->
	<div style="text-align:right;padding:50px 195px 5px 100px">
	<a href="<?php echo site_url().$this->config->item("emt_folder")."noticeMeeting/noticePreview/".$mt_id;?>" id="preview" >
	<input type="button" class="da-button blue" name="preview" value="ตัวอย่างหนังสือเชิญ" /></a>
	</div>
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                  <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/address_book_2.png";?> />
                    ส่งหนังสือเชิญเข้าร่วมประชุม
                </span>
            </div>
		<?php
			$action = "noticeMeeting/noticeAndSendMail";
			//$action = "noticeMeeting/sendMail";
			echo form_open($this->config->item("emt_path").$action,"frmNoticeMeeting");
		?>
		
	
		
		<div class="da-panel-content">
            <table class="da-table da-detail-view">
			<tbody>
			<tr>
				<th>ชื่อผู้ส่งอีเมล</th>
				<td>
					<?php
						if(isset($senderName) && $senderName != ''){
							$senderPntId = isset($senderPntId) ? $senderPntId : null;
							echo $senderName;
						
							?>
							<input type="hidden" name="senderName" value="<?php echo $senderName; ?>" />
							<?php
						}
						else{
							?>
							<input type="text" name="senderName" style="width:95%;" />
							<?php
						}
						?>
						<input type="hidden" name="senderPntId" value="<?php echo $senderPntId; ?>" />
				</td>
			</tr>
			<tr>
				<th>อีเมล</th>
				<td>
					<input type="text" title="อีเมลผู้ส่ง" name="emailFrom" style="width:70%;" value="<?php 
						if(isset($emailFrom) && $emailFrom != ""){ 
							echo $emailFrom; 
						} 
					?>" />&nbsp;<span class="red">*</span>
					<span href="\" class=\"subindex\" title=\"กรุณาพิมพ์ ชื่อ นามสกุล เพื่อค้นหารายชื่อในระบบ แล้วคลิกเลือกรายชื่อใน dropdrown ไม่เช่นนั้นจะเป็นบุคคลภายนอก\">
					
				</td>
			</tr>
			<tr>
				<td style="padding-top:15px;" colspan="3"><strong>หมายเหตุ:&nbsp;</strong><span class="red">*&nbsp;</span> หมายถึง ต้องกรอกข้อมูลให้สมบูรณ์</td>
			</tr>
			<tr>
				<td align="right" colspan="2">
				<?php if($mt_mts_id < 23){ ?>
				
				<input type="submit" name="btnNotice" id="btnNotice" value="แจ้งหนังสือเชิญ" onclick="return chk_checkbox(this);"/> 
				
				<?php } else { ?>
				<font color="red">
				<?php
				echo "คุณได้แจ้งการประชุมแล้ว" ; } ?>
				</font>
				</td>
			</tr>
			</tbody>
		</table>
			</div>
		</div>	
	</div>
		
		<p>&nbsp;</p>
		
		<div class="grid_4_center">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_images.png";?> />
                                        รายการส่งอีเมล
                                    </span>
                                    
                                </div>
		
	
		<div class="da-panel-content">
		<table class="da-table da-detail-view">
			<thead>
				<tr>
					<th><input type="checkbox" name="chk_all" id="chk_all" onclick="chkList(this.checked,'chk_invite')" /></th>
					<th nowrap="nowrap">ลำดับที่</th>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่งในการบริหาร</th>
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>
			<?php
				if(isset($arr_pnt) && !empty($arr_pnt)){
					$row = 0;
					foreach($arr_pnt as $key => $value){
						$pnt_id = $value["pnt_id"];
						$pnt_personId = $value["pnt_personId"];
						$pnt_parent_id = $value["pnt_parent_id"];
						$pnt_parent_adminId = $value["pnt_parent_adminId"];
						$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
						$name = $value["pnt_name"];
						$adminName = $value["pnt_adminName"];
						$pnt_email = $value["pnt_email"];	// array of email
						$pnt_flag_charge = $value["pnt_flag_charge"];
						
						$row++;
						
						$rowPnt = "<tr>";
						$rowPnt .= "<td align=\"center\">";
						$rowPnt .= "<input type=\"checkbox\" name=\"chk_invite[]\" class=\"chk_invite\" value=\"{$key}\" />";
						$rowPnt .= "</td>";
						$rowPnt .= "<td align=\"center\">";
						if($pnt_flag_charge){
							$rowPnt .= "<comment>{$row}</comment>";
						}
						else{
							$rowPnt .= $row;
						}
						$rowPnt .= "<input type=\"hidden\" name=\"name_{$pnt_id}\" value=\"{$name}\" />";
						$rowPnt .= "</td>";
						$rowPnt .= "<td style=\"padding-top:10px;padding-bottom:10px;\" nowrap=\"nowrap\" >";
						if($pnt_flag_charge){
							$rowPnt .= "<comment style=\"padding-left:0px;\" >{$name}</comment>";
						}
						else{
							$rowPnt .= $name;
						}
						$rowPnt .= "</td>";
						$rowPnt .= "<td>";
						if($pnt_flag_charge){
							if($pnt_parent_adminId){
								$rowPnt .= "<comment style=\"padding-left:0px;\" >{$adminName}</comment>";
							}
						}
						else{
							if($pnt_parent_adminId){
								$rowPnt .= $adminName;
							}
						}
						$rowPnt .= "</td>";
						$rowPnt .= "<td>";
						$rowPnt .= "<input type=\"hidden\" name=\"arr_pntId[{$key}]\" value=\"{$pnt_id}\" />";
						$rowPnt .= "<select class=\"auto_select\" id=\"{$pnt_id}\" name=\"pnt_email[{$key}][]\">";
						if(!empty($pnt_email)){
							foreach($pnt_email as $e_key => $e_value){
								$rowPnt .= "<option value=\"{$e_value}\" class=\"selected\">{$e_value}</option>";
							}
						}
						$rowPnt .= "</select>";
						$rowPnt .= "</td>";
						$rowPnt .= "</tr>";
						echo $rowPnt;
					}
						?><tr>
						<td align="right" colspan="5">
						<div class="da-button-row">
						<input type="submit" name="btnSendMail" class="da-button blue id="btnSendMail" value="ส่งหนังสือเชิญผ่าน E-mail" onclick="return chk_checkbox(this);"/>
						</div>
						</td>
						</tr>
						<?php
				}
				else
				{
				?>
				<tr>
					<td colspan="5" class="red" align="center"><?php echo $this->config->item("emt_not_found");?></td>
				</tr>
				<?php
				}
			?>
			</tbody>
		</table>
		</div>
			</div>
		</div>
		<p>&nbsp;</p>
		
		<div hidden align="center" >
			<!--input type="submit" name="btnSubmit" id="btnSubmit" value="ส่งอีเมล์" / -->
			<?php if($mt_mts_id < 23){ ?>
						<input type="submit" name="btnNotice" id="btnNotice" value="แจ้งและส่งหนังสือเชิญผ่าน E-mail" onclick="return chk_checkbox(this);"/>
			<?php } else { ?>
						<input type="submit" name="btnSendMail" id="btnSendMail" value="ส่งหนังสือเชิญผ่าน E-mail" onclick="return chk_checkbox(this);"/>
			<?php } ?>
			<input type="hidden" name="cms_id" id="cms_id" value="<?php echo $cms_id;?>" />
			<input type="hidden" name="mt_id" id="mt_id" value="<?php echo $mt_id;?>" />
			<a href="<?php echo site_url().$this->config->item("emt_folder")."noticeMeeting/noticePreview/".$mt_id;?>" id="preview" ><input type="button" name="preview" value="ตัวอย่างหนังสือเชิญ" /></a>
		</div>
		<?php
			echo form_close();
		?>
		
		<div align="right" style="width:100%;margin-top:30px;">
			<fieldset style="width:45%;margin-right:25px;text-align:left;">
				<comment>
					<div style="margin:5px;">หมายเหตุ : </div>
					<div style="margin:5px;padding-left:20px;">- หากต้องการส่งหนังสือเชิญประชุมผ่าน E-mail กรุณาคลิกที่ checkbox ด้านหน้ารายชื่อผู้เข้าร่วมประชุม </div>
					<div style="margin:5px;padding-left:20px;">- กรุณากด Enter ทุกครั้งที่เพิ่มอีเมลใหม่ หรือคลิกเลือกอีเมลที่แสดงใน Dropdown </div>
				</comment>
			</fieldset>
		</div>
		
		<p>&nbsp;</p>
		
		<?php
			$doclogo = array(
				"src" => "images/emeeting/doclogo.png",
			);
			$imgDoc = img($doclogo);
			
			$odtlogo = array(
				"src" => "images/emeeting/odtlogo.png",
			);
			$imgOdt = img($odtlogo);
			//echo "<a class=\"icon\" id=\"back\">{$imgOdt}</a>";
			//echo "<a class=\"icon\" id=\"back\">{$imgDoc}</a>";
		?>
	  <div class="grid_2_center">
      <div class="da-panel collapsible">
      <div class="da-panel-header">
      <span class="da-panel-title">
      <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/single_word_document.png";?> />
                   ไฟล์เอกสาร
       </span>
		</div>	
		<div class="da-panel-content">
		<table class="da-table">
			<thead>
				<tr>
					<th>ส่งออกเอกสาร</th>
					<th colspan="2" width="30%">ดำเนินการ</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						ส่งออกหนังสือเชิญเข้าร่วมประชุม
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpNotice\" title=\"ส่งออกเป็น word\" >{$imgDoc}</a>";
						?>
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpNoticeOdt\" title=\"ส่งออกเป็น open office\" >{$imgOdt}</a>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						ส่งออกระเบียบวาระการประชุม
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpAg\" title=\"ส่งออกเป็น word\" >{$imgDoc}</a>";
						?>
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpAgOdt\" title=\"ส่งออกเป็น open office\" >{$imgOdt}</a>";
						?>
					</td>
				</tr>
				<tr>
					<td>
						ส่งออกเอกสารประกอบการประชุม
					</td>
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpAll\" title=\"ส่งออกเป็น word\" >{$imgDoc}</a>";
						?>
					</td>
					<td align="center">
						<?php
						echo "<a class=\"icon\" id=\"btnExpAllOdt\" title=\"ส่งออกเป็น open office\" >{$imgOdt}</a>";
						?>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>
		</div>
		
		
		
		<p>&nbsp;</p>
		<!--<div style="margin-left:25px;">
			<input type="button" name="btnExpN" id="btnExpN" onclick="sendPost('frmExpN',{'ivm_id':'', 'mt_id':'<?php echo $mt_id;?>'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportNoticeMeeting');?>','','')" value="ส่งออกหนังสือเชิญเข้าร่วมประชุม" class="expInvMsg"/>
			<br/>
			<input type="button" name="btnExpAg" id="btnExpAg" onclick="sendPost('frmExpAg',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>', 'flag':'agenda'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','')" value="ส่งออกระเบียบวาระการประชุม" />
			<br/>
			<input type="button" name="btnExpA" id="btnExpA" onclick="sendPost('frmExpA',{'cms_id':'<?php echo $cms_id;?>', 'mt_id':'<?php echo $mt_id;?>'},'<?php echo site_url($this->emt_path.'noticeMeeting/exportAgenda');?>','','')" value="ส่งออกเอกสารประกอบการประชุม" />
		</div>
		<p>&nbsp;</p>-->
	
	<script type="text/javascript">
		$(document).ready(function(){
			$(".auto_select").fcbkcomplete({
				json_url: site_url+"emeetingAjax/searchAutoEmail",
				addontab: true,                   
				maxitems: 10,
				input_min_size: 0,
				height: 10,
				width: 380,
				cache: false,							// unique in first search
				newel: true,							// add new element
				complete_text: "Start to email..."
				//select_all_text: "select all email"	// select all in option that not class="selected"
			});
		},$(this).attr("id"));
	</script>
		</div>
