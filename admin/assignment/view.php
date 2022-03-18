

    <?php 
    define('TITLE', 'Assignment');
    define('PAGE', 'view');
    include('../mainInclude/header.php') 
    ?>
    <link rel="stylesheet" href="../css/assignment.css">

    

    
    <section id="content">
    <div class="container-fluid">
       
        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">

    <button onclick="history.back()" class="rows back-btn">
      <i class="fa-solid fa-angle-left"></i>
      Back
    </button>
    <section class="faculty-sec">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Student ID</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col">Submission</th>
            <th scope="col">Assesment Question</th>
            <th scope="col">Deadline</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

        <?php
        include_once("../../dbConnection.php");
          $sql = "SELECT  assign_assignment.assign_a_id,students.student_id,user.user_name,class.class_name,subject.subject_name,assignment_submission.file,assignment_submission.filename,assignment.rfilename,assignment.enddate,schedule.sched_status FROM assign_assignment
          LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
          LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
          LEFT JOIN assign_course ON subject.assign_course_id = assign_course.assign_course_id
          LEFT JOIN class ON assign_course.class_id=class.class_id
          LEFT JOIN assignment_submission ON assign_assignment.assig_submission_id=assignment_submission.assi_submit_id
          LEFT JOIN students ON assign_assignment.student_id=students.student_id
          LEFT JOIN user ON students.user_id = user.user_id
          LEFT JOIN schedule ON assign_assignment.sched_id=schedule.sched_id
          WHERE faculty_id='".$_GET['faculty_id']."'";
          
          $query = $conn->query($sql);
           while($r = $query->fetch_assoc()){
            echo '
            
            <tr>
            <td>'.$r['student_id'].'</td>
            <td>'.$r['user_name'].'</td>
            <td>'.$r['class_name'].'</td>
            <td>'.$r['subject_name'].'</td>
            <td>';
              if($r['sched_status']==50){
                echo 'View PDF
                <a href="../downloadFile.php?file='.$r['filename'].'"><i class="fa-solid fa-up-right-from-square"></i></a>';
              }elseif($r['sched_status']==40){
                echo 'Overdue';
              }else{
                echo 'Pending';
              }
              
            echo '</td>
            <td>
              View PDF
              <a href="../downloadFile.php?file='.$r['rfilename'].'"><i class="fa-solid fa-up-right-from-square"></i></a>
            </td>
            <td>'.date("d / m / Y", strtotime($r['enddate'])).'</td>
            <td class="rows">
              <div class="rows card-delete">
               <a href="removeAssign.php?assign_id='.$r['assign_a_id'].'&file='.$r['file'].'"> <i class="fa-solid fa-trash-can"></i> </a>
              </div>
            </td>
          </tr>
            
            ';
           }
        ?>
          
        </tbody>
      </table>
    </section>
            </div>
        </div>
      </div>
    </section>

    <!-- <script src="index.js"></script>
    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script> -->
    <?php include('../mainInclude/footer.php') ?>