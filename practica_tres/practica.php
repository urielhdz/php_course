<!DOCTYPE html>
<html>
<head>
	<title>Condicionales</title>
</head>
<body>
<!--
	and => and
	or => or
	xor => xor
	not => !
	and => &&
	or => \\
-->
<?php 
	// Ordenar de mayor a menor $a, $b, $c
	$a = 5;
	$b = 8;
	$c = 8;
	if($a > $b){
		if($b > $c)
		{
			echo $a. " - ". $b." - ".$c;
			
		}
		else{
			if($a > $c) echo $a. " - ". $c." - ".$b;
			else echo $c. " - ". $a." - ".$b;
			
		}
	}
	else{
		if($a > $c)
		{
			echo $b. " - ". $a." - ".$c;
			
		}
		else{
			if($b > $c) echo $b. " - ". $c." - ".$a;
			else echo $c. " - ". $b." - ".$a;
		}
	}
?>
</body>
</html>