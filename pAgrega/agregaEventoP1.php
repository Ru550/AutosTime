<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
		
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
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Agrega tu Evento <i class="glyphicon glyphicon-picture"></i></h3>
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
                                        Captura todos los campos con la descripción de tu evento y presiona el botón Siguiente.
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <form action="agregaEventoP2.php" method="post" enctype="multipart/form-data" name="evento">
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Titulo :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="titulo" maxlength="25" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Resumen :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="resumen" maxlength="200" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Descripción :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="textarea" name="descripcion" maxlength="65531" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Selecciona Fecha del Evento :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" id="fecha" name="fecha" readonly="readonly" onclick="show_calendar()">
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
                                            <input type="time" class="text" align="left" name="hora" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Facebook :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="facebook" maxlength="100">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Twitter :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="twitter" maxlength="100">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                <input type="hidden" name="primVez" value="true">
                                <input type="hidden" name="cont" value="0">
                                <input type="submit" value="Siguiente >>"  class="trig">
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