<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$jc_date= $_POST["jc_date"];
$jc_datef= $_POST["jc_datef"];


	?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Condominio Mayakoba</title>
		 
      	
        
        
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
		    	table {
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
	
	
		
		
		
<?php     
						$mesr = substr($jc_date,0,2);
						// recuperamos el mes
						$diar = substr($jc_date,3,2);
						//recuperamos el año
						$agnor = substr($jc_date,6,4);
						//Formamos el fomrato de fecha que esta en mysql
						$fechar= $agnor."-".$mesr."-".$diar;
						$horar = substr($jc_date,11,4);
						$horar = $horar.":00";
						
						
						$mesrf = substr($jc_datef,0,2);
						// recuperamos el mes
						$diarf = substr($jc_datef,3,2);
						//recuperamos el año
						$agnorf = substr($jc_datef,6,4);
						//Formamos el fomrato de fecha que esta en mysql
						$fecharf= $agnorf."-".$mesrf."-".$diarf;
						$horarf = substr($jc_date,11,4);
						$horarf = $horar.":00";
						?>
                                          
                            </p>
                            
                            
                      

        
 <?php
                $querySQL='';
				$querySQL="";
				
				$querySQL="SELECT r.fecha_reservacion,r.id_reservacion,r.cancha,r.hora_reservacion,r.guid,r.status,r.comentario,j.nombre_jugador,j.apellido_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.apellido_contacto,c.telefono1,r.fecha_sistemas 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion >='$fechar' and r.fecha_reservacion <='$fecharf' order by r.fecha_reservacion DESC"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 
                
    
                
     ?>
               
                  
                </p> 
                
            
                              
<a href="exportexcel.php?jc_date=<?php echo $fechar; ?>&jc_datef=<?php echo $fecharf; ?> "> <img src="img/excel.jpg" width="22px" height="22px"> Exportar a Excel</a>
 <table cellpadding="0" cellspacing="0" border="2" class="responsive" bordercolor="#FFFFFF" style="background-color:#000; opacity:0.8;">
 <thead>
					<tr>
                    	<th align="center"> <font color="#FFFFFF"> Fecha Reservación	</font></th>
                        <th align="center"> <font color="#FFFFFF"> Cancha	</font></th>
						<th align="center"> <font color="#FFFFFF"> Huesped	</font></th>
						<th align="center"> <font color="#FFFFFF"> Hotel </font>   </th>
                        <th align="center"> <font color="#FFFFFF"> Habitación </font> </th>
                        <th align="center"> <font color="#FFFFFF"> Concierge </font> </th>
                        <th align="center"> <font color="#FFFFFF">Teléfono </font> </th>
                        <th align="center"> <font color="#FFFFFF"> Fecha Sistema </font> </th>
                        <th align="center"> <font color="#FFFFFF"> Comentario </font> </th>
						
					</tr>
				</thead>
 <?php   
 $contador=0;
 while($reservacion=mysql_fetch_array($resultado)){
          
            ?>
             
             <tr>
          
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["fecha_reservacion"].' '.$reservacion["hora_reservacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["cancha"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["apellido_jugador"].' ' .$reservacion["nombre_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["hotel"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["habitacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["apellido_contacto"].' '. $reservacion["nombre_contacto"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["telefono1"];?>  </font></td> 
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["fecha_sistemas"];?> </font> </td> 
                  <td> <font color="#FFFFFF"> <?php echo $reservacion["comentario"];?> </font> </td> 
             </tr>
         <?php      
    }    
?>
             
        </table>
      
</div>
   	
					
	</body>
	
	
	
</html>