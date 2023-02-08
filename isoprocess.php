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
        li {
            list-style: circle;
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
            <h1><i class="bi bi-file-post-fill"></i>ISO Processes & Forms</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">ISO Processes & Forms</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <!-- start Left side columns -->
                        <div class="card post">
                            <div class="card-header">
                                <center>
                                    <strong>
                                        <p>INDUCO QUALITY MANAGEMENT SYSTEM</p>
                                    </strong>
                                </center>
                            </div>
                            <strong style="color: #4154f1;">
                                <p>MANAGEMENT SYSTEM MANUAL</p>
                            </strong>
                            <div style="margin-left: 30px;">

                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/MS%20Manual/Section%2001.%20Quality%20Management%20System%20Description.pdf">Section 01. Quality Management System Description</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/MS%20Manual/Section%2002.%20Quality%20Policy-Rev.0.pdf">Section 02. Quality Policy</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/MS%20Manual/Section%2003.%20Organizational.pdf">Section 03. Organizational</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/MS%20Manual/Section%2004.%20Management%20System%20Diagrams-Rev.2.pdf">Section 04. Management System Diagrams</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/MS%20Manual/Section%2005.%20Quality%20Management%20Matrix-Rev.2.pdf">Section 05. Quality Management System Matrix</a></li>
                            </div>
                            <strong style="color: #4154f1;">
                                <p>REFERENCE DOCUMENTS</p>
                            </strong>
                            <label type="button" id="resolution-btn">IATF-Resolution</label>
                            <ul class="list">
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/IATF-Resolution/IATF-GUIDELINES-RRD%20-%2002-27%202022.pdf">IATF-GUIDELINES-RRD - 02-27 2022</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/IATF-Resolution/IATF-Resolution%20No.15%20-%2024-Mar%202020.pdf">IATF-Resolution No.15 - 24-Mar 2020</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/IATF-Resolution/IATF-Resolution%20No.16%20-%2030-Mar%202020.pdf">IATF-Resolution No.16 - 30-Mar 2020</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/IATF-Resolution/IATF-Resolution-148B%20-11-Nov%202021.pdf">IATF-Resolution-148B -11-Nov 2021</a></li>
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/IATF-Resolution/IATF-Resolution-148B%20-23-Sep%202021.pdf   ">IATF-Resolution-148B -23-Sep 2021</a></li>
                            </ul>
                            <label type="button" id="list1-btn">ISO 9001 2015 Requirements Clauses</label>
                            <ul class="list1">
                                <li><a href="https://www.innogroup.com.ph/isearch/documents/iso/QMS/ISO%209001%202015/ISO%209001%202015%20Requirements%20Clauses.pdf"></a>ISO 9001 2015 Requirements Clauses</li>
                            </ul>
                            <strong style="color: #4154f1; margin-top:10px;">
                                <p>SYSTEM PROCEDURE MANUAL</p>
                            </strong>
                            <table>
                                <thead>
                                    <tr>
                                        <th>SECTION</th>
                                        <th>PROCESS CODE</th>
                                        <th>PROCESS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td>01</td>
                                    <td>MPL</td>
                                    <td><label type="button" id="Management-btn">Management Planning</label>
                                        <ul class="list3">
                                            <li><a href="">File</a></li>
                                            <li><a href="">File</a></li>
                                            <li><a href="">File</a></li>
                                            <li><a href="">File</a></li>
                                        </ul>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end Left side columns -->
            </div>

            </div> <!-- end of row class -->
        </section>

    </main><!-- End #main -->

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

            $('.list').hide();
            $('.list3').hide();
            $('.list1').hide();

            $('#resolution-btn').click(function() {
                $('.list').toggle(500);
            })
            $('#Management-btn').click(function() {
                $('.list3').toggle(500);
            })
            $('#list1-btn').click(function() {
                $('.list1').toggle(500);
            })
            <?php include 'includes/hover.php'; ?>
        });
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