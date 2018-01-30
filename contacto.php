<?php
	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">	
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="contact">	   
				<div class="clearfix"> </div>
				<div class="contact-left1">
					<h3>Contactanos!<span>Nos gusta leer tus comentarios.</span></h3>
					<div class="in-left">
						<form name='formulario' class="contact_form" id='formulario' method='post' action='enviar_contacto.php' enctype="multipart/form-data">
							<p class="your-para">Nombre :</p>
							<input type="text" name="nombre" required="required">
                            <p class="your-para"></p>
							<p class="your-para">E-Mail :</p>
							<input type="email" name="email" required="required">
                            <p class="your-para"></p>
							<p class="your-para">Teléfono :</p>
							<input type="tel" name="telefono" maxlength="10"><br />
                            (Opcional y Sin Espacios)
					</div>
					<div class="in-right">
						<p class="your-para">Titulo :</p>
							<input type="text" name="titulo" required="required">
                        <p class="your-para"></p>
						<p class="your-para">Comentario :</p>
							<textarea cols="77" rows="6" name="descripcion" required="required"></textarea>
                            <div class="in-right">
								<input type="submit" value="Enviar " class="trig">
                            </div>
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="contact-right1">
					<h3><span>AutosTime</span></h3>
					<h4>Página de Autos, Club's, Eventos <label>y más, mucho mas...</label></h4>
					<p>Cualquier duda o comentario que tengas, sientete en confianza de enviarla.<br>
					Realmente agradecemos tus comentarios.</p>
					<br>
					<p>Siguenos en nuestras redes sociales</p>
						 <ul class=" side-icons con">
							<li><a class="fb" href="https://www.facebook.com/AutosTimeYa" target="_blank"></a></li>
							<li><a class="goog" href="https://twitter.com/AutosTimeYa" target="_blank""></a></li>
					   </ul>
				</div>
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
<?php include("fin.php"); ?>