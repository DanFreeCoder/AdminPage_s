<?php
include '../config/connection.php';
include '../objects/clsjob.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();
$count = new clsjob($db);

$job = new clsjob($db);
$output = array();

header("Content-Type: application/json");
$sql = "SELECT id, position, no_of_job, summary, status FROM job_vacancies";

$sql1 = "SELECT id, position, no_of_job, summary, status FROM job_vacancies WHERE no_of_job != 0 AND status != 0"; //for counter display
$get_all_rows = $job->job_details($sql1);
$total_all_rows = $get_all_rows->rowcount(); //total number display

//for column to table
$columns = array(
    0 => 'position',
    1 => 'no_of_job',
    2 => 'summary',
    3 => 'action',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND no_of_job != 0 AND status != 0";
    $sql .= " OR position LIKE '%" . $searh_value . "%' AND no_of_job != 0 AND status != 0";
    $sql .= " OR no_of_job LIKE '%" . $searh_value . "%' AND no_of_job != 0 AND status != 0";
    $sql .= " OR summary LIKE '%" . $searh_value . "%' AND no_of_job != 0 AND status != 0";
} else {
    $sql .= " WHERE id LIKE '%%' AND no_of_job != 0 AND status != 0";
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



$run_query = $job->job_details($sql);

while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {
    $position = $row['position'];
    $no_of_job = $row['no_of_job'];
    $summary =   $row['summary'];
    $action = '<a><i class="bi bi-pencil-square text-info edit" value="' . $row['id'] . '"></a></i>|<a><i class="bi bi-x-circle text-danger remove" value="' . $row['id'] . '"></i></a>';

    $data[] = array($position, $no_of_job, $summary, $action);
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
