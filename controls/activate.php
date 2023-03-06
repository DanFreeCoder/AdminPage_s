<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';
$database = new intranetconnect();
$db = $database->connect();

$set_session = new clsusers($db);

foreach ($_POST['id'] as $id) {
    $set_session->onli = 1;
    $set_session->log = 1;
    $set_session->id = $id;

    $set = $set_session->set_session();
}

if ($set) {
    echo 1;
} else {
    echo 0;
}
