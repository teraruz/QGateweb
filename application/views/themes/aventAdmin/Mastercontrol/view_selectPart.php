<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Select Part</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addselectpart><i class="mdi mdi-database-plus"></i>Add Select Part</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Config Details</th>
                  <th style="text-align: center;">DMC Type Details</th>
                  <th style="text-align: center;">Part Number</th>
                  <th style="text-align: center;">Part Name</th>
                  <th style="text-align: center;">Inspection Time</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableSelectPart as $selectp) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $selectp["mcd_id"] . "</td>";
                  echo "<td>" . $selectp["mdtd_id"] . "</td>";
                  echo "<td>" . $selectp["msp_part_no"] . "</td>";
                  echo "<td>" . $selectp["msp_part_name"] . "</td>";
                  echo "<td>" . $selectp["msp_inspection_time"] . "</td>";
                  if ($selectp["msp_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusWorkShift(" . $selectp["msp_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusWorkShift(" . $selectp["msp_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editselectpart\"  onclick='getDataWorkShift(" . $selectp["msp_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add Select Part ------------------------------------------------>
          <div class="modal fade" id="addselectpart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Select Part</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Config Details :</label>
                    <input class="form-control" type="text" id="addselectpCon" name="addselectpCon"  placeholder="Enter New Config">
                  </div>

                  <div class="form-group">
                    <label for="empcode">DMC Type Details :</label>
                    <input class="form-control" type="text" id="addshift" name="addshift"  placeholder="Enter New DMC Type">
                  </div>

                  <div class="form-group">
                    <label for="password">Part Number :</label>
                    <input class="form-control" type="time" id="addstarttime" name="addstarttime"  step="2">
                  </div>

                  <div class="form-group">
                    <label for="password">Part Name :</label>
                    <input class="form-control" type="time" id="addendtime" name="addendtime"  step="2" >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddWorkShift">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Select Part ------------------------------------------------->
          <div class="modal fade" id="editselectpart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Select Part</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                <div class="form-group">
                    <label for="empcode">Shift :</label>
                    <input class="form-control" type="text" id="IDeditworkshift" name="IDeditworkshift" hidden>
                    <input class="form-control" type="text" id="editshift" name="editshift">
                  </div>

                  <div class="form-group">
                    <label for="password">Start Time :</label>
                    <input class="form-control" type="time" id="editstarttime" name="editstarttime"  step="2">
                  </div>

                  <div class="form-group">
                    <label for="password">End Time :</label>
                    <input class="form-control" type="time" id="editendtime" name="editendtime"  step="2" >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditWorkShift">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>