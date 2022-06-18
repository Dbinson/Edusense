<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "edusense main final";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if(!$conn) {
 die("connection failed" . mysqli_connect_error());
} 
// else {
//  echo"connected";
// }
?>