<?php
include '../config/connection.php';
include '../objects/clslocals.php';

$database = new intranetconnect();
$db = $database->connect();
$manila = new clslocals($db);

$items = $_POST['id'];
foreach ($items as $item) {

    $manila->id = $item;
    $manila->status = 0;

    $delete_manila = $manila->delete_manila_locals();
}


if ($delete_manila) {
    echo 1;
} else {
    echo 0;
}
