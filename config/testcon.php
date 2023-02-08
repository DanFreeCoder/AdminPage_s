<?php
class Server
{
    private $host = 'localhost';
    private $dbname = 'serverdb';
    private $username = 'root';
    private $password = '';

    protected $con;

    public function connect()
    {
        $this->con = null;
        try {
            $this->con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
        } catch (PDOException $e) {
            echo 'Connection:Error' . $e->getMessage();
        }
        return $this->con;
    }

    public function disconnect()
    {
        $this->con = null;
        return $this->con;
    }
}
