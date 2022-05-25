<?php

    if(!isset($_SESSION)){
        session_start();
    }
    include('../dbConnection.php');
    header('Content-type: application/json');
    // store the result into the array
    $array = array();

    if(isset($_POST['id']) && $_POST['request']=="assignmentUpdate"){
        $sql = 'SELECT * FROM assignment WHERE assignment_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }

    if(isset($_POST['id']) && $_POST['request']=="facNoteUpdate"){
        $sql = 'SELECT * FROM faculty_notes WHERE fac_notes_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }

    if(isset($_POST['id']) && $_POST['request']=="studSubDetails"){
        $sql = 'SELECT student.student_id,student.stud_name FROM enroll
            LEFT JOIN student ON enroll.student_id = student.student_id
            WHERE enroll.subject_id="' .$_POST['id'].'" AND enroll.faculty_id="' .$_SESSION['faculty_id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }
    echo json_encode($array);
?>