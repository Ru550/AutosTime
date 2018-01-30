<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idSelfie=$_GET['idSelfie'];
	$qryArchivoBorrar = "SELECT ubicacion_foto FROM galeria_selfie WHERE id_selfie = $idSelfie";
	$resultArchivo = $conex->consulta($qryArchivoBorrar);
	while($rowArchivo = mysqli_fetch_array($resultArchivo)){
		$archivoBorrar = $rowArchivo["ubicacion_foto"];
	}
	unlink($archivoBorrar);
	
	$eliminar = $conex->consulta("DELETE FROM usuario_votos_selfie WHERE id_selfie = ".$idSelfie ,$conexion);
	if (!$eliminar){
		die("Fallo al intentar eliminar el Usuario Votos Selfie de la Base de Datos.");
	}
	
	$eliminar = $conex->consulta("DELETE FROM usuario_selfie WHERE id_selfie = ".$idSelfie ,$conexion);
	if (!$eliminar){
		die("Fallo al intentar eliminar el Usuario Selfie de la Base de Datos.");
	}
	$eliminar = $conex->consulta("DELETE FROM galeria_selfie WHERE id_selfie = ".$idSelfie ,$conexion);
				
	if (!$eliminar){
		die("Fallo al intentar eliminar la Selfie de la Base de Datos.");
	}else{
		print "<script>window.location='selfies.php';</script>";
	}
?>

	<h3 class="tittle">Borrando Foto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	