<?php
include '../config/connection.php';
include '../objects/clslocals.class.php';

$database = new intranetconnect();
$db = $database->connect();

$cebu = new clslocals($db);

$cebu->local_no = $_POST['local_no'];
$cebu->department = strtoupper($_POST['dept']);
$cebu->name = $_POST['name'];
$cebu->trunkline = 1;
$cebu->status = 1;

$ex = $cebu->add_cebu_locals();

if ($ex) {
    echo 1;
} else {
    echo 0;
}
