<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('PAGE', 'submittedAssignment');
    include('./mainInclude/header.php');
    include('../dbConnection.php');

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){
     
        $subject_id =  $_REQUEST['subject_id'];
        $student_id = $_REQUEST['student_id'];
        $class_id =  $_REQUEST['class_id'];
        $attend_date_time =  $_REQUEST['attend_date_time'];
        $attendance =  $_REQUEST['attendance'];
        
        $sql = "INSERT INTO student_attendance(attend_date_time,attendee_id,attended,subject_id,class_id)
             VALUES ('".$attend_date_time."','".$student_id."','".$attendance."','".$subject_id."','".$class_id."');";
    
        $query = $conn->query($sql);
    
        if($query){
            $msg = '<span class="bg-success p-3">Faculty Added</span> ';
        }else{
            $msg = '<span class="bg-dander p-3">Failed to Add faculty </span> ';
        }
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">

            <h5 class="modal-title Edit-book-title" id="fac_modalCenterTitle">add Attendance</h5>

            <form class="facultyattendance-form" name="attendance" role="form">
            <div class="modal-body">

            <div class="mb-3">  
                    <label for="faculty_name" class="form-label">Faculty</label>
                            <select class="form-select" 
                                id="name"
                                name="name"
                                aria-label="Default select example">
                            <option selected>Choose faculty</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from faculty");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["faculty_id"].">".$result["faculty_name"]."</option>";
                    }
                    ?>                    
                </select>
                
            </div>

            <div class="mb-3">  
                    <label for="subject_name" class="form-label">Subject</label>
                            <select class="form-select" id="subjectName"
                                aria-label="Default select example">
                            <option selected>Choose subject</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from subject");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["subject_id"].">".$result["subject_name"]."</option>";
                    }
                    ?>                    
                </select>
                
            </div>

            <div class="mb-3">
                <label for="class_name" class="form-label">Class</label>
                        <select class="form-select" id="className"
                            aria-label="Default select example">
                        <option selected>Choose your class</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from class");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["class_id"].">".$result["class_name"]."</option>";
                    }
                    ?>
                </select>
                </div>
      
  <div class="mb-3">
    <label for="attend_date_time" class="row-sm-2 row-form-label">Date and Time</label>
      <input type="datetime-local"  class="mb-3" id="a_date_time">
      
    </div>

                <br>

                <div class="mb-3">
                <label for="fac_attendance" class="form-label">Attendence</label>
                        <select class="form-select" id="fac_attendance"
                            aria-label="Default select example">
                        <option selected>Choose attendance</option>
                        <option value="1">Present</option>
                        <option value="0">Absent</option>
                </select>
                </div>

                            
           </div>
           <div class="rows asse-form-submit">
        <button type="submit" name="addattbtn" class="btn btn-primary">Add Attendance</button>
       
      </div>
        </form>
            
            </div>
        </div>
    </div>
       
</section>
</div>