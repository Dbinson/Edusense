<?php

    if(!isset($_SESSION)){
        session_start();
    }
    include('./dbConnection.php');
    $isChanged = 0;
    
    if($_POST['pass'] == $_POST['confirmPass']){
        if(isset($_SESSION['student_id'])){
            $pass =  password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $sql = "UPDATE student SET password = '".$pass."' WHERE student_id = '".$_SESSION['student_id']."'";
            $query = mysqli_query($conn,$sql);
            if($query){
                $isChanged  = 1;
            }
        }elseif(isset($_SESSION['faculty_id'])){
            $pass =  password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $sql = "UPDATE faculty SET password = '".$pass."' WHERE faculty_id = '".$_SESSION['faculty_id']."'";
            $query = mysqli_query($conn,$sql);
            if($query){
                $isChanged  = 1;
            }
        }elseif(isset($_SESSION['mst_id'])){
            $pass =  password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $sql = "UPDATE mst_admin SET password = '".$pass."' WHERE id = '".$_SESSION['mst_id']."'";
            $query = mysqli_query($conn,$sql);
            if($query){
                $isChanged  = 1;
            }
        }
    }
    
    echo $isChanged;

?>