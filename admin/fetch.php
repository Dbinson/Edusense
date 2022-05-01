<?php
    include('../dbConnection.php');
    header('Content-type: application/json');
    // store the result into the array
    $array = array();

    if(isset($_POST['id']) && $_POST['request']=="subUpdate"){
        $sql = 'SELECT * FROM subject WHERE subject_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }

    if(isset($_POST['id']) && $_POST['request']=="studUpdate"){
        $sql = 'SELECT * FROM student WHERE student_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }
    if(isset($_POST['id']) && $_POST['request']=="facUpdate"){
        $sql = 'SELECT * FROM faculty WHERE faculty_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }
    if(isset($_POST['id']) && $_POST['request']=="mstNoteUpdate"){
        $sql = 'SELECT * FROM mst_notes WHERE mst_notes_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }
    echo json_encode($array);
?>