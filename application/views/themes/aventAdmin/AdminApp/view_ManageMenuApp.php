<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Menu App</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addmenuweb><i class="mdi mdi-library-plus"></i>Add Menu</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered " id="ManageMenuApp" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align: center;">NO.</th>
                  <th style="text-align: center;">Menu Name</th>
                  <th style="text-align: center;">status</th>
                  <th style="text-align: center;">Action</th>
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
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusManageMenuWeb(" . $menuapp["sm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusManageMenuWeb(" . $menuapp["sm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editMenuWeb\"  onclick='getDataManageMenuWeb(" . $menuapp["sm_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>

          </div>

          <!-- addPermissionWeb Modal-->
          <div class="modal fade" id="addmenuweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Add Menu Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="empcode">Menu Name :</label>
                    <input class="form-control" type="text" id="addmenuwebname" name="addmenuwebname" required="" placeholder="Enter New Menu">
                  </div>

                  <div class="form-group">
                    <label for="password">Submenu Name :</label>
                    <input class="form-control" type="text" id="addsubmenuwebname" name="addsubmenuwebname" required="" placeholder="Enter New Submenu">
                  </div>

                  <div class="form-group">
                    <label for="password">Method :</label>
                    <input class="form-control" type="text" id="addmenupath" name="addmenupath" required="" placeholder="Enter path of menu">
                  </div>


                  <div class="form-group">
                    <label for="password">icon name :</label>
                    <input class="form-control" type="text" id="addmenuicon" name="addmenuicon" required="" placeholder="Enter icon name of menu">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- EditPermissionWeb Modal-->
          <div class="modal fade" id="editMenuWeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Edit Menu Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="NameMenuWeb">Menu Name :</label>
                    <input class="form-control" type="text" id="editMenuName" name="editMenuName" >
                    <input class="form-control" type="text" id="IDeditMenuName" name="editMenuName" hidden>
                  </div>

                  <div class="form-group">
                    <label for="NameSubMenuWeb">Submenu Name :</label>
                    <input class="form-control" type="text" id="editSubMenuName" name="editMenuName">
                    <input class="form-control" type="text" id="IDeditSubMenuName" name="IDeditMenuName" hidden>
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>