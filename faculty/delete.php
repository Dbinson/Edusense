<?php 

    include('../dbConnection.php');

    $isDeleted = 0;
    
    //delete Notes
    if($_POST['requestType'] == 'notes' && isset($_POST['id'])){
        $path;
        $sql3 = 'SELECT file_name FROM faculty_notes WHERE fac_notes_id ="'.$_POST['id'].'"';
        $query3 = mysqli_query($conn, $sql3);
        while($row = mysqli_fetch_assoc($query3)){
            $path = $row;
        }
        if(unlink(substr($path['file_name'], 3))){
            $sql4 = 'DELETE FROM faculty_notes WHERE fac_notes_id ="'.$_POST['id'].'"';
            $query4 = mysqli_query($conn, $sql4);
            if($query4){
                $isDeleted = 1;
            }
        }
    }

    echo $isDeleted;
?>