<?php
	$idHoyNecesito=$_GET['idHoyNecesito'];
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryPrimHoyNecesito="Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios, hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto From hoy_necesito left Join comentario_hoy_necesito on hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito left Join foto_hoy_necesito on hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito where foto_hoy_necesito.numero_foto = 1 And hoy_necesito.id_hoy_necesito != $idHoyNecesito group by hoy_necesito.id_hoy_necesito Order By hoy_necesito.id_hoy_necesito Desc Limit 1 ";
	$qryHoyNecesito="Select hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.fecha, count(id_comentario_hoy_necesito) as cont_comentarios, hoy_necesito.cont_visitas, foto_hoy_necesito.ubicacion_foto From hoy_necesito left Join comentario_hoy_necesito on hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito left Join foto_hoy_necesito on hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito where foto_hoy_necesito.numero_foto = 1 And hoy_necesito.id_hoy_necesito != $idHoyNecesito group by hoy_necesito.id_hoy_necesito Order By hoy_necesito.id_hoy_necesito Desc Limit 1,5";
	$qrySelfie="SELECT galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, COUNT(usuario_votos_selfie.id_selfie) as votos FROM galeria_selfie  LEFT JOIN usuario_votos_selfie ON galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie GROUP BY galeria_selfie.id_selfie DESC LIMIT 1;";
	$qryHumor="SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT 1";
									
	$resultsPrimHoyNecesito = $conex->consulta($qryPrimHoyNecesito);
	$resultsHoyNecesito = $conex->consulta($qryHoyNecesito);
	$resultsSelfie = $conex->consulta($qrySelfie);
	$resultsHumor = $conex->consulta($qryHumor);
?>
<div class="banner-right-text">
	<h3 class="tittle">Hoy Necesito <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				<?php
					while($rowPrimHoyNecesito = mysqli_fetch_array($resultsPrimHoyNecesito)){
				?>
					<a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowPrimHoyNecesito['id_hoy_necesito'];?>"><img src="<?php echo $rowPrimHoyNecesito['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowPrimHoyNecesito['id_hoy_necesito'];?>"><?php echo $rowPrimHoyNecesito['titulo'];?></a></h5>
					<p><?php echo $rowPrimHoyNecesito['resumen'];?> ...</p>
					<p><?php echo date("d/m/Y", strtotime($rowPrimHoyNecesito['fecha'])); ?><span class="glyphicon glyphicon-comment"></span><?php echo $rowPrimHoyNecesito['cont_comentarios'];?> <span class="glyphicon glyphicon-eye-open"></span>
					   <?php echo $rowPrimHoyNecesito['cont_visitas'];?><a class="span_link" href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowPrimHoyNecesito['id_hoy_necesito'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				<?php
					}
				 ?>
			</div>
			<div class="edit-pics">
				<?php
					while($rowHoyNecesito = mysqli_fetch_array($resultsHoyNecesito)){
				?>
					<div class="editor-pics">
						<div class="col-md-3 item-pic">
							<img src="<?php echo $rowHoyNecesito['ubicacion_foto'];?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a class="span_link" href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><?php echo $rowHoyNecesito['titulo'];?></a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i><?php echo date("d/m/Y", strtotime($rowHoyNecesito['fecha']));?><span class="glyphicon glyphicon-comment"></span><?php echo $rowHoyNecesito['cont_comentarios'];?><i class="glyphicon glyphicon-eye-open"></i><?php echo $rowHoyNecesito['cont_visitas'];?><a class="span_link" href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $rowHoyNecesito['id_hoy_necesito'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
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
                    <p><?php echo $rowSelfie['titulo'];?></p>
                    <p><?php echo date("d/m/Y", strtotime($rowHoyNecesito['fecha_alta']));?>
                        <span class="glyphicon glyphicon-thumbs-up"></span><?php echo $rowSelfie['votos'];?>
                        <a class="span_link" href="single.html">
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
                <p><?php echo $rowHumor['titulo'];?> ...</p>
                <p><?php echo date("d/m/Y", strtotime($rowHumor['fecha_alta']));?>
                </p>
             <?php
                }
             ?>
        </div>
	</div>	
</div>