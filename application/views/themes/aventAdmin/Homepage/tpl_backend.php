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



<!-- --------------------------------------------------- CHANGEPASSWORDPAGE AND EDITPROFILEPAGE --------------------------------------------------- -->


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
<!-- --------------------------------------------------- LOGOUT  --------------------------------------------------- -->
<script type="text/javascript">
    $("#btnLogout").click(function() {
        Logout()
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
        $('#DataTable').DataTable();
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
            $("#editgrouppermissionuserweb").val(rs[0]["spg_name"]);
            $("#editemailaddress").val(rs[0]["ss_email"]);
            $("#editplant").val(rs[0]["mpa_name"]);
            
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
                console.log("sssssssssssssssss==>", this.value)
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
            console.log("==>", dataSubMenuId)
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
                            text: "Permission is Updated!",
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

    $("#btnSaveAddMenuWeb").click(function() {
        SaveaddMenuWeb()
    });

    $("#btnSaveEditMenuWeb").click(function() {
        SaveEditMenuWeb()
    });


    function statusManageMenuWeb(ssm_id) {
        var path = $.ajax({
            method: "get",
            url: "<?php echo base_url(); ?>Manage/swiftStatusMenuWeb?ssm_id=" + ssm_id,
        })
    };

    function getDataManageMenuWeb(ssm_id) {
        var path = $.ajax({
            method: "get",
            dataType: "json",
            url: "<?php echo base_url(); ?>Manage/getDataManageMenuWeb?ssm_id=" + ssm_id,
        })
        path.done(function(rs) {
            console.log(rs);
            $("#editMenuName").val(rs[0]["sm_name_menu"]);
            $("#editSubMenuName").val(rs[0]["ssm_name_submenu"]);
            $("#IDeditMenuName").val(rs[0]["sm_id"]);
            $("#IDeditSubMenuName").val(rs[0]["ssm_id"]);
        })
    };


    function SaveaddMenuWeb() {
        var addmenuwebname = $('#addmenuwebname').val();
        var addsubmenuwebname = $('#addsubmenuwebname').val();
        var addmenupath = $('#addmenupath').val();
        var addmenuicon = $("#addmenuicon").val();

        var checkaddmenuwebname = document.getElementById("addmenuwebname");
        var checkaddsubmenuwebname = document.getElementById("addsubmenuwebname")
        var checkaddmenupath = document.getElementById("addmenupath")
        var checkaddmenuicon = document.getElementById("addmenuicon")

        if (checkaddmenuwebname.value == "" || checkaddsubmenuwebname.value == "" || checkaddmenupath.value == "" || checkaddmenuicon.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#F7B267'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddManageMenuWeb",
                data: {
                    addmenuwebname: addmenuwebname,
                    addsubmenuwebname: addsubmenuwebname,
                    addmenupath: addmenupath,
                    addmenuicon: addmenuicon
                }
            })
            path.done(function(rs) {
                alert(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Permission.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageMenuWeb";
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

    function SaveEditMenuWeb() {

        var editMenuName = $("#editMenuName").val();
        var editSubMenuName = $("#editSubMenuName").val();
        var IDeditMenuName = $("#IDeditMenuName").val();
        var IDeditSubMenuName = $("#IDeditSubMenuName").val();

        var checkeditMenuName = document.getElementById("editMenuName");
        var checkeditSubMenuName = document.getElementById("editSubMenuName");

        if (checkeditMenuName.value == "" || checkeditSubMenuName.value == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageMenuWeb";
            });
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/EditManageMenuWeb",
                data: {
                    editMenuName: editMenuName,
                    editSubMenuName: editSubMenuName,
                    IDeditMenuName: IDeditMenuName,
                    IDeditSubMenuName: IDeditSubMenuName
                }
            })
            path.done(function(rs) {
                if (rs == "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "Menu is Updated!",
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
            $("#editpathpicapp").val(data.getdataEdit[0]["ss_pic"]);
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
        var addpathpicapp = $("#addpathpicapp").val();

        var checkaddempcodeapp = document.getElementById("addempcodeapp");
        var checkaddnameapp = document.getElementById("addnameapp")
        var checkaddgrouppermissionapp = document.getElementById("addgrouppermissionapp")
        var checkaddpathpicapp = document.getElementById("addpathpicapp")

        if (checkaddempcodeapp.value == "" || checkaddnameapp.value == "" || checkaddgrouppermissionapp.value == "" || checkaddpathpicapp.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#F7B267'
            })
        } else {
            var path = $.ajax({
                method: "POST",
                url: "<?php echo base_url(); ?>Manage/AddManageUserApp",
                data: {
                    addempcodeapp: addempcodeapp,
                    addnameapp: addnameapp,
                    addgrouppermissionapp: addgrouppermissionapp,
                    addpathpicapp: addpathpicapp
                }
            })
            path.done(function(rs) {
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add User App.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageUserApp";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add User App',
                    })
                }
            })
        }
    };

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
            checkeditgrouppermissionuserapp == "" || checkeditpathpicapp == "") {
            swal({
                title: "warning",
                text: "Please fill the textbox ",
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ManageUserApp";
            });
        } else {
            var path = $.ajax({
                method: "GET",
                url: "<?php echo base_url(); ?>Manage/EditManageUserApp",
                data: {
                    IDedituserapp: IDedituserapp,
                    editempcodeuserapp: editempcodeuserapp,
                    editnameapp: editnameapp,
                    editgrouppermissionuserapp: editgrouppermissionuserapp,
                    editpathpicapp: editpathpicapp
                }
            })
            path.done(function(rs) {
                alert(rs)
                if (rs == "true") {
                    setTimeout(function() {
                        swal({
                            title: "Success",
                            text: "User App is Updated!",
                            type: "success",
                            confirmButtonColor: '#D80032'
                        }, function() {
                            window.location = "<?php echo base_url() ?>Manage/ManagePermisionWeb";
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit User App',
                    })
                }
            });
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
            // setค่าให้เป็น input เพื่อมองว่า checkbox เป็น input โดย name ก็คือชื่อ  html checkbox ใน view 
            //  .each หมายถึงการวนลูปออก(ในหน้าviewsจะเป็นการวนลูปเข้า) โดย key คือ index วนตามลำดับ(0,1,2,..) 
            //   และ values ก็คือค่าที่ถูกกำหนดใน checkbox นั้น 
            if (this.checked == true) {
                console.log("sssssssssssssssss==>", this.value)
                // this.checked = ถ้าตัวมันเองถูก check (เพราะเป็นcheckbox) ก็จะทำเงื่อนไข
                dataMenuAppId[key] = this.value
                // this.value คือการเก็บ values ที่อยู่ใน checkbox ออกมาใส่ array key

            }
        });
        if (addPermissionappname.value == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Textbox is Empty',
                confirmButtonColor: '#F7B267',
            })
        } else {
            console.log("==>", dataMenuAppId)
            var path = $.ajax({
                method: "GET",
                url: "<?php echo base_url(); ?>Manage/AddManagePermissionApp",
                data: {
                    addPermissionappname: addPermissionappname,
                    dataMenuAppId: dataMenuAppId
                }
            })
            path.done(function(rs) {
                alert(rs);
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Permission.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManagePermisionApp";
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
                type: "warning"
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
                console.log(rs)
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Permission',
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ManageMenuApp";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Menu App',
                    })
                }
            })
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
                type: "warning"
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/CheckType";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  Type Part',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/CheckType";
            });
        } else {

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
                    })
                }
            });
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/CheckStatus";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  Status',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/CheckStatus";
            });
        } else {

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
                    })
                }
            });
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/InspectionType";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  Inspection',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/InspectionType";
            });
        } else {

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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Inspection Name',
                    })
                }
            });
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/DMCData";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  DMC Data',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/DMCData";
            });
        } else {

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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit DMC Data',
                    })
                }
            });
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/DMCType";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  DMC Data Type',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/DMCType";
            });
        } else {

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
                    })
                }
            });
        }

    }


    // **************************************************** mst  FA CODE  **********************************


    $("#btnSaveAddFaCode").click(function() {
        SaveAddFACode()
    });
    $("#btnSaveEditFaCode").click(function() {
        SaveEditFACode()
    })


    function statusFACode(mfcm_id) {
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/FACode";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add  FA Code',
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/FACode";
            });
        } else {

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
                    })
                }
            });
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
                confirmButtonColor: '#F7B267'
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
                // console.log("rs=====>", rs)
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Work Shift.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/WorkShift";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Work Shift',
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
                type: "warning"
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Work Shift',
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
                confirmButtonColor: '#F7B267'
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
                alert(rs)
                // console.log("rs=====>", rs)
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Defect.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/Defect";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Defect'
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
                type: "warning"
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Defect',
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
                confirmButtonColor: '#F7B267'
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
                alert(rs)
                if (rs === "true") {
                    Swal.fire({
                        icon: 'success',
                        title: 'You have Successfully Add Part Number.',

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PartNumber";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Part Number'
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
                type: "warning"
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
                    })
                }
            });
        }
    }
    // ---------------------------------ข้าม Select Part ไปก่อน --------------------------


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
                confirmButtonColor: '#F7B267'
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PlantAdminWeb";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Plant Web'
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
                type: "warning"
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
                confirmButtonColor: '#F7B267'
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/PlantAdminApp";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Plant App'
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
                type: "warning"
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
                confirmButtonColor: '#F7B267'
            })
        } else {
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

                    }).then(function() {
                        window.location.href = "<?php echo base_url() ?>Manage/ZoneAdmin";
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Add Zone'
                    })
                }
            })
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
                type: "warning"
            }, function() {
                window.location = "<?php echo base_url() ?>Manage/ZoneAdmin";
            });
        } else {

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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'You Failed to Edit Zone',
                    })
                }
            });
        }
    };

</script>