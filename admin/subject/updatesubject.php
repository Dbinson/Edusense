<?php

    if(!isset($_SESSION)){
        session_start();
    }

    include('../../dbConnection.php');

    header('Content-type: application/json');

    $isUpdated = false;
        
    //to Update all the fields 
    if(isset( $_POST['subject_id']) && isset( $_POST['subject_name']) && isset($_POST['class_name'])){

        $sql = "UPDATE subject SET name = '".$_POST['subject_name']."', class ='".$_POST['class_name']."' WHERE subject_id='".$_POST['subject_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated=true;
        }
    }else if(isset( $_POST['subject_id']) && isset( $_POST['subject_name'])){
        //to Update subject_name
        $sql2 = "UPDATE subject SET name = '".$_POST['subject_name']."' WHERE subject_id='".$_POST['subject_id']."'";
        $query2 = mysqli_query($conn,$sql2);
        if($query3){
            $isUpdated=true;
        }
    } else if(isset( $_POST['subject_id']) && isset( $_POST['class_name'])){
        //to Update subject_name
        $sql3 = "UPDATE subject SET class = '".$_POST['class_name']."' WHERE subject_id='".$_POST['subject_id']."'";
        $query3 = mysqli_query($conn,$sql3);
        if($query3){
            $isUpdated=true;
        }
    }

    echo $isUpdated;


?>


