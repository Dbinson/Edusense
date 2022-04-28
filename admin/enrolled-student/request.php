<?php

    include('../../dbConnection.php');

    if(isset($_GET['r']) && isset($_GET['sub_id']) && isset($_GET['stud_id'])){
        $sql = "DELETE FROM enroll WHERE student_id = '".$_GET['stud_id']."' AND subject_id='".$_GET['sub_id']."'";
        $query = mysqli_query($conn,$sql);
        if($query){
            echo '<script>
                    history.back();
                </script>';
        }
    }

$isUpdated = 0;
    if(isset($_POST['fname']) && isset($_POST['id'])){
        $id_arr = explode(',',$_POST['id']);
        $sql2 = "UPDATE enroll SET faculty_id = '".$_POST['fname']."',status = 'inProgress' 
            WHERE student_id='".$id_arr[1]."' AND subject_id = '".$id_arr[0]."'";
        $query2 = mysqli_query($conn,$sql2);
        if($query2){
            $isUpdated = 1;
        }
        echo $isUpdated;
    }

    
?>