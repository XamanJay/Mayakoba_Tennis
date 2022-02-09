<? 
	session_start();
	require_once("include/conexion.php");  
	//recuperamos la session para poder insertarla en la base de datos.
	$nombre_usuario = $_SESSION["usuario"];
	$dominio = $_SESSION["dominiom"];
	$hotel=$_SESSION["hotel"];
	if(strlen(trim($nombre_usuario))==0)
	{
		echo "<script type='text/javascript'>
				alert('No estás logueado. $nombre_usuario');
				window.location='http://reservation.mayakoba.com/index.html';
			  </script>";
			  exit();
	}
	
	if ((isset($_REQUEST['jc_date'])) && (strlen(trim($_REQUEST['jc_date'])) > 0)) 
	{
		$fecha_nueva = stripslashes(strip_tags($_REQUEST['jc_date']));
		//echo $fecha_nueva;
		
	} 
	else 
	{	
		$fecha_nueva = '';
	}
	
	
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
		
        <!-- jplayer -->
		<link href="player-skin/jplayer-black-and-yellow.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
		
		<!-- flexslider -->
		<link rel="stylesheet" href="css/flexslider.css" >
		<script src="js/jquery.flexslider.js"></script>
        
        <!-- JCALENDAR -->
         <link href="css/jCalendar.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jCalendar.js"></script>
        
         <!-- Responsive design tablas -->
        <link rel="stylesheet" href="css/responsive-tables.css">
        <script src="js/responsive-tables.js"></script>
        
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
				  
			blockquote p 
			{
			  padding: 0px 15px 0px 0px;
			  font-size: 1.2em;
			  float: left;
			  background: url(../images/quote_down.png) bottom right no-repeat;
			}
			
			blockquote 
			{
			  padding: 20px;
			  font-size: 1.8em;
			  background: url(../images/quote_up.png) top left no-repeat;
			}
			
        .AMARILLO2 {
	color: #FFFF00;
}
        </style>
        
        <script>
		
			(function($){
			  $.fn.outside = function(ename, cb){
				  return this.each(function(){
					  var $this = $(this),
						  self = this;
			
					  $(document).bind(ename, function tempo(e){
						  if(e.target !== self && !$.contains(self, e.target)){
							  cb.apply(self, [e]);
							  if(!self.parentNode) $(document.body).unbind(ename, tempo);
						  }
					  });
				  });
			  };
			}(jQuery));
			
			$(function() {
				$('#jc_date').outside('click', function(e) {
					val= $(this).val();
					val2='Fecha reservación: '+val;
					$("#fechavista").empty();
					 $("#fechavista").text(val2);
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
				
				
				
				<!-- form -->
				<script type="text/javascript" src="js/form-validation.js"></script>
				<form id="contactForm" action="insertareservacion.php" method="post">
					<fieldset>
            			
                        	<table width="100%" cellspacing="0" cellpadding="0" >
                            	
                            	<caption style="font-size:24px; color:#000; ">  <div id="fechavista"> <?php echo 'Fecha reservación: '.$fecha_nueva; ?> </div> </caption>
                            	<tr>
                                	<td width="23%">
                                        
                                        	<label for="empresa" ><font color="#fff"><h5>Resort</h5></label>
                                          <select name="empresa">
                                                <option value="selecciona">Selecciona el resort</option>
                                              
											<?php
												//Imprimimos el combo con el resort seleccionado
												if ($hotel=='Proshop')
												{
											?>
                                        
                                                
                                                <option value="rosewood">Rosewood</option>
                                                <option value="fairmont">Fairmont</option>
                                                <option value="Banyan Tree">Banyan Tree</option>
                                                <option value="andaz">Andaz</option>
                                                <option value="proshop">Proshop</option>
                                            <?php
												}
												else
												{
											?>
                                            	<option value="<?php echo $hotel; ?>"><?php echo $hotel;?></option>
												
											<?php
												}
											?>
											
                                                
                                            </select>  
                                      
                                     </td>                      
                            	
                                	<td width="28%">
                                        <label for="usuario" ><font color="#fff"><h5>Tipo de usuario</h5></label>
                                      
                                          <select name="usuario">
                                                <option value="selecciona">Selecciona el Usuario</option>
                                                <option value="huesped">Huesped</option>
                                                <option value="empleado">Empleado</option>
                                               
                                            </select>
                                          
                          			</td>
                              
                                	<td width="28%">
                                        <label for="cancha" ><font color="#000"><h5>Cancha</h5></label>
                                        
                                          <select name="cancha">
                                                <option value="selecciona">Selecciona la cancha</option>
                                                <option value="Tenis 1">Tenis 1</option>
                                                <option value="Tenis 2">Tenis 2</option>
  												<option value="Tenis 3">Tenis 3</option>
 												<option value="Tenis 4">Tenis 4</option>    
                                                <option value="padel">Padel</option>
                                            </select>
                                       
                                    </td>
                                  <td width="19%">
                                   <!-- <label class="AMARILLO2">HORARIOS DISPONIBLES EN CANCHA 3 Y CANCHA 4, ES SOLO DE 06:00 a 16:00</label>-->
                                  <td width="2%">
                              </tr>
                           </table>
                           
                           
                           
                           <table width="100%" cellspacing="0" cellpadding="0">
                               	 <caption><font color="#000"><h4>CONCIERGE </h4></font></caption>
                                   
             					<tr>
                                   <td width="33%">
                                       
                                            <label for="nombre"><font color="#000"><h5>Nombre</h5></label>
                                            <input name="nombre" type="text" class="form-poshytip"  id="nombre" title="Ingresa tu nombre" />
                                        
                                   </td>
                                   <td width="33%">
                                        
                                            <label for="appaterno" ><font color="#000"><h5>Apellido Paterno</h5></label>
                                            <input name="appaterno"   type="text" class="form-poshytip" id="appaterno" title="Ingresa tu apellido paterno" />
                                        
                                    </td>
                                
                                   <td width="35%">
                                    
                                        
                                            <label for="email" ><font color="#000"><h5>Email</h5></label>
                                            <input name="email"  id="email" type="text" class="form-poshytip" title="Ingresa tu correo" />
                                      
                                   </td>
                                </tr>
                                <tr>
                                   <td>
                                        
                                            <label for="telefono" ><font color="#000"><h5>Teléfono</h5></label>
                                            <input name="telefono"  id="telefono" type="text" class="form-poshytip" title="Ingresa tu teléfono" />
                                       
                                   </td>
                                  
                                   <td>
                                   			
                                            <label for="jc_date" ><font color="#000"><h5>Fecha y Hora de reservación</h5></label>                                  
                                         <input name="jc_date"  id="jc_date" type="text" value="<?php echo $fecha_nueva; ?>" class="form-poshytip" title="Selecciona la fecha y hora"  onClick="viewCalendar('jcalendar_parent', 'jc_date')"/>  
                                        <div id="jcalendar_parent" class="jcalendar_parent" style="z-index: 999"></div>
                                           
                                    
                                   </td>
                                   
                                </tr>
                             </table>
						 	 <table width="100%" cellspacing="0" cellpadding="0" >
                          	 	<!-- <th align="center"><font color="#fff">HUESPED</font></th> -->
                                 <caption><font color="#000"><h4>HUESPED</h4> </font></caption>
                            	<tr>
                                	<td width="33%">
                                    	
                                        <label for="nombres1" ><font color="#fff"><h5>Nombre</h5></label>
                                        <input name="nombres1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> 
                                        
                             		</td>
                           			<td width="33%">
                                        <label for="appaternos1" ><font color="#000"><h5>Apellido Paterno</h5></label>
                                        <input name="appaternos1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" /> 
                            	
                                    <td width="35%">
                                        <label for="habitacions1" ><font color="#fff"><h5>No. Habitación</h5></label>
                                        <input name="habitacions1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                          			</td>
                                </tr>                   
                            </table>
                           
                             <table width="100%" cellspacing="0" cellpadding="0" >
                          	 	
                            	<tr>
                                	<td width="33%">
                                    	<label for="comments" ><font color="#000"><h5>Comentario</h5></label>
                                           <textarea name="comments"  id="comments" rows="3" cols="10" style="width:142px; height:80px;" title="Comentarios"></textarea>
                                       
                             		</td>
                           			<td width="33%">
                                       
                                    <td width="35%"><p>
                                      <input type="submit" value="Send" name="submit" id="submit" /> 
                                      <span id="error" class="warning">Message</span></p>
                          			</td>
                                </tr>                   
                      		</table>
                         
                       <div class="clearfix"></div>
					
					</fieldset>
                   
                   			<table  style="background:#000; color:#FFF; opacity:0.80;">
                            	
                                	<caption style="background-color:#000; opacity:0.90;"><font color="#F00"><h4>NOTA </h4></font></caption>
                                	
                                
                            	<tr>	
                                	<td> &nbsp;&nbsp;&nbsp;La reservación solamente es válida por una hora. </td>
                                </tr>
                                <tr>	
                                	<td> &nbsp;&nbsp;&nbsp;En caso de no ser puntual a los 20 minutos de retraso se cancelará. </td>
                                </tr>
                                <tr>	
                                	<td> &nbsp;&nbsp;&nbsp;El equipo será proporcionado por el hotel. </td>
                                </tr>
                                <tr>	
                                	<td> &nbsp;&nbsp;&nbsp;<a href="mailto:tenniscenter@mayakoba-ac.com" style="color:#fff">tenniscenter@mayakoba-ac.com</a> </td>
                                </tr>
                                <tr>	
                                	<td> &nbsp;&nbsp;&nbsp;<a href="callto:+529841225199" style="color:#fff">+52 (984)-179-08-60</a> </td>
                                </tr>
                            </table>
							
				</form>
				<p id="sent-form-msg" class="success">Form data sent. Thanks for your comments.</p>
				<!-- ENDS form -->		
			<!-- featured -->
			</div><!-- ENDS WRAPPER -->
		</div>
		<!-- ENDS MAIN -->
		
		
		<!-- FOOTER -->
		<footer>
			
		</footer>
		<!-- ENDS FOOTER -->
		
	</body>
	
	
	
</html>