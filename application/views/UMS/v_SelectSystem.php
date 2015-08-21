                
                <!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                	<!-- Content Area -->
                	<div id="da-content-area">				
                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="images/icons/black/16/computer_imac.png" alt="" />
                                        กรุณาเลือกระบบที่ต้องการ
                                    </span>
                                    
                                </div>
                                <div class="da-panel-content">
                                    <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
												<th width="30%">หน้าที่</th>
												<th width="30%">System Name</th>
                                                <th width="30%">ชื่อระบบงาน</th>
												<th width="10%">แก้ไขสิทธิ์</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
											foreach ($show as $row){//while($objResult = mysql_fetch_object($dbarr)){//foreach ( $dbrr as $row )
											?>
                                            <tr>
												<td><?php echo $row['GpNameT'];//= $objResult->GpNameT; ?></td>
												<td><?php echo $row['StNameE'];//= $objResult->StNameE; ?></td>
                                                <td><?php echo $row['StNameT'];//= $objResult->StNameT; ?></td>
												<td>
													<input type="image" src="<?php echo base_url(); ?>/images/icons/color/application_side_list.png" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/perMissionP/setPermission/?GpID=<?php echo $row['GpID'];?>&StID=<?php echo $row['StID'];?>&UsID=<?php echo $UsID;?>'">

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
                
  