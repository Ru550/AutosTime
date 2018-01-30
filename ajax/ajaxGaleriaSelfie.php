<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	if(!isset($_SESSION['id_tipo_usuario'])){
		session_start();
	}
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*15;
	$query = "SELECT galeria_selfie.id_selfie, galeria_selfie.titulo, galeria_selfie.descripcion, galeria_selfie.ubicacion_foto, galeria_selfie.fecha_alta, COUNT(usuario_votos_selfie.id_selfie) AS cont_votos FROM galeria_selfie  LEFT JOIN usuario_votos_selfie ON galeria_selfie.id_selfie = usuario_votos_selfie.id_selfie GROUP BY usuario_votos_selfie.id_selfie ORDER BY galeria_selfie.id_selfie DESC LIMIT ".$load.",15";
	
	$resuls = $conex->consulta($query);
	while($row = mysqli_fetch_array($resuls)){
?>
    <div class="col-md-4 cate-grid grid">
        <figure>
            <img src="<?php echo $row['ubicacion_foto'];?>" height="260" width="412" alt="">
            <figcaption>
                <h3><?php echo $row['titulo'];?></h3>
                <span><?php echo $row['descripcion'];?></span>
                <a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="Interior Design">VER</a>
                <?php if(isset($_SESSION['id_tipo_usuario'])){
						 if ($_SESSION["id_tipo_usuario"] == 1){ ?>
							<a href="eliminarSelfie.php?idSelfie=<?php echo $row['id_selfie']; ?>" >Eliminar</a>
				<?php 	 } ?>
						 <a href="votarSelfie.php?idSelfie=<?php echo $row['id_selfie']; ?>" >Votar</a>
				<?php }?>
            </figcaption>
        </figure>
     </div>
<?php
	}
?>