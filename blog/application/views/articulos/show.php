<?php 
	if(! $articulo){
		redirect('/articulos',refresh);
	}
 ?>
<section class="text-center">
	<article class="col-md-7 center-block no-float big-padding card inline-block">
		<h1 class="text-center"><?php echo $articulo->titulo ?></h1>
		<p class="be-small text-center">
			<a href="<?php echo base_url() ?>articulos">
				<i class='fa fa-arrow-left'></i> Regresar
			</a> |
			<a href="<?php echo base_url() ?>articulos/edit/<?php echo $articulo->id ?>">
				<i class='fa fa-pencil'></i> Editar
			</a>
		</p>
		<img src="<?php echo base_url()."uploads/". $articulo->id.".". $articulo->extension ?>" class='block'>
		<p>
			<pre><?php echo $articulo->cuerpo ?></pre>	
		</p>
	</article>
</section>