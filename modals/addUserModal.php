<div class="modal fade" id="add_user" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="../php/register.php">
        <div class="modal-header">
          <h3 class="modal-title"> Add User
          </h3>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-md-6 mb-4">

              <div class="form-outline">
                <input type="text" id="firstName" name="firstName" class="form-control form-control-lg" required />
                <label class="form-label" for="firstName">First Name</label>
              </div>

            </div>
            <div class="col-md-6 mb-4">

              <div class="form-outline">
                <input type="text" id="lastName" name="lastName" class="form-control form-control-lg" required />
                <label class="form-label" for="lastName">Last Name</label>
              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-4 d-flex align-items-center">

              <div class="form-outline w-100">
                <input type="email" id="email" name="email" class="form-control form-control-lg" required />
                <label class="form-label" for="email">Your Email</label>
              </div>

            </div>
            <div class="col-md-6 mb-4">

              <h6 class="mb-2 pb-1">Gender: </h6>

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" checked />
                <label class="form-check-label" for="maleGender">Male</label>
              </div>

              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" />
                <label class="form-check-label" for="femaleGender">Female</label>

              </div>



            </div>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="password" name="password" class="form-control form-control-lg" required />
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg"
              required />
            <label class="form-label" for="confirmPassword">Repeat your password</label>
          </div>





          <div class="d-flex justify-content-center">
            <label for="selectRole">Select Role</label>
            <select class="form-control" id="selectRole" name="role">
              <option value=0>Administrator</option>
              <option value=1 selected>Regular Member</option>
            </select>
          </div>



        </div>
        <div style="clear:both;"></div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit" name="add_user"><span class="fa-solid fa-add"></span>
            Add</button>
          <button class="btn btn-danger" type="button" data-mdb-dismiss="modal"><span class="fa-solid fa-delete"></span>
            Close</button>
        </div>
    </div>
    </form>
  </div>
</div>
</div>