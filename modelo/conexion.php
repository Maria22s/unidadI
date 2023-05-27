<?php 

$mysqli = new mysqli("localhost", "id19866853_usuario", "Ms0271218!#!", "id19866853_tablasprogramacion");
if ($mysqli->connect_errno) {
	echo "Error al conectar a la base de datos" .$mysqli->connect_errno. $mysqli->connect_error;
}


 ?>