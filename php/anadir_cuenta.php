<?php
		
		include 'mysql.php';
		$query = " SELECT * FROM cuentas where usuario ='".$_POST['nuevo_usuario']."' ";
		$result = $mysql_con->query($query);

		if( strcmp($_POST['nuevo_tipo'], "adm") == 0 ) {
			$nuevo_cargo = "Supervisor";
		} else {
			$nuevo_cargo = "Usuario";
		}
		
		
		if ( $result->num_rows>0 ) {
			$mysql_con->close();
			//Este usuario ya existe.
	   		header( "Location: ../alta-usuarios.php?err=1" ) ;
		}else {
			//Creamos la cuenta del usuario
			$query = "INSERT INTO cuentas (usuario,pass,nombre,tipo,sesion,siglas,cargo,area,dept,correo) VALUES ('".$_POST['nuevo_usuario']."','".md5($_POST['nuevo_pass'])."','".$_POST['nuevo_nombre']."','".$_POST['nuevo_tipo']."','0000-00-00 00:00:00','".$_POST['nuevo_siglas']."','".$nuevo_cargo."','".$_POST['nuevo_area']."','".$_POST['nuevo_dept']."','".$_POST['nuevo_correo']."');";
			$result = $mysql_con->query($query);
			$mysql_con->close();
	   		header( "Location: ../registro.php" ) ;
		}

?> 