<?php

    include('../../dbConnection.php');
    header('Content-type: application/json');

    $exam_id = $_POST['id'];

    $result= array();

    $sql = 'SELECT * FROM examination WHERE exam_id='.$exam_id;
    $query = $conn->query($sql);

    while($r = $query->fetch_assoc()){
        $result[]=$r;
    }
    echo json_encode($result);

?>