<?php
    include('../dbConnection.php');
    header('Content-type: application/json');
    // store the result into the array
    $array = array();

    if(isset($_POST['id']) && $_POST['request']=="assignmentUpdate"){
        $sql = 'SELECT  FROM assignment WHERE assignment_id="' .$_POST['id'].'"';
        $query = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_array($query)){
            $array[] = $row;
        }
    }

    echo json_encode($array);
?>