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


        $subject_id =  json_decode($_POST['subject_id']);
	$student_id = json_decode($_POST['student_id']);
	$class_id = json_decode( $_POST['class_id']);
	$attend_date_time =  $_POST['attend_date_time'];
	$attendance = json_decode( $_POST['attendance']);
	
	$q1 = "INSERT INTO student_attendance(attend_date_time,attendee_id,attended,subject_id,class_id) VALUES ('".$attend_date_time."','".$student_id."','".$attendance."','".$subject_id."','".$class_id."');";

	$sql=mysqli_query($conn,$q1);

	if($sql){
		echo '1';
	}else{
		echo '0';
	}

        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">


<h3>faculty Attendance</h3>
          <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">subject_Name</th>
                        <th scope="col">class</th>                        
                        <th scope="col">Date and Time</th>
                        <th scope="col">Present Days</th>
                        <th scope="col">Absent Days</th>
                        <th scope="col">Total Days</th>
                    </tr>
                </thead>
                <tbody>

                <?php

     
                $sql=mysqli_query($conn,"select subject.subject_name,subject.subject_id,
                class.class_id,class.class_name,attend_date_time from faculty_attendance 
                left join subject on faculty_attendance.subject_id=subject.subject_id 
                left join class on subject.class_id=class.class_id

                 where attendee_id=10;");

                 
                 $pre=0;
                 $abs=0;
                // $Present=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=true && student_id=1;");
                // $Absent=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=false && student_id=1;");
              
                $count=1;
                while($result=mysqli_fetch_assoc($sql)){
                  $Present=mysqli_query($conn,"select count(attended) from faculty_attendance
                   where subject_id=".$result['subject_id']." &&attended=true && attendee_id=10;");
                 $Absent=mysqli_query($conn,"select count(attended) from faculty_attendance
                 where subject_id=".$result['subject_id']." &&attended=false && attendee_id=10;");

                  echo'

                  <tr>
                  <th scope="row">'.$count++.'
                  </th>
                  
                  <td>'.$result["subject_name"].'</td>';
                
                  
                    
                     
                      echo '<td>'.$result["class_id"].'</td>';
                     echo '<td>'.$result["attend_date_time"].'</td>';
               
                  
                while($output1=mysqli_fetch_assoc($Present)){
                  // if ($result["subject_id"]==$output1["subject_id"]){
                   
                 $pre=$output1["count(attended)"];
                 

                  echo '<td>'.$output1["count(attended)"].'</td>';
                 // }
                   }
               while($output2=mysqli_fetch_assoc($Absent)){
                    //if ($result["subject_id"]==$output2["subject_id"]){

                      $abs=$output2["count(attended)"];

                    echo '<td>'.$output2["count(attended)"].'</td>';
                 //  }
                 //  else{
                 //   echo '<td>0</td>';
                 //  }
               
               }
                 $t=((int)$pre + (int)$abs);

                  echo "<td>".$t."</td>";
                 echo '</div>';
              }
                    ?>
                </tbody>
            </table>
           

<br><br><br><br>


<h3>Student Attendance</h3>


 <?php
     include("../dbConnection.php");
    //  include("../stud_modal.php");
    ?>

       
          <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">subject_Name</th>
                        <th scope="col">class</th>                        
                        <th scope="col">Date and Time</th>
                        <th scope="col">Present Days</th>
                        <th scope="col">Absent Days</th>
                        <th scope="col">Total Days</th>
                    </tr>
                </thead>
                <tbody>

                <?php

     
                $sql=mysqli_query($conn,"select students.student_name, student_attendance.stud_attend_id,subject.subject_name,subject.subject_id,
                 class.class_id,class.class_name,attend_date_time from student_attendance
                  left join subject on student_attendance.subject_id=subject.subject_id 
                  left join students on student_attendance.attendee_id=students.student_id 
                left join class on student_attendance.class_id=class.class_id 
                where attendee_id=102;");
                 
                 $pre=0;
                 $abs=0;
                // $Present=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=true && student_id=1;");
                // $Absent=mysqli_query($conn,"select count(attended), subject.subject_name from student_attendance left join subject on student_attendance.subject_id=subject.subject_id where attended=false && student_id=1;");
              
                $count=1;
                while($result=mysqli_fetch_assoc($sql)){
                  $Present=mysqli_query($conn,"select count(attended) from student_attendance
                   where subject_id=".$result['subject_id']." &&attended=true && attendee_id=102;");
                 $Absent=mysqli_query($conn,"select count(attended) from student_attendance
                 where subject_id=".$result['subject_id']." &&attended=false && attendee_id=102;");

                  echo'

                  <tr>
                  <th scope="row">'.$count++.'
                  </th>
                  <td>'.$result["student_name"].'</td>
                  <td>'.$result["subject_name"].'</td>';
                
                  
                    
                     
                      echo '<td>'.$result["class_id"].'</td>';
                     echo '<td>'.$result["attend_date_time"].'</td>';
                
                  
                while($output1=mysqli_fetch_assoc($Present)){
                  // if ($result["subject_id"]==$output1["subject_id"]){
                   
                 $pre=$output1["count(attended)"];
                 

                  echo '<td>'.$output1["count(attended)"].'</td>';
                 // }
                   }
               while($output2=mysqli_fetch_assoc($Absent)){
                    //if ($result["subject_id"]==$output2["subject_id"]){

                      $abs=$output2["count(attended)"];

                    echo '<td>'.$output2["count(attended)"].'</td>';
                 //  }
                 //  else{
                 //   echo '<td>0</td>';
                 //  }
               
                 }
                 $t=((int)$pre + (int)$abs);

                  echo "<td>".$t."</td>";
                  echo '<td><a href="../remove.php?delete_id='.$result['stud_attend_id'].'&r=s"class="btn btn-danger">Delete<a></td>';
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