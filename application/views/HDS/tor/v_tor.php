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
                        <a href="<?php echo base_url('index.php/HDS/tor/ins_tor/'); ?>"><input type="button" class="da-button blue gray" value="เพิ่มโครงการ"  style='height:6%'></a>
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
						<?php if($value['tp_status'] == 1)
						{
						?>
							<center><a href ="<?php echo base_url('index.php/HDS/tor/update_open/0/'.$value['tp_id']); ?>"><input type='submit' value='เปิด' class='da-button green' style='width:70%' /></a>
							</center>
						<?php 
						}
						else
						{
						?>
							<center><a href ="<?php echo base_url('index.php/HDS/tor/update_open/1/'.$value['tp_id']); ?>"><input type='submit' value='ปิด' class='da-button red' style='width:70%' /></a>
							</center>
						<?php 
						}
						?>
					</td>
					<td>
						<center>
							<?php 
							if($value['rq_id'] == NULL)
							{ ?>
							<div class="grid_2">
								<a href="<?php echo base_url('index.php/HDS/tor/delete_tor/'.$value['tp_id']); ?>"><input type="button" class="da-button red large" value="ลบ" style='width:70%'></a>
							</div>
							<?php 
							} 
							else
							{ ?>
							<div class="grid_2">
								<a href=""><input type="button" class="da-button gray large" value="ลบ" style='width:70%'></a>
							</div>
							<?php
							}
							?>
							
							<div class="grid_2">
								<a href="<?php echo base_url('index.php/HDS/tor/show_edit_tor/'.$value['tp_id']); ?>"><input type="button" class="da-button blue large" value="แก้ไข" style='width:70%'></a>
							</div>
						</center>
					</td>
				</tr>  	
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
