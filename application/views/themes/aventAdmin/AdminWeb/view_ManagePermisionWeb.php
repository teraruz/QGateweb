<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Permission Group Web</h1>
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
                  <th style="text-align: center;">Action</th>
                  <th style="text-align: center;">ActionDemo</th>
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
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=status$i checked onclick='statusPermission(" . $value["spg_id"] . ")'>
                                                <label class=\"custom-control-label\" for=status$i></label>
                                            </div>                                      
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=status$i onclick='statusPermission(" . $value["spg_id"] . ")'>
                                            <label class=\"custom-control-label\" for=status$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editpermissionweb\"  onclick='getDataEditPermissionWeb(" . $value["spg_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  
                  echo "<td>
                                  <div class=\"text-center\" >
                                    <input type=\"checkbox\" checked data-toggle=\"toggle\" data-size=\"large\" data-onstyle=\"danger\"> 
                                  </div>
                                </td>";       
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
          <!-- EditPermissionWeb Modal-->
          <div class="modal fade" id="editpermissionweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Edit Permission Group Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Permission Name :</label>
                    <input class="form-control" type="text" id="editPermissionwebname" required="" placeholder="Enter New Permission" disabled>
                  </div>
                  <hr class="new4"><br>
                  <div>
                    <label for="textpermission"> Permission </label><br>
                    <label for="empcode"> Menu :</label>
                    <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="addplant" aria-label="Default select example" placeholder="Enter your plant">
                      <!-- <option>Please select plant</option> -->
                      <?php
                      foreach ($getmenu as $menu) {
                      ?>
                        <option> <?php echo $menu["sm_name_menu"]; ?> </option>
                      <?php } ?>
                    </select>
                  </div><br>

                  <div>
                    <label for="empcode"> Submenu :</label>
                    <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="addplant" aria-label="Default select example" placeholder="Enter your plant">
                      <!-- <option>Please select plant</option> -->
                      <?php
                      foreach ($getsubmenu as $submenu) {
                      ?>

                        <!-- <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                      <?php } ?> -->
                    </select>
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
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add Permission Group Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Permission Name :</label>
                    <input class="form-control" type="text" id="addPermissionwebname" name="addPermissionwebname" required="" placeholder="Enter New Permission">
                  </div> <br>
                  <hr class="new4">

                  <div class="form-group">
                    <h4 for="password" class="text-center">Permission</h4>
                    <div>
                      <?php
                      foreach ($getmenu as $menu) {
                      ?>
                      <label><?php echo $menu["sm_name_menu"]; ?></label>
                      <?php
                      foreach ($getsubmenu as $submenu) {
                      ?>
                      <?php 
                      if ($menu["sm_id"] == $submenu["sm_id"]) {
                      ?>
                        <label class="container">
                          <input type="checkbox" name="checkboxsubmenu"  id="checkboxsubmenu" value = "<?php echo $submenu["ssm_id"]; ?>" <?php echo $submenu["ssm_id"]; ?>>
                          <span class="checkmark"></span>
                          <?php echo $submenu["ssm_name_submenu"]; ?>
                        </label>
                      <?php } ?>
                      <?php } ?>
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

        </div>
      </div>
    </div>
  </div>