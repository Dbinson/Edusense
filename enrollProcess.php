<?php
    include('./dbConnection.php');
    if(!isset($_SESSION)){
        session_start();
    }

    $isEnroll = 0;

    if(isset($_SESSION['islogged']) && $_SESSION['aDetails'] == 1){
        if(isset($_POST['id'])){

            //check if already enrolled
            $sql2 = "SELECT * FROM enroll
                WHERE student_id = '".$_SESSION['student_id']."' AND subject_id = '".$_POST['id']."'";
            $query2 = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query2)==0){
                //enroll
                $sql = "INSERT INTO enroll(subject_id,student_id,status) 
                VALUES ('".$_POST['id']."','".$_SESSION['student_id']."','Request Pending') ";
                $query = mysqli_query($conn, $sql);
                if($query){
                    $isEnrolled = 1;
                }
            }else{
                $isEnroll = -1;
            }
            
        }   
    }else{
        $isEnroll = '2'.$_SESSION['student_id'];
    }

    echo $isEnroll;

?>