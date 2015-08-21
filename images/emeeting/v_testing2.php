<?php
if(isset($rs_cms)){
	$row = $rs_cms->row();
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
?>
<script>
$(document).ready(function(){
		url_back = site_url+"announceMeeting/jacknakub";
	//Add event
	$("#back").click(back);
	
	//Add function
	function back(){
		sendPost("frm", "", url_back, "", "")
	}
});
</script>
	<div id="content-header">
		<?php
			$back = array(
				"src" => "images/emeeting/icons/back.png",
			);
			$imgBack = img($back);
			echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
	</div>
<?php
// Body
if(isset($rs_cms)){
?>
	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
	<span class="da-panel-title">
	<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_image.png";?> />
	ชื่อการประชุมหลัก : <?php echo $row->cms_name; ?>
	</span>
	</div>
	<div class="da-panel-content">
		<div style="padding:10px 20px;">
		<div class="grid_4_center">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
										<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_images.png";?> />
											รายการของการประชุมแต่ละครั้ง
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table dataTable" id="da-ex-datatable-default">
			<thead>
				<tr>
					<th width="70">
						ลำดับ
					</th>
					<th width="450">
						ชื่อการประชุม
					</th>
					<th>
						วันที่
					</th>
				</tr>
			</thead>
			<tfoot>
			</tfoot>
			<tbody>
				<?php
				$num_th = $this->config->item('emt_cv_th');
				if(isset($rs_mt) && $rs_mt->num_rows() > 0){
					// URL
					$url = site_url() . "emeeting/announceMeeting/";
					//$urlEdit = $url . "emeetingEdit";
					//$urlDel = $url . "emeetingDel";
					$urlView = $url . "ShowJackDetail";
					$place = "";
					$time = "";
					$show_row = 0;
					foreach($rs_mt->result() as $key => $row_mt){
						$post = "mt_id:'" . $row_mt->mt_id ."',cms_id:'" . $row->cms_id . "'";
					
						$date_start = dateDisplay($row_mt->mt_date_start);
						$date_stop = dateDisplay($row_mt->mt_date_stop);
						$show_row = 1;
					?>
					<tr>
						<td align="center">
							<?php echo ($key+1); ?>
						</td>
						<td style="padding-left:15px;" nowrap="nowrap">
							<?php 
							echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"ดูรายละเอียดการประชุม\">";
							echo $row->cms_name; ?>
							<?php if($row_mt->mt_no!=0){ ?>
							ครั้งที่ 
							<?php echo $row_mt->mt_no; ?>
							<?php }	else{?>
							<?php echo $row_mt->mt_nosp;  ?>
							<?php } ?>
							/
							<?php 
							echo $row_mt->mt_year;
							echo "</a>\n";
							?>
						</td>
						<td align="center" nowrap="nowrap">
							<?php echo "{$date_start} ถึง {$date_stop}"; ?>
						</td>
					</tr>
					<?php
					}
					/*if($show_row == 0)
					{
				?>
						<tr>
							<td colspan="3" align="center" class='red'>
								***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
							</td>
						</tr>
				<?php
					} */
				}  /*else {
				?>
					<tr>
						<td colspan="3" align="center" class='red'>
							***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
						</td>
					</tr>
				<?php
				} */
				?>
			</tbody>
		</table>
		</div>
		</div>
		</div>
<?php
}
// End body
?>
<div><span style="padding-right:130px;">&nbsp;</span> </div>