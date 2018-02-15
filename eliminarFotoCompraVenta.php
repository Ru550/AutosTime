<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idFotoCompraVenta=$_GET['idFotoCompraVenta'];
	$idCompraVenta=$_GET['idCompraVenta'];
	
	$conexion = mysql_connect($servidor,$usuario,$pass);
	if (!$conexion){
		die("Fallo la conexión a la Base de Datos: " . mysql_error());
	}
	$seleccionar_bd = mysql_select_db($db, $conexion);
	if (!$seleccionar_bd){
		die("Fallo la selección de la Base de Datos: " . mysql_error());
	}
	
	$qryArchivoBorrar = "SELECT ubicacion_foto FROM foto_compra_venta WHERE id_foto_compra_venta = $idFotoCompraVenta";
	$resultArchivo = mysql_query($qryArchivoBorrar);
	while($rowArchivo = mysql_fetch_assoc($resultArchivo)){
		$archivoBorrar = $rowArchivo["ubicacion_foto"];
	}
	unlink($archivoBorrar);
	
	$eliminar = mysql_query("DELETE FROM foto_compra_venta WHERE id_foto_compra_venta = ".$idFotoCompraVenta ,$conexion);
				
	if (!$eliminar){
		die("Fallo al intentr eliminar la foto de la Base de Datos: ".mysql_error());
	}else{
		$qryTotalFotos = "SELECT MAX(numero_foto) as Total FROM foto_compra_venta WHERE id_compra_venta =$idCompraVenta ";
		$resulTotalFotos = mysql_query($qryTotalFotos);
		
		while($rowTotal = mysql_fetch_assoc($resulTotalFotos)){
			$cont = $rowTotal["Total"];
		}
		?>
		<form method="post" action="editaCompraVentaP2.php" name="borra" id="borra" >
		    <input type="hidden" name="idCompraVenta" value="<?php echo $idCompraVenta ?>" />
		    <input type="hidden" name="primVez" value="false" />
		 	<input type="hidden" name="cont" value="<?php echo $cont ?>" />
		 </form>
		 <body onLoad="document.borra.submit();">
	<?php
	}
	?>

	<h3 class="tittle">Borrando Foto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	