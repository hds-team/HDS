           <script>
		   function removeIcon(sid)
{
	var web="<?php echo base_url()?>index.php/UMS/showIcon/remove/"+sid;
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
						<div id="showpopupdup">ไม่สามารถอัพโหลดไฟล์ดังกล่าวได้ เนื่องจากไฟล์อาจมีขนาดใหญ่เกินไปหรือเป็นชนิดของไฟล์ที่ไม่ถูกต้อง</div>
					<?php }
						if($OK == 1){?>
						<div id="showpopup">บันทึกข้อมูลเสร็จสมบูรณ์</div>
					<?php }?>
                	<!-- Content Area -->
                	<div id="da-content-area">
						<div class="grid_2_center">
                        	<div class="da-panel collapsible collapsed">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php echo base_url(); ?>/images/icons/black/16/pencil.png" alt="" />
											เพิ่มไอคอนรูปภาพ
                                    </span>
                                </div>
                                <div class="da-panel-content">
								<form id="validate-Icon" method = "post" class="da-form" <?php echo form_open_multipart('UMS/showIcon/upload_file'); ?>
								
									<div id="valIcon-error" class="da-message error" style="display:none;"></div>
                                        <div class="da-form-row">
                                            <div class="da-form-col-3-10">
												<label>File <span class="required">*</span></label>
                                            </div>
											<div class="da-form-col-5-10">
                                                <input type="file" name="IcPic" class="da-custom-file" />
                                            </div>
										</div>
										<div class="da-form-row">
                                            <div class="da-form-col-3-10">
												<label>ชื่อไอคอน<span class="required">*</span></label>
                                            </div>
                                            <div class="da-form-col-5-10">
                                            	<input type="text" name="IcName"/>
                                            </div>
										</div>
										<div class="da-form-row">
											<div class="da-form-col-3-10">
												<label>ระบุชนิดไอคอน<span class="required">*</span></label>
											</div>
                                            <div class="da-form-col-5-10">
                                            	<select name="IcType">
                                                	<option value="menu">Menu</option>
                                                	<option value="header">Header</option>
                                                	<option value="gear">Gear</option>
													<option value="system">System</option>
                                                </select>
                                            </div>
                                        </div>
																		
										<div class="da-button-row">
											<input id="clear" class="da-button gray left" type="reset" value="เคลียร์ข้อมูล" name="clear"></input>
											<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
											<input id="cancle" class="da-button red" type="button" onclick="window.location.href='<?php echo base_url(); ?>index.php/showService/'" value="ยกเลิกการแก้ไข" name="cancle"></input>
										</div>
                                    </form>	

								</div>
                            </div>
                        </div>


                    	<div class="grid_4_center">
                        	<div class="da-panel" style="border-top:1px solid #bfbfbf">
							
                            	<!--<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src=" //echo base_url(); /images/icons/color/layout.png" alt="" />
                                        Icon Gallery
                                    </span>
                                </div>-->
                                <!--<div  class="da-panel-content with-padding">-->
									<div id="da-ex-tabs">
										<ul>
											<li><a href="#menu-icon">Menu Icons</a></li>
											<li><a href="#header-icon">Header Icons</a></li>
											<li><a href="#gear-icon">Gear Icons</a></li>
											<li><a href="#system-icon">System Icons</a></li>
										</ul>
									<div id="menu-icon">
                                    <div  class="da-gallery">
                                        <ul >
                                            <?php foreach($icon as $iconmenu){ 
														if($iconmenu['IcType'] == "menu"){
															$path = $this->config->item('uploads_url');
															$pathString = $path.$iconmenu['IcType']."&image=".$iconmenu['IcName'];

											?>
                                            <li >
                                                <img align = "left" src="<?php echo $pathString; ?>" alt="" />
												<span class="da-gallery-hover">
                                                    <ul>
                                                        <li class="da-gallery-delete"><a onclick = 'removeIcon("<?php echo $iconmenu['IcID'];?>")' >Delete</a></li>
                                                    </ul>
                                                </span>
                                            </li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
									</div>
									<div id="header-icon">
                                    <div  class="da-gallery">
                                        <ul >
                                            <?php foreach($icon as $iconheader){ 
														if($iconheader['IcType'] == "header"){
															$path = $this->config->item('uploads_url');
															$pathString = $path.$iconheader['IcType']."&image=".$iconheader['IcName'];
											?>
                                            <li >
												<?php //echo $iconheader['IcName']; echo "<br />"; echo $iconheader['IcID']; show value?>
                                                <img align = "left" src="<?php echo $pathString; ?>" alt="" />
												<span class="da-gallery-hover">
                                                    <ul>
                                                        <li class="da-gallery-delete"><a onclick = 'removeIcon("<?php echo $iconheader['IcID'];?>")' >Delete</a></li>
                                                    </ul>
                                                </span>

                                            </li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
									</div>
									<div id="gear-icon">
                                    <div  class="da-gallery">
                                        <ul >
                                            <?php foreach($icon as $icongear){ 
														if($icongear['IcType'] == "gear"){
															$path = $this->config->item('uploads_url');
															$pathString = $path.$icongear['IcType']."&image=".$icongear['IcName'];
											?>
                                            <li >
											<?php //echo $icongear['IcName']; echo "<br />"; echo $icongear['IcID']; value?>
                                                <img align = "left" src="<?php echo $pathString; ?>" alt="" />
												<span class="da-gallery-hover">
                                                    <ul>
                                                        <li class="da-gallery-delete"><a onclick = 'removeIcon("<?php echo $icongear['IcID'];?>")' >Delete</a></li>
                                                    </ul>
                                                </span>

                                            </li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
									</div>
									<div id="system-icon">
                                    <div  class="da-gallery">
                                        <ul >
                                            <?php foreach($icon as $iconsystem){ 
														if($iconsystem['IcType'] == "system"){
															$path = $this->config->item('uploads_url');
															$pathString = $path.$iconsystem['IcType']."&image=".$iconsystem['IcName'];
											?>
                                            <li >
											<?php //echo $iconsystem['IcName']; echo "<br />"; echo $iconsystem['IcID']; value?>
                                                <img align = "left" src="<?php echo $pathString; ?>" alt="" /> 
												<span class="da-gallery-hover">
                                                    <ul>
                                                        <li class="da-gallery-delete"><a onclick = 'removeIcon("<?php echo $iconsystem['IcID'];?>")' >Delete</a></li>
                                                    </ul>
                                                </span>

                                            </li>
                                            <?php } } ?>
                                        </ul>
                                    </div>
									</div>
									</div>
                               <!-- </div>  'removeicon( //echo $iconmenu['IcName']);' -->
                            </div>
                       </div>
                                                
                    </div>
					</div>
					<!--<a  onclick = 'removeicon( //echo $iconsystem['IcID'];)'>-->

                    


                    	 
                    	
                    