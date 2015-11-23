<?php
	include('sesion.php');
	$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
	$sql0 = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
	$datos0 = mysqli_query($con, $sql0);
	if (mysqli_num_rows($datos0) == 1) {
	$pro0 = mysqli_fetch_array($datos0);
	$nombre_usuario=$pro0['usuario'];
}else{

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
	<link rel="stylesheet" href="css/style3.css">
</head>
	<body>
	<nav>
		<?php 
			echo "Perfil de: ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
		?>
	</nav>
	<div id="wrapper">
		<?php
			
			$sql = "SELECT * FROM tbl_tipo_recurso  INNER JOIN tbl_recurso ON tbl_tipo_recurso.id_tipo_recurso=tbl_recurso.id_tipo_recurso WHERE tbl_tipo_recurso.id_tipo_recurso=$_REQUEST[recursos] AND tbl_recurso.id_tipo_recurso=$_REQUEST[recursos]";
			
			$datos = mysqli_query($con, $sql);
				if(mysqli_num_rows($datos)>0){
		?>
						
			<table border class="Celda1">
				<tr>
					<th>Recurso</th>
					<th>Imagen</th>
                    <th>Fecha a reservar</th>
                    <th>Hora inicio a reservar</th>
                    <th>Hora final a reservar</th>
					<th>Reservar</th>
				</tr>
		<?php

		
		while ($prod = mysqli_fetch_array($datos)){
			echo "<tr><td>";
			echo "<form action='confirmarreserva.php' method='GET'>";
			echo "$prod[nombre_recurso]";
			$fichero="img/$prod[foto_recurso]";
			if(file_exists($fichero)){
			echo "</td><td></p><img id='img2' src='$fichero'>";
			}
			echo "</td><td><input type='date' name='fecha'";
			echo "</td><td><select name='horainicio'>
				  <option value='08:00:00'>08:00</option>
				  <option value='09:00:00'>09:00</option>
				  <option value='10:00:00'>10:00</option>
				  <option value='11:00:00'>11:00</option>
				  <option value='12:00:00'>12:00</option>
				  <option value='13:00:00'>13:00</option>
				</select>";
			echo "</td><td><select name='horafinal'>
				  <option value='08:59:00'>09:00</option>
				  <option value='09:59:00'>10:00</option>
				  <option value='10:59:00'>11:00</option>
				  <option value='11:59:00'>12:00</option>
				  <option value='12:59:00'>13:00</option>
				  <option value='13:59:00'>14:00</option>
				 </select>";
			echo "<td><input type='hidden' name='id' value='$prod[id_recurso]'>
				 	<input type='submit' value='reservar'>
					</form></td></tr>";
		}	
		?>	
			</table>
		<?php
			} else {
				echo "Producto con id=$_REQUEST[recursos] no encontrado!";
			}
			mysqli_close($con);
		?>
		<p><a id="boton" href="perfil.php">Volver a mi perfil</a></p>
	</div>
	</body>
</html>