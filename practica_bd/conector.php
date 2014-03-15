<?php
	class Conector
	{
		private $host = "";
		private $database = "";
		private $username = "";
		private $password = "";
		private $mysqli = "";
		function __construct($host,$database,$username,$password)
		{	
			$this->host = $host;
			$this->database = $database;
			$this->username = $username;
			$this->password = $password;
			// backend_course_db
			// mysqli_connect(host,username,password,database)
			$this->mysqli = mysqli_connect($this->host,$this->username,$this->password,$this->database);
			if ($this->mysqli->connect_errno) {
			    echo "Failed to connect to MySQL: " . $this->mysqli->connect_errno;
			}
			else{
				$this->mysqli->set_charset("utf8");
			}
		}
		public function select($table){
			$res = $this->mysqli->query("SELECT * from ".$table);
			
			return $res;
		}
		public function select_where($table,$field,$value){
			$condition = "";
			
			$res = $this->mysqli->query("SELECT * from ".$table." WHERE ".$field." = ".$value);
			
			return $res->fetch_assoc();
		}
		public function execute_query($query){
			return $this->mysqli->query($query);
		}
		public function insert($table,$data){
			$values = "";
			$keys = "";
			foreach ($data as $key => $value) {
				$keys .= $key.",";
				$values .= "'".$value."',";
			}
			$values = substr($values, 0, -1);
			$keys = substr($keys, 0, -1);
			return $this->mysqli->query("INSERT INTO ".$table."(".$keys.") VALUES(".$values.")");
		}
		public function edit($table,$data,$condition_field,$condition_field_value){
			$fields = "";
			foreach ($data as $key => $value) {
				$fields .= $key. " = '".$value."',";
			}
			$fields = substr($fields, 0, -1);
			return $this->mysqli->query("UPDATE ".$table." SET ".$fields." WHERE ".$condition_field." = ".$condition_field_value);
		}
		public function delete($table,$id){
			return $this->mysqli->query("DELETE FROM ".$table." WHERE id = ".$id);
		}
	}
?>