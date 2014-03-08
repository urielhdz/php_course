<?php
	function sumar_arreglo($arreglo){
		$i = 0;
		$suma = 0;
		while(count($arreglo)> 0){ 
			$elemento = array_shift($arreglo);
			$suma += $elemento;
		}
		return $suma;
	}
	function imprimir_tabla_multiplicar($numero){
		$arreglo = array(0,1,2,3,4,5,6,7,8,9);
		
		while(count($arreglo)> 0){ 
			$elemento = array_shift($arreglo);
			echo $numero. " * ". $elemento. " = ". ($numero * $elemento);
			echo "<br>";
		}
	}
	function hola_cadena($cadena){
		echo "Hola ". $cadena;
	}
	function quien_es_mayor($a,$b){
		if($a > 0 and $b > 0){
			if($a == $b) echo "Son iguales";
			elseif($a > $b) echo "El primero (".$a.") es mayor que el segundo (".$b.")";
			else echo "El segundo (".$b.") es mayor que el primero (".$a.")";
		}
	}
?>