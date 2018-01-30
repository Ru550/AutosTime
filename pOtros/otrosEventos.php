<?php
	$idEvento=$_GET['idEvento'];
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryPrimEvento="Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios, evento.cont_visitas, foto_evento.ubicacion_foto From evento left Join comentario_evento on evento.id_evento = comentario_evento.id_evento left Join foto_evento on evento.id_evento = foto_evento.id_evento where foto_evento.numero_foto = 1 And evento.id_evento != $idEvento And evento.fecha >= curdate() group by evento.id_evento Order By evento.fecha Asc Limit 1 ";
	$qryEventos="Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios, evento.cont_visitas, foto_evento.ubicacion_foto From evento left Join comentario_evento on evento.id_evento = comentario_evento.id_evento left Join foto_evento on evento.id_evento = foto_evento.id_evento where foto_evento.numero_foto = 1 And evento.id_evento != $idEvento And evento.fecha >= curdate() group by evento.id_evento Order By evento.fecha Asc Limit 1,5";
	$qrySelfie="SELECT galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, COUNT(usuario_votos_selfie.id_selfie) as votos FROM galeria_selfie  LEFT JOIN usuario_votos_selfie ON galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie GROUP BY galeria_selfie.id_selfie DESC LIMIT 1;";
	$qryHumor="SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT 1";
									
	$resultsPrimEvento = $conex->consulta($qryPrimEvento);
	$resultsEventos = $conex->consulta($qryEventos);
	$resultsSelfie = $conex->consulta($qrySelfie);
	$resultsHumor = $conex->consulta($qryHumor);
?>
<div class="banner-right-text">
	<h3 class="tittle">Mas Cercanos <i class="glyphicon glyphicon-facetime-video"></i></h3>
	<div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				<?php
					while($rowPrimEvento = mysqli_fetch_array($resultsPrimEvento)){
				?>
					<a href="detalleEvento.php?idEvento=<?php echo $rowPrimEvento['id_evento'];?>"><img src="<?php echo $rowPrimEvento['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleEvento.php?idEvento=<?php echo $rowPrimEvento['id_evento'];?>"><?php echo utf8_encode($rowPrimEvento['titulo']);?></a></h5>
					<p><?php echo utf8_encode($rowPrimEvento['resumen']);?> ...</p>
					<p><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowPrimEvento['fecha'])); ?><span class="glyphicon glyphicon-comment"></span><?php echo $rowPrimEvento['cont_comentarios'];?> <span class="glyphicon glyphicon-eye-open"></span>
					   <?php echo $rowPrimEvento['cont_visitas'];?><a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowPrimEvento['id_evento'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				<?php
					}
				 ?>
			</div>
			<div class="edit-pics">
				<?php
					while($rowEventos = mysqli_fetch_array($resultsEventos)){
				?>
					<div class="editor-pics">
						<div class="col-md-3 item-pic">
							<img src="<?php echo $rowEventos['ubicacion_foto'];?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowEventos['id_evento'];?>"><?php echo utf8_encode($rowEventos['titulo']);?></a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowEventos['fecha']));?> <span class="glyphicon glyphicon-comment"></span> <?php echo $rowEventos['cont_comentarios'];?> <i class="glyphicon glyphicon-eye-open"></i> <?php echo $rowEventos['cont_visitas'];?><a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowEventos['id_evento'];?>"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
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
                    <p><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowEventos['fecha_alta']));?>
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
                    <p><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowHumor['fecha_alta']));?>
                    </p>
                 <?php
					}
				 ?>
			</div>
		 
	</div>	
</div>