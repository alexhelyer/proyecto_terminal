<?php
		echo "Hola Mundo";

		$clave = $_POST['clave'];

		$R0 = $_POST['resp'];
		$R1 = $_POST['respS'];
		$R2 = $_POST['respT'];

		echo "  ".$R0."  ".$R1."  ".$R2."  C:".$clave;

		include 'mysql.php';	

		//Cambio de información personal
		$query = "UPDATE reporte set resp='".$R0."' where clave_rep='".$clave."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE reporte set respS='".$R1."' where clave_rep='".$clave."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE reporte set respT='".$R2."' where clave_rep='".$clave."' ; ";
		$result = $mysql_con->query($query);



		$mysql_con->close();

		echo '
			<a href="../inicio_sup.php">Regresar</a>
		';

		header("Location: ../inicio_sup.php")


?>