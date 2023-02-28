<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">DMC Data</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adddmc><i class="mdi mdi-database-plus"></i>Add DMC</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46);  text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46);  text-align: center;">DMC Name</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46);  text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46);  text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableDMC as $dmc) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $dmc["mdd_name"] . "</td>";
                  if ($dmc["mdd_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusDMC$i checked onclick='statusDMC(" . $dmc["mdd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusDMC$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusDMC$i onclick='statusDMC(" . $dmc["mdd_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusDMC$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editdmc\"  onclick='getDataDMC(" . $dmc["mdd_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-- add DMC Data-->
          <div class="modal fade" id="adddmc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add DMC</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="empcode">DMC Name :</label>
                    <input class="form-control" type="text" id="adddmcname" name="adddmcname" required="" placeholder="Enter New DMC">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddDmc">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit DMC Data-->
          <div class="modal fade" id="editdmc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit DMC</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="NameMenuWeb">DMC Name :</label>
                    <input class="form-control" type="text" id="editdmcname" name="editdmcname">
                    <input class="form-control" type="text" id="IDeditdmcname" name="IDeditdmcname" hidden>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditDmc">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>