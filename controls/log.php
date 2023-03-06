<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';
$database = new intranetconnect();
$db = $database->connect();
session_start();
$set_session = new clsusers($db);


$set_session->log = 1;
$set_session->id = $_SESSION['id'];

$set = $set_session->set_log();


if ($set) {
    header('Location:../index.php');
} else {
    echo 0;
}
