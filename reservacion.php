<?php
require_once('classes/tc_calendar.php');
?>

<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Condominio Mayakoba</title>
		 
      	<!-- CALENDARIO -->
        <link href="css/calendar.css" rel="stylesheet" type="text/css" />
		<script language="javascript" src="js/calendar.js"></script>
        <!-- FIN DE CALENDARIO -->


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
		
        <!-- JCALENDAR -->
         <link href="css/jCalendar.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jCalendar.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/pepper-grinder/jquery-ui.css" />
        
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
        </style>
	</head>
	
	
	<body class="home" >
	
	
		<!-- HEADER -->
		<header>
			<div class="wrapper cf">
				
				<div id="logo">
					<a href="index.html"><img  src="img/logo.png" alt="Simpler"></a>
				</div>
				
				
			</div>
		</header>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<div class="wrapper cf">
				
				<p><h1><font color="#FFFFFF">RESERVACIONES</font></h1></p>
				
				<!-- form -->
				<script type="text/javascript" src="js/form-validation.js"></script>
				<form id="contactForm" action="#" method="post">
					<fieldset>
                    		<table border="0">
                                <tr>
                                    <td>
                                    	<p>
                                        	<label for="cancha" ><font color="#FFFFFF">Cancha</font></label>
                                            <select name="cancha">
                                                <option value="selecciona">Selecciona la cancha</option>
                                                <option value="1">Tenis 1</option>
                                                <option value="Tenis 3">Tenis 3</option>
 												<!--<option value="Tenis 4">Tenis 4</option>-->
                                                <option value="padel">Padel</option>
                                            </select>
                                        </p>
                                    
                                    	<p>
                                            <label for="usuario" ><font color="#FFFFFF">Tipo de Usuario</font></label>
                                            <select name="usuario">
                                                <option value="selecciona">Selecciona tipo Usuario</option>
                                                <option value="huesped">Huesped</option>
                                                <option value="empleado">Empleado</option>
                                               
                                            </select>
                                       </p>
                                    </td>
                                   
                                 </tr>
                            </table>
						<br>	
                       
                            <p>
                                    		<label for="fecha" ><font color="#FFFFFF">Fecha y Hora de reservación</font></label>
                                         <?php
											$myCalendar = new tc_calendar("date5", true, false);
											$myCalendar->setIcon("calendar/images/iconCalendar.gif");
											$myCalendar->setPath("calendar/");
											$myCalendar->setYearInterval(2000, 2015);
											$myCalendar->dateAllow('2008-05-13', '2010-03-01');
											$myCalendar->setDateFormat('j F Y'); 
											$myCalendar->writeScript(); 
										 ?>
                                          <br>
                                          <input id="datepicker" type="text" name="date" />
	
                                            <input name="jc_date"  id="jc_date" type="text" class="form-poshytip" title="Selecciona la fecha y hora" />  <img onClick="viewCalendar('jcalendar_parent', 'jc_date')" style="margin-top: 5px;" width="20" height="20" src="img/calendar-32x32.png" alt="CAL" border="0">
                                        <div id="jcalendar_parent" class="jcalendar_parent" style="z-index: 999"></div>
                                    		<!--<input type="text" value="" class="jc_date" id="jc_date"/>-->
                            </p>

                               
                        
                        <h2 class="heading"><font color="#FFFFFF">Concierge</font></h2>	
                        <br>						
						<p>
							<label for="nombre" ><font color="#FFFFFF">Nombre</font></label>
							<input name="nombre"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" />
						</p>
						<p>
							<label for="appaterno" ><font color="#FFFFFF">Apellido Paterno</font></label>
							<input name="appaterno"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />
						</p>
                       	<p>
							<label for="email" ><font color="#FFFFFF">Email</font></label>
							<input name="email"  id="email" type="text" class="form-poshytip" title="Ingresa tu correo" />
						</p>
						<p>
							<label for="telefono" ><font color="#FFFFFF">Teléfono</font></label>
							<input name="telefono"  id="telefono" type="text" class="form-poshytip" title="Ingresa tu teléfono" />
						</p>
						
                        <p>
                        	<label for="empresa" ><font color="#FFFFFF">Resort</font></label>
                        	<select name="empresa">
                                <option value="selecciona">Selecciona resort</option>
                                <option value="rosewood">Rosewood</option>
                                <option value="fairmont">Fairmont</option>
                                <option value="Banyan Tree">Banyan Tree</option>
                            </select>                        </p>
						<p>
							<label for="total"><font color="#FFFFFF">Total Jugadores</font></label>
							<input name="total"  id="total" type="text" class="form-poshytip" title="Ingresa el total de jugadores" />
						</p>
                        <br>
						<h2 class="heading"><font color="#FFFFFF">Jugadores</font></h2>
                        <br>
                        <!-- Tabs -->
					
					<ul class="tabs">
						<li><a href="#"><span>Singles</span></a></li>
						<li><a href="#"><span>Dobles </span></a></li>
						
					</ul>
	
					<div class="panes">
						<div>
							<p>
                            	<div class="toggle-trigger">Jugador 1</div>		
                        		<div class="toggle-container">
                                    <p>
                                    <label for="nombres1" >Nombre</label>
                                    <input name="nombres1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternos1" >Apellido Paterno</label>
                                        <input name="appaternos1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotass1" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacions1" >No. Habitación</label>
                                        <input name="habitacions1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                       			</div>
							</p>	
                            <p>			
								<div class="toggle-trigger">Jugador 2</div>			
                        		<div class="toggle-container">
                                     <p>
                                    <label for="nombres2" >Nombre</label>
                                    <input name="nombres2"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternos2" >Apellido Paterno</label>
                                        <input name="appaternos2"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotass2" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacions2" >No. Habitación</label>
                                        <input name="habitacions2"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                        		</div>
                             </p>
					
					                  
				    <!-- ENDS Toggle -->
                          
	
						</div>
                        
						<div>							
							<p>
                            	<div class="toggle-trigger">Jugador 1</div>		
                                <div class="toggle-container">
                                    <p>
                                    <label for="nombrej1" >Nombre</label>
                                    <input name="nombrej1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternoj1" >Apellido Paterno</label>
                                        <input name="appaternoj1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotas" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacionj1" >No. Habitación</label>
                                        <input name="habitacionj1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                                </div>
							</p>	
                            <p>		
                        		<div class="toggle-trigger">Jugador 2</div>			
                           		<div class="toggle-container">
                                     <p>
                                    <label for="nombrej1" >Nombre</label>
                                    <input name="nombrej1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternoj1" >Apellido Paterno</label>
                                        <input name="appaternoj1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotas" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacionj1" >No. Habitación</label>
                                        <input name="habitacionj1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                           		</div>
                            </p>
                            <p>
                            	<div class="toggle-trigger">Jugador 3</div>		
                                <div class="toggle-container">
                                    <p>
                                    <label for="nombrej1" >Nombre</label>
                                    <input name="nombrej1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternoj1" >Apellido Paterno</label>
                                        <input name="appaternoj1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotas" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacionj1" >No. Habitación</label>
                                        <input name="habitacionj1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                                </div>
                            </p>
                            <p>
                            	<div class="toggle-trigger">Jugador 4</div>		
                                <div class="toggle-container">
                                    <p>
                                    <label for="nombrej1" >Nombre</label>
                                    <input name="nombrej1"  id="name" type="text" class="form-poshytip" title="Ingresa tu nombre" /> &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="raqueta" value="raqueta" /> ¿Requiere raqueta?<br />
                                    </p>
                                    <p>
                                        <label for="appaternoj1" >Apellido Paterno</label>
                                        <input name="appaternoj1"  id="appaterno" type="text" class="form-poshytip" title="Ingresa tu apellido paterno" />  &nbsp;&nbsp; &nbsp;&nbsp;  <input type="checkbox" name="pelotas" value="pelotas" /> ¿Requiere pelotas?<br />
                                    </p>
                                    <p>
                                        <label for="habitacionj1" >No. Habitación</label>
                                        <input name="habitacionj1"  id="habitacion" type="text" class="form-poshytip" title="Ingresa la habitación del huesped" />
                                    </p>
                                </div>
                           </p>
						</div>
						
						
					</div>
					<!-- ENDS TABS -->
                    	<br>
						<p>
							
							 <input type="checkbox" name="asistencia" value="raqueta" /> <font color="#FFFFFF">¿Requiere asistencia?</font><h4> <font color="#FF0000"> Recuerde, si el cliente requiere asistencia debe de reservar mínimo 24 hrs. antes. </font> </h4><br/>
						</p>
						
                        <br>
						<!-- send mail configuration -->
						<input type="hidden" value="your@email.com" name="to" id="to" />
						<input type="hidden" value="ENter the subject here" name="subject" id="subject" />
						<input type="hidden" value="send-mail.php" name="sendMailUrl" id="sendMailUrl" />
						<!-- ENDS send mail configuration -->
						
                        
                        
						<p><input type="button" value="Send" name="submit" id="submit" /> <span id="error" class="warning">Message</span></p>
					</fieldset>
					
				</form>
				<p id="sent-form-msg" class="success">Form data sent. Thanks for your comments.</p>
				<!-- ENDS form -->				
				
    			<script>
					$(function() {
						$( "#datepicker" ).datepicker({ });
					});
				</script>
			
				
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