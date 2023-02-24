<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">DMC Type Detail</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#adddmctypedetail><i class="mdi mdi-database-plus"></i>Add DMC Type Detail</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
          <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">DMC Type</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">DMC Data</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Digit Start</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Digit End</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">No. Substring</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style=" border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableDmcTypeDetail as $dmcdetail) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $dmcdetail["mdt_name"] . "</td>";
                  echo "<td>" . $dmcdetail["mdd_name"] . "</td>";
                  echo "<td>" . $dmcdetail["mdtd_start"] . "</td>";
                  echo "<td>" . $dmcdetail["mdtd_end"] . "</td>";
                  echo "<td>" . $dmcdetail["mdtd_num_substring"] . "</td>";
                  if ($dmcdetail["mdtd_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusDMCDetail$i checked onclick='statusDMCTypeDetail(" . $dmcdetail["mdtd_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusDMCDetail$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusDMCDetail$i onclick='statusDMCTypeDetail(" . $dmcdetail["mdtd_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusDMCDetail$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editDMCTypeDetail\"  onclick='getDataEditDMCTypeDetail(" . $dmcdetail["mdtd_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!---------------------------- add dmc type detail ------------------------------------------------>
          <div class="modal fade" id="adddmctypedetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-database-plus"></i> Add DMC Type Detail</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">

                  <div class="form-group">
                    <label for="username">DMC Type :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="adddmctypeofdetail" name="adddmctypeofdetail">
                        <option selected>Select Type</option>
                        <?php
                        foreach ($DMCType as $type) {
                        ?>
                          <option value="<?php echo $type["mdt_id"]; ?>"><?php echo $type["mdt_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username">DMC Data :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="adddmcdataofdetail" name="adddmcdataofdetail">
                        <option selected>Select Data</option>
                        <?php
                        foreach ($DMCData as $data) {
                        ?>
                          <option value="<?php echo $data["mdd_id"]; ?>"><?php echo $data["mdd_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Digit Start :</label>
                    <input class="form-control" type="number" id="addstartofdetail" name="addstartofdetail">
                  </div>

                  <div class="form-group">
                    <label for="password">Digit End :</label>
                    <input class="form-control" type="number" id="addendofdetail" name="addendofdetail">
                  </div>

                  <div class="form-group">
                    <label for="password">Number Substring :</label>
                    <input class="form-control" type="number" id="addsubstringdetail" name="addsubstringdetail">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveDMCTypeDetail">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!------------------------------------------------- Edit dmc type detail ------------------------------------------------->
          <div class="modal fade" id="editDMCTypeDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit DMC Type Detail</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">


                  <div class="form-group">
                    <label for="username">DMC Type :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editdmctypeofdetail" name="editdmctypeofdetail">
                        <option selected>Select Type</option>
                        <?php
                        foreach ($DMCType as $edittype) {
                        ?>
                          <option value="<?php echo $edittype["mdt_id"]; ?>"><?php echo $edittype["mdt_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="username">DMC Data :</label>
                    <div>
                      <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editdatadmctypedetail" name="editdatadmctypedetail">
                        <option selected>Select Data</option>
                        <?php
                        foreach ($DMCData as $editdata) {
                        ?>
                          <option value="<?php echo $editdata["mdd_id"]; ?>"><?php echo $editdata["mdd_name"]; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Digit Start :</label>
                    <input class="form-control" type="number" id="IDeditDMCTypeDetail" name="IDeditDMCTypeDetail" hidden>
                    <input class="form-control" type="number" id="editstartofdetail" name="editstartofdetail">
                  </div>

                  <div class="form-group">
                    <label for="password">Digit End :</label>
                    <input class="form-control" type="number" id="editendofdetail" name="editendofdetail">
                  </div>

                  <div class="form-group">
                    <label for="password">Number Substring :</label>
                    <input class="form-control" type="number" id="editsubstringdetail" name="editsubstringdetail">
                  </div>


                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditDMCTypeDetail">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>