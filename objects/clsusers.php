<?php
class clsusers
{
    private $con;
    private $tblname = 'users';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function update_current_logged()
    {
        $sql = "UPDATE " . $this->tblname . " SET password=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $upd = $this->con->prepare($sql);

        $upd->bindParam(1, $this->password);
        $upd->bindParam(2, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function login()
    {
        $sql = "SELECT * FROM " . $this->tblname . " WHERE username=? AND password=? AND status != ?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $login = $this->con->prepare($sql);

        $login->bindParam(1, $this->username);
        $login->bindParam(2, $this->password);
        $login->bindParam(3, $this->status);

        $login->execute();
        return $login;
    }
    public function check_if_exist()
    {
        $sql = "SELECT id, access_type_id, log_count FROM " . $this->tblname . " WHERE username= ? AND status != ?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $check = $this->con->prepare($sql);
        $check->bindParam(1, $this->username);
        $check->bindParam(2, $this->status);

        $check->execute();
        return $check;
    }
    public function isLoggined()
    {
        $sql = "SELECT * FROM users WHERE username = ? AND id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $logged = $this->con->prepare($sql);

        $logged->bindParam(1, $this->username);
        $logged->bindParam(2, $this->id);

        $logged->execute();
        return $logged;
    }
    public function logout()
    {
        session_start();
        if (session_destroy()) {
            return true;
            unset($_SESSION['username']);
        }
    }

    public function user_details()
    {
        $sql = "SELECT id, firstname, lastname, username, access_type_id, log_count, verification_code, security_q, security_a, status FROM " . $this->tblname . " WHERE status != 0 ORDER BY access_type_id asc";
        $this->con->setAttribute(PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }

    public function get_users_details()
    {
        $sql = "SELECT * FROM users WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $dis = $this->con->prepare($sql);

        $dis->bindParam(1, $this->id);

        $dis->execute();
        return $dis;
    }
    public function delete_user()
    {
        $sql = "UPDATE users SET status='0' WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $del = $this->con->prepare($sql);
        $del->bindParam(1, $this->id);

        if ($del->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function save()
    {
        $sql = "INSERT INTO users SET firstname=?, lastname=?, email=?, username=?, password=?, access_type_id=?, log_count=?, verification_code=?, security_q=?, security_a=?, status=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $save = $this->con->prepare($sql);
        $save->bindParam(1, $this->firstname);
        $save->bindParam(2, $this->lastname);
        $save->bindParam(3, $this->email);
        $save->bindParam(4, $this->username);
        $save->bindParam(5, $this->password);
        $save->bindParam(6, $this->access_type_id);
        $save->bindParam(7, $this->log_count);
        $save->bindParam(8, $this->verification_code);
        $save->bindParam(9, $this->security_q);
        $save->bindParam(10, $this->security_a);
        $save->bindParam(11, $this->status);

        if ($save->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function update_password()
    {
        $sql = "UPDATE users SET password=?, log_count = log_count + 1 WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $upd = $this->con->prepare($sql);
        $upd->bindParam(1, $this->password);
        $upd->bindParam(2, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function update_users()
    {
        $sql = "UPDATE users SET firstname=?, lastname=?, email=?, access_type_id=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $upd = $this->con->prepare($sql);
        $upd->bindParam(1, $this->firstname);
        $upd->bindParam(2, $this->lastname);
        $upd->bindParam(3, $this->email);
        $upd->bindParam(4, $this->access_type_id);
        $upd->bindParam(5, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function users($array)
    {
        $offset = $array[0];
        $total_record = $array[1];

        $sql = "SELECT * FROM users LIMIT $offset, $total_record";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $user = $this->con->prepare($sql);

        $user->execute();

        return $user;
    }
    public function get_user_count()
    {
        $sql = "SELECT COUNT(*) as total_record FROM users";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $count = $this->con->prepare($sql);

        $count->execute();
        return $count;
    }
    public function userss()
    {
        $sql = "SELECT * FROM users";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $user = $this->con->prepare($sql);

        $user->execute();

        return $user;

        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        }
    }
}
