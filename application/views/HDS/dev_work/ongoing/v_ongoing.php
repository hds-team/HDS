<div class="da-panel-content" style="border: 0;">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr role="row"> <!-- row -->
				<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="da-ex-datatable-numberpaging" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width:5%;"><center><b>ลำดับ</b></center></th>
				<th class="sorting"><center><b>หัวเรื่อง</b></center></th>
				<th class="sorting"><center><b>วันที่</b></center></th>
				<th class="sorting"><center><b>ประเภท</b></center></th>
				<th class="sorting"><center><b>หมวด</b></center></th>
				<th class="sorting"><center><b>ผู้ส่ง</b></center></th>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><b>ระบบ</b><center></th> 
                <?php
                    }
                ?>
				<th class="sorting"><center><b>ดำเนินการ</b></center></th>
			</tr>
		</thead> <!-- thead -->
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
			$index=0;
			foreach($query->result() as $row) //foreach data in view
			{
		?>
				<tr class="odd">
					<td>
						<center>
							<?php echo $index+1; ?>
						</center>
					</td>
					<td>
						<a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a>
					</td>
					<td><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
					<td><?php echo $row->ct_name; ?></td>
					<td><?php echo $row->kn_name; ?></td>
					<td><?php echo $row->UsName; ?></td>
                    <?php
                        if($sys_id == 99)
                        {
                    ?>
                    <td><center><?php echo $row->StNameT; ?><center></td> 
                    <?php
                        }
                    ?>
					<td>
						<center>
							<a href = "<?php echo base_url('index.php/HDS/dev_work/update_ongoing/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
								<input type="button" class="da-button blue" value="ส่งตรวจ" /> <!-- button submit -->
							</a>
						</center>
					</td>
				</tr>
		<?php 
				$index++; //run index
			}
		?>
		</tbody> <!-- tbody -->
	</table> <!-- table -->
</div><!-- da-panel-content -->
