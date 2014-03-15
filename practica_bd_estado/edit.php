<?php
	require '../practica_bd/conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$id = $_REQUEST['id'];
	$nombre = $c->select_where("nombres","id",$id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar elemento</title>
</head>
<body>
	<form action='controller.php?id=<?php echo $nombre["id"] ?>' method="post">
		<input type='hidden' name="option" value='edit'>
		<input type="text" placeholder="Tu nombre" name="nombre", value="<?php echo $nombre["nombre"] ?>">
		<input type="submit" value="Guardar nombre">
	</form>
</body>
</html>