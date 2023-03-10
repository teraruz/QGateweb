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
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Zone</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part Number</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part Name</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableSelectPart as $selectp) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $selectp["mpa_phase_plant"] . "</td>";
                  echo "<td>" . $selectp["mza_name"] . "</td>";
                  echo "<td>" . $selectp["msp_part_no"] . "</td>";
                  echo "<td>" . $selectp["msp_part_name"] . "</td>";
                  if ($selectp["msp_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusSelectPart$i checked onclick='statusSelectPart(" . $selectp["msp_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusSelectPart$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusSelectPart$i onclick='statusSelectPart(" . $selectp["msp_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusSelectPart$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editselectpart\"  onclick='getDataSelectPart(" . $selectp["msp_id"] . ")'><i
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
                    <span aria-hidden="true">??</span>
                  </button>
                </div>
                <form class="card-body" action="#">

                  <div class="form-group"
                    <label for="empcode">Config Details ID:</label>
                    <input class="form-control" type="number" id="addselectConfig" name="addselectConfig"  placeholder="Enter New Config">
                  </div>

                  <div class="form-group"
                    <label for="password">Part Number :</label>
                    <input class="form-control" type="text" id="addselectpno" name="addselectpno" placeholder="Enter New Part Number">
                  </div>

                  <div class="form-group"
                    <label for="password">Part Name :</label>
                    <input class="form-control" type="text" id="addselectpname" name="addselectpname" placeholder="Enter New Part Name"  >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddSelectPart">Save</a>
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
                    <span aria-hidden="true">??</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                 <div class="form-group"
                    <label for="empcode">Config Details ID:</label>
                    <input class="form-control" type="text" id="IDeditselectp" name="IDeditselectp"  hidden>
                    <input class="form-control" type="text" id="editselectpCon" name="editselectpCon"  >
                  </div>

                  <div class="form-group"
                    <label for="password">Part Number :</label>
                    <input class="form-control" type="text" id="editselectpno" name="editselectpno" >
                  </div>

                  <div class="form-group"
                    <label for="password">Part Name :</label>
                    <input class="form-control" type="text" id="editselectpname" name="editselectpname" >
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditSelectPart">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>