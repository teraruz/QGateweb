<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <h1 class="col-12" style="color:black">Manage Menu Web</h1>
      <div class="card-table shadow col-12"><br>
        <div style="width: 98.7%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addMenuWeb><i class="mdi mdi-library-plus"></i>Add Menu</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table id="example" class="display table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Menu Name</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46);text-align: center;">Status</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Details</th>
                  <th style="border-bottom: 2px solid rgb(207 0 46);text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                foreach ($tableMenuWeb as $menuweb) {
                  $i++;
                  echo "<tr>";
                  echo "<td>" . $i . "</td>";
                  echo "<td>" . $menuweb["sm_name_menu"] . "</td>";
                  if ($menuweb["sm_status"] == "1") {
                    echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i checked onclick='statusManageMenuWeb(" . $menuweb["sm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                            </div>
                                       
                                    </td>";
                  } else {
                    echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=statusMenuWeb$i onclick='statusManageMenuWeb(" . $menuweb["sm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusMenuWeb$i></label>
                                        </div>
                                    </td>";
                  }
                  echo "<td>
                                      <div class=\"text-wrap text-center\" >
                                      <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\"   id=\"detailinfomenu$i\" name =\"detailinfomenu$i\"  onclick='DetailInfoSubmenu(" . $menuweb["sm_id"] . ")'><i
                                      class=\"mdi mdi-information-outline\"></i> info</button>                              
                                      </div>
                                    </td>";
                  echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#editMenuWeb\"  onclick='getDataManageMenuWeb(" . $menuweb["sm_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>


          <!-- Add Menu Modal-->
          <div class="modal fade" id="addMenuWeb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i> Add Menu Web</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <form class="card-body" action="#">

                  <div class="form-group">
                    <label for="NameMenuWeb">Menu Name :</label>
                    <input class="form-control" type="text" id="addMenuName" name="addMenuName">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveaddMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>
          <!-- Edit Menu Web Modal-->
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
                    <input class="form-control" type="text" id="editMenuName" name="editMenuName">
                    <input class="form-control" type="text" id="IDeditMenuName" name="editMenuName" hidden>
                  </div>


                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Table  INFO SubMENU -->
          <div class="card-body" id="bodymenushow" style="display: none">
            <div class="table-responsive">
              <table class="table table-bordered" id="TabledetailMenu" width="100%" cellspacing="0">
                <h3 class="col-12" style="color:black">Information Detail</h3>
                <hr class="new4">
                <!-- style="display: none"-->
                <div class="card-header py" style="width:100%; text-align:right">
                  <a hidden href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal data-target=#addDetailSubMenu id="btnaddDetailSubMenu"><i class="mdi mdi-library-plus"></i> Add Submenu </a>
                </div>
                <thead>
                  <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Submenu</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody id="tbdetailsubmenu">
                  <?php
                  $j = 0;
                  foreach ($tableDetailSubMenuWeb as $DetailSub) {
                    $j++;
                    echo "<tr>";
                    echo "<td>" . $j . "</td>";
                    echo "<td>" . $DetailSub["ssm_name_submenu"] . "</td>";
                    if ($DetailSub["ssm_status"] == "1") {
                      echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetailinfo$j  id=statusdetailinfo$j checked onclick='statusManageSubMenuWeb(" . $DetailSub["ssm_id"] . ")'>
                                                <label class=\"custom-control-label\" for=statusdetailinfo$j ></label>
                                            </div>
                                    </td>";
                    } else {
                      echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" name=statusdetailinfo$j  id=statusdetailinfo$j onclick='statusManageSubMenuWeb(" . $DetailSub["ssm_id"] . ")'>
                                            <label class=\"custom-control-label\" for=statusdetailinfo$j></label>
                                        </div>
                                    </td>";
                    }
                    echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" id=\"EditDetailSubmenu$i\" name =\"EditDetailSubmenu$i\" data-target=\"#moDalEditDetailSubMenu\"  onclick='getDataEditDetailSubmenu(" . $DetailSub["ssm_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";
                    echo "</tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <!-- addDetailSubmenuWeb Modal-->
          <div class="modal fade" id="addDetailSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Add Submenu</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="password">Submenu Name :</label>
                    <input class="form-control" type="text" id="IDdetailSubMenu" name="IDdetailSubMenu" hidden>
                    <input class="form-control" type="text" id="addsubmenuwebname" name="addsubmenuwebname" required="" placeholder="Enter New Submenu">
                  </div>

                  <div class="form-group">
                    <label for="password">Method :</label>
                    <input class="form-control" type="text" id="addmenupath" name="addmenupath" required="" placeholder="Enter path of menu">
                  </div>


                  <!-- <div class="form-group">
                    <label for="password">icon name :</label>
                    <input class="form-control" type="text" id="addmenuicon" name="addmenuicon" required="" placeholder="Enter icon name of menu">
                  </div> -->

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveAddSubMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Edit DetailSubmenuWeb Modal-->
          <div class="modal fade" id="moDalEditDetailSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="mdi mdi-library-plus"></i> Edit Submenu</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form class="card-body" action="#">
                  <div class="form-group">
                    <label for="password">Submenu Name :</label>
                    <input class="form-control" type="text" id="IDEditdetailSubMenu" name="IDEditdetailSubMenu" hidden>
                    <input class="form-control" type="text" id="editSubmenuWebName" name="editSubmenuWebName">
                  </div>

                  <div class="form-group">
                    <label for="password">Method :</label>
                    <input class="form-control" type="text" id="editSubMenuPath" name="editSubMenuPath">
                  </div>

                </form>

                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-success" type="submit" id="btnSaveEditSubMenuWeb">Save</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>