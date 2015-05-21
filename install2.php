<?php
header('Content-Type: text/html; charset=UTF-8');

if (file_exists('.htaccess') && file_exists('.htpasswd')) {
    echo "Vous devez OBLIGATOIREMENT supprimer le fichier install.php (par FTP)";
    exit;
}

if ($_POST['dataHtpasswd']=="") {
    echo "vous devez créer un acces sécurisé pour rédiger un article. ";
    echo "Pour cela vous pouvez aller par exemple sur <a href=\"http://shop.alterlinks.com/htpasswd/passwd.php\" target=_blank>http://shop.alterlinks.com</a><br/><br/>";
    echo "Coller dans le champ ci-dessous la ligne pour le fichier .htpasswd<br/><br/>";
?>


<form method="post" action="install.php">
        <input type="text" name="dataHtpasswd" id="dataHtpasswd" size="45"/>
        <button type="submit">Valider</button>
</form>


<?php
} else {
    

$data="";
$data.="AuthUserFile ".dirname(__FILE__)."/.htpasswd\n";
$data.="AuthGroupFile /dev/null\n";
$data.="AuthName \"Restricted area\"\n";
$data.="AuthType Basic\n";
$data.="\n";
$data.="<Files newPost.htm>\n";
$data.="require valid-user\n";
$data.="</Files>\n";
$data.="<Files upload.php>\n";
$data.="require valid-user\n";
$data.="</Files>\n";
$data.="<Files createPost.php>\n";
$data.="require valid-user\n";
$data.="</Files>\n";
$data.="\n";
$data.="<Files editor.php>\n";
$data.="require valid-user\n";
$data.="</Files>\n";
$data.="\n";
$data.="<Files saveEdit.php>\n";
$data.="require valid-user\n";
$data.="</Files>\n";
$data.="\n";
$data.="Options -Indexes\n";


file_put_contents(dirname(__FILE__)."/.htaccess",$data);
file_put_contents(dirname(__FILE__)."/.htpasswd",$_POST['dataHtpasswd']);

echo "Pour finir vous devez OBLIGATOIREMENT supprimer le fichier install.php (par FTP)";
}
?>