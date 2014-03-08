<?php
	include '../practica_script/practica.php';
	$option = $_POST['option'];
	if(isset($option)){
		if($option == "1") sumar_arreglo(array(3,2,6,1));
		if($option == "2"){
			$numero = $_POST['numero'];
			imprimir_tabla_multiplicar($numero);
		} 
		if($option == "3"){
			$cadena = $_POST['cadena'];
			hola_cadena($cadena);	
		} 
		if($option == "4"){
			$a = $_POST['a'];
			$b = $_POST['b'];
			quien_es_mayor($a,$b);	
		} 
	}
	
?>