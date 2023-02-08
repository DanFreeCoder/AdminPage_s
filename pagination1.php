<?php
include './config/connection.php';
include './objects/clsitemcodes.php';

$database = new intranetconnect();
$db = $database->connect();
$page = new clsitemcodes($db);
$count = new clsitemcodes($db);

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}


?>




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
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select> -->
        <form class="search p-0">
            <p>Search:</p>
            <input type="text" name="search" placeholder="Live Search" id="search">
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>internal_id</th>
                    <th>itemcode</th>
                    <th>itemdesc</th>
                    <th>unit</th>
                    <th>category</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody id="data">
                <?php
                //operations
                $total_record_perpage = 10;
                $offset = ($page_no - 1) * $total_record_perpage;
                $array = array($offset, $total_record_perpage);
                $rows = $page->code($array);

                while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                    <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['internal_id'] . '</td>
                    <td>' . $row['itemcode'] . '</td>
                    <td>' . $row['itemdesc'] . '</td>
                    <td>' . $row['unit'] . '</td>
                    <td>' . $row['category'] . '</td>
                    <td>' . $row['status'] . '</td>

                </tr>
                    ';
                }
                $previews_page = $page_no - 1;
                $next_page = $page_no + 1;
                ?>
                <!-- get the total of codes -->
                <?php
                $row2 = $count->get_codes_count();
                while ($row1 = $row2->fetch(PDO::FETCH_ASSOC)) {
                    $total_of_rows = $row1['total_record'];
                }
                $totalcount = ceil($total_of_rows / $total_record_perpage);
                ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link <?= ($page_no <= 1) ? 'disabled' : ''; ?>" <?= ($page_no > 1) ? 'href=?page_no=' . $previews_page : ''; ?>>&laquo;</a></li>
                <?php

                if ($page_no > 4) {
                    echo '<li class="page-item"><a class="page-link" href=?page_no=1>1</a></li>';
                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                }
                for ($i = $page_no - 3; $i < $page_no; $i++) {

                    if ($i > 0) {
                        echo '<li class="page-item"><a class="page-link" href=?page_no=' . $i . '>' . $i . '</a></li>';
                    }
                }
                echo '<li><a class="page-link active" href=?page_no=' . $page_no . '>' . $page_no . '</a></li>';


                for ($i = $page_no + 1; $i <= $totalcount; $i++) {
                    echo '<li class="page-item"><a class="page-link" href=?page_no=' . $i . '>' . $i . '</a></li>';
                    if ($i >= $page_no + 3) {
                        break;
                    }
                }
                if ($page_no < $totalcount) {
                    echo '<li class="page-item"><a class="page-link">...</a></li>';
                    echo '<li class="page-item"><a class="page-link" href=?page_no=' . $totalcount . '>' . $totalcount . '</a></li>';
                }
                ?>

                <li class="page-item"><a class="page-link <?= ($page_no >= $totalcount) ? 'disabled' : ''; ?>" <?= ($page_no < $totalcount) ? 'href=?page_no=' . $next_page : ''; ?>>&raquo;</a></li>
            </ul>
        </nav>

        <label><strong><?php echo $page_no ?> of</strong></label>
        <label><strong><?php echo  $totalcount ?></strong></label>
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

            const page_no = $(location).attr('href');
            console.log(page_no.slice(43));

            $('#row').on('change', function(e) {
                e.preventDefault();
                var row = $(this).val();
                alert(row);
            })


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
            })

        })
    </script>


</body>

</html>