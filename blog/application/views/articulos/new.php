<section>
	<div class="col-md-8 center-block no-float card big-padding">
		<h1 class="text-center">Crear artículo</h1>
		<?php echo form_open_multipart('articulos/create'); ?>
			<div class="form-group">
				<label>Título</label>
				<input type="text" class="form-control" placeholder="Título Artículo" name="titulo">
			</div>
			<div class='form-group'>
				<label>Imagen artículo</label>
				<input type='file' class='form-control' name='imagenArticulo' >
			</div>
			<div class="form-group">
				<label>Contenido</label>
				<textarea class="form-control" name="cuerpo" style="height:300px;"></textarea>
			</div>
			<?php if($tags){ ?>
			<div class='form-group'>
				<label>Categorías: </label> <br>
				<?php foreach($tags->result() as $tag): ?>
					<input type="checkbox" name="tags[]" value="<?php echo $tag->id ?>"> <?php echo $tag->titulo ?>
				<?php endforeach ?>
			</div>
			<?php } ?>
			<input type="submit" class="special-btn blue-btn" value="Guardar artículo">
		</form>
	</div>
</section>