<?php
include '../config/connection.php';
include '../objects/clslocals.php';

$database = new intranetconnect();
$db = $database->connect();

$retrieve = new clslocals($db);

$retrieve->id = $_POST['id'];
$retrieve->status = 1;


$upd_retrieve = $retrieve->retrieve_cebu_locals();

if ($upd_retrieve) {
    echo 1;
} else {
    echo 0;
}
