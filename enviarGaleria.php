<?php	
	require_once("conexion/require_once.php");
	$mivar="";
	foreach($_POST as $i => $v){
	}
	$conex= new Conection($servidor,$usuario,$pass,$db );
	if (!$conex){
		die("Fallo la conexión a la Base de Datos: " . mysql_error());
	}
	$ultimoID="select max(id_galeria_fotos) as nuevoID From galeria_fotos";
	$resUltim = $conex->consulta($ultimoID);

	while($row = mysqli_fetch_array($resUltim)){
		$mivar = $row['nuevoID'];
		$mivar = $mivar+1;	
	}
	
	if(isset( $_FILES['imagen']['name'] ) and $_FILES['imagen']['name']!=""){
		$destino = 'images/fGaleriaInicial'; 
		
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

	$insertar=$conex->consulta("INSERT INTO galeria_fotos(id_galeria_fotos, titulo, descripcion, ubicacion_foto, fecha_alta) VALUES(".$mivar.",'".$titulo."','".$descripcion."','images/fGaleriaInicial/foto".$mivar.".".$extension."',curdate())");
	if (!$insertar){
		die("Fallo en la insercion de galeria en la Base de Datos.");
	}else{
	
		$insertar=$conex->consulta("INSERT INTO usuario_galeria_fotos(id_usuario, id_galeria_fotos) VALUES(".$idUsuario.",".$mivar.")");
		if (!$insertar){
			die("Fallo en la insercion de usuario en la Base de Datos.");
		}else{
			
			$insertar=$conex->consulta("INSERT INTO usuario_votos_galeria_fotos(id_usuario, id_galeria_fotos) VALUES(".$idUsuario.",".$mivar.")",$conex);
			if (!$insertar){
				die("Fallo en la insercion de voto en la Base de Datos.");
			}else{
				#Envío de E-mail
				$email_to = "autostimeya@gmail.com";
				$email_subject = "Galeria Inicial en AutosTime";

				//Cuerpo del mensaje
				$email_message = "Nueva galeria recibida:\n\n";
				$email_message .= "\n\n Titulo: ".$titulo;
				$email_message .= "\n\n Descripción: ".$descripcion;
				$email_message .= "\n\n\n\n Ver Selfie: http://autostime.esy.es/galeria.php";
				
				// Ahora se envía el e-mail usando la función mail() de PHP
				$headers = 'From: '.$email_to."\r\n".
				'Reply-To: '.$email_to."\r\n" .
				'X-Mailer: PHP/' . phpversion();
				@mail($email_to, $email_subject, $email_message, $headers);
			}
		}
	}
	
?>
<form action="galeria.php" method="post"  class="contact_form" enctype="multipart/form-data" id="galeria" name="galeria">
    <table align="center">
    	<tr>
        	<td>
            	<h3>Guardando y Cargando Imagen a la Galeria, Porfavor Espera...</h3>
            </td>
        </tr>
        <tr>
            <td align="center">
                <img src="images/imgGenerales/loading.gif";>
            </td>
        </tr>
    </table>
</form>   
<script type="text/javascript"> 
	document.galeria.submit(); 
</script>