<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>

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
        include_once("../dbConnection.php");
          $sql = mysqli_query($conn,"SELECT  assign_assignment.assign_a_id,students.student_id,students.student_name,class.class_name,subject.subject_name,assignment_submission.file,assignment_submission.filename,assignment.rfilename,assignment.enddate,schedule.sched_status FROM assign_assignment
          LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
          LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
          LEFT JOIN class ON subject.class_id=class.class_id
           LEFT JOIN assignment_submission ON assign_assignment.assig_submition_id=assignment_submission.assi_submit_id
            LEFT JOIN students ON assign_assignment.student_id=students.student_id
             LEFT JOIN schedule ON assign_assignment.sched_id=schedule.sched_id
           WHERE faculty_id='".$_GET['faculty_id']."'");

           while($r = mysqli_fetch_assoc($sql)){
            echo '
            
            <tr>
            <td>'.$r['student_id'].'</td>
            <td>'.$r['student_name'].'</td>
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

    <script src="index.js"></script>
    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
