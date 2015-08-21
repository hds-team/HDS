<script>
	function getname (name) {
		document.getElementById("da-ex-dialog-modal").value = name;
		$("#da-ex-dialog-div").dialog( "close" );
	}					
</script>	
				<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">         
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
										 <img src="<?php echo base_url(); ?>/images/icons/black/16/computer_imac.png" alt="" />
                                        กำหนดเมนูระบบ
                                    </span>  
                                </div>
                                <div class="da-panel-content with-padding">
								</div>
								<div class="da-panel-content1 with-padding">
									<div class="Add">
										<div class="Menu-header">
											<div class="Desc">
											</div>
											</form>
											<div class="Option">
												<?php  
														$MnStID = $this->encrypt->encode($MnStID);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
												?>
                                    <img align="right" src="<?php echo base_url(); ?>/images/icons/color/add.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showSystem/addMain/<?php echo $MnStID?>' "/>
									<br/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>