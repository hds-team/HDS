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

function CSS_Header ($path, $force = true)
{
    if (!isset($GLOBALS["_EXTENDED_CSS"]) || $force !== false) {
        $GLOBALS["_EXTENDED_CSS"] = array();
        $GLOBALS["_EXTENDED_CSS"][] = trim($path);
    } else {
        $GLOBALS["_EXTENDED_CSS"][] = trim($path);
    }
}

function JS_Header ($path, $force = true)
{
    if (!isset($GLOBALS["_EXTENDED_JS"]) || $force !== false) {
        $GLOBALS["_EXTENDED_JS"] = array();
        $GLOBALS["_EXTENDED_JS"][] = trim($path);
    } else {
        $GLOBALS["_EXTENDED_JS"][] = trim($path);
    }
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

function system_out ($fpath, $defaultval)
{
    $retval = false;
    if (($handle = fopen($fpath, "w"))) {
        if (fwrite($handle, $defaultval) === FALSE) {
            if ($handle)
                fclose($handle);
        } else {
            fclose($handle);
            $retval = true;
        }
    }
    return $retval;
}

function showHeader ( )
{
    /* - Do nothing - */
    /* - Empty stuff for backward compatable. - */
}

function showFooter ( )
{
    /* - Just flush buffer - */
    ob_end_flush();
}

function incsubmenuTpl ($submenu_content)
{
    $submenu_content = "";
    $leftside_content = getLeftTplContent();
    $rightside_content = getRightTplContent_sm();
    return buildSysLayout(read_template($GLOBALS["_TPL_PATH"] . "postlogin.tpl"), $leftside_content, $rightside_content);
}

function nonsubmenuTpl ($extended_content)
{
    $leftside_content = getLeftTplContent();
    $rightside_content = getRightTplContent($extended_content);
    return buildSysLayout(read_template($GLOBALS["_TPL_PATH"] . "postlogin.tpl"), $leftside_content, $rightside_content);
}

function addinURLLink ($extended_content)
{
    $leftside_content = getLeftAddinContent();
    $rightside_content = getRightAddinContent($extended_content);
    return buildSysLayout(read_template($GLOBALS["_TPL_PATH"] . "postlogin.tpl"), $leftside_content, $rightside_content);
}

function buildSysLayout (&$pagelayout, &$left_content, &$right_content)
{
    bind_content(array("TITLE" => getTitlePage(),
                       "SYSLOGO" => getLogoImage(),
                       "LEFTSIDE" => $left_content,
                       "RIGHTSIDE" => $right_content), $pagelayout);
    bind_content(array("INFOURL" => $GLOBALS["_INFO_URL"],
                       "EXTCSSFILES" => GetExtendedCSS(),
                       "EXTJSFILES" => GetExtendedJS(),
                       "SYSTEMICO" => $_SESSION["SysIcon"]), $pagelayout);
    return $pagelayout;
}

function getLeftTplContent ( )
{
    global $oU;
    $left_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog.tpl");
    // Update sysDate to current date + Reset sysDate0 to original format.
    $_SESSION["sysDate"] = date("d/m/Y");
    $_SESSION["sysDate0"] = $_SESSION["sysDSave"];
    $extended_menu = "";
    bind_content(array("USERLOGIN" => $_SESSION["oU"]->userLogin,
                       "USERINFO" => $_SESSION["oU"]->userName,
                       "USERDEPT" => $_SESSION["oU"]->deptName,
                       "MISNDATE" => GetSysDate(time()),
                       "EXTENDED_MENU" => $extended_menu), $left_content);
    return $left_content . getLeftTplContent_rt();
}

function getLeftAddinContent ( )
{
    global $oU;
    $left_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog.tpl");
    $mission_date = isset($_SESSION["sysDate"]) ? $_SESSION["sysDate"] : GetSysDate(time());
    $system_id = 0;
    $extended_menu = getLeftExtendedMenu();
    bind_content(array("USERLOGIN" => $_SESSION["oU"]->userLogin,
                       "USERINFO" => $_SESSION["oU"]->userName,
                       "USERDEPT" => $oU->deptName,
                       "MISNDATE" => $mission_date,
                       "EXTENDED_MENU" => $extended_menu), $left_content);
    return $left_content;
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

function getRightTplContent (&$extended_content)
{
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace02.tpl");
    if ($extended_content == "") {
        $extended_content  = "<div align=\"center\">\n";
        $extended_content .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">ไม่มีรายการเมนูย่อยหรือยังไม่ได้เปิดให้ใช้งานในตอนนี้</span>";
        $extended_content .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">กรุณาติดต่อผู้ดูแลระบบของท่าน</span>";
        $extended_content .= "</div>\n";
    }
    if ($GLOBALS["SYSTEM_TITLE"] == "")
        $GLOBALS["SYSTEM_TITLE"] = $_SESSION["SysName"] . " - " . $_SESSION["SysSGrp"];
    bind_content(array("SYSTEMNAME" => $_SESSION["SysName"],
                       "SYSTEMSGRP" => $_SESSION["SysSGrp"],
                       "SYSXDETAIL" => $GLOBALS["SYSTEM_DETAIL"],
                       "EXTENDED" => $extended_content), $right_content);
    return $right_content;
}

function getRightTplContent_sm ( )
{
    global $oU;
    $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
    $submenu_content = read_template($GLOBALS["_TPL_PATH"] . "workspace_submenu.tpl");
    $mnulegend = "แจ้งเตือน";
    $dynamic_submenu = "";
	
    if ($oC->c && $oC->errmsg == "") {
        $oMmn  = new ummenu($oC);
        $oMmn->RSmenuByParentMn($oU->MmnID);
        if ($oMmn->GetRowSelected() > 0) {
            $oMmn->SearchByKey($oU->MmnID);
            $oMmn->GetRecord();
            $mnulegend = trim($oMmn->MnNameT);
            if (isset($_GET["__ss"], $_GET["__gp"], $GLOBALS["_SYS1ST_URL"][$_GET["__ss"]][$_GET["__gp"]]))
                $_SESSION["TopLgLink"] = $GLOBALS["_SYS1ST_URL"][$_GET["__ss"]][$_GET["__gp"]] . "?" . $_SERVER["QUERY_STRING"];
            else
                $_SESSION["TopLgLink"] = "";
            $_SESSION["TopLgName"] = $mnulegend;
        }
		$dynamic_submenu="<font size=2>";
        getSubmenu($oC, $oU->MmnID, $oU->userID, $oU->GpID, 1, $dynamic_submenu);
		$dynamic_submenu.="</font>";
        if ($dynamic_submenu == "") {
            $dynamic_submenu  = "<div align=\"center\">\n";
            $dynamic_submenu .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">ไม่มีรายการเมนูย่อยหรือยังไม่ได้เปิดให้ใช้งานในตอนนี้</span>";
            $dynamic_submenu .= "<br><span style=\"font-size: 16pt; font-weight: bold; color: orange;\">กรุณาติดต่อผู้ดูแลระบบของท่าน</span>";
            $dynamic_submenu .= "</div>\n";
        }
        $oC->Disconnect();
    }
    if ($GLOBALS["SYSTEM_TITLE"] == "")
        $GLOBALS["SYSTEM_TITLE"] = $_SESSION["SysName"] . " - " . $mnulegend;
    bind_content(array("MNULEGEND" => $mnulegend,"SUBMENU" => $dynamic_submenu), $submenu_content);
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace03.tpl");
    bind_content(array("SYSTEMNAME" => $_SESSION["SysName"],
                       "SYSTEMSGRP" => $_SESSION["SysSGrp"],
                       "SYSXDETAIL" => $GLOBALS["SYSTEM_DETAIL"],
                       "EXTENDED" => $submenu_content), $right_content);
    return $right_content;
}

function getRightAddinContent (&$extended_content)
{
    $db = $GLOBALS["DBNAME_UMS"];
    $right_content = read_template($GLOBALS["_TPL_PATH"] . "workspace02.tpl");
    $_SESSION["SysIcon"] = "";
    $_SESSION["SysName"] = "";
    $_SESSION["SysSGrp"] = "";
    $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
    if ($oC->c && $oC->errmsg == "") {
        $query = "select umsystem.StNameT from $db.umsystem where umsystem.StID = " . $GLOBALS["_ADDIN_BLOG"];
        $dbres = mysql_query($query, $oC->c);
        if (mysql_num_rows($dbres) > 0) {
            $row = mysql_fetch_assoc($dbres);
            $_SESSION["SysName"] = $row["StNameT"];
            $_SESSION["SysIcon"] = $GLOBALS["_SYSICO_BIGZ"][$GLOBALS["_ADDIN_BLOG"]];
        }
        if (isset($_GET["mi"]) && isset($GLOBALS["_ADDIN_WGOWNER"][$_GET["mi"]])) {
            $sys_group = $_GET["mi"];
            $query = "select ummenu.MnNameT from $db.ummenu where ummenu.MnID = $sys_group";
            $dbres = mysql_query($query, $oC->c);
            if (mysql_num_rows($dbres) > 0) {
                $row = mysql_fetch_assoc($dbres);
                $_SESSION["SysSGrp"] = trim($row["MnNameT"]);
            }
        } else {
            $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
            header("Location: $full_url");
        }
        $oC->Disconnect();
    }
    bind_content(array("SYSTEMNAME" => $_SESSION["SysName"],
                       "SYSTEMSGRP" => $_SESSION["SysSGrp"],
                       "SYSXDETAIL" => $GLOBALS["SYSTEM_DETAIL"],
                       "EXTENDED" => $extended_content), $right_content);
    return $right_content;
}

function getLeftTplContent_rt ( )
{
    global $oU;
    $subsys = &$_SESSION["SubSys"];
    if (isset($_GET["__ss"], $_GET["__ii"], $_GET["__gp"], $subsys[$_GET["__ii"]])) {
        $test = $GLOBALS["_SUBSYS_URL"];
        if ($_GET["__ss"] != "" && $_GET["__gp"] != "" && isset($test[$_GET["__ss"]], $test[$_GET["__ss"]][$_GET["__gp"]])) {
            $row_index = $_GET["__ii"];
            $sys_index = $_GET["__ss"];
            $sys_group = $_GET["__gp"];
            $_SESSION["SysInfo_ii"] = $_GET["__ii"];
            $_SESSION["SysInfo_ss"] = $_GET["__ss"];
            $_SESSION["SysInfo_gp"] = $_GET["__gp"];
            $first_page = $_SESSION["first_page"][$sys_index];
            $_SESSION["SysIcon"] = $GLOBALS["_SYSICO_BIGZ"][$sys_index];
            if (preg_match("/(ผู้ดูแลระบบ)/", $subsys[$row_index]["gpnamet"])) {
                $_SESSION["SysName"] = "ระบบบริหารระบบ";
                $_SESSION["SysSGrp"] = "กลุ่มผู้ดูแลระบบ";
            } else {
                list($system_name, $system_sgrp) = preg_split("[-]", $subsys[$row_index]["gpnamet"]);
                $_SESSION["SysName"] = "ระบบ" . $system_name;
                $_SESSION["SysSGrp"] = $system_sgrp;
            }
        } else {
            $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
            header("Location: $full_url");
        }
    } else if (isset($_SESSION["SysInfo_ss"], $_SESSION["SysInfo_ii"], $_SESSION["SysInfo_gp"])) {
        $row_index = $_SESSION["SysInfo_ii"];
        $sys_index = $_SESSION["SysInfo_ss"];
        $sys_group = $_SESSION["SysInfo_gp"];
        $first_page = $_SESSION["first_page"][$sys_index];
        $_SESSION["SysIcon"] = $GLOBALS["_SYSICO_BIGZ"][$sys_index];
        if (preg_match("/(ผู้ดูแลระบบ)/", $subsys[$row_index]["gpnamet"])) {
            $_SESSION["SysName"] = "ระบบบริหารระบบ";
            $_SESSION["SysSGrp"] = "กลุ่มผู้ดูแลระบบ";
        } else {
            list($system_name, $system_sgrp) = preg_split("[-]", $subsys[$row_index]["gpnamet"]);
            $_SESSION["SysName"] = "ระบบ" . $system_name;
            $_SESSION["SysSGrp"] = $system_sgrp;
        }
    }
    $rtblogmenu_content = "";
    if (isset($row_index)) {
        $oC = new clsConnection($GLOBALS["DBHOST"], $GLOBALS["DBNAME_UMS"], $GLOBALS["DBUSER_UMS"], $GLOBALS["DBPASS_UMS"]);
        if ($oC->c && $oC->errmsg == "") {
            $rtblogmenu_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog_rt.tpl");
            $rtblogitem_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog_item_rt.tpl");
            $item_content = "";
            $url_padding = "__ss=${sys_index}&__ii=${row_index}&__gp=${sys_group}";
            $pattern = "";
            foreach ($GLOBALS["_SYS1ST_NAME"] as $firstpage_name)
                $pattern .= "($firstpage_name)|";
            $pattern = rtrim($pattern, "|");
            $toskippattern = "";
            foreach ($GLOBALS["_SYSLNK_SKIP"] as $skippage_linked)
                $toskippattern .= "($skippage_linked)|";
            $toskippattern = rtrim($toskippattern, "|");
            $oMmn = new ummenu($oC);
            $oUp = new umpermission($oC);
            $oGp = new umgpermission($oC);
            $oMmn->RSMainMenuBySt($subsys[$row_index]["gpstid"]);
            while ($oMmn->GetRecord()) {
                $flg = 1;
                $oUp->SearchByKey($oU->userID, $oMmn->MnID);
                if ($oUp->GetRecord()) {
                    $flg = $oUp->pmX;
                } else {
                    $oGp->SearchByKey($subsys[$row_index]["uggpid"], $oMmn->MnID);
                    if ($oGp->GetRecord()) {
                        $flg = $oGp->gpX;
                    }
                }
                if ($flg == 1) {
                    if (preg_match("/$toskippattern/", $oMmn->MnNameT))
                        continue;
                    if (preg_match("/$pattern/", $oMmn->MnNameT)) {
                        $item_link = $GLOBALS["_SUBSYS_URL"][$sys_index][$sys_group] . $GLOBALS["_SYS1ST_URL"][$sys_index][$sys_group] . "?" . $url_padding;
                    } else {
                        $oMmn->MnURL = trim($oMmn->MnURL);
                        if ($oMmn->MnURL == "")
                            $item_link = $GLOBALS["_SUBSYS_URL"][$sys_index][$sys_group] . $GLOBALS["_SYS1ST_URL"][$sys_index][$sys_group] . "?StID=" . $sys_index . "&GpID=" . $sys_group . "&MmnID=" . $oMmn->MnID . "&mm=1&" . $url_padding;
                        else
                            $item_link = $oMmn->MnURL;
                    }
                    $item_title = trim($oMmn->MnNameT);
                    $tmpitem_cont = $rtblogitem_content;
                    $item_content .= bind_content(array("ITEMLINK" => htmlspecialchars($item_link),
                                                        "ITEMTITLE" => $item_title), $tmpitem_cont);
                }
            }
            if (!isset($flg, $item_title, $item_link)) {
                $item_title  = "ไม่มีรายการเมนูย่อยหรือยังไม่<br>เปิดให้ใช้งานกรุณาติดต่อผู้ดู<br>แลระบบของท่าน";
                $rtblogitem_content = read_template($GLOBALS["_TPL_PATH"] . "postlogmenublog_item_bx.tpl");
                $item_content = bind_content(array("ITEMTITLE" => $item_title), $rtblogitem_content);
            }
            $oC->Disconnect();
        }
        bind_content(array("MENUTITLE" => trim(preg_replace("/^(.+\-)/", "", $subsys[$row_index]["gpnamet"])),
                           "MENUITEM" => $item_content), $rtblogmenu_content);
    }
    return $rtblogmenu_content;
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

function getSubmenu ($oC, $MnID, $UsID, $GpID, $x, &$Stm)
{  
    global $oU;
    $oUp = new umpermission($oC);
    $oGp = new umgpermission($oC);
    $oMn = new ummenu($oC);
    $oMn->SearchByKey($MnID);
    $oMn->GetRecord();
    $flg = 1;
    $oUp->SearchByKey($UsID, $MnID);
    if ($oUp->GetRecord()) {
        $flg = $oUp->pmX;
    } else {
        $oGp->SearchByKey($GpID, $MnID);
        if ($oGp->GetRecord()) {
            $flg = $oGp->gpX;
        }		
    }

    if ($flg == $x){
        if ($oMn->MnLevel > 0){
			
            if ($oMn->MnNameT != "-") {
				
                if (trim($oMn->MnURL) <> "") {
                    $Stm .= str_pad("", 5 * 6 * $oMn->MnLevel,  "&nbsp;", STR_PAD_RIGHT)."<img src=\"" . $GLOBALS["_INFO_URL"] . "/img/submenu_mini.gif\" align=\"middle\" border=\"0\" alt=\"\">";
                    $Stm .= "&nbsp;<a href=\"$oMn->MnURL\" style=\"font-weight: bold; color: #11387D;\">" . trim($oMn->MnNameT) . "</a>";
                } else {
                    $Stm .= str_pad("", 5 * 6 * $oMn->MnLevel,  "&nbsp;", STR_PAD_RIGHT)."<img src=\"" . $GLOBALS["_INFO_URL"] . "/img/submenu_mini_cyan.gif\" align=\"middle\" border=\"0\" alt=\"\">";
                    $Stm .= "<span style=\"font-weight: bold; color: #777777;\">&nbsp;" . trim($oMn->MnNameT) . "</span>";
                }
                $Stm .= "<br>\n";
            }
        }
        $oMn->RSmenuByParentMn($MnID);
    }
    while ($oMn->GetRecord()) {
        getSubmenu($oC, $oMn->MnID, $UsID, $GpID, $flg, $Stm);
    }
}


function update_user_status ( )
{
    $absolute_path = $_SERVER["PHP_SELF"];
    $query_string = $_SERVER["QUERY_STRING"];
    $file_name = substr(strrchr($absolute_path, "/"), 1);
    if ($query_string != "" && isset($_GET["__ss"], $_GET["__gp"], $_GET["__ii"]) && isset($_SESSION["SubSys"][$_GET["__ii"]])) {
        $SU = $GLOBALS["_SUBSYS_URL"];
        $FT = $GLOBALS["_SYS1ST_URL"];
        $SS = $_GET["__ss"] + 0;
        $GP = $_GET["__gp"] + 0;
        if (isset($SU[$SS][$GP])) {
            $CURL = $absolute_path;
            $GURL = $SU[$SS][$GP] . $FT[$SS][$GP];
            if ($CURL == $GURL) {
                $_SESSION["SID"] = $SS;
                $_SESSION["GID"] = $GP;
            } else {
                $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
                header("Location: $full_url");
            }
        } else {
            $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
            header("Location: $full_url");
        }
    }
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

function logged_in ( )
{
    $retval = false;
    if (isset($_SESSION["oU"], $_SESSION["sysDate"], $_SESSION["logKey"]))
        $retval = ($_SESSION["logKey"] == session_id());
    return $retval;
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
?>