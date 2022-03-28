<div class="modal fade" id="AddExamModalCenter" tabindex="-1" role="dialog" aria-labelledby="AddExamModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Edit-book-title" id="AddExamModalCenterTitle">Add Exam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true"></span>
        </button>
      </div>
      <form id="addExamForm" class="Add-Exam-Model addExamForm" method="post" name="AddExam">
        <div class="modal-body">

          <label for="Student Name" text="form-label">Exam Name</label> 
          <input type="text" id="Student Name" name="exam_name" class="form-control"> 

          <label for="Date&Time" text="form-label">Date and Time</label> 
          <input type="datetime-local" id="Date&Time" name="exam_date_time" class="form-control">

          <label for="Date&Time" text="form-label">Exam type</label> 
          <select name="examtype" class="form-select" id="">
            <option selected>Select Exam Type</option>
            <option value="1">MCQ</option>
            <option value="2">WRITTEN</option>
          </select> 

          <div class="columns input-box">
            <label for="subject">Subject</label>
            <select class="form-select" aria-label="Default select example" name="subject_id" required>
              <option selected>Select a subject</option>
              <?php
                $sql4 = "SELECT * from subject 
                  LEFT JOIN assign_course ON subject.assign_course_id=assign_course.assign_course_id
                  LEFT JOIN class ON assign_course.class_id = class.class_id
                ;";
                $query4 = $conn->query($sql4);
                while($r = $query4->fetch_assoc()){
                    echo "<option value=".$r['subject_id'].">".$r['subject_name']." ".$r["class_name"]."</option>";
                }
                ?>
            </select>
          </div>    
        </div>
        
        <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="submit" class="btn btn-primary" >Add</button >
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        </div>
      </form>
        
    </div>
  </div>
</div> 


<!-- update  -->
<div class="modal fade" id="EditExamModalCenter" tabindex="-1" role="dialog" aria-labelledby="EditExamModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Edit-Exam-title" id="EditExamModalCenterTitle">EditExam</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true"></span>
        </button>
      </div>
      <form id="editExamForm" class="Add-Exam-Model addExamForm" method="post" name="AddExam">
        <div class="modal-body">
          <input type="hidden" name="id" id="ex_id">

          <label for="Student Name" text="form-label">Exam Name</label> 
          <input type="text" id="exam_name" name="exam_name" class="form-control"> 

          <label for="Date&Time" text="form-label">Date and Time</label> 
          <input type="datetime-local" id="exam_date_time" name="exam_date_time" class="form-control">

          <label for="Date&Time" text="form-label">Exam type</label> 
          <select name="examtype" class="form-select" id="examtype">
            <option selected>Select Exam Type</option>
            <option value="1">MCQ</option>
            <option value="2">WRITTEN</option>
          </select> 

          <div class="columns input-box">
            <label for="subject">Subject</label>
            <select class="form-select" aria-label="Default select example" id="subject_id" name="subject_id" required>
              <option selected>Select a subject</option>
              <?php
                $sql4 = "SELECT * from subject 
                  LEFT JOIN assign_course ON subject.assign_course_id=assign_course.assign_course_id
                  LEFT JOIN class ON assign_course.class_id = class.class_id
                ;";
                $query4 = $conn->query($sql4);
                while($r = $query4->fetch_assoc()){
                    echo "<option value=".$r['subject_id'].">".$r['subject_name']." ".$r["class_name"]."</option>";
                }
                ?>
            </select>
          </div>    
        </div>
        
        <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="submit" class="btn btn-primary" >Add</button >
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="../js/exam.js"></script>