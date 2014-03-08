<?php
	
	class Gato extends Mamifero
	{
		private $vidas = 0;
		function __construct($nombre)
		{	
			parent::__construct($nombre);
			$this->vidas = 8;
		}
		public function hacer_ruido(){
			echo "GUA GUA";
		}
		public function perderVida(){
			$this->vidas -= 1;
		}
		public function getVidas(){
			return $this->vidas;
		}
	}
?>