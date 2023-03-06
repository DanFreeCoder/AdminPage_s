<?php
class clsmemo_policies
{
    private $con;
    private $tblname = 'memos';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function memos_details($sql)
    {

        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }

    public function memo_table_content()
    {
        $sql = "SELECT memo_categories.id as catid, memo_categories.name as catname, memo_categories.status as cat_status, memos.memo_no, memos.title, memos.filename, memos.status FROM memo_categories, memos";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }

    public function delete_memo()
    {
        $sql = "UPDATE " . $this->tblname . " SET status =? WHERE id=? ";
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

    public function edit_memo()
    {
        $sql = "SELECT * FROM " . $this->tblname . " WHERE id=?";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $edit = $this->con->prepare($sql);

        $edit->bindParam(1, $this->id);

        $edit->execute();
        return $edit;
    }
    public function update_memo()
    {
        $sql = "UPDATE " . $this->tblname . " SET memo_no=?, title=?, filename=? WHERE id=? ";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $upd = $this->con->prepare($sql);

        $upd->bindParam(1, $this->memo_no);
        $upd->bindParam(2, $this->title);
        $upd->bindParam(3, $this->filename);
        $upd->bindParam(4, $this->id);

        if ($upd->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
