<!DOCTYPE html>
<html>
<head>
	<title>Checkboxes</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="practica.php" method="post">
		<?php
			for ($i=0; $i < 10; $i++) { ?>
				<div class="control">
					<input type="checkbox" name="values[]" value="<?php echo $i ?>"> <?php echo $i ?>
				</div>
		<?php } ?>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>