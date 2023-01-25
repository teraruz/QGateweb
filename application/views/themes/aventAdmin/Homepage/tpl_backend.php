<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<title><?php echo $page_title; ?></title>
<!-- <link href="<?php echo base_url() . $css_url; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
<!-- <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel="stylesheet" type="text/css"> -->
<!-- <link href="<?php echo base_url() . $css_url; ?>css/sb-admin-2.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/owl-carousel-2/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/owl-carousel-2/owl.theme.default.min.css">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>css/style.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="<?php echo base_url() . $image_url; ?>images/logoQgate.png" />


<body>
    <?php echo $page_header; ?>
    <?php echo $page_menu; ?>
    <?php echo $page_content; ?>
    <?php echo $page_footer; ?>
    </div>
</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() . $jquery_url; ?>vendor/jquery/jquery.min.js"></script>
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script> -->

<!-- Custom scripts for all pages-->
<!-- <script src="<?php echo base_url() . $js_url; ?>js/sb-admin-2.min.js"></script> -->

<!-- Page level plugins -->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?php echo base_url() . $js_url; ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/demo/chart-pie-demo.js"></script> -->
<!-- plugins:js -->
<script src="<?php echo base_url() . $js_url; ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url() . $js_url; ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url() . $js_url; ?>vendors/progressbar.js/progressbar.min.js"></script>
<script src="<?php echo base_url() . $js_url; ?>vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="<?php echo base_url() . $js_url; ?>vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url() . $js_url; ?>vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url() . $js_url; ?>js/off-canvas.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/hoverable-collapse.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/misc.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/settings.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url() . $js_url; ?>js/dashboard.js"></script>
<!-- End custom js for this page -->


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="<?php echo base_url() . $jquery_url; ?>jquery-2.1.4.min.js"></script>

<!-- ************************************** AJAX CHANGEPASSWORDPAGE AND EDITPROFILEPAGE *************************************** -->
<script type="text/javascript">
    $("#wow1").click(function() {
        BacktoHome()
    });
    $("#wow").click(function() {
        // alert("wow");
        BacktoHome()
    });
    $("#btnEditProfile").click(function() {
        // alert("wow");
        SaveProfile()
    });
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#id_password1');
    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type1);
        // toggle the eye slash icon
        this.classList.toggle('mdi mdi-eye-off');
    });
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#id_password2');
    togglePassword2.addEventListener('click', function(e) {
        // toggle the type attribute
        const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type2);
        // toggle the eye slash icon
        this.classList.toggle('mdi mdi-eye-off');
    });
    const togglePassword3 = document.querySelector('#togglePassword3');
    const password3 = document.querySelector('#id_password3');
    togglePassword3.addEventListener('click', function(e) {
        // toggle the type attribute
        const type3 = password3.getAttribute('type') === 'password' ? 'text' : 'password';
        password3.setAttribute('type', type3);
        // toggle the eye slash icon
        this.classList.toggle('mdi mdi-eye-off');
    });


    function BacktoHome() {
        Swal.fire({
            title: 'Cancel',
            text: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirm'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url(); ?>Manage/Homepage'
            }
        })
    };

    function SaveProfile() {
        var empcode = $("#empcode1").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var plant = $("#plant").val();
        var path = $.ajax({
            method: "GET",
            url: "<?php echo base_url(); ?>Manage/ConUpdateUser",
            data: {
                empcode: empcode,
                firstname: firstname,
                lastname: lastname,
                email: email,
                plant: plant
            }

        })
        path.done(function(rs) {
            if (rs === "true") {
                Swal.fire(
                    'Success!',
                    'Edit Profile Detail Complete!',
                    'success'
                )
            } else {
                Swal.fire(
                    'error',
                    'Oops!!',
                    'Edit Profile Detail Not Complete!',
                )
            }
        })
    }
</script>

<script type="text/javascript">
    $("#btnLogout").click(function() {
        Logout()
    });
    $("#menuhomepage").click(function() {
        Menuhomepage()
    });

    function Logout() {
        Swal.fire({
            title: 'Logout',
            text: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url() ?>Login/Account'
            }
        })
    };

    function Menuhomepage() {
        var load = 0;
        var dataString = <?php echo $data ?>
        var path = $.ajax({
            method: "POST",
            url: "<?php echo base_url() ?>Managehome/Homepage?ss_emp_fname",
            data: {
                dataString: <?php echo $data[0]["ss_emp_fname"]; ?>
            }
        })

    };
</script>