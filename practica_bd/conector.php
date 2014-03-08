<?php
	class Conector
	{
		private $host = "";
		private $puerto = "";
		private $username = "";
		private $password = "";

		function __construct($host,$puerto,$username,$password)
		{	
			$this->host = $host;
			$this->puerto = $puerto;
			$this->username = $username;
			$this->password = $password;
		}
		public function conectar(){
			echo "SOME NOISE";
		}
		
	}
?>