<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$jc_date= $_POST["jc_date"];

	?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

  
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
                            
                            
                      

        
 <?php
                $querySQL='';
				$querySQL="SELECT r.id_reservacion,r.hora_reservacion,r.guid,r.status,j.nombre_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.telefono1 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion='$fechar'"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 
    
                
     ?>
               
                  
                </p> 
                
            
                     
            
	
 <table cellpadding="0" cellspacing="0" border="2" bordercolor="#FFFFFF" style="background-color:#000; opacity:0.8;">
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
          
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["hora_reservacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_jugador"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["hotel"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["habitacion"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["nombre_contacto"]; ?> </font></td>
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["telefono1"];?>  </font></td> 
                 <td> <font color="#FFFFFF"> <?php echo $reservacion["status"];?> </font> </td> </tr>
         <?php      
    }    
?>
             
        </table>
</body>
</html>