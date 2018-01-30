<?php
	require_once("conexion/require_once.php");
	$queHacer = "Hoy Necesito";
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$queryGaleria="Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios, hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto From hoy_necesito Left Join comentario_hoy_necesito On hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito Left Join foto_hoy_necesito On hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito Where foto_hoy_necesito.numero_foto > 0 Group By hoy_necesito.id_hoy_necesito Desc Limit 0,10";
	$queryContador = "select count(id_hoy_necesito) as total From hoy_necesito";

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
				<h3 class="tittle">Zona HOY NECESITO <i class="glyphicon glyphicon-picture"></i></h3>
				 <div class="banner">
                    <h5 class="top" align="center">Esta zona cuenta con servicios promocionados por ustedes mismos.</h5>
                    <h5 class="top" align="center">AutosTime no se hace responsable de ninguno.</h5>
                </div>
                <?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
	            ?>
				<a href="agregaHoyNecesitoP1.php"> <img width="65" height="55" src="images/imgGenerales/agregar.png" /></a>
                <?php endif;?>
                <div class="images">
					<?php
                        while($rowHoyNecesito = mysqli_fetch_array($resultsGaleria)){
                    ?>
                         <div class="col-md-4 top-text">
                            <div class="single-middle">
                            	<h5 class="top"><a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><?php echo $rowHoyNecesito['titulo'];?></a></h5>
                                <a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><img src="<?php echo $rowHoyNecesito['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                                <p><?php echo $rowHoyNecesito['resumen'];?>...</p>
                                <p><b>Fecha Publicación: </b><?php echo date("d/m/Y", strtotime($rowHoyNecesito['fecha']));?><br />
                                    <span class="glyphicon glyphicon-comment"></span> <?php echo $rowHoyNecesito['cont_comentarios'];?>
                                    <span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowHoyNecesito['cont_visitas'];?>
                                    <a class="span_link" href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                </p>
                            </div>
                        </div>
                    <?php
                        }
                     ?>
                </div>
                <script src="js/lightbox.js"></script>
                <div class="clearfix"></div>
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
						$.post("ajax/ajaxGaleriaHoyNecesito.php",{load:load},function(data){
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