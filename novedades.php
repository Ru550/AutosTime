<?php
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );

	$qryEventos="Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios, evento.cont_visitas, foto_evento.ubicacion_foto From evento Left Join comentario_evento On evento.id_evento = comentario_evento.id_evento Left Join foto_evento On evento.id_evento = foto_evento.id_evento Where foto_evento.numero_foto = 1 And foto_evento.numero_foto = 1 And evento.fecha >= curdate() Group By evento.id_evento Order By evento.id_evento Desc Limit 2 ";
									
	$qryHoyNecesito="Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios, hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto From hoy_necesito Left Join comentario_hoy_necesito On hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito Left Join foto_hoy_necesito On hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito Where foto_hoy_necesito.numero_foto = 1 Group By hoy_necesito.id_hoy_necesito Desc Limit 2 ";
									
	$qryCompraVenta="Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.marca, compra_venta.modelo, compra_venta.precio, compra_venta.fecha, count(id_comentario_compra_venta) as cont_comentarios, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto From compra_venta Left Join comentario_compra_venta On compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta Left Join foto_compra_venta On compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta Where foto_compra_venta.numero_foto = 1 And compra_venta.id_estatus = 1 Group By compra_venta.id_compra_venta Desc Limit 2 ";
										
	$resultsEventos =$conex->consulta($qryEventos);
	$resultsHoyNecesito = 	$conex->consulta($qryHoyNecesito);
	$resultsCompraVenta = 	$conex->consulta($qryCompraVenta);
/*	$resultsEventos = mysql_query($qryEventos);
	$resultsHoyNecesito = mysql_query($qryHoyNecesito);
	$resultsCompraVenta = mysql_query($qryCompraVenta);									*/
?>

<div class="top-news">
	<div class="top-inner">
		<h3 class="top"><a href="eventos.php">Eventos</a></h3>
			<?php
				while($rowEvento = mysqli_fetch_array($resultsEventos)){
			?>
				<div class="col-md-6 top-text">
                    <a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>"><img src="<?php echo $rowEvento['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>"><?php echo utf8_encode($rowEvento['titulo']);?></a></h5>
					<p><?php echo utf8_encode($rowEvento['resumen']);?>...</p>
					<p><b>Fecha de Evento: </b><?php echo date("d/m/Y", strtotime($rowEvento['fecha']));?><br />
                    	<span class="glyphicon glyphicon-comment"></span> <?php echo $rowEvento['cont_comentarios'];?>
						<span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowEvento['cont_visitas'];?>
                        <a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    </p>
				</div>
			<?php
				}
			 ?>	
		 <div class="clearfix"> </div>
	 </div>
	 <br />
	 <div class="top-inner second">
		<h3 class="top"><a href="hoyNecesito.php">Hoy Necesito</a></h3>
			<?php
				while($rowHoyNecesito = mysqli_fetch_array($resultsHoyNecesito)){
			?>
				<div class="col-md-6 top-text">
					<a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><img src="<?php echo $rowHoyNecesito['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><?php echo utf8_encode($rowHoyNecesito['titulo']);?></a></h5>
					<p><?php echo utf8_encode($rowHoyNecesito['resumen']);?>...</p>
					<p><b>Fecha Publicación: </b><?php echo date("d/m/Y", strtotime($rowHoyNecesito['fecha']));?><br /> <span class="glyphicon glyphicon-comment"></span>
						<?php echo $rowHoyNecesito['cont_comentarios'];?>
						<span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowHoyNecesito['cont_visitas'];?>
                        <a class="span_link" href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    </p>
				</div>
			<?php
				}
			 ?>
		 <div class="clearfix"> </div>
	 </div>
	 <br />
	 <div class="top-inner second">
		<h3 class="top"><a href="compraVenta.php">Compra/Venta</a></h3>
			<?php
				while($rowCompraVenta = mysqli_fetch_array($resultsCompraVenta)){
			?>
				<div class="col-md-6 top-text">
					<a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><img src="<?php echo $rowCompraVenta['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><?php echo utf8_encode($rowCompraVenta['titulo']);?></a></h5>
					<p><b>Marca: </b><?php echo utf8_encode($rowCompraVenta['marca']);?> <br />
                       <b>Modelo: </b><?php echo $rowCompraVenta['modelo'];?> <br />
                       <b>Precio: </b><?php echo utf8_encode($rowCompraVenta['precio']);?> <br />
                    </p>
					<p><?php echo utf8_encode($rowCompraVenta['resumen']);?>...</p>
					<p><b>Fecha Publicación: </b><?php echo date("d/m/Y", strtotime($rowCompraVenta['fecha']));?><br />
                    	<span class="glyphicon glyphicon-comment"></span> <?php echo $rowCompraVenta['cont_comentarios'];?>
						<span class="glyphicon glyphicon-eye-open"></span> <?php echo $rowCompraVenta['cont_visitas'];?>
                    	<a class="span_link" href="detalleCompraVenta.php?idCompraVenta=<?php echo $rowCompraVenta['id_compra_venta'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    </p>
				</div>
			<?php
				}
			 ?>
		 <div class="clearfix"> </div>
	 </div>
</div>