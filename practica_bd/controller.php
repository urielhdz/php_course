<?php
	require 'conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$option = $_REQUEST['option'];
	$nombre = $_REQUEST['nombre'];
	if(isset($nombre) && $option == "insert"){
		if ($c->insert("nombres",array("nombre"=>$nombre)))
			header('Location: index.php',true,302);	
	}
	elseif ($option == "edit") {
		$id = $_REQUEST['id'];
		echo $nombre+"<br>";
		echo $id+"<br>";
		if ($c->edit("nombres",array("nombre"=>$nombre),"id",$id)){

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