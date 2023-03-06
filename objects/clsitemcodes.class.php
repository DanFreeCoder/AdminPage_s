<?php
class clsitemcodes
{
    protected $con;
    private $tblname = 'itemcodes';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function itemcodes($sql)
    {
        // $sql = "SELECT * FROM itemcodes WHERE status != 0";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
    public function itemcode()
    {
        $sql = "SELECT * FROM itemcodes WHERE status != 0";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }

    public function code($array)
    {
        $offset = $array[0];
        $total_view_perpage = $array[1];


        $sql = "SELECT * FROM itemcodes WHERE status != 0 LIMIT $offset, $total_view_perpage";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $user = $this->con->prepare($sql);

        $user->execute();

        return $user;
    }

    public function get_codes_count()
    {
        $sql = "SELECT * FROM itemcodes WHERE status != 0";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $count = $this->con->prepare($sql);

        $count->execute();
        return $count;
    }

    public function search($search)
    {
        $sql = "SELECT * FROM itemcodes WHERE status != 0 AND itemcode LIKE '%$search%' LIMIT 15";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $search = $this->con->prepare($sql);

        $search->execute();
        return $search;
    }

    public function delete_code()
    {
        $sql = "UPDATE itemcodes SET status=? WHERE id=?";
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

    public function item($sql)
    {

        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
}
