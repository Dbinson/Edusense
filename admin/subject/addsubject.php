<?php

if(!isset($_SESSION)){
    session_start();
}

include('../../dbConnection.php');

header('Content-type: application/json');
        
        $subject_name =  $_POST['subject_name'];
        $class_name =  $_POST['class_name'];
         
        $sid = substr($subject_name,0,4).$class_name; 
        // echo $sid;
    $sql = "INSERT INTO subject(subject_id,name,class) VALUES ('".strtoupper($sid)."','".$subject_name."','".$class_name."')";
      
    $query = mysqli_query($conn,$sql);
    if($query){
        echo "1";
    }else{
        echo '0';
    }

?>