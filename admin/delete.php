<?php

    include('../dbConnection.php');
    // header('Content-type: application/json');
    
    $isDeleted = false;

    //delete subject
    if($_POST['requestType'] == 'subject' && isset($_POST['id'])){

        $sql = "DELETE FROM subject WHERE subject_id = '".$_POST['id']."'";
        $query = mysqli_query($conn, $sql);
        if($query){
            $isDeleted = true;
        }
    }

    //delete demo
    if($_POST['requestType'] == 'demo' && isset($_POST['id'])){
        $path;
        $sql3 = 'SELECT video_file FROM demo WHERE demo_id ="'.$_POST['id'].'"';
        $query3 = mysqli_query($conn, $sql3);
        while($row = mysqli_fetch_assoc($query3)){
            $path = $row;
        }

        // echo substr($path['video_file'], 4,);
        // if(file_exists(substr($path['video_file'], 3))){
        //     echo 'deleted';
        // }

        if(unlink(substr($path['video_file'], 3))){
            $sql2 = "DELETE FROM demo WHERE demo_id = '".$_POST['id']."'";
            $query2= mysqli_query($conn, $sql2);
            if($query2){
                $isDeleted = true;
            }
        }
    }

    //delete student
    if($_POST['requestType'] == 'student' && isset($_POST['id'])){
        $sql4 = 'DELETE FROM student WHERE student_id ="'.$_POST['id'].'"';
        $query4 = mysqli_query($conn, $sql4);
        if($query4){
            $isDeleted = true;
        }
    }

    //delete faculty
    if($_POST['requestType'] == 'faculty' && isset($_POST['id'])){
        $sql4 = 'DELETE FROM faculty WHERE faculty_id ="'.$_POST['id'].'"';
        $query4 = mysqli_query($conn, $sql4);
        if($query4){
            $isDeleted = true;
        }
    }

    //delete Notes
    if($_POST['requestType'] == 'notes' && isset($_POST['id'])){
        $path;
        $sql3 = 'SELECT filename FROM mst_notes WHERE mst_notes_id ="'.$_POST['id'].'"';
        $query3 = mysqli_query($conn, $sql3);
        while($row = mysqli_fetch_assoc($query3)){
            $path = $row;
        }
        if(unlink(substr($path['filename'], 3))){
            $sql4 = 'DELETE FROM mst_notes WHERE mst_notes_id ="'.$_POST['id'].'"';
            $query4 = mysqli_query($conn, $sql4);
            if($query4){
                $isDeleted = true;
            }
        }
    }

    echo $isDeleted;

?>