<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////

	/* VARIABLES INICIALES */
	include 'mysql.php';
	//Guardamos los datos enviados desde el formulario de inicio de sesion.
	$usuario = $_POST['username'];
	$pass = $_POST['password'];

	echo "Entro a login.php";

/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	/*CONSULTA EN LA BASE DE DATOS */
	$query = "SELECT * FROM administrador WHERE usuario_adm = '".$usuario."'";
	$result = $mysql_con->query($query);

////////////////////////////////////////////////////////////////////////////////////////////////////	

	if($result->num_rows == 0) {
		// SI EL NOMBRE DE USUARIO NO SE ENCUENTRA EN LA BASE DE DATOS REGRESAMOS AL INDEX
		header( "Location: ../index.php?err=0" ) ;
	} 
	else {

		$fila = $result->fetch_assoc();

		if (strcmp($fila['pass_adm'],md5($pass)) != 0) {
			//echo "La contraseña es incorrecta";
			header( "Location: ../index.php?err=1" ) ;
		}
		else {
			//echo "La contraseña es CORRECTA";
			//Iniciamos una sesion
			session_start();
			$_SESSION['user'] =   $usuario;
			$_SESSION['tipo'] =   $fila['tipo'];
			$_SESSION['nombre'] = $fila['nombre_adm'];
			date_default_timezone_set("America/Mexico_City");
			$fecha_hora = date("Y-m-d H:i:s");

			$fecha_actual = strtotime($fecha_hora);
			$fecha_en_bd = strtotime($fila['date_login']);
			$dif = $fecha_actual - $fecha_en_bd;

			echo $dif;	

			if ($dif < 0) {
				//SI ALGUIEN ESTA CONECTADO CON EL MISMO USUARIO:
				header( "Location: ../index.php?err=2" ) ;				
			}	
			else {
				//SI EL INICIO DE SESION ES CORRECTO ACTUALIZAMOS LA BASE DE DATOS
				$query = "UPDATE administrador SET date_login='".$fecha_hora."' WHERE usuario_adm = '".$usuario."'";
				$result = $mysql_con->query($query);

				if( strcmp($fila['tipo'],'root') == 0 ){
					//echo "SE INICIO COMO ADMIN";
					header( "Location: ../subir.php" ) ;
				}
				
			}
		}
	}

	$mysql_con->close(); //cerrar conexion a la base de datos

////////////////////////////////////////////////////////////////////////////////////////////////////
?>
