<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			เพิ่มประเภท
		</span>
	</div>
	<div class="da-panel-content">
		<form class="da-form">
		
			<div class="da-form-row">
				<label>ประเภท</label>
				<div class="da-form-item">
					<input type="text">
				</div>
			</div>
			<div class="da-button-row">
				<input type="submit" value="Submit" class="da-button green">
			</div>
		</form>
	</div>
</div>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="images/icons/black/16/list.png" alt="">
			เพิ่มประเภท
		</span>
		
	<span class="da-panel-toggler"></span></div>
	<div class="da-panel-content">
		<table class="da-table">
			<thead>
				<tr>
					<th><center>ลำดับ</center></th>
					<th><center>หมวด</center></th>
					<th><center>สถานะ</center></th>
					<th width=180 ><center>ดำเนินการ</center></th>
				</tr>
			</thead>
			<tbody>
				<?php ?>
				<tr>
					<td>1</td>
					<td>หมวด</td>
					<td>
						<input type="checkbox" id="s11" class="i-button" name="ios-checkbox" />	
					</td>
					<td><center>
                        	<div class="grid_2">
                        		<input type="submit" value="แก้ไข" class="da-button blue" style="width:60%" />
                        	</div>
                        	<div class="grid_2">
                        		<input type="submit" value="ยกเลิก" class="da-button red" style="width:60%" />
                        	</div>
                        </center>
                    </td>
					
				</tr>
				<?php ?>
			</tbody>
		</table>
	</div> <!--da-panel-content-->
</div> <!--da-panel collapsible-->
