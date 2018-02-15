<?php	
	require_once("conexion/require_once.php");
	$mivar="";
	foreach($_POST as $i => $v){
	}
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$ultimoID="select max(id_humor) as nuevoID From galeria_humor";
	$resUltim = $conex->consulta($ultimoID);

	while($row = mysqli_fetch_array($resUltim)){
		$mivar = $row['nuevoID'];
		$ultimoID=$mivar+1;		
	}
	
	if(isset( $_FILES['imagen']['name'] ) and $_FILES['imagen']['name']!=""){
		$destino = 'images/fGaleriaHumor'; 
		
		$nombrefoto = $_FILES['imagen']['name'];
		$extension = pathinfo($nombrefoto, PATHINFO_EXTENSION);
		
		move_uploaded_file ( $_FILES['imagen']['tmp_name'],$destino."/".$_FILES['imagen']['name']); 
		rename($destino."/".$nombrefoto, $destino."/imagen".$mivar.".".$extension);
	}
	
	$titulo=$_POST['titulo'];
	$descripcion=$_POST['descripcion'];
	$idUsuario=$_POST['idUsuario'];
	//Convierte las ñ y las vocales con acento
	$titulo = utf8_decode($titulo); 
	$descripcion = utf8_decode($descripcion);
	

	$insertar = $conex->consulta("INSERT INTO galeria_humor(id_humor,titulo,descripcion,ubicacion_foto,fecha_alta) VALUES(".$ultimoID.",'".$titulo."','".$descripcion."','images/fGaleriaHumor/imagen".$mivar.".".$extension."',curdate())",$conex);

	if (!$insertar){
		die("Fallo en la insercion de registro en la Base de Datos.");
	}
	
	#Envío de E-mail
	$email_to = "autostimeya@gmail.com";
	$email_subject = "Humor en AutosTime";

	//Cuerpo del mensaje
	$email_message = "Nueva humor recibida:\n\n";
	$email_message .= "\n\n Titulo: ".$titulo;
	$email_message .= "\n\n Descripción: ".$descripcion;
	$email_message .= "\n\n\n\n Ver Selfie: http://autostime.esy.es/humor.php";
	
	// Ahora se envía el e-mail usando la función mail() de PHP
	$headers = 'From: '.$email_to."\r\n".
	'Reply-To: '.$email_to."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	@mail($email_to, $email_subject, $email_message, $headers);
?>
<form action="humor.php" method="post"  class="contact_form" enctype="multipart/form-data" id="selfieEnv" name="humorEnv">
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
	document.humorEnv.submit(); 
</script>