<?php
include '../config/connection.php';
include '../objects/clsusers.php';
session_start();

$database = new intranetconnect();
$db = $database->connect();

$login = new clsusers($db);

$login->username = $_POST['username'];
$login->password = md5($_POST['password']);
$login->status = 0;

$Is_Login = $login->login();
if ($row = $Is_Login->fetch(PDO::FETCH_ASSOC)) {

    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['log_count'] = $row['log_count'];
    $_SESSION['access_type_id'] = $row['access_type_id'];

    echo 1;
} else {

    echo 0;
}
