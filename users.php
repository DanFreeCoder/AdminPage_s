<?php
include './config/connection.php';
include './objects/clsusers.php';
include './objects/clsdepartment.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);
$dept = new clsdepartment($db);
$view_users = $users->user_details();
$get_dept = $dept->get_dept();



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />






    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        #action {
            color: #07b9ad;
        }

        #action:hover {
            color: red;
            cursor: pointer;
        }

        .dataTables_filter input {
            color: white;


        }
    </style>
</head>

<body>

    <?php include 'includes/header.php'; ?>
    <!-- header section -->

    <?php include 'includes/sidebar.php'; ?>
    <!-- sidebar section -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1><i class="bi bi-people"></i> Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- start Left side columns -->
                        <div class="d-flext justify-content-start mb-2">
                            <div data-bs-toggle="modal" data-bs-target="#user" class="fa-light fa-pen-to-square btn btn-success"><i class="bi bi-plus"></i>New</div>
                            <div id="edit_user" class="fa-light fa-pen-to-square btn btn-primary"> <i class="bi bi-pencil-square"></i>Edit</div>
                            <div id="reset_pass" class="fa-light fa-pen-to-square btn btn-secondary"><i class="bi bi-lock"></i>Reset Password</div>
                            <div class="delete_user btn btn-danger"> <i class="bi bi-trash3"></i>Remove</div>
                        </div>
                        <div class="card post">
                            <table id="post-table" class="table table-dark table-striped" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"></input></th>
                                        <th>Firstname</th>
                                        <th>
                                            <center>Lastname</center>
                                        </th>
                                        <th>
                                            <center>Username</center>
                                        </th>
                                        <th>
                                            <center>Role</center>
                                        </th>
                                        <th>
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="post-body">
                                    <?php
                                    while ($row = $view_users->fetch(PDO::FETCH_ASSOC)) {
                                        if ($row['access_type_id'] == 1) {
                                            $role = 'Administrator';
                                        } elseif ($row['access_type_id'] == 2) {
                                            $role = 'HR';
                                        } else {
                                            $role = 'Staff';
                                        }
                                        echo '
                                    <tr>
                                    <td><input type="checkbox" name="form_user" id="checkbox_user" class="form_user" value="' . $row['id'] . '" ></td>
                                    <td>' . $row['firstname'] . '</td>
                                    <td>
                                        <center>' . $row['lastname'] . '</center>
                                    </td>
                                    <td>
                                        <center>' . $row['username'] . '</center>
                                    </td>
                                    <td>' . $role . '</td>
                                    <td>
                                        <center><a href="#" value="' . $row['id'] . '" class="viewUserAction"><i id="action" class="bi bi-arrows-move"></i></a>
                                    </td>
                                    </center>
                                </tr>
                                ';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- End Left side columns -->
                </div>


            </div> <!-- end of row class -->
        </section>

    </main><!-- End #main -->
    <!-- Modal -->
    <div class="modal fade" id="user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-plus"></i>New User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editmodal_body">
                    <form method="post">
                        <label>Firstname</label>
                        <div>
                            <input type="text" id="firstname" class="form-control">
                        </div>
                        <label>Lastname</label>
                        <div>
                            <input type="text" id="lastname" class="form-control">
                        </div>
                        <label>Email Address</label>
                        <div>
                            <input type="email" id="email" class="form-control">
                        </div>
                        <label>Username</label>
                        <div>
                            <input type="text" id="username" readonly="readonly" class="form-control">
                        </div>
                        <label>Password</label>
                        <div>
                            <input type="password" id="password" placeholder="Password" class="form-control">
                        </div>
                        <label>Department</label>
                        <div>
                            <div>
                                <select type="text" id="department" class="form-control">
                                    <option value="0">Select Access Type</option>
                                    <?php
                                    while ($row = $get_dept->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                                    <option style="  background-color: #3a3b3c; color: whitesmoke; border-color: none;" value="' . $row['id'] . '">' . $row['department'] . '</option>
                                    ';
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <label>Access Type</label>
                        <div>
                            <select type="text" id="access" class="form-control">
                                <option style="  background-color: #3a3b3c; color: whitesmoke; border-color: none;" value="0">Select Access Type</option>
                                <option style="  background-color: #3a3b3c; color: whitesmoke; border-color: none;" value="1">Admin</option>
                                <option style="  background-color: #3a3b3c; color: whitesmoke; border-color: none;" value="2">Human Resources</option>
                                <option style="  background-color: #3a3b3c; color: whitesmoke; border-color: none;" value="3">Users</option>

                            </select>
                        </div>
                        <br>
                        <br>
                    </form>
                    <div class="append"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Update Users-->
    <div class="modal fade" id="edit_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_modal_body">
                    <!-- modal body goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btn_update" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for View Users Action-->
    <div class="modal fade" id="action_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="action_modal_body">
                    <!-- modal body goes here -->
                </div>
            </div>
        </div>
    </div>




    <?php include 'includes/footer.php'; ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="dist/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap.js" type="text/javascript"></script>
    <script src="dist/js/bootstrap-multiselect.js" type="text/javascript"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>



    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


    <script>
        $(document).ready(function() {
            // log out action
            $('.logout').on('click', function(e) {
                e.preventDefault();
                if (confirm('You are about to sign out!')) {
                    location.href = $(this).attr("href");
                }
            });

            $('input').blur(function(e) {
                $(this).css("background-color", "#3a3b3c").css("color", "whitesmoke")
            })
            <?php include 'includes/hover.php'; ?>
            $('#post-table').DataTable({
                "aLengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });

            // change the color of datatable filter
            $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
            $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")

            //add users
            $('#save').click(function() {

                var fname = $('#firstname').val();
                var lname = $('#lastname').val();
                var email = $('#email').val();
                var uname = $('#username').val();
                var upass = $('#password').val();
                var dept = $('#department').val();
                var access = $('#access').val();

                var mydata = '&fname=' + fname + '&lname=' + lname + '&email=' + email + '&uname=' + uname + '&upass=' + upass + '&dept=' + dept + '&access=' + access;

                if (fname != '' || lname != '' || email != '' || uname != '') {
                    $.ajax({
                        type: "POST",
                        url: "controls/saveuser.php",
                        data: mydata,

                        success: function(response) {
                            if (response > 0) {
                                alert('success');
                            } else {
                                alert('failed');
                            }
                        }
                    });
                }
            });


        });
    </script>

    <!-- USERNAME AUTO GENERATE -->
    <script>
        $('#firstname').blur(function(e) {
            e.preventDefault();

            var str = $('#firstname').val();
            var fname = str.replace(/\s/g, '');
            var f = fname.toLowerCase();
            var str1 = $('#lastname').val();
            var lname = str1.replace(/\s/g, '');
            var l = lname.toLowerCase();
            var username = f.concat('.').concat(l);
            $('#username').val(username);
        })
        $('#lastname').blur(function(e) {
            e.preventDefault();

            var str = $('#firstname').val();
            var fname = str.replace(/\s/g, '');
            var f = fname.toLowerCase();
            var str1 = $('#lastname').val();
            var lname = str1.replace(/\s/g, '');
            var l = lname.toLowerCase();
            var username = f.concat('.').concat(l);
            $('#username').val(username);
        })
    </script>

    <!-- USERNAME AUTO GENERATE FOR MODAL UPDATE -->
    <script>
        $('#upd-firstname').blur(function(e) {
            e.preventDefault();

            var str = $('#upd-firstname').val();
            var fname = str.replace(/\s/g, '');
            var f = fname.toLowerCase();
            var str1 = $('#upd-lastname').val();
            var lname = str1.replace(/\s/g, '');
            var l = lname.toLowerCase();
            var username = f.concat('.').concat(l);
            $('#upd-username').val(username);
        })
        $('#upd-lastname').blur(function(e) {
            e.preventDefault();

            var str = $('#upd-firstname').val();
            var fname = str.replace(/\s/g, '');
            var f = fname.toLowerCase();
            var str1 = $('#upd-lastname').val();
            var lname = str1.replace(/\s/g, '');
            var l = lname.toLowerCase();
            var username = f.concat('.').concat(l);
            $('#upd-username').val(username);
        })
    </script>

    <!-- save update modal -->
    <script>
        $('#btn_update').on('click', function(e) {
            e.preventDefault();

            const upd_id = $('#upd-id').val();
            const upd_fname = $('#upd-firstname').val();
            const upd_lname = $('#upd-lastname').val();
            const upd_email = $('#upd-email').val();
            const upd_uname = $('#upd-username').val();
            const upd_access = $('#upd-access').val();

            const mydata = 'id=' + upd_id + '&fname=' + upd_fname + '&lname=' + upd_lname + '&email=' + upd_email + '&uname=' + upd_uname + '&access=' + upd_access;
            $.ajax({
                type: 'POST',
                url: 'controls/update_users.php',
                data: mydata,

                success: function(response) {
                    if (response > 0) {
                        alert('Users Successfully update!');
                        location.reload();
                    }
                }
            })
        })
    </script>
    <!-- edit user modal -->
    <script>
        $('#edit_user').on('click', function(e) {
            e.preventDefault();


            const id = $('input:checkbox[name=form_user]:checked').attr('value');
            if (id == null) {
                alert('Please select specific user.')
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'controls/display_users.php',
                    data: {
                        id: id
                    },

                    success: function(html) {

                        $('#edit_user_modal').modal('show');
                        $('#edit_modal_body').html(html);
                    }
                })
            }

        })
    </script>

    <!--select and hide the EDIT button when multiple selection happens-->
    <script>
        $('#check_all').change(function(e) {
            e.preventDefault();
            if ($(this).prop('checked')) {
                var table = $(e.target).closest('table');
                $('tbody tr td input[type="checkbox"]').each(function() {
                    $('td input:checkbox', table).prop('checked', true);
                });
                $("#edit_user").hide(500);
            } else {
                $('tbody tr td input[type="checkbox"]').each(function() {
                    $('td input:checkbox', table).prop('checked', false);
                });
                $("#edit_user").show(500);
            }

        });
    </script>

    <!-- get all value of checked item -->
    <script>
        $('.delete_user').on('click', function(e) {
            e.preventDefault();

            var form_id = []

            $('input:checkbox[name=form_user]:checked').each(function() {
                form_id.push($(this).val());
            })
            if (form_id < 1) {
                alert('Please select the specific user');
            } else {
                if (confirm('Warning: Are you sure to remove this user?')) {
                    $.ajax({
                        type: 'POST',
                        url: 'controls/delete_users.php',
                        data: {
                            id: form_id
                        },

                        success: function(response) {
                            if (response > 0) {
                                alert('Users successfully Removed!')
                                location.reload(500);
                            }
                        }
                    })

                }

            }


        });
    </script>
    <!-- reset user password to default/123456 -->
    <script>
        $('#reset_pass').on('click', function(e) {
            e.preventDefault();
            var id = []
            $('input:checkbox[name=form_user]:checked').each(function() {
                id.push($(this).val());
            });
            if (id < 1) {
                alert('Please select the specific user');
            } else {
                if (confirm('Are you sure you want to reset this users?')) {
                    $.ajax({
                        type: 'POST',
                        url: 'controls/reset_pass.php',
                        data: {
                            id: id
                        },
                        success: function(response) {

                            if (response > 0) {
                                alert('Users Successfully RESET!');
                                location.reload();
                            }
                        }
                    })
                }
            }


        })
    </script>
    <!-- View Action User's Details -->
    <script>
        $(document).on('click', '.viewUserAction', function(e) {
            e.preventDefault();
            const id = $(this).attr('value');
            const mydata = 'id=' + id;
            $.ajax({
                type: 'POST',
                url: 'controls/view_action.php',
                data: mydata,

                success: function(html) {
                    $('#action_user_modal').modal('show');
                    $('#action_modal_body').html(html);
                }
            })
        })
    </script>

    <!-- modal Setting Update -->
    <script>
        function update() {
            const password = $('#password').val();
            const retype = $('#retype_password').val();
            const id = $('#upd-id').val();
            const mydata = 'id=' + id + '&password=' + password;
            if (password != '') {
                if (password == retype) {
                    $.ajax({
                        type: 'POST',
                        url: 'controls/update-pass.php',
                        data: mydata,
                        success: function(response) {
                            alert(response)
                            if (response > 0) {
                                $('#settingmodal').modal('toggle')
                                $('#user_current_pass').modal('show')
                            }
                        }
                    })
                } else {
                    alert('password is not match')
                }
            } else {
                alert('Fill the neccessary fields');
            }

        }
    </script>


</body>

</html>