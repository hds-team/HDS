<?php
if(isset($rs_cms)){
	$row = $rs_cms->row();
}
else{
	echo "<div style=\"text-align:center;padding:10px;margin10px;color:#FF0000;\"><h3>ไม่พบรหัสการประชุมหลัก กรุณาเข้าเมนูนี้ใหม่อีกครั้ง!</h3></div>";
}
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
	
	// Function
	function editDetail(){
		url = site_url+"emeeting/commissionEdit";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	function editPtp(){
		url = site_url+"emeeting/commissionEditPtp";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	function editPtp2(){
		url = site_url+"emeeting/commissionEditPtp2";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	function editEmail(){
		url = site_url+"emeeting/commissionEditEmail";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	function editAgenda(){
		url = site_url+"emeeting/commissionEditAgenda";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "")
	}
	function deleteCms(){
		msg = $(this).attr("msg");
		url = site_url+"emeeting/commissionDel";
		sendPost("frm", {cms_id:<?php echo $cms_id; ?>}, url, "", "คุณยืนยันที่จะลบเทมเพลตการประชุม \""+msg+"\" และการประชุมย่อยทั้งหมดนี้ใช่หรือไม่")
	}
});
</script>
<style>
	.icon32{
		cursor : pointer;
	}
</style>

<?php
// Body
if(isset($rs_cms)){
?>

	<div class="grid_4_center">
	<div class="da-panel collapsible">
	<div class="da-panel-header">
	<span class="da-panel-title">
	<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_image.png";?> />
	ชื่อการประชุมหลัก : <?php echo $row->cms_name; ?>
	
	</span>
	</div>
	<div class="da-panel-content">
		<div style="padding:10px 20px;">
			<?php
			//รูปรายละเอียด
			$edit = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/dd.jpg",
				"width" => "35"
			);
			$imgEdit = img($edit);
			//รูปบุคลากร
			$participant = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/pt.jpg",
				"width" => "35"
			);
			$imgPtp = img($participant);
			//รูปกำหนดผู้รับผิดชอบการประชุม
			$participant = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/pt.jpg",
				"width" => "35"
			);
			$imgPtp = img($participant);
			// Image Email
			$imgEmail1 = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/mail.jpg",
				"width" => "35"
			);
			$imgEmail = img($imgEmail1);
			//รูประเบียบวาระ
			$agenda = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/mk.jpg",
				"width" => "35"
			);
			$imgAg = img($agenda);
			//รูปลบการประชุม
			$delete = array(
				"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/delete2.jpg",
				"width" => "35"
			);
			$imgDelete = img($delete);
			?>
			<table border="0">
				<tr>
					<td><div class="icon32" id="editDetail"><?php echo $imgEdit; ?><br/><span class="note">กำหนดรายละเอียด</span></div></td>
					<td><div class="icon32" id="editPtp"><?php echo $imgPtp; ?><br/><span class="note">กำหนดบุคลากร</span></div></td>
					<td><div class="icon32" id="editPtp2"><?php echo $imgPtp; ?><br/><span class="note">กำหนดผู้รับผิดชอบการประชุม</span></div></td>
					<td><div class="icon32" id="editEmail"><?php echo $imgEmail; ?><br/><span class="note">กำหนดอีเมล</span></div></td>
					<td><div class="icon32" id="editAgenda"><?php echo $imgAg; ?><br/><span class="note">กำหนดระเบียบวาระ</span></div></td>
					<td><div class="icon32" id="deleteCms" msg="<?php echo $row->cms_name; ?>" ><?php echo $imgDelete; ?><br/><span class="note">ลบประชุม</span></div></td>
				</tr>
			</table>
						  </div>
						</div>
					</div>
				</div>
		<div name="push" style="padding:5px 195px;">
						<?php
						// Image Add
						//$add = array(
						//	"src" => base_url().$this->config->item("emt_dandelion_folder")."images/icons/color/add.png",
						//	"width" => "16",
						//	"border" => "0"
						//);
						//$imgAdd = img($add);
						$urlAdd = site_url() . "emeeting/emeeting/emeetingAdd";
						$post = "cms_id:{$row->cms_id}";
						//echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlAdd}','','');\" title=\"กำหนดรายละเอียดการประชุม\">{$imgAdd}  กำหนดรายละเอียดการประชุม</a>";
						echo "<input class=\"da-button blue\" type=\"submit\" onclick=\"sendPost('myForm',{{$post}},'{$urlAdd}','','');\" name=\"submit\" title=\"กำหนดรายละเอียดการประชุม\" value=\"เพิ่มการประชุมย่อย\" />";
						?>
		</div>
		<div class="grid_4_center">
                        	<div class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
										<img src=<?php echo base_url().$this->config->item("emt_dandelion_folder")."images/icons/black/32/list_w_images.png";?> />
											รายการของการประชุมแต่ละครั้ง
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
		<table style="width:100%;" align="center" class="da-table dataTable" id="da-ex-datatable-default">
			<thead>
				<tr>
					<th width="70">
						ลำดับ
					</th>
					<th width="450">
						ชื่อการประชุม
					</th>
					<th>
						วันที่
					</th>
				</tr>
			</thead>
			<tfoot>
			</tfoot>
			<tbody>
				<?php
				$num_th = $this->config->item('emt_cv_th');
				if(isset($rs_mt) && $rs_mt->num_rows() > 0){
					// URL
					$url = site_url() . "emeeting/emeeting/";
					$urlEdit = $url . "emeetingEdit";
					$urlDel = $url . "emeetingDel";
					$urlView = $url . "emeetingView";
					$place = "";
					$time = "";
					$show_row = 0;
					foreach($rs_mt->result() as $key => $row_mt){
						$post = "mt_id:'" . $row_mt->mt_id ."',cms_id:'" . $row->cms_id . "'";
					
						$date_start = dateDisplay($row_mt->mt_date_start);
						$date_stop = dateDisplay($row_mt->mt_date_stop);
						$show_row = 1;
					?>
					<tr>
						<td align="center">
							<?php echo ($key+1); ?>
						</td>
						<td style="padding-left:15px;" nowrap="nowrap">
							<?php 
							echo "<a href=\"javascript:void(0);\" onclick=\"sendPost('myForm',{{$post}},'{$urlView}','','');\" title=\"ดูรายละเอียดการประชุม\">";
							echo $row->cms_name; ?>
							<?php if($row_mt->mt_no!=0){ ?>
							ครั้งที่ 
							<?php echo $row_mt->mt_no; ?>
							<?php }	else{?>
							<?php echo $row_mt->mt_nosp;  ?>
							<?php } ?>
							/
							<?php 
							echo $row_mt->mt_year;
							echo "</a>\n";
							?>
						</td>
						<td align="center" nowrap="nowrap">
							<?php echo "{$date_start} ถึง {$date_stop}"; ?>
						</td>
					</tr>
					<?php
					}
					/*if($show_row == 0)
					{
				?>
						<tr>
							<td colspan="3" align="center" class='red'>
								***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
							</td>
						</tr>
				<?php
					} */
				}  /*else {
				?>
					<tr>
						<td colspan="3" align="center" class='red'>
							***ยังไม่มีการประชุมที่คุณต้องรับผิดชอบ***
						</td>
					</tr>
				<?php
				} */
				?>
			</tbody>
		</table>
		</div>
		</div>
		</div>
<?php
}
// End body
?>
