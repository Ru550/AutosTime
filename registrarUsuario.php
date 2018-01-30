<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<br />
			<br />
			<br />
			<?php
				$mivar="";
				foreach($_POST as $i => $v){
				}
				
				if(isset( $_POST['imagen']['name'] ) and $_POST['imagen']['name']!=""){
					$nombrefoto = $_POST["imagen"];
					$imagen = addslashes(fread(fopen("images/tmp_imagen/".$nombrefoto, "r"), filesize("images/tmp_imagen/".$nombrefoto) ));
				}
				
				$ultimoID="select max(id_usuario) as nuevoID From usuario ";
				$resUltim = $conex->consulta($ultimoID);
		
				while($row = mysqli_fetch_array($resUltim)){
					$mivar = $row['nuevoID'];
					$ultimoID=$mivar+1;	
				}
				$nombre=$_POST['nombre'];
				$apodo=$_POST['apodo'];
				$idSexo=$_POST['idSexo'];
				$email=$_POST['email'];
				$password=$_POST['password'];
				//Convierte las ñ y las vocales con acento
				$nombre = utf8_decode($nombre); 
				$apodo = utf8_decode($apodo);
		
				$insertar = $conex->consulta("INSERT INTO usuario(id_tipo_usuario,id_estatus,nombre,id_sexo,email,password,ubicacion_foto,apodo,fecha_alta) VALUES(2,1,'".$nombre."','".$idSexo."','".$email."',sha1('".$password."'),'images/fUsuarios/usuario".$ultimoID.'.jpg'."','".$apodo."',curdate())",$conex);
		
				if(isset( $_POST['imagen']['name'] ) and $_POST['imagen']['name']!=""){
					rename("images/tmp_imagen/".$nombrefoto, "images/tmp_imagen/usuario".$ultimoID.'.jpg');
					copy("images/tmp_imagen/usuario$ultimoID.jpg","images/fUsuarios/usuario$ultimoID.jpg");  
					unlink("images/tmp_imagen/usuario".$ultimoID.'.jpg');
				}else{
					if($idSexo = 1){
						copy("images/fUsuarios/usuarioHombre.jpg","images/fUsuarios/usuario$ultimoID.jpg");
					}else{
						copy("images/fUsuarios/usuariaMujer.jpg","images/fUsuarios/usuario$ultimoID.jpg");
					}
				}
				if (!$insertar){
					die("Fallo en la insercion de registro en la Base de Datos: ".mysql_error());
				}
				else{
				
					if(isset($_POST['email'])) {
						// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
						$email_to = "autostimeya@gmail.com";
						$email_subject = "Alta en AutosTime";
						
						// Aquí se deberían validar los datos ingresados por el usuario
						if(!isset($_POST['nombre']) ||
						!isset($_POST['email']) ||
						!isset($_POST['apodo'])) {
							echo "<b>Ocurrió un error y el E-mail del registro no ha sido enviado. </b><br />";
							echo "Por favor, vuelva atrás y verifique la información ingresada.<br />";
							die();
						}else{		
							//Envío hacia Contacto@autostime.esy.es
							$email_message = '<img src=http://www.autostime.esy.es/images/imgGenerales/logoAutosTime.jpg" />';
							$email_message .= "Detalles del usuario nuevo:\n\n";
							$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
							$email_message .= "Apodo: " . $_POST['apodo'] . "\n";
							$email_message .= "E-mail: " . $_POST['email'] . "\n";
							// Ahora se envía el e-mail usando la función mail() de PHP
							$headers = 'From: '.$email_to."\r\n".
							'Reply-To: '.$_POST['email']."\r\n" .
							'X-Mailer: PHP/' . phpversion();
							@mail($email_to, $email_subject, $email_message, $headers);
							
							
							//Envio hacia el correo del usuario que envía
							$email_message = '<img src=http://www.autostime.esy.es/images/imgGenerales/logoAutosTime.jpg" />';
							$email_message .= "\n\nHola ".$_POST['nombre']."\n";
							$email_message .= "Se ha creado tu usuario satisfactoriamente!\n\n";
							$email_message .= "Te invitamos a iniciar sesion en nuestra pagina.!\n\n\n";
							$email_message .= "Recuerda, AutosTime lo hacemos todos.\n";
							// Ahora se envía el e-mail usando la función mail() de PHP
							$headers = 'From: '.$_POST['email']."\r\n".
							'Reply-To: '.$email_to."\r\n" .
							'CC: autostimeya@gmail.com'."\r\n".
							'X-Mailer: PHP/' . phpversion();
							@mail($_POST['email'], "Alta en AutosTime", $email_message, $headers);			
						}
					}
				
					?>
					<p class="your-para" align="center">Bienvenido(a)  <?php echo utf8_encode($nombre)." (".utf8_encode($apodo).")" ?></p>
					<br />
					<p align="center"><img src="images/fUsuarios/usuario<?php echo $ultimoID.'.jpg' ?>" width="150" height="180" /></p>
					<br />
					<br />
					<p class="your-para" align="center"><br>Tus Datos Han Sido Guardados Exitosamente!<br></p>
					<p class="your-para" align="center">Ahora puedes iniciar sesion y disfrutar con nosotros.</p>
					<br />
					<br />
					<br />
					<br />
					<?php
				}
				?>
              <table align="center">
                 <tr>
                    <td align="center">
                        <a href="iniciarSesion.php"><h4><img src="images/imgGenerales/iniciarSesion.png" width="122" height="29"/></h4></a>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;                
                    </td>
                    <td align="center">
                        <a href="registrar.php"><h4><img src="images/imgGenerales/registrate.png" width="120" height="25" /></h4></a>
                    </td>
                </tr>
            </table>
            <br />
            <br />
            <br />
            <br />
            <br />
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>	
<?php include("fin.php"); ?>