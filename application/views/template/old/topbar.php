                    <script type="text/javascript">
                    $(document).ready(function() {
                      $('.slidemarginleft p').click(function() {
                        var $marginLefty = $(this).next();
                        $marginLefty.animate({
                          marginLeft: parseInt($marginLefty.css('marginLeft'),10) == 0 ?
                            $marginLefty.outerWidth() :
                            0
                        });
                      });
                    });

                    </script>
                        <style type="text/css">
                        .slide {
                          position: relative;
                          width: 215px;
                        }
                        .slide .inner {
                          background: none repeat scroll 0 0 #FFFFFF;
                          position: absolute;
                          width:215px;
						  margin-top:-16px;
                          margin-left:-241px;
                          height:427px;
						  overflow-y:scroll;
                          overflow-x: hidden;
                          top: 18;
                          bottom: -555;
                          right: 0;
                          left: 0;
                          box-shadow:1px 0px 1px rgba(0, 0, 0, .3);
                        }
						
                    </style>
<script>
$(document).ready(
function() {
$("").niceScroll();
}
);
</script>
			<div id="da-header-bottom">
                <!-- Container -->
                <div class="da-container clearfix">
                     <?php 
                            if(isset($mainmenu)){?>   
                	<div id="da-search" class="slidemarginleft">
                    	<p>
							<a style="color: grey; text-decoration: none;" href="javascript:void(0)">
                                <span class="list-menu-image"><img src="<? echo base_url(); ?>/images/icons/black/32/new-list.png"></span>
                                <span class="list-menu-name">เมนู</span>
                            </a>
						</p>
                            <div id="da-sidebar" class="slide">
                                <div class="inner">
                                    <div id="da-main-nav" class="da-button-container">
									
							<ul>  
                            <?php 
                            
                            foreach($mainmenu as $mn){
                                $url=(($mn['MnURL'] == "" || $mn['MnURL'] == "" || $mn['MnURL'] == "-")?  "#" : $mn['MnURL'] ); ?>
                            <li>
                                <a href="<?php echo (($mn['MnURL'] == "" || $mn['MnURL'] == "" || $mn['MnURL'] == "-" || $mn['MnURL']== "#")?  "#" :base_url()."index.php/UMS_Controller/setMenu/".$mn['MnID']);?>">
                                    <!-- Icon Container -->
                                    <span class="da-nav-icon">
									<?if(isset($mn['MnIcon'])){?>
										<img src="<? echo base_url(); ?>/uploads/menu/<?= $mn['MnIcon']?>" alt="ระบบงาน-เมนู" />
									<?}?>
                                    </span>
                                        <?echo $mn['MnNameT'];?>
                                </a> 
                            <?if($url=="#"){?>  
                              <ul class="closed">
                                <?php foreach($submenu as $sub){
                                    if($sub['MnParentMnID'] == $mn['MnID']){?>
                                    <li><a href="<?php echo base_url()."index.php/"?>UMS_Controller/setMenu/<?php echo $sub['MnID'];?>">
                                    <span class="da-nav-icon">
									<?if(isset($sub['MnIcon'])){?>
										<img src="<? echo base_url(); ?>/uploads/menu/<?= $sub['MnIcon']?>" alt="ระบบงาน-เมนู" />
									<?}?>
                                    </span>
									<?php echo $sub['MnNameT']?></a></li>
                                    
                                <?}}?>
                              </ul>
                            <?}?>
                            </li>
                            <?}?>
                        </ul>
                        
                    </div>
                                </div>
                            </div>
                    </div>
					<? } ?>
                	
                    <!-- Breadcrumbs -->
                    <div id="da-breadcrumb">
                        <ul>
                            <li><a href="<? echo base_url(); ?>index.php/gear"><img src="<? echo base_url(); ?>/images/icons/black/16/home.png" alt="Home" />Home</a></li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
		</div>
      