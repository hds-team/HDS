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
                                        <img src="<?php echo base_url(); ?>images/icons/black/16/pencil.png" alt="" />
											จัดการข้อมูลเมนู
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<?php foreach($edit as $show){
														$MnStID = $this->encrypt->encode($show['MnStID']);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
														$MnID = $this->encrypt->encode($show['MnID']);
														$ID = str_replace("/","_",$MnID);
														$ID = str_replace("+",":",$ID);
														$MnID = str_replace("=","~",$ID);
								?>
								<form id="validate-Menu" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showSystem/updateMenu/<?php echo $MnID."/".$MnStID?>">
									<div id="valMenu-error" class="da-message error" style="display:none;"></div>
										<div class="da-form-inline">	
										
										 <script>
$(function() {
$( "#show-option" ).tooltip({
show: {
effect: "slideDown",
delay: 250
}
});
 });
</script>
										
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ชื่อเมนู(ท)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnNameT" placeholder="ชื่อเมนูภาษาไทย" value="<?php echo $show['MnNameT']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title="แก้ไขชื่อเมนูภาษาไทย"/>
													</div>
												</div>
											</div>
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ชื่อเมนู(E)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnNameE" placeholder="ชื่อเมนูภาษาอังกฤษ" value="<?php echo $show['MnNameE']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title="แก้ไขชื่อเมนูภาษาอังกฤษ"/>
														
													</div>
												</div>
											</div>		
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>URL<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="MnURL" placeholder="URL ของเมนู" value="<?=$show['MnURL']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title="แก้ไข URL เมนู"/>
													</div>
												</div>
											</div>		
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>คำอธิบาย</label>
													<div class="da-form-item large">
														<textarea name="MnDesc" placeholder="คำอธิบายเมนู" value="<?php echo $show['MnDesc']?>"></textarea>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title="แก้ไขคำอธิบายเมนู"/>
													</div>
												</div>
											</div>
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ไอคอน</label>
													<div class="da-form-item large">
														<input type="text" name="MnIcon" value="<?php echo $show['MnIcon']?>" id="da-ex-dialog-modal" placeholder="ไอคอนเมนู"/>
														<div id="da-ex-dialog-div" class="no-padding">
															<form>
																<div class="da-form-inline">
																	<?php foreach($showicon->result_array() as $icon){
																				$path = $this->config->item('uploads_url');
																				$pathString = $path.$icon['IcType']."&image=".$icon['IcName'];?>
																		<input type="image" value="submit" src="<?php echo $pathString;?>" onclick="getname('<?php echo $icon['IcName'];?>')">
																	<?php }?>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											
											
											<input type="hidden" name="MnStID" value="<?php echo $show['MnStID']?>"/>
											<input type="hidden" name="MnSeq" value="<?php echo $show['MnSeq']?>"/>
											<input type="hidden" name="MnParentMnID" value="<?php echo $show['MnParentMnID']?>"/>
											<input type="hidden" name="MnToolbar" value="<?php echo $show['MnToolbar']?>"/>
											<input type="hidden" name="MnToolbarSeq" value="<?php echo $show['MnToolbarSeq']?>"/>
											<input type="hidden" name="MnToolbarIcon" value="<?php echo $show['MnToolbarIcon']?>"/>
											<input type="hidden" name="MnLevel" value="<?php echo $show['MnLevel']?>"/>
												<?php }?>								
											<div class="da-button-row">
												<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear"></input>
												<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
												<input id="cancle" class="da-button red" type="button" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showSystem/showMenu/<?php echo  $MnStID ?>'" value="ยกเลิกการแก้ไข" name="cancle"></input>
											</div>
										</div>
                                    </form>	

								</div>
                            </div>
                        </div>
					</div>
                    
				</div>
                
					