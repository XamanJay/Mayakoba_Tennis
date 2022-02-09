<?php 
//inicio
session_start();
require_once("include/conexion.php"); 
$para_cancelar=$_REQUEST["fecha_reservacion"];
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
		
        <!-- JCALENDAR -->
         <link href="css/jCalendar.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="js/jCalendar.js"></script>
        
        
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
				
				<p><h1><font color="#FFFFFF">CANCELAR RESERVACIONES</font></h1></p>
				
				<!-- form -->
			
				
                    		
                           	<form id="Seleccionafecha" onClick="cancelar1.php?fecha_reservacion='$fechar'"  method="post" >
                                    	
                                        	<label for="jc_date" ><font color="#FFFFFF">Fecha de reservación</label>
                                          
                                            <input name="jc_date"  id="jc_date" type="text" class="form-poshytip" title="Selecciona la fecha y hora"  />  <img onClick="viewCalendar('jcalendar_parent', 'jc_date')" style="margin-top: 5px;" width="20" height="20" src="img/calendar-32x32.png" alt="CAL" border="0">
                                        <div id="jcalendar_parent" class="jcalendar_parent" style="z-index: 999"></div>
                                    		<!--<input type="text" value="" class="jc_date" id="jc_date"/>-->
                                            <?php     
						$diar = substr($jc_date,0,2);
						// recuperamos el mes
						$mesr = substr($jc_date,3,2);
						//recuperamos el año
						$agnor = substr($jc_date,6,4);
						//Formamos el fomrato de fecha que esta en mysql
						$fechar= $agnor."-".$mesr."-".$diar;
						$horar = substr($jc_date,11,4);
						$horar = $horar.":00";
						echo $horar;
						echo $fechar;
					  ?>
                                            <input type="submit" value="Consultar" name="submit" id="submit"  /> 
                                       </form>
                            </p>
                            
                     <form id="contactForm" action="cancelarreserva.php" method="post" >
					<fieldset>        
                      

                               <p>
                        <?php 
						
						$querySQL1="SELECT hora_reservacion,guid from reservacion where fecha_reservacion='$para_cancelar'";
						$resultado1=mysql_db_query($db,$querySQL1,$con); ?>
	            
        <table cellpadding="0" cellspacing="0" border="1">
        <thead>
					<tr>
                    	<th align="center"> <font color="#FFFFFF"> Hora Reservación	</font></th>
						<th align="center"> <font color="#FFFFFF"> Cambiar estatus	</font></th> </tr> </thead>
 <?php   
 $contador=0;
 while($reservacion1=mysql_fetch_array($resultado1)){
	  ?>
     <tr>
     <td> <?php	 echo $reservacion1["hora_reservacion"]; ?> </td>
	 <td> <?php  echo $reservacion1[""].'<input type="checkbox" name="formDoor[]" value='.$reservacion1['guid'].'>'; ?> </td> </tr>
 <?php }?>
 </table>	
        				
 </p>
 <?php
                $querySQL='';
				$querySQL="SELECT r.id_reservacion,r.hora_reservacion,r.guid,r.status,j.nombre_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.telefono1 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion='$fechar'"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 
    
                
     ?>
               
                  
                </p> 
                
             <span style="position: relative; top: 0px; left: 0px;">
                    <label for="usernamesignup" class="uname" >Hora de reservacion
                    
                 
                    
            </label>        </span>
                     
            
	
 <table cellpadding="0" cellspacing="0" border="2" bordercolor="#FFFFFF" >
 <thead>
					<tr>
                    	<th align="center"> <font color="#FFFFFF"> Hora Reservación	</font></th>
						<th align="center"> <font color="#FFFFFF"> Nombre	</font></th>
						<th align="center"> <font color="#FFFFFF"> Hotel </font>   </th>
                        <th align="center"> <font color="#FFFFFF"> Habitación </font> </th>
                        <th align="center"> <font color="#FFFFFF"> Contacto </font> </th>
                         <th align="center"> <font color="#FFFFFF">Teléfono </font> </th>
                         <th align="center"> <font color="#FFFFFF"> Estatus </font> </th>
						
					</tr>
				</thead>
 <?php   
 $contador=0;
 while($reservacion=mysql_fetch_array($resultado)){
          
            ?>
             
             <tr>
          
                 <td> <?php echo $reservacion["hora_reservacion"]; ?> </td>
                 <td> <?php echo $reservacion["nombre_jugador"]; ?> </td>
                 <td> <?php echo $reservacion["hotel"]; ?> </td>
                 <td> <?php echo $reservacion["habitacion"]; ?> </td>
                 <td> <?php echo $reservacion["nombre_contacto"]; ?> </td>
                 <td> <?php echo $reservacion["telefono1"];?>  </td> 
                 <td> <?php echo $reservacion["status"];?>  </td> </tr>
         <?php      
    }    
?>
             
        </table>

    </label>
						</span>
                       
						<p><input type="submit" value="Cancelar" name="submit" id="submit" /> 
					</fieldset>
					</font>
				</form>
				
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