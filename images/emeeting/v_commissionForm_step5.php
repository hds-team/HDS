<!-- ui -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/ui.js"></script>
<?php echo link_tag('css/emt_css/ui.css');?>
<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>

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
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
$status = isset($status);
?>
<script>

	$(document).ready(function() {
		// Init
		$( ".sortable" ).sortable({
			placeholder: "ui-state-highlight",
			opacity: 0.95,
			delay: 50,
			stop:function(event, ui){
				var url = "<?php echo site_url() . "emeeting/agenda/agtpSeq"; ?>";
				var index = $(this).sortable('toArray');
				$.post(url,{index:index},function(data){
					//location.reload();
					url = "<?php 
					if( $status != "edit" ){
						echo site_url() . "emeeting/emeeting/commissionAdd"; 
					} else {
						echo site_url() . "emeeting/emeeting/commissionEditAgenda"; 
					}
					?>";
					sendPost("reload", {"step":"5","cms_id":<?php echo $cms_id; ?>}, url, "", "")
				});
			}
		});
		$( ".sortable" ).disableSelection();
		$(".agtpAdd").fancybox({
			'height' 			: '98%',
			'width' 			: '95%',
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
		$(".agtpEdit").fancybox({
			'height' 			: '98%',
			'width' 			: '95%',
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

		
		// Add Event
		/*$(".agtpDel").click(agtpDel);*/
		$("#back").click(back);
		//ใช้แทน ปุ่ม submit
		//$("#btnnextto6").click(chkform);
		
		// Function 
		/*function agtpDel(){
			if(!confirm("คุณต้องการลบใช่หรือไม่")){
				return false;
			}
			var url = "<?php echo site_url() . "/emeeting/agenda/agtpDel"; ?>";
			var id = $(this).attr("id");
			var obj = this;
			$.post(url,{agtp_id:id},function(data){
				if(data=="ok"){
					$(obj).parents("li:first").remove();
					url = "<?php 
					if( $status != "edit" ){
						echo site_url() . "/emeeting/emeeting/commissionAdd"; 
					} else {
						echo site_url() . "/emeeting/emeeting/commissionEditAgenda"; 
					}
					?>";
					sendPost("reload", {"step":"4","cms_id":<?php echo $cms_id; ?>}, url, "", "")
				}
			});
		}*/
		
		function back(){
			url = site_url+"emeeting/commissionView";
			sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
		}
	});
	
	function agtpDel(agtp_id, msg){
		if(!confirm("คุณต้องการลบ \""+msg+"\" ใช่หรือไม่")){
			return false;
		}
		var url = "<?php echo site_url()."emeeting/agenda/agtpDel"; ?>";
		var obj = this;
		$.post(url,{agtp_id:agtp_id},function(data){
			if(data=="ok"){
				$(obj).parents("li:first").remove();
				url = "<?php 
					if($status != "edit"){
						echo site_url() . "emeeting/emeeting/commissionAdd"; 
					}
					else{
						echo site_url() . "emeeting/emeeting/commissionEditAgenda"; 
					}
				?>";
				sendPost("reload", {"step":"5","cms_id":<?php echo $cms_id; ?>}, url, "", "")
			}
		});
	}
	
	
</script>
<?php 	
	if( $status != "edit" ){
		//$action1 = "emeeting/commissionAdd#dd";
		$action1 = "emeeting/commissionAdd#tabs-5";
		$attr1 = array('id' => 'addForm');
	} else {
		//$action1 = "emeeting/commissionEditAgenda#dd";
		$action1 = "emeeting/commissionEditAgenda#tabs-5";
		$attr1 = array('id' => 'editForm');
	}
	echo form_open($this->config->item("emt_path").$action1,$attr1);
?>
	<input type="hidden" name="step" value="5" />
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
</style>


		<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
			<div id="guide_ie">
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
			<div id="guide">
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
					<li><a href="#">สร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#">กำหนดอีเมล์</a></li>
					<li><a href="#tabs-5">กำหนดระเบียบวาระ</a></li>
					<li><a href="#">ยืนยัน</a></li>
				</ul>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-5">
		<?php
		// Image Add
		$add = array(
			"src" => "image/icons/color/add.png",
			"width" => "16",
			"border" => "0"
		);
		$imgAdd = img($add);
		// Create Form
		if( $status != "edit" ){
			$action = "emeeting/commissionAdd";
		} else {
			$action = "emeeting/commissionEditAgenda";
		}
		echo form_open($this->config->item("emt_path").$action,"frmCms");
		$linkAdd = site_url() . "emeeting/agenda/agtpAdd/";
		$ck_edit = ($status == "edit");
		?>
	<div name="push" style="padding:10px 10px;">
	<?php
	if($ck_edit == ""){
	$ck_edit = -1;
	}	
	?>
	<a href="<?php echo $linkAdd . "0/0/{$cms_id}/{$ck_edit}/0"; ?>" class="agtpAdd" title="เพิ่มระเบียบวาระ">
	<input type="button" value="เพิ่มระเบียบวาระใหม่" class="da-button blue" />
	</a>
	</div>
<div id="da-panel collapsible">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/create_write.png">
				กำหนดระเบียบวาระการประชุม
			</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th>ระเบียบวาระการประชุม</th>
				</tr>
			</thead>
			<!--tfoot>
				<tr>
					<td align="right" style="padding-right:20px;">
					</td>
				</tr>
			</tfoot-->
			<tbody>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
							re_viewAgtp($rs_agtp,0,$ck_edit);
							?>
						</ul>
					</td>
					<tr>
					<td>
				<div align="right">
				<input type="hidden" name="step" value="5" />
				<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
				<?php
				if( ($status != "edit") ){
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button blue\" value=\"ถัดไป  >\" />";
				} else {
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button green\" value=\"ตกลง\" />";
				}
				?>
				</div>
					</td>
					</tr>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
</div>
</div>
</div>
</div>
		<?php
		// Close Form
		echo form_close();
		?>
<?php
function re_viewAgtp($child,$no=0,$ck_edit=-1){
	$linkAdd = site_url() . "emeeting/agenda/agtpAdd/";
	$linkEdit = site_url() . "emeeting/agenda/agtpEdit/";
	// Image Add
	$add = array(
		"src" => "images/icons/color/add.png",
		"width" => "16",
		"border" => "0"
	);
	$imgAdd = img($add);
	// Image Delete
	$del = array(
		"src" => "images/icons/color/cross.png",
		"width" => "20",
		"border" => "0"
	);
	$imgDel = img($del);
	// Image Edit
	$edit = array(
		"src" => "images/icons/color/application_edit.png",
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
		?>
		<li id="<?php echo $row_child->agtp_id; ?>">
			<?php 
			echo "<div class=\"string\" style=\"float:left;width:80%\" >";
			$i = $i + 1;
			if($row_child->agtp_level == 0){
				echo $str_agd . $i . "&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				echo $no . "." . $i . "&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			echo $row_child->agtp_head . "</div>";
			
			$no_parent = $no_ag = $no_send;
			
			if($ck_edit == ""){
				$ck_edit = -1;
			}
				
			$getAdd = $row_child->agtp_id."/".($row_child->agtp_level+1)."/".$row_child->agtp_cms_id."/".$ck_edit."/".$no_parent;
			$getEdit = $row_child->agtp_id."/".$row_child->agtp_level."/".$row_child->agtp_cms_id."/".$ck_edit."/".$no_ag."/-1/-1";
			?>
			<div style="float:right;margin:3px;height:18px;width:nowrap;">
				<a href="<?php echo $linkAdd . $getAdd; ?>" class="agtpAdd" title="เพิ่มระเบียบวาระ" ><?php echo $imgAdd; ?></a>
				<a href="<?php echo $linkEdit . $getEdit; ?>" class="agtpEdit" id="<?php echo $row_child->agtp_id; ?>" title="แก้ไขระเบียบวาระ" ><?php echo $imgEdit; ?></a>
				<a href="javascript:void(0);" class="agtpDel" id="<?php echo $row_child->agtp_id; ?>" title="ลบระเบียบวาระ" onclick="agtpDel('<?php echo $row_child->agtp_id ?>','<?php echo "วาระที่&nbsp;".$no_send."&nbsp;".$row_child->agtp_head ?>')"><?php echo $imgDel; ?></a>
				
				<!--<a href="javascript:void(0);" class="agtpDel" id="<?php echo $row_child->agtp_id; ?>" title="ลบระเบียบวาระ" ><?php echo $imgDel; ?></a>-->
				
			</div>
			<br style="clear:both; line-height:0; height:0; font-size: 1px;" />
			<?php
			if($row_child->child->num_rows()>0){
				re_viewAgtp($row_child->child,$no_send,$ck_edit);
			}
			?>
		</li>
		<?php
		}
		echo "<a name=\"dd\">";
		?>
	</ul>
<?php
}
?>