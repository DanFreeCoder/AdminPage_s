<?php
include '../config/connection.php';
include '../objects/clslocals.php';

$database = new intranetconnect();
$db = $database->connect();
$cebu = new clslocals($db);

$items = $_POST['id'];
foreach ($items as $item) {

    $cebu->id = $item;
    $cebu->status = 0;

    $delete_cebu = $cebu->delete_cebu_locals();
}

if ($delete_cebu) {
    echo 1;
} else {
    echo 0;
}
