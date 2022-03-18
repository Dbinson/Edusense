
<!-- Assign modal -->
<div class="modal fade" id="assignDemoModalCenter" tabindex="-1" role="dialog" aria-labelledby="assignDemoModalCenterTitle"
     aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title add-book-title" id="assignDemoModalCenterTitle">Assign</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" >
              <span aria-hidden="true"></span>
            </button>
          </div>
          <form id="assignDemoModalForm" class="add-course-form" name="addcourse" role="form">
            <div class="modal-body">
            <input type="hidden" id="reg_id">
            <!-- Select faculty -->
                <div class="columns input-box">
                    <label for="subject">Faculty</label>
                    <select class="form-select" name="fname" required id="faculty_id" aria-label="Default select example">
                    <option selected>Select a Faculty</option>
                    <?php
                    include_once('../../dbConnection.php');
                            $sql="SELECT faculty.faculty_id,user.user_name from faculty
                            LEFT JOIN user ON faculty.user_id = user.user_id";
                            $query = $conn->query($sql);
                            while($result = $query->fetch_assoc()){
                                echo' <option value="'.$result['faculty_id'].'">'.$result['faculty_id'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$result['user_name'].'</option>';
                            }
                    ?>
                    </select>
                </div>

                <!-- Select date and time -->
                <div class="columns input-box">
                    <label for="dt">Demo Date and time</label>
                    <input type="date" class="form-control" require id="dt" />
                </div>

                <!-- Meet link -->
                <div class="columns input-box">
                    <label for="ml">Meet Link</label>
                    <input type="text" class="form-control" placeholder="Enter the Google meet link here" id="ml" required />
                   
                </div>
               
                <!-- End Form  -->
            </div>
            </form>

            <div class="modal-footer">
                <span id="successMsg"></span>
                <button type="submit" class="btn btn-primary" onclick="assD()" id="submit">Add</button >
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
            
        </div>
      </div>
    </div> 