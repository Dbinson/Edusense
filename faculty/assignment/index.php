<?php
    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Assignment');
    define('PAGE', 'assignment');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');
    include('../modals/updateAssignmentModal.php');

    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }
    
?>

<link rel="stylesheet" href="../css/assignment.css">

       <div class="container">
    <header class="rows header">
      <button id="add-asses-btn" class="btn-active">Add Assesment</button>
      <button id="view-asses-btn">View Assesments</button>
      <button id="view-sub-asses-btn">View Submited</button>
    </header>

    <form class="columns add-assesment-form"  id="addAssForm" method="POST" >

      <div class="rows form-title">
        <h1>Add Assesment</h1>
      </div>
      <div class="columns input-box">
        <label for="subject">Subject</label>
        <select class="form-select" aria-label="Default select example" name="sid">
          <option selected>Select a subject</option>
          <?php
                        $sql=mysqli_query($conn,"SELECT * from enroll 
                            LEFT JOIN subject ON enroll.subject_id=subject.subject_id 
                            WHERE faculty_id='".$_SESSION["faculty_id"]."';");
                        while($r=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$r['subject_id'].">".$r['name']." ".$r["class"]."</option>";
                        }
                        ?>
        </select>
      </div>

      <div class="columns input-box">
        <label for="student">Student</label>
        <select class="form-select" aria-label="Default select example" name="stud_Id">
          <option selected>Select a student</option>
          <?php
            $sql=mysqli_query($conn,"SELECT * from enroll 
            LEFT JOIN student ON enroll.student_id=student.student_id 
            WHERE faculty_id='".$_SESSION["faculty_id"]."';");
            while($r=mysqli_fetch_assoc($sql)){
                echo "<option value=".$r['student_id'].">".$r['stud_name']."</option>";
            }
          ?>
        </select>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Question</label>
        <input
          type="text"
          class="form-control"
          placeholder="Enter assesment Question"
          name="aquestion"
        />
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Deadline</label>
        <input type="datetime-local" class="form-control" name="adeadline"/>
      </div>
      <div class="columns input-box">
        <label for="class">Assesment Marks</label>
        <input type="number" class="form-control" name="amarks"/>
      </div>
      <span id="successMsg"></span>
      <div class="rows asse-form-submit">
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </form>


    <!-- View assignment  -->
    <section class="columns cards">

    <?php
      $s = mysqli_query($conn,"SELECT assignment.assignment_id,assignment.submition_date,subject.name,subject.class,student.stud_name FROM assignment
        LEFT JOIN subject ON assignment.subject_id = subject.subject_id
        LEFT JOIN student ON assignment.student_id = student.student_id
       WHERE faculty_id='".$_SESSION['faculty_id']."';");

       while($result = mysqli_fetch_assoc($s)){
         echo '
         <div class="rows card">
        <div class="rows card-icon">
          <i class="fa-solid fa-box-archive"></i>
        </div>
        <div class="columns card-details">
          <h2>'.$result['name'].'</h2>
          <div class="rows">
            <span class="line">'.$result['stud_name'].' </span></br>
            <span >'.$result['name'].' '.$result['class'].'</span>
            <span class="card-deadline">Due Date '. date(" F d, Y h:i A", strtotime($result['submition_date'])).'</span>
          </div>
        </div>
        <div class="rows card-delete">
        <a href="#updateAssignmentModalCenter" type="button" class="updateAssignment" id="'.$result['assignment_id'].'" ><span class="material-icons">update</span></a>
        </div>
        <div class="rows card-delete">
        <a href="../removeRequest.php?del_id='.$result['assignment_id'].'&r=f" ><span class="material-icons">delete</span></a>
        </div>
      </div>
         ';
       }

    ?>
    </section>


    <!-- Submitted Assignments -->
    <section class="submitted-sec">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Student ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Assesment ID</th>
            <th scope="col">Submition Date</th>
            <th scope="col">File</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        <?php 
        
        $s = mysqli_query($conn,"SELECT assignment.assignment_id,assignment.submition_date,subject.name,subject.class,student.stud_name FROM assignment
        LEFT JOIN subject ON assignment.subject_id = subject.subject_id
        LEFT JOIN student ON assignment.student_id = student.student_id
       WHERE faculty_id='".$_SESSION['faculty_id']."' AND submitted_file != null;");

       $count=1;
       while($result = mysqli_fetch_assoc($s)){
          echo'
            <tr>
              <th scope="row">'.$count++.'</th>
              <td>'.$result['student_id'].'</td>
              <td>'.$result['stud_name'].'</td>
              <td>'.$result['assignment_id'].'</td>
              <td>'.$result['submition_date'].'</td>
              <td>';
                echo '<a href="./downloadFile.php?file='.$result['submitted_file'].'" class="btn btn-primary">
                  Download
                </a>
              </td>
            </tr>
          ';
       }
        
        ?>
        </tbody>
      </table>
    </section>
    </div>


    <script>
      //update Assignment
      
    $(document).ready(function () {
        $('.updateAssignment').on('click', function () {
            var id = $(this).attr('id');
            // console.log(id)
            $.ajax({
                type: "post",
                url: "../fetch.php",
                data: {
                    request: 'assignmentUpdate',
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data,(index, val)=>{
                    // console.log(val)
                    $('#assignment_id').val(val.assignment_id)
                    $('#sid').val(val.subject_id)
                    $('#stud_Id').val(val.student_id)
                    $('#aquestion').val(val.question)
                    $('#adeadLine').val(val.submition_date)
                    $('#amarks').val(val.assign_marks)
                    })
                    $('#updateAssignmentModalCenter').modal('show')
                }
            });
    });

    });

    $(document).ready(function (e) {
      $("#updateAssignmentForm").on('submit',(function (e) {
      
      $.ajax({
        url:"updateAssignment.php",
        type:"post",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data){
          console.log(data)
            $('#updateFacultyModal').modal('hide')
            location.reload();
        }
      });
      e.preventDefault();
      }));
    });

    </script>
    <script src="../js/assignment.js"></script>
    <script src="../js/index.js"></script>
<?php include('../mainInclude/footer.php'); ?>