<?php	
	require_once("conexion/require_once.php");
	$mivar="";
	foreach($_POST as $i => $v){
	}	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$ultimoID="select max(id_selfie) as nuevoID From galeria_selfie ";
	$resUltim = $conex->consulta($ultimoID);

	while($row = mysqli_fetch_array($resUltim)){
		$mivar = $row['nuevoID'];
		$ultimoID = $mivar+1;
	}
	
	if(isset( $_FILES['imagen']['name'] ) and $_FILES['imagen']['name']!=""){
		$destino = 'images/fGaleriaSelfies'; 
		
		$nombrefoto = $_FILES['imagen']['name'];
		$extension = pathinfo($nombrefoto, PATHINFO_EXTENSION);
		
		move_uploaded_file ( $_FILES['imagen']['tmp_name'],$destino."/".$_FILES['imagen']['name']); 
		rename($destino."/".$nombrefoto, $destino."/foto".$mivar.".".$extension);
	}
	
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	$idUsuario=$_POST['idUsuario'];
	//Convierte las ñ y las vocales con acento
	$titulo = utf8_decode($titulo); 
	$descripcion = utf8_decode($descripcion);
	

	$insertar = $conex->consulta("INSERT INTO galeria_selfie(id_selfie,titulo,descripcion,ubicacion_foto,fecha_alta) VALUES(".$ultimoID.",'".$titulo."','".$descripcion."','images/fGaleriaSelfies/foto".$mivar.".".$extension."',curdate())",$conex);

	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos: ".mysql_error());
	}
	
	#Carga a la Base de Datos
	$insertar = $conex->consulta("INSERT INTO usuario_selfie (id_usuario, id_selfie) VALUES (".$idUsuario.",".$mivar.")");
	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos: ".mysql_error());
	}
	
	$insertar = $conex->consulta("INSERT INTO usuario_votos_selfie (id_usuario, id_selfie) VALUES(".$idUsuario.",".$mivar.")",$conex);
	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos: ".mysql_error());
	} 
	
	#Envío de E-mail
	$email_to = "autostimeya@gmail.com";
	$email_subject = "Selfie en AutosTime";

	//Cuerpo del mensaje
	$email_message = "Nueva selfie recibida:\n\n";
	$email_message .= "\n\n Titulo: ".$titulo;
	$email_message .= "\n\n Descripción: ".$descripcion;
	$email_message .= "\n\n\n\n Ver Selfie: http://autostime.esy.es/selfies.php";
	
	// Ahora se envía el e-mail usando la función mail() de PHP
	$headers = 'From: '.$email_to."\r\n".
	'Reply-To: '.$email_to."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	@mail($email_to, $email_subject, $email_message, $headers);
	
?>
Guardando y Cargando Foto a la Galeria, Porfavor Espera...
<form action="selfies.php" method="post"  class="contact_form" enctype="multipart/form-data" id="selfieEnv" name="selfieEnv">
    <table align="center">
    	<tr>
        	<td align="center">
			    <img src="images/imgGenerales/loading.gif";>
            </td>
        </tr>
    </table>
</form>   
<script type="text/javascript"> 
	document.selfieEnv.submit(); 
</script>