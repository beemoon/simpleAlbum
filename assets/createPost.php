<?php
// Nombre de photos pour le bandeau
$nbPhoto=5;


function scanFileNameRecursivly($path = '',$ext,$name = array() )
{
  $path = $path == ''? dirname(__FILE__) : $path;
  $lists = @scandir($path);
 
  if(!empty($lists))
  {
      foreach($lists as $f)
      {
   
      if(is_dir($path.DIRECTORY_SEPARATOR.$f) && $f != ".." && $f != ".")
      {
          scanFileNameRecursivly($path.DIRECTORY_SEPARATOR.$f,$ext,$name);
      }
      else
      {
        if (is_file($path.DIRECTORY_SEPARATOR.$f) && (strtolower(pathinfo($f, PATHINFO_EXTENSION)) == $ext))
        {
          $name[] = $f;
        }
      }
      }
  }
  natsort($name);
  return $name;
  
}

$storeFolder = 'posts';   //1
$ds          = DIRECTORY_SEPARATOR;  //2

$yearPost    = date("Y");
$datePost    = date("md");
$dirPost     = $yearPost.$ds.$yearPost.$datePost;

$targetPath = "../".$ds.$storeFolder.$ds.$dirPost; //4
if (!is_dir($targetPath)) {
    if (!mkdir($targetPath, 0777, true)) {
        die('Echec lors de la création des répertoires...');
    }
    mkdir($targetPath.$ds."infos", 0777, true);
}
if (!is_dir($targetPath.$ds."infos")) {
    if (!mkdir($targetPath.$ds."infos", 0777, true)) {
        die('Echec lors de la création des répertoires...');
    }
}

// Traitement des photos
$file_names = scanFileNameRecursivly($targetPath,"jpg");
$file_names2 = scanFileNameRecursivly($targetPath,"jpeg");
$file_names3 = scanFileNameRecursivly($targetPath,"flv");
$photosTmp=array_merge($file_names,$file_names2,$file_names3);

if (in_array("bandeau.jpg",$photosTmp)) {
    $key = array_search('bandeau.jpg', $photosTmp);
    unset($photosTmp[$key]);
}
if (in_array("thumb.jpg",$photosTmp)) {
    $key = array_search('thumb.jpg', $photosTmp);
    unset($photosTmp[$key]);
}

natcasesort($photosTmp);
$photos="Photos = \"".implode(",",$photosTmp)."\"";


// On genere un fichier du post
//setlocale(LC_TIME, 'fr_FR.UTF8');
setlocale(LC_TIME, 'fr_FR');
if ($_POST['titre']=="") {
    $_POST['titre']=strftime("%d %B %Y");
}
$titre="Titre = \"".$_POST['titre']."\"\n";
$content="Content = \"".$_POST['postText']."\"\n";
$_files=$targetPath.$ds."infos".$ds."content.txt";

if (file_exists($_files)) unlink($_files);
file_put_contents($_files,$titre,FILE_APPEND);
file_put_contents($_files,"\n",FILE_APPEND);
file_put_contents($_files,$content,FILE_APPEND);
file_put_contents($_files,"\n",FILE_APPEND);
file_put_contents($_files,$photos,FILE_APPEND);

// On enregistre le bandeau
if (is_file(strtolower($targetPath.$ds."infos".$ds."bandeau.jpg"))) {
    file_put_contents("../".$ds.$storeFolder.$ds."bandeauxPhotos.txt",$storeFolder.$ds.$dirPost.$ds."infos".$ds."bandeau.jpg\n",FILE_APPEND);
}

$bandeauFileTmp=file("../".$ds.$storeFolder.$ds."bandeauxPhotos.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$bandeauPhotos=array_slice(array_unique($bandeauFileTmp),-$nbPhoto);

file_put_contents("../".$ds.$storeFolder.$ds."bandeauxPhotos.txt", implode("\n",$bandeauPhotos));
file_put_contents("../".$ds.$storeFolder.$ds."bandeauxPhotos.txt","\n",FILE_APPEND);

// On genere la liste des posts
$originalFile="../".$ds.$storeFolder.$ds."listPosts.txt";
$bkpFile="../".$ds.$storeFolder.$ds."listPosts_SAUV.txt";
if (!file_exists($originalFile)) {file_put_contents($originalFile,'',FILE_APPEND);};

if (copy($originalFile, $bkpFile)) {
    
    file_put_contents($originalFile,$dirPost,FILE_APPEND);
    file_put_contents($originalFile,"\n",FILE_APPEND);
    
    $allPostTmpArray=file($originalFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $originalArray=array_unique($allPostTmpArray);
    
    file_put_contents($originalFile, implode("\n",$originalArray));
    file_put_contents($originalFile,"\n",FILE_APPEND);
    
    
}

header('Location: ../index.php');
