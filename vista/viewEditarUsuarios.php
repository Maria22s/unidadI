<?php 

$dato = modeloControlador::searchDates();

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cuenta</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="content">
		<div class="contenido-menu">
			<ul>
			<?php if ($dato['rol'] == 2): ?>
					<li><a href="cuenta.php">Inicio</a></li>
					<li><a href="usuarios.php">Usuarios</a></li>
					<li><a href="clientes.php">Clientes</a></li>
					<li><a href="empleados.php">Empleados</a></li>
					<li><a href="paises.php">Paises</a></li>
					<li><a href="editarUsuario.php?crear-usuarios=viewEditarUsuarios&id=<?php echo $filas['id']; ?>">Modificar perfil</a></li>
					<li><a href="logout.php">Cerrar Sesión</a></li>
				<?php elseif ($dato['rol'] == 1): ?>
					<li><a href="cuenta.php">Inicio</a></li>
					<li><a href="clientes.php">Clientes</a></li>
					<li><a href="empleados.php">Empleados</a></li>
					<li><a href="paises.php">Paises</a></li>
					<li><a href="editarUsuario.php?crear-usuarios=viewEditarUsuarios&id=<?php echo $filas['id']; ?>">Modificar perfil</a></li>
					<li><a href="logout.php">Cerrar Sesión</a></li>
				<?php endif ?>
			</ul>
		</div>
		<div class="content-content">
			<div class="contenido" align="center">
				<div class="formulario" id="F">
					<form method="GET">
						<?php
						foreach ($datos as $key => $value) {
							foreach ($value as $filas) { ?>
								<input type="hidden" name="crear-usuarios" value="actualizarUsuarios">
								<input type="hidden" name="id" value="<?php echo $filas['id']; ?>">
								<h1>Actualizar Usuarios</h1>
								<div class="input-input">
									<input name="usuario" id="A_usuario"  type="email" placeholder="Usuario" value="<?php echo $filas['usuario']; ?>">
									<p class="M_ERROR" id="B_usuario" >El correo es invalido.</p>
									<input name="clave" id="A_clave"  type="password" placeholder="Clave">
									<p class="M_ERROR" id="B_clave" >Minimo 4 digitos.</p>
								</div>
								<div class="input-input">
									<p class="preferencia">Seguridad</p>
									<input name="pregunta1" id="A_pregunta1"  type="text" placeholder="Mascota" value="<?php echo $filas['pregunta1']; ?>">
									<p class="M_ERROR" id="B_pregunta1" >Rellene bien pregunta, sin caracteres numerico.</p>
									<input name="pregunta2" id="A_pregunta2"  type="text" placeholder="Deporte" value="<?php echo $filas['pregunta2']; ?>">
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
								<?php
								} 
							}
						?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="vista/js/EditarUsers.js"></script>
</body>
</html>