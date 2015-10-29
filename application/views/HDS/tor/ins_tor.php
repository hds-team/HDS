<!-- Demo JavaScript Files -->
<script type="text/javascript" src="<?php echo base_url(); ?>plugins/elastic/jquery.elastic.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/demo/demo.form.js"></script>
<div class="grid_1">
	 <div class="da-panel"></div>
</div>
<div class="grid_2">
	<div class="da-panel">
		<div class="da-panel-header">
		<span class="da-panel-title">
			<img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="">
			เพิ่มโครงการ
		</span>
		</div><!-- da-panel-header -->
		<div class="da-panel-content">
			<?php
				$data['class'] = "da-form";
				echo form_open('HDS/tor/insert_tor', $data); 
			?>
				<div class="da-form-row">
				<label>ชื่อโครงการ <span class="required">*</span></label>
					<div class="da-form-item large">
						<input type="text" name="namekong" class="required" />
					</div>	
				</div>
				<div class="da-form-row">
				<label>ปีงบประมาณ <span class="required">*</span></label>
					<div class="da-form-item large">
						<select name="year">
							<?php
							for($i= $year; $i <= $year + 10 ; $i++)
							{
							?>
								<option value="<?php echo $i-543; ?>"><?php echo $i; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="da-form-row">
				<label>ระบบ</label>
					<div class="da-form-item large">
						<select class="chzn-select" size="20" multiple="multiple" style='height:7%' name="sys">
							<?php
							foreach($query as $key => $sys)
							{
							?>
								<option value="<?php echo $sys['StID']; ?>"><?php echo $sys['StNameT']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="da-button-row">
					<input type="submit" value="ตกลง" class="da-button green">
              </div>
			 <?php echo form_close(); ?>
		</div>
	</div>
</div>
<div class="grid_1">
	 <div class="da-panel"></div>
</div>
