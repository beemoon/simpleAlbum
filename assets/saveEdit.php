<?php

// On genere un fichier du post
$targetPath = "../";

$content=$_POST['postText']."<b/>";
$_files=$targetPath.$ds.$_POST['file'];

if (pathinfo($_files,PATHINFO_BASENAME)=="content.txt") {
    $post=parse_ini_file($_files);
    if (file_exists($_files)) unlink($_files);
    file_put_contents($_files,"Titre = \"".$post["Titre"]."\"",FILE_APPEND);
    file_put_contents($_files,"\n",FILE_APPEND);
    file_put_contents($_files,"Content = \"".$content."\"",FILE_APPEND);
    file_put_contents($_files,"\n",FILE_APPEND);
    file_put_contents($_files,"Photos = \"".$post["Photos"]."\"",FILE_APPEND);
} else {
    if (file_exists($_files)) unlink($_files);
    file_put_contents($_files,$content,FILE_APPEND);  
}

?>
<html>
<head>
</head>
<body onLoad="parent.$.fancybox.close();">
</body>
</html>