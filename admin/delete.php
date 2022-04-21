<?php

    include('../dbConnection.php');
    // header('Content-type: application/json');
    
    $isDeleted = false;

    if($_POST['requestType'] == 'subject' && isset($_POST['id'])){

        $sql = "DELETE FROM subject WHERE subject_id = '".$_POST['id']."'";
        $query = mysqli_query($conn, $sql);
        if($query){
            $isDeleted = true;
        }
    }

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

    echo $isDeleted;

?>