<script>
	function getname (name) {
		document.getElementById("da-ex-dialog-modal").value = name;
		$("#da-ex-dialog-div").dialog( "close" );
	}					
	function removesystem(StID)
	{
		
		var web="<?php echo base_url()?>index.php/UMS/showSystem/remove/"+StID;
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
						<div id="showpopupdup">ชื่อระบบมีอยู่แล้ว กรุณาเลือกชื่อใหม่</div>
					<?php }
						if($OK == 1){?>
						<div id="showpopup">บันทึกข้อมูลเสร็จสมบูรณ์</div>
					<?php }?>
                	<!-- Content Area -->
                	<div id="da-content-area">
						<div class="grid_4_center">
                        	<div id="manage" class="da-panel collapsible">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/pencil.png" alt="" />
											จัดการข้อมูลระบบ
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
								<?php foreach ($edit as $edit){
											$ID = $this->encrypt->encode($edit['StID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
								?>
								<form id="validate-System" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showSystem/update/<?php echo $ID?>">
									<div id="valSys-error" class="da-message error" style="display:none;"></div>
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
													<label>ชื่อระบบ(ท)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="StNameT" placeholder="ชื่อระบบภาษาไทย" value="<?php echo $edit['StNameT']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไขชื่อระบบภาษาไทย"/>
													</div>
												</div>
												<div class="da-form-col-4-10">
													<label>ชื่อย่อระบบ(ท)</label>
													<div class="da-form-item large">
														<input type="text" name="StAbbrT"  placeholder="ชื่อย่อระบบภาษาไทย" value="<?php echo $edit['StAbbrT']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไขชื่อย่อระบบภาษาไทย"/>
													</div>
												</div>
											</div>	
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ชื่อระบบ(E)<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="StNameE" placeholder="ชื่อระบบภาษาอังกฤษ" value="<?php echo $edit['StNameE']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไขชื่อระบบภาษาไอังกฤษ"/>
													</div>
												</div>
												<div class="da-form-col-4-10">
													<label>ชื่อย่อระบบ(E)</label>
													<div class="da-form-item large">
														<input type="text" name="StAbbrE" placeholder="ชื่อย่อระบบภาษาอังกฤษ" value="<?php echo $edit['StAbbrE']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไขชื่อย่อระบบภาษาอังกฤษ"/>
													</div>
												</div>
											</div>	
											
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>คำอธิบาย</label>
													<div class="da-form-item large">
														<textarea name="StDesc" placeholder="คำอธิบายระบบ" ><?php echo $edit['StDesc']?></textarea>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;margin-top:-200px;"alt="" class="da-tooltip-w" title="แก้ไขคำอธิบายระบบ"/>
													</div>
												</div>
											</div>	
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>หน้าแรกของระบบ<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="StURL" placeholder="URL หน้าแรกของระบบ" value="<?php echo $edit['StURL']?>"/>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไข  URL ระบบ"/>
													</div>
												</div>
											</div>	
											<div class="da-form-row">
												<div class="da-form-col-6-10">
													<label>ไอคอน</label>
													<div class="da-form-item large">
														<input type="text" name="StIcon" id="da-ex-dialog-modal" placeholder="ไอคอนของระบบ" value="<?php echo $edit['StIcon']?>"/>
														<div id="da-ex-dialog-div" class="no-padding">
															<form>
																<div class="da-form-inline">
																	<?php foreach($showicon->result_array() as $icon){?>
																		<input type="image" style="max-width:200px;max-height:100px;" <?php $path = $this->config->item('uploads_url'); $pathString = $path.$icon['IcType']."&image=".$icon['IcName']; ?>src="<?php echo $pathString;?>" onclick="getname('<?php echo $icon['IcName'];?>')">
																	<?php }?>
																</div>
															</form>
														</div>
														<img src="<?php echo base_url(); ?>/images/icons/Help.png" style="width:20px;height:20px;"alt="" class="da-tooltip-w" title="แก้ไขไอคอนระบบ"/>
													</div>
												</div>
											</div>	
											<?php
											}
											?>
										
											<div class="da-button-row">
												<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear"></input>
												<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
												<input id="cancle" class="da-button red" type="button" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showSystem/'" value="ยกเลิกการแก้ไข" name="cancle"></input>
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
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/computer_imac.png" alt="" />
                                        ข้อมูลระบบ
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th width="5%">No.</th>
                                                <th width="30%">ชื่อระบบงาน</th>
                                                <th width="30%">System Name</th>
                                                <th width="10%">ตัวย่อ</th>
                                                <th width="5%">Icon</th>
												<th width="25%">Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
											$i=1;
											foreach ($showsys->result_array() as $row){//while($objResult = mysql_fetch_object($dbarr)){//foreach ( $dbrr as $row )
											$ID = $this->encrypt->encode($row['StID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
											?>
                                            <tr>
												<td><?php echo $i++;//= $objResult->StID; ?></td>
                                                <td><?php echo $row['StNameT'];//= $objResult->StNameT; ?></td>
                                                <td><?php echo $row['StNameE'];//= $objResult->StNameE; ?></td>
                                                <td><?php echo $row['StAbbrE'];//= $objResult->StAbbrE; ?></td>
                                                <td><?php echo $row['StIcon'];//= $objResult->StIcon; ?></td>
												<td>
													<input class="edit" type="image" src="<?php echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showSystem/edit/<?php echo $ID?>'"/>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/application_side_list.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showSystem/showMenu/'">
													<?php $web = $row['StID'];?>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/cross.png" onclick='return removesystem(<?php echo $row['StID']?>);' />
												</td>
											</tr>
											<?php
												}
											?>
											
                                        </tbody>
                                    </table>
								</div>
                            </div>
                        </div>
                                                
                    </div>
                    
                </div>
				
