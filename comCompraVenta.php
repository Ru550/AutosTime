<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idUsuario=$_POST['idUsuario'];
	$idCompraVenta=$_POST['idCompraVenta'];
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	//Convierte las ñ y las vocales con acento
	$titulo = utf8_decode($titulo); 
	$descripcion = utf8_decode($descripcion); 
	
	$insertar = $conex->consulta("INSERT INTO comentario_compra_venta(id_usuario,id_compra_venta,titulo,descripcion,fecha) VALUES (".$idUsuario.",".$idCompraVenta.",'".$titulo."','".$descripcion."',NOW())",$conex);
				
	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos.");
	}else{
		echo'<script language="javascript">window.location="detalleCompraVenta.php?idCompraVenta='.$idCompraVenta.'"</script>;';
	}
	?>

	<h3 class="tittle">Agregando comentario...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	