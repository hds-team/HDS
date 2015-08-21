				<script type="text/javascript" src="<?php echo base_url(); ?>/js/validateTHENDI.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>/plugins/validate/jquery.validate.min.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>/js/demo/demo.validation.js"></script>
        <!-- Content -->
        <div id="da-content">
            <!-- Container -->
            <div class="da-container"> 
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_3_center">
							
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url();?>images/icons/black/32/info_about.png" alt="" />
										Change Your Password
                                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
								<form id="validate-chpass" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/user/checkchange" >
									<div id="valch-error" class="da-message error" style="display:none;"></div>
									<div class="da-form-row">
										<label>Current Password<span class="required">*</span></label>
										<div class="da-form-item">
											<input id="oldpass" name="oldpass" type="password" />
										</div>
									</div>
									<div class="da-form-row">
										<label>New Password<span class="required">*</span></label>
										<div class="da-form-item">
											<input id="newpass" name="newpass" type="password" />
										</div>
									</div>
									<div class="da-form-row">
										<label>Confirm New Password<span class="required">*</span></label>
										<div class="da-form-item">
											<input id="newpass2" name="newpass2" type="password" />
										</div>
									</div>
									<div class="da-button-row">
										<input type="submit" value="Change" class="da-button green">
										<input type="button" value="Cancel" onclick="history.back();" class="da-button gray">
									</div>
								</form>
								</div>
							</div>
							</div>
						</div>
					</div>
                
				</div>
            
			</div>
		</div> 
    </div>
