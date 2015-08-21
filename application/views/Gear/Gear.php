<script type="text/javascript" src="<?php echo base_url(); ?>/js/ums/sortGear.js"></script>
<style type="text/css"> .onmouse:hover{background-color:#f2efef;}</style>
		   <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_35">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url();?>images/icons/black/16/computer_imac.png" alt="" />
											เมนูระบบ
										<input id="close" type="image" src="<?php echo base_url();?>/images/icons/color/cancel.png" align="right" />
										<input id="sorting" type="image" src="<?php echo base_url();?>/images/icons/color/zones.png" align="right" />
                                    </span>
                                </div>
                
                                <div class="da-panel-content with-padding" id="access">
								<?php 
								if(get_cookie('gear'.$this->session->userdata('UsID')) and (count($save) == count($system)))
									{
										
										foreach($save as $sys) {?>
									<div class="System">
										<div class="System-header"><?php echo $sys;?></div>
										<div class="System-content">
										<?php foreach($permission as $gear ){
											if($gear['StNameT'] == $sys){?>
											<div class="Permission onmouse" href='<?php echo base_url()."index.php/gear/setGear/".$gear['GpStID']."/".$gear['GpID']."/".str_replace("/",".",$gear['StURL']);?>'>
												<div class="Gear">
												ppppp
													<?php if(isset($gear['GpIcon'])){ $path = $this->config->item('uploads_url'); $pathString = $path."gear&image=".$gear['GpIcon'];?> <img src="<?php echo $pathString;?>">
													<?php }else{?><img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png"> <?php }?>
												</div>
												<div class="Desc"><B><?php echo $gear['GpNameT'];?></B></div>
											</div>
										<?php 	} 
										}?>
										</div>
									</div>	
								<?php }
									}
									else
									{?>
									
										<?php foreach($system as $sys) {?>
									<div class="System">
										<div class="System-header"><?php echo $sys['StNameT'];?></div>
										<div class="System-content">
										<?php foreach($permission as $gear ){
											if($gear['StNameT'] == $sys['StNameT']){?>

											<div class="Permission onmouse" href='<?php echo base_url();?>index.php/gear/setGear/<?php echo $sys['StID']."/".$gear['GpID']."/".str_replace("/",".",$gear['StURL']);?>'>
												
												<div class="Gear">
												
													<?php if(isset($gear['GpIcon'])){ $path = $this->config->item('uploads_url'); $pathString = $path."gear&image=".$gear['GpIcon'];?> <img src="<?php echo $pathString;?>">
													<?php }else{?><img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png"> <?php }?>
												</div>
												<div class="Desc"><?php echo $gear['GpNameT'];?></div>
											</div>
										<?php 	} 
										}?>
										</div>
									</div>	
								<?php }?>
									<?php }?>
								</div>
							</div>
						</div>
						
					</div>
				</div>	
