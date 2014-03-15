<?php
	require '../practica_bd/conector.php';
	$c = new Conector("localhost","backend_course_db","root","");
	$id = $_REQUEST['id'];
	$municipios = $c->execute_query("SELECT * FROM municipios WHERE estado_id = ".$id);
?>
<?php
	while ($municipio = $municipios->fetch_assoc()) {

?>
	<option value="<?php echo $municipio['id'] ?>"><?php echo $municipio['nombre']?></option>		
<?php } ?>