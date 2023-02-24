<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Part Number</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addpartno><i class="mdi mdi-database-plus"></i>Add Part Number</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part Number</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">Customer Part Number</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">location</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">DMC Check</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style="  border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tablePartNo as $partno) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $partno["mpn_part_no"] . "</td>";
                  echo "<td>" . $partno["mpn_cus_part_no"] . "</td>"; 
                  echo "<td>" . $partno["mpn_location"] . "</td>";
                  echo "<td>" . $partno["mpn_dmc_check"] . "</td>";
                  if ($partno["mpn_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusPartNo(" . $partno["mpn_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusPartNo(" . $partno["mpn_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editpartno\"  onclick='getDataPartNo(" . $partno["mpn_id"] . ")'><i
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
          <div class="modal fade" id="addpartno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Part Number</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Part Number :</label>
                    <input class="form-control" type="text" id="addpartnumber" name="addpartnumber"  placeholder="Enter New Part Number">
                  </div>

                  <div class="form-group">
                    <label for="password">Customer Part Number :</label>
                    <input class="form-control" type="text" id="addcuspartno" name="addcuspartno"  placeholder="Enter New Customer Part Number" >
                  </div>

                  <div class="form-group">
                    <label for="password">location :</label>
                    <input class="form-control" type="text" id="addlocationpart" name="addlocationpart"  placeholder="Enter New location" >
                  </div>

                  <div class="form-group">
                    <label for="password">DMC Check :</label>
                    <input class="form-control" type="text" id="adddmccheckpart" name="adddmccheckpart"  placeholder="Enter New DMC Check" >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddPartNo">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Work Shift ------------------------------------------------->
          <div class="modal fade" id="editpartno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="empcode">Part Number :</label>
                    <input class="form-control" type="text" id="IDeditpartno" name="IDeditpartno"  placeholder="Enter New Part Number" hidden>
                    <input class="form-control" type="text" id="editpartnumber" name="editpartnumber"  placeholder="Enter New Part Number">
                  </div>

                  <div class="form-group">
                    <label for="password">Customer Part Number :</label>
                    <input class="form-control" type="text" id="editcuspartno" name="editcuspartno"  placeholder="Enter New Customer Part Number" >
                  </div>

                  <div class="form-group">
                    <label for="password">location :</label>
                    <input class="form-control" type="text" id="editlocationpart" name="editlocationpart"  placeholder="Enter New location" >
                  </div>

                  <div class="form-group">
                    <label for="password">DMC Check :</label>
                    <input class="form-control" type="text" id="editdmccheckpart" name="editdmccheckpart"  placeholder="Enter New DMC Check" >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditPartNo">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>