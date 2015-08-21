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
											จัดการ template ระบบ
                                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
									<?php 
											$ID = $this->encrypt->encode($StID);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
										?>
									<div class="config-header">
										<div class="header">
										Header
										</div>
										<div class="content">
											
											<div id="da-header" style="z-index:0" onclick="window.location='<?php echo base_url();?>index.php/UMS/configSystem/EditHead/<?php echo $ID;?>'">
										
												<div id="da-header-top" style="height:<?php echo $tem['HeightHeadTop']?>px;background:<?php echo $tem['ColorHeadTop']?>;">
													
												<!-- Container -->
													<div class="da-container clearfix">
												<!-- Logo Container. All images put here will be vertically centere -->
														<div id="da-logo-wrap" style="width:70%;">
															<div id="da-logo">
																<div id="da-logo-img">
																	<a href="#">
																	<?php 
																		$path = $this->config->item('uploads_url');
																		$pathString = $path."header&image=".$tem['HeadIcon'];
																	?>
																		<img src="<?php  echo $pathString; ?>" alt="Dandelion Admin" style="height:<?php echo $tem['HeightHeadTop']?>px;"/>
																	</a>
																</div>
															</div>
														</div>
                    
														<!-- Header Toolbar Menu -->
														<div id="da-header-toolbar"  style="margin-top:<?php echo $tem['MarginHeadTop']?>px;" class="clearfix">
															<div id="da-user-profile-<?php echo $tem['ColorTopButton']?>">
															<div id="da-user-info-<?php echo $tem['ColorTopButton']?>">
														
															<span class="da-user-title-<?php echo $tem['ColorTopButton']?>">
															USER
															</span>
															</div>
														
															</div>
															<div id="da-header-button-container">
															<ul>
															<!--<li class="da-header-button-<?php echo $tem['ColorTopButton']?> message">
																<span class="da-button-count">*</span>
																<a href="#">Notifications</a>
                            								</li>-->
                            								<li class="da-header-button-<?php echo $tem['ColorTopButton']?> logout">
                               							 	<a href="#" title="Logout">Logout</a>
                            							    </li>
															</ul>
															</div>
														</div>
                                    
													</div>
												</div>
												<div id="da-header-bottom" style="background:<?php echo $tem['ColorHeadBottom']?>;">
												<!-- Container -->
													<div class="da-container clearfix">
														<div id="da-search" class="slidemarginleft">
															<p>
																<a style="color: grey; text-decoration: none;" href="javascript:void(0)">
																	<span class="list-menu-image"><img src="<?php  echo base_url(); ?>images/icons/<?php echo $tem['ColorBottomButton']?>/32/new-list.png"></span>
																	<span class="list-menu-name" style="color:<?php echo $tem['ColorBottomButton']?>;">เมนู</span>
																</a>
															</p>
														
														</div>
														
													<!-- Breadcrumbs -->
														<div id="da-breadcrumb-<?php echo $tem['ColorBottomButton']?>">
															<ul>
																<li><a href="#"><img src="<?php  echo base_url(); ?>images/icons/<?php echo $tem['ColorBottomButton']?>/16/home.png" alt="Home" />Home</a></li>
															</ul>
														</div>
                    
													</div>
												</div>
											</div>
										</div>
									</div>  
									<?php if($StID != 0){?>
									<div class="config-gear">
										<div class="header">
											Gear
										</div>
										
										<div class="content" onclick="window.location='<?php echo base_url();?>index.php/UMS/configSystem/EditGear/<?php echo $ID;?>'">
											<div>
												<img src="<?php  echo base_url(); ?>images/icons/ums/cog2_2.png">
											</div>
											
										</div>
									</div>	
									<?php }?>
                           
										
								</div>
							</div>
						</div>
                
					</div>
            
				</div>