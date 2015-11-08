 <style>
	.center{
		text-align: center;
	}
</style>  

	<div class="da-panel-content" style="border: 0;" >
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
					<th style="width: 7%"><center><b>ลำดับ</b><center></th> 
                    <th><center><b>หัวเรื่อง</b><center></th> 
					<th style="width: 11%"><center><b>วันที่</b><center></th> 
					<th style="width: 10%"><center><b>ประเภท</b><center></th> 
					<th><center><b>ผู้ส่ง</b><center></th> 
                    <?php
                        if($sys_id == 99)
                        {
                    ?>
                    <th><center><b>ระบบ</b><center></th> 
                    <?php
                        }
                    ?>
                    <th style="width: 18%"><center><b>ดำเนินการ</b><center></th> 
                </tr> 
            </thead>
            <tbody>
				<?php
					$index=1;
					foreach($query->result() as $row)
					{
				?>
                <tr class="odd">
                	<td class="center"><?php echo $index++; ?></td> <!-- respectively -->
					<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>"><?php echo $row->rq_subject; ?></a></td> <!-- subject // can click to increase detail -->
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
						<div class="grid_2">
							<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_accect/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
								<button style="width:100%" class="da-button blue">ตรวจรับ</button>
							</a><!-- checking accept -->
						</div>
						<div class="grid_2">
							<a href = "<?php echo base_url('index.php/HDS/screening/update_petition_complete/'.$row->rq_id.'/'.$row->st_id.'/'.$sys_id); ?>" />
								<button style="width:100%" class="da-button blue">เสร็จสิ้น</button>
							</a><!-- Complete button -->
						</div>
                    </td>
                </tr> <!-- class="odd" -->
				<?php 
					} 
				?>
            </tbody>
        </table> <!--class="da-table"-->
    </div> <!--class="da-panel-content"-->