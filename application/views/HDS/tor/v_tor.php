<style>
	.center{
		text-align: center;
	}
</style>
<div class="grid_3">
	<div class="da-panel">
</div>
</div>
   <div class="grid_1">
       <a href="<?php echo base_url('index.php/HDS/tor/ins_tor/'); ?>"><button class="da-ex-buttons" role="button" aria-disabled="false" style="float:right;"><span class="ui-button-text">เพิ่มโครงการ</span></button></a>
   </div>
<div class="clear"></div>
<div class="da-panel">
    <div class="da-panel-header">
    <span class="da-panel-title">
          <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
          จัดการ TOR
      </span>
    </div><!-- da-panel-header -->
	<div class="da-panel-content">
		<table class="da-table">
			<thead>
				<tr>
					<th style="width:10%" class="center"><B>ลำดับ</B></th>
					<th style="width:20%"><center><B>ระยะเวลาสัญญา</B></center></th>
					<th style="width:30%"><center><B>ชื่อโครงการ</B></center></th>
					<th style="width:15%"><center><B>สถานะการใช้งาน</B></center></th>
					<th style="width:25%"><center><B>ดำเนินการ</B></center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach($year as $key => $ye)
				{ 
				?>
					<tr>
						<td colspan="5">
								<?php echo "<B>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ปีงบประมาณ "; echo $ye['tp_year']+543; echo "</B>"; ?>
						</td>
					</tr>
				<?php
					foreach($query as $key => $value)
					{ ?>
						<?php
						if($value['tp_year'] == $ye['tp_year'])
						{
							$index = 1;	
						?>
							<tr>
					
								<td class="center"><?php echo $index++; ?></td>
								<td><center><?php echo $this->date_time->DateThai($value['tp_date_start'])." - ".$this->date_time->DateThai($value['tp_date_stop']); ?></center></td>
								<td><?php echo $value['tp_name'] ?></td>
								<td>
									<?php if($value['tp_status'] == 1)
									{
									?>
										<center><a href ="<?php echo base_url('index.php/HDS/tor/update_open/0/'.$value['tp_id']); ?>"><img src="<?php echo base_url(); ?>images/icons/color/on.png" alt=""></a>
										</center>
									<?php 
									}
									else
									{
									?>
										<center><a href ="<?php echo base_url('index.php/HDS/tor/update_open/1/'.$value['tp_id']); ?>"><img src="<?php echo base_url(); ?>images/icons/color/off.png" alt=""></a>
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
                                            <a href="<?php echo base_url('index.php/HDS/tor/delete_tor/'.$value['tp_id']); ?>"><img src="<?php echo base_url(); ?>images/icons/color/cross.png" alt=""></a>
										</div>
										<?php 
										} 
										else
										{ ?>
										<div class="grid_2">
											<a href=""><img src="<?php echo base_url(); ?>images/icons/black/16/cross_small.png" alt=""></a>
										</div>
										<?php
										}
										?>
										
										<div class="grid_2">
											<a href="<?php echo base_url('index.php/HDS/tor/show_edit_tor/'.$value['tp_id']); ?>"><img src="<?php echo base_url(); ?>images/icons/color/pencil.png" alt=""></a>
										</div>
									</center>
								</td>
							</tr>  	
			<?php 
						}
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>