<?php
include './config/connection.php';
include './objects/clsjob.php';

$database = new intranetconnect();
$db = $database->connect();

$job = new clsjob($db);
$view_job = $job->job_details();

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
    <style>
        #edit:hover,
        #remove:hover,
        a:hover {
            cursor: pointer;
            color: #4a69bd;
        }

        table {
            text-align: center;
        }

        body {
            margin: 0;
            padding: 0;
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
            <h1><i class="bi bi-file-ruled"></i>Job Vaccancies</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Job Vaccancies</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- start Left side columns -->
                        <div class="card pb-3">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-header">Add a Job Vacancies
                                            <input type="text" class="form-control" placeholder="Position" aria-label="Username" id="job_po">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-header">Number of Vacancies
                                            <input type="text" class="form-control" placeholder="No. of Vacancies" aria-label="Username" aria-describedby="addon-wrapping" id="job_num">
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-12">Job Summary
                                            <textarea class="form-control" style="width:100%;" rows="7" placeholder="Job Qualifications" id="job_sum"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-success" id="add_job">Add</button>
                                            <button type="button" class="btn btn-secondary" id="job_clear">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="jumbotron">
                            <div class="card-header pb-0">
                                <p><strong>Innoland need of the following position below.</strong></p>
                            </div>
                            <div class="card">
                                <table class="table table-dark table-striped mt-2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Position</th>
                                            <th scope="col">Vaccancies</th>
                                            <th scope="col">Job Summary</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = $view_job->fetch(PDO::FETCH_ASSOC)) {
                                            echo '
                                        <tr>
                                        <td>' . $row['position'] . '</td>
                                        <td>' . $row['no_of_job'] . '</td>
                                        <td>' . $row['summary'] . '</td>
                                        <td>
                                            <a style="color:#07b9ad;" class="edit" value="' . $row['id'] . '">Edit</a>|<a style="color:red;" class="remove" value="' . $row['id'] . '">Remove</a>
                                        </td>
                                    </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-header pt-1 border-top">
                                <p><strong>Please sumbit your requirments thru:</strong></p>
                            </div>
                            <div class="card pt-3 pb-3">
                                <div class="container" style="font-family: Arial, Helvetica, sans-serif;">
                                    <strong>
                                        <p class="p-0" style="font-style:oblique;">WALK IN:</p>
                                    </strong>
                                    <small>15th Floor TGU Tower JM Del Mar St. Cebu IT Park Apas Cebu City</small>
                                    <strong>
                                        <p style="font-style:oblique;">EMAIL TO:</p>
                                    </strong>
                                    <small>concepcion.vasquez@innogroup.com.ph or cebu.careers@innoland.com.ph</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->


            </div> <!-- end of row class -->
        </section>

    </main><!-- End #main -->


    <!-- Modal -->
    <div class="modal fade" id="edit-job" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></i>Update Job Vaccancies</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn_update btn btn-primary">Save changes</button>
                </div>
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
            $('.table').DataTable();
            // change the color of datatable filter
            $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
            $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")

            $('#job_clear').click(function() {
                $('#job_summary').val("");

            });

        });
    </script>
    <!-- save job actiob -->
    <script>
        $('#add_job').on('click', function(e) {
            e.preventDefault();
            const job_po = $('#job_po').val();
            const job_num = $('#job_num').val();
            const job_sum = $('#job_sum').val();

            const mydata = 'job_po=' + job_po + '&job_num=' + job_num + '&job_sum=' + job_sum;
            $.ajax({
                type: 'POST',
                url: 'controls/save_jobs.php',
                data: mydata,

                success: function(response) {
                    if (response > 0) {
                        alert("Add Successfully");
                    }
                }
            })
        })
    </script>
    <!-- select job details -->
    <script>
        $('.edit').on('click', function(e) {
            e.preventDefault();

            const id = $(this).attr('value');
            mydata = 'id=' + id;
            $.ajax({
                type: 'POST',
                url: 'controls/display_job.php',
                data: mydata,

                success: function(html) {
                    $('#edit-job').modal('show');
                    $('#modal-body').html(html);
                }
            })
        })
    </script>

    <!-- Udpate Action -->
    <script>
        $(document).on('click', '.btn_update', function(e) {
            e.preventDefault();
            const upd_id = $('#upd-id').val();
            const upd_job_po = $('#upd-job_position').val();
            const upd_job_no = $('#upd-job_no').val();
            const upd_job_summary = $('#upd-job_summary').val();

            const mydata = 'id=' + upd_id + '&job_po=' + upd_job_po + '&job_no=' + upd_job_no + '&job_summary=' + upd_job_summary;
            $.ajax({
                type: 'POST',
                url: 'controls/update_job.php',
                data: mydata,

                success: function(response) {
                    if (response > 0) {
                        alert('Job Update Successfully');
                        location.reload();
                    }
                }
            })

        })
    </script>
    <!-- delete job list -->
    <script>
        $('.remove').on('click', function(e) {
            e.preventDefault();
            const id = $(this).attr('value');
            if (confirm('Warning: Are you sure you want to remove this data?')) {
                $.ajax({
                    type: 'POST',
                    url: 'controls/delete_job.php',
                    data: {
                        id: id
                    },
                    success: function(response) {
                        if (response > 0) {
                            alert('Successfully Removed.');
                            location.reload();
                        }
                    }
                })
            }

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