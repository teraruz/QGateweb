<!-- HEADER not MENU -->
<!-- HEADER สลับกับ MENU เพราะ Themes -->
<div class="container-fluid page-body-wrapper">
  <nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right ">
        <p class="mb-0 d-none d-sm-block navbar-profile-name">TBKK THAILAND CO.LTD</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item dropdown">
          <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
            <div class="navbar-profile">
              <img class="img-xs rounded-circle " src="<?php echo base_url() ?>assets/images/faces/face15.jpg">
              <p class="mb-0 d-none d-sm-block navbar-profile-name" id="empcode" name="empcode"><?php echo $fullname; ?></p>

              <i class="mdi mdi-menu-down d-none d-sm-block"></i>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
            <h6 class="p-3 mb-0">Settings</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="<?php echo base_url() ?>Manage/EditProfile">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-account text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Profile</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" href="<?php echo base_url() ?>Manage/ChangePassword">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-key text-warning"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item" >
              <!-- onclick="btnLogout(<?php echo $id; ?>)" -->
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-logout text-danger"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject mb-1">Log out</p>
              </div>
            </a>
            <!-- ปิด footer ของ dropdown -->
            <!-- <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p> -->
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-format-line-spacing"></span>
      </button>
    </div>
  </nav>