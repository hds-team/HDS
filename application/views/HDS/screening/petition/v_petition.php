    <div class="da-panel-content" style="border: 0;" >
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
					<th style="width: 80px"><center><b>ลำดับ</b><center></th> 
                    <th style="width: 200px"><center><b>หัวเรื่อง</b><center></th> 
					<th style="width: 200px"><center><b>วันที่</b><center></th> 
					<th style="width: 200px"><center><b>ประเภท</b><center></th> 
					<th style="width: 300px"><center><b>ผู้ส่ง</b><center></th> 
                    <th style="width: 250px"><center><b>ดำเนินการ</b><center></th> 
                </tr> 
            </thead>
            <tbody>
				<?php
					$index=1;
					foreach($query->result() as $row)
					{
				?>
                <tr class="odd">
                	<td><center> <?php echo $index++; ?> </center></td>
					<td><a href="<?php echo base_url('index.php/HDS/reply/detai1l_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a></td>
                    <td><center><?php echo $row->rq_date; ?></center></td>
                    <td><center><?php echo $row->ct_name; ?></center></td>
                    <td><center><?php echo $row->UsName; ?></center></td>
                    <td class="da-icon-column">
						<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_accect/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
							<input type="submit" class="da-button blue" value="ตรวจรับ" />
						</a>
						<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_complete/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
							<input type="submit" class="da-button blue" value="เสร็จสิ้น" />
						</a>
                    </td>
                </tr>
				<?php 
					} 
				?>
            </tbody>
        </table> <!--class="da-table"-->
    </div> <!--class="da-panel-content"-->