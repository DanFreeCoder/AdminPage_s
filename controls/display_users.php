<?php
include '../config/connection.php';
include '../objects/clsusers.php';

$database = new intranetconnect();
$db = $database->connect();

$users = new clsusers($db);

$users->id = $_POST['id'];

$get_users = $users->get_users_details();
while ($row = $get_users->fetch(PDO::FETCH_ASSOC)) {
    echo '
                            <label>Firstname</label>
                            <div>       
                                <input type="text" id="upd-id" class="form-control" hidden style="background-color:#3a3b3c; color:white;" value="' . $row['id'] . '">
                                <input type="text" id="upd-firstname" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $row['firstname'] . '">
                            </div>
                            <label>Lastname</label>
                            <div>
                                <input type="text" id="upd-lastname" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $row['lastname'] . '">
                            </div>
                            <label>Email Address</label>
                            <div>
                                <input type="email" id="upd-email" class="form-control" style="background-color:#3a3b3c; color:white;" value="' . $row['email'] . '">
                            </div>
                            <label>Username</label>
                            <div>
                                <input type="text" id="upd-username" readonly="readonly" style="background-color:#3a3b3c; color:white;" class="form-control" value="' . $row['username'] . '">
                            </div>
                            <label>Access Type</label>
                            <div>
                                <select type="text" id="upd-access" class="form-control" style="background-color:#3a3b3c; color:white;">';
    if ($row['access_type_id'] == 0) {
        echo '<option value="0" disabled selected>Type</option>
                                <option value="1">Admin</option>
                                <option value="2">Human Resource</option>
                                <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 1) {
        echo '<option value="0" disabled>Type</option>
                                <option value="1" selected>Admin</option>
                                <option value="2">Human Resource</option>
                                <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 2) {
        echo '<option value="0" disabled>Type</option>
                                <option value="1">Admin</option>
                                <option value="2" selected>Human Resource</option>
                                <option value="3">Users</option>';
    } elseif ($row['access_type_id'] == 3) {
        echo '<option value="0" disabled>Type</option>
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
