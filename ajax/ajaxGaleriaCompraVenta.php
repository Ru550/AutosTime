<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*10;
	$queryHoyNecesito="Select compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.marca, compra_venta.modelo, compra_venta.precio, compra_venta.fecha, count(id_comentario_compra_venta) as cont_comentarios, compra_venta.cont_visitas, foto_compra_venta.ubicacion_foto From compra_venta Left Join comentario_compra_venta On compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta Left Join foto_compra_venta On compra_venta.id_compra_venta = foto_compra_venta.id_compra_venta
Where foto_compra_venta.numero_foto = 1 Group By compra_venta.id_compra_venta Desc Limit ".$load.",10";
	
	$resuls = $conex->consulta($queryHoyNecesito);
	while($rowHoyNecesito = mysqli_fetch_array($resuls)){
?>
			<div class="col-md-6 top-text">
                <div class="single-middle">
                    <h5 class="top"><a href="single.html"><?php echo $rowHoyNecesito['titulo'];?></a></h5>
                    <a href="single.html"><img src="<?php echo $rowHoyNecesito['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                    <p><?php echo $rowHoyNecesito['resumen'];?>...</p>
                    <p>Fecha de Evento: <?php echo $rowHoyNecesito['fecha'];?>
                        <span class="glyphicon glyphicon-comment"></span><?php echo $rowHoyNecesito['cont_comentarios'];?>
                        <span class="glyphicon glyphicon-eye-open"></span><?php echo $rowHoyNecesito['cont_visitas'];?>
                        <a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                    </p>
                </div>
            </div>
<?php
	}
?>