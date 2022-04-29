<?php

    include('../../dbConnection.php');
    $isUpdated = 0;

    //update student Name
    if(isset($_POST['student_name'])){
        $sql = "UPDATE student SET stud_name = '".$_POST['student_name']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student Mobile
    if(isset($_POST['student_mobile'])){
        $sql = "UPDATE student SET stud_mobile = '".$_POST['student_mobile']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student Email
    if(isset($_POST['student_email'])){
        $sql = "UPDATE student SET stud_email = '".$_POST['student_email']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student address
    if(isset($_POST['address'])){
        $sql = "UPDATE student SET address = '".$_POST['address']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent Name
    if(isset($_POST['parent_name'])){
        $sql = "UPDATE student SET parent_name_ = '".$_POST['parent_name']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent Mobile
    if(isset($_POST['parent_mobile'])){
        $sql = "UPDATE student SET parent_mobile = '".$_POST['parent_mobile']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update student parent email
    if(isset($_POST['parent_email'])){
        $sql = "UPDATE student SET parent_email = '".$_POST['parent_email']."' WHERE student_id = '".$_POST['stud_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    echo $isUpdated;

?>