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
  <!-- import JQuery -->
  <script src="<?php echo base_url() . $js_url; ?>jquery-2.1.4.min.js"></script>
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
  .colorbtnLogin {
    background-color: #D80032;
    border-color: #D80032;
    border-radius: 3rem;
  }

  .colorbtnLogin:hover {
    background-color: #800000;
  }

  .checkboxbefore {
    content: "";
    width: 16px;
    height: 16px;
    border-radius: 2px;
    border: solid #D80032;
    border-width: 2px;
    transition-duration: 250ms;
    position: absolute;
    top: 2px;
    left: 0;
  }

  .iconclass {
    position: sticky;
  }

  .icon-right {
    margin-right: 0;
  }
</style>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth new-full-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <div class="card-title text-center">
                <img src="<?php echo base_url() . $image_url; ?>images/logoQgate.png" width="150" height="130">
              </div>
              <h1 class="card-title text-center ">QUALITY SYSTEM</h1>

              <div class="form-group">
                <label>Employee Code :</label>
                <input type="text" class="form-control" id="empcode" value  ="">
              </div>
              <div class="form-group">
                <label>Password :</label>
                <input type="text" class="form-control" id="password" value  ="">
              </div><br>
            
              <div class="text-center ">
                <button type="submit" class="btn colorbtnLogin btn-block enter-btn " id="btnLogin">LOGIN</button>
                <hr style="background-color:aliceblue">
                <a href="<?php echo base_url() ?>Login/forgotpassword" class="forgot-pass">Forgot Password?</a>
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
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="<?php echo base_url() . $jquery_url; ?>jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $("#btnLogin").click(function() {
    login()
  })
  $("#btnLogin").click(function() {
    getName()
  })

  function login() {
    // รับค่าจาก id ของ input มาเก็บใส่ตัวแปรด้านหน้า 
    var empcode = $("#empcode").val();
    var password = $("#password").val();

    var path = $.ajax({
      method: "post",
      url: "<?php echo base_url(); ?>Login/checkLogin",
      // เก็บตัวแปรจากด้านบนเพื่อส่งไป controllerโดยตัวหน้าคือตัวที่ถูกส่งไป
      data: {
        empcode: empcode,
        password: password
      }
    })

    // รับresult กลับมาจาก controller เพื่อกำหนดเงื่อนไข
    path.done(function(rs) {
      var empcode = $("#empcode").val();
      if (rs === "true") {
        Swal.fire({
          template: '#my-template',
          icon: 'success',
          title :'Login Success',
          text: 'Welcome to Q-Gate Website',
          showConfirmButton: false,
          footer: '<a href="<?php echo base_url() ?>Manage/Homepage?empcode='+empcode+'">GO TO WEBSITE</a>',
        })
      } else {
        Swal.fire({
          icon: 'error',
          title :'Oops!!',
          text: 'Employee Code or Password is Incorrect!',
        })
      }
    })
  }
  function getName(){
    var empcode = $("#empcode").val();
    var path = $.ajax({
      method: "GET",
      // เก็บตัวแปรจากด้านบนเพื่อส่งไป controllerโดยตัวหน้าคือตัวที่ถูกส่งไป
      url: "<?php echo base_url(); ?>Manage/Homepage",
      data: {
        empcode: empcode
      }
    })

  }

  // function addUser() {
  // 	var adduser = $("#addusername").val()
  // 	var addpass = $("#addpassword").val()
  // 	var adduserlv = $("#adduserlv").val()

  // 	var path = $.ajax({
  // 		method: "POST",
  // 		url: "<?php echo base_url(); ?>Login/addData",
  // 		data: {
  // 			adduser: adduser,
  // 			addpass: addpass,
  // 			adduserlv: adduserlv
  // 		}
  // 	})
  // 	path.done(function(rs) {
  // 		console.log(rs)

  // 		if (rs === 'true') {
  // 			Swal.fire({
  // 				position: 'mid',
  // 				icon: 'success',
  // 				title: 'Register Success',
  // 				showConfirmButton: false,
  // 				timer: 1500
  // 			})
  // 		} else {
  // 			Swal.fire({
  // 				position: 'mid',
  // 				icon: 'success',
  // 				title: 'Register Faild',
  // 				showConfirmButton: false,
  // 				timer: 1500
  // 			})
  // 		}
  // 	})



  // }
</script>