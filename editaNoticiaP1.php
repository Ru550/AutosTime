<?php
	$idNoticia=$_GET['idNoticia'];
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryNoticia="SELECT noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.descripcion, noticia.fecha, COUNT(id_comentario_noticia) AS cont_comentarios, noticia.cont_visitas, noticia.url_facebook, noticia.url_twitter FROM noticia LEFT JOIN comentario_noticia ON noticia.id_noticia = comentario_noticia.id_noticia WHERE noticia.id_noticia = $idNoticia";
	
	$resultNoticia = $conex->consulta($qryNoticia);
		
	include("cabeza.php");
	include("menu.php");
?>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery.functions.js"></script>
	<div class="full">	
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">	   
				<div class="clearfix"> </div>
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Edita tu Noticia <i class="glyphicon glyphicon-pencil"></i></h3>
                	<div class="sign-up-form">
                        <div class="sign-up">
                            <table>
                                <tr>
                                    <td align="left">
                                        <h5>Indicaciónes:</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        Edita los campos de tu noticia que creas necesario y presiona el botón Siguiente.
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <form action="editaNoticiaP2.php" method="post" enctype="multipart/form-data" name="noticia">
                            <?php	
                                while($rowNoticia = mysqli_fetch_array($resultNoticia)){
                            ?>    
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Titulo :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="titulo" value="<?php echo utf8_encode($rowNoticia['titulo']);?>" maxlength="25" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Resumen :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="resumen" value="<?php echo utf8_encode($rowNoticia['resumen']);?>" maxlength="200" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Descripción :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="textarea" name="descripcion" value="<?php echo utf8_encode($rowNoticia['descripcion']);?>" maxlength="65531" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Facebook :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="facebook" value="<?php echo utf8_encode($rowNoticia['url_facebook']);?>" maxlength="100">
											<i>Deberás ingresar la ruta completa (Ejem: http://www.facebook.com)</i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Twitter :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="twitter" value="<?php echo utf8_encode($rowNoticia['url_twitter']);?>" maxlength="100">
											<i>Deberás ingresar la ruta completa (Ejem: http://www.twitter.com)</i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                <input type="hidden" name="idNoticia" value="<?php echo $idNoticia; ?>" />
                                <input type="hidden" name="primVez" value="true">
                                <input type="submit" value="Siguiente >>"  class="trig">
                                <?php
									}
								?>
                            </form>
                        </div> 
                	</div>             
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
<?php include("fin.php"); ?>