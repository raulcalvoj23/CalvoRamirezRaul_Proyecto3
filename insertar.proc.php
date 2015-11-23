<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
			$sql = "INSERT INTO `tbl_usuario` (usuario, password, rango) VALUES ('$_REQUEST[usuario]', '$_REQUEST[contra]', $_REQUEST[rango])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: misusuarios.php")
		?>
	</body>
</html>