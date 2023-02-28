<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Defect</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adddefect><i class="mdi mdi-database-plus"></i>Add Defect</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Defect Code</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Defect Name (TH)</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Defect Name (EN)</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableDefect as $defect) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $defect["md_defect_code"] . "</td>";
                  echo "<td>" . $defect["md_defect_th_name"] . "</td>";
                  echo "<td>" . $defect["md_defect_en_name"] . "</td>";
                  if ($defect["md_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusDefect$i checked onclick='statusDefect(" . $defect["md_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusDefect$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusDefect$i onclick='statusDefect(" . $defect["md_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusDefect$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editdefectmodal\"  onclick='getDataDefect(" . $defect["md_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-- add Defect-->
          <div class="modal fade" id="adddefect" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Defect</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="empcode">Defect Code :</label>
                    <input class="form-control" type="text" id="adddefectcode" name="adddefectcode"  placeholder="Enter New  Defect Code">
                  </div>

                  <div class="form-group"
                    <label for="password">Defect Name TH :</label>
                    <input class="form-control" type="text" id="adddefectnameth" name="adddefectnameth"  placeholder="Enter New Defect name TH">
                  </div>

                  <div class="form-group"
                    <label for="password">Defect Name EN :</label>
                    <input class="form-control" type="text" id="adddefectnameen" name="adddefectnameen"  placeholder="Enter New Defect name EN">
                  </div>


        

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddDefect">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit Defect-->
          <div class="modal fade" id="editdefectmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Defect</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                <div class="form-group"
                    <label for="empcode">Defect Code :</label>
                    <input class="form-control" type="text" id="IDeditdefect" name="IDeditdefect" required="" >
                    <input class="form-control" type="text" id="editdefectcode" name="editdefectcode" required="" placeholder="Enter New  Defect Code">
                  </div>

                  <div class="form-group"
                    <label for="password">Defect Name TH :</label>
                    <input class="form-control" type="text" id="editdefectnameth" name="editdefectnameth" required="" placeholder="Enter New Defect name TH">
                  </div>

                  <div class="form-group"
                    <label for="password">Defect Name EN :</label>
                    <input class="form-control" type="text" id="editdefectnameen" name="editdefectnameen" required="" placeholder="Enter New Defect name EN">
                  </div>


                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditDefect">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>