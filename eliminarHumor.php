<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idHumor=$_GET['idHumor'];
	
	$qryArchivoBorrar = "SELECT ubicacion_foto FROM galeria_humor WHERE id_humor = $idHumor";
	$resultArchivo = $conex->consulta($qryArchivoBorrar);
	while($rowArchivo = mysqli_fetch_array($resultArchivo)){
		$archivoBorrar = $rowArchivo["ubicacion_foto"];
	}
	unlink($archivoBorrar);
	
	$eliminar = $conex->consulta("DELETE FROM galeria_humor WHERE id_humor = ".$idHumor ,$conexion);
				
	if (!$eliminar){
		die("Fallo al intentar eliminar la Imagen de la Base de Datos: ".mysql_error());
	}else{
		print "<script>window.location='humor.php';</script>";
	}
	?>

	<h3 class="tittle">Borrando Foto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	