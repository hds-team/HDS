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

<!-- iButton Plugin -->
<script type="text/javascript" src="<?php echo base_url('plugins/ibutton/lib/jquery.ibutton.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('plugins/ibutton/css/jquery.ibutton-giva-original.css'); ?>" media="screen" />

<!-- HDS Dialog Script-->
<script>
  $(function() {
    $( "#report_input" ).dialog({
      autoOpen: false,
      resizable: false,
      modal: true,
      width: 800
    });

    $( "#report_btn" ).click(function() {
      $( "#report_input" ).dialog( "open" );
    });
    
    $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });

  });
</script>

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
                    <div id="da-header-toolbar" class="clearf       ix" style="margin-top:<?php echo $tem['MarginHeadTop']?>px;">
                        <div id="da-user-profile-<?php echo $tem['ColorTopButton']?>">
                            <div id="da-user-info-<?php echo $tem['ColorTopButton']?>">
							<?php echo $this->session->userdata('UsName'); 
/*					old way
							if(isset($user))
							{
								echo $user['UsName'];
							}
*/
?>
                            <span class="da-user-title-<?php echo $tem['ColorTopButton']?>">
							<?php echo $this->session->userdata('GpName')." ".$this->session->userdata('dpName'); 
/*					old way
							if(isset($workgroup))
							{								
								$workgroup['GpNameT'];
							}
*/
?></span>                   
                            </div>
							<ul class="da-header-dropdown">
                                <li class="da-dropdown-divider"></li>
                                <li><a href="<?php echo base_url();?>index.php/gear">Home</a></li>
                                <li class="da-dropdown-divider"></li>
                                <li><a href="<?php echo base_url();?>index.php/UMS/showProfile">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="<?php echo base_url();?>index.php/user/ChangePassword">Change Password</a></li>
                                <!-- HDS link dialog id="report_btn"-->
                                <li><a href="<?php echo base_url('index.php/HDS/report/user_report'); ?>">Report</a></li>
                                <li><a href="<?php echo base_url('index.php/HDS/report/detail'); ?>">Report List</a></li>
                                <!-- HDS END-->
                            </ul>
                            </div>
                        <div id="da-header-button-container">
                        	<ul>
                            	<!--li class="da-header-button message">
									<?php //if(isset($news_notification) && $news_notification != 0){ ?>
									<span class="da-button-count"><?php //echo $news_notification; ?></span>
									<?php //} ?>          	
									<a href="#">Notifications</a>
                                    <ul class="da-header-dropdown">
                                        <li>
                                           	<ul class="da-dropdown-sub">
											<?php //foreach($notification as $notify){ 
												//if($notify['state_id']==2){?>
													<li class="unread">
                                                    <a href="<?php //echo base_url()."index.php/".$notify['link'] ?>">
                                                        <span class="message"><?php //echo $notify['messsage']?></span>
                                                        <span class="time">
                                                            January 21, 2012
                                                        </span>
                                                    </a>
                                                </li>
											<?php //}
												//else{ ?>
												<li class="read">
                                                    <a href="<?php //echo base_url()."index.php/".$notify['link'] ?>">
                                                        <span class="message"><?php //echo $notify['messsage']?></span>
                                                        <span class="time">
                                                            January 21, 2012
                                                        </span>
                                                    </a>
                                                </li>
											<?php// } }	?>
												<a class="da-dropdown-sub-footer" href="<?php //echo base_url()."index.php/notification" ?>" >View all messages</a>
											</ul>
										</li>
									</ul>
								</li--> 
                            	
                            	<li class="da-header-button-<?php echo $tem['ColorTopButton']?> logout">
                                	<a href="<?php echo base_url();?>index.php/gear/logout" title="Logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>               
                </div>
            </div>
         

<!-- HDS Dialog Report -->
<div id="report_input" class="da-panel-content" title="แบบฟอร์มคำร้อง" style="padding: 0px; display: none;">
        <?php 
            //$data['class'] ="da-form";
            //echo form_open_multipart('HDS/report/insert', $data); 
        ?>
            <input type="hidden" value="<?php echo $_SERVER['REQUEST_URI']; ?>" name="url">
            <div class="da-form-row">
                <div class="grid_4">
                    <label>หัวเรื่อง</label>
                    <div class="da-form-item large">
                        <input type="text" name="rq_subject" maxlength="50" required>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_2">
                    <label>ประเภท</label>
                    <div class="da-form-item large">
                        <select name="rq_ct_id">
                            <?php
                                //foreach($hds_category->result() as $category){
                            ?>
                                    <option value="<?php //echo $category->ct_id; ?>"><?php //echo $category->ct_name; ?></option>
                            <?php
                                //}
                            ?>
                        </select>
                    </div>
                </div>
                <div class="grid_2">
                    <label>หมวด</label>
                    <div class="da-form-item large">
                        <select name="rq_kn_id">
                            <?php
                                //foreach($hds_kind->result() as $kind){
                            ?>
                                    <option value="<?php //echo $kind->kn_id; ?>"><?php //echo $kind->kn_name; ?></option>
                            <?php
                                //}
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_2">
                    <label>ระดับความสำคัญ</label>
                    <div class="da-form-item large">
                        <select name="lg_lv_id">
                            <?php
                                //foreach($hds_level->result() as $level){
                            ?>
                                    <option value="<?php //echo $level->lv_id; ?>"><?php //echo $level->lv_name; ?></option>
                            <?php
                                //}
                            ?>
                        </select>
                    </div>
                </div>
                <div class="grid_2">
                    <label>กำหนดส่ง</label>
                    <div class="da-form-item large">
                        <input id="datepicker" type="text" name="lg_exp">
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_2">
                    <label>เบอร์โทร</label>
                    <div class="da-form-item large">
                        <input id="rq_tell" type="text" name="rq_tell" maxlength="10" required>
                    </div>
                </div>
                <div class="grid_2">
                    <label>อีเมล์</label>
                    <div class="da-form-item large">
                        <input type="text" name="rq_email" maxlength="100" required>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_2">
                    <label>ระบบ</label>
                    <div class="da-form-item large">
                        <select name="sys_id">
                            <option value="10" <?php //if($this->session->userdata('StID') == 10 || $this->session->userdata('StID') == NULL) echo "selected"; ?>>ระบบจัดการผู้ใช้</option>
                            <?php
                                //foreach($hds_system->result() as $system){
                            ?>
                                <option value="<?php //echo $system->StID; ?>" <?php //if($this->session->userdata('StID') == $system->StID ) echo "selected"; ?>><?php //echo $system->StNameT; ?></option>
                            <?php
                                //}
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_4">
                    <label>รายละเอียด</label>
                    <div class="da-form-item large">
                        <textarea name="rq_detail" rows="auto" cols="auto" maxlength="255" required></textarea>
                    </div>
                </div>
            </div>
            <div class="da-form-row">
                <div class="grid_4">
                    <label>ไฟล์แนบ</label>
                    <div class="da-form-item">
                        <input type="file" class="da-custom-file" name="userfile">
                    </div>
                </div>
            </div>
            <div class="da-button-row">
                <input type="reset" value="รีเซ็ท" class="da-button gray left">
                <input type="submit" value="ส่งคำร้อง" class="da-button blue">
            </div>
        <?php //echo form_close(); ?>
</div>
