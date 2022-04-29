<?php

    include('../../dbConnection.php');
    $isUpdated = 0;

    //update assignmet subject
    if(isset($_POST['sid'])){
        $sql = "UPDATE assignment SET subject_id = '".$_POST['sid']."'WHERE assignment_id = '".$_POST['assignment_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update assignment student 
    if(isset($_POST['stud_Id'])){
        $sql = "UPDATE assignment SET student_id = '".$_POST['stud_Id']."'WHERE assignment_id = '".$_POST['assignment_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update Assignment Question
    if(isset($_POST['aquestion'])){
        $sql = "UPDATE assignment SET question = '".$_POST['aquestion']."'WHERE assignment_id = '".$_POST['assignment_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update submition date
    if(isset($_POST['adeadline'])){
        $sql = "UPDATE student SET submition_date = '".$_POST['adeadline']."'WHERE assignment_id = '".$_POST['assignment_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    //update assignment marks
    if(isset($_POST['amarks'])){
        $sql = "UPDATE student SET assign_marks = '".$_POST['amarks']."'WHERE assignment_id = '".$_POST['assignment_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            $isUpdated = 1;
        }
    }

    echo $isUpdated;

?>