

    <?php 
    define('TITLE', 'Assignment');
    define('PAGE', 'view');
    include('../mainInclude/header.php') 
    ?>
    <link rel="stylesheet" href="../css/assignment.css">

    

    
    <section id="content">
    <div class="container-fluid">
       
        <!-- <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body"> -->
    <h3>Assignment</h3>
    <section class="faculty-sec">
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Assesment Id</th>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Class</th>
            <th scope="col">Subject</th>
            <th scope="col">Submission</th>
            <th scope="col">Deadline</th>
          </tr>
        </thead>
        <tbody>

        <?php
        include_once("../../dbConnection.php");
          $sql = "SELECT * FROM assignment
            LEFT JOIN subject ON assignment.subject_id = subject.subject_id
            LEFT JOIN student ON assignment.student_id = student.student_id
            
          ";
          
          $query = mysqli_query($conn, $sql);
           while($r = mysqli_fetch_assoc($query)){
            echo '
            
            <tr>
            <td>'.$r['assignment_id'].'</td>
            <td>'.$r['student_id'].'</td>
            <td>'.$r['stud_name'].'</td>
            <td>'.$r['class'].'</td>
            <td>'.$r['name'].'</td>
            <td>';
              if($r['submitted_file'] != null){
                echo 'Download
                <a href="../downloadFile.php?file_name='.$r['submitted_file'].'"><i class="fa-solid fa-up-right-from-square"></i></a>';
              }else{
                echo 'Pending';
              }
              
            echo '</td>
                
            
            <td >'.date("d / m / Y", strtotime($r['submition_date'])).'</td>

          </tr>
            
            ';
           }
        ?>
          
        </tbody>
      </table>
    </section>
            </div>
        <!-- </div>
      </div> -->
    </section>

    <!-- <script src="index.js"></script>
    <script
      src="https://kit.fontawesome.com/915fb40dfa.js"
      crossorigin="anonymous"
    ></script> -->
    <?php include('../mainInclude/footer.php') ?>