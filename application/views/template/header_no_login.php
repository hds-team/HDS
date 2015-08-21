<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="http://se.buu.ac.th/~staff3/UMS/uploads/header/ccc.png" />
<!-- Viewport metatags -->
<meta name="HandheldFriendly" content="true" />
<meta name="MobileOptimized" content="320" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- iOS webapp metatags -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<!-- iOS webapp icons -->
<link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fluid.css" media="screen" />
<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dandelion.theme.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/dandelion.css" media="screen" />
<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css" media="screen" />


<title>User Management System</title>

</head>

<body>

	
    
	<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
	<div id="da-wrapper" class="fluid">
    
        <!-- Header -->
        <div id="da-header">
        	<div id="da-header-top" style="height:<?php echo $tem['HeightHeadTop']?>px;background:<?php echo $tem['ColorHeadTop']?>;">
                
                <!-- Container -->
                <div class="da-container clearfix">
                    
                    <!-- Logo Container. All images put here will be vertically centere -->
                    <div id="da-logo-wrap" >
                        <div id="da-logo">
                            <div id="da-logo-img">
                                <a href="#">
                                    <?php $path = $this->config->item('uploads_url'); 
											 $pathString = $path."header&image=".$tem['HeadIcon'];
									?>
                                    <img src="<?php echo $pathString; ?>" alt="Dandelion Admin" style="height:<?php echo $tem['HeightHeadTop']?>px;" />
                                </a>
                            </div>
                        </div>						
                    </div>
                   
                    <!-- Header Toolbar Menu -->
                    <div id="da-header-toolbar" class="clearfix" style="margin-top:<?php echo $tem['MarginHeadTop']?>px;">    
                        <div id="da-header-button-container">
                        	<ul>
								<b style="display:inline-block;color:white;margin-right:10px">LOGIN</b>
                            	<li class="da-header-button login">
                                	<a href="<?php echo base_url();?>index.php/gear" title="Login">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>               
                </div>
            </div>