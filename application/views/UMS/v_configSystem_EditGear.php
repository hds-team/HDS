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
											จัดการ icon Gear
				                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
									<?php  
									$i=1;
									foreach($permission as $gear )
									{
											$ID = $this->encrypt->encode($gear['GpID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$GpID = str_replace("=","~",$ID);
											$ID = $this->encrypt->encode($gear['GpStID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$GpStID = str_replace("=","~",$ID);
									?>
									<div class="Permission onmouse" id="da-ex-dialog-modal<?php echo $i;?>" >
										<div class="Gear">
										<?php if(isset($gear['GpIcon'])){
											$path = $this->config->item('uploads_url');
											$pathString = $path."gear&image=".$gear['GpIcon'];
										?>
											<img src="<?php  echo $pathString; ?>">
										<?php }else{?>
											<img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png">
										<?php }?>
										</div>
										<div class="Desc">
											<B><?php echo $gear['GpNameT'];?></B>
										</div>
									</div>
									<div id="da-ex-dialog-div<?php echo $i;?>" class="no-padding">
									
										<?php 
										foreach($icon as $show){
										?>
										<form action="<?php  echo base_url(); ?>index.php/UMS/configSystem/updateGear/<?php echo $GpID;?>/<?php echo $GpStID;?>" method="POST">
										<input type="hidden" name="Icon" value="<?php echo $show['IcName'];?>">
										<?php 
											$path = $this->config->item('uploads_url');
											$pathString = $path."gear&image=".$show['IcName'];
										?>
										<input type="image" value="submit" src="<?php  echo $pathString; ?>">
										</form>
										<?php }?>
									
									</div>
									<?php $i++;}?>
									
									
								</div>
							</div>
						</div>
                
					</div>
            
				</div>