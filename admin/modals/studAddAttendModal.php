
<!-- Modal -->
<div class="modal fade" id="stud_modalCenter" tabindex="-1" role="dialog" aria-labelledby="stud_modalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Edit-book-title" id="stud_modalCenterTitle">Student Attendance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true"></span>
        </button>
      </div>
      <form id="stud_modalForm" class="studentattendance-form" name="studentattendance" role="form">
            <div class="modal-body">

            <div class="mb-3">  
                    <label for="student_name" class="form-label">Student</label>
                            <select class="form-select" id="student_name"
                                aria-label="Default select example">
                            <option selected>Choose student</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from students");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["student_id"].">".$result["student_name"]."</option>";
                    }
                    ?>                    
                </select>
                
            </div>

            <div class="mb-3">  
                    <label for="subject_name" class="form-label">Subject</label>
                            <select class="form-select" id="subject_name"
                                aria-label="Default select example">
                            <option selected>Choose subject</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from subject");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["subject_id"].">".$result["subject_name"]."</option>";
                    }
                    ?>                    
                </select>
                
            </div>

            <div class="mb-3">
                <label for="class_name" class="form-label">Class</label>
                        <select class="form-select" id="class_name"
                            aria-label="Default select example">
                        <option selected>Choose your class</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from class");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["class_id"].">".$result["class_name"]."</option>";
                    }
                    ?>
                </select>
                </div>
      
  <div class="mb-3">
    <label for="attend_date_time" class="row-sm-2 row-form-label">Date and Time</label>
      <input type="datetime-local"  class="mb-3" id="attend_date_time">
      
    </div>

                <br>

                <div class="mb-3">
                <label for="sAttendance" class="form-label">Attendence</label>
                        <select class="form-select" id="sAttendance"
                            aria-label="Default select example">
                        <option selected>Choose attendance</option>
                        <option value="1">Present</option>
                        <option value="0">Absent</option>
                </select>
                </div>

                            
           </div>
            
        </form>
      
        <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="submit" class="btn btn-primary" onclick="addSattend()" id="submit" >Add</button >
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        </div>
        
    </div>
  </div>
</div>

