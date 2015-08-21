<?php
/*
 *--------------> Begin: Editable zone <----------------
 */

//
// System data
//

/* System path */
$ROOT_PATH = "/var/www/htdocs/mispbri/";
$ROOT_URL = "/mispbri/";
$ADMIN_LOGIN = "admin";

/* Database info */
$DBHOST = "192.168.0.3";
$DBUSER = "eperson";
$DBPASS = "personP1_db";

$DBNAME_UMS = "umseo";
$DBUSER_UMS = "ums";
$DBPASS_UMS = "B_U_U_ums";

$DBNAME_EPERSON = "people";
$DBUSER_EPERSON = "eoffice";
$DBPASS_EPERSON = "B_U_U_eoffice";

$DBNAME_EOFFICE = "eoffice";
$DBUSER_EOFFICE = "eoffice";
$DBPASS_EOFFICE = "B_U_U_eoffice";

$DBNAME_EPERSON_HRM = "people_r";
$DBUSER_EPERSON_HRM = "eperson";
$DBPASS_EPERSON_HRM = "personP1_db";

$DBNAME_EACCOUNT = "account";
$DBUSER_EACCOUNT = "eaccount";
$DBPASS_EACCOUNT = "account_pi_DB";

$INFOSYS_MESG = "ระบบสารสนเทศ";
$SYSTEM_TITLE = ""; // To set system-title, modifies this variable at current script.
$SYSTEM_DETAIL = "";
$INFOSYS_TITLE = "ระบบสารสนเทศ"; // default system-title
$INFOSYS_LOGO = "banner_mis.jpg"; 
$GREETING_MESG = "ยินดีต้อนรับเข้าสู่ระบบสารสนเทศ";
/*
 *--------------> End: Editable zone <----------------
 */


/*
 *--------------> Begin: Read-only zone <---------------
 */
$SYS_INDEX = "infosys.php";
$HOST_NAME = $_SERVER["HTTP_HOST"];
$_PROTOCOL = (isset($_SERVER["HTTPS"]) && strtolower($_SERVER["HTTPS"]) == "on") ? "https://" : "http://";
$_INFO_PATH = "${ROOT_PATH}info/";
$_CLASS_PATH = "${ROOT_PATH}class/";
$_UMS_PATH = "${ROOT_PATH}ums/";
$_INFO_URL = "${ROOT_URL}info/";
$_CLASS_URL = "${ROOT_URL}class/";
$_INFO_INDEX = $HOST_NAME . $_INFO_URL . $SYS_INDEX;
$_MOD_PATH = "${_INFO_PATH}mod/";
$_TPL_PATH = "${_INFO_PATH}tpl/";
$_IMG_URL = "${_INFO_URL}img/";
/*
 *--------------> End:   Read-only zone <---------------
 */


/*
 *--------------> Begin: Editable zone <----------------
 */
/* Subsystem path */
$_EPERSON_PATH = "${ROOT_PATH}eperson/";
$_EBUDGET_PATH = "${ROOT_PATH}ebudget/";
$_EOFFICE_PATH = "${ROOT_PATH}eoffice/";
$_EPERSON_HRM_PATH = "${ROOT_PATH}eperson_hrm/";
$_EACCOUNT_PATH = "${ROOT_PATH}eaccount/";
$_EMEETING_PATH = "${ROOT_PATH}emeeting/";
$_ERESEARCHER_PATH = "${ROOT_PATH}eresearcher/";		// --- ERESEARCHER VERSION 2.0 ---

/* Subsystem URL */
$_UMS_URL = "${ROOT_URL}ums/";
$_EPERSON_URL = "${ROOT_URL}eperson/";
$_EBUDGET_URL = "${ROOT_URL}ebudget/";
$_EOFFICE_URL = "${ROOT_URL}eoffice/";
$_EPERSON_HRM_URL = "${ROOT_URL}eperson_hrm/";
$_EACCOUNT_URL = "${ROOT_URL}eaccount/";
$_EMEETING_URL = "${ROOT_URL}emeeting/";
$_ERESEARCHER_URL = "${ROOT_URL}eresearcher/";			// --- ERESEARCHER VERSION 2.0 ---

/*
 * System id mapping
 *
 */

$_SYSDIR_PATH = array(1 => $_UMS_PATH,
                      200 => $_EBUDGET_PATH,
                      4 => $_EPERSON_PATH,
					  10 => $_EOFFICE_PATH,
					  400 => $_EPERSON_HRM_PATH,
					  500 => $_EPERSON_HRM_PATH,
					  600 => $_EACCOUNT_PATH,
					  230 => $_ERESEARCHER_PATH,		// --- ERESEARCHER VERSION 2.0 ---	
					  700 => $_EMEETING_PATH
                );
$_SYSURL_PATH = array(1 => "${_UMS_URL}",
                      200 => "${_EBUDGET_URL}",
                      4 => "${_EPERSON_URL}",
					  10 => "${_EOFFICE_URL}",
					  400 => "${_EPERSON_HRM_URL}",
					  500 => "${_EPERSON_HRM_URL}",
					  600 => "${_EACCOUNT_URL}",
					  230 => "${_ERESEARCHER_URL}",		// --- ERESEARCHER VERSION 2.0 ---
					  700 => "${_EMEETING_URL}"
                );

$_SUBSYS_URL  = array(1 => array(1  => ""
                           ),    // --- UMS ---
                      200 => array(200201 => "${_EBUDGET_URL}code/",
                                 200202 => "${_EBUDGET_URL}code/",
                                 200203 => "${_EBUDGET_URL}code/",
                                 200204 => "${_EBUDGET_URL}code/",
                                 200205 => "${_EBUDGET_URL}code/",
                                 200206 => "${_EBUDGET_URL}code/",
                                 200207 => "${_EBUDGET_URL}code/",
								 200208 => "${_EBUDGET_URL}code/",
								 700004 => "${_EBUDGET_URL}code/"
                           ),    // --- EBUDGET ---

                      4 => array(40 => "${_EPERSON_URL}officer/",
                                 41 => "${_EPERSON_URL}money/",
                                 42 => "${_EPERSON_URL}officer/",
                                 43 => "${_EPERSON_URL}admin/",
                                 44 => "${_EPERSON_URL}officer/",
                                 99 => "${_EPERSON_URL}admin/"
                           ),     // --- EPERSON ---
                      5 => array(50 => "${_ESALARY_URL}admin/"
                           ),
					10 => array(107 => "${_EOFFICE_URL}admin/",
                                 108 => "${_EOFFICE_URL}admin/",
                                 109 => "${_EOFFICE_URL}admin/",
                                 110 => "${_EOFFICE_URL}admin/",
                                 111 => "${_EOFFICE_URL}admin/",
								 112 => "${_EOFFICE_URL}admin/",
								 114 => "${_EOFFICE_URL}admin/",
								 115 => "${_EOFFICE_URL}admin/"								 
                           ),     // --- EOFFICE ---	   

                      400 => array(40040 => "${_EPERSON_HRM_URL}officer/",
                                 40041 => "${_EPERSON_HRM_URL}money/",
                                 40042 => "${_EPERSON_HRM_URL}officer/",
                                 40043 => "${_EPERSON_HRM_URL}admin/",
                                 40044 => "${_EPERSON_HRM_URL}officer/",
                                 40099 => "${_EPERSON_HRM_URL}admin/"
                           ),     // --- EPERSON HRM ---
                      500 => array(500001 => "${_EPERSON_HRM_URL}admin/",
								500002 => "${_EPERSON_HRM_URL}admin/",
								500003 => "${_EPERSON_HRM_URL}admin/",
								500004 => "${_EPERSON_HRM_URL}admin/",
								500005 => "${_EPERSON_HRM_URL}admin/",
								500006 => "${_EPERSON_HRM_URL}admin/",
								500007 => "${_EPERSON_HRM_URL}admin/",
								500008 => "${_EPERSON_HRM_URL}admin/",
								500009 => "${_EPERSON_HRM_URL}admin/"
                           ),     // --- EPERSON HRM ---
						    600 => array(600001 => "${_EACCOUNT_URL}admin/",
								600003 => "${_EACCOUNT_URL}admin/",
								600002 => "${_EACCOUNT_URL}admin/"
                           ),	// --- EACCOUNT ---
					  230 => array(230001 => "${_ERESEARCHER_URL}admin/",
                                 230002 => "${_ERESEARCHER_URL}admin/",
								 230003 => "${_ERESEARCHER_URL}admin/",
								 230004 => "${_ERESEARCHER_URL}admin/",
								 230005 => "${_ERESEARCHER_URL}admin/"
                           ),    // --- ERESEARCHER VERSION 2.0 ---
					  700 => array(
						700001 => "${_EMEETING_URL}admin/",
						700002 => "${_EMEETING_URL}admin/",
						700003 => "${_EMEETING_URL}admin/"
					)   // --- EMEETING ---
                );

$_SYS1ST_URL  = array(1 => array(1  => ""
                           ),    // --- UMS ---
                      200 => array(200201 => "index.php",
                                 200202 => "index.php",
                                 200203 => "index.php",
                                 200204 => "index.php",
                                 200205 => "index.php",
                                 200206 => "index.php",
                                 200207 => "index.php",
								 200208 => "index.php",
								 700004 => "index.php",
                           ),    // --- EBUDGET ---

                      4 => array(40 => "officerIndex.php",
                                 41 => "moneyIndex.php",
                                 42 => "officerIndex.php",
                                 43 => "index.php",
                                 44 => "officerIndex.php",
                                 99 => "adminIndex.php"
                           ),     // --- EPERSON ---
                      5 => array(50 => "adminIndex.php"
                           ),
					10 => array(107 => "index.php",
                                 108 => "index.php",
                                 109 => "index.php",
                                 110 => "index.php",
                                 111 => "index.php",
								 112 => "index.php",
								 114 => "selectDocPost.php",
								 115 => "index.php"
                           ),     // --- EOFFICE2 ---

			  		400 => array(40040 => "officerIndex.php",
                                 40041 => "moneyIndex.php",
                                 40042 => "officerIndex.php",
                                 40043 => "adminIndex.php",
                                 40044 => "officerIndex.php",
                                 40099 => "adminIndex.php"
                           ),     // --- EPERSON HRM ---
			  		500 => array(500001 => "index.php",
								500002 => "index.php",
								500003 => "index.php",
								500004 => "index.php",
								500005 => "index.php",
								500006 => "index.php",
								500007 => "index.php",
								500008 => "index.php",
								500009 => "index.php"
                           ),     // --- EPERSON HRM ---
					600 => array(600001 => "index.php",
								600003 => "index.php",
								600002 => "index.php"
                           ),     // --- EACCOUNT ---	   
					230 => array(230001 => "index.php",
                                 230002 => "index.php",
								 230003 => "index.php",
								 230004 => "index.php",
								 230005 => "index.php"
                           ),     // --- ERESEARCHER VERSION 2.0 ---
					700 => array(
						700001 => "index.php",
						700002 => "index.php",
						700003 => "index.php"
					)	// --- EMEETING ---
                );

$_SYS1ST_NAME = array("หน้าแรก", "หน้าเริ่มต้น");
$_SYSLNK_SKIP = array("ออกจากระบบ", "เปลี่ยนรหัสผ่าน");

$_SYSICO_MINI = array(1 => "${_INFO_URL}img/admin-mini.gif",
                      200 => "${_INFO_URL}img/ebudget-mini.gif",
                      4 => "${_INFO_URL}img/eperson-mini.gif",
					  10 => "${_INFO_URL}img/eoffice-mini.gif",
					  400 => "${_INFO_URL}img/eperson-mini.gif",
					  500 => "${_INFO_URL}img/eperson-mini.gif",
					  230 => "${_INFO_URL}img/eresearch-mini.gif",	// --- ERESEARCHER VERSION 2.0 ---
					  700 => "${_INFO_URL}img/emeeting-mini.gif",
					  600 => "${_INFO_URL}img/eaccount-mini.gif"
                );
$_SYSICO_BIGZ = array(1 => "${_INFO_URL}img/admin-large.gif",
                      200 => "${_INFO_URL}img/ebudget-large.gif",
                      4 => "${_INFO_URL}img/eperson-large.gif",
					  10 => "${_INFO_URL}img/eoffice-large.gif",
					  400 => "${_INFO_URL}img/eperson-large.gif",
					  500 => "${_INFO_URL}img/eperson-large.gif",
					  230 => "${_INFO_URL}img/eresearch-large.gif",	// --- ERESEARCHER VERSION 2.0 ---
					  700 => "${_INFO_URL}img/emeeting-large.gif",
					  600 => "${_INFO_URL}img/eaccount-large.gif",
                );


$_CONFIG_TITLE = "ตั้งค่าการใช้งาน";
$_CONFIG_MOD = array(array("sys_name" => "เปลี่ยนรหัสผ่าน",
                           "sys_modn" => "- ทุกกลุ่มผู้ใช้ -",
                           "sys_link" => "${_INFO_URL}infosys.php?__m=config&__sb=chpasswd")
                );


$_ADDIN_DISABLED = false; // $_ADDIN_DISABLED = false, force Addin-Tools available for all user.
$_ADDIN_BLOG = 8;
$_INFOADMIN_GPID = 83;
$_ADDIN_WGOWNER = array(1935 => 82,
                        1936 => 81,
                        1937 => 80
                  );
$_ADDIN_RESTRICT = array(82 => false,
                         81 => false,
                         80 => false
                   );

// Begin:
// Fixed bugs or depend on user-requirement.

// auto display sub-system as groups
$_FIXED_VIEW_GROUP_START = 1;

// End:
// Fixed bugs or depend on user-requirement.

//
// System option
//
$SECURE_LOG = false; // Use https protocol for submits signed-on data set $SECURE_LOG = true.
$DEBUG_MODE = true;  // Test phase $DEBUG_MODE = true
/*
 *--------------> End: Editable zone <----------------
 */
 // Note: Use $_SESSION["ITEM_LINK"] variable for back to last menu.
?>