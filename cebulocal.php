<?php
include './autoloader/autoloader.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/innoland.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
</head>

<body>

    <?php include 'includes/header.php'; ?>
    <!-- header section -->

    <?php include 'includes/sidebar.php'; ?>
    <!-- sidebar section -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><i class="bi bi-telephone"></i></i>Cebu Locals</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="cebulocal.php">Local Numbers</a></li>
                    <li class="breadcrumb-item active">Cebu Locals</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- start Left side columns -->
                        <div class="d-flext justify-content-start mb-2">
                            <div data-bs-toggle="modal" data-bs-target="#cebu-modal" class="fa-light fa-pen-to-square btn btn-success"><i class="bi bi-plus"></i>New</div>
                            <div class="fa-light fa-pen-to-square btn btn-primary" id="edit_cebu"> <i class="bi bi-pencil-square"></i> Edit </div>
                            <div class="btn btn-danger" id="delete_cebu"> <i class="bi bi-trash3"></i> Delete </div>
                        </div>
                        <div class="card post">
                            <table id="post-table" class="table table-dark table-striped mt-3" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="check_all"></input></th>
                                        <center>
                                            <th>Local #</th>
                                        </center>
                                        <th>
                                            <center>Name</center>
                                        </th>
                                        <th>
                                            <center>Department</center>
                                        </th>
                                        <th>
                                            <center>Status</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- datatable data server side goes here -->
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end Left side columns -->
                </div>


            </div> <!-- end of row class -->
        </section>

    </main><!-- End #main -->



    <!-- Modal Add -->
    <div class="modal fade" id="cebu-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Local Number Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label>Local Number</label>
                        <div>
                            <input type="text" id="local_no" class="form-control">
                        </div>

                        <label>Department</label>
                        <div>
                            <input type="text" id="department" class="form-control">
                        </div>

                        <label>Name</label>
                        <div>
                            <input type="text" id="name" class="form-control">
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="btn_save" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->
    <div class="modal fade" id="edit_cebu_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Local Number Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit_cebu_body">
                    <!-- cebu modal body goes here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="btn_update" class="btn btn-primary">Save changes</button>
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
            $('.table').DataTable({
                "fnCreateRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                },
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                    'url': 'controls/cebu_table.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{
                    "bSortable": 'true',
                    "aTargets": [4]
                }, ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }]
            });
            // retrieve data
            function inactive() {
                e.preventDefault();
                const id = $('.inactive').val();
                const status = $(this).val();
                const mydata = 'id=' + id + '&status=' + status;
                $.ajax({
                    type: 'POST',
                    url: 'controls/retrieve_cebu_data.php',
                    data: mydata,

                    success: function(response) {
                        if (response > 0) {
                            alert('Successfully Retrieve');
                            location.reload();
                        }
                    }
                })
            }

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
            // change the color of datatable filter
            $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
            $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")
        })
    </script>
    <!-- MODAL SAVE -->
    <script>
        $('#btn_save').on('click', function(e) {
            e.preventDefault();
            const local_no = $('#local_no').val();
            const dept = $('#department').val();
            const name = $('#name').val();

            const mydata = 'local_no=' + local_no + '&dept=' + dept + '&name=' + name;
            $.ajax({
                type: 'POST',
                url: 'controls/save_cebu_locals.php',
                data: mydata,

                success: function(response) {
                    if (response > 0) {
                        alert('Save Successfully');
                        location.reload(500);
                    }
                }
            })

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
                $("#edit_cebu").hide(500);
            } else {
                $('tbody tr td input[type="checkbox"]').each(function() {
                    $('td input:checkbox', table).prop('checked', false);
                });
                $("#edit_cebu").show(500);
            }

        });
    </script>
    <!-- edit cebu local modal -->
    <script>
        $('#edit_cebu').on('click', function(e) {
            e.preventDefault();

            const id = $('input:checkbox[name=form_cebu]:checked').attr('value');
            if (id == null) {
                alert('Please select specific user.')
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'controls/display_cebu.php',
                    data: {
                        id: id
                    },

                    success: function(html) {

                        $('#edit_cebu_modal').modal('show');
                        $('#edit_cebu_body').html(html);
                    }
                })
            }

        });
    </script>
    <!-- get all value of checked item -->
    <script>
        $('#delete_cebu').on('click', function(e) {
            e.preventDefault();

            var form_id = []

            $('input:checkbox[name=form_cebu]:checked').each(function() {
                form_id.push($(this).val());
            })
            if (form_id < 1) {
                alert('Please select the specific user');
            } else {
                if (confirm('Warning: Are you sure to remove this user?')) {

                    $.ajax({
                        type: 'POST',
                        url: 'controls/delete_cebu.php',
                        data: {
                            id: form_id
                        },

                        success: function(response) {
                            if (response > 0) {
                                alert('Local successfully Removed!');
                                location.reload(500);
                            }
                        }
                    })
                }
            }

        });
    </script>
    <!-- save update modal -->
    <script>
        $('#btn_update').on('click', function(e) {
            e.preventDefault();

            const upd_id = $('#upd_id').val();
            const upd_local_no = $('#upd-local_no').val();
            const upd_dept = $('#upd-department').val();
            const upd_name = $('#upd-name').val();

            const mydata = 'id=' + upd_id + '&local_no=' + upd_local_no + '&department=' + upd_dept + '&name=' + upd_name;
            $.ajax({
                type: 'POST',
                url: 'controls/update_cebu_locals.php',
                data: mydata,

                success: function(response) {
                    if (response > 0) {
                        alert('Local Successfully update!');
                        location.reload();
                    }
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