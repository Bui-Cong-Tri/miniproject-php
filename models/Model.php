<?php 
	/**
	 * 
	 */
	include_once('Connection.php');
	class Model
	{
		var $conn;
		function __construct(){
			$connection = new Connection();
			$this->conn = $connection->conn;
		}
	}
