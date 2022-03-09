 <!-- Start User Registration Modal -->
 <div class="modal fade" id="userRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="userRegModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userRegModalCenterTitle">Student Registration</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearAlluserReg()">
            </button>
          </div>
          <div class="modal-body">
            <!--Start Form Registration-->
            <?php include('../userRegistration.php'); ?>
            <!-- End Form Registration -->
          </div>
          <div class="modal-footer">
            <span id="successMsg"></span>
            <button type="button" class="btn btn-primary" id="signup" onclick="addUser()">Sign Up</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearAlluserReg()">Close</button>
          </div>
        </div>
      </div>
    </div> <!-- End user Registration Modal -->