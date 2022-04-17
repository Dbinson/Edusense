<?php

    include('../dbConnection.php');
    // header('Content-type: application/json');
    
    $isDeleted = false;

    if($_POST['requestType'] == 'subject' && isset($_POST['id'])){

        $sql = "DELETE FROM subject WHERE subject_id = '".$_POST['id']."'";
        $query = mysqli_query($conn, $sql);
        if($query){
            $isDeleted = true;
        }
    }
    echo $isDeleted;

?>