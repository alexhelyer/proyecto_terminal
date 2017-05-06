<?php
  session_start();
  if(isset($_SESSION['user'])) {
    echo "Existe una sesion abierta : ".$_SESSION['user'];
  }
  else {
    echo "NO EXISTE sesion abierta";
    header( "Location: index.php" ) ;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="iconos.css">
<link rel="stylesheet" href="estilos.css">
	<meta charset="UTF-8">
	<title>Document</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<script src="js/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

</head>
<body>
	
<header>
	<div class="menu_bar">
	<a href="" class="bt-menu"><span class="icon-menu"></span></a>
	</div>
		
		<nav>
			<ul>
				<li><a class="span_menu"><span class="icon-menu"></span></a></li>
				<li class="li-m"><a href="subir.php"><span class="icon-box-remove"></span>Subir</a></li>
				<li class="li-m"><a href="ver.php"><span class="icon-list-numbered"></span>Ver</a></li>
				<li class="li-m"><a href="estadisticas.php"><span class="icon-pie-chart"></span>Estadísticas</a></li>
				<li class="li-m"><a href="ajustes.php"><span class="icon-cog"></span>Ajustes</a></li>
				<li class="li-m"><a href="php/cerrar_sesion.php"><span class="icon-exit"></span>Cerrar Sesión</a></li>
			</ul>
		</nav>
</header>

<section class="main_section">

	<h1 class="main_titulo">Estadísticas</h1>
	<br><br><br><br>
	<input type="date" class="fecha" name="fecha_1">
	<input type="date" class="fecha" name="fecha_2"><br><br><br>
	<input type="submit" value="graficar" class="btn btn-success">
</section>

<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">

$(function(){


$('.boton_redondo').hide();

var cont = 0;

$('.span_menu').click(function() {
 
if (cont%2==0) {

	$('nav').animate({
 	left: "-20%"
 });
	$('.li-m').hide();
	$('.main_section').animate({
		width: "90%"
	});
}
else{
	$('nav').animate({
 	left: "0%"
 });
	$('.li-m').show();
	$('.main_section').animate({
		width: "70%"
	});

}
 


cont++;

});

});
	


$(document).ready(main);

</script>


  
</body>
</html>

