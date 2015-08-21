<?php
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
<script language="javascript">
$(document).ready(function(){
	//Add event
	$("#back").click(back);
	
	//Function
	function back(){
		url = site_url+"announceMeeting/announceMeetingShow";
		sendPost("frmMt",{"flag":1, "detail":2}, url, "", "")
	}
});
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
		padding-left : 35px;
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

<div> <!-- id="content" -->
	<div id="content-header">
		<?php
		$back = array(
			"src" => "images/emeeting/icons/back.png"
		);
		$imgBack = img($back);
		echo "<a class=\"icon\" id=\"back\">{$imgBack}</a>";
		?>
	</div>
	<br/>
	<div id="da-panel collapsible" class="grid_4_center">
			<div class="da-panel collapsible">
				<div class="da-panel-header">
                    <span class="da-panel-title">
                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/16/list.png";?> />
							ชื่อการประชุม : 
		<?php
		echo str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_cms->cms_name);
		?>
		 ครั้งที่ <?php echo al_to_th($rs_mt->row()->mt_no); ?> / <?php echo  al_to_th($rs_mt->row()->mt_year); ?>

                    </span>
                    <!-- <span class="da-panel-toggler"> </span> -->  
					<!-- id="da-ex-datatable-default" -->
            </div>	
	<!-- <div id="content-body" class="da-panel-content"> ->
			
		<!-- <p>&nbsp;</p> -->
		<?php
			$mt_mts_id = $rs_mt->row()->mt_mts_id;
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
		<!-- </div> -->
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="2"><b>รายละเอียดการประชุม</b>
					</td>
				</tr>
				<tr>
					<td width="200"><label>ชื่อการประชุม : </label></td>
					<td>
						<?php echo str_replace($txt, "<span class=\"hilight\">".$txt."</span>", emt_getval("cms_name", $row_cms));?>
					</td>
				</tr>
				<tr>
					<td><label>ครั้งที่ : </label></td>
					<td>
						<?php echo al_to_th(emt_getval("mt_no", $row));?> / <?php echo al_to_th(emt_getval("mt_year", $row));?>
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
		</div>
		
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>บุคลากรที่มีสิทธิ์ในการจัดการประชุม</b>
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
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
				?>
			</tbody>
		</table>
		<br/>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>บุคลากรในการประชุม</b>
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
							$rowPnt .= "<td width=\"150\" align=\"right\" style=\"padding-right:10px;\" >{$ag_name}</td>";
							$rowPnt .= "</tr>";
							echo $rowPnt;
						}
					}
				?>
			</tbody>
		</table>
		<br/>
		</div>
		<div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table" >
			<tbody>
				<tr>
					<td colspan="3"><b>ระเบียบวาระในการประชุม หฟกหฟก</b>
					</td>
				</tr>
				<tr>
					<td id="body_agtp">
						<ul class="sortable">
							<?php
							if($short == 1)
							{
								re_viewAgs($rs_agdt, 0, $rs_file, $mt_mts_id, $txt);
							}
							else
							{
								re_viewAgdt($rs_agdt, 0, $rs_file, $mt_mts_id, $txt);
							}
							?>
						</ul>
					</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<div>
		<?php if(isset($agdt_edit) && $agdt_edit != "") { ?>
		<fieldset style="border:1px solid #FF0000">
			<legend><b>จากการรับรองวาระการประชุม มีสิ่งที่ต้องแก้ไขดังนี้ :</b></legend>
			<?php
				echo $agdt_edit;
			?>
		</fieldset>
		<?php } ?>
	</div>
	</div>
	</div>
	</div>
</div>

<?php
}
// End body
?>

<?php
//----- SSL
function re_viewAgdt($child,$no=0,$rs_file="",$mt_mts_id="",$txt=""){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "สิ่งที่ต้องแก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	
	$p = array("<p>", "</p>");
	
	?>
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		
		<div id="<?php echo $row_child->agdt_id; ?>">
			<?php
			echo "<span class=\"string\"";
			$i = $i + 1;
			if($row_child->agdt_level == 0){
				echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				$margin1 = 30;
				for ($j1 = 1; $j1 <= $row_child->agdt_level; $j1++) {
					$margin1 = $margin1 + 30;
				}
				echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			echo str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_child->agdt_head)."<br/></div>";
			$margin2 = 45;
			for ($j2 = 1; $j2 <= $row_child->agdt_level; $j2++) {
				$margin2 = $margin2 + 45;
			}
			if($row_child->agdt_detail != "")
			{
				echo "<br/><div class=\"tbin\" style=\"margin-left:".$margin2."px;\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_child->agdt_detail)."</div>";
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
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfl_nname.'" target="_blank" >- '.str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_file->agfl_oname).'</a></li>';
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
				echo "<td valign=\"top\" ><div class=\"tbin\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($p,"",$row_child->agdt_present))."</div></td>";
				echo "</tr>";
				echo "</table><br/>";
				$num3 = 0;
			}
			else
			{
				$num3 = 1;
			}

			if($row_child->agdt_result != "" && $mt_mts_id > 25)
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_result."</u></b></td>";
				echo "<td valign=\"top\" ><div class=\"tbin\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($p,"",$row_child->agdt_result))."</div></td>";
				echo "</tr>";
				echo "<tr><td>&nbsp;</td></tr>";
				echo "</table>";
				$num4 = 0;
			}
			else
			{
				$num4 = 1;
			}
			
			if($row_child->agdt_flag_extra == 9 && $row_child->agdt_edit != "")
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\"><b><u>".$str_edit."</u></b></td>";
				$p = array("<p>", "</p>");
				echo "<td><div class=\"tbin\">".str_replace($p,"",$row_child->agdt_edit)."</div></td>";
				echo "</tr>";
				echo "<tr><td>&nbsp;</td></tr>";
				echo "</table>";
			}
			
			$sum = $num1 + $num2 + $num3 + $num4;
			if($sum == 4)
			{
				//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
			}
			
			echo "</span>";
			
			if($row_child->child->num_rows()>0){
				re_viewAgdt($row_child->child,$no_send,$rs_file,$mt_mts_id,$txt);
			}
			?>
		</div>
		<?php
		}
		?>
<?php
}

function re_viewAgs($child,$no=0,$rs_file="",$mt_mts_id="",$txt=""){
	$str_agd = "วาระที่ ";
	$str_detail = "รายละเอียด";
	$str_by = "เสนอโดย";
	$str_present = "ประเด็นเสนอ";
	$str_result = "มติ";
	$str_edit = "สิ่งที่ต้องแก้ไข";
	$str_file = "เอกสารแนบ";
	$no_send = "";
	$num1 = 0;
	$num2 = 0;
	$num3 = 0;
	$num4 = 0;
	$sum = 0;
	
	$p = array("<p>", "</p>");
	
	?>
		<?php
		$i = 0;
		foreach($child->result() as $row_child){
		?>
		
		<div id="<?php echo $row_child->ags_id; ?>">
			<?php
			echo "<span class=\"string\">";
			$i = $i + 1;
			if($row_child->ags_level == 0){
				echo "<br/><b>".$str_agd . al_to_th($i) . "</b>&nbsp;&nbsp;";
				$no_send = $i;
			} else {
				$margin1 = 30;
				for ($j1 = 1; $j1 <= $row_child->ags_level; $j1++) {
					$margin1 = $margin1 + 30;
				}
				echo "<div style=\"margin-left:".$margin1."px;\"><b>".al_to_th($no) . "." . al_to_th($i) . "</b>&nbsp;&nbsp;";
				$no_send = $no . "." . $i;
			}
			
			echo str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_child->ags_head)."<br/></div>";
			$margin2 = 45;
			for ($j2 = 1; $j2 <= $row_child->ags_level; $j2++) {
				$margin2 = $margin2 + 45;
			}
			if($row_child->ags_detail != "")
			{
				echo "<div class=\"tbin\" style=\"margin-left:".$margin2."px;\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_child->ags_detail)."</div>";
				$num1 = 0;
			}
			else
			{
				echo "<br/>";
				$num1 = 1;
			}
			
			//	เสนอโดย
			if($row_child->ags_by != "")
			{
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_by."</u></b>&nbsp;&nbsp;".$row_child->ags_by."</div><br/>";
			}
			
			$ag_file = $rs_file->getFileByAgdtId($row_child->ags_id);
			
			if($ag_file->num_rows() > 0){
				echo "<div style=\"margin-left:".$margin2."px;\"><b><u>".$str_file."</u></b>";
				echo "<ul>";
				foreach($ag_file->result() as $row_file)
				{
					echo '<li><a href="'.base_url().'uploads/emeeting/docs/'.$row_file->agfls_nname.'" target="_blank" >- '.str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $row_file->agfls_oname).'</a></li>';
				}
				echo "</ul></div><br/>";
				$num2 = 0;
			}
			else
			{
				$num2 = 1;
			}
			
			if($row_child->ags_present != "")
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_present."</u></b></td>";
				echo "<td valign=\"top\" ><div class=\"tbin\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($p,"",$row_child->ags_present))."</div></td>";
				echo "</tr>";
				echo "</table><br/>";
				$num3 = 0;
			}
			else
			{
				$num3 = 1;
			}

			if($row_child->ags_result != "" && $mt_mts_id > 25)
			{
				echo "<table style=\"border:0px;font-size:16.0pt;font-family:'TH SarabunPSK','sans-serif';\">";
				echo "<tr>";
				echo "<td width=\"90\" valign=\"top\"><b><u>".$str_result."</u></b></td>";
				echo "<td valign=\"top\"><div class=\"tbin\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($p,"",$row_child->ags_result))."</div></td>";
				echo "</tr>";
				echo "<tr><td>&nbsp;</td></tr>";
				echo "</table>";
				$num4 = 0;
			}
			else
			{
				$num4 = 1;
			}
			
			$sum = $num1 + $num2 + $num3 + $num4;
			if($sum == 4)
			{
				//echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- ไม่มี -<br/>";
			}
			
			echo "</span>";
			
			if($row_child->child->num_rows()>0){
				re_viewAgs($row_child->child,$no_send,$rs_file,$mt_mts_id,$txt);
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