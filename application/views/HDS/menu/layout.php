<head>
    <style>
    /*
     * Dandelion Admin v1.2 - Core Stylesheet
     *
     * This file is part of Dandelion Admin, an Admin template build for sale at ThemeForest.
     * For questions, suggestions or support request, please mail me at maimairel@yahoo.com
     *
     * Development Started:
     * March 25, 2012
     * Last Update:
     * July 25, 2012
     *
     * ===============================================
     * Table of Contents
     * ===============================================
     *
     * 1. Colors
     * 2. Selection Colors
     * 3. Body
     * 4. Main Wrapper
     * 5. Header
     *    5.1 Top Header
     *        5.1.1 Top Header Toolbar
     *        5.1.2 Top Header Buttons
     *        5.1.3 Top Header Dropdown
     *    5.2 Bottom Header
     *        5.2.1 Search
     *        5.2.2 Breadcrumbs
     * 6. Main Content
     *    6.1 Sidebar Separator
     *    6.2 Sidebar
     *        6.2.1 Main Navigation
     *              6.2.1.1 Sub Navigation
     *    6.3 Main Container
     * 7. Footer
     * 8. Media Queries
     *    8.1 Media query for screens smaller than 1024px (Tablet, old Desktop)
     *    8.2 Media query for screens between 480px and 1024px (Tablet to desktop)
     *    8.3 Media query for screens smaller than 768px (Tablet Portrait)
     *    8.4 Media query for screens smaller than 480px (Full Mobile)
     *
     */


    /* (6) Main Content
    ================================================== */

        /* (6.1) Sidebar Separator
        ================================================== */
        
        div#da-wrapper #da-sidebar-separator, 
        div#da-wrapper.fluid #da-sidebar-separator
        {
            position:absolute;
            left:200px;
            width:50px;
            margin-left:2%;
            top:0; bottom:0;
        }
        
        
        div#da-wrapper.fixed #da-sidebar-separator
        {
            left:50%;
            margin-left:-300px;
        }
        
        /* (6.2) Sidebar
        ================================================== */
        
        div#da-content #da-sidebar
        {
            position:relative;
            float:left;
            z-index:150;
        }
        
        div#da-content #da-sidebar .da-button-container
        {
            padding:2px;
            margin-bottom:6px;
            border:1px solid #cacaca;
            
            /* CSS 3 */
            
            -webkit-border-radius:4px;
            -o-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;
            
            -webkit-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 1);
            -o-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 1);
            -moz-box-shadow:inset 0 1px 0 rgba(255, 255, 255, 1);
            box-shadow:inset 0 1px 0 rgba(255, 255, 255, 1);
            
            background-color: rgb(255, 255, 255);
            background-image: linear-gradient(bottom, rgb(255,255,255) 0%, rgb(241,241,241) 100%);
            background-image: -o-linear-gradient(bottom, rgb(255,255,255) 0%, rgb(241,241,241) 100%);
            background-image: -moz-linear-gradient(bottom, rgb(255,255,255) 0%, rgb(241,241,241) 100%);
            background-image: -webkit-linear-gradient(bottom, rgb(255,255,255) 0%, rgb(241,241,241) 100%);
            background-image: -ms-linear-gradient(bottom, rgb(255,255,255) 0%, rgb(241,241,241) 100%);
            
            background-image: -webkit-gradient(
                linear,
                left bottom,
                left top,
                color-stop(0, rgb(255,255,255)),
                color-stop(1, rgb(241,241,241))
            );
        }
        
        div#da-content #da-sidebar #da-main-nav.da-button-container
        {
            width:174px; /*Size of menu button */
        }

            /* (6.2.1) Main Navigation
            ================================================== */
            
            div#da-content #da-main-nav ul, 
            div#da-content #da-main-nav ul li
            {
                margin:0;
                list-style:none;
            }
            
            div#da-content #da-main-nav ul
            {
                border:1px solid #cacaca;
                background:#ffffff;
                
                /* CSS 3 */
                
                -webkit-border-radius:4px;
                -o-border-radius:4px;
                -moz-border-radius:4px;
                border-radius:4px;
            }
            
            div#da-content #da-main-nav ul li
            {
                display:block;
                border-top:1px solid #ffffff;
                border-bottom:1px solid #cacaca;
                background-color:#fdfdfd;
                
                /* CSS 3 */
                
                -webkit-box-shadow:inset 0 0 2px rgba(255, 255, 255, 1);
                -o-box-shadow:inset 0 0 2px rgba(255, 255, 255, 1);
                -moz-box-shadow:inset 0 0 2px rgba(255, 255, 255, 1);
                box-shadow:inset 0 0 2px rgba(255, 255, 255, 1);    
            }
            
            div#da-content #da-main-nav ul li:first-child
            {
                border-top:0;
                
                /* CSS 3 */
                
                -webkit-border-radius:4px 4px 0 0;
                -o-border-radius:4px 4px 0 0;
                -moz-border-radius:4px 4px 0 0;
                border-radius:4px 4px 0 0;
            }
            
            div#da-content #da-main-nav ul li:last-child
            {
                border-bottom:0;
                
                /* CSS 3 */
                
                -webkit-border-radius:0 0 4px 4px;
                -o-border-radius:0 0 4px 4px;
                -moz-border-radius:0 0 4px 4px;
                border-radius:0 0 4px 4px;
            }
            
            div#da-content #da-main-nav ul li a, 
            div#da-content #da-main-nav ul li span
            {
                display:block;
                color:#444444;
                cursor:pointer;
                text-decoration:none;
                padding:18px 32px 18px 48px;
                outline:none;
                position:relative;
                background:url(../../images/menu-bulb-off.png) right center no-repeat;
            }
            
            div#da-content #da-main-nav ul li.active a, 
            div#da-content #da-main-nav ul li.active span
            {
                background-image:url(../../images/menu-bulb-on.png);
            }
            
            div#da-content #da-main-nav ul li span.da-nav-count
            {
                display:block;
                position:absolute;
                left:0; top:-1px;
                background:none;
                margin:0;
                font-size:10px;
                line-height:1;
                z-index:100;
                
                text-align:center;
                background:#f0f0f0;
                border:1px solid #bbbbbb;
                min-width:10px;
                padding:2px 4px;
                border-left:0;
                border-top:0;
                
                -webkit-box-shadow:inset 0 0 6px rgba(0, 0, 0, 0.25);
                -moz-box-shadow:inset 0 0 6px rgba(0, 0, 0, 0.25);
                -o-box-shadow:inset 0 0 6px rgba(0, 0, 0, 0.25);
                box-shadow:inset 0 0 6px rgba(0, 0, 0, 0.25);
                
                -webkit-border-radius:0 0 2px 0;
                -moz-border-radius:0 0 2px 0;
                -o-border-radius:0 0 2px 0;
                border-radius:0 0 2px 0;
            }
            
            div#da-content #da-main-nav ul li span.da-nav-icon
            {
                padding:0; margin:0;
                width:32px; height:32px;
                background:none !important;
                position:absolute;
                left:8px;
                top:50%;
                margin-top:-16px;
            }
            
            div#da-content #da-main-nav ul li span.da-nav-icon img
            {
                max-width:24px;
                max-height:24px;
                
                position:absolute;
                left:50%; top:50%;
                margin-left:-12px;
                margin-top:-12px;
            }
            
                /* (6.2.1.1) Sub Navigation
                ================================================== */
                
                div#da-content #da-main-nav ul li ul
                {
                    border:none;
                    background:#e9e9e9 url(../../images/submenu-shadow.png) repeat-x left top;
                    
                    /* CSS 3 */
                    
                    -webkit-border-radius:0;
                    -o-border-radius:0;
                    -moz-border-radius:0;
                    border-radius:0;
                }
                
                div#da-content #da-main-nav ul li ul.closed
                {
                    display:none;
                }
                
                div#da-content #da-main-nav ul li ul li
                {
                    border:none;
                    background:none;
                    font-size:12px;
                    
                    /* CSS 3 */
                    
                    -webkit-box-shadow:none;
                    -o-box-shadow:none;
                    -moz-box-shadow:none;
                    box-shadow:none;
                }
                
                div#da-content #da-main-nav ul li ul li:hover
                {
                    background:url(../../images/menu-hover.png);
                }
                
                div#da-content #da-main-nav ul li ul li a, 
                div#da-content #da-main-nav ul li ul li span
                {
                    padding:6px 0;
                    padding-left:48px;
                    background:none !important;
                }

        /* (6.3) Main Container
        ================================================== */
        
        div#da-content #da-content-wrap
        {
            margin-left:230px;
            padding-bottom:20px;
            margin-top:20px;
        }
        
        div#da-content #da-content-wrap #da-content-area
        {
            float:left;
            width:100%;
            display:block;
        }

    </style>
    <?php
        $menu = array();
        //----------MENU-----------
        $menu[0]['name'] = "ตรวจสอบงาน";
        $menu[0]['controller'] = "screening";
        $menu[0]['icon'] = "images_2.png";

        $menu[1]['name'] = "ประเภท";
        $menu[1]['controller'] = "fundamental/category";
        $menu[1]['icon'] = "cog_4.png";

        $menu[2]['name'] = "หมวด";
        $menu[2]['controller'] = "fundamental/kind";
        $menu[2]['icon'] = "cog_4.png";

        $menu[3]['name'] = "ความสำคัญ";
        $menu[3]['controller'] = "fundamental/level";
        $menu[3]['icon'] = "cog_4.png";

        $menu[4]['name'] = "ตำแหน่งงาน";
        $menu[4]['controller'] = "position";
        $menu[4]['icon'] = "create_write.png";

        $menu[5]['name'] = "ตรวจงาน";
        $menu[5]['controller'] = "dev_work";
        $menu[5]['icon'] = "images_2.png";

        $access = array();
        $access['admin'] = array(4);
        $access['coordinate'] = array( 0, 1, 2, 3);
        $access['developer'] = array(5);
        $access['all'] = array(0, 1, 2, 3, 4, 5);

    ?>
</head>
<div id="da-content">
    <div class="da-container clearfix">
        <!-- Sidebar Separator do not remove -->
        <div id="da-sidebar-separator"></div>
        <!-- Sidebar -->
        <div id="da-sidebar">
            <!-- Main Navigation -->
            <div id="da-main-nav" class="da-button-container">
                <ul>
                    <li class="active">
                        <a href="#">
                            <!-- Icon Container -->
                            <span class="da-nav-icon">
                                <img src="<?php echo base_url('images/icons/black/32/home.png'); ?>" alt="Dashboard">
                            </span>
                            Dashboard
                        </a>
                    </li>
                    <?php 
                        foreach($access['all'] as $key => $value){
                            //echo $key." ".$value."<BR>";
                    ?>
                       <li>
                            <a href="<?php echo base_url('index.php/HDS/'.$menu[$value]['controller']); ?>">
                                <!-- Icon Container -->
                                <span class="da-nav-icon">
                                    <img src="<?php echo base_url('images/icons/black/32/'.$menu[$value]['icon']); ?>" alt="<?php echo $menu[$value]['name']; ?>">
                                </span>
                                <?php echo $menu[$value]['name']; ?>
                            </a>
                        </li>
 
                    <?php
                        }
                    ?>
                </ul>
            </div> <!-- da-main-nav -->
        </div>
        <!-- Main Content Wrapper -->
        <div id="da-content-wrap" class="clearfix">
            <!-- Content Area -->
            <div id="da-content-area"> 
                <div class="grid_4">
                    <?php 
                    if(isset($content)){
                        if($content != NULL){
                            echo $content;
                        }else{
                            echo "ไม่มีตัวแปร Content";
                        }
                    }
                    ?>
                </div><!-- grid_4 --> 
            </div>  <!-- da-content-area --> 
        </div> <!-- da-content-wrap -->
    </div> <!-- da-container clearfix -->
</div><!-- da-content -->
