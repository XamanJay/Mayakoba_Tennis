<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Condominio Mayakoba</title>
		 
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
		
         <!--<script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
          <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
          
        <!-- JCALENDAR -->
         <link href="css/jCalendar.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jCalendar.js"></script>
        
        <!-- consultas -->
        
        <script type="text/javascript">
		$(document).ready(function() {
			$('#gallery').click(function()
			{
				//hora y fecha
				var jc_date = $("input#from").val();
				if(jc_date == ""){
					$("#error").fadeIn().text("Ingresa la fecha y hora de reservación.");
					$("input#from").focus();
					return false;
				}
				
				var jc_datef = $("input#to").val();
				if(jc_date == ""){
					$("#error").fadeIn().text("Ingresa la fecha y hora de reservación.");
					$("input#to").focus();
					return false;
				}
				var dataString = 'jc_date=' + jc_date + '&jc_datef=' + jc_datef;
				 // ajax
				$.ajax({
					type:"POST",
					url: "muestrareportem.php",
					data: dataString,
					success: function(a) {
                        $('#central').html(a);  
                    }
				});
				
			});
			// data string
		
		});
		</script>
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
			table {
		border-collapse:collapse;
		
		border-left:1px solid #686868;
		border-right:1px solid #686868;
		font:0.8em/145% 'Trebuchet MS',helvetica,arial,verdana;
		color: #333;
}

td, th {
		padding:5px;
}

        </style>

            
 		  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		 
          
          <script>
		  		
			  $(function() {
				  
				$( "#from" ).datepicker({
				  altFormat: "dd-mm-yy",
				  defaultDate: "-1w",
				  changeMonth: true,
				  numberOfMonths: 2,
				  onClose: function( selectedDate ) {
					$( "#to" ).datepicker( "option", "minDate", selectedDate );
				  }
				});
				$( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );
				$( "#to" ).datepicker({
				  defaultDate: "+0w",
				  changeMonth: true,
				  numberOfMonths: 2,
				  onClose: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
				  }
				});
			  });
		  </script>
         
	</head>
	
	
	<body class="home" >
	
	
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
                         </ul>
                     </li>
					<li><a href="#">Reservaciones</a>
						<ul>
							<li><a href="reservacion.html">Nueva Reservación</a></li>
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
			<div class="wrapper cf">
				
				<p><h4><font color="#FFFFFF">CONSULTAR RESERVACIONES</font></h4></p>
				
				<form id="contactForm" action="#" method="post" >                
					<fieldset> 
                    		 <h4>Fecha Inicial </h4>
							<input type="text" id="from" name="from" />
							<h4>Fecha Final </h4>
							<input type="text" id="to" name="to" />
                            <br>
                            <a href="#" id="gallery" style="cursor:pointer; background-color:#999">Buscar</a>
                    </fieldset>
				</form>
				
               	
					<div id="central"></div>
               									
			
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->
		
		
		<!-- FOOTER -->
		<footer>
			
		</footer>
		<!-- ENDS FOOTER -->
		
	</body>
	
	
	
</html>