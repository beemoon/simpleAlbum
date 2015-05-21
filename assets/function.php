<?php
/*
Fonction pour récupérer les infos

*/
$storeFolder = 'posts';
$ds          = DIRECTORY_SEPARATOR;

// Les photos pour le bandeau
//fichier des photos pour le bandeau
$bandeauPhotosFile=$storeFolder.$ds."bandeauxPhotos.txt";
$bandeauPhotos=array();
$bandeauPhotos=file($bandeauPhotosFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Tous les posts
// fichier listant tous les posts
$allPostFile=$storeFolder.$ds."listPosts.txt";
$allPost=array();
$allPost=file($allPostFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$allPost=array_reverse($allPost);

// Un post
// fichier d'information sur le post
function postContent($postDir){
    global $ds,$storeFolder;
    $postFile=$storeFolder.$ds.$postDir.$ds."infos".$ds."content.txt";
    $post=parse_ini_file($postFile);

    return $post;
}

?>