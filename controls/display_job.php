<?php
include '../config/connection.php';
include '../objects/clsjob.class.php';
$database = new intranetconnect();
$db = $database->connect();

$job = new clsjob($db);


$job->id = $_POST['id'];

$view_job = $job->view_job();
while ($row = $view_job->fetch(PDO::FETCH_ASSOC)) {

    echo '
    <form>
    <div class="row">
        <div class="col-md-6">
            <div class="card-header">Add a Job Vacancies
            <input type="text" hidden id="upd_id" value="' . $row['id'] . '">
                <input type="text" class="form-control" placeholder="Position" aria-label="Username" id="upd-job_position" value="' . $row['position'] . '">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-header">Number of Vacancies
                <input type="text" class="form-control" placeholder="No. of Vacancies" aria-label="Username" aria-describedby="addon-wrapping" id="upd-job_no" value="' . $row['no_of_job'] . '">
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12">Job Summary
                <textarea class="form-control" rows="7" placeholder="Job Qualifications" value="' . $row['summary'] . '" id="upd-job_summary">' . $row['summary'] . '</textarea>
            </div>
        </div>
    </div>
    </form>
    ';
}
