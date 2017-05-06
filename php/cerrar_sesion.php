<?php
	include "mysql.php";
	//Restablecemos los tiempos
	$fecha_hora = "0000-00-00 00:00:00";
	$query = "UPDATE administrador SET date_logout='".$fecha_hora."' WHERE usuario_adm = '".$_SESSION['user']."'";
	$result = $mysql_con->query($query);
	$mysql_con->close();

	//Destruimos la sesion
	session_start();
	session_unset();
	session_destroy();
	//Cerramos la base de datos

	header("Location: ../index.php")
?>