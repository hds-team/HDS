<style type="text/css"> 
.onmouse:hover{background-color:#f2efef;}
</style>

<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php  echo base_url(); ?>images/icons/black/32/computer_imac.png" alt="" />
											จัดการหน้าระบบ
                                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
								<?php
									$ID = 0;
									$ID = $this->encrypt->encode($ID);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
								?>
									<div class="EditSystem onmouse" onclick="window.location='<?php echo base_url();?>index.php/UMS/configSystem/Edit/<?php echo $ID?>'">
										<div class="Icon" align="center">
											<br />
											<img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png" alt="" />
										</div>
										<div class="Desc" align="center">
											<p>PORTAL</p>
										</div>
									</div>
									<?php 
											foreach ($showsys->result_array() as $row){
											$ID = $this->encrypt->encode($row['StID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
											?>
									<div class="EditSystem onmouse" onclick="window.location='<?php echo base_url();?>index.php/UMS/configSystem/Edit/<?php echo $ID?>'">
										<div class="Icon" align="center">
											<br />
											<?php if($row['StIcon']==null || $row['StIcon'] =='-'){?>
											<img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png" alt="" />
											<?php }else{
															$path = $this->config->item('uploads_url');
															$pathString = $path."system&image=".$row['StIcon'];
											?>
											<img src="<?php echo $pathString; ?>" alt="" />
											<?php }?>
										</div>
										<div class="Desc" align="center">
											<p><?php echo $row['StAbbrE'];?><?php echo "&nbsp";?></p>
										</div>
									</div>
									<?php }?>
									
									
									
									
									
								</div>  
							</div>
						</div>
                
					</div>
            
				</div>