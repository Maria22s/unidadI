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
						<input type="hidden" name="crearPaises" value="actualizarPaises">
						<input type="hidden" name="id" value="<?php echo $filas['id']; ?>">
						<h1>Actualizar Paises</h1>
						<div class="input-input">
							<input id="A_iso" name="iso" type="text" placeholder="Iso" value="<?php echo $filas['iso'] ?>">
							<p class="merror" id="B_iso">Solo 3 caracteres.</p>
							<input id="A_iso3" name="iso3" type="text" placeholder="Iso3" value="<?php echo $filas['iso3'] ?>">
							<p class="merror" id="B_iso3">Solo 3 caracteres</p>
						</div>
						<div class="input-input">
							<input id="A_isonumerico" name="isonumerico" type="text" placeholder="Iso númerico" value="<?php echo $filas['isonumerico'] ?>">
							<p class="merror" id="B_isonumerico">Solo 3 caracteres numerico</p>
							<input id="A_nombrepais" name="nombrepais" type="text" placeholder="Nombre del país" value="<?php echo $filas['nombrepais'] ?>">
							<p class="merror" id="B_nombrepais">Solo se permiten caracteres nada de caracteres numericos</p>
						</div>
						<div class="input-input">
							<input id="A_capital" name="capital" type="text" placeholder="Capital" value="<?php echo $filas['capital'] ?>">
							<p class="merror" id="B_capital">Solo se permiten caracteres nada de caracteres numericos</p>
							<input id="A_codigocontinente" name="codigocontinente" type="text" placeholder="Código del continente" value="<?php echo $filas['codigocontinente'] ?>">
							<p class="merror" id="B_codigocontinente">Solo se permiten caracteres nada de caracteres numericos</p>
							<input id="A_codigomoneda" name="codigomoneda" type="text" placeholder="Código de la moneda" value="<?php echo $filas['codigomoneda'] ?>">
							<p class="merror" id="B_codigomoneda">Solo se permiten 3 caracteres</p>
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
	<script src="vista/js/validaciones3.js" ></script></script>
</body>
</html>