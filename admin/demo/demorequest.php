<?php

if(!isset($_SESSION)){
    session_start();
}

include('../../dbConnection.php');

header('Content-type: application/json');

        $request_id = json_decode( $_POST['requestID']);

        // $sql="SELECT * FROM demo_request
        // LEFT JOIN demo ON demo_request.demo_id = demo.demo_id;";
  
        $sql = "SELECT request_id
                FROM demo_request
                WHERE demo_id = ".$demo_id."
                AND chapter_id = ".$chapter_id."
                ;";
        $query = $conn->query($sql);

        if($query){
            if(!$query->num_rows > 0){
                $sql2 = "INSERT INTO student_book_request
                (student_book_req_id,student_id, request_status, chapter_id)
                    VALUES ('','".$student_id."','pending','".$chapter_id."');";
    
                $query2 = $conn->query($sql2);
                if($query2 == true){
                    echo 'Request Pending';
                }
            }
        }
?>