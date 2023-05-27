<?php 

require_once ('modelo/model.php');

class modeloControlador{
	private $model;

	public function __construct(){
		$this->model = new Modelo();
	}

	static function paises(){
		$paises = new Modelo();
		$datos = $paises->mostrarDatos("paises", "1");
		require_once('vista/paises.php');
	}

	static function vistaPaises(){
		require_once('vista/crearPaises.php');
	}

	static function savePaises(){
		$iso = $_REQUEST['iso'];
		$iso3 = $_REQUEST['iso3'];
		$isonumerico = $_REQUEST['isonumerico'];
		$nombrepais = $_REQUEST['nombrepais'];
		$capital = $_REQUEST['capital'];
		$codigocontinente = $_REQUEST['codigocontinente'];
		$codigomoneda = $_REQUEST['codigomoneda'];

		$table = "'".$iso."','".$iso3."','".$isonumerico."','".$nombrepais."','".$capital."','".$codigocontinente."','".$codigomoneda."'";
		$paises = new Modelo();
		$datos = $paises->registrarDatos("paises", $table);
		header("Location: paises.php");
	}

	static function viewEditarPaises(){
		$id = $_REQUEST['id'];
		$paises = new Modelo();
		$datos = $paises->mostrarDatos("paises", "id=" . $id);
		require_once ('vista/viewEditarPaises.php');
	}

	static function actualizarPaises(){
		$id = $_REQUEST['id'];
		$iso = $_REQUEST['iso'];
		$iso3 = $_REQUEST['iso3'];
		$isonumerico = $_REQUEST['isonumerico'];
		$nombrepais = $_REQUEST['nombrepais'];
		$capital = $_REQUEST['capital'];
		$codigocontinente = $_REQUEST['codigocontinente'];
		$codigomoneda = $_REQUEST['codigomoneda'];

		$table = "iso='".$iso."',iso3='".$iso3."',isonumerico='".$isonumerico."',nombrepais='".$nombrepais."',capital='".$capital."',codigocontinente='".$codigocontinente."',codigomoneda='".$codigomoneda."'";
		$paises = new Modelo();
		$datos = $paises->actualizarDatos("paises", $table,"id=".$id);
		header("Location: paises.php");
	}

	static function eliminarDatos() {
		$id = $_REQUEST['id'];
		$paises = new Modelo();
		$datos = $paises->eliminarDatos("paises", "id=".$id);
		header("Location: paises.php");
	}
}
