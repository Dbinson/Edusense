<!-- Modal -->
<div class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateStudentModalLabel">Update Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateStudentForm" class="" name="updatestudent" role="form">
        <div class="modal-body">
            <input type="hidden" value="" name="stud_id" id="stud_id">
            <div class="mb-3">  
                <label for="student_name" class="form-label">Student Name</label><br>
                    <input type="text"  class="form-control" name="student_name" id="studentName">
            </div>

            <div class="mb-3">
                <label for="student_mobile" class="form-label">Student Mobile</label>
                    <input class="form-control" type="tel" min="10" max="10" name="student_mobile"required id="studentMobile">
            </div>

            <div class="mb-3">
                <label for="student_email" class="form-label">Student Email</label>
                    <input class="form-control" type="email" name="student_email" required id="studentEmail">
            </div>
        
            <!-- Address details -->
            <div class="mb-3">  
                    <label for="address" class="form-label">Address</label><br>
                    <input type="text"  class="form-control" name="address" id="address">
            </div>  
            <!-- Parent details -->
            
            <h5 class="card-subtitle ">Parent Details</h5>
            <hr>
            <div class="mb-3">
                    <label for="parent_name" class="form-label">Parent Name</label><br>
                    <input type="text"  class="form-control" name="parent_name" id="parentName">
            </div>
            <div class="mb-3">
                    <label for="parent_mobile" class="form-label">Parent Mobile Number</label><br>
                    <input type="text"  class="form-control" name="parent_mobile" required id="parentMobile">
            </div>
            <div class="mb-3">
                    <label for="parent_email" class="form-label">Parent Email</label><br>
                    <input type="email"  class="form-control" name="parent_email" id="parentEmail">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">update</button>
        </div>
      </form>
    </div>
  </div>
</div>