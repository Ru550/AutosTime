<?php
	include("cabeza.php");
	include("menu.php");
?>
<div class="full">
	<?php include("redesSociales.php"); ?>
	<div class="col-md-9 main">
		<div class="login">

			<div class="login-grids">
				<div class="col-md-6 log">
						 <h3 class="tittle">Iniciar Sesion <i class="glyphicon glyphicon-lock"></i></h3>
						 <p>Bienvenido, por favor ingresa tus datos para iniciar tu sesion.</p>
						 <form name="loginform" id="loginform" action="sesUser/login.php" method="POST">
							 <h5>Apodo o Email:</h5>	
							 <input type="text" name="username" required="required" value="">
							 <h5>Contraseña:</h5>
							 <input type="password" name="password" required="required" value="">					
							 <input type="submit" name="login" value="Aceptar">
						 </form>
				</div>
                
				<div class="col-md-6 login-right">
						 <h3 class="tittle">Nuevo Registro <i class="glyphicon glyphicon-file"></i></h3>
						<p>Para crear una cuenta en nuestro sitio, deberás ingresar datos sencillos, en 1 minuto tendrás tu cuenta activa.</p>
						<a href="registrar.php" class="hvr-bounce-to-bottom button">Crear Cuenta</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>
<?php include("fin.php"); ?>