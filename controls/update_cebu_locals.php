<?php
include '../config/connection.php';
include '../objects/clslocals.php';

$database = new intranetconnect();
$db = $database->connect();

$cebu = new clslocals($db);

$cebu->id = $_POST['id'];
$cebu->local_no = $_POST['local_no'];
$cebu->department = strtoupper($_POST['department']);
$cebu->name = $_POST['name'];

$upd_cebu = $cebu->update_cebu_locals();

if ($upd_cebu) {
    echo 1;
} else {
    echo 0;
}
