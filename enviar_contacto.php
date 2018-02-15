<?php
	require_once("conexion/require_once.php");
	
	if(isset($_POST['email'])) {
		// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
		$email_to = "autostimeya@gmail.com";
		$email_subject = "Contacto desde AutosTime";
		
		// Aquí se deberían validar los datos ingresados por el usuario
		if(!isset($_POST['nombre']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telefono']) ||
		!isset($_POST['titulo']) ||
		!isset($_POST['descripcion'])) {
		
			echo "<b>Ocurrio un error y el formulario no ha sido enviado. </b><br />";
			echo "Por favor, vuelva atras y verifique la informacion ingresada.<br />";
			die();
		}else{		
			//Envío hacia Contacto@autostime.esy.es
			$email_message = "\n\nDetalles del formulario de contacto:\n\n";
			$email_message .= "Nombre: " . $_POST['nombre'] . "\n";
			$email_message .= "E-mail: " . $_POST['email'] . "\n";
			$email_message .= "Teléfono: " . $_POST['telefono'] . "\n";
			$email_message .= "Titulo: " . $_POST['titulo'] . "\n";
			$email_message .= "Comentarios: " . $_POST['descripcion'] . "\n\n";
			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$_POST['email']."\r\n".
			'Reply-To: '.$_POST['email']."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			@mail($email_to, $email_subject, $email_message, $headers);
			
			
			//Envio hacia el correo del usuario que envía
			$email_message = "\n\nHola ".$_POST['nombre']."\n";
			$email_message .= "Hemos recibido tus comentarios!\n\n";
			$email_message .= "Tus comentarios seran tomados en cuenta por nuestro equipo.\n";
			$email_message .= "Te invitamos a seguir disfrutando de nuestra pagina.!\n\n\n";
			$email_message .= "Recuerda, AutosTime lo hacemos todos.\n";
			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$email_to."\r\n".
			'Reply-To: '.$email_to."\r\n" .
			'CC: autostimeya@gmail.com'."\r\n".
			'X-Mailer: PHP/' . phpversion();
			@mail($_POST['email'], "AutosTime", $email_message, $headers);			
		}
	}
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
 
	$nombre="Nombre";
	$apodo="Apodo";
	$idSexo="";
	$email="Email";
	$password="Contraseña";
	$confPass="Confirmar Contraseña";
	$imagen="";
	include("cabeza.php");
?>
<script language="javascript">
	function enviar(op){
		op.action="registrarUsuario.php";
		op.submit();
	}

	function selSexo(sel){
		  if (sel.value=="1"){
			   divC = document.getElementById("idImgHombre");
			   divC.style.display = "";

			   divT = document.getElementById("idImgMujer");
			   divT.style.display = "none";
		  }else{
			   divC = document.getElementById("idImgHombre");
			   divC.style.display="none";

			   divT = document.getElementById("idImgMujer");
			   divT.style.display = "";
		  }
	}
</script>
<?php
	include("menu.php");
?>
	<div class="full">
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">	
            <br />
            <br />
            <br />
            <p align="center"><img src="images/imgGenerales/correoExitoso.jpg"/></p>
            <br />
            <br />
            <p class="your-para" align="center">Los comentarios se han enviado correctamente!</p>
            <p class="your-para" align="center">Gracias por enviarnos tus comentarios.</p>
            <?php if(!isset($_SESSION["id_usuario"])):?>
                <p class="your-para" align="center">Te invitamos a darte de alta en nuestra página.</p>            			
            <?php else:?>
                <p class="your-para" align="center"><?php echo $_SESSION['apodo']; ?></p>
            <?php endif;?>
            <br />
			<?php if(!isset($_SESSION["id_usuario"])):?>
            <div class="sign-up-form">
				 <h3 class="tittle">Registro <i class="glyphicon glyphicon-file"></i></h3>
					<p>Te damos la bienvenida en nuestro sitio web, si eres amante de los autos estas en el sitio correcto.
                    <br /> Registrate para que puedas subir imagenes y/o votar por otras.</p>
				<div class="sign-up">
                <form name='formulario' class="contact_form" id='formulario' method='post' action='' enctype="multipart/form-data">
					<h3 class="tittle reg">Información Personal<i class="glyphicon glyphicon-user"></i></h3>
                    <div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Imagen de Perfil* :</h4>
						</div>
						<div class="sign-up2">
                        	<br>
							<?php 
							$bandera=false;
							 if(isset( $_FILES['imagen']['name'] ) and $_FILES['imagen']['name']!=""){
								$destino = 'images/tmp_imagen' ; 
								move_uploaded_file ( $_FILES['imagen']['tmp_name'],$destino."/".$_FILES['imagen']['name']);  
								$bandera=true;
								$nombre=$_POST['nombre'];
								$apodo=$_POST['apodo'];
								$idSexo=$_POST['idSexo'];
								$email=$_POST['email'];
								$password=$_POST['password'];
								echo '<img id="imagen" src="'.$destino."/".$_FILES['imagen']['name'].'" width="150" height="180">'; 
								echo '<input type="text" name="imagen" hidden="hidden" value="'.$_FILES['imagen']['name'].'">';
							  }
							  else{
								if(isset($_POST['imagen'])){
									$bandera=true;
									$nombre=$_POST['nombre'];
									$apodo=$_POST['apodo'];
									$idSexo=$_POST['idSexo'];
									$email=$_POST['email'];
									$password=$_POST['password'];
									echo '<img src="images/tmp_imagen/'.$_POST['imagen'].'" width="150" height="180">';
								}else{
									echo '<div id="idImgHombre" >';
										echo '<img src="'.'images/fUsuarios/usuarioHombre.jpg'.'" width="150" height="180">';
									echo '</div>';
									echo '<div id="idImgMujer" style="display:none;">';
											echo '<img src="'.'images/fUsuarios/usuariaMujer.jpg'.'" width="150" height="180">';
									echo '</div>';
								}
							   }
							?>
                    		<input type="file" name="imagen" id="imagen" value="<?php echo $imagen ?>" onchange="this.form.submit()"/>
	                    </div>
						<div class="clearfix"> </div>
					</div>
                    <div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Nombre* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" class="text" name="nombre" value="<?php echo $nombre ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="a">Apodo* :</h4>
						</div>
						<div class="sign-up2">
								<input type="text" class="text" name="apodo" value="<?php echo $apodo ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
                    <div class="sign-u">
	                    <div class="sign-up1">
							<h4 class="a">Sexo* :</h4>
						</div>
  						<div class="sign-up2"><br>
    		                 <select id="id_sexo" name="idSexo" onchange="selSexo(this)">
                                 <option value="1">Macho Alfa Lomo Plateado</option>
                                 <option value="2">Damita</option>  
                              </select>
                        </div>                
                    	<div class="clearfix"> </div>
					</div>
					<br>
					<h3 class="tittle reg">Información de sesión<i class="glyphicon glyphicon-off"></i></h3>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">Email* :</h4>
						</div>
						<div class="sign-up2">
								 <input type="email" class="text" name="email" value="<?php echo $email ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="d">Contraseña* :</h4>
						</div>
						<div class="sign-up2">
								 <input type="password" class="Password" name="password" value="<?php echo $password ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirmar Contraseña* :</h4>
						</div>
						<div class="sign-up2">
								<input type="password" class="Password" name="confPass" value="<?php echo $confPass ?>" >
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="button" name="Siguiente" id="Siguiente" value="Enviar" onclick="enviar(this.form)" />
					</form>
				</div>
			</div>
            <?php else:?>
	            <p class="your-para" align="center">Te invitamos a visitar todas las zonas de nuestra página.</p>
				<p class="your-para" align="center">Recuerda, AutosTime Lo hacemos todos!</p>
                <br />
                <br />
                <br />
                <br />
                <br />
            <?php endif;?>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
	<div class="clearfix"> </div>
</div>
<?php include("fin.php"); ?>