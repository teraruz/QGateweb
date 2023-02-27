<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Change Password</h1>
    </div>
    <div class="row ">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Employee Code : &nbsp; <?php echo $empcode; ?></h4>
              <input type="hidden" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="empcode2" value="<?php echo $empcode; ?>" />
            </div><br>
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Employee Name : &nbsp; <?php echo $fullname; ?></h4>
            </div>
            <div class="card-body  text-center">
              <div>
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-3 col-form-label">Current Password :</label>
                  <div class="col-sm-8">
                    <input class="form-control ng-pristine ng-valid ng-empty ng-touched" type="password" name="currentpass"   id="currentpass">
                  </div>
                  <div class="col-sm-1">
                    <i class="mdi mdi-eye" id="togglePassword1" style="margin-left: -30px; cursor: pointer;"></i>
                  </div>
                </div>
                <hr class="new4">
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-3 col-form-label">New Password :</label>
                  <div class="col-sm-8">
                    <input class="form-control ng-pristine ng-valid ng-empty ng-touched" type="password" name="newpass"   id="newpass">
                  </div>
                  <div class="col-sm-1">
                    <i class="mdi mdi-eye" id="togglePassword2" style="margin-left: -30px; cursor: pointer;"></i>
                  </div>
                </div>
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-3 col-form-label">Confirm Password :</label>
                  <div class="col-sm-8">
                    <input class="form-control ng-pristine ng-valid ng-empty ng-touched" type="password" name="confirmpass"   id="confirmpass">
                  </div>
                  <div class="col-sm-1">
                    <i class="mdi mdi-eye" id="togglePassword3" style="margin-left: -30px; cursor: pointer;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-success" id="SavePassNaJa">Save</button>
              <a type="submit" class="btn btn-secondary" id="wow">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>