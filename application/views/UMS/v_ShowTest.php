		<script>
<style type='text/css'>
a.Button {
  border-style: solid;
  border-width: 1px;
  border-color: #c0c0c0;
  color: #000000;
  font-family: "MS Sans Serif", Arial, Tahoma, sans-serif;
  font-size: 8pt;
  font-style: normal;
  font-weight: normal;
  padding: 2px;
  padding-left: 6px; 
  padding-right: 6px;
  position: relative;
  text-decoration: none;
}

a.Button:hover {
  border-color: #f0f0f0 #505050 #505050 #f0f0f0;
  text-decoration: none;
  border-style: solid;
  border-width: 1px;
  font-family: "MS Sans Serif", Arial, Tahoma, sans-serif;
  font-size: 8pt;
  font-style: normal;
  font-weight: normal;
  padding: 2px;
  padding-left: 6px; 
  padding-right: 6px;
  position: relative;
}
</style>
</script>
		
				 <!--Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
					<?php if($OK == 2){?>
						<div id="showpopupdup">คำถามนี้มีอยู่แล้ว กรุณาสร้างใหม่</div>
					<?php }
						if($OK == 1){?>
						<div id="showpopup">บันทึกข้อมูลเสร็จสมบูรณ์</div>
					<?php }?>
                	<!-- Content Area -->
                	<div id="da-content-area">
						<div class="grid_4_center">
                        	<div id="manage" class="da-panel collapsible collapsed">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/pencil.png" alt="" />
											TEST
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<form id="validate-Test" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showtest/add">
									<div id="valTest-error" class="da-message error" style="display:none;"></div>
										<div class="da-form-inline">
										
										 <script>
											$( "#show-option" ).tooltip({
												show: {
												effect: "slideDown",
												delay: 250
												}
												});
												 });
											
										</script>
										
											<div class="da-form-row">
												<div class="da-form-col-8-10">
													<label>TestnameT<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="TestnameT" placeholder="TestnameT" />
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title= "กรอกข้อมูลภาษาไทย"/>
														
														
													</div>
												</div>		
											</div>		
											<div class="da-form-row">
												<div class="da-form-col-8-10">
													<label>TestnameE<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="TestnameE"  placeholder="TestnameE"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title= "กรอกข้อมูลภาษาอังกฤษ"/>
													</div>
												</div>
											</div>	
											
											<div class="da-form-row">
												<div class="da-form-col-8-10">
													<label>Testno<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="Testno"  placeholder="Testno"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title= "กรอกข้อมูลภาษาอังกฤษ"/>
													</div>
												</div>
											</div>	
											<div class="da-button-row">
												<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear"></input>
													<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
											</div>
										</div>
                                    </form>
									
								</div>
                            </div>
                        </div>


                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/32/computer_imac.png" alt="" />
                                      TEST
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">รหัส</th>
                                                <th width="15%">TestnameT</th>
												<th width="15%">TestnameE</th>
												<th width="15%">Testno</th>
												<th width="10%"bgcolor="green">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1;
											foreach ($test->result_array() as $test) { ?>
											
                                            <tr>
												<td><?php echo $i;?></td>
												<td><?php echo $test['TestnameT'];?></td>
                                                <td><?php echo $test['TestnameE'];?></td>
												<td><?php echo $test['Testno'];?></td>
                                                
												<td bgcolor="#008000">
												

												</td>
											</tr>
											<?php 
											$i+=1;
											} ?>
                                        </tbody>
                                    </table>
								</div>
                            </div>
                        </div>
                    </div>
				</div>