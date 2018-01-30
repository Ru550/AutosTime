<?php 
	$nombre="";
	$apodo="";
	$idSexo="";
	$email="";
	$password="";
	$confPass="";
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
			<div class="sign-up-form">
				 <h3 class="tittle">Registro <i class="glyphicon glyphicon-file"></i></h3>
					<p>Te damos la bienvenida en nuestro sitio web, si eres amante de los autos estas en el sitio correcto.
                    <br /> Registrate para que puedas subir imagenes, comentar y/o votar por otras.</p>
				<div class="sign-up">
                <form name='formulario' class="contact_form" id='formulario' method='post' action='' enctype="multipart/form-data">
					<h3 class="tittle reg">Información Personal <i class="glyphicon glyphicon-user"></i></h3>
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
					<br>
					<h3 class="tittle reg">Información de sesión <i class="glyphicon glyphicon-off"></i></h3>
					<div class="sign-u">
						<div class="sign-up1">
							<h4 class="c">Email* :</h4>
						</div>
						<div class="sign-up2">
								 <input type="text" class="text" name="email" value="<?php echo $email ?>" >
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
						<input type="button" name="Siguiente" id="Siguiente" value="Enviar" onclick="enviar(this.form)" class="trig"/>
					</form>
				</div>
			</div>
	<div class="clearfix"> </div>
	<?php include("pie.php"); ?>
	<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>
<?php include("fin.php"); ?>