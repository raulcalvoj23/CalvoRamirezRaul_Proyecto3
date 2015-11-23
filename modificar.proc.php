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
			$idusuario = $_REQUEST['id_usuario'];
			$sql = "UPDATE `bd_recursos`.`tbl_usuario` SET `usuario` = '$_REQUEST[usuario]', `password` = '$_REQUEST[contra]', `rango` = $_REQUEST[rango] WHERE `tbl_usuario`.`id_usuario` = $idusuario";
	
	
			//echo $sql;
			echo "$sql";
			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			
			header("location: misusuarios.php")
			
		?>
	</body>
</html>