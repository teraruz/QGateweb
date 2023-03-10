<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Defect Group</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addmenuweb><i class="mdi mdi-database-plus"></i>Add Work Shift</a> -->
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Zone</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Station</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($getdefectgroup as $defect) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $defect["mpa_phase_plant"] . "</td>";
                  echo "<td>" . $defect["mza_name"] . "</td>";
                  echo "<td>" . $defect["msa_station"] . "</td>";
                  if ($defect["mcd_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusDefectGroup$i checked onclick='statusDefectGroup(" . $defect["mcd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusDefectGroup$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusDefectGroup$i onclick='statusDefectGroup(" . $defect["mcd_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusDefectGroup$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editdefect\"  onclick='getDataEditDefectGroup(" . $defect["mcd_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>
          
          <!------------------------------------------------- Edit Defect Group  ------------------------------------------------->
          <div class="modal fade" id="editdefect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Defect Group</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="empcode">Plant : </label>
                    <input class="form-control" type="text" id="IDeditdefectgroup" name="IDeditdefectgroup" hidden>
                    <input class="form-control" type="text" id="IDeditplantdefectgroup" name="IDeditplantdefectgroup" hidden>
                    <input class="form-control" type="text" id="editplantdefectgroup" name="editplantdefectgroup" disabled>
                  </div>

                  <div class="form-group"
                    <label for="password">Zone : </label>
                    <input class="form-control" type="text" id="IDeditzonedefectgroup" name="IDeditzonedefectgroup" hidden>
                    <input class="form-control" type="text" id="editzonedefectgroup" name="editzonedefectgroup" disabled>
                  </div>

                  <div class="form-group"
                    <label for="password">Station : </label>
                    <input class="form-control" type="text" id="IDeditstationdefectgroup" name="IDeditstationdefectgroup" hidden>
                    <input class="form-control" type="text" id="editstationdefectgroup" name="editstationdefectgroup" disabled>
                  </div>

                  <div class="form-group">
                    <h4 for="defect" class="text-center">Defect Code</h4>
                    <label class="container" id="checkBoxDefect">
                        
                        </label>
                  
                  </div>


                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditdefectGroup">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>