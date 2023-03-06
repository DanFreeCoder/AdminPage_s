<?php
include '../config/connection.php';
include '../objects/clsitemcodes.class.php';

$database = new intranetconnect();
$db = $database->connect();
$code = new clsitemcodes($db);

$items = $_POST['id'];
foreach ($items as $item) {

    $code->id = $item;
    $code->status = 0;

    $delete_code = $code->delete_code();
}

if ($delete_code) {
    echo 1;
} else {
    echo 0;
}
