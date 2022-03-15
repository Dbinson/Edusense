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

        $valid_extensions = array( 'pdf' , 'doc'); // valid extensions
$path = '../assignment-submission/'; // upload directory
$aid = $_POST['aid'];
$assign_id = $_POST['assign_id'];
$sched_id = $_POST['sched_id'];
if($_FILES['uploadedFile'])
{
$f = $_FILES['uploadedFile']['name'];
$tmp = $_FILES['uploadedFile']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_file = rand(1000,1000000).$f;
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_file); 
if(move_uploaded_file($tmp,$path)) 
{

    //include database configuration file
    include_once '../dbConnection.php';
    //insert form data in the database
    $sql1 = mysqli_query($conn,"INSERT assignment_submission(aid,filename,file) VALUES ('".$aid."','".$f."','".$path."';)");
    $assign_submission_id = mysqli_insert_id($conn);
    $sql2 = mysqli_query($conn,"UPDATE assign_assignment SET assig_submition_id='".$assign_submission_id."'
             WHERE assign_a_id='".$assign_id."';");
    $sql3 = mysqli_query($conn,"UPDATE schedule SET sched_status = 50 WHERE sched_id ='".$sched_id."';");
    if($sql1 and $sql2 and $sql3){
        echo "SUCCESS";
    }else{
        echo "FAIL";
    }
}
} 
else 
{
echo 'invalid';
}
}



    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
            <div class="container-fluid text-center">
            <div class="col-sm-8 text-left">
                <button type="button"
                        class="btn custom btn-outline-primary mr-md-3 mb-md-0 mb-2" onclick="ad()">Assigned</button>
                <button type="button"
                        class="btn custom btn-outline-primary mr-md-3 mb-md-0 mb-2" onclick="ce()">Completed</button>
                <hr>
<?php
    $sql=mysqli_query($conn, "SELECT enroll_subject.subject_id, subject.subject_name from enroll_subject LEFT JOIN subject ON enroll_subject.subject_id= subject.subject_id where enroll_subject.student_id=102;");
        while($result= mysqli_fetch_assoc($sql)){
            echo '<div id="assignd">'; 
        $sql2=mysqli_query($conn,"SELECT assignment.aid,assign_a_id,assignment.aname,schedule.sched_status,assign_assignment.sched_id,assignment.enddate FROM `assign_assignment` 
            LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
            LEFT JOIN students ON assign_assignment.student_id=students.student_id
            LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
            LEFT JOIN schedule ON assign_assignment.sched_id = schedule.sched_id
            WHERE students.student_id=102 AND subject.subject_id='".$result["subject_id"]."' AND schedule.sched_status=30 ;");
            while($re=mysqli_fetch_assoc($sql2)){
                echo '<div class="alert alert-secondary" role="alert">
                    <a class="custom-link" href="viewAssignment.php?aid='.$re["aid"].'&sched_id='.$re['sched_id'].'&assign_id='.$re['assign_a_id'].'&s='.$re['sched_status'].'">'.$re["aname"].'</a>
                    </br>
                    <small class="custom-date">Due Date:'.$re["enddate"].'</small>
                </div>
                    ';
            }
            echo '</div>';

            //Display completed
            echo '<div id="completed">'; 
            $sql2=mysqli_query($conn,"SELECT assignment.aid,assign_a_id,assignment_submission.submition_date,assignment.aname,schedule.sched_status,assign_assignment.sched_id,assignment.enddate FROM `assign_assignment` 
            LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
            LEFT JOIN students ON assign_assignment.student_id=students.student_id
            LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
            LEFT JOIN schedule ON assign_assignment.sched_id = schedule.sched_id
            LEFT JOIN assignment_submission ON assign_assignment.assig_submition_id = assignment_submission.assi_submit_id
            WHERE students.student_id=102 AND subject.subject_id='".$result["subject_id"]."' AND schedule.sched_status=50 ;");
            while($re=mysqli_fetch_assoc($sql2)){
            echo '<div class="alert alert-secondary" role="alert">
            <a class="custom-link" href="viewAssignment.php?aid='.$re["aid"].'&sched_id='.$re['sched_id'].'&assign_id='.$re['assign_a_id'].'&s='.$re['sched_status'].'">'.$re["aname"].'</a>
            </br>
            <small class="custom-date">Submission Date:'.$re["submition_date"].'</small>
                </div>
                ';
            }
            echo '</div>';
    }
   ?> 
            </div>
    </div>


    <script>
        var d1,d2;
        d1 = document.getElementById('assignd')
        d2 = document.getElementById('completed')


        function ad(){
            d2.style.display = 'none';
            d1.style.display = 'block';
        }

        function ce(){
            d1.style.display = 'none';
            d2.style.display = 'block';
        }
    </script>


            </div>
        </div>
    </div>
       
</section>
</div>