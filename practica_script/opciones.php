<?php
	include 'practica.php';
	$option = $_POST['option'];
	if(isset($option)){
		if($option == "1") sumar_arreglo(array(3,2,6,1));
		if($option == "2") imprimir_tabla_multiplicar(4);
		if($option == "3") hola_cadena("Uriel");
		if($option == "4") quien_es_mayor(3,2);
	}
?>