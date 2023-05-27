<?php 

require_once ('modelo/model.php');

class modeloControlador{
	private $model;

	public function __construct(){
		$this->model = new Modelo();
	}

	static function empleados(){
		$empleados = new Modelo();
		$datos = $empleados->mostrarDatos("empleados", "1");
		require_once('vista/empleados.php');
	}

	static function vistaEmpleados(){
		require_once('vista/crearEmpleados.php');
	}

	static function saveEmpleados(){
		$fnombre = $_REQUEST['fname'];
		$lnombre = $_REQUEST['lname'];
		$telefono = $_REQUEST['telefono'];
		$departamento = $_REQUEST['departamento'];
		$salario = $_REQUEST['salario'];
		$date = $_REQUEST['date'];

		$table = "'".$fnombre."','".$lnombre."','".$telefono."','".$departamento."','".$salario."','".$date."'";
		$empleados = new Modelo();
		$datos = $empleados->registrarDatos("empleados", $table);
		header("Location: empleados.php");
	}

	static function viewEditar(){
		$id = $_REQUEST['id'];
		$empleados = new Modelo();
		$datos = $empleados->mostrarDatos("empleados", "id=" . $id);
		require_once ('vista/viewEditarEmpleados.php');
	}

	static function actualizarEmpleados(){
		$id = $_REQUEST['id'];
		$fnombre = $_REQUEST['fname'];
		$lnombre = $_REQUEST['lname'];
		$telefono = $_REQUEST['telefono'];
		$departamento = $_REQUEST['departamento'];
		$salario = $_REQUEST['salario'];
		$date = $_REQUEST['date'];

		$table = "nombre='".$fnombre."',apellido='".$lnombre."',telefono='".$telefono."',departamento='".$departamento."',salario='".$salario."',fecha='".$date."'";
		$empleados = new Modelo();
		$datos = $empleados->actualizarDatos("empleados", $table,"id=".$id);
		header("Location: empleados.php");
	}

	static function eliminarDatos() {
		$id = $_REQUEST['id'];
		$empleados = new Modelo();
		$datos = $empleados->eliminarDatos("empleados", "id=".$id);
		header("Location: empleados.php");
	}
}
