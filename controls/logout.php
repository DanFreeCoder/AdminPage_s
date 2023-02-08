<?php
include '../config/connection.php';
include '../objects/clsusers.php';
session_start();

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);
$logout = $users->logout();

if ($logout) {
    header('Location: ../index_login.php');
}
