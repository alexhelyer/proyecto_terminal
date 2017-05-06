<?php
	$clave = $_POST['clave'];


	include 'mysql.php';

	if ( isset($_POST['btn-F'])) {
		echo "Se preisono finalizar   ".$clave ;
		
		$query = "SELECT * FROM reporte WHERE clave_rep = '".$clave."' ; ";
		$result = $mysql_con->query($query);
		$fila = $result->fetch_assoc();
		$tiempoIn = $fila['fi'] + 0 ;

		//Creamos la fecha de termino
		date_default_timezone_set('America/Mexico_City');
		$fecha = date("Y-m-d H:i:s");

		$hh = date("H");
		$mm = date("i");
		$H = $hh + 0 ;
		$m = $mm + 0 ;
		$min = $H*60 + $m ;

		$dif = abs($min - $tiempoIn) ;

		$min = $dif%60;
		$hrs = ($dif-$min)/60;

		$tiempo = $hrs." h ".$min." m" ;


		echo "<br>";
		echo "FechaIn: ".$tiempoIn."   FechaTe: ".$min ;
		echo "<br>fin   ".$tiempo;

		//Realizamos los UPDATES

		$query = "UPDATE reporte SET fechaT = '".$fecha."' where clave_rep='".$clave."'  ;";
		$result = $mysql_con->query($query);
		$query = "UPDATE reporte SET ft = ".$dif." where clave_rep='".$clave."'  ;";
		$result = $mysql_con->query($query);
		$query = "UPDATE reporte SET tiempo = '".$tiempo."' where clave_rep='".$clave."'  ;";
		$result = $mysql_con->query($query);
		$query = "UPDATE reporte SET estado = 1 where clave_rep='".$clave."'  ;";
		$result = $mysql_con->query($query);
		//$query = "SELECT * FROM cuentas WHERE usuario = '".$usuario."'";
	}
	else {
		echo "Se preisono Guardar";
	}

	//header("Location: ../inicio.php")
	//Cerramos la base de datos
	$mysql_con->close();

	header("Location: ../inicio.php")
?>