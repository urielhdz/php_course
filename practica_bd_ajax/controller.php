<?php
	require '../practica_bd/conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$option = $_REQUEST['option'];
	$nombre = $_REQUEST['nombre'];
	if(isset($nombre) && $option == "insert"){
		$estado = $_REQUEST['estado'];
		$ciudad = $_REQUEST['ciudad'];
		echo $nombre."<br>";
		echo $ciudad."<br>";
		echo $estado."<br>";
		if ($c->insert("nombres",array("nombre"=>$nombre,"idEstado"=>$estado,"idMunicipio"=>$ciudad)))
			header('Location: index.php',true,302);	
	}
	elseif ($option == "edit") {
		$id = $_REQUEST['id'];
		
		if ($c->edit("nombres",array("nombre"=>$nombre,"idEstado"=>$estado,"idCiudad"=>$ciudad),"id",$id)){

			header('Location: index.php',true,302);
		}
	}
	elseif ($option == "delete") {
		$id = $_REQUEST['id'];
		if ($c->delete("nombres",$id))
			header('Location: index.php',true,302);		
	}
	else
		echo "SUCEDIO UN ERROR AL CARGAR LOS DATOS"
?>