<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>

	<style type="text/css">

	body
{
	background-color:#f2f2f2;
	color:#444444;
	background-image:url(../images/bg/blueprint.png);
	font:12px/1.5 'Helvetica Neue', Arial, Helvetica, sans-serif;
}

::-webkit-input-placeholder
{
    color:#999;
}

:-moz-placeholder
{
	color:#999;
}

.placeholder
{
    color:#999;
}

/* (2) Login Wrapper
================================================== */

div#da-login
{
	margin:auto;
	padding-top:100px;
}

/* (3) Login Shadows
================================================== */

div#da-login-top-shadow
{
	background:url(../images/login-shadow.png) no-repeat center top;
	padding-top:16px;
	z-index:15;
	margin:auto;
	width:450px;
	position:relative;
}

div#da-login #da-login-bottom-shadow
{
	width:320px;
	height:11px;
	margin:auto;
	z-index:20;
	background:url(../images/login-box-footer.png) no-repeat center top;
}

/* (4) Login Box
================================================== */

div#da-login #da-login-box
{
	width:280px;
	margin:auto;
	margin-top:-15px;
	z-index:10;
	background:url(../images/login-box-bg.png) #ffffff;
}

div#da-login #da-login-box #da-login-box-header
{
	padding:20px 40px;
	margin-bottom:10px;
	border-bottom:1px dashed #888888;
}

div#da-login #da-login-box #da-login-box-header h1
{
	font-size:18px;
	color:#444444;
	font-weight:normal;
}

div#da-login #da-login-box #da-login-box-content
{
	padding:10px 40px;
}

/* (5) Login Form
================================================== */

div#da-login #da-login-box #da-login-box-content form input#da-login-username, 
div#da-login #da-login-box #da-login-box-content form input#da-login-password
{
	background-color:#fafafa;
	border:1px solid #d1d1d1;
	width:100%;
	margin:0;
	padding:15px 10px;
	outline:none;
	padding-left:40px;
	background-repeat:no-repeat;
	background-position:12px center;
	
	-webkit-box-sizing:border-box;
	-o-box-sizing:border-box;
	-moz-box-sizing:border-box;
	box-sizing:border-box;
	
	-webkit-box-shadow:0 1px 0 rgba(255, 255, 255, 1), inset 0 1px 1px rgba(0, 0, 0, 0.04);
	-moz-box-shadow:0 1px 0 rgba(255, 255, 255, 1), inset 0 1px 1px rgba(0, 0, 0, 0.04);
	-o-box-shadow:0 1px 0 rgba(255, 255, 255, 1), inset 0 1px 1px rgba(0, 0, 0, 0.04);
	box-shadow:0 1px 0 rgba(255, 255, 255, 1), inset 0 1px 1px rgba(0, 0, 0, 0.04);
}

div#da-login #da-login-box #da-login-box-content form input#da-login-username
{
	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	-o-border-radius:4px 4px 0 0;
	border-radius:4px 4px 0 0;
	
	background-image:url(../images/icons/color/user.png);
}

div#da-login #da-login-box #da-login-box-content form input#da-login-password
{
	border-top:0;
	-webkit-border-radius:0 0 4px 4px;
	-o-border-radius:0 0 4px 4px;
	-moz-border-radius:0 0 4px 4px;
	border-radius:0 0 4px 4px;
	
	background-image:url(../images/icons/color/key.png);
}

div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper
{
	margin-bottom:20px;
}

div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper .da-login-input
{
	position:relative;
}

div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper label.error
{
	position:absolute;
	left:100%; top:50%;
	z-index:100;
	width:auto;
	background:#a5010d url(../images/icons/white/16/alert.png) no-repeat 8px center;
	padding:8px 6px;
	padding-left:28px;
	color:#ffffff;
	font-size:10px;
	line-height:1;
	margin-top:-13px;
	margin-left:10px;
	white-space:nowrap;
	
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	-o-border-radius:3px;
	border-radius:3px;
	
	-webkit-box-shadow:0 0 8px rgba(0, 0, 0, 0.3);
}

div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper label.error:after
{
	height:0; width:0;
	border:6px solid transparent;
	border-right-color:#a5010d;
	position:absolute;
	right:100%;
	top:50%;
	content:'';
	margin-top:-6px;
}

div#da-login #da-login-box #da-login-box-content form input#da-login-submit
{
	width:100%;
	font-size:16px;
	line-height:1;
	color:#ffffff;
	margin:0;
	cursor:pointer;
	line-height:1;
	padding:10px;
	display:inline-block;
	outline:none;
	border:1px solid #bb2929;
	
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	-o-border-radius:4px;
	border-radius:4px;
	
	-webkit-appearance:none;
	-webkit-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.35), 0 1px 1px rgba(0, 0, 0, 0.15);
	-moz-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.35), 0 1px 1px rgba(0, 0, 0, 0.15);
	-o-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.35), 0 1px 1px rgba(0, 0, 0, 0.15);
	box-shadow:inset 0 1px 0 rgba(255, 255, 255, 0.35), 0 1px 1px rgba(0, 0, 0, 0.15);
	
	background-color:rgb(225,86,86);
	background-image: linear-gradient(bottom, rgb(225,86,86) 0%, rgb(247,114,114) 100%);
	background-image: -o-linear-gradient(bottom, rgb(225,86,86) 0%, rgb(247,114,114) 100%);
	background-image: -moz-linear-gradient(bottom, rgb(225,86,86) 0%, rgb(247,114,114) 100%);
	background-image: -webkit-linear-gradient(bottom, rgb(225,86,86) 0%, rgb(247,114,114) 100%);
	background-image: -ms-linear-gradient(bottom, rgb(225,86,86) 0%, rgb(247,114,114) 100%);
	
	background-image: -webkit-gradient(
		linear,
		left bottom,
		left top,
		color-stop(0, rgb(225,86,86)),
		color-stop(1, rgb(247,114,114))
	);
}

div#da-login #da-login-box #da-login-box-content form input#da-login-submit:active
{
	background-image:none;
	
	-webkit-box-shadow:inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 0 rgba(255, 255, 255, 1);
	-moz-box-shadow:inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 0 rgba(255, 255, 255, 1);
	-o-box-shadow:inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 0 rgba(255, 255, 255, 1);
	box-shadow:inset 0 1px 2px rgba(0, 0, 0, 0.1), 0 1px 0 rgba(255, 255, 255, 1);
}

/* (6) Login Footer
================================================== */

div#da-login #da-login-box #da-login-box-footer
{
	padding:0 40px 20px;
	text-align:center;
	position:relative;
}

div#da-login #da-login-box #da-login-box-footer a
{
	text-decoration:none;
	color:#444444;
	font-size:12px;
}

div#da-login #da-login-box #da-login-box-footer a:hover
{
	text-decoration:underline;
}

div#da-login #da-login-box #da-login-box-footer #da-login-tape
{
	background:url(../images/login-tape.png) no-repeat center center;
	width:99px; height:26px;
	position:absolute;
	bottom:-13px;
	left:50%;
	margin-left:-50px;
}

/* (7) Media Queries
================================================== */
	
	@media only screen and (max-width: 480px)
	{
		div#da-login-top-shadow
		{
			display:none;
		}
		
		div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper label.error
		{
			left:auto;
			top:50%;
			right:6px;
			margin:-13px 0 0 0;
			padding-right:0;
			text-indent:-9999px;
			background-position:center center;
		}
		
		div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper label.error:after
		{
			display:none;
		}
		
		div#da-login #da-login-box #da-login-box-content form #da-login-input-wrapper .da-login-input input.error
		{
			padding-right:40px;
		}
	}
	</style>

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
<link rel="apple-touch-icon-precomposed" href="images/touch-icon-iphone.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch-icon-ipad.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch-icon-retina.png" />

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />
<!-- Login Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/login.css" media="screen" />

<!-- Required JavaScript Files -->
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.js"></script>
<script type="text/javascript" src="plugins/validate/jquery.validate.min.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="js/core/dandelion.login.js"></script>

<title>Dandelion Admin - Login</title>

</head>

<body>


<div id="da-login">
	<div id="da-login-box-wrapper">
    	<div id="da-login-top-shadow">
        </div>
    	<div id="da-login-box">
        	<div id="da-login-box-header">
            	<center> <img src="<? echo base_url(); ?>/images/logo.png"> </center>
            </div>
            <div id="da-login-box-content">
            	<form id="da-login-form" method="post" action="../Gear.html">
                	<div id="da-login-input-wrapper">
                                <div class="da-login-input">
                                <?php //$username = $this->session->userdata('username'); ?>
                                    <!-- input username -->
                                    <?php echo form_error('username','<font color=red>','</font>'); ?>
                               
                                    <input type="text" name="username" maxlength=50 id="da-login-username" placeholder="รหัสผู้ใช้" />
                                    
                                </div>
                                
                                    <!-- input password -->
                                <div class="da-login-input">
                                    <?php echo form_error('password','<font color=red>','</font>'); ?>
                                    <input type="password" name="password" maxlength=10 id="da-login-password" placeholder="รหัสผ่าน" />
                                </div>
                            </div>
                            <div id="da-login-button">
                                <input type="submit" value="เข้าสู่ระบบ" id="da-login-submit" />
                            </div>
                        <?php echo form_close(); ?>
                </form>
            </div>
			<?php
				if($_POST['login']){
				$UsLogin = $_POST['UsLogin'];
				$UsPassword = hash('sha512',$_POST['UsPassword']);
				$sql = SELECT * FROM umuser WHERE username = '$UsLogin' AND password = '$UsPassword'
				$query = mysql_query($sql);
				}
		mysql_close();
?>
			
            <div id="da-login-box-footer">
            	<a href="#">forgot your password?</a>
                <div id="da-login-tape"></div>
            </div>
        </div>
    	<div id="da-login-bottom-shadow">
        </div>
    </div>
</div>
    
</body>
</html>