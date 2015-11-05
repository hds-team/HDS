<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url('images/icons/color/blog.png'); ?>" alt="">
				<b>รายละเอียกคำร้อง </b>
		</span>
		<span class="da-panel-toggler"></span>
</div>
<?php
	if($user_edite == false)
	{
?>
<div class="da-panel-toolbar top">
    <ul>
        <li><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$rq_id.'/'. 1); ?>"><img src="<?php echo base_url(); ?>images/icons/color/pencil.png" alt="">แก้ไข</a></li>
    </ul>
</div>
<?php
	}
?>
<div class="da-panel-content">
<?php
	$data['class'] ="da-form";
	echo form_open_multipart('HDS/reply/update_reply', $data);
?>
	<table class="da-table da-detail-view">
		<thead>
			<th>ลำดับ</th>
			<th>ประเภท</th>
			<th>รายละเอียด</th>
			<th>ดำเนินการ</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<div class="da-form-inline">
						<div class="da-form-item large">
							<input type="text" value="<?php echo $row->rq_subject; ?>" name="rq_subject">
						</div>
					</div>
				</td>
				<td>
					<div class="da-form-inline">
						<div class="da-form-item large">
							<input type="text" value="<?php echo $row->rq_subject; ?>" name="rq_subject">
						</div>
					</div>
				</td>
				<td>
					<div class="da-form-inline">
						<div class="da-form-item large">
							<input type="text" value="<?php echo $row->rq_subject; ?>" name="rq_subject">
						</div>
					</div>
				</td>
				<td>
					<div class="da-form-inline">
						<div class="da-form-item large">
							<input type="text" value="<?php echo $row->rq_subject; ?>" name="rq_subject">
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo form_close(); ?>
</div>