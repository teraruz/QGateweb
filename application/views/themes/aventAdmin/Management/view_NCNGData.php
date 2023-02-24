<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 class="col-12" style="color:black">NG/NG Data</h1>

            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="<?php echo base_url() ?>assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="row col-sm-6 col-xl-8 p-0  align-items-center">

                                <div class="row">
                                    <div class="mb row col-md-4">
                                        <label class="col-form-label">Plant :</label>
                                        <div class="col-md-3">
                                            <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
                                                <option selected>Select Plant</option>
                                                <?php
                                                foreach ($getplant as $plant) {
                                                ?>
                                                    <option value="<?php echo $plant["mpa_id"]; ?>"><?php echo $plant["mpa_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="mb row col-md-4">
                                        <label class="col-form-label">Zone :</label>
                                        <div class="col-md-3">
                                            <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
                                                <option selected>Select Zone</option>
                                                <?php
                                                foreach ($getzone as $zone) {
                                                ?>
                                                    <option value="<?php echo $zone["mza_id"]; ?>"><?php echo $zone["mza_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>




                                <div class="row">
                                    <div class="mb row col-md-3">
                                        <label class="col-form-label">Station:</label>
                                        <div class="col-md-3">
                                            <select class="form-control" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
                                                <option selected>Select Zone</option>
                                                <?php
                                                foreach ($getstation as $station) {
                                                ?>
                                                    <option value="<?php echo $station["msa_id"]; ?>"><?php echo $station["msa_station"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>


                            <div class="col-3 col-sm text-center">
                                <span>
                                    <button type="submit" id="strt" class="btn btn-outline-light btn-rounded get-started-btn col-md-5">Start</button>
                                    <button type="submit" id="end" class="btn btn-outline-light btn-rounded get-started-btn col-md-5">End</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-table shadow col-12">
                <!-- <div style="width:98%; text-align:right">
          <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle=modal
            data-target=#adduser><i class="fas fa-user-plus fa-sm"></i> Add User</a>
        </div> -->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered " id="ManageUserTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">NO.</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Part No</th>
                                    <th style="text-align: center;">Sumary</th>
                                    <th style="text-align: center;">Plant</th>
                                    <th style="text-align: center;">Zone</th>
                                    <th style="text-align: center;">Station</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php
                                        $i = 0;
                                        foreach ($tableUserWeb as $value) {
                                            $i++;
                                            echo "<tr>";
                                            echo "<td>" . $value["ss_id"] . "</td>";
                                            echo "<td>" . $value["ss_emp_code"] . "</td>";
                                            echo "<td>" . $value["ss_emp_fname"] . "</td>";
                                            echo "<td>" . $value["ss_emp_lname"] . "</td>";
                                            echo "<td>" . $value["ss_email"] . "</td>";
                                            echo "<td>" . $value["spg_name"] . "</td>";
                                            echo "<td>" . $value["mpa_name"] . "</td>";

                                            if ($value["ss_status"] == "1") {
                                                echo "<td>
                                            <div class=\"custom-switch text-center\" >
                                                <input type=\"checkbox\" class=\"custom-control-input\" id=status$i checked onclick='status(" . $value["ss_id"] . ")'>
                                                <label class=\"custom-control-label\" for=status$i></label>
                                            </div>
                                       
                                    </td>"; //เปิด Permission
                                            } else {
                                                echo "<td>
                                        <div class=\"custom-switch text-center\" >
                                            <input type=\"checkbox\" class=\"custom-control-input\" id=status$i onclick='status(" . $value["ss_id"] . ")'>
                                            <label class=\"custom-control-label\" for=status$i></label>
                                        </div>
                                    </td>"; //ปิด Permission
                                            }

                                            echo "<td>
                                    <div class=\"text-wrap text-center\" >
                                     <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" data-target=\"#edituser\"  onclick='getDataEditUserWeb(" . $value["ss_id"] . ")'><i
                                     class=\"fas fa-edit fa-sm\"></i> Edit</button>                              
                                    </div>
                                </td>";


                                            echo "</tr>";
                                        }
                                        ?> -->
                            </tbody>
                        </table>

                    </div>
                    <!-- Edit Modal-->
                    <div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit fa-sm"></i>
                                        Edit User</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>

                                <form class="card-body" action="#">
                                    <div class="form-group">
                                        <label for="empcode">Employee Code :</label>
                                        <input class="form-control" type="text" id="editempcode" required="" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="fristname">First Name :</label>
                                        <input class="form-control" type="text" id="editfirstname" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Last Name :</label>
                                        <input class="form-control" type="text" required="" id="editlastname" name="editlastname">
                                    </div>

                                    <div class="form-group">
                                        <label for="username">Group Permission :</label>
                                        <div>
                                            <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" aria-label="Default select example" id="editgroup">

                                                <?php
                                                foreach ($groupper as $groupPer) {
                                                ?>
                                                    <option value="<?php echo $groupPer["spg_id"]; ?>">
                                                        <?php echo $groupPer["spg_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="emailaddress">Email :</label>
                                        <input class="form-control" type="email" id="editemailaddress" name="editemailaddress" required="">
                                    </div>

                                    <div>
                                        <label for="plant">Plant :</label>
                                        <div>
                                            <select class="form-select col-md-12" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#6e707e;" id="editplant" aria-label="Default select example" placeholder="Enter your plant">
                                                <?php
                                                foreach ($getplant as $plant) {
                                                ?>
                                                    <option value="<?php echo $plant["mpa_id"]; ?>">
                                                        <?php echo $plant["mpa_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-success" type="submit" id="btnSaveEdit">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>