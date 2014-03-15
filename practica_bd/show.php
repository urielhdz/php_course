<?php
	require 'conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$id = $_REQUEST['id'];
	$nombre = $c->select_where("nombres","id",$id);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar elemento</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<h1><?php echo $nombre["nombre"]  ?></h1>
</body>
</html>