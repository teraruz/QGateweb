<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Plant Admin App</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addplantapp><i class="mdi mdi-database-plus"></i>Add Plant App</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Phase</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tablePlantAdminApp as $plantadminapp) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $plantadminapp["mpa_phase_plant"] . "</td>";
                  echo "<td>" . $plantadminapp["mpa_name"] . "</td>";
                  if ($plantadminapp["mpa_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusPlantweb$i checked onclick='statusPlantAdminApp(" . $plantadminapp["mpa_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusPlantweb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusPlantweb$i onclick='statusPlantAdminApp(" . $plantadminapp["mpa_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusPlantweb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editplantapp\"  onclick='getDataPlantAdminApp(" . $plantadminapp["mpa_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add Plant Admin Web ------------------------------------------------>
          <div class="modal fade" id="addplantapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Plant App </h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Phase :</label>
                    <input class="form-control" type="number" id="addplantadminappphase" name="addplantadminappphase"  placeholder="Enter New Phase">
                  </div>

                  <div class="form-group">
                    <label for="password">Name :</label>
                    <input class="form-control" type="text" id="addplantadminappname" name="addplantadminappname"  placeholder="Enter New Name">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddPlantAdminApp">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Plant Admin Web ------------------------------------------------->
          <div class="modal fade" id="editplantapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Plant App</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">

                <div class="form-group">
                    <label for="empcode">Phase :</label>
                    <input class="form-control" type="text" id="IDeditplantapp" name="IDeditplantweb" hidden>
                    <input class="form-control" type="number" id="editplantappphase" name="editplantappphase"  >
                  </div>

                  <div class="form-group">
                    <label for="password">Name :</label>
                    <input class="form-control" type="text" id="editplantappname" name="editplantappname"  >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditPlantAdminApp">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>