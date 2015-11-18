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
<!-- use system -->
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
                        <select name="system">
							<option value="">เลือกองค์กร</option>
							<?php
								foreach($depart->result() as $dep){
							?>
							  <option value="<?php echo $dep->dpName; ?>"><?php echo $dep->dpName; ?></option>
							<?php
								}
							?>
                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>ประเภท<span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select name="system">
                          <option value="">เลือกประเภท</option>
						  	<?php
								foreach($category->result() as $cat){
							?>
							  <option value="<?php echo $cat->ct_id; ?>"><?php echo $cat->ct_name; ?></option>
							<?php
								}
							?>

                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>หมวด<span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select name="system">
                          <option value="">เลือกหมวด</option>
							<?php
								foreach($kind->result() as $kind){
							?>
							  <option value="<?php echo $kind->kn_id; ?>"><?php echo $kind->kn_name; ?></option>
							<?php
								}
							?>
                        </select>
                      </div>
                  </div>
				  <div class="da-form-row">
                      <label>ระบบ <span class="required">*</span></label>
                      <div class="da-form-item large">
                        <select name="system">
                          <option>เลือกระบบ</option>
							<?php
								foreach($system->result() as $sys){
							?>
							  <option value="<?php echo $sys->StID; ?>"><?php echo $sys->StNameT; ?></option>
							<?php
								}
							?>
                        </select>
                      </div>
                  </div>
              </div>
              <div class="da-button-row">
                <input type="submit" value="ตกลง" class="da-button green">
              </div>
			  <?php
				echo form_close();
			  ?>
      </div><!-- da-panel-content -->
    </div><!-- da-panel -->   
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
        <table id="da-ex-datatable-numberpaging" class="da-table">
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
       


