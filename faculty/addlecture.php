<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('PAGE', 'viewAssignment');
    include('./mainInclude/header.php');
    include('../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){

        date_default_timezone_set("Asia/Kolkata");

$lectureName = $_POST['lectureName'];
$subjectId = json_decode($_POST['subjectId']);
$studentId = json_decode($_POST['studentId']);
$facultytId = json_decode($_POST['facultyId']);
$startDateTime = $_POST['startDateTime'];
$endDateTime = $_POST['endtDateTime'];
$schedStatus = 0;
$schedType = "lecture";

if(strtotime($endDateTime) >= strtotime(date("Y-m-dh:i"))){
    $schedStatus = "50";
}else{
    $schedStatus = "30";
}

$Qsched = mysqli_query($conn,"INSERT INTO schedule(sched_name,start_date_time,end_date_time,sched_type,subject_id,student_id,sched_status)
            VALUES ('".$lectureName."','".$startDateTime."','".$endDateTime."','".$schedType."', '".$subjectId."',  '".$studentId."', '".$schedStatus."');");
$schedId = mysqli_insert_id($conn);

// $lec= mysqli_query($conn,"INSERT INTO lectures(lecture_name,subject_id,student_id,faculty_id,class_id,sched_id)
//             VALUES ('".$lectureName."','".$subjectId."','".$studentId."','".$facultytId."','".$classId."','".$schedId."');");



    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">

            <h2>Lectures</h2>
            <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addLectureModalCenter">
            Add Lecture</button>
        </div>
        <table class="table table-hover table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Lecture Name</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Faculty Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Scheduled</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
                    $qLecture=mysqli_query($conn,"SELECT * from lectures
                        LEFT JOIN subject ON lectures.subject_id = subject.subject_id
                        LEFT JOIN class ON subject.class_id = class.class_id
                        LEFT JOIN students ON lectures.student_id = students.student_id
                        LEFT JOIN faculty ON lectures.faculty_id = faculty.faculty_id
                        LEFT JOIN schedule ON lectures.sched_id = schedule.sched_id;
                    ");
                    while($result=mysqli_fetch_assoc($qLecture)){
                        $count++;
                        echo '
                        <tr>
                        <th scope="row">'.$count++.'</th>';
                        echo '<td>'.$result['lecture_id'].'</td>';
                        echo '<td>'.$result['lecture_name'].'</td>';
                        echo '<td>'.$result['subject_name'].'</td>';
                        echo '<td>'.$result['student_name'].'</td>';
                        echo '<td>'.$result['faculty_name'].'</td>';
                        echo '<td>'.$result['class_name'].'</td>';
                        echo '<td>'.$result['start_date_time'].'</td>';
                        echo '<td>
                        <button name="deletebtn" class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                    }
                    ?>
            </tbody>
        </table>


            </div>
        </div>
    </div>
       
</section>
</div>