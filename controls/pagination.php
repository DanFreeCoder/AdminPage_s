<?php

include '../config/connection.php';
include '../objects/clsitemcodes.class.php';

$database = new intranetconnect();
$db = $database->connect();
$page = new clsitemcodes($db);
$count = new clsitemcodes($db);


if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}


$total_view_perpage = $_POST['total_view_perpage'];
$offset = ($page_no - 1) * $total_view_perpage;
$array = array($offset, $total_view_perpage);
$rows = $page->code($array);


while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
    echo '
 <tr>
    <td>' . $row['id'] . '</td>
    <td>' . $row['internal_id'] . '</td>
    <td>' . $row['itemcode'] . '</td>
    <td>' . $row['itemdesc'] . '</td>
    <td>' . $row['unit'] . '</td>
    <td>' . $row['class'] . '</td>
    <td>' . $row['category'] . '</td>
</tr>
 ';
}
