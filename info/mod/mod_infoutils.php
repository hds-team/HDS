<?php

function setnocache ( )
{
    header("Expires: Mon, 15 May 1995 15:15:15 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Cache-Control: private", false);
}

function &bind_content ($pairs, &$content)
{
    $patterns = array();
    $replace = array();
    $i = 0;
    if ($pairs != NULL && $content != NULL) {
        foreach ($pairs as $key => $value) {
            $patterns[$i] = "/(\s*?){($key)}(\s*?)/";
            $replace[$i++] = "\${1}$value\${3}";
        }
        $content = preg_replace($patterns, $replace, $content);
    }
    return $content;
}

function read_template ($path_name)
{
    $text = "";
    if (is_file($path_name))
        $text = implode("", @file($path_name));
    return $text;
}

function GETVARS ($varname)
{
    $retval = "";
    if (isset($_POST[$varname]))
        $retval = $_POST[$varname];
    if (isset($_GET[$varname]))
        $retval = $_GET[$varname];
    return $retval;
}

function preLogTpl ($right_content) 
{
    $left_content = getLeftContent_preLog();
    return buildHTML(read_template($GLOBALS["_TPL_PATH"] . "prelogin.tpl"), $left_content, $right_content);
}

function postLogTpl ($right_content)
{
    if (isset($_SESSION["WALKSTEP"]))
        unset($_SESSION["WALKSTEP"]);
    $left_content = getLeftContent_postLog();
    return buildHTML(read_template($GLOBALS["_TPL_PATH"] . "postlogin.tpl"), $left_content, $right_content);
}

function buildHTML (&$pagelayout, &$left_content, &$right_content)
{
    bind_content(array("TITLE" => getTitlePage(),
                       "SYSLOGO" => getLogoImage(),
                       "LEFTSIDE" => $left_content,
                       "RIGHTSIDE" => $right_content), $pagelayout);
    bind_content(array("INFOURL" => $GLOBALS["_INFO_URL"],
                       "EXTCSSFILES" => GetExtendedCSS(),
                       "EXTJSFILES" => GetExtendedJS()), $pagelayout);
    return $pagelayout;
}

function checkLogin ( )
{
    $oConn = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);

    $fValid = isset($_POST["Username"], $_POST["Password"]);
    if ($oConn->c && $oConn->errmsg == "" && $fValid) {
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $cookie_value = "";
        $curr_time = time();
        if (isset($_POST["Remember"])) {
            if ($_POST["Remember"] == "ce")
                $password = decryptmesg($password);
            $cookie_value = $username . "{[<->]}" . encryptmesg($password);
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
                setcookie("infosys_userinfo", $cookie_value, $curr_time + 3600 * 48);
            else
                setcookie("infosys_userinfo", $cookie_value, $curr_time + 3600 * 48, $GLOBALS["ROOT_URL"], $GLOBALS["HOST_NAME"], 0);
        } else {
            if ($_POST["eRemember"] == "ce")
                $password = decryptmesg($password);
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
                setcookie("infosys_userinfo", $cookie_value, $curr_time + 3600 * 48);
            else
                setcookie("infosys_userinfo", $cookie_value, $curr_time - 3600 * 48, $GLOBALS["ROOT_URL"], $GLOBALS["HOST_NAME"], 0);
        }
        $oUs = new umuser($oConn);
		if ($oCps)
			$oPs = new Person($oCps);

        $oUs->SearchByLogin($username, $password);
        if ($oUs->GetRecord()) {
            if (!logged_in()) {
                $_SESSION["sysDate"] = date("d/m/Y");
				$_SESSION["sysDate0"] = TH2ENDate($_POST["nowDate"]);
                $_SESSION["sysDSave"] = $_SESSION["sysDate0"];
				$_SESSION["createUserId"] = "";
				$_SESSION["updateUserId"] = "";
                $_SESSION["logKey"] = session_id();
                $_SESSION["oU"] = new clsUser();
                $oU = &$_SESSION["oU"];
                $oU->userID = $oUs->UsID;
                $oU->userLogin = $oUs->UsLogin;
                $oU->userName = $oUs->UsName;
                $oU->userPsCode = $oUs->UsPsCode; // PersonId = UsPsCode
				if ($oCps && $oPs) {
					$oPs->SearchByKey($oUs->UsPsCode);
					$oPs->GetRecord();
					$oU->userPsCodeReg = $oPs->personCode;
				}
                $oU->userPsID = $oUs->UsPsCode;
                $oU->userDptCode = "";
                $oU->userDptName = "";
                $oU->userPosCode = $oUs->posID;
                $oU->userPosName = $oUs->posName;
                $oU->WgID = $oUs->UsWgID;
                $oU->UserQsID = $oUs->UsQsID;

                $oU->UserAnswer = $oUs->UsAnswer;
                $oU->UserEmail = $oUs->UsEmail;
                $oU->UserActive = $oUs->UsActive;
                $oU->UserAdmin = $oUs->UsAdmin;
                $oU->UserDesc = $oUs->UsDesc;
                $oU->UserPwdExpDt = $oUs->UsPwdExpDt;
                $oU->UserUpdDt = $oUs->UsUpdDt;
                $oU->UserUpdUsID = $oUs->UsUpdUsID;
				$oU->UsDpID = $oUs->UsDpID; // 20131127 by PoD666
				$_SESSION["createUserId"] = $oUs->UsLogin;
				$_SESSION["updateUserId"] = $oUs->UsLogin;

                $oU->userIP = getenv("REMOTE_ADDR");
                $oUs->SetSessionID($oUs->UsID, session_id());
                $oU->sessionID = session_id();

                $oUg = new umusergroup($oConn);
                $oGp = new umgpermission($oConn);
                $oUp = new umpermission($oConn);
                $oUg->RSgroupByUs($oU->userID);
                while ($oUg->GetRecord()) {
                    $oGp->RSMnByGpID($oUg->UgGpID);
                    while($oGp->GetRecord())
                        $oU->aGp[$oUg->UgGpID.$oGp->gpMnID]=array($oGp->gpX,$oGp->gpC,$oGp->gpR,$oGp->gpU,$oGp->gpD);
                }
                $oUp->RSMnByUs($oU->userID);
                while($oUp->GetRecord())
                    $oU->aUp[$oU->userID.$oUp->pmMnID]=array($oUp->pmX,$oUp->pmC,$oUp->pmR,$oUp->pmU,$oUp->pmD);

                $oU->deptId = 0;
                $oU->deptName = "";
                $oU->deptCode = "";
                if ($oU->userLogin != strtolower($GLOBALS["ADMIN_LOGIN"])) {
					
                    $db = $GLOBALS["DBNAME_EPERSON"];
                    $qstring = "select Department.deptId, Department.deptCode, Department.deptName from $db.Department, $db.Person where Person.personId = $oU->userPsID and Person.deptId = Department.deptId";

					$dbres = mysql_query($qstring, $oConn->c);
                    if (mysql_num_rows($dbres) > 0) {
                        $row = mysql_fetch_assoc($dbres);
                        $oU->deptId = $row["deptId"];
                        $oU->deptCode = $row["deptCode"];
                        $oU->deptName = $row["deptName"];
                        $oU->userDptCode = $row["deptCode"];
                        $oU->userDptName = $row["deptName"];
                    }
                } else {
                    $oU->deptId = 0;
                    $oU->deptCode = "";
                    $oU->deptName = "-- ผู้ดูแลระบบ --";
                    $oU->userDptCode = "";
                    $oU->userDptName = "-- ผู้ดูแลระบบ --";
                }
                if ($oU->deptName == "")
                    $oU->deptName = "&lt;&nbsp;ไม่สังกัดหน่วยงานใดๆ&nbsp;&gt;";
                printLoginSuccess();
            } else {
                // unexpected event
                forceLogout();
            }
        } else {
            printLoginFail();
        }
        $oConn->Disconnect();
    } else {
        if ($GLOBALS["DEBUG_MODE"]) {
            if ($oConn->errmsg != "")
                extended_debug_code(preg_replace("/[\r\n]/", "", $oConn->errmsg));
            else
                prologin_debug_code();
        } else {
            printLoginFail();
        }
    }
}

function session_stop ( )
{
    $_SESSION = array();
    if (isset($_COOKIE[session_name()]))
       setcookie(session_name(), "", time() - 42000, "/");
    session_destroy();
}

function forceLogout ( )
{
    $_SESSION = array();
    if (isset($_COOKIE[session_name()]))
       setcookie(session_name(), "", time() - 42000, "/");
    session_destroy();
    header("Location: " . $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"]);
}

function forceReload ( )
{
    $response_cont = read_template($GLOBALS["_TPL_PATH"] . "response.tpl");
    $URL = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
    bind_content(array("JSFILE" => "js/blank.js",
                       "STARTCODE" => "if (parent.redirectURL) parent.redirectURL('$URL');",
                       "RESTAGS" => "&nbsp;"), $response_cont);
    echo $response_cont;
}

function deniedAlert ( )
{
    $response_cont = read_template($GLOBALS["_TPL_PATH"] . "response.tpl");
    bind_content(array("JSFILE" => "js/blank.js",
                       "STARTCODE" => "if (parent.printErrMsg) parent.printErrMsg();",
                       "RESTAGS" => "&nbsp;"), $response_cont);
    echo $response_cont;
}

function logged_in ( )
{
    $retval = false;
    if (isset($_SESSION["oU"], $_SESSION["sysDate"], $_SESSION["logKey"]))
        $retval = ($_SESSION["logKey"] == session_id());
    return $retval;
}

function loadConfig ( )
{
    if (isset($_GET["__sb"])) {
        switch ($_GET["__sb"]) {
            case "chpasswd":
                chpasswdResponse();
            break;
        }
    } else {
        ob_start("postLogTpl");
        echo getConfigContent_postLog();
        ob_end_flush();
    }
}

function preLoginPage ( )
{
    ob_start("preLogTpl");
    echo getRightContent_preLog();
    ob_end_flush();
}

function postLoginPage ( )
{
    ob_start("postLogTpl");
    echo getRightContent_postLog();
    ob_end_flush();
}

function getLeftContent_preLog ( )
{
    $left_menu = read_template($GLOBALS["_TPL_PATH"] . "menublog.tpl");
    $pproto = ($GLOBALS["_PROTOCOL"] == "https://") ? "s" : "n";
    $lproto = (isset($GLOBALS["SECURE_LOG"]) && $GLOBALS["SECURE_LOG"]) ? "https" : "http";
    $inforoot = $GLOBALS["HOST_NAME"] . $GLOBALS["_INFO_URL"];
    bind_content(array("LPROTO" => $lproto, "INFOSYSROOT" => $inforoot, "PPROTO" => $pproto, "CURRDATE" => Time2THDate(time())), $left_menu); 
    return $left_menu;
}

function getLeftContent_postLog ( )
{
    $oU = $_SESSION["oU"];
    $left_menu = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog.tpl");
    // Update sysDate to current date + Reset sysDate0 to original format.
    $_SESSION["sysDate"] = date("d/m/Y");
    $_SESSION["sysDate0"] = $_SESSION["sysDSave"];

    $info_extended = getLeftExtendedMenu();
    bind_content(array("USERLOGIN" => $_SESSION["oU"]->userLogin,
                       "USERINFO" => $_SESSION["oU"]->userName,
                       "USERDEPT" => $_SESSION["oU"]->deptName,
                       "MISNDATE" => GetSysDate(time()),
                       "EXTENDED_MENU" => $info_extended), $left_menu);
    return $left_menu;
}

function getLeftExtendedMenu ( )
{
    $oU = $_SESSION["oU"];
    $extended_menu = "";
    $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
    if ($oC->c && $oC->errmsg == "") {
        $db = $GLOBALS["DBNAME_UMS"];
        $extblogmenu_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog_rt.tpl");
        $extblogitem_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog_item_rt.tpl");
        $sys_index = $GLOBALS["_ADDIN_BLOG"];
        $item_content = "";
        $query = "select umsystem.StID, umsystem.StNameT, ummenu.MnID, ummenu.MnURL, ummenu.MnNameT from $db.umsystem, $db.ummenu where ummenu.MnParentMnID = 0 and umsystem.StID = ummenu.MnStID and umsystem.StID = " . $sys_index;
        $dbres = mysql_query($query, $oC->c);
        $UsID = $oU->userID;
        if (mysql_num_rows($dbres) && isset($GLOBALS["_ADDIN_DISABLED"]) && !$GLOBALS["_ADDIN_DISABLED"]) {
            while ($row = mysql_fetch_assoc($dbres)) {
                if (isset($GLOBALS["_ADDIN_WGOWNER"][$row["MnID"]])) {
                    $MnID2GpID = $GLOBALS["_ADDIN_WGOWNER"][$row["MnID"]];
                    $sys_group = $MnID2GpID;
                    $tmpitem_cont = $extblogitem_content;
                    $item_link = htmlspecialchars($GLOBALS["_SUBSYS_URL"][$sys_index][$sys_group] . $row["MnURL"] . (preg_match("/\?/", $row["MnURL"]) ? "&mi=" : "?mi=") . $row["MnID"]);
                    $item_title = $row["MnNameT"];
                    $system_title = $row["StNameT"];
                    bind_content(array("ITEMLINK" => $item_link,
                                       "ITEMTITLE" => $item_title), $tmpitem_cont);
                    $item_content .= $tmpitem_cont;
                }
            }
            $ifadqry = "select umusergroup.* from $db.umusergroup where umusergroup.UgUsID = $UsID and umusergroup.UgGpID = " . $GLOBALS["_INFOADMIN_GPID"];
            $ifadres = mysql_query($ifadqry, $oC->c);
            if (mysql_num_rows($ifadres) > 0) {
                $tmpitem_cont = $extblogitem_content;
                $item_link = "test1.php";
                $item_title = "หน้าแรกในวันสำคัญ";
                bind_content(array("ITEMLINK" => $item_link,
                                   "ITEMTITLE" => $item_title), $tmpitem_cont);
                $item_content .= $tmpitem_cont;

                $tmpitem_cont = $extblogitem_content;
                $item_link = "test2.php";
                $item_title = "ลิงค์ไปยังเว็บอื่นๆ";
                bind_content(array("ITEMLINK" => $item_link,
                                   "ITEMTITLE" => $item_title), $tmpitem_cont);
                $item_content .= $tmpitem_cont;
            }
            if ($item_content != "") {
                bind_content(array("MENUTITLE" => trim($system_title),
                                   "MENUITEM" => $item_content), $extblogmenu_content);
                $extended_menu = $extblogmenu_content;
            }
        }
        $oC->Disconnect();
    }
    return $extended_menu;
}

function getRightContent_preLog ( )
{
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "temporary_page.tpl");
    return $right_content;
}

function getRightContent_postLog ( )
{
    $oU = $_SESSION["oU"];

    $row_index = 0;
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace01.tpl");
    $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
    if ($oC->c && $oC->errmsg == "") {
        $oGrp = new umgroup($oC);
        $oUg = new umusergroup($oC);
        $menuInfo = array();
        $grouping = array();
        $oUg->RSgroupByUsNoUgGpIDAdmin($oU->userID, "UgGpID"); //No Group Admin (GpID=1)
        while ($oUg->GetRecord()) {
            $oGrp->SearchByKey($oUg->UgGpID);
            $oGrp->GetRecord();
            if (isset($GLOBALS["_SYSDIR_PATH"][$oGrp->GpStID]) && $oGrp->GpStID != $GLOBALS["_ADDIN_BLOG"]) {
                $menuInfo[$row_index]["gpnamet"] = $oGrp->GpNameT;
                $menuInfo[$row_index]["gpstid"] = $oGrp->GpStID;
                $menuInfo[$row_index]["uggpid"] = $oUg->UgGpID;

                // Fixed group by system-id
                if (!isset($grouping[$oGrp->GpStID]))
                    $grouping[$oGrp->GpStID] = array();
                $grouping[$oGrp->GpStID][] = array("gpnamet" => $oGrp->GpNameT,
                                                   "gpstid" => $oGrp->GpStID,
                                                   "uggpid" => $oUg->UgGpID,
                                                   "linked" => $row_index);
                // End Fixed
                $row_index++;
            }
        }
        ksort($grouping);
        $group_max = 0;
        foreach ($grouping as $group) {
            $group_len = count($group);
            if ($group_len > $group_max)
                $group_max = $group_len;
        }

        $_SESSION["SubSys"] = $menuInfo;
		$psId=$oU->userPsCode;
		$psWgID=$oU->WgID;
		//------------
		?>
		<?php $spacer=$GLOBALS["_INFO_URL"]."img/spacer.gif";
		   $subsys_img=$GLOBALS["_INFO_URL"]."img/subsys.gif";
		   $myhost=$GLOBALS["HOST_NAME"];
		 ?>
		 <table width="95%" border="0" cellspacing="0" cellpadding="0" summary="" bgcolor="#FFFFFF" align="center">
				<tr><td height="25"> </td></tr>
				<tr><td colspan="2"><img src="<?php echo $spacer; ?>" width="1" height="3" alt=""></td></tr>
				<tr valign="middle">
					<td align="center" colspan="2">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" summary="">
							<tr valign="middle">
								<td align="left" style="width: 36px;"><img src="<?php echo $subsys_img; ?>" alt=""></td>
								<td align="left"><span style="font-size: 18pt; color: #A3A3A3; font-family: 'Ms sans serif', sans-serif; font-weight: bold;"><?php echo $GLOBALS["INFOSYS_MESG"]; ?></span></td>
								<td align="right" style="width: 30px;"><img src="<?php echo $spacer; ?>" alt=""></td>
								<td align="right" style="width: 30px;"><img src="<?php echo $spacer; ?>" alt="" width="1" height="23"></td>
							</tr>
						</table>
					</td>
				</tr>
			<tr><td colspan="2"><img src="<?php echo $spacer; ?>" width="1" height="3" alt=""></td></tr>
			<tr><td colspan="2"><img src="<?php echo $spacer; ?>" width="1" height="4" alt=""></td></tr>
			<tr><td colspan="2" bgcolor="#009933"><img src="<?php echo $spacer; ?>" width="1" height="4" alt=""></td></tr>
			</table>
			<!--script src="http://code.jquery.com/jquery-latest.js"></script-->
			<script type="text/javascript" language="JavaScript" src="js/jquery-latest.js"></script>
			<div id='showtest2' align=left></div>
				<script type='text/javascript'>

				var loader = '<div align=\"center\">Loading...</div>';
				$('div#showtest2').empty().append(loader)
					var url = 'http://'+'<?php echo $myhost?>'+'/mispbri/info/mod/showwork.php?psId='+<?php echo $psId?>+'&psWgID='+<?php echo $psWgID?>;
						$.ajax(
							{
		   						type: 'GET',
							   	url: url,
							   	data: '',
							   	success: 
								    function(t) 
						          	{
						           		$('div#showtest2').empty().append(t);
						       	   	},
							   	error:
								   	function()
								   	{
								    	$('div#showtest2').append('-');
								   	}
						});	
				</script>

<?php


			$extended_content = "<font size=2>";
            $extended_content = $extended_content.buildGSystemMenu($grouping);
			$extended_content = $extended_content."</font>";
		
        $oC->Disconnect();
    } else {
        if ($GLOBALS["DEBUG_MODE"]) {
            if ($oConn->errmsg != "")
                $extended_content = "ไม่สามารถติดต่อฐานข้อมูลหรือไม่มีฐานข้อมูลที่ระบุ.";
        } else {
            $extended_content = "";
        }
    }
    bind_content(array("INFOTITLE" => $GLOBALS["INFOSYS_MESG"],
                       "EXTENDED" => $extended_content), $right_content);
    return $right_content;
}

function getConfigContent_postLog ( )
{
    $arrConfig = &$GLOBALS["_CONFIG_MOD"];
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace04.tpl");
    $extended_content = buildConfigMenu($arrConfig);
    bind_content(array("INFOTITLE" => $GLOBALS["_CONFIG_TITLE"],
                       "EXTENDED" => $extended_content), $right_content);
    return $right_content;
}

function getTitlePage ( )
{
    if (isset($GLOBALS["SYSTEM_TITLE"]) && $GLOBALS["SYSTEM_TITLE"] != "")
        $system_title = $GLOBALS["SYSTEM_TITLE"];
    else if (isset($GLOBALS["INFOSYS_TITLE"]) && $GLOBALS["INFOSYS_TITLE"] != "")
        $system_title = $GLOBALS["INFOSYS_TITLE"];
    else
        $system_title = "ระบบสารสนเทศ";
    return $system_title;
}

function getLogoImage ( )
{
    $logo_path = "";
    if (!isset($GLOBALS["INFOSYS_LOGO"]) || $GLOBALS["INFOSYS_LOGO"] == "")
        $logo_path = $GLOBALS["_IMG_URL"] . "infosyslogo.jpg";
    else
        $logo_path = $GLOBALS["_IMG_URL"] . $GLOBALS["INFOSYS_LOGO"];
    return $logo_path;
}

function GetSysDate ($timeVal)
{
    $mmonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $dd = date("j", $timeVal);
    $mm = $mmonth[date("m", $timeVal) - 1];
    $yy = date("Y", $timeVal) + 543;
    $datestring = $dd . " " . $mm . " " . $yy;
    return $datestring;
}

function printLoginFail ( )
{
    if (isset($_POST["pproto"]) && $_POST["pproto"] == "s")
        header("Location: https://" . $GLOBALS['_INFO_INDEX'] . "?__m=denied");
    else
        header("Location: http://" . $GLOBALS['_INFO_INDEX'] . "?__m=denied");
}

function printLoginSuccess ( )
{
    if (isset($_POST["pproto"]) && $_POST["pproto"] == "s")
        header("Location: https://" . $GLOBALS['_INFO_INDEX'] . "?__m=reload");
    else
        header("Location: http://" . $GLOBALS['_INFO_INDEX'] . "?__m=reload");
}

function extended_debug_code ($mesg)
{
    $response_cont = read_template($GLOBALS["_TPL_PATH"] . "response.tpl");
    bind_content(array("JSFILE" => "js/blank.js",
                       "STARTCODE" => "parent.printDebugMsg('" . preg_replace("/[\r\n]/", "", $mesg) . "');",
                       "RESTAGS" => "&nbsp;"), $response_cont);
    echo $response_cont;
}

function prologin_debug_code ( )
{
    $response_cont = read_template($GLOBALS["_TPL_PATH"] . "response.tpl");
    bind_content(array("JSFILE" => "js/blank.js",
                       "STARTCODE" => "parent.printDebugMsg('" . preg_replace("/[\r\n]/", "", read_template($GLOBALS["_TPL_PATH"] . "extenederror.tpl")) . "');",
                       "RESTAGS" => "&nbsp;"), $response_cont);
    echo $response_cont;
}

function buildSystemMenu ($mArray)
{
    $syslength = count($mArray);
    $_SESSION["first_page"] = array();
    $oU = &$_SESSION["oU"];
    if ($syslength == 0) {
        $sysstr  = "<br>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">ยังไม่ได้รับอนุญาตให้ใช้งานระบบใดๆ ในตอนนี้</span>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">กรุณาติดต่อผู้ดูแลระบบของท่าน</span>";
    } else {
        $maxrow = ceil(($syslength + 0.5) / 4);
        $row_tmp = "\n";
        $sysstr = "<font size=2><table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"4\" summary=\"\" style=\"table-layout: fixed\">\n";
        for ($r = 0; $r < $maxrow; $r++) {
            if (($r + 1) == $maxrow) {
                $remn = $syslength % 4;
                $row_tmp .= $remn ? "<tr>\n" : "";
                for ($j = 0; $j < $remn; $j++) {
                    $curr_no = (($r * 4) + $j + 1) - 1;
                    $system_id = $mArray[$curr_no]["gpstid"];
					if($system_id!=1){ //-----------------------------------------------------not show admin group
						if (preg_match("/(ผู้ดูแลระบบ)/", $mArray[$curr_no]["gpnamet"])) {
							$system_name = "ระบบบริหารระบบ";
							$system_group = "ผู้ดูแลระบบ";
						} else {
							list($system_name, $system_group) = preg_split("[-]", $mArray[$curr_no]["gpnamet"]);
							$system_name = "ระบบ" . $system_name;
							$system_group = $system_group;
						}
						$group_id = $mArray[$curr_no]["uggpid"];
						$_SESSION["first_page"][$system_id] = htmlspecialchars($GLOBALS["_SUBSYS_URL"][$system_id][$group_id] . $GLOBALS["_SYS1ST_URL"][$system_id][$group_id] . "?__ss=" . $system_id . "&__ii=" . $curr_no . "&__gp=" . $group_id);
						$url = $_SESSION["first_page"][$system_id];
						$col_tmp = "<td valign=\"top\" style=\"text-align: left;\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_$curr_no\" src=\"" . $GLOBALS["_SYSICO_MINI"][$system_id] . "\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\"></td><td valign=\"top\"><span id=\"sys_name_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\">${system_name}</span></td></tr><tr><td valign=\"top\"><span id=\"sys_group_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\">${system_group}</span></td></tr></table></td>\n";
						$row_tmp .= $col_tmp;
					} //--------------------------------------------------------
                }
                for (   ; $j < 4 && $remn > 0; $j++)
                    $row_tmp .= "<td style=\"text-align: center;\"><img src=\"{INFOURL}img/spacer.gif\" width=\"1\" alt=\"\"></td>\n";
                $row_tmp .= ($remn) ? "</tr>\n" : "";
            } else {
                $row_tmp .= "<tr>\n";
                for ($j = 0; $j < 4; $j++) {
                    $curr_no = (($r * 4) + $j + 1) - 1;
                    $system_id = $mArray[$curr_no]["gpstid"];
                    if (preg_match("/(ผู้ดูแลระบบ)/", $mArray[$curr_no]["gpnamet"])) {
                        $system_name = "ระบบบริหารระบบ";
                        $system_group = "ผู้ดูแลระบบ";
                    } else {
                        list($system_name, $system_group) = preg_split("[-]", $mArray[$curr_no]["gpnamet"]);
                        $system_name = "ระบบ" . $system_name;
                        $system_group = $system_group;
                    }
                    $group_id = $mArray[$curr_no]["uggpid"];
                    $_SESSION["first_page"][$system_id] = htmlspecialchars($GLOBALS["_SUBSYS_URL"][$system_id][$group_id] . $GLOBALS["_SYS1ST_URL"][$system_id][$group_id] . "?__ss=" . $system_id . "&__ii=" . $curr_no . "&__gp=" . $group_id);
                    $url = $_SESSION["first_page"][$system_id];
                    $col_tmp = "<td valign=\"top\" style=\"text-align: left;\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_$curr_no\" src=\"" . $GLOBALS["_SYSICO_MINI"][$system_id] . "\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\"></td><td valign=\"top\"><span id=\"sys_name_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\">${system_name}</span></td></tr><tr><td valign=\"top\"><span id=\"sys_group_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, $curr_no, '$url')\">${system_group}</span></td></tr></table></td>\n";
                    $row_tmp .= $col_tmp;
                }
                $row_tmp .= "</tr>\n";
            }
        }
        $sysstr .= $row_tmp . "</table></font>\n";
    }
    return $sysstr;
}
function buildGSystemMenu ($grouping)
{
    $_SESSION["first_page"] = array();
    $oU = &$_SESSION["oU"];
    if (count($grouping) == 0) {
        $sysstr  = "<br>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">ยังไม่ได้รับอนุญาตให้ใช้งานระบบใดๆ ในตอนนี้</span>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">กรุณาติดต่อผู้ดูแลระบบของท่าน</span>";
    } else {
        $toptab_row = "";
        foreach ($grouping as $mArray) {
            $syslength = count($mArray);
            $maxrow = ceil(($syslength + 0.5) / 4);
            $row_tmp = "\n";
            $sysstr = "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"4\" summary=\"\" style=\"table-layout: fixed\">\n";
            for ($r = 0; $r < $maxrow; $r++) {
                if (($r + 1) == $maxrow) {
                    $remn = $syslength % 4;
                    $row_tmp .= $remn ? "<tr>\n" : "";
                    for ($j = 0; $j < $remn; $j++) {
                        $curr_no = (($r * 4) + $j + 1) - 1;
                        $system_id = $mArray[$curr_no]["gpstid"];
                        if (preg_match("/(ผู้ดูแลระบบ)/", $mArray[$curr_no]["gpnamet"])) {
                            $system_name = "ระบบบริหารระบบ";
                            $system_group = "ผู้ดูแลระบบ";
                        } else {
                            list($system_name, $system_group) = preg_split("[-]", $mArray[$curr_no]["gpnamet"]);
                            $system_name = "ระบบ" . $system_name;
                            $system_group = $system_group;
                        }
                        $group_id = $mArray[$curr_no]["uggpid"];
                        $linked_index = $mArray[$curr_no]["linked"];
                        $object_id = $linked_index . "_" . $curr_no;
                        $_SESSION["first_page"][$system_id] = htmlspecialchars($GLOBALS["_SUBSYS_URL"][$system_id][$group_id] . $GLOBALS["_SYS1ST_URL"][$system_id][$group_id] . "?__ss=" . $system_id . "&__ii=" . $linked_index . "&__gp=" . $group_id);
                        $url = $_SESSION["first_page"][$system_id];
                        $col_tmp = "<td valign=\"top\" style=\"text-align: left;\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_${object_id}\" src=\"" . $GLOBALS["_SYSICO_MINI"][$system_id] . "\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\"></td><td valign=\"top\"><span id=\"sys_name_${object_id}\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\">${system_name}</span></td></tr><tr><td valign=\"top\"><span id=\"sys_group_${object_id}\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\">${system_group}</span></td></tr></table></td>\n";
                        $row_tmp .= $col_tmp;
                    }
                    for (   ; $j < 4 && $remn > 0; $j++)
                        $row_tmp .= "<td style=\"text-align: center;\"><img src=\"{INFOURL}img/spacer.gif\" width=\"1\" alt=\"\"></td>\n";
                    $row_tmp .= ($remn) ? "</tr>\n" : "";
                } else {
                    $row_tmp .= "<tr>\n";
                    for ($j = 0; $j < 4; $j++) {
                        $curr_no = (($r * 4) + $j + 1) - 1;
                        $system_id = $mArray[$curr_no]["gpstid"];
                        if (preg_match("/(ผู้ดูแลระบบ)/", $mArray[$curr_no]["gpnamet"])) {
                            $system_name = "ระบบบริหารระบบ";
                            $system_group = "ผู้ดูแลระบบ";
                        } else {
                            list($system_name, $system_group) = preg_split("[-]", $mArray[$curr_no]["gpnamet"]);
                            $system_name = "ระบบ" . $system_name;
                            $system_group = $system_group;
                        }
                        $group_id = $mArray[$curr_no]["uggpid"];
                        $linked_index = $mArray[$curr_no]["linked"];
                        $object_id = $linked_index . "_" . $curr_no;
                        $_SESSION["first_page"][$system_id] = htmlspecialchars($GLOBALS["_SUBSYS_URL"][$system_id][$group_id] . $GLOBALS["_SYS1ST_URL"][$system_id][$group_id] . "?__ss=" . $system_id . "&__ii=" . $linked_index . "&__gp=" . $group_id);
                        $url = $_SESSION["first_page"][$system_id];
                        $col_tmp = "<td valign=\"top\" style=\"text-align: left;\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_${object_id}\" src=\"" . $GLOBALS["_SYSICO_MINI"][$system_id] . "\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\"></td><td valign=\"top\"><span id=\"sys_name_${object_id}\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\">${system_name}</span></td></tr><tr><td valign=\"top\"><span id=\"sys_group_${object_id}\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, '$object_id', '$url')\">${system_group}</span></td></tr></table></td>\n";
                        $row_tmp .= $col_tmp;
                    }
                    $row_tmp .= "</tr>\n";
                }
            }
            $sysstr .= $row_tmp . "</table>\n";
            $toptab_row .= "<tr><td colspan=\"2\" align=\"left\"><img src=\"{INFOURL}img/spacer.gif\" width=\"1\" height=\"2\" alt=\"\"></td></tr>\n";
            $toptab_row .= "<tr><td style=\"color: #3261BB; font-size: 12pt; font-weight: bold;\" align=\"left\">$system_name</td><td>&nbsp;</td></tr>\n";
            $toptab_row .= "<tr><td colspan=\"2\" align=\"left\"><img src=\"{INFOURL}img/grouping_bar.jpg\" alt=\"\"></td></tr>\n";
            $toptab_row .= "<tr><td colspan=\"2\" align=\"left\">\n";
            $toptab_row .= "$sysstr</td></tr>\n";
            $toptab_row .= "<tr><td colspan=\"2\" align=\"left\"><img src=\"{INFOURL}img/spacer.gif\" width=\"1\" height=\"8\" alt=\"\"></td></tr>\n";
        }
        $toptabs = "<table width=\"100%\" border=\"0\" cellspacing=\"1\" cellpadding=\"1\" summary=\"\">$toptab_row</table>\n";
    }
    return $toptabs;
}

function buildConfigMenu ($mArray)
{
    $arrlength = count($mArray);
    $oU = &$_SESSION["oU"];
    if ($arrlength == 0) {
        $sysstr  = "<br>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">ยังไม่ได้รับอนุญาตให้ใช้งานระบบใดๆ ในตอนนี้</span>";
        $sysstr .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">กรุณาติดต่อผู้ดูแลระบบของท่าน</span>";
    } else {
        $maxrow = ceil(($arrlength + 0.5) / 4);
        $row_tmp = "\n";
        $sysstr = "<table width=\"100%\" border=\"0\" cellspacing=\"5\" cellpadding=\"4\" summary=\"\" style=\"table-layout: fixed\">\n";
        for ($r = 0; $r < $maxrow; $r++) {
            if (($r + 1) == $maxrow) {
                $remn = $arrlength % 4;
                $row_tmp .= $remn ? "<tr>\n" : "";
                for ($j = 0; $j < $remn; $j++) {
                    $curr_no = (($r * 4) + $j + 1) - 1;
                    $system_name = trim($mArray[$r]["sys_name"]);
                    $system_group = $mArray[$r]["sys_modn"];
                    $system_link = htmlspecialchars($mArray[$r]["sys_link"]);
                    $col_tmp = "<td valign=\"top\" style=\"text-align: left; font-size: 12pt; \"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_$curr_no\" src=\"{INFOURL}img/chpasswd-mini.gif\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\"></td><td valign=\"top\"><span id=\"sys_name_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\">${system_name}</span></td></tr><tr><td><span id=\"sys_group_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\">${system_group}</span></td></tr></table></td>";
                    $row_tmp .= $col_tmp;
                }
                for (   ; $j < 4 && $remn > 0; $j++)
                    $row_tmp .= "<td style=\"text-align: center;\"><img src=\"{INFOURL}img/spacer.gif\" width=\"1\" alt=\"\"></td>\n";
                $row_tmp .= ($remn) ? "</tr>\n" : "";
            } else {
                $row_tmp .= "<tr>\n";
                for ($j = 0; $j < 4; $j++) {
                    $curr_no = (($r * 4) + $j + 1) - 1;
                    $system_name = trim($mArray[$r]["sys_name"]);
                    $system_group = $mArray[$r]["sys_modn"];
                    $system_link = htmlspecialchars($mArray[$r]["sys_link"]);
                    $col_tmp = "<td valign=\"top\" style=\"text-align: left;\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" summary=\"\"><tr><td rowspan=\"2\" style=\"width: 46px; cursor: pointer;\" valign=\"top\"><img id=\"sys_img_$curr_no\" src=\"{INFOURL}img/chpasswd-mini.gif\" alt=\"\" border=\"0\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\"></td><td valign=\"top\"><span id=\"sys_name_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #898989;\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\">${system_name}</span></td></tr><tr><td><span id=\"sys_group_$curr_no\" style=\"font-weight: bold; cursor: pointer; color: #11387D;\" onmouseover=\"sysmenuMover(event, $curr_no, '$system_link')\">${system_group}</span></td></tr></table></td>";
                    $row_tmp .= $col_tmp;
                }
                $row_tmp .= "</tr>\n";
            }
        }
        $sysstr .= $row_tmp . "</table>\n";
    }
    return $sysstr;
}

function encryptmesg ($plantext)
{
    $chsalt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789./";
    $planlen = strlen($plantext);
    $saltpos = array($planlen);
    for ($i = 0; $i < $planlen; $i++)
        $saltpos[$i] = mt_rand(0, 63);
    $encrypted1 = base64_encode($plantext);
    $encrypted2 = "";
    $enc1_len = strlen($encrypted1);
    for ($i = 0; $i < $enc1_len; $i++)
        $encrypted2 .= $encrypted1{$i} . $chsalt{$saltpos[$i]};
    return base64_encode($encrypted2);
}

function decryptmesg ($ciphertext)
{
    $encrypted1 = "";
    $encrypted2 = base64_decode($ciphertext);
    $enc2_len = strlen($encrypted2);
    for ($i = 0; $i < $enc2_len; $i += 2)
        $encrypted1 .= $encrypted2{$i};
    return base64_decode($encrypted1);
}

function GetExtendedCSS ( )
{
    $CSSExtLink = "";
    $link_tag = "<link type=\"text/css\" href=\"{CSS_PATH}\" rel=\"stylesheet\">\n";
    if (isset($GLOBALS["_EXTENDED_CSS"]) && is_array($GLOBALS["_EXTENDED_CSS"])) {
        $gbRefn = &$GLOBALS["_EXTENDED_CSS"];
        $ext_length = count($gbRefn);
        for ($i = 0; $i < $ext_length; $i++) {
            $tmp_link = $link_tag;
            if (!is_file($gbRefn[$i]))
                $tmp_link = "<!-- ``{CSS_PATH}'' - File not found! -->\n";
            bind_content(array("CSS_PATH" => $gbRefn[$i]), $tmp_link);
            $CSSExtLink .= $tmp_link;
        }
    }
    return $CSSExtLink;
}

function GetExtendedJS ( )
{
    $JSExtScript = "";
    $script_tag = "<script type=\"text/javascript\" language=\"JavaScript\" src=\"{JS_PATH}\"></script>\n";
    if (isset($GLOBALS["_EXTENDED_JS"]) && is_array($GLOBALS["_EXTENDED_JS"])) {
        $gbRefn = &$GLOBALS["_EXTENDED_JS"];
        $ext_length = count($gbRefn);
        for ($i = 0; $i < $ext_length; $i++) {
            $tmp_script = $script_tag;
            if (!is_file($gbRefn[$i]))
                $tmp_script = "<!-- ``{JS_PATH}'' - File not found! -->\n";
            bind_content(array("JS_PATH" => $gbRefn[$i]), $tmp_script);
            $JSExtScript .= $tmp_script;
        }
    }
    return $JSExtScript;
}

function chpasswdResponse ( )
{
    if (isset($_GET["__mx"])) {
        switch ($_GET["__mx"]) {
            case "change":
                processChpasswd();
            break;
            case "reject":
            break;
            case "accept":
            break;
            default:
                printChpasswdPage();
            break;
        }
    } else {
        printChpasswdPage();
    }
}

function printChpasswdPage ( )
{
    ob_start("postLogTpl");
    echo activeChpasswdPage();
    ob_end_flush();
}

function activeChpasswdPage ( )
{
    $aChpasswd = &$GLOBALS["_CONFIG_MOD"][0];
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace05.tpl");
    $extended_content = getChpasswdPage();
    bind_content(array("SYSTEMNAME" => "<font size=4px>ตั้งค่าการใช้งาน</font>",
                       "SYSTEMSGRP" => $aChpasswd["sys_name"],
                       "SYSTEMICO" => $GLOBALS["_INFO_URL"] . "img/chpasswd-large.gif",
                       "EXTENDED" => $extended_content), $right_content);
    return $right_content;
}

function getChpasswdPage ( )
{
    $oU = $_SESSION["oU"];
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace_chpasswd.tpl");
    $dynamic_page = read_template($GLOBALS["_TPL_PATH"] . "chpasswd.tpl");
    bind_content(array("INFOINDEX" => "http://" . $GLOBALS["_INFO_INDEX"], "USERLOGIN" => $oU->userLogin), $dynamic_page);
    bind_content(array("CHPASSWD" => $dynamic_page), $right_content);
    return $right_content;
}

function processChpasswd ( )
{
    $oU = $_SESSION["oU"];
    $response_cont = read_template($GLOBALS["_TPL_PATH"] . "response.tpl");
    $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
    if ($oC->c && $oC->errmsg == "" && isset($_POST["Continue"])) {
        $db = $GLOBALS["DBNAME_UMS"];
        $qstring = "select umuser.UsLogin, umuser.UsPassword from $db.umuser where umuser.UsID = " . $oU->userID . " and umuser.UsPassword = '" . md5("O]O" . $_POST["CurPWD"] . "O[O") . "'";
        $dbres = mysql_query($qstring, $oC->c);
        $startup = "if (parent.ResetCurPWD) {parent.alertRejectMsg('รหัสผ่านเดิมไม่ถูกต้อง - กรุณาพิมพ์ใหม่  '); parent.ResetCurPWD();}";
        if (mysql_num_rows($dbres) > 0 && trim($_POST["NewPW1"]) == trim($_POST["NewPW2"])) {
            mysql_query("update $db.umuser set UsPassword = '" . md5("O]O" . $_POST["NewPW1"] . "O[O") . "' where umuser.UsID = " . $oU->userID, $oC->c);
            if (mysql_affected_rows($oC->c) != 1)
                $startup = "if (parent.ResetCurPWD) {parent.alertRejectMsg('รหัสผ่านใหม่ตรงกับรหัสผ่านเดิม - กรุณาพิมพ์ใหม่  '); parent.ResetCurPWD();}";
            else
                $startup = "if (parent.ResetCurPWD) {parent.alertRejectMsg('การแก้ไขรหัสผ่านสำเร็จแล้ว - กรุณาใช้รหัสผ่านใหม่ในการเข้าใช้ระบบครั้งต่อไป  '); parent.ResetCurPWD(); parent.location.replace('" . "http://" . $GLOBALS["_INFO_INDEX"] . "?__m=config');}";
        }
        bind_content(array("JSFILE" => "js/blank.js",
                           "STARTCODE" => $startup,
                           "RESTAGS" => "&nbsp;"), $response_cont);
        echo $response_cont;
        $oC->Disconnect();
    }
}

// 1147107600 => 09/05/2549
function Time2THDate ($ctime)
{
    $dd = date("d", $ctime);
    $mm = date("m", $ctime);
    $yyyy = date("Y", $ctime) + 543;
    $tdformat = $dd . "/" . $mm . "/" . $yyyy;
    return $tdformat;
}

// 11/05/2549 => 11/05/2006
function TH2ENDate($datestr = "")
{
    $retval = "";
    if ($datestr != "" && preg_match("/\d{2}\/\d{2}\/\d{4}/", $datestr)) {
        list($dd, $mm, $yy) = preg_split("/\//", $datestr);
        $retval = $dd . "/" . $mm . "/" . ($yy - 543);
    }
    return $retval;
}

// 11/05/2006 => 11/05/2549
function EN2THDate($datestr = "")
{
    $retval = "";
    if ($datestr != "" && preg_match("/\d{2}\/\d{2}\/\d{4}/", $datestr)) {
        list($dd, $mm, $yy) = preg_split("/\//", $datestr);
        $retval = $dd . "/" . $mm . "/" . ($yy + 543);
    }
    return $retval;
}
?>