<!-- Update Subject  Modal -->
<div class="modal fade" id="viewAssignmentModalCenter" tabindex="-1" role="dialog" aria-labelledby="viewAssignmentModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title view-Assignment-title" id="viewAssignmentModalCenterTitle">Assignment</h5>
            <button type="button" class="add-Assignment-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="submitAssignmentForm" class="submit-Assignment-form" enctype="multipart/form-data" name="submitAssignment" role="form">
            <div class="modal-body">
                <input type="hidden" name="ass_Id" id="ass_Id">
              <h5>Assignment description</h5>
              <p id="assDesc"></p>
                <div class="mb-3">
                    <label for="class">Your Submition</label>
                    <input type="file" class="form-control" name="submitionFile" id="submitionFile"/>
                </div>
            </div>
            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
        </form>
        </div>
      </div>
    </div> 
    <!-- End   Modal -->