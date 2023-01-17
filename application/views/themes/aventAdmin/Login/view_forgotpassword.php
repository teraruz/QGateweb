<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Quality System</title>
  <!-- plugins:css -->
  <link href="<?php echo base_url() . $css_url; ?>vendors/mdi/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() . $css_url; ?>vendors/css/vendor.bundle.base.css" rel="stylesheet" type="text/css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url() . $image_url; ?>images/logoQgate.png" />
</head>
<style>
  .colorbtnConfirm {
    background-color: #D80032;
    border-color: #D80032;
    border-radius: 12rem;
  }

  .colorbtnConfirm:hover {
    background-color: #800000;
  }

  .txtback {
    font-size: larger;
    text-align: center;
    color: #D80032;
  }
  .txtback:hover {
    color: #800000;
  }
</style>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth new-full-bg">
          <div class="card card-inverse-secondary col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <!-- <div class="card-title text-center">
                <img src="<?php echo base_url() . $image_url; ?>images/logoQgate.png" width="150" height="130">
              </div> -->
              <h1 class="card-title text-center ">FORGOT PASSWORD</h1>

              <div class="form-group">
                <label>Enter Email :</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label>New Password :</label>
                <input type="text" class="form-control" id="password">
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
              </div>
              <div class="text-center ">
                <button type="submit" class="btn colorbtnConfirm btn-block enter-btn " id="confirm">CONFIRM</button>
                <hr style="background-color:aliceblue">
                <a href="<?php echo base_url() ?>Login/Account" class="forgot-pass txtback">Back</a>
              </div>
            
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url() . $js_url; ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url() . $css_url; ?>js/off-canvas.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url() . $js_url; ?>js/misc.js"></script>
  <!-- <script src="<?php //echo base_url() . $js_url; 
                    ?>settings.js"></script> -->
  <script src="<?php echo base_url() . $js_url; ?>js/todolist.js"></script>
  <!-- endinject -->
</body>
<template id="my-template">
  <swal-title>
    Login Success !
  </swal-title>
  <swal-icon type="success" color="green"></swal-icon>
  <swal-button type="confirm">
    OK
  </swal-button>
  <swal-param name="allowEscapeKey" value="false" />
  <swal-param name="customClass" value='{ "popup": "my-popup" }' />
  <swal-function-param name="didOpen" value="popup => console.log(popup)" />
</template>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo base_url() . $js_url; ?>sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() . $js_url; ?>sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="<?php echo base_url() . $jquery_url; ?>jquery-2.1.4.min.js"></script>

<script type="text/javascript">
  $("#confirm").click(function() {
    setNewPassword()
  })

  function setNewPassword() {
    var email = $("#email").val();
    var password = $("#password").val();
    // alert(email)
    // alert(password)

    var path = $.ajax({
      method: "post",
      url: "<?php echo base_url(); ?>Login/cSetNewPassword",
      data: {
        email: email,
        password: password,
      }
    })
    path.done(function(res) {
      alert(res)
      if (res === 'true') {
        Swal.fire({
          icon: 'success',
          text: 'your password has been change',
        })
      } else {
        Swal.fire({
          icon: 'error',
          text: 'your email is incorrect',
        })
      } 
    })
  }
</script>