<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idGaleriaFoto=$_GET['idGaleriaFoto'];
	
	$conexion = mysql_connect($servidor,$usuario,$pass);
	if (!$conexion){
		die("Fallo la conexión a la Base de Datos: " . mysql_error());
	}
	$seleccionar_bd = mysql_select_db($db, $conexion);
	if (!$seleccionar_bd){
		die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
	
	$qryArchivoBorrar = "SELECT ubicacion_foto FROM galeria_fotos WHERE id_galeria_fotos = $idGaleriaFoto";
	$resultArchivo = mysql_query($qryArchivoBorrar);
	while($rowArchivo = mysql_fetch_assoc($resultArchivo)){
		$archivoBorrar = $rowArchivo["ubicacion_foto"];
	}
	unlink($archivoBorrar);
	
	$eliminar = mysql_query("DELETE FROM usuario_votos_galeria_fotos WHERE id_galeria_fotos = ".$idGaleriaFoto ,$conexion);
	if (!$eliminar){
		die("Fallo al intentar eliminar los votos de la Imagen de la Base de Datos: ".mysql_error());
	}
	
	$eliminar = mysql_query("DELETE FROM usuario_galeria_fotos WHERE id_galeria_fotos = ".$idGaleriaFoto ,$conexion);
	if (!$eliminar){
		die("Fallo al intentar eliminar el usuario de la Imagen de la Base de Datos: ".mysql_error());
	}
	
	$eliminar = mysql_query("DELETE FROM galeria_fotos WHERE id_galeria_fotos = ".$idGaleriaFoto ,$conexion);			
	if (!$eliminar){
		die("Fallo al intentar eliminar la Imagen de la Base de Datos: ".mysql_error());
	}else{
		print "<script>window.location='galeria.php';</script>";
	}
	?>

	<h3 class="tittle">Borrando Foto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>