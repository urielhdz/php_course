<?php
	class Mamifero
	{
		protected $edad = 0;
		protected $nombre = "";
		function __construct($nombre)
		{	
			$this->nombre = $nombre;
		}
		public function hacer_ruido(){
			echo "SOME NOISE";
		}
		public function getEdad(){
			return $this->edad;
		}
		public function setEdad($edad){
			$this->edad = $edad;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	}
?>