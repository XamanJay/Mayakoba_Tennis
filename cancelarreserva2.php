<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$jc_date= $_POST["jc_date"];

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
	
	
		
               <form id="contactForm" action="cancelarreserva.php" method="post" >
					<fieldset> 
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
						
					  ?>
                                          
                            </p>
                            
                            
                      

    
 </p>
 <?php
                $querySQL='';
				$querySQL="SELECT r.id_reservacion,r.cancha,r.hora_reservacion,r.guid,r.status,j.nombre_jugador,j.apellido_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.telefono1 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion='$fechar' and r.status!='cancelada'"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 
    
                
     ?>
               
                  
                </p> 
                
           
                     
            
	
 <table cellpadding="0" cellspacing="0" border="2" class="responsive" bordercolor="#FFFFFF" style="background-color:#000; opacity:0.8;">
 <thead>
					<tr>
                    	<th align="center"> <font color="#FFFFFF"> Hora </font></th>
                        <th align="center"> <font color="#FFFFFF"> Cancha </font></th>
                        <th align="center"> <font color="#FFFFFF"> Apellido </font></th>
						<th align="center"> <font color="#FFFFFF"> Nombre </font></th>
						<th align="center"> <font color="#FFFFFF"> Hotel </font>   </th>
                        <th align="center"> <font color="#FFFFFF"> Habitación </font> </th>
                        <th align="center"> <font color="#FFFFFF"> Contacto </font> </th>
                         <th align="center"> <font color="#FFFFFF">Teléfono </font> </th>
                         <th align="center"> <font color="#FFFFFF"> Estatus </font> </th>
						<th align="center"> <font color="#FFFFFF"> Cancelar </font></th></tr>
					</tr>
				</thead>
 <?php   
 $contador=0;
 while($reservacion=mysql_fetch_array($resultado)){
          
            ?>
             
             <tr>
          
                 <td> <font color="#FFFFFF"><?php echo $reservacion["hora_reservacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["cancha"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["apellido_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["nombre_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["hotel"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["habitacion"]; ?> </td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["nombre_contacto"]; ?> </font></td>
                 <td> <font color="#FFFFFF"><?php echo $reservacion["telefono1"];?>  </font></td> 
                 <td> <font color="#FFFFFF"><?php echo $reservacion["status"];?>  </font></td> 
                 <td> <font color="#FFFFFF"><?php  echo '<input type="checkbox" name="cancelar[]" value='.$reservacion['guid'].'>'; ?>  </font></td></tr>
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