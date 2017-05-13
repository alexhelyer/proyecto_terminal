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

		<!-- MORRIS JS-->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

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
	<div class="donut">
	<div id="donut-example" style="height: 250px; position: static;"></div>
	<div>
		<h1>Aquí va la de localidad</h1>
	</div>
	 <div id="bar-example"></div>

</div>
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


  <!--           Graficas -->

<?php

	include 'php/mysql.php';


	/*			GRÁFICA DE GÉNERO     */

	
    $query = "SELECT genero as 'total_hombres', COUNT(*) as 'total' FROM alumno GROUP BY genero HAVING genero='masculino'";
   
	$num_mujeres;
	$num_hombres;

	$result = $mysql_con->query($query);
                    //POR CADA CUENTA IMPRIMIR UNA FILA EN LA TABLA:
                   $x = 1;

                    while( $fila = $result->fetch_assoc() ){
                    	echo "<h1>".$fila['total']."</h1>";
                        $x = $x+1;
                        $num_hombres = $fila['total'];
                    }

    $query = "SELECT genero as 'total_mujeres', COUNT(*) as 'total' FROM alumno GROUP BY genero HAVING genero='femenino'";
   
	$num_mujeres = 1;
	$num_hombres;

	$result = $mysql_con->query($query);
                    //POR CADA CUENTA IMPRIMIR UNA FILA EN LA TABLA:
                   $x = 1;

                    while( $fila = $result->fetch_assoc() ){
                    	echo "<h1>".$fila['total']."</h1>";
                        $x = $x+1;
                        $num_mujeres = $fila['total'];
                    }                 

                    

echo '

  
	

  <script type="text/javascript">
  	
  Morris.Donut({
  element: "donut-example",
  data: [
    {label: "Mujeres", value: '.$num_mujeres.'},
    {label: "Hombres", value: '.$num_hombres.'},
     ]
});

  </script>
';


/*			GRÁFICA DE LOCALIDAD     */

//SELECT localidad as 'localidad', COUNT(*) as 'total' FROM alumno GROUP BY localidad



 
/*    GRÁFICA DE BARRAS     */
echo '

<script type="text/javascript">
Morris.Bar({
  element: "bar-example",
  data: [
    { y: "2006", a: 100, b: 90 },
    { y: "2007", a: 75,  b: 65 },
    { y: "2008", a: 50,  b: 40 },
    { y: "2009", a: 75,  b: 65 },
    { y: "2010", a: 50,  b: 40 },
    { y: "2011", a: 75,  b: 65 },
    { y: "2012", a: 100, b: 90 }
  ],
  xkey: "y",
  ykeys: ["a", "b"],
  labels: ["Series A", "Series B"]
});


</script>
';

$mysql_con->close();
?>


</body>
</html>

