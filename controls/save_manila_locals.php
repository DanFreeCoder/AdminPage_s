<?php
include '../config/connection.php';
include '../objects/clslocals.php';

$database = new intranetconnect();
$db = $database->connect();

$manila = new clslocals($db);

$manila->local_no = $_POST['local_no'];
$manila->department = strtoupper($_POST['dept']);
$manila->name = $_POST['name'];
$manila->trunkline = 2;
$manila->status = 1;

$ex = $manila->add_manila_locals();

if ($ex) {
    echo 1;
} else {
    echo 0;
}
