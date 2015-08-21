<style type="text/css"> 
.onmouse:hover{background-color:#f2efef;}
</style>
<script type="text/javascript" src="<?php  echo base_url(); ?>/js/jquery-minicolors-master/jquery.minicolors.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>/js/jquery-minicolors-master/jquery.minicolors.css">
<script>
	function getname (name,src) {
		document.getElementById("HeadIcon").value =name;
		document.getElementById("da-ex-dialog-modal").src =src;
		document.getElementById("da-header-logo2").src =src;
		$("#da-ex-dialog-div").dialog( "close" );
	};

		$(document).ready( function() {
			var HH = document.getElementById("HeightHeadTop").value;
			$( "#slider-vertical" ).slider({
			orientation: "vertical",
			range: "min",
			min: 58,
			max: 140,
			value: HH,
			slide: function( event, ui ) {
			$( "#HeightHeadTop" ).val( ui.value );
			}
		});
		$( "#HeightHeadTop" ).val( $( "#slider-vertical" ).slider( "value" ) );
			
			
			$('#slider-vertical').mousemove( function() {
				var HH = document.getElementById("HeightHeadTop").value;
				$("#da-header-top2").css("height",HH+'px');
				document.getElementById("MarginHeadTop").value = '5%';
				$("#da-header-logo2").css("height",HH+'px');
				if(HH < 70){
					//$("#da-header-logo2").css("margin-top",'0px');
					$("#da-header-toolbar2").css("margin-top",'0px');
					document.getElementById("MarginHeadTop").value = '0';
				}else if(HH < 100){
					//$("#da-header-logo2").css("margin-top",(HH/7)+'px');
					$("#da-header-toolbar2").css("margin-top",(HH/7)+'px');
					document.getElementById("MarginHeadTop").value = HH/7;
				}else if(HH < 120){
					//$("#da-header-logo2").css("margin-top",(HH/4.5)+'px');
					$("#da-header-toolbar2").css("margin-top",(HH/4.5)+'px');
					document.getElementById("MarginHeadTop").value = HH/4.5;
				}else{
					//$("#da-header-logo2").css("margin-top",(HH/3.5)+'px');
					$("#da-header-toolbar2").css("margin-top",(HH/3.5)+'px');
					document.getElementById("MarginHeadTop").value = HH/3.5;
				}
			});
			$('#ColorHeadTop').change( function() {
				var ColorTop = document.getElementById("ColorHeadTop").value;
				$("#da-header-top2").css("background",ColorTop);
			});
			$('#ColorHeadBottom').change( function() {
				var ColorBottom = document.getElementById("ColorHeadBottom").value;
				$("#da-header-bottom2").css("background",ColorBottom);
			}); 
			
			//ChangeButtonColor
			$('#ColorBTop1').change( function() {
				$('#da-user-profile2-white').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-black.png) no-repeat right center');
				$('#da-user-info2-white').css("color",'black');
				$('.da-user-title2-white').css("color",'black');
				$('.da-header-button2-white').css("border","1px solid #000");
				$('.message.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/message_small.png)");
				$('.logout.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/off_small.png)");
			});			
            $('#ColorBTop2').change( function() {
				$('#da-user-profile2-white').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-black.png) no-repeat right center');
				$('#da-user-info2-white').css("color",'black');
				$('.da-user-title2-white').css("color",'black');
				$('.da-header-button2-white').css("border","1px solid #000");
				$('.message.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/message_small.png)");
				$('.logout.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/off_small.png)");
			});
			$('#ColorBTop3').change( function() {
				$('#da-user-profile2-white').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-white.png) no-repeat right center');
				$('#da-user-info2-white').css("color",'white');
				$('.da-user-title2-white').css("color",'white');
				$('.da-header-button2-white').css("border","1px solid #fff");
				$('.message.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/message_small.png)");
				$('.logout.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/off_small.png)");
			});
			$('#ColorBTop4').change( function() {
				$('#da-user-profile2-white').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-white.png) no-repeat right center');
				$('#da-user-info2-white').css("color",'white');
				$('.da-user-title2-white').css("color",'white');
				$('.da-header-button2-white').css("border","1px solid #fff");
				$('.message.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/message_small.png)");
				$('.logout.da-header-button2-white > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/off_small.png)");
			});
			
			
			$('#ColorBTop1').change( function() {
				$('#da-user-profile2-black').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-black.png) no-repeat right center');
				$('#da-user-info2-black').css("color",'black');
				$('.da-user-title2-black').css("color",'black');
				$('.da-header-button2-black').css("border","1px solid #000");
				$('.message.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/message_small.png)");
				$('.logout.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/off_small.png)");
			});
            $('#ColorBTop2').change( function() {
				$('#da-user-profile2-black').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-black.png) no-repeat right center');
				$('#da-user-info2-black').css("color",'black');
				$('.da-user-title2-black').css("color",'black');
				$('.da-header-button2-black').css("border","1px solid #000");
				$('.message.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/message_small.png)");
				$('.logout.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/black/16/off_small.png)");
			});
			$('#ColorBTop3').change( function() {
				$('#da-user-profile2-black').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-white.png) no-repeat right center');
				$('#da-user-info2-black').css("color",'white');
				$('.da-user-title2-black').css("color",'white');
				$('.da-header-button2-black').css("border","1px solid #fff");
				$('.message.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/message_small.png)");
				$('.logout.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/off_small.png)");
			});
            $('#ColorBTop4').change( function() {
				$('#da-user-profile2-black').css("background",'url(<?php echo base_url()?>images/user-drop-arrow-white.png) no-repeat right center');
				$('#da-user-info2-black').css("color",'white');
				$('.da-user-title2-black').css("color",'white');
				$('.da-header-button2-black').css("border","1px solid #fff");
				$('.message.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/message_small.png)");
				$('.logout.da-header-button2-black > a').css("background-image","url(<?php echo base_url()?>images/icons/white/16/off_small.png)");
			});
			
			//ColorButtonButtom
			$('#ColorBBottom1').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/black/32/new-list.png';
				$('#list-menu-name').css('color','black');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/black/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','black');
			});
			$('#ColorBBottom2').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/black/32/new-list.png';
				$('#list-menu-name').css('color','black');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/black/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','black');
			});
			$('#ColorBBottom3').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/white/32/new-list.png';
				$('#list-menu-name').css('color','white');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/white/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','white');
			});
			$('#ColorBBottom4').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/white/32/new-list.png';
				$('#list-menu-name').css('color','white');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/white/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','white');
			});
			
			
			$('#ColorBBottom1').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/black/32/new-list.png';
				$('#list-menu-name').css('color','black');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/black/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','black');
				$('#HomeButton').css('color','black');
			});
			$('#ColorBBottom2').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/black/32/new-list.png';
				$('#list-menu-name').css('color','black');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/black/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','black');
				$('#HomeButton').css('color','black');
			});
			$('#ColorBBottom3').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/white/32/new-list.png';
				$('#list-menu-name').css('color','white');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/white/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','white');
				$('#HomeButton').css('color','white');
			});
			$('#ColorBBottom4').change( function() {
				document.getElementById('list-menu-image2').src = '<?php  echo base_url(); ?>images/icons/white/32/new-list.png';
				$('#list-menu-name').css('color','white');
				document.getElementById('home').src = '<?php  echo base_url(); ?>images/icons/white/16/home.png';
				$('#da-breadcrumb2-black ul li a').css('color','white');
				$('#HomeButton').css('color','white');
			});
			
			
			
			$('.colorpicker').minicolors();
               
            
			
		});
	</script>
<!-- Main Content Wrapper -->
                <div id="da-content-wrap" class="clearfix">
                
                	<!-- Content Area -->
                	<div id="da-content-area">
                    	<div class="grid_5">
                        	<div class="da-panel">
                            	<div class="da-panel-header">
                                	<span class="da-panel-title">
                                        <img src="<?php  echo base_url(); ?>images/icons/black/32/computer_imac.png" alt="" />
											ระบบ....
                                    </span>
                                </div>
                                <div class="da-panel-content with-padding">
											<div class="preview" style="height:200px">	
												<div id="da-header" style="z-index:0">
													
													<div id="da-header-top2" style="height:<?php echo $tem['HeightHeadTop']?>px;background:<?php echo $tem['ColorHeadTop']?>;">
													<!-- Container -->
														<div class="da-container clearfix" >
													<!-- Logo Container. All images put here will be vertically centere -->
															<div id="da-logo-wrap2">
																<div id="da-logo2">
																	<div id="da-logo-img2">
																		<a href="#">
																		<?php 
																			$path = $this->config->item('uploads_url');
																			$pathString = $path."header&image=".$tem['HeadIcon'];
																		?>
																			<img id="da-header-logo2" src="<?php  echo $pathString; ?>" alt="Dandelion Admin" style="height:<?php echo $tem['HeightHeadTop']; ?>px;"/>
																		</a>
																	</div>
																</div>
															</div>
						
															<!-- Header Toolbar Menu -->
															<div id="da-header-toolbar2" class="clearfix" style="margin-top:<?php echo $tem['MarginHeadTop']?>px;">
																<div id="da-user-profile2-<?php echo $tem['ColorTopButton']?>">
																<div id="da-user-info2-<?php echo $tem['ColorTopButton']?>">
																Test
																<span class="da-user-title2-<?php echo $tem['ColorTopButton']?>">
																USER
																</span>
																</div>
															
																</div>
																<div id="da-header-button-container2">
																<ul>
																<!--<li class="da-header-button2-<?php echo $tem['ColorTopButton']?> message">
																	<span class="da-button-count">*</span>
																	<a href="#">Notifications</a>
																</li>-->
																<li class="da-header-button2-<?php echo $tem['ColorTopButton']?> logout">
																<a href="#" title="Logout">Logout</a>
																</li>
																</ul>
																</div>
															</div>
										
														</div>
													</div>
													<div id="da-header-bottom2"  style="background:<?php echo $tem['ColorHeadBottom']?>;">
													<!-- Container -->
														<div class="da-container clearfix">
															<div id="da-search" class="slidemarginleft">
																<p>
																	<a style="color: grey; text-decoration: none;" href="javascript:void(0)">
																		<span class="list-menu-image"><img id="list-menu-image2" src="<?php  echo base_url(); ?>images/icons/<?php echo $tem['ColorBottomButton']?>/32/new-list.png"></span>
																		<span class="list-menu-name" id="list-menu-name" style="color:<?php echo $tem['ColorBottomButton']?>;">เมนู</span>
																	</a>
																</p>
															
															</div>
															
														<!-- Breadcrumbs -->
															<div id="da-breadcrumb2-<?php echo $tem['ColorBottomButton']?>">
																<ul>
																	<li><a href="#" id="HomeButton"><img id="home" src="<?php  echo base_url(); ?>images/icons/<?php echo $tem['ColorBottomButton']?>/16/home.png" alt="Home" />Home</a></li>
																</ul>
															</div>
						
														</div>
													</div>
												</div>
											
											</div>
											<div class="console" clear style="margin-top:30px;">
												<div class="header">
													Console
												</div>
												<div class="content">
													<?php 
														$ID = $this->encrypt->encode($StID);
														$ID = str_replace("/","_",$ID);
														$ID = str_replace("+",":",$ID);
														$ID = str_replace("=","~",$ID);
													?>
													<form action="<?php  echo base_url(); ?>index.php/UMS/configSystem/updateHead/<?php echo $ID?>" method="POST" >
													<table>
														
														<tr>
															<th style="width:230px;">  ICON</th>
															<th>  HEIGHT TOP HEADER</th>
															<th>  TOP BG COLOR </th>
															<th>  TOP FONT COLOR</th>
															<th>  BOTTOM BG COLOR</th>
															<th>  BOTTOM FONT COLOR</th>
														</tr>
														<tr>
															<td>
																
																<?php 
																			$path = $this->config->item('uploads_url');
																			$pathString = $path."header&image=".$tem['HeadIcon'];
																?>
																<img src="<?php echo $pathString; ?>" id="da-ex-dialog-modal" style="max-width: 230px;max-height: 55px;">
																<input type="hidden" id="HeadIcon" name="HeadIcon" value="<?php echo $tem['HeadIcon']; ?>">
																
																
																<div id="da-ex-dialog-div" class="no-padding">
																
																	<?php 
																	foreach($icon as $show){ 
																			$path = $this->config->item('uploads_url');
																			$pathString = $path."header&image=".$show['IcName'];
																			$name = $show['IcName'];
																	?>
																	<input type="image" style="max-width:200px;max-height:100px;" value="submit" src="<?php  echo $pathString; ?>" onclick="getname('<?php echo $name; ?>','<?php echo $pathString; ?>')">
																	
																	<?php }?>
																
																</div>
															</td>
															<td>
																<input type="hidden" id="HeightHeadTop" name="HeightHeadTop" value="<?php echo $tem['HeightHeadTop']?>"/>
																<input type="hidden" id="MarginHeadTop" name="MarginHeadTop" value="<?php echo $tem['MarginHeadTop']?>"/>
																<div id="slider-vertical" style="margin-left:60px;"></div>
															</td>
															<td>
																	<input type="text" style="height:25px;" id="ColorHeadTop" name="ColorHeadTop" class="colorpicker" value="<?php echo $tem['ColorHeadTop']?>">
															</td>
															<td>
																
																<?php  if($tem['ColorTopButton']=='black'){?>
																<input id="ColorBTop1" type="radio" value="black" name="ColorTopButton" checked ><div class="ExBut" style="border:1px solid black;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/black/16/cog_2.png"/></div><br /><br />
																<?php }else{?>
																<input id="ColorBTop2" type="radio" value="black" name="ColorTopButton"><div class="ExBut" style="border:1px solid black;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/black/16/cog_2.png"/></div><br /><br />
																<?php }
																   if($tem['ColorTopButton']=='white'){?>
																<input id="ColorBTop3" type="radio" value="white" name="ColorTopButton" checked ><div class="ExBut" style="border:1px solid white;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/white/16/cog_2.png"/></div><br /><br />
																<?php }else{?>
																<input id="ColorBTop4" type="radio" value="white" name="ColorTopButton"><div class="ExBut" style="border:1px solid white;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/white/16/cog_2.png"/></div><br /><br />
																<?php }?>
																
																
															</td>
															<td>
																	<input type="text" style="height:25px;" id="ColorHeadBottom" name="ColorHeadBottom" class="colorpicker" data-inline="true" value="<?php echo $tem['ColorHeadBottom']?>">
															</td>
															
															<td>
																
																<?php  if($tem['ColorBottomButton']=='black'){?>
																<input id="ColorBBottom1" type="radio" value="black" name="ColorBottomButton" checked ><div class="ExBut" style="border:1px solid black;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/black/16/cog_2.png"/></div><br /><br />
																<?php }else{?>
																<input id="ColorBBottom2" type="radio" value="black" name="ColorBottomButton"><div class="ExBut" style="border:1px solid black;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/black/16/cog_2.png"/></div><br /><br />
																<?php }
																   if($tem['ColorBottomButton']=='white'){?>
																<input id="ColorBBottom3" type="radio" value="white" name="ColorBottomButton" checked ><div class="ExBut" style="border:1px solid white;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/white/16/cog_2.png"/></div><br /><br />
																<?php }else{?>
																<input id="ColorBBottom4" type="radio" value="white" name="ColorBottomButton"><div class="ExBut" style="border:1px solid white;padding:3px;"><img src="<?php  echo base_url(); ?>images/icons/white/16/cog_2.png"/></div><br /><br />
																<?php }?>
																
																
															</td>
														</tr>
														
														
													</table>
													<?php if($StID == 0){ ?>
													<div style="margin-bottom:1%;margin-left:15%;">
														<input type="submit" value="submit" name="submit" style="margin-left:30%;" />
														<input type="button" value="cancel" name="Cancel" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/configSystem/edit/<?php echo $ID?>'"/>
													</div>
													<?php }else{?>
													<div style="margin-bottom:1%;margin-left:15%;">
														<input type="button" value="default" name="default" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/configSystem/SetDefault/<?php echo $ID?>'" style="margin-left:30%;">
														<input type="submit" value="submit" name="submit" />
														<input type="button" value="cancel" name="Cancel" onclick="window.location.href='<?php echo base_url(); ?>index.php/UMS/configSystem/edit/<?php echo $ID?>'"/>
													</div>
													<?php }?>
													</form>
													
												</div>
											</div>
									
                           
										
								</div>
							</div>
						</div>
                
					</div>
            
				</div>