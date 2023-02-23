<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage User Web</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal
            data-target=#adduser><i class="fas fa-user-plus fa-sm"></i> Add User</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Employee Code</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">First Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Last Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Email</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Permission</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableUserWeb as $value) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $value["ss_id"] . "</td>";
                  echo "<td>" . $value["ss_emp_code"] . "</td>";
                  echo "<td>" . $value["ss_emp_fname"] . "</td>";
                  echo "<td>" . $value["ss_emp_lname"] . "</td>";
                  echo "<td>" . $value["ss_email"] . "</td>";
                  echo "<td>" . $value["spg_name"] . "</td>";
                  echo "<td>" . $value["mpa_name"] . "</td>";

                  if ($value["ss_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=status$i checked onclick='status(" . $value["ss_id"] . ")'>
                                                <label class=\"custom-control-label\" for=status$i></label>
                                            </div>
                                       
                                    </td>";//เปิด Permission
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=status$i onclick='status(" . $value["ss_id"] . ")'>
                                            <label class=\"custom-control-label\" for=status$i></label>
                                        </div>
                                    </td>";//ปิด Permission
                  }

                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#edituser\"  onclick='getDataEditUserWeb(" . $value["ss_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";


                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
          <!--------------------------------------- Edit Modal ---------------------------------------------------------------->
          <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit User</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Employee Code :</label>
                    <input class="form-control" type="text" id="editempcode" required="" disabled>
                  </div>

                  <div class="form-group">
                    <label for="fristname">First Name :</label>
                    <input class="form-control" type="text" id="editfirstname" required="">
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name :</label>
                    <input class="form-control" type="text" required="" id="editlastname" name="editlastname">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-control"
                        style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="editgrouppermissionuserweb" name="editgrouppermissionuserweb"
                        aria-label="Default select example" id="editgroup">
                        <option selected>Select Group Permission </option>
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
                    <input class="form-control" type="email" id="editemailaddress" name="editemailaddress" required="">
                  </div>

                  <div>
                    <label for="plant">Plant :</label>
                    <div>
                      <select class="form-control"
                        style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="editplant"
                        aria-label="Default select example" placeholder="Enter your plant">
                        <option selected>Select Plant </option>
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
                  <a class="btn btn-success" type="submit" id="btnSaveEdit">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!---------------------------- addUser Modal ---------------------------->
          <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel" name="exampleModalLabel"><i class="fas fa-user-plus fa-sm"></i> Add User Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Employee Code :</label>
                    <input class="form-control" type="text" id="addempcode" required="" name="addempcode"
                      placeholder="Enter employee code">
                  </div>

                  <div class="form-group">
                    <label for="fristname">First Name :</label>
                    <input class="form-control" type="text" id="addfirstname" required="" name="addfirstname"
                      placeholder="Enter first name">
                  </div>

                  <div class="form-group">
                    <label for="lastname">Last Name :</label>
                    <input class="form-control" type="text" required="" id="addlastname" name="addlastname"
                      placeholder="Enter last name">
                  </div>

                  <div class="form-group">
                    <label for="username">Group Permission :</label>
                    <div>
                      <select class="form-control"
                        style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;"
                        aria-label="Default select example" id="addgrouppermission">
                        <option>Select group permission</option>
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
                    <input class="form-control" type="email" id="addemail" name="addemail" required="" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password :</label>
                    <input class="form-control" type="password" id="addpassword" name="addpassword" required=""
                      placeholder="Enter password">
                  </div>

                  <div class="form-group">
                    <label for="password">Plant :</label>
                    <div>
                      <select class="form-control"
                        style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="addplant"
                        aria-label="Default select example" placeholder="Enter your plant">
                        <option>Select plant</option>
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