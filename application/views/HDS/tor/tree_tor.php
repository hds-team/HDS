<div class="da-panel">
	<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
			ข้อสัญญา
		</span>
	</div><!-- da-panel-header -->
		<div class="da-panel-content">
			<form class="da-form">
				<div class="da-form-row" >
					<div class="grid_3">
						<div class="da-panel">
						</div>
					</div>
					<div class="grid_1">
                    
						<div class="da-form-item large">
                        <input type="button" class="da-button blue gray" value="เพิ่มสัญญา"  style='height:100%'>
						</div>	
					</div>
				</div>
<?php
	function tree($query, $parent = NULL, $level = 1)
	{
		$count = 0;
		foreach($query->result() as $row)
		{
			if($row->ctr_parent == $parent)
			{
				$count++;
				for($i=0;$i<$level;$i++){
					//echo "->";
				} ?>	
					<div class="da-form-row" >
						<p> <?php echo $row->ctr_value; ?> </p>	
					</div>
				<?php
					tree($query, $row->ctr_id, $level+1);
			}
			else if($count == $query->num_rows())
			{
				return 0;
			}
		}

	} ?>
	<?php
		tree($query, NULL, 1);
	?>
		</form>
	</div>
</div>

