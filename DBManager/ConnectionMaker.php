<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 9:59 AM
 */

class ConnectionMaker
{

    static function getConnection()
    {
        //Database Info
        $serverName = "localhost";
        $username = "root";
        $password = "";
        $database = "champlainplasticsdb";
        //Create and Return DB connection
        $conn = new mysqli($serverName, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }




}