<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idFotoHoyNecesito=$_GET['idFotoHoyNecesito'];
	$idHoyNecesito=$_GET['idHoyNecesito'];
	
	$conexion = mysql_connect($servidor,$usuario,$pass);
	if (!$conexion){
		die("Fallo la conexión a la Base de Datos: " . mysql_error());
	}
	$seleccionar_bd = mysql_select_db($db, $conexion);
	if (!$seleccionar_bd){
		die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
	
	$qryArchivoBorrar = "SELECT ubicacion_foto FROM foto_hoy_necesito WHERE id_foto_hoy_necesito = $idFotoHoyNecesito";
	$resultArchivo = mysql_query($qryArchivoBorrar);
	while($rowArchivo = mysql_fetch_assoc($resultArchivo)){
		$archivoBorrar = $rowArchivo["ubicacion_foto"];
	}
	unlink($archivoBorrar);
	
	$eliminar = mysql_query("DELETE FROM foto_hoy_necesito WHERE id_foto_hoy_necesito = ".$idFotoHoyNecesito ,$conexion);
				
	if (!$eliminar){
		die("Fallo al intentr eliminar la foto de la Base de Datos: ".mysql_error());
	}else{
		$qryTotalFotos = "SELECT MAX(numero_foto) as Total FROM foto_hoy_necesito WHERE id_hoy_necesito =$idHoyNecesito ";
		$resulTotalFotos = mysql_query($qryTotalFotos);
		
		while($rowTotal = mysql_fetch_assoc($resulTotalFotos)){
			$cont = $rowTotal["Total"];
		}
		?>
		<form method="post" action="editaHoyNecesitoP2.php" name="borra" id="borra" >
		    <input type="hidden" name="idHoyNecesito" value="<?php echo $idHoyNecesito ?>" />
		    <input type="hidden" name="primVez" value="false" />
		 	<input type="hidden" name="cont" value="<?php echo $cont ?>" />
		 </form>
		 <body onLoad="document.borra.submit();">
	<?php
	}
	?>

	<h3 class="tittle">Borrando Foto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	