<script>
$(document).ready(function(){
	// Init
	url_tab = site_url + "announceMeeting/announceMeetingShow";
	
	//Add event
	$(".mtPresent").click(tabPost);
	$(".mtPast").click(tabPost);
	
	//Function
	function tabPost(){
		flag = $(this).attr("id");
		sendPost("frmMt",{"flag":flag, "detail":1},url_tab,"","");
	}
	
});
</script>
<style>
	#list-menu{list-style:none;}
	#list-menu li{display:inline;}
	#list-menu a:link,#list-menu a:visited{}
	#list-menu a:hover{}
	#list-menu .selected{font-weight:bold;}
</style>

<div id="content">
	<div id="content-header">
		<br />
		<div align="right" style="width:90%;padding-left:55px;">
			<?php if($flag == 1){ ?>
					<span style="font-weight:bold;"><a href="javascript:void(0)" class="mtPresent" id="1" >การประชุมที่ได้รับแจ้ง</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
					<span><a href="javascript:void(0)" class="mtPast" id="2" >การประชุมที่ผ่านมา</a></span>
			<?php } else { ?>
					<span><a href="javascript:void(0)" class="mtPresent" id="1" >การประชุมที่ได้รับแจ้ง</a></span>&nbsp;&nbsp;|&nbsp;&nbsp;
					<span style="font-weight:bold;"><a href="javascript:void(0)" class="mtPast" id="2" >การประชุมที่ผ่านมา</a></span>
			<?php } ?>
		</div>
		<br />
	</div>

	<div id="content-body">
		<h3>รายการ การประชุมหลัก   <span class="note" >( การประชุมที่คุณรับผิดชอบ )</span></h3>
		
		<table style="width:95%;" align="center" class="emt_table" >
			<thead>
				<tr>
					<th width="70">
						ลำดับ
					</th>
					<th>
						รายการ การประชุมหลัก
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($rs_cms) && $flag == 1){
					// Image View
					$view = array(
						"src" => "images/emeeting/icons/view.png",
						"width" => "16"
					);
					$imgView = img($view);
					
					// URL
					$url = site_url() . "/emeeting/announceMeeting/";
					$urlView = $url . "announceMeetingShow";
					if($rs_cms->num_rows() > 0)
					{
						$show_row = 0;
						$cms_row = "";
						$i = 1;
						foreach($rs_cms->result() as $key => $row_cms){
							if($row_cms->mt_mts_id >= 23 && $row_cms->mt_date_stop >= date("Y-m-d"))
							{
								$show_row = 1;
								if($cms_row != $row_cms->cms_id)
								{
									?>
									<tr>
										<td align="center">
											<?php echo $i++; ?>
										</td>
										<td align="left">
											<?php	
											$post = "flag:'" . $flag ."', detail:'" . 2 ."', cms_id:'" . $row_cms->cms_id ."'";
											// View
											echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"ดูรายละเอียดการประชุมหลัก\">{$row_cms->cms_name}</a>\n";
											?>
										</td>
									</tr>
									<?php
								}
								else
								{
								
								}
							} 
						}
						if($show_row == 0)
						{
						?>
							<tr>
								<td colspan="3" align="center">
									ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ
								</td>
							</tr>
						<?php
						}
					} else { ?>
						<tr>
							<td colspan="3" align="center">
								ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ
							</td>
						</tr>
					<?php }
				} else if (isset($rs_cms) && $flag == 2){
					// Image View
					$view = array(
						"src" => "images/emeeting/icons/view.png",
						"width" => "16"
					);
					$imgView = img($view);
					
					// URL
					$url = site_url() . "/emeeting/announceMeeting/";
					$urlView = $url . "announceMeetingShow";
					if($rs_cms->num_rows() > 0)
					{
						$show_row = 0;
						$cms_row = "";
						$i = 1;
						foreach($rs_cms->result() as $row_cms)
						{
							if($row_cms->mt_mts_id >= 23 && $row_cms->mt_date_stop < date("Y-m-d"))
							{
								$show_row = 1;
								if($cms_row != $row_cms->cms_id)
								{
									?>
									<tr>
										<td align="center">
											<?php echo $i++; ?>
										</td>
										<td align="left">
											<?php	
											$post = "flag:'" . $flag ."', detail:'" . 2 ."', cms_id:'" . $row_cms->cms_id ."'";
											// View
											echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"ดูรายละเอียดการประชุมหลัก\">{$row_cms->cms_name}</a>\n";
											?>
										</td>
									</tr>
									<?php 
								}
								else
								{
									
								}
								$cms_row = $row_cms->cms_id;
							} 
						}
						
						if($show_row == 0)
						{
						?>
							<tr>
								<td colspan="3" align="center">
									ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ
								</td>
							</tr>
						<?php
						}
					} else { ?>
						<tr>
							<td colspan="3" align="center">
								ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ
							</td>
						</tr>
					<?php }
				} ?>
			</tbody>
		</table>
	</div>
</div>