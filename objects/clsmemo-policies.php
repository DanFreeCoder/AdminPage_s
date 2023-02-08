<?php
class clsmemo_policies
{
    private $con;
    private $tblname = 'memos';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function memos_details()
    {
        $sql = "SELECT id, memo_no, title, 'filename', status FROM memos";
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
}
