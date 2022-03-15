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

            <table class="table table-borderless table-striped table-hover shadow p-3 mb-5 bg-body rounded ">
      <thead>
        <tr>
          <th scope="col"><i class="far fa-file"></i></th>
          <th scope="col">Name</th>
          <th scope="col">Modified On</th>
          <th scope="col">Modified By</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $lcname;
      $content; 
        $sql = mysqli_query($conn,"SELECT * FROM lectures_videos
            LEFT JOIN lectures on lectures_videos.lec_id = lectures.lecture_id
            LEFT JOIN faculty on lectures.faculty_id = faculty.faculty_id 
            LEFT JOIN schedule on lectures.sched_id = schedule.sched_id 
         WHERE lectures.student_id='".$_SESSION['student_id']."' AND lectures.subject_id='".$_GET['s_id']."';");
        while($r = mysqli_fetch_assoc($sql)){
            $lcname = $r['lecture_name'];
            $content = $r['vid_file'];
            echo '
        
            <tr>
          <td><i class="far fa-play-circle"></i></td>
          <td>
            <button
              type="button"
              data-bs-toggle="modal"
              data-bs-target="#viewVideoModal"
            >
              '.$r['lecture_name'].'
            </button>
          </td>
          <td>'.date("F d, Y ",strtotime($r['start_date_time'])).'</td>
          <td>'.$r['faculty_name'].'</td>
        </tr>
            
            ';
        }
      ?>
      </tbody>
    </table>

            
            </div>
        </div>
    </div>
       
</section>
</div>