<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';

$database = new intranetconnect();
$db = $database->connect();
$users = new clsusers($db);


$items = $_POST['id'];
foreach ($items as $item) {
    $users->id = $item;
    $delete_user = $users->delete_user();
}

if ($delete_user) {
    echo 1;
} else {
    echo 0;
}
