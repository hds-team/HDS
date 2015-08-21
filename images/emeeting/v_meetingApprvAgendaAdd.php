<?php

if(isset($qu_mt)){
	$row = $qu_mt->row();
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุม กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}

$mt_id = (isset($mt_id))?$mt_id:"";
$cms_id = (isset($cms_id))?$cms_id:"";
?>

<script type="text/javascript">
	$(document).ready(function() {
		// Add Event
		$("#back").click(back);
		$("#btnAppvSubmit").click(submitAppv);
		
		// Function 
		function back(){
			url = site_url+"emeeting/emeetingView";
			sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, url, "", "");
		}
		
		function submitAppv(){
			if(!confirm("หากปิดการเสนอวาระเพิ่มเติมแล้วจะไม่สามารถกลับมาแก้ไขข้อมูลได้อีก คุณต้องการยืนยันหรือไม่")){
				return false;
			}
			var url = site_url+"emeeting/emeetingAppvAgendaAdd";
			var re_url = site_url+"emeeting/emeetingAppvAgendaAdd";
			$.post(url,{"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>,"btnAppvSubmit":"btnAppvSubmit"},function(data){
				//alert(data);
				sendPost("frm", {"mt_id":<?php echo $mt_id; ?>,"cms_id":<?php echo $cms_id; ?>}, re_url, "", "");
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
	
	function approveList(value, agdt_id, submit){
		$(".ok_"+agdt_id).hide();
		$(".cancel_"+agdt_id).hide();
		$(".valid_"+agdt_id).hide();
		$(".yes_"+agdt_id).hide();
		$(".showInput_"+agdt_id).hide();
		$(".load_"+agdt_id).show();
		
		var url = site_url+"emeeting/emeetingAppvAgendaAdd";
		$.post(url,{"agdt_id":agdt_id,"value":value,"submit":submit},function(data){
			//alert(data);
		});
		
		if(value !== 'Y'){
			$(".load_"+agdt_id).hide();
			$(".cancel_"+agdt_id).show();
		}
		else{
			$(".load_"+agdt_id).hide();
			$(".ok_"+agdt_id).show();
		}
		$(".showInput_"+agdt_id).show();
		$(".notelist_"+agdt_id).val("");
	}
	
	function appvNotelist(agdt_id, submit){
		$(".ok_"+agdt_id).hide();
		$(".cancel_"+agdt_id).hide();
		$(".valid_"+agdt_id).hide();
		$(".yes_"+agdt_id).hide();
		$(".load_"+agdt_id).show();
		
		var url = site_url+"emeeting/emeetingAppvAgendaAdd";
		var note = document.getElementsByClassName("notelist_"+agdt_id);
		for(var i = 0; i < note.length; i++){
			var agdt_appv_note = note[i].value;
		}
		
		if(agdt_appv_note){
			$.post(url,{"agdt_id":agdt_id,"agdt_appv_note":agdt_appv_note,"submit":submit},function(data){
				//alert(data);
			});
			$(".load_"+agdt_id).hide();
			$(".yes_"+agdt_id).show();
		}
		else{
			$(".load_"+agdt_id).hide();
			$(".valid_"+agdt_id).show();
		}
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
	li .appv{
		background : #EEF2F7;
	}
</style>

<?php
// Body
if(isset($qu_mt)){
?>



		<div id="guide">
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

<div id="da-panel collapsible" class="grid_4">
	<div class="da-panel collapsible">
		<div class="da-panel-header">
			<span class="da-panel-title">
				<img src="http://cvs.buu.ac.th/mispbri/css/emt_css/dandelion/HTML/images/icons/black/16/list.png">
				ระเบียบวาระเพิ่มเติม
				</span>
		</div>
	<div class="da-panel-content">
		<?php
		if($qu_add->num_rows() > 0){
		?>
			<div><span style="padding:25px;" ><font color="red">*</font> วาระที่มีแถบสี คือวาระที่ถูกเสนอเพิ่มเติม</span></div>
			<br/>
		<?php
		}
		?>
		<table style="width:100%;" align="center" class="da-table">
			<thead>
				<tr>
					<th>ระเบียบวาระการประชุม</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td align="right" style="padding-right:20px;">
						
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
				if($row->mt_mts_id < 24){
					if($qu_add->num_rows() > 0){
					?>
						<tr>
							<td id="body_agdt">
								<ul class="sortable">
									<?php
									re_viewAgtp($rs_ag,0,$cms_id,$rs_file);
									?>
								</ul>
							</td>
						</tr>
					<?php
					}
					else{
					?>
						<tr>
						<td  align="center">
							<span style="color:red;">*** ยังไม่มีการเสนอวาระเพิ่มเติมเข้ามา ***</span>
						</td>
					</tr>
					<?php
					}
				}
				else{
				?>
					<tr>
						<td  align="center">
							<span style="color:red;">*** วาระเพิ่มเติมได้ถูกปิดแล้ว ***</span>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br/>
		<?php
		if($row->mt_mts_id < 24 && $qu_add->num_rows() > 0){
		?>
			<div align="center" >
				<input type="button" name="btnAppvSubmit" id="btnAppvSubmit" value="ปิดการเสนอวาระเพิ่มเติม" />
			</div>
		<?php
		}
		?>
	</div>
	</div>
	</div>
<?php
}
// End body
?>

<?php
function re_viewAgtp($child,$no=0,$cms_id,$rs_file){
	// Image OK
	$ok = array(
		"src" => "images/emeeting/yes.png",
		"width" => "16",
		"border" => "0"
	);
	$imgOK = img($ok);
	
	// Image Cancel
	$cancel = array(
		"src" => "images/emeeting/dialog_cancel.png",
		"width" => "16",
		"border" => "0"
	);
	$imgCancel = img($cancel);
	
	// Image Loader
	$load = array(
		"src" => "images/emeeting/loadera16.gif",
		"width" => "16",
		"border" => "0"
	);
	$imgLoad = img($load);
	
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
			if($row_child->agdt_add == '1'){
				?>
				<li id="<?php echo $row_child->agdt_id; ?>" name="<?php echo $row_child->agdt_id; ?>" class="appv">
				<?php
			}
			else{
				?>
				<li id="<?php echo $row_child->agdt_id; ?>" name="<?php echo $row_child->agdt_id; ?>">
				<?php 
			}
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

			if($row_child->agdt_detail != "")
			{
				echo $row_child->agdt_detail;
				$num1 = 0;
			}
			else
			{
				$num1 = 1;
				echo "<br/>";
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
					echo '<li color="#"><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.$row_file->agfl_oname.'</a></li>';
				}
				echo "</ul><br/>";
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
			
			$sum = $num1 + $num2 + $num3 + $num4;
			
			// จัดการวาระเพิ่มเติม
			if($row_child->agdt_add == '1')
			{
				if($row_child->agdt_flag_appv == 'Y' || $row_child->agdt_flag_appv == 'N'){
					$agdt_appv_note = $row_child->agdt_appv_note;
					$showInput = "";
				}
				else{
					$agdt_appv_note = "";
					$showInput = "style=\"display:none;\"";
				}
				?>
				<br/><div style="width:760px;border:1px solid #D0DCF0;background:white;padding:5px 5px 5px 5px;">
				<input type="radio" name="approvelist_<?php echo $row_child->agdt_id; ?>" class="approvelist_<?php echo $row_child->agdt_id; ?>" value="Y" <?php if($row_child->agdt_flag_appv == 'Y') echo "checked=\"checked\""; ?> onclick="approveList(this.value, '<?php echo $row_child->agdt_id; ?>', 1)" style="width:20;"><b>อนุมัติ</b>
				<input type="radio" name="approvelist_<?php echo $row_child->agdt_id; ?>" class="approvelist_<?php echo $row_child->agdt_id; ?>" value="N" <?php if($row_child->agdt_flag_appv == 'N') echo "checked=\"checked\""; ?> onclick="approveList(this.value, '<?php echo $row_child->agdt_id; ?>', 1)" style="width:20;"><b>ไม่อนุมัติ</b>
				
				<span class="showInput_<?php echo $row_child->agdt_id; ?>" <?php echo $showInput; ?> >&nbsp;&nbsp;&nbsp;<b>หมายเหตุ (ถ้ามี) : </b>
					<input type="text" name="notelist_<?php echo $row_child->agdt_id; ?>" class="notelist_<?php echo $row_child->agdt_id; ?>" value="<?php echo $agdt_appv_note; ?>" style="width:300;">
					&nbsp;&nbsp;&nbsp;<input type="button" name="btnApprovelist_<?php echo $row_child->agdt_id; ?>" value="บันทึก" onclick="appvNotelist('<?php echo $row_child->agdt_id; ?>', 1)" style="width:70;">
				</span>
				
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="load_<?php echo $row_child->agdt_id; ?>" style="display:none;"><?php echo $imgLoad; ?></span>
				<span class="ok_<?php echo $row_child->agdt_id; ?>" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;อนุมัติแล้ว</span>
				<span class="cancel_<?php echo $row_child->agdt_id; ?>" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;ไม่อนุมัติ</span>
				<span class="valid_<?php echo $row_child->agdt_id; ?>" style="display:none;color:red;"><?php echo $imgCancel; ?>&nbsp;กรุณากรอกข้อมูล</span>
				<span class="yes_<?php echo $row_child->agdt_id; ?>" style="display:none;color:green;"><?php echo $imgOK; ?>&nbsp;บันทึกข้อมูลเรียบร้อย</span>
				</div><br/>
				<?php
			}
			echo "</div></span>";

			if($row_child->child->num_rows()>0){
				re_viewAgtp($row_child->child,$no_send,$cms_id,$rs_file);
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