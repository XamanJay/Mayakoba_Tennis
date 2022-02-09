<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];
$jc_date= $_REQUEST["jc_date"];
$jc_datef= $_REQUEST["jc_datef"];


$agnoi = substr($jc_date,0,4);
// recuperamos el mes
$mesi = substr($jc_date,5,2);
//recuperamos el año
$diai = substr($jc_date,8,2);
//Formamos el fomrato de fecha que esta en mysql
$fechai= $diai."/".$mesi."/".$agnoi;
$tituloInicial=$diai.$mesi.$agnoi;

$agnoif = substr($jc_datef,0,4);
// recuperamos el mes
$mesif = substr($jc_datef,5,2);
//recuperamos el año
$diaif = substr($jc_datef,8,2);
$tituloFinal = $diaif.$mesif.$agnoif;

//Formamos el fomrato de fecha que esta en mysql
$fechaif= $diaif."/".$mesif."/".$agnoif;

$fechareporte = 'reporte'.$tituloInicial.'_'.$tituloFinal.'.xls';
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$fechareporte");
header("Pragma: no-cache");
header("Expires: 0"); 
	?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JQuery Excel</title>


<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script language="javascript">
$(document).ready(function() {
	$(".botonExcel").click(function(event) {
		$("#datos_a_enviar").val( $("<div>").append( $("#Exportar_a_Excel").eq(0).clone()).html());
		$("#FormularioExportacion").submit();
});
});
</script>
<style type="text/css">
.botonExcel{cursor:pointer;}
</style>
</head>
<body>

</p>
        
 <?php
 			
			
                $querySQL='';
				$querySQL="SELECT r.fecha_reservacion,r.id_reservacion,r.cancha,r.hora_reservacion,r.guid,r.status,r.comentario,j.nombre_jugador,j.apellido_jugador,j.hotel,j.habitacion,c.nombre_contacto,c.apellido_contacto,c.telefono1,r.fecha_sistemas 
FROM reservacion r INNER JOIN ( contacto c  inner join jugadores j on j.id_contacto=c.id_contacto) on j.id_reservacion=r.id_reservacion WHERE r.fecha_reservacion >='$jc_date' and r.fecha_reservacion <='$jc_datef' order by r.fecha_reservacion DESC"; 
                
    $resultado=mysql_db_query($db,$querySQL,$con); 

$titulo='<h3> REPORTE MENSUAL DEL '.$fechai.' AL  '.$fechaif.'</h3>';                
 $tabla .= '<table cellpadding="0" cellspacing="0" border="2" class="responsive" bordercolor="#000" style="background-color:#FFF; opacity:0.8;">
 <caption> '.$titulo.' </caption>
 <thead>
					<tr>
                    	<th align="center"> <font color="#000"> Fecha Reservación	</font></th>
                        <th align="center"> <font color="#000"> Cancha	</font></th>
						<th align="center"> <font color="#000"> Huesped	</font></th>
						<th align="center"> <font color="#000"> Hotel </font>   </th>
                        <th align="center"> <font color="#000"> Habitación </font> </th>
                        <th align="center"> <font color="#000"> Concierge </font> </th>
                         <th align="center"> <font color="#000">Teléfono </font> </th>
                         <th align="center"> <font color="#000"> Fecha Sistema </font> </th>
						<th align="center"> <font color="#000"> Comentario </font> </th>
					</tr>
				</thead>';
  
 $contador=0;
 while($reservacion=mysql_fetch_array($resultado)){
          
          
             
   $tabla .='<tr>          
                 <td> <font color="#000"> '.$reservacion["fecha_reservacion"].' '.$reservacion["hora_reservacion"].'  </font></td>
                 <td> <font color="#000"> '.$reservacion["cancha"].' </font></td>
                 <td> <font color="#000"> '.$reservacion["apellido_jugador"].' ' .$reservacion["nombre_jugador"].'  </font></td>
                 <td> <font color="#000"> '.$reservacion["hotel"].' </font></td>
                 <td> <font color="#000"> '.$reservacion["habitacion"].' </font></td>
                 <td> <font color="#000"> '.$reservacion["apellido_contacto"].' '. $reservacion["nombre_contacto"].'  </font></td>
                 <td> <font color="#000"> '.$reservacion["telefono1"].'  </font></td> 
                 <td> <font color="#000"> '.$reservacion["fecha_sistemas"].' </font> </td> 
				 <td> <font color="#000"> '.$reservacion["comentario"].' </font> </td> 
				 </tr>';
             
    }    

             
 $tabla.='</table>';
 
 echo $tabla;
 ?>
      

</body>
</html>
