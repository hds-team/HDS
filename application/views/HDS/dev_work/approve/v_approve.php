<div class="da-panel-content" style="border: 0;">
    <table id = "da-ex-datatable-numberpaging" class = "da-table">
        <thead>
			<tr role="row"> <!-- row -->
				<th>ลำดับ</th>
				<th>หัวเรื่อง</th>
				<th>วันที่</th>
				<th>ประเภท</th>
				<th>หมวด</th>
				<th>ผู้ส่ง</th>
				<th>ดำเนินการ</th>
			</tr>
        </thead>
        <tbody>
		<?php $index = 0;
            foreach($approve->result() as $row)
            {
        ?>
			<tr role="row"> <!-- row -->
				<td><center><?php echo $index+1; ?></center></td>
				<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a></td>
				<td><?php echo $row->rq_date;?></td>
				<td><?php echo $row->ct_name; ?></td>
				<td><?php echo $row->kn_name; ?></td>
				<td><?php echo $row->UsName; ?></td>
				<td>
					<a href = "<?php echo base_url('index.php/HDS/dev_work/update_approve/'.$row->rq_id.'/'.$row->st_id).'/'.$sys_id; ?>" />
						<input type="submit" value="รับทราบ" class="da-button green"> 
					</a>
				</td>
			</tr>
			<?php 
				$index++;
			} 
			?>
        </tbody>
    </table>
</div><!-- content-->

    
    
