<?php
class clsjob
{
    private $con;
    private $tblname = 'job_vacancies';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function job_details($sql)
    {
        // $sql = "SELECT id, position, no_of_job, summary, status FROM " . $this->tblname . " WHERE no_of_job != 0 AND status != 0";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }

    public function save_job()
    {
        $sql = "INSERT INTO " . $this->tblname . " SET position=?, no_of_job=?, summary=?, status=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $save = $this->con->prepare($sql);

        $save->bindParam(1, $this->position);
        $save->bindParam(2, $this->no_of_job);
        $save->bindParam(3, $this->summary);
        $save->bindParam(4, $this->status);

        if ($save->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function view_job()
    {
        $sql = "SELECT id, position, no_of_job, summary, status FROM " . $this->tblname . " WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->bindParam(1, $this->id);

        $sel->execute();
        return $sel;
    }
    public function update_jobs()
    {
        $sql = "UPDATE " . $this->tblname . " SET position=?, no_of_job=?, summary=? WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $upd = $this->con->prepare($sql);

        $upd->bindParam(1, $this->position);
        $upd->bindParam(2, $this->no_of_job);
        $upd->bindParam(3, $this->summary);
        $upd->bindParam(4, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete_job()
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
}
