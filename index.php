<?php
include './config/connection.php';
include './objects/clsposts.php';

$database = new intranetconnect();
$db = $database->connect();

$posts = new clsposts($db);
$view_posts = $posts->posts_details();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
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
  <link href="assets/css/lightbg.css" rel="stylesheet">
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
      <h1 id="post"><i class="bi bi-file-post-fill"></i>Post</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <!-- start Left side columns -->
            <div class="d-flext justify-content-start mb-2">
              <div id="edit_post" class="fa-light fa-pen-to-square btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit </div>
              <div class="btn btn-danger" id="delete_post"> <i class="bi bi-trash3"></i> Delete </div>
            </div>
            <div class="card post">
              <table id="post-table" class="table table-dark table-striped mt-3" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="check_all"></input></th>
                    <th>Post Title</th>
                    <th>
                      <center>Department</center>
                    </th>
                    <th>
                      <center>Date Posted</center>
                    </th>
                    <th>
                      <center>Status</center>
                    </th>
                  </tr>
                </thead>
                <tbody id="post-body">
                  <?php
                  while ($row = $view_posts->fetch(PDO::FETCH_ASSOC)) {
                    if ($row['status'] != 0) {
                      $status = 'ACTIVE';
                      echo ' 
                      <tr>
                      <td><input type="checkbox" name="form_post" class="checklist" value="' . $row['id'] . '"></td>
                      <td>' . $row['type'] . '</td>
                      <td>
                        <center>' . $row['department'] . '</center>
                      </td>
                      <td>
                        <center>' . $row['date_added'] . '</center>
                      </td>
                      <td style="color: green;">
                        <center>' . $status . '</center>
                      </td>
                      </tr>';
                    } else {
                      $status = 'INACTIVE';
                      echo ' 
                      <tr>
                      <td><input type="checkbox" name="form_post" class="inactive checklist" value="' . $row['id'] . '"></td>
                      <td>' . $row['type'] . '</td>
                      <td>
                        <center>' . $row['department'] . '</center>
                      </td>
                      <td>
                        <center>' . $row['date_added'] . '</center>
                      </td>
                      <td style="color: red;">
                      <a href="#" class="status" value="' . $row['status'] . '" style="color:red; "><center data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Retrieve data?">' . $status . '</center></a>
                      </td>
                      </tr>';
                    }
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

  <!-- Modal -->
  <div class="modal fade" id="editmodal_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Udpate Post</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="edit_modal_body">
          <!-- post goes here -->
        </div>
        <div class="modal-footer" id="">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btn_update_post" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="modal btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> -->

  <!-- Modal -->
  <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #242526;">
        <div class="modal-body">
          <div class="logo">
            <center><img src="assets/img/innoland.png" width="80"></center>
          </div>
          <center>
            <h3>Welcome back <?php $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?></h3>
          </center>
        </div>
        <button type="button" class="btn btn-secondary" style="width: 25%; margin-left: 35%; margin-bottom:20px;" data-bs-dismiss="modal">Start</button>
      </div>
    </div>
  </div> -->

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

      // retrieve data
      $('.status').on('click', function(e) {
        e.preventDefault();
        const id = $('.inactive').val();
        const status = $(this).val();
        const mydata = 'id=' + id + '&status=' + status;
        $.ajax({
          type: 'POST',
          url: 'controls/retrieve_post.php',
          data: mydata,

          success: function(response) {
            if (response > 0) {
              alert('Successfully Retrieve');
              location.reload();
            }
          }
        })
      });
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


    });
  </script>

  <script>
    $('#check_all').change(function(e) {
      e.preventDefault();
      if ($(this).prop('checked')) {
        var table = $(e.target).closest('table');
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', true);
        });
        $("#edit_post").hide(500);
      } else {
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', false);
        });
        $("#edit_post").show(500);
      }

    });
  </script>

  <!-- get all value of checked item -->
  <script>
    $('#delete_post').on('click', function(e) {
      e.preventDefault();

      var form_id = []

      $('input:checkbox[name=form_post]:checked').each(function() {
        form_id.push($(this).val());
      });

      if (form_id < 1) {
        alert('Please select the specific user');
      } else {
        if (confirm('Warning: Are you sure to remove this post?')) {

          $.ajax({
            type: 'POST',
            url: 'controls/delete_post.php',
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

  <!-- edit post modal -->
  <script>
    $('#edit_post').on('click', function(e) {
      e.preventDefault();

      const id = $('input:checkbox[name=form_post]:checked').attr('value');
      if (id == null) {
        alert('Please select specific post.')
      } else {
        $.ajax({
          type: 'POST',
          url: 'controls/select_posts.php',
          data: {
            id: id
          },

          success: function(html) {
            $('#editmodal_post').modal('show');
            $('#edit_modal_body').html(html);
          }
        })
      }

    })
  </script>
  <!-- save update modal -->
  <script>
    $('#btn_update_post').on('click', function(e) {
      e.preventDefault();

      const upd_id = $('#upd-id').val();
      const upd_title = $('#upd-title').val();
      const upd_dept = $('#upd-dept').val();
      const upd_date_added = $('#upd-date_added').val();


      const mydata = 'id=' + upd_id + '&title=' + upd_title + '&dept=' + upd_dept + '&date_added=' + upd_date_added;
      $.ajax({
        type: 'POST',
        url: 'controls/update_posts.php',
        data: mydata,

        success: function(response) {
          if (response > 0) {
            alert('Post Successfully update!');
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