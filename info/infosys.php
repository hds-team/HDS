<?php

    require_once "infosys_global.php";
    require_once "${_MOD_PATH}mod_infoutils.php";
    require_once "${_CLASS_PATH}clsConnection.php";
    require_once "${_CLASS_PATH}clsDB.php";
    require_once "${_UMS_PATH}clsUser.php";
    session_start();
    if (isset($_GET["__m"])) {
        // Command mode
        switch ($_GET["__m"]) {
            case "config":
                if (logged_in())
                    loadConfig();
                else
                    forceLogout();
            break;
            case "reload" :
                forceReload();
            break;
            case "denied" :
                deniedAlert();
            break;
            case "login" :
                include_once "${_UMS_PATH}clsUmUser.php";
                include_once "${_UMS_PATH}clsUmPermission.php";
                include_once "${_UMS_PATH}clsUmGPermission.php";
                include_once "${_UMS_PATH}clsUmUserGroup.php";
                checkLogin();
            break;
            case "logout" :
            default: forceLogout();
            break;
        }
    } else {
        // Common mode
        if (isset($GLOBALS["SECURE_LOG"]) && !$GLOBALS["SECURE_LOG"] && $GLOBALS["_PROTOCOL"] == "https://") {
            header("Location: http://" . $GLOBALS["_INFO_INDEX"]);  
        } else {
            if (logged_in()) {
                include_once "${_UMS_PATH}clsUmUserGroup.php";
                include_once "${_UMS_PATH}clsUmGroup.php";
                postLoginPage();
            } else {
                preLoginPage();
                session_stop(); // cleanup sess_* file.
            }
        }
    }
?>