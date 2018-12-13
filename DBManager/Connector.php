<?php
/**
 * Created by PhpStorm.
 * User: xavie
 * Date: 13/12/2018
 * Time: 9:59 AM
 */

class Connector
{
    private $serverName = "localhost";
    private $username = "root";
    private $password = "";
    function getConnection()
    {


        $conn = new mysqli($this->serverName, $this->username, $this->password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";

        return $conn;
    }




}