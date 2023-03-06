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
            <!-- start Left side columns -->
            <div class="d-flext justify-content-start mb-2">
              <div id="edit_memo" class="fa-light fa-pen-to-square btn btn-primary"> <i class="bi bi-pencil-square"></i> Edit </div>
              <div class="btn btn-danger" id="delete_memo"> <i class="bi bi-trash3"></i> Delete </div>
            </div>
            <div class="card post">
              <table id="post-table" class="table table-dark table-striped mt-3 " style="width:100%;" cellspacing="0">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="check_all"></input></th>
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
                  <!-- datatable goes here -->
                </tbody>
              </table>
            </div>
          </div><!-- end Left side columns -->
        </div>

      </div> <!-- end of row class -->
    </section>

    <!-- Modal edit -->
    <div class="modal fade" id="edit_memo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Memo Details</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="edit_memo_body">
            <!-- manila body goes here -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="btn_update" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

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
      $('.table').DataTable({
        "fnCreateRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'controls/policies_table.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": 'true',
          "aTargets": [3]
        }, ],
        "columnDefs": [{
          "orderable": false,
          "targets": 0 //unable sorting in action's column
        }]
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
      // $('#accounting').hide();

      // $('#account-btn').click(function() {
      //   $('#accounting').toggle(500);
      // })
      <?php include 'includes/hover.php'; ?>


      // change the color of datatable filter
      $('.dataTables_filter input').css("color", "whitesmoke").css("background-color", "#171819")
      $('.card .dataTables_length select').css("color", "whitesmoke").css("background-color", "#171819")
    });
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
        $("#edit_memo").hide(500);
      } else {
        $('tbody tr td input[type="checkbox"]').each(function() {
          $('td input:checkbox', table).prop('checked', false);
        });
        $("#edit_memo").show(500);
      }

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

  <!-- edit manila local modal -->
  <script>
    $('#edit_memo').on('click', function(e) {
      e.preventDefault();

      const id = $('input:checkbox[name=form_memo]:checked').attr('value');
      if (id == null) {
        alert('Please select specific memo.')
      } else {
        $.ajax({
          type: 'POST',
          url: 'controls/display_memo.php',
          data: {
            id: id
          },

          success: function(html) {

            $('#edit_memo_modal').modal('show');
            $('#edit_memo_body').html(html);
          }
        })
      }

    });
  </script>

  <!-- get all value of checked item -->
  <script>
    $('#delete_memo').on('click', function(e) {
      e.preventDefault();

      var form_id = []

      $('input:checkbox[name=form_memo]:checked').each(function() {
        form_id.push($(this).val());
      })
      if (form_id < 1) {
        alert('Please select the specific user');
      } else {
        if (confirm('Warning: Are you sure to remove this user?')) {

          $.ajax({
            type: 'POST',
            url: 'controls/delete_memo.php',
            data: {
              id: form_id
            },

            success: function(response) {
              if (response > 0) {
                alert('Memo successfully Removed!');
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
      const upd_local_no = $('#upd-memo_no').val();
      const upd_dept = $('#upd-title').val();
      const upd_name = $('#upd-filename').val();


      const mydata = 'id=' + upd_id + '&memo_no=' + upd_local_no + '&title=' + upd_dept + '&filename=' + upd_name;
      $.ajax({
        type: 'POST',
        url: 'controls/update_memo.php',
        data: mydata,

        success: function(response) {
          if (response > 0) {
            alert('Memo Successfully update!');
            location.reload();
          }
        }
      })
    })
  </script>
</body>

</html>