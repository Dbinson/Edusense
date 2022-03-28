<?php

if(!isset($_SESSION)){
    session_start();
}
define('TITLE', 'Assignment');
define('PAGE', 'addAssignment');
include('../mainInclude/header.php');
include('../../dbConnection.php');
include('../modals/examModal.php');
?>

<section id="content">
    <div class="container ">
       
        <div class="card" style="width: 55rem;margin:auto;">
            <div class="card-body">
            
            <div class="row admin-mybooks-header">
                <h2>Examination</h2>
                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#AddExamModalCenter" type="submit">Add Exam </button>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                 <th scope="col">Exam Name</th>
                 <th scope="col">Exam Type</th>
                 <th scope="col">Subject</th>
                <th scope="col">Class</th>
                 <th scope="col">Date & Time</th>
             </tr>
                </thead>
          
                <tbody>
                <?php
            $sql = "SELECT examination.exam_name,examination.exam_id,exam_type.Exam_type,subject.subject_name,class.class_name,examination.exam_date_time FROM Examination 
                    LEFT JOIN subject ON Examination.subject_id=subject.subject_id 
                    LEFT JOIN exam_type ON Examination.Exam_type_id=exam_type.exam_type_id 
                    LEFT JOIN assign_course ON subject.assign_course_id = assign_course.assign_course_id
                    LEFT JOIN class ON assign_course.class_id=class.class_id";
            $query = $conn->query($sql);

                 $count=1;
            while($result = $query->fetch_assoc()){
                // $count++;
                    echo'<tr> <th scope="row">'.$count++.'</th>
                    <td>'.$result['exam_id'].'</td>
                    <td>'.$result['exam_name'].'</td>
                    <td>'.$result['Exam_type'].'</td>
                    <td>'.$result['subject_name'].'</td>
                    <td>'.$result['class_name'].'</td>
                    <td>'.$result['exam_date_time'].'</td>
                    
                    <td>
                        <button class="btn btn-primary btn-sm editexam" type="submit" id='.$result['exam_id'].'>Update</button>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </td>
                </tr>';
                }

                   ?>
                </tbody>
            </table>
        </div>
              
            </div>
        </div>
    </div>
</section>
  <!-- <script src=""></script> -->