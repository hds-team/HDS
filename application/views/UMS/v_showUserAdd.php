	<script type="text/javascript"> $(function() { $("#tabs").tabs(); }); </script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/showUserAdd.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/permissionuser.js"></script>
	<!--<script>
		var keylist="ABCDEFGHIJKLNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&?"
		var temp=''
			function generatepass(plength){
				temp=''
				for (i=0;i<plength;i++)
					temp+=keylist.charAt(Math.floor(Math.random()*keylist.length))
				return temp
			}
			function populateform(enterlength=8){
				document.pgenerate.UsPassword.value=generatepass(enterlength=8)
			}
	</script>-->
                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_3_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url();?>/images/icons/black/16/cog_2.png" alt="" />
                                        กำหนดกลุ่มระบบงานของผู้ใช้ <br />
                                    </span>
                                    
                                </div>
				<form name="pgenerate"id="validate-User" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showUser/add" >
					<div id="valUser-error" class="da-message error" style="display:none;"></div>
						<div class="da-form-inline">
						<div class="demo">
								<div id="tabs">
									<ul>
										<li><a href="#tabs-1">เพิ่มข้อมูลผู้ใช้</a></li>
										<li><a href="#tabs-2">เพิ่มระบบงานของผู้ใช้</a></li>
														<?php	$hdAc = 0;$hdAd = 0;?>
									</ul>
										<div id="tabs-1">
											<div class="da-panel-content">
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>รหัสผู้ใช้ <span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="text" name="UsPsCode"  placeholder="รหัสบุคลากร / รหัสนักศึกษา"/>
														</div>
													</div>
												</div>
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>ชื่อ-สกุล <span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="text" name="UsName"  placeholder="ชื่อ-สกุล"/>
														</div>
													</div>
												</div>
												<div class="da-form-row">
													<div class="da-form-col-10-10">
														<label>กลุ่มผู้ใช้<span class="required">*</span></label>
														<div class="da-form-item default"> 
															<select name="UsWgID"> 
																<option value="">-- กรุณาเลือกกลุ่มผู้ใช้ --</option> 
																	<?php foreach ($groupname->result_array() as $optgroupname){ ?>
																<option value="<?php echo $optgroupname['WgID']; ?>"><?php echo $optgroupname['WgNameT']; ?></option>
																	<?php } ?>	
															</select>
														</div>
													</div>	
												</div>	
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>ชื่อผู้ใช้ <span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="text" name="UsLogin"  placeholder="ชื่อสำหรับ login"/>
														</div>
													</div>
												</div>	
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>รหัสผ่าน<span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="password" name="UsPassword"  placeholder="กรอกไม่เกิน 20 ตัวอักษร"/>
															
														</div>
													</div>
												</div>
												<div class="da-form-row">
													<div class="da-form-col-10-10">
														<label>หน่วยงาน<span class="required">*</span></label>
														<div class="da-form-item default"> 
															<select name="UsDpID"> 
																<option value="">-- กรุณาเลือกหน่วยงาน --</option> 
																	<?php foreach ($department->result_array() as $optdepartment){?>
																<option value="<?php echo $optdepartment['dpID']; ?>"><?php echo $optdepartment['dpName']; ?></option>
																	<?php }?>
															</select>
														</div>
													</div>	
												</div>
												<div class="da-form-row">
													<div class="da-form-col-10-10">
														<label>คำถามส่วนตัว<span class="required">*</span></label>
														<div class="da-form-item default"> 
															<select name="UsQsID"> 
																<option value="">-- กรุณาเลือกคำถามส่วนตัว --</option> 
																	<?php foreach ($question->result_array() as $optquestion){?>
																<option value="<?php echo $optquestion['QsID']; ?>"><?php echo $optquestion['QsDescT']; ?></option>
																	<?php }?>
															</select>
														</div>
													</div>	
												</div>
												
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>คำตอบ <span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="text" name="UsAnswer"  placeholder="กรุณากรอกคำตอบ"/>
														</div>
													</div>
												</div>
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>E-mail<span class="required">*</span></label>
														<div class="da-form-item large">
															<input type="text" name="UsEmail"  placeholder="example@example.com"/>
														</div>
													</div>
												</div>
												<div class="da-form-row">
													<div class="da-form-col-6-10">
														<label>หมายเหตุ<span class="required"></span></label>
														<div class="da-form-item large">
															<textarea cols="auto" rows="auto" name="UsDesc"  placeholder=" กรอกคำอธิบาย "></textarea>
														</div>
													</div>
												</div>
											
												<br />
												<div class="da-form-col-6-10">
													<tr>
														<td><input type="checkbox"  name="UsActive"  id="UsActive" />Active<br /></td>
														<input type = "hidden" name ="hiddenUsActive" value = "<?php echo $hdAc; ?>" />
														<td><input type="checkbox"  name="UsAdmin"  id="UsAdmin" />Administrator<br /></td>
														<input type = "hidden" name ="hiddenUsAdmin"  value = "<?php echo $hdAd; ?>" />
													</tr>
													
												</div><br /><br /><br />
												
												
								
									

											</div>	
										</div>	
										
										<div id="tabs-2">
											<div class="da-panel-content">
												
													<table class="da-table">
														<tbody>
															<?php foreach($sysname as $sys) {
																	$check = "";
																	$hdcheck = 0;
																foreach($persys as $per){
																	if($sys['GpID'] == $per['GpID']){
																		$check = "checked";
																		$hdcheck = 1;
																		echo $hdcheck;
																	}
																} ?>
															<tr>
																<td>
																<input type="checkbox" name = "<?php echo $sys['GpID']; ?>" id="<?php echo $sys['GpID'];?>"  /> 
																<input type="hidden" name = "hidden<?php echo $sys['GpID']; ?>" value = "<?php echo $hdcheck; ?>" /> 
																</td>
																<td><?php echo $sys['StNameT']; ?>&nbsp; ( <?php echo $sys['GpNameT']; ?> )</td>
															</tr>
															<?php  }?>
														</tbody>										
													</table>	
													
											</div>								
										</div>
								<div class="da-button-row" align = "right">									
										<input  id="submit" class="da-button green" type="submit"  name="submit" value="บันทึก"  />
										<input id="cancle" class="da-button red" type="button" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showUser/'" value="ยกเลิกการแก้ไข" name="cancle" />
										
								</div>
							</div> 
							
					
						</div>
					</div>			
			
	</form>
                            </div>
                        </div>         
                    </div>
                    
                         
