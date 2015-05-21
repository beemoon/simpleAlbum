<?php
$storeFolder = 'posts';
$ds          = DIRECTORY_SEPARATOR;

$yearPost    = date("Y");
$datePost    = date("md");
$dirPost     = $yearPost.$ds.$yearPost.$datePost;

$targetPath = "../".$ds.$storeFolder.$ds.$dirPost;
if (!is_dir($targetPath)) {
    if (!mkdir($targetPath, 0777, true)) {
        die('Echec lors de la création des répertoires...');
    }
    mkdir($targetPath.$ds."infos", 0777, true);
}

// requis pour redimensionner les images
require_once("../thirdspart/imagethumb/imagethumb.php");

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];            
    
    if (pathinfo(strtolower($_FILES['file']['name']),PATHINFO_BASENAME) == "bandeau.jpg" || pathinfo(strtolower($_FILES['file']['name']),PATHINFO_BASENAME) == "thumb.jpg") {
        $targetFile =  $targetPath.$ds."infos".$ds.strtolower($_FILES['file']['name']);
    } else {
        $targetFile =  $targetPath.$ds.strtolower($_FILES['file']['name']);
    }
    
    move_uploaded_file($tempFile,$targetFile);
    
    // On copie une photo en tant que thumb.jpgs'il n'en existe pas
    if (!file_exists(pathinfo(strtolower($targetFile),PATHINFO_DIRNAME).$ds."thumb.jpg")) {
        copy($targetFile,$targetPath.$ds."infos".$ds."thumb.jpg");
    }
    
    // On redimensionne l'image bandeau.jpg avec un width max de 618 pixels
    if (pathinfo(strtolower($targetFile),PATHINFO_BASENAME) == "bandeau.jpg") {
        imagethumb($targetFile, $targetPath.$ds."infos".$ds."bandeau.jpg", 618);
    }
    
    // On redimensionne l'image thumb.jpg avec un width max de 150 pixels
    if (file_exists($targetPath.$ds."infos".$ds."thumb.jpg")) {
        imagethumb($targetPath.$ds."infos".$ds."thumb.jpg", $targetPath.$ds."infos".$ds."thumb.jpg", 150);
    }
}
?>


