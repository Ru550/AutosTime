<?php
	$idNoticia=$_GET['idNoticia'];
	$queHacer = "Comentario";

	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryContVisitas="Update noticia SET cont_visitas=cont_visitas+1 where id_noticia = $idNoticia";
	$conex->consulta($qryContVisitas);

	$qryNoticia="SELECT noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.descripcion, noticia.fecha, COUNT(id_comentario_noticia) AS cont_comentarios, noticia.cont_visitas, noticia.url_facebook, noticia.url_twitter FROM noticia LEFT JOIN comentario_noticia ON noticia.id_noticia = comentario_noticia.id_noticia WHERE noticia.id_noticia = $idNoticia";
	
	$qryPrimFoto="SELECT noticia.titulo, foto_noticia.ubicacion_foto FROM noticia LEFT JOIN foto_noticia ON noticia.id_noticia = foto_noticia.id_noticia WHERE noticia.id_noticia = $idNoticia Limit 1";
	
	$qryComentarios="Select comentario_noticia.titulo, comentario_noticia.descripcion, comentario_noticia.fecha, usuario.ubicacion_foto, usuario.apodo From comentario_noticia Inner Join usuario On comentario_noticia.id_usuario = usuario.id_usuario Where id_noticia = $idNoticia Order by id_comentario_noticia Asc";
	
	$qryGaleria="SELECT noticia.id_noticia, foto_noticia.ubicacion_foto FROM noticia LEFT JOIN foto_noticia ON noticia.id_noticia = foto_noticia.id_noticia WHERE noticia.id_noticia = $idNoticia";

	$resultNoticia = $conex->consulta($qryNoticia);
	$resultComentarios = $conex->consulta($qryComentarios);
	//$resultPrimFoto = $conex->consulta($qryPrimFoto);
	$resultsGaleria = $conex->consulta($qryGaleria);
	//$con=$conex->conectar_base_datos();
//	$resultPrimFoto=mysqli_query($con,$qryPrimFoto);
	$resultPrimFoto=$conex->consulta($qryPrimFoto);

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
               <h3 class="title"><?php echo utf8_encode($rowPrimFoto['titulo']);?> <i class="glyphicon glyphicon-file"></i></h3>
               <img src="<?php echo $rowPrimFoto['ubicacion_foto'];?>" class="img-responsive" alt="">           
            <?php
				}
				if(isset($_SESSION['id_tipo_usuario'])){
					if ($_SESSION["id_tipo_usuario"] == 1){ ?>
                    	<br />
						<h5><a href="editaNoticiaP1.php?idNoticia=<?php echo $idNoticia ?> "><b><i>Editar Noticia</i></b></a></h5>
				<?php
					}
				}
              while($rowNoticia = mysqli_fetch_array($resultNoticia)){
            ?>
	            <div class="single">
                    <div class="b-bottom"> 
                            <h5 class="top"><?php echo utf8_encode($rowNoticia['resumen']);?></h5>
                            <p class="sub"><?php echo utf8_encode($rowNoticia['descripcion']);?></p>
                            <p><b>Fecha Publicación: </b><?php echo date("d/m/Y", strtotime($rowNoticia['fecha']));?>
                                 <span class="glyphicon glyphicon-comment"> </span><?php echo $rowNoticia['cont_comentarios'];?>
                                 <span class="glyphicon glyphicon-eye-open"> </span><?php echo $rowNoticia['cont_visitas'];?>
                            </p>
                    </div>
                </div>
			
                <div class="single-bottom">
                    <div class="single-middle">
                        <ul class="social-share">
                            <li><span>Redes Sociales de la noticia: </span></li>
                            <li></li>
                            <li><a href="<?php echo $rowNoticia['url_facebook'];?>" target="_blank"><i> </i></a></li>
                            <li><a href="<?php echo $rowNoticia['url_twitter'];?>" target="_blank"><i class="tin"> </i></a></li>
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
                    <form action="comNoticia.php" method="post" name="datos">
                        <input type="hidden" name="idNoticia" value="<?php echo $idNoticia ?>" >
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
	        <div class="fb-comments" data-href="detalleNoticia.php?idNoticia=<?php echo $idNoticia ?>" data-numposts="5"></div>
		</div>
		<?php include("otrasNoticias.php"); ?>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>