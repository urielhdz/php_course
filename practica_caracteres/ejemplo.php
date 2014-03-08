<?php
	$cadena = "<script>alert('Hola mundo');</script>";

	for ($i=0; $i < strlen($cadena); $i++) { 
		$caracter = $cadena[$i];
		echo $caracter;
		echo "<br>";
	}
	$new_string = str_replace("<", "&lt;", $cadena);
	$new_string = str_replace(">", "&gt;", $new_string);
	echo $new_string;
?>