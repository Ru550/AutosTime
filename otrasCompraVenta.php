<?php
	$idCompraVenta=$_GET['idCompraVenta'];
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryPrimCompraVenta="Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.fecha, count(id_comentario_compra_venta) as cont_comentarios, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto From compra_venta left Join comentario_compra_venta on compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta left Join foto_compra_venta on compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta where foto_compra_venta.numero_foto = 1 And compra_venta.id_compra_venta != $idCompraVenta group by compra_venta.id_compra_venta Order By compra_venta.id_compra_venta Desc Limit 1 ";
	$qryCompraVenta="Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.fecha, count(id_comentario_compra_venta) as cont_comentarios, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto From compra_venta left Join comentario_compra_venta on compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta left Join foto_compra_venta on compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta where foto_compra_venta.numero_foto = 1 And compra_venta.id_compra_venta != $idCompraVenta group by compra_venta.id_compra_venta Order By compra_venta.id_compra_venta Desc Limit 1,5";
	$qrySelfie="SELECT galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, COUNT(usuario_votos_selfie.id_selfie) as votos FROM galeria_selfie  LEFT JOIN usuario_votos_selfie ON galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie GROUP BY galeria_selfie.id_selfie DESC LIMIT 1;";
	$qryHumor="SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT 1";
									
	$resultsPrimCompraVenta = $conex->consulta($qryPrimCompraVenta);
	$resultsCompraVenta = $conex->consulta($qryCompraVenta);
	$resultsSelfie = $conex->consulta($qrySelfie);
	$resultsHumor = $conex->consulta($qryHumor);
?>
<div class="banner-right-text">
	<h3 class="tittle">Compra/Venta <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				<?php
					while($rowPrimCompraVenta = mysqli_fetch_array($resultsPrimCompraVenta)){
				?>
					<a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowPrimCompraVenta['id_compra_venta'];?>"><img src="<?php echo $rowPrimCompraVenta['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowPrimCompraVenta['id_compra_venta'];?>"><?php echo utf8_encode($rowPrimCompraVenta['titulo']);?></a></h5>
					<p><?php echo utf8_encode($rowPrimCompraVenta['resumen']);?> ...</p>
					<p><?php echo date("d/m/Y", strtotime($rowPrimCompraVenta['fecha'])); ?><span class="glyphicon glyphicon-comment"></span><?php echo $rowPrimCompraVenta['cont_comentarios'];?> <span class="glyphicon glyphicon-eye-open"></span>
					   <?php echo $rowPrimCompraVenta['cont_visitas'];?><a class="span_link" href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowPrimCompraVenta['id_compra_venta'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				<?php
					}
				 ?>
			</div>
			<div class="edit-pics">
				<?php
					while($rowCompraVenta = mysqli_fetch_array($resultsCompraVenta)){
				?>
					<div class="editor-pics">
						<div class="col-md-3 item-pic">
							<img src="<?php echo $rowCompraVenta['ubicacion_foto'];?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a class="span_link" href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><?php echo utf8_encode($rowCompraVenta['titulo']);?></a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo date("d/m/Y", strtotime($rowCompraVenta['fecha']));?><span class="glyphicon glyphicon-comment"></span><?php echo $rowCompraVenta['cont_comentarios'];?><i class="glyphicon glyphicon-eye-open"></i><?php echo $rowCompraVenta['cont_visitas'];?><a class="span_link" href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
						 </div>
						<div class="clearfix"></div>
					</div>
				<?php
					}
				 ?>
			</div>
            <br />
			<div class="general-text two">
            	<h3 class="tittle">Selfie In Car <i class="glyphicon glyphicon-picture"></i></h3>
                <?php
					while($rowSelfie = mysqli_fetch_array($resultsSelfie)){
				?>
                    <a href="selfies.php"><img src="<?php echo $rowSelfie['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                    <h5 class="top"><a href="selfies.php">Ver Galeria de Selfies</a></h5>
                    <p><?php echo utf8_encode($rowSelfie['titulo']);?></p>
                    <p><?php echo date("d/m/Y", strtotime($rowCompraVenta['fecha_alta']));?>
                        <span class="glyphicon glyphicon-thumbs-up"></span><?php echo $rowSelfie['votos'];?>
                        <a class="span_link" href="selfies.php">
                        <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    </p>
                <?php
					}
				 ?>
			</div>
		</div>
        <br />
        <div class="general-text two">
            <h3 class="tittle">Humor <i class="glyphicon glyphicon-picture"></i></h3>
            <?php
                while($rowHumor = mysqli_fetch_array($resultsHumor)){
            ?>
                <a href="humor.php"><img src="<?php echo $rowHumor['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                <h5 class="top"><a href="humor.php">Ver Galeria de Humor</a></h5>
                <p><?php echo utf8_encode($rowHumor['titulo']);?> ...</p>
                <p><?php echo date("d/m/Y", strtotime($rowHumor['fecha_alta']));?>
                </p>
             <?php
                }
             ?>
        </div>
	</div>	
</div>