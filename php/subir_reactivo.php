<?php
	
	include "mysql.php";

	if(isset($_POST["enviar_verdadero_falso"])){

		$tema = $_POST["tema"];
		$subtema = $_POST["subtema"];
		$grado = $_POST["grado"];
		$nivel = $_POST["nivel"];
		$reactivo = $_POST["reactivo"];
		$respuesta = $_POST["respuesta"];
		$visto = 0;
		date_default_timezone_set('America/Mexico_City');
		$fecha = date("Y-m-d");
		echo $tema.",".$subtema.",".$grado.",".$nivel.",".$reactivo.",".$respuesta;

		$query ="INSERT INTO reactivo_verdadero_falso (tema,subtema,grado,nivel,reactivo,respuesta,visto,fecha) VALUES ('".$tema."', '".$subtema."', ".$grado.", ".$nivel.", '".$reactivo."', ".$respuesta.", ".$visto.", '".$fecha."');";



			$result = $mysql_con->query($query);

			$mysql_con->close();
			echo "<a href='../subir.html'>Regresar</a>";
	   		//header( "Location: ../subir.html" ) ;
		

	}

	if(isset($_POST["enviar_opcion_multiple"])){

		



	}

	if(isset($_POST["enviar_opcion_abierta"])){

		

	}

	header( "Location: ../subir.php" ) ;
	

?>