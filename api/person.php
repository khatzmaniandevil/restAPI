<?php
class Person{

static function dbconnection(){
			$host = 'localhost';
			$username = 'root';
			$password = '';
			$database = 'carlocatimbang';
			$connection = mysqli_connect($host,$username,$password);
			mysqli_select_db($connection,$database);
			return $connection;
		}

		static function create(){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$contact_no = $_POST['contact_no'];

			$connection = self::dbconnection();
			$query = "INSERT INTO person VALUES(null,'$fname','$lname','$contact_no')";
			$rs = mysqli_query($connection,$query);
			return true;
		}

		static function getAll(){
			$connection = self::dbconnection();
			$query = "SELECT * FROM person";
			$rs = mysqli_query($connection,$query);
			$result = [];
			while($r = mysqli_fetch_assoc($rs)){
				$result[] = $r;
			}
			return $result;
		}

		static function find($id){
			$connection = self::dbconnection();
			$query = "SELECT * FROM person WHERE id = '$id'";
			$rs = mysqli_query($connection,$query);
			return mysqli_fetch_object($rs);
		}

		static function update($id){
			$connection = self::dbconnection();
			$fname  = $_POST['fname'];
			$lname  = $_POST['lname'];
			$contact_no  = $_POST['contact_no'];

			$query = "UPDATE person SET first_name = '$fname', contact_number = '$contact_no', last_name = '$lname' WHERE id = '$id'";


			$rs = mysqli_query($connection,$query);
			return true;
		}

		static function delete($id){
			$connection = self::dbconnection();

			$query = "DELETE FROM person WHERE id = '$id'";
			mysqli_query($connection,$query);
		}
}