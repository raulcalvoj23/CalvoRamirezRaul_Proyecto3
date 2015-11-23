<?php 
	include('login.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
		<link rel="stylesheet" type="text/css" href="css/style4.css">
		<link rel="stylesheet" type="text/css" href="css/style6.css">
	</head>
<body>
	<div id="wrapper">
		<?php
			$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
			$sql = "DELETE FROM tbl_reserva WHERE id_reserva=$_REQUEST[id]";
			$datos = mysqli_query($con,$sql);

			if(mysqli_affected_rows($con)==1){
		?>
			<p>Su recurso se ha liberado correctamente. Muchas gracias</p>
			<p><a href="todasreservas.php" class="enlaceboton">Volver a todas las reservas</a></p>
		<?php	
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha podido liberar el producto";
			} else {
				echo "Error inesperado";
			}
		?>
			<p><a href="perfil.php">Volver al Perfil</a></p>
	</div>
</body>
</html>