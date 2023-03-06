<?php
include '../config/connection.php';
include '../objects/clslocals.class.php';

$database = new intranetconnect();
$db = $database->connect();

$manila = new clslocals($db);

$manila->id = $_POST['id'];

$view_manila = $manila->view_manila_locals();
while ($row = $view_manila->fetch(PDO::FETCH_ASSOC)) {
    if ($row['status'] != 0) {
        echo '
        <form>
        <label>Local Number</label>
        <div>
        <input type="text" class="form-control" id="upd_id" value="' . $row['id'] . '" hidden>
            <input type="text" id="upd-local_no" class="form-control" value="' . $row['local_no'] . '">
        </div>
        <label>Department</label>
        <div>
            <input type="text" id="upd-department" class="form-control" value="' . $row['department'] . '">
        </div>
        <label>Name</label>
        <div>
            <input type="text" id="upd-name" class="form-control" value="' . $row['name'] . '">
        </div>
    </div>
        <br>
        <br>
    </form>
        ';
    } else {
        echo '<h2>This local is no longer available.</h2>';
    }
}
