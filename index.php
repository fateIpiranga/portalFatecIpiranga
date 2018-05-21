<html>
	<head>
		<title> Laboratorio PHP </title>			
	</head>
		<body>
<?php
define ('atalhoAtual' , dirname(__FILE__));
$AtalhoAnterior = atalhoAtual;
echo dirname($AtalhoAnterior);
?>
		</body>
</html>