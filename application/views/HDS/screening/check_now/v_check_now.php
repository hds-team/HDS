
<div class="da-panel-content" style = "border:0">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr>
			  <th><center>ลำดับ</center></th>
			  <th><center>หัวเรื่อง</center></th>
			  <th><center>วันที่</center></th>
			  <th><center>ประเภท</center></th>
			  <th><center>ผู่ส่ง</center></th>
	          <?php
	              if($sys_id == 99)
	              {
	          ?>
	          <th><center><b>ระบบ</b><center></th> 
	          <?php
	              }
              ?>
			  <th><center>สถานะ</center></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$index=0;
			foreach ($query->result() as $row)
			{ 
			$index++;
		?>
		<tr class="odd">
			<td><center><?php echo $index; ?><center></td>
			<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a></td>
			<td><center><?php echo $this->date_time->DateThai($row->rq_date); ?></center></td>
			<td><center><?php echo $row->ct_name; ?></center></td>
			<td><?php echo $row->UsName; ?></td>
            <?php
                if($sys_id == 99)
                {
            ?>
            <th><center><?php echo $row->StNameT; ?><center></th> 
            <?php
                }
            ?>
			<td><center><?php echo $row->st_name; ?></center></td>
		</tr>
		<?php
			} // foreach query as row
		?>
		</tbody>
  </table>
</div> <!-- da-panel-content -->


