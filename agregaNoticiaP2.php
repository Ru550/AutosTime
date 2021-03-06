<?php
	$primVez=$_POST['primVez'];
	foreach($_POST as $i => $v){
	}
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	//$conexion = mysql_connect($servidor,$usuario,$pass);
	if (!$conex){
		die("Fallo la conexión a la Base de Datos: " . mysql_error());
	}
	if($primVez=='true'){
		$ultimoID="select max(id_noticia) as nuevoID From noticia ";
		$resUltim = $conex->consulta($ultimoID);
	
		while($row = mysqli_fetch_array($resUltim)){
			$mivar = $row['nuevoID'];
			$ultimoID=$mivar+1;
		}
		
		$titulo=$_POST['titulo'];
		$resumen=$_POST['resumen'];
		$descripcion=$_POST['descripcion'];
		$facebook=$_POST['facebook'];
		$twitter=$_POST['twitter'];
		$cont=$_POST['cont'];
	
		//Convierte las ñ y las vocales con acento
		$titulo = utf8_decode($titulo); 
		$resumen = utf8_decode($resumen);
		$descripcion = utf8_decode($descripcion);
		$facebook = utf8_decode($facebook);
		$twitter = utf8_decode($twitter);
			
		$insertar = $conex->consulta("INSERT INTO noticia (id_noticia, titulo, resumen, descripcion, url_facebook, url_twitter, fecha, cont_visitas) VALUES(".$ultimoID.",'".$titulo."','".$resumen."','".$descripcion."','".$facebook."','".$twitter."',curdate(),0)");
		
		if (!$insertar){
			die("Fallo en la insercion de la Noticia en la Base de Datos.");
		}
		$idUsuario = $_POST['idUsuario'];
		$insertar = $conex->consulta("INSERT INTO usuario_noticia(id_usuario, id_noticia) VALUES (".$idUsuario.",".$ultimoID.")");
		
		if (!$insertar){
			die("Fallo en la insercion del usuario - Noticia en la Base de Datos.");
		}
	}else{
		$ultimoID=$_POST['ultimoID'];
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
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Crea tu Galeria <i class="glyphicon glyphicon-picture"></i></h3>
                <div >
                	<table>
                    	<tr>
                        	<td>
			                    <h4 class="top" align="center">Aquí podrás agregar las imágenes de la noticia.</h4>
                            </td>
                        </tr>
                        <tr>
                        	<td align="left">
			                    <h5>Indicaciónes:</h5>
                            </td>
                        </tr>
                        <tr>
                        	<td align="left">
			                    Agrega TODAS las imágenes de la noticia, empezando por la que lo representa mejor!<br />
			                    Deberás seleccionar una a la vez y presionar el botón "Agregar Imagen" para agregarla a la galería.
                            </td>
                        </tr>
                    </table>
                </div>
                <br />
                <?php
					# definimos la carpeta destino
					$carpetaDestino="images/fNoticias/noticia".$ultimoID."/";
					
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
									
									$nombrefoto = $_FILES['archivo']['name'][$i];
									$extension = pathinfo($nombrefoto, PATHINFO_EXTENSION);
									#Renombra archivo
									$cont = $cont+1;
									$rutaDestino = $carpetaDestino."foto".$cont.'.'.$extension;
									rename($destino, $rutaDestino);
									
									#Agregar imagenes a la base de datos
									$insertar = $conex->consulta("INSERT INTO foto_noticia (id_noticia, numero_foto, ubicacion_foto) VALUES (".$ultimoID.",".$cont.",'".$rutaDestino."')");
									if (!$insertar){
										?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
										die("Fallo en la insercion de la Foto número ".$cont." de la Noticia en la Base de Datos: ".mysql_error());
									}
								}else{
									?> <img src="images\imgGenerales\tache.png" height="50" width="50" alt=""> <?php
									echo "<br>No se ha podido crear la carpeta.";
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
                            <input type="hidden" name="ultimoID" value="<?php echo $ultimoID ?>" />
                            <input type="hidden" name="cont" value="<?php echo $cont ?>" />
                            <input align="left" type="submit" value="Agregar"  class="trig">
                        </form>
                    </div>

				<div class="clearfix"> </div>
                <?php
					if($cont > 0){
					$qryGaleria="SELECT noticia.id_noticia, foto_noticia.id_foto_noticia, foto_noticia.ubicacion_foto FROM noticia LEFT JOIN foto_noticia ON noticia.id_noticia = foto_noticia.id_noticia WHERE noticia.id_noticia = $ultimoID";
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
										<a class="example-image-link" href="<?php echo $row['ubicacion_foto'];?>" data-lightbox="example-1" data-title="<?php echo utf8_encode($titulo); ?>">
											<img src="<?php echo $row['ubicacion_foto'];?>" height="150" width="450" alt="">
                                        </a>
										<h5><center><a href="eliminarFotoNoticia.php?idNoticia=<?php echo $idNoticia ?>&idFotoNoticia=<?php echo $row['id_foto_noticia']; ?>" ><span class="glyphicon glyphicon-remove"></span>Eliminar</a></center></h5>
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
                <h5>Terminaste? Ve a tu noticia</h5>
                <h4 class="top"><a href="detalleNoticia.php?idNoticia=<?php echo $ultimoID ?>" >Ver Mi Noticia <span class="glyphicon glyphicon-circle-arrow-right"></span></a></h4>
            	<?php
					}
				?>
			</div>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
<?php include("fin.php"); ?>