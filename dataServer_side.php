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
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />

    <style>
        .search {
            float: right;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Pagination</h1>
        <!-- <select id="row">
            <?php
            $limit = [10, 100, 500, 1000, 5000];
            foreach ($limit as $limits) {
                echo '<option value="' . $limits . '">' . $limits . '</option>';
            }
            ?>


        </select> -->
        <!-- <form class="search p-0">
            <p>Search:</p>
            <input type="text" name="search" placeholder="Live Search" id="search">
        </form> -->
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ITEM CODE</th>
                    <th>ITEM DESCRIPTION</th>
                    <th>UNIT OF MEASURE</th>
                    <th>ITEM CLASSIFICATION</th>
                    <th>TRADE CLASSIFICATION</th>
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
            $('table').DataTable({
                "fnCreateRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                },
                'serverSide': 'true',
                'processing': 'true',
                'paging': 'true',
                'order': [],
                'ajax': {
                    'url': './controls/server-side.php',
                    'type': 'post',
                },
                "aoColumnDefs": [{
                        "bSortable": 'true',
                        "aTargets": [5]
                    },

                ]
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

</body>

</html>