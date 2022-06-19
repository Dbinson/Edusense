<?php
    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Subject');
    define('PAGE', 'subject');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');
    include('../modal/ViewAssignmentModal.php');

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='../../index.php'; </script>";
    }

?>




<div class="container-fluid text-center">
            <div class="col-sm-8 text-left">
                <button type="button"
                        class="btn custom btn-outline-primary " onclick="ad()">Assigned</button>
                <button type="button"
                        class="btn custom btn-outline-primary " onclick="ce()">Completed</button>
                <hr>
<?php
    // $sql=mysqli_query($conn, "SELECT enroll_subject.subject_id, subject.subject_name from enroll_subject LEFT JOIN subject ON enroll_subject.subject_id= subject.subject_id where enroll_subject.student_id=102;");
    //     while($result= mysqli_fetch_assoc($sql)){
            echo '<div id="assignd">'; 
        $sql2=mysqli_query($conn,"SELECT subject.name,subject.class,assignment.assignment_id,assignment.submition_date FROM assignment
            LEFT JOIN subject ON assignment.subject_id = subject.subject_id
            WHERE assignment.student_id = '".$_SESSION['student_id']."' AND assignment.submitted_file IS NULL");
            if(mysqli_num_rows($sql2) == 0){
                echo ' No new Assignment ';
            }else{
                while($re = mysqli_fetch_assoc($sql2)){
                    echo '<div class="alert alert-secondary" role="alert">
                        <a class="custom-link display-5 view-assBtn" href="#" id="'.$re['assignment_id'].'" >'.$re["name"].' '.$re["class"].'</a>
                        </br>
                        <small class="custom-date">Due Date:'.$re["submition_date"].'</small>
                    </div>
                        ';
                }
            }
            echo '</div>';

            //Display completed
            echo '<div id="completed" style="display: none;">'; 
                $sql2=mysqli_query($conn,"SELECT subject.name,subject.class,assignment.submitted_file,assignment.submited_date FROM assignment
                LEFT JOIN subject ON assignment.subject_id = subject.subject_id
                WHERE assignment.student_id = '".$_SESSION['student_id']."' AND assignment.submitted_file IS NOT NULL;");
                while($re=mysqli_fetch_assoc($sql2)){
                echo '<div class="alert alert-secondary" role="alert">
                <a class="custom-link dispaly-5" href="../downloadFile.php?file_name='.$re['submitted_file'].'">'.$re["name"].'</a>
                </br>
                <small class="custom-date">Submission Date:'.$re["submited_date"].'</small>
                    </div>
                    ';
                }
            echo '</div>';
    // }
   ?> 
            </div>
    </div>

    <script>
        var d1,d2;
        d1 = document.getElementById('assignd')
        d2 = document.getElementById('completed')


        function ad(){
            d2.style.display = 'none';
            d1.style.display = 'block';
        }

        function ce(){
            d1.style.display = 'none';
            d2.style.display = 'block';
        }

         //View  Assignment
      
    $(document).ready(function () {
        $('.view-assBtn').on('click', function () {
            var id = $(this).attr('id');
            // console.log(id)
            $.ajax({
                type: "post",
                url: "../fetch.php",
                data: {
                    request: 'assignmentDetails',
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data,(index, val)=>{
                    // console.log(val)
                    $('#ass_Id').val(val.assignment_id)
                    $('#assDesc').html(val.question)
                    })
                    $('#viewAssignmentModalCenter').modal('show')
                }
            });
    });

    });

    //submit assignment
    
    $(document).ready(function (e) {
      $("#submitAssignmentForm").on('submit',(function (e) {
      
      $.ajax({
        url:"submitAssignment.php",
        type:"post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data){
          console.log(data)
          if(data == 1){
            $("#successAssMsg").html(
            '<small class="alert alert-success"> Submitted</small>'
          );
          setTimeout(() => {
            $('#viewAssignmentModalCenter').modal('hide')
            location.reload();
          },1000)
           
          }else if(data == -1){
            $("#successAssMsg").html(
            '<small class="alert alert-danger"> Please use .pdf and .docx file format. </small>'
          );
          }else{
            $("#successAssMsg").html(
            '<small class="alert alert-danger"> Please Attach the file. </small>'
          );
          }
        }
      });
      e.preventDefault();
      }));
    });
    </script>
<?php include('../mainInclude/footer.php')?>
        