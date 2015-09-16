<div class = "da-panel-content" style = "border: 0;"> <!--Open Content All-->
    <table id = "da-ex-datatable-numberpaging" class = "da-table"> <!--Open table-->
        <thead> <!--Open header table-->
            <tr> <!--Open row-->
                <th><b><center> ลำดับ </center></b></th> 		<!--Head row-->
                <th><b><center> เรื่อง </center></b></th> 			<!--Head row-->
                <th><b><center> วันที่ </center></b></th> 			<!--Head row-->
                <th><b><center> ประเภท </center></b></th> 		<!--Head row-->
                <th><b><center> หมวด </center></b></th> 		<!--Head row-->
                <th><b><center> ผู้ส่ง </center></b></th> 			<!--Head row-->
                <th><b><center> ดำเนินการ </center></b></th> 		<!--Head row-->
             </tr> <!--Close row-->
        </thead> <!--Close header table-->
        <tbody> <!--Open body table-->
		<?php //Define $index, Open loop foreach
			$index = 1;
			foreach($rq->result() as $row)
			{
		?>
            <tr class = "odd"> <!--Open row-->
				<td><center><?php echo $index++;?></center></td> 									<!--Data in table-->
				<td><?php echo $row->rq_subject; ?></td> 											<!--Data in table-->
				<td><center><?php echo $this->date_time->DateThai($row->rq_date);?></center></td> 	<!--Data in table-->
				<td><center><?php echo $row->ct_name;?></center></td> 								<!--Data in table-->
				<td><center><?php echo $row->kn_name;?></center></td>								<!--Data in table-->
				<td><?php echo $row->UsName;?></td>													<!--Data in table-->
				<td class="da-icon-column"> 														<!--Data in table-->
					<?php //Loop if else about status of hd_request table.
						if($row->rq_st_id == 2)
						{
							echo "<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$sys_id.'/3')."><input type = 'button' value = 'รับทราบ' class = 'da-button blue'></a>";
						}else
						{
							echo "<a href = ".base_url('index.php/HDS/dev_work/update_pending/'.$row->rq_id.'/'.$sys_id.'/4')."><input type = 'button' value = 'ดำเนินงาน' class = 'da-button green'></a>";
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
