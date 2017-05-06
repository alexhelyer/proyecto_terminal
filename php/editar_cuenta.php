<?php
		include 'mysql.php';

		$nuevo_cargo = "Usuario";

		if( strcmp($_POST['nuevo_tipo'], "adm") == 0 ) {
			$nuevo_cargo = "Supervisor";
		}	

		//Cambio de información personal
		$query = "UPDATE cuentas set nombre='".$_POST['nuevo_nombre']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE cuentas set correo='".$_POST['nuevo_correo']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE cuentas set siglas='".$_POST['nuevo_siglas']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);

		//Cambio de departamentos y cargo.
		$query = "UPDATE cuentas set cargo='".$nuevo_cargo."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE cuentas set area='".$_POST['nuevo_area']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE cuentas set dept='".$_POST['nuevo_dept']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);

		//Cambio de tipo de cuenta y password
		$query = "UPDATE cuentas set tipo='".$_POST['nuevo_tipo']."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);
		$query = "UPDATE cuentas set pass='".md5($_POST['nuevo_pass'])."' where usuario='".$_GET['user']."' ; ";
		$result = $mysql_con->query($query);


		$mysql_con->close();

		echo '
			<a href="../registro.php">Regresar</a>
		';

		header("Location: ../registro.php")

?> 