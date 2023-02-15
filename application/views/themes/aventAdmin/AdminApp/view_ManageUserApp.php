<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage User App</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adduserapp><i class="fas fa-user-plus fa-sm"></i> Add User</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Employee Code</th>
                  <th style="text-align: center;">Name</th>
                  <th style="text-align: center;">Permission</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableUserApp as $UserApp) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $UserApp["ss_id"] . "</td>";
                  echo "<td>" . $UserApp["ss_emp_code"] . "</td>";
                  echo "<td>" . $UserApp["ss_emp_name"] . "</td>";
                  echo "<td>" . $UserApp["spg_name"] . "</td>";

                  if ($UserApp["ss_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusManageUserApp$i checked onclick='statusManageUserApp(" . $UserApp["ss_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusManageUserApp$i></label>
                                            </div>
                                       
                                    </td>"; //เปิด Status
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusManageUserApp$i onclick='statusManageUserApp(" . $UserApp["ss_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusManageUserApp$i></label>
                                        </div>
                                    </td>"; //ปิด Status
                  }

                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#edituserapp\"  onclick='getDataManageUserApp(" . $UserApp["ss_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";


                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
          <!---------------------------- Edituserapp Modal------------------------------------>
          <div class="modal fade" id="edituserapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit User App</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <div class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Employee Code :</label>
                    <input class="form-control" type="text" id="editempcodeuserapp" name="editempcodeuserapp" disabled>
                    <input class="form-control" type="text" id="IDedituserapp" name="IDedituserapp" hidden>
                  </div>

                  <div class="form-group">
                    <label for="fristname">Name :</label>
                    <input class="form-control" type="text" id="editnameapp" name="editnameapp">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editgrouppermissionuserapp" name="editgrouppermissionuserapp">
                        <?php
                        foreach ($groupper as $groupPer) {
                        ?>
                          <option value="<?php echo $groupPer["spg_id"]; ?>"><?php echo $groupPer["spg_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pathpic">Path Picture :</label>
                    <input class="form-control" type="text" id="editpathpicapp" name="editpathpicapp">
                  </div>

                </div>


                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditUserApp">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------- addUserapp Modal ------------------------------------------->
          <div class="modal fade" id="adduserapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" name="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add User App</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Employee Code :</label>
                    <input class="form-control" type="text" id="addempcodeapp" required="" name="addempcodeapp" placeholder="Enter employee code">
                  </div>

                  <div class="form-group">
                    <label for="fristname">Name :</label>
                    <input class="form-control" type="text" id="addnameapp" required="" name="addnameapp" placeholder="Enter name">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addgrouppermissionapp" name="addgrouppermissionapp">
                        <option selected>Select group permission</option>
                        <?php
                        foreach ($groupperapp as $groupperapp) {
                        ?>                     
                          <option value="<?php echo $groupperapp["spg_id"]; ?>"><?php echo $groupperapp["spg_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="pathpic">Path Picture :</label>
                    <input class="form-control" type="text" id="addpathpicapp" name="addpathpicapp" required="" placeholder="Enter picture path">
                  </div>
                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddUserApp">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>