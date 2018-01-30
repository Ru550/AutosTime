<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*10;
	$query = "Select noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.fecha, count(id_comentario_noticia) as cont_comentarios, noticia.cont_visitas, foto_noticia.ubicacion_foto From noticia left Join comentario_noticia on noticia.id_noticia = comentario_noticia.id_noticia left Join foto_noticia on noticia.id_noticia = foto_noticia.id_noticia where foto_noticia.numero_foto = 1 group by noticia.id_noticia Order By noticia.id_noticia Desc Limit ".$load.",10";

	$resuls = $conex->consulta($query);
?>
	<div class="images">
	<?php
        while($rowNoticias = mysqli_fetch_array($resuls)){
    ?>
        <div class="col-md-4 top-text">
            <div class="single-middle">
                <h5 class="top"><a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"><?php echo utf8_encode($rowNoticias['titulo']);?></a></h5>
                <a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"><img src="<?php echo $rowNoticias['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                <p><?php echo utf8_encode($rowNoticias['resumen']);?>...</p>
                <p><b>Fecha de Publicación: </b><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowNoticias['fecha']));?><br /> <span class="glyphicon glyphicon-comment"></span> <?php echo $rowNoticias['cont_comentarios'];?> <i class="glyphicon glyphicon-eye-open"></i> <?php echo $rowNoticias['cont_visitas'];?> <a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"> <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                </p>
            </div>
        </div>
    <?php
        }
    ?>	
    </div>