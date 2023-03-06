<?php
include '../config/connection.php';
include '../objects/clsmemo_policies.class.php';

$database = new intranetconnect();
$db = $database->connect();

$memo = new clsmemo_policies($db);

foreach ($_POST['id'] as $id) {
    $memo->id = $id;
    $memo->status = 0;

    $del = $memo->delete_memo();
}

if ($del) {
    echo 1;
} else {
    echo 0;
}
