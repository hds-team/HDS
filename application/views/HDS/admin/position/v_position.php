<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url('images/icons/black/16/list.png'); ?>" alt="">
				กำหนดสิทธิผู้ใช้ระบบ
		</span>
	</div><!-- da-panel-header -->
	<div class="da-panel-content">
		<form class="da-form">
			<table class="da-table">
				<thead>
					<tr>
						<th><center>ลำดับ</center></th>
						<th><center>รายชื่อ</center></th>
						<th><center>เจ้าหน้าที่</center></th>
						<th><center>นักพัฒนาระบบ</center></th>
						<th><center>ผู้ดูแลระบบ</center></th>
					</tr>
				</thead>
			<?php $i='1';?>
				<tbody>
				<?php
					foreach($query ->result() as $row){ ?>
					<tr class="odd">
						<td><center><?php echo $i++; ?></center></td>
						<td><center><?php echo $row->UsName; ?></center></td>
						<td><center><input type="radio" name="ps_ut_id[<?php echo $row -> UsID ?>]" <?php if($row->ps_ut_id == 3) echo "checked";  ?>></li></center></th></td>
						<td><center><input type="radio" name="ps_ut_id[<?php echo $row -> UsID ?>]" <?php if($row->ps_ut_id == 1) echo "checked";  ?>></li></center></th></td>
						<td><center><input type="radio" name="ps_ut_id[<?php echo $row -> UsID ?>]" <?php if($row->ps_ut_id == 2) echo "checked";  ?>></li></center></th></td>
					</tr>
					<?php
					}
						?>
				</tbody>
			</table>
			<div class="da-button-row">
				<input type="submit" value="Submit" class="da-button green">
			</div><!-- da-button-row -->
		</form>
	</div><!-- da-panel-content -->
</div><!-- da-panel -->


