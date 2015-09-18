    <div class="da-panel-content" style="border: 0;" >
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
					<th style="width: 5%"><center><b>ลำดับ</b><center></th> 
                    <th><center><b>หัวเรื่อง</b><center></th> 
					<th style="width: 13%"><center><b>วันที่</b><center></th> 
					<th style="width: 13%"><center><b>ประเภท</b><center></th> 
					<th><center><b>ผู้ส่ง</b><center></th> 
                    <?php
                        if($sys_id == 99)
                        {
                    ?>
                    <th><center><b>ระบบ</b><center></th> 
                    <?php
                        }
                    ?>
                    <th style="width: 20%"><center><b>ดำเนินการ</b><center></th> 
                </tr> 
            </thead>
            <tbody>
				<?php
					$index=1;
					foreach($query->result() as $row)
					{
				?>
                <tr class="odd">
                	<td><center> <?php echo $index++; ?> </center></td> <!-- respectively -->
					<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a></td> <!-- subject // can click to increase detail -->
                    <td><center><?php echo $this->date_time->DateThai($row->rq_date);?></center></td> <!-- date -->
                    <td><center><?php echo $row->ct_name; ?></center></td> <!-- category name -->
                    <td><?php echo $row->UsName; ?></td> <!-- User name // import from UMS Table -->
                    <?php
                        if($sys_id == 99)
                        {
                    ?>
                    <td><center><?php echo $row->StNameT; ?><center></td> 
                    <?php
                        }
                    ?>
                    <td class="da-icon-column"> <!-- working on button -->
						<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_accect/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
							<input type="submit" class="da-button blue" value="ตรวจรับ" />
						</a><!-- checking accept -->
						<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_complete/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
							<input type="submit" class="da-button blue" value="เสร็จสิ้น" />
						</a><!-- Complete button -->
                    </td>
                </tr> <!-- class="odd" -->
				<?php 
					} 
				?>
            </tbody>
        </table> <!--class="da-table"-->
    </div> <!--class="da-panel-content"-->