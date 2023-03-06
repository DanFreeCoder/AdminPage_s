<?php
include '../config/connection.php';
include '../objects/clsposts.class.php';

$database = new intranetconnect();
$db = $database->connect();

$retrieve = new clsposts($db);

$retrieve->id = $_POST['id'];
$retrieve->status = 1;


$upd_retrieve = $retrieve->retrieve_post();

if ($upd_retrieve) {
    echo 1;
} else {
    echo 0;
}
