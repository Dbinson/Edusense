<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Subject');
    define('PAGE', 'subject');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='../../index.php'; </script>";
       }
      
?>

<section id="content">
    <div class="container p-4">
        <h3>Enroll Subject</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                    <th>#</th>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Faculty Name</th>
                    <th>Status</th>
                    <!-- <th>Update</th>
                    <th>Remove</th> -->
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = " SELECT enroll.subject_id, subject.name,faculty.faculty_name,enroll.status FROM enroll
                        LEFT JOIN faculty ON enroll.faculty_id = faculty.faculty_id
                        LEFT JOIN subject ON enroll.subject_id = subject.subject_id
                        WHERE student_id = '".$_SESSION['student_id']."'
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['subject_id'].'</td>
                            <td>'.$row['name'].'</td>
                            ';
                        if($row['faculty_name']== null){
                            echo '<td>nill</td>';
                        }else{
                            echo '<td>'.$row['faculty_name'].'</td>';
                        }
                        //     <td>
                        //         <button name="updatebtn" class="btn btn-outline-success updatebtn btn-sm" type="submit" id="'.$row['faculty_id'].'">
                        //         <i class="material-icons-outlined">update</i>
                        //     </td>
                        //     <td>
                        //         <button name="deletebtn" class="btn btn-outline-danger deletebtn btn-sm" type="submit" id="'.$row['faculty_id'].'">
                        //         <i class="material-icons-outlined">delete</i>
                        //         </button>
                        //     </td>

                        echo '
                        <td>'.$row['status'].'</td>
                        </tr>';
                        
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       

    
</section>
</div>

<?php include('../mainInclude/footer.php'); ?>