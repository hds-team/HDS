<?php
require_once "infosys_global.php";
require_once "${_MOD_PATH}mod_tplutils.php";

require_once "${_CLASS_PATH}clsConnection.php";
require_once "${_CLASS_PATH}clsDB.php";
require_once "${_UMS_PATH}clsUser.php";

setnocache();

session_start();
if (logged_in()) {
    ob_start();
    $oU = &$_SESSION["oU"];
    $GLOBALS["SIGNEDON"] = true;
} else {
    $full_url = $GLOBALS["_PROTOCOL"] . $GLOBALS["_INFO_INDEX"];
    header("Location: $full_url");
}
?>