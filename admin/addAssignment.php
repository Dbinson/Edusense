<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('PAGE', 'addAssignment');
    include('./mainInclude/header.php');
    include('../dbConnection.php');
    date_default_timezone_set("Asia/Kolkata");

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['submitBtn'])){


        $subject_id=$_POST['subject_id'];
	$an =  $_POST['assName'];
	$adl = $_POST['assDeadLine'];
	$ad =  $_POST['assDesc'];
    $sst = $_POST['students'];
    $facName = $_POST['fname'];
    $timeStamp = date("Y-m-d h:i:s");
    $sched_type = 'assignment';
    $fname ;
    $file;

    //checking if there is reference to the assignment
        $valid_extensions = array( 'pdf' , 'doc'); // valid extensions
        $path = '../assignment-ref/'; // upload directory
        if($_FILES['assfile']){
            $fname = $_FILES['assfile']['name'];
            $tmp = $_FILES['assfile']['tmp_name'];
            // get uploaded file's extension
            $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));
            // can upload same image using rand function
            $final_file = rand(1000,1000000).$fname;
            // check's valid format
            if(in_array($ext, $valid_extensions)) 
            { 
                $path = $path.strtolower($final_file); 
                move_uploaded_file($tmp,$path);
                $file = $path; 
            }else{
                echo 'invalid';
            }
        }

    
// 	if(!mysqli_num_rows($check)>0){
if(isset($sst)){

    //CREATING ASSIGNMENT
    $sql=mysqli_query($conn, "INSERT INTO assignment ( aname,created, enddate, adesc, rfilename,rfile)
            VALUES ('".$an."','".$timeStamp."','".$adl."','".$ad."' ,'".$fname."','".$file."');");
    $aid=mysqli_insert_id($conn);

    //ASSIGNING ASSIGNMENT TO STUDENTS AND CREATING A SCHEDULE
    if(isset($aid)){
        foreach($sst as $s){
            //ADDING SCHEDULE
            $sql2=mysqli_query($conn,"INSERT INTO schedule (sched_name, start_date_time, end_date_time, 
    sched_desc, sched_type, subject_id, student_id, sched_status)
    VALUES ('".$an."', '".$timeStamp."', '".$adl."', '".$ad."', 
    '".$sched_type."', '".$subject_id."',  '".$s."', '30');");
    $sched_id=mysqli_insert_id($conn);

    //ASSIGN STUDENT
            $sql3=mysqli_query($conn, "INSERT INTO assign_assignment ( student_id, subject_id, faculty_id, aid,sched_id)
                VALUES ('".$s."','".$subject_id."','".$facName."' ,'".$aid."','".$sched_id."');");
        }
    }
}
        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
              
            <form class="columns add-assesment-form" id="addAssForm" enctype="multipart/form-data" method="POST">
      <div class="rows form-title">
        <h1>Add Assesment</h1>
      </div>
      <div class="columns input-box">
        <label for="subject">Subject</label>
        <select class="form-select" aria-label="Default select example" name="subject_id">
          <option selected>Select a subject</option>
          <?php
                        $sql=mysqli_query($conn,"SELECT * from subject 
                        LEFT JOIN class ON subject.class_id=class.class_id 
                        ;");
                        while($r=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$r['subject_id'].">".$r['subject_name']." ".$r["class_name"]."</option>";
                        }
                        ?>
        </select>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Name</label>
        <input
          type="text"
          class="form-control"
          placeholder="Enter assesment name"
          name="assName"
        />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Deadline</label>
        <input type="date" class="form-control" name="assDeadLine" />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Description</label>
        <textarea
          class="form-control"
          rows="5"
          placeholder="Enter assesment description"
          name="assDesc"
        ></textarea>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment File</label>
        <input type="file" class="form-control" name="assfile" />
      </div>
      <button type="button" class="btn btn-primary add-std-btn">
        Add Students
      </button>
      <button type="button" class="btn btn-danger delete-std-btn">
        Delete Students
      </button>
      <table class="table std-table">
        <thead>
          <tr>

            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
                 $sql=mysqli_query($conn,"SELECT student_id,student_name from students;");
                   while($result=mysqli_fetch_assoc($sql)){
                     echo' <tr>
                  
                     <td>'.$result["student_id"].'</td>
                     <td>'.$result["student_name"].'</td>
                     <td><input type="checkbox" name="students[]" value="'.$result["student_id"].'"/></td>
                   </tr>';
                  }
          ?>
        </tbody>
      </table>
      <div class="columns input-box">
        <label for="subject">Teacher</label>
        <select class="form-select" name="fname" aria-label="Default select example">
          <option selected>Select a teacher</option>
          <?php
                 $sql=mysqli_query($conn,"SELECT faculty_id,faculty_name from faculty;");
                   while($result=mysqli_fetch_assoc($sql)){
                     echo' <option value="'.$result['faculty_id'].'">'.$result['faculty_id'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$result['faculty_name'].'</option>';
                  }
          ?>
        </select>
      </div>
      <div class="rows asse-form-submit">
        <button type="submit" name="addassbtn" class="btn btn-primary">Add Assesment</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </form>

              
            </div>
        </div>
    </div>
       
</section>
</div>