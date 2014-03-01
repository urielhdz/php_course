<!DOCTYPE html>
<html>
<head>
	<title>Variables</title>
</head>
<body>
<?php 
	$a = 1;
	$b = 2;
	$c = 1 + 2;
	echo $c;
?>
<br>
<?php
	$nombre = "Uriel";
	echo "Hola ". $nombre;
?>
<br>
<?php
	$nombre = "Uriel";
	function saludar(){
		global $nombre;
		echo "Hola ". $nombre;
	}
	saludar();
?>
<br>
<?php
	$arreglo = array('nombre' => 'Uriel','edad' => 15 );
	echo $arreglo['nombre'];
?>
<br>
<?php
	$arreglo = array('Uriel',15);
	echo $arreglo[1];
?>
</body>
</html>