<h1 class="text-center">Artículos por <?php echo $usuario->username ?></h1>
<? if($articulos) {?>
	<section class='text-center'>
	<?php foreach($articulos->result() as $articulo): ?>
		<div class="col-md-3 text-center no-float inline-block card margin-right">
			<img src="<?php echo base_url()."uploads/". $articulo->id.".". $articulo->extension ?>" class='block'>
			<h2><?php echo $articulo->titulo ?> </h2>
			<a href="<?php echo base_url() ?>articulos/show/<?php echo $articulo->id ?>" class='btn btn-info'>Leer más</a>
		</div>
	<?php endforeach ?>
	</section>

<?php } ?>