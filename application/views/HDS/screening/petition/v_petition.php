 <script>
 $(document).ready(function(){
    
    $('.btn_1').click(function(){
        //--- Controller url
		var rq_id = $(this).attr('rq_id');
		var st_id = $(this).attr('st_id');
		var sys_id = $(this).attr('sys_id');
		console.log(rq_id);
		console.log(sys_id);
        var url = "<?php echo base_url('index.php/HDS/screening/update_petition_accect'); ?>"+"/"+rq_id+"/"+sys_id;
        console.log(url);
		//--- Remove row
        $(this).closest('tr').remove();
        
        //--- Send value to controller
 		$.get(url, function(data){
            //alert($(this).c.losest('tr'));
        	//$(this).closest('tr').hide();
           //$(this).hide();
        });
    });
	$('.btn_2').click(function(){
        //--- Controller url
		var rq_id = $(this).attr('rq_id');
		var st_id = $(this).attr('st_id');
		var sys_id = $(this).attr('sys_id');
		console.log(rq_id);
		console.log(sys_id);
        var url = "<?php echo base_url('index.php/HDS/screening/update_petition_complete'); ?>"+"/"+rq_id+"/"+sys_id;
        console.log(url);
		//--- Remove row
        $(this).closest('tr').remove();
        
        //--- Send value to controller
 		$.get(url, function(data){
            //alert($(this).c.losest('tr'));
        	//$(this).closest('tr').hide();
           //$(this).hide();
        });
    });
});
 </script>
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
							<?php echo "<button style='width:100%' class='da-button blue btn_1' rq_id='".$row->rq_id."' st_id='".$row->st_id."' sys_id='".$sys_id."'>ตรวจรับ</button>"; ?>
						</div>
						<div class="grid_2">
							<?php echo "<button style='width:100%' class='da-button green btn_2' rq_id='".$row->rq_id."' st_id='".$row->st_id."' sys_id='".$sys_id."'>ตรวจรับ</button>"; ?>
						</div>
                    </td>
                </tr> <!-- class="odd" -->
				<?php 
					} 
				?>
            </tbody>
        </table> <!--class="da-table"-->
    </div> <!--class="da-panel-content"-->