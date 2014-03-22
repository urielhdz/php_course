<section class="col-md-8 card center-block no-float big-padding">
	<h1 class="text-center">Registro</h1>
	<form action="<?php echo base_url() ?>tags/create" method="post">
		<div class="form-group">
			<label>
				Titulo
			</label>
			<input type="text" name="titulo" class="form-control">
		</div>
		
		<input type="submit" class="special-btn blue-btn" value="Guardar tag">
	</form>

</section>