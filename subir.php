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

  <div class="type-content">
    <h1 class="main_titulo">Subir Reactivo</h1>
    <div>
      <input type="radio" class="tipo_reactivo" name="tipo_reactivo" id="tipo01" checked></input>
      <label for="tipo01">Verdadero - Falso</label>
    </div>

    <div>
      <input type="radio" class="tipo_reactivo" name="tipo_reactivo" id="tipo02"></input>
      <label for="tipo02">Opción Múltiple</label>
    </div>

    <div>
      <input type="radio" class="tipo_reactivo" name="tipo_reactivo" id="tipo03"></input>
      <label for="tipo03">Abierto</label>
    </div>

  </div>

  <div class="form-content">
    
<form action="php/subir_reactivo.php" method="post" id="form_1" class="form_type">
    
    <label>Seleccione el tema&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" id="slct1" name="tema" onchange="populate(this.id,'subtema')">
      <option value="aritmetica">Aritmética</option>
      <option value="algebra">Álgebra</option>
      <option value="geometria">Geometría</option>
      <option value="trigonometria">Trigonometría</option>
      <option value="probabilidad">Probabilidad</option>
    </select>

    <br><br>
    <label>Seleccione el subtema&nbsp;</label>
    <select id="subtema" name="subtema" class="selectpicker re_size" data-style="btn-info" style="width:auto;">
      <option selected value="naturales">Naturales</option>
      <option selected value="enteros">Enteros</option>
      <option selected value="fraccionarios">Fraccionarios</option>
      <option selected value="decimales">Decimales</option>
    </select><br><br>
  
    <label>Seleccione el grado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" name="grado">
      <option value="1">Primer Grado</option>
      <option value="2">Segundo Grado</option>
      <option value="3">Tercer Grado</option>
    </select><br><br>

    
    <label>Seleccione el Nivel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-info" name="nivel">
      <option value="1"> Nivel I</option>
      <option value="2"> Nivel II</option>
      <option value="3"> Nivel III</option>
    </select><br><br>
    
    
  
    <label for="">Reactivo&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
    <textarea name="reactivo" rows="2" cols="52" required></textarea><br><br>
    <label for="">Respuesta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" name="respuesta" required>
      <option value="">-----</option>
      <option value="1">Verdadero</option>
      <option value="0">Falso</option>
    </select><br><br><br>
  
    <input type="submit" value="Guardar Reactivo" class="btn btn-success guardar_boton" name="enviar_verdadero_falso">
</form>


  <!-- FORM 2-->
<form action="php/subir_reactivo.php" method="post" id="form_2" class="form_type">
    
    <label>Seleccione el tema&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" id="slct02" name="tema" onchange="populate(this.id,'subtema02')">
      <option value="aritmetica">Aritmética</option>
      <option value="algebra">Álgebra</option>
      <option value="geometria">Geometría</option>
      <option value="trigonometria">Trigonometría</option>
      <option value="probabilidad">Probabilidad</option>
    </select>

    <br><br>
    <label>Seleccione el subtema&nbsp;</label>
    <select id="subtema02" name="subtema" class="selectpicker re_size" data-style="btn-info" style="width:auto;">
      <option selected value="naturales">Naturales</option>
      <option selected value="enteros">Enteros</option>
      <option selected value="fraccionarios">Fraccionarios</option>
      <option selected value="decimales">Decimales</option>
    </select><br><br>
  
    <label>Seleccione el grado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" name="grado">
      <option value="1">Primer Grado</option>
      <option value="2">Segundo Grado</option>
      <option value="3">Tercer Grado</option>
    </select><br><br>

    
    <label>Seleccione el Nivel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-info" name="nivel">
      <option value="1"> Nivel I</option>
      <option value="2"> Nivel II</option>
      <option value="3"> Nivel III</option>
    </select><br><br>
    
    
  
    <label for="">Reactivo&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
    <textarea name="reactivo" rows="2" cols="52" required></textarea><br><br>
    <strong>Respuesta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
    <input type="text" name="respuesta" required><br><br>
    <label for="">Incorrecta 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="inco_1" required><br><br>
    <label for="">Incorrecta 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="inco_2" required><br><br>
    <label for="">Incorrecta 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="inco_3" required><br><br><br>

    <input type="submit" value="Guardar Reactivo" class="btn btn-success guardar_boton" name="enviar_opcion_multiple">
</form>


<!-- FORM 3-->
<form action="php/subir_reactivo.php" method="post" id="form_3" class="form_type">
    
    <label>Seleccione el tema&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" id="slct03" name="tema" onchange="populate(this.id,'subtema03')">
      <option value="aritmetica">Aritmética</option>
      <option value="algebra">Álgebra</option>
      <option value="geometria">Geometría</option>
      <option value="trigonometria">Trigonometría</option>
      <option value="probabilidad">Probabilidad</option>
    </select>

    <br><br>
    <label>Seleccione el subtema&nbsp;</label>
    <select id="subtema03" name="subtema" class="selectpicker re_size" data-style="btn-info" style="width:auto;">
      <option selected value="naturales">Naturales</option>
      <option selected value="enteros">Enteros</option>
      <option selected value="fraccionarios">Fraccionarios</option>
      <option selected value="decimales">Decimales</option>
    </select><br><br>
  
    <label>Seleccione el grado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-primary" name="grado">
      <option value="1">Primer Grado</option>
      <option value="2">Segundo Grado</option>
      <option value="3">Tercer Grado</option>
    </select><br><br>

    
    <label>Seleccione el Nivel&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <select class="selectpicker" data-style="btn-info" name="nivel">
      <option value="1"> Nivel I</option>
      <option value="2"> Nivel II</option>
      <option value="3"> Nivel III</option>
    </select><br><br>
    
    
  
    <label for="">Reactivo&nbsp;&nbsp;&nbsp;&nbsp;</label><br>
    <textarea name="reactivo" rows="2" cols="52" required></textarea><br><br>
    <label for="">Respuesta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input type="text" name="respuesta" required><br><br><br>
    <input type="submit" value="Guardar Reactivo" class="btn btn-success guardar_boton" name="enviar_opcion_abierta">
</form>


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

    function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == "aritmetica"){
    var optionArray = ["naturales|Naturales","enteros|Enteros","fraccionarios|Fraccionarios","decimales|Decimales"];
    //$('.selectpicker').selectpicker('refresh');
  } else if(s1.value == "algebra"){
    var optionArray = ["ec_1|Ecuación de 1er Grado (ax+b=cx+d)","ec_2|Ecuación de 1er Grado (x+a=b)","ec_3|Ecuación de 2do Grado","factorizacion|Factorización"];
    $('.selectpicker').selectpicker('refresh');
  } else if(s1.value == "geometria"){
    var optionArray = ["perimetros|Perímetros y Áreas","volumen|Volumen de Cubos","prismas|Prismas y Pirámides","pendiente|Ecuación de la Pendiente"];
    //$('.selectpicker').selectpicker('refresh');
  } else if(s1.value == "trigonometria"){
    var optionArray = ["isosceles|Triángulos Isosceles y Equilateros","inscritos|Ángulos Inscritos","rectangulos|Triángulos Rectángulos","pitagoras|Teorema de Pitágoras"];
    //$('.selectpicker').selectpicker('refresh');
  } else if(s1.value == "probabilidad"){
    var optionArray = ["excluyentes|2 Eventos Mutuamente Excluyentes","independientes|2 Eventos Independientes","equiprobables|Resultados Equiprobables y No Equiprobables"];
    //$('.selectpicker').selectpicker('refresh');
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
  $('.selectpicker').selectpicker('refresh');

}





</script>

<script>
  
$(function(){

  $('.form_type').hide();
  $('#form_1').show();
  $('#tipo01').click(function(){
    $('.form_type').hide();
    $('#form_1').show();

  });
  $('#tipo02').click(function(){
    $('.form_type').hide();
    $('#form_2').show();

  });
  $('#tipo03').click(function(){
    $('.form_type').hide();
    $('#form_3').show();

  });

});

</script>
  
</body>
</html>


