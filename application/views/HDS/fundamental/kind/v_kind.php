<script>
$("input[type=checkbox]").switchButton({
  width: 100,
  height: 40,
  button_width: 50
});
</script>
<div class="grid_1">
    .
</div>
<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
				เพิ่มหมวด
            </span>
        </div>
        <div class="da-panel-content">
        	<?php
				$data['class']="da-form";
				echo form_open('HDS/fundamental/insert_kind',$data);
				
			?>
            	<div class="da-form-row">
                	<label>หมวด</label>
                    <div class="da-form-item large">
                    	<input type="text" name="kn_name" />
                    </div>
                  </div>
                <div class="da-button-row">
                	<input type="submit" value="Submit" class="da-button green" />
                </div>
            <?php
				echo form_close();
			?>
        </div> <!--da-panel-content1-->
    </div><!--class="da-panel1-->
</div> <!--grid21-->
            
<div class="clear"></div>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="images/icons/black/16/list.png" alt="">
			เพิ่มหมวด
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
			</thead> <!--Thead-->
			<tbody>
				<?php
					$index = 0;
					foreach($get_kind->result() as $row) 
					{
						$kn_id= $row->kn_id;
				?>
					<tr>
						<td><center> <?php echo $index +1; ?> </center></td>
						<td> <?php echo $row->kn_name; ?> </td>
						<td><center>
							<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
							<?php echo $row->kn_status; ?>
							<!--<input type="checkbox" id="s11" class="i-button" name="ios-checkbox" />	-->
						</center></td>
						<td><center>
								<div class="grid_2">
									<input type="submit" value="แก้ไข" class="da-button blue" />
								</div> <!--grid2/1-->
								<div class="grid_2">
									<a href="<?php echo base_url('index.php/HDS/fundamental/delete_kind/'.$row->kn_id); ?>" >
										<input type="submit" value="ลบ" class="da-button red" /> 
									</a>
								</div> <!--grid2/2-->
							</center>
						</td> 
					</tr> <!--tab TR-->
				<?php
					$index++;
					} //loop foreach
				?>
			</tbody> <!--Tbody-->
		</table> <!--table-->
	</div> <!--da-panel-content2-->
</div> <!--da-panel collapsible2-->
