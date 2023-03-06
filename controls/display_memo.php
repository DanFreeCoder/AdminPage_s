<?php
include '../config/connection.php';
include '../objects/clsmemo_policies.class.php';

$database = new intranetconnect();
$db = $database->connect();


$memo = new clsmemo_policies($db);

$memo->id = $_POST['id'];

$view_memo = $memo->edit_memo();
while ($row = $view_memo->fetch(PDO::FETCH_ASSOC)) {
    if ($row['status'] != 0) {
        echo '
        <form>
        <label>Policies & Memo</label>
        <div>
        <input type="text" class="form-control" id="upd_id" value="' . $row['id'] . '" hidden>
            <input type="text" id="upd-memo_no" class="form-control" value="' . $row['memo_no'] . '">
        </div>
        <label>Department</label>
        <div>
            <input type="text" id="upd-title" class="form-control" value="' . $row['title'] . '">
        </div>
        <label>Name</label>
        <div>
            <input type="file" id="upd-filename" class="form-control" value="' . $row['filename'] . '">
        </div>
    </div>
        <br>
        <br>
    </form>
        ';
    } else {
        echo '<h2>This memo is no longer available.</h2>';
    }
}
