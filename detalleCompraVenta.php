<?php
	$idCompraVenta=$_GET['idCompraVenta'];
	$queHacer = "Comentario";

	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryContVisitas="Update compra_venta SET cont_visitas=cont_visitas+1 where id_compra_venta = $idCompraVenta";
	$conex->consulta($qryContVisitas);

	$qryCompraVenta="SELECT compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.descripcion, compra_venta.precio, compra_venta.marca, compra_venta.modelo, compra_venta.kilometraje, compra_venta.transmision, compra_venta.tipo_combustible, compra_venta.fecha, COUNT(id_comentario_compra_venta) AS cont_comentarios, compra_venta.cont_visitas, compra_venta.url_facebook, compra_venta.url_twitter FROM compra_venta LEFT JOIN comentario_compra_venta ON compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta WHERE compra_venta.id_compra_venta = $idCompraVenta";
	
	$qryPrimFoto="SELECT compra_venta.titulo, foto_compra_venta.ubicacion_foto FROM compra_venta LEFT JOIN foto_compra_venta ON compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta WHERE compra_venta.id_compra_venta = $idCompraVenta Limit 1";
	
	$qryComentarios="Select comentario_compra_venta.titulo, comentario_compra_venta.descripcion, comentario_compra_venta.fecha, usuario.ubicacion_foto, usuario.apodo From comentario_compra_venta Inner Join usuario On comentario_compra_venta.id_usuario = usuario.id_usuario Where id_compra_venta = $idCompraVenta Order by id_comentario_compra_venta Asc";
	
	$qryPublicoCompraVenta="SELECT usuario.id_usuario, usuario.apodo, usuario.ubicacion_foto FROM usuario_compra_venta INNER JOIN usuario ON usuario_compra_venta.id_usuario = usuario.id_usuario WHERE usuario_compra_venta.id_compra_venta = $idCompraVenta";
	
	$qryGaleria="SELECT compra_venta.id_compra_venta, foto_compra_venta.ubicacion_foto FROM compra_venta LEFT JOIN foto_compra_venta ON compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta WHERE compra_venta.id_compra_venta = $idCompraVenta";

	$resultCompraVenta =$conex->consulta($qryCompraVenta);
	$resultComentarios =$conex->consulta($qryComentarios);
	$resultPrimFoto =$conex->consulta($qryPrimFoto);
	$resultPublicoCompraVenta =$conex->consulta($qryPublicoCompraVenta);
	$resultsGaleria =$conex->consulta($qryGaleria);

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
				while($rowPublico = mysqli_fetch_array($resultPublicoCompraVenta)){
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
            			<h5><a href="editaCompraVentaP1.php?idCompraVenta=<?php echo $idCompraVenta ?> "><b><i>Editar Mi Compra/Venta</i></b></a></h5>			
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
				while($rowCompraVenta = mysqli_fetch_array($resultCompraVenta)){
			?>
	            <div class="single">
                    <div class="b-bottom"> 
	                    <p class="sub"><b>Precio:</b> <?php echo utf8_encode($rowCompraVenta['precio']);?></p>
						<p class="sub"><b>Marca:</b> <?php echo utf8_encode($rowCompraVenta['marca']);?></p>
                        <p class="sub"><b>Modelo:</b> <?php echo utf8_encode($rowCompraVenta['modelo']);?></p>
                        <p class="sub"><b>Kilometraje:</b> <?php echo utf8_encode($rowCompraVenta['kilometraje']);?></p>
                        <p class="sub"><b>Transmisión:</b> <?php echo utf8_encode($rowCompraVenta['transmision']);?></p>
                        <p class="sub"><b>Tipo de Combustible:</b> <?php echo utf8_encode($rowCompraVenta['tipo_combustible']);?></p>
                        <p class="sub"><b>Descripción:</b> <?php echo utf8_encode($rowCompraVenta['descripcion']);?></p>
                        <p><b>Fecha de Publicación:</b> <br /><?php echo date("d/m/Y", strtotime($rowCompraVenta['fecha']));?>
                             <span class="glyphicon glyphicon-comment"></span> <?php echo $rowCompraVenta['cont_comentarios'];?>
                             <span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowCompraVenta['cont_visitas'];?>
                        </p>
                    </div>
                </div>
			<?php 
				if(!empty($rowCompraVenta['url_facebook']) || !empty($rowCompraVenta['url_twitter'])){
			?>
			<div class="single-bottom">
				<div class="single-middle">
					<ul class="social-share">
						<li><span><b>Redes Sociales de la Compra/Venta: </b></span></li>
                        <li></li>
						<?php if(!empty($rowCompraVenta['url_facebook'])){ ?>
							<li><a href="<?php echo $rowCompraVenta['url_facebook'];?>" target="_blank"><i> </i></a></li>						
						<?php } if(!empty($rowCompraVenta['url_twitter'])){ ?>	
							<li><a href="<?php echo $rowCompraVenta['url_twitter'];?>" target="_blank"><i class="tin"> </i></a></li>				
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
                            <h5><?php echo utf8_encode($rowComentario['apodo']);?></h5>
                        </div>
                        <div class="media-body response-text-right">
                            <p><h5><?php echo utf8_encode($rowComentario['titulo']);?></h5></p>
                            <p><?php echo utf8_encode($rowComentario['descripcion']);?></p>
                            <ul>
                                <li><?php echo date("d/m/Y g:i:s A", strtotime($rowComentario['fecha']));?></li>
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
                    <form action="comCompraVenta.php" method="post" name="datos">
                        <input type="hidden" name="idCompraVenta" value="<?php echo $idCompraVenta ?>" >
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
            <div class="fb-comments" data-href="detalleCompraVenta.php?idCompraVenta=<?php echo $idCompraVenta ?>" data-numposts="5"></div>
		</div>
		<?php include("otrasCompraVenta.php"); ?>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>