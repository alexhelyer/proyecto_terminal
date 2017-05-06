<?php
	//Declaramosla zona horaria
	date_default_timezone_set('America/Mexico_City');
	$claveR = $_POST['clave1'];
	//echo "<br>".$claveR."<br>";
	//Incluimos el archivo para usar la BD
	include '../php/mysql.php';
//************************************ IMAGENES **************************************************
	//Guardamos el numero de imagenes seleccionados
	$tam = count($_FILES['archivo']['name']);

	for ($i=0; $i < $tam ; $i++) { 
		echo "<br>";
		echo "Se esta trabajando con el archivo:  ".$_FILES['archivo']['name'][$i]."  tam:".strlen($_FILES['archivo']['name'][$i]);
		echo "<br><br>";

		if( strlen($_FILES['archivo']['name'][$i]) == 0 ){
			echo 'Ha habido un error, tienes que elegir un archivo<br/>';
			echo '<a href="../inicio.php">Subir archivo</a>';
		}
		else{

			$clave = date("dHis");
			//Guardamos el nombre del Archivo
			$nombre = $_FILES['archivo']['name'][$i];
			//Se guarda el nombre del archivo temporal
			$nombre_tmp = $_FILES['archivo']['tmp_name'][$i];
			//Guarda el tipo de archivo
			$tipo = $_FILES['archivo']['type'][$i];
			//Guarda el tamaño del archivo
			$tamano = $_FILES['archivo']['size'][$i];

			//Un arreglo donde almacenamos las extensiones de archivos permitidos
			$ext_permitidas = array('jpg','jpeg','gif','png');
			//Separamos el nombre y extension de archivo a subir.
			$partes_nombre = explode('.', $nombre);
			//nom
			$nom = current( $partes_nombre ).$clave;
			echo "<br>nom: ".$nom."<br>";
			//Aqui guardamos solo la extension del archivo
			$extension = end( $partes_nombre );
			//Buscamos si la extension es una de la permitidas en el arreglo.
			$ext_correcta = in_array($extension, $ext_permitidas);
			 
			$tipo_correcto = preg_match('/^image\/(jpg|jpeg|gif|png)$/', $tipo);
			//$tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo);

			//nombre
			$nomO = $nombre;
			$nombre = $nom.".".$extension;

			$Kb = 1024;
			$limite = 2048 * $Kb ;
		 
			if( $ext_correcta && $tipo_correcto && $tamano <= $limite ){

				if( $_FILES['archivo']['error'][$i] > 0 ){
					echo 'Error: ' . $_FILES['archivo']['error'][$i] . '<br/>';
			    }
			    else{
			 
			      	if( file_exists( '../upload/images/'.$nombre) ){
			      		echo '<br/>El archivo ya existe: ' . $nombre;
			      	}
			      	else{
				    	echo 'Nombre: ' . $nombre . '<br/>';
				      	echo 'Tipo: ' . $tipo . '<br/>';
				      	echo 'Tamaño: ' . ($tamano / 1024) . ' Kb<br/>';
				      	echo 'Guardado en: ' . $nombre_tmp;
			      		move_uploaded_file($nombre_tmp,"../upload/images/" . $nombre);
			      		echo "<br/>Guardado en: " . "../upload/images/" . $nombre;
			      		$query = "INSERT INTO archivos (nomfile,nombre,clave,tam) VALUES ( '".$nombre."', '".$nomO."', '".$claveR."', 1);";
			      		$result = $mysql_con->query($query);
			      		echo "<br/> Se inserto una fila en la BD";
			      	}
			    }
		  	}
		  	else{
		  		echo 'El Tipo de Imagen no es compatible o rebasa los 2MB de tamanio';
		  		echo "<br><br>";
		  	}
		}

	
	}


//************************************ DOCUMENTOS **************************************************
	//Guardamos el numero de documentos seleccionados
	$tam = count($_FILES['documento']['name']);

	for ($i=0; $i < $tam ; $i++) { 
		echo "<br>";
		echo "Se esta trabajando con el documento:  ".$_FILES['documento']['name'][$i]."  tam:".strlen($_FILES['documento']['name'][$i]);
		echo "<br><br>";

		if( strlen($_FILES['documento']['name'][$i]) == 0 ){
			echo 'Ha habido un error, tienes que elegir un documento<br/>';
			echo '<a href="../inicio.php">Subir documento</a>';
		}
		else{

			$clave = date("dHis");
			//Guardamos el nombre del Archivo
			$nombre = $_FILES['documento']['name'][$i];
			//Se guarda el nombre del documento temporal
			$nombre_tmp = $_FILES['documento']['tmp_name'][$i];
			//Guarda el tipo de documento
			$tipo = $_FILES['documento']['type'][$i];
			//Guarda el tamaño del documento
			$tamano = $_FILES['documento']['size'][$i];

			//Un arreglo donde almacenamos las extensiones de archivos permitidos
			$ext_permitidas = array('doc','docx','pdf','txt');
			//Separamos el nombre y extension de documento a subir.
			$partes_nombre = explode('.', $nombre);
			//nom
			$nom = current( $partes_nombre ).$clave;
			echo "<br>nom: ".$nom."<br>";
			//Aqui guardamos solo la extension del documento
			$extension = end( $partes_nombre );
			//Buscamos si la extension es una de la permitidas en el arreglo.
			$ext_correcta = in_array($extension, $ext_permitidas);
			 
			//$tipo_correcto = preg_match('/^image\/(jpg|jpeg|gif|png)$/', $tipo);
			//$tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo);

			$nomO = $nombre;
			//nombre
			$nombre = $nom.".".$extension;

			$Kb = 1024;
			$limite = 2048 * $Kb ;
		 
			if( $ext_correcta && $tamano <= $limite ){

				if( $_FILES['documento']['error'][$i] > 0 ){
					echo 'Error: ' . $_FILES['documento']['error'][$i] . '<br/>';
			    }
			    else{
			 
			      	if( file_exists( '../upload/docs/'.$nombre) ){
			      		echo '<br/>El documento ya existe: ' . $nombre;
			      	}
			      	else{
				    	echo 'Nombre: ' . $nombre . '<br/>';
				      	echo 'Tipo: ' . $tipo . '<br/>';
				      	echo 'Tamaño: ' . ($tamano / 1024) . ' Kb<br/>';
				      	echo 'Guardado en: ' . $nombre_tmp;
			      		move_uploaded_file($nombre_tmp,"../upload/docs/" . $nombre);
			      		echo "<br/>Guardado en: " . "../upload/docs/" . $nombre;
			      		$query = "INSERT INTO archivos (nomfile,nombre,clave,tam) VALUES ( '".$nombre."', '".$nomO."', '".$claveR."', 0);";
			      		$result = $mysql_con->query($query);
			      		echo "<br/> Se inserto una fila en la BD";
			      	}
			    }
		  	}
		  	else{
		  		echo 'El Tipo de Documento no es compatible o rebasa los 2MB de tamanio';
		  		echo "<br><br>";
		  	}
		}

	
	}

	//Cerramos la base de datos.
	$mysql_con->close();


	echo "<br><br>";

?>


<a href="../inicio.php">Regresar</a>