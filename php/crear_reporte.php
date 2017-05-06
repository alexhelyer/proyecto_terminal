<?php

		//echo "Desde aqui se crean los reportes";

		$clave  = $_POST['clave'];
		$fecha  = $_POST['fecha'];
		$nombre = $_POST['nombre'];
		$ext    = $_POST['ext'];
		$area = $_POST['area'];
		$falla  = $_POST['falla'];
		$desc   = $_POST['desc'];


		date_default_timezone_set('America/Mexico_City');
		$fecha = date("Y-m-d H:i:s");
		
		$hh = date("H");
		$mm = date("i");
		$H = $hh + 0 ;
		$m = $mm + 0 ;
		$min = $H*60 + $m ;

		echo "Esta el la clave ".$clave."<br>";
		echo "Esta el la clave ".$fecha."<br>";
		echo "Esta el la clave ".$nombre."<br>";
		echo "Esta el la clave ".$ext."<br>";
		echo "Esta el la clave ".$area."<br>";
		echo "Esta el la clave ".$falla."<br>";
		echo "Esta el la clave ".$desc."<br>";
		echo "Esta el la fecha ".$fecha."<br>";
		echo "Esta el la minutos ".$min."<br>";
		
		include 'mysql.php';
		$query = " SELECT * FROM reporte where clave_rep ='".$clave."' ";
		$result = $mysql_con->query($query);
		
		
		if ( $result->num_rows>0 ) {
			$mysql_con->close();
			//Este usuario ya existe.
	   		//header( "Location: ../alta-usuarios.php?err=1" ) ;
	   		echo "El reporte ya existe";
		}else {
			//Creamos la cuenta del usuario
			
			//$query = "INSERT INTO reporte (clave_rep,creado,fechaI,fi,fechaT,ft,tiempo,ext,area,falla,descripcion,resp,respS,respT,estado) VALUES ( '".$clave."', '".$nombre."',  ,  ,  ,  ,  , ".$ext.", '".$area."', '".$falla."', '".$desc."',  ,  ,  ,  );";
			//Agregamos los datos principales
			$query = "INSERT INTO reporte (clave_rep,creado,fechaI,fi,ext,area,falla,descripcion,resp,respS,respT) VALUES ( '".$clave."', '".$nombre."', '".$fecha."', ".$min.", ".$ext.", '".$area."', '".$falla."', '".$desc."', 'Sin Asignar', 'Sin Asignar', 'Sin Asignar');";
			$result = $mysql_con->query($query);

			$mysql_con->close();
			echo "Se ha creado un nuevo reporte";
			echo '<a href="../reporte.php?text=Enviado">Regresar</a>';
	   		//header( "Location: ../reporte.php?text=Enviado" ) ;
		}

?>