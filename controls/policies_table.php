
<?php
include '../config/connection.php';
include '../objects/clsmemo_policies.class.php';
ini_set("display_errors", "off");
$database = new intranetconnect();
$db = $database->connect();
$memo = new clsmemo_policies($db);

$output = array();

header("Content-Type: application/json");
$sql = "SELECT id, memo_no, title, 'filename', status FROM memos";

$sql1 = "SELECT id, memo_no, title, 'filename', status FROM memos WHERE status != 0";
$get_all_rows = $memo->memos_details($sql1);
$total_all_rows = $get_all_rows->rowcount();

//for column to table
$columns = array(
    0 => 'id',
    1 => 'memo_no',
    2 => 'title',
    3 => 'filename',
);
//if search is keyup query will process
if (isset($_POST['search']['value'])) {
    $searh_value = $_POST['search']['value'];
    $sql .= " WHERE id LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR memo_no LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR title LIKE '%" . $searh_value . "%' AND status != 0";
    $sql .= " OR filename LIKE '%" . $searh_value . "%' AND status != 0";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . ""; //OK
}

if (isset($_POST['length']) != '') { //ERROR
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT " . $start . ", " . $length . " ";
}


$run_query = $memo->memos_details($sql);
while ($row = $run_query->fetch(PDO::FETCH_ASSOC)) {

    $id = '<input type="checkbox" name="form_memo" class="checklist" value="' . $row['id'] . '">';
    $memo_no = '<small>' . $row['memo_no'] . '</small>';
    $title = '<small>' . $row['title'] . '</small>';
    $filename = '<small><a style="color:#07b9ad;" href="' . $row['filename'] . '"><i class="bi bi-image-fill" style="color:#07b9ad;"></i>View Memo</a></small>';



    $data[] = array($id, $memo_no, $title, $filename);
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
