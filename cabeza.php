<!DOCTYPE HTML>
<html>
<head>
	<title>AutosTime</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="AutosTime, AutosTimeYa, Autos Time, Autos Time Ya, Car's Time, Galerias de Autos, Autos Tiempo" />
	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
	<link rel="shortcut icon" href="images/imgGenerales/icono.png" type="image/x-icon">
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:700,700italic,800,300,300italic,400italic,400,600,600italic' rel='stylesheet' type='text/css'>
	<!--Custom-Theme-files-->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="all" />
	<script src="js/modernizr.custom.js"></script>
	<script src="js/jquery.min.js"> </script>
	<!--/script-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
					});
				});
	</script>
	<style>
		.loader
		{
			position:fixed;
			bottom:0;
			left: 600px;
		}
	</style>
    <!-- ANALISIS DE GOOGLE -->
    <script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-79372556-1', 'auto');
	  ga('send', 'pageview');
	</script>
    
    <!-- PLUGIN PARA COMENTARIOS DE FACEBOOK -->
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
</head>
<body>
	<?php
    session_start();
	if(!isset($_SESSION["id_usuario"])):?>
      <script>trap_page_mouse_key_events();</script>
    <?php else:?>

    <?php endif;?>