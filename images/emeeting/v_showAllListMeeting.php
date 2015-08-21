<?php 
echo link_tag('css/emt_css/emt_css.css');
echo link_tag('css/rg_css.css');
?>
<script>
$(document).ready(function(){
	// Init
	url_back = site_url+"announceMeeting/announceMeetingShow";
	
	//Add event
	$("#back").click(back);
	
	//Add function
	function back(){
		//sendPost("frm", "", url_back, "", "")
	}
});
</script>
<style>
	.icon32,.icon{
		cursor : pointer;
	}
</style>
<div>
	<div id="content-header">
		<?php
			$back = array(
				"src" => "images/emeeting/icons/back.png",
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
							รายการการประชุมเกี่ยวข้อง
                    </span>
                    <!-- <span class="da-panel-toggler"> </span> -->  
					<!-- id="da-ex-datatable-default" -->
				</div>	
		<div class="da-panel-header" style="padding-left:25px;">
			<?php 
				$action = "searchMeeting/showAllListMt";
				$attr = array('id' => 'frmSearch');
				echo form_open($this->config->item("emt_path").$action,$attr); 
			?>
			<br/>
			<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/search-icon.png";?> />
			ค้นหา&nbsp;&nbsp;<input type="text" name="txt" value="" size="50" />&nbsp;&nbsp;<input class="da-button gray" type="submit" id="btnSearch" name="btnSearch" value="ค้นหา" />
			<input type="hidden" name="flag" value="<?php echo $flag; ?>" />
			<?php echo form_close(); ?>
			<br/>
		
		<?php
			if(isset($txt) && $txt != "")
			{
				echo "<div style=\"padding-left:30px;\">";
				echo "การค้นหาที่เกี่ยวข้องกับ&nbsp;<i class=\"hilight\">".$txt."</i>";
				echo "<br/>";
				if($flag == 1) {
					echo "ผลการค้นหาพบการประชุมที่ผ่านมา<i class=\"hilight\">&nbsp;".$mt_num."&nbsp;&nbsp;</i>รายการ";
				} else {
					echo "ผลการค้นหาพบระเบียบวาระย่อ<i class=\"hilight\">&nbsp;".$mt_num_short."&nbsp;&nbsp;</i>รายการ";
				}
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
		<table style="width:100%;" align="center" class="da-table" >
			<?php
				if(isset($flag) && $flag == 1)
				{
					echo "<thead><tr><th>การประชุมที่ผ่านมา</th></tr></thead>";
					echo "<tbody><tr><td>";
					if(isset($arr_result) && !empty($arr_result))
					{
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
						}
					} else {
						echo "<span style=\"padding-top:5px; padding-left:140px;\" class='red'>" . $this->config->item("emt_not_found") . "</span>";
					}
					echo "</td></tr></tbody>";
				}
				
				if(isset($flag) && $flag == 2)
				{
					echo "<thead><tr><th>ระเบียบวาระย่อ</th></tr></thead>";
					echo "<tbody><tr><td>";
					if(isset($arr_result_short) && !empty($arr_result_short))
					{
						foreach($arr_result_short as $keySh1 => $valueSh1)
						{
							$postSh = "mt_id:'" . $valueSh1["mt_id"] ."', cms_id:'" . $valueSh1["cms_id"] ."', txt:'" . $txt ."'";
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
						}
					} else {
						echo "<span style=\"padding-top:5px; padding-left:140px;\" class='red'>" . $this->config->item("emt_not_found") . "</span>";
					}
					echo "</td></tr></tbody>";
				}
			?>
			</tbody>
		</table>
		</div>
		</div>
	</div>
</div>
<div><span style="padding-right:130px;">&nbsp;</span> </div>