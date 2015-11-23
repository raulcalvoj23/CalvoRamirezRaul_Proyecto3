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
			$sql = "SELECT * FROM tbl_usuario WHERE id_usuario='$idusuario'";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
				<form name="formulario1" action="modificar.proc.php" method="get">
				<input type="hidden" name="id_usuario" value="<?php echo $prod['id_usuario']; ?>">
				Nombre:<br/>
				<input type="text" name="usuario" size="20" maxlength="25" value="<?php echo $prod['usuario']; ?>"><br/>
				Password (solo numeros porfavor):<br/>
				<input type="text" name="contra" size="20"maxlength="25" value="<?php echo $prod['password']; ?>"><br/>
				Rango:<br/>
				<input type="text" name="rango" size="20"maxlength="25" value="<?php echo $prod['rango']; ?>"><br/>
				
				</select><br/><br/>
							
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Usuario con id_usuario='$idusuario' no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="index.php">Volver</a>
	</body>
</html>