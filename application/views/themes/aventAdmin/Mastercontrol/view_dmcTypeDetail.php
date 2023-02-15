<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">DMC Type Detail</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addmenuweb><i class="mdi mdi-database-plus"></i>Add Work Shift</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Shift</th>
                  <th style="text-align: center;">Start Time</th>
                  <th style="text-align: center;">End Time</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableWorkShift as $workshift) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $workshift["mws_shift"] . "</td>";
                  echo "<td>" . $workshift["mws_time_start"] . "</td>";
                  echo "<td>" . $workshift["mws_time_end"] . "</td>";
                  if ($workshift["mws_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusWorkShift(" . $workshift["mws_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusWorkShift(" . $workshift["mws_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editMenuWeb\"  onclick='getDataWorkShift(" . $workshift["mws_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add Work Shift ------------------------------------------------>
          <div class="modal fade" id="addmenuweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Work Shift</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Shift :</label>
                    <input class="form-control" type="text" id="addshift" name="addshift"  placeholder="Enter New Shift">
                  </div>

                  <div class="form-group">
                    <label for="password">Start Time :</label>
                    <input class="form-control" type="time" id="addstarttime" name="addstarttime"  step="2">
                  </div>

                  <div class="form-group">
                    <label for="password">End Time :</label>
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

          <!------------------------------------------------- Edit Work Shift ------------------------------------------------->
          <div class="modal fade" id="editMenuWeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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