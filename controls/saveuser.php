<?php
include '../config/connection.php';
include '../objects/clsusers.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);

$users->firstname = ($_POST['fname']);
$users->lastname = $_POST['lname'];
$users->email = $_POST['email'];
$users->username = $_POST['uname'];
$users->password = md5("123456");
$users->access_type_id = $_POST['access'];
$users->log_count = '0';
$users->verification_code = "0";
$users->security_q = "0";
$users->security_a = "0";
$users->status = 1;


$ex = $users->save();

if ($ex) {
    echo 1;
} else {
    echo 0;
}
