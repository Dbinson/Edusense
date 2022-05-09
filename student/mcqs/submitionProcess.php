<?php

    include('../../dbConnection.php');
    $quiz = file_get_contents('../../mcqs/' . $_GET['id'] . '.json');
    $questions = json_decode($quiz, true);
    $scoredMarks = 0;
    $totalMarks = 0;
    $arr = array();

    // calculating total marks
    for($i = 0;$i<=10;$i++){
            $totalMarks += $questions['marks'.$i];
    }

    //calculting score
    for($i = 0;$i<=10;$i++){
        if($questions['marks'.$i] == $_POST['q'.$i]){
            $scoredMarks += $_POST['q'.$i];
        }
    }

    if(!$scoredMarks == 0 && !$totalMarks == 0){
        $sql = "UPDATE mcq SET scored_marks ='".$scoredMarks."' WHERE mcq_id = '".$_POST['id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            array_push($arr,$_POST_['id'],1);
            echo json_encode($arr);
        }
    }
?>