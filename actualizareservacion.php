<? 
	session_start();
	require_once("include/conexion.php"); 
	//recuperamos la session para poder insertarla en la base de datos.
	$nombre_usuario = $_SESSION["usuario"];
	if(strlen(trim($nombre_usuario))==0)
	{
		echo "<script type='text/javascript'>
				alert('No estás logueado. $nombre_usuario');
				window.location='http://reservation.mayakoba.com/index.html';
			  </script>";
			  exit();
	}
	
	
	
	if ((isset($_POST['jc_date'])) && (strlen(trim($_POST['jc_date'])) > 0)) 
	{
		$jc_date = stripslashes(strip_tags($_POST['jc_date']));
		//echo $jc_date.'<br>';
	} 
	else 
	{	
		$jc_date = '';
		echo "<script type='text/javascript'>
					alert('Falta seleccionar el horario de reservación');
					history.back(); 
				  </script>";
	}
	
	if ((isset($_POST['nombre'])) && (strlen(trim($_POST['nombre'])) > 0)) 
	{
		$nombre = stripslashes(strip_tags($_POST['nombre']));
		//echo $nombre.'<br>';
		//INSERTAMOS TODO EN MAYUSCULAS
		$nombre= strtoupper($nombre);
	} 
	else 
	{	
		$nombre = '';
		echo "<script type='text/javascript'>
					alert('Falta ingresar el nombre del concierge');
					history.back(); 
				  </script>";
	}
	
	if ((isset($_POST['appaterno'])) && (strlen(trim($_POST['appaterno'])) > 0)) 
	{
		$appaterno = stripslashes(strip_tags($_POST['appaterno']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$appaterno= strtoupper($appaterno);
		//echo $appaterno.'<br>';
	} 
	else 
	{	
		$appaterno = '';
		echo "<script type='text/javascript'>
					alert('Falta ingresar el apellido del concierge');
					history.back(); 
				  </script>";
	}
	
	
	
	if ((isset($_POST['telefono'])) && (strlen(trim($_POST['telefono'])) > 0)) 
	{
		$telefono = stripslashes(strip_tags($_POST['telefono']));
		//echo $telefono.'<br>';
	} 
	else 
	{	
		$telefono = '';
		echo "<script type='text/javascript'>
					alert('Falta ingresar el teléfono del concierge');
					history.back(); 
				  </script>";
	}
	
	if ((isset($_POST['empresa'])) && (strlen(trim($_POST['empresa'])) > 0)) 
	{
		$empresa = stripslashes(strip_tags($_POST['empresa']));

		//INSERTAMOS TODO EN MAYUSCULAS
		$empresa= strtoupper($empresa);
		//echo $empresa.'<br>';
		if($empresa=='selecciona')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar el hotel');
					history.back(); 
				  </script>";
		}
	} 
	else 
	{	
		$empresa = '';
		echo "<script type='text/javascript'>
					alert('Falta seleccionar el hotel');
					history.back(); 
				  </script>";
	}
	
	
	
	if ((isset($_POST['nombres1'])) && (strlen(trim($_POST['nombres1'])) > 0)) 
	{
		$nombres1 = stripslashes(strip_tags($_POST['nombres1']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$nombres1= strtoupper($nombres1);
		//echo $nombres1.'<br>';
	} 
	else 
	{	
		$nombres1 = '';
	}
	
	if ((isset($_POST['appaternos1'])) && (strlen(trim($_POST['appaternos1'])) > 0)) 
	{
		$appaternos1 = stripslashes(strip_tags($_POST['appaternos1']));
		//echo $appaternos1.'<br>';
		//INSERTAMOS TODO EN MAYUSCULAS
		$appaternos1= strtoupper($appaternos1);
	} 
	else 
	{	
		$appaternos1 = '';
	}
	if ((isset($_POST['habitacions1'])) && (strlen(trim($_POST['habitacions1'])) > 0)) 
	{
		$habitacions1 = stripslashes(strip_tags($_POST['habitacions1']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$habitacions1= strtoupper($habitacions1);
		//echo $habitacions1.'<br>';
	} 
	else 
	{	
		$habitacions1 = '';
	}
	
	//AGREGAMOS LOS COMENTARIOS
	if ((isset($_POST['comments'])) && (strlen(trim($_POST['comments'])) > 0)) 
	{
		$comentario = stripslashes(strip_tags($_POST['comments']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$comentario= strtoupper($comentario);
		//echo $comentario.'<br>';
	} 
	else 
	{	
		$comentario = '';
	}
	
	
	if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) 
	{
		$email = stripslashes(strip_tags($_POST['email']));
		//echo $email.'<br>';
		
	} 
	else 
	{	
		echo "<script type='text/javascript'>
					alert('Falta ingresar el mail del concierge');
					history.back(); 
				  </script>";
		$email = '';
	}
	
	if ((isset($_REQUEST['rs'])) && (strlen(trim($_REQUEST['rs'])) > 0)) 
	{
		$guid_editar = stripslashes(strip_tags($_REQUEST['rs']));
		//INSERTAMOS TODO EN MAYUSCULAS
		//echo $guid_editar.'<br>';
		
	} 
	else 
	{	
		$guid_editar = stripslashes(strip_tags($_REQUEST['rs']));
		echo "<script type='text/javascript'>
					alert('No se ha podido actualizar los datos. $guid_editar');
					history.back(); 
				  </script>";
	}
	
	if ((isset($_POST['cancha'])) && (strlen(trim($_POST['cancha'])) > 0)) 
	{
		$cancha = stripslashes(strip_tags($_REQUEST['cancha']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$cancha= strtoupper($cancha);
		//echo $cancha.'<br>';
		if($cancha=='SELECCIONA')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar la cancha');
					history.back(); 
				  </script>";
				 
		}
	} 
	else 
	{	
		$cancha = '';
	}
	
	if ((isset($_POST['usuario'])) && (strlen(trim($_POST['usuario'])) > 0)) 
	{
		$usuario = stripslashes(strip_tags($_REQUEST['usuario']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$usuario= strtoupper($usuario);
		//echo $usuario.'<br>';
		if($usuario=='SELECCIONA')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar el usuario');
					history.back(); 
				  </script>";
		}
	} 
	else 
	{	
		$usuario = '';
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Actualiza reservación</title>
</head>
<body>

<?php


//Primero vamos hacer la consulta para ver si no está ocupada 
//recuperamos la fecha y ahora
//recuperamos el día
$diar = substr($jc_date,0,2);
// recuperamos el mes
$mesr = substr($jc_date,3,2);
//recuperamos el año
$agnor = substr($jc_date,6,4);
//Formamos el fomrato de fecha que esta en mysql
$fechar= $agnor."-".$mesr."-".$diar;
$horar = substr($jc_date,11,2);
$horar = $horar.":00";
$guid = uniqid (rand(), true);
$guid_md5c = md5($guid);

//armamos la fecha de reservacion
		$fecha_final =  $fechar.' '.$horar;
		$dia_now=date(d);
		$mes_now = date(m);
		$agno_now = date(Y);
		$hora_now = date(G);
		$minutos_now = date(i);
		$fecha_now =$agno_now.'-'.$mes_now.'-'.$dia_now.' '.$hora_now.':'.$minutos_now;
		

///   Original ....    $querySQL001 = "Select fecha_reservacion, hora_reservacion, tipo_usuario,cancha,id_reservacion from reservacion where guid=  '$guid_editar' and status ='activo'";

$querySQL = "Select fecha_reservacion, hora_reservacion, tipo_usuario,cancha,id_reservacion from reservacion where fecha_reservacion = '$fechar' and hora_reservacion = '$horar' and cancha = '$cancha' and status ='activo'";


//echo $querySQL;
$intContador=0;
$resultadoSQL=mysql_db_query($db,$querySQL,$con);

//echo $querySQL.'<br>';

while ($rows1 = mysql_fetch_array($resultadoSQL))
	{
		$id_reservacion_editar = $rows1["id_reservacion"];
		$intContador=$intContador+1;
		
	}
	//echo $intContador;
//Validamos, si hubo datos entonces checamos el tipo de usuario.
if($intContador>0)
{


////////////////////////////////////////////////////////////////////////////////////////

echo "<script type='text/javascript'>
		alert('Ya existe una reservación en la cancha con la misma fecha y hora, verifica por favor');
		window.history.go(-1);
	  </script>";
exit();
}
	else
	{
////////////////////////////////////////////////////////////////////////////////////////



	//recuperamos el id_contacto y el id_jugador
	$querySQL = "Select id_jugador, id_contacto from jugadores where id_reservacion= $id_reservacion_editar";
	//echo $querySQL.'<br>';
	
	$resultadoSQL=mysql_db_query($db,$querySQL,$con);
	
	$id_jugador_editar=0;
	$id_contacto_editar=0;
	while ($rows1 = mysql_fetch_array($resultadoSQL))
		{
			$id_jugador_editar = $rows1["id_jugador"];
			$id_contacto_editar = $rows1["id_contacto"];
			
		}
	
	//Insertamos en la base de datos en la tabla de .
	$objConnect = mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die(mysql_error());
	$objDB = mysql_select_db("reservation");
	
	//*** Start Transaction ***//
	mysql_query("BEGIN");
	
	//***  Query 1 ***//
	$strSQL = "UPDATE reservacion ";
	$strSQL .="SET cancha = '$cancha',tipo_usuario = '$usuario',fecha_reservacion = '$fechar',hora_reservacion = '$horar',usuario = '$nombre_usuario',comentario = '$comentario' ";
	$strSQL .="WHERE guid = '$guid_editar'";

	//echo $strSQL.'<br>';
	$objQuery1 = mysql_query($strSQL);
	
	//Actualizamos los contactos	
	$strSQL = "UPDATE contacto ";
	$strSQL .="SET nombre_contacto = '$nombre', apellido_contacto = '$appaterno',telefono1 = '$telefono',correo = '$email' ";
	$strSQL .="WHERE id_contacto = $id_contacto_editar";
	//echo $strSQL.'<br>';
	$objQuery2 = mysql_query($strSQL);
	
	
	$strSQL = "UPDATE jugadores ";
	$strSQL .="SET nombre_jugador = '$nombres1', apellido_jugador = '$appaternos1',hotel = '$empresa', habitacion = '$habitacions1'";
	$strSQL .="WHERE id_jugador = $id_jugador_editar";
	//echo $strSQL.'<br>';
	$objQuery3 = mysql_query($strSQL);
	
	if(($objQuery1) and ($objQuery2) and ($objQuery3))
	{
		
		//*** Commit Transaction ***//
		mysql_query("COMMIT");
		$diar=date(d);
		$mesr=date(m);
		$anio=date(Y);
		$dia_actual=$diar."/".$mesr."/".$anio;
		echo "<script type='text/javascript'>
		alert('Se ha actualizado la  reservación');
		window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
	  </script>";
	}
	else
	{
		
		//*** RollBack Transaction ***//
		mysql_query("ROLLBACK");
		$diar=date(d);
		$mesr=date(m);
		$anio=date(Y);
		$dia_actual=$diar."/".$mesr."/".$anio;
		//echo "Error Save [".$strSQL."]";
		echo "<script type='text/javascript'>
		alert('No se pudo actualizar.');
		window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
	  </script>";
	}
	
	mysql_close($objConnect);
}

?>
</body>
</html>