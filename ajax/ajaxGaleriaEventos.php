<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*10;
	$query = "Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios, evento.cont_visitas, foto_evento.ubicacion_foto From evento Left Join comentario_evento On evento.id_evento = comentario_evento.id_evento Left Join foto_evento On evento.id_evento = foto_evento.id_evento Group By evento.id_evento Order By evento.id_evento Desc Limit ".$load.",10";

	$resuls = $conex->consulta($query);
	while($rowEvento = mysqli_fetch_array($resuls)){
?>
    <div class="col-md-6 top-text">
        <div class="single-middle">
            <h5 class="top"><a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>"><?php echo utf8_encode($rowEvento['titulo']);?></a></h5>
            <a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>">
                <img width="50" height="50" src="<?php echo $rowEvento['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
            <p><?php echo utf8_encode($rowEvento['resumen']);?>...</p>
            <p>Fecha de Evento: <?php echo $rowEvento['fecha'];?>
                <span class="glyphicon glyphicon-comment"></span><?php echo utf8_encode($rowEvento['cont_comentarios']);?>
                <span class="glyphicon glyphicon-eye-open"></span><?php echo $rowEvento['cont_visitas'];?>
                <a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>">
                <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
            </p>       
		</div>
	</div>
<?php
	}
?>