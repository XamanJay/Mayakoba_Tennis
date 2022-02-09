<?php 
//inicio
session_start();
require_once("include/conexion.php"); 
$correo=$_SESSION['usuario'];
if (empty($correo))
{
	echo "<script type='text/javascript'>
				alert('No estas logueado.');
				window.location='http://reservation.mayakoba.com';
			  </script>";
}
$correo=$_SESSION['usuario'];




$guid= $_POST["guid[]"];



//echo "test ".$guid;

//$aDoor = $_POST['formDoor'];
$aDoor = $_POST['formDoor'];
$aDoor1= $_POST['formDoor1'];
$nombre_jugador = $_POST['nombre_jugador'];

    

    if ( $aDoor<>0 ){
	    $N = count($aDoor);
     for($i=0; $i < $N; $i++)
        {
			 $querySQL1="Select a.id_asistencia from asistencia a inner join reservacion r on a.id_reservacion=r.id_reservacion where   r.hora_reservacion='$aDoor[$i]'";
			  $resultado1=mysql_db_query($db,$querySQL1,$con); 
			  $contador=0;
			  while($verificar=mysql_fetch_array($resultado1)) 
			      { 
	                  $contador=$contador+1;
					   echo "<script type='text/javascript'>
				alert('Ya esta registrado...');
				javascript:window.history.go(-1);
			  </script>";  
				  }
			if($contador==0)	  
			{
			$querySQL='';
	$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.hora_reservacion='$aDoor[$i]'"; //echo $querySQL; echo $nombre_jugador; echo $hora_reservacion[$i];
    $resultado=mysql_db_query($db,$querySQL,$con); 
	$contador=0;
     while($jugador=mysql_fetch_array($resultado)) { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion= $jugador ["id_reservacion"]; //echo $id_jugador; echo $id_reservacion;
	       }
	   
		 $query_usr="INSERT INTO asistencia (id_jugador,asistencia,id_reservacion,hora_sistema) VALUES ('$id_jugador','ASISTIO','$id_reservacion',now())";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                    //SELECCIONAMOS LA BASE DE DATOS 
                    mysql_select_db("reservation");
                                                                              
                    //EJECUTAMOS LA CONSULTA
                    mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
     
        
 	 	 echo "<script type='text/javascript'>
				alert('Registrando Asistencia...');
				javascript:window..history.go(-1);
			  </script>";
	   }
	 }
	}

 if ( $aDoor1<>0 ){
	    $N1 = count($aDoor1);
     for($i=0; $i < $N1; $i++)
        {
			$querySQL2="Select a.id_asistencia from asistencia a inner join reservacion r on a.id_reservacion=r.id_reservacion where   r.hora_reservacion='$aDoor1[$i]'";
			  $resultado2=mysql_db_query($db,$querySQL2,$con); 
			  $contador1=0;
			  while($verificar=mysql_fetch_array($resultado2)) 
			      { 
	                  $contador1=$contador1+1;
					   echo "<script type='text/javascript'>
				alert('Ya esta registrado...');
				javascript:window.history.go(-1);
			  </script>";  
				  }
			if($contador1==0)	  
			{
			
			$querySQL='';
	$querySQL="Select j.id_jugador,r.id_reservacion from jugadores j inner join reservacion r on j.id_reservacion=r.id_reservacion where j.nombre_jugador='$nombre_jugador' and r.hora_reservacion='$aDoor1[$i]'"; //echo $querySQL; echo $nombre_jugador; echo $hora_reservacion[$i];
    $resultado=mysql_db_query($db,$querySQL,$con); 
	$contador=0;
     while($jugador=mysql_fetch_array($resultado)) { 
	                  $id_jugador=  $jugador["id_jugador"]; 
					  $id_reservacion= $jugador ["id_reservacion"]; echo $id_jugador; echo $id_reservacion;
	       }
	   
		 $query_usr="INSERT INTO asistencia (id_jugador,asistencia,id_reservacion,hora_sistema) VALUES ('$id_jugador','FALTO','$id_reservacion',now())";
		  mysql_connect("db.mayakoba.com","reservation","pNTH2MBe") or die("No se pudo conectar a la base de datos");
                                                                              
                    //SELECCIONAMOS LA BASE DE DATOS 
                    mysql_select_db("reservation");
                                                                              
                    //EJECUTAMOS LA CONSULTA
                    mysql_query($query_usr) or die("Query: $query_usr <br />Error: ".mysql_error());
     
        
		
		
 	 	 echo "<script type='text/javascript'>
				alert('Registrando falta');
				javascript:window.history.go(-1);
			  </script>";
	   }
	  }
	 }?>
