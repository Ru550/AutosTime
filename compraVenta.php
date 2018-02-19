<?php
	require_once("conexion/require_once.php");
	$queHacer = "Compra/Venta";
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$queryGaleria="Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.marca, compra_venta.modelo, compra_venta.precio, compra_venta.fecha, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto From compra_venta Left Join comentario_compra_venta On compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta Left Join foto_compra_venta On compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta
Where foto_compra_venta.numero_foto > 0 Group By compra_venta.id_compra_venta Desc Limit 10";
	$queryContador = "select count(id_compra_venta) as total From compra_venta";

	$resultsGaleria =$conex->consulta($queryGaleria);
	$resultsContador =$conex->consulta($queryContador);
/*	$resultsGaleria = mysql_query($queryGaleria);
	$resultsContador = mysql_query($queryContador);*/
	
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
				<h3 class="tittle">Zona COMPRA / VENTA <i class="glyphicon glyphicon-picture"></i></h3>
				 <div class="banner">
                    <h5 class="top" align="center">Esta zona cuenta con los vehiculos promocionados por ustedes mismos.</h5>
                    <h5 class="top" align="center">AutosTime no se hace responsable de ninguno.</h5>
					<br />
                </div>
                <?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
	            ?>
				<a href="agregaCompraVentaP1.php"> <img width="65" height="55" src="images/imgGenerales/agregar.png" /></a>
                <?php endif;?>
                <div class="images">
					<?php
                        while($rowCompraVenta = mysqli_fetch_array($resultsGaleria)){
                    ?>
                         <div class="col-md-4 top-text">
                            <div class="single-middle">
                                <h5 class="top"><a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><?php echo utf8_encode($rowCompraVenta['titulo']);?></a></h5>
                                <a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><img src="<?php echo $rowCompraVenta['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                                <p><b>Precio: </b><?php echo utf8_encode($rowCompraVenta['precio']);?></p>
                                <p><b>Marca: </b><?php echo utf8_encode($rowCompraVenta['marca']);?></p>
                                <p><b>Modelo: </b><?php echo $rowCompraVenta['modelo'];?></p>
                                <p><?php echo utf8_encode($rowCompraVenta['resumen']);?>...</p>
                                <p><b>Fecha Publicación: </b><?php echo $rowCompraVenta['fecha'];?><br />
                                    <span class="glyphicon glyphicon-comment"></span> 
									<?php 
										$idCompraVentap = $rowCompraVenta['id_compra_venta'];
										$queryComentarios = "select count(id_comentario_compra_venta) as cont_comentarios from comentario_compra_venta where id_compra_venta = $idCompraVentap";
										$resultsComentarios = $conex->consulta($queryComentarios); 
										$rowComentarios = mysqli_fetch_array($resultsComentarios); 
										echo $rowComentarios['cont_comentarios'];
									?>
                                    <span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowCompraVenta['cont_visitas'];?>
                                    <a class="span_link" href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
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
						$.post("ajax/ajaxGaleriaCompraVenta.php",{load:load},function(data){
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