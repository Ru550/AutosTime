<?php
	require_once("conexion/require_once.php");
	$queHacer = "Evento";
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$qryEventos="Select evento.id_evento, evento.titulo, evento.resumen, evento.fecha, count(id_comentario_evento) as cont_comentarios, evento.cont_visitas, foto_evento.ubicacion_foto From evento Left Join comentario_evento On evento.id_evento = comentario_evento.id_evento Left Join foto_evento On evento.id_evento = foto_evento.id_evento where foto_evento.numero_foto > 0 And evento.fecha >= curdate() Group By evento.id_evento Order By evento.id_evento Desc Limit 0,10 ";
	$queryContador = "select count(evento.id_evento) as total From evento";
		
	$resultsEventos =$conex->consulta($qryEventos);
	$resultsContador =$conex->consulta($queryContador);
	while($row = mysqli_fetch_array($resultsContador)){
			$nbr = $row['total'];		
	}
	
	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">	
		<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
			<div class="gallery-section">	   
				<div class="clearfix"> </div>
                <h3 class="tittle">Zona de Eventos <i class="glyphicon glyphicon-time"></i></h3>
                <div class="banner">
                    <h5 class="top" align="center">Esta zona cuenta con los eventos promocionados por ustedes mismos.</h5>
                    <h5 class="top" align="center">Solo se muestran los eventos cuya fecha no ha vencido.</h5>
                    <h5 class="top" align="center">AutosTime no se hace responsable de ninguno.</h5>
                </div><br />
                <?php
				if(!isset($_SESSION["id_usuario"])):
   		            include("iniSesionRegistra.php");
            	else:
	            ?>
				<a href="agregaEventoP1.php"> <img width="65" height="55" src="images/imgGenerales/agregarEvento.jpg" /></a>
                <?php endif;?>
                <div class="images">
				<?php
					while($rowEvento = mysqli_fetch_array($resultsEventos)){
				?>
                    <div class="col-md-4 top-text">
                        <div class="single-middle">
                            <h5 class="top"><a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>"><?php echo utf8_encode($rowEvento['titulo']);?></a></h5>
                            <a href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>">
                            	<img width="50" height="50" src="<?php echo $rowEvento['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                            <p><?php echo utf8_encode($rowEvento['resumen']);?>...</p>
                            <p><b>Fecha de Evento: </b><?php echo date("d/m/Y", strtotime($rowEvento['fecha']));?><br />
                                <span class="glyphicon glyphicon-comment"></span>
								<?php 
									$idEventop = $rowEvento['id_evento'];
									$queryComentarios = "select count(id_comentario_evento) as cont_comentarios from comentario_evento where id_evento = $idEventop";
									$resultsComentarios = $conex->consulta($queryComentarios); 
									$rowComentarios = mysqli_fetch_array($resultsComentarios); 
									echo $rowComentarios['cont_comentarios'];
								?>
                                <span class="glyphicon glyphicon-eye-open"></span><?php echo $rowEvento['cont_visitas'];?>
                                <a class="span_link" href="detalleEvento.php?idEvento=<?php echo $rowEvento['id_evento'];?>">
                                <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                            </p>
                        </div>
                    </div>

				<?php
                    }
                ?>	
                </div>
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
			<?php include("pie.php"); ?>
			<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
    <!--INICIA RECARGA DE IMAGENES-->
    <div class='loader'>
        <img src="images/imgGenerales/loading.gif" />
    </div>
    <div class='messages'>
    </div>
    <script src="js/jquery.js"></script>	
    <script>
        $(document).ready(function(){
            $('.loader').hide();
            var load=0;
            var nbr = "<?php echo $nbr; ?>;"
            $(window).scroll(function(){
                if($(window).scrollTop()==$(document).height()-$(window).height())
                {
                    $('.loader').show();
                    load++;
                    if(load * 10 > nbr)
                    {
                        $('.messages').text("Has llegado al fin.");
                        $('.loader').hide();
                    }else{
                        $.post("ajax/ajaxGaleriaEventos.php",{load:load},function(data){
                            $('.images').append(data);
                            $(".loader").hide();
                        });
                    }
                }
            });
        });
    </script>
    <!-- TERMINA RECARGA DE IMAGENES-->
<?php include("fin.php"); ?>