<?php
require_once("../conexion/Conection.php");
require_once("../conexion/conexion_vars.php");

$conex= new Conection($servidor,$usuario,$pass,$db );

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			
			$user_id=null;
			$apodo=null;
			$sql1= "select * from usuario where (apodo=\"$_POST[username]\" or email=\"$_POST[username]\") and password=sha1(\"$_POST[password]\") ";
			$res = $conex->consulta($sql1);
			
			while($r =  mysqli_fetch_array($res)){
				$user_id=$r["id_usuario"];
				$apodo=$r["apodo"];
				$idTipoUsuario=$r["id_tipo_usuario"];
				break;
			}
			if($user_id==null){
				print "<script>alert(\"Acceso invalido! Vuelve a Intenarlo.\");window.location='../iniciarSesion.php';</script>";
			}else{
				session_start();
				$_SESSION["id_usuario"]=$user_id;
				$_SESSION["apodo"]=$apodo;
				$_SESSION["id_tipo_usuario"]=$idTipoUsuario;
				print "<script>window.location='../index.php';</script>";				
			}
		}
	}
}



?>