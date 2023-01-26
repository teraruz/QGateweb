<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Edit Profile</h1>
    </div>
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body" style="text-align: center;">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div class=""></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
              </div>
            </div>
            <h4 class="card-title">IMAGE</h4>
            <div style="text-align: center;">
              <img src="<?php echo base_url() ?>assets/images/faces/yeji.jpg" width="300" height="400" class="img-thumbnail" />
            </div>
            <div class="bg-gray-dark d-flex d-md-block flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <h4 class="mb-1"></h4><?php echo $empcode; ?></h4>
              <input type="hidden" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="empcode1" value="<?php echo $empcode; ?>" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Edit Your Details</h4>
            </div>
            <form class="card-body  text-center">
              <div>
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-4 col-form-label">First Name :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="firstname" value="<?php echo $fname; ?>" />
                  </div>
                </div>

                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-4 col-form-label">Last Name :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="lastname" value="<?php echo $lname; ?>" />
                  </div>
                </div>
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-4 col-form-label">Email :</label>
                  <div class="col-sm-8">
                    <input ng-model="email" type="text" class="form-control ng-pristine ng-valid ng-empty ng-touched" id="email" value="<?php echo $email; ?>" />
                  </div>
                </div>
                <div class="card-body col-md-10 row mb-3">
                  <label class="col-sm-4 col-form-label">Plant :</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="plant">
                      <?php
                      foreach ($getplant as $valuesPlant) {
                      ?>
                        <option><?php echo $valuesPlant["mpa_name"]; ?></option>
                      <?php  } ?>
                    </select>
                  </div>
                </div>
              </div>
            </form>
            <div class="text-right">
              <button type="submit" class="btn btn-success" id="btnEditProfile">Save</button>
              <a type="submit" class="btn btn-secondary" id="wow1">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
