<?php

include './config/connection.php';

$database = new intranetconnect();
//reserved DB connection
$db = $database->connect();
$db2 = $database->connect();
$db3 = $database->connect();
$db4 = $database->connect();

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $path = "objects/";
    $extension = ".class.php"; //this link is for naming convention
    $fullpath = $path . $className . $extension;

    include_once $fullpath;
}
