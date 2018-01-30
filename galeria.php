<?php
	require_once("conexion/require_once.php");
	$queHacer = "imagen a la Galeria";
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$queryGaleria="select galeria_fotos.id_galeria_fotos, galeria_fotos.titulo, galeria_fotos.descripcion, galeria_fotos.ubicacion_foto, count(usuario_votos_galeria_fotos.id_galeria_fotos) as cont_votos From galeria_fotos Left Join usuario_votos_galeria_fotos On galeria_fotos.id_galeria_fotos = usuario_votos_galeria_fotos.id_galeria_fotos where galeria_fotos.fecha_alta between LAST_DAY(curdate() - INTERVAL 1 MONTH) + INTERVAL 1 DAY and LAST_DAY(curdate()) Group By usuario_votos_galeria_fotos.id_galeria_fotos Order By galeria_fotos.fecha_alta Desc Limit 0,10";
	$queryContador = "select count(galeria_fotos.id_galeria_fotos) as total From galeria_fotos Join usuario_votos_galeria_fotos On galeria_fotos.id_galeria_fotos = usuario_votos_galeria_fotos.id_galeria_fotos where galeria_fotos.fecha_alta between LAST_DAY(curdate() - INTERVAL 1 MONTH) + INTERVAL 1 DAY and LAST_DAY(curdate()) Group By usuario_votos_galeria_fotos.id_galeria_fotos ";

/*	$resultsGaleria = mysql_query($queryGaleria);
	$resultsContador = mysql_query($queryContador);*/
	$resultsGaleria =$conex->consulta($queryGaleria);
	$resultsContador =$conex->consulta($queryContador);
	
	while($row = mysqli_fetch_array($resultsContador)){
			$nbr = $row['total'];
	}

	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">
				<h3 class="tittle">Galeria <i class="glyphicon glyphicon-fullscreen"></i></h3>
                <?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
	            ?>
                <form action="enviarGaleria.php" method="post"  class="contact_form" enctype="multipart/form-data" name="galery">
                	<table align="left" >
                    	<tr>
                        	<td align="center" colspan="2">
                            	<h5 class="top" align="center">Quieres participar en esta Galería.</h5>
				                <h5 class="top" align="center">Agrega tu imágen. La única regla es que debe contener algún auto.</h5>
                            </td>
                            <tr>
                                <td colspan="2">
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Titulo:
                                </td>
                                <td align="left">
                                    <input type="text" class="text" name="titulo"  maxlength="20" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Descripción:
                                </td>
                                <td align="left">
                                    <input type="text" class="text" name="descripcion"  maxlength="50" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <br />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <input type="file" name="imagen" id="imagen" required="required"/> 
                                </td>
                            </tr>
                            <td align="right" colspan="2">
                                <div class="sign-up" align="left">
                                    <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                    <input type="submit" value=" Enviar Imagen " />
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php endif;?>
				<div class="categorie-grids cs-style-1">
					<div class='images'>
						<?php
							while($row = mysqli_fetch_array($resultsGaleria)){
						?>
							 <div class="col-md-4 cate-grid grid">
								<figure>
									<img src="<?php echo $row['ubicacion_foto'];?>" height="260" width="412" alt="">
									<figcaption>
										<h3><?php echo $row['titulo'];?></h3>
										<span><?php echo $row['descripcion'];?></span>
										<span>Votos: <?php echo $row['cont_votos'];?></span>
										<a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="Interior Design">VER</a>
                                        <?php if(isset($_SESSION['id_tipo_usuario'])){
												 if ($_SESSION["id_tipo_usuario"] == 1){ ?>
													<a href="eliminarFotoGaleria.php?idGaleriaFoto=<?php echo $row['id_galeria_fotos']; ?>" >Eliminar</a>
										<?php 	} ?>
													<a href="votarFotoGaleria.php?idGaleriaFoto=<?php echo $row['id_galeria_fotos']; ?>" >Votar</a>
										  <?php 
											 } ?>
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
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
	
	<!--INICIA RECARGA DE IMAGENES-->
	<div class='loader'>
		<img src="images/imgGenerales/loading.gif" />
	</div>
	<div class='messages'>
	</div>
	<script src="js/jquery.js"></script>	
	<script>
		$(document).ready(function(){
			$('.loader').hide();
			var load=0;
			var nbr = "<?php echo $nbr; ?>;"
			$(window).scroll(function(){
				if($(window).scrollTop()==$(document).height()-$(window).height())
				{
					$('.loader').show();
					load++;
					if(load * 10 > nbr)
					{
						$('.messages').text("Has llegado al fin.");
						$('.loader').hide();
					}else{
						$.post("ajax/ajaxGaleria.php",{load:load},function(data){
							$('.images').append(data);
							$(".loader").hide();
						});
					}
				}
			});
		});
	</script>
	<!-- TERMINA RECARGA DE IMAGENES-->
<?php include("fin.php"); ?>