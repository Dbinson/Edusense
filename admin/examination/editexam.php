<?php

if(!isset($_SESSION)){
    session_start();
}

date_default_timezone_set("Asia/Kolkata");

include("../../dbConnection.php");

    $exam_id = $_REQUEST['id'];
	$subject_id=$_REQUEST['subject_id'];
	$examName =  $_REQUEST['exam_name'];
	$exam_date_time = $_REQUEST['exam_date_time'];
    $exam_type = $_REQUEST['examtype'];

    //update subject
    if(isset($subject_id)){
        $sql = "UPDATE examination SET subject_id='".$subject_id."' WHERE exam_id='".$exam_id."'";
        $query = $conn->query($sql);
    }
    
    // update name
    if(isset($examName)){
        $sql = "UPDATE examination SET exam_name='".$examName."' WHERE exam_id='".$exam_id."'";
        $query = $conn->query($sql);
    }

    // update date and time
    if(isset($exam_date_time)){
        $sql = "UPDATE examination SET exam_date_time='".$exam_date_time."' WHERE exam_id='".$exam_id."'";
        $query = $conn->query($sql);
    }

    // update name
    if(isset($exam_type)){
        $sql = "UPDATE examination SET exam_type='".$exam_type."' WHERE exam_id='".$exam_id."'";
        $query = $conn->query($sql);
    }
    if($query){
        echo "Updated";
    }
?>