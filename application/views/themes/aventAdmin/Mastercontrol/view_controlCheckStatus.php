<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Check Status</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addstatus><i class="mdi mdi-database-plus"></i>Add Status</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="CheckStatusTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Status Name</th>
                  <th style="text-align: center;">status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableCheckStatus as $status) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $status["mcs_name"] . "</td>";
                  if ($status["mcs_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusCheckStatus(" . $status["mcs_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusCheckStatus(" . $status["mcs_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editstatus\"  onclick='getDataCheckStatus(" . $status["mcs_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-- addPermissionWeb Modal-->
          <div class="modal fade" id="addstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Add Status</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="statusname">Status Name :</label>
                    <input class="form-control" type="text" id="addstatusname" name="addstatusname" required="" placeholder="Enter New Status">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddStatus">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- EditPermissionWeb Modal-->
          <div class="modal fade" id="editstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Status</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="editstatusname">Status Name :</label>
                    <input class="form-control" type="text" id="editStatusName" name="editStatusName" >
                    <input class="form-control" type="text" id="IDeditStatusName" name="IDeditStatusName" hidden>
                  </div>

    

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditStatus">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>