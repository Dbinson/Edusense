<?php 

    if(!isset($_SESSION)){
        session_start();
    }
    define('TITLE','Enrolled');
    define('PAGE', 'enrolledStudent');
    include('../mainInclude/header.php');
    include('../../dbConnection.php');

    if(!isset($_SESSION['is_admin_login'])){
        echo "<script> location.href='../index.php'; </script>";
       }

?>
<section id="content">
    <div class="container p-4">

       <h3>Enroll Requests</h3>
       <table class="table table-striped table-bordered table-hover ">
           <thead>
               <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Subject Name</th>
                    <th>Mobile</th>
                    <th></th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT enroll.subject_id,enroll.student_id, subject.name,student.stud_name,student.stud_mobile FROM enroll
                        LEFT JOIN student ON enroll.student_id = student.student_id
                        LEFT JOIN subject ON enroll.subject_id = subject.subject_id
                        WHERE faculty_id IS NULL";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['student_id'].'</td>
                            <td>'.$row['stud_name'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['stud_mobile'].'</td>
                            <td>      
                                <button type="submit" class="btn btn-primary btn-sm acceptbtn" id="'.$row['subject_id'].','.$row['student_id'].'" >Accept</button>             
                            </td>
                            <td>
                                <a href="request.php?stud_id='.$row['student_id'].'&r=2 &sub_id='.$row['subject_id'].' " class="btn btn-danger btn-sm">Decline</a>
                            </td>

                        </tr>
                        ';
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
       
    <!-- view all enrolled students -->
    <div class="container p-4">

       <h3>Enrolled</h3>
       <table class="table table-striped table-bordered table-hover " style="height: 25%;">
           <thead>
               <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Subject Name</th>
                    <th>faculty Name</th>
                    <th></th>
               </tr>
           </thead>
           <tbody>
                <?php
                    $count=1;
                    $sql = "SELECT enroll.subject_id,enroll.student_id,faculty.faculty_name, subject.name,student.stud_name,student.stud_mobile FROM enroll
                        LEFT JOIN student ON enroll.student_id = student.student_id
                        LEFT JOIN faculty ON enroll.faculty_id = faculty.faculty_id
                        LEFT JOIN subject ON enroll.subject_id = subject.subject_id
                        ";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo '
                        <tr>
                            <th>'.$count++.'</th>
                            <td>'.$row['student_id'].'</td>
                            <td>'.$row['stud_name'].'</td>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['faculty_name'].'</td>
                        </tr>
                        ';
                    }               

                ?>
           </tbody>
       </table>
        
    </div>
</section>
</div>


<!-- Assign modal -->
<div class="modal fade" id="assignFacultyModalCenter" tabindex="-1" role="dialog" aria-labelledby="assignFacultyModalCenterTitle"
     aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="assignFacultyModalCenterTitle">Assign</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true"></span>
            </button>
          </div>
          <form id="assignFacultyModalForm" class="add-course-form" name="addcourse" role="form">
            <div class="modal-body">
            <input type="hidden" id="reg_id">
            <!-- Select faculty -->
                <div class="columns input-box">
                    <label for="subject">Faculty</label>
                    <select class="form-select" name="fname" required id="faculty_id" aria-label="Default select example">
                    <option selected>Select a Faculty</option>
                    <?php
                            $sql=mysqli_query($conn,"SELECT faculty_id,faculty_name from faculty;");
                            while($result=mysqli_fetch_assoc($sql)){
                                echo' <option value="'.$result['faculty_id'].'">'.$result['faculty_id'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$result['faculty_name'].'</option>';
                            }
                    ?>
                    </select>
                </div>
               
                <!-- End Form  -->
            </div>
            

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" id="submit">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            </form>
        </div>
      </div>
    </div> 

    <script>
        //ajax for accepting
var id
$(document).on('click', '.acceptbtn', function(){ 
    console.log('dca')

      $('#assignFacultyModalCenter').modal('show');

        id=$(this).attr("id")
       
        $('#reg_id').val(id)
        
        
  });

  $(document).ready(function (e) {
    $("#assignFacultyModalForm").on('submit',(function (e) {

        var formdata = new FormData(this)
        formdata.append('id',id)
		
		$.ajax({
			url:"./request.php",
			type:"post",
			data: formdata,
			processData: false,
			contentType: false,
			success: function (data){
				// console.log(data)
                if (data == 0) {
                    $("#successMsg").html(
                      '<small class="alert alert-danger"> Assign Failed</small>'
                    );
                  } else if (data == 1) {
                    $("#successMsg").html(
                      '<small class="alert alert-success"> Assigned Success! Loading..... </small>'
                    );
                    // Empty Fields
                    clearField("#assignFacultyModalForm");

                    setTimeout(() => {
                      $('#assignFacultyModalCenter').modal('hide');
                      location.reload();
                    }, 1000);
                  }
            }
		});
		e.preventDefault();
    }));
});
function clearField(id){
    $(id).trigger('reset');
  }
    </script>
<?php include('../mainInclude/footer.php'); ?>