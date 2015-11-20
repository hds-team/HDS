<style>
	.center{
		text-align: center;
	}
</style>  
<div class="da-panel-content" style="border: 0;">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr role="row"> <!-- row -->
				<th style="width:7%"><center><b>ลำดับ</b></center></th>
				<th><center><b>หัวเรื่อง</b></center></th>
				<th style="width:11%"><center><b>วันที่</b></center></th>
				<th style="width:10%"><center><b>ประเภท</b></center></th>
				<th><center><b>หมวด</b></center></th>
				<th><center><b>ผู้ส่ง</b></center></th>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><b>ระบบ</b><center></th> 
                <?php
                    }
                ?>
				<th style="width: 11%"><center><b>ดำเนินการ</b></center></th>
			</tr>
		</thead> <!-- thead -->
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php 
			$index=0;
			foreach($query->result() as $row) //foreach data in view
			{
		?>
				<tr class="odd">
					<td class="center"><?php echo $index+1; ?></td>
					<td>
						<a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a>
					</td>
					<td class="center"><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
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
						<?php 
							if($row->rq_st_id == 4)
							{
						?>
						<center>
							<a href = "<?php echo base_url('index.php/HDS/dev_work/update_ongoing/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" /> 
								<button style="width:100%" class="da-button green">ส่งตรวจ</button><!-- button submit -->
							</a>
						</center>
						<?php
							}
							else
							{
						?>
							<center>
							<a href = "#" /> 
								<button style="width:100%" class="da-button gray">ส่งตรวจ</button><!-- button submit -->
							</a>
						</center>
						<?php
						}
						?>
					</td>
				</tr>
		<?php 
				$index++; //run index
			}
		?>
		</tbody> <!-- tbody -->
	</table> <!-- table -->
</div><!-- da-panel-content -->
