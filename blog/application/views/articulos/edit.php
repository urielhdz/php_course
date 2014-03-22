<?php 
	if(! $articulo){
		redirect('/articulos',refresh);
	}
 ?>
<section>
	<div class="col-md-8 center-block no-float card big-padding">
		<h1 class="text-center">Editar artículo</h1>
		<?php echo form_open_multipart('articulos/update'); ?>
			<input type="hidden" name='id' value="<?php echo $articulo->id ?>">
			<div class="form-group">
				<label>Título</label>
				<input type="text" class="form-control" placeholder="Título Artículo" name="titulo" value="<?php echo $articulo->titulo ?>">
			</div>
			<div class='form-group'>
				<label>Imagen artículo</label>
				<input type='file' class='form-control' name='imagenArticulo' >
			</div>
			<div class="form-group">
				<label>Contenido</label>
				<textarea class="form-control" name="cuerpo" style="height:300px;"><?php echo $articulo->cuerpo ?></textarea>
			</div>
			<input type="submit" class="special-btn blue-btn" value="Guardar artículo">
		</form>
	</div>
</section>