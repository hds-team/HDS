<script>
$(document).ready(function(){
	$("#TimeFrom").datepicker({ dateFormat: "yy/mm/dd" });
	$("#TimeTo").datepicker({dateFormat: "yy/mm/dd" });

});
</script>
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_4_center">
                        	<div id="manage" class="da-panel collapsible collapsed">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/pencil.png" alt="" />
											กำหนดช่วงเวลาในการค้นหา
                                    </span>
                                </div>
                                <div class="da-panel-content">
									<form id="validate-WG" class="da-form" method="post" action="<?php echo base_url(); ?>index.php/UMS/showLog/setTime">
										<div id="valWG-error" class="da-message error" style="display:none;"></div>
										<div class="da-form-inline">	
											<div class="da-form-row">
												<div class="da-form-col-5-10">
													<label>ระหว่าง วันที่<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="TimeFrom" id="TimeFrom" placeholder="" value="<?php echo $TimeFrom;?>"/>
													</div>
												</div>
												<div class="da-form-col-5-10">
													<label>ถึง<span class="required">*</span></label>
													<div class="da-form-item large">
														<input type="text" name="TimeTo" id="TimeTo" placeholder="" value="<?php echo $TimeTo;?>"/>
													</div>
												</div>		
											</div>
											<div class="da-form-row">
												<div class="da-form-col-5-10">
													<label>Username</label>
													<div class="da-form-item large">
														<input type="text" name="UsName" id="UsName" placeholder="" value="<?php echo $UsName;?>"/>
													</div>
												</div>
												<div class="da-form-col-5-10">
													<label>ชื่อ - นามสกุล</label>
													<div class="da-form-item large">
														<input type="text" name="UsLogin" id="UsLogin" placeholder="" value="<?php echo $UsLogin;?>"/>
													</div>
												</div>		
											</div>												
											<div class="da-button-row">
												<input id="submit" class="da-button blue" type="submit" value="ค้นหา" name="search"></input>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div><?php if(isset($log)){?>
						<div class="grid_4_center">
							<div class="da-panel">
								<div class="da-panel-header">
									<span class="da-panel-title">
										<img src="<?php echo base_url(); ?>/images/icons/black/16/computer_imac.png" alt="" />
                                        ประวัติการเข้าใช้ระบบ
									</span>
								</div>
								<div class="da-panel-content">
									<table id="da-ex-datatable-log" class="da-table">
										<thead>
											<tr>
												<th width="15%">วัน/เดือน/ปี เวลา </th>
												<th width="10%">User</th>
												<th width="25%">ชื่อ - นามสกุล</th>
												<th width="35%">กิจกรรมที่ทำ</th>
												<th width="10%">IP Address</th>

											</tr>
										</thead>
										<tbody>
										<?php foreach($log->result_array() as $Log)
										{
										?>
											<tr>
												<td><?php echo $Log['LogTime'];?></td>
												<td><?php echo $Log['UsLogin'];?></td>
												<td><?php echo $Log['UsName'];?></td>
												<td><?php echo $Log['LogAction'];?></td>
												<td><?php echo $Log['LogIP'];?></td>
											</tr>
										<?php }?>
										</tbody>
									</table>  
								</div>
							</div>
						</div> 
						<?php } ?>
					</div>
				</div>
		