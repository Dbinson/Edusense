<!-- Modal -->
<div class="modal fade" id="changePassModal" tabindex="-1" aria-labelledby="changePassModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePassModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="changePassForm"  method="post">
        <div class="modal-body">
            <div class="mb-3">
                <label for="pass" class="form-label">New Password</label>
                <input class="form-control" type="password" required name="pass" id="pass">

                <label for="confirmPass" class="form-label">Confirm Password</label>
                <input class="form-control" type="password" required name="confirmPass" id="confirmPass">
            </div>
        </div>
        <div class="modal-footer">
          <span id="successMsg"></span>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
      </form>
    </div>
  </div>
</div>