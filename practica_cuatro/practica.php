<!DOCTYPE html>
<html>
<head>
	<title>Loops</title>
</head>
<body>
<!--
	- while
	- do while
	- for
	- foreach
-->
<?php 
	$i = 0;
	while($i <= 10){
		echo $i;
		echo "<br>";
		$i++;
	}
?>
<?php 
	$i = 0;
	do{
		echo $i;
		echo "<br>";
		$i++;
	}while($i <= 10)
 ?>
 <?php 
 	$arreglo = array();
 	for($i = 0;$i<=10;$i++){
 		array_push($arreglo, $i);
 	}
 	$j = 0;
 	while(count($arreglo) > 0){
 		$j = array_shift($arreglo);
 		echo $j;
		echo "<br>";
 	}
  ?>
<?php 
	$arreglo = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	foreach ($arreglo as $i) {
		echo $i;
		echo "<br>";
	}
 ?>
</body>
</html>