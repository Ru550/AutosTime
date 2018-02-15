<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
		echo $i.$v;
	}
	
	$idUsuario=$_POST['idUsuario'];
	$idNoticia=$_POST['idNoticia'];
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	//Convierte las ñ y las vocales con acento
	$titulo = utf8_decode($titulo); 
	$descripcion = utf8_decode($descripcion); 
	
	$insertar = mysql_query("INSERT INTO comentario_noticia(id_usuario,id_noticia,titulo,descripcion,fecha) VALUES (".$idUsuario.",".$idNoticia.",'".$titulo."','".$descripcion."',NOW())",$conex);
				
	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos.");
	}else{
		echo'<script language="javascript">window.location="detalleNoticia.php?idNoticia='.$idNoticia.'"</script>;';
	}
	?>

	<h3 class="tittle">Agregando comentario...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>
	