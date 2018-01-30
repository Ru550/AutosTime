<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	$mivar="";
	$idUsuario=$_POST['idUsuario'];
	$idEvento=$_POST['idEvento'];
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	//Convierte las ñ y las vocales con acento
	$titulo = utf8_decode($titulo); 
	$descripcion = utf8_decode($descripcion); 
	
	$insertar = $conex->consulta("INSERT INTO comentario_evento(id_usuario, id_evento, titulo, descripcion, fecha) VALUES (".$idUsuario.",".$idEvento.",'".$titulo."','".$descripcion."',NOW())",$conex);
				
	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos.");
	}else{
		echo'<script language="javascript">window.location="detalleEvento.php?idEvento='.$idEvento.'"</script>;';
	}
	?>

	<h3 class="tittle">Agregando comentario...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	