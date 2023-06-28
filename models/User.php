<?php
	include_once('Connection.php');
	class User{

		function All(): array
        {
            global $conn;
            require_once('db_connect.php');
			$data = array();
			$sql = "SELECT * FROM customers";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		function find($code){
            global $conn;
            require_once('db_connect.php');
			$sql = "SELECT * FROM customers WHERE code='".$code."'";
            return $conn->query($sql)->fetch_assoc();
		}

		function insert($data){
            global $conn;
            require_once('db_connect.php');
			$sql = "INSERT INTO customers (code,name,mobile,email,address) VALUES ('".$data['code']."','".$data['name']."','".$data['mobile']."','".$data['email']."','".$data['address']."')";
            return $conn->query($sql);
		}
		function update($data){
            global $conn;
            require_once('db_connect.php');
			$sql = "UPDATE customers SET name='".$data['name']."',mobile='".$data['mobile']."',email='".$data['email']."',address='".$data['address']."' WHERE code='".$data['code']."'";
            return $conn->query($sql);
		}

		function delete($data){
            global $conn;
            require_once('db_connect.php');
			$sql = "DELETE FROM customers WHERE code='".$data."'";
            return $conn->query($sql);
		}
	}
 ?>