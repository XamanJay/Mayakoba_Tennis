<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$jc_date= $_REQUEST["jc_date"];


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
			.login 
				{
					 width: 200px;
					 margin: 0 auto;
				}
		    table 
				{
					border-collapse:collapse;
					border-left:1px solid #686868;
					border-right:1px solid #686868;
					-webkit-border-radius: 15px;
					-moz-border-radius: 15px;
					border-radius: 15px;
					font:1.0em/145% 'Trebuchet MS',helvetica,arial,verdana;
					text-align:center;
					color: #333;
				}

				td, th {
						padding:5px;
				}
				
				table a {
						color:#950000;
						text-decoration:none;
						-webkit-border-radius: 15px;
						-moz-border-radius: 15px;
						border-radius: 15px;
				}
				
				table a:link {}
				
				table a:visited {
						font-weight:normal;
						color:#666;
						text-decoration: line-through;
				}
				
				table a:hover {
						border-bottom: 1px dashed #bbb;
				}
				
				/* =head =foot
				----------------------------------------------- */
				
				thead th, tfoot th, tfoot td {
						background:#333 url(../images/llsh.gif) repeat-x;
						color:#fff
					
				}
				
				tfoot td {
						text-align:right
				}
				
				/* =body
				----------------------------------------------- */
				
				tbody th, tbody td {
						border-bottom: dotted 1px #333;
						
				}
				
				tbody th {
						white-space: nowrap;
						
				}
				
				tbody th a {
						color:#333;
				}
				
				.odd {}
				
				tbody tr:hover {
						background:#000000
					
				}

        </style>
       
         <!-- Responsive design tablas -->
        <link rel="stylesheet" href="css/responsive-tables.css">
        <script src="js/responsive-tables.js"></script>
        
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
					
					<li><a href="#">Reservaciones</a>
						<ul>
							<li><a href="reservacion.html">Nueva Reservación</a></li>
							<li><a href="http://reservation.mayakoba.com/cancelar2.php">Cancelar Reservación</a></li>
							<li><a href="http://reservation.mayakoba.com/consulta.php">Consultar Reservación</a></li>
						</ul>
					</li>
                    <li><a href="http://reservation.mayakoba.com/index.html">Log out</a></li>
					
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
					<?php     
                        $diar = substr($jc_date,0,2);
                        // recuperamos el mes
                        $mesr = substr($jc_date,3,2);
                        //recuperamos el año
                        $agnor = substr($jc_date,6,4);
                        //Formamos el fomrato de fecha que esta en mysql
                        $fechar= $agnor."-".$mesr."-".$diar;
                        
                        //$horar = substr($jc_date,11,4);
                        //$horar = $horar.":00";
                    ?>
                    </p>
                    <?php
						$querySQL='';
						$querySQL="SELECT r.id_reservacion,r.hora_reservacion,r.guid,r.status,j.nombre_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.telefono1,r.tipo_usuario
									FROM jugadores j
									inner join reservacion r on j.id_jugador = r.id_reservacion
									INNER JOIN contacto c on j.id_contacto = c.id_contacto
									WHERE r.fecha_reservacion='$fechar'"; 
					
						 $resultado=mysql_db_query($db,$querySQL,$con);                
    				 ?>
               
                  
                </p> 
              
            
                     
            
	
 <table cellpadding="0" cellspacing="0" border="2" class="responsive" bordercolor="#FFFFFF" style="background-color:#000; opacity:0.8;">
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
 while($reservacion=mysql_fetch_array($resultado))
 		{
          // validamos el tipo de usuario, si es huesped entonces pintamos de azul la fila
		  	if($reservacion["tipo_usuario"]=='empleado')
			{
 ?>
 				 <tr bgcolor="#0066FF">          
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["hora_reservacion"]; ?> </font></td>
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_jugador"]; ?> </font></td>
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["hotel"]; ?> </font></td>
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["habitacion"]; ?> </font></td>
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_contacto"]; ?> </font></td>
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["telefono1"];?>  </font></td> 
                     <td> <font color="#FFFFFF"> <?php echo $reservacion["status"];?> </font> </td>
             	</tr>
 <?php
			}
			else
			{
 ?>
             
             <tr bgcolor="#FF0000">
          
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["hora_reservacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["hotel"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["habitacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_contacto"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["telefono1"];?>  </font></td> 
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["status"];?> </font> </td>
             </tr>
<?php 
			}
    	}    
?>
             
        </table>
		        
		<p>
            <ul class="list-buttons">
                
                <li><a href="http://reservation.mayakoba.com/calendario.php" class="link-button red"><font color="#FFFFFF">Regresar a Calendario</font></a></li>
               
            </ul>
        </p>
					
	 </div><!-- ENDS WRAPPER -->
			</div>
		<!-- ENDS MAIN -->
		
		
		<!-- FOOTER -->
		<footer>
			
		</footer>
		<!-- ENDS FOOTER -->
	
	
	
</html>