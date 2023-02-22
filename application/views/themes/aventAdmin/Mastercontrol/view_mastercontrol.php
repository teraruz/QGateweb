<div class="main-panel">
    <div class="content-wrapper">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo base_url() . "#"; ?>">Master Control</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() . "#"; ?>">Detail of Master Table</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="content-wrapper">
                    <div class="row">
                        <h1 class="col-12" style="color:black">Master Control</h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/geometry.png" style="width=:50; height:50;"></image>
                                    </div>
                                    <a type="submit" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/CheckType">Check Type</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/status.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="submit" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/CheckStatus">Check Status</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/inspection.png" style="width=:50; height:50;"></image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/InspectionType">Inspection Type</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/DMC.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DMCData">DMC Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/scanner.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DMCType">DMC Type</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/codesys.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/FACode">FA Code</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/workshift.png" style="width=:50; height:50;"></image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/WorkShift">Work Shift</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/defect.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Defect">Defect</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/part_number.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/PartNumber">Part Number</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/selecy_part.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/SelectPart">Select Part</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/plant_web.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/PlantAdminWeb">Plant Admin Web</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/plant_app.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/PlantAdminApp">Plant Admin App</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/zone.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/ZoneAdmin">Zone Admin</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/station.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/stationAdmin">Station Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <------------------------------------- Detail of Master Table ------------------------------------->
            <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <div class="content-wrapper">
                    <div class="row">
                        <h1 class="col-12" style="color:black">Detail of Master Table</h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/defect_group.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DefectGroup">Defect Group</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/config_detail.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/ConfigDetail">Config Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-6 col-sm-11 col-xl-12 text-center ">
                                        <image src="<?php echo base_url() ?>assets/images/detail.png" style="width=:50; height:50;">
                                        </image>
                                    </div>
                                    <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/dmcTypeDetail">DMC Type Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
        </div>
    </div>










    <!-- -----------------------------------  -----------------------------------
    <div class="content-wrapper">
        <div class="row">
            <h1 class="col-12" style="color:black">Master Control</h1>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/geometry.png" style="width=:50; height:50;"></image>
                        </div>
                        <a type="submit" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/CheckType">Check Type</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/status.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="submit" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/CheckStatus">Check Status</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/inspection.png" style="width=:50; height:50;"></image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/InspectionType">Inspection Type</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/DMC.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DMCData">DMC Data</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/scanner.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DMCType">DMC Type</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/codesys.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/FACode">FA Code</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/workshift.png" style="width=:50; height:50;"></image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/WorkShift">Work Shift</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/defect.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Defect">Defect</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/part_number.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Part Number</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/selecy_part.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Select Part</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/plant_web.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Plant Admin Web</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/plant_app.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Plant Admin App</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/zone.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Zone Admin</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/station.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/Detail">Station Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ----------------------------------- Detail of Master Table ----------------------------------- -->

    <div class="content-wrapper">
        <hr class="new">
        <div class="row">
            <h1 class="col-12" style="color:black">Detail of Master Table</h1>
        </div>
        <div class="row">
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/defect_group.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/DefectGroup">Defect Group</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/config_detail.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/ConfigDetail">Config Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="col-6 col-sm-11 col-xl-12 text-center ">
                            <image src="<?php echo base_url() ?>assets/images/detail.png" style="width=:50; height:50;">
                            </image>
                        </div>
                        <a type="button" class="btn btn-inverse-danger btn-block" href="<?php echo base_url() ?>Manage/dmcTypeDetail">DMC Type Detail</a>
                    </div>
                </div>
            </div>
        </div> 
    </div> 