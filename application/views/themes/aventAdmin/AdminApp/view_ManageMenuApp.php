<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Menu App</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addmenuapp><i class="mdi mdi-library-plus"></i>Add Menu</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Menu Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableMenuApp as $menuapp) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $menuapp["sm_menu"] . "</td>";
                  if ($menuapp["sm_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusMenuApp(" . $menuapp["sm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusMenuApp(" . $menuapp["sm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editMenuApp\"  onclick='getDataEditMenuApp(" . $menuapp["sm_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-------------------------------------- addPermissionWeb Modal ---------------------------------------------------->
          <div class="modal fade" id="addmenuapp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Add Menu App</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group"
                    <label for="empcode">Menu Name :</label>
                    <input class="form-control" type="text" id="addmenuappname" name="addmenuappname" required="" placeholder="Enter New Menu">
                  </div>

                  <div class="form-group"
                    <label for="password">Method path :</label>
                    <input class="form-control" type="text" id="addmenupathapp" name="addmenupathapp" required="" placeholder="Enter path menu">
                  </div>


                  <div class="form-group"
                    <label for="password">Picture file name :</label>
                    <input class="form-control" type="text" id="addmenupicapp" name="addmenupicapp" required="" placeholder="Enter file name menu">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddMenuApp">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-------------------------------------------- EditPermissionWeb Modal --------------------------------------------->
          <div class="modal fade" id="editMenuApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Menu App</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">

                  <div class="form-group"
                    <label for="empcode">Menu Name :</label>
                    <input class="form-control" type="text" id="editmenuappid" name="editmenuappid" hidden>
                    <input class="form-control" type="text" id="editmenuappname" name="editmenuappname" required="" placeholder="Enter New Menu">
                  </div>

                  <div class="form-group"
                    <label for="password">Method path :</label>
                    <input class="form-control" type="text" id="editmenupathapp" name="editmenupathapp" required="" placeholder="Enter path menu">
                  </div>


                  <div class="form-group"
                    <label for="password">Picture file name :</label>
                    <input class="form-control" type="text" id="editmenupicapp" name="editmenupicapp" required="" placeholder="Enter file name menu">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditMenuApp">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>