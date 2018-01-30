<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	
	if(!isset($_SESSION['id_tipo_usuario'])){
		session_start();
	}
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*15;
	$query = "SELECT id_humor, titulo, descripcion, ubicacion_foto, fecha_alta FROM galeria_humor ORDER BY id_humor DESC LIMIT ".$load.",15";
	
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
							<a href="eliminarHumor.php?idHumor=<?php echo $row['id_humor']; ?>" >Eliminar</a>
				<?php } } ?>
            </figcaption>
        </figure>
     </div>
<?php
	}
?>