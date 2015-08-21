<!-- fancybox -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/emt_js/fancybox.js"></script>
<?php 
echo link_tag('css/emt_css/fancybox/fancybox.css');
?>
	<!--//---Begin->รายการการประชุมที่ได้รับแจ้ง-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		<div id="da-panel collapsible" class="grid_4_center">
			<div class="da-panel">
				<div class="da-panel-header">
                    <span class="da-panel-title">
                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/clipboard_1.png";?> />
							รายการการประชุม
                    </span>
                    <!-- <span class="da-panel-toggler"> </span> -->  
					<!-- id="da-ex-datatable-default" -->
            </div>	
			<div class="da-panel-content">
			<table style="width:100%;" align="center" class="da-table" >
				<thead>
					<tr >
					<th colspan="6" style="text-align:left;" >รายการประชุมที่ได้รับแจ้งล่าสุด</th>
					</tr>
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
							if($rs_mt->row()->mt_no!=0){
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $row1->mt_no . " / " . $row1->mt_year . "</td>";
							}else{
							echo "<td align='center' class='".$color_row."' nowrap=\"nowrap\">" . $row1->mt_nosp . " / " . $row1->mt_year . "</td>";
							}
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
							echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='6' align='right'>";
					$url = site_url() . "emeeting/announceMeeting/announceMeetingShow2";
					echo "<div align=\"right\">";
					echo "<a href=\"$url\"\" title=\"\"><b>ดูรายการทั้งหมด >></b></a></td>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
				?>
				<!-- ประชุมที่รอการรับรองมติ -->
				<thead>
				<tr>
					<th colspan="6" style="text-align:left;">รายการประชุมที่รอการรับรองมติ</th>
				</tr>
					<tr>
						<th>ลำดับ</th>
						<th width="40%">ชื่อการประชุม</th>
						<th>ครั้งที่</th>
						<th>วันที่และเวลา</th>
						<th colspan="6">วันที่สิ้นสุดรับรองมติ</th>
					</tr>
				</thead>
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
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td colspan='6' align='right'>";
					$url = site_url() . "emeeting/announceMeeting/announceMeetingShow3";
					echo "<div align=\"right\">";
					echo "<a href=\"$url\"\" title=\"\"><b>ดูรายการทั้งหมด >></b></a></td>";
					echo "</div>";
					echo "</td>";
					echo "</tr>";
				?>
				</tbody>
			</table>
			</div>
			</div>
		</div>
	<!--//---End->รายการการประชุมที่รอการรับรองมติ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		<p>&nbsp;</p>
	<!--//---Begin->รายการการประชุมเกี่ยวข้อง-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		<div class="grid_4_center"> <!--id="content-body"-->
		<div class="da-panel">
				<div class="da-panel-header">
                    <span class="da-panel-title">
                        <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/16/list.png";?> />
							รายการการประชุมเกี่ยวข้อง
                    </span>
				</div>
				<div class="da-panel-header">
			
				<?php 
					$action = "announceMeeting/announceMeetingShow";
					$attr = array('id' => 'frmSearch');
					echo form_open($this->config->item("emt_path").$action,$attr); 
				?>
				<br/>
				<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/search-icon.png";?> />
				ค้นหา&nbsp;&nbsp;<input type="text" name="txt" value="" size="50" />&nbsp;&nbsp;<input class="da-button gray"  type="submit" id="btnSearch" name="btnSearch" value="ค้นหา" />
				<?php echo form_close(); ?>
				<br/>
			
				
			<?php
				if(isset($txt) && $txt != "")
				{
					echo "<div  style=\"padding-left:30px;\">";
					echo "การค้นหาที่เกี่ยวข้องกับ(คำค้น)&nbsp;<i class=\"hilight\">".$txt."</i>";
					echo "<br/>";
					echo "ผลการค้นหาพบจากมติการประชุมฉบับเต็ม<i class=\"hilight\">&nbsp;".$mt_num."&nbsp;&nbsp;</i>รายการ";
					echo "<br/>";
					echo "ผลการค้นหาพบจากมติการประชุมฉบับย่อ<i class=\"hilight\">&nbsp;".$mt_num_short."&nbsp;&nbsp;</i>รายการ";
					echo "<br/>";
					echo "</div>";
				}
				$url = site_url() . "emeeting/searchMeeting/";
				$urlView = $url . "searchDetail";
				$linkViewAll = site_url() . "emeeting/searchMeeting/showAllListMt/";
				$tag = array("<p>","</p>","<b>","</b>","<strong>","</strong>","&nbsp;","<br/>","<span>","</span>");
			?>
			</div>
			<div class="da-panel-content">
			<table style="width:100%;" align="center" class="da-table" border="0">
				<thead>
					<tr>
						<th>มติการประชุมฉบับเต็ม</th>
						<th>มติการประชุมฉบับย่อ </th>
					</tr>
				</thead>
				<tbody >
					<tr>
						<td width="50%"  valign="top" style="padding:10px; 10px; 10px; 10px;">
							<?php
								if(isset($arr_result) && !empty($arr_result))
								{
									//echo "<div class=\"da-panel collapsible\">";
									//echo "<div class=\"da-panel-content\">";
									echo "<table width=\"100%\" border=\"0\"><tr><td>";
									foreach($arr_result as $key1 => $value1)
									{
										$post = "mt_id:'" . $value1["mt_id"] ."', cms_id:'" . $value1["cms_id"] ."', txt:'" . $txt ."'";
										echo "<b style=\"font-size:12pt;\"><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"คลิกดูรายละเอียด\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $value1["mt_name1"])."</a></b>";
										echo "<hr style=\"border:dashed; color:#ccc; border-width:1px 0 0; height:0;\" />";
										
										foreach($value1 as $key2 => $value2)
										{
											if(is_array($value2))
											{
												if($value2["agdt_head_first2"] == 1){
													echo "<b>หัวข้อวาระการประชุม  :  </b>".$value2["agdt_head_first"];
													echo "<br/>";
												} 
												$agdt_head = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$value2["agdt_head"]),0,100,"..."));
												echo "<b>วาระการประชุม  :  </b>".$agdt_head;
												echo "<br/>";
												$search_detail = strpos ( $value2["agdt_detail"], "<tr>" );
												if($search_detail == false){
													$agdt_detail = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$value2["agdt_detail"]),0,100,"..."));
												} else {
													$agdt_detail = "...";
												}
												echo "<b>รายละเอียด  :  </b>".$agdt_detail;
												echo "<br/>";
												$search_present = strpos ( $value2["agdt_present"], "<tr>" );
												if($search_present == false){
													$agdt_present = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$value2["agdt_present"]),0,100,"..."));
												} else {
													$agdt_present = "...";
												}
												echo "<b>ประเด็นเสนอ  :  </b>".$agdt_present;
												echo "<br/>";
												$search_result = strpos ( $value2["agdt_result"], "<tr>" );
												if($search_result == false){
													$agdt_result = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$value2["agdt_result"]),0,100,"..."));
												} else {
													$agdt_result = "...";
												}
												echo "<b>มติ  :  </b>".$agdt_result;
												echo "<br/>";
												$agfl_oname = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($tag, "",$value2["agfl_oname"]));
												echo "<b>ชื่อเอกสารแนบ  :  </b>".$agfl_oname;
												echo "<br/><br/><br/>";
											}
										}
										echo "</td></tr>";
									}
									echo "<tr><td align=\"right\">";
									$postViewAllMt = "flag:'" . 1 ."', txt:'" . $txt ."'";
									echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$postViewAllMt}},'{$linkViewAll}','','');\" title=\"คลิกดูทั้งหมด\"><b>ดูทั้งหมด >></b></a>&nbsp;&nbsp;</a>";
									echo "</td></tr>";
									echo "</table>";
									//echo "</div>";
									//echo "</div>";
								} else {
									echo "<span style=\"padding-top:5px; padding-left:140px;\" class='red'>" . $this->config->item("emt_not_found") . "</span>";
								}
							?>
						</td>
						<td valign="top" style="padding:10px; 10px; 10px; 10px;">
						<?php
							if(isset($arr_result_short) && !empty($arr_result_short))
							{
								//echo "<div class=\"da-panel collapsible\">";
								//echo "<div class=\"da-panel-content\">";
								echo "<table width=\"100%\" border=\"0\"><tr><td>";
								foreach($arr_result_short as $keySh1 => $valueSh1)
								{
									$postSh = "mt_id:'" . $valueSh1["mt_id"] ."', cms_id:'" . $valueSh1["cms_id"] ."', txt:'" . $txt ."', short:'" . 1 ."'";
									echo "<b style=\"font-size:12pt;\"><a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$postSh}},'{$urlView}','','');\" title=\"คลิกดูรายละเอียด\">".str_replace($txt, "<span class=\"hilight\">".$txt."</span>", $valueSh1["mt_name1"])."</a></b>";
									echo "<hr style=\"border:dashed; color:#ccc; border-width:1px 0 0; height:0;\" />";
									
									foreach($valueSh1 as $keySh2 => $valueSh2)
									{
										if(is_array($valueSh2))
										{
											if($valueSh2["ags_head_first2"] == 1){
												echo "<b>หัวข้อวาระการประชุม  :  </b>".$valueSh2["ags_head_first"];
												echo "<br/>";
											} 
											$ags_head = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$valueSh2["ags_head"]),0,100,"..."));
											echo "<b>วาระการประชุม  :  </b>".$ags_head;
											echo "<br/>";
											$search_detail2 = strpos ( $valueSh2["ags_detail"], "<tr>" );
											if($search_detail2 == false){
												$ags_detail = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$valueSh2["ags_detail"]),0,100,"..."));
											} else {
												$ags_detail = "...";
											}
											echo "<b>รายละเอียด  :  </b>".$ags_detail;
											echo "<br/>";
											$search_present2 = strpos ( $valueSh2["ags_present"], "<tr>" );
											if($search_present2 == false){
												$ags_present = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$valueSh2["ags_present"]),0,100,"..."));
											} else {
												$ags_present = "...";
											}
											echo "<b>ประเด็นเสนอ  :  </b>".$ags_present;
											echo "<br/>";
											$search_result2 = strpos ( $valueSh2["ags_result"], "<tr>" );
											if($search_result2 == false){
												$ags_result = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", mb_strimwidth(str_replace($tag, "",$valueSh2["ags_result"]),0,100,"..."));
											} else {
												$ags_result = "...";
											}
											echo "<b>มติ  :  </b>".$ags_result;
											echo "<br/>";
											$agfls_oname = str_replace($txt, "<span class=\"hilight\">".$txt."</span>", str_replace($tag, "",$valueSh2["agfls_oname"]));
											echo "<b>ชื่อเอกสารแนบ  :  </b>".$agfls_oname;
											echo "<br/><br/><br/>";
										}
									}
									echo "</td></tr>";
								}
								echo "<tr><td align=\"right\">";
								$postViewAllShMt = "flag:'" . 2 ."', txt:'" . $txt ."'";
								echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$postViewAllShMt}},'{$linkViewAll}','','');\" title=\"คลิกดูทั้งหมด\"><b>ดูทั้งหมด >></b></a>&nbsp;&nbsp;</a>";
								echo "</td></tr>";
								echo "</table>";
								//echo "</div>";
								//echo "</div>";
							} else {
								echo "<span style=\"padding-top:5px; padding-left:140px;\" class='red'>" . $this->config->item("emt_not_found") . "</span>";
							}
						?>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			
		</div>
		</div>
<form method='post' action='jacknakub'>
<span>รายงานการประชุม</span>
<input type="submit" name="submit" value="ทดสอบ" />
</form>		
	<!--//---End->รายการการประชุมเกี่ยวข้อง---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//-->
		<p>&nbsp;</p>