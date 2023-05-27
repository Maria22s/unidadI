<?php 

require_once 'controlador/controlador.paises.php';

if (isset($_GET['crearPaises'])) {
	if (method_exists("modeloControlador", $_GET['crearPaises'])) {
		modeloControlador::{$_GET['crearPaises']}();
	}
} else {
	modeloControlador::paises();
}

 ?>