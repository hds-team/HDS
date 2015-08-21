<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
?>
<script>
$(document).ready(function(){
	// Init
	url_back = site_url+"announceMeeting/announceMeetingShow";
	
	//Add event
	$("#back").click(back);
	
	//Add function
	function back(){
		sendPost("frm", "", url_back, "", "")
	}
});
</script>
<style>
	.icon32,.icon{
		cursor : pointer;
	}
</style>

<div> <!--id="content"-->
	<div id="content-header">
		<?php
			$back = array(
				"src" => "images/emeeting/icons/back.png",
			);
			$imgBack = img($back);
			echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
	</div>
	<!--//---Begin->รายการการประชุมที่รอการรับรองมติ-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		<div id="da-panel collapsible" class="grid_4_center">
			<div class="da-panel collapsible">
				<div class="da-panel-header">
                    <span class="da-panel-title">
                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/16/list.png";?> />
							รายการการประชุมที่รอการรับรองมติ
                    </span>
                </div>
			<div class="da-panel-content">
			<table style="width:100%;" align="center" class="da-table" >
				<thead>
					<tr>
						<th>ลำดับ</th>
						<th width="40%">ชื่อการประชุม</th>
						<th>ครั้งที่</th>
						<th>วันที่และเวลา</th>
						<th>วันที่สิ้นสุดรับรองมติ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$action2 = "../calendarMeeting/send_mail_sms";
					$num_th = $this->config->item('emt_cv_th');
					// URL
					$url = site_url() . "emeeting/announceMeeting/";
					$urlView = $url . "meetingDetail";
					
					if(isset($arr_nt) && !empty($arr_nt))
					{
						// Image View
						$view = array(
							"src" => "images/emeeting/icons/view.png",
							"width" => "16"
						);
						$imgView = img($view);
						
						$cms_row = "";
						$place = "";
						$time = "";
						$a = 1;
						foreach($arr_nt as $key => $row_nt)
						{
							if($a%2 == 0)
							{
								$color_row = "even";
							}
							else
							{
								$color_row = "odd";
							}
							$post = "mt_id:'{$row_nt["mt_id"]}', cms_id:'{$row_nt["cms_id"]}', flag:'apprv' ";
							echo "<tr>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $a++ . "</td>";
							echo "<td class='".$color_row."'><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"\">" . $row_nt["cms_name"] . "</a></td>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $row_nt["mt_no"] . " / " . $row_nt["mt_year"] ."</td>";
							
							$mt_start_time = $row_nt["mt_start_time"];
							$tmp = explode(":", $mt_start_time);
							$mt_start_time = $tmp[0] . "." . $tmp[1];
							$mt_end_time = $row_nt["mt_end_time"];
							$tmp = explode(":", $mt_end_time);
							$mt_end_time = $tmp[0] . "." . $tmp[1];
							
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . abbreDate2($row_nt["mt_date_start"]) . " - " . abbreDate2($row_nt["mt_date_stop"]). "<br/>" . $mt_start_time . " น. - " . $mt_end_time . " น.</td>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">".abbreDate2($row_nt["mt_eapprv_date"])."</td>";
							echo "</tr>";
						}
						
					}
					else 
					{ 
						echo "<tr >";
						echo "<td colspan=\"8\" align=\"center\" class=\"red\" >";
						echo "<div align=\"center\">
						{$this->config->item("emt_not_found")}
						</div>";
						echo "</td>";
							echo "</tr>";
					}
				?>
				</tbody>
			</table>
			</div>
			</div>
		</div>
</div> 
	<!--//---End->รายการการประชุมที่รอการรับรองมติ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		
	