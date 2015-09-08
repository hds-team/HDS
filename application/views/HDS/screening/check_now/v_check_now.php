
<div class="da-panel-content" style = "border:0">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr>
			  <th><center>ลำดับ</center></th>
			  <th><center>หัวเรื่อง</center></th>
			  <th><center>วันที่</center></th>
			  <th><center>ประเภท</center></th>
			  <th><center>ผู่ส่ง</center></th>
			  <th><center>สถานะ</center></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$index=0;
			foreach ($query->result() as $row){ 
			$index++;
		?>
		<tr class="odd">
			<td><?php echo $index; ?></td>
			<td><?php echo $row->rq_subject; ?></td>
			<td><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
			<td><?php echo $row->ct_name; ?></td>
			<td><?php echo $row->UsName; ?></td>
			<td><?php echo $row->st_name; ?></td>
		</tr>
		<?php
		} // foreach query as row
		?>
		</tbody>
  </table>
</div> <!-- da-panel-content -->


