<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Station Admin</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addstation><i class="mdi mdi-database-plus"></i>Add Station</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Station</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableStation as $station) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $station["msa_station"] . "</td>";
                  if ($station["msa_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusStation$i checked onclick='statusStation(" . $station["msa_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusStation$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusStation$i onclick='statusStation(" . $station["msa_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusStation$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editstation\"  onclick='getDataStation(" . $station["msa_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add Station ------------------------------------------------>
          <div class="modal fade" id="addstation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Station</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Station :</label>
                    <input class="form-control" type="number" id="addtablestation" name="addtablestation"  placeholder="Enter New Station">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddStation">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Station ------------------------------------------------->
          <div class="modal fade" id="editstation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Station</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                <div class="form-group">
                    <label for="empcode">Station :</label>
                    <input class="form-control" type="text" id="IDeditStation" name="IDeditStation" hidden>
                    <input class="form-control" type="number" id="editStation" name="editStation">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditStation">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>