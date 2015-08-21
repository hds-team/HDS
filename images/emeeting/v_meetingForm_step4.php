

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
<!----------->

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
		<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE) { ?>
			<div id="guide_ie" style="padding:50px 195px 5px;">
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
			<div id="guide" style="padding:50px 195px 5px;">
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
			$action = "emeeting/emeetingAdd";
		} else {
			$action = "emeeting/emeetingEditEmail";
		}
		echo form_open($this->config->item("emt_path").$action,"frmMtEmail");
		?>
		<div class="grid_4_center">
			<div id="da-ex-tabs-plain">
				<ul>
					<li><a href="#">กำหนดสร้างการประชุม</a></li>
					<li><a href="#">กำหนดบุคลากร</a></li>
					<li><a href="#">กำหนดผู้รับผิดชอบโครงการ</a></li>
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
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/32/message.png">
				กำหนด E-mail
			</span>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th>ชื่อ-นามสกุล</th>
					<th>ตำแหน่งในการบริหาร</th>
					<th>E-mail</th>
				</tr>
			</thead>
			<tbody>
			<?php	
				if(isset($arr_pnt) && !empty($arr_pnt)){
					$i = 0;
					foreach($arr_pnt as $key => $value){
						$pnt_id = $value["pnt_id"];
						$pnt_parent_id = $value["pnt_parent_id"];
						$pnt_parent_adminId = $value["pnt_parent_adminId"];
						$pnt_parent_typeAgenda = $value["pnt_parent_typeAgenda"];
						$name = $value["pnt_name"];
						$adminName = $value["pnt_adminName"];
						$pnt_email = $value["pnt_email"];	// array of email
						$pnt_flag_charge = $value["pnt_flag_charge"];
						
						$rowPnt = "<tr>";
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
								$rowPnt .= "<comment style=\"padding-left:0px;\" >( {$adminName} )</comment>";
							}
						}
						else{
							if($pnt_parent_adminId){
								$rowPnt .= $adminName;
							}
						}
						$rowPnt .= "</td>";
						$rowPnt .= "<td>";
						$rowPnt .= "<class=\"da-tooltip-w\" title=\"หมายเหตุ : กรุณากด Enter ทุกครั้งที่เพิ่มอีเมลใหม่ หรือคลิกเลือกอีเมลที่แสดงใน Dropdown\">";
						$rowPnt .= "<input type=\"hidden\" name=\"pnt_id[]\" value=\"{$pnt_id}\" />";
						$rowPnt .= "<select class=\"auto_select\" id=\"{$pnt_id}\" name=\"pnt_email[{$i}][]\">";
						if(!empty($pnt_email)){
							foreach($pnt_email as $e_key => $e_value){
								$rowPnt .= "<option value=\"{$e_value}\" class=\"selected\">{$e_value}</option>";
							}
						}
						$rowPnt .= "</select>";
						$rowPnt .= "</span>";
						$rowPnt .= "</td>";
						$rowPnt .= "</tr>";
						echo $rowPnt;
						
						$i++;
					}
				}
			?>
				<tr><td colspan="3">
				<div align="right">
				<input type="hidden" name="step" value="4" />
				<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
				<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
				<?php
				if( ($status != "edit") ){
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button blue\" value=\"ถัดไป >\" />";
				} else {
				echo "<input type=\"submit\" name=\"submit\" class=\"da-button green\" value=\"บันทึก\" />";
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
	<div><span style="padding-right:130px;">&nbsp;</span> </div>
		<!--div align="right" style="width:100%;margin-top:25px;margin-bottom:25px;">
			<fieldset style="width:45%;margin-right:25px;text-align:left;">
				<comment>
					หมายเหตุ : กรุณากด Enter ทุกครั้งที่เพิ่มอีเมลใหม่ หรือคลิกเลือกอีเมลที่แสดงใน Dropdown 
				</comment>
			</fieldset>
		</div-->
		<?php
			echo form_close();
		?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".auto_select").fcbkcomplete({
				json_url: site_url+"emeetingAjax/searchAutoEmail",
				addontab: true,                   
				maxitems: 10,
				input_min_size: 0,
				height: 10,
				width: 420,
				cache: false,							// unique in first search
				newel: true,							// add new element
				complete_text: "Start to email..."
				//select_all_text: "select all email"	// select all in option that not class="selected"
			},$(this).attr("id"));
			
			/*function isValidEmailAddress(emailAddress) {
				var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				return pattern.test(emailAddress);
			}*/
		});
	</script>