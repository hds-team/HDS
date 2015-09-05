    <div class="da-panel-content" style="border: 0;" >
        <table class="da-table">
            <thead>
                <tr>
					<th style="width: 80px"><center><b>ลำดับ</b><center></th> 
                    <th style="width: 200px"><center><b>หัวเรื่อง</b><center></th> 
					<th style="width: 200px"><center><b>วันที่</b><center></th> 
					<th style="width: 200px"><center><b>ประเภท</b><center></th> 
					<th style="width: 200px"><center><b>ผู้ส่ง</b><center></th> 
                    <th style="width: 250px"><center><b>ดำเนินการ</b><center></th> 
                </tr> 
            </thead>
            <tbody>
				<?php
					$index='1';
					foreach($query->result() as $row){
				?>
                <tr class="odd">
                	<td><center> <?php echo $index++; ?> </center></td>
                    <td><?php echo $row->rq_subject; ?></td>
                    <td><center><?php echo $row->rq_date; ?></center></td>
                    <td><center><?php echo $row->rq_ct_id; ?></center></td>
                    <td><center><?php echo $row->rq_mb_id; ?></center></td>
                    <td class="da-icon-column">
						<input type="submit" value="ตรวจรับ" class="da-button blue">
						<input type="submit" value="เสร็จสิ้น" class="da-button blue">
                    </td>
                </tr>
					<?php } ?>
            </tbody>
        </table> <!--class="da-table"-->
    </div> <!--class="da-panel-content"-->
