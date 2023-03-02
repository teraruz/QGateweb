<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 class="col-12" style="color:black">NC/NG Data</h1>

            <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                    <div class="card-body py-0 px-0 px-sm-3">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-3 col-xl-2">
                                <img src="<?php echo base_url() ?>assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                            </div>
                            <div class="row col-sm-6 col-xl-8 p-0  align-items-center">

                                <div class="row col-md">
                                    <div class="mb row col-md-6">
                                        <label class="col-form-label">Plant :</label>
                                        <div class="col-md-3">
                                            <select class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
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


                                <div class="row col-md">
                                    <div class="mb row col-md-6">
                                        <label class="col-form-label">Zone :</label>
                                        <div class="col-md-3">
                                            <select class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
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


                                <div class="row col-md">
                                    <div class="mb row col-md-6">
                                        <label class="col-form-label">Station:</label>
                                        <div class="col-md-2">
                                            <select class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" aria-label="Default select example" id="selectPlantNCNG" name="selectPlantNCNG">
                                                <option selected>Select Station</option>
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
                        <table class="display table" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Status</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part No</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Zone</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Station</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Date</th>
                                    <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($tableNCNG as $table) {
                                    $i++;
                                    echo "<tr>";
                                    echo "<td>" . $i . "</td>";
                                    echo "<td>" . $table["type"] . "</td>";
                                    echo "<td>" . $table["ifts_part_no"] . "</td>";
                                    echo "<td>" . $table["mpa_name"] . "</td>";
                                    echo "<td>" . $table["mza_name"] . "</td>";
                                    echo "<td>" . $table["msa_station"] . "</td>";
                                    echo "<td>" . $table["Date"] . "</td>";

                                    if ($table["type"] == "NG") {
                                        if ($table["idd_status"] == "9") {
                                            echo "<td>
                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-md btn-secondary shadow-sm  me-md-2 \" 
                                                                id=btnconfirmNG$i clicked onclick='ChangeStatusNG(" . $table["idd_id"] . ")'> Confirm NG</button>                          
                                                            </div>
                                           
                                                        </td>";
                                        } else {
                                            echo "<td>
                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-md btn-danger shadow-sm  me-md-2 \" 
                                                                 id=btnconfirmNG$i onclick='ChangeStatusNG(" . $table["idd_id"] . ")'> Confirm NG</button>                              
                                                            </div>
                                        
                                                           
                                                        </td>";
                                        }
                                    } else if ($table["type"] == "NC") {
                                        if($table["idd_status"] == "9") {
                                            echo "<td>
                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"
                                                                id=btnconfirmNC$i onclick='getDataZone(" . $table["idd_id"] . ")'> Confirm NC</button>                              
                                                            </div> <br>

                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"
                                                                id=btnrestoreNC$i onclick='getDataZone(" . $table["idd_id"] . ")'> Restore NC</button>                              
                                                            </div>

                                                        </td>";

                                        }else{
                                        echo "<td>
                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm  me-md-2 \"
                                                                id=btnconfirmNC$i onclick='getDataZone(" . $table["idd_id"] . ")'> Confirm NC</button>                              
                                                            </div> <br>

                                                            <div class=\"text-wrap text-center\" >
                                                                <button  class=\"d-none d-sm-inline-block btn btn-sm btn-success shadow-sm  me-md-2 \"
                                                                id=btnrestoreNC$i onclick='getDataZone(" . $table["idd_id"] . ")'> Restore NC</button>                              
                                                            </div>

                                                        </td>";
                                        }
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>