<script>
	//---------- DIALOG CODE
    $(function() 
		{
			$( "#dialog" ).dialog(
				{
					autoOpen: false,
					resizable: false,
					modal: true
				}
			);
		  
			$( "#dialog1" ).dialog(
				{
					autoOpen: false,
					resizable: false,
					width: 600,
					modal: true
				}
			);
	   
			$( "#opener" ).click(
				function() 
				{
					$( "#dialog" ).dialog( "open" );
				}
			);
		}
	);

    //----------- set value on click to input
    function set_value(kn_id, kn_name){
        $( "#kn_id" ).val(kn_id); 										//set value to input by id
        $( "#kn_name" ).val(kn_name); 									//set value to input by id
        $( "#dialog1" ).dialog( "open" ); 								//open dialog
    }
	
	function set_value1(){
        $( "#dialog" ).dialog( "open" ); 								//open dialog
    }
	
</script>
<style>
	.center{
		text-align: center;
	}
</style>
<div class="grid_1">
    <div class="da-panel">
	</div>
</div>

<div class="grid_2">
    <div class="da-panel">
        <div class="da-panel-header">
        	<span class="da-panel-title">
				<img src="<?php echo base_url('images/icons/black/16/list.png');?>" alt="">
					<b>เพิ่มหมวด</b>
            </span>
        </div>
		
        <div class="da-panel-content">
        	<?php
			$data['class']="da-form";
			echo form_open('HDS/fundamental/insert_kind',$data);
			?>
				<div class="da-form-row">
					<label><b>หมวด</b></label>
					<div class="da-form-item large">
						<input type="text" name="kn_name"/>
					</div>
				</div>
				
				<div class="da-button-row">
					<input type="submit" value="ตกลง" class="da-button green" />
				</div>
            <?php
			echo form_close();
			?>
        </div>	<!--da-panel-content1-->
    </div>	<!--class="da-panel1-->
</div>	<!--grid21-->
            
<div class="clear">
</div>

<div class="da-panel collapsible">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url("images/icons/black/16/list.png"); ?>" alt="">
				<b>รายการหมวด</b>
		</span>
		<span class="da-panel-toggler">
		</span>
	</div>
	
	<div class="da-panel-content">
		<table id="da-ex-datatable-numberpaging" class="da-table">
			<thead>
				<tr>
					<th  style="width:8%">
						<center><b>ลำดับ</b></center>
					</th>
					<th>
						<center><b>หมวด</b></center>
					</th>
					<th style="width:15%">
						<center><b>สถานะ</b></center>
					</th>
					<th style="width:18%">
						<center><b>ดำเนินงาน</b></center>
					</th>
				</tr>
			</thead>	<!--Thead-->
			<tbody>
				<?php
				$index = 0;
				foreach($get_kind->result() as $row) 
				{
					$kn_id= $row->kn_id;
				?>
					<tr>
						<td>
							<center> 
								<?php 
								echo $index +1; 
								?> 
							</center>
						</td>
						<td> 
							<?php 
							echo $row->kn_name; 
							?> 
						</td>
						<td>
							<center>
								
							<?php 
							if ($row->kn_status==1)
							{
							?>
							<?php
							echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_kind/".$row->kn_id."/0")."'>";
							?>
							<img src="<?php echo base_url();?>images/icons/color/on.png" alt="" value='เปิด'></a>
							<?php
							}
							else
							{
							?>
							<?php
							echo "<a href ='".base_url("index.php/HDS/fundamental/update_status_kind/".$row->kn_id."/1")."'>";
							?>
							<img src="<?php echo base_url();?>images/icons/color/off.png" alt="" value='ปิด'></a>
							<?php
							}
							?>
							</center>
						</td>
						<td>
							<center>						
								<div class="grid_2">
									<img src="<?php echo base_url();?>images/icons/color/pencil.png" alt="" value='แก้ไข' id ='opener1' onclick="set_value('	<?php echo $row->kn_id;	?>','<?php echo $row->kn_name; ?>');">
								</div>
								<!--grid2/1-->
								
								<div class="grid_2">							
									<?php
									if($row->rq_kn_id==null){
										?>
									   <?php
											echo "<a href ='".base_url("index.php/HDS/fundamental/delete_kind/".$row->kn_id."/")."'>";
										?>
											<img src="<?php echo base_url();?>images/icons/color/cross.png" alt="" value='ลบ'></a>
										<?php
										}
									else{
										?>
										 <img src="<?php echo base_url();?>images/icons/black/16/cross_small.png" alt="" value='ลบ' id='opener' id='opener2' onclick='set_value2()'>
									<?php
									}
									   ?>
									
								</div>	<!--grid2/2-->
							</center>
						</td> 
					</tr>	<!--tab TR-->
				<?php
					$index++;
				}	//loop foreach
				?>
			</tbody>	<!--Tbody-->
		</table>	<!--table-->
	</div>	<!--da-panel-content2-->
</div>	<!--da-panel collapsible2-->

<div id="dialog" title="แจ้งเตือน">
	<p>
		รายการนี้ถูกใช้งานอยู่ไม่สามารถลบได้
	</p>
</div>

<div id="dialog1" class="da-panel-content" title="แก้ไขชื่อหมวด" style="padding: 0px">
	<?php 
	$data['class'] = "da-form";
	echo form_open('HDS/fundamental/update_kind', $data); 
	?>
		<input type="hidden" id="kn_id"name="kn_id">
		<div class="da-form-row">
			<label>หมวด</label>
			<div class="da-form-item large">
				<input type="text" id="kn_name" name="kn_name">
			</div>
		</div>
		<div class="da-button-row">
			<input type="reset" value="Reset" class="da-button gray left">
			<input type="submit" value="แก้ไข" class="da-button red">
			<?php echo form_close(); ?>
		</div>
	</form>
</div>  