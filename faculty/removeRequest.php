<?php

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
include("../dbConnection.php");

$delete_id = $_GET['del_id'];
$r = $_GET['r'];

if($r=='f'){
    $sql = mysqli_query($conn,"DELETE FROM assignment WHERE assignment_id='".$delete_id."'");

    if($sql){
        exit();
    }
    
}


?>