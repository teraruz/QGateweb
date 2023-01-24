<!-- MENU not HEADER -->
<!-- MENU สลับกับ  เพราะ Themes -->
<div class="container-scroller">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <!-- <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo"></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo"></a> -->
      <img class="sidebar-brand brand-logo" src="<?php echo base_url() ?>assets/images/QualityRed.png">
      <a class="sidebar-brand brand-logo-mini" href="<?php echo base_url() ?>Manage/Homepage"><img src="<?php echo base_url() ?>assets/images/logoQgate-mini.png"></a>
    </div>
    <ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>

        <!-- วนเมนูมา show ตาม permission -->
      </li>
      <?php
      $name = "";
      // echo "<pre>";
      // print_r($menu);
      // echo "</pre>";
      foreach ($menu as $key => $value) {
        if ($name != $value["sm_name_menu"]) {
      ?>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#<?php echo "list" . $key; ?>" aria-expanded="false" aria-controls="<?php echo "list" . $key; ?>">
              <span class="menu-icon">
                <i class="<?php echo $value["sm_name_icon"] ?>"></i>
              </span>
              <span class="menu-title"><?php echo $value["sm_name_menu"]; ?></span>
              <i class="menu-arrow"></i>
            </a>
            <?php foreach ($menu as $key1 => $value1) {
              if ($value["sm_name_menu"] == $value1["sm_name_menu"]) {
            ?>
                <div class="collapse" id="<?php echo "list" . $key; ?>">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() . $value1["ssm_method"] ?>"><?php echo $value1["ssm_name_submenu"] ?></a></li>
                  </ul>
                </div>
          </li>
      <?php
              }
            } ?>
  <?php
        }
        $name = $value["sm_name_menu"];
      }
  ?>
  <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#AdministratorWeb" aria-expanded="false" aria-controls="AdministratorWeb">
              <span class="menu-icon">
                <i class="mdi mdi-account-star"></i>
              </span>
              <span class="menu-title">Administrator Web</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="AdministratorWeb">
              <ul class="nav flex-column sub-menu">
             
                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url() ?>Manage/ManageUserWeb">Manage User Web</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/ManagePermisionWeb">Manage Permission Web</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage//ManageMenuWeb">Manage Menu Web</a></li>
              </ul>
            </div>
          </li> -->


  <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#AdministratorApp" aria-expanded="false" aria-controls="AdministratorApp">
              <span class="menu-icon">
                <i class="mdi mdi-account-star"></i>
              </span>
              <span class="menu-title">AdministratorApp</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="AdministratorApp">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/ManageUserApp">Manage User App</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/ManagePermisionApp">Manage Permission App</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/ManageMenuApp">Manage Menu App</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?php echo base_url() ?>Manage/MasterControl">
              <span class="menu-icon">
                <i class="mdi mdi-cube-outline"></i>
              </span>
              <span class="menu-title">Master Control</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#Manage" aria-expanded="false" aria-controls="Manage">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Manage">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/QgateCheckData">Q-Gate Check Data"</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/NCNGData"</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/ReturnPart">Add Menu Data"</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
              <span class="menu-icon">
                <i class="mdi mdi-file-document"></i>
              </span>
              <span class="menu-title">Report</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="report">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/DailyReport">Daily</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/WeeklyReport">Weekly</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() ?>Manage/MonthlyReport">Monthly</a></li>
              </ul>
            </div>
          </li> -->

    </ul>
  </nav>