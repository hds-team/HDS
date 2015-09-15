<div class="da-panel-content" style="border: 0;">
    <table id="da-ex-datatable-numberpaging" class="da-table">
        <thead>
            <tr>
                <th><center> ลำดับ </center></th>
                <th><center> เรื่อง </center></th>
                <th><center> วันที่ </center></th>
                <th><center> ประเภท </center></th>
                <th><center> หมวด </center></th>
                <th><center> ผู้ส่ง </center></th>
                 <th><center> ดำเนินการ </center></th>
             </tr> 
        </thead> <!--Close header table-->
        <tbody>
		<?php $index = 1;?>
		<?php foreach($rq->result() as $row){?>
            <tr class="odd">
				<td><center> <?php echo $index++;?></center></td>
				<td><center> <?php echo $row->rq_subject; ?> </center></td>
				<td><center> <?php echo $this->date_time->DateThai($row->rq_date);?></center></td>
				<td><center> <?php echo $row->ct_name;?> </center></td>
				<td><center> <?php echo $row->kn_name;?> </center></td>
				<td><center> <?php echo $row->UsName;?> </center></td>
				<td class="da-icon-column">
					<?php
						if($row->rq_st_id == 2){
							echo "<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$sys_id)."><input type='button' value='รับทราบ' class='da-button blue'></a>";
						}else{
							echo "<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$sys_id)."><input type='button' value='ดำเนินการ' class='da-button green'></a>";
						}
					?>
				</td>
            </tr>
		<?php }?>
        </tbody> <!--Close body table-->
    </table> <!--Close table-->
</div> <!--Close div class="da-panel-content -->
