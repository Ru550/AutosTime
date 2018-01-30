<?php
	require_once("conexion/Conection.php");
	require_once("conexion/conexion_vars.php");
	
	$conex= new Conection($servidor,$usuario,$pass,$db );

	include("cabeza.php");

?>
	<link href="skin/blue.monday/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="js/jplayer.playlist.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

	new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_1",
		cssSelectorAncestor: "#jp_container_1"
	}, [
		{
			title:"Pursuit Of Happiness. Steve Aoki",
			free:true,
			mp3:"musica/Pursuit_of_Happiness_Steve_Aoki.mp3"
		},
		{
			title:"El perdedor. Maluma",
			free:true,
			mp3:"musica/El_Perdedor_Maluma.mp3"	
		},
		{
			title:"Borro Cassette. Maluma",
			free:true,
			mp3:"musica/Borro_Cassette_Maluma.mp3"
		}
		/*,
		{
			title:"Tema 4. Autor 4",
			free:true,
			mp3:"http://ruta_tema4.mp3",
			oga:"http://ruta_tema4.ogg"
		},
		{
			title:"Tema 5. Autor 5",
			free:true,
			mp3:"http://ruta_tema5.mp3",
			oga:"http://ruta_tema5.ogg"
		},
		{
			title:"Tema 6. Autor 6",
			free:true,
			mp3:"http://ruta_tema6.mp3",
			oga:"http://ruta_tema6.ogg"
		},
		{
			title:"Tema 7. Autor 7",
			free:true,
			mp3:"http://ruta_tema7.mp3",
			oga:"http://ruta_tema7.ogg"
		},
		{
			title:"Tema 8. Autor 8",
			free:true,
			mp3:"http://ruta_tema8.mp3",
			oga:"http://ruta_tema8.ogg"
		}		*/
	], {
		swfPath: "js",
		supplied: "mp3",
		wmode: "window"
	});
});
//]]>
</script>
	<div class="full">
    <?php include("redesSociales.php"); ?>
		<div class="col-md-9 main">
		<div class="banner-section">
            <h3 class="tittle">Sección de Música</h3>
            <img src="images/imgGenerales/Auto_Music.gif" alt="">
            <div id="jquery_jplayer_1" class="jp-jplayer"></div>
            <div id="jp_container_1" class="jp-audio">
                <div class="jp-type-playlist">
                    <div class="jp-gui jp-interface">
                        <ul class="jp-controls">
                            <li><a href="javascript:;" class="jp-previous" tabindex="1">previous</a></li>
                            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
                            <li><a href="javascript:;" class="jp-next" tabindex="1">next</a></li>
                            <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
                            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                            <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                        </ul>
                        <div class="jp-progress">
                            <div class="jp-seek-bar">
                                <div class="jp-play-bar"></div>
                            </div>
                        </div>
                        <div class="jp-volume-bar">
                            <div class="jp-volume-bar-value"></div>
                        </div>
                        <div class="jp-time-holder">
                            <div class="jp-current-time"></div>
                            <div class="jp-duration"></div>
                        </div>
                        <ul class="jp-toggles">
                            <li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
                            <li><a href="javascript:;" class="jp-shuffle-off" tabindex="1" title="shuffle off">shuffle off</a></li>
                            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
                            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
                        </ul>
                    </div>
                    <div class="jp-playlist">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                    <div class="jp-no-solution">
                         <span>Actualización Requerida</span>
                    Para poder reproducir la musica debes actualizar tu navegador a una version reciente o actualizar tu <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div> 
                </div>
            </div>
            <div>
            	<br /><br />
                <p>Quieres compartir tu musica con nosotros?
                    <br />Envíala a nuestro correo: <u>autostimeya@gmail.com</u>
                    <br /><br />Si es aprobada, nosotros la agregaremos a este reproductor.
                </p>
                <p>Envía tu archivo en formato: .mp3
                    <br />Debe contener <br /><i>Nombre de Artista y Nombre de Canción</i>
                    <br /><br />Recuerda:
                    <strong>"La música y letra deberan ser de uso libre"</strong>
                </p>	
            </div>
            
			<div class="clearfix"></div>
		</div>
		<?php include("noticias.php"); ?>
		<div class="clearfix"> </div>
		<?php include("pie.php"); ?>
		<div class="clearfix"> </div>
	</div>
	<div class="clearfix"> </div>
</div>	
<?php include("fin.php"); ?>