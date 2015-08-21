					<script>
					function removemenu(MnID,count)
{
	var web="<?php echo base_url()?>index.php/UMS/showSystem/removemenu/"+MnID;
	if(count==0){
		if(confirm("คุณต้องการลบหรือไม่?")==true){
		window.location.href=web;
		}
		else
		{
			return false;
		}
	}
	else
	{
		alert("เมนูนี้มีเมนูย่อยไม่สามารถลบได้")
		return false
	}
}	
					</script>
					<script type="text/javascript" src="<?php  echo base_url(); ?>js/demo/demo.tableMenu.js"></script>
				<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
					<?php if($OK == 2){?>
						<div id="showpopupdup">ชื่อเมนูนี้มีอยู่แล้ว กรุณาสร้างใหม่</div>
					<?php }
						if($OK == 1){?>
						<div id="showpopup">บันทึกข้อมูลเสร็จสมบูรณ์</div>
					<?php }?>
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_4_center">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
										 <img src="<?php  echo base_url(); ?>/images/icons/black/16/computer_imac.png" alt="" />
                                        กำหนดเมนูระบบ
                                    </span>
                                </div>
								<form method="post" action="<?php  echo base_url(); ?>index.php/UMS/showSystem/SaveSeq">
                                <div class="da-panel-content with-padding">
									
									<?php   foreach( $menu1 as $main ) { 
											$MnID = $this->encrypt->encode($main['MnID']);
											$ID = str_replace("/","_",$MnID);
											$ID = str_replace("+",":",$ID);
											$MnID = str_replace("=","~",$ID);
											$MnStID = $this->encrypt->encode($main['MnStID']);
											$ID = str_replace("/","_",$MnStID);
											$ID = str_replace("+",":",$ID);
											$MnStID = str_replace("=","~",$ID);
											
										if ($main['MnLevel']==0||$main['MnParentMnID']==NULL){?>
									<div class="Menu">
										<div class="Menu-header">
											<div class="Desc">
												<?php echo $main['MnNameT'];?>
												<input type="hidden" name="Seq[]" value="<?php echo $main['MnID']?>"/>
											</div>
											<div class="Option">
												<img src="<?php  echo base_url(); ?>/images/icons/color/add.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/addMenu/<?php echo $MnID."/".$MnStID?>' "/>
												<img src="<?php  echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/editMenu/<?php echo $MnID."/".$MnStID?>'"/>
												<?php  $count=0;
												foreach($menu1 as $countsub){
													if($countsub['MnParentMnID']==$main['MnID']){
													$count++;}}
												?>
												<img src="<?php  echo base_url(); ?>/images/icons/color/cross.png" onclick='return removemenu(<?php echo $main['MnID']?>,<?php echo $count ?>);' />
											</div>
										</div>
										<div class="Menu-content">
										<?php 	foreach ($menu1 as $sub) {
											$MnID = $this->encrypt->encode($sub['MnID']);
											$ID = str_replace("/","_",$MnID);
											$ID = str_replace("+",":",$ID);
											$MnID = str_replace("=","~",$ID);
											$MnStID = $this->encrypt->encode($sub['MnStID']);
											$ID = str_replace("/","_",$MnStID);
											$ID = str_replace("+",":",$ID);
											$MnStID = str_replace("=","~",$ID);
											if($sub['MnParentMnID']==$main['MnID']) {  
												$i=0;
												foreach($menu1 as $sub2count) {
												if($sub2count['MnParentMnID']==$sub['MnID']) {
													$i++;
													foreach($menu1 as $sub3count) {
													if($sub3count['MnParentMnID']==$sub2count['MnID']) {
													$i++;
														foreach($menu1 as $sub4count) {
														if($sub4count['MnParentMnID']==$sub3count['MnID']) {
														$i++;
														}}
													}}
												}}
												
											?>
											<div class="SubMenu" style="margin-bottom:<?php echo $i*29.2?>px">
												<div class="Sub-header">
													<div class="Desc">
														<?php  echo $sub['MnNameT']; ?>
														<input type="hidden" name="Seq[]"  value="<?php echo $sub['MnID']?>"/>
													</div>
													<div class="Opt">
														<img src="<?php  echo base_url(); ?>/images/icons/color/add.png"  onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/addMenu/<?php echo $MnID."/".$MnStID?>' " />
														<img src="<?php  echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/editMenu/<?php echo $MnID."/".$MnStID?>'"/>
														<?php  $count=0;
														foreach($menu1 as $countsub2){
														if($countsub2['MnParentMnID']==$sub['MnID']){
														$count++;}}
														?>
														<img src="<?php  echo base_url(); ?>/images/icons/color/cross.png" onclick='return removemenu(<?php echo $sub['MnID']?>,<?php echo $count ?>);' />
													</div>
												</div>
													
												<div class="Sub-content">
													<?php 	foreach ($menu1 as $subsub) {
														$MnID = $this->encrypt->encode($subsub['MnID']);
														$ID = str_replace("/","_",$MnID);
														$ID = str_replace("+",":",$ID);
														$MnID = str_replace("=","~",$ID);
														$MnStID = $this->encrypt->encode($subsub['MnStID']);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
													
														if($subsub['MnParentMnID']==$sub['MnID']) { 
													
														$j=0;
														foreach($menu1 as $sub3count) {
														if($sub3count['MnParentMnID']==$subsub['MnID']) {
														$j++;
															foreach($menu1 as $sub4count) {
															if($sub4count['MnParentMnID']==$sub3count['MnID']) {
															$j++;
															}}
														}}
													
													?>
													<div class="SubSubMenu" style="margin-bottom:<?php echo $j*28.5?>px">
														<div class="SubSub-header">
															<div class="SSDesc">
																<?php  echo $subsub['MnNameT']; ?>
																<input type="hidden" name="Seq[]" value="<?php echo $subsub['MnID']?>" />
															</div>
															<div class="SSOpt">
																<img src="<?php  echo base_url(); ?>/images/icons/color/add.png"  onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/addMenu/<?php echo $MnID."/".$MnStID?>' " />
																<img src="<?php  echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/editMenu/<?php echo $MnID."/".$MnStID?>'"/>
																<?php  $count=0;
																foreach($menu1 as $countsub3){
																if($countsub3['MnParentMnID']==$subsub['MnID']){
																$count++;}}
																?>
																<img src="<?php  echo base_url(); ?>/images/icons/color/cross.png" onclick='return removemenu(<?php echo $subsub['MnID']?>,<?php echo $count ?>);' />
															</div>
														</div>
														<div class="SubSub-content">
														<?php 	foreach ($menu1 as $sub3) {
															$MnID = $this->encrypt->encode($sub3['MnID']);
															$ID = str_replace("/","_",$MnID);
															$ID = str_replace("+",":",$ID);
															$MnID = str_replace("=","~",$ID);
															$MnStID = $this->encrypt->encode($sub3['MnStID']);
															$ID = str_replace("/","_",$MnStID);
															$ID = str_replace("+",":",$ID);
															$MnStID = str_replace("=","~",$ID);
															if($sub3['MnParentMnID']==$subsub['MnID']) { 
															
															$k=0;
															foreach($menu1 as $sub4count) {
															if($sub4count['MnParentMnID']==$sub3['MnID']) {
															$k++;
															}}
															?>
															<div class="Sub3Menu" style="margin-bottom:<?php echo $k*28.9?>px">
																<div class="Sub3-header">
																	<div class="S3Desc">
																		<?php  echo $sub3['MnNameT']; ?>
																		<input type="hidden" name="Seq[]"  value="<?php echo $sub3['MnID']?>"/>
																	</div>
																	<div class="S3Opt">
																		<img src="<?php  echo base_url(); ?>/images/icons/color/add.png"  onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/addMenu/<?php echo $MnID."/".$MnStID?>' " />
																		<img src="<?php  echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/editMenu/<?php echo $MnID."/".$MnStID?>'"/>
																		<?php  $count=0;
																		foreach($menu1 as $countsub4){
																		if($countsub4['MnParentMnID']==$sub3['MnID']){
																		$count++;}}
																		?>
																		<img src="<?php  echo base_url(); ?>/images/icons/color/cross.png" onclick='return removemenu(<?php echo $sub3['MnID']?>,<?php echo $count ?>);' />
																	</div>
																</div>
																<div class="Sub3-content">
																<?php 	foreach ($menu1 as $sub4) {
																	$MnID = $this->encrypt->encode($sub4['MnID']);
																	$ID = str_replace("/","_",$MnID);
																	$ID = str_replace("+",":",$ID);
																	$MnID = str_replace("=","~",$ID);
																	$MnStID = $this->encrypt->encode($sub4['MnStID']);
																	$ID = str_replace("/","_",$MnStID);
																	$ID = str_replace("+",":",$ID);
																	$MnStID = str_replace("=","~",$ID);
																	if($sub4['MnParentMnID']==$sub3['MnID']) { 
																	?>
																	<div class="Sub4Menu">
																		<div class="Sub4-header">
																			<div class="S4Desc">
																				<?php  echo $sub4['MnNameT']; ?>
																				<input type="hidden" name="Seq[]"  value="<?php echo $sub4['MnID']?>"/>
																			</div>
																			<div class="S4Opt">
																				<img src="<?php  echo base_url(); ?>/images/icons/color/application_edit.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/editMenu/<?php echo $MnID."/".$MnStID?>'"/>
																				<?php  $count=0;
																				foreach($menu1 as $countsub4){
																				if($countsub4['MnParentMnID']==$sub4['MnID']){
																				$count++;}}
																				?>
																				<img src="<?php  echo base_url(); ?>/images/icons/color/cross.png" onclick='return removemenu(<?php echo $sub4['MnID']?>,<?php echo $count ?>);' />
																			</div>
																		</div>
																	</div>
																	<?php  }
																	} ?>
																</div>
															</div>
															<?php  }
															} ?>
														</div>
													</div>
													<?php  }
													} ?>
												</div>
											</div>
											<?php  } }?>
										</div>
									</div>
									<?php }}?>
									
								</div>
								<div class="da-panel-content1 with-padding">
									<div class="Add">
										<div class="Menu-header">
											<div class="Desc">
												<?php   foreach( $menu1 as $main2 ) {		
														$MnStID = $this->encrypt->encode($main2['MnStID']);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
												?>
												<input type="hidden" name="MnStID" value="<?php echo $MnStID?>">
												<?php }?>
												<input id="submit" class="da-button green" type="submit" value="บันทึก" name="submit"></input>
											</div>
											</form>
											<div class="Option">
												<?php   foreach( $menu1 as $main1 ) {		
														$MnStID = $this->encrypt->encode($main1['MnStID']);
														$ID = str_replace("/","_",$MnStID);
														$ID = str_replace("+",":",$ID);
														$MnStID = str_replace("=","~",$ID);
												?>
                                    <img align="right" src="<?php  echo base_url(); ?>/images/icons/color/add.png" onclick="window.location.href='<?php  echo base_url(); ?>index.php/UMS/showSystem/addMain/<?php echo $MnStID?>' "/>
									<br/>
									<?php  break; } ?>
											</div>
										</div>
									</div>
								</div>
								
                                
								
								
							</div>
                    
						</div>
                
					</div>
            
				</div>