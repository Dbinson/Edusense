<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Lecture');
    define('PAGE', 'lecture');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
    

    if(isset($_REQUEST['submitBtn'])){

        
    }

    
?>
<section id="content">
    <div class="container p-4">
       
        <div class="card" style="width: 35rem;margin:auto;">
            <div class="card-body">
              
    
            <table class="table table-sm table-hover table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Lecture Name</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">video</th>
                    <th scope="col">remove</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $count = 0;
                    $qLecture=mysqli_query($conn,"SELECT * from lectures_videos
                        LEFT JOIN lectures ON lectures_videos.lec_id = lectures.lecture_id
                        LEFT JOIN subject ON lectures.subject_id = subject.subject_id
                        LEFT JOIN class ON subject.class_id = class.class_id
                        LEFT JOIN students ON lectures.student_id = students.student_id
                    ");
                    while($result=mysqli_fetch_assoc($qLecture)){
                        $count++;
                         $lcname = $result['lecture_name'];
                        $content = $result['vid_file'];
                        echo '
                        <tr>
                        <th scope="row">'.$count++.'</th>';
                        echo '<td>'.$result['lecture_id'].'</td>';
                        echo '<td>'.$result['lecture_name'].'</td>';
                        echo '<td>'.$result['subject_name'].'</td>';
                        echo '<td>'.$result['class_name'].'</td>';
                        echo '
                        <td>
                        <button name="videobtn" class="btn btn-outline-primary btn-sm" type="submit"  data-bs-toggle="modal" data-bs-target="#viewVideoModal">View Video</button>
                    </td>
                        <td>
                        <button name="deletebtn" class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    </tr>';
                    }
                    ?>
            </tbody>
        </table>

            </div>
        </div>
    </div>
       
</section>
</div>

<!-- video player -->

<div
      class="modal fade"
      id="viewVideoModal"
      tabindex="-1"
      aria-labelledby="viewVideoModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-fullscreen-xxl-down">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewVideoModalLabel">
              <?php
                echo $lcname;
              ?>
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <video 
              controls 
              width="100%"
              height="100%"
              >
              <?php echo ' <source src="'.$content.'">'; ?>
            </video>
          </div>
        </div>
      </div>
    </div>

    <?php include('../mainInclude/footer.php'); ?>