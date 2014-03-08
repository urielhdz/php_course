<?php
	require 'conector.php';
	$nombre = $_REQUEST['nombre'];
	if(isset($nombre)){
		$c = new Conector("localhost","backend_course_db","root","");

		if ($c->insert("nombres",array("nombre"=>$nombre)))
			header('Location: index.html',true,302);	
	}
	else
		echo "SUCEDIO UN ERROR AL CARGAR LOS DATOS"
?>