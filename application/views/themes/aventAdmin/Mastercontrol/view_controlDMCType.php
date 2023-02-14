<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">DMC Type</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adddmctype><i class="mdi mdi-database-plus"></i>Add DMC Type</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="DataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">DMC Type Name</th>
                  <th style="text-align: center;">Digit</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableDMCType as $dmctype) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $dmctype["mdt_name"] . "</td>";
                  echo "<td>" . $dmctype["mdt_digit"] . "</td>";
                  if ($dmctype["mdt_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusDmcType$i checked onclick='statusDMCType(" . $dmctype["mdt_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusDmcType$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusDmcType$i onclick='statusDMCType(" . $dmctype["mdt_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusDmcType$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editdmctype\"  onclick='getDataDMCType(" . $dmctype["mdt_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-- add DMC Type-->
          <div class="modal fade" id="adddmctype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add DMC Type</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">DMC Type Name :</label>
                    <input class="form-control" type="text" id="adddmctypename" name="adddmctypename" placeholder="Enter New DMC Type">
                  </div>

                  <div class="form-group">
                    <label for="password">Digit :</label>
                    <input class="form-control" type="text" id="adddmcdigit" name="adddmcdigit"  placeholder="Enter Digit of DMC">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddDmcType">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit DMC Type-->
          <div class="modal fade" id="editdmctype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit DMC Type</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="NameMenuWeb">Dmc Type Name :</label>
                    <input class="form-control" type="text" id="editdmctypename" name="editdmctypename" >
                    <input class="form-control" type="text" id="IDeditdmctype" name="IDeditdmctype" hidden >
                  </div>

                  <div class="form-group">
                    <label for="NameSubMenuWeb">Digit:</label>
                    <input class="form-control" type="text" id="editdmcdigit" name="editdmcdigit">
                
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditDmcType">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>