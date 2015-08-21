<script>
				function removedepartment(dpID)
{
	var web="<?php echo base_url()?>index.php/UMS/department/remove/"+dpID;
	
	if(confirm("คุณต้องการลบหรือไม่?")==true){
     window.location.href=web;
   }
	else
	{
		return false;
	}
}
</script>

                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
					<?php if($OK == 2){?>
						<div id="showpopupdup">ชื่อวิทยาลัยนี้มีอยู่แล้ว กรุณาสร้างใหม่</div>
					<?php }
						if($OK == 1){?>
						<div id="showpopup">บันทึกข้อมูลเสร็จสมบูรณ์</div>
					<?php }?>
                	<!-- Content Area -->
                	<div id="da-content-area">
						<div class="grid_3_center">
                        	<div class="da-panel collapsible collapsed">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/pencil.png" alt="" />
											เพิ่มข้อมูลหน่วยงาน
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<form id="validate-WGSer" class="da-form" method="post"action ="<?php echo base_url(); ?>/index.php/UMS/department/add">
                                    <div id="valWGSer-error" class="da-message error" style="display:none;"></div>
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
												<div class="da-form-col-6-10">
												<label>ชื่อหน่วยงาน<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text"name="dpName" placeholder="ชื่อหน่วยงาน" />
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" title="กรอกข้อมูลชื่อหน่วยงาน" />
														
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


                    	<div class="grid_3_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/computer_imac.png" alt="" />
                                        ข้อมูลหน่วยงาน
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="25%">ชื่อหน่วยงาน</th>
                                                
												<th width="10%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php $i=1;
											foreach ($department->result_array() as $department) { 
											$ID = $this->encrypt->encode($department['dpID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
											?>
											 <tr>
												<td><?php echo $i;?></td>
                                                <td><?php echo $department['dpName'];//= $objResult->dpName; ?></td>
                                               
												<td>
													<input class="edit" type="image" src="<?php echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/department/edit/<?php echo $ID?>'"/>
													<?php $web = $department['dpID'];?>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/cross.png" onclick='return removedepartment(<?php echo $department['dpID'] ?>);' />
												</td>
											</tr>
											<?php
												$i+=1;
												
											}?>
											
                                        </tbody>
                                    </table>

                                  
                                    </div>
                            </div>
                        </div>
                                                
                    </div>
                    
                </div>
                
          