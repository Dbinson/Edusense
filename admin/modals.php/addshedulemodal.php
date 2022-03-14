<div class="modal fade" id="addscheduleModalCenter" tabindex="-1" role="dialog"
 aria-labelledby="addscheduleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Edit-book-title" id="addscheduleModalCenterTitle">Add Schedule</h5>
        <button type="button" class="edit-book-close-btn" data-bs-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addscheduleForm" class="addschedule-form" name="addschedule" role="form">
            <div class="modal-body">

            <div class="mb-3 row">
    <label for="sched_name" class="col-sm-2 col-form-label">Schedule Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" id="sched_name" >
    </div>

    <div class="mb-3">
    <label for="start_date_time" class="row-sm-2 row-form-label">Start Date</label>
      <input type="datetime-local"  class="mb-3" id="start_date_time">
      <label for="end_date_time" class="row-sm-2 row-form-label" style="margin-left: 150px">End Date</label>
      <input type="datetime-local"  class="mb-3" id="end_date_time" >
    </div>

    <div class="mb-3">
  <label for="sched_desc" class="form-label">Description</label>
  <textarea class="form-control" id="sched_desc" rows="3"></textarea>
</div>
<div class="mb-3">  
                    <label for="sched_type" class="form-label">Schedule Type</label>
                            <select class="form-select" id="sched_type"
                                aria-label="Default select example">
                                <option selected>Choose Schedule Type</option>
                            <option >Demo</option>
                            <option >Lecture</option>
                            <option >Assignment</option>
                            <option >Examination</option>
</div>

                </select>
                <br>

                            <div class="mb-4">  
                    <label for="subject_name" class="form-label">Subject Name</label>
                            <select class="form-select" id="subject_name"
                                aria-label="Default select example">
                            <option selected>Choose Subject</option>

                            <?php
                      $sql=mysqli_query($conn,"SELECT * from subject");
                     while($result=mysqli_fetch_assoc($sql)){
                      echo "<option value=".$result["subject_id"].">".$result["subject_name"]."</option>";
                      }
       
                 ?> 
                            
                </select>

<div class="mb-3 row">
    <label for="student_name" class="col-sm-2 col-form-label">Student Name</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control-plaintext" id="student_name" >
    </div>

                
            </div>

  </div>


           </div>
            
        </form>
        <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="btn btn-primary" onclick="checkAdd()" id="submit" >Add</button >
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
        </div>
        
    </div>
  </div>
</div>
