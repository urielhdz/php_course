<?php
	require '../practica_bd/conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$nombres = $c->execute_query("SELECT n.nombre as nombre,e.nombre as nombreEstado,n.id as id FROM nombres as n INNER JOIN estados as e ON n.idEstado = e.id");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar elemento</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Estado</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
	<?php
		while ($nombre = $nombres->fetch_assoc()) {
	?>
			<tr>
				<td><?php echo $nombre["id"]  ?></td>
				<td><?php echo $nombre["nombre"]  ?></td>
				<td><?php echo $nombre["nombreEstado"]  ?></td>
				<td> 
					<a href="show.php?id=<?php echo $nombre["id"] ?>">Mostrar</a>
					<a href="edit.php?id=<?php echo $nombre["id"] ?>">Editar</a>
					<a href="controller.php?id=<?php echo $nombre["id"] ?>&option=delete">Eliminar</a>
				</td>
			</tr>		
	<?php } ?>
		</tbody>
	</table>
	<div>
		<a class="btn btn-info" href="new.php">Nuevo nombre</a>
	</div>
</body>
</html>