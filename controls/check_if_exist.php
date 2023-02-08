<?php
include '../config/connection.php';
include '../objects/clsusers.php';
session_start();
$database = new intranetconnect();
$db = $database->connect();
$users = new clsusers($db);

$users->username = $_SESSION['username'];
$users->status = 0;
$access = $users->check_if_exist();

if ($row = $access->fetch(PDO::FETCH_ASSOC)) {

    if ($row['access_type_id'] == 1) {
        header('Location: ../index.php');
    } else {
        header('Location: ../index_login.php');
    }
}
$_SESSION['id'] = $row['id'];
