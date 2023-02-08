<?php
include '../config/connection.php';
include '../objects/clsusers.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);

$users->id = $_POST['id'];
$users->password = md5($_POST['password']);

$upd_users = $users->update_current_logged();

if ($upd_users) {
    echo 1;
} else {
    echo 0;
}
