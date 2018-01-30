<?php
	include("cabeza.php");
	include("menu.php");
?>
	<div class="full">
			<?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
		<!--banner-section-->
		<div class="banner-section">
		   <h3 class="tittle">Acerca de AutosTime<i class="glyphicon glyphicon-picture"></i></h3>
			<div class="banner">
                 <div  class="callbacks_container">
					<ul class="rslides" id="slider4">
					       <li>
							  <img src="images/3.jpg" class="img-responsive" alt="" />
							</li>
							<li>
								 <img src="images/3.jpg" class="img-responsive" alt="" />
							</li>
							<li>
							 <img src="images/3.jpg" class="img-responsive" alt="" />
							</li>
							<li>
							 <img src="images/3.jpg" class="img-responsive" alt="" />
							</li>
						</ul>
					</div>
					<!--banner-->
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
			      <h5 class="top"><a href="single.html">Imagenes de nosotros</a></h5>
			      <!--<p>On Aug 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>-->
				</div>
			 </div>
			   <!--//banner-->
			  <!--/top-news-->
			  <div class="top-news">
				<div class="about-content">
				<!-- about -->
					   <h3 class="tittle">Nosotros<i class="glyphicon glyphicon-user"></i></h3>
							<img src="images/ab.jpg" alt=" " />
							<p>Alguna descripcion del sitio. 
								<label>Cosas que se planean hacer...</label></p>
							<div class="clearfix"></div>
						<p class="nam">Hacia quien va dirigida la pagina.</p>
						<div class="more">
							<a href="single.html">Leer màs</a>
						</div>
				</div>
				 <div class="top-inner second">
					<div class="col-md-6 top-text">
						 <a href="single.html"><img src="images/pic1.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="single.html">Evento 1</a></h5>
							<p>Estuvimos presentes en el evento 1.</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					 </div>
					<div class="col-md-6 top-text two">
						 <a href="single.html"><img src="images/pic2.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="single.html">Evento 2</a></h5>
							<p>Estuvimos presentes en el evento 2.</p>
						    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					 </div>
					 <div class="clearfix"> </div>
				 </div>
	            </div>
					<!--//top-news-->
		     </div>
			<!--//banner-section-->
			<div class="banner-right-text">
			 <h3 class="tittle">Lo nuevo  <i class="glyphicon glyphicon-facetime-video"></i></h3>
			<!--/general-news-->
			 <div class="general-news">
				<div class="general-inner">
					<div class="general-text">
						 <a href="single.html"><img src="images/gen4.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="single.html">Galeria de Fotos</a></h5>
							<p>Fotos de tus eventos.</p>
						    <p>On Jun 25 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					 </div>
					 <div class="edit-pics">
							      <div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="images/f4.jpg" class="img-responsive" alt="">

										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="single.html">Noticia 1</a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
											 </div>
											<div class="clearfix"></div>
										</div>
										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="images/f1.jpg" class="img-responsive" alt="">

										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="single.html">Noticia 2</a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
											 </div>
											<div class="clearfix"></div>
										</div>
										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="images/f1.jpg" class="img-responsive" alt="">

										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="single.html">Noticia 3</a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
											 </div>
											<div class="clearfix"></div>
										</div>
										<div class="editor-pics">
										 <div class="col-md-3 item-pic">
										   <img src="images/f4.jpg" class="img-responsive" alt="">

										   </div>
											<div class="col-md-9 item-details">
												<h5 class="inner two"><a href="single.html">Noticia 4</a></h5>
												 <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
											 </div>
											<div class="clearfix"></div>
										</div>
									</div>
								<div class="media">	
								 <h3 class="tittle media">Musica <i class="glyphicon glyphicon-floppy-disk"></i></h3>
								  <div class="general-text two">
									 <a href="single.html"><img src="images/gen3.jpg" class="img-responsive" alt=""></a>
										<h5 class="top"><a href="single.html">Comparte tu musica</a></h5>
										<p>Si quieres compartir tu musica con los usuarios de la comunidad, solo envianos un correo.</p>
										<p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
								  </div>
					         </div>
					    <div class="general-text two">
						    <a href="single.html"><img src="images/gen5.jpg" class="img-responsive" alt=""></a>
						    <h5 class="top"><a href="single.html">Aplicaciones</a></h5>
							<p>Que aplicaciones con GPS recomiendas para nuestros viajes.</p>
						    <p>On Jun 27 <a class="span_link" href="#"><span class="glyphicon glyphicon-comment"></span>0 </a><a class="span_link" href="#"><span class="glyphicon glyphicon-eye-open"></span>56 </a><a class="span_link" href="single.html"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></p>
					    </div>
				 </div>
			</div>	
			<!--//general-news-->
			<!--/news-->
			<!--/news-->
		 </div>
			<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
	 <div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>