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
		<h1>Paises</h1>
		<div class="boton">
			<a href="paises.php?crearPaises=vistaPaises">Registrar Paises</a>
		</div>
		<table>
			<thead>
				<tr>
					<th>Carne de identidad</th>
					<th>ISO</th>
					<th>ISO3</th>
					<th>ISO Númerico</th>
					<th>Nombre del país</th>
					<th>Capital</th>
					<th>Código del continente</th>
					<th>Código de la moneda</th>
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
								<td><?php echo $filas['iso']; ?></td>
								<td><?php echo $filas['iso3']; ?></td>
								<td><?php echo $filas['isonumerico']; ?></td>
								<td><?php echo $filas['nombrepais']; ?></td>
								<td><?php echo $filas['capital']; ?></td>
								<td><?php echo $filas['codigocontinente']; ?></td>
								<td><?php echo $filas['codigomoneda']; ?></td>
								<td><a href="paises.php?crearPaises=viewEditarPaises&id=<?php echo $filas['id']; ?>">Editar</a> / <a href="paises.php?crearPaises=eliminarDatos&id=<?php echo $filas['id']; ?>">Eliminar</a></td>
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