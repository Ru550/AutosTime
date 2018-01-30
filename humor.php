<?php
	require_once("conexion/require_once.php");
	$queHacer = "imagen de Humor";
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$queryGaleria="SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT 0,15";
	$queryContador = "select count(id_humor) as total From galeria_humor";

	$resultsGaleria =$conex->consulta($queryGaleria);
	$resultsContador =$conex->consulta($queryContador);
/*	$resultsGaleria = mysql_query($queryGaleria);
	$resultsContador = mysql_query($queryContador);*/
	
	while($row = mysqli_fetch_array($resultsContador)){
			$nbr = $row['total'];		
	}
	foreach($_POST as $i => $v){
	}
	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">
				<h3 class="tittle">Galeria de HUMOR <i class="glyphicon glyphicon-fullscreen"></i></h3>
                <?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
	            ?>
                <form action="enviarHumor.php" method="post"  class="contact_form" enctype="multipart/form-data" name="selfie">
                	<table align="left" >
                    	<tr>
                        	<td align="center" colspan="2">
                            	<h5 class="top" align="center">Tienes imágenes que pueden ser parte de esta galería.</h5>
				                <h5 class="top" align="center">Agrega tu imágen.</h5>
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
                                    <input type="text" class="text" name="titulo"  maxlength="10" required="required" />
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    Descripción:
                                </td>
                                <td align="left">
                                    <input type="text" class="text" name="descripcion"  maxlength="30" required="required" />
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
                <br />
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
										<a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="Interior Design">VER</a>
                                        <?php if(isset($_SESSION['id_tipo_usuario'])){
												 if ($_SESSION["id_tipo_usuario"] == 1){ ?>
			                                        <a href="eliminarHumor.php?idHumor=<?php echo $row['id_humor']; ?>" >Eliminar</a>
                                        <?php } } ?>
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
					if(load * 15 > nbr)
					{
						$('.messages').text("Has llegado al fin.");
						$('.loader').hide();
					}else{
						$.post("ajax/ajaxGaleriaHumor.php",{load:load},function(data){
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