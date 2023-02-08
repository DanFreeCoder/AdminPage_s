<?php
include './config/connection.php';
include './objects/clsmemo-policies.php';

$database = new intranetconnect();
$db = $database->connect();

$memos = new clsmemo_policies($db);
$view_memos = $memos->memos_details();

$database2 = new intranetconnect();
$db2 = $database->connect();

$tblmemo = new clsmemo_policies($db2);
$view_tblmemo = $tblmemo->memo_table_content();

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
    .memo:hover {
      text-decoration: underline;
    }

    table thead tr th {
      padding-right: 70px;
      text-align: center;
    }

    .modal-dialog {
      width: 100% center;
      max-width: 800px;
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
      <h1><i class="bi bi-file-post-fill"></i>Policies & Memos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Policies & Memos</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">

            <div class="card post">
              <table id="post-table" class="table table-dark table-striped mt-3" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>MEMO NO.</th>
                    <th>
                      <center>MEMO TITLE</center>
                    </th>
                    <th>
                      <center>DOCUMENT</center>
                    </th>
                  </tr>
                </thead>
                <tbody id="post-body">
                  <?php
                  while ($row = $view_memos->fetch(PDO::FETCH_ASSOC)) {
                    echo
                    '<tr>
                      <td><small>' . $row['memo_no'] . '</small></td>
                      <td><small>' . $row['title'] . '</small></td>
                      <td class="memo"><small><a style="color:#07b9ad;" href="' . $row['filename'] . '"><i class="bi bi-image-fill" style="color:#07b9ad;"></i>View Memo</a></small></td>
                    </tr>';
                  }
                  ?>

                </tbody>
              </table>
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
      // $('#accounting').hide();

      // $('#account-btn').click(function() {
      //   $('#accounting').toggle(500);
      // })
      <?php include 'includes/hover.php'; ?>

      $('#post-table').DataTable();
      // change the color of datatable filter
      $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
      $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")
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