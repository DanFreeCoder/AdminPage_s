
<?php
include '../config/connection.php';
include '../objects/clsitemcodes.php';

$database = new intranetconnect();
$db = $database->connect();
$count = new clsitemcodes($db);

$code = new clsitemcodes($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT * FROM itemcodes";

$get_all_rows = $code->item($sql);
$total_all_rows = $get_all_rows->rowcount();

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
    $sql .= " WHERE status != 0 AND itemcode LIKE '%" . $searh_value . "%'";
    $sql .= " OR itemdesc LIKE '%" . $searh_value . "%'";
    $sql .= " OR unit LIKE '%" . $searh_value . "%'";
    $sql .= " OR class LIKE '%" . $searh_value . "%'";
    $sql .= " OR category LIKE '%" . $searh_value . "%'";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . ""; //OK
}

if (isset($_POST['length']) != 0) { //ERROR
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length . " ";
}



$run_query = $code->item($sql);
while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    $id = $row['id'];
    $itemcode = $row['itemcode'];
    $itemdesc = $row['itemdesc'];
    $unit = $row['unit'];
    $class = $row['class'];
    $category = $row['category'];

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

);
// print_r($data);
// print_r($output);
echo json_encode($output, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
