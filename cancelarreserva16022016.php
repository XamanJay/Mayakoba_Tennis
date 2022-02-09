<?php 
//inicio
session_start();
require_once("include/conexion.php"); 

$correo=$_SESSION['usuario'];

$diar=date(d);
$mesr=date(m);
$anio=date(Y);
$dia_actual=$diar."/".$mesr."/".$anio;

$aDoor = $_REQUEST['cancelar'];
$dominio = $_SESSION["dominiom"];
$hotel=$_SESSION["hotel"];  
 
  
$N = count($aDoor);
for ($i=0; $i <= $N; $i++)
	{
     	$querySQL1="SELECT * from reservacion where guid='$aDoor[$i]' and status='cancelada'";
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
			//Validamos si el dominio es condominiomayakoba entonces va a poder realizar el update de la cancelación de lo contrario
			//va a tener que validar que la reservación sea del mismo resort.
			if ($dominio=='condominiomayakoba.com')
			{
			  $query_usr="UPDATE reservacion SET status='cancelada' WHERE guid='$aDoor[$i]'";
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
				if($dominio == $arrEmail[1])
				{
					$query_usr="UPDATE reservacion SET status='cancelada' WHERE guid='$aDoor[$i]'";
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
							alert('Esta reservacin pertenece a otro Hotel, no puedes cancelar.');
							javascript:history.back();
						  </script>";
				}
			}

		}
    }
 		 
		 
	?>

  
               