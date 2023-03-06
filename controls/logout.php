<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';
session_start();

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);
$set_log = new clsusers($db);

$set_log->log = 0;
$set_log->id = $_SESSION['id'];
$set_log->set_log();
$logout = $users->logout();

if ($logout) {
    header('Location: ../index_login.php');
} else {
    header('Location: ../index.php');
}
