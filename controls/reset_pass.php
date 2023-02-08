<?php
include '../config/connection.php';
include '../objects/clsusers.php';

$database = new intranetconnect();
$db = $database->connect();
$users = new clsusers($db);

$items = $_POST['id'];
foreach ($items as $item) {
    $users->id = $item;
    $users->password = md5(123456);

    $update_pass = $users->update_password();

    if ($update_pass) {
        echo 1;
    } else {
        echo 0;
    }
}
