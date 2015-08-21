<!-- iButton Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/ibutton/lib/jquery.ibutton.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ibutton/css/jquery.ibutton-giva-original.css" media="screen" />

<?php 
if(! isset($cms_id)){
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
if(isset($qu_mt)){
	$row = $qu_mt->row();
	$mt_id = $row->mt_id;
	$mtsId = $row->mt_mts_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุม กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
?>
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

<?php
// Body
if(isset($qu_mt) && isset($cms_id)){
?>
		<?php
		$back = array(
			"src" => "images/emeeting/icons/back.png"
		);
		$imgBack = img($back);
		echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
	<br>
	<br>
	<div class="grid_3">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
        <span class="da-panel-title">
            <img src="<?php echo base_url().$this->config->item("emt_dandelion_folder"); ?>images/icons/black/16/list.png" />
			รับรองมติการประชุมฯ
        </span>
     </div>
	<div class="da-panel-content">
		<?php
			$action = "emeeting/emeetingNoticeApprvAgenda";
			echo form_open($this->config->item("emt_path").$action,"frmSetDate");
		?>
		<div style="width:100%;">
			<table class="da-table da-detail-view">
				<tbody>
					<tr>		
						<th align="right"><label>วันที่สิ้นสุดการรับรองมติ</label></th>
						<td>
							<?php
								$mt_eapprv_date = emt_dateForm(emt_getval("mt_eapprv_date", $row),"/");
								if(!$mt_eapprv_date) {
									$mt_eapprv_date = date("d/m/Y");
								}
							?>
							<script type="text/javascript">
								DateInput("mt_eapprv_date", true, "DD/MM/YYYY","<?php echo $mt_eapprv_date;?>");
							</script>
						</td>
					</tr>
					<tr>
						<td align="right" colspan="2" >
							<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
							<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
							<input type="submit" class="da-button green" name="submit" value="บันทึก" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php echo form_close();?>
	</div>
	
	<p>&nbsp;</p>
	
</div>

<?php
}
// End body
?>
	<div><span style="padding-right:130px;">&nbsp;</span> </div>