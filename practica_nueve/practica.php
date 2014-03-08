<?php
	require 'mamifero.php';
	require 'perro.php';
	require 'gato.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo objetos</title>
</head>
<body>
<?php 
	$perro = new Perro('Firulais');
	$gato = new Gato('Bola de pelos');
	echo "El nombre del perro es: ". $perro->getNombre();
	echo "<br>";
	$gato->perderVida();
	echo $gato->getNombre() ." tiene ". $gato->getVidas(). " vidas";
?>
</body>
</html>