<?php
	
	class Perro extends Mamifero
	{
		
		function __construct($nombre)
		{	
			parent::__construct($nombre);
		}
		function hacer_ruido(){
			echo "GUA GUA";
		}
	}
?>