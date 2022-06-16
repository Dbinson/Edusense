<?php

    include('../../dbConnection.php');
    header('Content-type: application/json');


    $scoredMarks = 0;
    $totalMarks = 0;
    $arr = array();

    $quiz = file_get_contents('../../mcqs/' . $_POST['mId'] . '.json');
    $questions = json_decode($quiz, true);
   

    // calculating total marks
    for($i = 1;$i<=10;$i++){
            $totalMarks += $questions['marks'.$i];
    }

    //calculting score
    for($i = 1;$i<=10;$i++){
        if($questions['marks'.$i] == $_POST['q'.$i]){
            $scoredMarks += $_POST['q'.$i];
        }
    }

    if(!$scoredMarks == 0 && !$totalMarks == 0){
        $sql = "UPDATE mcq SET marks_scored ='".$scoredMarks."/".$totalMarks."' WHERE mcq_id = '".$_POST['mId']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            array_push($arr,$_POST['mId'],$totalMarks,$scoredMarks,1);
           
        }
    }
    echo json_encode($arr);
?>