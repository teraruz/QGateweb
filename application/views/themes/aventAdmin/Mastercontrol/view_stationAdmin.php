<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Station Admin</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addzone><i class="mdi mdi-database-plus"></i>Add Station</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Station</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableZone as $zone) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $zone["mza_name"] . "</td>";
                  echo "<td>" . $zone["mfcm_line_code"] . "</td>";
                  if ($zone["mza_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusZone(" . $zone["mza_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusZone(" . $zone["mza_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editzone\"  onclick='getDataZone(" . $zone["mza_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add Zone ------------------------------------------------>
          <div class="modal fade" id="addzone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Zone</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Zone Name :</label>
                    <input class="form-control" type="text" id="addnamezone" name="addnamezone"  placeholder="Enter New Zone Name">
                  </div>
<!-- 
                  <div class="card-body col-md-12 row mb-3">
                      <label class="col-sm-6 col-form-label">Line :</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="dropdownzone" name="dropdownzone">
                          <?php
                          foreach ($getzone as $zone) {
                          ?>
                          <option id="addlinezone" name="addlinezone" value="<?php echo $zone["mfcm_id"] ?>"><?php echo $zone["mfcm_line_code"]; ?></option>
                          <?php  } ?>
                        </select>
                      </div>
                    </div> -->

                    <div class="form-group">
                    <label for="username">Line :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addlinezone" name="addlinezone">
                        <option selected>Select Zone</option>
                        <?php
                        foreach ($getzone as $zone) {
                        ?>                     
                          <option  value="<?php echo $zone["mfcm_id"]; ?>"><?php echo $zone["mfcm_line_code"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddZone">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Zone ------------------------------------------------->
          <div class="modal fade" id="editzone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Work Shift</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                <div class="form-group">
                    <label for="empcode">Zone Name :</label>
                    <input class="form-control" type="text" id="IDeditzone" name="IDeditzone">
                    <input class="form-control" type="text" id="editnamezone" name="editnamezone">
                  </div>

                  <div class="form-group">
                    <label for="username">Line :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editlinezone" name="editlinezone">
                        <option selected>Select Zone</option>
                        <?php
                        foreach ($getzone as $zone) {
                        ?>                     
                          <option  value="<?php echo $zone["mfcm_id"]; ?>"><?php echo $zone["mfcm_line_code"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditZone">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>