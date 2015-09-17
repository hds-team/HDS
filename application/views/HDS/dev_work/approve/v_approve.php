<div class="da-panel-content" style="border: 0;">
    <table id = "da-ex-datatable-numberpaging" class = "da-table">
        <thead>
			<tr role="row"> <!-- row -->
				<th><center><B>ลำดับ</B></center></th>
				<th><center><B>หัวเรื่อง</B></center></th>
				<th><center><B>วันที่</B></center></th>
				<th><center><B>ประเภท</B></center></th>
				<th><center><B>หมวด</B></center></th>
				<th><center><B>ผู้ส่ง</B></center></th>
				<th><center><B>ดำเนินการ</B></center></th>
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
				<td><center>
					<?php 
						if($row->rq_st_id == 6){
							$row->st_id = 8;
					?>
					<a href = "<?php echo base_url('index.php/HDS/dev_work/update_approve/'.$row->rq_id.'/'.$row->st_id).'/'.$sys_id; ?>" />
						<input type="submit" value="รับทราบ" class="da-button green"> 
					</a>
					<?php 
						}
						else{
							$row->st_id = 3;
					?>
					<a href = "<?php echo base_url('index.php/HDS/dev_work/update_approve/'.$row->rq_id.'/'.$row->st_id).'/'.$sys_id; ?>" />
						<input type="submit" value="แก้ไข" class="da-button blue">
					</a>
					<?php
						}
					?>
					</center>
				</td>
			</tr>
			<?php 
				$index++;
			} 
			?>
        </tbody>
    </table>
</div><!-- content-->

    
    
