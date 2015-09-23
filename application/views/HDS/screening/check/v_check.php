<style>
	.center{
		text-align: center;
	}
</style>
<div class="da-panel-content" style = "border:0">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr>
				<th style="width:7%" class="center"><B>ลำดับ</B></th>
				<th><center><B>หัวเรื่อง</B></center></th>
				<th style="width:11%"><center><B>วันที่</B></center></th>
				<th style="width:10%"><center><B>ประเภท</B></center></th>
				<th><center><B>ผู้ส่ง</B></center></th>
		          <?php
		              if($sys_id == 99)
		              {
		          ?>
		          <th><center><b>ระบบ</b><center></th> 
		          <?php
		              }
	              ?>
				<th style="width:18%"><center><B>ดำเนินการ</B></center></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$index = 1;
			foreach($query as $key => $ch)
			{
		?>
			<tr>
				<td class="center"><?php echo $index++; ?></td>
				<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$ch['rq_id']); ?>" target="_blank"><?php echo $ch['rq_subject']; ?></a></td>
				<td><center><?php echo $this->date_time->DateThai($ch['rq_date']); ?></center></td>
				<td><?php echo $ch['ct_name']; ?></td>
				<td><?php echo $ch['UsName']; ?></td>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><?php echo $ch['StNameT']; ?><center></th> 
                <?php
                    }
                ?>
				<td>
					<div class="grid_2">
						<center><a href="<?php echo base_url('index.php/HDS/screening/update_check/'.$ch['rq_id'].'/6/'.$sys_id); ?>"><button style="width:100%" class="da-button green">อนุมัติ</button></a></center>
					</div>
					<div class="grid_2">
						<center><a href="<?php echo base_url('index.php/HDS/screening/update_check/'.$ch['rq_id'].'/7/'.$sys_id); ?>"><button style="width:100%" class="da-button red">ไม่อนุมัติ</button></a></center>
					</div>
				</td>
			</tr>  	
			<?php 
			} 
			?>
		</tbody>
	</table>
</div> <!-- da-panel-content -->

