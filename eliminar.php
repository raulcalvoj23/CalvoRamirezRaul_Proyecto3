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
			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM `tbl_usuario` WHERE `id_usuario` = '$idusuario'";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				?>
				<table border>
					<tr>
						<th>Usuario</th>
						<th>Password</th>
						<th>Rango</th>
					</tr>

					
					<tr>
					<td>Eliminar?</td>
					<td>
					<?php
					echo "<a href='eliminar.proc.php?id_usuario=$idusuario'>Si</a>";
					?>
					</td>
					<td><a href="index.php">No</td>
					</tr>
				</table>

					<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="151027_exemple_connexio_BD_6_con_enlace.php">Volver</a>
	</body>
</html>