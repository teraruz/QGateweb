<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Config Detail</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adddetails><i class="mdi mdi-database-plus"></i>Add Details</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Zone</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Station</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Type</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Inspection</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Time</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Mac Address</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Select Part</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status Config</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tabelDetails as $details) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $details["mpa_name"] . "</td>";
                  echo "<td>" . $details["mza_name"] . "</td>";
                  echo "<td>" . $details["msa_station"] . "</td>";
                  echo "<td>" . $details["mct_name"] . "</td>";
                  echo "<td>" . $details["mcs_name"] . "</td>";
                  echo "<td>" . $details["mit_name"] . "</td>";
                  echo "<td>" . $details["mcd_inspection_time"] . "</td>";
                  echo "<td>" . $details["mcd_mac_address"] . "</td>";
                  echo "<td>" . $details["mcd_select_part"] . "</td>";
                  if ($details["mcd_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusConfigDetails(" . $details["mcd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusConfigDetails(" . $details["mcd_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editdetails\"  onclick='getDataConfigDetails(" . $details["mcd_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-----------------------------  addconfigdetails Modal ------------------------------->
          <div class="modal fade" id="adddetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Config Details</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">

                  <div class="form-group"
                    <label for="username">Plant :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addplantconfig" name="addplantconfig">
                        <option selected>Select Plant</option>
                        <?php
                        foreach ($getplantapp as $plant) {
                        ?>
                          <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Zone :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addzoneconfig" name="addzoneconfig">
                        <option selected>Select Zone</option>
                        <?php
                        foreach ($getzoneapp as $zone) {
                        ?>
                          <option value="<?php echo $zone["mza_id"]; ?>"><?php echo $zone["mza_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Station :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addstationconfig" name="addstationconfig">
                        <option selected>Select Station</option>
                        <?php
                        foreach ($getstationapp as $station) {
                        ?>
                          <option value="<?php echo $station["msa_id"]; ?>"><?php echo $station["msa_station"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Type :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addtypeconfig" name="addtypeconfig">
                        <option selected>Select Type</option>
                        <?php
                        foreach ($gettypeapp as $type) {
                        ?>
                          <option value="<?php echo $type["mct_id"]; ?>"><?php echo $type["mct_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Status :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addstatusconfig" name="addstatusconfig">
                        <option selected>Select Status</option>
                        <?php
                        foreach ($getstatusapp as $status) {
                        ?>
                          <option value="<?php echo $status["mcs_id"]; ?>"><?php echo $status["mcs_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Inspection :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="addinspectionconfig" name="addinspectionconfig">
                        <option selected>Select Inspection</option>
                        <?php
                        foreach ($getinspectionapp as $inspection) {
                        ?>
                          <option value="<?php echo $inspection["mit_id"]; ?>"><?php echo $inspection["mit_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="empcode">Time :</label>
                    <input class="form-control" type="number" id="addTimeconfig" name="addTimeconfig">
                  </div>

                  <div class="form-group"
                    <label for="empcode">Mac Address :</label>
                    <input class="form-control" type="text" id="addMacaddressConfig" name="addMacaddressConfig">
                  </div>

                  <div class="form-group"
                    <label for="empcode">Select Part :</label>
                    <input class="form-control" type="text" id="addSelectpart" name="addSelectpart">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddConfigDetails">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!---------------------- Editconfigdetails Modal ---------------------->

          <div class="modal fade" id="editdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Config Details</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="username">Plant :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editplantconfig" name="editplantconfig">
                        <option selected>Select Plant</option>
                        <?php
                        foreach ($getplantapp as $plant) {
                        ?>
                          <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Zone :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editzoneconfig" name="editzoneconfig">
                        <option selected>Select Zone</option>
                        <?php
                        foreach ($getzoneapp as $zone) {
                        ?>
                          <option value="<?php echo $zone["mza_id"]; ?>"><?php echo $zone["mza_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Station :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editstationconfig" name="editstationconfig">
                        <option selected>Select Station</option>
                        <?php
                        foreach ($getstationapp as $station) {
                        ?>
                          <option value="<?php echo $station["msa_id"]; ?>"><?php echo $station["msa_station"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Type :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="edittypeconfig" name="edittypeconfig">
                        <option selected>Select Type</option>
                        <?php
                        foreach ($gettypeapp as $type) {
                        ?>
                          <option value="<?php echo $type["mct_id"]; ?>"><?php echo $type["mct_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Status :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editstatusconfig" name="editstatusconfig">
                        <option selected>Select Status</option>
                        <?php
                        foreach ($getstatusapp as $status) {
                        ?>
                          <option value="<?php echo $status["mcs_id"]; ?>"><?php echo $status["mcs_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group"
                    <label for="username">Inspection :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editinspectionconfig" name="editinspectionconfig">
                        <option selected>Select Inspection</option>
                        <?php
                        foreach ($getinspectionapp as $inspection) {
                        ?>
                          <option value="<?php echo $inspection["mit_id"]; ?>"><?php echo $inspection["mit_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group"
                    <label for="empcode">Time :</label>
                    <input class="form-control" type="text" id="IDeditconfig" name="IDeditconfig" hidden>
                    <input class="form-control" type="number" id="edittimeconfig" name="edittimeconfig" placeholder="-">
                  </div>

                  <div class="form-group"
                    <label for="empcode">Mac Address :</label>
                    <input class="form-control" type="text" id="editmacaddressconfig" name="editmacaddressconfig" placeholder="-">
                  </div>

                  <div class="form-group"
                    <label for="empcode">Select Part :</label>
                    <input class="form-control" type="text" id="editselectpartconfig" name="editselectpartconfig" placeholder="-">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditConfigDetails">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>