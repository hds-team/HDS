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
						<div class="grid_3_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php  echo base_url(); ?>images/icons/black/16/pencil.png" alt="" />
											จัดการข้อมูลเมนู
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<form id="validate-Menu" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showSystem/addMenu1">
									<div id="valMenu-error" class="da-message error" style="display:none;"></div>
										<div class="da-form-inline">
											<input type="hidden" name="MnStID" value="<?php echo $MnStID?>"/>
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ชื่อเมนู(ท)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnNameT" placeholder="ชื่อเมนูภาษาไทย"/>
													</div>
												</div>
											</div>
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ชื่อเมนู(E)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnNameE" placeholder="ชื่อเมนูภาษาอังกฤษ"/>
													</div>
												</div>
											</div>
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>URL<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnURL" placeholder="URL ของเมนู"/>
													</div>
												</div>		
											</div>		
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>คำอธิบาย</label>
													<div class="da-form-item large">
														<textarea name="MnDesc" placeholder="คำอธิบายเมนู"></textarea>
													</div>
												</div>
											</div>			
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ไอคอน</label>
													<div class="da-form-item large">
														<input type="text" name="MnIcon" id="da-ex-dialog-modal" placeholder="ไอคอนเมนู"/>
														<div id="da-ex-dialog-div" class="no-padding">
															<form>
																<div class="da-form-inline">
																	<?php  foreach($showicon->result_array() as $icon){
																				$path = $this->config->item('uploads_url');
																				$pathString = $path.$icon['IcType']."&image=".$icon['IcName'];?>
																		<input type="image" value="submit" src="<?php  echo $pathString; ?>" onclick="getname('<?php echo $icon['IcName'];?>')">
																	<?php }?>
																</div>
															</form>
														</div>
													</div>
												</div>		
											</div>						
											<input type="hidden" name="MnParentMnID" value="NULL"/>
											<input type="hidden" name="MnLevel" value="0"/>	
												<?php 
														$MnStID = $this->encrypt->encode($MnStID);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
												?>
											<div class="da-button-row">
												<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear"></input>
												<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
												<input id="cancle" class="da-button red" type="button" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/showMenu/<?php echo $MnStID ?>'" value="ยกเลิก" name="cancle"></input>
											</div>
										</div>
                                    </form>	
								</div>
                            </div>
                        </div>
					</div>
				</div>			