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

      // add assignment

      date_default_timezone_set("Asia/Kolkata");

     
      
        $subject_id=$_POST['sid'];
        $an =  $_POST['aName'];
        $adl = $_POST['adeadline'];
        $ad =  $_POST['adesc'];
          $sst = $_POST['students'];
          $timeStamp = date("Y-m-d h:i:s");
          $sched_type = 'assignment';
          $fname ;
          $file;
      
          //checking if there is reference to the assignment
              $valid_extensions = array( 'pdf' , 'doc'); // valid extensions
              $path = '../assignment-ref/'; // upload directory
              if($_FILES['afile']){
                  $fname = $_FILES['afile']['name'];
                  $tmp = $_FILES['afile']['tmp_name'];
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
                  VALUES ('".$an."','".$timeStamp."','".$adl."','".$ad."' ,'".$_SESSION['faculty_id']."','".$file."');");
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
        if($sql && $sql2 && $sql3){
          echo' 1';
        }else{
          echo "0 " ;
        }
      


      
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">

            <header class="rows header">
      <button id="add-asses-btn" class="btn-active">Add Assesment</button>
      <button id="view-asses-btn">View Assesments</button>
      <button id="view-sub-asses-btn">View Submited</button>
    </header>

    <form class="columns add-assesment-form"  id="addAssForm" enctype="multipart/form-data" method="POST" >

      <div class="rows form-title">
        <h1>Add Assesment</h1>
      </div>
      <div class="columns input-box">
        <label for="subject">Subject</label>
        <select class="form-select" aria-label="Default select example" name="sid">
          <option selected>Select a subject</option>
          <?php
                        $sql=mysqli_query($conn,"SELECT * from enroll_subject 
                        LEFT JOIN subject ON enroll_subject.subject_id=subject.subject_id 
                        LEFT JOIN class ON subject.class_id=class.class_id 
                        where faculty_id='".$_SESSION["faculty_id"]."';");
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
          name="aName"
        />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Deadline</label>
        <input type="date" class="form-control" name="adeadline"/>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Description</label>
        <textarea
          class="form-control"
          rows="5"
          placeholder="Enter assesment description"
          name="adesc"
        ></textarea>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment File</label>
        <input type="file" class="form-control"  name="afile"/>
      </div>
      <button type="button" class="btn btn-primary add-std-btn ">
        Assign Students
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
                 $sql=mysqli_query($conn,"SELECT * from enroll_subject 
                  LEFT JOIN students ON enroll_subject.student_id=students.student_id
                  where faculty_id='".$_SESSION["faculty_id"]."';");
                   while($result=mysqli_fetch_assoc($sql)){
                     echo' <tr>
                  
                     <td>'.$result["student_id"].'</td>
                     <td>'.$result["student_name"].'</td>
                     <td><input type="checkbox" name="students" value="'.$result["student_id"].'"/></td>
                   </tr>';
                  }
          ?>
        </tbody>
      </table>
      <div class="rows asse-form-submit">
        <button type="submit" class="btn btn-primary">Add Assesment</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </form>


    <!-- View assignment  -->
    <section class="columns cards">

    <?php
      $s = mysqli_query($conn,"SELECT DISTINCT assignment.aid,assignment.aname,subject.subject_name,class.class_name,assignment.enddate FROM assign_assignment
      LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
      LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
      LEFT JOIN class ON subject.class_id=class.class_id
      
       WHERE faculty_id='".$_SESSION['faculty_id']."';");

       while($result = mysqli_fetch_assoc($s)){
         echo '
         <div class="rows card">
        <div class="rows card-icon">
          <i class="fa-solid fa-box-archive"></i>
        </div>
        <div class="columns card-details">
          <h2><a href="viewAssignment.php?aid='.$result['aid'].'">'.$result['aname'].'</a></h2>
          <div class="rows">
            <span>'.$result['subject_name'].' '.$result['class_name'].'</span>
            <span class="card-deadline">Due Date '. date(" F d, Y h:i A", strtotime($result['enddate'])).'</span>
          </div>
        </div>
        <div class="rows card-delete">
        <a href="../removeRequest.php?del_id='.$result['aid'].'&r=f"><i class="fa-solid fa-trash-can"></i></a>
        </div>
      </div>
         ';
       }

    ?>
    </section>


    <!-- Submitted Assignments -->
    <section class="submitted-sec">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Assesment ID</th>
            <th scope="col">Submition Date</th>
            <th scope="col">Solution</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        <?php 
        
        $s = mysqli_query($conn,"SELECT assignment.aid,students.student_id,
                  assignment_submission.file,assignment_submission.filename, students.student_name,assignment_submission.submition_date,assignment_submission.file,schedule.sched_status FROM assign_assignment
        LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
        LEFT JOIN students ON assign_assignment.student_id=students.student_id 
        LEFT JOIN assignment_submission ON assign_assignment.assig_submition_id=assignment_submission.assi_submit_id
        LEFT JOIN schedule ON assign_assignment.sched_id=schedule.sched_id 
        WHERE faculty_id='".$_SESSION['faculty_id']."';");

       $count=1;
       while($result = mysqli_fetch_assoc($s)){
         if($result['sched_status'] == '50'){
          echo'
            <tr>
              <th scope="row">'.$count++.'</th>
              <td>'.$result['student_id'].'</td>
              <td>'.$result['student_name'].'</td>
              <td>'.$result['aid'].'</td>
              <td>'.$result['submition_date'].'</td>
              <td>';
                echo '<a href="../downloadFile.php?file='.$result['filename'].'" class="btn btn-primary">
                  View Assesment
                </a>
              </td>
            </tr>
          ';
         }
       }
        
        ?>
        </tbody>
      </table>
    </section>

            </div>
        </div>
    </div>
       
</section>
</div>