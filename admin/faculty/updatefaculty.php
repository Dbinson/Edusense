<?php

    include('../../dbConnection.php');
    $isUpdated = 0;

    //update faculty Name
    if(isset($_POST['faculty_name'])){
        $sql = "UPDATE faculty SET faculty_name = '".$_POST['faculty_name']."'WHERE faculty_id = '".$_POST['fac_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update faculty Mobile
    if(isset($_POST['faculty_mobile'])){
        $sql = "UPDATE faculty SET faculty_mobile = '".$_POST['faculty_mobile']."'WHERE faculty_id = '".$_POST['fac_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update faculty Email
    if(isset($_POST['faculty_email'])){
        $sql = "UPDATE faculty SET faculty_email = '".$_POST['faculty_email']."'WHERE faculty_id = '".$_POST['fac_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update faculty address
    if(isset($_POST['address'])){
        $sql = "UPDATE faculty SET address = '".$_POST['address']."'WHERE faculty_id = '".$_POST['fac_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    echo $isUpdated;

?>