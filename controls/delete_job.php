<?php
include '../config/connection.php';
include '../objects/clsjob.php';

$database = new intranetconnect();
$db = $database->connect();
$job = new clsjob($db);


$job->id = $_POST['id'];
$job->status = 0;

$delete_job = $job->delete_job();

if ($delete_job) {
    echo 1;
} else {
    echo 0;
}
