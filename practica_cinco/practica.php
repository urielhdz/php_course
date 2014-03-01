<!DOCTYPE html>
<html>
<head>
	<title>Funciones PHP</title>
</head>
<body>
<!--
	- Declaran igual que variables
	- Deben ser declaradas antes de ser llamadas
	- Keyword function()
	- Todas son globales
-->
<?php 
	function hola(){
		echo "Hola mundo <br>";
	}
	hola();
?>
<?php 
	function definir_funcion(){
		function holaa(){
			echo "Hola mundo <br>";
		}
	}
	definir_funcion();
	holaa();
?>
<?php 
	function sumar_numeros($a = 0,$b = 0){
		return $a + $b;
	}
	echo sumar_numeros(1,2);
?>
</body>
</html>