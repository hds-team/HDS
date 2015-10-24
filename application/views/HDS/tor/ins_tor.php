

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
               เพิ่มโครงการ
            </span>      
        </div>
        <div class="da-panel-content">
        	<form id="da-ex-wizard-form" class="da-form" method="post" action="wizard.php">
            	<fieldset class="da-form-inline">
                	<legend>รายละเอียด</legend>
                	<div class="da-form-row">
                    	<label>ชื่อโครงการ <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	<input type="text" name="daWizard[username]" class="required" />
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>ปีงบประมาณ <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	 <select name="system">
								<option>- เลือกปีงบประมาณ -</option>
							</select>
                        </div>
                    </div>
					<div class="da-form-row">
						<label>Multiple jQuery-Chosen Select</label>
							<div class="da-form-item large">
								<select class="chzn-select" size="5" multiple="multiple">
									<option selected="selected">United States</option>
									<option selected="selected">Japan</option>
									<option>Russia</option>
									<option>China</option>
									<option>Netherlands</option>
								</select>
							</div>
					</div>
                </fieldset>
				<fieldset class="da-form-inline">
                	<legend>ข้อสัญญา</legend>
                	<div class="da-form-row">
                    	<label>Username <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	<input type="text" name="daWizard[username]" class="required" />
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>Email <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	<input type="text" name="daWizard[email]" class="required email" />
                        </div>
                    </div>
                	<div class="da-form-row">
                    	<label>Password <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	<input type="password" name="daWizard[password]" class="required" />
                        </div>
                    </div>
                </fieldset>
            	<fieldset class="da-form-inline">
                	<legend>เสร็จสิ้น</legend>
                	<div class="da-form-row">
                    	<label>Payment Method <span class="required">*</span></label>
                        <div class="da-form-item large">
                        	<select name="daWizard[payment]" class="required">
                            	<option>PayPal</option>
                            	<option>Visa</option>
                            	<option>Mastercard</option>
                                <option>Wire Transfer</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="grid_1">
	 <div class="da-panel"></div>
</div>