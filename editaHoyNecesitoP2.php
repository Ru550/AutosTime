<?php
	$idHoyNecesito=$_POST['idHoyNecesito'];
	$primVez=$_POST['primVez'];
	foreach($_POST as $i => $v){
	}
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	if($primVez=='true'){
		
		$titulo=$_POST['titulo'];
		$resumen=$_POST['resumen'];
		$descripcion=$_POST['descripcion'];
		$facebook=$_POST['facebook'];
		$twitter=$_POST['twitter'];
			
		//Convierte las ñ y las vocales con acento
		$titulo = utf8_decode($titulo); 
		$resumen = utf8_decode($resumen);
		$descripcion = utf8_decode($descripcion);
		$facebook = utf8_decode($facebook);
		$twitter = utf8_decode($twitter);
			
		$insertar = $conex->consulta("UPDATE hoy_necesito set titulo='".$titulo."',resumen='".$resumen."',descripcion='".$descripcion."',url_facebook='".$facebook."',url_twitter='".$twitter."' Where id_hoy_necesito = $idHoyNecesito ");
		
		if (!$insertar){
			die("Fallo en la actualizacion del Evento en la Base de Datos: ".mysql_error());
		}
		
		$qryTotalFotos = "SELECT COUNT(id_foto_hoy_necesito) as Total FROM foto_hoy_necesito WHERE id_hoy_necesito =$idHoyNecesito ";
		$resulTotalFotos = $conex->consulta($qryTotalFotos);
		
		while($rowTotal = mysqli_fetch_array($resulTotalFotos)){
			$cont = $rowTotal["Total"];
		}
		
	}else{
		$cont=$_POST['cont'];
	}

	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">	
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">	   
				<div class="clearfix"> </div>
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Edita tu Galeria <i class="glyphicon glyphicon-picture"></i></h3>
                <div >
                	<table>
                    	<tr>
                        	<td>
			                    <h4 class="top" align="center">Aquí podrás agregar o eliminar las imágenes de tu servicio.</h4>
                            </td>
                        </tr>
                        <tr>
                        	<td align="left">
			                    <h5>Indicaciónes:</h5>
                            </td>
                        </tr>
                        <tr>
                        	<td align="left">
			                    Edita las imágenes de tu servicio! Según creas necesario.<br />
			                    Deberás seleccionar una a la vez y presionar el botón "Agregar Imagen" para agregarla a la galería.
                            </td>
                        </tr>
                    </table>
                </div>
                <br />           
               
                
                <?php
					# definimos la carpeta destino
					$carpetaDestino="images/fHoyNecesito/hoyNecesito".$idHoyNecesito."/";
				 
					# si hay algun archivo que subir
					if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]){
				 
						# recorremos todos los arhivos que se han subido
						for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
						{
							# si es un formato de imagen
							if($_FILES["archivo"]["type"][$i]=="image/jpeg" || 
								$_FILES["archivo"]["type"][$i]=="image/pjpeg" || 
								$_FILES["archivo"]["type"][$i]=="image/gif" || 
								$_FILES["archivo"]["type"][$i]=="image/png"){
				 
								# si exsite la carpeta o se ha creado
								if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
								{
									$origen=$_FILES["archivo"]["tmp_name"][$i];
									$destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];

									# movemos el archivo
									if(@move_uploaded_file($origen, $destino))
									{
										# echo "<br>".$_FILES["archivo"]["name"][$i]." movido correctamente";
										?> <img src="images\imgGenerales\correcto.png" height="50" width="50" alt=""> <?php
										echo "<br>Foto Agregada Correctamente. Deslizate hacia abajo para ver tu galeria!";
									}else{
										?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
										echo "<br>No se ha podido mover el archivo: ".$_FILES["archivo"]["name"][$i];
									}
									$nombrefoto = $_FILES['archivo']['name'][0];
									$extension = pathinfo($nombrefoto, PATHINFO_EXTENSION);
									#Renombra archivo
									$cont = $cont+1;
									$rutaDestino = $carpetaDestino."foto".$cont.'.'.$extension;
									rename($destino, $rutaDestino);
									
									#Agregar imagenes a la base de datos
									$insertar = $conex->consulta("INSERT INTO foto_hoy_necesito (id_hoy_necesito, numero_foto, ubicacion_foto) VALUES (".$idHoyNecesito.",".$cont.",'".$rutaDestino."')");
									if (!$insertar){
										?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
										die("Fallo en la insercion de la Foto número ".$cont." del Servicio en la Base de Datos: ".mysql_error());
									}
								}else{
									?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
									echo "<br>No se ha podido crear la carpeta: ";
								}
							}else{
								?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
								echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen";
							}
						}
					}else{
						echo "<br>No se ha subido ninguna imagen";
					}
					?>

                    <div class="sign-up">
                    	<br />
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="inscripcion">
                            <input align="center" type="file" name="archivo[]" multiple="multiple" required="required">
                            <input type="hidden" name="primVez" value="false">
                            <input type="hidden" name="idHoyNecesito" value="<?php echo $idHoyNecesito ?>" />
                            <input type="hidden" name="cont" value="<?php echo $cont ?>" />
                            <input align="left" type="submit" value="Agregar"  class="trig">
                        </form>
                    </div>

				<div class="clearfix"> </div>
                <?php
					$qryGaleria="SELECT hoy_necesito.id_hoy_necesito, foto_hoy_necesito.id_foto_hoy_necesito, foto_hoy_necesito.ubicacion_foto FROM hoy_necesito LEFT JOIN foto_hoy_necesito ON hoy_necesito.id_hoy_necesito = foto_hoy_necesito.id_hoy_necesito WHERE hoy_necesito.id_hoy_necesito = $idHoyNecesito";
					$resultsGaleria = $conex->consulta($qryGaleria);
                ?>
               <div class="gallery-section">
                    <h3 class="tittle">Galeria <i class="glyphicon glyphicon-fullscreen"></i></h3>
                    <div class="categorie-grids cs-style-1">
                        <div class='images'>
                            <?php
                                while($row = mysqli_fetch_array($resultsGaleria)){
                            ?>
                                 <div class="col-md-4 cate-grid grid">
                                    <figure>
                                        <img src="<?php echo $row['ubicacion_foto'];?>" height="150" width="450" alt="">
                                        <figcaption>
                                            <a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="Interior Design">VER</a>
                                            <a href="eliminarFotoHoyNecesito.php?idHoyNecesito=<?php echo $idHoyNecesito ?>&idFotoHoyNecesito=<?php echo $row['id_foto_hoy_necesito']; ?>" >Eliminar</a>
                                        </figcaption>
                                    </figure>
                                 </div>
                            <?php
                                }
                             ?>
                        </div>
                        <script src="js/lightbox.js"></script>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <h5>Terminaste? Ve a tu evento</h5>
                <h4 class="top"><a href="detalleHoyNecesito.php?idHoyNecesito=<?php echo $idHoyNecesito ?>" >Ver Mi Servicio <span class="glyphicon glyphicon-circle-arrow-right"></span></a></h4>
			</div>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
<?php include("fin.php"); ?>