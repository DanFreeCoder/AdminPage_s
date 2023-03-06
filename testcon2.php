<?php
include './config/connection.php';
include './objects/clsposts.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();
$count = new clsposts($db);

$code = new clsposts($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT * FROM posts";

$get_all_rows = $code->posts($sql);
$total_all_rows = $get_all_rows->rowcount();

//for column to table
$columns = array(
    0 => 'id',
    1 => 'type',
    2 => 'department',
    3 => 'date_added',
    4 => 'status',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%'";
    $sql .= " OR type LIKE '%" . $searh_value . "%'";
    $sql .= " OR department LIKE '%" . $searh_value . "%'";
    $sql .= " OR date_added LIKE '%" . $searh_value . "%'";
    $sql .= " OR status LIKE '%" . $searh_value . "%'";
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



$run_query = $code->posts($sql);
while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    $id = '<input type="checkbox" name="form_post" id="checkbox_user" class="form_post" value="' . $row['id'] . '" >';
    $type = $row['type'];
    $department = $row['department'];
    $date_added = $row['date_added'];
    $status = $row['status'];

    $data[] = array($id, $type, $department, $date_added, $status);
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
