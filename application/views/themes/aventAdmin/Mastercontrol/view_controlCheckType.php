<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Check Type of Part</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addchecktype><i class="mdi mdi-database-plus"></i>Add Type</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part Type Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">status</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableChecktype as $Checktype) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $Checktype["mct_name"] . "</td>";
                  if ($Checktype["mct_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusCheckStatus(" . $Checktype["mct_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusCheckStatus(" . $Checktype["mct_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editchecktype\"  onclick='getDataCheckType(" . $Checktype["mct_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!------------------------ addCheckType Modal------------------------------------>
          <div class="modal fade" id="addchecktype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Type of Part</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Part Type Name :</label>
                    <input class="form-control" type="text" id="addparttypename" name="addparttypename" required="" placeholder="Enter New Type of Part">
                  </div>


                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddCheckType">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!----------------------------------- editCheckType Modal----------------------------------------->
          <div class="modal fade" id="editchecktype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Type Name</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="NameMenuWeb">Type Name :</label>
                    <input class="form-control" type="text" id="editparttypeName" name="editparttypeName" >
                    <input class="form-control" type="text" id="IDeditparttype" name="IDeditparttype" hidden>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditCheckType">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>