<?php

$filepath =substr($_GET['file_name'],3); 
if(file_exists($filepath) && !empty($filepath)){
    header("ache-Control: Public"); 
    header("Content-Description: File Transfer"); 
    header("Content-Type: application/octet-stream"); 
    header("Content-Disposition: attachment; filename=\"". basename( $filepath )."\""); 
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");

    readfile ($filepath);
    exit(); 
}else{
    echo 'download fail';
}
?>