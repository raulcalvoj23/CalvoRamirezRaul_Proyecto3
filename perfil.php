<?php
include('sesion.php');
$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
	$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
	$datos = mysqli_query($con, $sql);
	if (mysqli_num_rows($datos) == 1) {
	$pro = mysqli_fetch_array($datos);
	$nombre_usuario=$pro['usuario'];
}else{

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
	<link rel="stylesheet" href="css/style2.css">
	<script>
		function avisarBusqueda(){
			if(document.reservar.recursos.value!=""){
				return true;
			} else {
				alert("Debes seleccionar un recurso");
				return false;
			}
		}	
		</script>
</head>
<body>
	<div id="wrapper">
		<nav>
			<?php 
				echo "Bievenido ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
			 ?>
		</nav>
		<div id="options">
			<section class="type1">
				<p><a href="#reservar">Reservar producto</a></p>
			</section>
			<div id="divimagen">
            <img src="img/humanos.jpg">
            </div>
			<section class="type1">
				<p><a href="misarticulos.php">Mis productos</a></p>
			</section>
			<?php

			$con = mysqli_connect('mysql7.000webhost.com','a2995712_raul','raul123','a2995712_raul');
			$sql1 = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
			$datos1 = mysqli_query($con, $sql1);
			while ($pro = mysqli_fetch_array($datos1)) {
		
			if ($pro['rango'] == 1) {
			echo "<section class='type1'>
				<p><a href='misusuarios.php'>Mis usuarios</a></p>
			</section>";
			}
		}

			?>
			<section class="type1">
				<p><a href="todasreservas.php">Ver recursos reservados</a></p>
			</section>
            
		</div>
		<div id="reservar" class="modalmask">
			<div class="modalbox movedown" id="resultadoContent">
				<form name="reservar" action="reservar.php" method="POST" onSubmit="return avisarBusqueda();">
	                <a href="#close" class="boxclose"><img src="img/close.png" alt=""></a>
	                <h2 id="tituloReserva">Reservar producto</h2>
	                <div id="contenidoRecursos">
		                <select name="recursos">
							<option value="" selected>Selecciona un recurso...</option>
								<?php
								include('login.php');
								$sql = mysqli_query($con, "SELECT * FROM tbl_tipo_recurso");
								while($dato=mysqli_fetch_array($sql)) {
								echo "<option value=\"$dato[id_tipo_recurso]\">$dato[nombre_tipo_recurso]</option>";
								}
								mysqli_close($con);
								?>
						</select>
						<p><input type="submit" value="Buscar"></p>
				</form>
            		</div>
			</div>
		</div>	
</body>
</html>