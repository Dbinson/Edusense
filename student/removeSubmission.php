<?php 
if(!isset($_SESSION)){
    session_start();
}

include("../dbConnection.php");

header('Content-type: application/json');
header("location:javascript://history.go(-1)");

$aid = $_GET['aid'];
$file = $_GET['file'];

$sql=mysqli_query($conn,"DELETE FROM assignment_submission WHERE assi_submit_id = ".$aid.";");

  if (is_file($file)){
    echo (unlink($file));
  }


?>