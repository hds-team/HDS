<?php
echo link_tag('css/emt_css/emt_fb_notification.css');
if(isset($rs_cms)){
	$row_cms = $rs_cms->row();
	$cms_id = $row_cms->cms_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
if(isset($rs_mt)){
	$row = $rs_mt->row();
	$mt_id = $row->mt_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุม กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}	
$num_th = $this->config->item('emt_cv_th');											
?>
<script>
$(document).ready(function() {
	// Add Event
	$("#editDetail").click(editDetail);
	$("#editPtp").click(editPtp);
	$("#editPtp2").click(editPtp2);
	$("#editEmail").click(editEmail);
	$("#editAgenda").click(editAgenda);
	$("#deleteCms").click(deleteCms);
	$("#Notice").click(Notice);
	$("#Sign").click(Sign);
	$("#Time").click(Time);
	$("#Save").click(Save);
	$("#start").click(Start);
	$("#shortAgenda").click(shortAgenda);
	$("#expRepMt").click(expRepMt);
	$("#expDetMt").click(expDetMt);
	$("#expAgEditMt").click(expAgEditMt);
	$("#back").click(back);
	$("#Commit").click(Commit);
	$("#appvAgendaAdd").click(appvAgendaAdd);
	$("#noticeApprv").click(noticeApprv);
	
	// Function
	function editDetail(){
		url = site_url+"emeeting/emeetingEdit";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function editPtp(){
		url = site_url+"emeeting/emeetingEditPtp";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function editPtp2(){
		url = site_url+"emeeting/emeetingEditPtp2";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function editEmail(){
		url = site_url+"emeeting/emeetingEditEmail";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function editAgenda(){
		url = site_url+"emeeting/emeetingEditAgenda";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function Notice(){
		url = site_url+"noticeMeeting/noticeMeetingShow";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function Sign(){
		url = site_url+"signInMeeting";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function deleteCms(){
		msg = $(this).attr("msg");
		url = site_url+"emeeting/emeetingDel";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "คุณยืนยันที่จะลบการประชุม \""+msg+"\" นี้ใช่หรือไม่");
	}
	function back(){
		url = site_url+"emeeting/commissionView";
		sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
	}
	function Time(){
		url = site_url+"timeMeeting";
		sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
	}
	function Save(){
		url = site_url+"emeeting/emeetingSave";
		sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
	}
	function Start(){
		url = site_url+"emeeting/emeetingStart";
		sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
	}
	function shortAgenda(){
		url = site_url+"shortAgenda";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function expRepMt(){
		url = site_url+"noticeMeeting/exportAgenda";
		flag = "y";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>,flag:flag}, url, "", "");
	}
	function expDetMt(){
		url = site_url+"noticeMeeting/exportAgenda";
		flag = "";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>,flag:flag}, url, "", "");
	}
	function expAgEditMt(){
		url1 = site_url+"noticeMeeting/exportAgenda";
		flag1 = "e";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>,flag:flag1}, url1, "", "");
	}
	function Commit(){
		url = site_url+"emeeting/emeetingCommit";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", ""); 
	}
	function appvAgendaAdd(){
		url = site_url+"emeeting/emeetingAppvAgendaAdd";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
	function noticeApprv(){
		url = site_url+"emeeting/emeetingNoticeApprvAgenda";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
	}
});
</script>
<script>
	function f1(){
		document.getElementById("n1").style.visibility='hidden';
	}
</script>
<style>
	.sortable{
		margin : 0px;
		padding : 0px;
	}
	.sortable li{
		line-height : 20px;
		list-style: none;
		margin : 0px;
		padding : 0px;
		padding-left : 20px;
		border : 1px solid #FFFFFF;
	}
	li .sortable{
		padding-left : 10px;
	}
	.string {
		display : block;
		width : 90%;
	}
	.icon32,.icon{
		cursor : pointer;
	}
	h4#meeting{
		margin : 0 10px;
	}
	h3 a{
		text-decoration:none;
		color : #555;
	}
</style>

<?php
// Body
if(isset($rs_cms) && isset($rs_mt)){
?>
	<div id="content-header" style="padding:50px 195px 5px;">
		<?php
		$back = array(
			"src" => "images/emeeting/icons/back.png"
		);
		$imgBack = img($back);
		echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
		<br/>
	</div>
	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
	<span class="da-panel-title">
	<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_image.png";?> />
	ชื่อการประชุม :<?php
		echo $row_cms->cms_name;
		?>
		 <?php if($rs_mt->row()->mt_no!=0){ 
		 ?>ครั้งที่ <?php
		 echo al_to_th($rs_mt->row()->mt_no); 
		 }else{?>
		 <?php echo al_to_th($rs_mt->row()->mt_nosp); } ?>
		 / <?php echo al_to_th($rs_mt->row()->mt_year); ?>
	</span>
	</div>
	<div class="da-panel-content">
		<div style="padding:20px 20px 5px 5px;">
			<?php
			$edit = array(
				"src" => "images/emeeting/icons32/edit.png",
				"width" => "32"
			);
			$imgEdit = img($edit);
			$participant = array(
				"src" => "images/emeeting/icons32/participant.png",
				"width" => "32"
			);
			$imgPtp = img($participant);
			//ผู้รับผิดชอบการประชุม
			$participant = array(
				"src" => "images/emeeting/icons32/participant.png",
				"width" => "32"
			);
			// Image Email
			$imgEmail1 = array(
				"src" => "images/emeeting/icons32/email_edit.png",
				"width" => "32"
			);
			$imgEmail = img($imgEmail1);
			
			$agenda = array(
				"src" => "images/emeeting/icons32/agenda.png",
				"width" => "32"
			);
			$imgAg = img($agenda);
			$report = array(
				"src" => "images/emeeting/icons32/report_word.png",
				"width" => "32"
			);
			$imgRep = img($report);
			$notice = array(
				"src" => "images/emeeting/icons32/notice.png",
				"width" => "32"
			);
			$imgNt = img($notice);
			$sign = array(
				"src" => "images/emeeting/icons32/sign.png",
				"width" => "32"
			);
			$imgSign = img($sign);
			$time = array(
				"src" => "images/emeeting/icons32/time.png",
				"width" => "32"
			);
			$imgTime = img($time);
			$save = array(
				"src" => "images/emeeting/icons32/save.png",
				"width" => "32"
			);
			$imgSave = img($save);
			$commit = array(
				"src" => "images/emeeting/icons32/commit.png",
				"width" => "32"
			);
			$imgCommit = img($commit);
			$delete = array(
				"src" => "images/emeeting/icons32/delete.png",
				"width" => "32"
			);
			$imgDelete = img($delete);
			
			// จัดการวาระเพิ่มเติม
			$agenda_add = array(
				"src" => "images/emeeting/icons32/agenda_add.png",
				"width" => "32"
			);
			$imgAgAdd = img($agenda_add);
			
			// notic approve agenda 
			$notice_agAppv = array(
				"src" => "images/emeeting/icons32/appvAg_notice.png",
				"width" => "32"
			);
			$imgAgApp_notice = img($notice_agAppv);
			// edit time approved agenda 
			$time_agAppv = array(
				"src" => "images/emeeting/icons32/appvAg_time.png",
				"width" => "32"
			);
			$imgAgApp_time = img($time_agAppv);
			
			$mt_mts_id = $row->mt_mts_id;
			?> 
			<table border="0">
				<tr>
					<?php 
					if( $row->mt_mts_id < 35 ) {
					?>
						<td><div class="icon32" id="editDetail"><?php echo $imgEdit; ?><br/><span class="note">รายละเอียด</span></div></td>
						<td><div class="icon32" id="editPtp"><?php echo $imgPtp; ?><br/><span class="note">บุคลากร</span></div></td>
						<td><div class="icon32" id="editPtp2"><?php echo $imgPtp; ?><br/><span class="note">กำหนดผู้รับผิดชอบการประชุม</span></div></td>
						<td><div class="icon32" id="editEmail"><?php echo $imgEmail; ?><br/><span class="note">อีเมล</span></div></td>
						<td><div class="icon32" id="editAgenda"><?php echo $imgAg; ?><br/><span class="note">ระเบียบวาระ</span></div></td>
						<td><div class="icon32" id="Notice"><?php echo $imgNt; ?><br/><span class="note">หนังสือเชิญ</span></div></td>
						<?php 
						if( $row->mt_mts_id >= 23 && $row->mt_mts_id <= 24) {
							?>
							<td><div class="icon32" id="appvAgendaAdd">
								<div id="noti_Container"><?php echo $imgAgAdd; ?>
									<?php
										if(isset($qu_add) && $qu_add->num_rows() > 0){
											$num = 0;
											foreach($qu_add->result() as $row_add){
												if($row_add->agdt_flag_appv != 'Y' && $row_add->agdt_flag_appv != 'N'){
													$num++;
												}
											}
											if($num > 0){
											?>
												<span class="numMessages">
													<?php echo $num; ?>
												</span>
											<?php
											}
										}
									?>
								</div>
								<div><span class="note">ระเบียบวาระเพิ่มเติม</span></div>
							</div></td>
							<?php 
						}
						?>
						<td><div class="icon32" id="Sign"><?php echo $imgSign; ?><br/><span class="note">ใบเซ็นต์ชื่อ</span></div></td>
						<?php 
							if( $row->mt_mts_id >= 23 && $row->mt_mts_id < 35 ) {
							?>
								<td><div class="icon32" id="Time"><?php echo $imgTime; ?><br/><span class="note">เปิดการประชุม</span></div></td>
							<?php 
							}
							if( $row->mt_mts_id >= 25 && $row->mt_mts_id < 35 ) {
							?>
								<td><div class="icon32" id="Save"><?php echo $imgSave; ?><br/><span class="note">บันทึกมติ</span></div></td>
								<?php
								if($row->mt_mts_id >= 30 && $row->mt_mts_id < 35){
									if($row->mt_mts_id == 32){
									?>
										<td><div class="icon32" id="noticeApprv"><?php echo $imgAgApp_time; ?><br/><span class="note">วันที่สิ้นสุดรับรองมติ</span></div></td>
									<?php
									}
									else{
									?>
										<td><div class="icon32" id="noticeApprv"><?php echo $imgAgApp_notice; ?><br/><span class="note">แจ้งรับรองมติ</span></div></td>
									<?php
									}
								}
								?>
								<td><div class="icon32" id="expRepMt"><?php echo $imgRep; ?><br/><span class="note">ส่งออกรายงานการประชุม</span></div></td>
							<?php 
							} 
					} else { 
					?>
						<!--<div class="icon32" id="start"><?php echo $imgTime; ?><br/><span class="note">เปิดประชุม</span></div>-->
						<?php 
						?>
						<br/>
							<td><div class="icon32" id="shortAgenda"><?php echo $imgAg; ?><br/><span class="note">ระเบียบวาระย่อ</span></div></td>
							<td><div class="icon32" id="expDetMt"><?php echo $imgRep; ?><br/><span class="note">ส่งออกรายระเอียดการประชุม</span></div></td>
							<td><div class="icon32" id="expRepMt"><?php echo $imgRep; ?><br/><span class="note">ส่งออกรายงานการประชุม</span></div></td>
							<?php 
							if(isset($agdt_edit) && $agdt_edit != "" && $mt_mts_id >= 35) { 
							?>
								<td><div class="icon32" id="expAgEditMt"><?php echo $imgRep; ?><br/><span class="note">ส่งออกวาระการประชุม (แก้ไข)</span></div></td>
							<?php 
							}
					} 
					/*if( $row->mt_mts_id == 30 ) {
					?>
					<div class="icon32" id="Commit"><?php echo $imgCommit; ?><br/><span class="note">ปิดประชุม</span></div>
					<?php 
					} */
					?>
					<td>
						 <?php if($rs_mt->row()->mt_no!=null){ 
							$msg = $row_cms->cms_name." ครั้งที่ ".al_to_th($rs_mt->row()->mt_no)." / ".al_to_th($rs_mt->row()->mt_year); 
							}
							else{
							$msg = $row_cms->cms_name."พิเศษ"."/".al_to_th($rs_mt->row()->mt_year);
							}
						?>
						<div class="icon32" id="deleteCms" msg="<?php echo $msg; ?>"><?php echo $imgDelete; ?><br/><span class="note">ลบประชุม</span></div>
					</td>
				</tr>
			</table>
		</div>
		<br/>
		<?php
		/*
			$url_notice = site_url() . "/emeeting/noticeMeeting/noticeMeetingShow";
			$url_sign = site_url() . "/emeeting/noticeMeeting/signInShow";
			$post = "mt_id:'" . $rs_mt->row()->mt_id ."',cms_id:'" . $row_cms->cms_id . "'";
			echo "<ul>";
			echo "<li><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$url_notice}','','');\" title=\"ส่งหนังสือเชิญเข้าร่วมประชุม\">ส่งหนังสือเชิญเข้าร่วมประชุม</a></li>";
			echo "<li><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$url_sign}','','');\" title=\"พิมพ์ใบเซ็นต์ชื่อ\">พิมพ์ใบเซ็นต์ชื่อ</a></li>";
			echo "</ul>";
		*/
		?>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="2"><b>รายละเอียดการประชุม</b>
					</td>
				</tr>
				<tr>
					<td width="200"><label>ชื่อการประชุม : </label></td>
					<td>
						<?php echo emt_getval("cms_name", $row_cms);?>
					</td>
				</tr>
				<tr>
				 <?php if($rs_mt->row()->mt_no!=0){?> 
					<td><label>ครั้งที่ : </label></td>
					<td>
						<?php echo al_to_th(emt_getval("mt_no", $row));?>/ 
						<?php }else{?>
					<td><label>พิเศษ : </label></td>
					<td>
						<?php //echo al_to_th(emt_getval("mt_nosp", $row)); }?>
						<?php }?>
						 <?php echo al_to_th(emt_getval("mt_year", $row));?>
					</td>
				</tr>
				<tr>
					<td>
						<label>รูปแบบการประชุม : </label>
					</td>
					<td>
						<?php
						if(emt_getval("cms_type", $row_cms)){
							$str = "การประชุมส่วนตัว ";
						} else {
							$str = "การประชุมไม่ส่วนตัว ";
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td>
						<label>ประเภทการประชุม : </label>
					</td>
					<td>
						<?php echo emt_getval("mtt_name", $row);?>
					</td>
				</tr>
				<tr>
					<td><label>ประจำปี : </label></td>
					<td>
						<?php
						if(emt_getval("cms_year_type", $row_cms) == 1){
							$str = "ตามปีปฎิทิน";
						} else {
							$str = "ตามปีงบประมาณ";
						}
						echo $str . " " . al_to_th(emt_getval("cms_year", $row_cms));
						?>
					</td>
				</tr>
				<tr>
					<td><label>จากวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("mt_date_start", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("mt_date_start", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>ถึงวันที่ : </label></td>
					<td>
						<?php
						if(emt_getval("mt_date_stop", $row)==1){
							$str = "ไม่ระบุ";
						} else {
							$str = $num_th(dateDisplay(emt_getval("mt_date_stop", $row)));
						}
						echo $str;
						?>
					</td>
				</tr>
				<tr>
					<td><label>เวลา : </label></td>
					<td>
						<?php 
						$mt_start_time = emt_getval("mt_start_time", $row);
						$tmp = explode(":", $mt_start_time);
						$mt_start_time = $tmp[0] . "." . $tmp[1];
						$mt_end_time = emt_getval("mt_end_time", $row);
						$tmp = explode(":", $mt_end_time);
						$mt_end_time = $tmp[0] . "." . $tmp[1];
						echo $num_th($mt_start_time . " - " . $mt_end_time)."  น.";
						?>
					</td>
				</tr>
				<?php
				$mt_placeName = emt_getval("mt_placeName", $row);
				$mt_placeDetail = emt_getval("mt_placeDetail", $row);
				if($mt_placeName!="" OR $mt_placeDetail!=""){
				?>
				<tr>
					<td><label>สถานที่ประชุม : </label></td>
					<td>
						<?php
						$mt_placeDetail = ($mt_placeDetail != '') ? "ห้องประชุม ".$mt_placeDetail : '';
						echo $num_th($mt_placeName . " " . $mt_placeDetail);
						?>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="4"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
					</td>
				</tr>
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
							$ag_name = $value["pnt_ag_name"];
							$ag_manage = $value["pnt_ag_manage"];
							$pnt_email = $value["pnt_email"];
							
							if($ag_manage == 0){
								continue;
							}
							$i++;
							
							$rowPnt = "<tr>";
							$rowPnt .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							if($pnt_parent_typeAgenda == 0){
								// โดยชื่อ
								$rowPnt .= "<td style=\"padding-left:10px;\" >";
								$rowPnt .= $name;
								if($pnt_parent_adminId != 0 && $adminName != ""){
									$rowPnt .= " (".$adminName.")";
								}
								$rowPnt .= "</td>";
							}
							else{
								// โดยตำแหน่ง
								$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPnt .= "</td>";
							}
							//egoist
								//เงื่อนไขแสดง email 
								if($pnt_email!=null){
								foreach($pnt_email as $email){
								}
								for($i=0;$i<1;$i++){
								$rowPnt .= "<td width=\"80\" align=\"right\" >{$email}</td>";
								}
								}
								else{ 
								$rowPnt .="<td width=\"80\" align=\"right\" >ไม่ระบุอีเมล์</td>";
								}
								//egoist
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
					else{
						echo "<tr><td colspan='4' align='center'>" . $this->config->item("emt_not_found") . "</td></tr>";
					}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="4"><b>บุคลากรในการประชุม</b>
					</td>
				</tr>
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
							$ag_name = $value["pnt_ag_name"];
							$pnt_email = $value["pnt_email"];
				
							$i++;
							
							$rowPnt = "<tr>";
							$rowPnt .= "<td width=\"50\" align=\"center\">" . al_to_th($i) . "</td>";
							if($pnt_parent_typeAgenda == 0){
								// โดยชื่อ
								$rowPnt .= "<td style=\"padding-left:10px;\" >";
								$rowPnt .= $name;
								if($pnt_parent_adminId != 0 && $adminName != ""){
									$rowPnt .= " (".$adminName.")";
								}
								$rowPnt .= "</td>";
							}
							else{
								// โดยตำแหน่ง
								$rowPnt .= "<td style=\"padding-left:10px;\" >".$adminName." (".$name.")";
								$rowPnt .= "</td>";
							}
								//egoist
								//เงื่อนไขแสดง email 
								if($pnt_email!=null){
								foreach($pnt_email as $email){
								}
								for($i=0;$i<1;$i++){
								$rowPnt .= "<td width=\"80\" align=\"right\" >{$email}</td>";
								}
								}
								else{ 
								$rowPnt .="<td width=\"80\" align=\"right\" >ไม่ระบุอีเมล์</td>";
								}
								//egoist
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
					else{
						echo "<tr><td colspan='4' align='center'>" . $this->config->item("emt_not_found") . "</td></tr>";
					}
				?>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>ระเบียบวาระในการประชุม</b>
					</td>
				</tr>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
							//echo "<pre>";
							//print_r($rs_agdt);
							//echo "</pre>";
							//echo "<u>".$str_file."</u>";
							/*$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
							echo $rs_file->db->last_query();
							if($ag_file->num_rows() > 0){
								foreach($ag_file->result() as $row_file)
								{
									if($row_file->agfl_oname != "")
									{
										echo '&nbsp;<a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >'.$row_file->agfl_oname.'</a><br/>';
									}
									else
									{
										echo "&nbsp;&nbsp;- ไม่มี -<br/>";
									}
								}
							}*/
							re_viewAgdt($rs_agdt, 0, $rs_file, $mt_mts_id);
							
							?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<br/>
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>เอกสารในการประชุม</b></td>
				</tr>
				<tr>
					<td><?php 	$i = 1;
								if(isset($file) && $file->num_rows > 0){
									foreach($file->result() as $row_file){
										echo al_to_th($i++).'.  <a href="'.base_url().'uploads/emeeting/docs/'.$row_file->mf_nname.'" target="_blank" title="คลิกเพื่อเปิดดูเอกสาร" >'.$row_file->mf_oname.'</a><br/>';
									}
								} else {
									echo "- ไม่มี -";
								}
						?>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<?php if(isset($agdt_edit) && $agdt_edit != "" && $mt_mts_id > 30) { ?>
		<fieldset style="border:1px solid #FF0000">
			<legend><b>จากการรับรองวาระการประชุม มีสิ่งที่ต้องแก้ไขดังนี้ :</b></legend>
			<?php
				echo $num_th($agdt_edit);
			?>
		</fieldset>
		<?php } ?>
					</div>
				</div>
			</div>

<?php
}
// End body
?>

<?php
function re_viewAgdt($child,$no=0,$rs_file="",$mt_mts_id=""){

	$str_agd = "วาระที่ ";
	//$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	
	?>
	
		<?php
		$i = 0;
		
		foreach($child->result() as $row_child){
			/*if($row_child->agdt_add == '1' && $row_child->agdt_flag_appv != 'Y')
			{
				continue;
			}*/
		?>
		<div id="<?php echo $row_child->agdt_id; ?>">
			<?php
			echo "<span>";
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				$margin1 = 30;
				for ($j1 = 1; $j1 <= $row_child->agdt_level; $j1++) {
					$margin1 = $margin1 + 30;
				}
				echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			
			echo $row_child->agdt_head."</div>";
			
			$margin2 = 45;
			for ($j2 = 1; $j2 <= $row_child->agdt_level; $j2++) {
				$margin2 = $margin2 + 45;
			}
			if($row_child->agdt_detail != "")
			{
				echo "<div class=\"tbin\" style=\"margin-left:".$margin2."px;\">".$row_child->agdt_detail."</div>";
				$num1 = 0;
			}
			else
			{
				echo "<br/>";
				$num1 = 1;
			}
			
			//	เสนอโดย
			if($row_child->agdt_by != "")
			{
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->agdt_by."</div><br/>";
			}
			
			$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
			if($ag_file->num_rows() > 0){
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_file."</u></b>";
				echo "<ul>";
				foreach($ag_file->result() as $row_file)
				{
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
				}
				echo "</ul></div><br/>";
				$num2 = 0;
			}
			else
			{
				$num2 = 1;
			}
			
			if($row_child->agdt_present != "")
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_present."</u></b></td>";
				$p = array("<p>", "</p>");
				echo "<td valign=\"top\" ><div class=\"tbin\">".str_replace($p,"",$row_child->agdt_present)."</div></td>";
				echo "</tr>";
				echo "</table><br/>";
				$num2 = 0;
			}
			else
			{
				$num2 = 1;
			}
			
			if($row_child->agdt_result != "")
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_result."</u></b></td>";
				$p = array("<p>", "</p>");
				echo "<td valign=\"top\"><div class=\"tbin\">".str_replace($p,"",$row_child->agdt_result)."</div></td>";
				echo "</tr>";
				//echo "<tr><td>&nbsp;</td></tr>";
				echo "</table><br/>";
				$num3 = 0;
			}
			else
			{
				$num3 = 1;
			}
			
			$sum = $num1 + $num2 + $num3 + $num4;
			if($sum == 4)
			{
				//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
			}
			
			echo "</span>";
			
			if($row_child->child->num_rows()>0){
				re_viewAgdt($row_child->child,$no_send,$rs_file,$mt_mts_id);
			}
			?>
		</div>
		<?php
		}
		?>
			<?php
		}
		?>

<div><span style="padding-right:130px;">&nbsp;</span> </div>