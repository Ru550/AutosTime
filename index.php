<?php
	require_once("conexion/require_once.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );
	
	$query_buscar="Select galeria_fotos.id_galeria_fotos, galeria_fotos.ubicacion_foto, count(usuario_votos_galeria_fotos.id_galeria_fotos) as cont_votos From galeria_fotos Join usuario_votos_galeria_fotos On galeria_fotos.id_galeria_fotos = usuario_votos_galeria_fotos.id_galeria_fotos where galeria_fotos.fecha_alta between LAST_DAY(curdate() - INTERVAL 1 MONTH) + INTERVAL 1 DAY and LAST_DAY(curdate()) Group By usuario_votos_galeria_fotos.id_galeria_fotos Order By cont_votos Desc Limit 5 ";

	$query = $conex->consulta($query_buscar);

	
	include("cabeza.php");
	include("menu.php");
?>
<div class="full">
	<?php include("redesSociales.php"); ?>
	<div class="col-md-9 main">
		<div class="banner-section">
		    <h3 class="tittle"><a href="galeria.php">Galeria</a> <i class="glyphicon glyphicon-picture"></i></h3>
			<div class="banner">
				<h5 class="top" align="center">Estas son las imagenes más votadas de este mes</h5>
                 <div  class="callbacks_container">
					<ul class="rslides" id="slider4">
						<?php
							while($row = $conex->extraer_registro($query)){
						?>
								<li>
								  <img src="<?php echo $row['ubicacion_foto'];?>" class="img-responsive" />
								</li>
						<?php
							}
						 ?>
					</ul>
				</div>
	  			<script src="js/responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
					$(function () {
					  // Slideshow 4
					  $("#slider4").responsiveSlides({
						auto: true,
						pager:true,
						nav:true,
						speed: 500,
						namespace: "callbacks",
						before: function () {
						  $('.events').append("<li>before event fired.</li>");
						},
						after: function () {
						  $('.events').append("<li>after event fired.</li>");
						}
					  });
					});
				</script>
				<div class="clearfix"> </div>
			    <div class="b-bottom"> 
					<h5 class="top"><a href="galeria.php">Ver Toda la Galeria del Mes</a></h5>
				</div>
			</div>
			<?php include("novedades.php"); ?>
		</div>
		<?php include("noticias.php"); ?>
		<div class="clearfix"> </div>
		
		<?php include("pie.php"); ?>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<?php include("fin.php"); ?>