<?php
include('sesion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
</head>
<body>
	<nav>
		<?php 
			echo "Bievenido ".$login_sesion."<a href='logout.php'>Salir</a>";
			echo "<a href='perfil.php'>atras</a>";
		 ?>
	</nav>
</body>
</html>