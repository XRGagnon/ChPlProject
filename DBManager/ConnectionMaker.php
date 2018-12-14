<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 9:59 AM
 */

class ConnectionMaker
{
    private static $serverName = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "champlainplasticsdb";
    static function getConnection()
    {


        $conn = new mysqli(serverName, username, password, database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        return $conn;
    }




}