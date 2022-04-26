<?php

// use LDAP\Result;


    include_once('./dbConnection.php');
    header('Content-type: application/json');

    // if(isset($_POST['course_id']) && isset($_POST['board']) && isset($_POST['class'])){
    //     $sql="SELECT assign_course_id FROM assign_course 
    //         WHERE course_id='".$_POST['course_id']."' AND board_id='".$_POST['board']."' AND class_id='".$_POST['class']."';";
    //     $query =  $conn->query($sql);
    //     $result = array();
    //     while($result1 = $query->fetch_assoc()){
    //         $sql2 = "SELECT * FROM subject
    //         WHERE assign_course_id='".$result1['assign_course_id']."'";
    //         $query2 =  $conn->query($sql2);
    //         $result[] = $query2->fetch_assoc();
    //     } 
    //     echo json_encode($result);
    // }


    // if(isset($_GET['s_id']) && $_GET['q'] == 'bookDemo'){
    //     if(!$_SESSION['is_login']){
    //         header("Location: login.php?q=bkd");
    //         exit();
    //     }else{
            
    //     }
    // }

    if(isset($_POST['id']) && $_POST['type'] == 'videoPath'){
        $data = array();
        $sql = "SELECT video_file,subject_id FROM demo WHERE subject_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        while($r = mysqli_fetch_assoc($query)){
            $data[] = $r;
        }
        echo json_encode($data);
    }

    
?>