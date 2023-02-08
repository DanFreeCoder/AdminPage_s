<?php
include '../config/connection.php';
include '../objects/clsposts.php';

$database = new intranetconnect();
$db = $database->connect();

$post = new clsposts($db);

$post->id = $_POST['id'];
$post->type = $_POST['title'];
$post->department = $_POST['dept'];
$post->date_added = $_POST['date_added'];

$upd_post = $post->update_post();

if ($upd_post) {
    echo 1;
} else {
    echo 0;
}
