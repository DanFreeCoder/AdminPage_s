<?php
include '../config/connection.php';
include '../objects/clslocals.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();
$count = new clslocals($db);

$code = new clslocals($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT * FROM locals";

$sql1 = "SELECT * FROM locals WHERE trunkline != 2"; //for counter display
$get_all_rows = $code->cebu_locals($sql1);
$total_all_rows = $get_all_rows->rowcount(); //total number display

//for column to table
$columns = array(
    0 => 'id',
    1 => 'local_no',
    2 => 'name',
    3 => 'department',
    4 => 'status',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND trunkline != 2";
    $sql .= " OR local_no LIKE '%" . $searh_value . "%' AND trunkline != 2";
    $sql .= " OR name LIKE '%" . $searh_value . "%' AND trunkline != 2";
    $sql .= " OR department LIKE '%" . $searh_value . "%' AND trunkline != 2";
    $sql .= " OR status LIKE '%" . $searh_value . "%' AND trunkline != 2";
} else {
    $sql .= " WHERE id LIKE '%%' AND trunkline != 2";
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



$run_query = $code->cebu_locals($sql);

while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    if ($row['status'] != 0) {
        $status = 'ACTIVE';
        $s = '<center style="color: green;">' . $status . '</center>';
    } else {
        $status = 'INACTIVE';
        $s = '<a href="#" Onclick="inactive()" value="' . $row['status'] . '" style="color:red; "><center data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Tooltip on left">' . $status . '</center></a>';
    }
    $id = '<input type="checkbox" name="form_cebu" class="checklist" value="' . $row['id'] . '">';
    $local_no = $row['local_no'];
    $name = $row['name'];
    $department = $row['department'];
    $status = $s;


    $data[] = array($id, $local_no, $name, $department, $status);
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
