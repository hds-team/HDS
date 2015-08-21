

                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>images/icons/black/16/computer_imac.png" alt="" />
											<b><?php echo $this->session->userdata('MnNameT');?></b>
                                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
									<?php foreach($MnSub->result_array() as $MnSub){?>
									
									<div class="Permission" onclick='window.location="<?php echo base_url();?>index.php/UMS_Controller/setMenu/<?php echo $MnSub['MnID'];?>"'>
										<div class="Gear">
											<?php 		$path = $this->config->item('uploads_url');
															$pathString = $path."menu&image=".$MnSub['MnIcon'];
											?>
											<img src="<?php echo $pathString; ?>" alt="" />
										</div>
										<div class="Desc" >
											
											 <?php echo $MnSub['MnNameT'];?>
										</div>
									</div>
									<?php }?>											
								</div>  
							</div>
						</div>
                
					</div>
            
				</div>

