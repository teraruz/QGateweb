<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Group Permission Web</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addpermissionweb><i class="fas fa-user-plus fa-sm"></i> Add Permission</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Permission Name</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Details</th>
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
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\"   id=\"detailpermissiongroup\" onclick='detailpermissiongroup(" . $value["spg_id"] . ")'><i
                                     class=\"mdi mdi-information-outline\"></i> info</button>                              
                                    </div>
                                </td>";

                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" id=\"infotable\" data-target=\"#editpermissionweb\"  onclick='getDataEditPermissionWeb(" . $value["spg_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                }
                ?>
              </tbody>
            </table>

          </div>
          <!------------------------------------------------   EditPermissionWeb Modal   ------------------------------------------------>

          <div class="modal fade" id="editpermissionweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Permission Group Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Permission Name :</label>
                    <input class="form-control" type="text" id="editPermissionwebname" name="editPermissionwebname">
                    <input class="form-control" type="text" id="idPername" name="idPername" hidden>
                  </div>

                  <div>
                    <h4 for="password" class="text-center">Update Permission</h4>
                    <div class="card-body col-md-12 row mb-3">
                      <label class="col-sm-6 col-form-label"> Menu :</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="dropdownmenuper" name="dropdownmenuper">
                          <?php
                          foreach ($getmenu as $value) {
                          ?>
                            <option value="<?php echo $value["sm_name_menu"] ?>"><?php echo $value["sm_name_menu"]; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-body col-md-12 row mb-3">
                      <label class="col-sm-6 col-form-label"> Submenu :</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="dropdowneditsubmenuper" name="dropdowneditsubmenuper">
                        </select>
                      </div>
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

          <!---------------------------------------------------- addPermissionWeb Modal ---------------------------------------------------------------->

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
                                <input type="checkbox" name="checkboxsubmenu" id="checkboxsubmenu" value="<?php echo $submenu["ssm_id"]; ?>" <?php echo $submenu["ssm_id"]; ?>>
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

          <!-------------------------------------------------- Table info ---------------------------------------------------------------------------- -->
          <div class="card-body" id="bodyshow" style="display: none">
            <div class="table-responsive">
              <table class="table table-bordered" id="Tabledetail" width="100%" cellspacing="0">
                <h3 class="col-12" style="color:black">Information Detail</h3>
                <hr class="new4">
                <!-- style="display: none"-->
                <!-- <div class="card-header py" style="width:100%; text-align:right">
                            <a hidden href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle=modal data-target=#addpermenu id="btnaddpermenu"><i class="fas fa-user-plus fa-sm"></i> Register </a>
                        </div> -->
                <thead>
                  <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Menu</th>
                    <th style="text-align: center;">Submenu</th>
                    <th style="text-align: center;">Status</th>
                  </tr>
                </thead>
                <tbody id="tbsubmenu">
                  <?php
                  $j = 0;
                  foreach ($tabledetail as $detail) {
                    $j++;
                    echo "<tr>";
                    echo "<td>" . $j . "</td>";
                    echo "<td>" . $detail["sm_name_menu"] . "</td>";
                    echo "<td>" . $detail["ssm_name_submenu"] . "</td>";
                    if ($detail["spd_status"] == "1") {
                      echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetailinfo$j  id=statusdetailinfo$j checked onclick='statusPermissionDetail(" . $detail["spd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusdetailinfo$j ></label>
                                            </div>
                                    </td>";
                    } else {
                      echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetailinfo$j  id=statusdetailinfo$j onclick='statusPermissionDetail(" . $detail["spd_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusdetailinfo$j></label>
                                        </div>
                                    </td>";
                    }
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>