<?php
include '../config/connection.php';
include '../objects/clsusers.class.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);

$users->id = $_POST['id'];
$users->firstname = $_POST['fname'];
$users->lastname = $_POST['lname'];
$users->email = $_POST['email'];
$users->access_type_id = $_POST['access'];

$upd_users = $users->update_users();

if ($upd_users) {
    echo 1;
} else {
    echo 0;
}
