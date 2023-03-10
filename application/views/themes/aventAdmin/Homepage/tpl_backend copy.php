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

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.45.0/theme/dracula.min.css">
<!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> -->
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/jvectormap/jquery-jvectormap.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/owl-carousel-2/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/owl-carousel-2/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/mdi/css/materialdesignicons.min.css.map">
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendors/mdi/css/materialdesignicons.css.map">
<!-- <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/datatables/dataTables.bootstrap4.min.css"> -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>css/newStyle.css">
<!-- End layout styles -->
<link rel="shortcut icon" href="<?php echo base_url() . $image_url; ?>images/logoQgate.png" />
<style>
    table.dataTable.no-footer {
        border-bottom: 2px solid rgb(207 0 46);
    }

    .custom-control-label::before {
        position: absolute;
        left: -1.5rem;
        top: 0px;
        width: 1rem;
        height: 1rem;
        pointer-events: none;
        content: "";
        background-color: #fff;
        border: #adb5bd solid 1px;
    }

    table.dataTable thead>tr>th.sorting:after,
    table.dataTable thead>tr>th.sorting_asc:after,
    table.dataTable thead>tr>th.sorting_desc:after,
    table.dataTable thead>tr>th.sorting_asc_disabled:after,
    table.dataTable thead>tr>th.sorting_desc_disabled:after,
    table.dataTable thead>tr>td.sorting:after,
    table.dataTable thead>tr>td.sorting_asc:after,
    table.dataTable thead>tr>td.sorting_desc:after,
    table.dataTable thead>tr>td.sorting_asc_disabled:after,
    table.dataTable thead>tr>td.sorting_desc_disabled:after {
        top: 25%;
        content: "▼";
    }

    table.dataTable thead>tr>th.sorting:before,
    table.dataTable thead>tr>th.sorting_asc:before,
    table.dataTable thead>tr>th.sorting_desc:before,
    table.dataTable thead>tr>th.sorting_asc_disabled:before,
    table.dataTable thead>tr>th.sorting_desc_disabled:before,
    table.dataTable thead>tr>td.sorting:before,
    table.dataTable thead>tr>td.sorting_asc:before,
    table.dataTable thead>tr>td.sorting_desc:before,
    table.dataTable thead>tr>td.sorting_asc_disabled:before,
    table.dataTable thead>tr>td.sorting_desc_disabled:before {
        bottom: 20%;
        /* content: "▲"; */
    }

    .custom-switch .custom-control-label::after {
        top: calc(0.25rem + -2px);
        left: calc(-2.25rem + 2px);
        width: calc(1rem - 4px);
        height: calc(1rem - 4px);
        background-color: #adb5bd;
        border-radius: 0.5rem;
        transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .dt-buttons,
    .dataTables_filter {
        display: inline-block;
        width: 50%;
    }

    .dataTables_wrapper label {
        font-size: .8125rem;
        color: black;
    }

    .paginate_button.current:hover {
        background: yellow;
    }

    .card-table {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #e2e2e2;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #0000001a;
    }

    .dataTables_wrapper .dataTables_info {
        font-size: 0.875rem;
        color: black;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: white !important;
        border: 1px solid rgba(0, 0, 0, 0.3);
        background-color: rgba(230, 230, 230, 0.1);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(230, 230, 230, 0.1)), color-stop(100%, rgba(0, 0, 0, 0.1)));
        background: -webkit-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
        background: -moz-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
        background: -ms-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
        background: -o-linear-gradient(top, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
        background: #d80032;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 1.5em;
        padding: 0.5em 1em;
        margin-left: 2px;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        color: #707070 !important;
        border: 1px solid transparent;
        border-radius: 2px;
    }

    .form-control,
    .asColorPicker-input,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text],
    .jsgrid .jsgrid-table .jsgrid-filter-row select,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number],
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--single .select2-search__field,
    .typeahead,
    .tt-query,
    .tt-hint {
        border: 1px solid #2c2e33;
        height: calc(2.25rem + 2px);
        font-weight: normal;
        width: 100%;
        font-size: 0.875rem;
        padding: 0rem 0.2rem !important;
        background-color: #ffffff;
        border-radius: 2px;
        color: #000000;
    }


    .asColorPicker-input,
    .dataTables_wrapper select,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text],
    .jsgrid .jsgrid-table .jsgrid-filter-row select,
    .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number],
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--single .select2-search__field,
    .typeahead,
    .tt-query,
    .tt-hint {
        border: 1px solid #2c2e33;
        height: calc(2.25rem + 2px);
        font-weight: normal;
        font-size: 0.875rem;
        padding: 0rem 0.2rem !important;
        background-color: #ffffff;
        border-radius: 2px;
        color: #000000;
    }
</style>

<body>
    <?php echo $page_header; ?>
    <?php echo $page_menu; ?>
    <?php echo $page_content; ?>
    <?php echo $page_footer; ?>
    </div>
</body>

</html>



<!-- Bootstrap core JavaScript -->
<!-- <script src="<?php echo base_url() . $jquery_url; ?>vendor/jquery/jquery.min.js"type="text/javascript"></script> -->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

<!-- Core plugin JavaScript-->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/jquery-easing/jquery.easing.min.js"></script> -->


<!-- Custom scripts for all pages-->
<!-- <script src="<?php echo base_url() . $js_url; ?>js/sb-admin-2.min.js"></script> -->


<!-- Page level plugins -->
<script src="<?php echo base_url() . $js_url; ?>vendor/chart.js/Chart.min.js"></script>
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- Page level custom scripts -->
<script src="<?php echo base_url() . $js_url; ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url() . $js_url; ?>js/demo/chart-pie-demo.js"></script>
<!-- <script src="<?php echo base_url() . $js_url; ?>js/demo/datatables-demo.js"></script> -->

<!-- plugins:js -->
<script src="<?php echo base_url() . $js_url; ?>vendors/js/vendor.bundle.base.js"></script>

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url() ?>assets/vendors/progressbar.js/progressbar.min.js"></script>
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

<!-- Datatables bootstrap -->
<!-- <link rel="stylesheet" href="<?php echo base_url() . $css_url; ?>vendor/datatables/jquery.dataTables.min.css"> -->
<!-- <script src="<?php echo base_url() . $js_url; ?>vendor/datatables/jquery.dataTables.min.js"></script> -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">



<!-- --------------------------------------------------- CHANGEPASSWORDPAGE AND EDITPROFILEPAGE --------------------------------------------------- -->


<script type="text/javascript">
    const triggerTabList = document.querySelectorAll('#myTab button')
    triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', event => {
            event.preventDefault()
            tabTrigger.show()
        })
    })
    $("#wow1").click(function() {
        BacktoHome()
    });
    $("#wow").click(function() {
        // alert("wow");
        BacktoHome()
    });
    $("#btnEditProfile").click(function() {
        SaveProfile()
    });
    $("#SavePassNaJa").click(function() {
        ChangePass()
    });
    const togglePassword1 = document.querySelector('#togglePassword1');
    const password1 = document.querySelector('#currentpass');
    togglePassword1.addEventListener('click', function(e) {
        // toggle the type attribute
        const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type1);
        // toggle the eye slash icon
        this.classList.togglePassword1('mdi mdi-eye-off');
    });
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#newpass');
    togglePassword2.addEventListener('click', function(e) {
        const type2 = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type2);
        this.classList.togglePassword2('mdi mdi-eye-off');
    });
    const togglePassword3 = document.querySelector('#togglePassword3');
    const password3 = document.querySelector('#confirmpass');
    togglePassword3.addEventListener('click', function(e) {
        const type3 = password3.getAttribute('type') === 'password' ? 'text' : 'password';
        password3.setAttribute('type', type3);
        this.classList.togglePassword3('mdi mdi-eye-off');
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
        var firstnamecheck = document.getElementById('firstname');
        var lastnamecheck = document.getElementById('lastname');
        var emailcheck = document.getElementById('email');
        var plantcheck = document.getElementById('plant');

        if (firstnamecheck.value == "" || lastnamecheck.value == "" || emailcheck.value == "" || plantcheck.value == "") {
            setTimeout(function() {
                swal({
                    title: "warning",
                    text: "Please fill textbox ",
                    type: "warning",
                    confirmButtonColor: '#D80032'
                }, function() {
                    window.location = "<?php echo base_url() ?>Manage/EditProFile";
                });
            }, 1000);

        } else {
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
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Your Profile Detail is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/Homepage";
                        });
                    });
                }
            });
        }
    }

    function ChangePass() {
        var empcode = $("#empcode2").val();
        var currentpass = $("#currentpass").val();
        var newpass = $("#newpass").val();
        var confirmpass = $("#confirmpass").val();
        var currentpasscheck = document.getElementById('currentpass');
        var newpasscheck = document.getElementById('newpass');
        var confirmpasscheck = document.getElementById('confirmpass');

        if (currentpasscheck.value == "" || newpasscheck.value == "" || confirmpasscheck.value == "") {
            setTimeout(function() {
                swal({
                    title: "warning",
                    text: "Please fill your Password ",
                    type: "warning",
                    confirmButtonColor: '#D80032'
                }, function() {
                    window.location = "<?php echo base_url() ?>Manage/ChangePassword";
                });
            }, 1000);
        } else {
            var path = $.ajax({
                method: "post",
                url: "<?php echo base_url(); ?>Manage/ConChangePassword",
                data: {
                    empcode: empcode,
                    currentpass: currentpass,
                    newpass: newpass,
                    confirmpass: confirmpass
                }
            })

        }

        path.done(function(rs) {
            if (rs === "true") {
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Password has been Changed!",
                        type: "success",
                        confirmButtonColor: '#D80032'
                    }, function() {
                        window.location = "<?php echo base_url() ?>Manage/Homepage";
                    });
                });
            }
        })
    };
</script>
<!-- --------------------------------------------------- LOGOUT  --------------------------------------------------- -->
<script type="text/javascript">
    $("#clicklogout").click(function() {
        btnLogout()
    });

    function btnLogout($id) {
        Swal.fire({
            title: 'Logout',
            text: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                var path = $.ajax({
                    method: "get",
                    dataType: "json",
                    url: "<?php echo base_url(); ?>Login/logout?id=" + $id,
                })

                window.location.href = "<?php echo base_url() ?>Login/Account";

            }
        })
    };
</script>
<!----------------------------------------------------- Manage User Web  ------------------------------------------------------------>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            buttons: [{
                extend: 'excelHtml5',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                    // columns: ':visible'
                }
            }, ]
        });
        $('#exampletest').DataTable({
            buttons: [{
                extend: 'excelHtml5',
                className: 'btn btn-primary',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                    // columns: ':visible'
                }
            }, ]
        });
    });


    $("#btnSaveAdd").click(function() {
        addUserWeb()
    });
    $("#btnSaveEdit").click(function() {
        saveEditUserWeb()
    });

    function status(ss_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatus?ss_id=" + ss_id,
        })
    };

    function isValidInput(input) {
        var pattern = new RegExp(/^([a-z0-9 \t])+$/i);
        return pattern.test(input);
    }


    function isValidEmail(input) {
        var pattern = new RegExp(/^([a-zA-Z0-9\-_\.]{6,20})+@([a-zA-Z0-9]{2,10})+\.([a-zA-z0-9]{2,10})+$/i);
        return pattern.test(input);
    }

    function addUserWeb() {
        var addempcode = $('#addempcode').val();
        var addfirstname = $('#addfirstname').val();
        var addlastname = $('#addlastname').val();
        var addgroupper = $('#addgrouppermission').val();
        var addemail = $('#addemail').val();
        var addpassword = $('#addpassword').val();
        var addplant = $('#addplant').val();

        var checkaddempcode = document.getElementById("addempcode");
        var checkaddfirstname = document.getElementById("addfirstname");
        var checkaddlastname = document.getElementById("addlastname");
        var checkaddgroup = document.getElementById("addgrouppermission");
        var checkaddemailaddress = document.getElementById("addemail");
        var checkaddpassword = document.getElementById("addpassword");
        var checkaddplant = document.getElementById("addplant");

        if (checkaddempcode.value == "" || checkaddfirstname.value == "" || checkaddlastname.value == "" ||
            checkaddgroup.value == "" || checkaddemailaddress.value == "" || checkaddpassword.value == "" || checkaddplant.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox someone is Empty',
                confirmButtonColor: '#D80032'
            })

        } else {
            if (addempcode != 0) {
                if (isValidInput(addempcode)) {
                    if (isValidInput(addfirstname)) {
                        if (isValidInput(addlastname)) {
                            if (isValidEmail(addemail)) {
                                var path = $.ajax({
                                    method: "POST",
                                    url: "<?php echo base_url(); ?>Manage/addManageUserWeb",
                                    data: {
                                        addempcode: addempcode,
                                        addfirstname: addfirstname,
                                        addlastname: addlastname,
                                        addgroupper: addgroupper,
                                        addemail: addemail,
                                        addpassword: addpassword,
                                        addplant: addplant
                                    }
                                })
                                path.done(function(rs) {
                                    alert(rs)
                                    if (rs === "true") {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'You have Successfully Add Employee.',
                                            confirmButtonColor: '#D80032'

                                        }).then(function() {
                                            window.location.href = "<?php echo base_url() ?>Manage/ManageUserWeb";
                                        })
                                    } else if (rs == "Select group permission") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Group Permission is Empty',
                                            confirmButtonColor: '#D80032'
                                        })
                                    } else if (rs == "Select plant") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Plant of Employee is Empty',
                                            confirmButtonColor: '#D80032'
                                        })
                                    } else if (rs == "duplicate") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Email is Duplicate',
                                            confirmButtonColor: '#D80032'
                                        })
                                    } else if (rs == "empduplicate") {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Employee Code is Duplicate',
                                            confirmButtonColor: '#D80032'
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'You Failed to Add Employee',
                                            confirmButtonColor: '#D80032'
                                        })
                                    }
                                })

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Email is incorrect',
                                    confirmButtonColor: '#D80032'
                                })
                            }
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Cannot insert special character in Last Name',
                                confirmButtonColor: '#D80032'
                            })

                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Cannot insert special character in First Name',
                            confirmButtonColor: '#D80032'
                        })
                    }

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Cannot insert special character in Employee Code',
                        confirmButtonColor: '#D80032'
                    })

                }
            }
        }
    };

    function getDataEditUserWeb(ss_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditManageUserWeb?ss_id=" + ss_id,
        })
        path.done(function(rs) {
            $("#editempcode").val(rs[0]["ss_emp_code"]);
            $("#editfirstname").val(rs[0]["ss_emp_fname"]);
            $("#editlastname").val(rs[0]["ss_emp_lname"]);
            $("#editgrouppermissionuserweb").val(rs[0]["spg_id"]);
            $("#editemailaddress").val(rs[0]["ss_email"]);
            $("#editplant").val(rs[0]["mpa_id"]);

        })
    };

    function saveEditUserWeb() {
        var editempcode = $("#editempcode").val();
        var editfirstname = $("#editfirstname").val();
        var editlastname = $("#editlastname").val();
        var editgroup = $("#editgrouppermissionuserweb").val();
        var editemail = $("#editemailaddress").val();
        var editplant = $("#editplant").val();

        var checkeditempcode = document.getElementById("editempcode");
        var checkeditfirstname = document.getElementById("editfirstname");
        var checkeditlastname = document.getElementById("editlastname");
        var checkeditgroup = document.getElementById("editgrouppermissionuserweb");
        var checkeditemailaddress = document.getElementById("editemailaddress");
        var checkeditplant = document.getElementById("editplant");


        if (checkeditempcode.value == "" || checkeditfirstname.value == "" || checkeditlastname.value == "" ||
            checkeditgroup.value == "" || checkeditemailaddress.value == "" || checkeditplant.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox someone is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/saveEditUserWeb",
                data: {
                    empcode: editempcode,
                    editfirstname: editfirstname,
                    editlastname: editlastname,
                    groupper: editgroup,
                    editemail: editemail,
                    editplant: editplant
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: 'You have successfully Edit Employee',
                        confirmButtonColor: '#D80032'
                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageUserWeb";
                    })
                } else if (rs == "Select group permission") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Group Permission is Empty',
                        confirmButtonColor: '#D80032'
                    })
                } else if (rs == "Select plant") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Plant of Employee is Empty',
                        confirmButtonColor: '#D80032'
                    })
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Email is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data not found',
                        text: 'You Failed to Edit Employee',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };
    // ************************************************************** Manage Permission Web **************************************************************
    $("#btnSaveAddPermissionWeb").click(function() {
        addPermissionWeb()
    });
    $("#btnSaveEditPermissionWeb").click(function() {
        SaveEditPermissionWeb()
    })

    function statusPermission(spg_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPermissionWeb?spg_id=" + spg_id,
        })
        window.location.href = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
    };




    function addPermissionWeb() {
        var addPermissionwebname = $('#addPermissionwebname').val();
        var dataSubMenuId = []
        var checkaddPermissionwebname = document.getElementById("addPermissionwebname");
        jQuery("input[name='checkboxsubmenu']").each(function(key, values) {
            // setค่าให้เป็น input เพื่อมองว่า checkbox เป็น input โดย name ก็คือชื่อ  html checkbox ใน view 
            //  .each หมายถึงการวนลูปออก(ในหน้าviewsจะเป็นการวนลูปเข้า) โดย key คือ index วนตามลำดับ(0,1,2,..) 
            //   และ values ก็คือค่าที่ถูกกำหนดใน checkbox นั้น 
            if (this.checked == true) {
                // this.checked = ถ้าตัวมันเองถูก check (เพราะเป็นcheckbox) ก็จะทำเงื่อนไข
                dataSubMenuId[key] = this.value
                // this.value คือการเก็บ values ที่อยู่ใน checkbox ออกมาใส่ array key

            }
        });
        if (checkaddPermissionwebname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addPermissionwebname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddManagePermissionWeb",
                    data: {
                        addPermissionwebname: addPermissionwebname,
                        dataSubMenuId: dataSubMenuId
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Permission.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                        })
                    } else if (rs === "perwebduplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Permission Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add Permission',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Permission Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    $(document).ready(function() {
        $("#dropdownmenuper").change(function() {
            load_data()
        })

    })

    function getDataEditPermissionWeb(spg_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditPermissionWeb?spg_id=" + spg_id,
        })
        path.done(function(rs) {
            $("#editPermissionwebname").val(rs[0]["spg_name"]);
            $("#idPername").val(rs[0]["spg_id"]);
            load_data()
        })
    };

    // ------------------------------------------------ กด dropdown อันแรกแล้วโชว์ข้อมูลใส่ dropdown อีกอัน ------------------------------------------------

    function load_data() {
        var dropdownmenuper = $("#dropdownmenuper").val();
        $.ajax({
                url: "<?php echo base_url(); ?>Manage/loadSubMenu",
                method: 'POST',
                dataType: "json",
                data: {
                    dropdownmenuper: dropdownmenuper
                }
            })
            .done(function(rs) {

                var obj = JSON.parse(rs);
                var data = ""
                $.each(obj, function(key, value) {
                    data += " <option value= '" + value["ssm_id"] + "'>" + value["ssm_name_submenu"] + "</option>"
                })

                $("#dropdowneditsubmenuper").html(data)
            })
    }

    function SaveEditPermissionWeb() {
        var editPermissionwebname = $("#editPermissionwebname").val();
        var dropdowneditsubmenuper = $("#dropdowneditsubmenuper").val();
        var idper = $("#idPername").val();
        var checkeditPermissionwebname = document.getElementById("editPermissionwebname");
        var checkdropdowneditsubmenuper = document.getElementById("dropdowneditsubmenuper");

        if (checkeditPermissionwebname.value == "" || checkdropdowneditsubmenuper.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
            });
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditManagePermissionWeb",
                data: {
                    idper: idper,
                    editPermissionwebname: editPermissionwebname,
                    dropdowneditsubmenuper: dropdowneditsubmenuper
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Permission is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                        });
                    });
                } else if (rs === "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Permission menu is duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else if (rs === "cantupdate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cannot Edit Permission',
                        confirmButtonColor: '#D80032'
                    })
                } else if (rs === "updatename") {
                    swal({
                        title: "Success",
                        text: "Permission Name is Updated!",
                        type: "success",
                        confirmButtonColor: '#D80032'
                    }, function() {
                        window.location = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Permission',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }

    // ------------------------------------------------ Ajax การโชว์ tableinfo  ------------------------------------------------


    function GetDetail(rs) {
        // alert(rs)
        console.log = ("data ==== > ", rs)
        var tb = ""
        var j = 1
        var i = 0

        $.each(rs, function(key, value1) {
            tb += "<tr><td>" + parseInt(i + 1) + "</td>"
            tb += "<td>" + value1["sm_name_menu"] + "</td>"
            tb += "<td>" + value1["ssm_name_submenu"] + "</td>"
            if (value1["spd_status"] == "1") {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfo" + j + "'  id='statusdetailinfo" + j + "' checked onclick='statusPermissionDetail(" + value1["spd_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfo" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            } else {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfo" + j + "'  id='statusdetailinfo" + j + "'  onclick='statusPermissionDetail(" + value1["spd_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfo" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            }
            tb += "</tr>"
            j++
            i++
        })

        $("#tbsubmenu").html(tb)
    }

    function detailpermissiongroup(spg_id) {

        // $("#idPername").val(spg_id);
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDetailGroup?spg_id=" + spg_id,
        })
        path.done(function(rs) {
            // alert(spd_id)
            GetDetail(rs);
            $("#bodyshow").show("fast")
        })

    };

    function statusPermissionDetail(spd_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPermissionDetailWeb?spd_id=" + spd_id,
        })

    };

    // ************************************************************** Manage Menu  Web **************************************************************


    $("#btnSaveaddMenuWeb").click(function() {
        SaveAddMenuWeb()
    });
    $("#btnSaveEditMenuWeb").click(function() {
        SaveEditMenuWeb()
    });

    $("#btnSaveAddSubMenuWeb").click(function() {
        SaveaddSubMenuWeb()
    });

    $("#btnSaveEditSubMenuWeb").click(function() {
        SaveEditSubMenuWeb()
    });


    function statusManageMenuWeb(sm_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusMenuWeb?sm_id=" + sm_id,
        })
    };

    function SaveAddMenuWeb() {

        var addMenuName = $("#addMenuNameweb").val();

        var checkaddMenuName = document.getElementById("addMenuNameweb");

        if (checkaddMenuName.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageMenuWeb";
            });
        } else {
            if (isValidInput(addMenuName)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddManageMenuWeb",
                    data: {
                        addMenuName: addMenuName
                    }
                })
                path.done(function(rs) {
                    if (rs == "true") {
                        if (rs === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have Successfully Add Menu Web.',
                                confirmButtonColor: '#D80032'

                            }).then(function() {
                                window.location.href = "<?php echo base_url() ?>Manage/ManageMenuWeb";
                            })
                        } else if (rs === "datadupicate") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data is Duplicate',
                                confirmButtonColor: '#D80032'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'You Failed to Add Menu Web',
                                confirmButtonColor: '#D80032'
                            })
                        }
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Menu name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    function getDataManageMenuWeb(sm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataManageMenuWeb?sm_id=" + sm_id,
        })
        path.done(function(rs) {
            $("#IDeditMenuName").val(rs[0]["sm_id"]);
            $("#editMenuName").val(rs[0]["sm_name_menu"]);
        })
    };

    function SaveEditMenuWeb() {

        var IDeditMenuName = $("#IDeditMenuName").val();
        var editMenuName = $("#editMenuName").val();

        var checkEditMenuName = document.getElementById("editMenuName");

        if (checkEditMenuName.value == "") {
            swal({
                title: "warning",
                text: "Please Enter Menu Name ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageMenuWeb";
            });
        } else {
            if (isValidInput(editMenuName)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditManageMenuWeb",
                    data: {
                        IDeditMenuName: IDeditMenuName,
                        editMenuName: editMenuName
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Edit Menu Web.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/ManageMenuWeb";
                        })
                    } else if (rs === "datadupicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Menu Web',
                            confirmButtonColor: '#D80032'
                        })
                    }

                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Menu Name',
                    confirmButtonColor: '#D80032'
                })
            }

        }
    }

    function DetailInfoSubmenu(sm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDetailMenuweb?sm_id=" + sm_id,
        })
        path.done(function(rs) {
            // alert(rs)
            // console.log("rs==>>", rs)
            GetDetailSubMenuWeb(rs);
            $("#bodymenushow").show("fast")
            $("#IDdetailSubMenu").val(sm_id)
        })

    };

    function GetDetailSubMenuWeb(rs) {
        // alert(rs)
        // console.log = ("data ==== > ", rs)
        var tb = ""
        var j = 1
        var i = 0

        $.each(rs, function(key, menuvalue) {
            tb += "<tr><td>" + parseInt(i + 1) + "</td>"
            tb += "<td>" + menuvalue["ssm_name_submenu"] + "</td>"
            if (menuvalue["ssm_status"] == "1") {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfomenu" + j + "'  id='statusdetailinfomenu" + j + "' checked onclick='statusManageSubMenuWeb(" + menuvalue["ssm_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfomenu" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            } else {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfomenu" + j + "'  id='statusdetailinfomenu" + j + "'  onclick='statusManageSubMenuWeb(" + menuvalue["ssm_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfomenu" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            }
            tb += "<td>"
            tb += "<div class=\"text-wrap text-center\" >"
            tb += "<button  class=\"d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm  me-md-2 \"  data-toggle=\"modal\" id=\"EditDetailSubmenu" + j + "\" name =\"EditDetailSubmenu" + j + "\" data-target=\"#moDalEditDetailSubMenu\"  onclick='getDataEditDetailSubmenuWeb(" + menuvalue["ssm_id"] + ")'>"
            tb += "<i class=\"fas fa-edit fa-sm\"></i> Edit</button>"
            tb += "</div>"
            tb += "</td>"
            tb += "</tr>"
            j++
            i++
        })

        $("#tbdetailsubmenu").html(tb)
    }

    function statusManageSubMenuWeb(ssm_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusSubMenuWeb?ssm_id=" + ssm_id,
        })
    };

    function SaveaddSubMenuWeb() {
        var IDdetailSubMenu = $('#IDdetailSubMenu').val()
        var addsubmenuwebname = $('#addsubmenuwebname').val();
        var addsubmenupath = $('#addsubmenupath').val();

        var checkaddsubmenuwebname = document.getElementById("addsubmenuwebname")
        var checkaddmenupath = document.getElementById("addsubmenupath")

        if (checkaddsubmenuwebname.value == "" || checkaddmenupath.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Please enter Data',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (addsubmenuwebname != 0) {
                if (isValidInput(addsubmenuwebname)) {
                    var path = $.ajax({
                        method: "POST",
                        url: "<?php echo base_url(); ?>Manage/AddManageSubMenuWeb",
                        data: {
                            IDdetailSubMenu: IDdetailSubMenu,
                            addsubmenuwebname: addsubmenuwebname,
                            addsubmenupath: addsubmenupath
                        }
                    })
                    path.done(function(rs) {
                        if (rs === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have Successfully Add Submenu Web.',
                                confirmButtonColor: '#D80032'

                            }).then(function() {
                                window.location.href = "<?php echo base_url() ?>Manage/ManageMenuWeb";
                            })
                        } else if (rs === "datadupicate") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data is Duplicate',
                                confirmButtonColor: '#D80032'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'You Failed to Add Submenu Web',
                                confirmButtonColor: '#D80032'
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You failed to Add Submenu ',
                        text: 'Special characters cannot be entered.',
                        confirmButtonColor: '#D80032'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Please enter submenu name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    function getDataEditDetailSubmenuWeb(ssm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditDetailSubmenuWeb?ssm_id=" + ssm_id,
        })
        path.done(function(rs) {
            $("#IDEditdetailSubMenu").val(rs[0]["ssm_id"]);
            $("#editSubmenuWebName").val(rs[0]["ssm_name_submenu"]);
            $("#editsubmenumethod").val(rs[0]["ssm_method"]);
        })
    }


    function SaveEditSubMenuWeb() {
        var IDEditdetailSubMenu = $('#IDEditdetailSubMenu').val()
        var editSubmenuWebName = $('#editSubmenuWebName').val();
        var editMenuPath = $('#editsubmenumethod').val();

        var checkEditSubmenuWebName = document.getElementById("editSubmenuWebName")
        var checkEditMenuPath = document.getElementById("editsubmenumethod")

        if (checkEditSubmenuWebName.value == "" || checkEditMenuPath.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Please enter Data',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditManageSubMenuWeb",
                data: {
                    IDEditdetailSubMenu: IDEditdetailSubMenu,
                    editSubmenuWebName: editSubmenuWebName,
                    editMenuPath: editMenuPath
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Edit Submenu Web.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageMenuWeb";
                    })
                } else if (rs === "datadupicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to edit Menu Web',
                        confirmButtonColor: '#D80032'
                    })
                }
            })

        }
    }

    // *********************************************** Manage User App **************************************************

    $("#btnSaveAddUserApp").click(function() {
        SaveAddUserApp()
    });

    $("#btnSaveEditUserApp").click(function() {
        SaveEditUserApp()
    });

    function statusManageUserApp(ss_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusUserApp?ss_id=" + ss_id,
        })
    };

    function getDataManageUserApp(ss_id) {

        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/getDataManageUserAppUser?ss_id=" + ss_id
        })
        path.done(function(rs) {
            var data = JSON.parse(rs)
            var tb = ""
            var checked = ""
            $("#IDedituserapp").val(data.getdataEdit[0]["ss_id"]);
            $("#editempcodeuserapp").val(data.getdataEdit[0]["ss_emp_code"]);
            $("#editnameapp").val(data.getdataEdit[0]["ss_emp_name"]);
            $.each(data.PermissionAll, function(key, value) {
                // alert(value["spg_name"] + " = " + data.getdataEdit[0]["spg_name"])
                if (value["spg_name"] == data.getdataEdit[0]["spg_name"]) {
                    checked = "selected"
                } else {
                    checked = ""
                }
                tb += "<option value='" + value["spg_id"] + "' " + checked + ">" + value["spg_name"] + "</option>"
            })
            $("#editgrouppermissionuserapp").html(tb);
        })
    };

    function SaveAddUserApp() {
        var addempcodeapp = $('#addempcodeapp').val();
        var addnameapp = $('#addnameapp').val();
        var addgrouppermissionapp = $('#addgrouppermissionapp').val();

        var checkaddempcodeapp = document.getElementById("addempcodeapp");
        var checkaddnameapp = document.getElementById("addnameapp")
        var checkaddgrouppermissionapp = document.getElementById("addgrouppermissionapp")

        if (checkaddempcodeapp.value == "" || checkaddnameapp.value == "" || checkaddgrouppermissionapp.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addempcodeapp)) {
                if (isValidInput(addnameapp)) {
                    var path = $.ajax({
                        method: "POST",
                        url: "<?php echo base_url(); ?>Manage/AddManageUserApp",
                        data: {
                            addempcodeapp: addempcodeapp,
                            addnameapp: addnameapp,
                            addgrouppermissionapp: addgrouppermissionapp
                        }
                    })
                    path.done(function(rs) {
                        if (rs === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have Successfully Add Employee App.',
                                confirmButtonColor: '#D80032'

                            }).then(function() {
                                window.location.href = "<?php echo base_url() ?>Manage/ManageUserApp";
                            })
                        } else if (rs == "Select group permission") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Group Permission is Empty',
                                confirmButtonColor: '#D80032'
                            })
                        } else if (rs == "duplicate") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data is Duplicate',
                                confirmButtonColor: '#D80032'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'You Failed to Add Employee App',
                                confirmButtonColor: '#D80032'
                            })
                        }

                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Cannot insert special character in Employee Name',
                        confirmButtonColor: '#D80032'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Employee Code',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    function SaveEditUserApp() {
        var IDedituserapp = $("#IDedituserapp").val();
        var editempcodeuserapp = $("#editempcodeuserapp").val();
        var editnameapp = $("#editnameapp").val();
        var editgrouppermissionuserapp = $("#editgrouppermissionuserapp").val();
        var editpathpicapp = $("#editpathpicapp").val();

        var checkeditempcodeuserapp = document.getElementById("editempcodeuserapp");
        var checkeditnameapp = document.getElementById("editnameapp");
        var checkeditgrouppermissionuserapp = document.getElementById("editgrouppermissionuserapp");
        var checkeditpathpicapp = document.getElementById("editpathpicapp");


        if (checkeditempcodeuserapp.value == "" || checkeditnameapp.value == "" ||
            checkeditgrouppermissionuserapp == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageUserApp";
            });
        } else {
            if (isValidInput(addempcodeapp)) {
                if (isValidInput(addnameapp)) {
                    var path = $.ajax({
                        method: "GET",
                        url: "<?php echo base_url(); ?>Manage/EditManageUserApp",
                        data: {
                            IDedituserapp: IDedituserapp,
                            editempcodeuserapp: editempcodeuserapp,
                            editnameapp: editnameapp,
                            editgrouppermissionuserapp: editgrouppermissionuserapp
                        }
                    })
                    path.done(function(rs) {
                        if (rs === "true") {
                            Swal.fire({
                                title: "Success",
                                text: "Employee App is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }).then(function() {
                                window.location.href = "<?php echo base_url() ?>Manage/ManageUserApp";
                            })
                        } else if (rs === "duplicate") {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data is Duplicate',
                                confirmButtonColor: '#D80032'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'You Failed to Add Employee App',
                                confirmButtonColor: '#D80032'
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Cannot insert special character in Employee Name',
                        confirmButtonColor: '#D80032'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Employee Code',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }


    // ******************************************* PERMISSION APP **********************************************

    $("#btnSaveAddPermissionApp").click(function() {
        addPermissionApp()
    });
    $("#btnSaveEditPermissionApp").click(function() {
        SaveEditPermissionApp()
    })



    function statusPermissionApp(spg_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPermissionApp?spg_id=" + spg_id,
        })
    };


    function addPermissionApp() {
        var addPermissionappname = $('#addPermissionappname').val();
        var dataMenuAppId = []
        var checkaddPermissionappname = document.getElementById("addPermissionappname");
        jQuery("input[name='checkboxmenuapp']").each(function(key, values) {
            if (this.checked == true) {

                dataMenuAppId[key] = this.value

            }
            console.log("sssssssssssssssss==>", dataMenuAppId[key])
        });

        if (addPermissionappname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else if (dataMenuAppId == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Checkbox is Empty',
                confirmButtonColor: '#D80032'
            })

        } else {
            var path = $.ajax({
                method: "GET",
                url: "<?php echo base_url(); ?>Manage/AddManagePermissionApp",
                data: {
                    addPermissionappname: addPermissionappname,
                    dataMenuAppId: dataMenuAppId
                }
            })
            path.done(function(rs) {
                if (rs == "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Permission.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManagePermisionApp";
                    })
                } else if (rs == "empty") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Type Name is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Permission',
                        confirmButtonColor: '#D80032'
                    })
                }
            })

            // }

        }
    };

    function getDataEditPermissionApp(spg_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditPermissionApp?spg_id=" + spg_id,
        })
        path.done(function(rs) {
            $("#editPermissionappname").val(rs[0]["spg_name"]);
            $("#idPerApp").val(rs[0]["spg_id"]);
        })
    };

    function SaveEditPermissionApp() {
        var idper = $("#idPerApp").val();
        var editPermissionappname = $("#editPermissionappname").val();
        var dropdowneditmenu = $("#dropdowneditmenu").val();

        var checkeditPermissionappname = document.getElementById("editPermissionappname");
        var checkdropdowneditmenu = document.getElementById("dropdowneditmenu");

        if (checkeditPermissionappname.value == "" || checkdropdowneditmenu.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManagePermisionApp";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditManagePermissionApp",
                data: {
                    idper: idper,
                    editPermissionappname: editPermissionappname,
                    dropdowneditmenu: dropdowneditmenu
                }
            })
            path.done(function(rs) {
                alert(rs)
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Permission is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ManagePermisionApp";
                        });
                    });
                } else if (rs == "empty") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Checkbox is Empty',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Permission',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }

    // ---------------------------------------------- Ajax การโชว์ tableinfo App ------------------------------------

    function GetDetailApp(rs) {
        // alert(rs)
        console.log = ("data ==== > ", rs)
        var tb = ""
        var j = 1
        var i = 0

        $.each(rs, function(key, value2) {
            tb += "<tr><td>" + parseInt(i + 1) + "</td>"
            tb += "<td>" + value2["sm_menu"] + "</td>"
            if (value2["spd_status"] == "1") {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfo" + j + "'  id='statusdetailinfo" + j + "' checked onclick='statusPermissionDetailApp(" + value2["spd_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfo" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            } else {
                tb += "<td>"
                tb += "<div class=\"custom-switch text-center\" >"
                tb += "<input type=\"checkbox\" class=\"custom-control-input\" name='statusdetailinfo" + j + "'  id='statusdetailinfo" + j + "'  onclick='statusPermissionDetailApp(" + value2["spd_id"] + ")'>"
                tb += "<label class=\"custom-control-label\" for='statusdetailinfo" + j + "' ></label>"
                tb += "</div>"
                tb += "</td>"
            }
            tb += "</tr>"
            j++
            i++
        })

        $("#tbmenuapp").html(tb)
    }

    function detailpergroupapp(spg_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDetailGroupApp?spg_id=" + spg_id,
        })
        path.done(function(rs) {
            GetDetailApp(rs);
            $("#bodyappshow").show("fast")
        })

    };

    function statusPermissionDetailApp(spd_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPermissionDetailApp?spd_id=" + spd_id,
        })

    };

    // ******************************************************* Manage Menu App ***************************************************


    $("#btnSaveAddMenuApp").click(function() {
        SaveAddMenuApp()
    });
    $("#btnSaveEditMenuApp").click(function() {
        SaveEditMenuApp()
    })



    function SaveAddMenuApp() {
        var addmenuappname = $('#addmenuappname').val()
        var addmenupathapp = $('#addmenupathapp').val()
        var addmenupicapp = $('#addmenupicapp').val()

        var checkaddmenuappname = document.getElementById("addmenuappname")
        var checkaddmenupathapp = document.getElementById("addmenupathapp")
        var checkaddmenupicapp = document.getElementById("addmenupicapp")

        if (checkaddmenuappname.value == "" || checkaddmenupathapp.value == "" || checkaddmenupicapp.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addmenuappname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddManageMenuApp",
                    data: {
                        addmenuappname: addmenuappname,
                        addmenupathapp: addmenupathapp,
                        addmenupicapp: addmenupicapp,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Menu App.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/ManageMenuApp";
                        })
                    } else if (rs === "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Data is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add Menu App',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Menu Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function statusMenuApp(sm_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusMenuApp?sm_id=" + sm_id,
        })
    };


    function getDataEditMenuApp(sm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditMenuApp?sm_id=" + sm_id,
        })
        path.done(function(rs) {
            $("#editmenuappid").val(rs[0]["sm_id"]);
            $("#editmenuappname").val(rs[0]["sm_menu"]);
            $("#editmenupathapp").val(rs[0]["sm_path"]);
            $("#editmenupicapp").val(rs[0]["sm_pic"]);
        })
    };


    function SaveEditMenuApp() {
        var editmenuappid = $('#editmenuappid').val()
        var editmenuappname = $('#editmenuappname').val()
        var editmenupathapp = $('#editmenupathapp').val()
        var editmenupicapp = $('#editmenupicapp').val()

        var checkeditmenuappid = document.getElementById("editmenuappid");
        var checkeditmenuappname = document.getElementById("editmenuappname");
        var checkeditmenupathapp = document.getElementById("editmenupathapp");
        var checkeditmenupicapp = document.getElementById("editmenupicapp");


        if (checkeditmenuappid.value == "" || checkeditmenuappname.value == "" ||
            checkeditmenupathapp.value == "" || checkeditmenupicapp == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageMenuApp";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditManageMenuApp",
                data: {
                    editmenuappid: editmenuappid,
                    editmenuappname: editmenuappname,
                    editmenupathapp: editmenupathapp,
                    editmenupicapp: editmenupicapp
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Menu App is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ManageMenuApp";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Menu App',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }

    // *********************************************** Mst Control Check Type ************************************************** 




    $("#btnSaveAddCheckType").click(function() {
        SaveAddCheckType()
    });
    $("#btnSaveEditCheckType").click(function() {
        SaveEditCheckType()
    })


    function statusCheckType(mct_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusChecktype?mct_id=" + mct_id,
        })
    };


    function SaveAddCheckType() {
        var addparttypename = $('#addparttypename').val()

        var checkaddparttypename = document.getElementById("addparttypename")

        if (checkaddparttypename.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addparttypename)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddCheckType",
                    data: {
                        addparttypename: addparttypename,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Type Part.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/CheckType";
                        })
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Type Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add  Type Part',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Type Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function getDataCheckType(mct_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditCheckType?mct_id=" + mct_id,
        })
        path.done(function(rs) {

            $("#editparttypeName").val(rs[0]["mct_name"]);
            $("#IDeditparttype").val(rs[0]["mct_id"]);
        })
    };


    function SaveEditCheckType() {
        var IDeditparttype = $('#IDeditparttype').val()
        var editparttypeName = $('#editparttypeName').val()

        var checkIDeditparttype = document.getElementById("IDeditparttype");
        var checkeditparttypeName = document.getElementById("editparttypeName");


        if (checkIDeditparttype.value == "" || checkeditparttypeName.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/CheckType";
            });
        } else {
            if (isValidInput(editparttypeName)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditCheckType",
                    data: {
                        IDeditparttype: IDeditparttype,
                        editparttypeName: editparttypeName
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Type is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/CheckType";
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Type',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Type Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    // *********************************************** Mst Control Check Status ************************************************** 
    $("#btnSaveAddStatus").click(function() {
        SaveAddStatus()
    });
    $("#btnSaveEditStatus").click(function() {
        SaveEditCheckStatus()
    })


    function statusCheckStatus(mcs_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusCheckStatus?mcs_id=" + mcs_id,
        })
    };


    function SaveAddStatus() {
        var addstatusname = $('#addstatusname').val()

        var checkaddstatusname = document.getElementById("addstatusname")

        if (checkaddstatusname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addstatusname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddStatus",
                    data: {
                        addstatusname: addstatusname,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Status.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/CheckStatus";
                        })
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Type Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add  Status',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Status Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function getDataCheckStatus(mcs_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditCheckStatus?mcs_id=" + mcs_id,
        })
        path.done(function(rs) {

            $("#editStatusName").val(rs[0]["mcs_name"]);
            $("#IDeditStatusName").val(rs[0]["mcs_id"]);
        })
    };


    function SaveEditCheckStatus() {
        var IDeditStatusName = $('#IDeditStatusName').val()
        var editStatusName = $('#editStatusName').val()

        var checkIDeditStatusName = document.getElementById("IDeditStatusName");
        var checkeditStatusName = document.getElementById("editStatusName");


        if (checkIDeditStatusName.value == "" || checkeditStatusName.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/CheckStatus";
            });
        } else {
            if (isValidInput(editStatusName)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditCheckStatus",
                    data: {
                        IDeditStatusName: IDeditStatusName,
                        editStatusName: editStatusName
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Status Name is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/CheckStatus";
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Status Name',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Status Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    // ********************************************************* mst Inspection ********************************************

    $("#btnSaveAddInspection").click(function() {
        SaveAddInspection()
    });
    $("#btnSaveEditInspection").click(function() {
        SaveEditInspection()
    })


    function statusInspection(mit_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusInspection?mit_id=" + mit_id,
        })
    };

    function SaveAddInspection() {
        var addinspectiontype = $('#addinspectiontype').val()

        var checkinspection = document.getElementById("addinspectiontype")

        if (checkinspection.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addinspectiontype)) {

                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddInspection",
                    data: {
                        addinspectiontype: addinspectiontype,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Inspection.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/InspectionType";
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add  Inspection',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Inspection Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function getDataInspection(mit_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditInspection?mit_id=" + mit_id,
        })
        path.done(function(rs) {

            $("#editInspectionName").val(rs[0]["mit_name"]);
            $("#IDeditInspectionName").val(rs[0]["mit_id"]);
        })
    };


    function SaveEditInspection() {
        var IDeditInspectionName = $('#IDeditInspectionName').val()
        var editInspectionName = $('#editInspectionName').val()

        var checkIDeditInspectionName = document.getElementById("IDeditInspectionName");
        var checkeditInspectionName = document.getElementById("editInspectionName");


        if (checkIDeditInspectionName.value == "" || checkeditInspectionName.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/InspectionType";
            });
        } else {
            if (isValidInput(editInspectionName)) {

                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditInspection",
                    data: {
                        IDeditInspectionName: IDeditInspectionName,
                        editInspectionName: editInspectionName
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Inspection Name is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/InspectionType";
                            });
                        });
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Inspection Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Inspection Name',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Inspection Type',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    // __________________________________________ mst DMC DATA_________________________________________

    $("#btnSaveAddDmc").click(function() {
        SaveAddDMC()
    });
    $("#btnSaveEditDmc").click(function() {
        SaveEditDMC()
    })


    function statusDMC(mdd_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusDMC?mdd_id=" + mdd_id
        })
    };


    function SaveAddDMC() {
        var adddmcname = $('#adddmcname').val()

        var checkadddmcname = document.getElementById("adddmcname")

        if (checkadddmcname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(adddmcname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddDMCData",
                    data: {
                        adddmcname: adddmcname,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add DMC Data.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/DMCData";
                        })
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'DMC Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add  DMC Data',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in DMC Name',
                    confirmButtonColor: '#D80032'
                })
            }

        }
    };


    function getDataDMC(mdd_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditDMC?mdd_id=" + mdd_id,
        })
        path.done(function(rs) {

            $("#editdmcname").val(rs[0]["mdd_name"]);
            $("#IDeditdmcname").val(rs[0]["mdd_id"]);
        })
    };

    function SaveEditDMC() {
        var IDeditdmcname = $('#IDeditdmcname').val()
        var editdmcname = $('#editdmcname').val()

        var checkIDeditdmcname = document.getElementById("IDeditdmcname");
        var checkeditdmcname = document.getElementById("editdmcname");


        if (checkIDeditdmcname.value == "" || checkeditdmcname.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/DMCData";
            });
        } else {
            if (isValidInput(editdmcname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditDMC",
                    data: {
                        IDeditdmcname: IDeditdmcname,
                        editdmcname: editdmcname
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "DMC Data  is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/DMCData";
                            });
                        });
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'DMC Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit DMC Data',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in DMC name',
                    confirmButtonColor: '#D80032'
                })
            }

        }
    }


    // **************************************************** mst  DMC TYPE **********************************



    $("#btnSaveAddDmcType").click(function() {
        SaveAddDMCType()
    });
    $("#btnSaveEditDmcType").click(function() {
        SaveEditDMCType()
    })


    function statusDMCType(mdt_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusDMCType?mdt_id=" + mdt_id
        })
    };

    function SaveAddDMCType() {
        var adddmctypename = $('#adddmctypename').val()
        var adddmcdigit = $('#adddmcdigit').val()

        var checkadddmctypename = document.getElementById("adddmctypename")
        var checkadddmcdigit = document.getElementById("adddmcdigit")

        if (checkadddmctypename.value == "", checkadddmcdigit.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(adddmctypename)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddDMCType",
                    data: {
                        adddmctypename: adddmctypename,
                        adddmcdigit: adddmcdigit
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add DMC Type.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/DMCType";
                        })
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'DMC is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add  DMC Type',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in DMC Type Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };


    function getDataDMCType(mdt_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditDMCType?mdt_id=" + mdt_id,
        })
        path.done(function(rs) {
            $("#editdmctypename").val(rs[0]["mdt_name"]);
            $("#IDeditdmctype").val(rs[0]["mdt_id"]);
            $("#editdmcdigit").val(rs[0]["mdt_digit"]);

        })
    };

    function SaveEditDMCType(mdt_id) {
        var IDeditdmctype = $('#IDeditdmctype').val()
        var editdmctypename = $('#editdmctypename').val()
        var editdmcdigit = $("#editdmcdigit").val()

        var checkIDeditdmctype = document.getElementById("IDeditdmctype");
        var checkeditdmctypename = document.getElementById("editdmctypename");
        var checkeditdmcdigit = document.getElementById("editdmcdigit");


        if (checkeditdmctypename.value == "" || checkeditdmcdigit.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/DMCType";
            });
        } else {
            if (isValidInput(editdmctypename)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditDMCType",
                    data: {
                        IDeditdmctype: IDeditdmctype,
                        editdmctypename: editdmctypename,
                        editdmcdigit: editdmcdigit
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "DMC Type  is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/DMCType";
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit DMC Type',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in DMC Type Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }

    }


    // **************************************************** mst  FA CODE  **********************************


    $("#btnSaveAddFaCode").click(function() {
        SaveAddFACode()
    });
    $("#btnSaveEditFaCode").click(function() {
        SaveEditFACode()
    })


    function statusFACodeMaster(mfcm_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusFACode?mfcm_id=" + mfcm_id
        })
    };



    function SaveAddFACode() {
        var addfaline = $('#addfaline').val()
        var addfaname = $('#addfaname').val()

        var checkaddfaline = document.getElementById("addfaline")
        var checkaddfaname = document.getElementById("addfaname")

        if (checkaddfaline.value == "", checkaddfaname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addfaline)) {
                if (isValidInput(addfaname)) {
                    var path = $.ajax({
                        method: "POST",
                        url: "<?php echo base_url(); ?>Manage/AddFACode",
                        data: {
                            addfaline: addfaline,
                            addfaname: addfaname
                        }
                    })
                    path.done(function(rs) {
                        if (rs === "true") {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have Successfully Add FA Code.',
                                confirmButtonColor: '#D80032'

                            }).then(function() {
                                window.location.href = "<?php echo base_url() ?>Manage/FACode";
                            })
                        } else if (rs == "duplicate") {
                            Swal.fire({
                                icon: 'error',
                                title: 'FA Name is Duplicate',
                                confirmButtonColor: '#D80032'
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'You Failed to Add  FA Code',
                                confirmButtonColor: '#D80032'
                            })
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Cannot insert special character in FA name',
                        confirmButtonColor: '#D80032'
                    })
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in FA Line',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };


    function getDataFACode(mfcm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditFACode?mfcm_id=" + mfcm_id,
        })
        path.done(function(rs) {
            $("#IDeditfacode").val(rs[0]["mfcm_id"]);
            $("#editfaline").val(rs[0]["mfcm_line_code"]);
            $("#editfaname").val(rs[0]["mfcm_name_code"]);

        })
    };

    function SaveEditFACode(mfcm_id) {
        var IDeditfacode = $('#IDeditfacode').val()
        var editfaline = $('#editfaline').val()
        var editfaname = $('#editfaname').val()

        var checkIDeditfacode = document.getElementById("IDeditfacode");
        var checkeditfaline = document.getElementById("editfaline");
        var checkeditfaname = document.getElementById("editfaname");


        if (checkIDeditfacode.value == "" || checkeditfaline.value == "" || checkeditfaname.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/FACode";
            });
        } else {
            if (isValidInput(editfaname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditFACode",
                    data: {
                        IDeditfacode: IDeditfacode,
                        editfaline: editfaline,
                        editfaname: editfaname
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "FA Code is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/FACode";
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit FA Code',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in FA name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }

    // ********************************************************* mst WORK SHIFT **************************************************************



    $("#btnSaveAddWorkShift").click(function() {
        SaveAddWorkShift()
    });
    $("#btnSaveEditWorkShift").click(function() {
        SaveEditWorkShift()
    })


    function statusWorkShift(mws_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusWorkShift?mws_id=" + mws_id
        })
    };


    function SaveAddWorkShift() {
        var addshift = $('#addshift').val()
        var addstarttime = $('#addstarttime').val()
        var addendtime = $('#addendtime').val()

        var checkaddshift = document.getElementById("addshift")
        var checkaddstarttime = document.getElementById("addstarttime")
        var checkaddendtime = document.getElementById("addendtime")

        if (checkaddshift.value == "" || checkaddstarttime.value == "" || checkaddendtime == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddWorkShift",
                data: {
                    addshift: addshift,
                    addstarttime: addstarttime,
                    addendtime: addendtime
                }
            })
            path.done(function(rs) {
                if (rs == "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Work Shift.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/WorkShift";
                    })
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'WorkShift is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Work Shift',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };


    function getDataWorkShift(mws_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditWorkShift?mws_id=" + mws_id,
        })
        path.done(function(rs) {
            $("#IDeditworkshift").val(rs[0]["mws_id"]);
            $("#editshift").val(rs[0]["mws_shift"]);
            $("#editstarttime").val(rs[0]["mws_time_start"]);
            $("#editendtime").val(rs[0]["mws_time_end"]);

        })
    };


    function SaveEditWorkShift(mws_id) {
        var IDeditworkshift = $('#IDeditworkshift').val()
        var editshift = $('#editshift').val()
        var editstarttime = $('#editstarttime').val()
        var editendtime = $('#editendtime').val()

        var checkIDeditworkshift = document.getElementById("IDeditworkshift");
        var checkeditshift = document.getElementById("editshift");
        var checkeditstarttime = document.getElementById("editstarttime");
        var checkeditendtime = document.getElementById("editendtime");


        if (checkIDeditworkshift.value == "" || checkeditshift.value == "" ||
            checkeditstarttime.value == "" || checkeditendtime.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/WorkShift";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditWorkShift",
                data: {
                    IDeditworkshift: IDeditworkshift,
                    editshift: editshift,
                    editstarttime: editstarttime,
                    editendtime: editendtime
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Work Shift is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/WorkShift";
                        });
                    });
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'WorkShift is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Work Shift',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }


    // ********************************************************* mst DEFECT **************************************************************


    $("#btnSaveAddDefect").click(function() {
        SaveAddDefect()
    });
    $("#btnSaveEditDefect").click(function() {
        SaveEditDefect()
    })


    function statusDefect(md_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusDefect?md_id=" + md_id
        })
    };


    function SaveAddDefect() {
        var adddefectcode = $('#adddefectcode').val()
        var adddefectnameth = $('#adddefectnameth').val()
        var adddefectnameen = $('#adddefectnameen').val()

        var checkadddefectcode = document.getElementById("adddefectcode");
        var checkadddefectnameth = document.getElementById("adddefectnameth");
        var checkadddefectnameen = document.getElementById("adddefectnameen");

        if (checkadddefectcode.value == "" || checkadddefectnameth.value == "" || checkadddefectnameen.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddDefect",
                data: {
                    adddefectcode: adddefectcode,
                    adddefectnameth: adddefectnameth,
                    adddefectnameen: adddefectnameen
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Defect.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/Defect";
                    })
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Defect Code is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Defect',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };


    function getDataDefect(md_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditDefect?md_id=" + md_id,
        })
        path.done(function(rs) {
            $("#IDeditdefect").val(rs[0]["md_id"]);
            $("#editdefectcode").val(rs[0]["md_defect_code"]);
            $("#editdefectnameth").val(rs[0]["md_defect_th_name"]);
            $("#editdefectnameen").val(rs[0]["md_defect_en_name"]);

        })
    };


    function SaveEditDefect(md_id) {
        var IDeditdefect = $('#IDeditdefect').val()
        var editdefectcode = $('#editdefectcode').val()
        var editdefectnameth = $('#editdefectnameth').val()
        var editdefectnameen = $('#editdefectnameen').val()

        var checkIDeditdefect = document.getElementById("IDeditdefect");
        var checkeditdefectcode = document.getElementById("editdefectcode");
        var checkeditdefectnameth = document.getElementById("editdefectnameth");
        var checkeditdefectnameen = document.getElementById("editdefectnameen");


        if (checkIDeditdefect.value == "" || checkeditdefectcode.value == "" ||
            checkeditdefectnameth.value == "" || checkeditdefectnameen.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/Defect";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditDefect",
                data: {
                    IDeditdefect: IDeditdefect,
                    editdefectcode: editdefectcode,
                    editdefectnameth: editdefectnameth,
                    editdefectnameen: editdefectnameen
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Defect is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/Defect";
                        });
                    });
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Defect Code is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Defect',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }


    // ****************************************************** mst Part Number ******************************************************


    $("#btnSaveAddPartNo").click(function() {
        SaveAddPartNo()
    });
    $("#btnSaveEditPartNo").click(function() {
        SaveEditPartNo()
    })


    function statusPartNo(mpn_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPartNo?mpn_id=" + mpn_id
        })
    };



    function SaveAddPartNo() {
        var addpartnumber = $('#addpartnumber').val()
        var addcuspartno = $('#addcuspartno').val()
        var addlocationpart = $('#addlocationpart').val()
        var adddmccheckpart = $('#adddmccheckpart').val()

        var checkaddpartnumber = document.getElementById("addpartnumber");
        var checkaddcuspartno = document.getElementById("addcuspartno");
        var checkaddlocationpart = document.getElementById("addlocationpart");
        var checkadddmccheckpart = document.getElementById("adddmccheckpart");

        if (checkaddpartnumber.value == "" || checkaddcuspartno.value == "" ||
            checkaddlocationpart.value == "" || checkadddmccheckpart.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddPartNo",
                data: {
                    addpartnumber: addpartnumber,
                    addcuspartno: addcuspartno,
                    addlocationpart: addlocationpart,
                    adddmccheckpart: adddmccheckpart
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Part Number.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PartNumber";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Part Number',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };

    function getDataPartNo(mpn_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditPartNo?mpn_id=" + mpn_id,
        })
        path.done(function(rs) {
            $("#IDeditpartno").val(rs[0]["mpn_id"]);
            $("#editpartnumber").val(rs[0]["mpn_part_no"]);
            $("#editcuspartno").val(rs[0]["mpn_cus_part_no"]);
            $("#editlocationpart").val(rs[0]["mpn_location"]);
            $("#editdmccheckpart").val(rs[0]["mpn_dmc_check"]);

        })
    };


    function SaveEditPartNo(mpn_id) {
        var IDeditpartno = $('#IDeditpartno').val()
        var editpartnumber = $('#editpartnumber').val()
        var editcuspartno = $('#editcuspartno').val()
        var editlocationpart = $('#editlocationpart').val()
        var editdmccheckpart = $('#editdmccheckpart').val()

        var checkIDeditpartno = document.getElementById("IDeditpartno");
        var checkeditpartnumber = document.getElementById("editpartnumber");
        var checkeditcuspartno = document.getElementById("editcuspartno");
        var checkeditlocationpart = document.getElementById("editlocationpart");
        var checkeditdmccheckpart = document.getElementById("editdmccheckpart");

        if (checkIDeditpartno.value == "" || checkeditpartnumber.value == "" ||
            checkeditcuspartno.value == "" || checkeditlocationpart.value == "" ||
            checkeditdmccheckpart.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/PartNumber";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditPartNumber",
                data: {
                    IDeditpartno: IDeditpartno,
                    editpartnumber: editpartnumber,
                    editcuspartno: editcuspartno,
                    editlocationpart: editlocationpart,
                    editdmccheckpart: editdmccheckpart
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Part Number is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/PartNumber";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Part Number',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    }
    // ******************************************************mst  Select Part ******************************************************

    $("#btnSaveAddSelectPart").click(function() {
        SaveAddSelectPart()
    });
    $("#btnSaveEditSelectPart").click(function() {
        SaveEditSelectPart()
    })


    function statusSelectPart(msp_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusSelectPart?msp_id=" + msp_id
        })
    };


    function SaveAddSelectPart() {
        var addselectConfig = $('#addselectConfig').val()
        var addselectpno = $('#addselectpno').val()
        var addselectpname = $('#addselectpname').val()


        var checkaddselectpCon = document.getElementById("addselectConfig");
        var checkaddselectpno = document.getElementById("addselectpno");
        var checkaddselectpname = document.getElementById("addselectpname");

        if (checkaddselectpCon.value == "" ||
            checkaddselectpno.value == "" || checkaddselectpname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addselectpname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddSelectPart",
                    data: {
                        addselectConfig: addselectConfig,
                        addselectpno: addselectpno,
                        addselectpname: addselectpname
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Select Part.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/SelectPart";
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add Select Part',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Part Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function getDataSelectPart(msp_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditSelectpart?msp_id=" + msp_id,
        })
        path.done(function(rs) {
            $("#IDeditselectp").val(rs[0]["msp_id"]);
            $("#editselectpCon").val(rs[0]["mcd_id"]);
            $("#editselectpno").val(rs[0]["msp_part_no"]);
            $("#editselectpname").val(rs[0]["msp_part_name"]);
            $("#editselectptime").val(rs[0]["msp_inspection_time"]);

        })
    };

    function SaveEditSelectPart(mpn_id) {
        var IDeditselectp = $('#IDeditselectp').val()
        var editselectpCon = $('#editselectpCon').val()
        var editselectpno = $('#editselectpno').val()
        var editselectpname = $('#editselectpname').val()

        var checkIDeditselectp = document.getElementById("IDeditselectp");
        var checkeditselectpCon = document.getElementById("editselectpCon");
        var checkeditselectpno = document.getElementById("editselectpno");
        var checkeditselectpname = document.getElementById("editselectpname");

        if (checkeditselectpCon.value == "" ||
            checkeditselectpno.value == "" || checkeditselectpname.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/SelectPart";
            });
        } else {
            if (isValidInput(editselectpname)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditSelectPart",
                    data: {
                        IDeditselectp: IDeditselectp,
                        editselectpCon: editselectpCon,
                        editselectpno: editselectpno,
                        editselectpname: editselectpname
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Select Part is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/SelectPart";
                            });
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Select Part',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Part Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    }


    // ****************************************************** mst Plant Admin Web  ******************************************************


    $("#btnSaveAddPlantAdminWeb").click(function() {
        SaveAddPlantAdminWeb()
    });
    $("#btnSaveEditPlantAdminWeb").click(function() {
        SaveEditPlantAdminWeb()
    })


    function statusPlantAdminWeb(mpa_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPlantAdminWeb?mpa_id=" + mpa_id
        })
    };


    function SaveAddPlantAdminWeb() {
        var addplantwebphase = $('#addplantwebphase').val()
        var addplantwebname = $('#addplantwebname').val()

        var checkaddplantwebphase = document.getElementById("addplantwebphase");
        var checkplantwebname = document.getElementById("addplantwebname");

        if (checkaddplantwebphase.value == "" || checkplantwebname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddPlantAdminWeb",
                data: {
                    addplantwebphase: addplantwebphase,
                    addplantwebname: addplantwebname
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Plant Web.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PlantAdminWeb";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Plant Web',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };

    function getDataPlantAdminWeb(mpa_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditPlantAdminWeb?mpa_id=" + mpa_id,
        })
        path.done(function(rs) {
            $("#IDeditplantweb").val(rs[0]["mpa_id"]);
            $("#editplantwebphase").val(rs[0]["mpa_phase_plant"]);
            $("#editplantwebname").val(rs[0]["mpa_name"]);

        })
    };



    function SaveEditPlantAdminWeb(mpa_id) {
        var IDeditplantweb = $('#IDeditplantweb').val()
        var editplantwebphase = $('#editplantwebphase').val()
        var editplantwebname = $('#editplantwebname').val()

        var checkIDeditplantweb = document.getElementById("IDeditplantweb");
        var checkeditplantwebphase = document.getElementById("editplantwebphase");
        var checkeditplantwebname = document.getElementById("editplantwebname");

        if (checkIDeditplantweb.value == "" || checkeditplantwebphase.value == "" ||
            checkeditplantwebname.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/PlantAdminWeb";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditPlantAdminWeb",
                data: {
                    IDeditplantweb: IDeditplantweb,
                    editplantwebphase: editplantwebphase,
                    editplantwebname: editplantwebname,
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Plant Web is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/PlantAdminWeb";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Plant Web',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    };

    // / ***************************************************** MST Plant Admin App *******************************************************


    $("#btnSaveAddPlantAdminApp").click(function() {
        SaveAddPlantAdminApp()
    });
    $("#btnSaveEditPlantAdminApp").click(function() {
        SaveEditPlantAdminApp()
    })


    function statusPlantAdminApp(mpa_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPlantAdminApp?mpa_id=" + mpa_id
        })
    };


    function SaveAddPlantAdminApp() {
        var addplantadminappphase = $('#addplantadminappphase').val()
        var addplantadminappname = $('#addplantadminappname').val()

        var checkaddplantappphase = document.getElementById("addplantadminappphase");
        var checkplantappname = document.getElementById("addplantadminappname");

        if (checkaddplantappphase.value == "" || checkplantappname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddPlantAdminApp",
                data: {
                    addplantadminappphase: addplantadminappphase,
                    addplantadminappname: addplantadminappname
                }
            })
            path.done(function(rs) {
                alert(rs)
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Plant App.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PlantAdminApp";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Plant App',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };

    function getDataPlantAdminApp(mpa_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditPlantAdminApp?mpa_id=" + mpa_id,
        })
        path.done(function(rs) {
            $("#IDeditplantapp").val(rs[0]["mpa_id"]);
            $("#editplantappphase").val(rs[0]["mpa_phase_plant"]);
            $("#editplantappname").val(rs[0]["mpa_name"]);

        })
    };



    function SaveEditPlantAdminApp(mpa_id) {
        var IDeditplantapp = $('#IDeditplantapp').val()
        var editplantappphase = $('#editplantappphase').val()
        var editplantappname = $('#editplantappname').val()

        var checkIDeditplantapp = document.getElementById("IDeditplantapp");
        var checkeditplantappphase = document.getElementById("editplantappphase");
        var checkeditplantappname = document.getElementById("editplantappname");

        if (checkIDeditplantapp.value == "" || checkeditplantappphase.value == "" ||
            checkeditplantappname.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/PlantAdminApp";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditPlantAdminApp",
                data: {
                    IDeditplantapp: IDeditplantapp,
                    editplantappphase: editplantappphase,
                    editplantappname: editplantappname,
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Plant App is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/PlantAdminApp";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Plant App',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    };

    // ----------------------------------------- mst Zone admin --------------------------------------

    $("#btnSaveAddZone").click(function() {
        SaveAddZone()
    });
    $("#btnSaveEditZone").click(function() {
        SaveEditZone()
    })


    function statusZone(mza_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusZone?mza_id=" + mza_id
        })
    };


    function SaveAddZone() {
        var addnamezone = $('#addnamezone').val()
        var addlinezone = $('#addlinezone').val()

        var checkaddnamezone = document.getElementById("addnamezone");
        var checkaddlinezone = document.getElementById("addlinezone");

        if (checkaddnamezone.value == "" || checkaddlinezone.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            if (isValidInput(addnamezone)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/AddZone",
                    data: {
                        addnamezone: addnamezone,
                        addlinezone: addlinezone
                    }
                })
                path.done(function(rs) {
                    alert(rs)
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'You have Successfully Add Zone.',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/ZoneAdmin";
                        })
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Type Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Add Zone',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Zone Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };

    function getDataZone(mza_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditZone?mza_id=" + mza_id,
        })
        path.done(function(rs) {
            $("#IDeditzone").val(rs[0]["mza_id"]);
            $("#editnamezone").val(rs[0]["mza_name"]);
            $("#editlinezone").val(rs[0]["mfcm_id"]);

        })
    };

    function SaveEditZone(mza_id) {
        var IDeditzone = $('#IDeditzone').val()
        var editnamezone = $('#editnamezone').val()
        var editlinezone = $('#editlinezone').val()

        var checkIDeditzone = document.getElementById("IDeditzone");
        var checkeditnamezone = document.getElementById("editnamezone");
        var checkeditlinezone = document.getElementById("editlinezone");

        if (checkIDeditzone.value == "" || checkeditnamezone.value == "" ||
            checkeditlinezone.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ZoneAdmin";
            });
        } else {
            if (isValidInput(editnamezone)) {
                var path = $.ajax({
                    method: "POST",
                    url: "<?php echo base_url(); ?>Manage/EditZone",
                    data: {
                        IDeditzone: IDeditzone,
                        editnamezone: editnamezone,
                        editlinezone: editlinezone,
                    }
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        setTimeout(function() {
                            swal({
                                title: "Success",
                                text: "Zone is Updated!",
                                type: "success",
                                confirmButtonColor: '#D80032'
                            }, function() {
                                window.location = "<?php echo base_url() ?>Manage/ZoneAdmin";
                            });
                        });
                    } else if (rs == "duplicate") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Type Name is Duplicate',
                            confirmButtonColor: '#D80032'
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'You Failed to Edit Zone',
                            confirmButtonColor: '#D80032'
                        })
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Cannot insert special character in Zone Name',
                    confirmButtonColor: '#D80032'
                })
            }
        }
    };


    // +++++++++++++++++++++++++++++++++++++ mst Station Admin +++++++++++++++++++++++++++++++++++++++++++++++++

    $("#btnSaveAddStation").click(function() {
        SaveAddStation()
    });
    $("#btnSaveEditStation").click(function() {
        SaveEditStation()
    })


    function statusStation(msa_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusStation?msa_id=" + msa_id
        })
    };


    function SaveAddStation() {
        var addtablestation = $('#addtablestation').val()

        var checkaddtablestation = document.getElementById("addtablestation");

        if (checkaddtablestation.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddStation",
                data: {
                    addtablestation: addtablestation,
                }
            })
            path.done(function(rs) {
                alert(rs)
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Zone.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ZoneAdmin";
                    })
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Type Name is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Zone',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };


    function getDataStation(msa_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditStation?msa_id=" + msa_id,
        })
        path.done(function(rs) {
            $("#IDeditStation").val(rs[0]["msa_id"]);
            $("#editStation").val(rs[0]["msa_station"]);

        })
    };


    function SaveEditStation(msa_id) {
        var IDeditStation = $('#IDeditStation').val()
        var editStation = $('#editStation').val()

        var checkIDeditStation = document.getElementById("IDeditStation");
        var checkeditStation = document.getElementById("editStation");

        if (checkIDeditStation.value == "" || checkeditStation.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/StationAdmin";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditStation",
                data: {
                    IDeditStation: IDeditStation,
                    editStation: editStation,
                }
            })
            path.done(function(rs) {
                if (rs == "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Station is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/StationAdmin";
                        });
                    });
                } else if (rs == "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Type Name is Duplicate',
                        confirmButtonColor: '#D80032'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Station',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    };



    // ---------------------------------------------------------------  mst config Details -----------------------------------------------------------

    $("#btnSaveAddConfigDetails").click(function() {
        SaveAddConfigDetails()
    });
    $("#btnSaveEditConfigDetails").click(function() {
        SaveEditConfigDetails()
    })


    function statusConfigDetails(mcd_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusConfigDetails?mcd_id=" + mcd_id
        })
    };

    function SaveAddConfigDetails() {
        var addplantconfig = $('#addplantconfig').val()
        var addzoneconfig = $('#addzoneconfig').val()
        var addstationconfig = $('#addstationconfig').val()
        var addtypeconfig = $('#addtypeconfig').val()
        var addstatusconfig = $('#addstatusconfig').val()
        var addinspectionconfig = $('#addinspectionconfig').val()
        var addTimeconfig = $('#addTimeconfig').val()
        var addMacaddress = $('#addMacaddressConfig').val()
        var addSelectpart = $('#addSelectpart').val()

        var checkaddplantconfig = document.getElementById("addplantconfig");
        var checkaddzoneconfig = document.getElementById("addzoneconfig");
        var checkaddstationconfig = document.getElementById("addstationconfig");
        var checkaddtypeconfig = document.getElementById("addtypeconfig");
        var checkaddstatusconfig = document.getElementById("addstatusconfig");
        var checkaddinspectionconfig = document.getElementById("addinspectionconfig");
        var checkaddTimeconfig = document.getElementById("addTimeconfig");
        var checkaddMacaddress = document.getElementById("addMacaddressConfig");

        if (checkaddplantconfig.value == "" || checkaddzoneconfig.value == "" || checkaddstationconfig.value == "" ||
            checkaddtypeconfig.value == "" || checkaddstatusconfig.value == "" || checkaddinspectionconfig.value == "" ||
            checkaddTimeconfig.value == "" || checkaddMacaddress == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddConfigDetails",
                data: {
                    addplantconfig: addplantconfig,
                    addzoneconfig: addzoneconfig,
                    addstationconfig: addstationconfig,
                    addtypeconfig: addtypeconfig,
                    addstatusconfig: addstatusconfig,
                    addinspectionconfig: addinspectionconfig,
                    addTimeconfig: addTimeconfig,
                    addMacaddress: addMacaddress,
                    addSelectpart: addSelectpart
                }
            })
            path.done(function(rs) {

                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Config Details.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ConfigDetail";
                    })
                } else if (rs === "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Mac Address is Duplicate',
                        confirmButtonColor: '#D80032'

                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Config Detail',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };


    function getDataConfigDetails(mcd_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditConfigDetails?mcd_id=" + mcd_id,
        })
        path.done(function(rs) {
            $("#IDeditconfig").val(rs[0]["mcd_id"]);
            $("#editplantconfig").val(rs[0]["mpa_id"]);
            $("#editzoneconfig").val(rs[0]["mza_id"]);
            $("#editstationconfig").val(rs[0]["msa_id"]);
            $("#edittypeconfig").val(rs[0]["mct_id"]);
            $("#editstatusconfig").val(rs[0]["mcs_id"]);
            $("#editinspectionconfig").val(rs[0]["mit_id"]);
            $("#edittimeconfig").val(rs[0]["mcd_inspection_time"]);
            $("#editmacaddressconfig").val(rs[0]["mcd_mac_address"]);
            $("#editselectpartconfig").val(rs[0]["mcd_select_part"]);
        })
    };


    function SaveEditConfigDetails(mcd_id) {
        var IDeditconfig = $('#IDeditconfig').val()
        var editplantconfig = $('#editplantconfig').val()
        var editzoneconfig = $('#editzoneconfig').val()
        var editstationconfig = $('#editstationconfig').val()
        var edittypeconfig = $('#edittypeconfig').val()
        var editstatusconfig = $('#editstatusconfig').val()
        var editinspectionconfig = $('#editinspectionconfig').val()
        var edittimeconfig = $('#edittimeconfig').val()
        var editMacaddressconfig = $('#editMacaddressconfig').val()

        var checkIDeditconfig = document.getElementById("IDeditconfig");
        var checkeditplantconfig = document.getElementById("editplantconfig");
        var checkeditzoneconfig = document.getElementById("editzoneconfig");
        var checkeditstationconfig = document.getElementById("editstationconfig");
        var checkedittypeconfig = document.getElementById("edittypeconfig");
        var checkeditstatusconfig = document.getElementById("editstatusconfig");
        var checkedittimeconfig = document.getElementById("edittimeconfig");
        var checkeditMacaddressconfig = document.getElementById("editMacaddressconfig");

        if (checkIDeditconfig.value == "" || checkeditplantconfig.value == "" ||
            checkeditzoneconfig.value == "" || checkeditstationconfig.value == "" ||
            checkedittypeconfig.value == "" || checkeditstatusconfig.value == "" ||
            checkedittimeconfig.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            })
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditConfigDetail",
                data: {
                    IDeditconfig: IDeditconfig,
                    editplantconfig: editplantconfig,
                    editzoneconfig: editzoneconfig,
                    editstationconfig: editstationconfig,
                    edittypeconfig: edittypeconfig,
                    editstatusconfig: editstatusconfig,
                    editinspectionconfig: editinspectionconfig,
                    edittimeconfig: edittimeconfig,
                    editMacaddressconfig: editMacaddressconfig
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Config Detail is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ConfigDetail";
                        });
                    });
                } else if (rs === "duplicate") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Mac Address is Duplicate',
                        confirmButtonColor: '#D80032'

                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Config Details',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    };


    // ********************************************************************* mst Defect Group ******************************************************************
    $("#btnSaveEditdefectGroup").click(function() {
        SaveEditDefectGroup()
    })




    function statusDefectGroup(mdg_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusDefectGroup?mdg_id=" + mdg_id
        })
    };


    function getDataEditDefectGroup(mcd_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditDefectGroup?mcd_id=" + mcd_id,
        })
        var pathnaja = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataCheckBoxDefect"
        })
        path.done(function(rs) {

            $("#IDeditdefectgroup").val(rs[0]["mcd_id"]);
            $("#editplantdefectgroup").val(rs[0]["mpa_phase_plant"]);
            $("#editzonedefectgroup").val(rs[0]["mza_name"]);
            $("#editstationdefectgroup").val(rs[0]["msa_station"]);
            $("#IDeditplantdefectgroup").val(rs[0]["mpa_id"]);
            $("#IDeditzonedefectgroup").val(rs[0]["mza_id"]);
            $("#IDeditstationdefectgroup").val(rs[0]["msa_id"]);
            $checkbox = "";
            var G_check = ""
            pathnaja.done(function(rsnaja) {
                console.log("rs===>", rs)
                console.log("rsnaja===>", rsnaja)
                var checkbox = "";
                var check = "checked";
                $.each(rsnaja, function(keyCheck, value) {
                    G_check = ""
                    checkData(rs, value.md_id)
                    checkbox += '<input type="checkbox" class="checkboxdefectcode" name="checkboxdefectcode" id="checkboxdefectcode"  value="' + value.md_id + '" ' + G_check + ' >' + value.md_defect_en_name + '<span class="checkmark"></span><br><br>'
                })
                $("#checkBoxDefect").html(checkbox);
            })

            function checkData(ResultSelect, md_id) {
                $status = true
                $.each(ResultSelect, function(keyData, valueData) { //2 or 3
                    if (md_id == valueData.md_id) {
                        G_check = "checked"
                        return false;
                    }
                })

            }
        })
    }

    function SaveEditDefectGroup() {
        var IDeditdefectgroup = $('#IDeditdefectgroup').val()
        var editplantdefectgroup = $('#IDeditplantdefectgroup').val()
        var editzonedefectgroup = $('#IDeditzonedefectgroup').val()
        var editstationdefectgroup = $('#IDeditstationdefectgroup').val()

        var dataDefectGroupcheckId = []
        jQuery("input[name='checkboxdefectcode']").each(function(key, values) {
            if (this.checked == true) {
                console.log("sssssssssssssssss==>", this.value)
                dataDefectGroupcheckId[key] = this.value
                // alert("this.value===>"+this.value)

            }

        });
        console.log("==>", dataDefectGroupcheckId)
        var path = $.ajax({
            method: "GET",
            url: "<?php echo base_url(); ?>Manage/EditDefectGroup",
            data: {
                // IDeditdefectgroup: IDeditdefectgroup,
                editplantdefectgroup: editplantdefectgroup,
                editzonedefectgroup: editzonedefectgroup,
                editstationdefectgroup: editstationdefectgroup,
                dataDefectGroupcheckId: dataDefectGroupcheckId,
            }
        })
        path.done(function(rs) {
            if (rs === "true") {
                setTimeout(function() {
                    swal({
                        title: "Success",
                        text: "Defect Group is Updated!",
                        type: "success",
                        confirmButtonColor: '#D80032'
                    }, function() {
                        window.location = "<?php echo base_url() ?>Manage/DefectGroup";
                    });
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'You Failed to Edit Defect Group',
                    confirmButtonColor: '#D80032'
                })
            }
        })
    }



    // ******************************************************** mst dmc type detail ********************************************************

    $("#btnSaveDMCTypeDetail").click(function() {
        SaveAddDMCTypeDetail()
    })

    $("#btnSaveEditDMCTypeDetail").click(function() {
        SaveEditDMCTypeDetail()
    })


    function statusDMCTypeDetail(mdtd_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusDMCTypeDetail?mdtd_id=" + mdtd_id
        })
    };



    function SaveAddDMCTypeDetail() {
        var adddmctypeofdetail = $('#adddmctypeofdetail').val()
        var adddmcdataofdetail = $('#adddmcdataofdetail').val()
        var addstartofdetail = $('#addstartofdetail').val()
        var addendofdetail = $('#addendofdetail').val()
        var addsubstringdetail = $('#addsubstringdetail').val()

        var checkadddmctypeofdetail = document.getElementById("adddmctypeofdetail");
        var checkadddmcdataofdetail = document.getElementById("adddmcdataofdetail");
        var checkaddstartofdetail = document.getElementById("addstartofdetail");
        var checkaddendofdetail = document.getElementById("addendofdetail");
        var checkaddsubstringdetail = document.getElementById("addsubstringdetail");


        if (checkadddmctypeofdetail.value == "" || checkadddmcdataofdetail.value == "" ||
            checkaddstartofdetail.value == "" || checkaddendofdetail.value == "" || checkaddsubstringdetail.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#D80032'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddDMCTypeDetail",
                data: {
                    adddmctypeofdetail: adddmctypeofdetail,
                    adddmcdataofdetail: adddmcdataofdetail,
                    addstartofdetail: addstartofdetail,
                    addendofdetail: addendofdetail,
                    addsubstringdetail: addsubstringdetail
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add DMC Type Detail.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/dmcTypeDetail";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add DMC Type Detail',
                        confirmButtonColor: '#D80032'
                    })
                }
            })
        }
    };

    function getDataEditDMCTypeDetail(mdtd_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataDMCTypeDetail?mdtd_id=" + mdtd_id,
        })
        path.done(function(rs) {
            $("#IDeditDMCTypeDetail").val(rs[0]["mdtd_id"]);
            $("#editdmctypeofdetail").val(rs[0]["mdt_id"]);
            $("#editdatadmctypedetail").val(rs[0]["mdd_id"]);
            $("#editstartofdetail").val(rs[0]["mdtd_start"]);
            $("#editendofdetail").val(rs[0]["mdtd_end"]);
            $("#editsubstringdetail").val(rs[0]["mdtd_num_substring"]);
        })
    };

    function SaveEditDMCTypeDetail(mdtd_id) {
        var IDeditDMCTypeDetail = $('#IDeditDMCTypeDetail').val()
        var editdmctypeofdetail = $('#editdmctypeofdetail').val()
        var editdatadmctypedetail = $('#editdatadmctypedetail').val()
        var editstartofdetail = $('#editstartofdetail').val()
        var editendofdetail = $('#editendofdetail').val()
        var editsubstringdetail = $('#editsubstringdetail').val()

        var checkIDeditDMCTypeDetail = document.getElementById("IDeditDMCTypeDetail");
        var checkeditdmctypeofdetail = document.getElementById("editdmctypeofdetail");
        var checkeditdatadmctypedetail = document.getElementById("editdatadmctypedetail");
        var checkeditstartofdetail = document.getElementById("editstartofdetail");
        var checkeditendofdetail = document.getElementById("editendofdetail");
        var checkeditsubstringdetail = document.getElementById("editsubstringdetail");

        if (checkIDeditDMCTypeDetail.value == "" || checkeditdmctypeofdetail.value == "" ||
            checkeditdatadmctypedetail.value == "" || checkeditstartofdetail.value == "" ||
            checkeditendofdetail.value == "" || checkeditsubstringdetail.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning",
                confirmButtonColor: '#D80032'
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/dmcTypeDetail";
            });
        } else {

            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditDMCTypeDetail",
                data: {
                    IDeditDMCTypeDetail: IDeditDMCTypeDetail,
                    editdmctypeofdetail: editdmctypeofdetail,
                    editdatadmctypedetail: editdatadmctypedetail,
                    editstartofdetail: editstartofdetail,
                    editendofdetail: editendofdetail,
                    editsubstringdetail: editsubstringdetail
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Edit DMC Type Data.',
                        confirmButtonColor: '#D80032'

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/dmcTypeDetail";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit DMC Type Data',
                        confirmButtonColor: '#D80032'
                    })
                }
            });
        }
    };





    // ======================================================== Qgate Check Data ========================================================


    $("#btnCheckDataSearch").click(function() {
        checkDataStart()
    })


    function checkDataStart() {

        var plant = $('#selectPlantNCNG').val()
        var zone = $('#selectZoneData').val()
        var station = $('#selectStationData').val()
        var date = $('#CheckDatadatesearch').val()
        var i = 0

        if (plant == "Select Plant" || zone == "Select Zone" || station == "Select Station" || date == "dd/mm/yyyy") {
            Swal.fire({
                icon: 'warning',
                title: 'Please Select All Data',
                confirmButtonColor: '#D80032'
            })
        } else {
            var tabel = $('#example1').DataTable({
                "orderCellsTop": false,
                "bFilter": true,
                "bSort": true,
                "excludedColumns": [1, 2, 3],
                "zeroIndexed": false, // or true

                "ajax": {
                    // "type" : "GET",
                    "url": "<?php echo base_url(); ?>Manage/SearchCheckData",
                    "dataSrc": 'data',
                    // "data" : {"stdate":"stdate","dept":"dept","line":"line"},
                    //   "dataType": 'json',
                    "data": function(a) {
                        a.plant = $("#selectPlantNCNG").val();
                        a.zone = $("#selectZoneData").val();
                        a.station = $("#selectStationData").val();
                        a.date = $("#CheckDatadatesearch").val();
                    },
                },

                "columns": [

                    {
                        "data":"iodc_id"
                    },

                    {
                        "data": "ifts_line_cd"
                    },
                    {
                        "data": "ifts_plan_date"
                    },
                    {
                        "data": "ifts_seq_paln"
                    },
                    {
                        "data": "ifts_part_no"
                    },
                    {
                        "data": "ifts_snp"
                    },
                    {
                        "data": "ifts_box"
                    },
                    {
                        "data": "ifts_lot_no_prod"
                    },
                    {
                        "data": "ifts_lot_current"
                    },
                    {
                        "data": "mpa_name"
                    },
                    {
                        "data": "mza_name"
                    },
                    {
                        "data": "msa_station"
                    },
                    {
                        "data": "iodc_created_date"
                    }

                ],
            });


        }


    }






    // ----------------------------------------------------- NC/NG Data -----------------------------------------------------------------


    $("#btnNCNGSearch").click(function() {
        NCNGStart()
    })


    function NCNGStart() {

        var plant = $('#selectPlantNCNG').val()
        var zone = $('#selectZoneNCNG').val()
        var station = $('#selectStationNCNG').val()
        var date = $('#NCNGdatesearch').val()

        if (plant == "Select Plant" || zone == "Select Zone" || station == "Select Station" || date == "dd/mm/yyyy") {
            Swal.fire({
                icon: 'warning',
                title: 'Please Select All Data',
                confirmButtonColor: '#D80032'
            })
        } else {
            var tabel = $('#example2').DataTable({
                "orderCellsTop": false,
                "bFilter": true,
                "bSort": true,
                "excludedColumns": [1, 2, 3],
                "zeroIndexed": false, // or true

                "ajax": {
                    // "type" : "GET",
                    "url": "<?php echo base_url(); ?>Manage/SearchNCNG",
                    "dataSrc": 'data',
                    // "data" : {"stdate":"stdate","dept":"dept","line":"line"},
                    //   "dataType": 'json',
                    "data": function(a) {
                        a.plant = $('#selectPlantNCNG').val()
                        a.zone = $("#selectZoneNCNG").val();
                        a.station = $("#selectStationNCNG").val();
                        a.date = $("#NCNGdatesearch").val();
                    },
                },
                "columns": [

                    {
                        "data": "ifts_line_cd"
                    },
                    {
                        "data": "ifts_line_cd"
                    },
                    {
                        "data": "ifts_plan_date"
                    },
                    {
                        "data": "ifts_seq_paln"
                    },
                    {
                        "data": "ifts_part_no"
                    },
                    {
                        "data": "ifts_snp"
                    },
                    {
                        "data": "ifts_box"
                    },
                    {
                        "data": "ifts_lot_no_prod"
                    },
                    {
                        "data": "ifts_lot_current"
                    },
                    {
                        "data": "mpa_name"
                    },
                    {
                        "data": "mza_name"
                    },
                    {
                        "data": "msa_station"
                    },
                    {
                        "data": "iodc_created_date"
                    }

                ],
            });


        }


    }


    // function NCNGStart() {
    //     var plant = $('#selectPlantNCNG').val()
    //     var zone = $('#selectZoneNCNG').val()
    //     var station = $('#selectStationNCNG').val()
    //     var date = $('#NCNGdatesearch').val()

    //     var path = $.ajax({
    //         method: "POST",
    //         url: "<?php echo base_url(); ?>Manage/SearchNCNG",
    //         data: {
    //             plant: plant,
    //             zone: zone,
    //             station: station
    //         }
    //     })
    //     path.done(function(rs) {
    //         var data = JSON.parse(rs);
    //         var tb = " "
    //         var i = 0

    //         if (data == 0) {
    //             swal({
    //                 title: "warning",
    //                 text: "Not have data",
    //                 type: "warning",
    //                 confirmButtonColor: '#D80032'
    //             });

    //         } else {
                

    //         }

    //     })
    // }



    function ChangeStatusNG(idd_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Confirm NG?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D80032',
            cancelButtonColor: 'rgb(138 143 145)',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var path = $.ajax({
                    method: "get",
                    url: "<?php echo base_url(); ?>Manage/changeStatusNG?idd_id=" + idd_id
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Confirm NG Successfully!',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/NCNGData";
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Confirm NG',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            }
        })
    }


    function ChangeStatusNC(idd_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to Confirm NC?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D80032',
            cancelButtonColor: 'rgb(138 143 145)',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var path = $.ajax({
                    method: "get",
                    url: "<?php echo base_url(); ?>Manage/changeStatusNC?idd_id=" + idd_id
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Confirm NC Successfully!',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/NCNGData";
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Confirm NC',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            }
        })
    }


    function RestoreNC(idd_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to restore NC?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#D80032',
            cancelButtonColor: 'rgb(138 143 145)',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                var path = $.ajax({
                    method: "get",
                    url: "<?php echo base_url(); ?>Manage/reStoreNC?idd_id=" + idd_id
                })
                path.done(function(rs) {
                    if (rs === "true") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Restore Successfully!',
                            confirmButtonColor: '#D80032'

                        }).then(function() {
                            window.location.href = "<?php echo base_url() ?>Manage/NCNGData";
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to Restore NC',
                            confirmButtonColor: '#D80032'
                        })
                    }
                })
            }
        })
    }
</script>