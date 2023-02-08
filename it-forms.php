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
      <h1><i class="bi bi-file-post-fill"></i>IT Forms</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="it-forms.php">Forms</a></li>
          <li class="breadcrumb-item active">IT</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- start Left side columns -->
            <div class="card post">
              <table id="post-table" class="table table-striped mt-3" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><input type="checkbox"></input></th>
                    <th>File Name</th>
                    <th>
                      <center>Form Type</center>
                    </th>
                    <th>
                      <center>Description</center>
                    </th>
                    <th>
                      <center>Action</center>
                    </th>
                  </tr>
                </thead>
                <tbody id="post-body" <tr>
                  <td><input type="checkbox" name="checklist" class="checklist" value=""></td>
                  <td></td>
                  <td>
                    <center></center>
                  </td>
                  <td>
                    <center></center>
                  </td>
                  <td>
                    <center><i class="bi bi-download"></i></center>
                  </td>
                  </tr>
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
      $('.table').DataTable();
      // change the color of datatable filter
      $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
      $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")

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