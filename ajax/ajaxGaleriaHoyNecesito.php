<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*10;
	$queryHoyNecesito="Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios, hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto From hoy_necesito Left Join comentario_hoy_necesito On hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito Left Join foto_hoy_necesito On hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito Group By hoy_necesito.id_hoy_necesito Desc Limit ".$load.",10";
	
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