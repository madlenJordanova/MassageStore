<?php

$ds          = DIRECTORY_SEPARATOR;  //1
$storeFolder = '../../img/profiles';   //2
 
if (!empty($_FILES)) {
    $tempFile = $_FILES['teamPicture']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['teamPicture']['name'];  //5
    move_uploaded_file($tempFile,$targetFile); //6
}

?>