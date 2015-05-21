<?php
/* Define your theme */
$theme="test2";

require_once("assets/function.php");
if (is_file("themes/".$theme."/about.php")) {
    include("themes/".$theme."/about.php");
}else{
    include("themes/default/about.php");
}
?>