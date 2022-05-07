<!-- Update Subject  Modal -->
<div class="modal fade" id="updatesubjectModalCenter" tabindex="-1" role="dialog" aria-labelledby="updatesubjectModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title update-SUBJECT-title" id="updatesubjectModalCenterTitle"> Update subject</h5>
            <button type="button" class="add-subject-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="updatesubjectForm" class="update-subject-form" name="updatesubject" role="form">
            <div class="modal-body">
                <!--Start Form -->
                <input type="hidden" name="" id="subId">
          
                    <div class="mb-3">  
                        <label for="selectSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" required id="selectSubject">
                    
                </div>
                
                <div class="mb-3">
                    <label for="className" class="form-label">Class</label>
                    <input type="text" class="form-control" required id="className"> 
                </div>
                <!-- End Form  -->
            </div>
            </form>

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" id="submit" onClick="updatesub()">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            
        </div>
      </div>
    </div> 
    <!-- End   Modal -->