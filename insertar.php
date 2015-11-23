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
//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM `tbl_usuario` ORDER BY `id_usuario` ASC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
		<form action="insertar.proc.php" method="GET">
			Usuario:<br/>
			<input type="text" name="usuario" size="20" maxlength="25"><br/>
			Password (solo numeros porfavor):<br/>
			<input type="text" name="contra" size="20"maxlength="25"><br/>
			Rango:<br/>
			<input type="text" name="rango" size="5" maxlength="8"><br/>
			
			</select><br/><br/>
			<input type="submit" value="Enviar">
		</form>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>