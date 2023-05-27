<?php

if (!empty($_SESSION['usuario'])) {
	session_start();
	header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	modeloControlador::buscarEmail();
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
		<div class="form-clave">
			<div class="titulo">
				<h1>Olvide la clave</h1>
			</div>
			<form method="POST" id="formulario">
				
				<div class="inputs">
					<div>
						<h3>Ingrese su correo</h3>
						<input type="email" name="usuario" placeholder="Usuario">
					</div>
				</div>
				<div class="btn-registrar">
					<input type="submit" class="btn" name="btn" value="Enviar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>