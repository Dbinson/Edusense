<div class="modal fade" id="addsubjectModalCenter" tabindex="-1" role="dialog" aria-labelledby="addsubjectModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="addsubjectModalCenterTitle"> Add subject</h5>
            <button type="button" class="add-book-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
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
                        <label for="course_select" class="form-label">Course</label>
                                <select class="form-select" id="course_select"
                                    aria-label="Default select example">
                                <option selected>Choose Course name</option>
                        <?php
                        $sql=mysqli_query($conn,"SELECT * from courses");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['course_id'].">".$result['course_name']."</option>";
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
                            echo "<option value=".$result['class_id'].">".$result['class_name']."</option>";
                        }
                        ?>
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