<?php

    if(!isset($_SESSION)){
        session_start();
    }
    include('../../dbConnection.php');

    $mcqData = array();
    $isAdded = 0;
    if(isset($_POST['subjectId']) && isset($_POST['studentId'])){
        // generating file path
        $mcq_id = 'mcq'.uniqid();
        $fileName = $mcq_id.'.json';
        $path="../../mcqs/" .$fileName;

        // write to json file
        $fp = fopen($path, 'w');
        fwrite($fp, json_encode($_POST));
        fclose($fp);

        $sql = "INSERT INTO mcq(mcq_id,student_id,subject_id,faculty_id)
            VALUES ('".$mcq_id."','".$_POST['studentId']."','".$_POST['subjectId']."','".$_SESSION['faculty_id']."')
            ";

        $query = mysqli_query($conn,$sql);
        if($query){
            $isAdded = 1;
        }
    }

    echo $isAdded;


?>