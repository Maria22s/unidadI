<?php 

session_start();

if (!empty($_SESSION['usuario'])) {
	header("Location: cuenta.php");
}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Clientes</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<ul>
			<li><a href="index.php">Iniciar Sesión</a></li>
			<li><a href="registro.php">Registrarse</a></li>
		</ul>
	</header>
	<div class="contenido" align="center">
		<div class="formulario">
			<form method="GET" id="F">
				<input type="hidden" name="registro" value="saveUsuarios">
				<h1>Registro</h1>
				<div class="input-input">
					<input name="usuario" id="A_usuario" type="email" placeholder="Usuario">
					<p class="M_ERROR" id="B_usuario" >El correo es invalido.</p>
					<input name="clave" id="A_clave" type="password" placeholder="Clave">
					<p class="M_ERROR" id="B_clave" >Minimo 4 digitos.</p>
				</div>
				<div class="input-input">
					<p class="preferencia">Seguridad</p>
					<input name="pregunta1" id="A_pregunta1" type="text" placeholder="Mascota">
					<p class="M_ERROR" id="B_pregunta1" >Rellene bien pregunta, sin caracteres numerico.</p>
					<input name="pregunta2" id="A_pregunta2" type="text" placeholder="Deporte">
					<p class="M_ERROR" id="B_pregunta2" >Rellene bien pregunta, sin caracteres numerico.</p>
				</div>
				<div class="input-input select">
					<select name="rol" id="">
						<option disabled selected>Tipo de usuario</option>
						<option value="1">Usuario</option>
						<option value="2">Admin</option>
					</select>
				</div>
				<div class="boton center">
					<input type="submit" value="Enviar">
				</div>
			</form>
		</div>
	</div>
	<script src="vista/js/registroUsers.js"></script>
</body>
</html>