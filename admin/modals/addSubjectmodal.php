<div class="modal fade" id="addsubjectModalCenter" tabindex="-1" role="dialog" aria-labelledby="addsubjectModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="addsubjectModalCenterTitle"> Add subject</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true"></span>
            </button>
          </div>
          <form id="addsubjectForm" class="add-subject-form" name="addsubject" role="form">
            <div class="modal-body">
                <!--Start Form -->
          
                <div class="mb-3">  
                    <label for="subject_name" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject_name">      
                </div>
                <div class="mb-3">
                    <label for="class_name" class="form-label">Class</label>
                    <!-- <input type="text" class="form-control" id="class_name">  -->
                    <select class="form-select" aria-label="Default select example" id="class_name">
                      <option selected>Select class</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                </div>
                <!-- End Form  -->
            </div>
            </form>

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" name="addsubbtn" class="btn btn-primary" id="submit" onClick="addsub()">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            
        </div>
      </div>
    </div> 