<?php
	$idHoyNecesito=$_GET['idHoyNecesito'];
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryHoyNecesito="SELECT hoy_necesito.id_hoy_necesito, hoy_necesito.titulo, hoy_necesito.resumen, hoy_necesito.descripcion, hoy_necesito.fecha, COUNT(id_comentario_hoy_necesito) AS cont_comentarios, hoy_necesito.cont_visitas, hoy_necesito.url_facebook, hoy_necesito.url_twitter FROM hoy_necesito LEFT JOIN comentario_hoy_necesito ON hoy_necesito.id_hoy_necesito = comentario_hoy_necesito.id_hoy_necesito WHERE hoy_necesito.id_hoy_necesito = $idHoyNecesito";
	
	$resultHoyNecesito = $conex->consulta($qryHoyNecesito);
		
	include("cabeza.php");
	include("menu.php");
	require('calendario.php');
?>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script type="text/javascript" src="js/jquery.functions.js"></script>
	<div class="full">	
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">	   
				<div class="clearfix"> </div>
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Edita tu Servicio <i class="glyphicon glyphicon-picture"></i></h3>
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
                                        Edita los campos de tu servicio que creas necesario y presiona el botón Siguiente.
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <form action="editaHoyNecesitoP2.php" method="post" enctype="multipart/form-data" name="evento">
                            <?php	
                                while($rowEvento = mysqli_fetch_array($resultHoyNecesito)){
                            ?>    
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Titulo :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="titulo" maxlength="25" value="<?php echo utf8_encode($rowEvento['titulo']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Resumen :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="resumen" maxlength="200" value="<?php echo utf8_encode($rowEvento['resumen']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Descripción :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="textarea" name="descripcion" value="<?php echo utf8_encode($rowEvento['descripcion']);?>" maxlength="65531" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Facebook :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="facebook" value="<?php echo utf8_encode($rowEvento['url_facebook']);?>" maxlength="100">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Twitter :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="twitter" value="<?php echo utf8_encode($rowEvento['url_twitter']);?>" maxlength="100">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                <input type="hidden" name="idHoyNecesito" value="<?php echo $idHoyNecesito; ?>" />
                                <input type="hidden" name="primVez" value="true">
                                <input type="hidden" name="cont" value="0">
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