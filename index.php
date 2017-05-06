<?php
  session_start();
  if(isset($_SESSION['user'])) {
    echo "Existe una sesion abierta : ".$_SESSION['user'];
    header( "Location: subir.php" ) ;
  }
  else {
    echo "NO EXISTE sesion abierta";
    
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/iconos.css">
	<link rel="icon" href="images/favicon.ico" sizes="16x16">
	<script src="js/jquery.min.js"></script>
</head>
<body>
	<header class="cabecera">

		<img src="images/gobmxlogo.svg" width=75 height=23 >
		<nav id="menu">
            <ul>
                <li><a href="reporte.php">Crear Reporte</a></li>
            </ul>
        </nav>

	</header>
	<section class="cuerpo">
		<center>
		<h1>Televisión Educativa</h1>
		<h2>Inicio de Sesión</h2>
		<form action="php/login.php" method="post">
			
			<div>
				<label>Nombre:</label>
				<br>
				<div class="log-text">
					<span class="icon-user" >   </span>
					<input class="form-input" type="text" name="username" placeholder="Usuario" required>
				</div>

				<br><br>
				<label>Usuario:</label>
				<br>

				<div class="log-text">
					<span class="icon-key" >   </span>
					<input class="form-input" type="password" name="password" placeholder="******" required>
				</div>
				<br>
				<p class="err" style="color: #FF0000; display: none;"></p>
				<br>
				<input class="button-sesion" type="submit" value="Iniciar Sesion">

				<script>
				$(function(){
					$(".err").show();
				});
				</script>

			</div>

        	<?php
		        if(isset($_GET['err'])){
		          $err = $_GET['err'];

		          if(strcmp($err,'0')==0)
		              echo  '<script>$(function(){$(".err").text("Usuario INCORRECTO");});</script>';
		          else if (strcmp($err,'1')==0)
		              echo '<script>$(function(){$(".err").text("Password INCORRECTO");});</script>';
		          else if (strcmp($err,'2')==0)
		              echo '<script>$(function(){$(".err").text("Ya se ha iniciado sesion en otra parte");});</script>';

		        }
    		?> 
			
		</form>
		</center>
	</section>
	<footer class="banner">
		<img src="images/gobmxlogo.svg" width=126>
	</footer>
	<style type="text/css">

	.log-text {
		display: inline-flex;
	}

	.icon-user:before {
		font-size: 28px;
	}

	.icon-key:before {
		font-size: 28px;
	}


	</style>
</body>

</html>