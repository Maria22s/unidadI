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
		<h1>Empleados</h1>
		<div class="boton">
			<a href="empleados.php?crearEmpleado=vistaEmpleados">Registrar Empleados</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>FNombre</th>
					<th>LNombre</th>
					<th>Teléfono</th>
					<th>Departamento</th>
					<th>Salario</th>
					<th>Fecha</th>
					<th>Opciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if (!empty($datos)) {
					foreach ($datos as $dato => $value) {
						foreach ($value as $filas) { ?>
							<tr>
								<td><?php echo $filas['id']; ?></td>
								<td><?php echo $filas['nombre']; ?></td>
								<td><?php echo $filas['apellido']; ?></td>
								<td><?php echo $filas['telefono']; ?></td>
								<td><?php echo $filas['departamento']; ?></td>
								<td><?php echo $filas['salario']; ?></td>
								<td><?php echo $filas['fecha']; ?></td>
								<td><a href="empleados.php?crearEmpleado=viewEditar&id=<?php echo $filas['id']; ?>">Editar</a> / <a href="empleados.php?crearEmpleado=eliminarDatos&id=<?php echo $filas['id']; ?>">Eliminar</a></td>
							</tr>
						<?php
						}
					} 
				} else {
					echo "<tr><td colspan='7'>No hay datos</td></tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>