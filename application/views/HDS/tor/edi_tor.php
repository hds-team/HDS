<script>
  $(document).ready(function() {
	
	var today = new Date();
    $( ".datepicker_2" ).datepicker({ 
	dateFormat: 'dd/mm/yy',});

    //------- Add Field input contact
    var i = $('#contact_group label').size() + 1;

    $('#add').click(function(){
        $('#contact_group').append('<label id="contact_lb'+i+'"> <input style="width:30%" id="rq_tell2'+i+'" type="text" name="ctr_number[]" required > <input id="rq_tell'+i+'" type="text" name="ctr_value[]" required style="width:60%"> <a id="del" ><img src="<?php echo base_url(); ?>images/icons/color/cross.png" title="ลบ" style="width:4%"></a></label>');
        i++;
    })

    $('#del').live('click', function() { 
        if( i > 2 ) {
                $(this).parents('label').remove();
                i--;
        }
        return false;
    });

  });
</script>
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
			แก้ไขโครงการ
		</span>
		</div><!-- da-panel-header -->
		<div class="da-panel-content">
			<?php
				$data['class'] = "da-form";
				echo form_open('HDS/tor/...', $data); 
			?>
				<div class="da-form-row">
				<label>ชื่อโครงการ <span class="required">*</span></label>
					<div class="da-form-item large">
					<?php 
						foreach($pro as $key => $sh)
						{ 	
					?>
						<input type="text" name="namekong" value="<?php echo $sh['tp_name']; ?>" />
						
					</div>	
				</div>
				<div class="da-form-row">
				<label>วันที่เริ่ม <span class="required">*</span></label>
					<div class="da-form-item large">
						<input class="datepicker_2" type="text" name="dayf" value="<?php echo $sh['tp_date_start']; ?>" class="required" />
					</div>	
				</div>
				<div class="da-form-row">
				<label>วันที่สิ้นสุด <span class="required">*</span></label>
					<div class="da-form-item large">
						<input class="datepicker_2" type="text" name="dayend" value="<?php echo $sh['tp_date_stop']; ?>" class="required" />
					</div>	
				</div>
						<?php } ?>
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
							foreach($system as $key => $sys)
							{
							?>
								<option selected="selected" value="<?php echo $sys['StID']; ?>"><?php echo $sys['StNameT']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="da-form-row">
					<div class="grid_4">
						<label>สัญญา</label>
						<div class="da-form-item large" id="contact_group">
							<label>
								<input style="width:30%" id="rq_tell20" type="text" name="ctr_number[]" required >
								<input style="width:60%" id="rq_tell0" type="text" name="ctr_value[]" required >
								<a id="add"><img src="<?php echo base_url(); ?>images/icons/color/add.png" title="เพิ่ม" style="width:4%"></a>
							</label>
						</div>
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
