<div class="modal fade" id="fac_modalCenter" tabindex="-1" role="dialog" aria-labelledby="fac_modalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Edit-book-title" id="fac_modalCenterTitle">Faculty Attendance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true"></span>
        </button>
      </div>
      <form id="fac_modalForm" class="facultyattendance-form" name="facultyattendance" role="form">
            <div class="modal-body">

            <div class="mb-3">  
                    <label for="faculty_name" class="form-label">Faculty</label>
                            <select class="form-select" id="faculty_name"
                                aria-label="Default select example">
                            <option selected>Choose faculty</option>
                    <?php
                    $sql=mysqli_query($conn,"SELECT * from faculty");
                    while($result=mysqli_fetch_assoc($sql)){
                        echo "<option value=".$result["faculty_id"].">".$result["faculty_name"]."</option>";
                    }
                    ?>                    
                </select>
                
            </div>

            <div class="mb-3">  
                    <label for="subject_name" class="form-label">Subject</label>
                            <select class="form-select" id="subjectName"
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
                        <select class="form-select" id="className"
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
      <input type="datetime-local"  class="mb-3" id="a_date_time">
      
    </div>

                <br>

                <div class="mb-3">
                <label for="fac_attendance" class="form-label">Attendence</label>
                        <select class="form-select" id="fac_attendance"
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
            <button type="submit" class="btn btn-primary" onclick="addfac()" id="submit" >Add</button >
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        </div>
        
    </div>
  </div>
</div>