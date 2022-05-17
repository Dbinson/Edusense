 <!-- Start User Registration Modal -->
 <div class="modal fade" id="studentRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="studentRegModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="studentRegModalCenterTitle">Student Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <!--Start Form Registration-->
          <form action="" id="addDeatilsStudForm" method="post" enctype="multipart/form-data">
          <div class="modal-body">
                    <input type="hidden" name="id" id="idd" value="">
                    <div class="mb-3">
                        <label for="student_photo" class="form-label">Student Photo</label>
                            <input class="form-control" type="file" name="student_photo" id="student_photo">
                    </div>

                    <div class="mb-3">
                        <label for="student_mobile" class="form-label">Student Mobile</label>
                            <input class="form-control" type="tel" min="10" max="10" name="student_mobile" required id="student_mobile">
                    </div>
<!-- 
                    <div class="mb-3">
                        <label for="student_email" class="form-label">Student Email</label>
                            <input class="form-control" type="email" name="student_email" id="student_email">
                    </div> -->
                
                    <!-- Address details -->
                    <h5 class="card-subtitle ">Address Details</h5>
                    <hr>
                    <div class="mb-3">  
                            <label for="city" class="form-label">City</label><br>
                            <input type="text"  class="form-control" required name="city" id="city">
                    </div>  
                    <div class="mb-3">
                            <label for="state" class="form-label">State</label><br>
                            <input type="text"  class="form-control" required name="state" id="state">
                    </div>
                    <div class="mb-3">
                            <label for="country" class="form-label">Country</label><br>
                            <input type="text"  class="form-control" required name="country" id="country">
                    </div>
                    <div class="mb-3">
                            <label for="pincode" class="form-label">Pincode</label><br>
                            <input type="text"  class="form-control" required name="pincode" id="pincode">
                    </div> 

                    <!-- Parent details -->
                    
                    <h5 class="card-subtitle ">Parent Details</h5>
                    <hr>
                    <div class="mb-3">
                            <label for="parent_name" class="form-label">Parent Name</label><br>
                            <input type="text"  class="form-control" required name="parent_name" id="parent_name">
                    </div>
                    <div class="mb-3">
                            <label for="parent_mobile" class="form-label">Parent Mobile Number</label><br>
                            <input type="text"  class="form-control" required name="parent_mobile"v id="parent_mobile">
                    </div>
                    <div class="mb-3">
                            <label for="parent_email" class="form-label">Parent Email</label><br>
                            <input type="email"  class="form-control" required name="parent_email" id="parent_email">
                    </div>
                
          </div>
          <div class="modal-footer">
            <span id="successMsgss"></span>
            <button type="Submit" class="btn btn-primary" id="signup">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
            <!-- End Form Registration -->
        </div>
      </div>
    </div> <!-- End user Registration Modal -->