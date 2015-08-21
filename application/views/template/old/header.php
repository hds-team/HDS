<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="<? echo base_url(); ?>/images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<? echo base_url(); ?>/images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<? echo base_url(); ?>/images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>/css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>/css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>/css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>/css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>/css/demo.css" media="screen" />


<title>User Management System</title>

</head>

<body>

	
    
	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Header -->
        <div id="da-header">
        
        	<div id="da-header-top">
                
                <!-- Container -->
                <div class="da-container clearfix">
                    
                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap">
                        <div id="da-logo">
                            <div id="da-logo-img">
                                <a href="#">
                                    <img src="<? echo base_url(); ?>/images/UMSBUU-10.png" alt="Dandelion Admin" />
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix">
                        <div id="da-user-profile">
                            <div id="da-user-info">
							<?if(isset($user))
							{
								foreach($user as $us)
								{	echo $us['UsName'];break;}
							}?>
                            <span class="da-user-title">
							<?if(isset($workgroup))
							{								
								foreach($workgroup as $gp)
								{	echo $gp['GpNameT'];break;}

							}?></span>
                            </div>
							<ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="<?echo base_url();?>index.php/gear">Home</a></li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="<?echo base_url();?>index.php/UMS/showProfile">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="<?echo base_url();?>index.php/user/ChangePassword">Change Password</a></li>
                            </ul>
                            </div>
                        <div id="da-header-button-container">
                        	<ul>
                            	
                            	<li class="da-header-button message">
                                  	<span class="da-button-count">1</span>
                                	<a href="#">Notifications</a>
                                    <ul class="da-header-dropdown">
                                        <li class="da-dropdown-caret">
                                            <span class="caret-outer"></span>
                                            <span class="caret-inner"></span>
                                        </li>
                                        <li>
                                           	<ul class="da-dropdown-sub">
                                                <li class="unread">
                                                    <a href="#">
                                                        <span class="message">
                                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                                        </span>
                                                        <span class="time">
                                                            January 21, 2012
                                                        </span>
                                                    </a>
                                                </li>
												<li class="read">
                                                    <a href="#">
                                                        <span class="message">
                                                            Lorem ipsum dolor sit amet
                                                        </span>
                                                        <span class="time">
                                                            January 21, 2012
                                                        </span>
                                                    </a>
                                                </li>
												<a class="da-dropdown-sub-footer">
                                            	View all messages
                                            </a>
											</ul>
										</li>
									</ul>
								</li>
                            	<li class="da-header-button logout">
                                	<a href="<?echo base_url();?>index.php/gear/logout" title="Logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                                    
                </div>
            </div>
            
           