<!-- iButton Plugin -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/ibutton/lib/jquery.ibutton.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ibutton/css/jquery.ibutton-giva-original.css" media="screen" />
<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
$status = isset($status);

if(isset($qu_mt)){
	$row = $qu_mt->row();
	$mt_id = $row->mt_id;
	$mts_id = $row->mt_mts_id;
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุม กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
?>

<script type="text/javascript">
	$(document).ready(function() {
		// Add Event
		
		<?php 	if($row->mt_mts_id < 30){ ?>
					$("#btnClsMt").removeAttr("disabled");
					$("#btnNoticApprv").attr("disabled","disabled");
					$("#btnSubmit").attr("disabled","disabled");
		<?php	}
				else if($row->mt_mts_id == 30){ ?>
					$("#btnNoticApprv").removeAttr("disabled");
					$("#btnSubmit").removeAttr("disabled");
					$("#btnClsMt").attr("disabled","disabled");
		<?php	}
				else if($row->mt_mts_id == 32){	?>
					$("#btnSubmit").removeAttr("disabled");
					$("#btnClsMt").attr("disabled","disabled");
					$("#btnNoticApprv").attr("disabled","disabled");
		<?php	}	?>
		
		$(".agdtDel").click(agdtDel);
		$("#back").click(back);
		$("#save_start_time").click(save_start_time);
		$("#save_end_time").click(save_end_time);
		$("#btnClsMt").click(closeMeeting);
		$("#btnSubmit").click(submitMeeting);
		$("#btnNoticApprv").click(noticeApprv);
		
		// Function 
		function closeMeeting(){
			var url = site_url+"emeeting/closeMeeting";
			var re_url = site_url+"emeeting/emeetingSave";
			$.post(url,{"mt_id":<?php echo $mt_id; ?>, "mt_mts_id":30},function(data){
				alert("คุณได้ปิดประชุมแล้ว");
				sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, re_url, "", "");
			});
		}
		
		function submitMeeting(){
			if(!confirm("หากยืนยันมติการประชุมแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลได้อีก คุณต้องการยืนยันหรือไม่")){
				return false;
			}
			var url = site_url+"emeeting/emeetingSave";
			var re_url = site_url+"emeeting/emeetingView";
			$.post(url,{"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>,"submit":"submit"},function(data){
				sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, re_url, "", "");
			});
		}
		
		function noticeApprv(){
			url = site_url+"emeeting/emeetingNoticeApprvAgenda";
			sendPost("frm", {cms_id:<?php echo $cms_id; ?>,mt_id:<?php echo $mt_id; ?>}, url, "", "");
		}
		
		function agdtDel(){
			if(!confirm("คุณยืนยันที่จะต้องการลบ")){
				return false;
			}
			var url = "<?php echo site_url() . "/emeeting/agenda/agdtDel"; ?>";
			var id = $(this).attr("id");
			var obj = this;
			$.post(url,{agdt_id:id},function(data){
				if(data=="ok"){
					$(obj).parents("li:first").remove();
					url = "<?php 
					if( $status != "edit" ){
						echo site_url() . "/emeeting/emeeting/emeetingAdd"; 
					} else {
						echo site_url() . "/emeeting/emeeting/emeetingEditAgenda"; 
					}
					?>";
					sendPost("reload", {"step":"3","mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
				}
			});
		}
		
		function back(){
			url = site_url+"emeeting/emeetingView";
			sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
		}
		
		function save_start_time(){
			var url = site_url+"emeeting/emeetingSaveTime";
			var mt_start_time_h = $("#mt_start_time_h").val();
			var mt_start_time_m = $("#mt_start_time_m").val();
			$.post(url,{"mt_id":<?php echo $mt_id; ?>, mt_start_time_h:mt_start_time_h, mt_start_time_m:mt_start_time_m},function(data){
				alert("บันทึกเวลาเริ่มการประชุมเรียบร้อย");
			});
		}
		
		function save_end_time(){
			var url = site_url+"emeeting/emeetingSaveTime";
			var mt_end_time_h = $("#mt_end_time_h").val();
			var mt_end_time_m = $("#mt_end_time_m").val();
			$.post(url,{"mt_id":<?php echo $mt_id; ?>, mt_end_time_h:mt_end_time_h, mt_end_time_m:mt_end_time_m},function(data){
				alert("บันทึกเวลาสิ้นสุดการประชุมเรียบร้อย");
			});
		}
	});
	
	function callfancybox(agdt_id, getSave){
		$.fancybox({
			'height' 			: '98%',
			'width' 			: '95%',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe',
			'href'				: site_url+"agenda/agdtSave/"+getSave,
			'onClosed'			: function() {
									url = site_url+"emeeting/emeetingSave/#"+agdt_id;
									sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
								}
		});
	}
	
	function getPntApprv(getSave){
		var url = site_url + "emeeting/emeetingApprvAgendaDetail/"+getSave;
		window.open(url,'mywindow','width=700,height=500,scrollbars=yes,resizable=yes,screenX=50,screenY=50,copyhistory=yes');
	}
	
</script>
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
		padding-left : 10px;
		border : 1px solid #FFFFFF;
	}
	.sortable>li:hover{
		border : 1px solid #D0DCF0;
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
		padding-left : 25px;
	}
	.string {
		display : inline-block;
		width : 95%;
	}
	.icon{
		cursor : pointer;
	}
	.linkDetail:link{
		color : blue; 
		text-decoration : none;
	}
	.linkDetail:visited{
		color : blue; 
		text-decoration : none;
	}
	.linkDetail:hover{
		color : red;
		text-decoration : none;
	}
</style>

<?php
// Body
if(isset($qu_mt)){
?>
		<div id="guide" style="padding:50px 195px 5px;">
			<?php
			if(isset($menu)){
				echo guide($menu,3);
			} else {
				$back = array(
					"src" => "images/emeeting/icons/back.png"
				);
				$imgBack = img($back);
				echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
			}
			?>
		</div>
	<div class="grid_4_center">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/16/list.png">
				บันทึกมติการประชุม
			</span>
		</div>
	<div id="content-body">
	<?php
		//$action = "emeeting/emeetingSave";
		//echo form_open($this->config->item("emt_path").$action,"frmCms");
		$ck_edit = $status;
		
		$mt_start_time = emt_getval("mt_start_time", $row);
		$tmp = explode(":", $mt_start_time);
		$mt_start_time_h 	= $tmp[0];
		$mt_start_time_m 	= $tmp[1];
		
		$mt_end_time = emt_getval("mt_end_time", $row);
		$tmp = explode(":", $mt_end_time);
		$mt_end_time_h 		= $tmp[0];
		$mt_end_time_m 		= $tmp[1];
		?>
		<div class="da-button-row">
		<h4>เวลาเริ่มการประชุม
		<input id="mt_start_time_h" type="text" name="mt_start_time_h" size="2" value="<?php echo $mt_start_time_h;?>" /> :
		<input id="mt_start_time_m" type="text" name="mt_start_time_m" size="2" value="<?php echo $mt_start_time_m;?>" /> &nbsp;&nbsp; น. 
		<input id="save_start_time" class="da-button blue" type="button" name="save_start_time" value="บันทึกเวลาเริ่ม" />  
		</h4>
		</div>
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th>ระเบียบวาระการประชุม</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
			<td align="left" >
			<h4>เวลาสิ้นสุดการประชุม 
			<input id="mt_end_time_h" type="text" name="mt_end_time_h" size="2" value="<?php echo $mt_end_time_h;?>" /> :
			<input id="mt_end_time_m" type="text" name="mt_end_time_m" size="2" value="<?php echo $mt_end_time_m;?>" /> &nbsp;&nbsp; น. 
			<input id="save_end_time" class="da-button blue" type="button" name="save_end_time" value="บันทึกเวลาสิ้นสุด" />  	
			</h4>		
				</td>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td id="body_agdt">
						<ul class="sortable">
							<?php
							$qu_magap = isset($qu_magap) ? $qu_magap : "";
							re_viewAgtp($rs_ag, 0 , $ck_edit , $cms_id, $rs_file, $row, $qu_magap);
							?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<br/>
		<div class="grid_2">
		<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/16/list.png">
				เอกสารในการประชุม
		</span>
		</div>
		<div id="content-body">
		<table style="width:100%" class="da-table">
			<thead>
				<tr>
					<th>เอกสารในการประชุม</th>
				</tr>
			</thead>
			<tbody>
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
		</div>
		</div>
		</div>
		<br/>
		<div align="center">
			<br/><br/><br/><br/>
			<input type="hidden" name="step" value="3" />
			<input type="hidden" name="mt_id" value="<?php echo $mt_id; ?>" />
			<input type="hidden" name="cms_id" value="<?php echo $cms_id; ?>" />
			<?php
				echo "<input type=\"button\" class=\"da-button red\" name=\"btnClsMt\" id=\"btnClsMt\" style=\"margin-right:30px;\" value=\"ปิดประชุมและบันทึกร่างการประชุม\" />";
				if($row->mt_mts_id <= 30){ 
					echo "<br/><br/>";
				}
				echo "<input type=\"button\" class=\"da-button green\" name=\"btnNoticApprv\" id=\"btnNoticApprv\" style=\"margin-right:20px;\" value=\"แจ้งการรับรองมติ\" />";	
				if($row->mt_mts_id == 32){ 
					echo "<br/><br/>";
				}
				echo "<input type=\"submit\" class=\"da-button green\" name=\"submit\" id=\"btnSubmit\" value=\"ยืนยันมติการประชุม\" />";
			?>
		</div>
		<?php
		// Close Form
		//echo form_close();
		?>
						</div>
				</div>
		</div>
<?php
}
// End body
?>

<?php
function re_viewAgtp($child, $no=0, $ck_edit=0, $cms_id, $rs_file, $row_mt, $qu_magap){
	$linkSave = site_url() . "/emeeting/agenda/agdtSave/";
	// Image save
	$save = array(
		"src" => "image/icons/color/application_edit.png",
		"width" => "16",
		"border" => "0"
	);
	$imgSave = img($save);
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
			if($row_child->agdt_add == '1')
			{
				continue;
			}
		?>
		<li id="<?php echo $row_child->agdt_id; ?>" name="<?php echo $row_child->agdt_id; ?>">
			<?php 
			echo "<span class=\"string\" id=\"agdt_".$row_child->agdt_id."\"><div class=\"tbin\">";
			
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $i;
				$agdt_no = $i;
			} else {
				echo "<b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
				$agdt_no = $no . "." . $i;
			}
			echo "<b>".$row_child->agdt_head."</b><br/>";
			//if($row_child->child->num_rows()==0){
				// Detail
				//echo "<br/><u>".$str_detail."</u>";
				if($row_child->agdt_detail != "")
				{
					echo $row_child->agdt_detail;
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
					echo "<b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->agdt_by."<br/><br/>";
				}
				
				// File
				$ag_file = $rs_file->getFileByAgdtId($row_child->agdt_id);
				
				if($ag_file->num_rows() > 0){
					echo "<b><u>".$str_file."</u></b>";
					echo "<ul>";
					foreach($ag_file->result() as $row_file)
					{
						echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
					}
					echo "</ul>";
					$num2 = 0;
				}
				else
				{
					$num2 = 1;
					
				}
				// Present
				if($row_child->agdt_present != "")
				{
					echo "<b><u>".$str_present."</u></b>";
					echo $row_child->agdt_present;
					$num3 = 0;
				}
				else
				{
					$num3 = 1;
				}
				// Result
				
				if($row_child->agdt_result != "")
				{
					echo "<b><u>".$str_result."</u></b>";
					echo $row_child->agdt_result;
					$num4 = 0;
				}
				else
				{
					$num4 = 1;
				}
				
				// show approved agenda
				if($row_mt->mt_mts_id == 32 && $row_child->agdt_result != ""){
					// Load model
					$magap = $qu_magap;
					$magap->agap_agdt_id = $row_child->agdt_id;
					$magap->agap_mt_id = $row_mt->mt_id;
					$qu_appv = $magap->get_countByAgdtAndMt();
					if($qu_appv->num_rows() > 0){
						echo "<br/><div style=\"width:45%;border:1px solid #D0DCF0;background:#EEF2F7;padding:5px 5px 5px 5px;margin-left:40px;\" >";
						foreach($qu_appv->result() as $row_appv){  
							echo "<span style=\"margin-left:25px;\">";
							echo $row_appv->appv_name;
							if($row_appv->num_ps > 0){
								$getSave = str_replace("=",".",base64_encode($row_child->agdt_id."/".$row_appv->appv_id."/".$row_mt->mt_id."/".$agdt_no));
								echo "&nbsp;&nbsp;<a href=\"javascript:void(0);\" title=\"คลิกดูรายละเอียด\" class=\"linkDetail\" onclick=\"getPntApprv('{$getSave}')\" >(&nbsp;" . al_to_th($row_appv->num_ps) . "&nbsp;คน&nbsp;)</a>";
							}
							echo "</span>";
							if($row_appv->appv_id < 3){
								// no last type
								echo "<br />";
							}
						}
						echo "</div><br/>";
					}
				
					
					/*echo "<table style=\"border:1px solid #D0DCF0;background:red;margin-left:40px;\" >";
					echo "<tr>";
					echo "<td>";
					echo "ตาราง";
					echo "</td>";
					echo "</tr>";
					echo "</table>";*/
					
				}
				
				
				$sum = $num1 + $num2 + $num3 + $num4;
				//echo $sum;
				if($sum == 4)
				{
					//echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
				}
			//}
			echo "</div></span>";
			
			if($ck_edit == ""){
				$ck_edit = -1;
			}
			//$no_ag = $no_send;
				
			$getSave = $row_child->agdt_id."/".$row_child->agdt_level."/".$row_child->agdt_mt_id."/".$cms_id."/".$ck_edit."/".$agdt_no."/0";
			$link = str_replace("=",".",base64_encode($getSave));
			$getSave.="/".$link;
			?>
			<span style="float:right;margin:3px;height:18px;">
				<a href="javascript:void(0)" class="agdtSave" id="<?php echo $row_child->agdt_id; ?>" title="บันทึกการประชุม" onclick="callfancybox('<?php echo $row_child->agdt_id ?>','<?php echo $getSave ?>')"><?php echo $imgSave; ?></a>
			</span>
			<?php
			if($row_child->child->num_rows()>0){
				re_viewAgtp($row_child->child, $no_send, $ck_edit, $cms_id, $rs_file, $row_mt, $qu_magap);
			} 
			?>
		</li>
		<?php
			if($row_child->agdt_level == 0){
				echo "<hr />";
			}
		}
		?>
	</ul>
<?php
}
?>
	<div><span style="padding-right:130px;">&nbsp;</span> </div>