<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE', 'Assignment');
    define('PAGE', 'addAssignment');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    date_default_timezone_set("Asia/Kolkata");

    // if(!isset($_SESSION['is_admin_login'])){
    //     echo "<script> location.href='./index.php'; </script>";
    //    }
    

    if(isset($_REQUEST['addassbtn'])){

      //checks if the students are assigned or else give an error
      if(isset($_REQUEST['students'])){

        $subject_id=$_REQUEST['subject_id'];
        $an =  $_REQUEST['assName'];
        $adl = $_REQUEST['assDeadLine'];
        $ad =  $_REQUEST['assDesc'];
        $sst = $_REQUEST['students'];
        $facName = $_REQUEST['fname'];
        $timeStamp = date("Y-m-d h:i:s");
        $sched_type = 'assignment';
        $fname ;
        $file;

        //checking if there is reference to the assignment
            $valid_extensions = array( 'pdf' , 'doc'); // valid extensions
            $path = '../../assignment-ref/'; // upload directory
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
            $sql = "INSERT INTO assignment ( aname,created, enddate, adesc, rfilename,rfile)
                    VALUES ('".$an."','".$timeStamp."','".$adl."','".$ad."' ,'".$fname."','".$file."');";
            $query = $conn->query($sql);
            $aid = $conn->insert_id;

            //ASSIGNING ASSIGNMENT TO STUDENTS AND CREATING A SCHEDULE
            if(isset($aid)){
                foreach($sst as $s){
                    //ADDING SCHEDULE
                    $sql2 = "INSERT INTO schedule (sched_name, start_date_time, end_date_time, 
            sched_desc, sched_type, subject_id, student_id, sched_status)
            VALUES ('".$an."', '".$timeStamp."', '".$adl."', '".$ad."', 
            '".$sched_type."', '".$subject_id."',  '".$s."', '30');";
            $query2 = $conn->query($sql2);
            $sched_id = $conn->insert_id;

            //ASSIGN STUDENT
                    $sql3 = "INSERT INTO assign_assignment ( student_id, subject_id, faculty_id, aid,sched_id)
                        VALUES ('".$s."','".$subject_id."','".$facName."' ,'".$aid."','".$sched_id."');";
                    $query3 = $conn->query($sql3);
                }
            }
        }
        $msg='<span class="text-success p-4"> Asssignment added and assigned </span>';
      }else{
        $msg='<span class="text-danger p-3"> Select students </span>';
      }
    }
    
?>
<link rel="stylesheet" href="../css/assignment.css">
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
            <header class="rows header">
      <button id="add-asses-btn" class="btn-active">Add Assesment</button>
      <button id="view-asses-btn">View Assesment</button>
    </header>
              
            <form class="columns add-assesment-form" id="addAssForm" enctype="multipart/form-data" method="POST">
      <div class="rows form-title">
        <h1>Add Assesment</h1>
      </div>
      <?php if(isset($msg)){echo $msg;} ?>
      <div class="columns input-box">
        <label for="subject">Subject</label>
        <select class="form-select" aria-label="Default select example" name="subject_id" required>
          <option selected>Select a subject</option>
          <?php
                        $sql4 = "SELECT * from subject 
                          LEFT JOIN assign_course ON subject.assign_course_id=assign_course.assign_course_id
                          LEFT JOIN class ON assign_course.class_id = class.class_id
                        ;";
                        $query4 = $conn->query($sql4);
                        while($r = $query4->fetch_assoc()){
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
          required
        />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Deadline</label>
        <input type="date" class="form-control" name="assDeadLine" required />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Description</label>
        <textarea
          class="form-control"
          rows="5"
          placeholder="Enter assesment description"
          name="assDesc"
          required
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
                 $sql5 = "SELECT student_id,user_name from students
                    LEFT JOIN user ON students.user_id = user.user_id
                 ;";
                 $query5 = $conn->query($sql5);
                   while($result = $query5->fetch_assoc()){
                     echo' <tr>
                  
                     <td>'.$result["student_id"].'</td>
                     <td>'.$result["user_name"].'</td>
                     <td><input type="checkbox" name="students[]" value="'.$result["student_id"].'" /></td>
                   </tr>';
                  }
          ?>
        </tbody>
      </table>
      <div class="columns input-box">
        <label for="subject">Teacher</label>
        <select class="form-select" name="fname" aria-label="Default select example" required>
          <option selected>Select a teacher</option>
          <?php
                 $sql6 = "SELECT faculty_id,user_name from faculty
                 LEFT JOIN user ON faculty.user_id = user.user_id
                 ;";
                 $query6 = $conn->query($sql6);
                   while($result = $query6->fetch_assoc()){
                     echo' <option value="'.$result['faculty_id'].'">'.$result['faculty_id'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$result['user_name'].'</option>';
                  }
          ?>
        </select>
      </div>
      <div class="rows asse-form-submit">
        <button type="submit" name="addassbtn" class="btn btn-primary">Add Assesment</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </form>

    <section class="columns cards">
          <?php 
          $sql7 = "SELECT user.user_name,subject.subject_name,faculty.faculty_id FROM assign_assignment 
                LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
                LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
                LEFT JOIN faculty ON assign_assignment.faculty_id=faculty.faculty_id
                LEFT JOIN user ON faculty.user_id = user.user_id
                GROUP BY(faculty.faculty_id);";
            $query7 = $conn->query($sql7);

                while($result = $query7->fetch_assoc()){
                  echo '<a href="./view.php?faculty_id='.$result['faculty_id'].'">
                  <div class=" card">
                    <div class=" card-details">
                      <h2>'.$result['user_name'].'</h2>
                      <p>'.$result['subject_name'].'</p>
                    </div>
                    <div class="rows card-delete">
                      <i class="fa-solid fa-trash-can"></i>
                    </div>
                  </div>
                </a>';
                }
          ?>
      
    </section>
              
            </div>
        </div>
    </div>
       
</section>
</div>
<script src="../js/assignment.js"></script>