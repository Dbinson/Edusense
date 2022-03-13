<div class="modal fade" id="addcourseModalCenter" tabindex="-1" role="dialog" aria-labelledby="addcourseModalCenterTitle"
     aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="addcourseModalCenterTitle">Add Course</h5>
            <button type="button" class="add-course-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="addcourseForm" class="add-course-form" name="addcourse" role="form">
            <div class="modal-body">
                                <!--Start Form -->
          
                                <div class="mb-3">  
                        <label for="course_name" class="form-label">Course</label>
                        <input type="text" class="form-control" id="course_name">      
                    
                </div>
                <div class="mb-3">
                    <label for="board_name" class="form-label">Board</label>
                    <input type="text" class="form-control" id="board_name">   
                </div>
                <div class="mb-3">
                    <label for="course_desc" class="form-label">Course Description</label>
                        <textarea class="form-control" id="course_desc" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="course_image" class="form-label">Course Image</label>
                         <input class="form-control" type="file" id="course_image">
                </div>
                
               
                <!-- End Form  -->
            </div>
            </form>

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" name="addcoursebtn" class="btn btn-primary"  id="submit">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            
        </div>
      </div>
    </div> 
    <!-- End   Modal -->
