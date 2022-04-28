<!-- Modal -->
<div class="modal fade" id="updateFacultyModal" tabindex="-1" aria-labelledby="updateFacultyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateFacultyModalLabel">Update Faculty</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="updateFacultyForm" class="" name="updatefaculty" role="form">
        <div class="modal-body">
            <input type="hidden" value="" name="fac_id" id="fac_id">
            <div class="mb-3">  
                <label for="faculty_name" class="form-label">faculty Name</label><br>
                    <input type="text"  class="form-control" name="faculty_name" id="facultyName">
            </div>

            <div class="mb-3">
                <label for="faculty_mobile" class="form-label">faculty Mobile</label>
                    <input class="form-control" type="tel" min="10" max="10" name="faculty_mobile" id="facultyMobile">
            </div>

            <div class="mb-3">
                <label for="faculty_email" class="form-label">faculty Email</label>
                    <input class="form-control" type="email" name="faculty_email" id="facultyEmail">
            </div>
        
            <!-- Address details -->
            <div class="mb-3">  
                    <label for="address" class="form-label">Address</label><br>
                    <input type="text"  class="form-control" name="address" id="address">
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