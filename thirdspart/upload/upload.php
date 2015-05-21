<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}



/*
if(isset($_FILES['file'])) {
        //echo "zzz";
        if(move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_POST["filename"])) {
                echo 'Upload Success';
        } else {
                echo '#Fail';
        }
} else {
        header("Location: http://localhost");
}
*/       
?>