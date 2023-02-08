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
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
<script src="<?php echo base_url() . $js_url; ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<!-- --------------------------------------------------- AJAX CHANGEPASSWORDPAGE AND EDITPROFILEPAGE --------------------------------------------------- -->


<script type="text/javascript">
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
                    type: "warning"
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
<!-- --------------------------------------------------- LOGOUT AND MENUHOME --------------------------------------------------- -->
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
</script>
<!----------------------------------------------------- Manage User Web  ------------------------------------------------------------>
<script>
    $(document).ready(function() {
        $('#ManageUserTable').DataTable();
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
        var checkaddgroup = document.getElementById("addgroupper");
        var checkaddemailaddress = document.getElementById("addemail");
        var checkaddpassword = document.getElementById("addpassword");
        var checkaddplant = document.getElementById("addplant");

        if (checkaddempcode.value == "" || checkaddfirstname.value == "" || checkaddlastname.value == "" ||
            checkaddgroup.value == "" || checkaddemailaddress.value == "" || checkaddpassword.value == "" || checkaddplant.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox someone is Empty',
                confirmButtonColor: '#F7B267',
            })
        } else {
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
                    addplant: addplant,
                }
            })
            path.done(function(rs) {
                console.log(rs);
                alert(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Employee.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageUserWeb";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Employee',
                    })
                }
            })
        }
    };

    function getDataEditUserWeb(ss_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataEditManageUserWeb?ss_id=" + ss_id,
        })
        path.done(function(rs) {
            console.log(rs);
            $("#editempcode").val(rs[0]["ss_emp_code"]);
            $("#editfirstname").val(rs[0]["ss_emp_fname"]);
            $("#editlastname").val(rs[0]["ss_emp_lname"]);
            $("#editgroup").val(rs[0]["spg_name"]);
            $("#editemailaddress").val(rs[0]["ss_email"]);
            $("#editplant").val(rs[0]["mpa_name"]);
        })
    };

    function saveEditUserWeb() {
        var editempcode = $("#editempcode").val();
        var editfirstname = $("#editfirstname").val();
        var editlastname = $("#editlastname").val();
        var editgroup = $("#editgroup").val();
        var editemail = $("#editemailaddress").val();
        var editplant = $("#editplant").val();

        var checkeditempcode = document.getElementById("editempcode");
        var checkeditfirstname = document.getElementById("editfirstname");
        var checkeditlastname = document.getElementById("editlastname");
        var checkeditgroup = document.getElementById("editgroup");
        var checkeditemailaddress = document.getElementById("addemail");
        var checkeditplant = document.getElementById("editplant");


        if (checkeditempcode.value == "" || checkeditfirstname.value == "" || checkeditlastname.value == "" ||
            checkeditgroup.value == "" || checkeditemailaddress.value == "" || checkeditplant.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox someone is Empty',
                confirmButtonColor: '#F7B267',
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
                alert(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: 'You have successfully Edit Employee',
                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageUserWeb";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data not found',
                        text: 'You Failed to Edit Employee',
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
        alert("EditYEA")
        SaveEditPermissionWeb()
    })

    function statusPermission(spg_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusPermissionWeb?spg_id=" + spg_id,
        })
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
                confirmButtonColor: '#F7B267',
            })
        } else {
            var path = $.ajax({
                method: "GET",
                url: "<?php echo base_url(); ?>Manage/AddManagePermissionWeb",
                data: {
                    addPermissionwebname: addPermissionwebname,
                    dataSubMenuId: dataSubMenuId
                }
            })
            path.done(function(rs) {
                alert(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Permission.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Permission',
                    })
                }
            })
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
            console.log(rs);
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
        }).done(function(rs) {

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
                type: "warning"
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
                alert(rs)
                if (rs === "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Your Profile Detail is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Permission',
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
</script>