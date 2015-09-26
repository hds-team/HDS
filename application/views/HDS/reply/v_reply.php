
<!-- Detail of request -->
<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url('images/icons/color/blog.png'); ?>" alt="">
				<b>รายละเอียกคำร้อง </b>
		</span>
	<span class="da-panel-toggler"></span></div>
	<div class="da-panel-content">
		<table class="da-table da-detail-view">
			<tbody>
				<?php 
					foreach($request->result() as $row)
					{
				?>
					<tr class="odd">
						<th><b>หัวข้อ</b></th>
						<td><?php echo " ".$row->rq_subject; ?></td>
						<th><b>เบอร์โทร</b></th>
						<td><?php echo " ".$row->rq_tell; ?></td>
					</tr>
					<tr class="even">
						<th><b>ประเภท</b></th>
						<td><?php echo " ".$row->ct_name; ?></td>
						<th><b>อีเมล</b></th>
						<td><?php echo " ".$row->rq_email; ?></td>
					</tr>
					<tr class="odd">
						<th><b>หมวด</b></th>
						<td><?php echo " ".$row->st_name; ?></td>
						<th><b>ระบบ</b></th>
						<td><?php echo " ".$row->StNameT; ?></td>
					</tr>
					<tr class="odd">
						<th><b>ระดับความสำคัญ</b></th>
						<td><?php echo " ".$row->lv_name; ?></td>
						<th><b>วันที่</b></th>
						<td><?php echo " ".$this->date_time->DateThai($row->rq_date); ?></td>
					</tr>
					<tr class="odd">
						<th><b>กำหนดส่ง</b></th>
						<td><?php echo " ".$this->date_time->DateThai($row->lg_exp); ?></td>
						<th><b>ผู้ส่ง</b></th>
						<td><?php echo " ".$row->UsName; ?></td>
					</tr>
					<tr class="even" colspan="4">
						<th><b>รายละเอียด</b></th>
						<td><?php echo " ".$row->rq_detail; ?></td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- File picture of request -->
<div class="clear"></div><!-- new line -->
<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src=<?php echo base_url('images/icons/color/layout.png'); ?> alt="" />
				<b>ดาวโหลดไฟล์</b>
		</span>
	</div>
	<div class="da-panel-content with-padding">
		<div class="da-gallery prettyPhoto">
			<ul>
				<?php 
					foreach($request->result() as $row1)
					{
				?>
					<div class="da-panel-body">
						<span  class="da-panel-title">
							<img src=<?php echo base_url("images/icons/color/application_put.png"); ?> alt="">
							<a href=""><?php echo $row1->fl_name; ?></a>
						</span>
					</div>
				<?php 
					}
				?>
			</ul>
		</div>
	</div>
</div> 
<div class="clear"></div><!-- new line -->

<!-- timeline -->
<div class="da-panel">
	<div class="da-panel-header">
			<span class="da-panel-title">
			<img src="images/icons/black/16/pencil.png" alt="">
				<b>ส่งข้อความ</b>
		</span>
	</div>
	<div class="da-panel-content">
		
		<?php 
			$data['class']="da-form";
			echo form_open('HDS/reply/insert_reply', $data); 
		?><!--  form action='' method='' class='' > -->
			<input type="hidden" value="<?php echo $rq_id; ?>" name= "rq_id" />
			<div class="da-form-row">
				<label>ข้อความ</label>
				<div class="da-form-item large">
					<span class="formNote">An another form note</span>
					<textarea rows="auto" cols="auto" name="rp_detail"></textarea>
				</div>
			</div>
			<div class="da-button-row">
				<input type="reset" value="Reset" class="da-button gray left">
				<input type="submit" value="ส่งข้อความ" class="da-button green">
			</div>
		<?php
			echo form_close();
		?>	
	</div>
</div>
