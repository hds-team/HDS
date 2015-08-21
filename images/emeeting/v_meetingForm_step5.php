<!-- TaB -->
<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />

<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>

<script type="text/javascript">
  if (document.location.hash == "" || document.location.hash == "#")
    document.location.hash = "#tabs-5";
</script>
<!-- TaB -->

<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<script src='<?php echo base_url();?>js/emt_js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');

$status = (isset($status)) ? $status : "";
$public = (isset($public)) ? $public : "";
?>

<script type="text/javascript">
	$(document).ready(function() {
		// Init
		$( ".sortable" ).sortable({
			placeholder: "ui-state-highlight",
			opacity: 0.95,
			delay: 50,
			stop:function(event, ui){
				var url = "<?php 
					if( $status == "short" ){
						echo site_url() . "emeeting/shortAgenda/agdtSeq"; 
					} else {
						echo site_url() . "emeeting/agenda/agdtSeq"; 
					}?>";
				var index = $(this).sortable('toArray');
				$.post(url,{index:index},function(data){
					//location.reload();
					url = "<?php 
					if( $status == "edit" ){
						echo site_url() . "emeeting/emeeting/emeetingEditAgenda"; 
					} else if( $status == "short" ){
						echo site_url() . "emeeting/shortAgenda"; 
					} else {
						echo site_url() . "emeeting/emeeting/emeetingAdd"; 
					}
					?>";
					sendPost("reload", {"step":"5","mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
				});
			}
		});
		$( ".sortable" ).disableSelection();
		$(".agdtAdd").fancybox({
			'height' 			: '98%',
			'width' 			: '98%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'onClosed'			: function() {
									<?php if( $status != "edit" ){ ?>
										$('#addForm').submit();
									<?php } else { ?>
										$('#editForm').submit();
									<?php } ?>
								}
		});
		$(".agdtEdit").fancybox({
			'height' 			: '98%',
			'width' 			: '98%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'onClosed'			: function() {
									<?php if( $status != "edit" ){ ?>
										$('#addForm').submit();
									<?php } else { ?>
										$('#editForm').submit();
									<?php } ?>
								}
		});
		$(".agdtSave").fancybox({
			'height' 			: '98%',
			'width' 			: '98%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'onClosed'			: function() {
									$('#shortForm').submit();
								}
		});
		
		// Add Event
		<?php 	if($public == "P"){ ?>
					$("#copyURL").removeAttr("disabled");
					$("#cancelPublicAg").show();
					$("#publicAg").hide();
		<?php	} else {	?>
					$("#copyURL").attr("disabled","disabled");
					$("#cancelPublicAg").hide();
		<?php	}	?>
			
		/*$(".agdtDel").click(agdtDel);*/
		$("#back").click(back);
		$("#publicAg").click(publicAg);
		$("#cancelPublicAg").click(cancelPublicAg);
		$("#expShortAg").click(expShortAg);
		$("#copyURL").click(copyURL);
		$( "#boxCopy" ).hide();
	
		// Function 
		function publicAg(){
			url = site_url+"shortAgenda/publicShortAgenda";
			sendPost("frmPublicAg", {"cms_id":<?php echo $cms_id; ?>,"mt_id":<?php echo $mt_id; ?>}, url, "", "");
		}
		
		function cancelPublicAg(){
			url = site_url+"shortAgenda/cancelPublicShortAgenda";
			sendPost("frmCancelPublicAg", {"cms_id":<?php echo $cms_id; ?>,"mt_id":<?php echo $mt_id; ?>}, url, "", "");
		}
		
		function expShortAg(){
			url = site_url+"shortAgenda/exportShortAgenda";
			sendPost("frmExpShortAg", {"cms_id":<?php echo $cms_id; ?>,"mt_id":<?php echo $mt_id; ?>}, url, "", "");
		}
		
		function copyURL(){
			var options = {};
			var selectedEffect = "blind";
			options = { to: { width: 380, height: 50 } };
			// run the effect
			$( "#boxCopy" ).toggle( selectedEffect, options, 500 );
			$( ".inputUrl" ).focus();
			$( ".inputUrl" ).select();
		}
	
		/*function agdtDel(){
			if(!confirm("คุณต้องการลบใช่หรือไม่")){
				return false;
			}
			var url = "<?php 
				if( $status == "short" ){
					echo site_url() . "/emeeting/shortAgenda/agdtDel"; 
				} else {
					echo site_url() . "/emeeting/agenda/agdtDel"; 
				}?>";
			var id = $(this).attr("id");
			var obj = this;
			$.post(url,{agdt_id:id},function(data){
				if(data=="ok"){
					$(obj).parents("li:first").remove();
					url = "<?php 
					if( $status == "edit" ){
						echo site_url() . "/emeeting/emeeting/emeetingEditAgenda"; 
					} else if( $status == "short" ){
						echo site_url() . "/emeeting/shortAgenda"; 
					} else {
						echo site_url() . "/emeeting/emeeting/emeetingAdd"; 
					}
					?>";
					sendPost("reload", {"step":"4","mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "")
				}
			});
		}*/
		
		function back(){
			url = site_url+"emeeting/emeetingView";
			sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "")
		}
		
		$(".MultiFile-label a.delete").click(function(){
			id = $(this).attr("id");
			url = "<?php echo site_url(); ?>emeeting/emeeting/deleteFile";
			var obj = $(this).parents("div:first");
			$.post(url,{mf_id:id},function(data){
				obj.remove();
			});
		});
	});
	
	// Short Agenda Edit
	function callfancybox(ags_id, getSave){
		$.fancybox({
			'height' 			: '98%',
			'width' 			: '95%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'href'				: site_url+"shortAgenda/agdtSave/"+getSave,
			'onClosed'			: function() {
									url = site_url+"shortAgenda/#"+ags_id;
									sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
								}
		});
	}
	
	function agdtDel(agdt_id, msg){
		if(!confirm("คุณต้องการลบ \""+msg+"\" ใช่หรือไม่")){
			return false;
		}
		var url = "<?php 
			if($status == "short"){
				echo site_url() . "emeeting/shortAgenda/agdtDel"; 
			} 
			else{
				echo site_url() . "emeeting/agenda/agdtDel"; 
			}
		?>";
		var obj = this;
		$.post(url,{agdt_id:agdt_id},function(data){
			if(data=="ok"){
				$(obj).parents("li:first").remove();
				url = "<?php 
					if($status == "edit"){
						echo site_url() . "emeeting/emeeting/emeetingEditAgenda"; 
					}
					else if($status == "short"){
						echo site_url() . "emeeting/shortAgenda"; 
					}
					else{
						echo site_url() . "emeeting/emeeting/emeetingAdd"; 
					}
				?>";
				sendPost("reload", {"step":"5","mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "")
			}
		});
	}	
</script>
<!-----------------------------java-------------------------------->
<script language="javascript">
function changeDept(cms_id){
	document.getElementById("my_form1").submit();
}
function optClick(op,deptGroup){
	document.getElementById("deptGroup").value = deptGroup;
	
	if(op == 'view') document.getElementById("my_form1").action = 'viewDepartment';
	else if(op == 'new' || op == 'edit') document.getElementById("my_form1").action = 'manageDepartment';
	else if(op == 'delete'){
		if(confirm("คุณยืนยันที่จะลบข้อมูลแน่นอนใช่หรือไม่")){
			document.getElementById("del").value = 'Y';
		}
	}

	document.getElementById("my_form1").submit();
}
</script>
<?php
$attributes = array('id' => 'my_form1','name' => 'my_form1','class' => 'da-form');
echo form_open($this->config->item('pp_folder').'orgstructure/showOrg', $attributes);
?>



<?php 	
	if( $status == "edit" ){
		$action1 = "emeeting/emeetingEditAgenda";
		$attr1 = array('id' => 'editForm');
	} else if( $status == "short" ){
		$action1 = "shortAgenda";
		$attr1 = array('id' => 'shortForm');
	} else {
		$action1 = "emeeting/emeetingAdd";
		$attr1 = array('id' => 'addForm');
	}
	echo form_open($this->config->item("emt_path").$action1,$attr1);
?>
	<input type="hidden" name="step" value="5" />
	<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
	<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
<?php
	echo form_close();
?>
<style>
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
		padding-left : 20px;
		cursor:move;
		border : 1px solid #FFFFFF;
	}
	.sortable li:hover{
		background: #9FB6CD;
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
		padding-left : 35px;
	}
	.string {
		display : inline-block;
		width : 650px;
	}
	.icon{
		cursor : pointer;
	}
	#boxCopy{
		width : 380px;
		height : 50px;
		background: none repeat scroll 0 0 #FFFFFF;
		border: 0 none;
		border-radius: 3px 3px 3px 3px;
		box-shadow: 0 1px 1px #CCCCCC;
		padding: 25px 5px 10px 5px;
		position: relative;
	}
	.inputUrl{
		-moz-border-bottom-colors: none;
		-moz-border-image: none;
		-moz-border-left-colors: none;
		-moz-border-right-colors: none;
		-moz-border-top-colors: none;
		background: none repeat scroll 0 0 #F6F6F6;
		border-radius: 3px 3px 3px 3px;
		border-style: solid;
		border-width: 1px;
		box-shadow: 0 1px 0 #FFFFFF, 0 1px 1px rgba(0, 0, 0, 0.17) inset;
		color: #666666;
		font-size: 13px;
		padding: 7px 10px;
	}
</style>


	<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
		<div id="guide_ie" style="padding:50px 195px 5px;">
			<?php
			if(isset($menu)){
				//echo guide($menu,4);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } else { ?>
		<div id="guide" style="padding:50px 195px 5px;">
			<?php
			if(isset($menu)){
				//echo guide($menu,4);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<?php } ?>
	
	<div class="grid_4_center">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">กำหนดสร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดบผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#">กำหนดอีเมล์</a></li>
					<li><a href="#tabs-5">กำหนดระเบียบวาระ</a></li>
					<li><a href="#">ยืนยัน</a></li>
				</ul>
				<div id="tabs-1">
				</div>
				<div id="tabs-2">
				</div>
				<div id="tabs-3">
				</div>
				<div id="tabs-4">
				</div>
				<div id="tabs-5">
		<div name="push" style="padding:10px 10px;">
		<?php 
			$linkAdd = site_url() . "emeeting/agenda/agdtAdd/";
			$ck_edit = $status;
		if( $status != "short" ){ 
		if($ck_edit == ""){
		$ck_edit = -1;
		}	
		?>
		<a href="<?php echo $linkAdd . "0/0/{$mt_id}/{$cms_id}/{$ck_edit}/0/0"; ?>" class="agdtAdd" title="เพิ่มระเบียบวาระ">
		<input type="button" value="เพิ่มระเบียบวาระใหม่" class="da-button blue" /></a>
		<?php 
		} 
		?>
		</div>
	<div id="da-panel collapsible">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/create_write.png">
				<?php 	if( $status == "short"){ ?>
			         มติการประชุมฉบับย่อ
				<?php	} else {?>
				กำหนดระเบียบวาระการประชุม
				<?php 	}  ?>
				</span>
		</div>

		<!----------------dropdown-------------->
		 <div class="da-form-item large">
		 <div class="da-form-inline" >
			<div class="da-form-row">
        		<span style="padding-right:22px;"><b>การประชุมที่ยังไม่ได้รับรองมติ </b></span>
        			<?php echo form_dropdown( "style='width:370px;' id='cms_id' onchange='changeDept(this.value)' ") ?>						   
					<option>United States</option>
                    <option>Japan</option>
                    <option>Russia</option>
                    <option>China</option>
                    <option>Netherlands</option>
					
			</div>
		</div>				
		</div>
		
		
	<div class="da-panel-content">
		<?php
		// Image Add
		$add = array(
			"src" => "image/icons/color/add.png",
			"width" => "16",
			"border" => "0"
		);
		$imgAdd = img($add);
		// Create Form
		if( $status == "edit" ){
			$action = "emeeting/emeetingEditAgenda";
		} else if( $status == "short"){
			$action = "shortAgenda/agdtSave";
		} else {
			$action = "emeeting/emeetingAdd";
		}
		$attributes = array("id"=>"frmMtAgEd");
		
		echo form_open_multipart($this->config->item("emt_path").$action,$attributes);
		//echo "cms_id : ".$cms_id;
		?>
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<?php 	if( $status == "short"){ ?>
								<th>ระเบียบวาระการประชุม (ฉบับย่อ)</th>
					<?php	} else {?>
								<th>ระเบียบวาระการประชุม</th>
					<?php 	}  ?>
				</tr>
			</thead>
			<tfoot>
				<tr>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td id="body_agdt">
						<ul class="sortable">
						
							<?php
								if( $status == "short" ){
									re_viewAgs($rs_ags,0,$ck_edit,$cms_id,$rs_files);
								}
								else{
									re_viewAgtp($rs_ag,0,$ck_edit,$cms_id);
								}
							?>
						</ul>
					</td>
				</tr>
				<tr>
				<td align="right">
			<input type="hidden" name="step" value="5" />
			<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
			<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
			<input type="hidden" name="status" value="<?php echo $status; ?>" />
			<?php
			if( $status != "edit" && $status != "short"){
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button blue\" value=\"ถัดไป >\" />";
			} else if($status != "short") {
				echo "<input type=\"submit\" name=\"btnsubmit\" value=\"บันทึก\"  class=\"da-button green\"/>";
		    }
			if($status == "short")
			{
				echo "<input type=\"button\" name=\"publicAg\" id=\"publicAg\" value=\"เผยแพร่ \" />";
				echo "<input type=\"button\" name=\"cancelPublicAg\" id=\"cancelPublicAg\" value=\"ยกเลิกการเผยแพร่ \" />";
				echo "<input type=\"button\" name=\"expShortAg\" id=\"expShortAg\" value=\"ส่งออกมติการประชุมฉบับย่อ\" />";
				echo "<input type=\"button\" name=\"copyURL\" id=\"copyURL\" value=\"คัดลอก URL\" />";
			}
			$url_share = site_url() . "emeeting/shortAgenda/shortDetail/" . $cms_id . "/" . $mt_id;
			?>
				</td>
				</tr>
			</tbody>
		</table>
		<br/>
		<?php
			if( $status != "short" ){
		?>
 <div id="da-panel collapsible" class="grid_2">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title" >
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/documents_1.png">
				แนบเอกสารการประชุม
			</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th style="text-align:left">เอกสารการประชุม</th>
				</tr>
			</thead>
		</table>
				<div style="min-height:100px;background:#FCFCFC;margin:10px 90px;width:200px;border:1px solid #CCC;" id="T8A_wrap_list">
					<?php
					if(isset($file) && $file->num_rows > 0){
						foreach($file->result() as $row_file){
							echo '<div class="MultiFile-label">
							<a href="javascript:void(0);" class="delete" id="'.$row_file->mf_id.'"><img alt="" src="'.base_url().'images/emeeting/del.png"></a>
							<span class="MultiFile-title" title="File selected: delete.png">
							<a href="'.base_url().'uploads/emeeting/docs/'.$row_file->mf_nname.'" target="_blank" >'.$row_file->mf_oname.'</a></span>
							</div>';
						}
					}
					?>
				</div>
				<div style="margin:10px 90px;"><input type="file" id="T8A" name="file[]" size="40" /></div>
				<br/>
					 </div>	
					</div>
				</div>
		<?php } ?>
			<br/>
				<div id="boxCopy">
				<input  class="da-button blue" type="text" name="url" value="<?php echo $url_share; ?>" size="55">
				</div>
				
                        
		</div>
	</div>
		<?php
		// Close Form
		echo form_close();
		?>
		</div>
<script>
$('#T8A').MultiFile({ 
	STRING: {
		remove: '<?php echo img("images/emeeting/del.png");?>'
	},
	max: 5
}); 
</script>
<?php
	function re_viewAgs($child,$no=0,$ck_edit=-1,$cms_id,$rs_files){
		$linkSave = site_url() . "emeeting/shortAgenda/agdtSave/";
		
		// Image Add8
		$add = array(
			"src" => "image/icons/color/add.png",
			"width" => "16",
			"border" => "0"
		);
		$imgAdd = img($add);
		// Image Delete
		$del = array(
			"src" => "image/icons/color/cross.png",
			"width" => "16",
			"border" => "0"
		);
		$imgDel = img($del);
		// Image Edit
		$edit = array(
			"src" => "image/icons/color/application_edit.png",
			"width" => "16",
			"border" => "0"
		);
		$imgEdit = img($edit);
		$str_agd = "วาระที่ ";
		$str_detail = "รายละเอียด";
		$str_by = "เสนอโดย";
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
				echo "<div class=\"tbin\"><div class=\"string\" style=\"float:left;width:80%\" >";
				$i = $i + 1;
				if($row_child->ags_level == 0){
					echo "<b>".$str_agd . $i . "</b>&nbsp;&nbsp;&nbsp;";
					$no_send = $i;
					$ags_no = $i;
				} else {
					echo "<b>".$no . "." . $i . "</b>&nbsp;&nbsp;&nbsp;";
					$no_send = $no . "." . $i;
					$ags_no = $no . "." . $i;
				}
				echo "<b>".$row_child->ags_head . "</b></div>";
				//if($row_child->child->num_rows()==0){
					$getAdd = $row_child->ags_id."/".($row_child->ags_level+1)."/".$row_child->ags_mt_id."/".$cms_id."/".$ck_edit;
					$getEdit = $row_child->ags_id."/".$row_child->ags_level."/".$row_child->ags_mt_id."/".$cms_id."/".$ck_edit;
					$getSave = $row_child->ags_id."/".$row_child->ags_level."/".$row_child->ags_mt_id."/".$cms_id."/".$ck_edit."/".$ags_no."/0";
					$link = str_replace("=",".",base64_encode($getSave));
					$getSave.="/".$link;
				?>
					<div style="float:right;margin:3px;height:18px;width:nowrap;">
						<a href="javascript:void(0);" class="agsDel" id="<?php echo $row_child->ags_id; ?>" title="ลบระเบียบวาระ" onclick="agdtDel('<?php echo $row_child->ags_id ?>','<?php echo "วาระที่&nbsp;".$ags_no."&nbsp;".$row_child->ags_head ?>')"><?php echo $imgDel; ?></a>
						<a href="javascript:void(0)" class="agsEdit" id="<?php echo $row_child->ags_id; ?>" title="แก้ไขระเบียบวาระ" onclick="callfancybox('<?php echo $row_child->ags_id ?>','<?php echo $getSave ?>')"><?php echo $imgEdit; ?></a>
					</div>
					<br style="clear:both; line-height:0; height:0; font-size: 1px;" />
			
					<!--<span style="float:right;margin:3px;height:18px;">
						<a href="javascript:void(0);" class="agdtDel" id="<?php echo $row_child->ags_id; ?>" title="ลบระเบียบวาระ" ><?php echo $imgDel; ?></a>
						<a href="<?php echo $linkSave . $getSave; ?>" class="agdtSave" id="<?php echo $row_child->ags_id; ?>" title="แก้ไขระเบียบวาระ" ><?php echo $imgEdit; ?></a>
					</span>-->
				<?php
					//echo "<br/>";
					// Detail
					//echo "<br/><u>".$str_detail."</u>";
					if($row_child->ags_detail != "")
					{
						echo $row_child->ags_detail;
						$num1 = 0;
					}
					else
					{
						echo "<br/>";
						$num1 = 1;
					}
					
					//	เสนอโดย
					if($row_child->ags_by != "")
					{
						echo "<b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->ags_by."<br/><br/>";
					}
					
					// File
					$ag_file = $rs_files->getFileByAgdtId($row_child->ags_id);
					
					if($ag_file->num_rows() > 0){
						echo "<b><u>".$str_file."</u></b>";
						echo "<ul>";
						foreach($ag_file->result() as $row_file)
						{
							echo '<li><a href="'.base_url().'uploads/emeeting/docs/docs_short/'.$row_file->agfls_nname.'" target="_blank" >- '.$row_file->agfls_oname.'</a></li>';
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
					
					/*if($row_child->agdt_flag_extra == 9 && $row_child->agdt_edit != "")
					{
						echo "<b><u>".$str_edit."</u></b>";
						echo $row_child->agdt_edit;
					}*/
					
					/*echo "<br/>";
					echo "num1=".$num1."<br/>";
					echo "num2=".$num2."<br/>";
					echo "num3=".$num3."<br/>";
					echo "num4=".$num4."<br/>";*/
					
					$sum = $num1 + $num2 + $num3 + $num4;
					//echo $sum;
					if($sum == 4)
					{
						//echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
					}
				//}
				echo "</div>";
				?>
				<?php
				if($row_child->child->num_rows()>0){
					re_viewAgs($row_child->child,$no_send,$ck_edit,$cms_id,$rs_files);
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

	function re_viewAgtp($child,$no=0,$ck_edit=-1,$cms_id){
		$linkAdd = site_url() . "emeeting/agenda/agdtAdd/";
		$linkEdit = site_url() . "emeeting/agenda/agdtEdit/";
		// Image Add8
		$add = array(
			"src" => "image/icons/color/add.png",
			"width" => "16",
			"border" => "0"
		);
		$imgAdd = img($add);
		// Image Delete
		$del = array(
			"src" => "image/icons/color/cross.png",
			"width" => "16",
			"border" => "0"
		);
		$imgDel = img($del);
		// Image Edit
		$edit = array(
			"src" => "image/icons/color/application_edit.png",
			"width" => "16",
			"border" => "0"
		);
		$imgEdit = img($edit);
		$str_agd = "วาระที่ ";
		$no_send = "";
		?>
		<ul class="sortable" >
		
			<?php
			
			$i = 0;
			foreach($child->result() as $row_child){
				/*if($row_child->agdt_add == '1')
				{
					continue;
				}*/
			?>
			<li id="<?php echo $row_child->agdt_id; ?>">
				<?php 
				echo "<div class=\"string\" style=\"float:left;width:80%\" >";
				$i = $i + 1;
				if($row_child->agdt_level == 0){
					echo $str_agd . $i . "&nbsp;&nbsp;&nbsp;";
					$no_send = $i;
				} else {
					echo $no . "." . $i . "&nbsp;&nbsp;&nbsp;";
					$no_send = $no . "." . $i;
				}
				echo $row_child->agdt_head . "</div>";
				
				if($ck_edit == ""){
					$ck_edit = -1;
				}
				$no_parent = $no_ag = $no_send;
				$getAdd = $row_child->agdt_id."/".($row_child->agdt_level+1)."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$no_parent;
				$getEdit = $row_child->agdt_id."/".$row_child->agdt_level."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$no_ag."/-1/-1";
				?>
				<div style="float:right;margin:3px;height:18px;width:nowrap;">
				<?php if( $ck_edit != "short" ){ ?>
					<a href="<?php echo $linkAdd . $getAdd; ?>" class="agdtAdd" title="เพิ่มระเบียบวาระ" ><?php echo $imgAdd; ?></a>
				<?php } ?>
					<a href="javascript:void(0);" class="agdtDel" id="<?php echo $row_child->agdt_id; ?>" title="ลบระเบียบวาระ" onclick="agdtDel('<?php echo $row_child->agdt_id ?>','<?php echo "วาระที่&nbsp;".$no_send."&nbsp;".$row_child->agdt_head ?>')"><?php echo $imgDel; ?></a>
					
					<!--<a href="javascript:void(0);" class="agdtDel" id="<?php echo $row_child->agdt_id; ?>" title="ลบระเบียบวาระ" ><?php echo $imgDel; ?></a>-->
					<a href="<?php echo $linkEdit . $getEdit; ?>" class="agdtEdit" id="<?php echo $row_child->agdt_id; ?>" title="แก้ไขระเบียบวาระ" ><?php echo $imgEdit; ?></a>
				</div>
				<br style="clear:both; line-height:0; height:0; font-size: 1px;" />
				<?php
				if($row_child->child->num_rows()>0){
					re_viewAgtp($row_child->child,$no_send,$ck_edit,$cms_id);
				}
				?>
			</li>
			<?php
			}
			?>
		</ul>
	<?php
	}
	?>
					</div>
			</div>
	</div>
	<div><span style="padding-right:130px;">&nbsp;</span> </div>