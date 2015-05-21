<?php
/* Define your theme */
$theme="sample";

require_once("assets/function.php");
if (is_file("themes/".$theme."/viewPost.php")) {
    include("themes/".$theme."/viewPost.php");
}else{
    include("themes/default/viewPost.php");
}
?>