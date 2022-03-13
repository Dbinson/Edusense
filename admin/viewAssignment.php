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
              
            <section class="columns cards">
      <?php 
      $sql = mysqli_query($conn,"SELECT faculty.faculty_name,subject.subject_name,faculty.faculty_id FROM assign_assignment 
            LEFT JOIN assignment ON assign_assignment.aid=assignment.aid
            LEFT JOIN subject ON assign_assignment.subject_id=subject.subject_id
            LEFT JOIN faculty ON assign_assignment.faculty_id=faculty.faculty_id
            GROUP BY(faculty.faculty_id);");

            while($result = mysqli_fetch_assoc($sql)){
              echo '<a href="./view.php?faculty_id='.$result['faculty_id'].'">
              <div class="rows card">
                <div class="columns card-details">
                  <h2>'.$result['faculty_name'].'</h2>
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