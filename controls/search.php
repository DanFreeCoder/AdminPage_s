<?php
include '../config/connection.php';
include '../objects/clsitemcodes.php';

$database = new intranetconnect();
$db = $database->connect();

$search = new clsitemcodes($db);

$post = $_POST['search'];
$data = $search->search($post);
if ($data->rowCount() == '') {
    echo "<h3>Data not found.</h3>";
} else {

    while ($row = $data->fetch(PDO::FETCH_ASSOC)) {

        echo '
        <tr>
        <td><input type="checkbox" name="form_code" class="checklist" value="' . $row['id'] . '"></td>
        <td>' . $row['itemcode'] . '</td>
        <td>' . $row['itemdesc'] . '</td>
        <td>' . $row['unit'] . '</td>
        <td>' . $row['class'] . '</td>
        <td>' . $row['category'] . '</td>
    </tr>
        ';
    }
}
