<?php
	$idHoyNecesito=$_GET['idHoyNecesito'];
	$queHacer = "Comentario";

	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryContVisitas="Update hoy_necesito SET cont_visitas=cont_visitas+1 where id_hoy_necesito = $idHoyNecesito";
	$conex->consulta($qryContVisitas);

	$qryHoyNecesito="SELECT hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.descripcion, hoy_necesito.fecha, COUNT(id_comentario_hoy_necesito) AS cont_comentarios, hoy_necesito.cont_visitas, hoy_necesito.url_facebook, hoy_necesito.url_twitter FROM hoy_necesito LEFT JOIN comentario_hoy_necesito ON hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito WHERE hoy_necesito.id_hoy_necesito = $idHoyNecesito";
	
	$qryPrimFoto="SELECT hoy_necesito.titulo, foto_hoy_necesito.ubicacion_foto FROM hoy_necesito LEFT JOIN foto_hoy_necesito ON hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito WHERE hoy_necesito.id_hoy_necesito = $idHoyNecesito Limit 1";
	
	$qryPublicoEvento="SELECT usuario.id_usuario, usuario.apodo, usuario.ubicacion_foto FROM usuario_hoy_necesito INNER JOIN usuario ON usuario_hoy_necesito.id_usuario = usuario.id_usuario WHERE usuario_hoy_necesito.id_hoy_necesito = $idHoyNecesito";
	
	$qryComentarios="Select comentario_hoy_necesito.titulo, comentario_hoy_necesito.descripcion, comentario_hoy_necesito.fecha, usuario.ubicacion_foto, usuario.apodo From comentario_hoy_necesito Inner Join usuario On comentario_hoy_necesito.id_usuario = usuario.id_usuario Where id_hoy_necesito = $idHoyNecesito Order by id_comentario_hoy_necesito Asc";
	
	$qryGaleria="SELECT hoy_necesito.id_hoy_necesito, foto_hoy_necesito.ubicacion_foto FROM hoy_necesito LEFT JOIN foto_hoy_necesito ON hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito WHERE hoy_necesito.id_hoy_necesito = $idHoyNecesito";

	$resultHoyNecesito = $conex->consulta($qryHoyNecesito);
	$resultComentarios = $conex->consulta($qryComentarios);
	$resultPrimFoto = $conex->consulta($qryPrimFoto);
	$resultPublicoEvento = $conex->consulta($qryPublicoEvento);
	$resultsGaleria = $conex->consulta($qryGaleria);

	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
		<div class="banner-section">
	        <?php
				while($rowPrimFoto = mysqli_fetch_array($resultPrimFoto)){
			?>
                   <h3 class="tittle"><?php echo utf8_encode($rowPrimFoto['titulo']);?> <i class="glyphicon glyphicon-file"></i></h3>
                   <img src="<?php echo $rowPrimFoto['ubicacion_foto'];?>" class="img-responsive" alt="">           
            <?php
				}
				
				while($rowPublico = mysqli_fetch_array($resultPublicoEvento)){
			?>
            	<div class="single">
                    <div class="b-bottom">  
            <?php
				if(!isset($_SESSION["id_usuario"])):
			?>
	            	<p class="sub"><b>Servicio publicado por:</b>
          			<img src="<?php echo $rowPublico['ubicacion_foto'];?>" class="img-responsive" width="60" height="60" alt="">
                    <i><?php echo utf8_encode($rowPublico['apodo']);?></i></p>
            <?php
				else:
					if($_SESSION["id_usuario"] == $rowPublico["id_usuario"]){
			?>
            			<p class="sub"><b>Servicio publicado por ti</b></p>
            			<h5><a href="editaHoyNecesitoP1.php?idHoyNecesito=<?php echo $idHoyNecesito ?> "><b><i>Editar Mi Servicio</i></b></a></h5>			
			<?php
					}else{
			?>
            			<p class="sub"><b>Servicio publicado por:</b>
                        <img src="<?php echo $rowPublico['ubicacion_foto'];?>" class="img-responsive" width="60" height="60" alt="">
                        <i><?php echo utf8_encode($rowPublico['apodo']);?></i></p>
            <?php	
					}
				endif;
			?>
					</div>
                </div>
			<?php
				}
				while($rowHoyNecesito = mysqli_fetch_array($resultHoyNecesito)){
			?>
	            <div class="single">
                    <div class="b-bottom"> 
                        <h5 class="top"><?php echo utf8_encode($rowHoyNecesito['resumen']);?></h5>
                        <p class="sub"><?php echo utf8_encode($rowHoyNecesito['descripcion']);?></p>
                        <p><?php echo date("d/m/Y", strtotime($rowHoyNecesito['fecha']));?>
                             <span class="glyphicon glyphicon-comment"></span><?php echo $rowHoyNecesito['cont_comentarios'];?>
                             <span class="glyphicon glyphicon-eye-open"></span><?php echo $rowHoyNecesito['cont_visitas'];?>
                        </p>
                    </div>
                </div>
			<div class="single-bottom">
				<div class="single-middle">
					<ul class="social-share">
						<li><span>Redes Sociales del Servicio: </span></li>
                        <li></li>
						<li><a href="<?php echo $rowHoyNecesito['url_facebook'];?>" target="_blank"><i> </i></a></li>						
						<li><a href="<?php echo $rowHoyNecesito['url_twitter'];?>" target="_blank"><i class="tin"> </i></a></li>				
					</ul>
					<i class="arrow"> </i>
					<div class="clearfix"> </div>
			   </div>
			</div>			
			<?php
				}
			?>
             <div class="gallery-section">
				<h3 class="tittle">Galeria <i class="glyphicon glyphicon-fullscreen"></i></h3>
				<div class="categorie-grids cs-style-1">
					<div class='images'>
						<?php
							while($row = mysqli_fetch_array($resultsGaleria)){
						?>
							 <div class="col-md-4 cate-grid grid">
								<figure>
									<img src="<?php echo $row['ubicacion_foto'];?>" height="150" width="450" alt="">
									<figcaption>
										<a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="Interior Design">VER</a>
									</figcaption>
								</figure>
							 </div>
						<?php
							}
						 ?>
					</div>
					<script src="js/lightbox.js"></script>
					<div class="clearfix"></div>
				</div>
			</div>             
			<div class="response">
            	<h3>Comentarios:</h3>
				<div class="media response-info">
                <?php
					while($rowComentario = mysqli_fetch_array($resultComentarios)){
				?>
                <div class="single-bottom">
                    <div class="single-middle">
                        <div class="media-left response-text-left">
                                <img width="80px" height="80px" class="media-object" src="<?php echo $rowComentario['ubicacion_foto'];?>" alt=""/>
                            <h5><?php echo utf8_encode($rowComentario['apodo']);?></h5>
                        </div>
                        <div class="media-body response-text-right">
                            <p><h5><?php echo utf8_encode($rowComentario['titulo']);?></h5></p>
                            <p><?php echo utf8_encode($rowComentario['descripcion']);?></p>
                            <ul>
                                <li><?php echo date("d/m/Y h:m:s", strtotime($rowComentario['fecha']));?></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                        <hr />
                    </div>
                </div>
				<?php
					}
				 ?>
                </div>
			</div>
			<?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
            ?>
                <div class="coment-form">
                    <h4>Envía tu comentario</h4>
                    <h5><?php echo $_SESSION['apodo']; ?></h5>
                    <br />
                    <form action="comHoyNecesito.php" method="post" name="datos">
                        <input type="hidden" name="idHoyNecesito" value="<?php echo $idHoyNecesito ?>" >
                        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                        <p class="your-para">Titulo:</p>
                        <input type="text" value="" required="required" name="titulo" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >	                	
                        <p class="your-para">Comentario:</p>
                        <textarea onfocus="this.value = '';" name="descripcion" required="required" onblur="if (this.value == '') {this.value = '';}" ></textarea>
                        <input type="submit" value="Enviar Comentario" >
                    </form>
                </div>	
            <?php endif;?>
			<div class="clearfix"></div>
            <br />
            <div class="fb-comments" data-href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $idHoyNecesito ?>" data-numposts="5"></div>            
		</div>
		<?php include("otrosHoyNecesito.php"); ?>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>