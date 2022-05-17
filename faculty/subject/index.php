<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Subject');
    define('PAGE', 'subject');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
      
?>

<section id="content">
    <div class="container p-4">
        <h3>Teaching Subjects</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                    <th>#</th>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Status</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT enroll.subject_id, enroll.status,subject.class, subject.name,student.stud_name FROM enroll
                        LEFT JOIN subject ON enroll.subject_id = subject.subject_id
                        LEFT JOIN student ON enroll.student_id = student.student_id
                        WHERE faculty_id = '".$_SESSION['faculty_id']."'
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['subject_id'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['stud_name'].'</td>
                            <td>'.$row['class'].'</td>
                            <td>'.$row['status'].'</td>
                            ';
                        
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       

    
</section>
</div>

<?php include('../mainInclude/footer.php'); ?>