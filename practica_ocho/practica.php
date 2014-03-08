<?php
	include '../practica_script/practica.php';
	$arreglo = $_POST['values'];
	if(isset($arreglo)){
		$suma = sumar_arreglo($arreglo);
		echo $suma;
	}

?>