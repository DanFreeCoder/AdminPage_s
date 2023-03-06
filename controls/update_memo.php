<?php
include '../config/connection.php';
include '../objects/clsmemo_policies.class.php';

$database = new intranetconnect();
$db = $database->connect();

$memo = new clsmemo_policies($db);

$memo->id = $_POST['id'];
$memo->memo_no = $_POST['memo_no'];
$memo->title = $_POST['title'];
$memo->filename = $_POST['filename'];

$upd_memo = $memo->update_memo();

if ($upd_memo) {
    echo 1;
} else {
    echo 0;
}
