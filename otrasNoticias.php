<?php
	$idNoticia=$_GET['idNoticia'];
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );

	$qryPrimNoticia="Select noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.fecha, count(id_comentario_noticia) as cont_comentarios, noticia.cont_visitas, foto_noticia.ubicacion_foto From noticia left Join comentario_noticia on noticia.id_noticia = comentario_noticia.id_noticia left Join foto_noticia on noticia.id_noticia = foto_noticia.id_noticia where foto_noticia.numero_foto = 1 And noticia.id_noticia != $idNoticia group by noticia.id_noticia Order By noticia.id_noticia Desc Limit 1 ";
	$qryNoticias="Select noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.fecha, count(id_comentario_noticia) as cont_comentarios, noticia.cont_visitas, foto_noticia.ubicacion_foto From noticia left Join comentario_noticia on noticia.id_noticia = comentario_noticia.id_noticia left Join foto_noticia on noticia.id_noticia = foto_noticia.id_noticia where foto_noticia.numero_foto = 1 And noticia.id_noticia != $idNoticia group by noticia.id_noticia Order By noticia.id_noticia Desc Limit 1,5";
	$qrySelfie="SELECT galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, COUNT(usuario_votos_selfie.id_selfie) as votos FROM galeria_selfie  LEFT JOIN usuario_votos_selfie ON galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie GROUP BY galeria_selfie.id_selfie DESC LIMIT 1;";
	$qryHumor="SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT 1";
									
	$resultsPrimNoticia = $conex->consulta($qryPrimNoticia);
	$resultsNoticias = $conex->consulta($qryNoticias);
	$resultsSelfie = $conex->consulta($qrySelfie);
	$resultsHumor = $conex->consulta($qryHumor);
?>
<div class="banner-right-text">
	<h3 class="tittle">Noticias <i class="glyphicon glyphicon-bullhorn"></i></h3>
	<div class="general-news">
		<div class="general-inner">
			<div class="general-text">
				<?php
					while($rowPrimNoticia = mysqli_fetch_array($resultsPrimNoticia)){
				?>
					<a href="detalleNoticia.php?idNoticia=<?php echo $rowPrimNoticia['id_noticia'];?>"><img src="<?php echo $rowPrimNoticia['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
					<h5 class="top"><a href="detalleNoticia.php?idNoticia=<?php echo $rowPrimNoticia['id_noticia'];?>"><?php echo $rowPrimNoticia['titulo'];?></a></h5>
					<p><?php echo $rowPrimNoticia['resumen'];?> ...</p>
					<p><?php echo date("d/m/Y", strtotime($rowPrimNoticia['fecha'])); ?> <span class="glyphicon glyphicon-comment"> </span><?php echo $rowPrimNoticia['cont_comentarios'];?> <span class="glyphicon glyphicon-eye-open"></span>
					   <?php echo $rowPrimNoticia['cont_visitas'];?><a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowPrimNoticia['id_noticia'];?>"> <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
					</p>
				<?php
					}
				 ?>
			</div>
			<div class="edit-pics">
				<?php
					while($rowNoticias = mysqli_fetch_array($resultsNoticias)){
				?>
					<div class="editor-pics">
						<div class="col-md-3 item-pic">
							<img src="<?php echo $rowNoticias['ubicacion_foto'];?>" class="img-responsive" alt="">
						</div>
						<div class="col-md-9 item-details">
							<h5 class="inner two"><a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"><?php echo $rowNoticias['titulo'];?></a></h5>
							 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i> <?php echo date("d/m/Y", strtotime($rowNoticias['fecha']));?> <span class="glyphicon glyphicon-comment"></span> <?php echo $rowNoticias['cont_comentarios'];?> <i class="glyphicon glyphicon-eye-open"></i> <?php echo $rowNoticias['cont_visitas'];?> <a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"> <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div>
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
                    <p><?php echo date("d/m/Y", strtotime($rowNoticias['fecha_alta']));?>
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