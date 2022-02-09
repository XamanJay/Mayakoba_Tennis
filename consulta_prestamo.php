<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$nombre= $_POST["nombre"];


	?>
<!doctype html>
<html class="no-js">

	<head>
		<meta charset="utf-8"/>
		<title>Condominio Mayakoba</title>
		 <!-- reply move form -->
  <script src="js/moveform.js"></script>
   <link rel="stylesheet" href="css/responsive-tables.css">
        <script src="js/responsive-tables.js"></script>
      	
        
        <style>
			.login {
					 width: 200px;
					 margin: 0 auto;
				  }
		    	table {
					
		border-collapse:collapse;
		border-left:1px solid #686868;
		border-right:1px solid #686868;
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
}

table a:link {}

table a:visited {
		font-weight:normal;
		color:#666;
		text-decoration: line-through;
}

table a:hover {
		border-bottom: 1px dashed #000;
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
                $querySQL='';
				$querySQL="Select j.apellido_jugador,j.nombre_jugador,r.hora_reservacion,r.guid,r.cancha,p.equipo,p.estatus_equipo from reservacion r inner join (jugadores j inner join prestamo p on j.id_jugador=p.id_jugador) on r.id_reservacion=p.id_reservacion where j.nombre_jugador='$nombre'"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 
    
                
     ?>
               
                  
                </p> 
                
           
                     
            
	
 <table cellpadding="0" cellspacing="0" border="2" class="responsive" bordercolor="#FFFFFF" style="background-color:#000; opacity:0.8;">
 <thead>
					<tr>
                    	<th align="center"> <font color="#FFFFFF"> Apellido Jugador	</font></th>
                        <th align="center"> <font color="#FFFFFF"> Nombre Jugador	</font></th>
                        <th align="center"> <font color="#FFFFFF"> Hora Reservación	</font></th>
                        <th align="center"> <font color="#FFFFFF"> Cancha </font></th>
                        <th align="center"> <font color="#FFFFFF"> Equipo</font></th>
						<th align="center"> <font color="#FFFFFF"> Estatus</font></th>
						</tr>
					</tr>
				</thead>
 <?php   
 $contador=0;
 $aux=0;
 while($reservacion=mysql_fetch_array($resultado)){
          $aux=$aux+1;
            ?>
             
             <tr>
          		<td> <font color="#FFFFFF"><?php echo $reservacion["apellido_jugador"]; ?> </font></td>
                <td> <font color="#FFFFFF"><?php echo $reservacion["nombre_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["hora_reservacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["cancha"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php  echo $reservacion["equipo"]; ?>  </font></td>
                 <td> <font color="#FFFFFF"><?php  echo $reservacion["estatus_equipo"]; ?>  </font></td>
		        </tr>
         <?php      
    }    
?>  
             
        </table>

   
				
				
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