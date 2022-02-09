<?php 
//inicio
session_start();
require_once("include/conexion.php"); 
$correo=$_SESSION['usuario'];
$nombre_usuario = $_SESSION["usuario"];
	if(strlen(trim($nombre_usuario))==0)
	{
		echo "<script type='text/javascript'>
				alert('No estás logueado.');
				window.location='http://reservation.mayakoba.com/index.html';
			  </script>";
			  exit();
	}

$diar=date(d);
$mesr=date(m);
$anio=date(Y);
$dia_actual=$diar."/".$mesr."/".$anio;

?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
<?php

			
		$guid = $_REQUEST['reserva'];
		$dominio = $_SESSION["dominiom"];
		
		$hotel=$_SESSION["hotel"];  
		  
		$querySQL1="SELECT * from reservacion where guid='$guid' and status='cancelada'";
		$resultado1=mysql_db_query($db,$querySQL1,$con); 
		$contador=0;
		while($reservacion1=mysql_fetch_array($resultado1))
		{
			$contador=$contador+1;
			//Recuperamos el usuario que ingresó la reservacion
			$concierge= $reservacion1["usuario"];
		}
						  
		
		if ($contador<>0)  
		{
			
			echo "<script type='text/javascript'>
			alert('Ya ha sido cancelada previamente');
			javascript:window.back();
		  </script>";
		}
		else 
		{
				$querySQL1="SELECT * from reservacion where guid='$guid'";
				
				$resultado1=mysql_db_query($db,$querySQL1,$con); 
				$contador=0;
				$concierge='';
				while($reservacion1=mysql_fetch_array($resultado1))
				{
					$contador=$contador+1;
					//Recuperamos el usuario que ingresó la reservacion
					$concierge= $reservacion1["usuario"];
					$fechacancelarion= $reservacion1["fecha_reservacion"];
					
				}
				//Descomponemos la fecha de la reservacion por cancelarce
				$diarp = substr($fechacancelarion,8,2);
				$mesrp = substr($fechacancelarion,5,2);
				$ayorp = substr($fechacancelarion,0,4);
				
				echo $diarp.'-'.$mesrp.'-'.$ayorp.'<br>';
				//Validamos que no pueda cancenlar reservaciones pasadas a la fecha de hoy
				// CDonvertimos klas fechas a Juliano
				
				  $diasDesdeJuliano = gregoriantojd($mesr, $diar, $anio);
				  $diasHastaJuliano = gregoriantojd($mesrp, $diarp,$ayorp);
				echo $diasHastaJuliano - $diasDesdeJuliano;
				
				//Validamos si el dominio es condominiomayakoba entonces va a poder realizar el update de la cancelación de lo contrario
				//va a tener que validar que la reservación sea del mismo resort.
				if ($dominio=='condominiomayakoba.com')
				{
				  $query_usr="UPDATE reservacion SET status='cancelada' WHERE guid='$guid'";
				  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
																					  
				  //SELECCIONAMOS LA BASE DE DATOS 
				  mysql_select_db("reservation");
				  
				  //EJECUTAMOS LA CONSULTA
				  mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
				  
				  echo "<script type='text/javascript'>
					alert('Reservacion cancelada');
					window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
				  </script>";
				}
				else
				{
						//Validamos si el dominio del usuario que ingresó la reservación 
					$arrEmail = explode("@",$concierge);	
					//echo $arrEmail[1];
					if($dominio == $arrEmail[1])
						{
							$query_usr="UPDATE reservacion SET status='cancelada' WHERE guid='$guid'";
							  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
																								  
							  //SELECCIONAMOS LA BASE DE DATOS 
							  mysql_select_db("reservation");
							  
							  //EJECUTAMOS LA CONSULTA
							  mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
							  echo "<script type='text/javascript'>
								alert('Reservacion cancelada');
								window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
							  </script>";
						}
						else
						{
							// mandamos mensaje de error que no tiene permiso para cancelar dicha reservación
							echo "<script type='text/javascript'>
									alert('Esta reservacion pertenece a otro Hotel, no puedes cancelar.');
									window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
								  </script>";
						}
				 }
		
				
		  }

		 
	?>

  
</body>

</html>
                 