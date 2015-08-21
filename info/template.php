<?php

require_once "infosys_global.php";
require_once "${_MOD_PATH}mod_tplutils.php";

require_once "${_CLASS_PATH}clsConnection.php";
require_once "${_CLASS_PATH}clsDB.php";
require_once "${_UMS_PATH}clsUser.php";

setnocache();

session_start();
if (logged_in()) {
    $oU = &$_SESSION["oU"];
    $oU->Lang = (isset($_GET["lang"]) && $_GET["lang"] == "") ? "th" : $_GET["lang"];
    if (isset($_GET["StID"]) && $_GET["StID"] != "") $oU->StID = $_GET["StID"];
    if (isset($_GET["GpID"]) && $_GET["GpID"] != "") $oU->GpID = $_GET["GpID"];
    if (isset($_GET["MnID"]) && $_GET["MnID"] != "") $oU->MnID = $_GET["MnID"];
    if (isset($_GET["MmnID"]) && $_GET["MmnID"] != "") $oU->MmnID = $_GET["MmnID"];
    update_user_status();
    $oU->GetRightsByMenu();
	
    include_once "${_UMS_PATH}clsUmMenu.php";
    include_once "${_UMS_PATH}clsUmPermission.php";
    include_once "${_UMS_PATH}clsUmGPermission.php";
    include_once "${_UMS_PATH}clsUmUserGroup.php";
    include_once "${_UMS_PATH}clsUmGroup.php";
    if (isset($_GET["mm"]))
        ob_start("incsubmenuTpl");
    else
        ob_start("nonsubmenuTpl");
} else {
    $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
    header("Location: $full_url");
}
?>