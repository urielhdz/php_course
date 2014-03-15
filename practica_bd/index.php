<?php
	require 'conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$nombres = $c->select("nombres");
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
		<a class="btn btn-info" href="new.html">Nuevo nombre</a>
	</div>
</body>
</html>