				<script type="text/javascript" src="<?php echo base_url(); ?>/js/ums/permission.js"></script>

               
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_3_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
										<?php foreach($show as $show){?>
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/users.png" alt="" />กำหนดสิทธิ์ของกลุ่มงาน &nbsp &nbsp<?php echo $show['StNameT'];?> &nbsp &nbsp &nbsp(กลุ่มงาน<?php echo $show['GpNameT'];?>)
										<?php } ?>
									</span>
                                    
                                </div>
								
                                <div class="da-panel-content">
								<form method="post" action="<?php echo base_url(); ?>index.php/UMS/perMissionG/upPer" >
                                    <table class="da-table">
									
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="70%">ชื่อเมนูที่เข้าถึง</th>
                                                <th width="5%">X</th>
                                                <th width="5%">C</th>
                                                <th width="5%">R</th>
												<th width="5%">U</th>
												<th width="5%">D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										 
										<?php $i=1;
											foreach ($menu as $menu) { ?>
                                            <tr>
												<td><?php echo $i; ?></td>
												<?php 
												if($menu['MnLevel']== 0)
												{?><td><b><?php echo  $menu['MnNameT']; ?></b></td><?php }
												 
												else if($menu['MnLevel']== 1)
												{?><td> &nbsp; <?php echo $menu['MnNameT']; ?></td><?php
												}								
												else
												{?><td>&nbsp; &nbsp; &nbsp; &nbsp;<?php echo $menu['MnNameT']; ?></td><?php } ?>
                                                
												<input type="hidden" name ="MnStID" value = "<?php echo $menu['MnStID']; ?>">
												<input type="hidden" name ="GpID" value = "<?php echo $GpID; ?>">
												
												<?php 
												$x ="checked";
												$c ="checked";													
												$r ="checked";
												$u ="checked";
												$d ="checked";
												$xcrud_control = "11111";
												foreach($permission as $per){
													
													if($menu['MnID'] == $per['gpMnID']){
														$x = ($per['gpX']==1)? "checked" : "";
														$c = ($per['gpC']==1)? "checked" : "";
														$r = ($per['gpR']==1)? "checked" : "";
														$u = ($per['gpU']==1)? "checked" : "";
														$d = ($per['gpD']==1)? "checked" : "";
														
														$xcrud_control[0] = ($per['gpX']==1)? "1" : "0";
														$xcrud_control[1] = ($per['gpC']==1)? "1" : "0";
														$xcrud_control[2] = ($per['gpR']==1)? "1" : "0";
														$xcrud_control[3] = ($per['gpU']==1)? "1" : "0";
														$xcrud_control[4] = ($per['gpD']==1)? "1" : "0";
													}
												}
												?>
												<td>
													<input type="checkbox" name = "<?php echo $menu['MnID'];?>x" id="<?php echo $menu['MnID'];?>x" <?php echo $x; ?>>
												</td>
                                                <td>
													<input type="checkbox" name = "<?php echo $menu['MnID'];?>c" id="<?php echo $menu['MnID'];?>c" <?php echo $c; ?>>
												</td>
												<td>
													<input type="checkbox" name = "<?php echo $menu['MnID'];?>r" id="<?php echo $menu['MnID'];?>r" <?php echo $r; ?>>
												</td>
												<td>
													<input type="checkbox" name = "<?php echo $menu['MnID'];?>u" id="<?php echo $menu['MnID'];?>u" <?php echo $u; ?>>
												</td>
												<td>
													<input type="checkbox" name = "<?php echo $menu['MnID'];?>d" id="<?php echo $menu['MnID'];?>d" <?php echo $d; ?>>
													<input type="hidden" id="hidden<?php echo $menu['MnID'];?>control" name="hidden<?php echo $menu['MnID'];?>control" value="<?php echo $xcrud_control;?>" >
												</td>
												
											</tr>
											<?php //break;
											$i+=1;}?>
											
										
                                        </tbody>
																	
                                    </table>	
									<div class="da-button-row" align = "right">									
									<input  id="submit" class="da-button green" type="submit"  name="submit" value="Submit" ></input>
									</div>
										</form>	
                                </div>								
                            </div>
                        </div>         
                    </div>
                    
                </div>
 