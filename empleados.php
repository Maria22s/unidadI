<?php 

require_once 'controlador/controlador.empleados.php';

if (isset($_GET['crearEmpleado'])) {
	if (method_exists("modeloControlador", $_GET['crearEmpleado'])) {
		modeloControlador::{$_GET['crearEmpleado']}();
	}
} else {
	modeloControlador::empleados();
}

 ?>