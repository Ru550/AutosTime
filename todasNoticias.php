<?php
	require_once("conexion/require_once.php");
	$conex= new Conection($servidor,$usuario,$pass,$db );
	$qryNoticias="Select noticia.id_noticia, noticia.titulo, noticia.resumen, noticia.fecha, count(id_comentario_noticia) as cont_comentarios, noticia.cont_visitas, foto_noticia.ubicacion_foto From noticia left Join comentario_noticia on noticia.id_noticia = comentario_noticia.id_noticia left Join foto_noticia on noticia.id_noticia = foto_noticia.id_noticia where foto_noticia.numero_foto > 0 group by noticia.id_noticia Order By noticia.id_noticia Desc Limit 0,10 ";
	$queryContador = "select count(noticia.id_noticia) as total From noticia";

	$resultsNoticias =$conex->consulta($qryNoticias);
	$resultsContador =$conex->consulta($queryContador);

	/*$conex->consulta($qryNoticias);
	$resultsNoticias = mysql_query($qryNoticias);
	$resultsContador = mysql_query($queryContador);*/
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
                <h3 class="tittle">Noticias <i class="glyphicon glyphicon-picture"></i></h3>
                <div class="banner">
                    <h5 class="top" align="center">Esta zona cuenta con las noticias mas relevantes.</h5>
                </div>                
                <?php if(isset($_SESSION['id_tipo_usuario'])){
						 if ($_SESSION["id_tipo_usuario"] == 1){ ?>
							<p class="sub"><b><a href="agregaNoticiaP1.php"><u> Agregar Noticia </u></a></b></p>
				<?php } }?>
                <div class="images">
				<?php
					while($rowNoticias = mysqli_fetch_array($resultsNoticias)){
				?>
                    <div class="col-md-4 top-text">
                        <div class="single-middle">
                            <h5 class="top"><a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"><?php echo utf8_encode($rowNoticias['titulo']);?></a></h5>
                            <a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"><img src="<?php echo $rowNoticias['ubicacion_foto'];?>" class="img-responsive" alt=""></a>
                            <p><?php echo utf8_encode($rowNoticias['resumen']);?>...</p>
                            <p><b>Fecha de Publicación: </b> <?php echo date("d/m/Y", strtotime($rowNoticias['fecha']));?><br /> <span class="glyphicon glyphicon-comment"></span> <?php echo $rowNoticias['cont_comentarios'];?> <i class="glyphicon glyphicon-eye-open"></i> <?php echo $rowNoticias['cont_visitas'];?> <a class="span_link" href="detalleNoticia.php?idNoticia=<?php echo $rowNoticias['id_noticia'];?>"> <span class="glyphicon glyphicon-circle-arrow-right"></span></a>
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
                        $.post("ajax/ajaxGaleriaNoticias.php",{load:load},function(data){
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