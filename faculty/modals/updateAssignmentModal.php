<!-- Update Subject  Modal -->
<div class="modal fade" id="updateAssignmentModalCenter" tabindex="-1" role="dialog" aria-labelledby="updateAssignmentModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title update-Assignment-title" id="updateAssignmentModalCenterTitle"> Update Assignment</h5>
            <button type="button" class="add-Assignment-close-btn" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="updateAssignmentForm" class="update-Assignment-form" name="updateAssignment" role="form">
            <div class="modal-body">
                <!--Start Form -->
                <input type="hidden" name="assignment_id" id="assignment_id">
                <div class="mb-3">  
                    <label for="selectSubject" class="form-label">Subject</label>
                    <select class="form-select" aria-label="Default select example" name="sid"required id="sid">
                        <option selected>Select a subject</option>
                        <?php
                            $sql=mysqli_query($conn,"SELECT * from enroll 
                                LEFT JOIN subject ON enroll.subject_id=subject.subject_id 
                                WHERE faculty_id='".$_SESSION["faculty_id"]."';");
                            while($r=mysqli_fetch_assoc($sql)){
                                echo "<option value=".$r['subject_id'].">".$r['name']." ".$r["class"]."</option>";
                            }
                        ?>
                    </select>
                </div>
          
                <div class="mb-3">  
                    <label for="selectSubject" class="form-label">Student</label>
                    <select class="form-select" aria-label="Default select example" name="stud_Id" required id="stud_Id">
                        <option selected>Select a student</option>
                        <?php
                            $sql=mysqli_query($conn,"SELECT * from enroll 
                            LEFT JOIN student ON enroll.student_id=student.student_id 
                            WHERE faculty_id='".$_SESSION["faculty_id"]."';");
                            while($r=mysqli_fetch_assoc($sql)){
                                echo "<option value=".$r['student_id'].">".$r['stud_name']."</option>";
                            }
                        ?>
                        </select>
                </div>
                
                <div class="mb-3">
                    <label for="class">Assesment Question</label>
                    <input
                    type="text"
                    class="form-control"
                    placeholder="Enter assesment Question"
                    name="aquestion"
                    id="aquestion"
                    />
                </div>
                <div class="mb-3">
                    <label for="class">Assesment Deadline</label>
                    <input type="datetime-local" class="form-control" name="adeadline" required id="adeadLine"/>
                </div>
                <div class="mb-3">
                    <label for="class">Assesment Marks</label>
                    <input type="number" class="form-control" name="amarks"required id="amarks"/>
                </div>
                <!-- End Form  -->
            </div>
           

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" id="submit">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
        </form>
        </div>
      </div>
    </div> 
    <!-- End   Modal -->