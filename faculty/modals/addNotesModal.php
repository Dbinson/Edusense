<div class="modal fade" id="addNotesModalCenter" tabindex="-1" role="dialog" aria-labelledby="addNotesModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title add-Notes-title" id="addNotesModalCenterTitle">Add Notes</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true"></span>
                </button>
            </div>
            <form id="addNotesForms" class="Edit-Notes-form" name="addNotes" enctype="multipart/form-data" role="form">
                <div class="modal-body">

                <div class="mb-3">  
                    <label for="subjectId" class="form-label">Subject</label>
                            <select class="form-select" required name="subjectId" required id="subjectId"
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
                            <select class="form-select" required name="studentId" required id="student_Id"
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
                        <input type="text" class="form-control" name="chapterNum" required id="chapterNum">
                    </div>
                    <div class="mb-3">
                        <label for="noteFile" class="form-label">File </label>
                        <input class="form-control" required type="file" name="noteFile" required id="noteFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="successMsg"></span>
                    <button  class="btn btn-primary" type="submit" id="submit" >Add</button>              
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
            </form>  
            </div>  
        </div>
    </div> 
</div>