<?php
include '../config/connection.php';
include '../objects/clsposts.class.php';

$database = new intranetconnect();
$db = $database->connect();
$post = new clsposts($db);

$items = $_POST['id'];
foreach ($items as $item) {

    $post->id = $item;
    $post->status = 0;

    $delete_post = $post->delete_post();
}



if ($delete_post) {
    echo 1;
} else {
    echo 0;
}
