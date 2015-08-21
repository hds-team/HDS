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
		
	<!--//---Begin->รายการการประชุมที่ได้รับแจ้ง-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		
		<div id="da-panel collapsible" class="grid_4_center">
			<div class="da-panel collapsible">
				<div class="da-panel-header">
                    <span class="da-panel-title">
                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/16/list.png";?> />
							รายการประชุมที่ได้รับแจ้งล่าสุด
                    </span>
                    <!-- <span class="da-panel-toggler"> </span> -->  
					<!-- id="da-ex-datatable-default" -->
            </div>			
			<div class="da-panel-content">
			<table style="width:100%;" align="center" class="da-table" >
				<thead>
					<tr>
						<th>ลำดับ</th>
						<th>ชื่อการประชุม</th>
						<th>ครั้งที่</th>
						<th>วันที่</th>
						<th>เวลา</th>
						<th width="80">mail</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$action2 = "../calendarMeeting/send_mail_sms";
					$num_th = $this->config->item('emt_cv_th');
					// URL
					$url = site_url() . "emeeting/announceMeeting/";
					$urlView = $url . "meetingDetail";
					
					if(isset($rs_mt) && $rs_mt->num_rows() > 0)
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
						$i = 0;
						foreach($rs_mt->result() as $row1)
						{
							if($a%2 == 0)
							{
								$color_row = "even";
							}
							else
							{
								$color_row = "odd";
							}
							$post = "mt_id:'{$row1->mt_id}', cms_id:'{$row1->cms_id}', flag:'add' ";
							//$post = "mt_id:'" . $row1->mt_id ."', cms_id:'" . $row1->cms_id ."'";
							$agdt_add = "";
							if(!empty($qu_add[$i]) && ($qu_add[$i] > 0)){ 
								$agdt_add = "<span style=\"color:red;\">&nbsp;(วาระเพิ่มเติม&nbsp;". $qu_add[$i] ."&nbsp;รายการ)&nbsp;</span>"; 
								//$agdt_add = "<font color=\"red\">&nbsp;(มีวาระเพิ่มเติม)&nbsp;</font>"; 
							}
							echo "<tr>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $a++ . "</td>";
							echo "<td class='".$color_row."'><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"\">" . $row1->cms_name ."". $agdt_add . "</a></td>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $row1->mt_no . " / " . $row1->mt_year . "</td>";
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . abbreDate2($row1->mt_date_start) . " - " . abbreDate2($row1->mt_date_stop) . "</td>";
							
							$mt_start_time = $row1->mt_start_time;
							$tmp = explode(":", $mt_start_time);
							$mt_start_time = $tmp[0] . "." . $tmp[1];
							$mt_end_time = $row1->mt_end_time;
							$tmp = explode(":", $mt_end_time);
							$mt_end_time = $tmp[0] . "." . $tmp[1];
							
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $mt_start_time . " น. - " . $mt_end_time . " น.</td>";
							echo "<td style=\"text-align:center;\" class='".$color_row."'>";
							$show_btn="0";
							if(isset($rs_sent) && $rs_sent->num_rows() > 0)
							{
								foreach($rs_sent->result() as $row_sent){
									if($row1->mt_id==$row_sent->emt_id){
										$show_btn="1";
										break;
									}
								}
							}
							if($show_btn=="1"){
								echo "ส่งแล้ว";
							}else{
								echo "
								<form method='post' action='{$action2}' style=\"margin-top:0px;margin-bottom:0px;\" >
									<input type='hidden' value='".base_url()."emeeting/send_calendar_sms/send_calendar_sms.php"."' name='url_send'/>
									<input type='hidden' value='".site_url()."emeeting/announceMeeting/announceMeetingShow"."' name='return_send'/>
									<input type='hidden' value='".$row1->mt_id."' name='mt_id'/>
									<input type='hidden' value='".$row1->cms_name."' name='title'/>
									<input type='hidden' value='".$row1->mt_date_start."' name='dateInputstart'/>
									<input type='hidden' value='".$row1->mt_date_stop."' name='dateInputend'/>
									<input type='hidden' value='".substr($row1->mt_start_time, 0, 5)."' name='startHour'/>
									<input type='hidden' value='".substr($row1->mt_end_time, 0, 5)."' name='endHour'/>
									<input type='image' value='ปฏิทิน/SMS' name='send_maail' src='http://cvs.buu.ac.th/mispbri/image/icons/color/calendar_2.png' alt=''/> 
								</form>";
							}
							echo "</td>";
							echo "</tr>";
							$i++;
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
	<!--//---End->รายการการประชุมที่ได้รับแจ้ง------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		
		<p>&nbsp;</p>
	