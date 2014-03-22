<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Blog </title>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."css/bootstrap.min.css" ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()."css/style.css" ?>">
</head>
<body>
	<header class='bottom-space'>
		<nav >
			<ul class="nav nav-tabs">
				<li><a href="<?php echo base_url() ?>" class="black">Inicio</a></li>
				<li><a href="<?php echo base_url() ?>articulos" class="black">Artículos</a></li>
				<?php if($user){ ?>
					<li><a href="<?php echo base_url() ?>articulos/new" class="black pull-right">Nuevo artículo</a></li>
					<li><a href="<?php echo base_url() ?>sesiones/destroy" class="black pull-right">Cerrar sesión</a></li>
				<?php } else { ?>
					<li><a href="<?php echo base_url() ?>sesiones/new" class="black ">Iniciar sesión</a></li>
				<?php } ?>
			</ul>	
		</nav>
		
	</header>