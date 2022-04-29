<?php
    include('../../dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }
    date_default_timezone_set('Asia/Kolkata');

    $isAdded = 0;

    if(isset($_POST['sid']) && isset($_POST['stud_Id'])){
        $deadline = strtotime($_POST['adeadline']);
        $count = 0;
        $query = mysqli_query($conn, 'SELECT * FROM assignment 
            WHERE assignment_id LIKE "A'.$_POST['sid'].'%"
            GROUP BY assignment_id
            ');
        if($query){
            $count = mysqli_num_rows($query) +1;
        }

        $aid = 'A'.$_POST['sid'].$count;
        $sql2 = "INSERT INTO assignment(assignment_id,faculty_id,student_id,subject_id,assign_date,submition_date ,question,assign_marks)
            VALUES ('".$aid."','".$_SESSION['faculty_id']."','".$_POST['stud_Id']."','".$_POST['sid']."','".date('Y/m/d H:i:s')."','".date('Y/m/d H:i:s',$deadline)."','".$_POST['aquestion']."','".$_POST['amarks']."')
            ";
        $query2 = mysqli_query($conn,$sql2);
        if($query2){
            $isAdded = 1;
        }

    
    }

    echo $isAdded;
?>