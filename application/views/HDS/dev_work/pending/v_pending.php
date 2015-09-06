<div class="da-panel-content" style="border: 0;">
    <table class="da-table">
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
				<td><center> <?php echo $row->rq_date; ?> </center></td>
				<td><center> <?php echo $row->ct_name;?> </center></td>
				<td><center> <?php echo $row->kn_name;?> </center></td>
				<td><center> <?php echo $row->UsName;?> </center></td>
				<td class="da-icon-column">
					<a href = "<?php echo base_url('index.php/HDS/dev_work/pending_update/'.$row->rq_id);?>"><input type="button" value="ดำเนินการ" class="da-button red"></a>
				</td>
            </tr>
		<?php }?>
        </tbody> <!--Close body table-->
    </table> <!--Close table-->
</div> <!--Close div class="da-panel-content -->
