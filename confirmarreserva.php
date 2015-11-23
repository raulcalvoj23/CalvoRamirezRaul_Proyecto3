<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
	<link rel="stylesheet" type="text/css" href="css/style4.css">
	<link rel="stylesheet" type="text/css" href="css/style5.css">
</head>
	<body>
		<div id="wrapper">
		<?php
			$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
			include('login.php');
			
			$fecha = $_REQUEST['fecha'];
			$horainicio = $_REQUEST['horainicio'];
			$horafinal = $_REQUEST['horafinal'];
			$idrecurso = $_REQUEST['id'];


			$sql1 = "SELECT * FROM `tbl_reserva` WHERE `id_recurso` = $idrecurso AND `data_reservada` = '$fecha' AND `hora_reservada_inicio` <= '$horainicio' AND `hora_reservada_final` >= '$horafinal';";

			$datos = mysqli_query($con,$sql1);
			
			if (mysqli_num_rows($datos)>0) {		

			echo "No se puede reservar, este recurso ya esta reservado para ese dia y esa franja horaria";

			}
			else {		

			$sql3 = "INSERT INTO `tbl_reserva` (`id_usuario`, `id_recurso`, `data_reservada`, `hora_reservada_inicio`, `hora_reservada_final`, `estado`) VALUES ($_SESSION[login_user], $_REQUEST[id], '$fecha', '$horainicio', '$horafinal', 'No disponible')";

			echo "Su recurso se ha reservado correctamente";
			
			$datos = mysqli_query($con,$sql3);
			}
		
		
			mysqli_close($con);
		?>
		<p><a href="perfil.php" class="enlaceboton">Panel de usuario</a></p>
		</div>
	</body>
</html>