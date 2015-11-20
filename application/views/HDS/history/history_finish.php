<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style>
	.center{
		text-align: center;
	}
	#text{
		white-space: nowrap; 
		width: 12em; 
		overflow: hidden;
		text-overflow: ellipsis; 
	}
	.hide{
		display: none;
	}
</style>
<script>
$(document).ready(function(){
	$("#filter").click(function() {
		//alert("TEST");
		
		var value = new Array();
		
		value[0] = $("#depart").val();
		value[1] = $("#category").val();
		value[2] = $("#kind").val();
		value[3] = $("#system").val();
		for(var i=0;i<4;i++)
		{
			console.log(value[i]);
		}
		
		var id = new Array();
		$("table tr").each(function(index) {
			
			if (index !== 0) {

				$row = $(this);
				//var test = $row.find("td:nth-child(7)").text();
				//console.log(test);
				
				id[0] = $row.find("td:nth-child(7)").text(); //depart
				id[1] = $row.find("td:nth-child(5)").text();
				id[2] = $row.find("td:nth-child(6)").text();
				id[3] = $row.find("td:nth-child(4)").text();
				
				//alert(id_1.indexOf(value_1)+"-"+id_2.indexOf(value_2));
				/*
				if(id[0].indexOf(value[0]) !== 0 || id[1].indexOf(value[1]) !== 0 || id[2].indexOf(value[2]) !== 0 || id[3].indexOf(value[3]) !== 0) {
					$row.hide();
				}
				else {
					$row.show();
				}
				*/
				//console.log("+++++++++++");
				var hide = 0;
				var show = 0;
				for(var i=0;i<4;i++)
				{
					if(value[i] !== 0)
					{
						//console.log("I: "+i+"value:" + value[i]);
						if(id[i].indexOf(value[i]) !== 0){
							$row.hide();
						}
						else {
							$row.show();
						}
					}
				}
			}
		});	
	});
});

</script>
<!-- use system -->
<div class="grid_1">'
	<div class="da-panel"></div>
</div>
<div class="grid_2">
    <div class="da-panel">
      <div class="da-panel-header">
        <span class="da-panel-title">
              <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
				ตัวคัดกรอง
          </span>
      </div><!-- da-panel-header -->
      <div class="da-panel-content">
		<?php
			$data['class'] ="da-form";
			echo form_open_multipart('HDS/history/history_finish', $data);
		?>
            <div class="da-form-inline">
                  <div class="da-form-row">
                      <label>องค์กร<span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select id="depart">
							<option value="0">เลือกองค์กร</option>
							<?php
								foreach($depart->result() as $dep){
							?>
							  <option value="<?php echo $dep->dpName; ?>"><?php echo $dep->dpName; ?></option>
							<?php
								}
							?>
							<option value="1">ทั้งหมด</option>
                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>ประเภท<span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select id="category">
                          <option value="0">เลือกประเภท</option>
						  	<?php
								foreach($category->result() as $cat){
							?>
							  <option value="<?php echo $cat->ct_name; ?>"><?php echo $cat->ct_name; ?></option>
							<?php
								}
							?>
							<option value="1">ทั้งหมด</option>
                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>หมวด<span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select id="kind">
                          <option value="0">เลือกหมวด</option>
							<?php
								foreach($kind->result() as $kind){
							?>
							  <option value="<?php echo $kind->kn_name; ?>"><?php echo $kind->kn_name; ?></option>
							<?php
								}
							?>
							<option value="1">ทั้งหมด</option>
                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>ระบบ <span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select id="system">
                          <option value="0">เลือกระบบ</option>
							<?php
								foreach($system->result() as $sys){
							?>
							  <option value="<?php echo $sys->StNameT; ?>"><?php echo $sys->StNameT; ?></option>
							<?php
								}
							?>
							<option value="1">ทั้งหมด</option>
                        </select>
                      </div>
                  </div>
              </div>
              <div class="da-button-row">
				<div class="da-button green" id="filter" onclick="test();"> คัดกรอง </div>
              </div>
			  <?php
				echo form_close();
			  ?>
      </div><!-- da-panel-content -->
    </div><!-- da-panel -->
</div>	
  <div class="clear"></div>
<!-- history --> 
<div class="da-panel collapsible">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src="<?php echo base_url('images/icons/black/16/list.png'); ?>" alt="">
				ประวัติการแก้ไข
        </span>
        
    <span class="da-panel-toggler"></span></div>
    <div class="da-panel-content">
        <table id="da-ex-datatable" class="da-table">
            <thead>
                <tr>
                	<th><center><b>ลำดับ</b></center></th>
                    
                    <th style="width:10%"><center><b>หัวเรื่อง</b></center></th>
                    <th><center><b>วันที่รับเรื่อง</b></center></th>
					<th><center><b>ระบบ</b></center></th>
					<th><center><b>ประเภท</b></center></th>
					<th><center><b>หมวดหมู่</b></center></th>
					<th><center><b>องค์กร</b></center></th>
                    <th><center><b>สถานะ</b></center></th>
                </tr>
            </thead>
            <tbody>
				<?php 
					$index = 0;
					foreach($query->result() as $row){
				?>
					<tr class="odd">
						<td class="center"><?php echo $index+1; ?></td>
						
						<td><a href="<?php echo base_url('index.php/HDS/reply/detail_sys/'.$row->rq_id);?>"><div id="text" title="<?php echo $row->rq_subject; ?>"><?php echo $row->rq_subject; ?></div></td>
						<td class="center"><?php echo $this->date_time->DateThai($row->rq_date); ?></td>
						<td class="center"><?php echo $row->StNameT; ?></td>
						<td class="center"><?php echo $row->ct_name; ?></td>
						<td class="center"><?php echo $row->kn_name; ?></td>
						<td class="center"><?php echo $row->dpName; ?></td>
						<td class="center"><?php echo $row->st_name; ?></td>
					</tr>
                <?php
					$index++;
					}
				?>
            </tbody>
        </table>
    </div>
</div>
       


