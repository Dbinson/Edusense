<?php

if(!isset($_SESSION)){
    session_start();
}

date_default_timezone_set("Asia/Kolkata");

include("../../dbConnection.php");

	$subject_id=$_REQUEST['subject_id'];
	$examName =  $_REQUEST['exam_name'];
	$exam_date_time = $_REQUEST['exam_date_time'];
    $exam_type = $_REQUEST['examtype'];

            
    //         $sql ="INSERT INTO schedule(sched_name, start_date_time, end_date_time, 
    // sched_desc, sched_type, subject_id, student_id, sched_status)
    // VALUES ('".$an."', '".$timeStamp."', '".$adl."', '".$ad."', 
    // '".$sched_type."', '".$subject_id."',  '".$s."', '30');";

    // $query = $conn->query($sql);
    // $sched_id = $conn->insert_id;

    
            $sql2 = "INSERT INTO examination(subject_id,exam_date_time,exam_type_id,exam_name)
                VALUES ('".$subject_id."','".$exam_date_time."' ,'".$exam_type."','".$examName."')";
            $query2 = $conn->query($sql2);

            if($query2){
                echo "Inserted";
            }
?>