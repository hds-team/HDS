
<script>
function removequestion(QsID)
{
	var web="<?php echo base_url()?>index.php/UMS/showQuestion/remove/"+QsID;
	if(confirm("คุณต้องการลบหรือไม่?")==true){
     window.location.href=web;
   }
	else
	{
		return false;
	}
};
</script>
				
				<!-- Main Content Wrapper -->
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
											เพิ่มข้อมูลคำถาม
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<form id="validate-Q" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showQuestion/add">
									<div id="valQ-error" class="da-message error" style="display:none;"></div>
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
													<label>คำถามภาษาไทย<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="QsDescT" placeholder="คำถามภาษาไทย" />
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title= "กรอกข้อมูลภาษาไทย"/>
														
														
													</div>
												</div>		
											</div>		
											<div class="da-form-row">
												<div class="da-form-col-8-10">
													<label>Question in English<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="QsDescE"  placeholder="Question in English"/>
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
                                       ข้อมูลคำถาม
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">รหัส</th>
                                                <th width="15%">คำถามภาษาไทย</th>
												<th width="15%">Question English language</th>
												<th width="10%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1;
											foreach ($question->result_array() as $question) { 
												$ID = $this->encrypt->encode($question['QsID']);
												$ID = str_replace("/","_",$ID);
												$ID = str_replace("+",":",$ID);
												$ID = str_replace("=","~",$ID);
											?>
                                            <tr>
												<td><?php echo $i;?></td>
												<td><?php echo $question['QsDescT'];?></td>
                                                <td><?php echo $question['QsDescE'];?></td>
                                                
												<td>
													<input class="edit" type="image" src="<?php echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showQuestion/edit/<?php echo $ID?>'"/>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/cross.png" onclick='return removequestion(<?php echo $question['QsID'] ?>);' />
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