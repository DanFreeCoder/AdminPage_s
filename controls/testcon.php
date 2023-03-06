<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';
ini_set("display_errors", "off"); //hide the annoying alert request when doing live searching, even if data is not found.
$database = new intranetconnect();
$db = $database->connect();
$count = new clsusers($db);

$users = new clsusers($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT * FROM users";

$get_all_rows = $users->userss($sql);
$total_all_rows = $get_all_rows->rowcount();

//for column to table
$columns = array(
    0 => 'id',
    1 => 'firstname',
    2 => 'lastname',
    3 => 'email',
    4 => 'username',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR lastname LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR email LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR username LIKE '%" . $searh_value . "%' AND status != 0";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . " WHERE status != 0"; //OK
}

if (isset($_POST['length']) != 0) { //ERROR
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length . " ";
}


$run_query = $users->userss($sql);

while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    $id = '<input type="checkbox" name="form_user" id="check_all" value="' . $row['id'] . '"></input>';
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $username = $row['username'];

    $data[] = array($id, $firstname, $lastname, $email, $username);
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
