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
			<li><a href="clientes.php">Clientes</a></li>
			<li><a href="empleados.php">Empleados</a></li>
			<li><a href="paises.php">Países</a></li>
		</ul>
	</header>
	<div class="contenido" align="center">
		<div class="formulario">
			<form id="FM" method="GET">
			<?php
				foreach ($datos as $key => $value) {
					foreach ($value as $filas) { ?>
						<input type="hidden" name="crearEmpleado" value="actualizarEmpleados">
						<input type="hidden" name="id" value="<?php echo $filas['id']; ?>">
						<h1>Actualizar Empleados</h1>
						<div class="input-input">
							<input id="A_fname" name="fname" type="text" placeholder="Nombre" value="<?php echo $filas['nombre'] ?>">
							<p class="merror" id="B_fname">Nombre no debe tener caracteres numericos.</p>
							<input id="A_lname" name="lname" type="text" placeholder="Apellido" value="<?php echo $filas['apellido'] ?>">
							<p class="merror" id="B_lname">Apellido no debe tener caracteres numericos.</p>
						</div>
						<div class="input-input">
							<input id="A_telefono" name="telefono" type="text" placeholder="Teléfono" value="<?php echo $filas['telefono'] ?>">
							<p class="merror" id="B_telefono">Minimo 11 a 14 caracteres numericos.</p>
							<select name="departamento">
								<option value="1">Jefe</option>
								<option value="2">Trabajador</option>
							</select>
						</div>
						<div class="input-input">
							<input id="A_salario" name="salario" type="text" placeholder="Salario" value="<?php echo $filas['salario'] ?>">
							<p class="merror" id="B_salario">Nombre no debe tener caracteres numericos.</p>
							<input type="date" name="date">
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
	<script src="vista/js/validaciones2.js" ></script></script>
</body>
</html>