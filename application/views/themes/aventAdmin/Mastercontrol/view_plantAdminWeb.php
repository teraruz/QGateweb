<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Plant Admin Web</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addplantweb><i class="mdi mdi-database-plus"></i>Add Plant Web</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Phase</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Name</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tablePlantAdminWeb as $plantadminweb) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $plantadminweb["mpa_phase_plant"] . "</td>";
                  echo "<td>" . $plantadminweb["mpa_name"] . "</td>";
                  if ($plantadminweb["mpa_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusPlantweb$i checked onclick='statusPlantAdminWeb(" . $plantadminweb["mpa_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusPlantweb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusPlantweb$i onclick='statusPlantAdminWeb(" . $plantadminweb["mpa_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusPlantweb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editplantweb\"  onclick='getDataPlantAdminWeb(" . $plantadminweb["mpa_id"] . ")'><i
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
          <div class="modal fade" id="addplantweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Plant Admin Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Phase :</label>
                    <input class="form-control" type="number" id="addplantwebphase" name="addplantwebphase"  placeholder="Enter New Phase">
                  </div>

                  <div class="form-group">
                    <label for="password">Name :</label>
                    <input class="form-control" type="text" id="addplantwebname" name="addplantwebname"  placeholder="Enter New Name">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddPlantAdminWeb">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Plant Admin Web ------------------------------------------------->
          <div class="modal fade" id="editplantweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Plant Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">

                <div class="form-group">
                    <label for="empcode">Phase :</label>
                    <input class="form-control" type="text" id="IDeditplantweb" name="IDeditplantweb" hidden>
                    <input class="form-control" type="number" id="editplantwebphase" name="editplantwebphase"  placeholder="Enter New Phase">
                  </div>

                  <div class="form-group">
                    <label for="password">Name :</label>
                    <input class="form-control" type="text" id="editplantwebname" name="editplantwebname"  placeholder="Enter New Name">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditPlantAdminWeb">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>