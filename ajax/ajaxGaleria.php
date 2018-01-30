<?php
	require_once("../conexion/Conection.php");
	require_once("../conexion/conexion_vars.php");
	if(!isset($_SESSION['id_tipo_usuario'])){
		session_start();
	}	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$load = htmlentities(strip_tags($_POST['load']))*10;
	$query = "select galeria_fotos.id_galeria_fotos, galeria_fotos.titulo, galeria_fotos.descripcion, galeria_fotos.ubicacion_foto, count(usuario_votos_galeria_fotos.id_galeria_fotos) as cont_votos From galeria_fotos Join usuario_votos_galeria_fotos On galeria_fotos.id_galeria_fotos = usuario_votos_galeria_fotos.id_galeria_fotos where galeria_fotos.fecha_alta between LAST_DAY(curdate() - INTERVAL 1 MONTH) + INTERVAL 1 DAY and LAST_DAY(curdate()) Group By usuario_votos_galeria_fotos.id_galeria_fotos Order By cont_votos Desc Limit ".$load.",10";
	
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
							<a href="eliminarFotoGaleria.php?idGaleriaFoto=<?php echo $row['id_galeria_fotos']; ?>" >Eliminar</a>
				<?php 	} ?>
							<a href="votarFotoGaleria.php?idGaleriaFoto=<?php echo $row['id_galeria_fotos']; ?>" >Votar</a>
				  <?php 
					 } ?>
            </figcaption>
        </figure>
     </div>
<?php
	}
?>