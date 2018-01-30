<div class="h-top" id="home">
   <div class="top-header">
	    <ul class="cl-effect-16 top-nag">
			<li><a href="index.php" data-hover="INICIO">INICIO</a></li>
           	<li><a href="todasNoticias.php" data-hover="NOTICIAS">NOTICIAS</a></li>
			<li><a href="galeria.php" data-hover="GALERIA">GALERIA</a></li>
			<li><a href="eventos.php" data-hover="EVENTOS">EVENTOS</a></li>
			<li><a href="hoyNecesito.php" data-hover="HOY NECESITO">HOY NECESITO</a></li>
			<li><a href="compraVenta.php" data-hover="COMPRA/VENTA">COMPRA/VENTA</a></li>
			<li><a href="selfies.php" data-hover="SELFIE'S">SELFIE'S</a></li>
			<li><a href="humor.php" data-hover="HUMOR">HUMOR</a></li>
			<li><a href="contacto.php" data-hover="CONTACTANOS">CONTACTANOS</a></li>            
            <?php if(!isset($_SESSION["id_usuario"])):?>
            	<li><a href="iniciarSesion.php" data-hover="INICIAR SESION">INICIAR SESION</a></li>
				<li><a href="registrar.php" data-hover="REGISTRATE">REGISTRATE</a></li> 
            <?php else: ?>
				<li><a href="sesUser/logout.php" data-hover="SALIR">SALIR</a></li>
            <?php endif;?>
<!--			<li><a href="acercaDe.php" data-hover="ACERCA DE">ACERCA DE</a></li>-->
		</ul>
		<div class="clearfix"></div>
	</div>
</div>