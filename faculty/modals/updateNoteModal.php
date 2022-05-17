<div class="modal fade" id="updateNotesModalCenter" tabindex="-1" role="dialog" aria-labelledby="updateNotesModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title update-Notes-title" id="updateNotesModalCenterTitle">Update Notes</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true"></span>
                </button>
            </div>
            <form id="updateNotesForms" class="Edit-Notes-form" name="updateNotes" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <input type="hidden" name="note_id" id="note_id">
                  <input type="hidden" name="prevFile" id="prevFile">

                <div class="mb-3">  
                    <label for="subjectId" class="form-label">Subject</label>
                            <select class="form-select" required name="subjectId" required id="subject_Id"
                                aria-label="Default select example">
                            <option selected>Select subject </option>
                    <?php
                        include_once('../../dbConnection.php');    
                        $sql=mysqli_query($conn,"SELECT * from subject");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['subject_id'].">".$result['subject_id']."</option>";
                        }
                    ?>
                    
                </select>
                
                </div>
                <div class="mb-3">  
                    <label for="StudentId" class="form-label">Student</label>
                            <select class="form-select" required name="studentId" required id="stud_Id"
                                aria-label="Default select example">
                            <option selected>Select Student </option>
                    <?php
                        include_once('../../dbConnection.php');    
                        $sql=mysqli_query($conn,"SELECT student_id,stud_name from student");
                        while($result=mysqli_fetch_assoc($sql)){
                            echo "<option value=".$result['student_id'].">".$result['stud_name']."</option>";
                        }
                    ?>
                    </select>
                </div>
                    <div class="mb-3">
                        <label for="chapter_no" class="form-label">Chapter No</label>
                        <input type="text" class="form-control" name="chapterNum" required id="chapterNo">
                    </div>
                    <div class="mb-3">
                        <label for="noteFile" class="form-label">File </label>
                        <input class="form-control" type="file" name="noteFile" id="noteF">
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="successMsg"></span>
                    <button  class="btn btn-primary" type="submit" id="submit" >Update</button>              
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
            </form>  
            </div>  
        </div>
    </div> 
</div>