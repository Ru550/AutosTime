<?php
	$idEvento=$_GET['idEvento'];
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryEvento="SELECT evento.id_evento, evento.titulo, evento.resumen, evento.descripcion, evento.fecha, evento.hora, COUNT(id_comentario_evento) AS cont_comentarios, evento.cont_visitas, evento.url_facebook, evento.url_twitter FROM evento LEFT JOIN comentario_evento ON evento.id_evento = comentario_evento.id_evento WHERE evento.id_evento = $idEvento";
	
	$resultEvento = $conex->consulta($qryEvento);
		
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
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Edita tu Evento <i class="glyphicon glyphicon-picture"></i></h3>
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
                                        Edita los campos de tu evento que creas necesario y presiona el botón Siguiente.
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <form action="editaEventoP2.php" method="post" enctype="multipart/form-data" name="evento">
                            <?php	
                                while($rowEvento = mysqli_fetch_array($resultEvento)){
                            ?>    
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Titulo :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="titulo" value="<?php echo utf8_encode($rowEvento['titulo']);?>" maxlength="25" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Resumen :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="resumen" value="<?php echo utf8_encode($rowEvento['resumen']);?>" maxlength="200" required="required">
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
                                        <h4 class="a" align="right">Selecciona Fecha del Evento :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" id="fecha" name="fecha" readonly="readonly" <?php echo utf8_encode($rowEvento['fecha']);?> onclick="show_calendar()">
                                                <a onclick="show_calendar()" style="cursor: pointer;"><small>(Abrir Calendario)</small></a>
                                                <div id="calendario">
                                                	<?php calendar_html() ?>
                                                </div>
                                            </input>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <br />
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Hora :</h4>
                                    </div>
                                    <div class="sign-up1">
                                            <input type="time" class="text" align="left" name="hora" <?php echo utf8_encode($rowEvento['hora']);?> required="required">
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
                                <input type="hidden" name="idEvento" value="<?php echo $idEvento; ?>" />
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