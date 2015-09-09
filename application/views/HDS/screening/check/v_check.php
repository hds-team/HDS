
<div class="da-panel-content" style = "border:0">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr>
				<th><center><B>ลำดับ</B></center></th>
				<th><center><B>หัวเรื่อง</B></center></th>
				<th><center><B>วันที่</B></center></th>
				<th><center><B>ประเภท</B></center></th>
				<th><center><B>ผู้ส่ง</B></center></th>
				<th><center><B>ดำเนินการ</B></center></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$index = 1;
			foreach($query as $key => $ch)
			{
		?>
			<tr>
				<td><center><?php echo $index++; ?></center></td>
				<td><?php echo $ch['rq_subject']; ?></td>
				<td><center><?php echo $ch['rq_date']; ?></center></td>
				<td><?php echo $ch['ct_name']; ?></td>
				<td><?php echo $ch['UsName']; ?></td>
				<td>	
					<center><div class="grid_2"><a href="<?php echo base_url('index.php/HDS/screening/update_check/'.$ch['rq_id'].'/6'); ?>"><button class="da-button green" >อนุมัติ</button></a></div></center>
					<center><div class="grid_2"><a href="<?php echo base_url('index.php/HDS/screening/update_check/'.$ch['rq_id'].'/7'); ?>"><button class="da-button red">ไม่อนุมัติ</button></a></div></center>
				</td>
			</tr>  	
			<?php } ?>
		</tbody>
	</table>
</div> <!-- da-panel-content -->

