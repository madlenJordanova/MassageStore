<?php

$ds          = DIRECTORY_SEPARATOR;  //1
$storeFolder = '../../img/procedures';   //2
 
if (!empty($_FILES)) {
    $tempFile = $_FILES['editProcPicture']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['editProcPicture']['name'];  //5
    move_uploaded_file($tempFile,$targetFile); //6
}

?>