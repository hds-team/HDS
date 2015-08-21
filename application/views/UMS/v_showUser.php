				<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/showUserAdd.js"></script>
				<script type="text/javascript"> $(function() { $("#tabs").tabs(); }); </script>
				<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/permission.js"></script>
				<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/ums/showUserRemove.js"></script>-->
<script>
	function getname (name) {
		document.getElementById("da-ex-dialog-modal").value = name;
		$("#da-ex-dialog-div").dialog( "close" );
	}					
	function removeuser(UsID)
{
	var web="<?php echo base_url()?>index.php/UMS/showUser/remove/"+UsID;
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
                
                	<!-- Content Area -->
                	<!-- <div id="da-content-area">
						<div class="grid_3_center">
							</?php if(isset($Icon)){?>
							<div class="da-panel collapsible">
                        	</?php }else{?>
								<div class="da-panel collapsible collapsed">
								</?php }?>	
									<div class="da-panel-header" onclick="window.location.href='</?php echo base_url(); ?>index.php/UMS/showUser/showUserAdd'">
										<span class="da-panel-title"  >
											<img src="</?php echo base_url(); ?>/images/icons/black/16/pencil.png"   />
												เพิ่มข้อมูลผู้ใช้
										</span>
										
									</div>
								   
								</div>
							</div>
						
						</div> -->
                	<!-- Content Area -->
                	
                    	<div class="grid_3_center">
                        	<div class="da-panel ">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/32/users_2.png" alt="" />
                                        รายชื่อผู้ใช้ 
                                    </span>
                                    
                                </div>
								
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th width="10%">รหัสผู้ใช้</th>
                                                <th width="20%">ชื่อ-นามสกุล</th>
                                                <th width="15%">ชื่อเข้าใช้ระบบ</th>
												<th width="40%">หน่วยงาน</th>
												<th width="15%">ดำเนินการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$i=1;
											foreach ($user->result_array() as $row){
											$ID = $this->encrypt->encode($row['UsID']);
											$ID = str_replace("/","_",$ID);
											$ID = str_replace("+",":",$ID);
											$ID = str_replace("=","~",$ID);
											?>
											<tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row['UsName']; ?></td>
                                                <td><?php echo $row['UsLogin']; ?></td>
												<td><?php echo $row['dpName']; ?></td>
												<td>
													<input class="edit" type="image" src="<?php echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/showUser/edit/<?php echo $ID?>'"/>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/application_side_list.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/perMissionP/setGroup/<?php echo $ID?>'"/>
													<input type="image" src="<?php echo base_url(); ?>images/icons/color/cross.png" onclick='return removeuser(<?php echo $row['UsID'] ?>);' />
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



