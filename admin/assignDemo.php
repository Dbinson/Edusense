<?php

    include('../dbConnection.php');

    // header('Content-type: application/json');

    $demo_red_id = $_POST['demo_reg_id'];
    $faculty_id = $_POST['faculty_id'];
    $date_time = $_POST['datetime'];
    $meet_link = $_POST['meet_link'];

    $a = mysqli_query($conn,"SELECT subject_id FROM demo_registration WHERE demo_reg_id =".$demo_red_id);
    $r = mysqli_fetch_assoc($a);
    $s1 = mysqli_query($conn,"INSERT INTO schedule(start_date_time,sched_type,sched_status,subject_id)
            VALUES('".$date_time."','Demo','30','".$r['subject_id']."');
    ");
    $sched_id = mysqli_insert_id($conn);

    $s2 = mysqli_query($conn,"INSERT INTO demo(demo_date_time,faculty_id,sched_id,demo_reg_id,meet_link)
            VALUES('".$date_time."','".$faculty_id."','".$sched_id."','".$demo_red_id."','".$meet_link."');
    ");

    $s3 = mysqli_query($conn,"UPDATE demo_registration SET demo_status = 'accepted';
    ");
    if($s1 && $s2 && $s3){
        echo "1";
    }else{
        echo '0';
    }

?>