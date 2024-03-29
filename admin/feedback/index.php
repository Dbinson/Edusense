<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Feedback');
    define('PAGE', 'feedback');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }

?>
<section id="content">
    <div class="container p-4">

       <h3>Feedback</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Description</th>
                    <th>Ratings</th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT * FROM feedback
                        LEFT JOIN student ON feedback.student_id = student.student_id
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['feedback_id'].'</td>
                            <td>'.$row['stud_name'].'</td>
                            <td>'.$row['feedback_desc'].'</td>
                            <td>'.$row['ratings'].'</td>
                        </tr>
                        ';
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       
<?php include('../mainInclude/footer.php'); ?>