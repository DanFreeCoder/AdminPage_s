<?php
class clsposts
{
    private $con;
    private $tblname = 'posts';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function posts_details()
    {
        $sql = "SELECT id, type, department, date_added, status FROM posts";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
    public function delete_post()
    {
        $sql = "UPDATE " . $this->tblname . " SET status=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $del = $this->con->prepare($sql);
        $del->bindParam(1, $this->status);
        $del->bindParam(2, $this->id);

        if ($del->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function select_post()
    {
        $sql = "SELECT * FROM " . $this->tblname . " WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $sel = $this->con->prepare($sql);
        $sel->bindParam(1, $this->id);

        $sel->execute();
        return $sel;
    }
    public function update_post()
    {
        $sql = "UPDATE " . $this->tblname . " SET type=?, department=?, date_added=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        $del = $this->con->prepare($sql);
        $del->bindParam(1, $this->type);
        $del->bindParam(2, $this->department);
        $del->bindParam(3, $this->date_added);
        $del->bindParam(4, $this->id);

        if ($del->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function retrieve_post()
    {
        $sql = "UPDATE " . $this->tblname . " SET status=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $ret = $this->con->prepare($sql);

        $ret->bindParam(1, $this->status);
        $ret->bindParam(2, $this->id);

        $ret->execute();
        return $ret;
    }

    public function get_data($array)
    {
        $offset = $array[0];
        $total_view_perpage = $array[1];

        $sql = "SELECT * FROM posts LIMIT $offset, $total_view_perpage";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $get = $this->con->prepare($sql);

        $get->execute();
        return $get;
    }
    public function get_post_count()
    {
        $sql = "SELECT COUNT(*) as total_record FROM posts";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $count = $this->con->prepare($sql);

        $count->execute();
        return $count;
    }

    public function posts($sql)
    {

        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $count = $this->con->prepare($sql);

        $count->execute();
        return $count;
    }
}
