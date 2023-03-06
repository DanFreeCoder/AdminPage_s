<?php
include '../config/connection.php';
include '../objects/clsposts.class.php';

$database = new intranetconnect();
$db = $database->connect();
$post = new clsposts($db);


$post->id = $_POST['id'];

$select_post = $post->select_post();
while ($row = $select_post->fetch(PDO::FETCH_ASSOC)) {
  if ($row['status'] != 0) {
    echo '
    <form>
    <label>Post Title:</label>
    <div>
    <input type="text" class="form-control" id="upd_id" value="' . $row['id'] . '" hidden>
      <input type="text" class="form-control" id="upd-title" value="' . $row['type'] . '">
    </div>

    <label>Department:</label>
    <div>
      <input type="text" class="form-control" id="upd-dept" value="' . $row['department'] . '">
    </div>

    <label>Date Posted:</label>
    <div>
      <input type="text" class="form-control" id="upd-date_added" value="' . $row['date_added'] . '">
    </div>
    <br>
    <br>
  </form>
    ';
  } else {
    echo ' <h2>This post is no longer available</h2>';
  }
}
