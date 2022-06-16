<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include('../../dbConnection.php');
    header('Content-type: application/json');
    $isAdded = 0;
    $id = "feed".rand ( 10000 , 99999 );
    
    $sql = "INSERT INTO feedback(feedback_id,student_id,feedback_desc,ratings)
        VALUES ('".$id."','".$_SESSION['student_id']."','".$_POST['desc']."','".$_POST['rate']."')";
    $query =  mysqli_query($conn,$sql);

    if($query){
        $isAdded = 1;
    }
    echo $isAdded;
?>