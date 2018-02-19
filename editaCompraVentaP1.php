<?php
	$idCompraVenta=$_GET['idCompraVenta'];
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$qryCompraVenta="SELECT compra_venta.id_compra_venta, compra_venta.titulo, compra_venta.resumen, compra_venta.descripcion, compra_venta.marca, compra_venta.modelo, compra_venta.transmision, compra_venta.tipo_combustible, compra_venta.precio, compra_venta.kilometraje, compra_venta.fecha, COUNT(id_comentario_compra_venta) AS cont_comentarios, compra_venta.cont_visitas, compra_venta.url_facebook, compra_venta.url_twitter FROM compra_venta LEFT JOIN comentario_compra_venta ON compra_venta.id_compra_venta = comentario_compra_venta.id_compra_venta WHERE compra_venta.id_compra_venta = $idCompraVenta";
	
	$resultCompraVenta = $conex->consulta($qryCompraVenta);
		
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
                <h3 class="tittle"><?php echo $_SESSION['apodo']; ?>!&nbsp&nbsp&nbsp Edita tu Compra/Venta <i class="glyphicon glyphicon-pencil"></i></h3>
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
                                        Edita los campos de tu Compra/Venta que creas necesario y presiona el botón Siguiente.
                                    </td>
                                </tr>
                            </table>
                            <br />
                            <form action="editaCompraVentaP2.php" method="post" enctype="multipart/form-data" name="evento">
                            <?php	
                                while($rowEvento = mysqli_fetch_array($resultCompraVenta)){
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
                                            <input type="text" class="textarea" name="descripcion" maxlength="65531" value="<?php echo utf8_encode($rowEvento['descripcion']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Marca :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="marca" maxlength="50" value="<?php echo utf8_encode($rowEvento['marca']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Modelo :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="modelo" maxlength="4" value="<?php echo utf8_encode($rowEvento['modelo']);?>" required="required" >
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Transmisión :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="transmision" maxlength="50" value="<?php echo utf8_encode($rowEvento['transmision']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Tipo Combustible :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="tipoCombustible" maxlength="50" value="<?php echo utf8_encode($rowEvento['tipo_combustible']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Precio :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="precio" maxlength="25" value="<?php echo utf8_encode($rowEvento['precio']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Kilometraje :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="kilometraje" maxlength="25" value="<?php echo utf8_encode($rowEvento['kilometraje']);?>" required="required">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Facebook :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="facebook" value="<?php echo utf8_encode($rowEvento['url_facebook']);?>" maxlength="100">
											<i>Deberás ingresar la ruta completa (Ejem: http://www.facebook.com)</i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a" align="right">Twitter :</h4>
                                    </div>
                                    <div class="sign-up2">
                                            <input type="text" class="text" name="twitter" value="<?php echo utf8_encode($rowEvento['url_twitter']);?>"  maxlength="100">
											<i>Deberás ingresar la ruta completa (Ejem: http://www.twitter.com)</i>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="sign-u">
                                    <div class="sign-up1">
                                        <h4 class="a">Estatus :</h4>
                                    </div>
                                    <div class="sign-up2"><br>
                                         <select id="id_estatus" name="idEstatus" >
                                             <option value="1">Disponible</option>
                                             <option value="2">Vendido</option>  
                                         </select>
                                         (Los Vendidos ya no aparecerán más)
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <br>
                                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                <input type="hidden" name="idCompraVenta" value="<?php echo $idCompraVenta; ?>" />
                                <input type="hidden" name="primVez" value="true">
                                <input type="hidden" name="cont" value="0">
                                <input type="submit" value="Siguiente >>" class="trig">
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