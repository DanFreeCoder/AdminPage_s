<?php
include '../config/connection.php';
include '../objects/clsjob.php';

$database = new intranetconnect();
$db = $database->connect();

$job = new clsjob($db);

$job->position = $_POST['job_po'];
$job->no_of_job = $_POST['job_num'];
$job->summary = $_POST['job_sum'];
$job->status = 1;

$save_job = $job->save_job();

if ($save_job) {
    echo 1;
} else {
    echo 0;
}
