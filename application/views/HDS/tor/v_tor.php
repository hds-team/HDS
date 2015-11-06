<style>
	.center{
		text-align: center;
	}
</style>
<div class="da-panel">
    <div class="da-panel-header">
    <span class="da-panel-title">
          <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
          จัดการ TOR
      </span>
    </div><!-- da-panel-header -->
    <div class="da-panel-content">
        <form class="da-form">
            <div class="da-form-row">
				<div class="grid_3">
					<div class="da-panel">
					</div>
				</div>
                <div class="grid_1">
                    
                    <div class="da-form-item large">
                        <a href="http://localhost/hds/index.php/HDS/tor/ins_tor"><input type="button" class="da-button blue gray" value="เพิ่มโครงการ"  style='height:6%'></a>
                    </div>
                </div>
            </div>	
		</form>
    </div>
	<div class="da-panel-content">
		<table id="da-ex-datatable-numberpaging" class="da-table">
			<thead>
				<tr>
					<th style="width:10%" class="center"><B>ลำดับ</B></th>
					<th style="width:30%"><center><B>ชื่อโครงการ</B></center></th>
					<th style="width:20%"><center><B>ปีงบประมาณ</B></center></th>
					<th style="width:15%"><center><B>สถานะ</B></center></th>
					<th style="width:25%"><center><B>ดำเนินการ</B></center></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$index = 1;	
					foreach($query as $key => $value)
					{ 
					?>
				<tr>
					<td class="center"><?php echo $index++; ?></td>
					<td><?php echo $value['tp_name'] ?></td>
					<td><center><?php echo $value['tp_year'] ?></center></td>
					<td>
					<center><input type="button" class="da-button green large" value="เปิด" style='width:70%'>
					</center></td>
					<td><center>
						<div class="grid_2">
							 <input type="button" class="da-button red large" value="ลบ" style='width:70%'>
						</div>
						<div class="grid_2">
							 <a href="<?php echo base_url('index.php/HDS/tor/edit_tor/'.$value['tp_id']); ?>" target="_blank"><input type="button" class="da-button blue large" value="แก้ไข" style='width:70%'></a>
						</div>
					</center></td>
				</tr>  	
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
