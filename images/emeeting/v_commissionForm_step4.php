<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/emt_css/tooltip/tooltip2/qtip.css">
<script type="text/javascript" src="<?php echo base_url();?>css/emt_css/tooltip/tooltip2/jquery-1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>css/emt_css/tooltip/tooltip2/jquery.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/emt_css/ui.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/jquery.fcbkcomplete.js" charset="utf-8"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>jui/css/jquery.ui.all.css" media="screen" />
<!-- tab -->
<!-- Validation Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/validate/jquery.validate.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.ui.js"></script>
<!-- tab -->

<!-- Tooltips Plugin -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/jquery.tipsy-min.js"></script>
<link rel="stylesheet" href="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/tipsy/tipsy.css" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/demo/demo.form.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/core/dandelion.core.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="<?php echo base_url().$this->config->item("emt_dandelion_folder");?>js/core/dandelion.customizer.js"></script>

<script type="text/javascript">
  if (document.location.hash == "" || document.location.hash == "#")
    document.location.hash = "#tabs-4";
</script>

<?php 
echo link_tag('css/emt_css/emt_auto_selete.css');
$status = isset($status);
?>
<script>
$(document).ready(function(){
	// Add Event
	$("#back").click(back);
	//tooltip
	$('span[title].subindex').qtip({
      position: {
         corner: {
            target: 'topRight',
            tooltip: 'bottomLeft'
         }
      },
      style: {
         name: 'cream',
         padding: '7px 13px',
         width: {
            max: 210,
            min: 0
         },
         tip: true
      }
   });
	
	// Function
	function back(){
		url = site_url+"emeeting/commissionView";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	
});

</script>
<style>
	.icon{
		cursor : pointer;
	}
</style>
		<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
			<div id="guide_ie">
				<?php
				if(isset($menu)){
					//echo guide($menu,3);
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
					//echo guide($menu,3);
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
		<?php 
		if( $status != "edit" ){
			$action = "emeeting/commissionAdd";
		} else {
			$action = "emeeting/commissionEditEmail";
		}
		echo form_open($this->config->item("emt_path").$action,"frmCmsEmail");
		?>
	<div class="grid_4_center">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">กำหนดสร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดผู้รับผิดชอบการประชุม</a></li>
					<li><a href="#tabs-4">กำหนดอีเมล์</a></li>
					<li><a href="#">กำหนดระเบียบวาระ</a></li>
					<li><a href="#">ยืนยัน</a></li>
				</ul>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-">
				</div>
				<div id="tabs-4">
<div id="da-panel collapsible">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<!--<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/message.png">-->
				กำหนด E-mail
			</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th>บุคลากรในการประชุม</th>
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>
			<?php	
				// Load model
				$arr_model = isset($arr_model) ? $arr_model : "";
				
				if(isset($rs_ptp) && $rs_ptp->num_rows > 0){
					$arr_ps = get_ptpByTypeAg($rs_ptp, $arr_model, $flag_edit=0);
					if(!empty($arr_ps)){
						$i = 0;
						foreach($arr_ps as $key => $value){
							$ptp_id = $value["ptp_id"];
							$name = $value["name"];
							$ptp_adminId = $value["ptp_adminId"];
							$adminName = $value["adminName"];
							$ptp_typeAgenda = $value["ptp_typeAgenda"];
							
							$rowPtp = "<tr>";
							if($ptp_typeAgenda == 0){
								// โดยชื่อ
								$rowPtp .= "<td>";
								$rowPtp .= $name;
								if($ptp_adminId != 0 && $adminName != ""){
									$rowPtp .= " (".$adminName.")";
								}
								$rowPtp .= "</td>";
							}
							else{
								// โดยตำแหน่ง
								$rowPtp .= "<td>".$adminName." (".$name.")";
								$rowPtp .= "</td>";
							}
							$rowPtp .= "<td>";
							
							$rowPtp .= "<class=\"da-tooltip-w\" title=\"หมายเหตุ : กรุณากด Enter ทุกครั้งที่เพิ่มอีเมลใหม่ หรือคลิกเลือกอีเมลที่แสดงใน Dropdown\">";
							$rowPtp .= "<input type=\"hidden\" name=\"ptp_id[]\" value=\"{$ptp_id}\" />";
							$rowPtp .= "<select class=\"auto_select\" id=\"{$ptp_id}\" name=\"ptp_email[{$i}][]\">";
							if(!empty($opt_email[$i])){
								foreach($opt_email[$i] as $key2 => $value2){
									$rowPtp .= "<option value=\"{$value2}\" class=\"selected\">{$value2}</option>";
								}
							}
							$rowPtp .= "</select>";
							$rowPtp .= "</span>";
							$rowPtp .= "</td>";
							$rowPtp .= "</tr>";
							echo $rowPtp;
							
							$i++;
						}
					}
				}
			?>
				<tr><td colspan="2">
			<div align="right">
			<input type="hidden" name="step" value="4" />
			<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
			<?php
			if( ($status != "edit") ){
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button blue\" value=\"ถัดไป\"  />";
			} else {
				echo "<input type=\"submit\" name=\"submit\" value=\"บันทึก\"  class=\"da-button green\" />";
			}
			?>
			</div>
			</td></tr>
			</tbody>
		</table>
		</div>
	</div>
</div>
</div>
	</div>
</div>	
		<!--div align="right" style="width:100%;margin-top:25px;margin-bottom:25px;" class="grid_2">
			<div class="da-panel">
				<div class="da-panel-widget" style="width:45%;margin-right:25px;text-align:left;">
					หมายเหตุ : กรุณากด Enter ทุกครั้งที่เพิ่มอีเมลใหม่ หรือคลิกเลือกอีเมลที่แสดงใน Dropdown 
				</div>
			</div>
		</div-->
		<?php
			echo form_close();
		?>
	<script type="text/javascript">
		$(document).ready(function(){
			// Add Event
			$(".auto_select").fcbkcomplete({
				json_url: site_url+"emeetingAjax/searchAutoEmail",
				addontab: true,                   
				maxitems: 10,
				input_min_size: 0,
				height: 10,
				width: 512, 
				cache: false,							// unique in first search
				newel: true,							// add new element
				complete_text: "Start to email..."
				//select_all_text: "select all email"	// select all in option that not class="selected"
				/*onselect: function() {
					var email = $("option").val();
					alert(email);
					var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					
					$("option",this).each(function() {
						email = $(this).val();
						if(pattern.test(email) == false) {
							//alert(email+' : Invalid Email Address!');
						} 
					});
				}*/
			},$(this).attr("id"));
			
			// Function
			/*function check_email() {
				var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			   
				$(".selected option:selected").each(function() {
					var email = $(this).val();
					alert(email); 
					if(pattern.test(address) == false) {
						alert('Invalid Email Address');
						return false;
					}     
				});
			}*/
		});
	</script>
</div>