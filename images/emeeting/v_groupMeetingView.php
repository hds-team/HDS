<script>
function gpDel(gp_id, warnMsg){
	var url = site_url + "<?php echo "groupMeeting/deleteGroup";?>";
	sendPost("gpDel",{"gp_id":gp_id},url,"","คุณต้องการลบ \""+warnMsg+"\" ใช่หรือไม่");
}
</script>

<div name="push" style="padding:50px 145px 5px;">
		<?php
						// Image Add
						//$add = array(
						//	"src" => base_url().$this->config->item("emt_dandelion_folder")."images\icons\color\add.png",
						//	"width" => "16",
						//	"border" => "0"
						//);
						//$imgAdd = img($add); // รูปภาพ
						$urlAdd = site_url() . "emeeting/groupMeeting/addGroup"; // ส่งลิงค์
						
						$post=0;
						echo"<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{$post},'{$urlAdd}','','');\" >
						<input type=\"button\" value=\"เพิ่มกลุ่มผู้เข้าร่วมประชุม\" class=\"da-button blue\" />
						</a>";
						?>
		</div>		
			
	<div class="grid_4_center">
        <div class="da-panel collapsible">
            <div class="da-panel-header">
                <span class="da-panel-title">
                    <img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/group.png"; ?> />
                        รายการ กลุ่มผู้เข้าร่วมประชุม
                </span>
			
            </div>
            <div class="da-panel-content">
         <table style="width:100%;" align="center"  class="da-table" id="da-ex-datatable-default">
			<thead>
				<tr>
					<th width="5%;">ลำดับ</th>
					<th>ชื่อกลุ่ม</th>
					<th width="20%">จำนวนผู้ประชุม(คน)</th>
					<th width="10%">ลบ</th>
				</tr>
			</thead>
			<tfoot>
			</tfoot>
			<tbody>
				<?php
				if(isset($rs_gp) && $rs_gp->num_rows() > 0){
					$show_row = 0;
					// Image Add
					$add = array(
						"src" => base_url().$this->config->item("emt_dandelion_folder")."images\icons\color\add.png",
						"width" => "16",
						"border" => "0"
					);
					$imgAdd = img($add);
					
					// Image Delete
					$del = array(
					"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/cross.png",
					"width" => "16",
					"border" => "0"
					);
					$imgDel = img($del);
					
					// URL
					$url = site_url() . "emeeting/groupMeeting/";
					$urlEdit = $url . "editGroup";
					foreach($rs_gp->result() as $key => $row_gp){
						$show_row = 1;
						?>
							<tr>
								<td align="center"><?php echo ($key+1); ?></td>
								<td style="padding-left:15px;">
									<?php echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{gp_id:".$row_gp->gp_id."},'{$urlEdit}','','');\" title=\"ดูรายละเอียดของกลุ่ม\">".$row_gp->gp_name."</a>\n"; ?>
								</td>
								<td align="center"><?php echo $row_gp->num_ps; ?></td>
								<td align="center">
									<?php echo "<a href=\"javascript:void(0);\" title=\"ลบกลุ่ม\" onclick=\"gpDel('{$row_gp->gp_id}','{$row_gp->gp_name}')\" >".$imgDel."</a>"; ?>
								</td>
							</tr>
						<?php
					}
				} 
				else {
				?>
					<tr>
						<td colspan="4" align="center" class='red'>
							***ยังไม่มีกลุ่ม***
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		</div>
	</div>
</div>


