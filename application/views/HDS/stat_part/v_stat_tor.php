<style>
	.center{
		text-align: center;
	}
</style>
<div class="da-panel collapsible">
	<div class="da-panel-header">
    	<span class="da-panel-title">
            <img src=<?php echo base_url("images/icons/black/16/list.png"); ?> alt="">
				<b>รายงานสัญญาระหว่าง User</b>
        </span>
        <span class="da-panel-toggler"></span>
    </div>
    <div class="da-panel-content">
        <table id="da-ex-datatable-numberpaging" class="da-table">
            <thead>
                <tr>
                    <th style="width: 7%"><center><b>ลำดับ</b><center></th> 
                    <th class="center"><b>กิจกรรม</b></th>
                    <th style="width: 11%"><center><b>วันที่</b><center></th> 
                    <th style="width: 20%"><center><b>หมายเหตุ</b><center></th> 
                </tr>
            </thead>
            <tbody>
				<?php 
					$index=1;
					foreach($query->result() as $row)
					{
				?> 
					<tr class="odd">
						<td class="center"><?php echo $index++; ?></td>
						<td><?php echo $row->rq_subject; ?></td>
						<td class="center"><?php echo $this->date_time->DateThai($row->rq_date)?></td>
						<td class="center"><?php echo $row->ctr_value;?></td>
					</tr>
				<?php 
					} 
				?>
            </tbody>
        </table>
    </div> <!--  class="da-panel-content -->
</div> <!-- class="da-panel collapsible -->
<a href = "<?php echo base_url('index.php/HDS/stats/export_pdf/')?>" />
			<button style="width:10%" class="da-button blue">Export</button>
</a>
