<div class="modal fade" id="addDemoModalCenter" tabindex="-1" role="dialog" aria-labelledby="addDemoModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title add-Demo-title" id="addDemoModalCenterTitle">Add Demo</h5>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true"></span>
                </button>
            </div>
            <form id="addDemoForm" class="Edit-Demo-form" name="addDemo" enctype="multipart/form-data" role="form">
                <div class="modal-body">

                <div class="mb-3">  
                    <label for="subjectId" class="form-label">Subject</label>
                            <select class="form-select" name="subjectId" id="subjectId"
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
				<div class="mb-3">
					<label for="demoFile" class="form-label">File </label>
					<input class="form-control" type="file" name="demoFile" id="demoFile">
				</div>
                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button  class="btn btn-primary" type="submit" id="submit" >Add</button>              
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                </div>
            </form>  
            </div>  
        </div>
    </div> 
</div>