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
</style>  
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
                