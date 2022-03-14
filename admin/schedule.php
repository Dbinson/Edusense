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

        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">


            <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
            <th scope="col">Schedule Name</th>                        
            <th scope="col">Start Date </th>
            <th scope="col">End Date</th>
            <th scope="col">Description</th>
            <th scope="col">Schedule Type</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Student Name</th>
            <th scope="col">sched_status</th>
        </tr>
    </thead>
    <tbody>
   
<?php



        //student_id must be altered in where clause
        $sql=mysqli_query($conn,"select sched_name,start_date_time,end_date_time,sched_desc,
        sched_type,subject_name,student_name,sched_status from schedule 
        left join status on schedule.sched_status=status.status_id 
        left join enroll_subject on schedule.student_id=enroll_subject.student_id
        left join subject on enroll_subject.subject_id=subject.subject_id
        left join students on enroll_subject.student_id=students.student_id;");
        // $Present=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=true && student_id=101;");
        // $Absent=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=false && student_id=101;");
        
        $count=1;
        while($result=mysqli_fetch_assoc($sql)){

            echo'

            <tr>
            <th scope="row">'.$count++.'
            </th>
            
            <td>'.$result["sched_name"].'</td>
            <td>'.$result["start_date_time"].'</td>
            <td>'.$result["end_date_time"].'</td>
            <td>'.$result["sched_desc"].'</td>
            <td>'.$result["sched_type"].'</td>
            <td>'.$result["subject_name"].'</td>
            <td>'.$result["student_name"].'</td>
            <td>'.$result["sched_status"].'</td>';

             echo '</div>';
        }
?>
    </tbody>
</table> 


            </div>
        </div>
    </div>
       
</section>
</div>