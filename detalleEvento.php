<?php
	$idEvento=$_GET['idEvento'];
	$queHacer = "Comentario";

	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryContVisitas="Update evento SET cont_visitas=cont_visitas+1 where id_evento = $idEvento";
	$conex->consulta($qryContVisitas);

	$qryEvento="SELECT evento.id_evento, evento.titulo, evento.resumen, evento.descripcion, evento.fecha, evento.hora, COUNT(id_comentario_evento) AS cont_comentarios, evento.cont_visitas, evento.url_facebook, evento.url_twitter FROM evento LEFT JOIN comentario_evento ON evento.id_evento = comentario_evento.id_evento WHERE evento.id_evento = $idEvento";
	$qryPrimFoto="SELECT evento.titulo, foto_evento.ubicacion_foto FROM evento LEFT JOIN foto_evento ON evento.id_evento = foto_evento.id_evento WHERE evento.id_evento = $idEvento Limit 1";
	$qryPublicoEvento="SELECT usuario.id_usuario, usuario.apodo, usuario.ubicacion_foto FROM usuario_evento INNER JOIN usuario ON usuario_evento.id_usuario = usuario.id_usuario WHERE usuario_evento.id_evento = $idEvento";
	$qryComentarios="Select comentario_evento.titulo, comentario_evento.descripcion, comentario_evento.fecha, usuario.ubicacion_foto, usuario.apodo From comentario_evento Inner Join usuario On comentario_evento.id_usuario = usuario.id_usuario Where id_evento = $idEvento Order by id_comentario_evento Asc";
	$qryGaleria="SELECT evento.id_evento, foto_evento.ubicacion_foto FROM evento LEFT JOIN foto_evento ON evento.id_evento = foto_evento.id_evento WHERE evento.id_evento = $idEvento";

	$resultEvento = $conex->consulta($qryEvento);
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
					$titulo = utf8_encode($rowPrimFoto['titulo']);
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
	            	<p class="sub"><b>Evento publicado por:</b>
          			<img src="<?php echo $rowPublico['ubicacion_foto'];?>" class="img-responsive" width="60" height="60" alt="">
                    <i><?php echo utf8_encode($rowPublico['apodo']);?></i></p>
            <?php
				else:
					if($_SESSION["id_usuario"] == $rowPublico["id_usuario"]){
			?>
            			<p class="sub"><b>Evento publicado por ti</b></p>
            			<h5><a href="editaEventoP1.php?idEvento=<?php echo $idEvento ?> "><b><i>Editar Mi Evento</i></b></a></h5>			
			<?php
					}else{
			?>
            			<p class="sub"><b>Evento publicado por:</b>
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
				while($rowEvento = mysqli_fetch_array($resultEvento)){
			?>
	            <div class="single">
                    <div class="b-bottom"> 
                        <p class="sub"><b>Descripción: </b><br /><?php echo utf8_encode($rowEvento['descripcion']);?></p>
                        <p><b>Fecha y Hora del Evento: </b><br /><?php echo date("d/m/Y", strtotime($rowEvento['fecha']));?> <?php echo $rowEvento['hora'];?>
                             <span class="glyphicon glyphicon-comment"></span> <?php echo $rowEvento['cont_comentarios'];?>
                             <span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowEvento['cont_visitas'];?>
                        </p>
                    </div>
                </div>
				<?php 
					if(!empty($rowNoticia['url_facebook']) || !empty($rowNoticia['url_twitter'])){
				?>
                <div class="single-bottom">
                    <div class="single-middle">
                        <ul class="social-share">
                            <li><span><b>Redes Sociales del evento: </b></span></li>
                            <li></li>
							<?php if(!empty($rowEvento['url_facebook'])){ ?>
								<li><a href="<?php echo $rowEvento['url_facebook'];?>" target="_blank"><i> </i></a></li>						
							<?php } if(!empty($rowEvento['url_twitter'])){ ?>
								<li><a href="<?php echo $rowEvento['url_twitter'];?>" target="_blank"><i class="tin"> </i></a></li>				
							<?php } ?>
                        </ul>
                        <i class="arrow"> </i>
                        <div class="clearfix"> </div>
                   </div>
                </div>			
			<?php
				}}
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
									<a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="<?php echo $titulo; ?>">
										<img src="<?php echo $row['ubicacion_foto'];?>" height="150" width="450" alt="">
									</a>
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
                            <h5><i><?php echo utf8_encode($rowComentario['apodo']);?></i></h5>
                        </div>
                        <div class="media-body response-text-right">
                            <p><h5><?php echo utf8_encode($rowComentario['titulo']);?></h5></p>
                            <p><?php echo utf8_encode($rowComentario['descripcion']);?></p>
                            <ul>
								<li><?php echo date("d/m/Y g:i:s A", strtotime($rowComentario['fecha']));?></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
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
                    <h5><i><?php echo $_SESSION['apodo']; ?></i></h5>
                    <form action="comEvento.php" method="post" name="datos">
                        <input type="hidden" name="idEvento" value="<?php echo $idEvento ?>" />
                        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>" />
                        <p class="your-para">Titulo:</p>
                        <input type="text" required="required" name="titulo" />	                	
                        <p class="your-para">Comentario:</p>
                        <textarea name="descripcion" required="required" ></textarea>
                        <input type="submit" value="Enviar Comentario" />
                    </form>
                </div>	
            <?php endif; ?>
			<div class="clearfix"></div>
            <br />
            <div class="fb-comments" data-href="detalleEvento.php?idEvento=<?php echo $idEvento ?>" data-numposts="5"></div>
		</div>
		<?php include("otrosEventos.php"); ?>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>