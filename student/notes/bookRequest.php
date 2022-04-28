<?php

if(!isset($_SESSION)){
    session_start();
}

include('../dbConnection.php');

header('Content-type: application/json');

        $student_id = $_SESSION['student_id'];
        $subject_id = json_decode( $_POST['subjectID']);
        $chapter_id = json_decode( $_POST['chapterID']);

        $qCheckRequest = mysqli_query($conn,"SELECT student_id, chapter_id
                FROM student_book_request
                WHERE student_id = ".$student_id."
                AND chapter_id = ".$chapter_id."
                ;");
        if(!mysqli_num_rows($qCheckRequest)>0){
            $Qrequest = mysqli_query($conn,"INSERT INTO student_book_request(student_book_req_id,student_id, request_status, chapter_id)
                VALUES ('','".$student_id."','pending','".$chapter_id."');");
          
            if($Qrequest == true){

                echo 'Request Pending';
                
            }
        }
?>