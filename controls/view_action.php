<?php
include '../config/connection.php';
include '../objects/clsusers.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);

$users->id = $_POST['id'];

$view_users = $users->get_users_details();
while ($row = $view_users->fetch(PDO::FETCH_ASSOC)) {
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $email = $row['email'];
    $uname = $row['username'];
    $upass = substr(md5($row['password']), 28);
    echo '
                    <label>Firstname</label>
                    <div>
                    <input type="text"  class="form-control" value="' . $row['id'] . '" hidden>
                        <input type="text"  class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $fname . '" readonly="readonly">
                    </div>
                    <label>Lastname</label>
                    <div>
                        <input type="text" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $lname . '" readonly="readonly">
                    </div>
                    <label>Email Address</label>
                    <div>
                        <input type="email"  class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $email . '" readonly="readonly">
                    </div>
                    <label>Username</label>
                    <div>
                        <input type="text" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $uname . '" readonly="readonly">
                    </div>
                    <label>Password</label>
                    <div>
                        <input type="password" placeholder="Password" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $upass . '" readonly="readonly">
                    </div>
                    <label>Access Type</label>
                                            <div>
                                                <select type="text" id="upd-access" class="form-control" style="background-color:#3a3b3c; color:white;" disabled>';
    if ($row['access_type_id'] == 0) {
        echo '<option value="0" selected>Type</option>
                                        <option reavalue="1">Admin</option>
                                        <option value="2">Human Resource</option>
                                        <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 1) {
        echo '<option value="0">Type</option>
                                        <option value="1" selected>Admin</option>
                                        <option value="2">Human Resource</option>
                                        <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 2) {
        echo '<option value="0">Type</option>
                                        <option value="1">Admin</option>
                                        <option value="2" selected>Human Resource</option>
                                        <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 3) {
        echo '<option value="0">Type</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Human Resource</option>
                                        <option value="3" selected>Users</option>';
    }
    echo  '</select>
                                </div>
                                <br>
                                <br>
                                            
                        
                    ';
}
