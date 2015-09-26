<style>
	.center{
		text-align: center;
	}
</style>
<div class="da-panel collapsible">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src=<?php echo base_url("images/icons/black/16/list.png"); ?> alt="">
				<b>ข้อมูลติดต่อผู้ใช้</b>
        </span>
        <span class="da-panel-toggler"></span>
    </div>
    <div class="da-panel-content">
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
                    <th class="center"><b>ลำดับ</b></th>
                    <th class="center"><b>ชื่อ-นามสกุล</b></th>
                    <th class="center"><b>เบอร์</b></th>
                    <th class="center"><b>อีเมล</b></th>
					<th class="center"><b>รายละเอียดขององค์กร</b></th>
                </tr>
            </thead>
            <tbody>
				<?php 
					$index=1;
					foreach($temp as $row) 
					{
				?> 
					<tr class="odd">
						<!-- loop name,tell,email -->
						<td class="center"><?php echo $index++; ?></td>
						<td><?php echo $row->UsName; ?></td>
						<td class="center"><?php echo $row->rq_tell;?></td>
						<td><?php echo $row->rq_email;?></td>
						<td class="center"><?php echo $row->dpName;?></td>
					</tr>
				<?php 
					} 
				?>
            </tbody>
        </table>
    </div> <!--  class="da-panel-content -->
</div> <!-- class="da-panel collapsible -->

