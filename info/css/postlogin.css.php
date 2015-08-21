<?php
    include "../infosys_global.php";
    $path_len = strlen($_SERVER["PHP_SELF"]);
    $path_name = substr($_SERVER["PHP_SELF"], 0, ($path_len - 4));
    $css_path = $GLOBALS["_INFO_PATH"] . "css/" . substr(strrchr($path_name, "/"), 1);
    if (is_file($css_path)) {
        $content = implode("", @file($css_path));
        $content = preg_replace("/(\s*?){(INFOURL)}(\s*?)/", "\${1}" . $GLOBALS["_INFO_URL"] . "\${3}", $content);
        header("Content-type: text/css");
        header("Content-Disposition: inline");
        header("Content-Length: " . strlen($content));
        echo $content;
    }
?>