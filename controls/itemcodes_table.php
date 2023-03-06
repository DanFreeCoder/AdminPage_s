<?php
include '../config/connection.php';
include '../objects/clsitemcodes.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();

$codes = new clsitemcodes($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT * FROM itemcodes";

$sql1 = "SELECT * FROM itemcodes WHERE status != 0"; //for counter display
$get_all_rows = $codes->itemcodes($sql1);
$total_all_rows = $get_all_rows->rowcount(); //total number display

//for column to table
$columns = array(
    0 => 'id',
    1 => 'itemcode',
    2 => 'itemdesc',
    3 => 'unit',
    4 => 'class',
    5 => 'category',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR itemcode LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR itemdesc LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR unit LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR class LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR category LIKE '%" . $searh_value . "%' AND status != 0";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . " "; //OK

} else {
    $sql .= " ORDER BY id DESC";
}
if (isset($_POST['length']) != '') {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length . " ";
}



$run_query = $codes->itemcodes($sql);


while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    $id = '<input type="checkbox" name="form_code" class="checklist" value="' . $row['id'] . '">';
    $itemcode = $row['itemcode'];
    $itemdesc =   $row['itemdesc'];
    $unit = $row['unit'];
    $class =   $row['class'];
    $category =   $row['category'];


    $data[] = array($id, $itemcode, $itemdesc, $unit, $class, $category);
}
$count_rows = $run_query->rowcount();
// echo $count_rows;

if (!isset($_POST['draw'])) {
    echo 'draw is not isset';
}


$output = array(
    'draw' => $_POST['draw'],
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
    'error' => '' //optional

);
// print_r($data);
// print_r($output);

echo json_encode($output, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
