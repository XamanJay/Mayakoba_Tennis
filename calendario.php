<?php
session_start();
$dominio = $_SESSION["dominiom"];
$hotel=$_SESSION["hotel"];
error_reporting(0);

?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>CONDOMINIO MAYAKOBA</title>
		 
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->		
				
		<!-- JS -->
		<script src="js/jquery-1.7.1.min.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/tabs.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
		<script src="js/jquery.columnizer.min.js"></script>
		
		<!-- Isotope -->
		<script src="js/jquery.isotope.min.js"></script>
		
		<!-- Lof slider -->
		<script src="js/jquery.easing.js"></script>
		<script src="js/lof-slider.js"></script>
		<link rel="stylesheet" href="css/lof-slider.css" media="all"  /> 
		<!-- ENDS slider -->
		
		<!-- Tweet -->
		<link rel="stylesheet" href="css/jquery.tweet.css" media="all"  /> 
		<script src="js/tweet/jquery.tweet.js" ></script> 
		<!-- ENDS Tweet -->
		
		<!-- superfish -->
		<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
		<script  src="js/superfish-1.4.8/js/hoverIntent.js"></script>
		<script  src="js/superfish-1.4.8/js/superfish.js"></script>
		<script  src="js/superfish-1.4.8/js/supersubs.js"></script>
		<!-- ENDS superfish -->
		
		<!-- prettyPhoto -->
		<script  src="js/prettyPhoto/js/jquery.prettyPhoto.js"></script>
		<link rel="stylesheet" href="js/prettyPhoto/css/prettyPhoto.css"  media="screen" />
		<!-- ENDS prettyPhoto -->
		
		<!-- poshytip -->
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-twitter/tip-twitter.css"  />
		<link rel="stylesheet" href="js/poshytip-1.1/src/tip-yellowsimple/tip-yellowsimple.css"  />
		<script  src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
		<!-- ENDS poshytip -->
		
		<!-- JCarousel -->
		<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
		<link rel="stylesheet" media="screen" href="css/carousel.css" /> 
		<!-- ENDS JCarousel -->
		
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>

		<!-- modernizr -->
		<script src="js/modernizr.js"></script>
		
		<!-- SKIN -->
		<link rel="stylesheet" media="all" href="css/skin.css"/>
		
		<!-- Less framework -->
		<link rel="stylesheet" media="all" href="css/lessframework.css"/>
		
		<!-- flexslider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider.js"></script>
		
        <style>
			.login {
					 width: 90px;
					 margin: 0 auto;
				  }
        </style>
		
        <!-- ======================= CALENDAR =========================== -->
        <link rel='stylesheet' type='text/css' href='css/calendar_style.css' />
		<script type='text/javascript' src="js/calendar.js"></script>
        <!-- ====================== END CALENDAR ======================= -->
        
   		<!-- ====================== CONSULTA DE CALENDARIO ============= -->
        <script>
        $('a').click(function()
		{ 
		   var req; 
		    var url = $(this).attr('href');

			alert(url);
		   if (window.XMLHttpRequest) 
		   { 
			  req = new XMLHttpRequest(); 
		   } 
		   else 
			{
			  if (window.ActiveXObject) 
			  { 
				 req = new ActiveXObject("Microsoft.XMLHTTP"); 
			  } 
			  document.getElementById(target).innerHTML = "Cargando<br>TB podemos poner una IMG de cargando..."; 
			  req.onreadystatechange = function() 
			  { 
				 if (req.readyState == 4) 
				 { 
					if (req.status == 200) 
					{ 
					   document.getElementById(target).innerHTML = req.responseText; 
					} 
					else 
					{ 
					   document.getElementById(target).innerHTML = "Error"; 
					} 
				 } 
			  } 
			  req.open("GET", url, true); 
			  req.send(""); 
			}
		 });
</script> 
        
        <!-- ====================== FINALIZA CONSUTA DE CALENDARIO ===== -->
        
</head>

<body class="home" onLoad='navigate("","")'>

		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="index.html"><img  src="img/logotenis.png" alt="Simpler" width="280px" height="53px"></a>
				</div>
				
				<!-- nav -->
				<ul id="nav" class="sf-menu">
					<li class="current-menu-item"><a href="index.html">Inicio</a></li>
                    <li><a href="http://reservation.mayakoba.com/calendario.php">Agenda</a></li>
					<li><a href="#">Administración</a>
						<ul>
                            
                            <li><a href="http://reservation.mayakoba.com/prestamo.php">Préstamo de Equipo</a></li1>
                            <li><a href="http://reservation.mayakoba.com/devolucion.php">Devolución de Equipo</a></li1>
                            <li><a href="http://reservation.mayakoba.com/registro.php">Registro de Asistencia</a></li>
                            <li><a href="http://reservation.mayakoba.com/consulta_asis.php">Consultar Asistencia</a></li>
                            <?php
								if ($hotel=='Proshop')
								{
							?>
                            <li><a href="http://reservation.mayakoba.com/reportemensual.php">Reporte Mensual</a></li>
                            <?php		
								}
							?>
                         </ul>
                     </li>
					<li><a href="#">Reservaciones</a>
						<ul>
							<li><a href="reservation.php">Nueva Reservación</a></li>
							<li><a href="http://reservation.mayakoba.com/cancelar2.php">Cancelar Reservación</a></li>
							<li><a href="http://reservation.mayakoba.com/consulta.php">Consultar Reservación</a></li>
						</ul>
					</li>
                    <li><a href="http://reservation.mayakoba.com/index.html">Salir</a></li>
					
				</ul>
				<div id="combo-holder"></div>
				<!-- ends nav -->
			</div>
		</header>
		<!-- ENDS HEADER -->
        <!-- MAIN -->
		<div id="main">
			<br><br><br>
				<!-- PROMOCION - CUADRO DE INFORMACION
					<center><table  style="background:#000; color:#FFF; opacity:0.80;">
                            	
                                	<caption style="background-color:#000; opacity:0.90;"><font color="#F00"><h4>Promoción </h4></font></caption>
                                	
                                
                            	<tr>	
                                	<td>Invitamos a los huéspedes que participen en la Clínica de Tennis con el Pro.</td>
                                </tr>
                                <tr>	
                                	<td> Cada Jueves de 9 am a 10 am habrá grupos de avanzados, principiantes y niños 6-12 años.</td>
                                </tr>
                                <tr>	
                                	<td> Sin costo. Solo llama al <a href="callto:+529841790860" style="color:#fff"> +52 (984)-179-0860 o por mail </a> <a href="mailto:camp@mayakoba-ac.com" style="color:#fff">camp@mayakoba-ac.com</a> </td>
                                </tr>
                               
                    </table>
                </center>
                -->
			<div class="wrapper cf">
				
					<div id="calback">
						<div id="calendar"></div>
					</div>
                    <div id="MiContenido"> </div>
                
            </div>
        </div>
</body>
</html>
