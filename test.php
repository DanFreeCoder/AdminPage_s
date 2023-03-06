<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination1</title>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="dist/js/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

    <style>
        .search {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>Pagination</h1>
        <div class="btn btn-danger" id="delete_post">Remove</div>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" id="check_all"></input></th>
                    <th>Post Title</th>
                    <th>Department</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="data">

            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">

            </ul>
        </nav>


    </div>

    <hr>

    <script src="dist/js/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.2/sl-1.6.0/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.6.0/js/dataTables.select.min.js"></script>
    <!-- <script src="dist/js/jquery.dataTables.js" type="text/javascript"></script> -->
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
                    'url': './testcon2.php',
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

            // const page_no = $(location).attr('href');
            // console.log(page_no.slice(43));

            // $('#row').on('change', function(e) {
            //     e.preventDefault();
            //     var row = $(this).val();

            // })

            // search capability
            $('#search').keyup(function() {
                const search = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: './controls/search.php',
                    data: {
                        search: search
                    },
                    success: function(html) {
                        $('#data').html(html);
                    }
                })
            });


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
            } else {
                $('tbody tr td input[type="checkbox"]').each(function() {
                    $('td input:checkbox', table).prop('checked', false);
                });

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
            })
            alert(form_id)
            if (form_id < 1) {
                alert('Please select the specific user');
            } else {
                if (confirm('Warning: Are you sure to remove this user?')) {
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

</body>

</html>