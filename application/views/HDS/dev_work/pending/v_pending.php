<style>
	.center{
		text-align: center;
	}
</style> 
<div class = "da-panel-content" style = "border: 0;"> <!--Open Content All-->
    <table id = "da-ex-datatable-numberpaging" class = "da-table"> <!--Open table-->
        <thead> <!--Open header table-->
            <tr> <!--Open row-->
                <th style="width:7%"><center><b> ลำดับ </b></center></th> 		    <!--Head row-->
                <th><center><b> เรื่อง </b></center></th> 			<!--Head row-->
                <th style="width:11%"><center><b> วันที่ </b></center></th> 			<!--Head row-->
                <th style="width:10%"><center><b> ประเภท </b></center></th> 		<!--Head row-->
                <th><center><b> หมวด</b></center></th> 		    <!--Head row-->
                <th><center><b> ผู้ส่ง </b></center></th> 			<!--Head row-->
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><b>ระบบ</b><center></th> 
                <?php
                    }
                ?>
                <th style="width: 11%"><center><b> ดำเนินการ </b></center></th> 		<!--Head row-->
             </tr> <!--Close row-->
        </thead> <!--Close header table-->
        <tbody> <!--Open body table-->
		<?php //Define $index, Open loop foreach
			$index = 1;
			foreach($rq->result() as $row)
			{
		?>
            <tr class = "odd"> <!--Open row-->
				<td class="center"><?php echo $index++;?></td> 									<!--Data in table-->
				<td>
					<a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>" target="_blank"><?php echo $row->rq_subject; ?></a> 
				</td> 						<!--Data in table-->
				<td><center> <?php echo $this->date_time->DateThai($row->rq_date);?></center></td> 	<!--Data in table-->
				<td><center> <?php echo $row->ct_name;?> </center></td> 							<!--Data in table-->
				<td><center> <?php echo $row->kn_name;?> </center></td>								<!--Data in table-->
				<td><center> <?php echo $row->UsName;?> </center></td>								<!--Data in table-->
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <td><center><?php echo $row->StNameT; ?><center></td> 
                <?php
                    }
                ?>
				<td class="da-icon-column"> 														<!--Data in table-->
					<?php //Loop if else about status of hd_request table.
						if($row->rq_st_id == 2)
						{
							echo "<a href = ".base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id)."><img src='".base_url('images/icons/color/magnifier.png')."'</a>";
						
						}else
						{
							echo "<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$sys_id.'/4')."><button style='width:100%' class='da-button green'>ดำเนินงาน</button></a>";
						}
					?>
				</td>
            </tr> <!--Close row-->
		<?php //Close loop foreach
			}
		?>
        </tbody> <!--Close body table-->
    </table> <!--Close table-->
</div> <!--Close div class="da-panel-content -->
