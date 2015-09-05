<div class="da-panel collapsible">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src="images/icons/black/16/list.png" alt="">
				ข้อมูลติดต่อผู้ใช้
        </span>
        <span class="da-panel-toggler"></span>
    </div>
    <div class="da-panel-content">
        <table class="da-table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เบอร์</th>
                    <th>Email</th>
                </tr>
            </thead>
			<?php $i='1';?>
            <tbody>
                <tr class="odd">
					<?php 
					foreach($temp as $row) { ?>  <!-- loop name,tell,email -->
						<td><?php echo $i++; ?></td>
						<td><?php echo $row->UsName; ?></td>
						<td><?php echo $row->rq_tell;?></td>
						<td><?php echo $row->rq_email;?></td>
					<?php } ?>
                </tr>
            </tbody>
        </table>
    </div> <!--  class="da-panel-content -->
</div> <!-- class="da-panel collapsible -->

