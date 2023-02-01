<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Permission Web</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addpermissionweb><i class="fas fa-user-plus fa-sm"></i> Add Permission</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="ManageUserTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Permission Name</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Detail</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tablePermissionWeb as $value) {
                  //$i = $value["sa_id"];
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $value["spg_id"] . "</td>";
                  echo "<td>" . $value["spg_name"] . "</td>";
                  if ($value["spg_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=status$i checked onclick='status(" . $value["spg_id"] . ")'>
                                                <label class=\"custom-control-label\" for=status$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=status$i onclick='status(" . $value["spg_id"] . ")'>
                                            <label class=\"custom-control-label\" for=status$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#detailpermissionweb\"  onclick='getDeatailPermission(" . $value["spg_id"] . ")'><i
                                     class=\"mdi mdi-information\"></i> Detail</button>                              
                                    </div>
                                </td>";

                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editPermissionWeb\"  onclick='getDataEditPermissionWeb(" . $value["spg_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
          <!-- EditPermissionWeb Modal-->
          <div class="modal fade" id="editPermissionWeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Permission Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Permission Name :</label>
                    <input class="form-control" type="text" id="editempcode" required="" disabled>
                  </div>

                  <div class="form-group">
                    <label for="fristname">First Name :</label>
                    <input class="form-control" type="text" id="editfirstname" required="">
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name :</label>
                    <input class="form-control" type="text" required="" id="editlastname">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editgroup">

                        <?php
                        foreach ($groupper as $groupPer) {
                        ?>
                          <option value="<?php echo $groupPer["spg_id"]; ?>"><?php echo $groupPer["spg_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="emailaddress">Email :</label>
                    <input class="form-control" type="email" id="editemailaddress" required="">
                  </div>

                  <div>
                    <label for="plant">Plant :</label>
                    <div>
                      <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="editplant" aria-label="Default select example" placeholder="Enter your plant">
                        <?php
                        foreach ($getplant as $plant) {
                        ?>
                          <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditPermissionWeb">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- addPermissionWeb Modal-->
          <div class="modal fade" id="addpermissionweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add Permission Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Permission Name :</label>
                    <input class="form-control" type="text" id="addPermissionwebname" required="" placeholder="Enter New Permission">
                  </div>

                  <div class="form-group">
                    <label for="password">Permission :</label>
                    <div>
                      <?php
                      foreach ($getsubmenu as $submenu) {
                      ?>
                        <label class="container">
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                          <?php echo $submenu["ssm_name_submenu"]; ?>
                        </label>
                      <?php } ?>
                    </div>
                  </div>
                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddPermissionWeb">Save</a>
                </div>
              </div>
            </div>
          </div>
          <!-- DetailPermissionWeb Modal-->
          <div class="modal fade" id="detailpermissionweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Detail Permission Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Employee Code :</label>
                    <input class="form-control" type="text" id="addempcode" required="" placeholder="Enter your employee code">
                  </div>

                  <div class="form-group">
                    <label for="fristname">First Name :</label>
                    <input class="form-control" type="text" id="addfirstname" required="" placeholder="Enter your frist name">
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name :</label>
                    <input class="form-control" type="text" required="" id="addlastname" placeholder="Enter your last name">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addgrouppermission" placeholder="Enter your plant">
                        <!-- <option>Please select group permission</option> -->
                        <?php
                        foreach ($groupper as $groupPer) {
                        ?>
                          <option value="<?php echo $groupPer["spg_id"]; ?>"><?php echo $groupPer["spg_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="emailaddress">Email :</label>
                    <input class="form-control" type="email" id="addemail" required="" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password :</label>
                    <input class="form-control" type="password" id="addpassword" required="" placeholder="Enter your password">
                  </div>

                  <div class="form-group">
                    <label for="password">Plant :</label>
                    <div>
                      <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="addplant" aria-label="Default select example" placeholder="Enter your plant">
                        <!-- <option>Please select plant</option> -->
                        <?php
                        foreach ($getplant as $plant) {
                        ?>
                          <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAdd">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>