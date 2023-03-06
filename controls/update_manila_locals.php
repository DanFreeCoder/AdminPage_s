<?php
include '../config/connection.php';
include '../objects/clslocals.class.php';

$database = new intranetconnect();
$db = $database->connect();

$manila = new clslocals($db);

$manila->id = $_POST['id'];
$manila->local_no = $_POST['local_no'];
$manila->department = strtoupper($_POST['department']);
$manila->name = $_POST['name'];

$upd_manila = $manila->update_manila_locals();

if ($upd_manila) {
    echo 1;
} else {
    echo 0;
}
