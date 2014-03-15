<?php 
	require '../practica_bd/conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$estados = $c->select('estados');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Guardar nombres</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta charset="utf-8">
	<style>
		body{
		font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
		font-weight: lighter;
	}
	.col-md-8{
		width:66%;
		float: none;
	}
	.card{
		background-color: white;
		border-radius: 2px;
		box-shadow: 0px 0px 2px rgba(0,0,0,0.5);
	}
	.center-block{
		margin: 0 auto;
	}
	.big-padding{
		padding: 2em;
	}
	.top-space{
		margin-top:1em;
	}
	.no-list li{
		list-style-type: none;
		display: inline-block;
		cursor: pointer;
	}
	.form-control{
		width: 100%;
		border: solid 1px rgba(0,0,0,0.5);
		border-radius: 5px;
		padding: 10px;
	}
	input{
		display: block;
	}
	label{
		display: block;
	}
	.text-center{
		text-align: center;
	}
	</style>
</head>
<body>
	<section class="col-md-8 card center-block big-padding">
		<h1>Guardar nombre v2</h1>
		<label>Nombre: </label>
		<form action="controller.php" method="post">
			<input type="hidden" name="option" value="insert">
			<input type="text" placeholder="Nombre persona" name="nombre" class="form-control">
			<label class='top-space'>Estado: </label>
			<select name="estado" class="form-control">
				<?php
					 while ($estado = $estados->fetch_assoc()) {

				?>
					<option value="<?php echo $estado['id'] ?>"><?php echo $estado['nombre']?></option>		
				<?php } ?>
			</select>
			<!--
			<label class="top-space">Ciudad: </label>
			<select name='ciudad' id='ciudades' class="form-control">
				
			</select>
			<label class="top-space">Localidad: </label>
			<select name='localidad' id='localidades' class="form-control">
				
			</select>
			-->
			<input class="form-control top-space btn btn-info" type="submit" value="Enviar datos"></input>
		</form>
	</section>
</body>
</html>