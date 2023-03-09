<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <h1 class="col-12" style="color:black">Qgate Check Data</h1>

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
                                            <select class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" aria-label="Default select example" id="selectZoneData" name="selectZoneData">
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
                                            <select class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" aria-label="Default select example" id="selectStationData" name="selectStationData">
                                                <option selected>Select Station</option>
                                                <?php

                                                foreach ($getstation as $station) {

                                                ?>
                                                    <!-- id="checkDataStation" name = "checkDataStation" -->
                                                    <option value="<?php echo $station["msa_id"]; ?>"><?php echo $station["msa_station"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row col-md">
                                <div class="mb row col-md-6">
                                    <label class="col-form-label">Date :</label>
                                    <div class="col-md-3">
                                        <input class="form-input" style="border: 1px solid #d1d3e2; border-radius: 0.35rem; color:#ec0000;  height: calc(2.25rem + 2px);" type="date" placeholder="yyyy-mm-dd" min="01-01-1997" max="31-12-2050" id="CheckDatadatesearch" name="CheckDatadatesearch">
                                    </div>
                                </div>

                            </div>


                            <div class="col-3 col-sm text-center">
                                <span>
                                    <button type="submit" id="btnCheckDataSearch" name="btnCheckDataSearch" class="btn btn-outline-light btn-rounded get-started-btn col-md-5">Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-table shadow col-12">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table" id="example1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">NO.</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Line</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plan Date</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Seq Plan</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Part No</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">SNP</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Box</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Production Lot</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Qgate Lot</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Plant</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Zone</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Station</th>
                                            <th style="border-bottom: 2px solid rgb(207 0 46); text-align: center;">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>