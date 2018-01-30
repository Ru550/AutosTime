<?php
	require_once("conexion/require_once.php");
	if(!isset($_SESSION['id_usuario'])){
		session_start();
	}
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	foreach($_POST as $i => $v){
	}
	
	$idSelfie=$_GET['idSelfie'];
	$idUsuario=$_SESSION['id_usuario'];
	
	$qryVotos = "SELECT id_usuario_votos_selfie FROM usuario_votos_selfie WHERE id_selfie = $idSelfie AND id_usuario = $idUsuario";
	$resultVoto = $conex->consulta($qryVotos);
	while($rowVoto = mysqli_fetch_array($resultVoto)){
		$yaVoto = $rowVoto["id_usuario_votos_selfie"];
	}
	if($yaVoto>0){}
	else{
		$insertar = $conex->consulta("INSERT INTO usuario_votos_selfie(id_usuario, id_selfie) VALUES(".$idUsuario.",".$idSelfie.")",$conex);
		if (!$insertar){
			die("Fallo en la insercion de registro en la Base de Datos.");
		}
	}
	print "<script>window.location='selfies.php';</script>";
	?>

	<h3 class="tittle">Registrando tu Voto...<i class="glyphicon glyphicon-lock"></i></h3>
	<p>Por favor Espere...</p>