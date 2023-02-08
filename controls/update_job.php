<?php
include '../config/connection.php';
include '../objects/clsjob.php';

$database = new intranetconnect();
$db = $database->connect();

$job = new clsjob($db);

$job->id = $_POST['id'];
$job->position = $_POST['job_po'];
$job->no_of_job = $_POST['job_no'];
$job->summary = $_POST['job_summary'];

$upd_job = $job->update_jobs();

if ($upd_job) {
    echo 1;
} else {
    echo 0;
}
