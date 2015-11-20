 <style>
	.center{
		text-align: center;
	}
</style>  

<div class="da-panel-content" style="border: 0;">
    <table id = "da-ex-datatable-numberpaging" class = "da-table">
        <thead>
			<tr role="row"> <!-- row -->
				<th style="width:7%"><center><B>ลำดับ</B></center></th>
				<th><center><B>หัวเรื่อง</B></center></th>
				<th style="width:11%"><center><B>วันที่</B></center></th>
				<th style="width:10%"><center><B>ประเภท</B></center></th>
				<th><center><B>หมวด</B></center></th>
				<th><center><B>ผู้ส่ง</B></center></th>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><b>ระบบ</b><center></th> 
                <?php
                    }
                ?>
				<th style="width: 11%"><center><B>ดำเนินการ</B></center></th>
			</tr>
        </thead>
        <tbody>
		<?php $index = 0;
            foreach($approve->result() as $row) //Get value from database (hds) to show interface.
            {
        ?>
			<tr role="row"> <!-- row -->
				<td class="center"><?php echo $index+1; ?></td>
				<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id); ?>"><?php echo $row->rq_subject; ?></a></td>
				<td><?php echo $this->date_time->DateThai($row->rq_date);?></td>
				<td><?php echo $row->ct_name; ?></td>
				<td><?php echo $row->kn_name; ?></td>
				<td><?php echo $row->UsName; ?></td>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <td><center><?php echo $row->StNameT; ?><center></td> 
                <?php
                    }
                ?>
				<td>
					<center>
					<?php 
						if($row->rq_st_id == 6){
<<<<<<< HEAD
							$st_id = $row->st_id = 8;
						echo "<button rq_id = '".$row->rq_id."' style='width:100%' class='da-button green btn_1'>รับทราบ</button>";
					?></center>
=======
							$row->st_id = 8;
					?><!-- Loop of status of report. 6 is approve and 8 is not approve.-->
					<a href = "<?php echo base_url('index.php/HDS/dev_work/update_approve/'.$row->rq_id.'/'.$row->st_id).'/'.$sys_id; ?>" />
						<!-- Sending value's status (st_id) to controller's update_approve.php -->
						<button style="width:100%" class="da-button blue">รับทราบ</button>
					</a>
					</center>
>>>>>>> origin/master
					<?php
						}
					?>
				</td>
			</tr>
			<?php 
				$index++;
			} 
			?>
        </tbody>
    </table>
</div><!-- content-->
<script>
$(document).ready(function(){
    $('.btn_1').click(function(){
        var st_id = "<?php echo $st_id; ?>";
        var rq_id = $(this).attr("rq_id");
        var sys_id = "<?php echo $sys_id; ?>";
        //console.log(rq_id);
        //--- Controller url
var url = "<?php echo base_url();?>" + "index.php/HDS/dev_work/update_approve/" + rq_id + "/" + st_id + "/" + sys_id;
        
        //--- Remove row
        $(this).closest('tr').remove();
        
        //--- Send value to controller
 		$.post(url, function(data){
        });
    });
});
</script>
