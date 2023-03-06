<?php
class clslocals
{
    private $con;
    private $tblname = 'locals';
    public function __construct($db)
    {
        $this->con = $db;
    }
    public function add_cebu_locals()
    {
        $sql = "INSERT INTO " . $this->tblname . " SET local_no=?, department=?, name=?, trunkline=?, status=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $ins = $this->con->prepare($sql);

        $ins->bindParam(1, $this->local_no);
        $ins->bindParam(2, $this->department);
        $ins->bindParam(3, $this->name);
        $ins->bindParam(4, $this->trunkline);
        $ins->bindParam(5, $this->status);

        if ($ins->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function cebu_locals($sql)
    {

        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
    public function view_cebu_locals()
    {
        $sql = "SELECT id, local_no, name, department, status FROM locals WHERE id=? AND trunkline != 2";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->bindParam(1, $this->id);

        $sel->execute();
        return $sel;
    }
    public function delete_cebu_locals()
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
    public function update_cebu_locals()
    {
        $sql = "UPDATE " . $this->tblname . " SET local_no=?, department=?, name=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $upd = $this->con->prepare($sql);

        $upd->bindParam(1, $this->local_no);
        $upd->bindParam(2, $this->department);
        $upd->bindParam(3, $this->name);
        $upd->bindParam(4, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function retrieve_cebu_locals()
    {
        $sql = "UPDATE " . $this->tblname . " SET status=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $retrieve = $this->con->prepare($sql);

        $retrieve->bindParam(1, $this->status);
        $retrieve->bindParam(2, $this->id);

        if ($retrieve->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function manila_locals($sql)
    {

        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
    public function view_manila_locals()
    {
        $sql = "SELECT id, local_no, name, department, status FROM locals WHERE id=? AND trunkline != 1";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->bindParam(1, $this->id);

        $sel->execute();
        return $sel;
    }
    public function add_manila_locals()
    {
        $sql = "INSERT INTO " . $this->tblname . " SET local_no=?, department=?, name=?, trunkline=?, status=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $ins = $this->con->prepare($sql);

        $ins->bindParam(1, $this->local_no);
        $ins->bindParam(2, $this->department);
        $ins->bindParam(3, $this->name);
        $ins->bindParam(4, $this->trunkline);
        $ins->bindParam(5, $this->status);

        if ($ins->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update_manila_locals()
    {
        $sql = "UPDATE locals SET local_no=?, department=?, name=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $upd = $this->con->prepare($sql);

        $upd->bindParam(1, $this->local_no);
        $upd->bindParam(2, $this->department);
        $upd->bindParam(3, $this->name);
        $upd->bindParam(4, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_manila_locals()
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

    public function retrieve_manila_locals()
    {
        $sql = "UPDATE " . $this->tblname . " SET status=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $retrieve = $this->con->prepare($sql);

        $retrieve->bindParam(1, $this->status);
        $retrieve->bindParam(2, $this->id);

        if ($retrieve->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
