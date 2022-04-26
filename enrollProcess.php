<?php
    include('./dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }
    $isEnrolled = false;
    if(isset($_SESSION['is_login'])){
        if(isset($_POST['id'])){
            $sql = "INSERT INTO enroll(subject_id,student_id) 
            VALUES ('".$_POST['id']."','".$_SESSION['studentid']."') ";
            $query = mysqli_query($conn, $sql);
            if($query){
                $isEnrolled = true;
            }
        }   
    }else{
        header("Location: login.php?enroll=1");
        exit();
    }

?>