<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Inspection Type</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addinspection><i class="mdi mdi-database-plus"></i>Add Inspection</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="InspectionTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Inspection Name</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php
                $i = 0;
                foreach ($tableInspection as $inspection) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $inspection["mit_name"] . "</td>";
                  if ($inspection["mit_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusInspection$i checked onclick='statusInspection(" . $inspection["mit_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusInspection$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusInspection$i onclick='statusInspection(" . $inspection["mit_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusInspection$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editinspection\"  onclick='getDataInspection(" . $inspection["mit_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?> 
              </tbody>
            </table>

          </div>

          <!------------------------------- add Inspection Type ----------------------------------------------->
          <div class="modal fade" id="addinspection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add Inspection</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Inspection Name :</label>
                    <input class="form-control" type="text" id="addinspectiontype" name="addinspectiontype" placeholder="Enter New Inspection">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddInspection">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit Inspection Type --------------------------->
          <div class="modal fade" id="editinspection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Inspection</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="NameInspection">Inspection Name :</label>
                    <input class="form-control" type="text" id="editInspectionName" name="editInspectionName" >
                    <input class="form-control" type="text" id="IDeditInspectionName" name="IDeditInspectionName" hidden>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditInspection">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>