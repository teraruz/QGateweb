<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">FA Code</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addfacode><i class="mdi mdi-database-plus"></i>Add FA Code</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Line</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Name</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableFACode as $facode) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $facode["mfcm_line_code"] . "</td>";
                  echo "<td>" . $facode["mfcm_name_code"] . "</td>";
                  if ($facode["mfcm_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusFACode$i checked onclick='statusFACodeMaster(" . $facode["mfcm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusFACode$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusFACode$i onclick='statusFACodeMaster(" . $facode["mfcm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusFACode$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editfacode\"  onclick='getDataFACode(" . $facode["mfcm_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------------------------------- add FA Code------------------------------------------------>
          <div class="modal fade" id="addfacode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add FA Code</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="empcode">Line :</label>
                    <input class="form-control" type="text" id="addfaline" name="addfaline" required="" placeholder="Enter New Line">
                  </div>

                  <div class="form-group"
                    <label for="password">Name :</label>
                    <input class="form-control" type="text" id="addfaname" name="addfaname"  placeholder="Enter New Name">
                  </div>
                 
                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddFaCode">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------- Edit FA Code----------------------------------------------->
          <div class="modal fade" id="editfacode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit FA Code</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="NameMenuWeb">Line :</label>
                    <input class="form-control" type="text" id="IDeditfacode" name="IDeditfacode" hidden>
                    <input class="form-control" type="text" id="editfaline" name="editfaline" >
                  
                  </div>

                  <div class="form-group"
                    <label for="NameSubMenuWeb">Name :</label>
                    <input class="form-control" type="text" id="editfaname" name="editfaname">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditFaCode">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>