<?php

if (!empty($_SESSION['usuario'])) {
	session_start();
	header('Location: index.php');
}

if (!isset($_GET['email']) && !isset($_GET['pregunta1'])) {
	header("Location: olvide-contraseña.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	modeloControlador::actualizarClave();
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
			<h1>Olvide la contraseña</h1>
			<form method="POST" id="formulario">
				<input type="hidden" name="usuario" value="<?php echo $_GET['email']; ?>">
				<div class="inputs">
					<div class="input-preguntados">
						<b>Ingrese la nueva clave:</b>
						<input type="text" name="clave" placeholder="Clave nueva:">
					</div>
					<br>
				</div>
				<div class="btn-registrar">
					<input type="submit" class="btn" name="btn" value="Enviar">
				</div>
			</form>
		</div>
	</div>
</body>
</html>