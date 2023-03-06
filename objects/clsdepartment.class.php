<?php
class clsdepartment
{
    private $con;
    private $tblname = 'departments';
    public function __construct($db)
    {
        $this->con = $db;
    }

    public function get_dept()
    {
        $sql = "SELECT * FROM " . $this->tblname . " ";
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $sel = $this->con->prepare($sql);

        $sel->execute();
        return $sel;
    }
}
