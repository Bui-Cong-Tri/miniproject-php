<?php 
	class Connection
	{
		var mysqli $conn;
		function __construct()
		{
			$servername = "localhost";
			$username = "minhngoc";
			$password = "minhngoc2207";
			$dbname = "QLSV";

			$this->conn = new mysqli($servername, $username, $password, $dbname);
			$this->conn->set_charset("utf8");
			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			} 
		}
	}
