<? error_reporting(0);

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
	
	//RECUPERAMOS TODOS LOS DATOS PARA INSERTAR
	
	if ((isset($_POST['cancha'])) && (strlen(trim($_POST['cancha'])) > 0)) 
	{
		$cancha = stripslashes(strip_tags($_REQUEST['cancha']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$cancha= strtoupper($cancha);
		if($cancha=='SELECCIONA')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar la cancha');
					history.back(); 
				  </script>";
			exit();	 
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
		if($usuario=='SELECCIONA')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar el usuario');
					history.back(); 
				  </script>";
			exit();
		}
	} 
	else 
	{	
		$usuario = '';
		
	}
	
	if ((isset($_POST['jc_date'])) && (strlen(trim($_POST['jc_date'])) > 0)) 
	{
		$jc_date = stripslashes(strip_tags($_REQUEST['jc_date']));
	} 
	else 
	{	
		$jc_date = '';
		echo "<script type='text/javascript'>
					alert('Falta seleccionar el horario de reservación');
					history.back(); 
				  </script>";
		exit();
	}
	
	if ((isset($_POST['nombre'])) && (strlen(trim($_POST['nombre'])) > 0)) 
	{
		$nombre = stripslashes(strip_tags($_REQUEST['nombre']));
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
		exit();
	}
	
	if ((isset($_POST['appaterno'])) && (strlen(trim($_POST['appaterno'])) > 0)) 
	{
		$appaterno = stripslashes(strip_tags($_REQUEST['appaterno']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$appaterno= strtoupper($appaterno);
	} 
	else 
	{	
		$appaterno = '';
		echo "<script type='text/javascript'>
					alert('Falta ingresar el apellido del concierge');
					history.back(); 
				  </script>";
		exit();
	}
	
	if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) 
	{
		$email = stripslashes(strip_tags($_REQUEST['email']));
		if(verificaremail($email)==FALSE)
		{
			echo "<script type='text/javascript'>
					alert('Ingresa un mail valido.');
					history.back(); 
				  </script>";
				  
			exit();
		}
	} 
	else 
	{	
		echo "<script type='text/javascript'>
					alert('Falta ingresar el mail del concierge');
					history.back(); 
				  </script>";
				  exit();
		$email = '';
	}
	
	if ((isset($_POST['telefono'])) && (strlen(trim($_POST['telefono'])) > 0)) 
	{
		$telefono = stripslashes(strip_tags($_REQUEST['telefono']));
	} 
	else 
	{	
		$telefono = '';
		echo "<script type='text/javascript'>
					alert('Falta ingresar el teléfono del concierge');
					history.back(); 
				  </script>";
				  exit();
	}
	
	if ((isset($_POST['empresa'])) && (strlen(trim($_POST['empresa'])) > 0)) 
	{
		$empresa = stripslashes(strip_tags($_REQUEST['empresa']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$empresa= strtoupper($empresa);
		if($empresa=='SELECCIONA')
		{
			echo "<script type='text/javascript'>
					alert('Falta seleccionar el hotel');
					history.back(); 
				  </script>";
				  exit();
		}
	} 
	else 
	{	
		$empresa = '';
		echo "<script type='text/javascript'>
					alert('Falta seleccionar el hotel');
					history.back(); 
				  </script>";
				  exit();
	}
	
	
	
	if ((isset($_POST['nombres1'])) && (strlen(trim($_POST['nombres1'])) > 0)) 
	{
		$nombres1 = stripslashes(strip_tags($_REQUEST['nombres1']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$nombres1= strtoupper($nombres1);
	} 
	else 
	{	
		$nombres1 = '';
	}
	
	if ((isset($_POST['appaternos1'])) && (strlen(trim($_POST['appaternos1'])) > 0)) 
	{
		$appaternos1 = stripslashes(strip_tags($_REQUEST['appaternos1']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$appaternos1= strtoupper($appaternos1);
	} 
	else 
	{	
		$appaternos1 = '';
	}
	if ((isset($_POST['habitacions1'])) && (strlen(trim($_POST['habitacions1'])) > 0)) 
	{
		$habitacions1 = stripslashes(strip_tags($_REQUEST['habitacions1']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$habitacions1= strtoupper($habitacions1);
	} 
	else 
	{	
		$habitacions1 = '';
	}
	
	//AGREGAMOS LOS COMENTARIOS
	if ((isset($_POST['comments'])) && (strlen(trim($_POST['comments'])) > 0)) 
	{
		$comentario = stripslashes(strip_tags($_REQUEST['comments']));
		//INSERTAMOS TODO EN MAYUSCULAS
		$comentario= strtoupper($comentario);
	} 
	else 
	{	
		$comentario = '';
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inserta reservación</title>
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

//mandamos un alerta
$querySQL = "Select fecha_reservacion, hora_reservacion, tipo_usuario,cancha,id_reservacion from reservacion where fecha_reservacion = '$fechar' and hora_reservacion = '$horar' and cancha = '$cancha' and status ='activo'";
//echo $querySQL;
$intContador=0;
$resultadoSQL=mysql_db_query($db,$querySQL,$con);


while ($rows1 = mysql_fetch_array($resultadoSQL))
	{
		
		
		$fecha_reservacion = $rows1["fecha_reservacion"];
		$hora_reservacion  = $rows1["hora_reservacion"];
		$tipo_usuario  = $rows1["tipo_usuario"];
		$cancha_query  = $rows1["cancha"];
		$id_reservacion = $rows1["id_reservacion"];
		$intContador=$intContador+1;
		
		//echo $intContador;
	}
	//echo $intContador;
//Validamos, si hubo datos entonces checamos el tipo de usuario.
if($intContador>0)
{
	
	//Validamos si el tipo de usuario es huesped, entonces les enviamos un mensaje de que existe el registro
	if(strtoupper($tipo_usuario)=='HUESPED')
	{
		echo "<script type='text/javascript'>
		alert('Ya existe la reservacion');
		window.history.go(-1);
	  </script>";	
	  exit();
	}
	else
	{
		//echo $id_reservacion;
		//Actualizamos la tabla de reservaciones para cancelar el registro.
		$query_usr = "update reservacion set status='cancelado'  where id_reservacion='$id_reservacion'"; 		
		//echo "<br>".$query_usr."<br>";
		//Datos de la base de datos
		mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
		
		//SELECCIONAMOS LA BASE DE DATOS 
		mysql_select_db("reservation");
		
		//EJECUTAMOS LA CONSULTA
		mysql_query($query_usr) or die("Query: $qry <br />Error: ".mysql_error());	
		
		//Insertamos en la base de datos en la tabla de .
		$objConnect = mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die(mysql_error());
		$objDB = mysql_select_db("reservation");
		
		//*** Start Transaction ***//
		mysql_query("BEGIN");
		
		//***  Query 1 ***//
		$strSQL = "INSERT INTO reservacion ";
		$strSQL .="(cancha,tipo_usuario,fecha_reservacion,hora_reservacion,status,guid,fecha_sistemas,usuario,comentario) ";
		$strSQL .="VALUES(";
		$strSQL .="'$cancha','$usuario','$fechar','$horar','activo','$guid_md5c',NOW(),'$nombre_usuario','$comentario')";
		$objQuery1 = mysql_query($strSQL);
		
		$id_reservacion_nuevo = mysql_insert_id();
		
		
		$strSQL = "INSERT INTO contacto ";
		$strSQL .="(nombre_contacto,apellido_contacto,telefono1,correo,fecha_sistemas) ";
		$strSQL .="VALUES (";
		$strSQL .="'$nombre','$appaterno','$telefono','$email',NOW())";
		$objQuery2 = mysql_query($strSQL);
		$id_contacto_nuevo = mysql_insert_id();
		
		$strSQL = "INSERT INTO jugadores ";
		$strSQL .="(nombre_jugador,apellido_jugador,hotel,habitacion,id_contacto,id_reservacion,fecha_sistemas) ";
		$strSQL .="VALUES (";
		$strSQL .="'$nombres1','$appaternos1','$empresa','$habitacions1',$id_contacto_nuevo,$id_reservacion_nuevo,NOW())";
		
		$objQuery3 = mysql_query($strSQL);
		
		if(($objQuery1) and ($objQuery2))
		{
			
			//*** Commit Transaction ***//
			mysql_query("COMMIT");
			$diar=date(d);
			$mesr=date(m);
			$anio=date(Y);
			$dia_actual=$diar."/".$mesr."/".$anio;
			
			echo "<script type='text/javascript'>
			alert('Se ha creado la nueva reservación');
			window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
		  </script>";
		}
		else
		{
			
			//*** RollBack Transaction ***//
			mysql_query("ROLLBACK");
			//echo "Error Save [".$strSQL."]";
			echo "<script type='text/javascript'>
			alert('No se pudo crear la reservación con asistencia $strSQL');
			window.location='http://reservation.mayakoba.com/reservacion.html';
		  </script>";
		}
		mysql_close($objConnect);		
	}
	
		
}//end if si existe en la abse de datos
else// si no existe en la base de datos.
{
	$diar=date(d);
	$mesr=date(m);
	$anio=date(Y);
	//$dia_actual=$diar."/".$mesr."/".$anio;
	//recuperamos la fecha del dia de hoy 
	$fechacancelarion = $fechar;
	//echo $fechacancelarion;
	
	//Descomponemos la fecha de la reservacion por cancelarce
	$diarp = substr($fechacancelarion,8,2);
	$mesrp = substr($fechacancelarion,5,2);
	$ayorp = substr($fechacancelarion,0,4);
	
	//echo $diarp.'-'.$mesrp.'-'.$ayorp.'<br>';
	//Validamos que no pueda cancenlar reservaciones pasadas a la fecha de hoy
	// CDonvertimos klas fechas a Juliano
	
	$diasDesdeJuliano = gregoriantojd($mesr, $diar, $anio);
	$diasHastaJuliano = gregoriantojd($mesrp, $diarp,$ayorp);
	if(($diasHastaJuliano - $diasDesdeJuliano)<0)				
	{
		$dia_actual=$diarp."/".$mesrp."/".$ayorp;
		echo "<script type='text/javascript'>
		alert('No puedes crear reservaciones menores al dia de hoy.');
		window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
	  </script>";
		exit();
	}
	//Insertamos en la base de datos en la tabla de .
	$objConnect = mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die(mysql_error());
	$objDB = mysql_select_db("reservation");
	
	//*** Start Transaction ***//
	mysql_query("BEGIN");
	
	//***  Query 1 ***//
	$strSQL = "INSERT INTO reservacion ";
	$strSQL .="(cancha,tipo_usuario,fecha_reservacion,hora_reservacion,status,guid,fecha_sistemas,usuario,comentario) ";
	$strSQL .="VALUES(";
	$strSQL .="'$cancha','$usuario','$fechar','$horar','activo','$guid_md5c',NOW(),'$nombre_usuario','$comentario')";
	$objQuery1 = mysql_query($strSQL);
	
	$id_reservacion_nuevo = mysql_insert_id();
	
	
	$strSQL = "INSERT INTO contacto ";
	$strSQL .="(nombre_contacto,apellido_contacto,telefono1,correo,fecha_sistemas) ";
	$strSQL .="VALUES (";
	$strSQL .="'$nombre','$appaterno','$telefono','$email',NOW())";
	$objQuery2 = mysql_query($strSQL);
	$id_contacto_nuevo = mysql_insert_id();
	
	
	$strSQL = "INSERT INTO jugadores ";
	$strSQL .="(nombre_jugador,apellido_jugador,hotel,habitacion,id_contacto,id_reservacion,fecha_sistemas) ";
	$strSQL .="VALUES (";
	$strSQL .="'$nombres1','$appaternos1','$empresa','$habitacions1',$id_contacto_nuevo,$id_reservacion_nuevo,NOW())";
	
	$objQuery3 = mysql_query($strSQL);
	
	
	if(($objQuery1) and ($objQuery2))
	{
		
		//*** Commit Transaction ***//
		mysql_query("COMMIT");
		$diar=date(d);
		$mesr=date(m);
		$anio=date(Y);
		$dia_actual=$diar."/".$mesr."/".$anio;
		echo "<script type='text/javascript'>
		alert('Se ha creado la nueva reservación');
		window.location='http://reservation.mayakoba.com/detallecalendario.php?jc_date=$dia_actual';
	  </script>";
	}
	else
	{
		
		//*** RollBack Transaction ***//
		mysql_query("ROLLBACK");
		//echo "Error Save [".$strSQL."]";
		echo "<script type='text/javascript'>
		alert('No se pudo crear la reservación con asistencia $strSQL');
		window.location='http://reservation.mayakoba.com/reservacion.html';
	  </script>";
	}
	mysql_close($objConnect);
	
			
}// end else si no existe en la base de datos, insertamos en la tabla la nueva reservación
/**
 * Devuelve la diferencia entre 2 fechas según los parámetros ingresados
 * @author Gerber Pacheco
 * @param string $fecha_principal Fecha Principal o Mayor
 * @param string $fecha_secundaria Fecha Secundaria o Menor
 * @param string $obtener Tipo de resultado a obtener, puede ser SEGUNDOS, MINUTOS, HORAS, DIAS, SEMANAS
 * @param boolean $redondear TRUE retorna el valor entero, FALSE retorna con decimales
 * @return int Diferencia entre fechas
 */
function diferenciaEntreFechas($fecha_principal, $fecha_secundaria, $obtener = 'SEGUNDOS', $redondear = false){
   $f0 = strtotime($fecha_principal);
   $f1 = strtotime($fecha_secundaria);
   if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
   $resultado = ($f0 - $f1);
   switch ($obtener) {
       default: break;
       case "MINUTOS"   :   $resultado = $resultado / 60;   break;
       case "HORAS"     :   $resultado = $resultado / 60 / 60;   break;
       case "DIAS"      :   $resultado = $resultado / 60 / 60 / 24;   break;
       case "SEMANAS"   :   $resultado = $resultado / 60 / 60 / 24 / 7;   break;
   }
   if($redondear) $resultado = round($resultado);
   return $resultado;
}

function verificaremail($email){ 
  
  return true;
}
?>
</body>
</html>