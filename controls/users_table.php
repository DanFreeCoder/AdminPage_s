<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();
$count = new clsusers($db);

$users = new clsusers($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT id, firstname, lastname, username, access_type_id, log_count, verification_code, security_q, security_a, log, status FROM users";

$sql1 = "SELECT id, firstname, lastname, username, access_type_id, log_count, verification_code, security_q, security_a, status, log FROM users WHERE status != 0 ORDER BY access_type_id asc"; //for counter display
$get_all_rows = $users->user_details($sql1);
$total_all_rows = $get_all_rows->rowcount(); //total number display

//for column to table
$columns = array(
    0 => 'id',
    1 => 'firstname',
    2 => 'lastname',
    3 => 'username',
    4 => 'access_type_id',
    5 => 'action',
    6 => 'log',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR firstname LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR lastname LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR username LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR access_type_id LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR log LIKE '%" . $searh_value . "%' AND status != 0";
} else {
    $sql .= " WHERE id LIKE '%%' AND status != 0";
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

$run_query = $users->user_details($sql);

while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    if ($row['access_type_id'] == '1') {
        $role = 'Administrator';
    } else if ($row['access_type_id'] == '2') {
        $role = 'HR';
    } else {
        $role = 'Staff';
    }
    if ($row['log'] != 1) {
        $on_line = 'Out';
        $s = '<a href="#" class="offline" value="' . $row['log'] . '" style="color:red; "><center>' . $on_line . '</center></a>';
    } else {
        $on_line = 'In';
        $s = '<a href="#"><center class="online" style="color: green;" value="' . $row['log'] . '">' . $on_line . '</center></a>';
    }
    $id = '<input type="checkbox" name="form_user" id="checkbox_user" class="form_user" value="' . $row['id'] . '" >';
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $roles = $role;
    $action = '<center><a href="#" value="' . $row['id'] . '" class="viewUserAction"><i id="action" class="bi bi-arrows-move"></i></a>';
    $log = $s;

    $data[] = array($id, $firstname, $lastname, $username, $roles, $action, $log);
}
$count_rows = $run_query->rowcount();


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
