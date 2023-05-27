<?php 

require_once ('modelo/model.php');

class modeloControlador{
	private $model;

	public function __construct(){
		$this->model = new Modelo();
	}

	static function usuarios(){
		$cliente = new Modelo();
		$datos = $cliente->mostrarDatos("clientes", "1");
		require_once ('vista/clientes.php');
	}

	static function iniciarsesion(){
		require_once ('modelo/conexion.php');

		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];

		$consulta = $mysqli->prepare("SELECT usuario, clave FROM usuarios WHERE usuario = ?");
		$consulta->bind_param("s", $usuario);
		$consulta->execute();
		$result = $consulta->get_result();
		$cantidad = mysqli_num_rows($result);
		$dato = $result->fetch_assoc();
		$consulta->free_result();
		$consulta->close();
		$mysqli->close();

		if ($cantidad == 1) {
			if (password_verify($clave, $dato['clave'])) {
				$_SESSION['usuario'] = $dato['usuario'];
				header('Location: cuenta.php');
			} else {
				echo '<div class="mensaje-error">El USUARIO o la CONTRASEÑA son invalidos.</div>';
			} 
		} else {
			echo '<div class="mensaje-error">El USUARIO o la CONTRASEÑA son invalidos.</div>';
		}
	}

	static function vistaUsuarios(){
		require_once ('vista/registro.php');
	}

	static function saveUsuarios(){
	    if(!empty($_REQUEST['usuario']) && !empty($_REQUEST['clave']) && !empty($_REQUEST['pregunta1']) && !empty($_REQUEST['pregunta2']) && !empty($_REQUEST['rol'])) {
        		$usuario = $_REQUEST['usuario'];
        		$clave = $_REQUEST['clave'];
        		$pregunta1 = $_REQUEST['pregunta1'];
        		$pregunta2 = $_REQUEST['pregunta2'];
        		$rol = $_REQUEST['rol'];
        
        		$table = "'".$usuario."','".password_hash($clave, PASSWORD_DEFAULT)."','".$pregunta1."','".$pregunta2."','".$rol."'";
        		$clientes = new Modelo();
        		$datos = $clientes->registrarDatos("usuarios", $table);
        		header("Location: index.php");
	    } else {
	       echo "Todos los campos son obligatorios";
	    }
	}

	static function viewEditar(){
		$id = $_REQUEST['id'];
		$clientes = new Modelo();
		$datos = $clientes->mostrarDatos("clientes", "id=" . $id);
		require_once ('vista/viewEditar.php');
	}

	static function actualizarClientes(){
		$id = $_REQUEST['id'];
		$fnombre = $_REQUEST['fname'];
		$lnombre = $_REQUEST['lname'];
		$email = $_REQUEST['email'];
		$telefono = $_REQUEST['telefono'];
		$preferencia = $_REQUEST['preferencia'];

		$table = "fname='".$fnombre."',lname='".$lnombre."',email='".$email."',telefono='".$telefono."',preferencia='".$preferencia."'";
		$clientes = new Modelo();
		$datos = $clientes->actualizarDatos("clientes", $table,"id=".$id);
		header("Location: clientes.php");
	}

	static function eliminarDatos() {
		$id = $_REQUEST['id'];
		$clientes = new Modelo();
		$datos = $clientes->eliminarDatos("clientes", "id=".$id);
		header("Location: clientes.php");
	}

	static function searchDates() {
		$sesionId = $_SESSION['usuario'];
		require_once ('modelo/conexion.php');

		$consulta = $mysqli->prepare("SELECT * FROM usuarios WHERE usuario = ?");
		$consulta->bind_param("s", $sesionId);
		$consulta->execute();
		$resultado = $consulta->get_result();
		$cantidad = mysqli_num_rows($resultado);
		$datos = $resultado->fetch_assoc();
		$consulta->free_result();

		return $datos;

	}
	
	static function searchCorreo() {
		require_once ('modelo/conexion.php');
		if (!empty($_POST['usuario'])) {
			$usuario = $_POST['usuario'];

			$consulta = $mysqli->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
			$consulta->bind_param("s", $usuario);
			$consulta->execute();
			$resultado = $consulta->get_result();
			$cantidad = mysqli_num_rows($resultado);
			$dato = $resultado->fetch_assoc();
			$consulta->free_result();
			$consulta->close();

			if ($cantidad > 0) {
				if ($_POST['usuario'] == $dato['usuario']) {
					header("Location: pregunta-one.php?email=".$dato['usuario']);
				}
			} else {
					echo "<div class='mensaje-error'>El correo colocado no existe.</div>";
			}
		} else {
			echo "<div class='mensaje-error'>Este campo no puede estar vacio.</div>";
		}
	}

	static function buscarPreguntaOne() {
		require_once ('modelo/conexion.php');
		if (!empty($_POST['usuario']) && !empty($_POST['pregunta1'])) {
			$usuario = $_POST['usuario'];
			$pregunta1 = $_POST['pregunta1'];

			$consulta = $mysqli->prepare("SELECT pregunta1 FROM usuarios WHERE usuario = ?");
			$consulta->bind_param("s", $usuario);
			$consulta->execute();
			$resultado = $consulta->get_result();
			$cantidad = mysqli_num_rows($resultado);
			$dato = $resultado->fetch_assoc();
			$consulta->free_result();
			$consulta->close();

			if ($cantidad > 0) {
				if ($_POST['pregunta1'] == $dato['pregunta1']) {
					header("Location: pregunta-dos.php?email=".$_POST['usuario']."&&pregunta1=".$dato['pregunta1']);
				} else {
					echo "<div class='mensaje-error'>La primera pregunta es invalida.</div>";
				}
			}
		} else {
			echo "<div class='mensaje-error'>Este campo no puede estar vacio.</div>";
		}
	}

	static function buscarPreguntaDos() {
		require_once ('modelo/conexion.php');

		if (!empty($_POST['usuario']) && !empty($_POST['pregunta2'])) {

			$usuario = $_POST['usuario'];
			$pregunta1 = $_POST['pregunta1'];
			$pregunta2 = $_POST['pregunta2'];

			$consulta = $mysqli->prepare("SELECT pregunta2 FROM usuarios WHERE usuario = ?");
			$consulta->bind_param("s", $usuario);
			$consulta->execute();
			$resultado = $consulta->get_result();
			$cantidad = mysqli_num_rows($resultado);
			$dato = $resultado->fetch_assoc();
			$consulta->free_result();
			$consulta->close();

			if ($cantidad > 0) {
				if ($_POST['pregunta2'] == $dato['pregunta2']) {
					header("Location: nuevaClave.php?email=".$_POST['usuario']."&&pregunta1=".$_POST['pregunta1']."&&pregunta2=".$dato['pregunta2']);
				} else {
					echo "<div class='mensaje-error'>La segunda pregunta es invalida.</div>";
				}
			}
		} else {
			echo "<div class='mensaje-error'>Este campo no puede estar vacio.</div>";
		}
	}

	static function actualizarClave(){
		require_once ('modelo/conexion.php');
		$id = $_POST['usuario'];
		if (!empty($_POST['clave'])) {
			$password = $_POST['clave'];

			$consulta = $mysqli->prepare("UPDATE usuarios SET clave=? WHERE usuario=?");
			$consulta->bind_param("ss", password_hash($password, PASSWORD_DEFAULT), $id);
			$consulta->execute();
			$resultado = $consulta->affected_rows;
			$consulta->free_result();
			header("Location: login.php");
		} else {
			echo '<div class="mensaje-error" align="center">Todos los datos son obligatorios.</div>';
		}
	}
}
