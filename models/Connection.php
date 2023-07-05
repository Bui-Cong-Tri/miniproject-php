<?php

class Connection
{
    var mysqli $conn;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "Pass@123";
        $dbname = "QLSV";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        $this->conn->set_charset("utf8");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }
}
