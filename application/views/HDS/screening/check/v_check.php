 <script>
 $(document).ready(function(){
    
    $('.btn_1').click(function(){
        //--- Controller url
		var rq_id = $(this).attr('rq_id');
		var st_id = 6;
		var sys_id = $(this).attr('sys_id');
		console.log(rq_id);
		console.log(st_id);
		console.log(sys_id);
        var url = "<?php echo base_url('index.php/HDS/screening/update_check'); ?>"+"/"+rq_id+"/"+sys_id;
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
<div class="da-panel-content" style = "border:0">
	<table id="da-ex-datatable-numberpaging" class="da-table">
		<thead>
			<tr>
				<th style="width:7%" class="center"><B>ลำดับ</B></th>
				<th><center><B>หัวเรื่อง</B></center></th>
				<th style="width:11%"><center><B>วันที่</B></center></th>
				<th style="width:10%"><center><B>ประเภท</B></center></th>
				<th><center><B>ผู้ส่ง</B></center></th>
		          <?php
		              if($sys_id == 99)
		              {
		          ?>
		          <th><center><b>ระบบ</b><center></th> 
		          <?php
		              }
	              ?>
				<th style="width:18%"><center><B>ดำเนินการ</B></center></th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$index = 1;
			foreach($query as $key => $ch)
			{
		?>
			<tr>
				<td class="center"><?php echo $index++; ?></td>
				<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$ch['rq_id']); ?>"><?php echo $ch['rq_subject']; ?></a></td>
				<td><center><?php echo $this->date_time->DateThai($ch['rq_date']); ?></center></td>
				<td><?php echo $ch['ct_name']; ?></td>
				<td><?php echo $ch['UsName']; ?></td>
                <?php
                    if($sys_id == 99)
                    {
                ?>
                <th><center><?php echo $ch['StNameT']; ?><center></th> 
                <?php
                    }
                ?>
				<td>
					<div class="grid_4">
						<center>
							<?php echo "<button style='width:70%' class='da-button blue btn_1' rq_id='".$ch['rq_id']."' sys_id='".$sys_id."'>ยืนยัน</button>"; ?></center>
						</center>
					</div>
				</td>
			</tr>  	
			<?php 	
			} 
			?>
		</tbody>
	</table>
</div> <!-- da-panel-content -->

