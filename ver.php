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

	<h1 class="main_titulo">Ver Reactivo</h1>
	<br><br>
	<h3>Reactivos Verdadero Falso</h3>
	<br><br>
	<table style="width:100%">
	  <tr>
	    <th>Reactivo</th>
	    <th>Respuesta</th> 
	    <th>Grado</th>
	    <th>Tema</th>
	    <th>Subtema</th>
	    <th>Nivel</th> 
	    <th>Fecha</th>   
	  </tr>

                <?php
                    //CONSULTA DE TODAS LAS CUENTAS EXISTENTES:
                    include 'php/mysql.php';
                    $query = "SELECT * FROM reactivo_verdadero_falso;";
                    $result = $mysql_con->query($query);
                    //POR CADA CUENTA IMPRIMIR UNA FILA EN LA TABLA:
                    $x = 1;

                    while( $fila = $result->fetch_assoc() ){

                        echo '<tr>';
                        echo "<td>".$fila['reactivo']."</td>";
			            echo "<td>".$fila['respuesta']."</td>";
			            echo "<td>".$fila['grado']."</td>";
                        echo "<td>".$fila['tema']."</td> "; 
                        echo "<td>".$fila['subtema']."</td> ";
                        echo "<td>".$fila['nivel']."</td>";
                        echo "<td>".$fila['fecha']."</td>";
                        echo '</tr>';
                        $x = $x+1;

                    }

                    //Cerramos la base de datos.
                    $mysql_con->close();
                ?>



	</table>
	<br><br>
	<h3>Reactivos Opción Múltiple</h3>
	<br><br>

		<table style="width:100%">
	  <tr>
	    <th>Reactivo</th>
	    <th>Respuesta</th> 
	    <th>Grado</th>
	    <th>Tema</th>
	    <th>Subtema</th>
	    <th>Nivel</th> 
	    <th>Fecha</th>   
	  </tr>

                <?php
                    //CONSULTA DE TODAS LAS CUENTAS EXISTENTES:
                    include 'php/mysql.php';
                    $query = "SELECT * FROM reactivo_multiple;";
                    $result = $mysql_con->query($query);
                    //POR CADA CUENTA IMPRIMIR UNA FILA EN LA TABLA:
                    $x = 1;

                    while( $fila = $result->fetch_assoc() ){

                        echo '<tr>';
                        echo "<td>".$fila['reactivo']."</td>";
			            echo "<td>".$fila['respuesta']."</td>";
			            echo "<td>".$fila['grado']."</td>";
                        echo "<td>".$fila['tema']."</td> "; 
                        echo "<td>".$fila['subtema']."</td> ";
                        echo "<td>".$fila['nivel']."</td>";
                        echo "<td>".$fila['fecha']."</td>";
                        echo '</tr>';
                        $x = $x+1;

                    }


                    //Cerramos la base de datos.
                    $mysql_con->close();
                ?>



	</table>
	<br><br>
	<h3>Reactivos Opción Abierta</h3>
	<br><br>
<table style="width:100%">
	  <tr>
	    <th>Reactivo</th>
	    <th>Respuesta</th> 
	    <th>Grado</th>
	    <th>Tema</th>
	    <th>Subtema</th>
	    <th>Nivel</th> 
	    <th>Fecha</th>
		  </tr>

                <?php
                    //CONSULTA DE TODAS LAS CUENTAS EXISTENTES:
                    include 'php/mysql.php';                    
                    $query = "SELECT * FROM reactivo_abierto;";
                    $result = $mysql_con->query($query);
                    //POR CADA CUENTA IMPRIMIR UNA FILA EN LA TABLA:
                    $x = 1;

                    while( $fila = $result->fetch_assoc() ){

                        echo '<tr>';
                        echo "<td>".$fila['reactivo']."</td>";
			            echo "<td>".$fila['respuesta']."</td>";
			            echo "<td>".$fila['grado']."</td>";
                        echo "<td>".$fila['tema']."</td> "; 
                        echo "<td>".$fila['subtema']."</td> ";
                        echo "<td>".$fila['nivel']."</td>";
                        echo "<td>".$fila['fecha']."</td>";
                        echo '</tr>';
                        $x = $x+1;

                    }

                    //Cerramos la base de datos.
                    $mysql_con->close();
                ?>



	</table>
	
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

