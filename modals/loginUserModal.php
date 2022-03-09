
<div class="modal fade" id="userLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="userLoginModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LoginModalCenterTitle">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearuserLoginWithStatus()">
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="LoginForm">
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="LogEmail" class="pl-2 font-weight-bold">Email</label>
            <small id="statusLogMsg1"></small>
            <input type="email"
                class="form-control" placeholder="Email" name="LogEmail" id="userLogEmail">
            </div>

            <div class="form-group">
            <i class="fas fa-user"></i>
              <label for="LogEmail" class="pl-2 font-weight-bold">Role</label>
              <small id="statusLogMsg1"></small>
              <select class="form-control " aria-label=".form-select-lg example" id="userLogRole">
              <option selected value="103">Student</option>
              <option value="102">Faculty</option>
            </select>
            </div>

            <div class="form-group">
              <i class="fas fa-key"></i>
              <label for="LogPass" class="pl-2 font-weight-bold">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="userLogPass" id="userLogPass">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
        <button type="button" class="btn btn-primary" id="LoginBtn" onclick="checkUserLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="clearLoginWithStatus()">Cancel</button>
      </div>
    </div>
  </div>
    </div>