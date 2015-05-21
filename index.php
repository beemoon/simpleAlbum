<?php
if (file_exists('install.php')) {
    header('Location: install.php');
    exit;
}

/* Define your theme */
$theme="test2";

require_once("assets/function.php");
if (is_file("themes/".$theme."/index.php")) {
    include("themes/".$theme."/index.php");
}else{
    include("themes/default/index.php");
}
?>